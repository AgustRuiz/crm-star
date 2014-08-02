<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contactos_email extends DataMapper{

	var $table = 'contactos_email';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('contacto');
	public $has_many = array('');

	// Validación de campos
	public $validation = array(
		'correo' => array(
			'label' => 'Correo electrónico',
			'rules' => array('required', 'trim', 'max_length' => 50),
			),
		'principal' => array(
			'label' => 'Marca de correo electrónico principal',
			'rules' => array('required', 'trim'),
			),
		'noValido' => array(
			'label' => 'Validez del correo electrónico',
			'rules' => array('required', 'trim'),
			)
		);

}
/* End of file contactos_estado.php */
/* Location: ./application/models/contactos_estado.php */