<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nutricionista extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_admin');
		$this->load->view('Nutricionista/index');
		$this->load->view('templates/footer');
	}
}
