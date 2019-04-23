<?php 

class IcecreamsModel extends CI_Model{

    function getAllToppings(){
		return $this->db->get("icecreams")->result_array();
    }

}

?>