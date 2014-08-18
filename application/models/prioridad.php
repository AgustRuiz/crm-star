<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prioridad extends DataMapper{

	var $table = 'prioridades';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('');
	public $has_many = array('actividad');

	// Validación de campos
	public $validation = array(
		'prioridad' => array(
			'label' => 'Descripción de la prioridad',
			'rules' => array('required', 'trim', 'max_length' => 30),
			),
		'estilo_prioridad' => array(
			'label' => 'Estilo de la prioridad',
			'rules' => array('required', 'trim', 'max_length' => 30),
			)
		);

}
/* End of file prioridad.php */
/* Location: ./application/models/prioridad.php */