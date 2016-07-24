<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container-fluid ">
		<div class="row">
			<?php //echo $this->Session->flash('auth'); ?>
						<div class="col-lg-12">
							<div class="col-lg-3"></div>

								<div class="col-lg-6 well">
								<div style="font-size:20px;" class="col-lg-12 text-center well success">Login form</div>
									<?php echo $this->Form->create('User');?>
										<?php echo $this->Form->input('username', array(
																	'class' => 'form-control'));?>
										<?php echo $this->Form->input('password', array(
																	'class' => 'form-control'));?>
										<?php echo $this->Form->submit('Login',array('class'=>'pull-right'))?>
								</div>
								<?php echo $this->Form->end();?>
							<div class="col-lg-3"></div>
						</div>
		</div>
	</div>
</body>
</html>
