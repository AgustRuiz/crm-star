<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">

   <div class="col-xs-12 col-sm-9">
    <!-- <p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p> -->
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
    <div class="jumbotron">
     <h1>¡No Desarrollado!</h1>
     <p>Funcionalidad no desarrollada aún.</p>
   </div>
  </div><!--/row-->