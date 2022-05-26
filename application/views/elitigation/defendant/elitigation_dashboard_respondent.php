<br><div class="container">
 <br /><br /><br />
<?php $uid = $this->session->userdata('user_id'); $utype = $this->session->userdata('user_type'); ?>
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
  <h5 class="card-header text-center" style="background-color: #ffc107;"><i class="fas fa-bell"></i>&nbsp;Change Password</h5>
  <div class="card-body">
    <h5 class="card-title"><i class="fas fa-check-circle"></i>&nbsp;You Logged in for the First Time, Please Consider Changing your password</h5>
    <a href="<?php echo site_url ('welcome/changePasswordelat/'.$this->session->userdata('email')); ?>" class="btn btn-primary">Change Password</a>
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
  <h5 class="card-header text-center" style="background-color: #ffc107;"><i class="fas fa-bell"></i>&nbsp;Account Verification</h5>
  <div class="card-body">
    <h5 class="card-title"><i class="fas fa-check-circle"></i>&nbsp;Authenticate your Account with OTP Recieved through email or SMS</h5>
    <a href="<?php echo site_url('welcome/passwordAuthenticator/'.$uid.''); ?>" class="btn btn-primary">Send OTP</a>
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
  
<div class="col-md-12 mx-auto">

  <?php $uid = $this->session->userdata('user_id')?>
  <ul>
  <style type="text/css">
  .blink_me {
  animation: blinker 1s linear infinite;
}
@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
      <a href="<?php echo site_url('publicregistration/def_incase/'.$uid.''); ?>">  
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-line-chart fa-3x fa-icon-image" style="float: left;"></i>
            <p class="item-title"><h4>Incase Activities</h4></p>
            <p>View Incase Activities</p>
        </div>
      </div>
    </div>
    </a>

      <?php
        $uid = $this->session->userdata('user_id'); 
        $defcid = $this->elat->get_case_cmscid($uid);
        $ecaseid = $this->elat->get_defendant_caseid($defcid);
        $miscids = $this->elat->get_misccaseid_withcreatedby_defdash($ecaseid);
        $count = 0;
        foreach($miscids as $mis)
        {
          $miscid = $mis->misc_case_id;
          $forms = $this->elat->get_app_forms_def($miscid);
          foreach($forms as $fm)
              {
                $form = $fm->form_name_def;
                if($form == ''){$count = $count+1;}
              }  
        }
       ?>
     <?php if($count != 0){ ?>
    <a href="<?php echo site_url('publicregistration/casesubmisions_def/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
      <div class="text">
      <i class="fa fa-file-o fa-3x fa-icon-image" style="float: left;"></i>
      <p class="item-title"><h4>Judicial Forms&nbsp;&nbsp;<font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font></h4></p>
          <p>View Form submission details</p>
        </div>
      </div>
    </div>
    </a>
    <?php } else { ?>
      <a href="<?php echo site_url('publicregistration/casesubmisions_def/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
      <div class="text">
      <i class="fa fa-file-o fa-3x fa-icon-image" style="float: left;"></i>
      <p class="item-title"><h4>Judicial Forms</h4></p>
          <p>View Form submission details.</p>
        </div>
      </div>
    </div>
    </a>
    <?php } ?>

    <a href="<?php echo site_url('publicregistration/casesubmisions_def_1/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
      <div class="text">
      <i class="fa fa-file-o fa-3x fa-icon-image" style="float: left;"></i>
      <p class="item-title"><h4>Case Documents</h4></p>
          <p>View Case Document details.</p>
        </div>
      </div>
    </div>
    </a>

    <a href="<?php echo site_url('publicregistration/def_caseappeal/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
        <i class="fa fa-file-o fa-3x fa-icon-image" style="float: left;"></i>
            <p class="item-title"><h4>Case Appeal</h4></p>
          <p>View all Appeal cases.</p>
        </div>
      </div>
    </div>
    </a>


    <a href="<?php echo site_url('publicregistration/casedocuments_def/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-file-pdf fa-3x fa-icon-image" style="float: left;"></i>
            <p class="item-title"><h4> Court Documents</h4></p>
          <p>View all Court documents</p>
        </div>
      </div>
    </div>
    </a>
    

    <a href="<?php echo site_url('publicregistration/def_livehearing/'.$uid.''); ?>">
    <div class="col-md-4 col-sm-8 col-xs-12 Services-tab item">
      <div class="folded-corner service_tab_1">
        <div class="text">
          <i class="fa fa-video fa-3x fa-icon-image" style="float: left;"></i>
            <p class="item-title"><h4>Live Hearings</h4></p>
            <p>View all Live hearings</p>
        </div>
      </div>
    </div>
    </a>
    
  </ul>
  <?php } ?> 
</div>
</div>



