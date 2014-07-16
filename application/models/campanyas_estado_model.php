<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanyas_estado_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getEstados($id=null){
		if($id==null){
			$ssql = "select * from campanyas_estado order by id_estado";
		}else{
			$ssql = "select * from campanyass_estado where id_estado=".$id;
		}

		$result=mysql_query($ssql);
		$return = null;
		while($row = mysql_fetch_array($result)){
			$return[]=$row;
		}
		return $return;
	}
}