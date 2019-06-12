<?php 

class ExtraChargesModel extends CI_Model{

    function getAllExtraCharges($shop_id){
		return $this->db->get_where("extra_charges",array("shop_id"=>$shop_id))->result_array();
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
	
	function addNewExtraCharge($data){
		$this->db->insert('extra_charges', $data); 
		return true;
	}

	function updateExtraCharge($data){
		$this->db->where('id', $data["extracharge_id"]);
		$this->db->update('extra_charges', array('name' => $data["name"],'amount' => $data["price"]));
		return true;
	}

	function updateChargeType($extracharge_id){
		$is_percentage = $this->db->get_where('extra_charges', array('id' => $extracharge_id))->result_array()[0]["is_percentage"];
		$this->db->where('id', $extracharge_id);
		$this->db->update('extra_charges', array('is_percentage' => !$is_percentage));
		return true;
	}

}

?>