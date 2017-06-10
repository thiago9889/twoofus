<?php
class EventoDAO extends CI_Model{
   
    public function pegarEventos(Evento $evt){
        $this->db->select('*');
        $this->db->from('evento');
        $this->db->where('cd_contacasal', $evt->getContaCasal() );
        $query=$this->db->get();
        return $query->result_array();
    }
    public function inserir(Evento $evt){
        $this->db->insert("evento",$evt->toArray());
    }
public function excluir($id){
        $this->db->where('cd_evento', $id);
        $this->db->delete('evento');
    }    
}
?>