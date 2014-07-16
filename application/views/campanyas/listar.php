<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre de la Campaña</th>
						<th>Tipo</th>
						<th>Estado</th>
						<th>Asignada a</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaCampanyas)) {foreach ($listaCampanyas as $fila) { ?>
						<tr>
							<td><?=$fila['id']?></td>
							<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila['id']?>"><strong><?=$fila['nombre']?></strong></a></td>
							<td><?=$fila['tipo']?></td>
							<td><span class="<?=$fila['estilo_estado']?>"><?=$fila['estado']?></span></td>
							<td><? if($fila['usuario']!=0){ ?><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila['usuario']?>"><?=$fila['usuario_nombre']?> <?=$fila['usuario_apellidos']?></a><? } ?></td>
						</tr>
					<?php } } else { ?>
						<tr>
							<td colspan="5" class="text-center"><em>No hay campañas</em></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="5">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->