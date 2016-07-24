<div class="container-fluid">
  <div class="row ">
    <div class="col-md-12">
      <nav class="navbar navbar-default success row">
        <div class="container-fluid">
          <div class="navbar-header">
			
          </div>
            <ul class="nav navbar-nav ">
              <li ><?php echo $this->Html->link( "រស្មីពេជ្រកណ្ដៀង",array('controller'=>'staffs','action'=>'index'),array('style'=>'color:white') );?></li >
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li ><?php echo $this->Html->link( "Setting",array('controller'=>'Users','action'=>'index'),array('style'=>'color:white') );?></li>
              <li><span class="glyphicon glyphicon-log-out" style="margin-top:15px;margin-right:10px;">
                  <?php echo $this->Html->link( "Logout",array('controller'=>'Users','action'=>'logout'),array('style'=>'color:white') );?></span></li>
            </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- <div class="search pull-right"> 
	<?php	//echo $this->Html->link( "Logout",   array('action'=>'logout'));?>
</div> --><!-- 
<h1>User​​​​​​​​​​​​​​​​</h1>
<div class="search pull-right"> 
   <?php //echo $this->Form->create('User', array('type' => 'get')); 
		//echo $this->Form->input('Search');
		//echo $this->Form->submit('SEARCH');
		//echo $this->Form->end();
    ?>
  </div> -->
<div class="container-fluid">
  <div class="row ">
     <div class="col-md-12">
        <h1 class="text-center">All list of User</h1>
    </div>
    <div class="col-md-12 ">      
        <div class="col-md-9 well">
             <table class="col-md-12"cellpadding="0" cellspacing="0">
<!-- <table class="table table-striped"> --> 
			<thead> 
				<tr> 
				<th class="table-header"><?php echo $this->Paginator->sort('id', 'No'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('firstname', 'First Name'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('lastname', 'Last Name'); ?></th>
                    <th class="table-header"><?php //echo $this->Paginator->sort('dob', 'dob'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('gender', 'Gender'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('position', 'Position'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('phone', 'Phone'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('salary', 'Salary'); ?></th>
                    <th class="table-header"><?php echo $this->Paginator->sort('image', 'Image'); ?></th>
                    <th class="table-header"><a href="javascript:void(0);"><?php echo 'Action' ?><a/></th>
					
				</tr>
			</thead>
				<?php 
					foreach($users as $user){
						?>
						<tr> 
							<td><?php echo $user['User']['id']?></td>
							<td><?php echo $user['User']['firstname']?></td>
							<td><?php echo $user['User']['lastname']?></td>
							<td><?php //echo $user['User']['dob']?></td>
							<td><?php echo $user['User']['gender']?></td>
							<td><?php echo $user['User']['position']?></td>
							<td><?php echo $user['User']['phone']?></td>
							<td><?php echo $user['User']['email']?></td>
							<td><?php echo $user['User']['salary']?></td>
							<td><?php echo $this->Html->image($user['User']['image'], array('alt' => 'story image','style'=>'width:25px;')); ?></td>

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
            <!-- <?php echo $this->element('pagination'); ?>   -->
            </div>
              <div class="col-md-3 well">
                 <span class="btn btn-success form-control"><?php echo $this->Html->link( "Add New User",array('controller'=>'users','action'=>'add'),array('escape' => false)); ?></span>
                             
                      <?php echo $this->Form->create('User', array('type' => 'get')); ?>
                      <?php echo $this->Form->input('Search',array('class'=>'form-control','placeholder'=>'Search','label'=>false,'style'=>'margin-top:20px;')); ?>
                      <?php echo $this->Form->submit('Search',array('class'=>'form-control','style'=>'width:100%;')); ?>
                      <?php echo $this->Form->end(); ?>
                      
              </div>  

    </div>
  </div>
</div>
	<?php echo $this->element('pagination'); ?>	

<footer class="container-fluid text-center success well">
    ក្រុមហ៊ុន រស្មីពេជ្រកណ្ដៀង
</footer>