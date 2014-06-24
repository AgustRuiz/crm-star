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


	public function listar($offset='0')
	{
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$total = $this->Contactos_model->countContactos();
		$data['listaContactos'] = $this->Contactos_model->getContactos($limit, $offset);
		$config['base_url'] = base_url().'contactos/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de contactos
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;

		// Cargar las vistas
		// Cabecera
		$this->load->view('header');
		// Contenido principal
		$this->load->view('contactos/listar', $data);
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