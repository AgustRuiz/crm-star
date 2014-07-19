<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Actividad</th>
						<th>Inicio</th>
						<th>Tipo</th>
						<th>Prioridad</th>
						<th>Estado</th>
						<th>Contacto</th>
						<th>Usuario</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaActividades)) {foreach ($listaActividades as $fila) { ?>
						<tr>
							<td><?=$fila['id']?></td>
							<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila['id']?>"><strong><?=$fila['nombre']?></strong></a></td>
							<td><?=$fila['inicio']?></td>
							<td><span class="<?=$fila['estilo_tipo']?>"><?=$fila['tipo']?></span></td>
							<td><span class="<?=$fila['estilo_prioridad']?>"><?=$fila['prioridad']?></span></td>
							<td><span class="<?=$fila['estilo_estado']?>"><?=$fila['estado']?></span></td>
							<td><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila['contacto']?>"><?=$fila['contacto_nombre']?> <?=$fila['contacto_apellidos']?></a></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila['usuario']?>"><?=$fila['usuario_nombre']?> <?=$fila['usuario_apellidos']?></a></td>
						</tr>
					<?php } } else { ?>
						<tr>
							<td colspan="5" class="text-center"><em>No hay campañas</em></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="8">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->