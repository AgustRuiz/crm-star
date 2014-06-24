<div class="col-xs-6 col-sm-3 sidebar-offcanvas affix-top" id="sidebar" role="navigation">
  <div class="list-group">
   <a href="<?=$this->config->base_url()?>contactos/listar" class="list-group-item <?php if($this->router->method=='listar' || $this->router->method=='index') echo 'active'?>">Listar contactos</a>
   <a href="<?=$this->config->base_url()?>contactos/listarPaginado" class="list-group-item <?php if($this->router->method=='listarPaginado') echo 'active';?>">Listar paginado (test)</a>
   <a href="<?=$this->config->base_url()?>contactos/nuevo" class="list-group-item <?php if($this->router->method=='nuevo') echo 'active';?>">Nuevo contacto</a>
   <a href="#" class="list-group-item disabled">Editar contacto</a>
   <a href="#" class="list-group-item disabled">Eliminar contacto</a>
 </div>
</div><!--/span-->
</div><!--/row-->