<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades_prioridad_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getPrioridades($id=null){
		if($id==null){
			$ssql = "select * from actividades_prioridad order by id_prioridad";
		}else{
			$ssql = "select * from actividades_prioridad where id_prioridad=".$id;
		}

		$result=mysql_query($ssql);
		$return = null;
		while($row = mysql_fetch_array($result)){
			$return[]=$row;
		}
		return $return;
	}
}