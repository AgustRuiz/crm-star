
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
			<?if(isset($fechaFin)) echo 'defaultDate: "'.$fechaFin.'",';?>
		});
	});

	$("#txtInicio").on("dp.change",function (e) {
		document.getElementById('txtInicioTimestamp').value = new Date(e.date).getTime()/1000; // Segundos
		// alert(new Date(e.date).getTime());
		$('#txtFin').data("DateTimePicker").setMinDate(e.date-86400000);
	});
	$("#txtInicio").on("dp.show",function (e) {
		document.getElementById('txtInicioTimestamp').value = new Date(e.date).getTime()/1000; // Segundos
		// alert(new Date(e.date).getTime());
		$('#txtFin').data("DateTimePicker").setMinDate(e.date-86400000);
	});

	$("#txtFin").on("dp.change",function (e) {
		document.getElementById('txtFinTimestamp').value = new Date(e.date).getTime()/1000; // Segundos
		$('#txtInicio').data("DateTimePicker").setMaxDate(e.date);
	});
	$("#txtFin").on("dp.show",function (e) {
		document.getElementById('txtFinTimestamp').value = new Date(e.date).getTime()/1000; // Segundos
		$('#txtInicio').data("DateTimePicker").setMaxDate(e.date);
	});


	function clearFechaInicio(){
		$('#txtInicio').data("DateTimePicker").setDate("");
		document.getElementById('txtInicioTimestamp').value = "";
		$('#txtFin').data("DateTimePicker").setMinDate("");
	}

	function clearFechaFin(){
		$('#txtFin').data("DateTimePicker").setDate("");
		document.getElementById('txtFinTimestamp').value = "";
		$('#txtInicio').data("DateTimePicker").setMaxDate("");
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
