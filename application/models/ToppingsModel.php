<?php 

class ToppingsModel extends CI_Model{

    function getAllToppings(){
		return $this->db->get("toppings")->result_array();
    }

}

?>