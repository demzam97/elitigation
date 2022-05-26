<br><br><div class="container py-12">
<div class="row">
<div class="col-md-10 mx-auto">
  <div class="col-sm-6" style="margin-left: 250px;">
    <div class="card">
      <div class="card-body">
        <div class="col">
        <h5 class="card-title font-weight-bold text-center">CJB Login</h5> 
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
