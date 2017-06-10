<?php
class UsuarioDAO extends CI_Model{
    
    public function inserir(Usuario $usr){
        $this->db->insert("usuario",$usr->toArray());
    }
    public function verificar(Usuario $usr){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('ds_email', $usr->getEmail() );
        $options = [
    		'cost' => 11,
    		'salt' => "salççasdsadsgshfjukluilevtgrbhujiomkilufdgsrt",
		];
		$pass = password_hash($usr->getSenha(), PASSWORD_BCRYPT, $options);
        $this->db->where('ds_email', $usr->getEmail() );
        $this->db->where('cd_senha', $pass);
        $query = $this->db->get();
        return $query->num_rows() == 1;
    }
    public function atualizaconecta(Usuario $usr){
        $this->db->set('cd_conecta', $usr->getConecta())
        ->where('ds_email', $usr->getEmail())
        ->update('usuario');
    }
    
    public function alterarCodigoCasal1(Usuario $usr){
        $this->db->set('cd_contacasal', $usr->getConecta())
        ->set('cd_conecta', NULL)
        ->where('ds_email', $usr->getEmail())
        ->update('usuario');
    }
    public function alterarCodigoCasal2(Usuario $usr){
        $this->db->set('cd_contacasal', $usr->getConecta())
        ->set('cd_conecta', NULL)
        ->where('cd_usuario', $usr->getCodigo())
        ->update('usuario');
    }    
    public function pegarcodigo(Usuario $usr){
        $cdconecta = $this -> db
       -> select('cd_conecta')
       -> where('ds_email', $usr->getEmail() )
       -> limit(1)
       -> get('usuario')
       -> result_array()[0]['cd_conecta'];
        return $cdconecta;
    }
    public function procurarIgual(Usuario $usr){
        $cdusuario = $this -> db
       -> select('cd_usuario')
       -> where('cd_conecta', $usr->getConecta())
       -> where('ds_email !=', $usr->getEmail())
       -> limit(1)
       -> get('usuario')
       -> result_array();
        return $cdusuario;
    }
}

    

 
 