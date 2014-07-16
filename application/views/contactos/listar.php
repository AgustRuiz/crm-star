<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaContactos)){ foreach ($listaContactos as $fila) { ?>
						<tr>
							<td><?=$fila['id']?></td>
							<td><a href="<?=$this->config->base_url().'contactos/ver/'.$fila['id']?>"><?=$fila['nombre'].' '.$fila['apellidos'];?></a></td>
							<td><span class="<?=$fila['estilo_estado']?>"><?=$fila['estado'];?></span></td>
						</tr>
					<?php } } else { ?>
						<tr><td colspan="4" class="text-center"><em>No hay contactos</em></td></tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="4">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->