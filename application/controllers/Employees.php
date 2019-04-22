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
		$employees = $this->EmployeesModel->getAllEmployees();
		$this->load->view('employees_list_all',array("employees"=>$employees,"post"=>$_POST));
	}
	
	
	
	public function addEmployee(){
		$this->session->set_flashdata('display_form',true);
		if($_POST['name'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Employee name is mandatory');
		}else if($_POST['mobile_number'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Employee Mobile Number is mandatory');
		}else if($_POST['aadhar_number'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Employee Aadhar Number is mandatory');
		}else if($_POST['employement_start_date'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Employement start date is mandatory');
		}
		else{
			$_POST["username"] = $this->EmployeesModel->getNewEmployeeID();
			$_POST["password"] = $this->generatePassword(6);
			$_POST["employee_id"] = "P".$_POST["username"];
			$resp = $this->EmployeesModel->saveNewEmployee($_POST);
			if($resp){
				$this->session->set_flashdata('success_flash_message', 'New Employee Added Successfully');
				$this->session->set_flashdata('display_form',false);
				redirect("employees");
				die();
			}else{
				$this->session->set_flashdata('error_flash_message', 'Employee with same aadhar no exists');
			}
		}	
		$employees = $this->EmployeesModel->getAllEmployees();
		$this->load->view('employees_list_all',array("employees"=>$employees,"post"=>$_POST));
	}
	
	
	private function generatePassword($length) {
		$key = '';
		$keys = array_merge(range(0, 9), range('a', 'z'));
		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}
		return $key;
	}

}
