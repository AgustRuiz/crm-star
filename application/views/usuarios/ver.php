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
			<h2><?=$usuario['nombre'].' '.$usuario['apellidos'];?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<!-- Fila -->
					<div class="col-md-2 col-xs-3 text-right titulo">Nick</div>
					<div class="col-md-4 col-xs-9 dato"><strong><?=$usuario['nick']?></strong></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Contraseña</div>
					<div class="col-md-4 col-xs-9 dato"><a href="#" data-toggle="modal" data-target="#modalPassword">Reiniciar contraseña</a></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Datos generales</h4></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Nombre</div>
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['nombre']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Apellidos</div>
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['apellidos']?></div>
					<!-- Fila -->
					<div class="col-md-2 col-md-offset-6 col-xs-3 text-right titulo">NIF</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['nif']?></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Métodos de contacto</h4></div>

					<div class="col-md-2 col-xs-3 text-right titulo">Correo electrónico</div>
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['email']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Oficina</div>
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['telfOficina']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Móvil</div>
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['telfMovil']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">FAX</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$usuario['fax']?></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Otros</h4></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Otros datos</div> <!-- Tiene offset -->
					<div class="col-md-10 col-xs-9 dato"><?=$usuario['otrosDatos']?></div>
				</div>
			</fieldset>
			<!-- Modal reenviar contraseña -->
			<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							¿Desea generar una contraseña nueva y enviarla por correo al usuario a la dirección <em><?=$usuario['email']?></em>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<a href="<?=$this->config->base_url().'usuarios/password/'.$usuario['id']?>" class="btn btn-success">Regenerar contraseña</a>
						</div>
					</div>
				</div>
			</div>
  </div><!--/row-->