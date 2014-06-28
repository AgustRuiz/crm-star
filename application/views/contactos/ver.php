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
					<!-- Fila 3 -->
					<div><label>Dirección</label></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Dirección</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['direccion']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Código postal</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['cp']?></div>
					<!-- Fila 4 -->
					<div class="col-md-2 col-xs-3 text-right titulo">Ciudad</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['ciudad']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Provincia/Estado</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['provincia']?></div>
					<!-- Fila 5 -->
					<div><label>Métodos de contacto</label></div>

					<div class="col-md-2 col-xs-3 text-right titulo">Correo electrónico <em>(vista previa)</em></div>
					<div class="col-md-4 col-xs-9 dato">
						<div><strong>correo@principal.com</strong> <em>(principal)</em></div>
						<div><s>correo@rehusado.com</s> <em>(no válido)</em></div>
						<div>correo@electronico.com</div>
						<div>correo@electronico.com</div>
						<div><s>correo@rehusado.com</s><em>(no válido)</em></div>
						<div>correo@electronico.com</div>
					</div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Oficina</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['telfOficina']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Móvil</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['telfMovil']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">FAX</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['fax']?></div>
				</div>
			</fieldset>
  </div><!--/row-->