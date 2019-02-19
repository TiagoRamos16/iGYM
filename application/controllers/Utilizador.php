<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utilizador extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Utilizador_m');

	}


	public function login()
	{
		$data['title'] = 'Login';

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == true) {

			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));

            //obter utilizador por email
			$utilizador = $this->Utilizador_m->verificaEmail($email);
		
            //password verify
			$verificaPass = password_verify($password, $utilizador['password']);

			//rasmuslerdorf
			if ($verificaPass != 1) { //se dados incorrectos
				$this->session->set_flashdata('erroLogin', 'Dados de login incorretos'); //mensagem de erro
				$this->session->set_flashdata('erroEmail', $email); //email do utilizador para ser colocado como value no formulario
				redirect('utilizador/login');
			} else {
				$this->session->set_userdata($utilizador); //iniciar sessao

				if($utilizador['tipo']==1){ //redirecionar consoante o tipo de utilizador
					redirect('administrador');
				}else if($utilizador['tipo']==2){
					redirect('rececionista');
				}else if($utilizador['tipo']==3){
					redirect('personalTrainer');
				}else if($utilizador['tipo']==4){
					redirect('nutricionista');
				}else if($utilizador['tipo']==5){
					redirect('cliente');
				}
			}
		} else {
			$this->load->view('templates/header', $data);
			// $this->load->view('templates/nav');
			$this->load->view('Utilizador/login');
			$this->load->view('templates/footer');
		}



	}

	//registo
	public function registo(){
		$data['title'] = "Registo";

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == true) {

			
			
		}else{
			$this->load->view('templates/header', $data);
			// $this->load->view('templates/nav');
			$this->load->view('Utilizador/registo');
			$this->load->view('templates/footer');
		}

	}

	//logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}


	//recuperar password
	public function resetPassword(){

		$data['title'] = 'Reset Password';

		if ($this->input->post('formRegisto')) {
			$email = $this->security->xss_clean($this->input->post('email'));

			if ($this->Utilizador_m->verificaEmail($email) == null) {
				$this->session->set_flashdata('erroResetPassword', 'Email inexistente'); //mensagem de sucesso    
				$this->session->set_flashdata('email', $email); //email do utilizador para ser colocado como value no formulario
				redirect('utilizador/resetPassword');
			} else {
                //gerar token
				$tokenValue = bin2hex(random_bytes(32));;
				$idUtilizador = $this->Utilizador_m->verificaEmail($email)['id'];

				$token = array(
					"value" => $tokenValue,
					"id_utilizador" => $idUtilizador
				);

	
                //verifica se utilizador ja tem token associado
				if ($this->Utilizador_m->verificaToken($idUtilizador)) {
					$this->Utilizador_m->updateToken($tokenValue, $idUtilizador); //update token
				} else {
					$this->Utilizador_m->insereToken($token); //inserir token
				}
                
                //configurar email
				$this->load->library('email');

                //SMTP & mail configuration
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'rentacar.bravavalley@gmail.com',
					'smtp_pass' => '1a2s3d4f5g',
					'mailtype' => 'html',
					'charset' => 'utf-8'
				);
				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");

				$this->email->to('tiago.vramos16@gmail.com');
				$this->email->from('tkc@gmail.com', 'iGYM');
				$this->email->subject('Reset Password');

				$this->email->message("Click no link para fazer reset da sua password <a href='" . base_url('utilizador/validaToken?token=') . $tokenValue . "&id=" . $idUtilizador . "'>Fazer reset</a>");

                //Send email
				$this->email->send();


				$this->session->set_flashdata('sucessoResetPassword', 'Foi enviado para o seu email o link para fazer reset à sua password'); //mensagem de sucesso
				redirect('utilizador/resetPassword');
			}



		} else {
			$this->load->view('templates/header', $data);
			// $this->load->view('templates/nav');
			$this->load->view('Utilizador/resetPassword');
			$this->load->view('templates/footer');

		}


	}

	//modificar password recuperada
	public function validaToken(){
		$data['title'] = "Modificar Password";

		if ($this->input->get('token')) {
			$token = $this->input->get('token');
			$idUtilizador = $this->input->get('id');

			if ($this->Utilizador_m->verificaToken($idUtilizador) != null) {
				$tokenMail = $this->Utilizador_m->verificaToken($idUtilizador);
				if ($token == $tokenMail['value']) {
					$data['token'] = $this->Utilizador_m->verificaToken($idUtilizador);

					$this->load->view('templates/header', $data);
					// $this->load->view('templates/nav');
					$this->load->view('utilizador/modificaPassword', $data);
					$this->load->view('templates/footer');
				} else {
					echo "Seu Token não é válido";
				}


			}
		} else if ($this->input->post('submitModPassword')) {
			$tokenValue = $this->input->post('tokenValue');
			$idUtilizador = $this->input->post('userId');
			$password = $this->input->post('passwordConf');

			$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

			$this->Utilizador_m->updatePassword($passwordHashed, $idUtilizador);
			$this->Utilizador_m->eliminaToken($tokenValue);

			$this->session->set_flashdata('sucessoModPass', 'Password atualizada com sucesso'); //mensagem de sucesso
			redirect('utilizador/login');
		} else {
			// $this->load->view('templates/header', $data);
			// // $this->load->view('templates/nav');
			// $this->load->view('utilizador/modificaPassword');
			// $this->load->view('templates/footer');

			//se tentar aceder a esta função sem ver apartir do email e da password faz qq coisa
		}

	}

	public function verificaEmailAjax(){
		if($this->input->post('email')){
            if($this->Utilizador_m->verificaEmail($this->input->post('email'))!=null){
                echo "1";
            }else{
                echo "0";
            }
        }else if($this->input->post('username')){
			if($this->Utilizador_m->verificaUsername($this->input->post('username'))!=null){
                echo "1";
            }else{
                echo "0";
            }
		}
	}


}
