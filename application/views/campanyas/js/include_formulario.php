
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
				$fechaInicio = date("d-m-Y", strtotime($campanya['fechaInicio']));
			}
			if($campanya['fechaFin']!=0){
				$fechaFin = date("d-m-Y", strtotime($campanya['fechaFin']));
			}
		}
		?>
		$('#txtFechaInicio').datetimepicker({
			language: 'es',
			pickTime: false,
			<?if(isset($fechaInicio)) echo 'defaultDate: "'.$fechaInicio.'",';?>
		});
		$('#txtFechaFin').datetimepicker({
			language: 'es',
			pickTime: false,
			<?if(isset($fechaFin)) echo 'defaultDate: "'.$fechaFin.'",';?>
		});
	});

	$("#txtFechaInicio").on("dp.change",function (e) {
		document.getElementById('txtFechaInicioTimestamp').value = new Date(e.date).getTime()/1000;
		// alert(new Date(e.date).getTime());
		$('#txtFechaFin').data("DateTimePicker").setMinDate(e.date);
	});
	$("#txtFechaInicio").on("dp.show",function (e) {
		document.getElementById('txtFechaInicioTimestamp').value = new Date(e.date).getTime()/1000;
		// alert(new Date(e.date).getTime());
		$('#txtFechaFin').data("DateTimePicker").setMinDate(e.date);
	});

	$("#txtFechaFin").on("dp.change",function (e) {
		document.getElementById('txtFechaFinTimestamp').value = new Date(e.date).getTime()/1000;
		$('#txtFechaInicio').data("DateTimePicker").setMaxDate(e.date);
	});
	$("#txtFechaFin").on("dp.show",function (e) {
		document.getElementById('txtFechaFinTimestamp').value = new Date(e.date).getTime()/1000;
		$('#txtFechaInicio').data("DateTimePicker").setMaxDate(e.date);
	});


	function clearFechaInicio(){
		$('#txtFechaInicio').data("DateTimePicker").setDate("");
		document.getElementById('txtFechaInicioTimestamp').value = "";
		$('#txtFechaFin').data("DateTimePicker").setMinDate("");
	}

	function clearFechaFin(){
		$('#txtFechaFin').data("DateTimePicker").setDate("");
		document.getElementById('txtFechaFinTimestamp').value = "";
		$('#txtFechaInicio').data("DateTimePicker").setMaxDate("");
	}

</script>

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
		// alert(iframeModal.src);
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/usuarios/include_busqueda_usuario";
		}
		// alert(iframeModal.src);
	}
</script>
