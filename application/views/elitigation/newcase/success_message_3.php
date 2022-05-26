<div class="container py-5">
<div class="row">
<div class="col-md-4 mx-auto">
 <div class="row">
<div class="card">
  <h5 class="card-header text-center" style="background-color: #ffc107;"><i class="fas fa-bell"></i>&nbsp;Notification</h5>
  <div class="card-body"><?php $uid = $this->session->userdata('user_id');?>
    <h5 class="card-title"><i class="fas fa-check-circle"></i>&nbsp;Client Registration Successful.</h5>
    <a href="<?php echo site_url ('publicregistration/newcase/'.$uid.''); ?>" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>


