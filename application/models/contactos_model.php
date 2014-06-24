<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getContactos($limit=null, $offset=null){
		if($limit!=null){
			if($offset!=null){
				$ssql = "select * from contactos LIMIT $limit OFFSET $offset";
			}else{
				$ssql = "select * from contactos LIMIT $limit";
			}
		}else{
			$ssql = "select * from contactos";
		}

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
}