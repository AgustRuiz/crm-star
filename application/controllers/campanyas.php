<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanyas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
		$this->load->library('pagination');
		// $this->load->model('Contactos_model');
		// $this->load->model('Contactos_estado_model');
	}

	public function index(){
		$this->listar();
	}

	public function listar(){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/campanyas/listar");
		$this->load->view("footer");
	}

	public function nuevo(){
		$this->load->view("header");
		$this->load->view("campanyas/nuevo");
		$this->load->view("sidebars/campanyas/nuevo");
		$this->load->view("footer");
		$this->load->view("campanyas/js/include_formulario");
	}

}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_campanya=null)
{
	return false;
}

/* End of file campanyas.php */
/* Location: ./application/controllers/campanyas.php */