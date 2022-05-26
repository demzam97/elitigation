<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo base_url() ?>" />
    <meta charset="utf-8">
    <title>Case Management System</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/elatdashboard.css" type="text/css" />
    <link rel="stylesheet" href="css/normalize.css" type="text/css" />
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
      crossorigin="anonymous"> 
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     
</head> 
<body>
<img src="<?php echo base_url('images/elitigation.jpg')?>" class="img-fluid" alt="Responsive image" >
<div class="bs-example">
      <nav class="navbar" style="float: right;">
      <ul class="nav nav-pills mb-2">
      <li class="nav-item dropdown ml-auto">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="badge badge-light">options&nbsp;<i class="fas fa-cog"></i></span>&nbsp;</a>
            <div class="dropdown-menu dropdown-menu-right">&nbsp;&nbsp;&nbsp;&nbsp;
              <ion-icon src="<?php echo base_url('images/bhutan.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/changePasswordelat_dzo');?>" class="text-center">རྫོང་ཁ།&nbsp;&nbsp;</a>
              <ion-icon src="<?php echo base_url('images/united-states.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/changePasswordelat');?>" class="text-center">English&nbsp;&nbsp;</a>
              <div class="dropdown-divider"></div>

              <a href="index.php/welcome/changePasswordelat" class="nav-item nav-link">change password</a>
              <a href="index.php/welcome/log_out" class="dropdown-item">logout</a>
            </div>
      </li>
      </ul>
      </nav>
      </div>

<br><br>
<div class="container-fluid">
<br><br>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:white;"><div class="card-header" style="background-color: white;">
        <h5 class="page-title">Change Password</h5>
      </div>
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span>
      </div>
      <div class="card-body"> 
      <form method="post" action="<?php echo site_url();?>/welcome/passwordChangeElat">
      <input type="hidden" class="form-control form-control-sm" id="pwdchange_status" name="pwdchange_status" value="1">
        <div class="col-md-8">
       <div class="form-group" id="prime_cat">Email
            <input type="email" value="<?php echo $email; ?>" name="email" class="form-control input-group-lg" placeholder="Email">  
       </div>
	   <?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
	   
       <div class="form-group" id="prime_cat"> New Password
            <input type="text" value="" name="new_password" class="form-control input-group-lg" placeholder="New Password">  
       </div>
	   <?php if(form_error('new_password')){echo "<span style='color:red'>".form_error('new_password')."</span>";} ?>
	   
       <div class="form-group" id="prime_cat">Confirm Password
            <input type="password" value="" name="confirm_password" class="form-control input-group-lg" placeholder="Confirm Password">  
       </div>
	   <?php if(form_error('confirm_password')){echo "<span style='color:red'>".form_error('confirm_password')."</span>";} ?>
       <div class="form-group col-md-12">
            <input  class="btn btn-primary" type="submit" value="Submit" onclick="return confirm('Are you sure to submit');">
        </div>
        </div>
       </form>
      </div></div>
    <div class="col-sm-4"></div>
  </div>
</div>














