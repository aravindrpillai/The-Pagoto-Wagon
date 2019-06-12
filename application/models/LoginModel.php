<?php 

class LoginModel extends CI_Model{

    function authenticateUser($username,$password){
		$this->db->select(array('*'));
		$this->db->from("users");
		$this->db->where(array('username' => $username, 'password'=>$password));
		$query = $this->db->get();
		$return = $query->result_array();
		return $return;
    }

}

?>