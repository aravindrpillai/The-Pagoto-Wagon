<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_master')){
				$this->load->model('EmployeesModel');
				$this->session->set_flashdata('is_employees_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 }
		 
	}

	public function index(){
		//$employees = $this->EmployeesModel->getAllShops();
		$this->load->view('employees_list_all');
	}

}
