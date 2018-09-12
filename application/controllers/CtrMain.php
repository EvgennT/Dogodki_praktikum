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
		$this->load->library('Context');
		$Context = new Context();
		
		if ($Context->isLoggedIn()) //preveri če je uporabnik prijavljen, else odpre login stran
		{
			$this->load->database();
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			//shranimo v data array eventov
			$data['dogodki'] = $ModelDogodki->getVseDogodke();
			
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
		$this->load->view('login');
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
			$this->load->view('dodaj_dogodek');
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
			$this->load->database();
			$this->load->model('ModelDogodki');
			$ModelDogodki = new ModelDogodki();
			
			$imeDogodka = $this->input->post('imeDogodka');
			$prostorDogodka = $this->input->post('prostorDogodka');
			$zacetekDogodka = $this->input->post('zacetekDogodka');
			$trajanjeDogodka = $this->input->post('trajanjeDogodka');
			$opisDogodka = $this->input->post('opisDogodka');
			
			
			$result = $ModelDogodki->dodajDogodek($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $opisDogodka);
			
			
			/* $this->load->helper('url'); //za preusmerjanje na drugo stran
			 if($result) {
			 
			 } */
		} else {
			$this->load->helper('url');
			redirect($this->config->base_url()."CtrMain/login"); //odpre login
		}
		
	}
}
