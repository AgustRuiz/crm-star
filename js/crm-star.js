// Funciones generales
function removeElement(elemento){
	elemento.parentNode.parentNode.removeChild(elemento.parentNode);
}

// Funciones para contactos
function addCorreoContactos(){
	var divCorreos = document.getElementById("divCorreos");
	var newdiv = document.createElement('div');
	newdiv.innerHTML = '<div class="col-md-7 padding0"><input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo electrónico" /></div><label class=" col-md-2"><input type="radio" name="radPrincipal" /> Principal</label><label class="col-md-2"><input type="checkbox" name="chkNoValido" /> No válido</label><div class="btn btn-default pull-right col-md-1" onclick="removeCorreo(this);"><span class="glyphicon glyphicon-minus-sign"></span></div>';
	divCorreos.appendChild(newdiv);
}