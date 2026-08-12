<?php
class Api_model extends CI_Model
{
	function insert_api($data,$table)
	{
		$this->db->insert($table, $data);
		$insert_id=$this->db->insert_id(); //echo $this->db->last_query();die();
		return $insert_id;
	}
	
	

	
}

?>