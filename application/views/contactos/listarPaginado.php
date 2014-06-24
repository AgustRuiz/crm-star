<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">	
			<table class="table table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>NIF</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php
					foreach ($listaContactos as $fila) {
						echo '<tr>';
						echo '<td>'.$fila['id'].'</td>';
						echo '<td>'.$fila['nombre'].'</td>';
						echo '<td>'.$fila['apellidos'].'</td>';
						echo '<td>'.$fila['nif'].'</td>';
						echo '</tr>';
					}
					?>
				</tbody>
				<tfoot>	
					<tr><th colspan="4">Nº de resultados: <?=$numContactos?></th></tr>
				</tfoot>
			</table>
			<ul class="nav" id="nav1">
			</ul>
			<ul id="pagination-digg">
				<?=$pag_links;?>
			</ul>
  </div><!--/row-->