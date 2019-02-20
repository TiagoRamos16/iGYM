<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'iGYM';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navIndex');
		$this->load->view('index');
		$this->load->view('templates/footer');

	}
}
