<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');
		$this->load->model('Exercicio_m');
		$this->load->model('Aula_m');


		if ($this->session->userdata('sessao_utilizador') == null) {
			$this->session->set_flashdata('erroPT', 'Não tem permissao de aceder a esta página '); //mensagem de erro
			redirect('', 'refresh');
		} else {
			if (($this->session->userdata('sessao_utilizador')['tipo']) != 5) {
				$this->session->set_flashdata('erroPT', 'Não tem permissao de aceder a esta página '); //mensagem de erro
				redirect('', 'refresh');
			} else if (($this->session->userdata('sessao_utilizador')['estado']) != 1) {
				$this->session->set_flashdata('erroPT', 'Sua conta não esta activa'); //mensagem de erro
				redirect('', 'refresh');
			}
		}

	}

	public function index()
	{
		$data['title'] = 'Home';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/index');
		$this->load->view('templates/footer');
	}

	public function trataAjaxCliente()
	{
		if ($this->input->post('cc')) {
			if ($this->Utilizador_m->verificaCc($this->input->post('cc')) != null) {
				echo "1";
			} else {
				echo "0";
			}
		} elseif ($this->input->post('nif')) {
			if ($this->Utilizador_m->verificaNif($this->input->post('nif')) != null) {
				echo "1";
			} else {
				echo "0";
			}
		}
	}

	public function mensagens()
	{
		$data['title'] = 'Mensagens';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('utilizador/mensagens', $data);
		$this->load->view('templates/footer');
	}


	public function paginaPerfil()
	{
		$data['title'] = 'Perfil Pessoal';

		$utilizador = $this->session->userdata('sessao_utilizador');

		$data['utilizador'] = $this->Utilizador_m->obterUtilizador($utilizador['id']);
		$data['funcionario'] = $this->Utilizador_m->obterCliente($utilizador['id']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('utilizador/paginaPerfil', $data);
		$this->load->view('templates/footer');
	}


	public function exercicios()
	{

		$data['title'] = "Exercicios";

		// verifica valores da dificuldade para campo pesquisa
		$data['listaDificuldade'] = $this->Exercicio_m->getDificuldade();

		// verifica valores da dificuldade para campo pesquisa
		$data['listaTipo_exercicio'] = $this->Exercicio_m->getTipo_exercicio();

		$search = $this->security->xss_clean($this->input->post('search'));
		$pesquisaTipoExercicio = $this->security->xss_clean($this->input->post('pesquisaTipoExercicio'));
		$pesquisaDificuldade = $this->security->xss_clean($this->input->post('pesquisaDificuldade'));

		// envia dados dos exericios para menu cliente
		$data['listaExercicios'] = $this->Exercicio_m->queryExercicios($search, $pesquisaTipoExercicio, $pesquisaDificuldade);

		// verifica planos de exercicio existentes para modal adicionar exercicio a um plano
		$data['listaPlanoTreino'] = $this->Exercicio_m->getPlanoTreino();

		//verifica cliente que pretende criar um novo plano de treino
		$utilizador = $this->session->userdata('sessao_utilizador');

		if (($this->input->post('adicionar_ao_plano')) && ($this->input->post('plano_treino') == null)) {

			$this->session->set_flashdata('erroPlanoTreino', 'Tem de selecionar um plano de treino ou criar um novo.'); //mensagem de erro
			// redirect('cliente/novo_plano');
			// redirect($_SERVER['HTTP_REFERER']);

		}


		if (($this->input->post('adicionar_ao_plano')) && ($this->input->post('plano_treino') != null)) {

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

		$this->form_validation->set_rules(
			'nome_plano',
			'Nome',
			'trim|required|is_unique[plano_treino.nome]|max_length[40]',
			array('required' => 'Tem de preencher o %s.', 'max_length' => 'O comprimento máximo é de 40 caracteres', 'is_unique' => 'Já existe um plano de treino com este %s')
		);


		if (($this->form_validation->run() == true) && ($this->input->post('criar_plano'))) {


				//verifica cliente que pretende criar um novo plano de treino
			$utilizador = $this->session->userdata('sessao_utilizador');

			$nomePlanoTreino = $this->security->xss_clean($this->input->post("nome_plano"));
	
				// array para inserir novo plano				
			$novoPlanoTreino = array(
				"nome" => $nomePlanoTreino,
				"cliente_admin_id" => $utilizador['id'],
				"pt_estado" => "ativo",
				"pt_data" => date("Y-m-d")
			);
	
				// insere novo plano na BD e seleciona id
			$idPlanoTreino = $this->Exercicio_m->criarPlanoTreino($novoPlanoTreino);

			if ($idExercicio != false) {
					// apos ter id do plano de treino selecionado, vai inserir id do exercicios com o id do plano na BD
				$planoTreino_has_exercicio = array(
					"plano_treino_id" => $idPlanoTreino,
					"exercicio_id" => $idExercicio
				);
				$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio);
			}

			$this->session->set_flashdata('sucessoTreino', 'Plano de Treino criado com sucesso'); //mensagem de sucesso
				// redirect('cliente/novo_plano');
			redirect($_SERVER['HTTP_REFERER']);


		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav_cliente');
			$this->load->view('Cliente/novo_plano', $data);
			$this->load->view('templates/footer');
		}


	}


	public function treinos($idTreinoApagar = false){
		$data['title'] = "Planos de Treinos";
		// passa para a view o nome dos planos
		$data['listaNomesPlanos'] = $this->Exercicio_m->getPlanoTreino();
		// passa para as views a informação completa dos planos e exercicios contidos
		$data['listaPlanos'] = $this->Exercicio_m->dadosPlanoTreinoCompleto();
		// lista funcionarios para o cliente puder fazer pedido de novo plano
		$data['listaFuncionario'] = $this->Utilizador_m->obterFuncionario();
		// funcionario selecionado para pedir plano
		$idFuncionario = $this->security->xss_clean($this->input->post('selecionaFuncionario'));
		// verifica utilizador com sessao iniciada
		$utilizador = $this->session->userdata('sessao_utilizador'); //iniciar sessao
		
		if($this->input->post('submitPedidoFuncionario')){
			
			// verifica se ja existe algum plano pendente com aquele funcionario para bloquear novo pedido
			$verificaEstado = $this->Exercicio_m->verificaPlanoTreino($idFuncionario, $utilizador['id']);
			
			// verifica se existe já existe algum pedido
			if( count($verificaEstado) > 0 ){
				
				// verifica se existe mais que um resultado
				foreach ( $verificaEstado as $row ){
					
					// se ja existir algum pendente da erro
					if ( $row['pt_estado'] == 'pendente' ){
						$this->session->set_flashdata('erroPedidoPlano', 'Já efectuou um pedido a este funcionário. Por favor aguarde que o funcionário responda.'); //mensagem de sucesso
						redirect('cliente/treinos');
					}	
				}
			}
				
			// se houver pendente sai da função no passo anterior
			// se nao houver pendente cria pedido

			// array para inserir novo plano				
			$novoPlanoTreino = array(
				"nome" => "pedido",
				"cliente_admin_id" => $utilizador['id'],
				"funcionario_admin_id" => $idFuncionario,
				"pt_estado" => "pendente",
				"pt_data" => date("Y-m-d"),
				"pt_tipo" => "privado"
			);
			// insere novo plano na BD e seleciona id
			$idPlanoTreino = $this->Exercicio_m->criarPlanoTreino($novoPlanoTreino);
			// array para inserir na tabela cliente_has_planoTreino
			$novoCliente_has_PlanoTreino = array(
				"id_planoTreino" => $idPlanoTreino,
				"id_cliente" => $utilizador['id'],
				"cpt_estado" => "pendente",
				"cpt_data" => date("Y-m-d")
			);

			var_dump($novoPlanoTreino);
			var_dump($idPlanoTreino);
			var_dump($novoCliente_has_PlanoTreino);

			$this->Exercicio_m->criarCliente_has_PlanoTreino($novoCliente_has_PlanoTreino);
			$this->session->set_flashdata('sucessoPedidoPlano', 'Pedido efectuado com sucesso. Por favor aguarde que o funcionário responda.'); //mensagem de sucesso
			redirect('cliente/treinos');
			
		}
		// verifica se foi passado o id de um plano a apagar e se pode ser apagado por este utilizador
		if ( $idTreinoApagar == true ){
			// verifica os planos criados pelo utilizador e que podem ser apagados pelo mesmo
			$resultado = $this->Exercicio_m->getPlanoTreino($idTreinoApagar, $utilizador['id']);
			if ( $resultado != null ){
				$this->Exercicio_m->apagarPlanoTreino($idTreinoApagar);
			}else{
				
				$this->session->set_flashdata('erroApagarTreino', 'Erro! Este plano não pode ser apagado por si.'); //mensagem de erro
				
			}
			redirect('cliente/treinos');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/treinos',$data);
		$this->load->view('templates/footer');
	}


	public function plano_treino($idPlanoTreino = false, $id_exercicio_plano_treino = false)
	{
		$data['title'] = "Planos de Treino";

		if ($idPlanoTreino == true) {

			// passa id do plano de treino recebido pelo url para ser enviado com o id do exercicio que queremos apagar
			$data['idPlanoTreino'] = $idPlanoTreino;

			// passa exercicios que existem no plano escolhido
			$data['exericiosExistentesPlano'] = $this->Exercicio_m->infoPlanoTreino($idPlanoTreino);

		} else {
			redirect('cliente/treinos');
		}

		if ($id_exercicio_plano_treino == true) {

			$this->Exercicio_m->query_apagar_exercicio_plano_treino($idPlanoTreino, $id_exercicio_plano_treino);
			redirect('cliente/plano_treino/' . $idPlanoTreino);
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/plano_treino', $data);
		$this->load->view('templates/footer');
	}


	public function calendario()
	{
		$data['title'] = "Calendário";

		$idCliente = $this->session->userdata('sessao_utilizador')['id'];


		// variavel que é declarada na DATA do ajax faz sempre post na primeira vez que a pagina é declarada
		if ($this->input->post('start')) {

			echo json_encode($this->Aula_m->obterAulasCliente($idCliente));

		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav_cliente');
			$this->load->view('Cliente/calendario', $data);
			$this->load->view('templates/footer');
		}


	}


	public function aulas()
	{
		$data['title'] = "Aulas";

		if ($this->input->post('start')) {

			echo json_encode($this->Aula_m->obterAulasCalendario());

		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav_cliente');
			$this->load->view('Cliente/aulas', $data);
			$this->load->view('templates/footer');

		}
	}


	public function visualizarAula($idAula = null)
	{

		if ($idAula == null) {
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data['title'] = 'Ver aula';
		$data['aula'] = $this->Aula_m->obterAulas($idAula, false);
		$data['idAula'] = $idAula;

		$idCliente = $this->session->userdata('sessao_utilizador')['id'];
		$verificaInscricao = $this->Aula_m->verificaInscricaoAula($idAula, $idCliente);

		// verifica quantas pessoas ja estao inscritas
		$data['numeroInscricoes'] = $this->Aula_m->verificaVagasAula($idAula);

		// se nao retorna nada, ou seja se nao esta inscrito
		if (count($verificaInscricao) == 0) {

			$inscricao = 0;

		} else {

			$inscricao = 1;
		}

		var_dump($inscricao);

		// passa variavel para a view para indicar se o utilizar adiciona ou remove a inscricao na aula
		$data['inscricao'] = $inscricao;

		// se for feita inscricao
		if ($this->input->post('marcarAula')) {

			// array para inserir novo plano				
			$novaInscricao = array(
				"id_cliente" => $idCliente,
				"id_aula" => $idAula
			);

			$this->Aula_m->novaInscricaoAula($novaInscricao);
			//enviar mensagem a participantes
			$this->session->set_flashdata('sucessoNovaInscricao', 'Inscrito com sucesso na aula');
			redirect('cliente/visualizarAula/' . $idAula);
		}

		// se for desmarcar aula
		if ($this->input->post('desmarcarAula')) {

			$this->Aula_m->eliminarInscricaoAula($idAula, $idCliente);
			//enviar mensagem a participantes
			$this->session->set_flashdata('sucessoDesmarcarAula', 'A sua inscrição foi removida da aula');
			redirect('cliente/visualizarAula/' . $idAula);
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_cliente');
		$this->load->view('Cliente/visualizarAula', $data);
		$this->load->view('templates/footer');
	}






}
