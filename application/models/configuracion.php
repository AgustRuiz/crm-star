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
		'filas' => array(
			// 'label' => 'Filas por página',
			'rules' => array('required'),
			),
		'contactos_columna' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 20, 'alpha_dash_dot'),
			),
		'contactos_orden' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 4, 'alpha_dash_dot'),
			),
		'contactos_filtro' => array(
			// 'label' => 'Filtro de contactos',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 256, 'alpha_dash_dot'),
			)
		);

}
/* End of file configuracion.php */
/* Location: ./application/models/configuracion.php */