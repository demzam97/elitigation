<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;

}
</style>
<br><div class="container">
 <br /> <br /> <br /><br /><br />
 <div class="row"><?php $uid = $this->session->userdata('user_id')?>
<!--1st time login-->
<?php $result=$this->user->get_password_status($uid); ?>
  <?php 
    if($result == '0')
    {
      ?>
     <!-- <a href="index.php/welcome/changePasswordelat" class="nav-item nav-link">Change Password</a> -->
<div class="container py-5">
<div class="row">
<div class="col-md-6 mx-auto">
 <div class="row">
<div class="card">
  <h1 class="card-header text-center" style="background-color: #ffc107;">གསང་ཚིག་སོར་ནི།</h1>
  <div class="card-body">
    <h3 class="card-title"><i class="fas fa-check-circle"></i>&nbsp;You logged in for the First time, for security reasons please reset your password.</h3>
    <a href="<?php echo site_url ('welcome/changePasswordelat_dzo'); ?>" class="btn btn-primary"><h1>གསང་ཚིག་སོར་ནི།</h1></a>
  </div>
</div>
</div>
</div>
</div>
</div>
      <?php
    }
     elseif($result == '1')
    { 
      ?>

<div class="container py-5">
<div class="row">
<div class="col-md-6 mx-auto">
 <div class="row">
<div class="card">
  <h1 class="card-header text-center" style="background-color: #ffc107;"><i class="fas fa-bell"></i>&nbsp;ལག་ལེན་པ་བདེན་དཔྱད་འབད་གནང༌།</h1>
  <div class="card-body">
    <h3 class="card-title"><i class="fas fa-check-circle"></i>&nbsp;Authenticate your Account with OTP Recieved through email or SMS</h3>
    <a href="<?php echo site_url('welcome/passwordAuthenticator_dzo/'.$uid.''); ?>" class="btn btn-primary"><h4>Send OTP</h4></a>
  </div>
</div>
</div>
</div>
</div>
</div>
      <?php
    }
else
{
?>
  <div class="row"><?php $uid = $this->session->userdata('user_id')?>
  <ul>
    <a href="<?php echo site_url('publicregistration/newcase/'.$uid.''); ?>">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab  item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-image fa-3x fa-icon-image" style="float: left;"></i>
            <h1>རྩོད་གཞི་ཐོ་བཀོད་གསརཔ།<br>ཐོ་བཀོད་གསརཔ་ བཀལ་ནི་དང༌བལྟ་ནི།</h1>
        </div>
      </div>
      </div>
      </a>
      <a href="<?php echo site_url('publicregistration/incase/'.$uid.''); ?>">  
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-line-chart fa-3x fa-icon-image" style="float: left;"></i>
            <h1>རྩོད་གཞི་ལཱ་རིགས།<br>རྩོད་གཞི་ལཱ་རིགས༌བལྟ་ནི།</h1>
        </div>
      </div>
    </div>
    </a>
    <a href="<?php echo site_url('publicregistration/hearings/'.$uid.''); ?>">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-calendar fa-3x fa-icon-image" style="float: left;"></i>
          <h1>སྙན་གསན་གྱི་ཟླ་ཚེས།<br>སྙན་གསན་གྱི་ཟླ་ཚེས༌བལྟ་ནི།</h1>
        </div>
      </div>
    </div>
    </a>
    <a href="<?php echo site_url('publicregistration/casedocuments/'.$uid.''); ?>">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-file-pdf fa-3x fa-icon-image" style="float: left;"></i>
          <h1>རྩོད་གཞི་ཡིག་ཆ།<br>རྩོད་གཞི་ཡིག་ཆ༌བལྟ་ནི།</h1>
        </div>
      </div>
    </div>
    </a>
    <a href="<?php echo site_url('publicregistration/casesubmisions/'.$uid.''); ?>">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
      <div class="text">
        <i class="fa fa-file-o fa-3x fa-icon-image" style="float: left;"></i>
         <h1>རྩོད་གཞི་ཕུལ་བ།<br>རྩོད་གཞི་ཕུལ་མི༌ཁ་གསལ་ཚུ་ བལྟ་ནི།</h1>
        </div>
      </div>
    </div>
    </a>
    <a href="<?php echo site_url('publicregistration/livehearing/'.$uid.''); ?>">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-video fa-3x fa-icon-image" style="float: left;"></i>
          <h1>་སྙན་གསན།<br>རྩོད་གཞི་སྙན་གསན་ཚུ་ བལྟ་ནི།</h1>
        </div>
      </div>
    </div>
    </a>
  </ul>
  <?php } ?>
  </div>
</div>
</body>
</html>

