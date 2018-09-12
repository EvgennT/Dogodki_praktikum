<?php
class ModelDogodki extends CI_Model
{
	function dodajDogodek($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $opisDogodka)
	{
		$query = $this->db->query("INSERT INTO dogodki (ime, lokacija, zacetek, trajanje, opis) 
				VALUES ('$imeDogodka', '$prostorDogodka', '$zacetekDogodka', '$trajanjeDogodka', '$opisDogodka')");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function getVseDogodke()
	{
		$query = $this->db->query("SELECT * FROM dogodki");
		
		return $query->result();
	}
	
}