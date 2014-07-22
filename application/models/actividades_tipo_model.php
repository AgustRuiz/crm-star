<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades_tipo_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getTipos($id=null){
		if($id==null){
			$ssql = "select * from actividades_tipo order by id_tipo";
		}else{
			$ssql = "select * from actividades_tipo where id_tipo=".$id;
		}

		$result=mysql_query($ssql);
		$return = null;
		while($row = mysql_fetch_array($result)){
			$return[]=$row;
		}
		return $return;
	}
}