<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getContactos(){
		$ssql = "select * from contactos";
		unset($listado);
		$result=mysql_query($ssql);
		while($row=mysql_fetch_array($result)){
			$listado[]=$row;
		}
		return $listado;
	}

	public function countContactos(){
		return $this->db->count_all_results('contactos');
	}



   public function getContactosPaginado($limit, $offset)
   {
		$ssql = "select * from contactos LIMIT $limit OFFSET $offset";
		unset($listado);
		$result=mysql_query($ssql);
		while($row=mysql_fetch_array($result)){
			$listado[]=$row;
		}
		return $listado;
   }
}