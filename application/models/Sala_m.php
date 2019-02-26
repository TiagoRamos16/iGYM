<?php
class Sala_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();

    }

    public function obterSala($id=null){
        if($id===null){
            return $this->db->get('sala')->result_array();
        }else{
            return $this->db->get_where('sala',array('id'=>$id))->row_array();
        }
    }


}