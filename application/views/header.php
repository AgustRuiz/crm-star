<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content=""> -->
	<!-- <meta name="author" content="Agustín Ruiz Linares"> -->
	<!-- <link rel="shortcut icon" href="../../assets/ico/favicon.ico"> -->

	<title><?=$this->config->item('site_name')?></title>

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
				<button rel="popover-alertas" id="popover-alertas-toggle" class="popover-alertas navbar-toggle hidden"><a href="#" class="alerta"><span class="glyphicon glyphicon-bell"></span><span class="badge blink_me" id="badge-alertas-toggle">????</span></a></button>
				<a class="navbar-brand" href="<?=$this->config->base_url()?>" id="logo-crm-star"></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<!-- <li class="active"><a href="#">Inicio</a></li> -->
					<li <?php if($this->router->fetch_class()=="contactos") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>contactos">Contactos</a></li>
					<li <?php if($this->router->fetch_class()=="campanyas") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>campanyas">Campañas</a></li>
					<li <?php if($this->router->fetch_class()=="actividades") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>actividades">Actividades</a></li>
					<li <?php if($this->router->fetch_class()=="alertas") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>alertas">Alertas</a></li>
					<li <?php if($this->router->fetch_class()=="usuarios" || $this->router->fetch_class()=="perfiles") echo 'class="active"';?>><a href="<?=$this->config->base_url()?>usuarios">Usuarios</a></li>
					<!-- <li><a href="#" onclick="mostrarModalAlertaEmergente('fechaHora', 'asunto', 'descripcion');"><span class="glyphicon glyphicon-bell"></span></a></li> -->
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li rel="popover-alertas" id="popover-alertas-default" class="popover-dismiss hidden"><a href="#" class="alerta"><span class="glyphicon glyphicon-bell"></span><span class="badge blink_me badge-num-alertas" id="badge-alertas-default">??</span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle usuario" data-toggle="dropdown"><img src="<?=$this->config->base_url().'img/user.jpg'?>" alt="Usuario" class="img-usuario img-circle"/> Hola <?=$this->session->userdata('nombre')?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?=$this->config->base_url()?>perfiles/miPerfil">Tu perfil: <strong><?=$this->session->userdata('perfil')->nombre?></strong></a></li>
							<li class="divider"></li>
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


	<!-- #modal-alerta-emergente -->
	<div class="modal fade" id="modal-alerta-emergente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="campana"></div>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" onclick="campanillaOff();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4>Alerta programada: <span class="label label-primary" id="alerta-emergente-fechaHora">--------</span></h4>
				</div>
				<div class="modal-body">
					<h3 id="alerta-emergente-asunto">------------</h3>
					<p id="alerta-emergente-descripcion">-------------</p>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<button type="button" class="btn btn-success pull-left" id="alerta-emergente-visualizar" data-dismiss="modal" onclick="campanillaOff();">Entendido</button>
						<a href="#" class="btn btn-default pull-left" id="alerta-emergente-enlace">Ir a alerta</a>
						<div class="pull-right">
							<input type="hidden" name="" id="alerta-emergente-id"/>
							<select id="alerta-emergente-posponer" class="form-control" onchange="posponerAlerta();">
								<option value="0">Posponer alerta...</option>
								<option value="5">Dentro de 5 minutos</option>
								<option value="15">Dentro de 15 minutos</option>
								<option value="30">Dentro de 30 minutos</option>
								<option value="60">Dentro de 1 hora</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<audio id="reproductor-campanilla" preload loop>
				<source src="<?=$this->config->base_url()?>audio/campanilla-5seg.mp3" type="audio/mp3" />
			</audio>
		</div>
		<iframe src="" id="iframe-alerta-emergente" class="hidden"></iframe>
	</div>
	<!-- Fin de #modal-alerta-emergente -->