<div class="search pull-right"> 
	<?php	echo $this->Html->link( "Logout",   array('action'=>'logout'));?>
</div>
<h1>User​​​​​​​​​​​​​​​​</h1>
<div class="search pull-right"> 
   <?php echo $this->Form->create('User', array('type' => 'get')); 
		echo $this->Form->input('Search');
		echo $this->Form->submit('SEARCH');
		echo $this->Form->end();
    ?>
  </div>


				<?php 
					foreach($users as $user){
						?>
						<?php echo $user['User']['id']?>
							<?php echo $user['User']['firstname']?>
							<?php echo $user['User']['lastname']?>
							<?php //echo $user['User']['dob']?></
							<?php echo $user['User']['gender']?>
							<?php echo $user['User']['position']?>
							<?php echo $user['User']['phone']?>
							<?php echo $user['User']['email']?>
							<?php echo $user['User']['salary']?>
							<?php echo $this->Html->image($user['User']['image'], array('alt' => 'story image','style'=>'width:25px;')); ?>

							
								
				<?php
					}

				?>
			
	<?php //echo $this->element('pagination'); ?>	f