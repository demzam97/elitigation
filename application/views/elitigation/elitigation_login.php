<br><br><div class="container py-5">
<div class="row">
<div class="col-md-10 mx-auto">
 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
	  <?php $filname = 'eLitigation_User_Manual_v6.pdf';?>
        <h5 class="card-title font-weight-bold text-center">e-Litigation Manuals/Tutorials &nbsp;&nbsp;<i class="fab fa-creative-commons-share"></i></h5><br>
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/vdownload/'.$filname.'');?>" class="btn btn-warning btn-block"><i class="fas fa-book"></i>&nbsp;&nbsp;<b>e-litigation platform user manual</b></a>
        </button>
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/video_tutorial')?>" class="btn btn-warning btn-block"><i class="fas fa-file-video"></i>&nbsp;&nbsp;<b>Video tutorials</b></a>
        </button> 
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="" class="btn btn-warning btn-block"><i class="fas fa-envelope-square"></i>&nbsp;<i class="fas fa-phone"></i>&nbsp;&nbsp;<b>Contact Us</b></a>        </button>
        <br>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="col">
        <h5 class="card-title font-weight-bold text-center">User Login</h5> 
        <div class="<?php echo $this->session->flashdata('login_class') ?>" style="margin-top:10px"><?php echo $this->session->flashdata('login_msg') ?></div>       
         <form action="<?php echo site_url('welcome/signInelat'); ?>" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" class="form-control" placeholder="username" name="username" required="required">
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="password" name="password" required="required">
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-flat btn-sm" name="submit">Log In</button>
          </div>

         </form>
        </div>

        <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Don't have an account?&nbsp;<a href="<?php echo site_url('welcome/elat_registration')?>">Please <b>Register!</b></a>
        </div>
        <div class="d-flex justify-content-center">
          <a href="<?php echo site_url('welcome/elat_forgotpassword')?>">Forgot your password?</a>
        </div>
        </div>

      </div>
    </div>
  </div>
 </div>
</div>
</div>
</div>
</body>
</html>
