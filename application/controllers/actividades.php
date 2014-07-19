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
		$this->load->model('Actividades_model');
		$this->load->model('Actividades_estado_model');
		$this->load->model('Actividades_prioridad_model');
		$this->load->model('Actividades_tipo_model');
	}

	public function index(){
		$this->listar();
	}

	public function listar($offset=0){
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$data['listaActividades'] = $this->Actividades_model->getActividades($limit, $offset);
		$total = count($this->Actividades_model->getActividades(null, null));
		$config['base_url'] = base_url().'actividades/listar/';
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

		$this->load->view('header');
		$this->load->view('actividades/listar', $data);
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
		$actividad = recogerFormulario($this->input);
		$resultado = $this->Actividades_model->insertar($actividad);




		$resultado = $this->Actividades_model->insertar($actividad);
		if($resultado>0){
			$data["success"] = "Actividad creada correctamente.";
			$this->load->view('header');
			$this->load->view('noDesarrollado', $data);						// Aquí ha de ir a la vista "ver"
			$this->load->view('sidebars/actividades/nuevo');
		$this->load->view('footer');
		}else{
			switch($resultado){
				case -1: // Falta nombre
					$data["error"] = "Falta el nombre de la actividad.";
					break;
				case -2: // Falta fechaInicio
					$data["error"] = "Falta indicar el inicio de la actividad.";
					break;
				case -3: // Falta contacto
					$data["error"] = "Falta indicar el contacto relacionado con la actividad.";
					break;
				case -4: // Falta usuario
					$data["error"] = "Falta indicar el usuario relacionado la actividad.";
					break;
				default: // Error no definido
					$data["error"] = "Error al crear la actividad. Revise que todos los datos obligatorios están completados. <br/>Error nº ".mysql_errno().": ".mysql_error().".";
					break;
			}
			$data['estados']=$this->Actividades_estado_model->getEstados();
			$data['prioridades']=$this->Actividades_prioridad_model->getPrioridades();
			$data['tipos']=$this->Actividades_tipo_model->getTipos();
			$data["actividad"]=$actividad;
			$this->load->view('header');
			$this->load->view('actividades/nuevo', $data);
			$this->load->view('sidebars/actividades/nuevo');
			$this->load->view('footer');
			$this->load->view("actividades/js/include_formulario");
		}
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
function recogerFormulario($input, $id=null){
	unset($return);

	$return = array(
		'nombre' => (strip_tags(trim($input->post('txtNombre')))=="")?null:strip_tags(trim($input->post('txtNombre'))),
		'tipo' => strip_tags(trim($input->post('cmbTipo'))),
		'prioridad' => strip_tags(trim($input->post('cmbPrioridad'))),
		'estado' => strip_tags(trim($input->post('cmbEstado'))),
		'usuario' => strip_tags(trim($input->post('txtIdUsuario'))),
		'usuario_nombre' => strip_tags(trim($input->post('txtNombreUsuario'))),
		'descripcion' => nl2br(strip_tags(trim($input->post('txtDescripcion')))),
		'resultado' => nl2br(strip_tags(trim($input->post('txtResultado'))))
		);
	if($id!=null){
		$return['id']=$id;
	}
	if($input->post('txtInicioTimestamp')!=''){
		$return['inicio'] = date("Y-n-j H:i", strip_tags(trim($input->post('txtInicioTimestamp'))));
		$return['inicioTimestamp'] = strip_tags(trim($input->post('txtInicioTimestamp')));
	}else{
		$return['inicio'] = 0;
		$return['inicioTimestamp'] = 0;
	}
	if($input->post('txtFinTimestamp')!=''){
		$return['fin'] = date("Y-n-j H:i", strip_tags(trim($input->post('txtFinTimestamp'))));
		$return['finTimestamp'] = strip_tags(trim($input->post('txtFinTimestamp')));
	}else{
		$return['fin'] = 0;
		$return['finTimestamp'] = 0;
	}
	if(strip_tags(trim($input->post('txtIdContacto')))!=""){
		$return['contacto'] = strip_tags(trim($input->post('txtIdContacto')));
		$return['contacto_nombre'] = strip_tags(trim($input->post('txtNombreContacto')));
		$return['contacto_apellidos'] = null;
	}else{
		$return['contacto'] = null;
		$return['contacto_nombre'] = null;
		$return['contacto_apellidos'] = null;
	}
	if(strip_tags(trim($input->post('txtIdCampanya')))!=""){
		$return['campanya'] = strip_tags(trim($input->post('txtIdCampanya')));
		$return['campanya_nombre'] = strip_tags(trim($input->post('txtNombreCampanya')));;
	}else{
		$return['campanya'] = null;
		$return['campanya_nombre'] = null;
	}
	return $return;
}

/* End of file actividades.php */
/* Location: ./application/controllers/actividades.php */