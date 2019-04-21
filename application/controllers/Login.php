<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
         parent::__construct();
         $this->load->model('LoginModel');
	}

	public function index(){
		$this->load->view('login');
	}
	
	public function authenticate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->LoginModel->authenticateUser($username,$password);
	}
}