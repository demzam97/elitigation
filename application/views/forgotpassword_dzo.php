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
<nav class="navbar" style="float: left;"><a href="<?php echo site_url('welcome/elitigation_dzo')?>"><span class="badge badge-light" style="background-color: orange"><i class="fa fa-arrow-left"></i>&nbsp;<h5>ཕྱིར་ལོག</h5> </span>&nbsp;</a></nav>
<br><br>
<div class="container-fluid">
<br><br>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color:white;">
      <div class="card-header" style="background-color: white;">
        <h5 class="page-title"><h3>གསང་ཚིག་བརྗེད་ཡོདཔ།</h3><h4>གསང་ཚིག་ གསརཔ་བཟོ་ནི་འབྲེལ་མཐུད་ཀྱི་དོན་ལུ་ གློག་འཕྲིན་ཁ་བྱང་ཕུལ་གནང་། </h4> </h5>
      </div>
      <div class="card-header" style="background-color: white;">
      <?php echo $this->session->flashdata('login_msg') ?>
      </div>
   
      <div class="card-body"> 
      <form action="<?php echo site_url();?>/welcome/forgotpasswordlink_dzo" method="post">
        <input type="hidden" class="form-control form-control-sm" id="pwdchange_status" name="pwdchange_status" value="0">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter email Address">
          </div>
          <div class="form-group">
            <button type="submit" value="update" class="btn btn-primary btn-flat" onclick="return confirm('Are you sure to submit');"><h3>ཕུལ།</h3></button>
          </div>
      </form>
      </div></div></div>
    <div class="col-sm-4"></div>
  </div>
</div>













