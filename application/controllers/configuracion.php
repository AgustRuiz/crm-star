<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracion extends CI_Controller {

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
		// $this->listar();
	}

	public function password(){
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('configuracion/password');
		$this->load->view('sidebars/configuracion/password');
		$this->load->view('footer');
	}

	public function password2(){
		$actual = $this->input->post('txtActual');
		$password = $this->input->post('txtPassword');
		$password2 = $this->input->post('txtPassword2');

		if($password!==$password2){
			$data['error']="Las contraseñas introducidas no coinciden.";
		}else{
			$hashActual = hashPassword($actual);
			if($this->session->userdata('password')!==$hashActual){
				$data['error']="La contraseña introducida no es correcta.";
			}else{
				$usuario = new Usuario();
				$usuario->get_by_id($this->session->userdata('id'));
				if($usuario->result_count()==1){
					$usuario->password = $password;
					if($usuario->save()){
						$this->session->set_userdata('password', $password);
						$data['success']="Nueva contraseña guardada correctamente.";
					}else{
						$data['error']="Ha ocurrido al intentar guardar la nueva contraseña.";
					}
				}else{
					$data['error']="Ha ocurrido un error durante la recuperación del usuario.";
				}
			}
		}
		$this->load->view('header');
		$this->load->view('configuracion/password', $data);
		$this->load->view('sidebars/configuracion/password');
		$this->load->view('footer');
	}

}

include('include_password.php');

/* End of file configuracion.php */
/* Location: ./application/controllers/configuracion.php */