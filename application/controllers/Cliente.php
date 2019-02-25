<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');
		$this->load->model('Exercicio_m');

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
		$data['listaExercicios'] = $this->Exercicio_m->queryExercicios();

		// verifica planos de exercicio existentes
		$data['listaPlanoTreino'] = $this->Exercicio_m->getPlanoTreino();

		//verifica cliente que pretende criar um novo plano de treino
		$utilizador = $this->session->userdata('sessao_utilizador');


		if($this->input->post('adicionar_ao_plano')){

			// id do plano de treino escolhido
			$idPlanoTreino = $this->input->post('plano_treino');

			// id do exercicio selecionado para adicionar a um plano
			$idExercicio_selecionado = $this->input->post('exercicio_selecionado');
							
			// apos ter id do plano de treino selecionado, seja novo ou existente vai inserir id do exercicios com o id do plano na BD
			$planoTreino_has_exercicio = array(
				"plano_treino_id" => $idPlanoTreino,
				"exercicio_id" => $idExercicio_selecionado
			);
			$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio);

		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/exercicios', $data);
		$this->load->view('templates/footer');
	}


	public function novo_plano($idExercicio = false)
	{

		$data['title'] = "Novo Plano Exercícios";

		if ($idExercicio == false){
			redirect('cliente/exercicios');
		}else{
			$data['exercicio'] = $idExercicio;
		}

		if($this->input->post('criar_plano')){

			//verifica cliente que pretende criar um novo plano de treino
			$utilizador = $this->session->userdata('sessao_utilizador');

			$nomePlanoTreino = $this->input->post('nome_plano');

			// array para inserir novo plano				
			$novoPlanoTreino = array(
				"nome" => $nomePlanoTreino,
				"cliente_admin_id" => $utilizador['id']
			);

			// insere novo plano na BD e seleciona id
			$idPlanoTreino = $this->Exercicio_m->criarPlanoTreino($novoPlanoTreino);

			// apos ter id do plano de treino selecionado, vai inserir id do exercicios com o id do plano na BD
			$planoTreino_has_exercicio = array(
				"plano_treino_id" => $idPlanoTreino,
				"exercicio_id" => $idExercicio
			);
			$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio);

		}



		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/novo_plano', $data);
		$this->load->view('templates/footer');
	}







}
