/*** Popover de Alertas ***/

function actualizarAlertas(){
	$.getJSON(window.base_url+"index.php/alertas/getNumAlertasJson", function(numAlertas) {
		if(numAlertas>0){ // Hay alertas
			// Poner visibles botones
			$("#popover-alertas-toggle").removeClass("hidden");
			$("#popover-alertas-default").removeClass("hidden");
			if(numAlertas!=$("#badge-alertas-toggle").text()){
				// Actualizar Badges
				$("#badge-alertas-toggle").text(numAlertas);
				$("#badge-alertas-default").text(numAlertas);
				// Recargar popover-alertas
				document.getElementById('iframe-alertas').contentWindow.location.reload();
			}
		}else{ // No hay alertas
			// Ocultar botones
			$("#popover-alertas-toggle").addClass("hidden");
			$("#popover-alertas-default").addClass("hidden");
			$("[rel=popover-alertas]").popover('hide');
		}
	});
}

$(document).ready(function() {
	actualizarAlertas();
	$("[rel=popover-alertas]").popover({
		placement : 'bottom', //Posición (top, bottom, left, right)
		trigger: 'click',
		html: 'true', //Necesario para mostrar HTML
		title : '<strong>Alertas</strong> <span class="glyphicon glyphicon-refresh pull-right" title="Actualizar" onclick="document.getElementById(\'iframe-alertas\').contentWindow.location.reload(); actualizarAlertas();"></span>', //Título
		content : '<div class="div-iframe-alertas"><iframe src="'+window.base_url+'index.php/alertas/popup_alertas" class="iframe-alertas" id="iframe-alertas"></iframe></div>' //Contenido
	});
});


function mostrarModalAlertaEmergente(id, fechaHora, asunto, descripcion){
	var enlace = window.base_url+"alertas/ver/"+id;
	if(document.URL.search("alertas/ver/"+id) == -1 && document.URL.search("alertas/editar/"+id) == -1 && document.URL.search("alertas/editar2/"+id) == -1){
		$("#alerta-emergente-id").val(id);
		$("#alerta-emergente-fechaHora").html(fechaHora);
		$("#alerta-emergente-asunto").html(asunto);
		$("#alerta-emergente-descripcion").html(descripcion);
		$("#alerta-emergente-enlace").attr('href' ,enlace);
		$("#alerta-emergente-visualizar").click(function(){$('#iframe-alerta-emergente').attr('src', window.base_url+'alertas/visualizar/'+id);});
		$("#modal-alerta-emergente").modal('show');
	}
}

function posponerAlerta(){
	id = $("#alerta-emergente-id").val();
	minutos = $("#alerta-emergente-posponer").val();
	if(id != undefined && minutos != undefined){
		if(minutos>0){
			$('#iframe-alerta-emergente').attr('src', window.base_url+'alertas/posponer/'+id+'/'+minutos);
			$("#modal-alerta-emergente").modal('hide');
		}
	}else{
		alert("Ha ocurrido un error y no se puede posponer la alerta");
	}
	$("#alerta-emergente-posponer").val(0);
}

function modalAlertaEmergenteLibre(){
	if($("#modal-alerta-emergente").hasClass('in'))
		return false;
	else
		return true;
}

function listenerAlertas(){
	$.getJSON(window.base_url+"index.php/alertas/getAlertaJson", function(datos) {
		if(datos!=null && modalAlertaEmergenteLibre()){
			mostrarModalAlertaEmergente(datos['id'], datos['fechaHora'], datos['asunto'], datos['descripcion']);
		}
	});
}
listenerAlertas();
setInterval(function(){listenerAlertas(); actualizarAlertas()}, 10000);