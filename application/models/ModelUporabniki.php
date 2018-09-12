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
	
	function getUporabnika2($idUporabnika)
	{
		$query = $this->db->query("SELECT * FROM uporabniki WHERE id = '$idUporabnika'");
		
		return $query->result()[0]; //vrnemo prvi zadetek
	}
	
	function uporabnikObstaja($email)
	{
		$query = $this->db->query("SELECT email FROM uporabniki WHERE email = '$email'");
		
		if ($query->num_rows() > 0) { //če našel zadetek obstaja
			return true;
		} else {
			return false;
		}
	}
	
	function registracija($ime, $priimek, $email, $geslo)
	{
		$query = $this->db->query("INSERT INTO uporabniki (ime, priimek, email, geslo, tip) VALUES ('$ime', '$priimek', '$email', '$geslo', '0')");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}