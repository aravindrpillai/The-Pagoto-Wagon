<?php 

class BillingModel extends CI_Model{

	
	function getMyShops($user_id){
		$this->db->select('shops.id,shops.name,shops.place');
		$this->db->from('roles');
		$this->db->join('shops', 'roles.shop_id = shops.id');
		$this->db->where('roles.user_id', $user_id);
		$this->db->where('roles.is_admin', true);
		$return = $this->db->get()->result_array();
		return $return;
	}
	
	function getOptionalItems($shop_id){
		return $this->db->get_where("optional_charges",array("shop_id"=>$shop_id))->result_array();
	}
	
	function getIcecreams($shop_id){
		return $this->db->get_where("icecreams",array("shop_id"=>$shop_id))->result_array();
	}
	
	function getToppings($shop_id){
		return $this->db->get_where("toppings",array("shop_id"=>$shop_id))->result_array();
	}
	
	function getCups($shop_id){
		return $this->db->get_where("cups",array("shop_id"=>$shop_id))->result_array();
	}
	

	function getExtraCharges($shop_id){
		return $this->db->get_where("extra_charges",array("shop_id"=>$shop_id))->result_array();
	}
	

}

?>