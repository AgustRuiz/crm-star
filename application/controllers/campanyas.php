<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanyas extends CI_Controller {

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

	public function index(){
		$this->listar();
	}

	public function listar($offset='0'){
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$campanyas = new Campanya();
		$data['listaCampanyas'] = $campanyas->get($limit, $offset);

		// Paginación
		$total = $campanyas->count();
		$config['base_url'] = base_url().'campanyas/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de usuarios
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('campanyas/listar', $data);
		$this->load->view('sidebars/campanyas/listar');
		$this->load->view('footer');
	}

	public function listarUsuario($offset='0'){
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$campanyas = new Campanya();
		$data['listaCampanyas'] = $campanyas->where_related_usuario('id', $this->session->userdata('id'))->get($limit, $offset);

		// Paginación
		$total = $campanyas->result_count();
		$config['base_url'] = base_url().'campanyas/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de usuarios
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('campanyas/listar', $data);
		$this->load->view('sidebars/campanyas/listarUsuario');
		$this->load->view('footer');
	}

	public function nuevo(){
		$data['estados']=new Campanyas_estado();
		$data['estados']->get();
		$data['tipos']=new Campanyas_tipo();
		$data['tipos']->get();
		$this->load->view("header");
		$this->load->view("campanyas/nuevo", $data);
		$this->load->view("sidebars/campanyas/nuevo");
		$this->load->view("footer");
		$this->load->view("campanyas/js/include_formulario");
	}

	public function nuevo2(){
		// Recoger el formulario e insertar el nuevo registro
		$campanya = recogerFormulario($this->input);
		$resultado = $this->Campanyas_model->insertar($campanya);

		$this->load->view("header");
		if($resultado>0){
			// Inserción correcta
			$data['success'] = "Campaña creada correctamente.";
			$data['campanya']=$this->Campanyas_model->getCampanya($this->db->insert_id());
			$this->load->view('campanyas/ver', $data);
			$this->load->view('sidebars/campanyas/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación de la campaña. (error: ".$resultado.")";
			$data['campanya'] = $campanya;
			$data['campanya']['usuario_nombre'] = $this->input->post('txtNombreUsuario');
			$data['campanya']['usuario_apellidos'] = "";
			$data['estados']=$this->Campanyas_estado_model->getEstados();
			$data['tipos']=$this->Campanyas_tipo_model->getTipos();
			$this->load->view("campanyas/nuevo", $data);
			$this->load->view("sidebars/campanyas/nuevo");
		}
		$this->load->view("footer");
		$this->load->view("campanyas/js/include_formulario");
	}

	public function ver($id=null){
		$this->load->view('header');
		
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$data['campanya'] = new Campanya();
			$data['campanya']->get_by_id($id);
			if($data['campanya']->result_count()>0){
				$this->load->view('campanyas/ver', $data);
				$this->load->view('sidebars/campanyas/ver');
			}else{
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}
			$this->load->view('footer');
		}
	}

	public function editar($id=null){
		$this->load->view('header');

		$data['estados']=$this->Campanyas_estado_model->getEstados();
		$data['tipos']=$this->Campanyas_tipo_model->getTipos();
		$data['campanya']=$this->Campanyas_model->getCampanya($id);
		if($data['campanya']!=null){
			$this->load->view('campanyas/editar', $data);
			$this->load->view('sidebars/campanyas/editar');
		}else{
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}

		$this->load->view('footer');
		$this->load->view("campanyas/js/include_formulario");
	}

	public function editar2($id=null){
		// Recoger el formulario e insertar el nuevo registro
		$campanya = recogerFormulario($this->input, $id);
		$resultado = $this->Campanyas_model->actualizar($campanya);

		if($resultado>0){
			//Edición correcta
			$data["success"] = "Campaña editada correctamente";
			$data['campanya']=$this->Campanyas_model->getCampanya($id);
			$this->load->view('header');
			$this->load->view('campanyas/ver', $data);
			$this->load->view('sidebars/campanyas/ver');
			$this->load->view('footer');
		}else{
			//Error al editar
			switch($resultado){
				default: // Error no identificado
				$data['error']='Ha ocurrido un error durante la edición de la campaña.';
				break;
			}
			$data['campanya']=$campanya;
			$data['campanya']['usuario_nombre'] = $this->input->post('txtNombreUsuario');
			$data['campanya']['usuario_apellidos'] = "";
			$data['estados']=$this->Campanyas_estado_model->getEstados();
			$data['tipos']=$this->Campanyas_tipo_model->getTipos();
			$this->load->view('header');
			$this->load->view('campanyas/editar', $data);
			$this->load->view('sidebars/campanyas/editar');
			$this->load->view('footer');
			$this->load->view("campanyas/js/include_formulario");
		}

	}

	public function eliminar($id=null){
		$this->load->view('header');
		$result=$this->Campanyas_model->eliminar($id);
		if($result>0){
			$data=array("success"=>"Campaña eliminada");
		}else{
			$data['error']="No ha podido eliminarse la campaña";
			$data['campanya']['id']=$id;
		}
		$this->load->view('campanyas/eliminar', $data);
		$this->load->view('sidebars/campanyas/eliminar');
		$this->load->view('footer');
	}

	public function include_busqueda_campanya($offset='0'){
		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		if($consulta==null){
			$data['listaCampanyas'] = $this->Campanyas_model->getCampanyas($limit, $offset, null);
		}else{
			$data['listaCampanyas'] = $this->Campanyas_model->getCampanyas(null, null, $consulta);
		}
		$total = $this->Campanyas_model->countCampanyas($consulta);
		$config['per_page'] = $limit;
		$config['base_url'] = base_url().'campanyas/include_busqueda_contacto/';
		$config['total_rows'] = $total;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de usuarios
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;
		// Cargar las vistas
		$this->load->view('campanyas/popups/buscar',$data);
	}

}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_campanya=null)
{
	$campanya = new Campanya();

	$campanya->nombre = strip_tags(trim($input->post('txtNombre')));
	$campanya->estado = strip_tags(trim($input->post('cmbEstado')));
	$campanya->tipo = strip_tags(trim($input->post('cmbTipo')));
	$campanya->objetivo = nl2br(strip_tags(trim($input->post('txtObjetivo'))));
	$campanya->descripcion = nl2br(strip_tags(trim($input->post('txtDescripcion'))));

	if($id_campanya!=null){
		$campanya->id = $id_campanya;
	}
	if($input->post('txtFechaInicioTimestamp')!=''){
		$campanya->fechaInicio = date("Y-n-j", strip_tags(trim($input->post('txtFechaInicioTimestamp'))));
	}else{
		$campanya->fechaInicio = 0;
	}
	if($input->post('txtFechaFinTimestamp')!=''){
		$campanya->fechaFin = date("Y-n-j", strip_tags(trim($input->post('txtFechaFinTimestamp'))));
	}else{
		$campanya->fechaFin = 0;
	}
	if(strip_tags(trim($input->post('txtIdUsuario')))!=""){
		$campanya->usuario = strip_tags(trim($input->post('txtIdUsuario')));
		$campanya->usuarioNombre = strip_tags(trim($input->post('txtNombreUsuario')));
	}else{
		$campanya->usuario = 0;
	}

	return $return;
}

/* End of file campanyas.php */
/* Location: ./application/controllers/campanyas.php */