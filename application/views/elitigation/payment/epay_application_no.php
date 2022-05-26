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
            <li class="active">App. No.</li>
            <li>Confirm</li>
            <li>Payment</li>
            <li>Finish</li>
        </ul>
        <p></p>
        <div class="text-msg">
         <p>Enter your Application Number</p>
         <form action="<?php echo site_url('g2cPayment/app_search'); ?>" method="post" >
        <div class="input-group">
         <input type="hidden" class="form-control form-control-sm" id="user_type" name="pt" value="<?php echo $pt; ?>">
         <input name ="appno" type="search" class="form-control rounded" placeholder="Application No" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary">search</button>
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

