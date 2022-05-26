<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;
   font-size: 20px;
}
</style>
<br><br><div class="container py-5">
<div class="row">
<div class="col-md-10 mx-auto">
 <div class="row">
  <div class="col-sm-6">
    <div class="card">
       <div class="card-body">
	   <?php $filname = "eLitigation_User_Manual_v6.pdf";?>
        <h3 class="card-title text-center">གློག་ཐོག་རྩོད་བཤེར་ལམ་སྟོན། &nbsp;&nbsp;<i class="fab fa-creative-commons-share"></i></h3><br>
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/vdownload/'.$filname.'');?>" class="btn btn-warning btn-block"><h3><i class="fas fa-book"></i>&nbsp;&nbsp;གློག་ཐོག་རྩོད་བཤེར་ལག་དེབ།</h3></a>
        </button>
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/video_tutorial')?>" class="btn btn-warning btn-block"><h3><i class="fas fa-file-video"></i>&nbsp;&nbsp;བརྙན་འཕྲུལ་སློབ་སྟོན།</h3></a>
        </button> 
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="" class="btn btn-warning btn-block"><h3><i class="fas fa-envelope-square"></i>&nbsp;<i class="fas fa-phone"></i>&nbsp;&nbsp;འབྲེལ་བ་འཐབ་ས།</h3></a>
        </button>
        <br>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="col">
        <h3 class="card-title text-center">ལག་ལེན་པ་ནང་འཛུལ།</h3>  
        <div class="<?php echo $this->session->flashdata('login_class') ?>" style="margin-top:10px"><?php echo $this->session->flashdata('login_msg') ?></div>       
         <form action="<?php echo site_url('welcome/signInelat_dzo'); ?>" method="post">
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
            <button type="submit" class="btn btn-primary btn-flat btn-sm" name="submit"><h3>ནང་འཛུལ།</h3></button>
          </div>

         </form>
        </div>

        <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Don't have an account?&nbsp;<a href="<?php echo site_url('welcome/elat_registration_dzo')?>"><b><h3>ཐོ་བཀོད་ནི།</h3></b></a>
        </div>
        <div class="d-flex justify-content-center">
          <a href="<?php echo site_url('welcome/elat_forgotpassword_dzo')?>"><h3>གསང་ཚིག་བརྗེད་ཡོདཔ།</h3></a>
        </div>
        </div>

      </div>
    </div>
  </div>
 </div>
</div>
</div>
</div>
