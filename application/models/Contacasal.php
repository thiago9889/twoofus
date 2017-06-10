<?php

class Contacasal extends CI_Model{
    private $cd_contacasal;
    
    public function criar($cd_contacasal){
        $this->cd_contacasal = $cd_contacasal;
    }
    
    public function getMaxContaCasal(){
        $this->load->model("ContacasalDAO","ctcDAO");
        return $this->ctcDAO->pegarMaximo($this);
    }
    
    public function toArray(){
        return get_object_vars($this);
    }
    

}

?>

