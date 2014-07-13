
<!-- Estilos Datetime picker -->
<link href="<?=$this->config->base_url()?>css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- Funciones del Datetime picker -->
<script type="text/javascript" src="<?=$this->config->base_url()?>js/moment.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?=$this->config->base_url()?>js/locales/bootstrap-datetimepicker.es.js"></script>
<script type="text/javascript">
	$(function () {
		$('#txtFechaInicio').datetimepicker({
			language: 'es',
			pickTime: false
		});
		$('#txtFechaFin').datetimepicker({
			language: 'es',
			pickTime: false
		});
		// $('#txtFechaInicio').data("DateTimePicker").setMinDate(new Date());
	});
</script>