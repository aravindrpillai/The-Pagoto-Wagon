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

	public function index($shop_id = null, $POST=null){
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
		}else if($this->session->flashdata('icecream_shop_id') != null){
			$shop_id = $this->session->flashdata('icecream_shop_id');
		}else{
			$shop_id = $shops[0]["id"];
		}
		
		unset($_SESSION["icecream_selected_shop_id_".$this->session->flashdata('icecream_shop_id')]);
		$this->session->set_flashdata('icecream_shop_id',$shop_id);
		$this->session->set_flashdata('icecream_selected_shop_id_'.$shop_id,"selected");
		$icecreams = $this->IcecreamsModel->getAllIcecreams($shop_id);
		$this->load->view('icecreams',array("icecreams"=>$icecreams,"shops"=>$shops,"post"=>$POST));
	}
	
	
	public function addIcecream(){
		if($_POST["name"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Icecream Name is mandatory");
			$this->session->set_flashdata('icecreams_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else if($_POST["price"] == ""){
			$this->session->set_flashdata('warning_flash_message',"Icecream Price is mandatory");
			$this->session->set_flashdata('icecreams_display_form',true);
			$this->Index($_POST["shop_id"],$_POST);
		}else{
			$file_name = $this->upload_image();
			if($file_name != false){
				$_POST["image"] =  $file_name;
				if($this->IcecreamsModel->addNewIcecream($_POST)){
					$this->session->set_flashdata('success_flash_message',"Successfully added new icecream");
					redirect("Icecreams/Index/".$_POST["shop_id"]);
				}else{
					$this->session->set_flashdata('icecreams_display_form',true);
					$this->session->set_flashdata('warning_flash_message',"Failed to save data");
					if(file_exists(realpath(APPPATH."/../assets/icecreams/".$_POST["image"]))){
						unlink(realpath(APPPATH."/../assets/icecreams/".$_POST["image"]));
					}
					$this->Index($_POST["shop_id"],$_POST);
				}
			}else{
				$this->session->set_flashdata('icecreams_display_form',true);
				$this->Index($_POST["shop_id"],$_POST);
			}
		}
	}
	
	public function update(){
		if($_POST["action"] == "update"){
			if($_POST["name"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Icecream Name is mandatory");
				$this->session->set_flashdata('icecream_id',$_POST["icecream_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			}else if($_POST["price"] == ""){
				$this->session->set_flashdata('warning_flash_message',"Topping Price is mandatory");
				$this->session->set_flashdata('icecream_id',$_POST["icecream_id"]);
				$this->Index($_POST["shop_id"],$_POST);
			}else{
				$file_name = true;
				if (file_exists($_FILES['image']['tmp_name'])){
					$file_name = $this->upload_image();
					$_POST["image"] =  $file_name;
				}
				if($file_name != false){
					if($this->IcecreamsModel->updateIcecream($_POST)){
						$this->session->set_flashdata('success_flash_message',"Successfully added new Icecream");
						redirect("Icecreams/Index/".$_POST["shop_id"]);
					}else{
						$this->session->set_flashdata('icecream_id',$_POST["icecream_id"]);
						$this->session->set_flashdata('warning_flash_message',"Failed to save data");
						if($file_name != true){
							unlink(realpath(APPPATH."/../assets/icecreams/".$_POST["image"]));
						}
						$this->Index($_POST["shop_id"],$_POST);
					}
				}else{
					$this->session->set_flashdata('icecreams_display_form',true);
					$this->Index($_POST["shop_id"],$_POST);
				}
			}
		}
		redirect("Icecreams/Index/".$_POST["shop_id"]);
	}
	
	
	private function upload_image(){
        $config['upload_path'] = realpath(APPPATH."/../assets/icecreams/");
		$config['allowed_types'] = 'gif|jpg|GIF|JPG|png|PNG|jpeg|JPEG';
		$config['max_size'] = '2048';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('warning_flash_message',$this->upload->display_errors());
			return false;
		} else {
			$upload_data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_data['full_path'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 200;
			$config['height'] = 200;
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();
			return $upload_data["file_name"];
		}
     }
	
	
}
