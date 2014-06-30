<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getUsuarios($limit=null, $offset=null){
		$ssql = "select * from usuarios";
		// Limit y Offset
		if($limit!=null){
			if($offset!=null){
				$ssql .= " LIMIT $limit OFFSET $offset";
			}else{
				$ssql .= " LIMIT $limit";
			}
		}

		unset($listado);
		$result=mysql_query($ssql);
		while($row=mysql_fetch_array($result)){
			$listado[]=$row;
		}
		return $listado;
	}

	function getusuario($id=null){
		if($id==null) return null;

		$ssql = "select * from usuarios where id=".$id;
		$result=mysql_query($ssql);
		if(mysql_num_rows($result)>0){
			$return = mysql_fetch_array($result);
			$return['correos']=getEmails($id);
			return $return;
		}else{
			return null;
		}
	}

	function countUsuarios(){
		return $this->db->count_all_results('usuarios');
	}
}

/* FUNCIONES AUXILIARES */
function construirData($usuario){
	$return = array(
		'nombre' => $usuario['nombre'],
		'apellidos' => $usuario['apellidos'],
		'nif' => $usuario['nif'],
		'direccion' => $usuario['direccion'],
		'ciudad' => $usuario['ciudad'],
		'provincia' => $usuario['provincia'],
		'cp' => $usuario['cp'],
		'pais' => $usuario['pais'],
		'telfOficina' => $usuario['telfOficina'],
		'telfMovil' => $usuario['telfMovil'],
		'fax' => $usuario['fax'],
		'otrosDatos' => $usuario['otrosDatos']
		);
	if(isset($usuario['id']))
		$return['id'] = $usuario['id'];
	return $return;
}

function getEmails($id=null){
	// return null;
	if($id==null) return null;

	$ssql = "select * from usuarios_correos where id_usuario=".$id." order by principal DESC, noValido ASC";
	$result=mysql_query($ssql);
	if(mysql_num_rows($result)>0){
		unset($return);
		while($row = mysql_fetch_array($result)){
			$return[] = $row;
		}
		return $return;
	}
	else{
		return null;
	}
}