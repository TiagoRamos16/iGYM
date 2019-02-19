<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_admin');
		$this->load->view('Administrador/index');
		$this->load->view('templates/footer');
	}
}
