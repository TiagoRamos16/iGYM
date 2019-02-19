<?php
class Utilizador_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
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
}