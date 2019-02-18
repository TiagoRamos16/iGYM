<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		// $this->load->library('security');
	}


	public function login()
	{
			
		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/login');
		$this->load->view('templates/footer');

	}

	public function registo()
	{
		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo');
		$this->load->view('templates/footer');

	}

}
