// Funciones generales
function removeElement(elemento){
	elemento.parentNode.parentNode.removeChild(elemento.parentNode);
}


// Funciones para contactos
var contacto = -1;
function addCorreoContactos(){
	var divCorreos = document.getElementById("divCorreos");
	var newdiv = document.createElement('div');
	newdiv.innerHTML = '<div class="col-md-7 padding0"><input type="text" class="form-control" id="txtEmail" name="txtEmail['+contacto+']" placeholder="Correo electrónico" /></div><label class=" col-md-2"><input type="radio" name="radPrincipal" value="'+contacto+'" /> Principal</label><label class="col-md-2"><input type="checkbox" name="chkNoValido['+contacto+']" /> No válido</label><div class="btn btn-default pull-right col-md-1" onclick="removeElement(this);"><span class="glyphicon glyphicon-minus-sign"></span></div>';
	divCorreos.appendChild(newdiv);
	contacto--;
}

// Funciones para usuarios
function addCorreoUsuarios(){
	// Vale la misma función que para los contactos
	addCorreoContactos();
}