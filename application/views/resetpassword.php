<br><br>
<div class="container-fluid">
<br><br>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:white;">
      <div class="card-header" style="background-color: white;">
        <h5 class="page-title">Reset Your Password.<br> </h5>
      </div>
      <div class="card-header" style="background-color: white;">
      <?php echo $this->session->flashdata('pwdchange_msg') ?>
      </div>
   
      <div class="card-body"> 
      <form action="<?php echo site_url();?>/welcome/updatepass" method="post">
        <input type="hidden" class="form-control form-control-sm" id="pwdchange_status" name="pwdchange_status" value="1">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control form-control-sm" placeholder="Enter New Password">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="cpassword" class="form-control form-control-sm" placeholder="Confirm New Password">
          </div>
          <div class="form-group">
            <button type="submit" value="update" class="btn btn-primary btn-flat" onclick="return confirm('Are you sure to submit');">Change Password</button>
          </div>
      </form>
      </div></div></div>
    <div class="col-sm-4"></div>
  </div>
</div>













