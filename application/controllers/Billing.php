<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			$this->load->model('BillingModel');
			$this->session->set_flashdata('is_billing_selected',"active");
		 } 
	}
	
	public function index(){
		$this->load->view('billing');
	}
	

	 
}
