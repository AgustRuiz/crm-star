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
			<input type='hidden' name="txtFechaInicioTimestamp" id="txtFechaInicioTimestamp" />
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtFechaInicio'>
				<input type='text' class="form-control" name="txtFechaInicio" readonly="readonly" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearFechaInicio();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label for="txtFechaFin" class="col-sm-2 control-label">Finalización</label>
		<div class="col-sm-10">
		<input type='hidden' name="txtFechaFinTimestamp" id="txtFechaFinTimestamp" />
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtFechaFin'>
				<input type='text' class="form-control" name="txtFechaFin" readonly="readonly" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearFechaFin();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label for="cmbTipo" class="col-sm-2 control-label">Tipo campaña</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbTipo" name="cmbTipo">
				<?php
				foreach ($tipos as $tipo) {
					if(isset($campanya) && $tipo->id == $campanya->campanyas_tipo->id){
						echo '<option value="'.$tipo->id.'" selected="selected">'.$tipo->tipo.'</option>';
					}else{
						echo '<option value="'.$tipo->id.'">'.$tipo->tipo.'</option>';
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
					if(isset($campanya) && $estado->id == $campanya->campanyas_estado->id){
						echo '<option value="'.$estado->id.'" selected="selected">'.$estado->estado.'</option>';
					}else{
						echo '<option value="'.$estado->id.'">'.$estado->estado.'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Descripción de la campaña"><?php if(isset($campanya)) echo str_replace('<br />', "", $campanya['descripcion']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtObjetivo" class="col-sm-2 control-label">Objetivo</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtObjetivo" name="txtObjetivo" rows="4" placeholder="Objetivo de la campaña"><?php if(isset($campanya)) echo str_replace('<br />', "", $campanya['objetivo']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombreUsuario" class="col-sm-2 control-label">Usuario responsable</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdUsuario" name="txtIdUsuario" value="<?php if(isset($campanya)) echo $campanya['usuario']; ?>"/>
				<input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" placeholder="" value="<? if(isset($campanya)) echo $campanya['usuario_nombre'].' '.$campanya['usuario_apellidos']; ?>" readonly="readonly"/>
				<span class="input-group-addon" onclick="abrirModalUsuarioResponsable()"><span class="glyphicon glyphicon-search"></span></span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearUsuario();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			<!-- Modal búsqueda de usuario -->
			<div class="modal fade" id="modalUsuarioResponsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
							<h4>Usuario responsable de campaña</h4>
						</div>
						<iframe class="iframe-modal" id="iframeModalUsuarioResponsable" style="height:500px;"></iframe>
					</div>
				</div>
			</div><!-- Fin de modal de búsqueda de usuario -->
		</div>
	</div>
</fieldset>
