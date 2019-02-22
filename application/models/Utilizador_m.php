<?php
class Utilizador_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }

        
        public function queryPlanos()
        {
            $this->db->select('id, nome, tempo_fidelizacao, periodicidade, preco, cardiofit_musculacao, consulta_nutricao, avaliacao_fisica, aulas_grupo');
            $query = $this->db->get('plano_adesao');
            return $query->result_array();
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


    
    //obter utilizador

    public function obterUtilizador($id=false){
        if($id===false){
            return $this->db->get('admin')->result_array();
        }else{
            return $this->db->get_where('admin',array('id'=>$id))->row_array();
        }
    }

    //obter funcionário

    public function obterFuncionario($id=false){
        if($id===false){
            return $this->db->get('funcionario')->result_array();
        }else{
            return $this->db->get_where('funcionario',array('admin_id'=>$id))->row_array();
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

   
}