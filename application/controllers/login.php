<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
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
			$hash=hashPassword($password);
			$usuario = $this->Usuarios_model->getLogin($nick, $hash);
			if($usuario==null){
				// Error
				$data['error']="Usuario no encontrado";
			}else{
				// Todo bien
				// foreach ($usuario as $clave => $valor) {
				// 	$this->session->set_userdata($clave, $valor);
				// }
					$this->session->set_userdata($usuario);
				// Crear sesión y redirigir
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