<?php 

class EmployeesModel extends CI_Model{

    function saveNewEmployee($data){
		echo "<pre>";
		print_r($data);
    }

    function getAllEmployees(){
		return $this->db->get("employees")->result_array();
    }

}

?>