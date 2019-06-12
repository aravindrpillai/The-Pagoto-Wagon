<?php 

class ProfileModel extends CI_Model{

	function getUserData($user_id){
		return $this->db->get_where("users",array("id"=>$user_id))->result_array()[0];
	}
	
	public function updateBasicDetails($user_id,$name,$aadhar_no,$mobile_no){
		$resp = $this->db->get_where('users',array('aadhar_number'=>$aadhar_no))->result_array();
		if(count($resp) > 0 ){
			if($resp[0]['id'] != $user_id){
				return false;
			}
		}
		$this->db->where('id', $user_id);
		$this->db->update('users', array('name' => $name, 'mobile_number'=> $mobile_no, 'aadhar_number'=> $aadhar_no));
		return true;	
	}
	
	public function updateDisplayPicture($user_id,$dp){
		$resp = $this->db->get_where('users',array('id'=>$user_id))->result_array();
		if($resp[0]['dp'] != "user.jpg" && $resp[0]['dp'] != null){
			unlink(realpath(APPPATH."/../assets/dp/".$resp[0]['dp']));
		}
		$this->db->where('id', $user_id);
		$this->db->update('users', array('dp' => $dp));
		return true;
	}
	
	public function updateCredentials($user_id,$username,$password){
		$resp = $this->db->get_where('users',array('username'=>$username))->result_array();
		if(count($resp) > 0 ){
			if($resp[0]['id'] != $user_id){
				return false;
			}
		}
		$this->db->where('id', $user_id);
		$this->db->update('users', array('username' => $username, 'password'=> $password));
		return true;
	}

}

?>