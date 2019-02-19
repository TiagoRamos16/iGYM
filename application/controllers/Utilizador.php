<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');
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

	public function registo_plano()
	{

		$data['plano'] = $this->Utilizador_m->queryPlanos();

		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo_plano', $data);
		$this->load->view('templates/footer');

	}

	public function registo($id=null)
	{

		$data['id_plano'] = $id;	// id enviado por url com o id do plano ecolhido

		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo', $data);
		$this->load->view('templates/footer');
	}

	public function registo_pagamento()
	{

		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo_pagamento');
		$this->load->view('templates/footer');

	}

}
