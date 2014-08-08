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
			<h2><?=$alerta->asunto?></h2>
			<fieldset>
				<div class="container-fluid ficha">
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Asunto</div>
						<div class="col-md-10 col-xs-9 dato"><strong><?=$alerta->asunto?></strong></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Fecha/Hora</div>
						<div class="col-md-10 col-xs-9 dato"><?php
							if($alerta->fechaHora!=0){
								echo date("d-m-Y H:i", strtotime($alerta->fechaHora));
							}else{
								echo "-";
							}
							?>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Descripción</div>
						<div class="col-md-10 col-xs-9 dato"><?=$alerta->descripcion?></div>
					</div>
					<div class="row clearfix">
						<div class="col-md-2 col-xs-3 text-right titulo">Enviar email</div>
						<div class="col-md-4 col-xs-9 dato">
							<? if($alerta->email == true) { ?>
							<a href="mailto:<?=$alerta->usuario->email?>"><?=$alerta->usuario->email?></a>
							<? } else { ?>
							<em>Desactivado</em>
							<? } ?>
						</div>
						<div class="col-md-2 col-xs-3 text-right titulo">Ventana emergente</div>
						<div class="col-md-4 col-xs-9 dato">
							<? if($alerta->emergente == true) { ?>
							<strong>Sí</strong>
							<? } else { ?>
							<strong>No</strong>
							<? } ?>
						</div>
					</div>
				</div>
			</fieldset>
  </div><!--/row-->