<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		
		//Cabecera
		$this->load->view('header');
		//Contenido principal
		$this->load->view('errores/error404');
		//Sidebar de operaciones
		$this->load->view('sidebars/error404');
		//Footer
		$this->load->view('footer');
	}
}
