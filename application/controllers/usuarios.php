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
		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('noDesarrollado');
		$this->load->view('sidebars/usuarios/nuevo');
		$this->load->view('footer');
	}
}


/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_contacto=null)
{
	unset($return);

	$return = array(
		'nombre' => strip_tags(trim($input->post('txtNombre'))),
		'apellidos' => strip_tags(trim($input->post('txtApellidos'))),
		'nif' => (strip_tags(trim($input->post('txtNIF')))=="")?null:strip_tags(trim($input->post('txtNIF'))),
		'telfOficina' => strip_tags(trim($input->post('txtTelfOficina'))),
		'telfMovil' => strip_tags(trim($input->post('txtTelfMovil'))),
		'fax' => strip_tags(trim($input->post('txtFax'))),
		'otrosDatos' => nl2br(strip_tags(trim($input->post('txtOtrosDatos'))))
		);
	if($id_contacto!=null){
		$return['id']=$id_contacto;
	}

	// Recogida de correos
	unset($correos);
	$principal=$input->post('radPrincipal');
	$noValido=$input->post('chkNoValido', TRUE);
	if($input->post('txtEmail')!=null){
		unset($correos);
		foreach ($input->post('txtEmail') as $id => $mail) {
			$mail = strip_tags(trim($mail));
			if($mail=="") continue;

			$correos[$id]['id'] = $id;
			($id<=0)?$correos[$id]['id']=null:$correos[$id]['id']=$id; 
			$correos[$id]['id_contacto'] = $id_contacto;
			$correos[$id]['correo'] = $mail;
			($principal==$id)? $correos[$id]['principal']=1:$correos[$id]['principal']=0; 
			(isset($noValido[$id])&&$principal!=$id)? $correos[$id]['noValido']=1:$correos[$id]['noValido']=0;
		}
		if(isset($correos))
			$return['correos']=$correos;
		else
			$return['correos']=null;
	}else{
		$return['correos']=null;
	}


	return $return;
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuario.php */