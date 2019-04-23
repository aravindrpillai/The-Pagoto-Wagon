<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_master')){
				$this->load->model('RolesModel');
				$this->session->set_flashdata('is_roles_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 }
		 
	}

	public function index($shop_id = null){
		
		if(@$shop_id != null){
			$shop_roles = $this->RolesModel->getRolesOfShop(@$shop_id);
		}else if(@$_POST["shop_id"] != null){
			$shop_roles = $this->RolesModel->getRolesOfShop(@$_POST["shop_id"]);
		}else{
			$shop_roles = null;
		}
		
		$shops = $this->RolesModel->getAllShops();
		$this->load->view('roles',array("shops"=>$shops, "roles"=>$shop_roles));
	}

	
	public function update(){
		$this->session->set_flashdata('role_id',$_POST["role_id"]);
		$this->session->set_flashdata('shop_id',$_POST["shop_id"]);
		
		
	}
	


}
