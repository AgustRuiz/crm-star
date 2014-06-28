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
					<!-- Fila -->
					<div class="col-md-2 col-xs-3 text-right titulo">Nombre</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['nombre']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Apellidos</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['apellidos']?></div>
					<!-- Fila -->
					<div class="col-md-2 col-md-offset-6 col-xs-3 text-right titulo">NIF</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['nif']?></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Dirección</h4></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Dirección</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['direccion']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Código postal</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['cp']?></div>
					<!-- Fila -->
					<div class="col-md-2 col-xs-3 text-right titulo">Ciudad</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['ciudad']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Provincia/Estado</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['provincia']?></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Métodos de contacto</h4></div>

					<div class="col-md-2 col-xs-3 text-right titulo">Correo electrónico</div>
					<div class="col-md-4 col-xs-9 dato">
						<?php
						if($contacto['correos']!=null){
							foreach ($contacto['correos'] as $email) {
								if($email['principal']==1){
									echo '<div><strong>'.$email['correo'].'</strong> <em>(principal)</em></div>';
								}else if($email['noValido']==1){
									echo '<div><s>'.$email['correo'].'</s> <em>(no válido)</em></div>';
								}else{
									echo '<div>'.$email['correo'].'</div>';
								}
							}
						}else{
							echo '<div><em>No hay correos</em></div>';
						}
						?>
					</div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Oficina</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['telfOficina']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Telf. Móvil</div>
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['telfMovil']?></div>
					<div class="col-md-2 col-xs-3 text-right titulo">FAX</div> <!-- Tiene offset -->
					<div class="col-md-4 col-xs-9 dato"><?=$contacto['fax']?></div>
					<!-- Fila -->
					<div class="col-md-12"><h4>Otros</h4></div>
					<div class="col-md-2 col-xs-3 text-right titulo">Otros datos</div> <!-- Tiene offset -->
					<div class="col-md-10 col-xs-9 dato"><?=$contacto['otrosDatos']?></div>
				</div>
			</fieldset>
  </div><!--/row-->