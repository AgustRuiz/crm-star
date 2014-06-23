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
	<link href="<?php echo $this->config->base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo $this->config->base_url(); ?>css/crm-star.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo $this->config->base_url(); ?>css/offcanvas.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="shortcut icon" href="<?php echo $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
      <link rel="icon" href="<?php echo $this->config->base_url(); ?>favicon.ico" type="image/x-icon">
    </head>

    <body>
     <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
       <div class="navbar-header">
        <button type="button" class="navbar-toggle btn btn-default" data-toggle="offcanvas">
         <span class="sr-only">Toggle navigation</span>
         <span class="main-left"></span>
         <span class="sidebar-right"></span>
       </button>
       <button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse" data-target=".navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="<?php echo $this->config->base_url(); ?>" id="logo-crm-star">
       </a>
     </div>
     <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
       <!-- <li class="active"><a href="#">Inicio</a></li> -->
       <li <?php if($this->router->fetch_class()=="contactos") echo 'class="active"';?>><a href="contactos">Contactos</a></li>
       <li><a href="#">...</a></li>
     </ul>
   </div><!-- /.nav-collapse -->
 </div><!-- /.container -->
</div><!-- /.navbar -->