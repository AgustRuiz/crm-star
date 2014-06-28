<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getContactos($limit=null, $offset=null){
		$ssql = "select * from contactos";
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

		$ssql = "select * from contactos where id=".$id;
		$result=mysql_query($ssql);
		if(mysql_num_rows($result)>0)
			return mysql_fetch_array($result);
		else
			return null;
	}

	public function countContactos(){
		return $this->db->count_all_results('contactos');
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
		'direccion' => $contacto['direccion'],
		'ciudad' => $contacto['ciudad'],
		'provincia' => $contacto['provincia'],
		'cp' => $contacto['cp'],
		'pais' => $contacto['pais'],
		'telfOficina' => $contacto['telfOficina'],
		'telfMovil' => $contacto['telfMovil'],
		'fax' => $contacto['fax']
		);
	if(isset($contacto['id']))
		$return['id'] = $contacto['id'];
	return $return;
}