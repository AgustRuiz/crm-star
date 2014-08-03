<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Campanyas_tipo extends DataMapper{

	var $table = 'campanyas_tipos';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('');
	public $has_many = array('campanya');

	// Validación de campos
	public $validation = array(
		'tipo' => array(
			'label' => 'Descripción del tipo',
			'rules' => array('required', 'trim', 'max_length' => 30),
			),
		'estilo_tipo' => array(
			'label' => 'Estilo del tipo',
			'rules' => array('required', 'trim', 'max_length' => 30),
			)
		);

}
/* End of file campanyas_tipo.php */
/* Location: ./application/models/campanyas_tipo.php */