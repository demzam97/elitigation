<br><br><br>
<div class="container py-4">
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
  <div class="col-md-10 mx-auto" style="background-color: #545454;">
    <div class="dropdown">
      <button class="dropbtn"><i class="fas fa-money-bill-alt"></i>&nbsp;&nbsp;ePayment</button>
      <div class="dropdown-content">
        <a href="<?php echo site_url('g2cPayment/index/1') ?>">Court Fees</a>
        <!-- <a href="<?php echo site_url('g2cPayment/index/1') ?>">Marriage Registration Fee</a>
        <a href="<?php echo site_url('g2cPayment/index/3') ?>">Marriage Case Renewal Fees</a>
        <a href="<?php echo site_url('g2cPayment/index/4') ?>">Fines and Penalties</a>
        <a href="<?php echo site_url('g2cPayment/index/5') ?>">Other Fees and Charges</a>
        <a href="<?php echo site_url('g2cPayment/index/6') ?>">Liquidated Damages</a>
        <a href="<?php echo site_url('g2cPayment/index/7') ?>">Tender Document Sale</a>
        <a href="<?php echo site_url('g2cPayment/index/8') ?>">Fines and Penalties (In lieu of Imprisonment)</a>
        <a href="<?php echo site_url('g2cPayment/index/9') ?>">Forfeiture of Security Deposits</a>
        <a href="<?php echo site_url('g2cPayment/index/10') ?>">Court Bail Fees</a> -->
      </div>
    </div>
	<div class="dropdown">
      <button class="dropbtn"><i class="fas fa-calendar"></i>&nbsp;&nbsp;Calendar</button>
      <div class="dropdown-content">
	    <?php 
		$year = 0; $month = 0; $day = 0;
		foreach ($courts as $ct) : ?>
        <a href="<?php echo site_url('casecal/elatcal/'.$year.'/'.$month.'/'.$day.'/'.$ct->id) ?>"><?php echo $ct->court_name ?></a>
		<?php endforeach; ?>
      </div> 
    </div>
   <?php $utype = '0'; $caseid = '0'; $courtid = '0';?>
    <button class="fbtn"><a href="<?php echo site_url('welcome/feed_back/'.$utype.'/'.$caseid.'/'.$courtid) ?>" style="color: white;"><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a></button>
	
	<a href="<?php echo site_url('welcome/elitigation_cjb') ?>" style="color: white;float: right;">CJB Login</a>
  </div></br>

  <div class="col-md-10 mx-auto">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body"><br>
            <h6 class="card-title font-weight-bold text-center">Case Statistics in Brief &nbsp;&nbsp;<i class="fas fa-chart-bar"></i></h6>
            <p class="card-text">Total Civil Cases Registered:&nbsp;&nbsp;
            <strong><?php foreach($civiltotal as $ct){ echo $ct->civil_total; }?></strong></p>
             <p class="card-text">Total Criminal Cases Registered:&nbsp;&nbsp;
             <strong><?php foreach($criminaltotal as $crt){ echo $crt->criminal_total; }?></strong></p>
            <p class="card-text">Total Cases Decided:&nbsp;&nbsp;
            <strong><?php foreach($totaldecided as $td){ echo $td->total_decided; }?></strong></p>
            <p class="card-text">Total Cases Appealed:&nbsp;&nbsp;
            <strong><?php foreach($totalappealed as $ta){ echo $ta->total_appealed; }?></strong></p>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <br>
            <div class="col">
              <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/cmis') ?>" target="_blank" class="btn btn-warning btn-block"><b>Case Management System</b><br>(For Court Officials Only)</a>
              </button>
            </div>
            <br>
            <div class="col">
              <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/elitigation') ?>" class="btn btn-warning btn-block"><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;Click here to go to <b>E-Litigation</b> Platform</a>
              </button>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container py-3">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header text-center" style="background-color:  #ffc107;"><img src="<?php echo base_url('images/logo.png') ?>" class="img-fluid" alt="Responsive image" style="height:32px;width:38px;"><a href="http://www.judiciary.gov.bt"><b style="color: black">&nbsp;&nbsp;&nbsp;Click Here to Visit the Judiciary Website</b></a></div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script>
</body>

</html>
<style>
  .fbtn {
    background-color: #545454;
    padding: 10px;
    font-size: 15px;
    border: none;
    cursor: pointer;
  }

  .dropbtn {
    background-color: #545454;
    color: white;
    padding: 10px;
    font-size: 15px;
    border: none;
    cursor: pointer;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    background-color: #545454;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #edecec;
    min-width: 260px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 8px 10px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #c4c4c4
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    background-color: #3e8e41;
  }
</style>
<script>
var timeout = 3000;
$('.alert').delay(timeout).fadeOut(300);
</script>
