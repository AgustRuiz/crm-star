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
				<strong>Oops:</strong> <?=$error?>
			</div>
			<a href="<?=$this->config->base_url().'alertas/ver/'.$alerta['id'];?>" rol="button" class="btn btn-default">Volver a la ficha de la alerta</a>
			<?php } ?>
  </div><!--/row-->