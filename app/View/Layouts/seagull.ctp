<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Seagull
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('seagull.generic');
		echo $this->Html->script('jquery');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Session->flash('auth');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
