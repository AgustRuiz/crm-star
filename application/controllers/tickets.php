<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

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
		$this->load->view('sidebars/tickets/index');
		$this->load->view('footer');
	}

	public function ordenar($columna, $orden, $offset=0, $destino='listarUsuario'){
		$config = new Configuracion();
		$config->where_related_usuario('id', $this->session->userdata('id'))->get();
		$config->tickets_columna = $columna;
		$config->tickets_orden = $orden;
		$config->save();

		redirect('/tickets/'.$destino.'/'.$offset);
	}

	public function index(){
		$this->listarUsuario();
	}

	public function listar($offset='0'){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_listar_todas==0){
			$this->accesoDenegado();
			return;
		}

		// Configuración
		$data['config'] = new Configuracion();
		$data['config']->where_related_usuario('id', $this->session->userdata('id'))->get();

		// Filtro
		if(isset($_POST['filtro'])){
			// Configuración
			$data['config']->tickets_filtro = $this->input->post('filtro');
			$data['config']->save();
		}

		// Obtener listado (parcial)
		$limit = $this->Configuration_model->rowsPerPage();
		$tickets = new Ticket();
		if($data['config']->tickets_filtro!=""){
			// Filtro
			$cadenaBusqueda = $data['config']->tickets_filtro;

			$tickets
			// ->where_related_usuario('id', $this->session->userdata('id'))
			->ilike('asunto', $cadenaBusqueda)
			->or_ilike('descripcion', $cadenaBusqueda)
			->or_ilike('resolucion', $cadenaBusqueda)
			->or_ilike_related_contacto('nombre', $cadenaBusqueda)
			->or_ilike_related_contacto('apellidos', $cadenaBusqueda)
			->or_ilike_related_usuario('nombre', $cadenaBusqueda)
			->or_ilike_related_usuario('apellidos', $cadenaBusqueda);
		}
		$data['listaTickets'] = $tickets->include_related('prioridad')->include_related('tickets_estado')->include_related('usuario')->include_related('contacto')->order_by($data['config']->tickets_columna, $data['config']->tickets_orden)->get_paged($offset, $limit, TRUE);

		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$total = $tickets->count();
		$config['base_url'] = base_url().'tickets/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de tickets
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('tickets/listar', $data);
		$this->load->view('sidebars/tickets/listar');
		$this->load->view('footer');
	}

	public function listarUsuario($offset='0'){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_listar_propias==0){
			$this->accesoDenegado();
			return;
		}

		// Configuración
		$data['config'] = new Configuracion();
		$data['config']->where_related_usuario('id', $this->session->userdata('id'))->get();

		// Filtro
		if(isset($_POST['filtro'])){
			// Configuración
			$data['config']->tickets_filtro = $this->input->post('filtro');
			$data['config']->save();
		}

		// Obtener listado (parcial)
		$limit = $this->Configuration_model->rowsPerPage();
		$tickets = new Ticket();
		$tickets->where_related_usuario('id', $this->session->userdata('id'));
		if($data['config']->tickets_filtro!=""){
			// Filtro
			$cadenaBusqueda = $data['config']->tickets_filtro;

			$tickets
			->group_start()
			->ilike('asunto', $cadenaBusqueda)
			->or_ilike('descripcion', $cadenaBusqueda)
			->or_ilike('resolucion', $cadenaBusqueda)
			->or_ilike_related_contacto('nombre', $cadenaBusqueda)
			->or_ilike_related_contacto('apellidos', $cadenaBusqueda)
			->or_ilike_related_usuario('nombre', $cadenaBusqueda)
			->or_ilike_related_usuario('apellidos', $cadenaBusqueda)
			->group_end();
		}
		$data['listaTickets'] = $tickets->include_related('prioridad')->include_related('tickets_estado')->include_related('usuario')->include_related('contacto')->order_by($data['config']->tickets_columna, $data['config']->tickets_orden)->get_paged($offset, $limit, TRUE);

		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$total = $tickets->count();
		$config['base_url'] = base_url().'tickets/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de tickets
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('tickets/listar', $data);
		$this->load->view('sidebars/tickets/listarUsuario');
		$this->load->view('footer');
	}

	public function nuevo(){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_crear_propias==0){
			$this->accesoDenegado();
			return;
		}
		$data['estados']=new Tickets_estado();
		$data['estados']->get();
		$data['prioridades']=new Prioridad();
		$data['prioridades']->get();

		$data['ticket'] = new Ticket();
		$data['ticket']->usuario = new Usuario();
		$data['ticket']->usuario->get_by_id($this->session->userdata('id'));
		$data['ticket']->prioridad = new Prioridad();
		$data['ticket']->prioridad->get_by_id(2);
		if(isset($_GET['contacto'])){
			$data['ticket']->contacto = new Contacto();
			$data['ticket']->contacto->get_by_id($_GET['contacto']);
		}

		$this->load->view("header");
		$this->load->view("tickets/nuevo", $data);
		$this->load->view("sidebars/tickets/nuevo");
		$this->load->view("footer");
		$this->load->view("tickets/js/include_formulario");
	}

	public function nuevo2(){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_crear_propias==0){
			$this->accesoDenegado();
			return;
		}
		// Recoger el formulario
		$ticket = recogerFormulario($this->input);
		// Recoger prioridad
		$prioridad = new Prioridad();
		$prioridad->get_by_id($this->input->post('cmbPrioridad'));
		$ticket->prioridad = $prioridad;
		// Recoger estado
		$estado = new Tickets_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$ticket->tickets_estado = $estado;
		// Recoger contacto
		$contacto = new Contacto();
		$contacto->get_by_id($this->input->post('txtIdContacto'));
		$ticket->contacto = $contacto;
		// Recoger usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->input->post('txtIdUsuario'));
		$ticket->usuario = $usuario;

		$this->load->view("header");
		if($ticket->save(array($prioridad, $estado, $contacto, $usuario))){
			// Inserción correcta
			$data['success'] = "Ticket creado correctamente.";
			$data['ticket'] = new Ticket();
			$data['ticket']->get_by_id($ticket->id);
			$this->load->view('tickets/ver', $data);
			$this->load->view('sidebars/tickets/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación del ticket:<ul>";
			foreach ($ticket->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['estados']=new Tickets_estado();
			$data['estados']->get();
			$data['prioridades']=new Prioridad();
			$data['prioridades']->get();

			$data["ticket"]=$ticket;

			$this->load->view('tickets/nuevo', $data);
			$this->load->view('sidebars/tickets/nuevo');
		}
		$this->load->view('footer');
		$this->load->view("tickets/js/include_formulario");
	}

	public function ver($id=null){
		// Comprobar permisos
		if($this->session->userdata('perfil')->tickets_listar_todas==0 && $this->session->userdata('perfil')->tickets_listar_propias==0){
			$this->accesoDenegado();
			return;
		}
		
		if($id==null){
			$this->load->view('header');
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
			$this->load->view('footer');
		}else{
			$data['ticket'] = new Ticket();
			$data['ticket']->get_by_id($id);
				// Comprobar los permisos para todas las actividades
			if($data['ticket']->result_count()>0){
				// Comprobar permisos
				if($data['ticket']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->tickets_listar_todas==0){
					$this->accesoDenegado();
					return;
				}

				$data['actividades'] = new Actividad();
				$data['actividades']->where_related_ticket('id', $data['ticket']->id)->order_by('inicio')->get();

				$this->load->view('header');
				$this->load->view('tickets/ver', $data);
				$this->load->view('sidebars/tickets/ver');
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
				$this->load->view('footer');
			}
		}
	}

	public function editar($id=null){
		// Comprobar permisos
		if($this->session->userdata('perfil')->tickets_editar_todas==0 && $this->session->userdata('perfil')->tickets_editar_propias==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['ticket'] = new Ticket();
			$data['ticket']->get_by_id($id);
			if($data['ticket']->result_count() == 0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				// Comprobar permisos
				if($data['ticket']->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->tickets_listar_todas==0){
					$this->accesoDenegado();
					return;
				}
				$data['estados']=new Tickets_estado();
				$data['estados']->get();
				$data['prioridades']=new Prioridad();
				$data['prioridades']->get();

				$this->load->view('tickets/editar', $data);
				$this->load->view('sidebars/tickets/editar');
			}
		}
		$this->load->view('footer');
		$this->load->view("tickets/js/include_formulario");
	}

	public function editar2($id=null){
		// Comprobar permisos
		if($this->session->userdata('perfil')->tickets_editar_todas==0 && $this->session->userdata('perfil')->tickets_editar_propias==0){
			$this->accesoDenegado();
			return;
		}

		$ticket = new Ticket();
		$ticket->get_by_id($id);
		// Comprobar los permisos
		if($ticket->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->tickets_editar_todas==0){
			$this->accesoDenegado();
			return;
		}
		// Recoger el formulario
		$ticketEditado = recogerFormulario($this->input);
		$ticket->asunto = $ticketEditado->asunto;
		$ticket->descripcion = $ticketEditado->descripcion;
		$ticket->resolucion = $ticketEditado->resolucion;
		// Recoger prioridad
		$prioridad = new Prioridad();
		$prioridad->get_by_id($this->input->post('cmbPrioridad'));
		if($prioridad->result_count() == 0){
			$ticket->delete($ticket->prioridad);
		}else{
			$ticket->prioridad = $prioridad;
		}
		// Recoger estado
		$estado = new Tickets_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		if($estado->result_count() == 0){
			$ticket->delete($ticket->estado);
		}else{
			$ticket->estado = $estado;
		}
		// Recoger contacto
		$contacto = new Contacto();
		$contacto->get_by_id($this->input->post('txtIdContacto'));
		if($contacto->result_count() == 0){
			$ticket->delete($ticket->contacto);
		}else{
			$ticket->contacto = $contacto;
		}
		// Recoger usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->input->post('txtIdUsuario'));
		if($usuario->result_count() == 0){
			$ticket->delete($ticket->usuario);
		}else{
			$ticket->usuario = $usuario;
		}

		$this->load->view("header");
		if($ticket->save(array($prioridad, $estado, $contacto, $usuario))){
			// Inserción correcta
			$data['success'] = "Ticket editado correctamente.";
			$data['ticket'] = new Ticket();
			$data['ticket']->get_by_id($ticket->id);
			$this->load->view('tickets/ver', $data);
			$this->load->view('sidebars/tickets/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la edición del ticket:<ul>";
			foreach ($ticket->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['estados']=new Tickets_estado();
			$data['estados']->get();
			$data['prioridades']=new Prioridad();
			$data['prioridades']->get();

			$data["ticket"]=$ticket;

			$this->load->view('tickets/editar', $data);
			$this->load->view('sidebars/tickets/editar');
		}
		$this->load->view('footer');
		$this->load->view("tickets/js/include_formulario");
	}

	public function eliminar($id=null){
		// Comprobar permisos
		if($this->session->userdata('perfil')->tickets_eliminar_todas==0 && $this->session->userdata('perfil')->tickets_eliminar_propias==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');
		$ticket = new Ticket();
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$ticket->get_by_id($id);
			if($ticket->result_count()==0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				// Comprobar permisos
				if($ticket->usuario->id!=$this->session->userdata('id') && $this->session->userdata('perfil')->tickets_eliminar_todas==0){
					$this->accesoDenegado();
					return;
				}

				if($ticket->delete()){
					$data=array("success"=>"Ticket eliminado");
				}else{
					$data['error']="No ha podido eliminarse el ticket";
					$data['ticket']['id']=$id;
				}
				$this->load->view('tickets/eliminar', $data);
				$this->load->view('sidebars/tickets/eliminar');
			}
			$this->load->view('footer');
		}
	}

	public function include_busqueda_ticket($offset='0'){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->tickets_listar_propias==0){
			$this->accesoDenegado();
			return;
		}

		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();

		$data['listaTickets'] = new Ticket();
		if($this->session->userdata('perfil')->tickets_listar_propias==0 && $this->session->userdata('perfil')->tickets_listar_todas==0){
			$this->accesoDenegado();
			return;
		}else if($this->session->userdata('perfil')->tickets_listar_propias==1 && $this->session->userdata('perfil')->tickets_listar_todas==0){
			$data['listaTickets']->where_related_usuario('id', $this->session->userdata('id'));
		}

		if($consulta==null){
			$data['listaTickets']->get($limit, $offset);
			$total = $data['listaTickets']->count();
			$config['per_page'] = $limit;
		}else{
			$data['listaTickets']
			->group_start()
			->ilike('asunto', $cadenaBusqueda)
			->or_ilike('descripcion', $cadenaBusqueda)
			->or_ilike('resolucion', $cadenaBusqueda)
			->or_ilike_related_contacto('nombre', $cadenaBusqueda)
			->or_ilike_related_contacto('apellidos', $cadenaBusqueda)
			->or_ilike_related_usuario('nombre', $cadenaBusqueda)
			->or_ilike_related_usuario('apellidos', $cadenaBusqueda)
			->group_end();
			$total = $data['listaTickets']->result_count();
			$config['per_page'] = $limit = $total;
		}

		$config['base_url'] = base_url().'tickets/include_busqueda_ticket/';
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
		$this->load->view('tickets/popups/buscar',$data);
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_ticket=null)
{
	$ticket = new Ticket();

	$ticket->asunto = strip_tags(trim($input->post('txtAsunto')));
	$ticket->descripcion = nl2br(strip_tags(trim($input->post('txtDescripcion'))));
	$ticket->resolucion = nl2br(strip_tags(trim($input->post('txtResolucion'))));

	return $ticket;
}

/* End of file tickets.php */
/* Location: ./application/controllers/tickets.php */