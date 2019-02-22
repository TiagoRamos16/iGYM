<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');
		$this->load->model('Cliente_m');

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


	public function exercicios()
	{

		$data['title'] = "Exercicios";

		// envia dados dos exericios para menu cliente
		$data['listaExercicios'] = $this->Cliente_m->queryExercicios();

		// var_dump($data['listaExercicios']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/exercicios', $data);
		$this->load->view('templates/footer');
	}

	public function exercicioSelecionado($idExercicio)
	{

		$data['title'] = "Exercicios";
	
		// envia dados dos exericio selecionado
		$data['exercicioSelecionado'] = $this->Cliente_m->dadosExercicio($idExercicio);

		var_dump($data['exercicioSelecionado']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/exercicioSelecionado', $data);
		$this->load->view('templates/footer');
	}







}
