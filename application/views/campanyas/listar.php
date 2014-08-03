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
					<?php if(isset($listaCampanyas) && $listaCampanyas->result_count()>0) {foreach ($listaCampanyas as $fila) { ?>
						<tr>
							<td><?=$fila->id?></td>
							<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->id?>"><strong><?=$fila->nombre?></strong></a></td>
							<td><?=$fila->campanyas_tipo->tipo?></td>
							<td><span class="<?=$fila->campanyas_estado->estilo_estado?>"><?=$fila->campanyas_estado->estado?></span></td>
							<td><? if($fila->usuario->count()>0){ ?><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=trim($fila->usuario->nombre.' '.$fila->usuario->apellidos)?></a><? } ?></td>
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