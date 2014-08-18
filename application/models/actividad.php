<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividad extends DataMapper{

	var $table = 'actividades';	// Nombre de la tabla al mapear
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
	public $has_one = array('actividades_tipo', 'prioridad', 'actividades_estado', 'campanya', 'contacto', 'usuario');
	public $has_many = array('alerta');

	// Validación de campos
	public $validation = array(
		'asunto' => array(
			'label' => 'Asunto de la actividad',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 100)
			),
		'inicio' => array(
			'label' => 'Fecha de inicio',
			'rules' => array('valid_date', 'required')
			),
		'fin' => array(
			'label' => 'Fecha de finalizacion',
			'rules' => array('valid_date')
			),
		'actividades_tipo' => array(
			'label' => 'Tipo de actividad',
			'rules' => array('required')
			),
		'actividades_prioridad' => array(
			'label' => 'Prioridad de la actividad',
			'rules' => array('required')
			),
		'actividades_estado' => array(
			'label' => 'Estado de la actividad',
			'rules' => array('required')
			),
		'contacto' => array(
			'label' => 'Contacto',
			'rules' => array('required')
			),
		'usuario' => array(
			'label' => 'Usuario',
			'rules' => array('required')
			),
		'descripcion' => array(
			'label' => 'Descripcion de la actividad',
			'rules' => array('trim', 'required')
			),
		'resultado' => array(
			'label' => 'resultado de la actividad',
			'rules' => array('trim')
			)
		);

}
/* End of file actividades.php */
/* Location: ./application/models/actividades.php */