<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-9">
			<?php if(isset($error)){ ?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Oops!</strong> <?=$error?>
			</div>
			<?php } ?>
			<form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>index.php/contactos/editar2/<?php if(isset($contacto)) echo $contacto['id']; ?>" accept-charset="utf-8">
				<?php include('include_formulario.php'); ?>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success" name="submit" value="submit">Guardar contacto</button>
						<a href="<?=$this->config->base_url().'contactos/ver/'.$contacto['id']?>" rol="button" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						Los campos marcados con un asterisco (<span class="asterisk">*</span>) son obligatorios
					</div>
				</div>
			</form>
  </div><!--/row-->