<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Estado</th>
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
						<td><a href="<?=$this->config->base_url().'contactos/ver/'.$fila->id?>"><?=trim($fila->nombre.' '.$fila->apellidos)?></a></td>
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