<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Usuario extends DataMapper{

	var $table = 'usuarios';	// Nombre de la tabla al mapear
	// var $model = 'template';	// Nombre del modelo
	var $cascade_delete = false;

	// Constructor
	function __construct($id = NULL)
	{
		parent::__construct($id);
	} 

	// Relaciones
	public $has_one = array('perfil', 'usuarios_estado', 'configuracion');
	public $has_many = array('campanya', 'actividad', 'alerta', 'ticket');

	// Validación de campos
	public $validation = array(
		'nick' => array(
			'label' => 'Identificador de usuario',
			'rules' => array('required', 'unique', 'trim', 'min_length' => 3, 'max_length' => 15, 'alpha_dash_dot'),
			),
		'password' => array(
			'label' => 'Contraseña',
			'rules' => array('required', 'encrypt', 'trim', 'max_length' => 100),
			),
		'nombre' => array(
			'label' => 'Nombre del usuario',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 50),
			),
		'apellidos' => array(
			'label' => 'Apellidos del usuario',
			'rules' => array('required', 'trim', 'min_length' => 3, 'max_length' => 50),
			),
		'nif' => array(
			'label' => 'NIF del usuario',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 15),
			),
		'email' => array(
			'label' => 'Correo electrónico del usuario',
			'rules' => array('trim', 'unique', 'required', 'min_length' => 3, 'max_length' => 50),
			),
		'telfOficina' => array(
			'label' => 'Teléfono de oficina del usuario',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 15),
			),
		'telfMovil' => array(
			'label' => 'Teléfono móvil del usuario',
			'rules' => array('trim', 'min_length' => 3, 'max_length' => 15),
			),
		'otrosDatos' => array(
			'label' => 'Otros datos del usuario',
			'rules' => array('trim'),
			)
		);

	// Encriptar la contraseña con el mismo datamapper
	public function _encrypt($campo){
		// if(!empty($this->{$campo})){
		// 	if(empty($this->salt)){
		// 			// Crea la variable de sal
		// 		$this->salt = md5(uniqid(rand(), true));
		// 	}
		// 	$this->{$campo} = sha1($this->salt.$this->{$campo});
		// }
		$this->{$campo} = sha1($this->{$campo});
	}

}
/* End of file usuario.php */
/* Location: ./application/models/usuario.php */