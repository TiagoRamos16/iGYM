<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalTrainer extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Home'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/index');
		$this->load->view('templates/footer');
	}


	public function horario()
	{
		$data['title'] = 'Horario'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/horario');
		$this->load->view('templates/footer');
	}


}
