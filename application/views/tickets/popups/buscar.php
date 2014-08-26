<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>include_busqueda_tickets</title>

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
		<form class="form-vertical" role="form" method="post" accept-charset="utf-8" action="<?=$this->config->base_url()."index.php/tickets/include_busqueda_ticket";?>">
			<div class="input-group">
				<input type="text" class="form-control" name="txtCadenaBuscar" placeholder="Cadena a buscar" value="<?php if(isset($cadenaBuscar)) echo $cadenaBuscar; ?>" />
				<span class="input-group-btn">
					<input type="submit" class="btn btn-default" type="button" value="Filtrar" />
				</span>
			</div><!-- /input-group -->
		</form>

		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th colspan="2">Prioridad/Asunto</th>
					<th>Estado</th>
					<th>Contacto</th>
					<th>Usuario</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="contenedor">
				<?php if(isset($listaTickets)){ foreach ($listaTickets as $fila) { ?>
				<tr>
					<td><?=$fila->id?></td>
					<td><span class="<?=$fila->prioridad->estilo_icono?>" title="<?=$fila->prioridad->etiqueta_icono?>"></span></td>
					<td><strong><?=$fila->asunto?></strong></td>
					<td><span class="<?=$fila->tickets_estado->estilo?>"><?=$fila->tickets_estado->estado?></span></td>
					<td><?=$fila->contacto->apellidos.', '.$fila->contacto->nombre?></td>
					<td><?=$fila->usuario->apellidos.', '.$fila->usuario->nombre?></td>
					<td><a href="#" class="btn btn-default pull-right" onclick="asignarTicket('<?=$fila->id?>', '<?=$fila->asunto?> (<?=trim($fila->contacto->nombre.' '.$fila->contacto->apellidos)?>)');"><span class="glyphicon glyphicon-plus"></span></a></td>
				</tr>
				<?php } } else { ?>
				<tr>
					<td colspan="8" class="text-center"><em>No hay resultados</em></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>	
				<tr><th colspan="8">
					<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
					<ul class="pagination pull-right" id="pagination">
						<?=$pag_links;?>
					</ul>
				</th></tr>
			</tfoot>
		</table>

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