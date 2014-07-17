<fieldset>
	<div class="form-group">
		<label for="txtInicio" class="col-sm-2 control-label">Inicio</label>
		<div class="col-sm-10">
			<input type='hidden' name="txtInicioTimestamp" id="txtInicioTimestamp" />
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtInicio'>
				<input type='text' class="form-control" name="txtInicio" readonly="readonly" />
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
		<label for="txtFin" class="col-sm-2 control-label">Finalización</label>
		<div class="col-sm-10">
			<input type='hidden' name="txtFinTimestamp" id="txtFinTimestamp" />
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtFin'>
				<input type='text' class="form-control" name="txtFin" readonly="readonly" />
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
		<label for="cmbTipo" class="col-sm-2 control-label">Tipo</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbTipo" name="cmbTipo">
				<?php
				foreach ($tipos as $tipo) {
					if(isset($actividad) && $tipo['id_estado']==$actividad['id_estado']){
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
		<label for="cmbPrioridad" class="col-sm-2 control-label">Prioridad</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbPrioridad" name="cmbPrioridad">
				<?php
				foreach ($prioridades as $prioridad) {
					if(isset($actividad) && $prioridad['id_prioridad']==$actividad['id_prioridad']){
						echo '<option value="'.$prioridad['id_prioridad'].'" selected="selected">'.$prioridad['prioridad'].'</option>';
					}else if($prioridad['id_prioridad'] == 2){
						echo '<option value="'.$prioridad['id_prioridad'].'" selected="selected">'.$prioridad['prioridad'].'</option>';
					}else{
						echo '<option value="'.$prioridad['id_prioridad'].'">'.$prioridad['prioridad'].'</option>';
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
					if(isset($actividad) && $estado['id_estado']==$actividad['id_estado']){
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
		<label for="txtNombreContacto" class="col-sm-2 control-label">Contacto</label>
		<div class="col-sm-10">
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombreCampaña" class="col-sm-2 control-label">Campaña</label>
		<div class="col-sm-10">
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombreUsuario" class="col-sm-2 control-label">Usuario</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdUsuario" name="txtIdUsuario" value="<?php if(isset($actividad)) echo $actividad['usuario']; ?>"/>
				<input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" placeholder="" value="<? if(isset($actividad)) echo $actividad['usuario_nombre'].' '.$actividad['usuario_apellidos']; ?>" readonly="readonly"/>
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
						<iframe class="iframe-modal" id="iframeModalUsuarioResponsable" style="height:30px;"></iframe>
					</div>
				</div>
			</div><!-- Fin de modal de búsqueda de usuario -->
		</div>
	</div>
	<div class="form-group">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Descripción de la actividad"><?php if(isset($actividad)) echo str_replace('<br />', "", $actividad['descripcion']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtResultado" class="col-sm-2 control-label">Resultado</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtResultado" name="txtResultado" rows="4" placeholder="Resultado de la actividad"><?php if(isset($actividad)) echo str_replace('<br />', "", $actividad['resultado']); ?></textarea>
		</div>
	</div>
</fieldset>
