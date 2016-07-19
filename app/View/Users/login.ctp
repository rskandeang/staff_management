<?php //echo $this->Session->flash('auth'); ?>
	<div class="col-lg-12">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<?php echo $this->Form->create('User');?>
					<?php echo $this->Form->input('username', array(
												'class' => 'form-control'));?>
					<?php echo $this->Form->input('password', array(
												'class' => 'form-control'));?>
					<?php echo $this->Form->submit('Login')?>
			</div>
			<?php echo $this->Form->end();?>
		<div class="col-lg-3"></div>
	</div>
