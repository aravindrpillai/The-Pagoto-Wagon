<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OptionalCharges extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_admin')){
				$this->load->model('OptionalChargesModel');
				$this->session->set_flashdata('is_optional_charges_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 } 
	}

	public function index($shop_id = null,$POST=null){
		$shops = $this->OptionalChargesModel->getMyShops($this->session->userdata('user_id'));
		if(count($shops) <= 0){
			$this->session->set_flashdata('warning_flash_message',"You dont have admin privilage on any shop");
			redirect("Home");
			die();
		}
		
		if($shop_id != null){
			$shop_id = $shop_id;
		}else if(@isset($_POST["shop_id"])){
			$shop_id = $_POST["shop_id"];
		}else if($this->session->flashdata('optionalcharge_shop_id') != null){
			$shop_id = $this->session->flashdata('optionalcharge_shop_id');
		}else{
			$shop_id = $shops[0]["id"];
		}
		
		unset($_SESSION["optionalcharges_selected_shop_id_".$this->session->flashdata('optionalcharges_shop_id')]);
		$this->session->set_flashdata('optionalcharges_shop_id',$shop_id);
		$this->session->set_flashdata('optionalcharges_selected_shop_id_'.$shop_id,"selected");
		
		$optionalcharges = $this->OptionalChargesModel->getAllOptionalCharges($shop_id);
		
		$this->load->view('optionalcharges',array("optionalcharges"=>$optionalcharges,"shops"=>$shops,"post"=>$POST));
	}
	
	
	
	public function addOptionalCharge(){
		if($_POST["name"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Charge Name is mandatory");
			$this->session->set_flashdata('optionalcharges_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else if($_POST["price"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Price is mandatory");
			$this->session->set_flashdata('optionalcharges_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else{
			$_POST["amount"] = $_POST["price"];
			unset($_POST["price"]);
			if($this->OptionalChargesModel->addNewOptionalCharge($_POST)){
				$this->session->set_flashdata('success_flash_message',"Successfully added new charge");
				redirect("OptionalCharges/Index/".$_POST["shop_id"]);
			}else{
				$this->session->set_flashdata('optionalcharges_display_form',true);
				$this->session->set_flashdata('warning_flash_message',"Failed to save data");
				$this->Index($_POST["shop_id"],$_POST);
			}
		}
	}
	
	public function update(){
		if($_POST["action"] == "update"){
			if($_POST["name"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Charge Name is mandatory");
				$this->session->set_flashdata('optionalcharge_id',$_POST["optionalcharge_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			} else if($_POST["price"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Price is mandatory");
				$this->session->set_flashdata('optionalcharge_id',$_POST["optionalcharge_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			} else {
				if($this->OptionalChargesModel->updateOptionalCharge($_POST)){
					$this->session->set_flashdata('success_flash_message',"Successfully updated charge details");
					redirect("OptionalCharges/Index/".$_POST["shop_id"]);
				} else {
					$this->session->set_flashdata('optionalcharge_id',$_POST["optionalcharge_id"]);
					$this->session->set_flashdata('warning_flash_message',"Failed to save data");
					$this->Index($_POST["shop_id"],$_POST);
				}
			}
		} else if($_POST["action"] == "is_percentage"){
			$this->OptionalChargesModel->updateChargeType($_POST["optionalcharge_id"]);
		}
		redirect("OptionalCharges/Index/".$_POST["shop_id"]);
	}
	
}
