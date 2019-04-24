<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtraCharges extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_admin')){
				$this->load->model('ExtraChargesModel');
				$this->session->set_flashdata('is_extra_charges_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 } 
	}

	public function index($shop_id = null,$POST=null){
		$shops = $this->ExtraChargesModel->getMyShops($this->session->userdata('user_id'));
		if(count($shops) <= 0){
			$this->session->set_flashdata('warning_flash_message',"You dont have admin privilage on any shop");
			redirect("Home");
			die();
		}
		
		if($shop_id != null){
			$shop_id = $shop_id;
		}else if(@isset($_POST["shop_id"])){
			$shop_id = $_POST["shop_id"];
		}else if($this->session->flashdata('extracharge_shop_id') != null){
			$shop_id = $this->session->flashdata('extracharge_shop_id');
		}else{
			$shop_id = $shops[0]["id"];
		}
		
		unset($_SESSION["extracharges_selected_shop_id_".$this->session->flashdata('extracharges_shop_id')]);
		$this->session->set_flashdata('extracharges_shop_id',$shop_id);
		$this->session->set_flashdata('extracharges_selected_shop_id_'.$shop_id,"selected");
		
		$extracharges = $this->ExtraChargesModel->getAllExtraCharges($shop_id);
		
		$this->load->view('extracharges',array("extracharges"=>$extracharges,"shops"=>$shops,"post"=>$POST));
	}
	
	
	
	public function addExtraCharge(){
		if($_POST["name"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Charge Name is mandatory");
			$this->session->set_flashdata('extracharges_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else if($_POST["price"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Price is mandatory");
			$this->session->set_flashdata('extracharges_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else{
			$_POST["amount"] = $_POST["price"];
			unset($_POST["price"]);
			if($this->ExtraChargesModel->addNewExtraCharge($_POST)){
				$this->session->set_flashdata('success_flash_message',"Successfully added new charge");
				redirect("ExtraCharges/Index/".$_POST["shop_id"]);
			}else{
				$this->session->set_flashdata('extracharges_display_form',true);
				$this->session->set_flashdata('warning_flash_message',"Failed to save data");
				$this->Index($_POST["shop_id"],$_POST);
			}
		}
	}
	
	public function update(){
		if($_POST["action"] == "update"){
			if($_POST["name"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Charge Name is mandatory");
				$this->session->set_flashdata('extracharge_id',$_POST["extracharge_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			} else if($_POST["price"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Price is mandatory");
				$this->session->set_flashdata('extracharge_id',$_POST["extracharge_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			} else {
				if($this->ExtraChargesModel->updateExtraCharge($_POST)){
					$this->session->set_flashdata('success_flash_message',"Successfully updated charge details");
					redirect("ExtraCharges/Index/".$_POST["shop_id"]);
				} else {
					$this->session->set_flashdata('extracharge_id',$_POST["extracharge_id"]);
					$this->session->set_flashdata('warning_flash_message',"Failed to save data");
					$this->Index($_POST["shop_id"],$_POST);
				}
			}
		} else if($_POST["action"] == "is_percentage"){
			$this->ExtraChargesModel->updateChargeType($_POST["extracharge_id"]);
		}
		redirect("ExtraCharges/Index/".$_POST["shop_id"]);
	}
	
}
