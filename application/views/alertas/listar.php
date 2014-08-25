<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->alertas_columna=='id'){
							echo '<th class="info">';
							if($config->alertas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/id/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->alertas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/id/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'alertas/ordenar/id/asc/'.$offset.'"> #</a></th>';
						}
						?>
						<?
						if($config->alertas_columna=='asunto'){
							echo '<th class="info">';
							if($config->alertas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/asunto/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Asunto</a></th>';
							}else if($config->alertas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/asunto/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Asunto</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'alertas/ordenar/asunto/asc/'.$offset.'"> Asunto</a></th>';
						}
						?>
						<?
						if($config->alertas_columna=='fechaHora'){
							echo '<th class="info">';
							if($config->alertas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/fechaHora/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Fecha y hora</a></th>';
							}else if($config->alertas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'alertas/ordenar/fechaHora/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Fecha y hora</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'alertas/ordenar/fechaHora/desc/'.$offset.'"> Fecha y hora</a></th>';
						}
						?>
						<th colspan="2" class="text-center">Notificaciones</th>
						<th class="text-center">Visualizada</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->alertas_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
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
						<td class="text-center">
							<? if(time()-strtotime($fila->fechaHora)>0 && $fila->visualizado==1) { ?>
							<span class="glyphicon glyphicon-eye-open" title="Visualizado"></span>
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