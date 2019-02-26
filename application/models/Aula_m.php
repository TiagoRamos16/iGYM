<?php
class Aula_m extends CI_Model {
         
    public function __construct()  {
        parent::__construct();

    }

    public function obterAulas($id=false, $idFunc=false){
        if($id!=false){
            return $this->db->get_where('aula',array('id'=>$id))->row_array();
        }else if($idFunc!=false){
            
            return $this->db->get_where('aula',array('funcionario_admin_id'=>$idFunc))->result_array();


        }else{
            return $this->db->get('aula')->result_array();
        }
    }

    
    public function obterAulasPorUtilizador($idFunc){
        
        // $this->db->order_by("hora_inicio", "asc");
        $date = date('Y-m-d');

        $this->db->select('a.hora_inicio, a.hora_fim, a.nome "nomeAula", a.duracao, a.lotacao, s.nome "nomeSala", a.data, a.tipo,a.id');
        $this->db->from('aula a');
        $this->db->join('sala s', 'a.sala_id = s.id');
        $this->db->where(array('a.funcionario_admin_id'=>$idFunc, 'a.data >= ' => $date));
        
        return $this->db->get()->result_array();
    }


    public function insereAula($data){
        return $this->db->insert('aula', $data);
    }

    public function obterAulaPorSala($idSala,$data){
        $this->db->order_by("hora_inicio", "asc");

        $this->db->select('a.hora_inicio, a.hora_fim, a.nome "nomeAula", a.duracao, a.lotacao, f.nome "nomeFunc"');
        $this->db->from('aula a');
        $this->db->join('funcionario f', 'a.funcionario_admin_id = f.admin_id');
        $this->db->where(array('a.sala_id'=>$idSala,'a.data'=>$data));
        
        return $this->db->get()->result_array();
         
    }

    public function obterParticipantesAula($idAula){
        $this->db->select('c.admin_id "clienteId", c.nome "clienteNome",c.telefone');
        $this->db->from('aula_has_cliente ac');
        $this->db->join('cliente c', 'c.admin_id = ac.id_cliente');
        $this->db->where(array('id_aula'=>$idAula));
        
        return $this->db->get()->result_array();
    }


    public function eliminarAula($id){
        $this->db->delete('aula', array('id' => $id));
    }



    public function eliminarClienteAula($idAula,$idUtilizador){
        $this->db->delete('aula_has_cliente', array('id_cliente' => $idUtilizador,"id_aula" => $idAula));
    }

    public function obterHistoricoAulas($idFuncionario){
           // $this->db->order_by("hora_inicio", "asc");
           $date = date('Y-m-d');

           $this->db->select('a.hora_inicio, a.hora_fim, a.nome "nomeAula", a.duracao, a.lotacao, s.nome "nomeSala", a.data, a.tipo,a.id');
           $this->db->from('aula a');
           $this->db->join('sala s', 'a.sala_id = s.id');
           $this->db->where(array('a.funcionario_admin_id'=>$idFuncionario, 'a.data < ' => $date));
           
           return $this->db->get()->result_array();
    }




}