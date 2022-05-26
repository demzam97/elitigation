<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;

}
::placeholder {
 font-size: 28px;
}

</style>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     
</head> 
<body>
<img src="<?php echo base_url('images/elitigationlogo.jpg')?>" class="img-fluid" alt="Responsive image" >
<div class="bs-example">
      <nav class="navbar" style="float: right;">
      <ul class="nav nav-pills mb-2">
      <li class="nav-item dropdown ml-auto">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><p style="font-size: 30px;color: black;">གདམ་ཁ་རྐྱབ་ནི།</p></a>
            <div class="dropdown-menu dropdown-menu-right">&nbsp;&nbsp;&nbsp;&nbsp;
              <ion-icon src="<?php echo base_url('images/bhutan.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/changePasswordelat_dzo');?>" class="text-center"><font color="black" size="6px;">རྫོང་ཁ།&nbsp;&nbsp;</font></a>
              <ion-icon src="<?php echo base_url('images/united-states.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/changePasswordelat');?>" class="text-center">English&nbsp;&nbsp;</a>
              <div class="dropdown-divider"></div>

              <h4><a href="index.php/welcome/changePasswordelat_dzo" class="nav-item nav-link"><font color="black" size="6px;">གསང་ཚིག་སོར།</font></a>
              <a href="index.php/welcome/log_out" class="dropdown-item"><font color="black" size="6px;">ཕྱིར་ཐོན།</font></a>
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
    <div class="col-sm-5" style="background-color:white;"><div class="card-header" style="background-color: white;">
        <h3 class="page-title"><p style="font-size: 38px;color: black;">གསང་ཚིག་སོར་ནི།</p></h3>
      </div>
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span>
      </div>
      <div class="card-body"> 
      <form action="<?php echo site_url();?>/welcome/passwordChangeElat_dzo" method="post">
        <input type="hidden" class="form-control form-control-sm" id="pwdchange_status" name="pwdchange_status" value="1">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" ><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="old_pass" class="form-control form-control-sm"  placeholder="གསང་ཚིག་རྙིངམ།">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="new_pass1" class="form-control form-control-sm" placeholder="གསང་ཚིག་གསརཔ།">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="new_pass2" class="form-control form-control-sm" placeholder="གསང་ཚིག་གཏན་འཁེལ།">
          </div>
          <div class="form-group">
            <button type="submit" value="update" class="btn btn-primary btn-flat" onclick="return confirm('Are you sure to submit');"><p style="font-size: 38px;color: black;">ཕུལ།</p></button>
          </div>
      </form>
      </div></div>
    <div class="col-sm-4"></div>
  </div>
</div>













