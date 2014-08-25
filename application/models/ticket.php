<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends DataMapper{

	var $table = 'tickets';	// Nombre de la tabla al mapear
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
	public $has_one = array('prioridad', 'tickets_estado', 'usuario', 'contacto');
	public $has_many = array('actividades');

	// Validación de campos
	public $validation = array(
		'asunto' => array(
			'label' => 'Asunto del ticket',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 100)
			),
		'descripcion' => array(
			'label' => 'Descripcion del ticket',
			'rules' => array('trim')
			),
		'descripcion' => array(
			'label' => 'Resolución del ticket',
			'rules' => array('trim')
			),
		'prioridad' => array(
			'label' => 'Prioridad',
			'rules' => array('required')
			),
		'tickets_estado' => array(
			'label' => 'Estado',
			'rules' => array('required')
			),
		'contacto' => array(
			'label' => 'Contacto',
			'rules' => array('required')
			),
		'usuario' => array(
			'label' => 'Usuario',
			'rules' => array('trim')
			)
		);
}
/* End of file ticket.php */
/* Location: ./application/models/ticket.php */