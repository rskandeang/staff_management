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
      
          </div>
            <ul class="nav navbar-nav ">
              <li ><?php echo $this->Html->link( "រស្មីពេជ្រកណ្ដៀង",array('controller'=>'staffs','action'=>'index'),array('style'=>'color:white') );?></li >
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li ><?php echo $this->Html->link( "Setting",array('controller'=>'Users','action'=>'index'),array('style'=>'color:white')  );?></li>
              <!-- <li class="dropdown"><a data-toggle="dropdown" href="#" >Setting <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li >View users</li>                    
                      <li >View staff</li>                    
                  </ul>
              </li> -->
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
        <h1 class="text-center">All list of Staff</h1>
    </div>
    <div class="col-md-12 ">      
        <div class="col-md-9 well">
             <table class="col-md-12"cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                  <th>ID</th>
                  <th> Full Name <!-- <?php echo $this->Paginator->sort('firstname','First Name'); ?> --></th>
                  <th> Gender <!-- <?php echo $this->Paginator->sort('gender','Gender'); ?> --></th>
                  <th>Position <!-- <?php echo $this->Paginator->sort('position','Position'); ?> --></th>
                  <th>Phone <!-- <?php echo $this->Paginator->sort('phone','Phone'); ?> --></th>
                  <th>Absent</th>
                  <th>Salary <!-- <?php echo $this->Paginator->sort('salary','Salary'); ?> --></th>
                  <th>Image <!-- <?php echo $this->Paginator->sort('image','Image'); ?> --></th>
                  <th>Action <!-- <?php echo $this->Paginator->sort('Action','Action'); ?> --></th>
                </tr>
              </thead>
              <tbody> 
              <tr>  
                <?php echo $this->Session->flash(); ?>        
                <?php $count=0; ?>
                <?php foreach($staffs as $staff): ?>  


                <?php $count ++;?>
                <?php if($count % 2): echo '<tr>'; else: echo '</tr class="zebra">' ?>
                <?php endif; ?>
                  <td><?php echo $staff['id'];?></td>
                  <td><?php echo $staff['firstname'].' '.$staff['lastname'];?></td>
                  <td><?php echo $staff['gender']; ?></td>
                  <td><?php echo $staff['position']; ?></td>
                  <td><?php echo $staff['phone']; ?></td>
                  <td><?php echo $staff['time']; ?></td>

                  <td><?php echo $staff['default_salary']; ?></td>
                  <td><?php echo $this->Html->image($staff['image'], array('alt' => 'story image','style'=>'width:25px;')); ?></td>

              <td>
                  <td>
                      <?php echo $this->Html->link('edit',['controller'=>'staffs','action'=>'edit',$staff['id']]);?>

                    | <?php echo $this->Form->postLink('delete',['controller'=>'staffs','action'=>'delete',$staff['id']],array('confirm'=>'Are you sure you want to delet?'));
              ?>|
                     <?php echo $this->Html->link('view',array('controller'=>'staffs','action'=>'view',$staff['id']),array('escape'=>false)); ?>   </td>

                </tr> 
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- <?php echo $this->element('pagination'); ?>   -->
            </div>
              <div class="col-md-3 well">
                 <span class="btn btn-success form-control"><?php echo $this->Html->link( "Add New Staff",array('controller'=>'staffs','action'=>'add'),array('escape' => false)); ?></span>
                             
                      <?php echo $this->Form->create('Staff', array('type' => 'get')); ?>
                      <?php echo $this->Form->input('Search',array('class'=>'form-control','placeholder'=>'Search','label'=>false,'style'=>'margin-top:20px;')); ?>
                      <?php echo $this->Form->submit('Search',array('class'=>'form-control','style'=>'width:100%;')); ?>
                      <?php echo $this->Form->end(); ?>
                      
              </div>  
                <?php unset($staff); ?>

    </div>
  </div>
</div>
<footer class="container-fluid text-center success well">
    ក្រុមហ៊ុន រស្មីពេជ្រកណ្ដៀង
</footer>


</body>
</html>