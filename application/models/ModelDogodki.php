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
	
	function getVseDogodke($idUporabnika)
	{
		//$query = $this->db->query("SELECT * FROM dogodki");
		
		$query = $this->db->query("SELECT dogodki.*, dogodki_prijava.id_uporabnika FROM dogodki LEFT JOIN dogodki_prijava ON dogodki_prijava.id_dogodka = dogodki.id 
				AND dogodki_prijava.id_uporabnika = '$idUporabnika' GROUP BY dogodki.id");
		
		
		return $query->result();
	}
	
	function prijavaNaDogodek($idUporabnika, $idDogodka)
	{
		$query = $this->db->query("INSERT INTO dogodki_prijava (id_uporabnika, id_dogodka) VALUES ('$idUporabnika', '$idDogodka')");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function odjavaIzDogodka($idUporabnika, $idDogodka)
	{
		$query = $this->db->query("DELETE FROM dogodki_prijava WHERE id_uporabnika= '$idUporabnika' AND id_dogodka = '$idDogodka'");
		
		//preverimo če smo uspešno izbrisali iz baze
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
}