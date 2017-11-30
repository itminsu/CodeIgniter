<?php
class Stores extends CI_Controller {

	function __construct() {
    parent::__construct();
    
    $this->load->helper('url');
		$this->load->database();
		$this->load->model('store_model');
		$this->load->model('customer_model');
  }

	public function index() {
		$this->load->view('store/head');
		$stores = $this->store_model->get_all_stores();
		$this->load->view('store/navigation_view', array('stores'=>$stores));
		$this->load->view('store/footer');
	}

	public function customers($id) {// get_all_customers_by_store_id()
		$this->load->view('store/head');
		$stores = $this->store_model->get_all_stores();
		$this->load->view('store/navigation_view', array('stores'=>$stores));
		$address = $this->store_model->get_store_address($id);
		$customers = $this->customer_model->get_all_customers_by_store_id($id);
		$this->load->view('store/customer_view', array('address'=>$address, 'customers'=>$customers));
		$this->load->view('store/modal_view');
		$this->load->view('store/modal_titles_view');
		$this->load->view('store/footer');
	}

	public function customer_add() {
		$data=array(
			'store_id'=>$this->input->post('store_id'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'address_id'=>$this->input->post('address_id'),
			'active'=>$this->input->post('active'),
		);

		$insert=$this->customer_model->customer_add($data);
		echo json_decode(array("status"=>TRUE));
	}

	public function load_customer_to_edit($id) {
		$data=$this->customer_model->get_by_id($id);
		echo json_encode($data);
	}

	public function customer_update() {
		$data=array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'active'=>$this->input->post('active'),
		);

		$this->customer_model->customer_update(array('customer_id'=>$this->input->post('customer_id')),$data);
		echo json_encode(array("status"=>TRUE));
	}

	public function customer_delete($id) {
		$this->customer_model->delete_by_id($id);
		echo json_encode(array("status"=>TRUE));
	}

	public function get_title_list($id) {
		$data=$this->customer_model->get_all_title_by_customer($id);
		echo json_encode($data);
	}
}
