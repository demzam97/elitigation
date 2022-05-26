<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  

       
</head> 
<body>
<img src="<?php echo base_url('images/elitigation_new.jpg')?>" class="img-fluid" alt="Responsive image" >
<div class="bs-example">

<?php $utype = $this->session->userdata('user_type');
if($utype != '14') { ?>
<nav class="navbar" style="float: left;"><h2><a href="<?php echo site_url('welcome/dashboard_dzo'); ?>">གདོང་ཤོག</a>
&nbsp;སྐུ་གཟུགས་བཟང་པོ&nbsp;</h2><p style="font-size: 20px;color: black;">
      <i class="fas fa-user-circle"></i> &nbsp;<?php $uid = $this->session->userdata('user_id');
           echo $eid = $this->user->get_user_email($uid); 
      ?></font>
      &nbsp;|&nbsp;<i class="fas fa-list"></i>&nbsp;
      <h2><?php $ut = $this->session->userdata('user_type');?>
      <?php 
                   if( $ut='12' )
                   echo 'སྤྱིར་བཏང་མི་དམངས།';
                   elseif( $ut='13' )
                   echo ' ཁྲིམས་རྩོདཔ།';
                   elseif( $ut='14' )
                   echo 'ཉེས་འཛུགས་ཅན།/ལན་རྐྱབ་མི།';
                   elseif( $ut='15' )
                   echo 'ལས་ཚོགས།';
      ?>
</h2>
</nav>

<?php } else { ?>
<nav class="navbar" style="float: left;"><h2><a href="<?php echo site_url('welcome/dashboard_defendant'); ?>">གདོང་ཤོག</a>
&nbsp;སྐུ་གཟུགས་བཟང་པོ&nbsp;</h2><p style="font-size: 20px;color: black;">
      <i class="fas fa-user-circle"></i> &nbsp;<?php $uid = $this->session->userdata('user_id');
           echo $eid = $this->user->get_user_email($uid); 
      ?></font>
      &nbsp;|&nbsp;<i class="fas fa-list"></i>&nbsp;
      <h2><?php $ut = $this->session->userdata('user_type');?>
      <?php 
                   if( $ut='12' )
                   echo 'སྤྱིར་བཏང་མི་དམངས།';
                   elseif( $ut='13' )
                   echo ' ཁྲིམས་རྩོདཔ།';
                   elseif( $ut='14' )
                   echo 'ཉེས་འཛུགས་ཅན།/ལན་རྐྱབ་མི།';
                   elseif( $ut='15' )
                   echo 'ལས་ཚོགས།';
      ?>
</h2></nav> 
<?php } ?>

      <nav class="navbar" style="float: right;">
      <ul class="nav nav-pills mb-2">
      <li class="nav-item dropdown ml-auto">

          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><p style="font-size: 30px;color: black;">གདམ་ཁ་རྐྱབ་ནི།</p></a>

            <div class="dropdown-menu dropdown-menu-right">&nbsp;&nbsp;&nbsp;&nbsp;
              <ion-icon src="<?php echo base_url('images/bhutan.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/dashboard_dzo');?>" class="text-center"><font color="black" size="6px;">རྫོང་ཁ།&nbsp;&nbsp;</font></a>
              <ion-icon src="<?php echo base_url('images/united-states.svg')?>" style="height:10px;width:10px;"></ion-icon>
              <a href="<?php echo site_url('welcome/dashboard');?>" class="text-center">English&nbsp;&nbsp;</a>
              <div class="dropdown-divider"></div>

              <a href="index.php/welcome/changePasswordelat_dzo" class="nav-item nav-link"><font color="black" size="6px;">གསང་ཚིག་སོར།</font></a>
              <a href="index.php/welcome/log_out" class="dropdown-item"><font color="black" size="6px;">ཕྱིར་ཐོན།</font></a>
            </div>
      </li>
      </ul>
      </nav>
      </div>
             
