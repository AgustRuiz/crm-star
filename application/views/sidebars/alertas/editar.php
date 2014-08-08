<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>alertas/listar" class="list-group-item">Listar alertas</a>
		<a href="<?=$this->config->base_url()?>alertas/nuevo" class="list-group-item">Nueva alerta</a>
		<a href="#" class="list-group-item active">Editar alerta</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar alerta</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						¿Seguro desea eliminar la alerta "<?=$alerta->asunto?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'alertas/eliminar/'.$alerta->id?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/span-->
</div><!--/row-->