<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>tickets" class="list-group-item">Listar mis tickets</a>
		<a href="<?=$this->config->base_url()?>tickets/listar" class="list-group-item">Listar todos los tickets</a>
		<a href="<?=$this->config->base_url()?>tickets/nuevo" class="list-group-item">Nuevo ticket</a>
		<a href="<?=$this->config->base_url()?>tickets/editar/<?=$ticket->id?>" class="list-group-item">Editar ticket</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar ticket</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						¿Seguro desea eliminar el ticket "<?=$ticket->asunto?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'tickets/eliminar/'.$ticket->id?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="list-group">
	</div>
</div><!--/span-->
</div><!--/row-->