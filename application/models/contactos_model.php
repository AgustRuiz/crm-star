<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getContactos($limit=null, $offset=null, $filtro=null){
		$ssql = "select * from contactos, contactos_estado WHERE contactos.id_estado = contactos_estado.id_estado";
		// Filtro
		if($filtro!=null){
			$ssql .= " AND (nombre like '%".$filtro."%' OR apellidos like '%".$filtro."%' OR nif like '%".$filtro."%')";
		}
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

	function getContacto($id=null){
		if($id==null) return null;

		$ssql = "select * from contactos, contactos_estado where contactos.id=".$id." AND contactos.id_estado = contactos_estado.id_estado";
		$result=mysql_query($ssql);
		if(mysql_num_rows($result)>0){
			$return = mysql_fetch_array($result);
			$return['correos']=getEmails($id);
			return $return;
		}else{
			return null;
		}
	}

	public function countContactos($filtro=null){
		$ssql = "select count(*) from contactos, contactos_estado WHERE contactos.id_estado = contactos_estado.id_estado";
		// Filtro
		if($filtro!=null){
			$ssql .= " AND (nombre like '%".$filtro."%' OR apellidos like '%".$filtro."%' OR nif like '%".$filtro."%')";
		}
		$result = mysql_query($ssql);
		$row = mysql_fetch_array($result);
		return $row[0];
	}

	public function insertar($contacto){
		// Error -1: Falta el nombre
		if($contacto['nombre']==null || $contacto['nombre']=="") return -1;
		// Todo correcto a partir de este punto
		$data = construirData($contacto);
		return $this->db->insert('contactos',$data);
	}

	public function actualizar($contacto){
		// Error -1: Falta el nombre
		if($contacto['nombre']==null || $contacto['nombre']=="") return -1;
		// Todo correcto a partir de este punto
		$data = construirData($contacto);

		// Eliminar todos los correos y crearlos con los datos nuevos
		$ssql = "delete from contactos_correos where id_contacto=".$contacto['id'];
		$result = mysql_query($ssql);
		if($contacto['correos']){
			foreach($contacto['correos'] as $correo){
			// if($correo['id']<=0) continue;
				$this->db->insert('contactos_correos',$correo);
			}
		}

		$this->db->where('id', $contacto['id']);
		return $this->db->update('contactos',$data);
	}

	public function eliminarContacto($id){
		$ssql = "delete from contactos where id=".$id;
		$result = mysql_query($ssql);
		return mysql_affected_rows();
	}
}

/* FUNCIONES AUXILIARES */
function construirData($contacto){
	$return = array(
		'nombre' => $contacto['nombre'],
		'apellidos' => $contacto['apellidos'],
		'nif' => $contacto['nif'],
		'id_estado' => $contacto['id_estado'],
		'direccion' => $contacto['direccion'],
		'ciudad' => $contacto['ciudad'],
		'provincia' => $contacto['provincia'],
		'cp' => $contacto['cp'],
		'pais' => $contacto['pais'],
		'telfOficina' => $contacto['telfOficina'],
		'telfMovil' => $contacto['telfMovil'],
		'fax' => $contacto['fax'],
		'otrosDatos' => $contacto['otrosDatos']
		);
	if(isset($contacto['id']))
		$return['id'] = $contacto['id'];
	return $return;
}

function getEmails($id=null){
	// return null;
	if($id==null) return null;

	$ssql = "select * from contactos_correos where id_contacto=".$id." order by principal DESC, noValido ASC";
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