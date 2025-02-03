<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->model('Status_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['title'] = "Data Produk";
        $data['product'] = $this->Product_model->get_all_product();
        $this->load->view('template/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('template/footer');
    }

    public function show_sell_product()
    {
        $data['title'] = "Produk Dijual";
        $data['product'] = $this->Product_model->get_sell_product();
        $this->load->view('template/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('template/footer');
    }

    function username_api_input() {
        $this->load->view('template/header');
        $this->load->view('product/username_api_input');
        $this->load->view('template/footer');
    }

    public function fetch_api() 
    {
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_message('required', '%s Harus Diisi.');

		if ($this->form_validation->run() == FALSE) {
            $data['errors'] = validation_errors();
            $this->load->view('template/header');
            $this->load->view('product/username_api_input', $data);
            $this->load->view('template/footer');
        } else {
			$username = $this->input->post('username');
			$password = md5("bisacoding-" . date("d") . "-" . date("m") . "-" . substr(date("Y"), 2));
			
			$url = "https://recruitment.fastprint.co.id/tes/api_tes_programmer";
			
			$postData = http_build_query([
				'username' => $username,
				'password' => $password
				]);
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				curl_setopt($ch, CURLOPT_HTTPHEADER, [
				"Content-Type: application/x-www-form-urlencoded"
				]);
				
				$response = curl_exec($ch);
				
			if (curl_errno($ch)) {
				die("cURL Error: " . curl_error($ch));
			}

			curl_close($ch);

			$data = json_decode($response, true);
			if (json_last_error() !== JSON_ERROR_NONE) {
				die("JSON Decode Error: " . json_last_error_msg() . "<br>Response: " . htmlspecialchars($response));
			}

			if (isset($data['error']) && $data['error'] == 1) {
				die("API Error: " . $data['ket']);
			}

			if (isset($data['data']) && is_array($data['data'])) {
				foreach ($data['data'] as $item) {
					$existing_category = $this->Category_model->get_category_by_name($item['kategori']);
					$existing_status = $this->Status_model->get_status_by_name($item['status']);

					if (!$existing_category) {
					$category_id = $this->Category_model->insert_category(['nama_kategori' => $item['kategori']]);
					} else {
						$category_id = $existing_category['id_kategori'];
					}
					
					if (!$existing_status) {
						$status_id = $this->Status_model->insert_status(['nama_status' => $item['status']]);
					} else {
						$status_id = $existing_status['id_status'];
					}
					
					$existing_product = $this->Product_model->get_product_by_name($item['nama_produk']);
					
					if ($existing_product) {
					$update_data = [];

					if ($existing_product['harga'] != $item['harga']) {
						$update_data['harga'] = $item['harga'];
					}

					if (!empty($update_data)) {
						$this->Product_model->update_product($existing_product['id_produk'], $update_data);
					}
					} else {
						$this->Product_model->insert_product([
							'id_produk' => $item['id_produk'],
							'nama_produk' => $item['nama_produk'],
							'harga' => $item['harga'],
							'kategori_id' => $category_id,
							'status_id' => $status_id
						]);
					}
				}
			} else {
				die("Error: Data produk tidak ditemukan dalam respons API.");
			}
			redirect('product');
		}
    }

    public function create() {
        $this->form_validation->set_rules('product_name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');

        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka.');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Produk";
            $data['categories'] = $this->Category_model->get_all_category();
            $data['status'] = $this->Status_model->get_all_status();
            $data['errors'] = validation_errors();
            $this->load->view('template/header', $data);
            $this->load->view('product/create', $data);
            $this->load->view('template/footer');
        } else {
        $max_id = $this->Product_model->get_max_id();
        $new_product_id = $max_id + 1;
        $data = [
            'id_produk' => $new_product_id,
            'nama_produk' => $this->input->post('product_name'),
            'harga' => $this->input->post('price'),
            'kategori_id' => $this->input->post('category'),
            'status_id' => $this->input->post('status')
        ];

        $this->Product_model->insert_product($data);

        redirect('product');
        }
    }

    public function update($id) {
        $data['title'] = "Edit Produk";
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $data['categories'] = $this->Category_model->get_all_category();
        $data['status'] = $this->Status_model->get_all_status();
        $this->load->view('template/header', $data);
        $this->load->view('product/edit', $data);
        $this->load->view('template/footer');
    }

    public function edit($id) {
        $this->form_validation->set_rules('product_name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');

        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('numeric', '%s Harus Berupa Angka.');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit Produk";
            $data['product'] = $this->Product_model->get_product_by_id($id);
            $data['categories'] = $this->Category_model->get_all_category();
            $data['status'] = $this->Status_model->get_all_status();
            $data['errors'] = validation_errors();
            $this->load->view('template/header', $data);
            $this->load->view('product/edit', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
            'nama_produk' => $this->input->post('product_name'),
            'harga' => $this->input->post('price'),
            'kategori_id' => $this->input->post('category'),
            'status_id' => $this->input->post('status')
            ];

            $this->Product_model->update_product($id, $data);

            redirect('product');
        }
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect('product');
    }

}
