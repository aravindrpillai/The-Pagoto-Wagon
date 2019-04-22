<?php 

class EmployeesModel extends CI_Model{

    function saveNewEmployee($data){
		if(count($this->db->get_where('users',array('aadhar_number'=>$data['aadhar_number']))->result_array()) > 0 ){
			return false;	
		}else{
			$this->db->insert('users', $data); 
			return true;
		}
    }
    

    function getAllEmployees(){
		return $this->db->get("users")->result_array();
    }
	
	function getNewEmployeeID(){
		$query = $this->db->query("SELECT * FROM sequence_util WHERE name = 'employee_id' ORDER BY id DESC LIMIT 1");
		$result = $query->result_array();
		$new_val = $result[0]["value"]+1;
		$this->db->where('id', $result[0]["id"]);
		$this->db->update('sequence_util', array('value' => $new_val));
		return $new_val;
	}

}

?>