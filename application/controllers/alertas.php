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

	public function listar($offset=0){
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$alertas = new Alerta();
		$data['listaAlertas'] = $alertas->where_related_usuario('id', $this->session->userdata('id'))->order_by('fechaHora', 'desc')->get($limit, $offset); /////////////////////////////////////////////////////

		// Paginación
		$total = $alertas->result_count();
		$config['base_url'] = base_url().'alertas/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de alertas
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('alertas/listar', $data);
		$this->load->view('sidebars/alertas/listar');
		$this->load->view('footer');
	}

	public function ver($id=null){
		$this->load->view('header');
		
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$data['alerta'] = new Alerta();
			$data['alerta']->get_by_id($id);
			if($data['alerta']->result_count()>0){
				$this->load->view('alertas/ver', $data);
				$this->load->view('sidebars/alertas/ver');
			}else{
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}
			$this->load->view('footer');
		}
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