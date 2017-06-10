<?php
class ContacasalDAO extends CI_Model{
    
    public function inserir(Contacasal $ctc){
        $this->db->insert("contacasal",$ctc->toArray());
    }
    
    public function pegarMaximo(Contacasal $ctc){
        $this->db->select_max('cd_contacasal');
        $this->db->from('contacasal');
        $query=$this->db->get();
        return $query->result_array()[0]['cd_contacasal'];
    }
    
}

 
 

?>