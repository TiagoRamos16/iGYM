<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/index');
		$this->load->view('templates/footer');
	}
}
