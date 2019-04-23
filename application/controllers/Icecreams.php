<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icecreams extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_admin')){
				$this->load->model('IcecreamsModel');
				$this->session->set_flashdata('is_icecreams_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 } 
	}

	public function index(){
		$icecreams = $this->IcecreamsModel->getAllToppings();
		$this->load->view('icecreams',array("icecreams"=>$icecreams));
	}
	
	
	
	public function update(){
		redirect("Icecreams");
	}
	
	
	
	
}
