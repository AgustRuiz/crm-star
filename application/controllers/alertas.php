<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertas extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
		$this->load->library('pagination');
	}

	public function index(){
		$this->listar();
	}

	public function listar(){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/listar');
		$this->load->view('footer');
	}

	public function ver($id=null){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/ver');
		$this->load->view('footer');
	}

	public function nuevo(){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/nuevo');
		$this->load->view('footer');
	}

	public function nuevo2(){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/nuevo');
		$this->load->view('footer');
	}

	public function eliminar($id=null){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/eliminar');
		$this->load->view('footer');
	}

	public function editar($id=null){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/editar');
		$this->load->view('footer');
	}

	public function editar2($id=null){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/alertas/editar');
		$this->load->view('footer');
	}
}

/* FUNCIONES AUXILIARES */

/* End of file alertas.php */
/* Location: ./application/controllers/alertas.php */