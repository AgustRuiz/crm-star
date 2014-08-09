<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Asunto</th>
						<th>Fecha y hora</th>
						<th colspan="2" class="text-center">Notificaciones</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaAlertas) && $listaAlertas->result_count()>0) { foreach ($listaAlertas as $fila) { ?>
					<tr <? if(time()-strtotime($fila->fechaHora)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
						<td><?=$fila->id?></td>
						<td><a href="<?=$this->config->base_url()?>alertas/ver/<?=$fila->id?>"><?=$fila->asunto?></a></td>
						<td><?=date("d-m-Y H:i", strtotime($fila->fechaHora));?></td>
						<td class="text-right">
							<? if($fila->emergente==1) { ?>
							<span class="glyphicon glyphicon-bell" title="Notificación emergente"></span>
							<? } else { ?>
							<!-- <span class="glyphicon glyphicon-ban-circle"></span> -->
							<? } ?>
						</td>
						<td class="text-left">
							<? if($fila->email==1) { ?>
							<span class="glyphicon glyphicon-envelope" title="Aviso por correo electrónico"></span>
							<? } else { ?>
							<!-- <span class="glyphicon glyphicon-ban-circle"></span> -->
							<? } ?>
						</td>
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