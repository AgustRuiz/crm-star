<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Campanya extends DataMapper{

	var $table = 'campanyas';	// Nombre de la tabla al mapear
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
	public $has_one = array('campanyas_estado', 'campanyas_tipo', 'usuario');
	public $has_many = array('');

	// Validación de campos
	public $validation = array(
		'nombre' => array(
			'label' => 'Nombre del contacto',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 50)
			),
		'fechaInicio' => array(
			'label' => 'Fecha de inicio',
			'rules' => array('valid_date')
			),
		'fechaFin' => array(
			'label' => 'Fecha de finalizacion',
			'rules' => array('valid_date')
			),
		'objetivo' => array(
			'label' => 'Objetivo de la campaña',
			'rules' => array('trim')
			),
		'descripcion' => array(
			'label' => 'Descripción de la campaña',
			'rules' => array('trim')
			)
		);

}
/* End of file campanya.php */
/* Location: ./application/models/campanya.php */