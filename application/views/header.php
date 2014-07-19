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
	<link href="<?=$this->config->base_url()?>css/offcanvas.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?=$this->config->base_url()?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=$this->config->base_url()?>favicon.ico" type="image/x-icon">
</head>

<body>
	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle btn btn-default" data-toggle="offcanvas">
					<span class="sr-only">Menú superior</span>
					<span class="main-left"></span>
					<span class="sidebar-right"></span>
				</button>
				<button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Menú lateral</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=$this->config->base_url()?>" id="logo-crm-star">
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<!-- <li class="active"><a href="#">Inicio</a></li> -->
					<li <?php if($this->router->fetch_class()=="contactos") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>contactos">Contactos</a></li>
					<li <?php if($this->router->fetch_class()=="campanyas") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>campanyas">Campañas</a></li>
					<li <?php if($this->router->fetch_class()=="actividades") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>actividades">Actividades</a></li>
					<li <?php if($this->router->fetch_class()=="usuarios") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>usuarios">Usuarios</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li rel="popover-alertas" class="popover-dismiss"><a href="#" class="alerta"><span class="glyphicon glyphicon-bell"></span><span class="badge blink_me">21</span></a></li>










					<li class="dropdown">
						<a href="#" class="dropdown-toggle usuario" data-toggle="dropdown"><img src="<?=$this->config->base_url().'img/user.jpg'?>" alt="Usuario" class="img-usuario img-circle"/> Hola <?=$this->session->userdata('nombre')?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Cambiar contraseña</a></li>
							<li><a href="#">Configuración</a></li>
							<li class="divider"></li>
							<li><a href="<?=$this->config->base_url()?>index.php/login/logout">Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>




			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
</div><!-- /.navbar -->