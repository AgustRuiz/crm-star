
<!-- Estilos Datetime picker -->
<link href="<?=$this->config->base_url()?>css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- Funciones del Datetime picker -->
<script type="text/javascript" src="<?=$this->config->base_url()?>js/moment.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/locales/bootstrap-datetimepicker.es.js"></script>
<script type="text/javascript">
	$(function () {
		<?php
		if(isset($campanya)){
			if($campanya['fechaInicio']!=0){
				$fechaInicio = date("d-m-Y H:i", strtotime($campanya['fechaInicio']));
			}
			if($campanya['fechaFin']!=0){
				$fechaFin = date("d-m-Y H:i", strtotime($campanya['fechaFin']));
			}
		}
		?>
		$('#txtInicio').datetimepicker({
			language: 'es',
			pickTime: true,
			<?if(isset($fechaInicio)) echo 'defaultDate: "'.$fechaInicio.'",';?>
		});
		$('#txtFin').datetimepicker({
			language: 'es',
			pickTime: true,
			disabled: true,
			<?if(isset($fechaFin)) echo 'defaultDate: "'.$fechaFin.'",';?>
		});
		$('#txtFin').data("DateTimePicker").disable();
	});

	var tiempoGap = 1800000;
	var tiempoInicio = 0;
	var tiempoInicioDate;


	$("#txtInicio").on("dp.change",function (e) {
		var fechaInicio = new Date(e.date);
		tiempoInicioDate = fechaInicio.toLocaleDateString()+" "+fechaInicio.toTimeString();
		tiempoInicio = fechaInicio.getTime(); // Milisegundos
		document.getElementById('txtInicioTimestamp').value = tiempoInicio/1000; // Segundos

		var fechaFin = new Date(e.date+tiempoGap);
		$('#txtFin').data("DateTimePicker").setDate(fechaFin.toLocaleDateString()+" "+fechaFin.toTimeString());
	});
	$("#txtInicio").on("dp.show",function (e) {
		var fechaInicio = new Date(e.date);
		tiempoInicioDate = fechaInicio.toLocaleDateString()+" "+fechaInicio.toTimeString();
		tiempoInicio = fechaInicio.getTime(); // Milisegundos
		document.getElementById('txtInicioTimestamp').value = tiempoInicio/1000; // Segundos

		var fechaFin = new Date(e.date+tiempoGap);
		$('#txtFin').data("DateTimePicker").setDate(fechaFin.toLocaleDateString()+" "+fechaFin.toTimeString());
		$('#txtFin').data("DateTimePicker").enable();
	});

	$("#txtFin").on("dp.change",function (e) {
		var tiempoFin = new Date(e.date).getTime(); // Milisegundos
		document.getElementById('txtFinTimestamp').value = tiempoFin/1000; // Segundos

		tiempoGap = tiempoFin - tiempoInicio;
		if(tiempoGap<0){
			alert("La finalización no puede ser anterior al inicio");
			tiempoGap = 0;
			// var fechaFin = new Date(tiempoInicio);
			$('#txtFin').data("DateTimePicker").setDate(tiempoInicioDate);
			// $('#txtFin').data("DateTimePicker").setDate(e.date);
		}

	});
	$("#txtFin").on("dp.show",function (e) {
		var tiempoFin = new Date(e.date).getTime(); // Milisegundos
		document.getElementById('txtFinTimestamp').value = tiempoFin/1000; // Segundos

		// $('#txtInicio').data("DateTimePicker").setMaxDate(e.date);
	});


	function clearFechaInicio(){
		$('#txtInicio').data("DateTimePicker").setDate("");
		document.getElementById('txtInicioTimestamp').value = "";
		$('#txtFin').data("DateTimePicker").setMinDate("");
		clearFechaFin();
		$('#txtFin').data("DateTimePicker").disable();
	}

	function clearFechaFin(){
		$('#txtFin').data("DateTimePicker").setDate("");
		document.getElementById('txtFinTimestamp').value = "";
		$('#txtInicio').data("DateTimePicker").setMaxDate("");
	}

</script>

<!-- Funciones de contacto -->
<script>
	function clearContacto(){
		var campoIdContacto = parent.document.getElementById("txtIdContacto");
		var campoNombreContacto = parent.document.getElementById("txtNombreContacto");
		campoIdContacto.value = "";
		campoNombreContacto.value = "";
	}


	function cerrarModalContacto(){
		$("#modalContacto").modal("hide");
	}

	function abrirModalContacto(){
		$("#modalContacto").modal("show");
		var iframeModal = document.getElementById("iframeModalContacto");
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/contactos/include_busqueda_contacto";
		}
	}
</script>
<!-- Fin funciones de contacto -->

<!-- Funciones de campanya -->
<script>
	function clearCampanya(){
		var campoIdCampanya = parent.document.getElementById("txtIdCampanya");
		var campoNombreCampanya = parent.document.getElementById("txtNombreCampanya");
		campoIdCampanya.value = "";
		campoNombreCampanya.value = "";
	}


	function cerrarModalCampanya(){
		$("#modalCampanya").modal("hide");
	}

	function abrirModalCampanya(){
		$("#modalCampanya").modal("show");
		var iframeModal = document.getElementById("iframeModalCampanya");
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/campanyas/include_busqueda_campanya";
		}
	}
</script>
<!-- Fin funciones de contacto -->

<!-- Funciones de usuario asignado -->
<script>
	function clearUsuario(){
		var campoIdUsuario = parent.document.getElementById("txtIdUsuario");
		var campoNombreUsuario = parent.document.getElementById("txtNombreUsuario");
		campoIdUsuario.value = "";
		campoNombreUsuario.value = "";
	}


	function cerrarModalUsuarioResponsable(){
		$("#modalUsuarioResponsable").modal("hide");
	}

	function abrirModalUsuarioResponsable(){
		$("#modalUsuarioResponsable").modal("show");
		var iframeModal = document.getElementById("iframeModalUsuarioResponsable");
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/usuarios/include_busqueda_usuario";
		}
	}
</script>
<!-- Fin funciones de usuario asignado -->
