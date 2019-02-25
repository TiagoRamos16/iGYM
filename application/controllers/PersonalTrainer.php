<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalTrainer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('Cliente_m');

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
		// $prefs = array(
		// 	'start_day'    => 'saturday',
		// 	'month_type'   => 'long',
		// 	'day_type'     => 'short'
		// );
		// $prefs = array(
		// 	'show_next_prev'  => TRUE,
		// 	// 'next_prev_url'   => base_url('personalTrainer/horario')
		// );

		$prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}';

		$this->load->library('calendar',$prefs);
		$data['title'] = 'Horario'; 

		$data2 = array(
			3  => 'http://example.com/news/article/2006/06/03/',
			7  => 'http://example.com/news/article/2006/06/07/',
			13 => 'http://example.com/news/article/2006/06/13/',
			26 => 'http://example.com/news/article/2006/06/26/'
		);

		$data['data2'] = $data2;

		// print_r($this->session->userdata('sessao_utilizador'));

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/horario');
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

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav_top');
		$this->load->view('templates/nav_lateral_funcionario');
		$this->load->view('PersonalTrainer/aulas');
		$this->load->view('templates/footer');
	}


	

}
