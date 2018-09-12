<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrMain extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$this->load->database();
		$this->load->library('Context');
		$Context = new Context();
		
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			$idUporabnika = $Context->getIdUporabnika();
			
			//shranimo v data array eventov
			//$data['dogodki'] = $ModelDogodki->getVseDogodke($idUporabnika);
			$data['dogodkiPrihodnji'] = $ModelDogodki->getPrihodnjeDogodke($idUporabnika);
			
			
			
			$dogodkiPretekli = $ModelDogodki->getPretekleDogodke($idUporabnika);
			
			foreach ($dogodkiPretekli as $dogodek) //gremo skozi dogodke in vsakemu dogodku pridobimo oceno
			{
				$idDogodka = $dogodek->id;
				
				$dogodekOcene = $ModelDogodki->getDogodekOcene($idDogodka);
				
				$ocena = 0;
				$i = 0;
				foreach ($dogodekOcene as $dogodekOcena)
				{
					$i++;
					
					$ocena = $ocena + $dogodekOcena->ocena;
				}
				
				if($i != 0)
				{
					$ocena = $ocena / $i; //zračunamo povprečno oceno
				}
				
				if($ocena == 0)
				{
					$ocena = "/";
				}
				
				$dogodek->ocena = $ocena;
				
			}
			
			$data['dogodkiPretekli'] = $dogodkiPretekli;
			
			
			
			
			//shranimo v data tip uporabnika (0 = navaden uporabnik, 1 = admin)
			$data['tipUporabnika'] = $Context->getTipUporabnika();
			
			//var_dump($allUsers);
			
			
			//array data ki ima evente in tip uporabnika, omogočimo dostop do teh podatkov v main_page
			$this->load->view('main_page', $data);
		} else {
			$this->load->helper('url'); 
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
	}
	
	public function login()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, potem ga preusmeri na glavno stran
		{
			$this->load->helper('url'); 
			redirect($this->config->base_url()."CtrMain"); //odpre login
		} else {
			$this->load->view('login');
		}
	}
	
	public function dogodek($idDogodka)
	{
		$this->load->database();
		$this->load->library('Context');
		$Context = new Context();
		
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			$idUporabnika = $Context->getIdUporabnika();
			$data['dogodek'] = $ModelDogodki->getDogodek($idDogodka, $idUporabnika); //informacije o dogodku
			
			$data['prijavljeniNaDogodek'] = $ModelDogodki->getPrijavljeniNaDogodek($idDogodka); //seznam vseh prijavlenih za ta dogodek
			
			$data['tipUporabnika'] = $Context->getTipUporabnika();
			//var_dump($data['dogodek']);
			
			
			$dogodekOcene = $ModelDogodki->getDogodekOcene($idDogodka);
			
			
			//var_dump($dogodekOcene);
			
			$ocena = 0;
			
			$i = 0;
			foreach ($dogodekOcene as $dogodekOcena) 
			{
				$i++;
				
				$ocena = $ocena + $dogodekOcena->ocena;
			}
			
			if($i != 0)
			{
				$ocena = $ocena / $i; //zračunamo povprečno oceno
			}
			
			if($ocena == 0)
			{
				$ocena = "/";
			}
			
			$data['ocena'] = $ocena;
			
			$this->load->view('dogodek', $data);
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function login_perform()
	{
		$this->load->database();
		$this->load->library('Context');
		$Context = new Context();
		
		$email = $this->input->post('email');
		$geslo = $this->input->post('geslo');
		
		$login = $Context->login($email, $geslo);
		
		if($login) {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/index");
		} else {
			echo "Neuspešna prijava.";
		}
	}
	
	
	//odpre stran za dodajanje dogodka
	public function dodaj_dogodek()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->view('dodaj_dogodek');
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
	}
	
	//preko modela ModelDogodki doda v bazo dogodek
	public function dodaj_dogodek_perform()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$imeDogodka = $this->input->post('imeDogodka');
				$prostorDogodka = $this->input->post('prostorDogodka');
				$zacetekDogodka = $this->input->post('zacetekDogodka');
				$opisDogodka = $this->input->post('opisDogodka');
				$minUdelezencev = $this->input->post('minUdelezencev');
				$maxUdelezencev = $this->input->post('maxUdelezencev');
				
				
				//strtotime nam pretvori datum iz stringa v število (unix timestamp)
				
				$zacetekDogodka = $this->input->post('zacetekDogodka');
				$zacetekDogodkaTimestamp = strtotime($zacetekDogodka);
				
				$trajanjeDogodka = $this->input->post('trajanjeDogodka');
				$trajanjeDogodkaTimestamp = strtotime($trajanjeDogodka);
				
				$terminDogodka = $this->input->post('terminDogodka');
				$terminDogodkaTimestamp = strtotime($terminDogodka);
				
				
				$result = $ModelDogodki->dodajDogodek($imeDogodka, $prostorDogodka, $zacetekDogodkaTimestamp, $trajanjeDogodkaTimestamp, $terminDogodkaTimestamp, $minUdelezencev, $maxUdelezencev, $opisDogodka);
				
				$this->mail_novi_dogodek($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $terminDogodka, $minUdelezencev, $maxUdelezencev, $opisDogodka);
				
				echo $result;
				/* $this->load->helper('url'); //za preusmerjanje na drugo stran
				 if($result) {
				 
				 } */
			} else {
				$this->load->helper('url');
			 	redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function prijava_na_dogodek()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			$this->load->database();
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			$idDogodka = $this->input->post('idDogodka');
			$idUporabnika = $Context->getIdUporabnika();
			
			
			$dogodek = $ModelDogodki->getDogodek($idDogodka, $idUporabnika);
			$trenutniCasTimestamp = time();
			if($dogodek->termin > $trenutniCasTimestamp) //če je timestamp trenutnega časa manjši od timestampa termina prijave/odjave pomeni da se še vedno lahko prijavimo/odjavimo
			{
				$this->mail_prijava_na_dogodek($idUporabnika, $dogodek);
				$result = $ModelDogodki->prijavaNaDogodek($idUporabnika, $idDogodka);
			}
			
			echo $result;
			
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function odjava_iz_dogodka()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			$this->load->database();
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			$idDogodka = $this->input->post('idDogodka');
			$idUporabnika = $Context->getIdUporabnika();
			
			
			$dogodek = $ModelDogodki->getDogodek($idDogodka, $idUporabnika);
			$trenutniCasTimestamp = time();
			if($dogodek->termin > $trenutniCasTimestamp) //če je timestamp trenutnega časa manjši od timestampa termina prijave/odjave pomeni da se še vedno lahko prijavimo/odjavimo
			{
				$this->mail_odjava_iz_dogodek($idUporabnika, $dogodek);
				$result = $ModelDogodki->odjavaIzDogodka($idUporabnika, $idDogodka);
			}
			
			
			echo $result;
			
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function odjava_uporabnika()
	{
		$this->load->library('Context');
		$this->load->helper('url');
		$Context = new Context();
		$this->load->database();
		
		$Context->odjavaUporabnika();
		redirect($this->config->base_url()."CtrMain/login"); //odpre login
	}
	
	
	
	public function uredi_dogodek($idDogodka)
	{
		$this->load->database();
		$this->load->library('Context');
		$Context = new Context();
		
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$idUporabnika = $Context->getIdUporabnika();
				$data['dogodek'] = $ModelDogodki->getDogodek($idDogodka, $idUporabnika); //informacije o dogodku
				
				$data['tipUporabnika'] = $Context->getTipUporabnika();
				
				$this->load->view('uredi_dogodek', $data);
			} 
			else 
			{
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function uredi_dogodek_perform()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$idDogodka = $this->input->post('idDogodka');
				$imeDogodka = $this->input->post('imeDogodka');
				$prostorDogodka = $this->input->post('prostorDogodka');
				$zacetekDogodka = $this->input->post('zacetekDogodka');
				$opisDogodka = $this->input->post('opisDogodka');
				$minUdelezencev = $this->input->post('minUdelezencev');
				$maxUdelezencev = $this->input->post('maxUdelezencev');
				
				
				//strtotime nam pretvori datum iz stringa v število (unix timestamp)
				
				$zacetekDogodka = $this->input->post('zacetekDogodka');
				$zacetekDogodka = strtotime($zacetekDogodka);
				
				$trajanjeDogodka = $this->input->post('trajanjeDogodka');
				$trajanjeDogodka = strtotime($trajanjeDogodka);
				
				$terminDogodka = $this->input->post('terminDogodka');
				$terminDogodka = strtotime($terminDogodka);
				
				//echo $idDogodka;
				
				$result = $ModelDogodki->urediDogodek($idDogodka, $imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $terminDogodka, $minUdelezencev, $maxUdelezencev, $opisDogodka);
				
				echo $result;
				/* $this->load->helper('url'); //za preusmerjanje na drugo stran
				 if($result) {
				 
				 } */
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function izbrisi_dogodek_perform()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$idDogodka = $this->input->post('idDogodka');
				
				$result = $ModelDogodki->izbrisiDogodek($idDogodka);
				
				echo $result;
				/* $this->load->helper('url'); //za preusmerjanje na drugo stran
				 if($result) {
				 
				 } */
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
	
	public function potrdi_prisotnost()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$idUporabnika = $this->input->post('idUporabnika');
				$idDogodka = $this->input->post('idDogodka');
				
				$result = $ModelDogodki->potrdiPrisotnost($idDogodka, $idUporabnika);
				
				echo $result;
				
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
	}
	
	public function odpotrdi_prisotnost()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$idUporabnika = $this->input->post('idUporabnika');
				$idDogodka = $this->input->post('idDogodka');
				
				$result = $ModelDogodki->odpotrdiPrisotnost($idDogodka, $idUporabnika);
				
				echo $result;
				
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
	}
	
	public function mail_novi_dogodek($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $terminDogodka, $minUdelezencev, $maxUdelezencev, $opisDogodka) {
		
		$this->load->database();
		$this->load->model('ModelUporabniki');
		$ModelUporabniki = new ModelUporabniki();
		
		$vsiUporabniki = $ModelUporabniki->getUporabniki(); //dobimo vse uporabnike za poslat mail
		
		
		/*
		 https://stackoverflow.com/questions/18586801/send-email-by-using-codeigniter-library-via-localhost
		 https://www.codexworld.com/codeigniter-send-email-gmail-smtp-server/
		 */
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_timeout' => '30',
				'smtp_user' => 'lalalala@gmail.com', // change it to yours
				'smtp_pass' => 'lalalalalalalala', // change it to yours
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => '\r\n'
				);
		
		$this->load->library('email', $config);
		foreach ($vsiUporabniki as $uporabnik)
		{
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			
			$this->email->from('lalalala@gmail.com'); // change it to yours
			$this->email->to($uporabnik->email);// change it to yours
			$this->email->subject("Novi dogodek ".$imeDogodka);
			
			$message = "Pozdravljeni $uporabnik->ime, obveščamo vas da je objavljen novi dogodek <b>$imeDogodka</b>.
			<br/>
			<br/>
			Prostor dogodka: <b>$prostorDogodka</b>
			<br/>
			Zacetek dogodka: <b>$zacetekDogodka</b>
			<br/>
			Trajanje dogodka: <b>$trajanjeDogodka</b>
			<br/>
			Termin prijave dogodka: <b>$terminDogodka</b>
			<br/>
			Min. št. udeležencev dogodka: <b>$minUdelezencev</b>
			<br/>
			Max. št. udeležencev dogodka: <b>$maxUdelezencev</b>
			<br/>
			Opis dogodka: <b>$opisDogodka</b>
			<br/>
			";
			
			$this->email->message($message);
			
			$this->email->send();
		}
		
		
		
		/* 
		if($this->email->send())
		{
			echo 'Email sent.';
		}
		else
		{
			show_error($this->email->print_debugger());
		} 
		*/
	}
	
	public function mail_prijava_na_dogodek($idUporabnika, $dogodek) {
		
		$this->load->database();
		$this->load->model('ModelUporabniki');
		$ModelUporabniki = new ModelUporabniki();
		
		$uporabnik = $ModelUporabniki->getUporabnika2($idUporabnika);
		
		/*
		 https://stackoverflow.com/questions/18586801/send-email-by-using-codeigniter-library-via-localhost
		 https://www.codexworld.com/codeigniter-send-email-gmail-smtp-server/
		 */
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_timeout' => '30',
				'smtp_user' => 'lalalala@gmail.com', // change it to yours
				'smtp_pass' => 'lalalala', // change it to yours
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => '\r\n'
				);
		
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		
		$this->email->from('lalalala@gmail.com'); // change it to yours
		$this->email->to($uporabnik->email); // change it to yours
		$this->email->subject("Prijava na dogodek ".$dogodek->ime);
		
		$message = "Pozdravljeni $uporabnik->ime, obveščamo vas da ste se prijavili na dogodek <b>$dogodek->ime</b>.";
		
		$this->email->message($message);
		
		$this->email->send();
		
		
		
		/*
		 if($this->email->send())
		 {
		 echo 'Email sent.';
		 }
		 else
		 {
		 show_error($this->email->print_debugger());
		 }
		 */
	}
	
	public function mail_odjava_iz_dogodek($idUporabnika, $dogodek) {
		
		$this->load->database();
		$this->load->model('ModelUporabniki');
		$ModelUporabniki = new ModelUporabniki();
		
		$uporabnik = $ModelUporabniki->getUporabnika2($idUporabnika);
		
		/*
		 https://stackoverflow.com/questions/18586801/send-email-by-using-codeigniter-library-via-localhost
		 https://www.codexworld.com/codeigniter-send-email-gmail-smtp-server/
		 */
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_timeout' => '30',
				'smtp_user' => 'lalalala@gmail.com', // change it to yours
				'smtp_pass' => 'lalalalalalalala', // change it to yours
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => '\r\n'
				);
		
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		
		$this->email->from('lalalala@gmail.com'); // change it to yours
		$this->email->to($uporabnik->email); // change it to yours
		$this->email->subject("Odjava od dogodeka ".$dogodek->ime);
		
		$message = "Pozdravljeni $uporabnik->ime, obveščamo vas da ste se odjavili od dogodka <b>$dogodek->ime</b>.";
		
		$this->email->message($message);
		
		$this->email->send();
		
		
		
		/*
		 if($this->email->send())
		 {
		 echo 'Email sent.';
		 }
		 else
		 {
		 show_error($this->email->print_debugger());
		 }
		 */
	}
	
	public function registracija()
	{
		$this->load->view('registracija');
	}
	
	
	public function registracija_perform()
	{
		$this->load->database();
		$this->load->model('ModelUporabniki');
		$ModelUporabniki = new ModelUporabniki();
		
		$ime  = $this->input->post('ime');
		$priimek = $this->input->post('priimek');
		$email = $this->input->post('email');
		$emailPonovno = $this->input->post('emailPonovno');
		$geslo = $this->input->post('geslo');
		$gesloPonovno = $this->input->post('gesloPonovno');
		
		
		$uporabnikObstaja = $ModelUporabniki->uporabnikObstaja($email); //preverimo če email v bazi že obstaja da se ne more registrirati večkrat
		
		if($email != $emailPonovno)
		{
			$result ="email";
		}
		else if($geslo != $gesloPonovno)
		{
			$result = "geslo";
		}
		else if($uporabnikObstaja) 
		{
			$result = "obstaja";
		}
		else 
		{
			$result = $ModelUporabniki->registracija($ime, $priimek, $email, $geslo);
		}
		
		
		echo $result;
		
	}
	
	public function oceni_dogodek()
	{
		$this->load->library('Context');
		$Context = new Context();
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran
			{
				$this->load->database();
				$this->load->model('ModelDogodki');
				$ModelDogodki = new ModelDogodki();
				
				$ocenaDogodka = $this->input->post('ocenaDogodka');
				$idDogodka = $this->input->post('idDogodka');
				$idUporabnika = $Context->getIdUporabnika();
				
				$result = $ModelDogodki->oceniDogodek($idDogodka, $ocenaDogodka, $idUporabnika);
				
				echo $result;
				
			} else {
				$this->load->helper('url');
				redirect($this->config->base_url()."CtrMain");
			}
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
	}
	
	
} public function nalozi_sliko()
	{
		$this->load->library('Context');

		$Context = new Context();

		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran

		{
			if($Context->getTipUporabnika() == 1) //preveri če je uporabnik organizator, drugače preusmeri na glavno stran

			{
				//vzeto iz https://www.w3schools.com/php/php_file_upload.asp

				$retultat = "";
				$target_dir = "slike/";

				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

				$uploadOk = 1;

				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image

				if(isset($_POST["submit"])) {

					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

					if($check !== false) {

						//echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						$retultat = $retultat."Izbrana datoteka ni slika.";
						$uploadOk = 0;
					}
				}

				// Check if file already exists

				if (file_exists($target_file)) {

					$retultat = $retultat."Izbrana slika že obstaja.";

					$uploadOk = 0;

				}

				// Check file size

				if ($_FILES["fileToUpload"]["size"] > 500000) {

					$retultat = $retultat."Slika je prevelika.";

					$uploadOk = 0;

				}

				// Allow certain file formats

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

					$retultat = $retultat."Dovoljene so slike s končnico JPG, JPEG, PNG in GIF.";

					$uploadOk = 0;

				}

				// Check if $uploadOk is set to 0 by an error

				if ($uploadOk == 0) {

					$retultat = $retultat."Oprostite, slika ni naložena.";

					// if everything is ok, try to upload file

				} else {

					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

						$retultat = $retultat."Slika ". basename( $_FILES["fileToUpload"]["name"]). " je uspešno naložena.";

						$this->load->database();

						$this->load->model('ModelDogodki');

						$ModelDogodki = new ModelDogodki();

						$idDogodka = $this->input->post('idDogodkaSlika');

						$imeSlike = basename( $_FILES["fileToUpload"]["name"]);

						$result = $ModelDogodki->dodajSlikoDogodku($idDogodka, $imeSlike);

						$data['slika'] = $imeSlike;

					} else {

						$retultat = $retultat."Oprostite, pri nalaganju slike je prišlo do napake.";
					}
				}
				$data['rezultat'] = $retultat;

				

				

				$this->load->view('nalozi_sliko', $data);

				

			} else {

				$this->load->helper('url');

				redirect($this->config->base_url()."CtrMain");

			}

		} else {

			$this->load->helper('url');

			redirect($this->config->base_url()."CtrMain/login"); //odpre login

		}

	}

	

}