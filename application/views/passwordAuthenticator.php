<br><br>
<div class="container-fluid">
<br><br>
  <div class="row">

<?php $uid = $this->session->userdata('user_id')?>
    
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:white;"><div class="card-header" style="background-color: white;">
    <h5 class="page-title">OTP Password Authenticator</h5>
        <?php echo $this->session->flashdata('message');?>
    </div>
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span>
      </div>
      <div class="card-body"> 
        <form action="<?php echo site_url('welcome/passwordAuthenticating/'.$uid.''); ?>" method="post">      
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" ><i class="fas fa-key"></i></span>
            </div>
            <input type="text" name="otp_no" class="form-control form-control-sm" placeholder="Enter Your OTP number">
          </div>         
          <div class="form-group">
            <button type="submit" value="update" class="btn btn-primary btn-flat">Submit</button>
          </div>
      </form>
      </div></div>
    <div class="col-sm-4"></div>
  </div>
</div>













