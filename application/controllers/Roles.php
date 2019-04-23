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
		
		$shops = $this->RolesModel->getAllShops();
		if(count($shops) <= 0){
			$this->session->set_flashdata('warning_flash_message',"You havent added any shops yet");
			redirect("Shops");
			die();
		}
		
		if(@$shop_id != null){
			$shop_roles = $this->RolesModel->getRolesOfShop(@$shop_id);
		}else if(@$_POST["shop_id"] != null){
			$shop_id = @$_POST["shop_id"];
			$shop_roles = $this->RolesModel->getRolesOfShop($shop_id);
		}else{
			$shop_id = $shops[0]["id"];
			$shop_roles = $this->RolesModel->getRolesOfShop($shop_id);
		}
		$this->session->set_flashdata('shop_id',$shop_id);
		$this->session->set_flashdata('selected_shop_id_'.$shop_id,"selected");
		$users = $this->RolesModel->getAllEmployees($shop_id);
		$this->load->view('roles',array("shops"=>$shops, "roles"=>$shop_roles, "users"=>$users));
	}

	
	public function update(){
		if($_POST["action"] === "delete"){
			$this->RolesModel->deleteRole($_POST["role_id"]);	
			$this->session->set_flashdata('success_flash_message',"Selected user has been removed from all the roles of current shop");
		}else{
			$is_biller = ($_POST["action"] === "is_biller") ? 1 : 0;
			$is_admin = !$is_biller;
			$this->RolesModel->updateRole($is_biller,$is_admin,$_POST["role_id"]);	
		}
		redirect("Roles/Index/".$_POST["shop_id"]);
	}
	
	public function addEmployee(){
		if(! $this->RolesModel->addNewRole($_POST)){
			$this->session->set_flashdata('warning_flash_message',"Employee is already attached to the selected shop");
		}else{
			$this->session->set_flashdata('success_flash_message',"Successfuly Added Employee To The Selected Shop");
		}
		redirect("Roles/Index/".$_POST["shop_id"]);
	}
	


}
