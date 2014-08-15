<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertas extends CI_Controller {

	function __construct(){
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

	public function listar($offset=0){
		$limit = $this->Configuration_model->rowsPerPage();

		// Obtener listado (parcial)
		$alertas = new Alerta();
		$data['listaAlertas'] = $alertas->where_related_usuario('id', $this->session->userdata('id'))->order_by('fechaHora', 'desc')->get($limit, $offset);
		// Paginación
		$total = $alertas->result_count();
		$config['base_url'] = base_url().'alertas/listar/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		// Número de alertas
		$data['numContacts'] = $total;
		$data['initialRow'] = $offset+1;
		$data['finalRow'] = ($offset+$limit>$total)?$total:$offset+$limit;
		// Offset y Orden
		$data['offset'] = $offset;

		// Cargar las vistas
		$this->load->view('header');
		$this->load->view('alertas/listar', $data);
		$this->load->view('sidebars/alertas/listar');
		$this->load->view('footer');
	}

	public function ver($id=null, $visualizado=null){
		$this->load->view('header');
		
		if($id==null){
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$data['alerta'] = new Alerta();
			$data['alerta']->get_by_id($id);
			if($data['alerta']->result_count()>0){
				if($visualizado!=null){
					($visualizado=='true')?$data['alerta']->visualizado=1:$data['alerta']->visualizado=0;
					$data['alerta']->save();
					header("Location: ".$this->config->base_url()."alertas/ver/".$id);
				}
				$this->load->view('alertas/ver', $data);
				$this->load->view('sidebars/alertas/ver');
			}else{
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}
			$this->load->view('footer');
		}
	}

	public function nuevo(){
		$data['alerta'] = new Alerta();
		if(isset($_GET['actividad'])){
			$data['alerta']->actividad =  new Actividad();
			$data['alerta']->actividad->get_by_id($_GET['actividad']);
		}
		$this->load->view('header');
		$this->load->view('alertas/nuevo', $data);
		$this->load->view('sidebars/alertas/nuevo');
		$this->load->view('footer');
		$this->load->view("alertas/js/include_formulario");
	}

	public function nuevo2(){
		// Recoger el formulario
		$alerta = recogerFormulario($this->input);
		// Recoger actividad
		$actividad = new Actividad();
		if($this->input->post('txtIdActividad')!=''){
			$actividad->get_by_id($this->input->post('txtIdActividad'));
		}
		$alerta->actividad = $actividad;
		// Agregar usuario
		$usuario = new Usuario();
		$usuario->get_by_id($this->session->userdata('id'));
		$alerta->usuario = $usuario;

		if($alerta->save(array($actividad, $usuario))){
			// Inserción correcta
			$data['success'] = "Alerta creada correctamente.";
			$data['alerta'] = new Alerta();
			$data['alerta']->get_by_id($alerta->id);

			$this->load->view("header");
			$this->load->view('alertas/ver', $data);
			$this->load->view('sidebars/alertas/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la creación de la alerta:<ul>";
			foreach ($alerta->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';
			$data["alerta"]=$alerta;

			$this->load->view("header");
			$this->load->view('alertas/nuevo', $data);
			$this->load->view('sidebars/alertas/nuevo');
		}
		$this->load->view('footer');
		$this->load->view("alertas/js/include_formulario");
	}

	public function eliminar($id=null){

		$alerta = new Alerta();

		if($id==null){
			$this->load->view('header');
			$this->load->view('errores/error404');
			$this->load->view('sidebars/error404');
		}else{
			$alerta->get_by_id($id);
			if($alerta->result_count()==0){
				$this->load->view('header');
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				if($alerta->delete()){
					$data=array("success"=>"Alerta eliminada");
				}else{
					$data['error']="No ha podido eliminarse la alerta";
					$data['alerta']['id']=$id;
				}
				$this->load->view('header');
				$this->load->view('alertas/eliminar', $data);
				$this->load->view('sidebars/alertas/eliminar');
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
			$data['alerta'] = new Alerta();
			$data['alerta']->get_by_id($id);
			if($data['alerta']->result_count() == 0){
				$this->load->view('errores/error404');
				$this->load->view('sidebars/error404');
			}else{
				if($data['alerta']->usuario->id != $this->session->userdata('id')){
					$data['error']="No puedes editar una alerta que no te pertenezca.";
					$this->load->view('alertas/ver', $data);
					$this->load->view('sidebars/alertas/ver');
				}else{
					$this->load->view('alertas/editar', $data);
					$this->load->view('sidebars/alertas/editar');
				}
			}
		}
		$this->load->view('footer');
		$this->load->view("alertas/js/include_formulario");
	}

	public function editar2($id=null){
		// Recoger formulario
		$alertaEditada = recogerFormulario($this->input);

		$alerta = new Alerta();
		$alerta->get_by_id($id);
		$alerta->asunto = $alertaEditada->asunto;
		$alerta->descripcion = $alertaEditada->descripcion;
		$alerta->emergente = $alertaEditada->emergente;
		$alerta->email = $alertaEditada->email;
		$alerta->fechaHora = $alertaEditada->fechaHora;

		if(strtotime($alerta->fechaHora) >= time()){
			$alerta->visualizado=0;
		}

		// Recoger Actividad
		$actividad = new Actividad();
		$actividad->get_by_id($this->input->post('txtIdActividad'));
		if($actividad->result_count() == 0){
			$alerta->delete($alerta->actividad);
		}else{
			$alerta->actividad = $actividad;
		}
		
		if($alerta->save(array($actividad))){
			// Inserción correcta
			$data['success'] = "Alerta editada correctamente.";
			$data['alerta'] = new Alerta();
			$data['alerta']->get_by_id($alerta->id);

			$this->load->view("header");
			$this->load->view('alertas/ver', $data);
			$this->load->view('sidebars/alertas/ver');
		}else{
			// Fallo al insertar
			$data['error'] = "Ha ocurrido un error durante la edición de la alerta:<ul>";
			foreach ($alerta->error->all as $error)
			{
				$data['error'] .= '<li>'.$error.'</li>';
			}
			$data['error'] .= '</ul>';
			$data['alerta']=$alerta;

			$this->load->view("header");
			$this->load->view('alertas/editar', $data);
			$this->load->view('sidebars/alertas/editar');
		}
		$this->load->view('footer');
		$this->load->view("alertas/js/include_formulario");
	}

	public function visualizar($id=null){
		$alerta = new Alerta();
		$alerta->get_by_id($id);
		if($alerta->result_count()==1){
			$alerta->visualizado='1';
			$alerta->save();
		}
	}

	public function posponer($id=null, $minutos){
		$alerta = new Alerta();
		$alerta->get_by_id($id);
		if($alerta->result_count()==1){
			$alerta->fechaHora = date("Y-n-j H:i", time()+$minutos*60);
			$alerta->save();
		}
	}

	public function popup_alertas(){
		$ahora = date("Y-m-d H:i", time());
		$alertas = new Alerta();
		$data['listaAlertas'] = $alertas->where_related_usuario('id', $this->session->userdata('id'))->where('fechaHora <=', $ahora)->where('visualizado', '0')->order_by('fechaHora', 'asc')->get();
		$this->load->view("alertas/popups/listar", $data);
	}

	public function getAlertaJson(){
		$ahora = date("Y-m-d H:i", time());
		$alerta = new Alerta();
		$alerta->where_related_usuario('id', $this->session->userdata('id'))->where('fechaHora <=', $ahora)->where('emergente', '1')->where('visualizado', '0')->get(1);
		header('Content-Type: application/json');
		if($alerta->result_count()>0){
			$alertaJson=array(
				'id' => $alerta->id,
				'asunto' => $alerta->asunto,
				'descripcion' => $alerta->descripcion,
				'fechaHora' => date("d-m-Y H:i", strtotime($alerta->fechaHora))
				);
			echo json_encode($alertaJson);
		}else{
			echo json_encode(null);
		}
	}

	public function getNumAlertasJson(){
		$alerta = new Alerta();
		$ahora = date("Y-m-d H:i", time());
		$numAlertas = $alerta->where_related_usuario('id', $this->session->userdata('id'))->where('fechaHora <=', $ahora)->where('visualizado', '0')->get()->result_count();
		header('Content-Type: application/json');
		echo json_encode($numAlertas);
	}
}

/* FUNCIONES AUXILIARES */
function recogerFormulario($input, $id=null){
	$alerta = new Alerta();

	$alerta->asunto = strip_tags(trim($input->post('txtAsunto')));
	$alerta->descripcion = nl2br(strip_tags(trim($input->post('txtDescripcion'))));
	$alerta->emergente = strip_tags(trim($input->post('cmbEmergente')));
	$alerta->email = strip_tags(trim($input->post('cmbEmail')));

	if($id!=null){
		$alerta->id=$id;
	}

	if($input->post('txtFechaHoraTimestamp')!=0){
		$alerta->fechaHora = date("Y-n-j H:i:s", strip_tags(trim($input->post('txtFechaHoraTimestamp'))));
	}

	return $alerta;
}

/* End of file alertas.php */
/* Location: ./application/controllers/alertas.php */