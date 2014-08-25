<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($success)){ ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Éxito:</strong> <?=$success?>
			</div>
			<?php } ?>
			<?php if(isset($error)){ ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Oops!</strong> <?=$error?>
			</div>
			<?php } ?>
			<h2><?=$ticket->nombre?></h2>
			<fieldset>
				<legend class="row">Datos generales</legend>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Campaña</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$ticket->nombre?></strong></div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend class="row">Asignación</legend>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asignada a</div>
						<div class="col-md-10 col-xs-9 dato">
							<? if($ticket->usuario->count()>0){ ?>
							<a href="<?=$this->config->base_url()?>usuarios/ver/<?=$ticket->usuario->id?>"><?=trim($ticket->usuario->nombre.' '.$ticket->usuario->apellidos)?></a>
							<em>(Total campañas asignadas: <?=$ticket->usuario->ticket->count();?>)</em>
							<? } else { ?>
							<em>Campaña sin asignar</em>
							<? } ?>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend class="row">Actividades</legend>
				<div class="row clearfix">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th colspan="2">Prioridad/Asunto</th>
								<th>Inicio</th>
								<th>Tipo</th>
								<th>Prioridad/Estado</th>
								<th>Contacto</th>
								<th>Usuario</th>
							</tr>
						</thead>
						<tbody id="contenedor">
							<?php foreach($ticket->actividad->order_by('inicio', 'desc')->get() as $fila){ ?>
							<tr <? if(time()-strtotime($fila->inicio)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
								<td><?=$fila->id?></td>
								<td><span class="<?=$fila->prioridad->estilo_icono?>" title="<?=$fila->prioridad->etiqueta_icono?>"></span></td>
								<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
								<td><?=date("d-m-Y H:i", strtotime($fila->inicio));?></td>
								<td><span class="<?=$fila->actividades_tipo->estilo?>"><?=$fila->actividades_tipo->tipo?></span></td>
								<td><span class="<?=$fila->actividades_estado->estilo?>"><?=$fila->actividades_estado->estado?></span></td>
								<td><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila->contacto->id?>"><?=trim($fila->contacto->nombre.' '.$fila->contacto->apellidos)?></a></td>
								<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=trim($fila->usuario->nombre.' '.$fila->usuario->apellidos)?></a></td>
							</tr>
							<? } ?>
						</tbody>
						<tfoot>	
							<tr>
								<? if($ticket->actividad->count() == 0){?>
								<td colspan="9"><em><div class="text-center">No hay actividades</div></em></td>
								<? } else if($ticket->actividad->count() == 1){?>
								<th colspan="9">1 actividad</th>
								<? } else {?>
								<th colspan="9"><?=$ticket->actividad->count()?> actividades</th>
								<? } ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</fieldset>
  </div><!--/row-->