<?php 

class CupsModel extends CI_Model{

    function getAllCups($shop_id){
		return $this->db->get_where("cups",array("shop_id"=>$shop_id))->result_array();
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
	
	function addNewCup($data){
		$this->db->insert('cups', $data); 
		return true;
	}

	function updateCup($data){
		if(@$data["image"] != ""){
			$old_image_name = $this->db->get_where("cups",array("id"=>$data["cup_id"]))->result_array()[0]["image"];
			unlink(realpath(APPPATH."/../assets/cups/".$old_image_name));
			$this->db->where('id', $data["cup_id"]);
			$this->db->update('cups', array('name' => $data["name"],'price' => $data["price"],'image' => $data["image"],'description' => $data["description"]));
		} else {
			$this->db->where('id', $data["cup_id"]);
			$this->db->update('cups', array('name' => $data["name"],'price' => $data["price"],'description' => $data["description"]));
		}
		return true;
	}

}

?>