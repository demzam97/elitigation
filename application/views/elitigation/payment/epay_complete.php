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
            <li>Confirm</li>
            <li>Payment</li>
            <li class="active">Finish</li>
        </ul>
        <p></p>
        <div class="text-msg">
         <p>
         <table class="table table-hover table-responsive table-sm">
        <tr><td><font color="blue">Application No.:</font></td><td><?php echo $applicationNo; ?></td></tr>
        <tr><td><font color="blue">Payment Date:</font></td><td><?php echo $paymentDate; ?></td></tr>
        <tr><td><font color="blue">Txn ID:</font></td><td><?php echo $txnId; ?></td></tr>
        <tr><td><font color="blue">Txn Amount:</font></td><td><?php echo $txnAmount; ?></td></tr>
        <tr><td><font color="blue">Payment Status:</font></td><td><?php echo $paymentStatus; ?></td></tr>
        
         </table>      
         </p>
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

