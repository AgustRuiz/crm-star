<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Constantes útiles
define('mysql_CODE_DUPLICATE_KEY', 1062);


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
			return $return;
		}else{
			return null;
		}
	}

	function countUsuarios(){
		return $this->db->count_all_results('usuarios');
	}


	public function insertar($usuario){
		// Error -1: Falta el nombre
		if($usuario['nombre']==null || $usuario['nombre']=="") return -1;
		// Error -2: Falta el nick
		if($usuario['nick']==null || $usuario['nick']=="") return -2;
		// Error -3: Falta correo electrónico
		if($usuario['email']==null || $usuario['email']=="") return -3;

		// Todos los datos necesarios están a partir de este punto
		$data = construirData($usuario);
		$result = $this->db->insert('usuarios',$data);
		if(!$result){
			switch (mysql_errno()) {
				case mysql_CODE_DUPLICATE_KEY:
					// Campo duplicado
					if(strpos(mysql_error(),'nick')){
						// Error -4: Nick duplicado
						$result=-4;
					}else if(strpos(mysql_error(),'email')){
						// Error -4: Correo duplicado
						$result=-5;
					}else{
						//Error no identificado
						$result=-1000;
					}
					break;

				default:
					$result=-1000;
					break;
			}
		}
		return $result;
	}

	public function eliminarUsuario($id){
		$ssql = "delete from usuarios where id=".$id;
		$result = mysql_query($ssql);
		return mysql_affected_rows();
	}

	public function actualizar($usuario){
		// Error -1: Falta el nombre
		if($usuario['nombre']==null || $usuario['nombre']=="") return -1;
		// Error -2: Falta el nick
		if($usuario['nick']==null || $usuario['nick']=="") return -2;
		// Error -3: Falta correo electrónico
		if($usuario['email']==null || $usuario['email']=="") return -3;

		// Todos los datos necesarios están a partir de este punto
		$data = construirData($usuario);

		$this->db->where('id', $usuario['id']);
		$result = $this->db->update('usuarios',$data);
		if(!$result){
			switch (mysql_errno()) {
				case mysql_CODE_DUPLICATE_KEY:
					// Campo duplicado
					if(strpos(mysql_error(),'nick')){
						// Error -4: Nick duplicado
						$result=-4;
					}else if(strpos(mysql_error(),'email')){
						// Error -4: Correo duplicado
						$result=-5;
					}else{
						//Error no identificado
						$result=-1000;
					}
					break;

				default:
					$result=-1000;
					break;
			}
		}
		return $result;
	}

	public function cambiarPassword($id, $password){
		$ssql = "update usuarios set password='".$password."' where id=".$id;
		$result = mysql_query($ssql);
	}
}

/* FUNCIONES AUXILIARES */
function construirData($usuario){
	$return = array(
		'nombre' => $usuario['nombre'],
		'apellidos' => $usuario['apellidos'],
		'nif' => $usuario['nif'],
		'nick' => $usuario['nick'],
		'email' => $usuario['email'],
		'telfOficina' => $usuario['telfOficina'],
		'telfMovil' => $usuario['telfMovil'],
		'fax' => $usuario['fax'],
		'otrosDatos' => $usuario['otrosDatos']
		);
	if(isset($usuario['id']))
		$return['id'] = $usuario['id'];
	if(isset($usuario['password']))
		$return['password'] = $usuario['password'];
	return $return;
}