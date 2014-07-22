<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Constantes útiles
define('mysql_CODE_DUPLICATE_KEY', 1062);


class Actividades_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getActividades($limit=null, $offset=null, $filtro=null){
		$ssql = "SELECT a.*, t.*, p.*, e.*, con.nombre as contacto_nombre, con.apellidos as contacto_apellidos, u.nombre as usuario_nombre, u.apellidos as usuario_apellidos FROM actividades a, actividades_tipo t, actividades_prioridad p, actividades_estado e, contactos con, usuarios u WHERE a.tipo=t.id_tipo AND a.prioridad=p.id_prioridad AND a.estado=e.id_estado AND a.contacto=con.id AND a.usuario=u.id";
		// Filtro
		if($filtro!=null){
			$ssql .= " AND (a.nombre like '%".$filtro."%' OR a.descripcion like '%".$filtro."%' OR a.resultado like '%".$filtro."%' )";
		}
		// Orden
		$ssql .= " ORDER BY a.inicio, a.id";

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

	function getActividadesUsuario($limit=null, $offset=null, $usuario=null, $filtro=null){
		$ssql = "SELECT a.*, t.*, p.*, e.*, con.nombre as contacto_nombre, con.apellidos as contacto_apellidos, u.nombre as usuario_nombre, u.apellidos as usuario_apellidos FROM actividades a, actividades_tipo t, actividades_prioridad p, actividades_estado e, contactos con, usuarios u WHERE a.tipo=t.id_tipo AND a.prioridad=p.id_prioridad AND a.estado=e.id_estado AND a.contacto=con.id AND a.usuario=u.id";
		// Usuario
		if($usuario!=null){
			$ssql .= " AND a.usuario=".$usuario;
		}
		// Filtro
		if($filtro!=null){
			$ssql .= " AND (a.nombre like '%".$filtro."%' OR a.descripcion like '%".$filtro."%' OR a.resultado like '%".$filtro."%')";
		}
		// Orden
		// $ssql .= " ORDER BY a.inicio, a.id";
		$ssql .= " ORDER BY a.id";

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

	public function getActividad($id=null){
		if($id==null) return null;

		$ssql = "SELECT a.*, camp.nombre as campanya_nombre FROM (SELECT a.id, a.nombre, a.inicio, a.fin, a.usuario, a.campanya, a.contacto, a.descripcion, a.resultado, t.*, p.*, e.*, con.nombre as contacto_nombre, con.apellidos as contacto_apellidos, u.nombre as usuario_nombre, u.apellidos as usuario_apellidos FROM actividades a, actividades_tipo t, actividades_prioridad p, actividades_estado e, contactos con, usuarios u WHERE a.id=".$id." AND a.tipo=t.id_tipo AND a.prioridad=p.id_prioridad AND a.estado=e.id_estado AND a.contacto=con.id AND a.usuario=u.id) a LEFT JOIN campanyas camp ON a.campanya=camp.id";
		
		$result=mysql_query($ssql);
		if(mysql_num_rows($result)>0){
			return mysql_fetch_array($result);
		}else{
			return null;
		}
	}


	public function insertar($actividad){
		if($actividad['nombre']==null || $actividad['nombre']==""){
			return -1; // Falta nombre
		}
		if($actividad['inicio']=="0"){
			return -2; // Falta inicio (fecha/hora)
		}
		if($actividad['contacto']==null || $actividad['contacto']=="0"){
			return -3; // Falta contacto
		}
		if($actividad['usuario']==null ||$actividad['usuario']=="0"){
			return -4; // Falta usuario
		}

		// Todos los datos necesarios están a partir de este punto
		$return = construirData($actividad);
		$result = $this->db->insert('actividades',$return);
		if(!$result){
			// print_r($actividad);
			// echo mysql_error();
			switch (mysql_errno()) {
				default:
				$result=-1000;
				break;
			}
		}
		return $result;
	}

	public function actualizar($actividad){
		if($actividad['nombre']==null || $actividad['nombre']==""){
			return -1; // Falta nombre
		}
		if($actividad['inicio']=="0"){
			return -2; // Falta inicio (fecha/hora)
		}
		if($actividad['contacto']==null || $actividad['contacto']=="0"){
			return -3; // Falta contacto
		}
		if($actividad['usuario']==null ||$actividad['usuario']=="0"){
			return -4; // Falta usuario
		}

		// Todos los datos necesarios están a partir de este punto
		$data = construirData($actividad);

		$this->db->where('id', $actividad['id']);
		$result = $this->db->update('actividades',$data);
		if(!$result){
			switch (mysql_errno()) {
				default:
				$result=-1000;
				break;
			}
		}
		return $result;
	}

	public function eliminar($id){
		$ssql = "delete from actividades where id=".$id;
		$result = mysql_query($ssql);
		return mysql_affected_rows();
	}
}

/* FUNCIONES AUXILIARES */
function construirData($actividad){
	unset($return);
	$return['nombre'] = $actividad['nombre'];
	$return['inicio'] = $actividad['inicio'];
	$return['fin'] = $actividad['fin'];
	$return['tipo'] = $actividad['tipo'];
	$return['prioridad'] = $actividad['prioridad'];
	$return['estado'] = $actividad['estado'];
	$return['usuario'] = $actividad['usuario'];
	$return['campanya'] = $actividad['campanya'];
	$return['contacto'] = $actividad['contacto'];
	$return['descripcion'] = $actividad['descripcion'];
	$return['resultado'] = $actividad['resultado'];
	if(isset($actividad['id'])){
		$return['id'] = $actividad['id'];
	}

	return $return;
}