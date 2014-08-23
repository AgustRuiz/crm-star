<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Configuracion extends DataMapper{

	var $table = 'configuraciones';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('usuario');
	public $has_many = array();

	// Validación de campos
	public $validation = array(
		'contactos_columna' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'max_length' => 100),
			),
		'contactos_orden' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'max_length' => 4),
			),
		'contactos_filtro' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'max_length' => 256),
			),
		'usuarios_columna' => array(
			// 'label' => 'Filtro de usuarios',
			'rules' => array('trim', 'max_length' => 100),
			),
		'usuarios_orden' => array(
			// 'label' => 'Filtro de usuarios',
			'rules' => array('trim', 'max_length' => 4),
			),
		'usuarios_filtro' => array(
			// 'label' => 'Filtro de usuarios',
			'rules' => array('trim', 'max_length' => 256),
			),
		'campanyas_columna' => array(
			// 'label' => 'Filtro de campanyas',
			'rules' => array('trim', 'max_length' => 100),
			),
		'campanyas_orden' => array(
			// 'label' => 'Filtro de campanyas',
			'rules' => array('trim', 'max_length' => 4),
			),
		'campanyas_filtro' => array(
			// 'label' => 'Filtro de campanyas',
			'rules' => array('trim', 'max_length' => 256),
			),
		'actividades_columna' => array(
			// 'label' => 'Filtro de actividades',
			'rules' => array('trim', 'max_length' => 100),
			),
		'actividades_orden' => array(
			// 'label' => 'Filtro de actividades',
			'rules' => array('trim', 'max_length' => 4),
			),
		'actividades_filtro' => array(
			// 'label' => 'Filtro de actividades',
			'rules' => array('trim', 'max_length' => 256),
			),
		'alertas_columna' => array(
			// 'label' => 'Filtro de alertas',
			'rules' => array('trim', 'max_length' => 100),
			),
		'alertas_orden' => array(
			// 'label' => 'Filtro de alertas',
			'rules' => array('trim', 'max_length' => 4),
			),
		'alertas_filtro' => array(
			// 'label' => 'Filtro de alertas',
			'rules' => array('trim', 'max_length' => 256),
			)
		);

}
/* End of file configuracion.php */
/* Location: ./application/models/configuracion.php */