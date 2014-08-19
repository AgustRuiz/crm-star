<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($success)){ ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Éxito:</strong> <?=$success?>
			</div>
			<?php } ?>
			<h2><?=trim($contacto->nombre.' '.$contacto->apellidos);?></h2>
			<fieldset>
				<legend class="row">Datos generales</legend>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Nombre</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->nombre?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Apellidos</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->apellidos?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">NIF</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->nif?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Estado</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$contacto->contactos_estado->estilo?>"><?=$contacto->contactos_estado->estado?></span></div>
					</div>

					<div class="row col-md-12"><h5>Dirección</h5></div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Dirección</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->direccion?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Cód. Postal</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->cp?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Ciudad</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->ciudad?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Provincia</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->provincia?></div>
					</div>

					<div class="row col-md-12"><h5>Métodos de contacto</h5></div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Correo</div>
						<div class="col-md-4 col-xs-9 dato">
							<?php
							if($contacto->contactos_email != null && $contacto->contactos_email->count()>0){
								foreach ($contacto->contactos_email as $email) {
									if($email->principal==1){
										echo '<div><a href="mailto:'.$email->correo.'"><strong>'.$email->correo.'</strong></a> <em>(principal)</em></div>';
									}else if($email->noValido==1){
										echo '<div><a href="mailto:'.$email->correo.'"><s>'.$email->correo.'</s></a> <em>(no válido)</em></div>';
									}else{
										echo '<div><a href="mailto:'.$email->correo.'">'.$email->correo.'</a></div>';
									}
								}
							}else{
								echo '<div><em>No hay correos</em></div>';
							}
							?>
						</div>
						<div class="col-md-2 col-xs-3 text-right titulo">Telf. Oficina</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->telfOficina?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Telf. Móvil</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->telfMovil?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">FAX</div>
						<div class="col-md-4 col-xs-9 dato"><?=$contacto->fax?></div>
					</div>

					<div class="row col-md-12"><h5>Otros</h5></div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Otros datos</div>
						<div class="col-md-10 col-xs-9 dato"><?=$contacto->otrosDatos?></div>
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
								<th>Campaña</th>
								<th>Inicio</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Usuario</th>
							</tr>
						</thead>
						<tbody id="contenedor">
							<?php foreach($contacto->actividad->order_by('inicio', 'desc')->get() as $fila){ ?>
							<tr <? if(time()-strtotime($fila->inicio)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
								<td><?=$fila->id?></td>
								<td><span class="<?=$fila->prioridad->estilo_icono?>" title="<?=$fila->prioridad->etiqueta_icono?>"></span></td>
								<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
								<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->campanya->id?>"><?=$fila->campanya->nombre?></a></td>
								<td><?=date("d-m-Y H:i", strtotime($fila->inicio));?></td>
								<td><span class="<?=$fila->actividades_tipo->estilo?>"><?=$fila->actividades_tipo->tipo?></span></td>
								<td><span class="<?=$fila->actividades_estado->estilo?>"><?=$fila->actividades_estado->estado?></span></td>
								<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=trim($fila->usuario->nombre.' '.$fila->usuario->apellidos)?></a></td>
							</tr>
							<? } ?>
						</tbody>
						<tfoot>	
							<tr>
								<? if($contacto->actividad->count() == 0){?>
								<td colspan="9"><em><div class="text-center">No hay actividades</div></em></td>
								<? } else if($contacto->actividad->count() == 1){?>
								<th colspan="9">1 actividad</th>
								<? } else {?>
								<th colspan="9"><?=$contacto->actividad->count()?> actividades</th>
								<? } ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</fieldset>
  </div><!--/row-->