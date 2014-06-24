<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE); 
		$this->load->library('pagination');
		$this->load->model('Contactos_model');
		$this->load->helper(array('url'));
	}

	public function index(){
		$this->listar();
	}

	public function listar()
	{
		// Cargar los modelos
		// $this->load->model('Contactos_model');
		// Consultar la lista de contactos
		$listaContactos = $this->Contactos_model->getContactos();
		$numContactos = $this->Contactos_model->countContactos();
		// Obtenemos el ResultSet de la lista de contactos
		$datos_vista = array(
			'listaContactos' => $listaContactos,
			'numContactos' => $numContactos
			);

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



   public function listarPaginado($offset='0')
   {
      $limit = 5;
      $total = $this->Contactos_model->countContactos();
      $data['listaContactos'] = $this->Contactos_model->getContactosPaginado($limit, $offset);
      $config['base_url'] = base_url().'contactos/listarPaginado/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '3';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      $data['title'] = 'Pagination';



		$numContactos = $this->Contactos_model->countContactos();
		$data['numContactos'] = $numContactos;

		// Cargar las vistas
		// Cabecera
		$this->load->view('header');
		// Contenido principal
		$this->load->view('contactos/listarPaginado', $data);
		// Sidebar de operaciones
		$this->load->view('sidebars/contactos');
		// Footer
		$this->load->view('footer');
   }





	public function nuevo(){

		// Cargar las vistas
		// Cabecera
		$this->load->view('header');
		// Contenido principal
		$this->load->view('noDesarrollado');
		// Sidebar de operaciones
		$this->load->view('sidebars/contactos');
		// Footer
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */