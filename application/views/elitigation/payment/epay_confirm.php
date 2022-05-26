<div class="container py-5">
<div class="row">
<div class="col-md-4 mx-auto">
 <div class="row">
<div class="card">
  <h5 class="card-header text-center" style="background-color: #ffc107;"><i class="fas fa-money-bill-alt"></i>&nbsp;ePayment</h5>
  <div class="container">
  <?php if ($this->session->flashdata('fail')) { ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Fail!</strong> <?php echo $this->session->flashdata('fail'); ?>
    </div>
  <?php } ?>
        <ul class="progressbar">
            <li>App. No.</li>
            <li class="active">Confirm</li>
            <li>Payment</li>
            <li>Finish</li>
        </ul>
        <p></p>
        <div class="text-msg">
         <p>
         <table class="table table-hover table-responsive table-sm">
        <tr><td><font color="blue">Application No.:</font></td><td><?php echo $appno; ?></td></tr>
        <tr><td><font color="blue">Agency Code:</font></td><td><?php echo $agencycode; ?></td></tr>
        <tr><td><font color="blue">Court Name:</font></td><td><?php echo $courtname; ?></td></tr>
        <tr><td><font color="blue">Service:</font></td><td><?php echo $servicename; ?></td></tr>
        <tr><td><font color="blue">Service Fee:</font></td><td><?php echo $amount; ?></td></tr>
        <tr><td><font color="blue">Account Head:</font></td><td><?php echo $accountno; ?></td></tr>
         </table>      
         </p>
         <form action="<?php echo site_url('g2cPayment/payment'); ?>" method="post" target="_blank">
        <div class="input-group">
         <input type="hidden" name="applicationNo" value="<?php echo $appno; ?>">
         <input type="hidden" name="agencyCode" value="<?php echo $agencycode; ?>">
         <input type="hidden" name="accountHeadId" value="<?php echo $accountno; ?>">
         <input type="hidden" name="serviceFee" value="<?php echo $amount; ?>">
         <input type="hidden" name="serviceName" value="<?php echo $servicename; ?>">
         
         <table class="table table-hover table-responsive table-sm">
         <tr><td>
         <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/index'); ?>" style="color: white;">Cancel</button></a>
          </td>
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
          <td>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Confirm</button>
          </td></tr>
        </table>      
        </div>
        </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<style>
  .container {
  width: 100%;
  margin: 10px auto; 
}
.text-msg { margin:20px 0; display:block; clear:both; text-align:justify;}
.progressbar {
  margin: 0;
  padding: 0;
  counter-reset: step;
   clear:both;
}
.progressbar li {
  list-style-type: none;
  width: 25%;
  float: left;
  font-size: 12px;
  position: relative;
  text-align: center;
  text-transform: uppercase;
  color: #7d7d7d;
}
.progressbar li:before {
  width: 30px;
  height: 30px;
  content: counter(step);
  counter-increment: step;
  line-height: 30px;
  border: 2px solid #7d7d7d;
  display: block;
  text-align: center;
  margin: 0 auto 10px auto;
  border-radius: 50%;
  background-color: white;
}
ul li:first-child:before{
  margin-left:0;
}
ul li:first-child{
  text-align:left;
}
ul li:last-child:before{
  margin-right:0;
}
ul li:last-child{
  text-align:right;
}
.progressbar li:after {
  width: 159%;
  height: 2px;
  content: '';
  position: absolute;
  background-color: #7d7d7d;
  top: 15px;
  left: -81%;
  z-index: -2;
}
.progressbar li:first-child:after {
  content: none;
}
.progressbar li.active {
  color: green;
}
.progressbar li.active:before {
  border-color: #55b776;
}
.progressbar li.active + li:after {
  background-color: #55b776;
  z-index: -1;
}
</style>

