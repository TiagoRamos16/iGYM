<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilizador extends CI_Controller {

	public function __construct()
	{
<<<<<<< HEAD
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		// $this->load->library('security');
	}

=======
	/*call CodeIgniter's default Constructor*/
    parent::__construct();
    
	// $this->load->model('automovel_m');
 	$this->load->library('session'); 	// -------> com isto iniciamos a biblioteca para pudermos utilizar sessões <--------
 	$this->load->library('form_validation'); // -------> com isto iniciamos a biblioteca para pudermos validar os form <--------
 	$this->load->helper('security'); // -------> com isto iniciamos a biblioteca para pudermos validar nos form o XSS-clean <--------
    }

	// public function view($page = 'home')
	// {
	// 		if ( ! file_exists(APPPATH.'views/Utilizador/'.$page.'.php'))
	// 		{
	// 				// Whoops, we don't have a page for that!
	// 				show_404();
	// 		}
	
	// 		$data['title'] = ucfirst($page); // Capitalize the first letter
	
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('Utilizador/'.$page, $data);
	// 		$this->load->view('templates/footer', $data);
	// }
>>>>>>> c55fc9624cd8502eba008d4e8c40cec8ecd65ce8

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
