<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model 
{
  public function get_all_product() 
  {
    $this->db->select('produk.*, kategori.nama_kategori, status.nama_status');
    $this->db->from('produk');
    $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id', 'left');
    $this->db->join('status', 'status.id_status = produk.status_id', 'left');
    $this->db->where('status.nama_status', 'bisa dijual');
    return $this->db->get()->result_array();
  }

  public function insert_product($data) {
    return $this->db->insert('produk', $data);
  }

  public function get_product_by_id($id) {
    return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
  }
  
  public function get_product_by_name($product_name) {
    return $this->db->get_where('produk', ['nama_produk' => $product_name])->row_array();
  }

  public function update_product($id, $data) {
    $this->db->where('id_produk', $id);
    return $this->db->update('produk', $data);
  }

  public function delete_product($id) {
    return $this->db->delete('produk', ['id_produk' => $id]);
  }
}