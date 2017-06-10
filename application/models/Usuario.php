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