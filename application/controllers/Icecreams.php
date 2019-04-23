<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icecreams extends CI_Controller {
	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			if(@$this->session->userdata('is_admin')){
				$this->load->model('IcecreamsModel');
				$this->session->set_flashdata('is_icecreams_selected',"active");
			}else{
				$this->session->set_flashdata('warning_flash_message',"Access Denied : You need elevated permission to access this page");
				redirect("Home");
			}
		 } 
	}

	public function index($shop_id = null){
		$shops = $this->IcecreamsModel->getMyShops($this->session->userdata('user_id'));
		if(count($shops) <= 0){
			$this->session->set_flashdata('warning_flash_message',"You dont have admin privilage on any shop");
			redirect("Home");
			die();
		}
		
		if($shop_id != null){
			$shop_id = $shop_id;
		}else if(@isset($_POST["shop_id"])){
			$shop_id = $_POST["shop_id"];
		}else{
			$shop_id = $shops[0]["id"];
		}
		
		unset($_SESSION["selected_shop_id_".$this->session->flashdata('shop_id')]);
		$this->session->set_flashdata('shop_id',$shop_id);
		$this->session->set_flashdata('selected_shop_id_'.$shop_id,"selected");
		
		$icecreams = $this->IcecreamsModel->getAllToppings($shop_id);
		
		$this->load->view('icecreams',array("icecreams"=>$icecreams,"shops"=>$shops));
	}
	
	
	
	public function update(){
		redirect("Icecreams");
	}
	
	
	
	
}
