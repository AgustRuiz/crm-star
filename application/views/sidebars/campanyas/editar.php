<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>campanyas" class="list-group-item">Listar todas las campañas</a>
		<a href="<?=$this->config->base_url()?>campanyas/listarUsuario" class="list-group-item">Listar mis campañas</a>
		<a href="<?=$this->config->base_url()?>campanyas/nuevo" class="list-group-item">Nueva campaña</a>
		<a href="#" class="list-group-item active">Editar campaña</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar campaña</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
					¿Seguro desea eliminar la campaña "<?=$campanya->nombre?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'campanyas/eliminar/'.$campanya->id?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div> <!-- Fin Modal eliminar -->
	</div>
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>actividades/nueva/" class="list-group-item">Nueva actividad</a>
	</div>
</div><!--/span-->
</div><!--/row-->