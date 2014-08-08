<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Asunto</th>
						<th>Fecha/Hora</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaAlertas) && $listaAlertas->result_count()>0) { foreach ($listaAlertas as $fila) { ?>
						<tr <? if(time()-strtotime($fila->inicio)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
							<td><?=$fila->id?></td>
							<td><a href="<?=$this->config->base_url()?>alertas/ver/<?=$fila->id?>"><?=$fila->asunto?></a></td>
							<td><?=date("d-m-Y H:i", strtotime($fila->fechaHora));?></td>
						</tr>
					<?php } } else { ?>
						<tr>
							<td colspan="9" class="text-center"><em>No hay alertas programadas</em></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="9">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->