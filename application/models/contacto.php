<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contacto extends DataMapper{

	var $table = 'contactos';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;
	var $auto_populate_has_many = true;
	var $auto_populate_has_one = true;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('contactos_estado');
	public $has_many = array('contactos_email', 'actividad');

	// Validación de campos
	public $validation = array(
		'nombre' => array(
			'label' => 'Nombre del contacto',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 40),
			),
		'apellidos' => array(
			'label' => 'Apellidos del contacto',
			'rules' => array('trim', 'max_length' => 40),
			),
		'nif' => array(
			'label' => 'NIF del contacto',
			'rules' => array('trim', 'unique', 'max_length' => 15),
			),
		'contactos_estado_id' => array(
			'label' => 'Estado del contacto',
			'rules' => array('trim'),
			),
		'direccion' => array(
			'label' => 'Dirección del contacto',
			'rules' => array('trim', 'max_length' => 200),
			),
		'cp' => array(
			'label' => 'Código postal',
			'rules' => array('trim', 'max_length' => 10),
			),
		'pais' => array(
			'label' => 'País del contacto',
			'rules' => array('trim', 'max_length' => 40),
			),
		'telfOficina' => array(
			'label' => 'Teléfono de oficina del usuario',
			'rules' => array('trim', 'max_length' => 15),
			),
		'telfMovil' => array(
			'label' => 'Teléfono móvil del usuario',
			'rules' => array('trim', 'max_length' => 15),
			),
		'otrosDatos' => array(
			'label' => 'Otros datos del usuario',
			'rules' => array('trim'),
			)
		);

}
/* End of file contacto.php */
/* Location: ./application/models/contacto.php */