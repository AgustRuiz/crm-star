<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>usuarios/listar" class="list-group-item">Listar usuarios</a>
		<a href="<?=$this->config->base_url()?>usuarios/nuevo" class="list-group-item">Nuevo usuario</a>
		<a href="#" class="list-group-item active">Editar usuario</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar usuario</a>
		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
					¿Seguro desea eliminar el usuario "<?=$usuario['nombre'].' '.$usuario['apellidos']?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'usuario/eliminar/'.$usuario['id']?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div> <!-- Fin Modal eliminar -->
	</div>
</div><!--/span-->
</div><!--/row-->