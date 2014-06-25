<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($success)){ ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Éxito:</strong> <?=$success?>
			</div>
			<?php } ?>
			<h2><?=$contacto['nombre'].' '.$contacto['apellidos'];?></h2>
			<fieldset>
				<legend>Datos generales</legend>
				<div class="container-fluid ficha">
					<!-- Fila 1 -->
					<div class="col-md-2 col-xs-3 text-right titulo">Nombre</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['nombre']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Apellidos</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['apellidos']?></div>
					<!-- Fila 2 -->
					<div class="col-md-2 col-md-offset-6 col-xs-3 text-right titulo">NIF</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['nif']?></div>
				</div>
			</fieldset>
  </div><!--/row-->