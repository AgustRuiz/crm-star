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
					<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/contactos/listar/" accept-charset="utf-8">
						<!-- Filtrar -->
						<div class="input-group">
							<input type="text" class="form-control" name="q" placeholder="Inserta aquí la cadena a buscar...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
								<button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-remove"></span></button>
							</span>
						</div>
						<!-- /Filtrar -->
					</form>
					<?php if(isset($listaContactos)){ foreach ($listaContactos as $fila) { ?>
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