<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content=""> -->
	<!-- <meta name="author" content="Agustín Ruiz Linares"> -->
	<!-- <link rel="shortcut icon" href="../../assets/ico/favicon.ico"> -->

	<title>crm-star</title>

	<!-- Bootstrap core CSS -->
	<link href="<?=$this->config->base_url()?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?=$this->config->base_url()?>css/crm-star.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?=$this->config->base_url()?>css/signin.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?=$this->config->base_url()?>favicon.svg" type="image/x-icon">
<link rel="icon" href="<?=$this->config->base_url()?>favicon.svg" type="image/x-icon">
</head>
<body>
	<div class="container">
		<?php if(isset($error)){ ?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Oops!</strong> <?=$error?>
		</div>
		<?php } ?>
		<form class="form-signin" role="form" method="post" accept-charset="utf-8" href="<?=$this->config->base_url()?>index.php/login">
			<h4 class="form-signin-heading">
				<p>Bienvenid@ a</p>
				<img class="img-responsive" alt="crm-star" src="<?=$this->config->base_url()?>img/logo/logo.svg"/>
				<p class="text-center">Client Relationship Management Star</p>
			</h4>
			<input type="text" name="nick" value="<?php if(isset($nick)) echo $nick; ?>" class="form-control" placeholder="Usuario" required autofocus>
			<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
			<!-- <div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Recordarme
				</label>
			</div> -->
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="envio">Entrar</button>
		</form>
	</div> <!-- /container -->
</body>
</html>