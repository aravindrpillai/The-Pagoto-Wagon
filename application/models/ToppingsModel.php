<?php 

class ToppingsModel extends CI_Model{

    function getAllToppings($shop_id){
		return $this->db->get_where("toppings",array("shop_id"=>$shop_id))->result_array();
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
	
	function addNewTopping($data){
		$this->db->insert('toppings', $data); 
		return true;
	}

	function updateTopping($data){
		if(@$data["image"] != ""){
			$old_image_name = $this->db->get_where("toppings",array("id"=>$data["topping_id"]))->result_array()[0]["image"];
			unlink(realpath(APPPATH."/../assets/toppings/".$old_image_name));
			$this->db->where('id', $data["topping_id"]);
			$this->db->update('toppings', array('name' => $data["name"],'price' => $data["price"],'image' => $data["image"],'description' => $data["description"]));
		} else {
			$this->db->where('id', $data["topping_id"]);
			$this->db->update('toppings', array('name' => $data["name"],'price' => $data["price"],'description' => $data["description"]));
		}
		
		
		
		
		
		
		return true;
	}

}

?>