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

	private function accesoDenegado(){
		$this->load->view('header');
		$this->load->view('errores/accesoDenegado');
		$this->load->view('sidebars/campanyas/index');
		$this->load->view('footer');
	}

	public function index(){
		$this->listarUsuario();
	}

	public function ordenar($columna, $orden, $offset=0, $destino='listarUsuario'){
		$config = new Configuracion();
		$config->where_related_usuario('id', $this->session->userdata('id'))->get();
		echo $config->campanyas_columna = $columna;
		$config->campanyas_orden = $orden;
		$config->save();

		redirect('/campanyas/'.$destino.'/'.$offset);
	}

	public function listar($offset='0'){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_listar_todas==0){
			$this->accesoDenegado();
			return;
		}

		// Configuración
		$data['config'] = new Configuracion();
		$data['config']->where_related_usuario('id', $this->session->userdata('id'))->get();

		// Filtro
		if(isset($_POST['filtro'])){
			// Configuración
			$data['config']->campanyas_filtro = $this->input->post('filtro');
			$data['config']->save();
		}

		// Obtener listado (parcial)
		$limit = $this->Configuration_model->rowsPerPage();
		$campanyas = new Campanya();
		if($data['config']->campanyas_filtro!=""){
			// Filtro
			$cadenaBusqueda = $data['config']->campanyas_filtro;
			$campanyas->ilike('nombre', $cadenaBusqueda);
			$campanyas->or_ilike('objetivo', $cadenaBusqueda);
			$campanyas->or_ilike('descripcion', $cadenaBusqueda);
		}
		$data['listaCampanyas'] =$campanyas->include_related('campanyas_tipo')->include_related('campanyas_estado')->include_related('usuario')->order_by($data['config']->campanyas_columna, $data['config']->campanyas_orden)->get_paged($offset, $limit, TRUE);


		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
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
		// Configuración
		$data['config'] = new Configuracion();
		$data['config']->where_related_usuario('id', $this->session->userdata('id'))->get();

		// Filtro
		if(isset($_POST['filtro'])){
			// Configuración
			$data['config']->campanyas_filtro = $this->input->post('filtro');
			$data['config']->save();
		}

		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		

		// Obtener listado (parcial)
		$limit = $this->Configuration_model->rowsPerPage();
		$campanyas = new Campanya();
		if($data['config']->campanyas_filtro!=""){
			// Filtro
			$cadenaBusqueda = $data['config']->campanyas_filtro;
			$campanyas->group_start();
			$campanyas->ilike('nombre', $cadenaBusqueda);
			$campanyas->or_ilike('objetivo', $cadenaBusqueda);
			$campanyas->or_ilike('descripcion', $cadenaBusqueda);
			$campanyas->group_end();
		}
		$campanyas->where_related_usuario('id', $this->session->userdata('id'));
		$data['listaCampanyas'] =$campanyas->include_related('campanyas_tipo')->include_related('campanyas_estado')->include_related('usuario')->order_by($data['config']->campanyas_columna, $data['config']->campanyas_orden)->get_paged($offset, $limit, TRUE);

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
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_crear==0){
			$this->accesoDenegado();
			return;
		}

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
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_crear==0){
			$this->accesoDenegado();
			return;
		}

		// Recoger el formulario
		$campanya = recogerFormulario($this->input);
		// Recoger el tipo de campaña
		$tipo = new Campanyas_tipo();
		$tipo->get_by_id($this->input->post('cmbTipo'));
		$campanya->campanyas_tipo = $tipo;
		// Recoger el estado de la campaña
		$estado = new Campanyas_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$campanya->campanyas_estado = $estado;
		// Recoger el usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->input->post('txtIdUsuario'));
		$campanya->usuario = $usuario;

		$this->load->view("header");
		if($campanya->save(array($tipo, $estado, $usuario))){
			// Inserción correcta
			$data['success'] = "Campaña creada correctamente.";
			$data['campanya'] = new Campanya();
			$data['campanya']->get_by_id($campanya->id);
			$this->load->view('campanyas/ver', $data);
			$this->load->view('sidebars/campanyas/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación de la campaña:<ul";
			foreach ($campanya->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['campanya'] = $campanya;

			$data['estados']=new Campanyas_estado();
			$data['estados']->get();
			$data['tipos']=new Campanyas_tipo();
			$data['tipos']->get();

			$this->load->view("campanyas/nuevo", $data);
			$this->load->view("sidebars/campanyas/nuevo");
		}
		$this->load->view("footer");
		$this->load->view("campanyas/js/include_formulario");
	}

	public function ver($id=null){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_listar_todas==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');

		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$data['campanya'] = new Campanya();
			$data['campanya']->get_by_id($id);
			if($data['campanya']->result_count()>0){
				// Comprobar los permisos
				if($this->session->userdata('perfil')->campanyas_listar_propias==0){
					$this->accesoDenegado();
					return;
				}
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
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_editar==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');

		$data['estados']=new Campanyas_estado();
		$data['estados']->get();
		$data['tipos']=new Campanyas_tipo();
		$data['tipos']->get();
		$data['campanya']=new Campanya();
		$data['campanya']->get_by_id($id);

		if($data['campanya']->result_count()>0){
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
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_editar==0){
			$this->accesoDenegado();
			return;
		}

		// Recoger el formulario
		$campanya = new Campanya();
		$campanya->get_by_id($id);
		$campanyaEditada = recogerFormulario($this->input);
		$campanya->nombre = $campanyaEditada->nombre;
		$campanya->fechaInicio = $campanyaEditada->fechaInicio;
		$campanya->fechaFin = $campanyaEditada->fechaFin;
		$campanya->objetivo = $campanyaEditada->objetivo;
		$campanya->descripcion = $campanyaEditada->descripcion;
		// Recoger el tipo de campaña
		$tipo = new Campanyas_tipo();
		$tipo->get_by_id($this->input->post('cmbTipo'));
		$campanya->campanyas_tipo = $tipo;
		// Recoger el estado de la campaña
		$estado = new Campanyas_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$campanya->campanyas_estado = $estado;
		// Recoger el usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->input->post('txtIdUsuario'));
		if($usuario->result_count()==0){
			$campanya->delete($campanya->usuario);
		}
		$campanya->usuario = $usuario;

		$this->load->view("header");
		if($campanya->save(array($tipo, $estado, $usuario))){
			// Edición correcta
			$data['success'] = "Campaña editada correctamente.";
			$data['campanya'] = new Campanya();
			$data['campanya']->get_by_id($campanya->id);
			$this->load->view('campanyas/ver', $data);
			$this->load->view('sidebars/campanyas/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la edición de la campaña:<ul>";
			foreach ($campanya->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data['campanya'] = $campanya;

			$data['estados']=new Campanyas_estado();
			$data['estados']->get();
			$data['tipos']=new Campanyas_tipo();
			$data['tipos']->get();

			$this->load->view('campanyas/editar', $data);
			$this->load->view('sidebars/campanyas/editar');
		}
		$this->load->view("footer");
		$this->load->view("campanyas/js/include_formulario");
	}

	public function eliminar($id=null){
		// Comprobar los permisos
		if($this->session->userdata('perfil')->campanyas_eliminar==0){
			$this->accesoDenegado();
			return;
		}

		$this->load->view('header');
		$campanya = new Campanya();
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$campanya->get_by_id($id);
			if($campanya->result_count()==0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				if($campanya->delete()){
					$data=array("success"=>"Campaña eliminada");
				}else{
					$data['error']="No ha podido eliminarse la campaña";
					$data['campanya']['id']=$id;
				}
				$this->load->view('campanyas/eliminar', $data);
				$this->load->view('sidebars/campanyas/eliminar');
			}
			$this->load->view('footer');
		}
	}

	public function include_busqueda_campanya($offset='0'){
		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();

		$data['listaCampanyas'] = new Campanya();
		if($consulta==null){
			$data['listaCampanyas']->get($limit, $offset);
			$total = $data['listaCampanyas']->count();
			$config['per_page'] = $limit;
		}else{
			$data['listaCampanyas']->ilike('nombre', $consulta);
			$data['listaCampanyas']->or_ilike('objetivo', $consulta);
			$data['listaCampanyas']->or_ilike('descripcion', $consulta);
			// Falta contemplar los correos electrónicos
			$data['listaCampanyas']->get();
			$total = $data['listaCampanyas']->result_count();
			$config['per_page'] = $limit = $total;
		}
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

	return $campanya;
}

/* End of file campanyas.php */
/* Location: ./application/controllers/campanyas.php */