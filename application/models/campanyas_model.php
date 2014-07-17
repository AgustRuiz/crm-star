<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Constantes útiles
define('mysql_CODE_DUPLICATE_KEY', 1062);


class Campanyas_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getCampanyas($limit=null, $offset=null, $filtro=null){
		// $ssql = "select c.*, t.*, e.*, u.nombre AS usuario_nombre, u.apellidos AS usuario_apellidos from campanyas c, usuarios u, campanyas_tipo t, campanyas_estado e WHERE (c.usuario=u.id OR c.usuario=0) AND c.tipo=t.id_tipo AND c.estado=e.id_estado";
		$ssql = "SELECT c.*, u.nombre AS usuario_nombre, u.apellidos AS usuario_apellidos  FROM (SELECT c.id, c.nombre, c.fechaInicio, c.fechaFin, c.objetivo, c.descripcion, c.usuario, t.*, e.* FROM campanyas c, campanyas_tipo t, campanyas_estado e WHERE c.tipo=t.id_tipo AND c.estado=e.id_estado) c LEFT JOIN usuarios u ON c.usuario=u.id";
		// Filtro
		if($filtro!=null){
			$ssql .= " AND c.nombre like '".$filtro."'";
		}
		// Orden
		$ssql .= " ORDER BY c.id";
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
		if(!isset($listado)){
			$listado = null;
		}
		return $listado;
	}

	function getCampanyasUsuario($limit=null, $offset=null, $usuario=null){
		$ssql = "SELECT c.*, u.nombre AS usuario_nombre, u.apellidos AS usuario_apellidos  FROM (SELECT c.id, c.nombre, c.fechaInicio, c.fechaFin, c.objetivo, c.descripcion, c.usuario, t.*, e.* FROM campanyas c, campanyas_tipo t, campanyas_estado e WHERE c.tipo=t.id_tipo AND c.estado=e.id_estado) c INNER JOIN usuarios u ON c.usuario=u.id";
		// Filtro
		if($usuario!=null){
			$ssql .= " AND c.usuario = ".$usuario;
		}
		// Orden
		$ssql .= " ORDER BY c.id";
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
		if(!isset($listado)){
			$listado = null;
		}
		return $listado;
	}

	function getCampanya($id=null){
		if($id==null) return null;

		$ssql = "SELECT c.*, u.nombre AS usuario_nombre, u.apellidos AS usuario_apellidos  FROM (SELECT c.id, c.nombre, c.fechaInicio, c.fechaFin, c.objetivo, c.descripcion, c.usuario, t.*, e.* FROM campanyas c, campanyas_tipo t, campanyas_estado e WHERE c.tipo=t.id_tipo AND c.estado=e.id_estado) c LEFT JOIN usuarios u ON c.usuario=u.id WHERE c.id=".$id;
		
		$result=mysql_query($ssql);
		if(mysql_num_rows($result)>0){
			return mysql_fetch_array($result);
		}else{
			return null;
		}
	}


	function countCampanyas($filtro=null){
		$ssql = "select count(*) from campanyas";
		// Filtro
		if($filtro!=null){
			$ssql .= " AND c.nombre like '".$filtro."'";
		}
		$result=mysql_query($ssql);
		$num = mysql_fetch_array($result);
		return $num[0];
	}

	public function insertar($campanya){
		// Error -1: Falta el nombre
		if($campanya['nombre']==null || $campanya['nombre']=="") return -1;

		// Todos los datos necesarios están a partir de este punto
		$data = construirData($campanya);
		$result = $this->db->insert('campanyas',$data);

		if(!$result){
			switch (mysql_errno()) {
				default:
				$result=-mysql_errno();
				break;
			}
		}
		return $result;
	}

	public function actualizar($campanya){
		// Error -1: Falta el nombre
		if($campanya['nombre']==null || $campanya['nombre']=="") return -1;

		// Todos los datos necesarios están a partir de este punto
		$data = construirData($campanya);

		$this->db->where('id', $campanya['id']);
		$result = $this->db->update('campanyas',$data);
		if(!$result){
			switch (mysql_errno()) {
				default:
				$result=-1048;
				break;
			}
		}
		return $result;
	}

	public function eliminar($id){
		$ssql = "delete from campanyas where id=".$id;
		$result = mysql_query($ssql);
		return mysql_affected_rows();
	}
}

/* FUNCIONES AUXILIARES */
function construirData($campanya){
	$return = array(
		'nombre' => $campanya['nombre'],
		'fechaInicio' => $campanya['fechaInicio'],
		'fechaFin' => $campanya['fechaFin'],
		'estado' => $campanya['estado'],
		'tipo' => $campanya['tipo'],
		'objetivo' => $campanya['objetivo'],
		'descripcion' => $campanya['descripcion'],
		'usuario' => $campanya['usuario']
		);
	if(isset($campanya['id']))
		$return['id'] = $campanya['id'];
	return $return;
}