<?php
class customer_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  //get customers
  public function get_all_customers_by_store_id($id) {
    $this->db->select();
    $this->db->from('customer');
    $this->db->where('store_id', $id);
    return $query = $this->db->get()->result();
  }

  public function get_all_title_by_customer($id) {
    $this->db->select('title');
    $this->db->from('film');
    $this->db->join('inventory', 'film.film_id = inventory.film_id');
    $this->db->join('rental', 'rental.inventory_id = inventory.inventory_id');
    $this->db->join('customer', 'customer.customer_id = rental.customer_id');
    $this->db->where('customer.customer_id', $id);
    $this->db->order_by("title", "asc");
    return $query = $this->db->get()->result();
  }

  public function customer_add($data) {
    $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
    return $this->db->insert('customer',$data);
    $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
  }

  public function get_by_id($id) {
    $this->db->from('customer');
    $this->db->where('customer_id', $id);
    return $query=$this->db->get()->row();
  }

  public function customer_update($where, $data) {
      $this->db->update('customer', $data, $where);
      return $this->db->affected_rows();
  }

  public function delete_by_id($id) {
    $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
    $this->db->where('customer_id',$id);
    $this->db->delete('customer');
    $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
  }
}
