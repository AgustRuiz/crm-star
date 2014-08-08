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
			<h2><?=trim($usuario->nombre.' '.$usuario->apellidos);?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Nick</div>
						<div class="col-md-4 col-xs-9 dato"><strong><?=$usuario->nick?></strong></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Contraseña</div>
						<div class="col-md-4 col-xs-9 dato"><a href="#" data-toggle="modal" data-target="#modalPassword">Reiniciar contraseña</a></div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Datos generales</legend>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Nombre</div>
						<div class="col-md-4 col-xs-9 dato"><?=$usuario->nombre?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Apellidos</div>
						<div class="col-md-4 col-xs-9 dato"><?=$usuario->apellidos?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">NIF</div>
						<div class="col-md-10 col-xs-9 dato"><?=$usuario->nif?></div>
					</div>

					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Correo</div>
						<div class="col-md-4 col-xs-9 dato"><a href="mailto:<?=$usuario->email?>"><?=$usuario->email?></a></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Telf. Oficina</div>
						<div class="col-md-4 col-xs-9 dato"><?=$usuario->telfOficina?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Telf. Móvil</div>
						<div class="col-md-4 col-xs-9 dato"><?=$usuario->telfMovil?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">FAX</div>
						<div class="col-md-4 col-xs-9 dato"><?=$usuario->fax?></div>
					</div>

					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Otros datos</div>
						<div class="col-md-10 col-xs-9 dato"><?=$usuario->otrosDatos?></div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Campañas asignadas</legend>
				<div class="container-fluid ficha">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre de la Campaña</th>
								<th>Tipo</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody id="contenedor">
							<?php foreach($usuario->campanya as $fila){ ?>
							<tr>
								<td><?=$fila->id?></td>
								<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->id?>"><strong><?=$fila->nombre?></strong></a></td>
								<td><span class="<?=$fila->campanyas_tipo->estilo?>"><?=$fila->campanyas_tipo->tipo?></span></td>
								<td><span class="<?=$fila->campanyas_estado->estilo?>"><?=$fila->campanyas_estado->estado?></span></td>
							</tr>
							<? } ?>
						</tbody>
						<tfoot>
							<tr>
								<? if($usuario->campanya->count() == 0){?>
								<td colspan="9"><em><div class="text-center">No hay campañas asignadas</div></em></td>
								<? } else if($usuario->campanya->count() == 1){?>
								<th colspan="9">1 campañas</th>
								<? } else {?>
								<th colspan="9"><?=$usuario->campanya->count()?> campañas</th>
								<? } ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</fieldset>
			<fieldset>
				<legend>Actividades</legend>
				<div class="container-fluid ficha">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Asunto</th>
								<th>Campaña</th>
								<th>Inicio</th>
								<th>Tipo</th>
								<th colspan="2">Prioridad/Estado</th>
								<th>Contacto</th>
							</tr>
						</thead>
						<tbody id="contenedor">
							<?php foreach($usuario->actividad as $fila){ ?>
							<tr <? if(time()-strtotime($fila->inicio)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
								<td><?=$fila->id?></td>
								<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
								<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->campanya->id?>"><?=$fila->campanya->nombre?></a></td>
								<td><?=date("d-m-Y H:i", strtotime($fila->inicio));?></td>
								<td><span class="<?=$fila->actividades_tipo->estilo?>"><?=$fila->actividades_tipo->tipo?></span></td>
								<td><span class="<?=$fila->actividades_prioridad->estilo_icono?>" title="<?=$fila->actividades_prioridad->etiqueta_icono?>"></span></td>
								<td><span class="<?=$fila->actividades_estado->estilo?>"><?=$fila->actividades_estado->estado?></span></td>
								<td><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila->contacto->id?>"><?=trim($fila->contacto->nombre.' '.$fila->contacto->apellidos)?></a></td>
							</tr>
							<? } ?>
						</tbody>
						<tfoot>	
							<tr>
								<? if($usuario->actividad->count() == 0){?>
								<td colspan="9"><em><div class="text-center">No hay actividades</div></em></td>
								<? } else if($usuario->actividad->count() == 1){?>
								<th colspan="9">1 actividad</th>
								<? } else {?>
								<th colspan="9"><?=$usuario->actividad->count()?> actividades</th>
								<? } ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</fieldset>
			<!-- Modal reenviar contraseña -->
			<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							¿Desea generar una contraseña nueva y enviarla por correo al usuario a la dirección <em><?=$usuario->email?></em>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<a href="<?=$this->config->base_url().'usuarios/password/'.$usuario->id?>" class="btn btn-success">Regenerar contraseña</a>
						</div>
					</div>
				</div>
			</div>
  </div><!--/row-->