<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->actividades_columna=='id'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/id/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"> #</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='prioridad_id'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/prioridad_id/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/prioridad_id/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/prioridad_id/asc/'.$offset.'/'.$this->router->fetch_method().'"> <span class="glyphicon glyphicon-warning-sign" title="Prioridad"></span></a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='asunto'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/asunto/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Asunto</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/asunto/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Asunto</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/asunto/asc/'.$offset.'/'.$this->router->fetch_method().'"> Asunto</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='campanya_nombre'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/campanya_nombre/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Campaña</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/campanya_nombre/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Campaña</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/campanya_nombre/asc/'.$offset.'/'.$this->router->fetch_method().'"> Campaña</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='inicio'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/inicio/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Inicio</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/inicio/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Inicio</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/inicio/asc/'.$offset.'/'.$this->router->fetch_method().'"> Inicio</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='actividades_tipo_tipo'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_tipo_tipo/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Tipo</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_tipo_tipo/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Tipo</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_tipo_tipo/asc/'.$offset.'/'.$this->router->fetch_method().'"> Tipo</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='actividades_estado_estado'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_estado_estado/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Estado</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Estado</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/actividades_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"> Estado</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='contacto_apellidos'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/contacto_apellidos/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Contacto</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/contacto_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Contacto</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/contacto_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"> Contacto</a></th>';
						}
						?>

						<?
						if($config->actividades_columna=='usuario_apellidos'){
							echo '<th class="info">';
							if($config->actividades_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/usuario_apellidos/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Usuario</a></th>';
							}else if($config->actividades_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'actividades/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Usuario</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'actividades/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"> Usuario</a></th>';
						}
						?>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->actividades_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
					<?php if(isset($listaActividades) && $listaActividades->result_count()>0) { foreach ($listaActividades as $fila) { ?>
					<tr <? if(time()-strtotime($fila->inicio)>0) echo 'class="pasado"'; else echo 'class="pendiente"';?>>
						<td><?=$fila->id?></td>
						<td class="align-right"><span class="<?=$fila->prioridad->estilo_icono?>" title="<?=$fila->prioridad->etiqueta_icono?>"></span></td>
						<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
						<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->campanya->id?>"><?=$fila->campanya->nombre?></a></td>
						<td><?=date("d-m-Y H:i", strtotime($fila->inicio));?></td>
						<td><span class="<?=$fila->actividades_tipo->estilo?>"><?=$fila->actividades_tipo->tipo?></span></td>
						<td><span class="<?=$fila->actividades_estado->estilo?>"><?=$fila->actividades_estado->estado?></span></td>
						<td><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila->contacto->id?>"><?=$fila->contacto->apellidos.', '.$fila->contacto->nombre?></a></td>
						<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=$fila->usuario->apellidos.', '.$fila->usuario->nombre?></a></td>
					</tr>
					<?php } } else { ?>
					<tr>
						<td colspan="9" class="text-center"><em>No hay actividades</em></td>
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