<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	public function index()
	{
		// error_reporting(E_ALL);

		// Cargar los modelos
		$this->load->model('Contactos_model');

		// Consultar la lista de contactos
		$listaContactos = $this->Contactos_model->getContactos();

		// Obtenemos el ResultSet de la lista de contactos
		$datos_vista = array('rs_listaContactos' => $listaContactos);



		// Cargar las vistas
		// Cabecera
		$this->load->view('header');
		// Contenido principal
		$this->load->view('contactos/listar', $datos_vista);
		// Sidebar de operaciones
		$this->load->view('sidebars/contactos');
		// Footer
		$this->load->view('footer');
	}

	public function listar(){
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */