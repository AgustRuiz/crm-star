<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
	}

	public function index()
	{
		//Cabecera
		$this->load->view('header');
		//Contenido principal
		$this->load->view('plantilla');
		//Sidebar de operaciones
		$this->load->view('sidebar');
		//Footer
		$this->load->view('footer');
	}
}
