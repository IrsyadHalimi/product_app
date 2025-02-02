<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{
  public function __construct() 
  {
    parent::__construct();
    $this->load->model('Product_model');
    $this->load->library('form_validation');
  }

  public function index() 
  {
    $data['product'] = $this->Product_model->get_all_product();
    $this->load->view('product/index', $data);
  }

  public function fetch_api() 
  {
      $username = "tesprogrammer020225C15";
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
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); // Kirim data POST
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          "Content-Type: application/x-www-form-urlencoded"
        ]);
        
        $response = curl_exec($ch);
        
        // die($response);
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
              $this->Product_model->insert_product([
                  'nama_produk' => $item['nama_produk'],
                  'harga' => $item['harga'],
                  'kategori_id' => $item['kategori'],
                  'status_id' => $item['status']
              ]);
          }
      } else {
          die("Error: Data produk tidak ditemukan dalam respons API.");
      }

      redirect('product');
  }

  public function create() {
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('product/create');
    } else {
      $data = [
        'nama_produk' => $this->input->post('nama_produk'),
        'harga' => $this->input->post('harga'),
        'kategori_id' => $this->input->post('kategori_id'),
        'status_id' => $this->input->post('status_id')
      ];

      $this->Product_model->insert_product($data);
      redirect('product');
    }
  }

  public function update($id) {
      $data = $this->Product_model->get_product_by_id($id);
      redirect('product/update', $data);
  }

  public function edit($id) {
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('product/edit');
    } else {
        $this->Product_model->update_product($id, [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'kategori_id' => $this->input->post('kategori_id'),
            'status_id' => $this->input->post('status_id')
        ]);
        redirect('product');
    }
  }

  public function delete($id) {
      $this->Product_model->delete_product($id);
      redirect('product');
  }

}