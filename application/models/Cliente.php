<?php
class Cliente_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();
    }


    //obtem funcionario com determinado cc
    public function verificaCc($cc){
        return $this->db->get_where('funcionario', array('cc' => $cc))->row_array();
    } 

    //obtem utilizador com determinado nif
    public function verificaNif($nif){
        return $this->db->get_where('funcionario', array('nif' => $nif))->row_array();
    } 

}