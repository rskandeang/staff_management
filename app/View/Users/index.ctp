<div class="search pull-right"> 
	<?php	echo $this->Html->link( "Logout",   array('action'=>'logout'));?>
</div>
<h1>User</h1>
<div class="search pull-right"> 
   <?php echo $this->Form->create('User', array('type' => 'get')); 
		echo $this->Form->input('Search');
		echo $this->Form->submit('SEARCH');
		echo $this->Form->end();
    ?>
  </div>

<table class="table table-striped"> 
			<thead> 
				<tr> 
				<th class="table-header"><?php echo $this->Paginator->sort('id', 'id'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('firstname', 'firstname'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('lastname', 'lastname'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('dob', 'dob'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('gender', 'gender'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('position', 'position'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('phone', 'phone'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('email', 'email'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('salary', 'salary'); ?></th>
                    <th class="table-header"><a href="javascript:void(0);"><?php echo 'action' ?><a/></th>
					
				</tr>
			</thead>
				<?php 
					foreach($users as $user){
						?>
						<tr> 
							<td><?php echo $user['User']['id']?></td>
							<td><?php echo $user['User']['firstname']?></td>
							<td><?php echo $user['User']['lastname']?></td>
							<td><?php echo $user['User']['dob']?></td>
							<td><?php echo $user['User']['gender']?></td>
							<td><?php echo $user['User']['position']?></td>
							<td><?php echo $user['User']['phone']?></td>
							<td><?php echo $user['User']['email']?></td>
							<td><?php echo $user['User']['salary']?></td>
							
							<td>
								<?php echo $this->Form->postLink('delete',['controller'=>'Users','action'=>'delete',$user['User']['id']],array('confirm'=>'Are you sure you want to delet?'));
							?>|
								<?php echo $this->Html->link('edit',['controller'=>'Users','action'=>'edit',$user['User']['id']]);?>
							</td>
							
				<?php
					}
				?>
			</tbody>
		</table>
	<?php echo $this->element('pagination'); ?>	