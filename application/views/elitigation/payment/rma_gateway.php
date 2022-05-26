
<div class="content">
<div class="main-content">
<div class="container">
        <ul class="progressbar">
            <li>App. No.</li>
            <li>Confirm</li>
            <li class="active">Payment</li>
            <li>Finish</li>
        </ul>
  </div>    
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<iframe style="min-height: 677px;width:100%" class="col-md-12"
src="https://www.citizenservices.gov.bt/G2CPaymentAggregator/payment.html?me
thod=openPayment&orderNo=<?php echo $bfsorderno; ?>" frameborder="0" id="frameId">
</iframe>
</div>
</div>
</div>

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
