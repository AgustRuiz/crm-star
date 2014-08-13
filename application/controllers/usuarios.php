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
	}

	public function index(){
		$this->listar();

	}

	public function listar($offset='0'){
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$usuario = new Usuario();
		$data['listaUsuarios'] = $usuario->get($limit, $offset);
		
		// Paginación
		$total = $usuario->count();
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
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{

			$usuario = new Usuario();
			$usuario->get_by_id($id);

			$data['usuario']=$usuario;

			if($usuario->result_count()>0){
				$this->load->view('usuarios/ver', $data);
				$this->load->view('sidebars/usuarios/ver');
			}else{
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}
		}
		$this->load->view('footer');
	}

	public function nuevo(){
		$data['perfiles'] = new Perfil();
		$data['perfiles']->order_by('id', 'desc')->get();

		$data['estados'] = new Usuarios_estado();
		$data['estados']->get();
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('usuarios/nuevo', $data);
		$this->load->view('sidebars/usuarios/nuevo');
		$this->load->view('footer');
	}

	public function nuevo2(){
		$usuario = recogerFormulario($this->input);
		$usuario->password = $password = generarPassword();
		// Recoger Perfil
		$perfil = new Perfil();
		$perfil->get_by_id($this->input->post('cmbPerfil'));
		$usuario->perfil = $perfil;
		// Recoger Estado
		$estado = new Usuarios_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$usuario->usuarios_estado = $estado;

		if($usuario->save(array($perfil, $estado))){
			// Usuario creado correctamente
			include('include_mail.php');
			mail_altaUsuario($usuario->email, $usuario->nick, $usuario->password, $this->config->base_url());
			$data["success"] = "Usuario creado correctamente. La contraseña de acceso ha sido generada aleatoriamente y mandada por correo electrónico a la dirección <em>".$usuario->email."</em>.";
			$data["success"] .= "<br/><br/> Contraseña: ".$password."<br/><em>Esto luego se quita, por favor</em>";
			$data['usuario']=$usuario;

			// Cargar las vistas
			$this->load->view('header');
			$this->load->view('usuarios/ver', $data);
			$this->load->view('sidebars/usuarios/ver');
			$this->load->view('footer');

		}else{
			// Error al crear el usuario
			$data['error'] = 'Error al crear el usuario:<ul>';
			foreach ($usuario->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';
			$data['usuario']=$usuario;

			$data['perfiles'] = new Perfil();
			$data['perfiles']->order_by('id', 'desc')->get();
			$data['estados'] = new Usuarios_estado();
			$data['estados']->get();

			// Cargar las vistas
			$this->load->view('header');
			$this->load->view('usuarios/nuevo', $data);
			$this->load->view('sidebars/usuarios/nuevo');
			$this->load->view('footer');
		}
	}

	public function eliminar($id=null){
		$this->load->view('header');
		$usuario = new Usuario();
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$usuario->get_by_id($id);
			if($usuario->result_count()==0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				if($usuario->delete()){
					$data=array("success"=>"Usuario eliminado");
				}else{
					$data['error']="No ha podido eliminarse el usuario";
					$data['usuario']['id']=$id;
				}
				$this->load->view('usuarios/eliminar', $data);
				$this->load->view('sidebars/usuarios/eliminar');
			}
			$this->load->view('footer');
		}
	}

	public function editar($id=null){
		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['perfiles'] = new Perfil();
			$data['perfiles']->order_by('id', 'desc')->get();
			$data['estados'] = new Usuarios_estado();
			$data['estados']->get();
			$usuario = new Usuario();
			$data['usuario']=$usuario->get_by_id($id);
			$this->load->view('usuarios/editar', $data);
			$this->load->view('sidebars/usuarios/editar');
		}
		$this->load->view('footer');
	}

	public function editar2($id=null){

		$usuario = new Usuario();
		$usuario->get_by_id($id);

		$usuarioEditado = recogerFormulario($this->input, $id);

		$usuario->nick = $usuarioEditado->nick;
		$usuario->nombre = $usuarioEditado->nombre;
		$usuario->apellidos = $usuarioEditado->apellidos;
		$usuario->nif = $usuarioEditado->nif;
		$usuario->email = $usuarioEditado->email;
		$usuario->telfOficina = $usuarioEditado->telfOficina;
		$usuario->telfMovil = $usuarioEditado->telfMovil;
		$usuario->fax = $usuarioEditado->fax;
		$usuario->otrosDatos = $usuarioEditado->otrosDatos;	

		// Recoger Perfil
		$perfil = new Perfil();
		$perfil->get_by_id($this->input->post('cmbPerfil'));
		$usuario->perfil = $perfil;

		// Recoger Estado
		$estado = new Usuarios_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$usuario->usuarios_estado = $estado;

		if($usuario->save(array($perfil, $estado))){
			//Edición correcta
			$data["success"] = "Usuario editado correctamente";
			$data['usuario'] = $usuarioEditado;
			$this->load->view('header');
			$this->load->view('usuarios/ver', $data);
			$this->load->view('sidebars/usuarios/ver');
			$this->load->view('footer');
		}else{
			// Error al editar el usuario
			$data['error'] = 'Error al editar el usuario:<ul>';
			foreach ($usuario->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';
			$data['usuario']=$usuario;

			$data['perfiles'] = new Perfil();
			$data['perfiles']->order_by('id', 'desc')->get();

			$data['estados'] = new Usuarios_estado();
			$data['estados']->get();

			// Cargar las vistas
			$this->load->view('header');
			$this->load->view('usuarios/editar', $data);
			$this->load->view('sidebars/usuarios/editar');
			$this->load->view('footer');
		}
	}

	public function password($id=null){

		$password = generarPassword();

		$usuario = new Usuario();
		$usuario->get_by_id($id);
		$usuario->password = $password;


		$data['usuario']=$usuario;

		include('include_mail.php');
		
		if(mail_cambiarPassword($usuario->email, $usuario->nick, $password, $this->config->base_url())){
			$usuario->save();
			$hash=$usuario->password;

			$data["success"] = "La nueva contraseña ha sido generada y enviada por correo electrónico a la dirección <em>".$usuario->email."</em>.";
			$data["success"] .= "<br/><br/> Contraseña: ".$password."<br/>Hash: ".$hash."<br/><em>Esto luego se quita, por favor</em>";
		}else{
			$data["error"] = "Ha ocurrido un error y no ha podido mandarse la nueva contraseña al usuario.";
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

		$data['listaUsuarios'] = new Usuario();
		if($consulta==null){
			$data['listaUsuarios']->get($limit, $offset);
			$total = $data['listaUsuarios']->count();
			$config['per_page'] = $limit;
		}else{
			$data['listaUsuarios']->ilike('nick', $consulta);
			$data['listaUsuarios']->or_ilike('nombre', $consulta);
			$data['listaUsuarios']->or_ilike('apellidos', $consulta);
			$data['listaUsuarios']->or_ilike('nif', $consulta);
			$data['listaUsuarios']->or_ilike('email', $consulta);
			$data['listaUsuarios']->or_ilike('telfOficina', $consulta);
			$data['listaUsuarios']->or_ilike('telfMovil', $consulta);
			$data['listaUsuarios']->or_ilike('fax', $consulta);
			$data['listaUsuarios']->or_ilike('otrosDatos', $consulta);
			$data['listaUsuarios']->get();
			$total = $data['listaUsuarios']->result_count();
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
	$usuario = new Usuario();

	$usuario->nick = (strip_tags(trim($input->post('txtNick')))=="")?null:strip_tags(trim($input->post('txtNick')));
	$usuario->nombre = (strip_tags(trim($input->post('txtNombre')))=="")?null:strip_tags(trim($input->post('txtNombre')));
	$usuario->apellidos = strip_tags(trim($input->post('txtApellidos')));
	$usuario->nif = strtoupper(strip_tags(trim($input->post('txtNIF'))));
	if($usuario->nif=='')$usuario->nif=null;
	$usuario->email = (strip_tags(trim($input->post('txtEmail')))=="")?null:strip_tags(trim($input->post('txtEmail')));
	$usuario->telfOficina = strip_tags(trim($input->post('txtTelfOficina')));
	$usuario->telfMovil = strip_tags(trim($input->post('txtTelfMovil')));
	$usuario->fax = strip_tags(trim($input->post('txtFax')));
	$usuario->otrosDatos = nl2br(strip_tags(trim($input->post('txtOtrosDatos'))));


	if($id!=null){
		$usuario->id = $id;
	}
	return $usuario;
}

include('include_password.php');
/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */