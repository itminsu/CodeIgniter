<?php
class Store_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  //get stores
  public function get_all_stores() {
    $this->db->select();
    $this->db->from('store');
    return $query = $this->db->get()->result();
  }

  public function get_store_address($id) {
    $this->db->select('store.store_id, city.city, country.country');
    $this->db->from('store');
    $this->db->join('address', 'store.address_id = address.address_id');
    $this->db->join('city', 'address.city_id = city.city_id');
    $this->db->join('country', 'city.country_id = country.country_id');
    $this->db->where('store.store_id', $id);
    return $query = $this->db->get()->row();

    // $this->db->select('store.store_id, staff_list.city, staff_list.country');
    // $this->db->from('store');
    // $this->db->join('staff_list', 'store.manager_staff_id = staff_list.ID');
    // $this->db->where('store.store_id', $id);
    // return $query = $this->db->get()->row();
  }
}
