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

	public function login(){
	    $this->load->view("header");
		$this->load->view("login");
	}
	
	public function conexao(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {
		$this->load->view("header");
	    $this->load->view("conexao");
		}else{
		header("location: /ci/dbnome/login");
		}

	}
	public function autentica(){
		$this->load->model("Usuario","usr");
		$email = $this->input->post("email");
		$this->usr->criar(0,$this->input->post("email"),$this->input->post("senha"),"","","");
		$email2 = $this->usr->getEmail();
		$senha2 = $this->usr->getSenha();
		if($this->usr->estaAutenticado())
		{
			$this->session->set_userdata("_LOGIN",$email);
				if ($this->usr->getContaCasal() == 1)
				{
					header("location: /ci/dbnome/conexao");
				}
				else
				{
					header("location: /ci/dbnome/principal");
				}
		}else
		{
			header("location: /ci/dbnome/login");echo "Autenticação necessária";
		}
	}
	public function logout(){
		$this->session->unset_userdata("_LOGIN");
		header("location: /ci/dbnome/login");
	}
	public function codigoconexao(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {
		$this->load->model("Contacasal", "ctc");
		$this->load->model("Usuario","usr");
		$this->load->model("UsuarioDAO","usrDAO");
		$data2["login"] = $this->session->userdata("_LOGIN");
		$this->usr->criar(0,$data2["login"],"","","","","");
		$codigoconecta = $this->usrDAO->pegarcodigo($this->usr);
			if ($codigoconecta == NULL){
					$data['codigonovo'] = ($this->ctc->getMaxContaCasal())+1;
					$this->ctc->criar($data['codigonovo']);
					$this->ctcDAO->inserir($this->ctc);
					$this->usr->criar(0,$data2["login"],"","","","",$data['codigonovo']);
					$this->usrDAO->atualizaconecta($this->usr);
					$this->load->view("header");
	    			$this->load->view("codigoconexao", $data);
			}else{
				$data['codigonovo'] = $codigoconecta;
				$this->load->view("header");
	    		$this->load->view("codigoconexao", $data);
			}
		}else{
		header("location: /ci/dbnome/login");
		}			
	}
	public function verificarconecta(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {		
		$this->load->model("Usuario","usr");
		$this->load->model("UsuarioDAO","usrDAO");
		$cd_conecta = $this->input->post("cd_conecta");
		$data2["login"] = $this->session->userdata("_LOGIN");
		$this->usr->criar(0,$data2["login"],"","","","",$cd_conecta);
			if ($this->usr->getContaCasal() == 1)
			{
				$this->usrDAO->atualizaconecta($this->usr);
				$cd_usuario_igual = $this->usr->verificarcodigoigual();
					if ($cd_usuario_igual == NULL){
						header("location:javascript://history.go(-1)");
					}else{
						$this->load->model("UsuarioDAO","usrDAO");
						$this->usr->criar(0,$data2["login"],"","","","",$cd_conecta);
						$this->usrDAO->alterarCodigoCasal1($this->usr);
						$this->usr->criar($cd_usuario_igual[0]['cd_usuario'],"","","","","",$cd_conecta);
						$this->usrDAO->alterarCodigoCasal2($this->usr);						
						header("location: /ci/dbnome/principal");
					}
			}else{
			header("location: /ci/dbnome/principal");			
			}
		}else{
		header("location: /ci/dbnome/login");
		}
	}
public function	cadastraevento(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {
		$this->load->view("header");
		$this->load->view("cadastraevento");		
		}else{
		header("location: /ci/dbnome/login");
		}		

	}

public function inserirevento(){
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {		
		$this->load->model("Evento","evt");
		$this->load->model("EventoDAO","evtDAO");
		$this->load->model("Usuario","usr");
		$data["login"] = $this->session->userdata("_LOGIN");
		$this->usr->criar(0,$data["login"],"","","","","");
		$codigo_casal = $this->usr->getContaCasal();
		$this->evt->criar(0,$this->input->post("nome"),$this->input->post("data"),$this->input->post("hora"),$codigo_casal);
		$this->evtDAO->inserir($this->evt);
		header("location: /ci/dbnome/principal");
		}else{
		header("location: /ci/dbnome/login");		
		}
	}

public function deletarevento() {
		$login = $this->session->userdata("_LOGIN");
		if (isset($login)) {		
        $id = $this->input->post('id');
        $this->load->model("EventoDAO","evtDAO");
        $this->evtDAO->excluir($id);
		}else{
		header("location: /ci/dbnome/login");		
		}
    }
	
	
}