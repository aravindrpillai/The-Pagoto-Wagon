<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_master')){
				$this->load->model('ShopsModel');
				$this->session->set_flashdata('is_shops_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 }
		 
	}

	public function index(){
		$shops = $this->ShopsModel->getAllShops();
		$this->load->view('shops_list_all',array("shops"=>$shops,"name"=>"Pagoto Wagon"));
	}

	public function addShop(){
		$this->session->set_flashdata('display_form',true);
		
		if($_POST['name'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Shop name is mandatory');
		}else if($_POST['place'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Shop place is mandatory');
		}else if($_POST['start_date'] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Shop start date is mandatory');
		}
		else{
			$resp = $this->ShopsModel->saveNewShop($_POST);
			if($resp){
				$this->session->set_flashdata('success_flash_message', 'New Shop Added Successfully');
				$this->session->set_flashdata('display_form',false);
				redirect("shops");
				die();
			}else{
				$this->session->set_flashdata('error_flash_message', 'Shop with same name and location exists');
			}
		}		
		$this->load->view('shops_list_all',$_POST);
	}
	
	function update(){
		if(@$_POST["action"] == "status"){
			$this->ShopsModel->updateShopStatus($_POST["shop_id"]);
		} else if(@$_POST["action"] == "update"){
			$this->session->set_flashdata('shop_id',$_POST['shop_id']);
			if($_POST['name'] == ""){
				$this->session->set_flashdata('warning_flash_message', 'Shop name is mandatory');
			} else if($_POST['place'] == ""){
				$this->session->set_flashdata('warning_flash_message', 'Shop place is mandatory');
			} else if($_POST['start_date'] == ""){
				$this->session->set_flashdata('warning_flash_message', 'Shop start date is mandatory');
			} else {			
				$resp = $this->ShopsModel->updateShopData($_POST);
				if($resp){
					$this->session->set_flashdata('success_flash_message', 'Shop details updated successfully');
					unset($_SESSION['shop_id']);
					redirect("shops");
					die();
				} else {
					$this->session->set_flashdata('error_flash_message', 'Shop with same name and location exists');
				}	
			}
		}
		$this->index();
	}

}
