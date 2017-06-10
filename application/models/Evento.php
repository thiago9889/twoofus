<?php
class Evento extends CI_Model{
    private $cd_evento, $nm_evento, $dt_evento, $cd_contacasal, $hr_evento;
    
    public function criar($cd_evento, $nm_evento, $dt_evento, $hr_evento, $cd_contacasal){
        $this->cd_evento = $cd_evento;
        $this->cd_contacasal = $cd_contacasal;
        $this->nm_evento = $nm_evento;
        $this->dt_evento = $dt_evento;
        $this->hr_evento = $hr_evento;
    }
    public function getEventos(){
        $this->load->model("EventoDAO","evtDAO");
        return $this->evtDAO->pegarEventos($this);
    }    
    public function getContaCasal(){
        return $this->cd_contacasal;
    }        
    public function toArray(){
        return get_object_vars($this);
    }
    
}

?>

