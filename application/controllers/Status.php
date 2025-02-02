<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller 
{
  public function __construct() 
  {
    parent::__construct();
    $this->load->model('Status_model');
    $this->load->library('form_validation');
  }

  public function index() 
  {
    $data['title'] = "Semua Status";
    $data['status'] = $this->Status_model->get_all_status();
    $this->load->view('template/header', $data);
    $this->load->view('status/index', $data);    
    $this->load->view('template/footer');
  }

  public function create() {
    $this->form_validation->set_rules('status_name', 'Nama Status', 'required');

    $this->form_validation->set_message('required', '%s Harus Diisi.');

    if ($this->form_validation->run() == FALSE) {
        $data['title'] = "Tambah Status";
        $data['errors'] = validation_errors();
        $this->load->view('template/header', $data);
        $this->load->view('status/create', $data);
        $this->load->view('template/footer');
    } else {
      $data = [
        'nama_status' => $this->input->post('status_name')
      ];

      $this->Status_model->insert_status($data);

      redirect('status');
    }
  }

  public function update($id) {
      $data['title'] = "Edit Status";
      $data['status'] = $this->Status_model->get_status_by_id($id);
      $this->load->view('template/header', $data);
      $this->load->view('status/edit', $data);
      $this->load->view('template/footer');
  }

  public function edit($id) {
    $this->form_validation->set_rules('status_name', 'Nama Status', 'required');
    
    $this->form_validation->set_message('required', '%s Harus Diisi.');
    
    if ($this->form_validation->run() == FALSE) {
        $data['title'] = "Edit Status";
        $data['status'] = $this->Status_model->get_status_by_id($id);
        $data['errors'] = validation_errors();
        $this->load->view('template/header', $data);
        $this->load->view('status/edit', $data);
        $this->load->view('template/footer');
    } else {
        $data = [
          'nama_status' => $this->input->post('status_name')
        ];
  
        $this->Status_model->update_status($id, $data);
  
        redirect('status');
    }
  }

  public function delete($id) {
      $this->Status_model->delete_status($id);
      redirect('status');
  }

}