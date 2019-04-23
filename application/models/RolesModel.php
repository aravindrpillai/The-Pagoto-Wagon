<?php 

class RolesModel extends CI_Model{

	function getAllShops(){
		$this->db->select("id,name,place");
		$return = $this->db->get("shops")->result_array();
		return $return;
	}

	function getRolesOfShop($id){
		$this->db->select('roles.id,roles.shop_id,roles.is_admin,roles.is_biller,users.id,users.dp,users.name,,users.employee_id,users.mobile_number');
		$this->db->from('roles');
		$this->db->join('users', 'roles.user_id = users.id');
		$this->db->where('roles.shop_id', $id);
		$return = $this->db->get()->result_array();
		return $return;
	}

}

?>