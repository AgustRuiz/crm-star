<html>
	<head>
		<title>Test</title>
	</head>
	<body>
	<?=form_open($this->config->base_url()."index.php/test/target");?>
	<?php

	$username=array(
		'name'		=>	'inputNombre',
		'id'		=>	'Nombre',
		'value'		=>	'Algo' 
		);
	?>
	<ul>
		<li>
			<label>Username</label>
			<div><?php echo form_input($username);?></div>
		</li>
		<li>
			<?php echo validation_errors(); ?>
		</li>
		<li>
			<?php echo form_submit('name', 'value'); ?>
		</li>
	</ul>
	<?=form_close();?>
	</body>
</html>