<html>
<head>
    <title>staff management</title>
    <style type="text/css">

    </style>
</head>
<body>
 	<div class="container-fluid">
	  <div class="row ">
	    <div class="col-md-12">
	      <nav class="navbar navbar-default success row">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            <ul class="nav navbar-nav ">
              <li ><?php echo $this->Html->link( "រស្មីពេជ្រកណ្ដៀង",array('controller'=>'staffs','action'=>'index'),array('style'=>'color:white') );?></li >
            </ul>
	          </div>
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
<div class="container-fluid">
  <div class="row ">
     <div class="col-md-12">
        <h1 class="text-center">Detail for each staff</h1>
    </div>
    <div class="col-md-12 ">      
    <div class="col-md-1 "></div>      
        <div class="col-md-10 well">
             <table class="col-md-12"cellpadding="0" cellspacing="0">
                <thead class="vertical">
                <tr>
                  <th >ID</th>
                  <th>Full Name</th>
                  <th>Date of birth</th>
                  <th>Gender</th>
                  <th>Position</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Created</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody> 
              <tr>  
        
                <?php echo $this->Session->flash(); ?>        
                <?php $count=0; ?>
              
                <?php $count ++;?>
                <?php if($count % 2): echo '<tr>'; else: echo '</tr class="zebra">' ?>
                <?php endif; ?>
                  <td><?php echo $staffs['Staff']['id']?></td>
                  <td><?php echo $staffs['Staff']['firstname'].' '.$staffs['Staff']['lastname'];?></td>
                  <td><?php echo $staffs['Staff']['dob']; ?></td>
                  <td><?php echo $staffs['Staff']['gender']; ?></td>
                  <td><?php echo $staffs['Staff']['position']; ?></td>
                  <td><?php echo $staffs['Staff']['phone']; ?></td>
                  <td><?php echo $staffs['Staff']['email']; ?></td>
                  <td><?php echo $staffs['Staff']['created']; ?></td>
                  <td><?php echo $staffs['Staff']['image'];?></td>

                </tr>
                <?php unset($staff); ?>
              </tbody>
            </table>
            
            </div>
    <div class="col-md-1 "></div>      
    </div>
       <div class="col-md-12">
        <h1 class="text-center">This month</h1>
    </div>
    <div class="col-md-12 ">      
    <div class="col-md-1 "></div>      
        <div class="col-md-8 well">
             <table class="col-md-12"cellpadding="0" cellspacing="0">
                <thead class="vertical">
                <tr>
                  <th>ID</th>
                  <th>Take Leave</th>
                  <th>Debt Salary</th>
                </tr>
              </thead>
              <tbody> 
              <tr>  
                <?php echo $this->Session->flash(); ?>        
                <?php $count=0; ?>
                <?php foreach($leave as $leaves): ?>    
              
                <?php $count ++;?>
                <?php if($count % 2): echo '<tr>'; else: echo '</tr class="zebra">' ?>
                <?php endif; ?>
                  <td><?php echo $leaves['Leave']['leave_id'];?></td>
                  <td><?php echo $leaves['Leave']['day_take_leave'];?></td>
                     <?php foreach($Salary as $Salaries): ?>    
                    <td><?php echo $Salaries['Salary']['debt_salary']; ?></td>
                <?php endforeach; ?>
                </tr> 
                <?php endforeach; ?>
        
                 
              </tbody>
            </table>
            
            </div>
              <?php echo $this->Form->create('Leave'); ?>
            <div class="col-md-2 well">
                 <span class="btn btn-success form-control"><?php echo $this->Form->submit( "Add Leave",array('controller'=>'leaves','action'=>'add', $staffs['Staff']['id']),array('escape' => false)); ?></span> 
            </div>  
            <?php echo $this->Form->end(); ?>
    <div class="col-md-1 "></div> 

              

    </div>
  </div>
</div>
<footer class="container-fluid text-center success well">
    ក្រុមហ៊ុន រស្មីពេជ្រកណ្ដៀង
</footer>



</body>
</html>