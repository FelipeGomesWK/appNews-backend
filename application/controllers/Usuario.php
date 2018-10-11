<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Usuario_Model', 'usuario');
	}

	public function logar(){
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		$usuario = $this->usuario->logar($login, $senha);
		if ($this->session->has_userdata('login')){
			echo json_encode(array("status" => "true", "usuario" => $usuario));
		}else{
			echo json_encode(array("status" => "false"));
		}
	}

	public function deslogar(){
		echo json_encode($this->usuario->deslogar());
	}
}
