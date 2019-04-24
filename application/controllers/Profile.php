<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	public function __construct(){
		 parent::__construct();
		 if(!$this->session->userdata('user_id')){
			$this->session->sess_destroy();
			$this->session->set_flashdata('flash_message', 'Session timeout');
			redirect("Login");
		 }else{
			$this->load->model('ProfileModel');
			$this->session->set_flashdata('is_profile_selected',"active");
		 } 
	}
	
	public function index(){
		$user_id = $this->session->userdata('user_id');
		$user_data = $this->ProfileModel->getUserData($user_id);
		$this->load->view('profile',array("user_data"=>$user_data));
	}
	
	
	public function updateBasicDetails(){
		if($_POST["name"] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Name cannot be empty');
		}else if($_POST["aadhar_no"] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Aadhar number cannot be empty');
		}else if($_POST["mobile_no"] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Mobile number cannot be empty');
		}else{	
			$user_id = $this->session->userdata('user_id');
			$name = $_POST["name"];
			$aadhar_no = $_POST["aadhar_no"];
			$mobile_no = $_POST["mobile_no"];
			if($this->ProfileModel->updateBasicDetails($user_id,$name,$aadhar_no,$mobile_no)){
				$this->session->set_userdata('user_name',$name);
				$this->session->set_userdata('aadhar_number',$aadhar_number);
				$this->session->set_flashdata('success_flash_message', 'Basic details updated successfully');
			}else{
				$this->session->set_flashdata('warning_flash_message', 'Aadhar number already linked with other user');
			}
		}
		redirect("Profile");
	}
	
	public function updateDisplayPicture(){
		if($_POST["action"] == "remove"){
			$file_name = "user.jpg";
		}else{
			if(file_exists($_FILES['image']['tmp_name'])){
				$file_name = $this->upload_image();
				if($file_name == false){
					redirect("Profile");
				}
			}else{
				$this->session->set_flashdata('warning_flash_message', 'Pease select an image to upload');
				redirect("Profile");
			}	
		}
		$user_id = $this->session->userdata('user_id');
		if($this->ProfileModel->updateDisplayPicture($user_id,$file_name)){
			$this->session->set_userdata('user_dp',$file_name);
			$this->session->set_flashdata('success_flash_message', 'Display Picture updated successfully');
		}else{
			$this->session->set_flashdata('warning_flash_message', 'Failed to update profile picture');
		}
		redirect("Profile");
	}
	
	public function updateCredentials(){
		if($_POST["username"] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Username cannot be empty');
		}else if($_POST["password"] == ""){
			$this->session->set_flashdata('warning_flash_message', 'Password cannot be empty');
		}else{	
			$user_id = $this->session->userdata('user_id');
			if($this->ProfileModel->updateCredentials($user_id,$_POST["username"],$_POST["password"])){
				$this->session->set_flashdata('success_flash_message', 'Login credentials updated successfully');
			}else{
				$this->session->set_flashdata('warning_flash_message', 'Username is aready used');
			}
		}
		redirect("Profile");
	}
	
	
		
	private function upload_image(){
        $config['upload_path'] = realpath(APPPATH."/../assets/dp/");
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
