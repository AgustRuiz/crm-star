<fieldset>
	<div class="form-group required">
		<label for="txtNombre" class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-10">
			<input type='text' class="form-control" name="txtNombre" id="txtNombre" required="required" placeholder="Nombre de la actividad" value="<? if(isset($actividad)) echo $actividad['nombre'];?>" />
		</div>
	</div>
	<div class="form-group required">
		<label for="txtInicio" class="col-sm-2 control-label">Inicio</label>
		<div class="col-sm-10">
			<input type='hidden' name="txtInicioTimestamp" id="txtInicioTimestamp" value="<?php if(isset($actividad)) echo $actividad['inicioTimestamp']; ?>"/>
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtInicio' data-date-format="DD/MM/YYYY HH:mm">
				<input type='text' class="form-control" name="txtInicio" id="lblInicio" readonly="readonly" required="required" />
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
			<input type='hidden' name="txtFinTimestamp" id="txtFinTimestamp" value="<?php if(isset($actividad)) echo $actividad['finTimestamp']; ?>"/>
			<div class='input-group date col-sm-11 col-xs-11 pull-left' id='txtFin' data-date-format="DD/MM/YYYY HH:mm">
				<input type='text' class="form-control" name="txtFin" id="lblFin" readonly="readonly" placeholder="No especificado" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearFechaFin();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbTipo" class="col-sm-2 control-label">Tipo</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbTipo" name="cmbTipo">
				<?php
				foreach ($tipos as $tipo) {
					if(isset($actividad) && $tipo['id_tipo']==$actividad['tipo']){
						echo '<option value="'.$tipo['id_tipo'].'" selected="selected">'.$tipo['tipo'].'</option>';
					}else{
						echo '<option value="'.$tipo['id_tipo'].'">'.$tipo['tipo'].'</option>';
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group required">
		<label for="cmbPrioridad" class="col-sm-2 control-label">Prioridad</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbPrioridad" name="cmbPrioridad">
				<?php
				foreach ($prioridades as $prioridad) {
					if(isset($actividad) && $prioridad['id_prioridad']==$actividad['prioridad']){
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
	<div class="form-group required">
		<label for="cmbEstado" class="col-sm-2 control-label">Estado</label>
		<div class="col-sm-10">
			<select class="form-control" id="cmbEstado" name="cmbEstado">
				<?php
				foreach ($estados as $estado) {
					if(isset($actividad) && $estado['id_estado']==$actividad['estado']){
						echo '<option value="'.$estado['id_estado'].'" selected="selected">'.$estado['estado'].'</option>';
					}else{
						echo '<option value="'.$estado['id_estado'].'">'.$estado['estado'].'</option>';
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
				<input type="hidden" id="txtIdContacto" name="txtIdContacto" value="<?php if(isset($actividad)) echo $actividad['contacto']; ?>"/>
				<input type="text" class="form-control" id="txtNombreContacto" name="txtNombreContacto" placeholder="" value="<? if(isset($actividad)) echo $actividad['contacto_nombre'].' '.$actividad['contacto_apellidos']; ?>" readonly="readonly"/>
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
		<label for="txtNombreCampanya" class="col-sm-2 control-label">Campaña</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-11 col-xs-11 pull-left">
				<input type="hidden" id="txtIdCampanya" name="txtIdCampanya" value="<?php if(isset($actividad)) echo $actividad['campanya']; ?>"/>
				<input type="text" class="form-control" id="txtNombreCampanya" name="txtNombreCampanya" placeholder="" value="<? if(isset($actividad)) echo $actividad['campanya_nombre'];?>" readonly="readonly"/>
				<span class="input-group-addon" onclick="abrirModalCampanya()"><span class="glyphicon glyphicon-search"></span></span>
			</div>
			<span class="btn btn-default col-sm-1 col-xs-1 pull-left" onclick="clearCampanya();">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			<!-- Modal búsqueda de campaña -->
			<div class="modal fade" id="modalCampanya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
							<h4>Campaña</h4>
						</div>
						<iframe class="iframe-modal" id="iframeModalCampanya"></iframe>
					</div>
				</div>
			</div><!-- Fin de modal de búsqueda de contacto -->
		</div>
	</div>
	<div class="form-group required">
		<label for="txtNombreUsuario" class="col-sm-2 control-label">Usuario</label>
		<div class="col-sm-10">
			<div class="input-group col-sm-12 col-xs-12 pull-left">
				<input type="hidden" id="txtIdUsuario" name="txtIdUsuario" value="<?=$this->session->userdata('id');?>"/>
				<input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario" placeholder="" value="<?=$this->session->userdata('nombre')?> <?=$this->session->userdata('apellidos')?>" readonly="readonly"/>
			</div>
		</div>
	</div>
	<div class="form-group required">
		<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4" placeholder="Descripción de la actividad" required="required"><?php if(isset($actividad)) echo str_replace('<br />', "", $actividad['descripcion']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="txtResultado" class="col-sm-2 control-label">Resultado</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="txtResultado" name="txtResultado" rows="4" placeholder="Resultado de la actividad"><?php if(isset($actividad)) echo str_replace('<br />', "", $actividad['resultado']); ?></textarea>
		</div>
	</div>
</fieldset>
