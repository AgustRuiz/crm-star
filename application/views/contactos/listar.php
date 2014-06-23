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
				<tbody>
					<?php
					while ($fila = mysql_fetch_array($rs_listaContactos)) {
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
					<tr><th colspan="4">Nº de resultados: <?= mysql_num_fields($rs_listaContactos) ?></th></tr>
				</tfoot>
			</table>
</table>
  </div><!--/row-->