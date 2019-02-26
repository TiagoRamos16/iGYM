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

		$data['exercicio'] = $idExercicio;


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

			if ($idExercicio != false){
				// apos ter id do plano de treino selecionado, vai inserir id do exercicios com o id do plano na BD
				$planoTreino_has_exercicio = array(
					"plano_treino_id" => $idPlanoTreino,
					"exercicio_id" => $idExercicio
				);
				$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio);
			}

			$this->session->set_flashdata('sucessoTreino', 'Plano de Treino criado com sucesso'); //mensagem de sucesso
			redirect('cliente/novo_plano');
		}



		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/novo_plano', $data);
		$this->load->view('templates/footer');
	}


	public function treinos($idTreinoApagar = false)
	{
		$data['title'] = "Planos de Treinos";

		$data['listaPlanos'] = $this->Exercicio_m->dadosPlanoTreinoCompleto();
		$data['listaNomesPlanos'] = $this->Exercicio_m->dadosNomePlanoTreino();



		/*
		FALTA PROTEGER COM ID DE QUEM CRIOU PORQUE SO ELE PODE APAGAR
		*/




		if ($idTreinoApagar == true){
			$this->Exercicio_m->apagarPlanoTreino($idTreinoApagar);
			// redirect('cliente/treinos');
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/treinos',$data);
		$this->load->view('templates/footer');
	}


	public function plano_treino($idPlanoTreino = false)
	{
		$data['title'] = "Planos de Treino";

		if($idPlanoTreino == true){

			$data['exericiosExistentesPlano'] = $this->Exercicio_m->infoPlanoTreino($idPlanoTreino);

		}else{
			redirect('cliente/treinos');
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/plano_treino',$data);
		$this->load->view('templates/footer');
	}


	public function apagar_exercicio_plano_treino($id_exercicio_plano_treino = false)
	{
		$this->Exercicio_m->query_apagar_exercicio_plano_treino($id_exercicio_plano_treino);
		redirect('cliente/treinos');

	}







}
