<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->campanyas_columna=='id'){
							echo '<th class="info">';
							if($config->campanyas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/id/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->campanyas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'campanyas/ordenar/id/asc/'.$offset.'/'.$this->router->fetch_method().'"> #</a></th>';
						}
						?>
						<?
						if($config->campanyas_columna=='nombre'){
							echo '<th class="info">';
							if($config->campanyas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/nombre/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Nombre de la Campaña</a></th>';
							}else if($config->campanyas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/nombre/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Nombre de la Campaña</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'campanyas/ordenar/nombre/asc/'.$offset.'/'.$this->router->fetch_method().'"> Nombre de la Campaña</a></th>';
						}
						?>
						<?
						if($config->campanyas_columna=='campanyas_tipo_tipo'){
							echo '<th class="info">';
							if($config->campanyas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_tipo_tipo/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Tipo</a></th>';
							}else if($config->campanyas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_tipo_tipo/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Tipo</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_tipo_tipo/asc/'.$offset.'/'.$this->router->fetch_method().'"> Tipo</a></th>';
						}
						?>
						<?
						if($config->campanyas_columna=='campanyas_estado_estado'){
							echo '<th class="info">';
							if($config->campanyas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_estado_estado/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Estado</a></th>';
							}else if($config->campanyas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Estado</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'campanyas/ordenar/campanyas_estado_estado/asc/'.$offset.'/'.$this->router->fetch_method().'"> Estado</a></th>';
						}
						?>
						<?
						if($config->campanyas_columna=='usuario_apellidos'){
							echo '<th class="info">';
							if($config->campanyas_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/usuario_apellidos/desc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Asignada a</a></th>';
							}else if($config->campanyas_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'campanyas/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Asignada a</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'campanyas/ordenar/usuario_apellidos/asc/'.$offset.'/'.$this->router->fetch_method().'"> Asignada a</a></th>';
						}
						?>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->campanyas_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
					<?php if(isset($listaCampanyas) && $listaCampanyas->result_count()>0) {foreach ($listaCampanyas as $fila) { ?>
						<tr>
							<td><?=$fila->id?></td>
							<td><a href="<?=$this->config->base_url()?>campanyas/ver/<?=$fila->id?>"><strong><?=$fila->nombre?></strong></a></td>
							<td><?=$fila->campanyas_tipo->tipo?></td>
							<td><span class="<?=$fila->campanyas_estado->estilo?>"><?=$fila->campanyas_estado->estado?></span></td>
							<td><? if($fila->usuario->count()>0){ ?><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=$fila->usuario->apellidos.', '.$fila->usuario->nombre?></a><? } ?></td>
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