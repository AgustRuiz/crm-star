<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->tickets_columna=='id'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/id/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"> #</a></th>';
						}
						?>

						<?
						if($config->tickets_columna=='prioridad_id'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/prioridad_id/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/prioridad_id/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/prioridad_id/desc/'.$offset.'/'.$this->router->fetch_method().'"> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
						}
						?>

						<?
						if($config->tickets_columna=='asunto'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/asunto/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Asunto</a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/asunto/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Asunto</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/asunto/asc/'.$offset.'/'.$this->router->fetch_method().'"> Asunto</a></th>';
						}
						?>

						<?
						if($config->tickets_columna=='tickets_estado_estado'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/tickets_estado_estado/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Estado</a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/tickets_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Estado</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/tickets_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"> Estado</a></th>';
						}
						?>

						<?
						if($config->tickets_columna=='contacto_apellidos'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/contacto_apellidos/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Contacto</a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/contacto_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Contacto</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/contacto_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"> Contacto</a></th>';
						}
						?>

						<?
						if($config->tickets_columna=='usuario_apellidos'){
							echo '<th class="info">';
							if($config->tickets_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/usuario_apellidos/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Usuario</a></th>';
							}else if($config->tickets_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'tickets/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Usuario</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'tickets/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"> Usuario</a></th>';
						}
						?>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->tickets_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
					<?php if(isset($listaTickets) && $listaTickets->result_count()>0) {foreach ($listaTickets as $fila) { ?>
					<tr>
						<td><?=$fila->id?></td>
						<td class="align-right"><span class="<?=$fila->prioridad->estilo_icono?>" title="<?=$fila->prioridad->etiqueta_icono?>"></span></td>
						<td><a href="<?=$this->config->base_url()?>tickets/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
						<td><span class="<?=$fila->tickets_estado->estilo?>"><?=$fila->tickets_estado->estado?></span></td>
						<td><? if($fila->usuario->count()>0){ ?><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila->contactos->id?>"><?=$fila->contacto->apellidos.', '.$fila->contacto->nombre?></a><? } ?></td>
						<td><? if($fila->usuario->count()>0){ ?><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=$fila->usuario->apellidos.', '.$fila->usuario->nombre?></a><? } ?></td>
					</tr>
					<?php } } else { ?>
					<tr>
						<td colspan="6" class="text-center"><em>No hay tickets de soporte</em></td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="6">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->