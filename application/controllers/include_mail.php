<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Funciones con plantillas para el envío de correos

function cabeceras(){
	$cabeceras = "MIME-Version: 1.0\r\n"; 
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n"; 
	$cabeceras .= 'From: no-reply@agustruiz.es' . "\r\n";
	$cabeceras .= 'Reply-To: no-reply@agustruiz.es' . "\r\n";
	$cabeceras .= 'X-Mailer: PHP/' . phpversion();
	return $cabeceras;
}

function mail_altaUsuario($destinatario, $nick, $password, $base_url){
	return true; // Para pruebas

	// $destinatario      = 'arl00029@red.ujaen.es';
	$asunto = 'crm-star - Alta de usuario';

	$mensaje = '<html><head><title>crm-star</title></head><body>';
	$mensaje .= '<h1>crm-star</h1>';
	$mensaje .= '<p>Un administrador del sistema ha dado de alta un usuario del sistema asociado a este correo electrónico. Éstos son sus nuevos datos de acceso a la plataforma:</p>';
	$mensaje .= '<p>Enlace a la plataforma: <strong><a href="'.$base_url.'">'.$base_url.'</a></strong></p>';
	$mensaje .= '<p>Nombre de usuario: <strong>'.$nick.'</strong></p>';
	$mensaje .= '<p>Nueva contraseña: <strong>'.$password.'</strong></p>';
	$mensaje .= '<p>Recuerde que su contraseña anterior ya no es válida.</p>';
	$mensaje .= '</body></html>';

	$cabeceras=cabeceras();

	return mail($destinatario, $asunto, $mensaje, $cabeceras);
}

function mail_cambiarPassword($destinatario, $nick, $password, $base_url){
	return true; // Para pruebas
	
	// $destinatario      = 'arl00029@red.ujaen.es';
	$asunto = 'crm-star - Cambio de contraseña';

	$mensaje = '<html><head><title>crm-star</title></head><body>';
	$mensaje .= '<h1>crm-star</h1>';
	$mensaje .= '<p>Un administrador del sistema ha pedido generar una contraseña nueva para su cuenta. Éstos son sus nuevos datos de acceso a la plataforma:</p>';
	$mensaje .= '<p>Enlace a la plataforma: <strong><a href="'.$base_url.'">'.$base_url.'</a></strong></p>';
	$mensaje .= '<p>Nombre de usuario: <strong>'.$nick.'</strong></p>';
	$mensaje .= '<p>Nueva contraseña: <strong>'.$password.'</strong></p>';
	$mensaje .= '<p>Recuerde que su contraseña anterior ya no es válida.</p>';
	$mensaje .= '</body></html>';

	$cabeceras=cabeceras();


	return mail($destinatario, $asunto, $mensaje, $cabeceras);
}

function mail_alerta($destinatario, $id, $asuntoAlerta, $descripcion, $fechaHora, $base_url){
	// return true; // Para pruebas

	// $destinatario      = 'arl00029@red.ujaen.es';
	$asunto = 'crm-star - Alerta programada ('.date("d-m-Y H:i", strtotime($fechaHora)).')';

	$mensaje = '<html><head><title>crm-star</title></head><body>';
	$mensaje .= '<h1>crm-star</h1>';
	$mensaje .= '<p>Esta es una alerta programada para ser enviada por correo electrónico.</p>';
	$mensaje .= '<p>Enlace directo a la alerta: <strong><a href="'.$base_url.'alertas/ver/'.$id.'">'.$base_url.'alertas/ver/'.$id.'</a></strong></p>';
	$mensaje .= '<p>Fecha/hora: <strong>'.date("d-m-Y H:i", strtotime($fechaHora)).'</strong></p>';
	$mensaje .= '<p>Asunto: <strong>'.$asuntoAlerta.'</strong></p>';
	$mensaje .= '<p>Descripción: <strong>'.$descripcion.'</strong></p>';
	$mensaje .= '</body></html>';
	// echo $mensaje;

	$cabeceras=cabeceras();

	return mail($destinatario, $asunto, $mensaje, $cabeceras);

}
?>