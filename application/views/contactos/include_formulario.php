<fieldset>
	<legend>Datos generales</legend>
	<div class="form-group required">
		<label for="txtNombre" class="col-sm-2 control-label" title="Campo obligatorio">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNombre" name="txtNombre" required="required" placeholder="Nombre del contacto (OBLIGATORIO)" value="<?php if(isset($contacto)) echo $contacto['nombre']; ?>"/>
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
		<label for="cmbEstado" class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEstado" name="cmbEstado">
				<?php
				foreach ($estados as $estado) {
					if($estado['id_estado']==$contacto['id_estado']){
						echo '<option value="'.$estado['id_estado'].'" selected="selected">'.$estado['estado'].'</option>';
					}else{
						echo '<option value="'.$estado['id_estado'].'">'.$estado['estado'].'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<hr/>
	<div class="form-group">
		<label for="txtDireccion" class="col-sm-2 control-label">Dirección</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDireccion" name="txtDireccion" rows="2" placeholder="Dirección principal"><?php if(isset($contacto)) echo str_replace('<br />', "", $contacto['direccion']); ?></textarea>
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
				<?php
				if(isset($contacto['correos']) && $contacto['correos']!=null){
					foreach ($contacto['correos'] as $key => $email) {
						?>
						<div class="form" id="correo0">
							<div class="col-md-7 padding0">
								<input type="text" class="form-control" id="txtEmail" name="txtEmail[<?=$email['id']?>]" placeholder="Correo electrónico" value="<?=$email['correo']?>" />
							</div>
							<label class=" col-md-2"><input type="radio" name="radPrincipal" value="<?=$email['id']?>" <?php if($email['principal']==1) echo 'checked="checked"'; ?> /> Principal</label>
							<label class="col-md-2"><input type="checkbox" name="chkNoValido[<?=$email['id']?>]" <?php if($email['noValido']==1) echo 'checked="checked"'; ?> /> No válido</label>
							<div class="btn btn-default pull-right col-md-1" onclick="removeElement(this);"><span class="glyphicon glyphicon-minus-sign"></span></div>
						</div>

						<?php }}else{ ?>
						<div class="form" id="correo0">
							<div class="col-md-7 padding0">
								<input type="text" class="form-control" id="txtEmail" name="txtEmail[0]" placeholder="Correo electrónico" value="" />
							</div>
							<label class=" col-md-2"><input type="radio" name="radPrincipal" value="0" checked="checked" /> Principal</label>
							<label class="col-md-2"><input type="checkbox" name="chkNoValido[0]" /> No válido</label>
						</div>
						<?php } ?>
					</div>
					<div class="btn btn-default form-control" onclick="addCorreoContactos();"><span class="glyphicon glyphicon-plus-sign"></span> Añadir correo electrónico</div>
				</div>
			</div>
			<hr/>
			<div class="form-group">
				<label for="txtOtrosDatos" class="col-sm-2 control-label">Otros datos</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="txtOtrosDatos" name="txtOtrosDatos" rows="4" placeholder="Observaciones de interés sobre el contacto"><?php if(isset($contacto)) echo str_replace('<br />', "", $contacto['otrosDatos']); ?></textarea>
				</div>
			</div>
		</fieldset>