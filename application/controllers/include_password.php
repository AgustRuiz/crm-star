<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generarPassword($longitud=6){
	// return "123456";
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$psswd = "";
	for($i=0;$i<$longitud;$i++) {
		$psswd .= substr($str,rand(0,62),1);
	}
	return $psswd;
}

function hashPassword($psswd){
	if(!empty($psswd)){
		return hash("sha1", $psswd);
		// return sha1($psswd);
		// return md5($psswd);
		// return crypt($psswd);
		// return $psswd;
	}
}

?>