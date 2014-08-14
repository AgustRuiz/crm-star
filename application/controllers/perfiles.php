<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfiles extends CI_Controller {

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
		$this->load->view('sidebars/perfiles/ver');
		$this->load->view('footer');
	}

	public function index(){
		$this->listar();

	}

	public function listar($offset='0'){

		// Comprobar los permisos
		if($this->session->userdata('perfil')->perfiles_listar==0){
			$this->accesoDenegado();
			return;
		}

		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$perfil = new Perfil();
		$data['listaPerfiles'] = $perfil->get($limit, $offset);
		
		// Paginación
		$total = $perfil->count();
		$config['base_url'] = base_url().'perfiles/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();

		// Número de perfiles
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;

		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('perfiles/listar', $data);
		$this->load->view('sidebars/perfiles/listar');
		$this->load->view('footer');

	}

	public function ver($id=null){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->perfiles_listar==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{

			$perfil = new Perfil();
			$perfil->get_by_id($id);

			$data['perfil']=$perfil;

			if($perfil->result_count()>0){
				$this->load->view('perfiles/ver', $data);
				$this->load->view('sidebars/perfiles/ver');
			}else{
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}
		}
		$this->load->view('footer');
	}

	public function miPerfil(){
		$this->load->view('header');
		$perfil = new Perfil();
		$perfil->get_by_id($this->session->userdata('perfil')->id);
		$data['perfil']=$perfil;

		if($perfil->result_count()>0){
			$this->load->view('perfiles/verPerfil', $data);
			$this->load->view('sidebars/perfiles/ver');
		}else{
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		$this->load->view('footer');
	}
}

/* End of file perfiles.php */
/* Location: ./application/controllers/perfiles.php */