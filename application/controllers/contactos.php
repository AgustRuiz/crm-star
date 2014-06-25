<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->db = $this->load->database('default', TRUE); 
		$this->load->library('pagination');
		// $this->load->helper('url');
		$this->load->model('Contactos_model');
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

	public function ver($id=null){
		// Cargar las vistas
		// Cabecera
		$this->load->view('header');
		// Contenido principal
		if($id==null){
			$this->load->view('errores/error404');
			// Sidebar de operaciones
			$this->load->view('sidebars/error404');
		}
		else{
			$data['contacto']=$this->Contactos_model->getContacto($id);
			$this->load->view('contactos/ver', $data);
			// Sidebar de operaciones
			$this->load->view('sidebars/contactos');
		}
		// Footer
		$this->load->view('footer');
	}

	public function nuevo(){
		if($this->input->post("submit")){
			$contacto = array(
				'nombre' => $this->input->post('txtNombre'),
				'apellidos' => $this->input->post('txtApellidos'),
				'nif' => $this->input->post('txtNIF')
				);

			$resultado = $this->Contactos_model->insertar($contacto);

			if($resultado>0){
				//Inserción correcta
				$data = array(
					"success" => "Contacto creado correctamente"
					);
				// Cargar las vistas
				// Cabecera
				$this->load->view('header');
				// Contenido principal
				$data['contacto']=$this->Contactos_model->getContacto($this->db->insert_id());
				$this->load->view('contactos/ver', $data);
				// Sidebar de operaciones
				$this->load->view('sidebars/contactos');
				// Footer
				$this->load->view('footer');
			}else if($resultado==-1){
				//Error en la inserción
				$data = array(
					"error" => "El nombre no puede estar vacío",
					"contacto" => $contacto
					);
				// Cargar las vistas
				// Cabecera
				$this->load->view('header');
				// Contenido principal
				$this->load->view('contactos/nuevo', $data);
				// Sidebar de operaciones
				$this->load->view('sidebars/contactos');
				// Footer
				$this->load->view('footer');
			}else{
				$data = array(
					"error" => "El nombre no puede estar vacío",
					"contacto" => $contacto
					);
			}




			// $data = array("status" => $resultado);






		}else{
			// Cargar las vistas
			// Cabecera
			$this->load->view('header');
			// Contenido principal
			$this->load->view('contactos/nuevo');
			// Sidebar de operaciones
			$this->load->view('sidebars/contactos');
			// Footer
			$this->load->view('footer');
		}
	}


	/*=== ESTO ES PROVISIONAL===*/
	public function recibido(){
		// echo '<pre>'.print_r($this).'</pre>';
		echo "<h3>Hola, soy un target</h3>";
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('txtNombre', 'Username', 'trim|requrired');
		echo "<h5>".$this->input->post("txtNombre")."</h5>";
		echo "<h5>".$this->input->post("txtApellidos")."</h5>";
		echo "<h5>".$this->input->post("txtNIF")."</h5>";
	}
}

/* End of file contactos.php */
/* Location: ./application/controllers/contactos.php */