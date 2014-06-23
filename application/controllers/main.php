<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
