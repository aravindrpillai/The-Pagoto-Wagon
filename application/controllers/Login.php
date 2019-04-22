<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
         parent::__construct();
         $this->load->model('LoginModel');
	}

	public function index(){
		$data["flash_message"] = $this->session->flashdata('flash_message');
		$this->load->view('login',$data);
	}

	public function authenticate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$resp = $this->LoginModel->authenticateUser($username,$password);
		if(count($resp) == 1){
			$this->session->set_userdata('user_id',$resp[0]['id']);
			$this->session->set_userdata('user_name',$resp[0]['name']);
			$this->session->set_userdata('user_dp',$resp[0]['dp']);
			$this->session->set_userdata('employee_id',$resp[0]['employee_id']);
			$this->session->set_userdata('is_master',$resp[0]['is_master']);
			$this->session->set_userdata('is_admin',$resp[0]['is_admin']);
			$this->session->set_userdata('is_biller',$resp[0]['is_biller']);
			$this->session->set_flashdata('info_flash_message', 'Your Last Login Was On '.$resp[0]['last_logged_in']);
			redirect("Home");
		}else{
			$this->session->set_flashdata('flash_message', 'Invalid Login Credentials');
			redirect("Login");
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect("Login");
	}
}
