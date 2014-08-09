<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alerta extends DataMapper{

	var $table = 'alertas';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;
	var $auto_populate_has_many = true;
	var $auto_populate_has_one = true;

	// Constructor
	function __construct($id = null)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('usuario', 'actividad');
	public $has_many = array('');

	// Validación de campos
	public $validation = array(
		'asunto' => array(
			'label' => 'Asunto de la alerta',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 100)
			),
		'descripcion' => array(
			'label' => 'Descripcion de la alerta',
			'rules' => array('trim')
			),
		'fechaHora' => array(
			'label' => 'Fecha y hora de la alerta',
			'rules' => array('valid_date', 'required')
			),
		'usuario' => array(
			'label' => 'Usuario',
			'rules' => array('required')
			),
		'emergente' => array(	// Por defecto, true
			'label' => 'Es emergente',
			'rules' => array('boolean')
			),
		'visualizado' => array(	// Por defecto, false
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'email' => array(	// Por defecto, false
			'label' => 'Mandar por email',
			'rules' => array('boolean')
			),
		'emailEnviado' => array( // Por defecto, false
			'label' => 'Email enviado',
			'rules' => array('boolean')
			)
		);

}
/* End of file actividades.php */
/* Location: ./application/models/actividades.php */