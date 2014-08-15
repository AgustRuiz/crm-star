<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaPerfiles) && $listaPerfiles->result_count()>0) { foreach ($listaPerfiles as $fila) { ?>
					<tr>
						<td><?=$fila->id?></td>
						<td><a href="<?=$this->config->base_url()?>perfiles/ver/<?=$fila->id?>"><strong><?=$fila->nombre?></strong></a></td>
						<td><?
							$num = $fila->usuario->result_count();
							if($num==1){
								echo '1 usuario';
							}else{
								echo $num.' usuarios';
							}
							?></td>
						</tr>
						<?php } } else { ?>
						<tr><td colspan="3" class="text-center"><em>No hay perfiles de usuario</em></td></tr>
						<?php } ?>
					</tbody>
					<tfoot>	
						<tr><th colspan="3">
							<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
							<ul class="pagination pull-right" id="pagination">
								<?=$pag_links;?>
							</ul>
						</th></tr>
					</tfoot>
				</table>
  </div><!--/row-->