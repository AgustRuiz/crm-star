<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Contactos_model');
	}

	public function index(){
		$this->listar();
	}

	public function listar($offset='0'){
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
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('contactos/listar', $data);
		$this->load->view('sidebars/contactos/listar');
		$this->load->view('footer');
	}

	public function ver($id=null){
		$this->load->view('header');
		$data['contacto']=$this->Contactos_model->getContacto($id);
		if($data['contacto']!=null){
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
		}else{
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		$this->load->view('footer');
	}

	public function nuevo(){
		$this->load->view('header');
		$this->load->view('contactos/nuevo');
		$this->load->view('sidebars/contactos/nuevo');
		$this->load->view('footer');
	}

	public function nuevo2(){
		$contacto = array(
			'nombre' => trim($this->input->post('txtNombre')),
			'apellidos' => trim($this->input->post('txtApellidos')),
			'nif' => (trim($this->input->post('txtNIF'))=="")?null:$this->input->post('txtNIF')
			);
		$resultado = $this->Contactos_model->insertar($contacto);

		if($resultado>0){
			//Inserción correcta
			$data = array(
				"success" => "Contacto creado correctamente"
				);
			$data['contacto']=$this->Contactos_model->getContacto($this->db->insert_id());
			// Cargar las vistas
			$this->load->view('header');
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
			$this->load->view('footer');
		}else{
			if($resultado==-1){
				// Error en la inserción
				$data["error"] = "El nombre no puede estar vacío";
				$data["contacto"] = $contacto;
			}else{
				// Error por NIF duplicado
				$data["error"] = "Ya existe un contacto con ese NIF";
				$data["contacto"] = $contacto;
			}
			$this->load->view('header');
			$this->load->view('contactos/nuevo', $data);
			$this->load->view('sidebars/contactos/nuevo');
			$this->load->view('footer');

		}
	}

	public function eliminar($id=null){
		$this->load->view('header');
		$result=$this->Contactos_model->eliminarContacto($id);
		if($result>0){
			$data=array("success"=>"Contacto eliminado");
		}else{
			$data['error']="No ha podido eliminarse el contacto";
			$data['contacto']['id']=$id;
		}
		$this->load->view('contactos/eliminar', $data);
		$this->load->view('sidebars/contactos/eliminar');
		$this->load->view('footer');
	}

	public function editar($id=null){
		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['contacto']=$this->Contactos_model->getContacto($id);
			$this->load->view('contactos/editar', $data);
			$this->load->view('sidebars/contactos/editar');
		}
		$this->load->view('footer');
	}

	public function editar2($id=null){
		$contacto = array(
			'id' => $id,
			'nombre' => trim($this->input->post('txtNombre')),
			'apellidos' => trim($this->input->post('txtApellidos')),
			'nif' => (trim($this->input->post('txtNIF'))=="")?null:$this->input->post('txtNIF')
			);
		$resultado = $this->Contactos_model->actualizar($contacto);

		if($resultado>0){
			//Edición correcta
			$data["success"] = "Contacto editado correctamente";
			$data['contacto']=$this->Contactos_model->getContacto($id);
			$this->load->view('header');
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
			$this->load->view('footer');
		}else{
			//Error al editar
			if($resultado==-1){
				// Error en la inserción
				$data["error"] = "El nombre no puede estar vacío";
				$data["contacto"] = $contacto;
			}else{
				// Error por NIF duplicado
				$data["error"] = "Ya existe un contacto con ese NIF";
				$data["contacto"] = $contacto;
			}
			$this->load->view('header');
			$this->load->view('contactos/editar', $data);
			$this->load->view('sidebars/contactos/editar');
			$this->load->view('footer');
		}
	}
}

/* End of file contactos.php */
/* Location: ./application/controllers/contactos.php */