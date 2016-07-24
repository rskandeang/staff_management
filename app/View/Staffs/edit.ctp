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
            <ul class="nav navbar-nav">
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
<div class="container-fluid">
  <div class="row well">
    <div class="col-sm-12">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 well">
          <?php echo $this->Form->create('Staff',array('enctype'=>'multipart/form-data')); ?>
            <fieldset>
                    <legend class="text-center"><?php echo __('Update Staff'); ?></legend>
              <?php //echo $this->Form->hidden('id', array('staff' => $this->data['Staff']['id']));?>
                <?php echo $this->Form->input('firstname',
                     array('required'=>true,
                     'class'=>'form-control',
                     'placeholder'=>'first name'
                     ));
                ?>               
                <?php echo $this->Form->input('lastname', 
                    array('required'=>true,
                      'class'=>'form-control',
                      'placeholder'=>'last name'
                      )); 
                ?>
                <?php echo $this->Form->input('dob', 
                    array('required'=>false,
                      'class'=>'form-control',
                      'label'=>'Day of birth'
                      ));
                ?>
                <?php echo $this->Form->input('gender', 
                    array('required'=>true,
                      'class'=>'form-control',
                      'placeholder'=>'input your gender'
                      )); 
                ?>
                <?php echo $this->Form->input('position', 
                    array('required'=>true,
                    'class'=>'form-control',
                    'placeholder'=>'position'
                    ));
                ?>
                <?php echo $this->Form->input('phone', 
                    array('required'=>true,
                      'class'=>'form-control',
                      'placeholder'=>'input your phone'
                      )); 
                ?>
                <?php echo $this->Form->input('email', 
                    array('required'=>true,
                      'class'=>'form-control',
                      'placeholder'=>'input your email'
                      )); 
                ?>
                <?php echo $this->Form->input('salary', 
                    array('class'=>'form-control',
                      'placeholder'=>'input your salary'
                      )); 
                ?>
                <?php echo $this->Form->input('image', 
                    array('type' => 'file',
                      'label'=>'Please upload image'
                      ));
                ?>
             </fieldset>
          <span class="pull-right"><?php echo $this->Form->end(__('Submit')); ?></span>
        </div>
      <div class="col-sm-3"></div>
    </div>
  </div>
</div>
<footer class="container-fluid text-center success well">
    ក្រុមហ៊ុន រស្មីពេជ្រកណ្ដៀង
</footer>



</body>
</html>