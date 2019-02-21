<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');

	}

	public function index()
	{
		$data['title'] = 'Home'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/index');
		$this->load->view('templates/footer');
	}


	public function trataAjaxCliente(){
		if($this->input->post('cc')){
            if($this->Utilizador_m->verificaCc($this->input->post('cc'))!=null){
                echo "1";
            }else{
                echo "0";
            }
        }else if($this->input->post('nif')){
			if($this->Utilizador_m->verificaNif($this->input->post('nif'))!=null){
                echo "1";
            }else{
                echo "0";
            }
		}
	}
}
