<?php
class ModelUsers extends CI_Model 
{
	function getUsers()
	{
		$query = $this->db->query("SELECT * FROM users");
		
		return $query->result();
	}
	
	function getUser($email, $password)
	{
		$query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
		//$query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password");
		
		if ($query->num_rows() > 0) { //preveri če je sql ukaz našel zadetek
			return $query->result()[0]; //vrnemo prvi zadetek
		} else {
			return false;
		}
	}
	
	function getUserType($userId)
	{
		$query = $this->db->query("SELECT type FROM users WHERE id = '$userId'");
		
		$userType = 0;
		foreach ($query->result() as $user) {
			$userType = $user->type;
		}
		
		return $userType;
	}
}