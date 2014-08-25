<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($success)){ ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Éxito:</strong> <?=$success?>
			</div>
			<?php } ?>
			<?php if(isset($error)){ ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Oops!</strong> <?=$error?>
			</div>
			<?php } ?>
			<h2><?=$perfil->nombre;?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-3 col-xs-3 text-right titulo">Nombre del perfil</div>
						<div class="col-md-9 col-xs-9 dato"><strong><?=$perfil->nombre?></strong></div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Política</legend>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos contactos</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->contactos_listar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->contactos_crear==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->contactos_editar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->contactos_eliminar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos campañas</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar todas las campañas</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->campanyas_listar_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar campañas propias</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->campanyas_listar_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->campanyas_crear==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->campanyas_editar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->campanyas_eliminar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos actividades</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar todas las actividades</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_listar_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_crear_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_editar_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_eliminar_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar actividades propias</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_listar_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear propias</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_crear_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar propias</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_editar_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar propias</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->actividades_eliminar_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos para soporte</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar todos los tickets</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->tickets_listar_todas==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar tickets propios</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->tickets_listar_propias==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->tickets_crear==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->tickets_editar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->tickets_eliminar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos usuarios</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->usuarios_listar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Crear</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->usuarios_crear==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Editar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->usuarios_editar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Eliminar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->usuarios_eliminar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-12 col-xs-12 titulo"><strong>Permisos perfiles de usuario</strong></div>
					</div>
				</div>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-6 col-xs-6 text-right titulo">Listar</div>
						<div class="col-md-6 col-xs-6 dato"><?if($perfil->perfiles_listar==1){?>
							<span class="text-success"><span class="glyphicon glyphicon-check" title="Permitido"></span> SÍ</span>
							<?}else{?>
							<span class="text-danger"><span class="glyphicon glyphicon-unchecked" title="Permitido"></span> NO</span>
							<?}?>
						</div>
					</div>
				</div>
			</fieldset>
  </div><!--/row-->