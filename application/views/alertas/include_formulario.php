<fieldset>
	<div class="form-group required">
		<label for="txtAsunto" class="col-sm-2 control-label">Asunto</label>
		<div class="col-sm-10">
			<input type='text' class="form-control" name="txtAsunto" id="txtAsunto" required="required" placeholder="Asunto de la alerta" value="<? if(isset($alerta)) echo $alerta->asunto;?>" />
		</div>
	</div>
	<div class="form-group required">
		<label for="txtFechaHora" class="col-sm-2 control-label">Fecha/Hora</label>
		<div class="col-sm-10">
			<input type='hidden' name="txtFechaHoraTimestamp" id="txtFechaHoraTimestamp"/>
			<div class='input-group date col-sm-12 col-xs-12 pull-left' id='txtFechaHora' data-date-format="DD/MM/YYYY HH:mm">
				<input type='text' class="form-control" name="txtFechaHora" id="lblFechaHora" readonly="readonly" required="required" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Descripción de la alerta"><?php if(isset($alerta)) echo str_replace('<br />', "", $alerta->descripcion); ?></textarea>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbTipo" class="col-sm-2 control-label">Enviar email</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEmail" name="cmbEmail">
				<option value="0" <?if(isset($alerta) && $alerta->email==0) echo 'selected="selected"';?>>No enviar email</option>
				<option value="1" <?if(isset($alerta) && $alerta->email==1) echo 'selected="selected"';?>>Avisar por email a <?=$this->session->userdata('email')?></option>
			</select>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbTipo" class="col-sm-2 control-label">Ventana emergente</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEmergente" name="cmbEmergente">
				<option value="1" <?if(isset($alerta) && $alerta->emergente==1) echo 'selected="selected"';?>>SÍ</option>
				<option value="0" <?if(isset($alerta) && $alerta->emergente==0) echo 'selected="selected"';?>>NO</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="txtAsuntoActividad" class="col-sm-2 control-label">Actividad</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdActividad" name="txtIdActividad" value="<?php if(isset($alerta) && $alerta->actividad!=null) echo $alerta->actividad->id; ?>"/>
				<input type="text" class="form-control" id="txtAsuntoActividad" name="txtAsuntoActividad" placeholder="" value="<? if(isset($alerta) && $alerta->actividad->result_count()>0) echo $txtAsuntoActividad = $alerta->actividad->asunto.' ('.$alerta->actividad->actividades_tipos->tipo.' con '.trim($alerta->actividad->contacto->nombre.' '.$alerta->actividad->contacto->apellidos).')';?>" title="<? if(isset($txtAsuntoActividad)) echo $txtAsuntoActividad; ?>" readonly="readonly"/>
				<span class="input-group-addon" onclick="abrirModalActividad()"><span class="glyphicon glyphicon-search"></span></span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearActividad();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			<!-- Modal búsqueda de campaña -->
			<div class="modal fade" id="modalActividad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
							<h4>Actividad</h4>
						</div>
						<iframe class="iframe-modal" id="iframeModalActividad"></iframe>
					</div>
				</div>
			</div>
			<!-- Fin de modal de búsqueda de actividad -->
		</div>
	</div>
</fieldset>
