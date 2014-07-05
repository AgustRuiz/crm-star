<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Funciones con plantillas para el envío de correos

function mail_altaUsuario($destinatario, $nick, $password, $base_url){
	return true;





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

	$cabeceras = "MIME-Version: 1.0\r\n"; 
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n"; 
	$cabeceras .= 'From: agustinruizlinares@gmail.com' . "\r\n";
	$cabeceras .= 'Reply-To: agustinruizlinares@gmail.com' . "\r\n";
	$cabeceras .= 'X-Mailer: PHP/' . phpversion();

	return mail($destinatario, $asunto, $mensaje, $cabeceras);
}

function mail_cambiarPassword($destinatario, $nick, $password, $base_url){
	return true;




	
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

	$cabeceras = "MIME-Version: 1.0\r\n"; 
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n"; 
	$cabeceras .= 'From: agustinruizlinares@gmail.com' . "\r\n";
	$cabeceras .= 'Reply-To: agustinruizlinares@gmail.com' . "\r\n";
	$cabeceras .= 'X-Mailer: PHP/' . phpversion();


	return mail($destinatario, $asunto, $mensaje, $cabeceras);
}
?>