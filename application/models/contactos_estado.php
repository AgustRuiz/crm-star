<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contactos_estado extends DataMapper{

	var $table = 'contactos_estados';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('');
	public $has_many = array('contacto');

	// Validación de campos
	public $validation = array(
		'estado' => array(
			'label' => 'Descripción del estado',
			'rules' => array('required', 'trim', 'max_length' => 30),
			),
		'estilo_estado' => array(
			'label' => 'Estilo del estado',
			'rules' => array('required', 'trim', 'max_length' => 30),
			)
		);

}
/* End of file contactos_estado.php */
/* Location: ./application/models/contactos_estado.php */