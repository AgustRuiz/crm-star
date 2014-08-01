<fieldset>
	<legend>Datos generales</legend>
	<div class="form-group required">
		<label for="txtNombre" class="col-sm-2 control-label" title="Campo obligatorio">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre del usuario (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->nombre; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtApellidos" name="txtApellidos" placeholder="Apellidos del usuario" value="<?php if(isset($usuario)) echo $usuario->apellidos; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="txtNIF" class="col-sm-2 control-label">NIF</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNIF" name="txtNIF" placeholder="NIF del usuario" value="<?php if(isset($usuario)) echo $usuario->nif; ?>" />
		</div>
	</div>
	<div class="form-group required">
		<label for="txtNick" class="col-sm-2 control-label" title="Campo obligatorio">Identificador</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNick" name="txtNick" required="required" placeholder="Identificador de usuario (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->nick; ?>"/>
		</div>
	</div>
	<hr/>
	<div class="form-group required">
		<label for="txtEmail" class="col-sm-2 control-label">Correo electrónico</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtEmail" name="txtEmail" required="required" placeholder="Correo electrónico (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->email; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelfOficina" class="col-sm-2 control-label">Telf. Oficina</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtTelfOficina" name="txtTelfOficina" placeholder="Teléfono de oficina" value="<?php if(isset($usuario)) echo $usuario->telfOficina; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="txtTelfMovil" class="col-sm-2 control-label">Telf. Móvil</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtTelfMovil" name="txtTelfMovil" placeholder="Teléfono móvil" value="<?php if(isset($usuario)) echo $usuario->telfMovil; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label for="txtFax" class="col-sm-2 control-label">FAX</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtFax" name="txtFax" placeholder="Teléfono FAX" value="<?php if(isset($usuario)) echo $usuario->fax; ?>" />
		</div>
	</div>
	<hr/>
	<div class="form-group">
		<label for="txtOtrosDatos" class="col-sm-2 control-label">Otros datos</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtOtrosDatos" name="txtOtrosDatos" rows="4" placeholder="Observaciones de interés sobre el usuario"><?php if(isset($usuario)) echo str_replace('<br />', "", $usuario->otrosDatos); ?></textarea>
		</div>
	</div>
</fieldset>