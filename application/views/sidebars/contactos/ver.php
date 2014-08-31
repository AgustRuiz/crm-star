<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>contactos/listar" class="list-group-item">Listar contactos</a>
		<a href="<?=$this->config->base_url()?>contactos/nuevo" class="list-group-item">Nuevo contacto</a>
		<a href="<?=$this->config->base_url()?>contactos/editar/<?=$contacto->id?>" class="list-group-item">Editar contacto</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar contacto</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						¿Seguro desea eliminar el contacto "<?=trim($contacto->nombre.' '.$contacto->apellidos)?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'contactos/eliminar/'.$contacto->id?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>actividades/nuevo?contacto=<?=$contacto->id?>" class="list-group-item">Nueva actividad para este contacto</a>
		<a href="<?=$this->config->base_url()?>tickets/nuevo?contacto=<?=$contacto->id?>" class="list-group-item">Nuevo ticket de soporte este contacto</a>
	</div>
</div><!--/span-->
</div><!--/row-->