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
			<h2><?=$actividad->asunto?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asunto</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$actividad->asunto?></strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Inicio</div>
						<div class="col-md-4 col-xs-9 dato"><?php
							if($actividad->inicio!=0){
								echo date("d-m-Y H:i", strtotime($actividad->inicio));
							}else{
								echo "-";
							}
							?>
						</div>
						<div class="col-md-2 col-xs-3 text-right titulo">Finalización</div>
						<div class="col-md-4 col-xs-9 dato"><?php
							if($actividad->fin!=0){
								echo date("d-m-Y H:i", strtotime($actividad->fin));
							}else{
								echo "-";
							}
							?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Tipo</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$actividad->actividades_tipo->estilo?>"><?=$actividad->actividades_tipo->tipo?></span></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Prioridad</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$actividad->actividades_prioridad->estilo_icono?>" title="<?=$actividad->actividades_prioridad->etiqueta_icono?>"></span> <span class="<?=$actividad->actividades_prioridad->estilo?>"><?=$actividad->actividades_prioridad->prioridad?></span></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Estado</div>
						<div class="col-md-10 col-xs-9 dato"><span class="<?=$actividad->actividades_estado->estilo?>"><?=$actividad->actividades_estado->estado?></span></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Contacto</div>
						<div class="col-md-10 col-xs-9 dato"><a href="<?=$this->config->base_url()?>contactos/ver/<?=$actividad->contacto->id?>"><?=trim($actividad->contacto->nombre.' '.$actividad->contacto->apellidos)?></a></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Campaña</div>
						<div class="col-md-10 col-xs-9 dato">
						<?php if($actividad->campanya->count()==1){?>
							<a href="<?=$this->config->base_url()?>campanyas/ver/<?=$actividad->campanya->id?>"><?=$actividad->campanya->nombre?></a>
							<?php } else { ?>
							<em>Sin campaña asociada</em>
							<?php }?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Usuario</div>
						<div class="col-md-10 col-xs-9 dato"><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$actividad->usuario->id?>"><?=trim($actividad->usuario->nombre.' '.$actividad->usuario->apellidos)?></a></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Descripción</div>
						<div class="col-md-10 col-xs-9 dato"><?=$actividad->descripcion?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Resultado</div>
						<div class="col-md-10 col-xs-9 dato"><?=$actividad->resultado?></div>
					</div>



				</div>
			</fieldset>
  </div><!--/row-->