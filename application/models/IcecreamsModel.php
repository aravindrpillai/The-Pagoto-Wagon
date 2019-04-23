<?php 

class IcecreamsModel extends CI_Model{

    function getAllToppings($shop_id){
		return $this->db->get_where("icecreams",array("shop_id"=>$shop_id))->result_array();
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


}

?>