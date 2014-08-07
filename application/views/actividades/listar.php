<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Asunto</th>
						<th>Inicio</th>
						<th>Tipo</th>
						<!-- <th>Prioridad</th> -->
						<th colspan="2">Prioridad/Estado</th>
						<th>Contacto</th>
						<th>Usuario</th>
					</tr>
				</thead>
				<tbody id="contenedor">
					<?php if(isset($listaActividades) && $listaActividades->result_count()>0) {foreach ($listaActividades as $fila) { ?>
						<tr>
							<td><?=$fila->id?></td>
							<td><a href="<?=$this->config->base_url()?>actividades/ver/<?=$fila->id?>"><strong><?=$fila->asunto?></strong></a></td>
							<td><?=date("d-m-Y H:i", strtotime($fila->inicio));?></td>
							<td><span class="<?=$fila->actividades_tipo->estilo?>"><?=$fila->actividades_tipo->tipo?></span></td>
							<!-- <td><span class="<?=$fila->actividades_prioridad->estilo?>"><?=$fila->actividades_prioridad->prioridad?></span></td> -->
							<td><span class="<?=$fila->actividades_prioridad->estilo_icono?>" title="<?=$fila->actividades_prioridad->etiqueta_icono?>"></span></td>
							<td><span class="<?=$fila->actividades_estado->estilo?>"><?=$fila->actividades_estado->estado?></span></td>
							<td><a href="<?=$this->config->base_url()?>contactos/ver/<?=$fila->contacto->id?>"><?=trim($fila->contacto->nombre.' '.$fila->contacto->apellidos)?></a></td>
							<td><a href="<?=$this->config->base_url()?>usuarios/ver/<?=$fila->usuario->id?>"><?=trim($fila->usuario->nombre.' '.$fila->usuario->apellidos)?></a></td>
						</tr>
					<?php } } else { ?>
						<tr>
							<td colspan="8" class="text-center"><em>No hay actividades</em></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>	
					<tr><th colspan="8">
						<?=$initialRow?>-<?=$finalRow?> de <?=$numContacts?>	
						<ul class="pagination pull-right" id="pagination">
							<?=$pag_links;?>
						</ul>
					</th></tr>
				</tfoot>
			</table>
  </div><!--/row-->