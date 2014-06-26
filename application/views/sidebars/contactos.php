<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
	<div class="list-group">
		<a href="<?=$this->config->base_url()?>contactos/listar" class="list-group-item <?php if($this->router->method=='listar' || $this->router->method=='index') echo 'active'?>">Listar contactos</a>
		<a href="<?=$this->config->base_url()?>contactos/nuevo" class="list-group-item <?php if($this->router->method=='nuevo') echo 'active';?>">Nuevo contacto</a>

		<?php if($this->router->method=='ver' || $this->router->method=='editar' || $this->router->method=='editar2'){ ?>
		<a href="<? if($this->router->method=='editar') echo "#"; else echo $this->config->base_url().'contactos/editar/'.$contacto['id'];?>" class="list-group-item <?php if($this->router->method=='editar') echo 'active';?>">Editar contacto</a>
		<a href="#" class="list-group-item" data-toggle="modal" data-target="#modalEliminar">Eliminar contacto</a>

		<!-- Modal eliminar -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						¿Seguro desea eliminar el contacto "<?=$contacto['nombre'].' '.$contacto['apellidos']?>"? Esta operación no tiene vuelta atrás...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a href="<?=$this->config->base_url().'contactos/eliminar/'.$contacto['id']?>" class="btn btn-danger">Eliminar</a>
					</div>
				</div>
			</div>
		</div>

		<?php } else { ?>
		<a href="#" class="list-group-item disabled">Editar contacto</a>
		<a href="#" class="list-group-item disabled">Eliminar contacto</a>
		<?php } ?>
	</div>
</div><!--/span-->
</div><!--/row-->