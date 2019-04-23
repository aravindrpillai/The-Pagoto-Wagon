<?php 

class RolesModel extends CI_Model{

	function getAllShops(){
		$this->db->select("id,name,place");
		$return = $this->db->get("shops")->result_array();
		return $return;
	}

	function getAllEmployees($shop_id=null){
		$this->db->select("id,name,employee_id");
		$users = $this->db->get_where("users", array("retired"=>false,"is_master"=>false))->result_array();
		foreach($users as $key=>$user){
			$count = $this->db->get_where('roles', array('user_id' => $user["id"], "shop_id"=>$shop_id))->num_rows();
			if ($count > 0) {
				unset($users[$key]);
			}
		}
		return $users;
	}

	function getRolesOfShop($id){
		$this->db->select('roles.id,roles.shop_id,roles.is_admin,roles.is_biller,users.dp,users.name,users.employee_id,users.mobile_number');
		$this->db->from('roles');
		$this->db->join('users', 'roles.user_id = users.id');
		$this->db->where('roles.shop_id', $id);
		$return = $this->db->get()->result_array();
		return $return;
	}

	function addNewRole($data){
		if(count($this->db->get_where('roles',array('user_id'=>$data['user_id'],'shop_id'=>$data['shop_id']))->result_array()) > 0 ){
			return false;	
		}else{
			$this->db->insert('roles', $data); 
			return true;
		}
	}
	
	function deleteRole($role_id){
		$this->db-> where('id', $role_id);
		$this->db-> delete('roles');
	}
	
	
	function updateRole($is_biller, $is_admin, $role_id){
		if($is_biller){
			$is_biller = $this->db->get_where('roles',array('id'=>$role_id))->result_array()[0]["is_biller"];
			$this->db->where('id', $role_id);
			$this->db->update('roles', array('is_biller' => (!$is_biller)));
		} else {
			$is_admin = $this->db->get_where('roles',array('id'=>$role_id))->result_array()[0]["is_admin"];
			$this->db->where('id', $role_id);
			$this->db->update('roles', array('is_admin' => (!$is_admin)));
		}
		return true;
	}

}

?>