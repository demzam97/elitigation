<nav class="navbar" style="float: left;"><a href="<?php echo site_url('welcome/elitigation')?>"><span class="badge badge-light" style="background-color: orange"><i class="fa fa-arrow-left"></i>&nbsp;Back</span>&nbsp;</a></nav>
<br><br>
<div class="container-fluid">
<br><br>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:white;">
      <div class="card-header" style="background-color: white;">
        <h5 class="page-title">Forgot Your Password?<br> </h5><p>Provide your email address to get the Password Reset Link.</p>
      </div>
      <div class="card-header" style="background-color: white;">
      <?php echo $this->session->flashdata('login_msg') ?>
      </div>
   
      <div class="card-body"> 
      <form action="<?php echo site_url();?>/welcome/forgotpasswordlink" method="post">
        <input type="hidden" class="form-control form-control-sm" id="pwdchange_status" name="pwdchange_status" value="0">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter email Address">
          </div>
          <div class="form-group">
            <button type="submit" value="update" class="btn btn-primary btn-flat" onclick="return confirm('Are you sure to submit');">Send Reset Link</button>
          </div>
      </form>
      </div></div></div>
    <div class="col-sm-4"></div>
  </div>
</div>













