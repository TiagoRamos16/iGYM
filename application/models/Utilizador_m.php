<?php
class Utilizador_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }

    // envia dados dos planos para criar tabela
    public function queryPlanos()
    {
        // $this->db->select('id, nome, tempo_fidelizacao, periodicidade, preco, cardiofit_musculacao, consulta_nutricao, avaliacao_fisica, aulas_grupo, identificacao');
        $query = $this->db->get('plano_adesao');
        return $query->result_array();
    }

    // verifica se o token do plano escolhido existe na base de dados para prevenir alteracao por F12
    public function confirmaPlano($planoEscolhido)
    {
        return $this->db->get_where('plano_adesao', array('identificacao' => $planoEscolhido))->row_array();
    }

    //obtem funcionario com determinado cc
    public function verificaCc($cc){
        return $this->db->get_where('cliente', array('cc' => $cc))->row_array();
    } 

    //obtem utilizador com determinado nif
    public function verificaNif($nif){
        return $this->db->get_where('cliente', array('nif' => $nif))->row_array();
    }


    //obtem utilizador com determinado email
    public function verificaEmail($email){
        return $this->db->get_where('admin', array('email' => $email))->row_array();
    }  

     //obtem utilizador com determinado username
     public function verificaUsername($username){
        return $this->db->get_where('admin', array('username' => $username))->row_array();
    }  

    //autizalica campo de password
    public function updatePassword($password,$id){
        $this->db->set('password', $password);
        $this->db->where('id', $id);
        $this->db->update('admin');
    }

    //insere token
    public function insereToken($token){
        return $this->db->insert("token",$token);
    }
    
    //ontem tokem associado a um utilizador
    public  function verificaToken($idUtilizador){
        return $this->db->get_where('token', array('id_utilizador'=>$idUtilizador))->row_array();    
    }

    //faz update ao token
    public  function updateToken($tokenValue,$idUtilizador){
        $this->db->where('id_utilizador', $idUtilizador);
        return $this->db->update('token', array('value'=>$tokenValue));   
    }

    //elimina token
    public  function eliminaToken($tokenValue){
        $this->db->where('value', $tokenValue);
        return $this->db->delete('token');    
    }

    //insere dados do Cliente comuns à tabela admin
    public  function insereTabelaAdmin($arrayUtilizador){
        // insere dados
        $this->db->insert('admin', $arrayUtilizador);
        // verifica id dos dados inseridos
        $this->db->select('id');
        $this->db->from('admin');
        $this->db->where('email', $arrayUtilizador['email']);
        $query = $this->db->get();
        return $query->row_array()['id'];
    }

    //insere utilizador na base de dados
    public  function insereTabelaCliente($arrayCliente){

        $this->db->insert('cliente', $arrayCliente); 
    }



    //obter utilizador

    public function obterUtilizador($id=false){
        if($id===false){
            return $this->db->get('admin')->result_array();
        }else{
            return $this->db->get_where('admin',array('id'=>$id))->row_array();
        }
    }

    //obter utilizador associado a um funcionário
    
    public function obterUtilizadorPorFuncinario($idFuncionario,$pesquisa=false,$estado){
        
        $this->db->select('*');
        $this->db->from('funcionario_has_cliente fc');
        $this->db->join('funcionario f', 'fc.funcionario_admin_id = f.admin_id');
        $this->db->join('cliente c', 'fc.cliente_admin_id = c.admin_id');
        $this->db->join('admin a', 'c.admin_id = a.id');
        $this->db->where(array('f.admin_id'=>$idFuncionario));

        if($pesquisa!=false){
            $this->db->like(array('c.nome'=>$pesquisa)); 
        }
        if($estado!=false){
            $this->db->where(array('a.estado'=>$estado)); 
        }
           
        return $this->db->get()->result_array();
       
       
    }


    //obter funcionário

    public function obterFuncionario($id=false){
        if($id===false){
            return $this->db->get('funcionario')->result_array();
        }else{
            return $this->db->get_where('funcionario',array('admin_id'=>$id))->row_array();
        }
    }

     //obter cliente

     public function obterCliente($id=false){
        if($id===false){
            return $this->db->get('cliente')->result_array();
        }else{
            return $this->db->get_where('cliente',array('admin_id'=>$id))->row_array();
        }
    }



    //update admin

    public function editarUtilizador($data,$id){

        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    //update funcionario

    public function editarFuncionario($data,$id){
        $this->db->where('admin_id', $id);
        $this->db->update('funcionario', $data);
    }

    //adicionar dados  a tabela funcionario_has_cliente

    public function associarFuncionarioCliente($dados){
        return $this->db->insert("funcionario_has_cliente",$dados);
    }

    //verifica se funcionario ja esta associado a utilizador
    
    public function verificaFuncionarioCliente($idCliente,$idFuncionario){
        return $this->db->get_where('funcionario_has_cliente',array('cliente_admin_id'=>$idCliente,'funcionario_admin_id'=>$idFuncionario))->row_array();
    }


    //listar pedidos por aceitar de cada utilizador

    public function listaPedidoPendentesPorUtilizador($idFuncionario,$estado){
        $this->db->join('cliente c', 'fc.cliente_admin_id = c.admin_id');
        return $this->db->get_where('funcionario_has_cliente fc',array('funcionario_admin_id'=>$idFuncionario,"fc_estado"=>$estado))->result_array();
    }

    //update funcionario_has_cliente

    public function editarFuncionarioHasCliente($data,$id){

        $this->db->where('id', $id);
        $this->db->update('funcionario_has_cliente', $data);
    }



   
}