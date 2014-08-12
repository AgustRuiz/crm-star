<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Perfil extends DataMapper{

	var $table = 'perfiles';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('');
	public $has_many = array('usuario');

	// Validación de campos
	public $validation = array(
		'nombre' => array(
			'label' => 'Identificador del perfil',
			'rules' => array('required', 'unique', 'trim', 'min_length' => 3, 'max_length' => 30, 'alpha_dash_dot'),
			),
		'contactos_listar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'contactos_crear' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'contactos_editar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'contactos_eliminar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'campanyas_listar_todas' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'campanyas_listar_propias' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'campanyas_crear' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'campanyas_editar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'campanyas_eliminar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_listar_todas' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_listar_propias' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_crear_propias' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_editar_propias' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_eliminar_propias' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_crear_todas' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_editar_todas' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'actividades_eliminar_todas' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'usuarios_listar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'usuarios_crear' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'usuarios_editar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			),
		'usuarios_eliminar' => array(
			'label' => 'Visualizado',
			'rules' => array('boolean')
			)
		);

}
/* End of file perfil.php */
/* Location: ./application/models/perfil.php */