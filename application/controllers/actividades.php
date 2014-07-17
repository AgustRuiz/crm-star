<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Controller {

	function __construct(){
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
		$this->load->library('pagination');
		// $this->load->model('Actividades_model');
		$this->load->model('Actividades_estado_model');
		$this->load->model('Actividades_prioridad_model');
		$this->load->model('Actividades_tipo_model');
	}

	public function index(){
		$this->listar();
	}

	public function listar($offset='0'){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/actividades/listar');
		$this->load->view('footer');
	}

	public function listarUsuario($offset='0'){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/actividades/listarUsuario');
		$this->load->view('footer');
	}

	public function ver($id=null){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}

	public function nuevo(){
		$data['estados']=$this->Actividades_estado_model->getEstados();
		$data['prioridades']=$this->Actividades_prioridad_model->getPrioridades();
		$data['tipos']=$this->Actividades_tipo_model->getTipos();
		
		$this->load->view('header');
		$this->load->view('actividades/nuevo', $data);
		$this->load->view('sidebars/actividades/nuevo');
		$this->load->view('footer');
		$this->load->view("actividades/js/include_formulario");
	}

	public function nuevo2(){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}

	public function eliminar($id=null){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}

	public function editar($id=null){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}

	public function editar2($id=null){
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebar');
		$this->load->view('footer');
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_actividad=null){
}

/* End of file actividades.php */
/* Location: ./application/controllers/actividades.php */