<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Noticia extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Noticia_Model', 'noticia');
	}

	public function listar(){
		$lista = $this->notocia->lista();
		echo json_encode($lista);
	}

	public function pesquisa(){
		$texto = $this->input->post('texto');
		$lista = $this->noticia->pesquisa($texto);
		echo json_encode($lista);
	}

	public function conteudo(){
		$filtro = $this->uri->uri_to_assoc();
		$conteudo = $this->noticia->conteudo($filtro['id']);
		echo json_encode($conteudo);
	}
}
