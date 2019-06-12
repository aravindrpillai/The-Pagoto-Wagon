<?php 

class ShopsModel extends CI_Model{

    function saveNewShop($data){
		if(count($this->db->get_where('shops',array('name'=>$data['name'],'place'=>$data['place']))->result_array()) > 0 ){
			return false;	
		}else{
			$this->db->insert('shops', $data); 
			return true;
		}
    }

    function getAllShops(){
		return $this->db->get("shops")->result_array();
    }

	function updateShopStatus($shop_id){
		$is_active = $this->db->get_where('shops',array('id'=>$shop_id))	->result_array()[0]["is_open"];
		$this->db->where('id', $shop_id);
		$this->db->update('shops', array('is_open' => (!$is_active)));
		return true;
	}
	
	function updateShopData($data){
		$resp = $this->db->get_where('shops',array('name'=>$data['name'],'place'=>$data['place']))->result_array();
		if(count($resp) > 0 ){
			if($resp[0]['id'] != $data["shop_id"]){
				return false;
			}
		}
		$this->db->where('id', $data["shop_id"]);
		$this->db->update('shops', array('name' => $data['name'], 'place'=> $data['place'], 'start_date'=> $data['start_date']));
		return true;	
	}
}

?>