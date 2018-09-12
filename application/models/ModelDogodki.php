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
    
    function getDogodek($idDogodka)
    {
        $query = $this->db->query("SELECT * FROM dogodki WHERE id = '$idDogodka'");
        
        
        if ($query->num_rows() > 0) { //preveri če je sql ukaz našel zadetek
            return $query->result()[0];
        } else {
            return null;
        }
    }
    
    function getPrijavljeniNaDogodek($idDogodka)
    {
        $query = $this->db->query("SELECT dogodki_prijava.*, uporabniki.* FROM dogodki_prijava LEFT JOIN uporabniki ON uporabniki.id = dogodki_prijava.id_uporabnika WHERE id_dogodka = '$idDogodka'");
        
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