<?php
class ModelDogodki extends CI_Model
{
	function dodajDogodek($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $terminDogodka, $minUdelezencev, $maxUdelezencev, $opisDogodka)
	{
		$query = $this->db->query("INSERT INTO dogodki (ime, lokacija, zacetek, trajanje, termin, min_udelezencev, max_udelezencev, opis) 
				VALUES ('$imeDogodka', '$prostorDogodka', '$zacetekDogodka', '$trajanjeDogodka', '$terminDogodka', '$minUdelezencev', '$maxUdelezencev', '$opisDogodka')");
		
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
		
		//izberemo vse iz tabele dogodkov, z left join pridobimo id_iporabnika iz dogodki_prijava, GROUP BY nam grupira dogodke, ker drugače bi se laghko eden večkrat ponovil v primeru da je našel iz dogodki_prijava večkrat isti id_uporabnika in id_dogodka
		$query = $this->db->query("SELECT dogodki.*, dogodki_prijava.id_uporabnika FROM dogodki LEFT JOIN dogodki_prijava ON dogodki_prijava.id_dogodka = dogodki.id 
				AND dogodki_prijava.id_uporabnika = '$idUporabnika' GROUP BY dogodki.id");
		
		
		return $query->result();
	}
	
	function getPrihodnjeDogodke($idUporabnika)
	{
		$trenutniCasTimestamp = time(); //dobimo unix timestamp in ga primerjamo če je manjši timestamp trajanja dogodka - pomeni da še dogodek ni bil končan
		// AND dogodki.trajanje < 1 GROUP BY dogodki.id
		$query = $this->db->query("SELECT dogodki.*, dogodki_prijava.id_uporabnika FROM dogodki LEFT JOIN dogodki_prijava ON dogodki_prijava.id_dogodka = dogodki.id
				AND dogodki_prijava.id_uporabnika = '$idUporabnika' WHERE dogodki.trajanje > $trenutniCasTimestamp GROUP BY dogodki.id");
		
		
		return $query->result();
	}
	
	function getPretekleDogodke($idUporabnika)
	{
		$trenutniCasTimestamp = time(); //dobimo unix timestamp in ga primerjamo če je večji timestamp trajanja dogodka
		$query = $this->db->query("SELECT dogodki.*, dogodki_prijava.id_uporabnika FROM dogodki LEFT JOIN dogodki_prijava ON dogodki_prijava.id_dogodka = dogodki.id
				AND dogodki_prijava.id_uporabnika = '$idUporabnika' WHERE dogodki.trajanje < $trenutniCasTimestamp GROUP BY dogodki.id");
		
		
		return $query->result();
	}
	
	function getDogodek($idDogodka, $idUporabnika)
	{
		//$query = $this->db->query("SELECT * FROM dogodki WHERE id = '$idDogodka'");
		
		//dogodki_prijava.prisotnost potrebujemo da lahko preverimo če se je ta uporabnik udeležil dogodka da ga potem tudi oceni
		$query = $this->db->query("SELECT dogodki.*, dogodki_prijava.id_uporabnika, dogodki_prijava.prisotnost FROM dogodki LEFT JOIN dogodki_prijava ON dogodki_prijava.id_dogodka = dogodki.id
				AND dogodki_prijava.id_uporabnika = '$idUporabnika' WHERE dogodki.id = '$idDogodka'"); //left joinamo tabelo dogodki_prijava da lahko vidimo če je trenutni uporabnik prijavljen na dogodek
		
		
		if ($query->num_rows() > 0) { //preveri če je sql ukaz našel zadetek
			return $query->result()[0];
		} else {
			return null;
		}
	}
	
	function getDogodekOcene($idDogodka)
	{
		$query = $this->db->query("SELECT ocena FROM dogodki_prijava WHERE prisotnost = 'Y' AND id_dogodka = '$idDogodka' AND ocena != 0"); //!= 0 zato ker se privzeto nastavi ocena na 0 v bazi, in da ne šteje teh potem več
		
		return $query->result(); //vrnemo seznam ocen, tudi če je prazen in izračunamo povprečno oceno v kontrolerju
	}
	
	function getPrijavljeniNaDogodek($idDogodka)
	{
		$query = $this->db->query("SELECT dogodki_prijava.*, uporabniki.* FROM dogodki_prijava LEFT JOIN uporabniki ON uporabniki.id = dogodki_prijava.id_uporabnika WHERE id_dogodka = '$idDogodka'");
		
		return $query->result();
	}
	
	function prijavaNaDogodek($idUporabnika, $idDogodka)
	{
		$query = $this->db->query("INSERT INTO dogodki_prijava (id_uporabnika, id_dogodka, prisotnost) VALUES ('$idUporabnika', '$idDogodka', 'N')");
		
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
	
	
	function urediDogodek($idDogodka, $imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $terminDogodka, $minUdelezencev, $maxUdelezencev, $opisDogodka)
	{
		$query = $this->db->query("UPDATE dogodki SET ime = '$imeDogodka', lokacija = '$prostorDogodka', zacetek = '$zacetekDogodka', trajanje = '$trajanjeDogodka', termin = '$terminDogodka', min_udelezencev = '$minUdelezencev', max_udelezencev = '$maxUdelezencev', opis = '$opisDogodka' WHERE id = '$idDogodka'");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	
	function izbrisiDogodek($idDogodka)
	{
		$query = $this->db->query("DELETE FROM dogodki WHERE id = '$idDogodka'");
		
		//preverimo če smo uspešno izbrisali iz baze
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function potrdiPrisotnost($idDogodka, $idUporabnika)
	{
		$query = $this->db->query("UPDATE dogodki_prijava SET prisotnost = 'Y' WHERE id_uporabnika = '$idUporabnika' AND id_dogodka = '$idDogodka'");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function odpotrdiPrisotnost($idDogodka, $idUporabnika)
	{
		$query = $this->db->query("UPDATE dogodki_prijava SET prisotnost = 'N' WHERE id_uporabnika = '$idUporabnika' AND id_dogodka = '$idDogodka'");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
	function oceniDogodek($idDogodka, $ocenaDogodka, $idUporabnika)
	{
		$query = $this->db->query("UPDATE dogodki_prijava SET ocena = '$ocenaDogodka' WHERE id_uporabnika = '$idUporabnika' AND id_dogodka = '$idDogodka'");
		
		//preverimo če smo uspešno dodali v bazo
		if($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	
}