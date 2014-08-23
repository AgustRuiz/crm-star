<fieldset>
	<legend>Datos generales</legend>
	<div class="form-group required">
		<label for="txtNombre" class="col-sm-2 control-label" title="Campo obligatorio">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNombre" name="txtNombre" required="required" placeholder="Nombre del usuario (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->nombre; ?>" />
		</div>
	</div>
	<div class="form-group required">
		<label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtApellidos" name="txtApellidos" required="required" placeholder="Apellidos del usuario (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->apellidos; ?>" />
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
			<input type="text" class="form-control" id="txtNick" name="txtNick" required="required" placeholder="Identificador de usuario (OBLIGATORIO)" value="<?php if(isset($usuario)) echo $usuario->nick; ?>" <?if(isset($usuario) && $usuario->id==1) echo 'readonly="readonly"'; ?>/>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbPerfil" class="col-sm-2 control-label" title="Campo obligatorio">Perfil de usuario</label>
		<div class="col-sm-10">
			<?if(isset($usuario) && $usuario->id==1) { ?>
			<input type="text" class="form-control" required="required" value="<?=$usuario->perfil->nombre; ?>" readonly="readonly"/>
			<? }else{ ?>
			<select class="form-control" id="cmbPerfil" name="cmbPerfil" >
				<?php
				foreach ($perfiles as $perfil) {
					if(isset($usuario) && $usuario->perfil->id == $perfil->id){
						echo '<option value="'.$perfil->id.'" selected="selected">'.$perfil->nombre.'</option>';
					}else{
						echo '<option value="'.$perfil->id.'">'.$perfil->nombre.'</option>';
					}
				}
				?>
			</select>
			<? } ?>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbEstado" class="col-sm-2 control-label" title="Campo obligatorio">Estado de usuario</label>
		<div class="col-sm-10">
			<?if(isset($usuario) && $usuario->id==1) { ?>
			<input type="text" class="form-control" required="required" value="<?=$usuario->usuarios_estado->estado; ?>" readonly="readonly"/>
			<? }else{ ?>
			<select class="form-control" id="cmbEstado" name="cmbEstado">
				<?php
				foreach ($estados as $estado) {
					if(isset($usuario) && $usuario->usuarios_estado->id == $estado->id){
						echo '<option value="'.$estado->id.'" selected="selected">'.$estado->estado.'</option>';
					}else{
						echo '<option value="'.$estado->id.'">'.$estado->estado.'</option>';
					}
				}
				?>
			</select>
			<? } ?>
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