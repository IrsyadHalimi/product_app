<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['title'] = "Semua Kategori";
        $data['categories'] = $this->Category_model->get_all_category();
        $this->load->view('template/header', $data);
        $this->load->view('category/index', $data);    
        $this->load->view('template/footer');
    }

    public function create() {
        $this->form_validation->set_rules('category_name', 'Nama Kategori', 'required');

        $this->form_validation->set_message('required', '%s Harus Diisi.');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Kategori";
            $data['errors'] = validation_errors();
            $this->load->view('template/header', $data);    
            $this->load->view('category/create', $data);
            $this->load->view('template/footer');
        } else {
        $data = [
            'nama_kategori' => $this->input->post('category_name')
        ];

        $this->Category_model->insert_category($data);

        redirect('category');
        }
    }

    public function update($id) {
        $data['title'] = "Edit Kategori";
        $data['category'] = $this->Category_model->get_category_by_id($id);
        $this->load->view('template/header', $data);
        $this->load->view('category/edit', $data);
        $this->load->view('template/footer');
    }

    public function edit($id) {
        $this->form_validation->set_rules('category_name', 'Nama Kategori', 'required');
        
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit Kategori";
            $data['category'] = $this->Category_model->get_category_by_id($id);
            $data['errors'] = validation_errors();
            $this->load->view('template/header', $data);
            $this->load->view('category/edit', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
            'nama_kategori' => $this->input->post('category_name')
            ];

            $this->Category_model->update_category($id, $data);

            redirect('category');
        }
    }

    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('category');
    }
}