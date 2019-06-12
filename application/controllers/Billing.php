<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			$this->load->model('BillingModel');
			$this->session->set_flashdata('is_billing_selected',"active");
		 } 
	}
	public function index($shop_id = null){
		$shops = $this->BillingModel->getMyShops($this->session->userdata('user_id'));
		if(count($shops) <= 0){
			$this->session->set_flashdata('warning_flash_message',"You dont have admin privilage on any shop");
			redirect("Home");
			die();
		}
		
		if($shop_id != null){
			$shop_id = $shop_id;
		}else if(@isset($_POST["shop_id"])){
			$shop_id = $_POST["shop_id"];
		}else if($this->session->flashdata('billing_shop_id') != null){
			$shop_id = $this->session->flashdata('billing_shop_id');
		}else{
			$shop_id = $shops[0]["id"];
		}
		
		unset($_SESSION["billing_selected_shop_id_".$this->session->flashdata('billing_shop_id')]);
		$this->session->set_flashdata('billing_shop_id',$shop_id);
		$this->session->set_flashdata('billing_selected_shop_id_'.$shop_id,"selected");
		
		$icecreams =$this->BillingModel->getIcecreams($shop_id);
		$toppings =$this->BillingModel->getToppings($shop_id);
		$cups =$this->BillingModel->getCups($shop_id);
		$optional_items =$this->BillingModel->getOptionalItems($shop_id);
		$extra_charges =$this->BillingModel->getExtraCharges($shop_id);
		
		$this->load->view('billing',array(
			"shops"=>$shops,
			"icecreams"=>$icecreams,
			"toppings"=>$toppings,
			"cups"=>$cups,
			"optional_items"=>$optional_items,
			"extra_charges"=>$extra_charges
			));
	}
	
	

	 
}
