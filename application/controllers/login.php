<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		// Comprobar si hay sesión
		if($this->session->userdata('id')!=null){
			header("Location: ".$this->config->base_url());
		}
		// Seguimos con el formulario de acceso
		$data['nick'] = $nick = $this->input->post('nick');
		$password = $this->input->post('password');
		if($nick!="" && $password!=""){
			// Se ha recibido los datos

			$hash = hashPassword($password);
			
			$usuario = new Usuario();
			$usuario->where('nick', $nick)->where('password', $hash)->get();
			// exit;
			if($usuario->result_count()==0){
				// Error
				$data['error']="El nombre de usuario y/o contraseña introducidos no está registrado en el sistema";
			}else if($usuario->usuarios_estado->id!=1){
				// Error
				$data['error']="El usuario que intenta usar se encuentra en la siguiente situación: '<em>".$usuario->usuarios_estado->estado."</em>'. El acceso ha sido denegado.";
			}else{
				// Creamos array con los datos de la sesión (los que hagan falta)
				$datosSesion = array(
					'id' => $usuario->id,
					'nick' => $usuario->nick,
					'password' => $usuario->password,
					'nombre' => $usuario->nombre,
					'apellidos' => $usuario->apellidos,
					'email' => $usuario->email,
					'perfil' => $usuario->perfil
					);
				// Crear sesión y redirigir
				$this->session->set_userdata($datosSesion);
				header("Location: ".$this->config->base_url());
				die();
			}
		}
		$this->load->view('login', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		header("Location: ".$this->config->base_url()."index.php/login");
	}
}

include('include_password.php');

?>