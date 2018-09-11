<?php
class ModelEvents extends CI_Model
{
	function addEvent($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $opisDogodka)
	{
		$query = $this->db->query("INSERT INTO events (name, location, time_start, duration, description) 
				VALUES ('$imeDogodka', '$prostorDogodka', '$zacetekDogodka', '$trajanjeDogodka', '$opisDogodka')");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function getEvents()
	{
		$query = $this->db->query("SELECT * FROM events");
		
		return $query->result();
	}
	
}