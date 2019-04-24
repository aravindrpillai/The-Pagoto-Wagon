<?php 

class IcecreamsModel extends CI_Model{

    function getAllIcecreams($shop_id){
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


	function addNewIcecream($data){
		$this->db->insert('icecreams', $data); 
		return true;
	}

	function updateIcecream($data){
		if(@$data["image"] != ""){
			$old_image_name = $this->db->get_where("icecreams",array("id"=>$data["icecream_id"]))->result_array()[0]["image"];
			unlink(realpath(APPPATH."/../assets/icecreams/".$old_image_name));
			$this->db->where('id', $data["icecream_id"]);
			$this->db->update('icecreams', array('name' => $data["name"],'price' => $data["price"],'image' => $data["image"],'description' => $data["description"]));
		} else {
			$this->db->where('id', $data["icecream_id"]);
			$this->db->update('icecreams', array('name' => $data["name"],'price' => $data["price"],'description' => $data["description"]));
		}
		return true;
	}

}

?>