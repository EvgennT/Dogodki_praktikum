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
		$this->load->model('ModelUsers');
		$modelUsers = new ModelUsers();
		
		$allUsers = $modelUsers->getUsers();
		
		//var_dump($allUsers);
		
		
		$this->load->view('main_page');
	}
	
	
	//odpre stran za dodajanje dogodka
	public function add_event()
	{
		
		$this->load->view('add_event');
	}
	
	//preko modela ModelEvents doda v bazo dogodek
	public function add_event_perform()
	{
		$this->load->database();
		$this->load->model('ModelEvents');
		$modelEvents = new ModelEvents();
		
		$imeDogodka = $this->input->post('imeDogodka');
		$prostorDogodka = $this->input->post('prostorDogodka');
		$zacetekDogodka = $this->input->post('zacetekDogodka');
		$trajanjeDogodka = $this->input->post('trajanjeDogodka');
		$opisDogodka = $this->input->post('opisDogodka');
		

		$modelEvents->addEvent($imeDogodka, $prostorDogodka, $zacetekDogodka, $trajanjeDogodka, $opisDogodka);
		
		
		
	}
}
