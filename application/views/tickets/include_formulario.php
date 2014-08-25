<fieldset>
	<div class="form-group required">
		<label for="txtAsunto" class="col-sm-2 control-label" title="Campo obligatorio">Asunto</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="txtAsunto" name="txtAsunto" required="required" placeholder="Asunto del ticket (OBLIGATORIO)" value="<?php if(isset($ticket)) echo $ticket->asunto; ?>"/>
		</div>
	</div>
	<div class="form-group required">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" required="required" rows="4" placeholder="Descripción de la incidencia"><?php if(isset($ticket)) echo str_replace('<br />', "", $ticket->descripcion); ?></textarea>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbPrioridad" class="col-sm-2 control-label">Prioridad</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbPrioridad" name="cmbPrioridad">
				<?php
				foreach ($prioridades as $prioridad) {
					if(isset($ticket) && $prioridad->id == $ticket->prioridad->id){
						echo '<option value="'.$prioridad->id.'" selected="selected">'.$prioridad->prioridad.'</option>';
					}else{
						if(!isset($ticket) && $prioridad->id == 2){
							echo '<option value="'.$prioridad->id.'" selected="selected">'.$prioridad->prioridad.'</option>';
						}else{
							echo '<option value="'.$prioridad->id.'">'.$prioridad->prioridad.'</option>';
						}
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbEstado" class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEstado" name="cmbEstado">
				<?php
				foreach ($estados as $estado) {
					if(isset($ticket) && $estado->id == $ticket->tickets_estado->id){
						echo '<option value="'.$estado->id.'" selected="selected">'.$estado->estado.'</option>';
					}else{
						echo '<option value="'.$estado->id.'">'.$estado->estado.'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group required">
		<label for="txtNombreContacto" class="col-sm-2 control-label">Contacto</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdContacto" name="txtIdContacto" value="<? if(isset($ticket) && $ticket->contacto!=null) echo $ticket->contacto->id; ?>"/>
				<input type="text" class="form-control" id="txtNombreContacto" name="txtNombreContacto" placeholder="" value="<? if(isset($ticket) && $ticket->contacto!=null) echo trim($ticket->contacto->nombre.' '.$ticket->contacto->apellidos); ?>" readonly="readonly"/>
				<span class="input-group-addon" onclick="abrirModalContacto()"><span class="glyphicon glyphicon-search"></span></span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearContacto();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			<!-- Modal búsqueda de contacto -->
			<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
							<h4>Contacto</h4>
						</div>
						<iframe class="iframe-modal" id="iframeModalContacto"></iframe>
					</div>
				</div>
			</div><!-- Fin de modal de búsqueda de contacto -->
		</div>
	</div>
	<div class="form-group">
		<label for="txtNombreUsuario" class="col-sm-2 control-label">Usuario responsable</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdUsuario" name="txtIdUsuario" value="<?php if(isset($ticket)) echo $ticket->usuario->id; ?>"/>
				<input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" placeholder="" value="<? if(isset($ticket)) echo trim($ticket->usuario->nombre.' '.$ticket->usuario->apellidos); ?>" readonly="readonly"/>
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
	<div class="form-group">
		<label for="txtResolucion" class="col-sm-2 control-label">Resolución</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtResolucion" name="txtResolucion" rows="4" placeholder="Resultado de la incidencia"><?php if(isset($ticket)) echo str_replace('<br />', "", $ticket->resolucion); ?></textarea>
		</div>
	</div>
</fieldset>
