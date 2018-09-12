<?php
class ModelUporabniki extends CI_Model 
{
	function getUporabniki()
	{
		$query = $this->db->query("SELECT * FROM uporabniki");
		
		return $query->result();
	}
	
	function getUporabnika($email, $geslo)
	{
		$query = $this->db->query("SELECT * FROM uporabniki WHERE email = '$email' AND geslo = '$geslo'");
		//$query = $this->db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password");
		
		if ($query->num_rows() > 0) { //preveri če je sql ukaz našel zadetek
			return $query->result()[0]; //vrnemo prvi zadetek
		} else {
			return false;
		}
	}
	
	function getTipUporabnika($userId)
	{
		$query = $this->db->query("SELECT tip FROM uporabniki WHERE id = '$userId'");
		
		$tipUporabnika = 0;
		foreach ($query->result() as $user) {
			$tipUporabnika= $user->tip;
		}
		
		return $tipUporabnika;
	}
}