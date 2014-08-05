<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

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
		$contactos = new Contacto();
		$data['listaContactos'] = $contactos->get($limit, $offset);

		// Paginación
		$total = $contactos->count();
		$config['base_url'] = base_url().'contactos/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de contactos
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('contactos/listar', $data);
		$this->load->view('sidebars/contactos/listar');
		$this->load->view('footer');
	}

	public function ver($id=null){
		$this->load->view('header');
		$contacto = new Contacto();
		$data['contacto']=$contacto->get_by_id($id);
		if($data['contacto']!=null){
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
		}else{
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		$this->load->view('footer');
	}

	public function nuevo(){
		$this->load->view('header');
		$estados = new Contactos_estado();
		$estados->order_by('id', 'asc');
		$data['estados']=$estados->get();
		$this->load->view('contactos/nuevo', $data);
		$this->load->view('sidebars/contactos/nuevo');
		$this->load->view('footer');
	}

	public function nuevo2(){
		// Recoger formulario
		$contacto = recogerFormulario($this->input);
		// Recoger estado
		$estado = new Contactos_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$contacto->contactos_estado = $estado;

		if($contacto->save(array($estado))){
			//Inserción correcta
			$data = array(
				"success" => "Contacto creado correctamente"
				);

			// Recoger y guardar los correos
			$correos = recogerCorreos($this->input);
			if($correos!=null){
				foreach ($correos as $email) {
					$email->save();
				}
				$contacto->save($correos);
			}

			// Cargar las vistas
			$c = new Contacto();
			$data["contacto"] = $c->get_by_id($contacto->id);
			$this->load->view('header');
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
			$this->load->view('footer');
		}else{
			// Error al crear el contacto
			$data['error'] = 'Error al crear el contacto:<ul>';
			foreach ($contacto->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';
			$estados = new Contactos_estado();
			$estados->order_by('id', 'asc');
			$data['estados']=$estados->get();
			$data["contacto"] = $contacto;
			$this->load->view('header');
			$this->load->view('contactos/nuevo', $data);
			$this->load->view('sidebars/contactos/nuevo');
			$this->load->view('footer');
		}
	}

	public function eliminar($id=null){
		$this->load->view('header');

		$contacto = new Contacto();

		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$contacto->get_by_id($id);
			if($contacto->result_count()==0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				$correos = $contacto->contactos_email; // Almacenamos el listado de correos para eliminarlos después
				if($contacto->delete()){
					// Eliminamos los correos
					foreach ($correos as $e) {
						$e->delete();
					}
					$data=array("success"=>"Contacto eliminado");
				}else{
					$data['error']="No ha podido eliminarse el contacto";
					$data['contacto']['id']=$id;
				}
				$this->load->view('contactos/eliminar', $data);
				$this->load->view('sidebars/contactos/eliminar');
			}
		}
		$this->load->view('footer');
	}

	public function editar($id=null){
		$this->load->view('header');
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}
		else{
			$data['contacto']= new Contacto();
			$data['contacto']->get_by_id($id);
			if($data['contacto']->contactos_email->count()==0){
				$data['contacto']->contactos_email = null;
			}
			$data['estados'] = new Contactos_estado();
			$data['estados']->order_by('id', 'asc')->get();

			$this->load->view('contactos/editar', $data);
			$this->load->view('sidebars/contactos/editar');
		}
		$this->load->view('footer');
	}

	public function editar2($id=null){
		// Recuperar contacto actual
		$contacto = new Contacto();
		$contacto->get_by_id($id);

		// Recoger formulario y cargar los datos en el actual
		$contactoEditado = recogerFormulario($this->input);
		$contacto->nombre =  $contactoEditado->nombre;
		$contacto->apellidos = $contactoEditado->apellidos;
		$contacto->nif = $contactoEditado->nif;
		$contacto->direccion = $contactoEditado->direccion;
		$contacto->ciudad = $contactoEditado->ciudad;
		$contacto->provincia = $contactoEditado->provincia;
		$contacto->cp = $contactoEditado->cp;
		$contacto->pais = $contactoEditado->pais;
		$contacto->telfOficina = $contactoEditado->telfOficina;
		$contacto->telfMovil = $contactoEditado->telfMovil;
		$contacto->fax = $contactoEditado->fax;
		$contacto->otrosDatos = $contactoEditado->otrosDatos;
		$contacto->contactos_email = null;

		// Recoger estado
		$estado = new Contactos_estado();
		$estado->get_by_id($this->input->post('cmbEstado'));
		$contacto->contactos_estado = $estado;

		// Recoger correos
		$correos = recogerCorreos($this->input);
		$contacto->contactos_email = $correos;

		if($contacto->save($estado)){
			//Edición correcta
			$data["success"] = "Contacto editado correctamente";

			// Guardar los correos nuevos, actualizar los existentes y borrar los eliminados
			$idCorreos = null;
			if($correos!=null){
				foreach ($correos as $email) {
					$email->save();
					$idCorreos[] = $email->id;
				}
				$contacto->save($correos);
				$c = new contactos_email();
				$c->where_not_in('id', $idCorreos)->get()->delete_all();
			}
			
			// Cargar las vistas
			$c = new Contacto();
			$data["contacto"] = $c->get_by_id($contacto->id);
			$this->load->view('header');
			$this->load->view('contactos/ver', $data);
			$this->load->view('sidebars/contactos/ver');
			$this->load->view('footer');
		}else{
			//Error al editar
			$data['error'] = 'Error al editar el contacto:<ul>';
			foreach ($contacto->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';

			$data["contacto"] = $contacto;
			$data['estados'] = new Contactos_estado();
			$data['estados']->order_by('id', 'asc')->get();
			$this->load->view('header');
			$this->load->view('contactos/editar', $data);
			$this->load->view('sidebars/contactos/editar');
			$this->load->view('footer');
		}
	}

	public function include_busqueda_contacto($offset='0'){
		$consulta=null;
		if(strip_tags(trim($this->input->post('txtCadenaBuscar')))!=""){
			$data['cadenaBuscar'] = $consulta = strip_tags(trim($this->input->post('txtCadenaBuscar')));
		}
		// Paginación
		$limit = $this->Configuration_model->rowsPerPage();
		if($consulta==null){
			$data['listaContactos'] = $this->Contactos_model->getContactos($limit, $offset, $consulta);
			$total = $this->Contactos_model->countContactos($consulta);
			$config['per_page'] = $limit;
		}else{
			$data['listaContactos'] = $this->Contactos_model->getContactos(null, null, $consulta);
			$total = $this->Contactos_model->countContactos($consulta);
			$config['per_page'] = $limit = $total;
		}
		$config['base_url'] = base_url().'contactos/include_busqueda_contacto/';
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
		$this->load->view('contactos/popups/buscar',$data);
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id_contacto=null)
{
	$contacto = new Contacto();

	$contacto->nombre = strip_tags(trim($input->post('txtNombre')));
	$contacto->apellidos = strip_tags(trim($input->post('txtApellidos')));
	$contacto->nif = (strip_tags(trim($input->post('txtNIF')))=="")?null:strtoupper(strip_tags(trim($input->post('txtNIF'))));
	$contacto->direccion = nl2br(strip_tags(trim($input->post('txtDireccion'))));
	$contacto->ciudad = strip_tags(trim($input->post('txtCiudad')));
	$contacto->provincia = strip_tags(trim($input->post('txtProvincia')));
	$contacto->cp = strip_tags(trim($input->post('txtCP')));
	$contacto->pais = strip_tags(trim($input->post('txtPais')));
	$contacto->telfOficina = strip_tags(trim($input->post('txtTelfOficina')));
	$contacto->telfMovil = strip_tags(trim($input->post('txtTelfMovil')));
	$contacto->fax = strip_tags(trim($input->post('txtFax')));
	$contacto->otrosDatos = nl2br(strip_tags(trim($input->post('txtOtrosDatos'))));

	$contacto->contactos_email = null;

	if($id_contacto!=null){
		$contacto->id = $id_contacto;
	}
	return $contacto;
}

function recogerCorreos($input)
{
	unset($correos);
	$correos = null;
	$principal=$input->post('radPrincipal');
	$noValido=$input->post('chkNoValido', TRUE);
	if($input->post('txtEmail')!=null){
		foreach ($input->post('txtEmail') as $id => $txtCorreo) {
			$txtCorreo = strip_tags(trim($txtCorreo));
			if($txtCorreo=="") continue;

			$email = new Contactos_email();
			$email->idTemp = $id;
			if($id>0){
				$email->id=$id;
			}
			$email->correo = $txtCorreo;
			// ¿Es principal?
			($principal==$id)? $email->principal=1:$email->principal=0; 
			// ¿Es no válido?
			(isset($noValido[$id])&&$principal!=$id)? $email->noValido=1:$email->noValido=0;

			// Almacenar en el array
			// $email->save();
			$correos[] = $email;
		}
	}
	return $correos;
}

/* End of file contactos.php */
/* Location: ./application/controllers/contactos.php */