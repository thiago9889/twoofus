<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbnome extends CI_Controller {
	public function cadastro(){
	    $this->load->view("header");
	    $this->load->view("cadastro");
	}
	
		public function inserir(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {		
		$this->load->model("Usuario","usr");
		$this->load->model("UsuarioDAO","usrDAO");
		$idade = $this->usr->maior18(strtotime($this->input->post("dtNasc")));
		if ($idade >= 18){
			$options = [
    		'cost' => 11,
    		'salt' => "salççasdsadsgshfjukluilevtgrbhujiomkilufdgsrt",
			];
			$pass = password_hash($this->input->post("senha"), PASSWORD_BCRYPT, $options);
			$this->usr->criar(0,$this->input->post("email"),$pass,$this->input->post("nome"),$this->input->post("dtNasc"),$this->input->post("sexo"));
			$this->usrDAO->inserir($this->usr);
			
			header("location: /ci/dbnome/login");
		}
		else{
			header("location: /ci/dbnome/cadastro");
			
		}
		}else{
		header("location: /ci/dbnome/login");
		}
	}

	
}