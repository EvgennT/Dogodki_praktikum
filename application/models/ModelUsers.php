<?php
class ModelUsers extends CI_Model 
{
	function getUsers()
	{
		$query = $this->db->query("SELECT * FROM users");
		
		return $query->result();
	}
}