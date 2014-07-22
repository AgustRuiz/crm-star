<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Comprobar si hay sesión
		if($this->session->userdata('id')==null){
			header("Location: ".$this->config->base_url()."index.php/login");
		}
		// Carga de recursos
		$this->load->library('pagination');
		$this->load->model('Usuarios_model');
	}

	public function index(){
		$this->listar();

	}

	public function listar($offset='0'){
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$data['listaUsuarios'] = $this->Usuarios_model->getUsuarios($limit, $offset);
		$total = $this->Usuarios_model->countUsuarios();
		$config['base_url'] = base_url().'usuarios/listar/';
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
		$this->load->view('usuarios/listar', $data);
		$this->load->view('sidebars/usuarios/listar');
		$this->load->view('footer');

	}

	public function ver($id=null){
		$this->load->view('header');
		$data['usuario']=$this->Usuarios_model->getUsuario($id);
		if($data['usuario']!=null){
			$this->load->view('usuarios/ver', $data);
			$this->load->view('sidebars/usuarios/ver');
		}else{
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		$this->load->view('footer');
	}

	public function nuevo(){

		$usuario = new Usuario();
		$usuario->nick = "aruiz";
		$usuario->password = "123456";
		$usuario->nombre = "Agustín";
		$usuario->apellidos = "Ruiz Linares";
		$usuario->nif = "15510111S";
		$usuario->email = "arl00029@red.ujaen.es";
		$usuario->telfOficina = "953445566";
		$usuario->telfMovil = "600123456";
		$usuario->otrosDatos = "Es el primer usuario que se crea";

		if($usuario->save()){
			echo 'USUARIO CREADO CORRECTAMENTE';
		}else{
			echo 'NO SE HA PODIDO CREAR EL USUARIO';
			foreach ($usuario->error->all as $error)
			{
				echo '<br/> - '.$error;
			}
		}

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('usuarios/nuevo');
		$this->load->view('sidebars/usuarios/nuevo');
		$this->load->view('footer');

	}

	public function nuevo2(){
		$usuario = recogerFormulario($this->input);
		$password = generarPassword();
		$hash = $hash=hashPassword($password);
		$usuario['password'] = $hash;
		$resultado = $this->Usuarios_model->insertar($usuario);
		if($resultado>0){
			//Inserción correcta
			include('include_mail.php');
			mail_altaUsuario($usuario['email'], $usuario['nick'], $password, $this->config->base_url());
			$data = array(
				"success" => "Usuario creado correctamente. La contraseña de acceso ha sido generada aleatoriamente y mandada por correo electrónico a la dirección <em>".$usuario['email']."</em>"
				);
			// $data["success"] .= "<br/><br/> Contraseña: ".$password."<br/>Hash: ".$hash.").<br/><em>Esto luego se quita, por favor</em>";

			$data['usuario']=$this->Usuarios_model->getUsuario($this->db->insert_id());
			// Cargar las vistas
			$this->load->view('header');
			$this->load->view('usuarios/ver', $data);
			$this->load->view('sidebars/usuarios/ver');
			$this->load->view('footer');
		}else{
			switch($resultado){
				case -1: // Falta el nombre
				$data['error']='El nombre de usuario es obligatorio';
				break;
				case -2: // Falta el nick
				$data['error']='El identificador de usuario es obligatorio';
				break;
				case -3: // Falta el correo electrónico
				$data['error']='El correo electrónico de usuario es obligatorio';
				break;
				case -4: // Campo nick duplicado
				$data['error']='El campo <em>nick</em> está duplicado';
				break;
				case -5: // Campo email duplicado
				$data['error']='El campo <em>email</em> está duplicado';
				break;
				default: // Error no identificado
				$data['error']='Error no identificado';
				break;
			}
			$data['usuario']=$usuario;


			// No desarrollado
			$this->load->view('header');
			$this->load->view('usuarios/nuevo', $data);
			$this->load->view('sidebars/usuarios/nuevo');
			$this->load->view('footer');


		}
	}

	public function eliminar($id=null){
		$this->load->view('header');
		$result=$this->Usuarios_model->eliminarUsuario($id);
		if($result>0){
			$data=array("success"=>"Usuario eliminado");
		}else{
			$data['error']="No ha podido eliminarse el usuario";
			$data['usuario']['id']=$id;
		}
		$this->load->view('usuarios/eliminar', $data);
		$this->load->view('sidebars/usuarios/eliminar');
		$this->load->view('footer');
	}

	public function editar($id=null){
		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['usuario']=$this->Usuarios_model->getUsuario($id);
			$this->load->view('usuarios/editar', $data);
			$this->load->view('sidebars/usuarios/editar');
		}
		$this->load->view('footer');
	}

	public function editar2($id=null){
		$usuario = recogerFormulario($this->input, $id);
		$resultado = $this->Usuarios_model->actualizar($usuario);

		if($resultado>0){
			//Edición correcta
			$data["success"] = "Usuario editado correctamente";
			$data['usuario']=$this->Usuarios_model->getUsuario($id);
			$this->load->view('header');
			$this->load->view('usuarios/ver', $data);
			$this->load->view('sidebars/usuarios/ver');
			$this->load->view('footer');
		}else{
			//Error al editar
			switch($resultado){
				case -1: // Falta el nombre
				$data['error']='El nombre de usuario es obligatorio';
				break;
				case -2: // Falta el nick
				$data['error']='El identificador de usuario es obligatorio';
				break;
				case -3: // Falta el correo electrónico
				$data['error']='El correo electrónico de usuario es obligatorio';
				break;
				case -4: // Campo nick duplicado
				$data['error']='El campo <em>nick</em> está duplicado';
				break;
				case -5: // Campo email duplicado
				$data['error']='El campo <em>email</em> está duplicado';
				break;
				default: // Error no identificado
				$data['error']='Error no identificado';
				break;
			}
			$data['usuario']=$usuario;
			$this->load->view('header');
			$this->load->view('usuarios/editar', $data);
			$this->load->view('sidebars/usuarios/editar');
			$this->load->view('footer');
		}
	}

	public function password($id=null){

		$password = generarPassword();
		$data['usuario']=$this->Usuarios_model->getUsuario($id);

		include('include_mail.php');
		
		if(mail_cambiarPassword($data['usuario']['email'], $data['usuario']['nick'], $password, $this->config->base_url())){
			$hash=hashPassword($password);
			$this->Usuarios_model->cambiarPassword($data['usuario']['id'], $hash);
			$data["success"] = "La nueva contraseña ha sido generada y enviada por correo electrónico a la dirección <em>".$data['usuario']['email']."</em>.";
			// $data["success"] .= "<br/><br/> Contraseña: ".$password."<br/>Hash: ".$hash.").<br/><em>Esto luego se quita, por favor</em>";
		}else{
			$data["error"] = "Ha ocurrido un error y no ha podido mandarse la nueva contraseña al usuario. (".$password.").";
		}

		$this->load->view('header');
		$this->load->view('usuarios/ver', $data);
		$this->load->view('sidebars/usuarios/ver');
		$this->load->view('footer');
	}

	public function include_busqueda_usuario($offset='0'){
		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		if($consulta==null){
			$data['listaUsuarios'] = $this->Usuarios_model->getUsuarios($limit, $offset, $consulta);
			$total = $this->Usuarios_model->countUsuarios($consulta);
			$config['per_page'] = $limit;
		}else{
			$data['listaUsuarios'] = $this->Usuarios_model->getUsuarios(null, null, $consulta);
			$total = $this->Usuarios_model->countUsuarios($consulta);
			$config['per_page'] = $limit = $total;
		}
		$config['base_url'] = base_url().'usuarios/include_busqueda_usuario/';
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
		$this->load->view('usuarios/popups/buscar',$data);
	}
}


/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id=null)
{
	unset($return);

	$return = array(
		'nombre' => (strip_tags(trim($input->post('txtNombre')))=="")?null:strip_tags(trim($input->post('txtNombre'))),
		'apellidos' => strip_tags(trim($input->post('txtApellidos'))),
		'nif' => (strip_tags(trim($input->post('txtNIF')))=="")?null:strip_tags(trim($input->post('txtNIF'))),
		'nick' => (strip_tags(trim($input->post('txtNick')))=="")?null:strip_tags(trim($input->post('txtNick'))),
		'email' => (strip_tags(trim($input->post('txtEmail')))=="")?null:strip_tags(trim($input->post('txtEmail'))),
		'telfOficina' => strip_tags(trim($input->post('txtTelfOficina'))),
		'telfMovil' => strip_tags(trim($input->post('txtTelfMovil'))),
		'fax' => strip_tags(trim($input->post('txtFax'))),
		'otrosDatos' => nl2br(strip_tags(trim($input->post('txtOtrosDatos'))))
		);
	if($id!=null){
		$return['id']=$id;
	}
	return $return;
}

include('include_password.php');
/* End of file usuarios.php */
/* Location: ./application/controllers/usuario.php */