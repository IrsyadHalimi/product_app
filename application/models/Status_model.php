<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model 
{
  public function get_all_status() 
  {
    $this->db->select('*');
    $this->db->from('status');
    return $this->db->get()->result_array();
  }

  public function insert_status($data) {
    return $this->db->insert('status', $data);
  }

  public function get_status_by_id($id) {
    return $this->db->get_where('status', ['id_status' => $id])->row_array();
  }
  
  public function get_status_by_name($status_name) {
    return $this->db->get_where('status', ['nama_status' => $status_name])->row_array();
  }

  public function update_status($id, $data) {
    $this->db->where('id_status', $id);
    return $this->db->update('status', $data);
  }

  public function delete_status($id) {
    return $this->db->delete('status', ['id_status' => $id]);
  }
}