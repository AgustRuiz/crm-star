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
			<h2><?=$alerta->asunto?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asunto</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$alerta->asunto?></strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Fecha/Hora</div>
						<div class="col-md-10 col-xs-9 dato"><?php
							if($alerta->fechaHora!=0){
								echo date("d-m-Y H:i", strtotime($alerta->fechaHora));
							}else{
								echo "-";
							}
							?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Descripción</div>
						<div class="col-md-10 col-xs-9 dato"><?=$alerta->descripcion?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Enviar email</div>
						<div class="col-md-4 col-xs-9 dato">
							<? if($alerta->email == true) { ?>
							<a href="mailto:<?=$alerta->usuario->email?>"><?=$alerta->usuario->email?></a>
							<? } else { ?>
							<em>Desactivado</em>
							<? } ?>
						</div>
						<div class="col-md-2 col-xs-3 text-right titulo">Ventana emergente</div>
						<div class="col-md-4 col-xs-9 dato">
							<? if($alerta->emergente == true) { ?>
							<span class="glyphicon glyphicon-ok"></span> <strong>Sí</strong>
							<? } else { ?>
							<span class="glyphicon glyphicon-remove"></span> <strong>No</strong> (alerta silenciosa)
							<? } ?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Actividad</div>
						<div class="col-md-10 col-xs-9 dato">
							<? if($alerta->actividad->count() == 1) { ?>
							<span class="<?=$alerta->actividad->actividades_prioridad->estilo_icono?>" title="<?=$alerta->actividad->actividades_prioridad->etiqueta_icono?>"></span>
							<a href="<?=$this->config->base_url()?>actividades/ver/<?=$alerta->actividad->id?>"><?=$alerta->actividad->asunto?></a> (<?=$alerta->actividad->actividades_tipo->tipo?> con <a href="<?=$this->config->base_url()?>contactos/ver/<?=$alerta->actividad->contacto->id?>"><?=trim($alerta->actividad->contacto->nombre.' '.$alerta->actividad->contacto->apellidos)?></a>)
							<? } else { ?>
							<em>No asociado a ninguna actividad</em>
							<? } ?>
						</div>
					</div>
				</div>
			</fieldset>
  </div><!--/row-->