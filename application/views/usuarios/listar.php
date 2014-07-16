<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Identificador</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaUsuarios)) { foreach ($listaUsuarios as $fila) { ?>
						<tr>
							<td><?=$fila['id']?></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila['id']?>"><strong><?=$fila['nombre']?> <?=$fila['apellidos']?></strong></a></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila['id']?>"><?=$fila['nick']?></a></td>
							<td><a href="mailto:<?=$fila['email']?>"><?=$fila['email']?></a></td>
						</tr>
					<?php } } else { ?>
						<tr><td colspan="4" class="text-center"><em>No hay usuarios</em></td></tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="4">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->