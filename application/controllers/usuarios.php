<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Usuarios_model');
	}

	public function index(){
		$this->listar();

	}

	public function listar($offset='0'){
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		$total = $this->Usuarios_model->countUsuarios();
		$data['listaUsuarios'] = $this->Usuarios_model->getUsuarios($limit, $offset);
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
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('usuarios/nuevo');
		$this->load->view('sidebars/usuarios/nuevo');
		$this->load->view('footer');
	}

	public function nuevo2(){
		$usuario = recogerFormulario($this->input);
		$resultado = $this->Usuarios_model->insertar($usuario);
		if($resultado>0){
			//Inserción correcta
			$data = array(
				"success" => "Usuario creado correctamente. La contraseña de acceso ha sido generada aleatoriamente y mandada por correo electrónico a la dirección <em>".$usuario['email']."</em>"
				);
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

		$psswd = generarPassword();


		$data['usuario']=$this->Usuarios_model->getUsuario($id);

		
		$resultado = mail($data['usuario']['email'],"Prueba CRM","Esto es un mensaje de prueba de correo");


		$data["success"] = "La nueva contraseña ha sido generada y enviada por correo electrónico a la dirección <em>".$data['usuario']['email']."</em>. (".$psswd."). (".$resultado.")";
		$data["error"] = "Ha ocurrido un error y no ha podido mandarse la nueva contraseña al usuario. (".$psswd."). (".$resultado.")";

		$this->load->view('header');
		$this->load->view('usuarios/ver', $data);
		$this->load->view('sidebars/usuarios/ver');
		$this->load->view('footer');
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

function generarPassword($longitud=6){
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$psswd = "";
	for($i=0;$i<$longitud;$i++) {
		$psswd .= substr($str,rand(0,62),1);
	}
	return $psswd;
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuario.php */