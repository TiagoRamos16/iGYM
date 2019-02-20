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


	public function registo_plano()
	{
		$data['title'] = "Escolher Plano"; 
		$data['plano'] = $this->Utilizador_m->queryPlanos();

		$this->load->view('templates/header',$data);
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo_plano', $data);
		$this->load->view('templates/footer');

	}

	public function registo($idPlano=null){
		$data['title'] = "Registo";

		if($idPlano == null){
			redirect('utilizador/registo_plano');
		}else{	
			
			
			$this->session->set_userdata('planoEscolhido', $idPlano); // id enviado por url com o id do plano ecolhido
			// $planoEscolhido = $this->session->userdata('planoEscolhido');
		
			$data['planoEscolhido'] = $idPlano;

			// var_dump ($this->session->userdata('adminRegisto'));
			// var_dump ($this->session->userdata('clienteRegisto'));
			// echo $this->session->userdata('adminRegisto')['email'];



			// var_dump ($this->session->userdata('clienteRegisto'));
			// var_dump ($this->session->userdata('planoEscolhido'));

			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			$this->form_validation->set_rules('morada', 'Morada', 'trim|required');
			$this->form_validation->set_rules('localidade', 'Localidade', 'trim|required');
			$this->form_validation->set_rules('codigoPostal', 'Código Postal', 'trim|required');
			$this->form_validation->set_rules('nacionalidade', 'Nacionalidade', 'trim|required');
			$this->form_validation->set_rules('cc', 'cc', 'trim|required');
			$this->form_validation->set_rules('nif', 'nif', 'trim|required');
			$this->form_validation->set_rules('genero', 'Genero', 'trim|required');
			$this->form_validation->set_rules('dataNascimento', 'Data de Nascimento', 'trim|required');
			$this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('passwordRegisto', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirmPasswordRegisto', 'Password', 'trim|required|matches[passwordRegisto]');
			$this->form_validation->set_rules('reg_agree', 'Check', 'required');
			

			if ($this->form_validation->run() == true) {
				$nome = $this->security->xss_clean($this->input->post("nome"));
				$morada = $this->security->xss_clean($this->input->post("morada"));
				$localidade = $this->security->xss_clean($this->input->post("localidade"));
				$codigoPostal = $this->security->xss_clean($this->input->post("codigoPostal"));
				$nacionalidade = $this->security->xss_clean($this->input->post("nacionalidade"));
				$cc = $this->security->xss_clean($this->input->post("cc"));
				$nif = $this->security->xss_clean($this->input->post("nif"));
				$genero = $this->security->xss_clean($this->input->post("genero"));
				$dataNascimento = $this->security->xss_clean($this->input->post("dataNascimento"));
				$telefone = $this->security->xss_clean($this->input->post("telefone"));
				$username = $this->security->xss_clean($this->input->post("username"));
				$email = $this->security->xss_clean($this->input->post("email"));
				$password = $this->security->xss_clean($this->input->post("passwordRegisto"));
				$email = $this->security->xss_clean($this->input->post("reg_agree"));
				$dataRegisto = date('Y-m-d');
				$passwordHash = password_hash($password, PASSWORD_DEFAULT);



				//---------------- codigo captcha------------------------------------------

				// chave do site 	6LdOt5AUAAAAAK20_UC56v2G2kHoWU8QU3zvSHx9
				// chave secreta	6LdOt5AUAAAAAPqkPCflKL_e2VGRPbeze5cAS7Pt

				if(!isset($_POST['g-recaptcha-response'])){
					$error = true;
				}else{
					$response = $_POST['g-recaptcha-response'];
					$url = 'https://www.google.com/recaptcha/api/siteverify';
					$key = '6LdOt5AUAAAAAPqkPCflKL_e2VGRPbeze5cAS7Pt';
					$data = array('secret' => $key, 'response' => $response);
					$options = array(
						'http' => array(
							'header' => "Content-type: application/x-www-form-urlencoded\r\n",
							'method' => "POST",
							'content' => http_build_query($data)
						)
					);
					$context = stream_context_create($options);
					$result = file_get_contents($url, false, $context);
					if($result === false){
						echo 'Failed to contact reCAPTCHA';
					}else{
						$result = json_decode($result);
						
						// se o captcha nao retornar sucesso envia mensagem de erro
						if(!($result->success)){
							$data['erroCaptcha'] = "Tem de preencher o captcha";
							$this->load->view('templates/header');
							// $this->load->view('templates/nav');
							$this->load->view('Utilizador/registo', $data);
							$this->load->view('templates/footer');
						}
					}
				}

				//---------------- codigo captcha------------------------------------------


				
				$arrayUtilizador = array(
					"username" => $username,
					"email" => $email,
					"password" => $passwordHash,
					"tipo" => 5,
					"estado" => 2 
				);
				$arrayCliente = array(
					"nome" => $nome,
					"genero" => $genero,
					"data_registo" => $dataRegisto,
					"morada" => $morada,
					"localidade" => $localidade,
					"codigo_postal" => $codigoPostal,
					"telefone" => $telefone,
					"nacionalidade" => $nacionalidade,
					"cc" => $cc,
					"nif" => $nif,
					"data_nascimento" => $dataNascimento,
					"ultimo_pagamento" => 0,
					"admin_id" => 3,  //mudar
					"plano_adesao_id" => $planoEscolhido
				);

				$this->session->set_userdata('adminRegisto',$arrayUtilizador);
				$this->session->set_userdata('clienteRegisto',$arrayCliente);

				$this->load->view('templates/header', $data);
				// $this->load->view('templates/nav');
				$this->load->view('Utilizador/registo_pagamento', $data);
				$this->load->view('templates/footer');

			}else{

				$this->load->view('templates/header', $data);
				// $this->load->view('templates/nav');
				$this->load->view('Utilizador/registo', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	// public function registo($id=null)
	// {

	// 	$data['id_plano'] = $id;	// id enviado por url com o id do plano ecolhido

	// 	$this->load->view('templates/header');
	// 	// $this->load->view('templates/nav');
	// 	$this->load->view('Utilizador/registo', $data);
	// 	$this->load->view('templates/footer');
	// }

	public function registo_pagamento()
	{
		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo_pagamento');
		$this->load->view('templates/footer');
	}

	public function registo_confirmacao()
	{
		$data['id_pagamento'] = $idPagamento;	// id enviado por url com o id do pagamento efectuado

		if ($idPagamento == 3){ // se for pago por transferencia bancária
			
			$data['estado_pagamento'] = 0; // aguarda confirmacao de transferencia

		}elseif(($idPagamento == 1) || ($idPagamento == 2)){ // se id = 1 -> pago por cartao  || id = 2 -> pag por paypal

			$data['estado_pagamento'] = 1; // pagamento confirmado

		}

		$this->load->view('templates/header');
		// $this->load->view('templates/nav');
		$this->load->view('Utilizador/registo_confirmacao', $data);
		$this->load->view('templates/footer');
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
