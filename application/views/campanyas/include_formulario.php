<fieldset>
	<div class="form-group required">
		<label for="txtNombre" class="col-sm-2 control-label" title="Campo obligatorio">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtNombre" name="txtNombre" required="required" placeholder="Nombre de la campaña (OBLIGATORIO)" value="<?php if(isset($campanya)) echo $campanya['nombre']; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label for="txtFechaInicio" class="col-sm-2 control-label">Inicio</label>
		<div class="col-sm-10">
			<div class='input-group date' id='txtFechaInicio'>
				<input type='text' class="form-control" name="txtFechaInicio" readonly="readonly" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="txtFechaFin" class="col-sm-2 control-label">Finalización</label>
		<div class="col-sm-10">
			<div class='input-group date' id='txtFechaFin'>
				<input type='text' class="form-control" name="txtFechaFin" readonly="readonly" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="cmbTipo" class="col-sm-2 control-label">Tipo campaña</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbTipo" name="cmbTipo">
				<?php
				foreach ($tipos as $tipo) {
					if($tipo['id_tipo']==$campanya['id_tipo']){
						echo '<option value="'.$tipo['id_tipo'].'" selected="selected">'.$tipo['tipo'].'</option>';
					}else{
						echo '<option value="'.$tipo['id_tipo'].'">'.$tipo['tipo'].'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="cmbEstado" class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEstado" name="cmbEstado">
				<?php
				foreach ($estados as $estado) {
					if($estado['id_estado']==$campanya['id_estado']){
						echo '<option value="'.$estado['id_estado'].'" selected="selected">'.$estado['estado'].'</option>';
					}else{
						echo '<option value="'.$estado['id_estado'].'">'.$estado['estado'].'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Descripción de la campaña"><?php if(isset($campanya)) echo str_replace('<br />', "", $contacto['descripcion']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtObjetivo" class="col-sm-2 control-label">Objetivo</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtObjetivo" name="txtObjetivo" rows="4" placeholder="Objetivo de la campaña"><?php if(isset($campanya)) echo str_replace('<br />', "", $contacto['objetivo']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombreUsuario" class="col-sm-2 control-label" title="Campo obligatorio">Usuario responsable</label>
		<div class="col-sm-10">
			<div class="input-group">
				<input type="hidden" id="txtIdUsuario" name="txtIdUsuario" value="<?php if(isset($campanya)) echo $campanya['usuarios.id']; ?>"/>
				<input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" placeholder="" value="<?php if(isset($campanya)) echo $campanya['usuarios.nombre']; ?>" readonly="readonly"/>
				<span class="input-group-addon" data-toggle="modal" data-target="#modalUsuarioResponsable"><span class="glyphicon glyphicon-search"></span></span>
			</div>
			<!-- Modal búsqueda de usuario -->
			<div class="modal fade" id="modalUsuarioResponsable" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							Asignar usuario
						</div>
						<div class="modal-body">
							Éste apartado no está diseñado aún. Incluirá un iframe de búsqueda
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Asignar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div><!-- Fin de modal de búsqueda de usuario -->
		</div>
	</div>
</fieldset>
