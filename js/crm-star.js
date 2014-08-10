/*** Funciones generales ***/
function removeElement(elemento){
	elemento.parentNode.parentNode.removeChild(elemento.parentNode);
}

function setHeightIframeElement(){
	var altura = Math.max(
		document.body.offsetHeight,
		document.documentElement.offsetHeight
		);
	// var altura = $("#contenido").height();
	window.frameElement.style.height = altura+"px";
}


/*** Funciones para Contactos ***/
var contacto = -1;
function addCorreoContactos(){
	var divCorreos = document.getElementById("divCorreos");
	var newdiv = document.createElement('div');
	newdiv.innerHTML = '<div class="col-md-7 padding0"><input type="text" class="form-control" id="txtEmail" name="txtEmail['+contacto+']" placeholder="Correo electrónico" /></div><label class=" col-md-2"><input type="radio" name="radPrincipal" value="'+contacto+'" /> Principal</label><label class="col-md-2"><input type="checkbox" name="chkNoValido['+contacto+']" /> No válido</label><div class="btn btn-default pull-right col-md-1" onclick="removeElement(this);"><span class="glyphicon glyphicon-minus-sign"></span></div>';
	divCorreos.appendChild(newdiv);
	contacto--;
}

/*** Funciones para Usuarios ***/
function addCorreoUsuarios(){
	// Vale la misma función que para los contactos
	addCorreoContactos();
}


function asignarUsuario(id, nombre){
	var campoIdUsuario = parent.document.getElementById("txtIdUsuario");
	var campoNombreUsuario = parent.document.getElementById("txtNombreUsuario");
	campoIdUsuario.value = id;
	campoNombreUsuario.value = nombre;
	parent.cerrarModalUsuarioResponsable();
}

/*** Funciones para Contactos ***/

function asignarContacto(id, nombre){
	var campoIdContacto = parent.document.getElementById("txtIdContacto");
	var campoNombreContacto = parent.document.getElementById("txtNombreContacto");
	campoIdContacto.value = id;
	campoNombreContacto.value = nombre;
	parent.cerrarModalContacto();
}

/*** Funciones para Campañas ***/

function asignarCampanya(id, nombre){
	var campoIdCampanya = parent.document.getElementById("txtIdCampanya");
	var campoNombreCampanya = parent.document.getElementById("txtNombreCampanya");
	campoIdCampanya.value = id;
	campoNombreCampanya.value = nombre;
	parent.cerrarModalCampanya();
}


/*** Funciones para Actividades ***/

function asignarActividad(id, asunto){
	var campoIdActividad = parent.document.getElementById("txtIdActividad");
	var campoAsuntoActividad = parent.document.getElementById("txtAsuntoActividad");
	campoIdActividad.value = id;
	campoAsuntoActividad.value = asunto;
	campoAsuntoActividad.title = asunto;
	parent.cerrarModalActividad();
}

/*** Popover de Alertas ***/

$(document).ready(function() {
	$("[rel=popover-alertas]").popover({
		placement : 'bottom', //Posición (top, bottom, left, right)
		trigger: 'click',
		html: 'true', //Necesario para mostrar HTML
		title : '<strong>Alertas</strong> <span class="glyphicon glyphicon-refresh pull-right" title="Actualizar" onclick="document.getElementById(\'iframe-alertas\').contentWindow.location.reload();"></span>', //Título
		content : '<div class="div-iframe-alertas"><iframe src="alertas/popup_alertas" class="iframe-alertas" id="iframe-alertas"></iframe></div>' //Contenido
	});
});