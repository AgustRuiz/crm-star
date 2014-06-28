<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($error)){ ?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Oops!</strong> <?=$error?>
			</div>
			<?php } ?>
			<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/contactos/nuevo2/" accept-charset="utf-8">
				<fieldset>
					<legend>Datos generales</legend>
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
					<hr/>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="txtDireccion" name="txtDireccion" rows="2" placeholder="Dirección principal"><?php if(isset($contacto)) echo $contacto['direccion']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCiudad" class="col-sm-2 control-label">Ciudad</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtCiudad" name="txtCiudad" placeholder="Ciudad" value="<?php if(isset($contacto)) echo $contacto['ciudad']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtProvincia" class="col-sm-2 control-label">Estado/Provincia</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtProvincia" name="txtProvincia" placeholder="Estado o provincia" value="<?php if(isset($contacto)) echo $contacto['provincia']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtCP" class="col-sm-2 control-label">Código Postal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtCP" name="txtCP" placeholder="Código postal" value="<?php if(isset($contacto)) echo $contacto['cp']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPais" class="col-sm-2 control-label">País</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtPais" name="txtPais" placeholder="País" value="<?php if(isset($contacto)) echo $contacto['pais']; ?>" />
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label for="txtTelfOficina" class="col-sm-2 control-label">Telf. Oficina</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtTelfOficina" name="txtTelfOficina" placeholder="Teléfono de oficina" value="<?php if(isset($contacto)) echo $contacto['telfOficina']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelfMovil" class="col-sm-2 control-label">Telf. Móvil</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtTelfMovil" name="txtTelfMovil" placeholder="Teléfono móvil" value="<?php if(isset($contacto)) echo $contacto['telfMovil']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtFax" class="col-sm-2 control-label">FAX</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtFax" name="txtFax" placeholder="Teléfono FAX" value="<?php if(isset($contacto)) echo $contacto['fax']; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-2 control-label">Correo electrónico</label>
						<div class="col-sm-10">
							<div id="divCorreos">
								<?php for($i=0;$i<1;$i++){?>
								<div class="form" id="correo0">
									<div class="col-md-7 padding0">
										<input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo electrónico" value="" />
									</div>
									<label class=" col-md-2"><input type="radio" name="radPrincipal" checked="checked" /> Principal</label>
									<label class="col-md-2"><input type="checkbox" name="chkNoValido" /> No válido</label>
								</div>
								<?php } ?>
							</div>
							<div class="btn btn-default form-control" onclick="addCorreoContactos();"><span class="glyphicon glyphicon-plus-sign"></span> Añadir correo electrónico</div>
						</div>
					</div>
				</fieldset>
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