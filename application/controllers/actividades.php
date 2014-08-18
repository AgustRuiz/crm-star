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
	}

	private function accesoDenegado(){
		$this->load->view('header');
		$this->load->view('errores/accesoDenegado');
		$this->load->view('sidebars/actividades/index');
		$this->load->view('footer');
	}

	public function index(){
		$this->listarUsuario();
	}

	public function listar($offset=0){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->actividades_listar_todas==0){
			$this->accesoDenegado();
			return;
		}
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$actividades = new Actividad();
		$data['listaActividades'] = $actividades->order_by('inicio', 'desc')->get($limit, $offset);

		// Paginación
		$total = $actividades->count();
		$config['base_url'] = base_url().'actividades/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de actividades
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('actividades/listar', $data);
		$this->load->view('sidebars/actividades/listar');
		$this->load->view('footer');
	}

	public function listarUsuario($offset='0'){
		// Comprobar los permisos para actividades propias (más restrictivo)
		if($this->session->userdata('perfil')->actividades_listar_propias==0){
			$this->accesoDenegado();
			return;
		}

		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$actividades = new Actividad();
		$data['listaActividades'] = $actividades->where_related_usuario('id', $this->session->userdata('id'))->order_by('inicio', 'desc')->get($limit, $offset);

		// Paginación
		$total = $actividades->result_count();
		$config['base_url'] = base_url().'actividades/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de actividades
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('actividades/listar', $data);
		$this->load->view('sidebars/actividades/listarUsuario');
		$this->load->view('footer');
	}

	public function ver($id=null){
		// Comprobar los permisos para actividades propias (más restrictivo)
		if($this->session->userdata('perfil')->actividades_listar_todas==0){
			$this->accesoDenegado();
			return;
		}
		
		if($id==null){
			$this->load->view('header');
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
			$this->load->view('footer');
		}else{
			$data['actividad'] = new Actividad();
			$data['actividad']->get_by_id($id);
			if($data['actividad']->result_count()>0){
				// Comprobar los permisos para todas las actividades
				if($data['actividad']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->actividades_listar_propias==0){
					$this->accesoDenegado();
					return;
				}
				$this->load->view('header');
				$this->load->view('actividades/ver', $data);
				$this->load->view('sidebars/actividades/ver');
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
				$this->load->view('footer');
			}
		}
	}

	public function nuevo(){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->actividades_crear_todas==0 && $this->session->userdata('perfil')->actividades_crear_propias==0){
			$this->accesoDenegado();
			return;
		}
		$data['estados'] = new Actividades_estado();
		$data['estados']->get();
		$data['prioridades'] = new Prioridad();
		$data['prioridades']->get();
		$data['tipos'] = new Actividades_tipo();
		$data['tipos']->get();
		$data['actividad'] = new Actividad();
		$data['actividad']->usuario = new Usuario();
		$data['actividad']->usuario->get_by_id($this->session->userdata('id'));
		$data['actividad']->prioridad = new Prioridad();
		$data['actividad']->prioridad->get_by_id(2);
		if(isset($_GET['campanya'])){
			$data['actividad']->campanya = new Campanya();
			$data['actividad']->campanya->get_by_id($_GET['campanya']);
		}

		if(isset($_GET['contacto'])){
			$data['actividad']->contacto = new Contacto();
			$data['actividad']->contacto->get_by_id($_GET['contacto']);
		}


		$this->load->view('header');
		$this->load->view('actividades/nuevo', $data);
		$this->load->view('sidebars/actividades/nuevo');
		$this->load->view('footer');
		$this->load->view("actividades/js/include_formulario");
	}

	public function nuevo2(){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->actividades_crear_todas==0 && $this->session->userdata('perfil')->actividades_crear_propias==0){
			$this->accesoDenegado();
			return;
		}
		// Recoger el formulario
		$actividad = recogerFormulario($this->input);
		// Recoger Tipo
		$tipo = new Actividades_tipo();
		$tipo->get_by_id($this->input->post('cmbTipo'));
		$actividad->actividades_tipo = $tipo;
		// Recoger Prioridad
		$prioridad = new Prioridad();
		$prioridad->get_by_id($this->input->post('cmbPrioridad'));
		$actividad->prioridad = $prioridad;
		// Recoger Estado
		$estado = new Actividades_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$actividad->actividades_estado = $estado;
		// Recoger Contacto
		$contacto = new Contacto();
		if($this->input->post('txtIdContacto')!=''){
			$contacto->get_by_id($this->input->post('txtIdContacto'));
		}
		$actividad->contacto = $contacto;
		// Recoger Campaña
		$campanya = new Campanya();
		if($this->input->post('txtIdCampanya')!=''){
			$campanya->get_by_id($this->input->post('txtIdCampanya'));
		}
		$actividad->campanya = $campanya;
		// Recoger Usuario
		$usuario = new Usuario();
		if($this->input->post('txtIdUsuario')!=''){
			$usuario->get_by_id($this->input->post('txtIdUsuario'));
		}
		$actividad->usuario = $usuario;

		$this->load->view("header");
		if($actividad->save(array($tipo, $prioridad, $estado, $contacto, $campanya, $usuario))){
			// Inserción correcta
			$data['success'] = "Actividad creada correctamente.";
			$data['actividad'] = new Actividad();
			$data['actividad']->get_by_id($actividad->id);
			$this->load->view('actividades/ver', $data);
			$this->load->view('sidebars/actividades/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación de la actividad:<ul>";
			foreach ($actividad->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['estados'] = new Actividades_estado();
			$data['estados']->get();

			$data['prioridades'] = new Prioridad();
			$data['prioridades']->get();

			$data['tipos'] = new Actividades_tipo();
			$data['tipos']->get();

			$data["actividad"]=$actividad;

			$this->load->view('actividades/nuevo', $data);
			$this->load->view('sidebars/actividades/nuevo');
		}
		$this->load->view('footer');
		$this->load->view("actividades/js/include_formulario");
	}

	public function eliminar($id=null){
		// Comprobar los permisos
		if($data['actividad']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->actividades_eliminar_propias==0 && $this->session->userdata('perfil')->actividades_eliminar_todas==0){
			$this->accesoDenegado();
			return;
		}
		$this->load->view('header');
		$actividad = new Actividad();
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$actividad->get_by_id($id);
			if($actividad->result_count()==0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				// Comprobar los permisos
				if($actividad->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->actividades_eliminar_todas==0){
					$this->accesoDenegado();
					return;
				}
				if($actividad->delete()){
					$data=array("success"=>"Actividad eliminada");
				}else{
					$data['error']="No ha podido eliminarse la actividad";
					$data['actividad']['id']=$id;
				}
				$this->load->view('actividades/eliminar', $data);
				$this->load->view('sidebars/actividades/eliminar');
			}
			$this->load->view('footer');
		}
	}

	public function editar($id=null){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->actividades_editar_todas==0 && $this->session->userdata('perfil')->actividades_editar_propias==0){
			$this->accesoDenegado();
			return;
		}
		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['actividad'] = new Actividad();
			$data['actividad']->get_by_id($id);
			if($data['actividad']->result_count() == 0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				// Comprobar los permisos
				if($data['actividad']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->actividades_editar_todas==0){
					$this->accesoDenegado();
					return;
				}
				$data['estados'] = new Actividades_estado();
				$data['estados']->get();
				$data['prioridades'] = new Prioridad();
				$data['prioridades']->get();
				$data['tipos'] = new Actividades_tipo();
				$data['tipos']->get();
				$this->load->view('actividades/editar', $data);
				$this->load->view('sidebars/actividades/editar');
			}
		}
		$this->load->view('footer');
		$this->load->view("actividades/js/include_formulario");
	}

	public function editar2($id=null){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->actividades_editar_todas==0 && $this->session->userdata('perfil')->actividades_editar_propias==0){
			$this->accesoDenegado();
			return;
		}
		$actividad = new Actividad();
		$actividad->get_by_id($id);
		// Comprobar los permisos
		if($data['actividad']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->actividades_editar_todas==0){
			$this->accesoDenegado();
			return;
		}
		// Recoger el formulario
		$actividadEditada = recogerFormulario($this->input);
		$actividad->asunto = $actividadEditada->asunto;
		$actividad->inicio = $actividadEditada->inicio;
		$actividad->fin = $actividadEditada->fin;
		$actividad->descripcion = $actividadEditada->descripcion;
		$actividad->resultado = $actividadEditada->resultado;
		// Recoger Tipo
		$tipo = new Actividades_tipo();
		$tipo->get_by_id($this->input->post('cmbTipo'));
		$actividad->actividades_tipo = $tipo;
		// Recoger Prioridad
		$prioridad = new Prioridad();
		$prioridad->get_by_id($this->input->post('cmbPrioridad'));
		$actividad->prioridad = $prioridad;
		// Recoger Estado
		$estado = new Actividades_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$actividad->actividades_estado = $estado;
		// Recoger Contacto
		$contacto = new Contacto();
		$contacto->get_by_id($this->input->post('txtIdContacto'));
		if($contacto->result_count() == 0){
			$actividad->delete($actividad->contacto);
		}else{
			$actividad->contacto = $contacto;
		}
		// Recoger Campaña
		$campanya = new Campanya();
		$campanya->get_by_id($this->input->post('txtIdCampanya'));
		if($campanya->result_count == 0){
			$actividad->delete($actividad->campanya);
		}else{
			$actividad->campanya = $campanya;
		}
		// Recoger Usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->input->post('txtIdUsuario'));
		if($usuario->result_count() == 0){
			$actividad->delete($actividad->usuario);
		}else{
			$actividad->usuario = $usuario;
		}

		$this->load->view("header");
		if($actividad->save(array($tipo, $prioridad, $estado, $contacto, $campanya, $usuario))){
			// Inserción correcta
			$data['success'] = "Actividad creada correctamente.";
			$data['actividad'] = new Actividad();
			$data['actividad']->get_by_id($actividad->id);
			$this->load->view('actividades/ver', $data);
			$this->load->view('sidebars/actividades/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación de la actividad:<ul>";
			foreach ($actividad->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['estados'] = new Actividades_estado();
			$data['estados']->get();

			$data['prioridades'] = new Prioridad();
			$data['prioridades']->get();

			$data['tipos'] = new Actividades_tipo();
			$data['tipos']->get();

			$data["actividad"]=$actividad;

			$this->load->view('actividades/editar', $data);
			$this->load->view('sidebars/actividades/editar');
		}
		$this->load->view('footer');
		$this->load->view("actividades/js/include_formulario");
	}

	public function include_busqueda_actividad($offset='0'){
		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();

		$data['listaActividades'] = new Actividad();
		if($consulta==null){
			$data['listaActividades']->where_related_usuario('id', $this->session->userdata('id'))->get($limit, $offset);
			$total = $data['listaActividades']->count();
			$config['per_page'] = $limit;
		}else{
			$data['listaActividades']
			->where_related_usuario('id', $this->session->userdata('id'))
			->group_start()
			->ilike('asunto', $consulta)
			->or_ilike('descripcion', $consulta)
			->group_end()
			->get();
			$total = $data['listaActividades']->result_count();
			$config['per_page'] = $limit = $total;
		}

		$config['base_url'] = base_url().'actividades/include_busqueda_contacto/';
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
		$this->load->view('actividades/popups/buscar',$data);
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id=null){
	$actividad = new Actividad();

	$actividad->asunto = strip_tags(trim($input->post('txtAsunto')));
	$actividad->descripcion = nl2br(strip_tags(trim($input->post('txtDescripcion'))));
	$actividad->resultado = nl2br(strip_tags(trim($input->post('txtResultado'))));

	if($id!=null){
		$actividad->id=$id;
	}

	if($input->post('txtInicioTimestamp')!=0){
		$actividad->inicio = date("Y-n-j H:i:s", strip_tags(trim($input->post('txtInicioTimestamp'))));
	}else{
		$actividad->inicio = null;
	}

	if($input->post('txtFinTimestamp')!=0){
		$actividad->fin = date("Y-n-j H:i:s", strip_tags(trim($input->post('txtFinTimestamp'))));
	}else{
		$actividad->fin = null;
	}

	return $actividad;
}

/* End of file actividades.php */
/* Location: ./application/controllers/actividades.php */