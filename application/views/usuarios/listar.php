<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?
						if($config->usuarios_columna=='id'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/id/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> #</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/id/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> #</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/id/asc/'.$offset.'"> #</a></th>';
						}
						?>
						<?
						if($config->usuarios_columna=='apellidos'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/apellidos/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Apellidos, Nombre</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/apellidos/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Apellidos, Nombre</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/apellidos/asc/'.$offset.'"> Apellidos, Nombre</a></th>';
						}
						?>
						<?
						if($config->usuarios_columna=='nick'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/nick/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Nick</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/nick/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Nick</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/nick/asc/'.$offset.'"> Nick</a></th>';
						}
						?>
						<?
						if($config->usuarios_columna=='email'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/email/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Email</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/email/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Email</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/email/asc/'.$offset.'"> Email</a></th>';
						}
						?>
						<?
						if($config->usuarios_columna=='perfil_nombre'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/perfil_nombre/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Perfil</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/perfil_nombre/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Perfil</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/perfil_nombre/asc/'.$offset.'"> Perfil</a></th>';
						}
						?>
						<?
						if($config->usuarios_columna=='usuarios_estado_id'){
							echo '<th class="info">';
							if($config->usuarios_orden=='asc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/usuarios_estado_id/desc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes"></span> Estado</a></th>';
							}else if($config->usuarios_orden=='desc'){
								echo '<a href="'.$this->config->base_url().'usuarios/ordenar/usuarios_estado_id/asc/'.$offset.'"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span> Estado</a></th>';
							}
						}else{
							echo '<th>';
							echo '<a href="'.$this->config->base_url().'usuarios/ordenar/usuarios_estado_id/asc/'.$offset.'"> Estado</a></th>';
						}
						?>
					</tr>
				</thead>
				<tbody id="contenedor">
					<!-- Filtrar -->
					<div class="input-group">
						<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/usuarios/listar/" accept-charset="utf-8">
							<input type="text" class="form-control" name="filtro" id="cadenaBusqueda" placeholder="Inserta aquí la cadena a buscar..." value="<?=$config->usuarios_filtro?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</form>
							<button class="btn btn-default" onclick="$('#cadenaBusqueda').val(''); exit;"><span class="glyphicon glyphicon-remove"></span></button>
						</span>
					</div>
					<!-- Fin de Filtrar -->
					<?php if(isset($listaUsuarios) && $listaUsuarios->result_count()>0) { foreach ($listaUsuarios as $fila) { ?>
						<tr>
							<td><?=$fila->id?></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->id?>"><strong><?=$fila->apellidos?>, <?=$fila->nombre?></strong></a></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->id?>"><?=$fila->nick?></a></td>
							<td><a href="mailto:<?=$fila->email?>"><?=$fila->email?></a></td>
							<td><a href="<?=$this->config->base_url()?>perfiles/ver/<?=$fila->perfil->id?>"><?=$fila->perfil->nombre?></a></td>
							<td><span class="<?=$fila->usuarios_estado->estilo?>"><?=$fila->usuarios_estado->estado?></span></td>
						</tr>
					<?php } } else { ?>
						<tr><td colspan="6" class="text-center"><em>No hay usuarios</em></td></tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="6">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numRows?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->