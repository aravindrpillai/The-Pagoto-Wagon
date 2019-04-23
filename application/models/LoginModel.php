<?php 

class LoginModel extends CI_Model{

    function authenticateUser($username,$password){
		$this->db->select(array('id','name','dp','last_logged_in','employee_id','is_master','is_admin','is_biller','retired','aadhar_number','mobile_number'));
		$this->db->from("users");
		$this->db->where(array('username' => $username, 'password'=>$password));
		$query = $this->db->get();
		$return = $query->result_array();
		return $return;
    }

}

?>