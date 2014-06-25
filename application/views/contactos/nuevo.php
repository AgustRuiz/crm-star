<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($error)){ ?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Oops!</strong> <?=$error?>
			</div>
			<?php } ?>
			<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/contactos/nuevo/" accept-charset="utf-8">
				<div class="form-group required">
					<label for="txtNombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtNombre" name="txtNombre" required="required" placeholder="Nombre del contacto" value="<?php if(isset($contacto)) echo $contacto['nombre']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-10">

						<input type="text" class="form-control" id="txtApellidos" name="txtApellidos" placeholder="Apellidos del contacto" value="<?php if(isset($contacto)) echo $contacto['apellidos']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label for="txtNIF" class="col-sm-2 control-label">NIF</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="txtNIF" name="txtNIF" placeholder="NIF del contacto" value="<?php if(isset($contacto)) echo $contacto['nif']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" name="submit" value="submit">Crear contacto</button>
						<a href="<?=$this->config->base_url().$this->router->fetch_class()?>" rol="button" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						Los campos marcados con un asterisco (<span class="asterisk">*</span>) son obligatorios
					</div>
				</div>
			</form>



  </div><!--/row-->