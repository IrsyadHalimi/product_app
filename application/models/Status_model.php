<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model 
{
  // public function get_all_product() 
  // {
  //   $this->db->select('*');
  //   $this->db->from('produk');
  //   $this->db->where('status_id', 'bisa dijual');
  //   return $this->db->get()->result_array();
  // }

  public function insert_status($data) {
    return $this->db->insert('status', $data);
  }

  // public function get_product_by_id($id) {
  //   return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
  // }
  
  public function get_status_by_name($status_name) {
    return $this->db->get_where('status', ['nama_status' => $status_name])->row_array();
  }

  // public function update_product($id, $data) {
  //   $this->db->where('id_produk', $id);
  //   return $this->db->update('produk', $data);
  // }

  // public function delete_product($id) {
  //   return $this->db->delete('produk', ['id_produk' => $id]);
  // }
}