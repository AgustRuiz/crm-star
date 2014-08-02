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
						<div class="col-md-4 col-xs-9 dato"><span class="<?=$contacto->contactos_estado->estilo_estado?>"><?=$contacto->contactos_estado->estado?></span></div>
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
  </div><!--/row-->