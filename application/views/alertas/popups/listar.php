<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>popup_alertas</title>

	<!-- Bootstrap core CSS -->
	<link href="<?=$this->config->base_url()?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?=$this->config->base_url()?>css/crm-star.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?=$this->config->base_url()?>favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=$this->config->base_url()?>favicon.ico" type="image/x-icon">
</head>
<body style="overflow:hidden;" onload="setHeightIframeElement();">
	<div id="contenido">




		<div class="container-fluid">
			<div class="row popup-alertas">
				<? $fecha = ''; ?>
				<?php if(isset($listaAlertas) && $listaAlertas->result_count()>0){ foreach ($listaAlertas as $fila) { ?>
				<!-- <td><?=date("d-m-Y", strtotime($fila->fechaHora));?></td> -->

				<? if($fecha != date("d-m-Y", strtotime($fila->fechaHora))) {
					if($fecha!=''){
						echo '</ul></div>';
					}
					$fecha = date("d-m-Y", strtotime($fila->fechaHora));

					if($fecha==date("d-m-Y", time())){
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">'.$fecha.' (hoy)</div>';
					}else{
						echo '<div class="panel panel-default">';
						echo '<div class="panel-heading">'.$fecha.'</div>';
					}
					// echo '<div class="panel-body">';
					echo '<ul class="list-group">';
				} ?>
				<a href="#" class="list-group-item">
					<span class="label label-primary"><?=date("H:i", strtotime($fila->fechaHora));?></span>
					<?=$fila->asunto?>
				</a>
				<? } } else { ?>
				<div class="row">
					<em>No hay alertas pendientes</em>
				</div>
				<? } ?>






			</div>
		</div>

	    <!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="<?php echo $this->config->base_url(); ?>js/jquery.min.js"></script>
	    <script src="<?php echo $this->config->base_url(); ?>js/bootstrap.min.js"></script>
	    <!-- Funciones para el menú lateral -->
	    <script src="<?php echo $this->config->base_url(); ?>js/offcanvas.js"></script>
	    <!-- Funciones de la aplicación -->
	    <script src="<?php echo $this->config->base_url(); ?>js/crm-star.js"></script>
	</div>
</body>
</html>