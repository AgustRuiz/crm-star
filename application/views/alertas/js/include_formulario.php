
<!-- Estilos Datetime picker -->
<link href="<?=$this->config->base_url()?>css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- Funciones del Datetime picker -->
<script type="text/javascript" src="<?=$this->config->base_url()?>js/moment.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/locales/bootstrap-datetimepicker.es.js"></script>


<!-- Funciones de Fecha/Hora -->
<script type="text/javascript">
	var fechaHora;

	$(function () {
		$('#txtFechaHora').datetimepicker({
			language: 'es',
			pickTime: true,
			<?php if(isset($alerta) && $alerta->fechaHora!=0){ ?>
				defaultDate: "<?=date("d/m/Y H:i", strtotime($alerta->fechaHora))?>"
			<? } ?>
		});

		$("#txtFechaHora").on("dp.change",function (e) {
			fechaHora = new Date(e.date);
			document.getElementById('txtFechaHoraTimestamp').value = fechaHora.getTime()/1000; // Segundos
		});

		$("#txtFechaHora").on("dp.show",function (e) {
			fechaHora = new Date(e.date);
			document.getElementById('txtFechaHoraTimestamp').value = fechaHora.getTime()/1000; // Segundos
		});
	});

	<?php if(isset($alerta) && $alerta->fechaHora!=0){ ?>
		document.getElementById('txtFechaHoraTimestamp').value = "<?=strtotime($alerta->fechaHora);?>";
	<? } ?>

</script>
<!-- Fin de funciones de Fecha/Hora -->


<!-- Funciones de Actividad -->
<script>
	function clearActividad(){
		var campoIdActividad = parent.document.getElementById("txtIdActividad");
		var campoAsuntoActividad = parent.document.getElementById("txtAsuntoActividad");
		campoIdActividad.value = "";
		campoAsuntoActividad.value = "";
	}

	function cerrarModalActividad(){
		$("#modalActividad").modal("hide");
	}

	function abrirModalActividad(){
		$("#modalActividad").modal("show");
		var iframeModal = document.getElementById("iframeModalActividad");
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/actividades/include_busqueda_actividad";
		}
	}
</script>
<!-- Fin funciones de contacto -->
