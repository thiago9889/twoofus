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
