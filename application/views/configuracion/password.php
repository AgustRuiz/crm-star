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
				<strong>Oops:</strong> <?=$error?>
			</div>
			<?php } ?>

			<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/configuracion/password2/" accept-charset="utf-8">

				<fieldset>
					<legend>Cambiar contraseña</legend>
					<div class="form-group">
						<label for="txtActual" class="col-sm-3 control-label" title="Campo obligatorio">Contraseña actual</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="txtActual" name="txtActual" required="required" placeholder="Inserta tu contraseña actual"/>
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label for="txtPassword" class="col-sm-3 control-label" title="Campo obligatorio">Nueva contraseña</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="txtPassword" name="txtPassword" required="required" placeholder="Inserta la nueva contraseña"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPassword2" class="col-sm-3 control-label" title="Campo obligatorio">Repite la nueva contraseña</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="txtPassword2" name="txtPassword2" required="required" placeholder="Repite la nueva contraseña"/>
						</div>
					</div>
				</fieldset>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-success" name="submit" value="submit">Cambiar contraseña</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						Todos los campos son obligatorios
					</div>
				</div>
			</form>
  </div><!--/row-->