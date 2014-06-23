<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getContactos(){
		$ssql = "select * from contactos";
		return mysql_query($ssql);
	}
}