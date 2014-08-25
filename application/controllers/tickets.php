<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
		$this->load->library('pagination');
	}

	private function accesoDenegado(){
		$this->load->view('header');
		$this->load->view('errores/accesoDenegado');
		$this->load->view('sidebars/tickets/index');
		$this->load->view('footer');
	}

	public function index(){
		$this->listarUsuario();
	}

	public function listar($offset='0'){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/tickets/listar");
		$this->load->view("footer");
	}

	public function listarUsuario($offset='0'){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/tickets/listarUsuario");
		$this->load->view("footer");
	}

	public function nuevo(){



		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_crear==0){
			$this->accesoDenegado();
			return;
		}

		$data['estados']=new Tickets_estado();
		$data['estados']->get();
		$data['prioridades']=new Prioridad();
		$data['prioridades']->get();
		$this->load->view("header");
		$this->load->view("tickets/nuevo", $data);
		$this->load->view("sidebars/tickets/nuevo");
		$this->load->view("footer");
		$this->load->view("tickets/js/include_formulario");
	}

	public function nuevo2(){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/error404");
		$this->load->view("footer");
	}

	public function ver($id=null){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/error404");
		$this->load->view("footer");
	}

	public function editar($id=null){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/error404");
		$this->load->view("footer");
	}

	public function editar2($id=null){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/error404");
		$this->load->view("footer");
	}

	public function eliminar($id=null){
		$this->load->view("header");
		$this->load->view("noDesarrollado");
		$this->load->view("sidebars/error404");
		$this->load->view("footer");
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_ticket=null)
{
	$ticket = new Ticket();
	return $ticket;
}

/* End of file tickets.php */
/* Location: ./application/controllers/tickets.php */