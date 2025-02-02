<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model 
{
  public function get_all_category() 
  {
    $this->db->select('*');
    $this->db->from('kategori');
    return $this->db->get()->result_array();
  }

  public function insert_category($data) {
    return $this->db->insert('kategori', $data);
  }

  public function get_category_by_id($id) {
    return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
  }
  
  public function get_category_by_name($category_name) {
    return $this->db->get_where('kategori', ['nama_kategori' => $category_name])->row_array();
  }

  public function update_category($id, $data) {
    $this->db->where('id_kategori', $id);
    return $this->db->update('kategori', $data);
  }

  public function delete_category($id) {
    return $this->db->delete('kategori', ['id_kategori' => $id]);
  }
}