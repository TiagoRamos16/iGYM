<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

	public function login()
	{
		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/login');
		$this->load->view('templates/footer');

	}
}
