<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalTrainer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Sala_m');
		$this->load->model('Aula_m');

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


	public function marcarAula()
	{
		$data['title'] = 'Marcar Aula'; 

		$data['salas'] = $this->Sala_m->obterSala();

		$this->form_validation->set_rules('data', 'Data', 'required');
		$this->form_validation->set_rules('sala', 'Sala', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('inicio', 'Inicio', 'required');
		$this->form_validation->set_rules('fim', 'Fim', 'required');
		$this->form_validation->set_rules('lotacao', 'Lotação', 'required');


		if ($this->form_validation->run() == TRUE){
			
			$data = $this->security->xss_clean($this->input->post('data'));
			$sala = $this->security->xss_clean($this->input->post('sala'));
			$nome = $this->security->xss_clean($this->input->post('nome'));
			$inicio = $this->security->xss_clean($this->input->post('inicio'));
			$fim = $this->security->xss_clean($this->input->post('fim'));
			$lotacao = $this->security->xss_clean($this->input->post('lotacao'));
			$dataHoje = date('Y-m-d');
			$duracao = getTimeDiff($inicio,$fim);
			$inicio = $inicio.":00";
			$fim = $fim.":00";

			$aulas = $this->Aula_m->obterAulaPorSala($sala,$dataHoje);


			foreach($aulas as $aula){
				if($inicio >= $aula['hora_inicio'] && $inicio <= $aula['hora_fim'] || $fim >= $aula['hora_inicio'] && $fim <= $aula['hora_fim']){
					$this->session->set_flashdata('erroMarcarAula5', 'Hora de aula impossivel'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
				}

				// echo "<br>".$inicio." ; ".$aula['hora_inicio'];
				// if($inicio >= $aula['hora_inicio'] && $inicio < $aula['hora_fim']){
				// 	echo "<br> ERRORR";
				// }
				// echo "<br>".$fim." ; ".$aula['hora_fim'];
			}
			

			if($data<$dataHoje){

				// echo " not good date";
				$this->session->set_flashdata('erroMarcarAula1', 'Data incorrecta'); //mensagem de erro
				redirect('personalTrainer/marcarAula');
			}
			if($inicio>$fim){
				$this->session->set_flashdata('erroMarcarAula2', 'Tempo incorrecto'); //mensagem de erro
				redirect('personalTrainer/marcarAula');
			}

			if(is_numeric($lotacao)){
				$salaArray = $this->Sala_m->obterSala($sala);

				if($lotacao>$salaArray['capacidade_maxima']){
					$this->session->set_flashdata('erroMarcarAula3', 'lotação execede o maximo da sala'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
					// echo "lotação execede o maximo da sala";
				}

			}else{
				$this->session->set_flashdata('erroMarcarAula4', 'Lotação tem de ser um numero'); //mensagem de erro
					redirect('personalTrainer/marcarAula');
			}

			
	
			$aula = array(
				"nome"=> $nome,
				"sala_id"=> $sala,
				"lotacao"=> $lotacao,
				"hora_inicio"=> $inicio,
				"hora_fim"=> $fim,
				"data" => $dataHoje,
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


		$data['aula'] = $this->Aula_m->obterAulas($idAula, false);
		$data['participantesAula'] = $this->Aula_m->obterParticipantesAula($idAula);
		$data['id'] = $idAula;
		
	
		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/visualizarAula',$data);
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


	public function ajax(){
		if($this->input->post('sala')){
			$idSala = $this->input->post('sala');
			$data =  $this->input->post('dataForm');
			echo json_encode($this->Aula_m->obterAulaPorSala($idSala,$data));
		}else{
			echo "0";
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