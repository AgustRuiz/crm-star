<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>actividades/listar" class="list-group-item">Listar todas las actividades</a>
		<a href="<?=$this->config->base_url()?>actividades/listarUsuario" class="list-group-item">Listar mis actividades</a>
		<a href="<?=$this->config->base_url()?>actividades/nuevo" class="list-group-item">Nueva actividad</a>
		<a href="#" class="list-group-item active">Editar actividad</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar actividad</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						¿Seguro desea eliminar la actividad "<?=$actividad->asunto?>" Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'actividades/eliminar/'.$actividad->id?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div> <!-- Fin Modal eliminar -->
	</div>
	<div class="list-group">
	</div>
</div><!--/span-->
</div><!--/row-->