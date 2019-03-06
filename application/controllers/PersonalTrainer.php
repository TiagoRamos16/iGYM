<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalTrainer extends CI_Controller {

	private $idFuncionario; 

	public function __construct(){
		parent::__construct();
		$this->load->model('Sala_m');
		$this->load->model('Aula_m');
		$this->load->model('Utilizador_m');
		$this->load->model('Exercicio_m');

		if($this->session->userdata('sessao_utilizador')==null){
			$this->session->set_flashdata('erroPT', 'Não tem permissao de aceder a esta página '); //mensagem de erro
			redirect('','refresh');
		}else{
			if(($this->session->userdata('sessao_utilizador')['tipo'])!=3){
				$this->session->set_flashdata('erroPT', 'Não tem permissao de aceder a esta página '); //mensagem de erro
				redirect('','refresh');
			}else if(($this->session->userdata('sessao_utilizador')['estado'])!=1){
				$this->session->set_flashdata('erroPT', 'Sua conta não esta activa'); //mensagem de erro
				redirect('','refresh');
			}else{
				$this->idFuncionario = $this->session->userdata('sessao_utilizador')['id']; 
			}
		}

	}


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

		$config['day_type'] = 'long'; 
		$config = array(
			'show_next_prev'  => TRUE,
			'next_prev_url'   => base_url('personalTrainer/horario')
		);
		$config['template'] = '
			{cal_cell_content}<span class="day_listing">{day}</span>&nbsp;&bull; {content}&nbsp;{/cal_cell_content}
			{cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>&bull; {content}</div>{/cal_cell_content_today}
			{cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
		'; 
		
		$config['template'] = '
			{table_open}<table class="calendar">{/table_open}
			{week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
			{cal_cell_content}<span class="day_listing">{day}</span>&nbsp;&bull; {content}&nbsp;{/cal_cell_content}
			{cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span>&bull; {content}</div>{/cal_cell_content_today}
			{cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
		'; 


		$this->load->library('calendar',$config);


		$data2 = array(
			3 => 'http://example.com/news/article/2006/06/03/',
			7 => 'http://example.com/news/article/2006/06/07/',
			13 => 'http://example.com/news/article/2006/06/13/',
			
		);

		$data['data2'] = $data2;		

		// print_r($this->session->userdata('sessao_utilizador'));

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/horario',$data);
		$this->load->view('templates/footer');
	}

	public function clientes()
	{
		$data['title'] = 'Clientes'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/clientes');
		$this->load->view('templates/footer');
	}

	public function planosTreino()
	{
		$data['title'] = 'Planos de Treino'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/planosTreino');
		$this->load->view('templates/footer');
	}

	public function exercicios()
	{
		$data['title'] = 'Exercicios'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/exercicios');
		$this->load->view('templates/footer');
	}

	public function aulas()
	{
		$data['title'] = 'Aulas'; 

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/aulas');
		$this->load->view('templates/footer');
	}

	//função em que um personal trainer poderá marcar uma aula 

	public function marcarAula()
	{
		$data['title'] = 'Marcar Aula'; 

		$data['salas'] = $this->Sala_m->obterSala();

		//validações do formulario marcar aula
		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('sala', 'Sala', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|alpha_numeric_spaces',
			array('alpha_numeric_spaces' => 'Erro Apenas são permitidas letras e números'));
		$this->form_validation->set_rules('inicio', 'Inicio', 'required');
		$this->form_validation->set_rules('fim', 'Fim', 'required');
		$this->form_validation->set_rules('lotacao', 'Lotação', 'required');


		//se passar nas validações
		if ($this->form_validation->run() == TRUE){
			
			$data = $this->security->xss_clean($this->input->post('data'));
			$sala = $this->security->xss_clean($this->input->post('sala'));
			$nome = $this->security->xss_clean($this->input->post('nome'));
			$inicio = $this->security->xss_clean($this->input->post('inicio'));
			$fim = $this->security->xss_clean($this->input->post('fim'));
			$lotacao = $this->security->xss_clean($this->input->post('lotacao'));
			$dataHoje = date('Y-m-d');
			$duracao = getTimeDiff($inicio,$fim);
			$inicio = date($data." ".$inicio.":00");  //tornar time em date time
			$fim = date($data." ".$fim.":00");

			$aulas = $this->Aula_m->obterAulaPorSala($sala,$data); //obter aulas da bd

			//validaçoes do formulario
			foreach($aulas as $aula){  //verificar se hora da aula é possivel
				if($inicio >= $aula['hora_inicio'] && $inicio <= $aula['hora_fim'] || $fim >= $aula['hora_inicio'] && $fim <= $aula['hora_fim']){
					$this->session->set_flashdata('erroMarcarAula5', 'Hora de aula impossivel'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
				}

			}			

			if($data<$dataHoje){	//validação de data
				$this->session->set_flashdata('erroMarcarAula1', 'Data incorrecta'); //mensagem de erro
				redirect('personalTrainer/marcarAula');
			}
			if($inicio>$fim){ // validação de hora de aula
				$this->session->set_flashdata('erroMarcarAula2', 'Tempo incorrecto'); //mensagem de erro
				redirect('personalTrainer/marcarAula');
			}

			if(is_numeric($lotacao)){
				$salaArray = $this->Sala_m->obterSala($sala);

				if($lotacao>$salaArray['capacidade_maxima']){
					$this->session->set_flashdata('erroMarcarAula3', 'lotação execede o maximo da sala'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
				}

			}else{
				$this->session->set_flashdata('erroMarcarAula4', 'Lotação tem de ser um numero'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
			}

			if($lotacao<1){ // validação de hora de aula
				$this->session->set_flashdata('erroMarcarAula6', 'Lotação tem de ser um número positivo'); //mensagem de erro
				redirect('personalTrainer/marcarAula');
			}

				
			$aula = array(
				"nome"=> $nome,
				"sala_id"=> $sala,
				"lotacao"=> $lotacao,
				"hora_inicio"=> $inicio,
				"hora_fim"=> $fim,
				"data" => $data,
				"tipo" => 1,
				"funcionario_admin_id" => $this->session->userdata('sessao_utilizador')['id'],
				"duracao" => $duracao
			);

			$this->Aula_m->insereAula($aula);
			$this->session->set_flashdata('sucessoCriarAula', 'Aula Criada com sucesso'); //mensagem de erro
			redirect('personalTrainer/marcarAula');

		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/marcarAula',$data);
			$this->load->view('templates/footer');
		}


		
	}

	public function visualizarAulas()
	{
		$data['title'] = 'As minhas aulas'; 
		
		$funcionarioId = $this->session->userdata('sessao_utilizador')['id'];
		// $aulasPorUtilizador = $this->Aula_m->obterAulas(false,$funcionarioId);
		
		$data['aulas'] = $this->Aula_m->obterAulasPorUtilizador($funcionarioId);



		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/visualizarAulas',$data);
		$this->load->view('templates/footer');
	}

	public function visualizarAula($idAula=null)
	{
		$data['title'] = 'Ver aula'; 

		//verifica get

		if($idAula==null) redirect('personalTrainer/visualizarAulas');

		//verifica se aula pertece ao utilizador
		// var_dump($this->Aula_m->verificaAulaFuncionario($this->idFuncionario, $idAula));
		if($this->Aula_m->verificaAulaFuncionario($this->idFuncionario, $idAula)==null){
				
			$this->session->set_flashdata('erroVisualizarAula', 'Apenas pode aceder as suas aulas');
			redirect('personalTrainer/visualizarAulas');

		}else{

			
			if($this->input->post('aceitarClienteAula')){
				
				$dados = array(
					"ac_estado" => "aceite"
				);

				$idCliente = $this->input->post('idCliente');
				$idAula = $this->input->post('idAula');
				
				$this->Aula_m->editarExercicio($dados,$idAula,$idCliente);

				redirect('personalTrainer/visualizarAula/'.$idAula);

			}else{
				$data['aula'] = $this->Aula_m->obterAulas($idAula, false);
				$data['participantesAula'] = $this->Aula_m->obterParticipantesAula($idAula,"aceite");
				$data['participantesAulaPendente'] = $this->Aula_m->obterParticipantesAula($idAula,"pendente");
				
				$data['id'] = $idAula;
				
			
				$this->load->view('templates/header',$data);
				$this->load->view('templates/nav_top');
				$this->load->view('templates/nav_lateral_funcionario');
				$this->load->view('PersonalTrainer/visualizarAula',$data);
				$this->load->view('templates/footer');
			}

		
		}  
	
	}

	public function visualizarAulaHistorico($idAula = null)
	{
		$data['title'] = 'Ver aula'; 

		//verifica get

		if ($idAula == null) redirect('personalTrainer/visualizarAulas');

		$data['aula'] = $this->Aula_m->obterAulas($idAula, false);
		$data['participantesAula'] = $this->Aula_m->obterParticipantesAula($idAula, "aceite");

		$data['id'] = $idAula;


		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/visualizarAulaHistorico', $data);
		$this->load->view('templates/footer');

	}



	
	public function eliminarAula($idAula)
	{
		$aula = $this->Aula_m->obterAulas($idAula,false);

		if($aula['funcionario_admin_id'] == $this->session->userdata('sessao_utilizador')['id']){
			$this->Aula_m->eliminarAula($idAula);
			
			//enviar mensagem a participantes

			$this->session->set_flashdata('sucessoEliminarAula', 'Sucesso a eliminar a aula');
			redirect('personalTrainer/visualizarAulas');
		}else{
			$this->session->set_flashdata('erroEliminarAula', 'Não pode apagar aulas de outros utilizadores!!!!!');
			redirect('personalTrainer/visualizarAulas');
		}
		
	}

	public function eliminarParticipanteAula(){
		
		if($this->input->post('submitEliminaParticipante')){
			$aula = $this->Aula_m->obterAulas($idAula,false);
			$idAula = $this->input->post('idAula');
			$idUtilizador =  $this->input->post('idUtilizador');

			$this->Aula_m->eliminarClienteAula($idAula,$idUtilizador);

			$this->session->set_flashdata('sucessoEliminarCliente', 'Sucesso a eliminar Cliente');
			redirect('personalTrainer/visualizarAula/'.$idAula);
		}else{
			echo " not submited";
		}

	}

	public function historicoAulas(){

		$data['title'] = 'Historico de aulas'; 

		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];
		$data['aulas'] = $this->Aula_m->obterHistoricoAulas($idFuncionario);
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/historicoAulas',$data);
		$this->load->view('templates/footer');

	}

	public function verClientes($arg1=false){

		$data['title'] = 'Listagem de clientes';

		if($arg1 == 1 ){//verifica url
			$arg1 ="activo";
		}else if($arg1 == 2){
			$arg1 ="rejeitado";
		}else if($arg1 == 3){
			$arg1 ="pendente";
		}else{
			$arg1=false; 
		} 
				
		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];
		

		$this->form_validation->set_rules('pesquisa', 'Pesquisa', 'required');

		if ($this->form_validation->run() == true) {
			$pesquisa = $this->input->post('pesquisa');
			$utilizadores = $this->Utilizador_m->obterUtilizadorPorFuncinario($idFuncionario,$pesquisa,$arg1);

			$data['utilizadores'] = $utilizadores ;
		
		}else{
			$utilizadores = $this->Utilizador_m->obterUtilizadorPorFuncinario($idFuncionario,false,$arg1);

			$data['utilizadores'] = $utilizadores ;
		}


		// var_dump($data['utilizadores']);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/verClientes',$data);
		$this->load->view('templates/footer');
	}

	public function AdicionarCliente(){

		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == true) {

			$email = $this->input->post('email');
			$utilizador = $this->Utilizador_m->verificaEmail($email);
			$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];
			$data = date('Y-m-d');

			$dados = array(
				"cliente_admin_id" => $utilizador['id'],
				"funcionario_admin_id" => $idFuncionario,
				"fc_estado" => "pendente",
				"fc_data" => $data
			);


			if($utilizador['id'] == $idFuncionario || $utilizador['tipo'] != 5){
				$this->session->set_flashdata('erroAssocia', 'Utilizador não é um cliente'); 
				redirect('personalTrainer/verClientes','refresh');
			}



			//verifica se utilizador ja esta associado
			if($this->Utilizador_m->verificaFuncionarioCliente($utilizador['id'],$idFuncionario)==null){
				$this->Utilizador_m->associarFuncionarioCliente($dados);
				$this->session->set_flashdata('sucessoAssocia', 'Foi enviado um pedido ao utilizador'); //mensagem de sucesso
				redirect('personalTrainer/verClientes','refresh');
			}else{
				$this->session->set_flashdata('erroAssocia', 'Ja está associado a esse utilizador ou ja enviou pedido'); //mensagem de erro
				redirect('personalTrainer/verClientes','refresh');
			}

			
		}
	}

	public function verPedidos($estado=false){
		$data['title'] = 'Listagem de pedidos';


		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];

		if($estado==1){
			$data['listaPedidos'] =  $this->Utilizador_m->listaPedidoPendentesPorUtilizador($idFuncionario,"activo");
		}else if($estado==2){
			$data['listaPedidos'] =  $this->Utilizador_m->listaPedidoPendentesPorUtilizador($idFuncionario,"rejeitado");
		}else{
			$data['listaPedidos'] =  $this->Utilizador_m->listaPedidoPendentesPorUtilizador($idFuncionario,"pendente");
		}
		

		// var_dump($this->Utilizador_m->listaPedidoPendentesPorUtilizador($idFuncionario,"pendente"));

		if($this->input->post('submitAceitaCliente')){
			$idPedido = $this->input->post('idPedido');

			$data = array(
				"fc_estado" => "activo",
			);

			$this->Utilizador_m->editarFuncionarioHasCliente($data,$idPedido);

			
			$this->session->set_flashdata('sucessoAceitar', 'Sucesso a aceitar Cliente');
			
			redirect('personalTrainer/verPedidos',"refresh");

		}else if($this->input->post('submitRejeitarCliente')){
			
			$idPedido = $this->input->post('idPedido');

			$data = array(
				"fc_estado" => "rejeitado",
			);

			$this->Utilizador_m->editarFuncionarioHasCliente($data,$idPedido);

			
			$this->session->set_flashdata('sucessoRejeitar', 'Sucesso a rejeitar Cliente');
			
			redirect('personalTrainer/verPedidos',"refresh");

		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/verPedidos',$data);
			$this->load->view('templates/footer');
		}
		
		
	}


	public function meusPlanos(){
		$data['title'] = 'Meus planos de treino';

		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];

		$data['planosTreino'] = $this->Exercicio_m->getPlanoTreinoPorFuncionario($idFuncionario);
		

		if($this->input->post('submitRemovePlano')){
			
			$idPlano = $this->input->post('idPlano');

			$this->Exercicio_m->apagarPlanoTreino($idPlano);

			$this->session->set_flashdata('sucessoApagarPlano', 'Sucesso a apagar plano de treino');
			
			redirect('personalTrainer/meusPlanos',"refresh");
		}

		// editar plano de treino

		if($this->input->post('submitEditarPlano')){
			
			$idPlano = $this->input->post('idPlano');

			$plano = $this->Exercicio_m->obterPlanoTreino($idPlano);

			$nome = trim($this->input->post('nome'));

			$estado = $this->input->post('estado');

			if($nome == "") $nome = $plano['pt_nome'];
			if($estado == "") $estado = $plano['pt_estado'];

			$data = array(
				"nome" => $nome,
				"pt_estado" => $estado
			);


			$this->Exercicio_m->editarPlanoTreino($data,$idPlano);
				
			$this->session->set_flashdata('sucessoEditarPlano', 'Sucesso a editar plano de treino');
			
			redirect('personalTrainer/meusPlanos',"refresh");
		
		}

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/meusPlanos',$data);
		$this->load->view('templates/footer');
	}


	public function verPlanoTreino($idPlano = false){
		
		$data['title'] = 'Visualizar plano de treino';

		$data['plano'] = $this->Exercicio_m->obterPlanoTreino($idPlano);
		$data['clientes'] = $this->Exercicio_m->oberClientesAssociadoPlanoTreino($idPlano);
		$data['exercicios'] = $this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano);
		$data['id'] = $idPlano;

		// var_dump($this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano));
		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/verPlanoTreino',$data);
		$this->load->view('templates/footer');
	}


	public function verPlanoTreinoOutro($idPlano = false){
		
		$data['title'] = 'Visualizar plano de treino';

		$data['plano'] = $this->Exercicio_m->obterPlanoTreino($idPlano);
		$data['exercicios'] = $this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano);
		$data['id'] = $idPlano;

		// var_dump($data);

		// var_dump($this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano));
		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/verPlanoTreinoOutro',$data);
		$this->load->view('templates/footer');
	}


	public function eliminarExercicoPlanoTreino($idPlano = false, $idExercico=false){
	
		$this->Exercicio_m->query_apagar_exercicio_plano_treino($idPlano, $idExercico);

		$this->session->set_flashdata('sucessoEliminarExercicio', 'Sucesso a eliminar exercicio do plano de treino');
			
		redirect('personalTrainer/verPlanoTreino/'.$idPlano,"refresh");
	}


	public function listaExercicios($idPlano=false,$flag=false){

		$data['title'] = 'Lista de exercicios';

		$data['id'] = $idPlano;

		if($flag==false){
			$data['exercicios'] = $this->Exercicio_m->dadosExercicioPorUtilizador($this->session->userdata('sessao_utilizador')['id']);
		}else{
			$data['exercicios'] = $this->Exercicio_m->dadosExercicio();
		}

		if($this->input->post('idPlano')){
			$idPlano = $this->input->post('idPlano');
			echo json_encode($this->Exercicio_m->obterExerciciosAssociadosPlano($idPlano));
		}else if ($this->input->post('btnAdicionar')){

			$planoTreino_has_exercicio = array(
				"plano_treino_id" => $this->input->post('idPlanoAdicionar'),
				"exercicio_id" => $this->input->post('idExercicioAdicionar')
			);
			
			$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio);

			$this->session->set_flashdata('sucessoAdicionarExercicio', 'Sucesso a adicionar exercicio ao plano de treino');

			if($flag==false){
				redirect('personalTrainer/listaExercicios/'.$idPlano, "refresh");
			}else{
				redirect('personalTrainer/listaExercicios/'.$idPlano."/1", "refresh");
			}
			
		}
		else{ 
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/listaExercicios',$data);
			$this->load->view('templates/footer');
		}


		

		// var_dump($this->Exercicio_m->obterExerciciosAssociadosPlano($idPlano));

		// var_dump($this->Exercicio_m->dadosExercicio());

		// var_dump($data['exercicios']);
		

	}



	public function verTodosPlanos(){
		
		$data['title'] = 'Ver todos os planos';

		$data['planosTreino'] = $this->Exercicio_m->getPlanoTreinoPorTipo("publico","1");

		// var_dump($data['planosTreino']);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/verTodosPlanosTreino',$data);
		$this->load->view('templates/footer');
	}


	public function verPedidoPlanos(){
		$data['title'] = 'Pedidos de Planos';

		// var_dump($this->Exercicio_m->getPedidosDePlanosTreino(0));
		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];


		$data['planosTreino'] = $this->Exercicio_m->getPedidosDePlanosTreino(false,$idFuncionario,"data");
		
		// var_dump($data['planosTreino']);

		if($this->input->post('ordenamento')){
			$ordenamento = $this->input->post('ordenamento');
			echo json_encode($this->Exercicio_m->getPedidosDePlanosTreino(false,$idFuncionario,$ordenamento));
		}else if($this->input->post('ordenamento2')){
			$ordenamento2 = $this->input->post('ordenamento2');
			echo json_encode($this->Exercicio_m->getPedidosDePlanosTreino($ordenamento2,$idFuncionario,false));
		}
		
		else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/verPedidosPlanosTreino',$data);
			$this->load->view('templates/footer');
		}

	}


	public function adicionarPlanoTreino(){

		$data['title'] = 'Adicionar Plano de treino';
		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];

		if($this->input->post('addPlanoPasso1')){
			
			// echo $this->input->post('nome');
			// echo $this->input->post('radioPrivado');
			$dataHoje = date('Y-m-d');

			$data = array(
				"nome" => $this->input->post('nome'),
				"funcionario_admin_id" => $idFuncionario,
				"pt_estado" => 1,
				"pt_data" => $dataHoje,
				"pt_tipo" => $this->input->post('radioPrivado')
			);


			$ultimoId = $this->Exercicio_m->inserePlanoTreino($data);
			// $ultimoId = 10;


			$this->session->set_userdata('idUltimoPlano',$ultimoId); //iniciar sessao
			

	
			redirect('personalTrainer/adicionarPlanoTreinoPasso2/'.$ultimoId,'refresh');
			

		}else{

			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/adicionarPlanoTreino',$data);
			$this->load->view('templates/footer');
		}

	}

	public function adicionarPlanoTreinoPasso2($idPlano=false,$flag=false ){ 

		$data['title'] = 'Adicionar Plano de treino Passo 2';
		$data['id'] = $idPlano;

		if( $idPlano == false ) redirect("personalTrainer/adicionarPlanoTreino");  //verfica se existe get

		if($idPlano != $this->session->userdata('idUltimoPlano')){ //verifica se o plano do get é igual a sessao criada anteriormente
			echo "nao pode modificar este plano";
		}else{

			if($flag==false){ //seleciona exercicios associados  a utilizador
				$data['exercicios'] = $this->Exercicio_m->dadosExercicioPorUtilizador($this->session->userdata('sessao_utilizador')['id']);
				$data['exerciciosAssoc'] = $this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano);
			}else{//seleciona todos os exercicios
				$data['exercicios'] = $this->Exercicio_m->dadosExercicio();
				$data['exerciciosAssoc'] = $this->Exercicio_m->oberExerciciosAssociadoPlanoTreino($idPlano);
			}
				
	
			if ($this->input->post('btnAdicionar')){ //adicionar exercicio ao plano
	
				$planoTreino_has_exercicio = array(
					"plano_treino_id" => $this->input->post('idPlanoAdicionar'),
					"exercicio_id" => $this->input->post('idExercicioAdicionar')
				);
				
				$this->Exercicio_m->adicionarExercicio_PlanoTreino($planoTreino_has_exercicio); //adiciona exercicio a plando de treino
	
				$this->session->set_flashdata('sucessoAdicionarExercicio', 'Sucesso a adicionar exercicio ao plano de treino');
	
				if($flag==false){
					redirect('personalTrainer/adicionarPlanoTreinoPasso2/'.$idPlano, "refresh");
				}else{
					redirect('personalTrainer/adicionarPlanoTreinoPasso2/'.$idPlano."/1", "refresh");
				}
				
			}else if($this->input->post('confPT')){ //confimar submissao de plano de treino
				$this->session->set_flashdata('sucessoInserirPlano', 'Sucesso a criar o seu plano de treino');
				redirect('personalTrainer/meusPlanos/', "refresh");
			}else{
				$this->load->view('templates/header',$data);
				$this->load->view('templates/nav_top');
				$this->load->view('templates/nav_lateral_funcionario');
				$this->load->view('PersonalTrainer/adicionarPlanoTreinoPasso2',$data);
				$this->load->view('templates/footer');
			}
		}




	

	}

	public function eliminarExercicoPlanoTreinoPass2($idPlano = false, $idExercico=false,$flag=false){
	
		$this->Exercicio_m->query_apagar_exercicio_plano_treino($idPlano, $idExercico);

		$this->session->set_flashdata('sucessoEliminarExercicio', 'Sucesso a eliminar exercicio do plano de treino');

		if($flag==false){
			redirect('personalTrainer/adicionarPlanoTreinoPasso2/'.$idPlano,"refresh");
		}else{
			redirect('personalTrainer/adicionarPlanoTreinoPasso2/'.$idPlano."/1","refresh");
		}	
		
	}

	public function meusExercicios(){
		$this->load->helper('text');

		$data['title'] = 'Meus Exercicios';
		
		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];

		$data['exercicios'] = $this->Exercicio_m->getExercicioPorFuncionario($idFuncionario);


		if($this->input->post('idExercicio')){
			
			$idExercicio = $this->input->post('idExercicio');

			$this->Exercicio_m->apagarExercicio($idExercicio);

			$this->session->set_flashdata('sucessoApagarExercicio', 'Sucesso a apagar Exercicio');
			
			redirect('personalTrainer/meusExercicios',"refresh");
		}
		
		


		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
		$this->form_validation->set_rules('dificuldade', 'dificuldade', 'trim|required');
		$this->form_validation->set_rules('duracao', 'duracao', 'trim|required');
		$this->form_validation->set_rules('tipoExercicio', 'tipoExercicio', 'trim|required');
		$this->form_validation->set_rules('tipoDuracao', 'tipo_duracao', 'trim|required');
		
		
		if ($this->form_validation->run() == true) {

			$nome = $this->security->xss_clean($this->input->post("nome"));
			$descricao = $this->security->xss_clean($this->input->post("descricao"));
			$dificuldade = $this->security->xss_clean($this->input->post("dificuldade"));
			$duracao = $this->security->xss_clean($this->input->post("duracao"));
			$tipoExercicio = $this->security->xss_clean($this->input->post("tipoExercicio"));
			$tipoDuracao = $this->security->xss_clean($this->input->post("tipoDuracao"));
			$id = $this->security->xss_clean($this->input->post("id"));

			$dadosEditar = array (
				"nome" => $nome,
				"descricao" => $descricao,
				"dificuldade" => $dificuldade,
				"duracao" => $duracao,
				"tipo_exercicio" => $tipoExercicio,
				"tipo_duracao" => $tipoDuracao
			);


			$this->Exercicio_m->editarExercicio($dadosEditar,$id);

			$this->session->set_flashdata('sucessoEditarExercicio', 'Sucesso a editar Exercicio');

			redirect("personalTrainer/meusExercicios","refresh");


		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav_top');
			$this->load->view('templates/nav_lateral_funcionario');
			$this->load->view('PersonalTrainer/meusExercicios',$data);
			$this->load->view('templates/footer');
		}	
	}


	public function adicionarExercicio(){

		$data['title'] = 'Adicionar Exercicios';


		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('descricao', 'descricao', 'trim|required');
		$this->form_validation->set_rules('dificuldade', 'dificuldade', 'trim|required');
		$this->form_validation->set_rules('duracao', 'duracao', 'trim|required');
		$this->form_validation->set_rules('tipoExercicio', 'tipoExercicio', 'trim|required');
		$this->form_validation->set_rules('tipoDuracao', 'tipo_duracao', 'trim|required');
		
		
		if ($this->form_validation->run() == true) {
			
			$nome = $this->security->xss_clean($this->input->post("nome"));
			$descricao = $this->security->xss_clean($this->input->post("descricao"));
			$dificuldade = $this->security->xss_clean($this->input->post("dificuldade"));
			$duracao = $this->security->xss_clean($this->input->post("duracao"));
			$tipoExercicio = $this->security->xss_clean($this->input->post("tipoExercicio"));
			$tipoDuracao = $this->security->xss_clean($this->input->post("tipoDuracao"));
			$id = $this->security->xss_clean($this->input->post("id"));




			$foto = "1.gif";
			$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];


			$exercicio = array (
				"nome" => $nome,
				"descricao" => $descricao,
				"dificuldade" => $dificuldade,
				"duracao" => $duracao,
				"tipo_exercicio" => $tipoExercicio,
				"tipo_duracao" => $tipoDuracao,
				"foto" => $foto,
				"funcionario_admin_id" => $idFuncionario
			);


			$this->Exercicio_m->insereExercicio($exercicio);

			$this->session->set_flashdata('sucessoAdicionarExercicio', 'Sucesso a adicionar Exercicio');

			redirect("personalTrainer/meusExercicios","refresh");

		}


		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/adicionarExercicio',$data);
		$this->load->view('templates/footer');

	}

	public function ajax(){
		if($this->input->post('sala')){
			$idSala = $this->input->post('sala');
			$data =  $this->input->post('dataForm');
			echo json_encode($this->Aula_m->obterAulaPorSala($idSala,$data));
		}else{
			echo "0";
		}
	}

	public function ajax2(){


		if($this->input->post('salaLotacao')){
			$idSala = $this->input->post('salaLotacao');
			echo json_encode($this->Aula_m->obterSala($idSala));
		}else{
			echo "0";
		}
	}

	public function calendario(){
		$data['title'] = "Calendário";

		$idFuncionario = $this->session->userdata('sessao_utilizador')['id'];


		// variavel que é declarada na DATA do ajax faz sempre post na primeira vez que a pagina é declarada
		if( $this->input->post('start') ){

			echo json_encode( $this->Aula_m->obterAulasFuncionario($idFuncionario) );

		}else{
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav_cliente');
			$this->load->view('Cliente/calendario',$data);
			$this->load->view('templates/footer');
		}
		

	}




	


}


function getTimeDiff($dtime, $atime)
{
	$nextDay = $dtime > $atime ? 1 : 0;
	$dep = explode(':', $dtime);
	$arr = explode(':', $atime);
	$diff = abs(mktime($dep[0], $dep[1], 0, date('n'), date('j'), date('y')) - mktime($arr[0], $arr[1], 0, date('n'), date('j') + $nextDay, date('y')));
	$hours = floor($diff / (60 * 60));
	$mins = floor(($diff - ($hours * 60 * 60)) / (60));
	$secs = floor(($diff - (($hours * 60 * 60) + ($mins * 60))));
	if (strlen($hours) < 2) {
		$hours = "0" . $hours;
	}
	if (strlen($mins) < 2) {
		$mins = "0" . $mins;
	}
	if (strlen($secs) < 2) {
		$secs = "0" . $secs;
	}
	return $hours . ':' . $mins . ':' . $secs;
}