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
	
	
	function updateEmployeeStatus($emp_id){
		$retired = $this->db->get_where('users',array('id'=>$emp_id))->result_array()[0]["retired"];
		$this->db->where('id', $emp_id);
		$this->db->update('users', array('retired' => (!$retired)));
		return true;
	}
	
	
	function updateEmployeeData($data){
		$resp = $this->db->get_where('users',array('aadhar_number'=>$data['aadhar_number']))->result_array();
		if(count($resp) > 0 ){
			if($resp[0]['id'] != $data["employee_id"]){
				return false;
			}
		}
		$this->db->where('id', $data["employee_id"]);
		$this->db->update('users', array('name' => $data['name'], 'mobile_number'=> $data['mobile_number'], 'aadhar_number'=> $data['aadhar_number'], 'employement_start_date'=> $data['employement_start_date']));
		return true;	
	}

}

?>