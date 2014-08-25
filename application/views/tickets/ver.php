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
						<div class="col-md-2 col-xs-3 text-right titulo">Asunto</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$ticket->asunto?></strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Descripción</div>
						<div class="col-md-10 col-xs-9 dato"><?=$ticket->descripcion?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Contacto</div>
						<div class="col-md-10 col-xs-9 dato"><a href="<?=$this->config->base_url()?>contactos/ver/<?=$ticket->contacto->id?>"><?=$ticket->contacto->apellidos.', '.$ticket->contacto->nombre?></a></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Estado</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$ticket->tickets_estado->estilo?>"><?=$ticket->tickets_estado->estado?></span></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Prioridad</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$ticket->prioridad->estilo_icono?>" title="<?=$ticket->prioridad->etiqueta_icono?>"></span> <span class="<?=$ticket->prioridad->estilo?>"><?=$ticket->prioridad->prioridad?></span></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asignada a</div>
						<div class="col-md-10 col-xs-9 dato">
							<? if($ticket->usuario->count()>0){ ?>
							<a href="<?=$this->config->base_url()?>usuarios/ver/<?=$ticket->usuario->id?>"><?=trim($ticket->usuario->nombre.' '.$ticket->usuario->apellidos)?></a>
							<? } ?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Resolución</div>
						<div class="col-md-10 col-xs-9 dato"><?=$ticket->resolucion?></div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend class="row">Actividades</legend>
				<div class="container-fluid ficha">
				</div>
			</fieldset>
  </div><!--/row-->