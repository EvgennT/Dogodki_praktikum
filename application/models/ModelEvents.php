<?php
class ModelEvents extends CI_Model
{
	function addEvent($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $opisDogodka)
	{
		$query = $this->db->query("INSERT INTO events (name, location, time_start, duration, description) 
				VALUES ('$imeDogodka', '$prostorDogodka', '$zacetekDogodka', '$trajanjeDogodka', '$opisDogodka')");
		
		
	}
	
}