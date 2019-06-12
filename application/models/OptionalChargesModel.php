<?php 

class OptionalChargesModel extends CI_Model{

    function getAllOptionalCharges($shop_id){
		return $this->db->get_where("optional_charges",array("shop_id"=>$shop_id))->result_array();
    }
	
	function getMyShops($user_id){
		$this->db->select('shops.id,shops.name,shops.place');
		$this->db->from('roles');
		$this->db->join('shops', 'roles.shop_id = shops.id');
		$this->db->where('roles.user_id', $user_id);
		$this->db->where('roles.is_admin', true);
		$return = $this->db->get()->result_array();
		return $return;
	}
	
	function addNewOptionalCharge($data){
		$this->db->insert('optional_charges', $data); 
		return true;
	}

	function updateOptionalCharge($data){
		$this->db->where('id', $data["optionalcharge_id"]);
		$this->db->update('optional_charges', array('name' => $data["name"],'amount' => $data["price"]));
		return true;
	}

	function updateChargeType($optionalcharge_id){
		$is_percentage = $this->db->get_where('optional_charges', array('id' => $optionalcharge_id))->result_array()[0]["is_percentage"];
		$this->db->where('id', $optionalcharge_id);
		$this->db->update('optional_charges', array('is_percentage' => !$is_percentage));
		return true;
	}

}

?>