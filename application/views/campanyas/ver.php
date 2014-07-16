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
			<h2><?=$campanya['nombre']?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row col-md-12"><h4>Datos generales</h4></div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Campaña</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$campanya['nombre']?></strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Inicio</div>
						<div class="col-md-4 col-xs-9 dato"><?php
						if($campanya['fechaInicio']!=0){
							echo date("d-m-Y", strtotime($campanya['fechaInicio']));
						}else{
							echo "-";
						}
						?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Finalización</div>
						<div class="col-md-4 col-xs-9 dato"><?php
						if($campanya['fechaFin']!=0){
							echo date("d-m-Y", strtotime($campanya['fechaFin']));
						}else{
							echo "-";
						}
						?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Tipo campaña</div>
						<div class="col-md-4 col-xs-9 dato"><?=$campanya['tipo']?></div>
						<div class="col-md-2 col-xs-3 text-right titulo">Estado</div>
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$campanya['estilo_estado']?>"><?=$campanya['estado']?></span></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Descripción</div>
						<div class="col-md-10 col-xs-9 dato"><?=$campanya['descripcion']?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Objetivo</div>
						<div class="col-md-10 col-xs-9 dato"><?=$campanya['objetivo']?></div>
					</div>

					<div class="row col-md-12"><h4>Otros datos</h4></div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asignada a</div>
						<div class="col-md-10 col-xs-9 dato"><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$campanya['usuario']?>"><?=$campanya['usuario_nombre']." ".$campanya['usuario_apellidos']?></a></div>
					</div>
				</div>
			</fieldset>
			<!-- Modal reenviar contraseña -->
			<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							¿Desea generar una contraseña nueva y enviarla por correo al usuario a la dirección <em><?=$campanya['email']?></em>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<a href="<?=$this->config->base_url().'usuarios/password/'.$campanya['id']?>" class="btn btn-success">Regenerar contraseña</a>
						</div>
					</div>
				</div>
			</div>
  </div><!--/row-->