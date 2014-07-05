<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generarPassword($longitud=6){
	return "123456";
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$psswd = "";
	for($i=0;$i<$longitud;$i++) {
		$psswd .= substr($str,rand(0,62),1);
	}
	return $psswd;
}

function hashPassword($psswd){
	// return $psswd;
	return md5($psswd);
	// return crypt($psswd);
}

?>