<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->contactos_columna=='id'){
							echo '<th class="active">';
							if($config->contactos_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/id/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->contactos_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/id/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'contactos/ordenar/id/asc/'.$offset.'"> #</a></th>';
						}
						?>
						
						<?
						if($config->contactos_columna=='apellidos'){
							echo '<th class="active">';
							if($config->contactos_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/apellidos/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Apellidos, Nombre</a></th>';
							}else if($config->contactos_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/apellidos/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Apellidos, Nombre</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'contactos/ordenar/apellidos/asc/'.$offset.'"> Apellidos, Nombre</a></th>';
						}
						?>
						
						<?
						if($config->contactos_columna=='contactos_estado_id'){
							echo '<th class="active">';
							if($config->contactos_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/contactos_estado_id/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Estado</a></th>';
							}else if($config->contactos_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'contactos/ordenar/contactos_estado_id/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Estado</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'contactos/ordenar/contactos_estado_id/asc/'.$offset.'"> Estado</a></th>';
						}
						?>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/contactos/listar/" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->contactos_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
					<?php if(isset($listaContactos) && $listaContactos->result_count()>0){ foreach ($listaContactos as $fila) { ?>
					<tr>
						<td><?=$fila->id?></td>
						<td><a href="<?=$this->config->base_url().'contactos/ver/'.$fila->id?>"><?=trim($fila->apellidos.', '.$fila->nombre)?></a></td>
						<td><span class="<?=$fila->contactos_estado->estilo;?>"><?=$fila->contactos_estado->estado;?></span></td>
					</tr>
					<?php } } else { ?>
					<tr><td colspan="4" class="text-center"><em>No hay contactos</em></td></tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="4">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numRows?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->