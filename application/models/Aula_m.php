<?php
class Aula_m extends CI_Model 
{
         
    public function __construct()  {
        parent::__construct();

    }

    public function obterAulas( $id=false, $idFunc=false ){
        if( $id != false ){
            return $this->db->get_where('aula',array('id' => $id ) )->row_array();
        }else if($idFunc!=false){
            
            return $this->db->get_where('aula',array('funcionario_admin_id' => $idFunc))->result_array();


        }else{
            return $this->db->get('aula')->result_array();
        }
    }


    public function obterAulasCalendario(){

        $this->db->select('nome "title", data_inicio "start", data_fim "end", id');
        return $this->db->get('aula')->result_array();
        
    }

    public function obterAulasCliente($idCliente){

        $this->db->select('aula.nome "title", aula.data_inicio "start", aula.data_fim "end", aula.id');
        $this->db->from('aula');
        $this->db->join('aula_has_cliente ','aula_has_cliente.id_aula = aula.id');
        $this->db->where('id_cliente', $idCliente);

        return $this->db->get()->result_array();
        
    }

    public function verificaVagasAula($idAula){

        $this->db->select('*');
        $this->db->from('aula_has_cliente');
        $this->db->where('id_aula', $idAula);
        return $this->db->get()->result_array();
        
    }


    public function verificaInscricaoAula($idAula, $idCliente){

        $this->db->select('*');
        $this->db->from('aula_has_cliente');
        $this->db->where('id_aula', $idAula);
        $this->db->where('id_cliente', $idCliente);
        return $this->db->get()->result_array();
        
    }

    public function novaInscricaoAula($novaInscricao){
        return $this->db->insert('aula_has_cliente', $novaInscricao);
    }

    public function eliminarInscricaoAula($idAula, $idCliente){
        $this->db->where('id_cliente', $idCliente);
        $this->db->where('id_aula', $idAula);
        return $this->db->delete('`aula_has_cliente`');
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

    public function obterParticipantesAula($idAula,$estado){
        $this->db->select('c.admin_id "clienteId", c.nome "clienteNome",c.telefone');
        $this->db->from('aula_has_cliente ac');
        $this->db->join('cliente c', 'c.admin_id = ac.id_cliente');
        $this->db->where(array('ac.id_aula'=>$idAula,'ac.ac_estado'=>$estado));
        
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


    public function obterSala($idSala=false){
        if($idSala==false){
            return $this->db->get('sala')->result_array();
        }else{
            return $this->db->get_where('sala',array('id'=>$idSala))->row_array();
        }
       
    }

    //verifica se uma aula pertence a um determina funcionario
    public function verificaAulaFuncionario($idFuncionario, $idAula){
        return $this->db->get_where('aula',array("id"=>$idAula,"funcionario_admin_id"=>$idFuncionario))->row_array();
    }


    //editar aula_has_cliente
    public function editarExercicio($data,$idAula,$idCliente){

        $this->db->update('aula_has_cliente', $data, array("id_aula" => $idAula,"id_cliente" => $idCliente) );
    }






}