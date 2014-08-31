<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
	}

	public function emailAlerta($id=null){
		$alerta = new Alerta();
		$alerta->get_by_id($id);
		if($alerta->result_count()==1){
			include('include_mail.php');
			if(mail_alerta($alerta->usuario->email, $alerta->id, $alerta->asunto, $alerta->descripcion, $alerta->fechaHora, $this->config->base_url())){

				echo "Correo enviado correctamente";
			}else{
				echo "Error al enviar el correo";
			}
		}else{
			echo "Error al recuperar la alerta";
		}
	}
}

/* End of file cron.php */
/* Location: ./application/controllers/cron.php */