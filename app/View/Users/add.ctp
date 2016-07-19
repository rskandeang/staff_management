
<div class="col-lg-12">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<h1>Add User</h1>
					<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data'));?>
						<fieldset>
							<?php echo $this->Form->input('firstname', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('lastname', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('username', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('password', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('dob', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('gender', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('position', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('phone', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('email', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('salary', array(
								'class' => 'form-control'));?>
							<?php echo $this->Form->input('image', array(
								'type' => 'file'));?>
							<?php echo $this->Form->submit('Submit')?>	
						<fieldset>
					<?php echo $this->Form->end();?>
			</div>
		<div class="col-lg-3"></div>
	</div>
