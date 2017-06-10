<?php
class Usuario extends CI_Model{
    private $cd_usuario, $nm_usuario, $ds_email, $cd_senha, $dt_nascimento, $ic_sexo, $cd_conecta, $cd_contacasal;
    
    public function maior18($dt_nascimento){
        $born = explode('-', date('d-m-Y', $dt_nascimento));
        $compare = explode('-', date('d-m-Y', empty($compare)? time(): $compare));
        $age = $compare[2] - $born[2];
        if($compare[1] > $born[1]) return $age;
        if($compare[1] == $born[1] && $compare[0] > $born[0]) return $age;
        return --$age;
    }
    
    public function criar($cd_usuario, $ds_email, $cd_senha, $nm_usuario, $dt_nascimento, $ic_sexo, $cd_conecta){
        $this->cd_usuario = $cd_usuario;
        $this->ds_email = $ds_email;
        $this->cd_senha = $cd_senha;
        $this->nm_usuario = $nm_usuario;
        $this->dt_nascimento = $dt_nascimento;
        $this->ic_sexo = $ic_sexo;
        $this->cd_conecta = $cd_conecta;
    }
    
    public function verificarcodigoigual(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->procurarIgual($this);
    }
    
    public function estaAutenticado(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->verificar($this);
    }
    
    public function getCodigo(){
        return $this->cd_usuario;
    }    
        
    public function getEmail(){
        return $this->ds_email;
    }
    
    public function getSenha(){
        return $this->cd_senha;
    }
    
    public function getNome(){
        return $this->nm_usuario;
    }
    
    public function getConecta(){
        return $this->cd_conecta;
    }
    public function getNomeUsuario(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->pegarNomeUsuario($this);
    }    

    public function getNomeParceiro(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->pegarNomeParceiro($this);
    }    
    
    public function getContaCasal(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->pegarContaCasal($this);
    }
    public function getMaxContaCasal(){
        $this->load->model("UsuarioDAO","usrDAO");
        return $this->usrDAO->pegarMaximo($this);
    }
    
    public function toArray(){
        $this->cd_contacasal = '1';
        return get_object_vars($this);
    }
    

}

?>

