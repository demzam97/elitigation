<?php error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<style>
@charset "UTF-8";
@import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Source+Serif+Pro:400,600,700|Work+Sans:100,200,300,400,500,600,700,800,900");
path#frames {
  display: none;
}
path.active-state:hover {
  fill: #c41b2a;
}
.map-title {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.map-popup-box h3 {
  font-family: "Poppins", sans-serif;
  font-size: 18px;
  font-weight: 600;
  line-height: 30px;
  margin: 0 0 11px 0px;
  display: block;
}
.map-title p {
  margin: 0 0 30px 0;
  font-size: 18px;
  line-height: 23px;
}
#info-box {
  display: none;
  position: absolute;
  top: 0px;
  left: 0px;
  z-index: 1;
  background-color: #ffffff;
  box-shadow: 10px 0 60px 30px rgba(0, 0, 0, 0.27);
  border-radius: 8px;
}
.map-popup-box {
  border-radius: 8px;
  background: white;
  display: inline-block;
  flex-direction: column;
  padding: 22px 20px;
  position: relative;
}
.map-popup-box p {
  font-family: "Source Serif Pro";
  font-size: 14px;
  line-height: 18px;
  margin: 0 0 18px 0px;
  display: block;
}
.map-popup-box a {
  font-size: 14px;
  line-height: 14px;
  margin-bottom: 14px;
  color: #00a8f3;
  display: block;
  position: relative;
  margin-left: 0px;
}
.map-popup-box a:hover {
  color: black;
}
.map-popup-box .fa {
  font-family: FontAwesome;
  display: inline-block;
  position: absolute;
  top: 0px;
  right: 8px;
  padding: 10px;
}
</style>
</head>
<style>
    .invoice {
    background-color: #ffffff;
    border: 1px solid rgba(0,0,0,.125);
    position: relative;
    }
    .p-3 {
    padding: 1rem!important;
    }
    .mb-3, .my-3 {
    margin-bottom: 1rem!important;
    }
    *, ::after, ::before {
    box-sizing: border-box;
    }
    user agent stylesheet
    div {
    display: block;
    }
</style>  

<br><br><br><br><br><br><br><br>
<?php $uid = $this->session->userdata('user_id')?>
<div class="container-fluid">
<div class="row">
<div class="col-12"> 

<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">

<div class="container" style="background-color: #e6e6e6;">
<div class="row">
<div class="col-md-offset-4">
<!--SEARCH-->
<div class="card-header border-0 ui-sortable-handle" style="background-color: #e6e6e6;">
<form class="form-inline" method="post" action="<?php echo site_url('welcome/date_search'); ?>">
  <div class="form-group">
  <label for="court">Select Dzongkhag<font color="red">*</font></label>
        <select class="form-control form-control" name="dzongkhag" id="dzongkhag" >
		<option value="0" selected>Select Dzongkhag</option>
           <?php foreach($dzongkhag as $dzo): ?>
          <option value="<?php echo $dzo->id; ?>"><?php echo $dzo->court_name; ?></option>
		  <?php endforeach; ?>
        </select>
  </div>		
  <div class="form-group">
    <label for="exampleInputEmail3">From Date<font color="red">*</font></label>
    <input type="date" class="form-control input-sm" id="fromdate" name="fromdate" placeholder="From Date" required="required">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword3">To Date<font color="red">*</font></label>
    <input type="date" class="form-control input-sm" id="todate" name="todate" placeholder="To Date" required="required">
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="submit" class="btn btn-default" style="background-color: #245f79;color: #fff;" >Search</button>
  
</form>
</div>
</div>
</div>
    <div class="card-header border-0 ui-sortable-handle" style="background-color: #e6e6e6;">
      <h5 class="card-title">
      <i class="fas fa-map-marker-alt mr-1"></i><b>All Cases <?php echo date("Y");?></b>  
      </h5>
    </div>
<!--box-->
<div class="row">
    <div class="col-sm text-center" style="background-color: #d6b3b3;">
      <h3><b>
      <?php echo $current_total_case;?>
      </b></h3>
      <div class="text-black">Total Cases</div>
    </div>
    <div class="col-sm text-center" style="background-color: #8faca0;">
      <h3><b>
      <?php echo $current_total_decided['count_rows'];?>
      </b></h3>
      <div class="text-black">Decided Cases </div>
    </div>
    <div class="col-sm text-center" style="background-color: #e3dbab;">
      <h3><b>
      <?php echo $current_total_pending['count_rows'];?>
      </b></h3>
      <div class="text-black">Pending Cases</div>
    </div>
    <!-- <div class="col-sm text-center" style="background-color: #92a9c6;">
      <h3><b>
      <?php  
        echo $current_total_active;
      ?>/
      <?php  
        echo $current_total_assigned;
        ?>
      </b></h3>
      <div class="text-black">Active/Assigned Cases</div>
    </div> -->
</div>
<!--boxend-->
<!--pins-->
<div class="pingasa"></div>
<div class="pinthi"></div><div class="pinlin"></div><div class="pinsc"></div><div class="pinhc"></div><div class="pinhclb"></div>
<div class="pinparo"></div>
<div class="pinhaa1"></div><div class="pinhaa2"></div>
<div class="pinsam"></div><div class="pinsam2"></div><div class="pinsam3"></div>
<div class="pinchu"></div><div class="pinchu1"></div>
<div class="pindag"></div><div class="pindag1"></div>
<div class="pinpun"></div>
<div class="piwangdi"></div>
<div class="pintron"></div>
<div class="pinsar"></div><div class="pingel"></div>
<div class="pinzam"></div><div class="pinpanbang"></div>
<div class="pinbum"></div>
<div class="pinmon"></div><div class="pinmon1"></div>
<div class="pinmpema"></div><div class="pinmpema1"></div>
<div class="pinsj"></div><div class="pinJomotshangkha"></div><div class="pinSamdrupcholing"></div>
<div class="pintg"></div><div class="pintg1"></div><div class="pintg2"></div><div class="pintg3"></div>
<div class="pinty"></div>
<div class="pinlhun"></div>
<div class="pintsr"></div>
<!--pins-->

</div><!--container 2 end-->

</div>
</div>
</div>

</div>
</div>
</div><!--container 1 end-->

<!--searchend-->
<body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="info-box"></div>
<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="-250 0 1300.6 595.22">
  <defs>
    <style>
      .cls-1, .cls-2, .cls-5 {
        fill: #406076;
      }
    </style>
  </defs>
  <title>click to view</title>
  <g id="outlines">
    
<path data-info="
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Paro</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_paro['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_paro['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_paro['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_paro['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_paro['count_rows']; ?><br>
  </p><?php $id=10;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
  <i class='fa fa-times'></i>             
</div>
" id="CA" class="cls-1 active-state"  d="m 113.72556,127.95095 2.5,2.54 -0.17,0.94 1.55,1.4 0.69,2.53 1.75,0.98 4.05,0.04 1.29,0.67 0.03,1.26 -1.32,0.43 -0.73,1.29 0.1,2.47 4.78,-1.06 0.28,-2.35 0.76,-0.13 4.63,2.37 3.39,0.28 1.3,-0.91 0.58,-2.27 3.3,-1.69 2.4,0.08 3.62,2.8 3.14,-2.91 6.5,-2.15 0.71,1.91 -0.02,3.76 -0.33,2.6 -1.29,1.46 1.2,2.69 -0.99,2.57 2.34,1.82 2.23,4.18 -1.66,2.42 -1.52,0.16 -2.4,1.56 -0.35,1.49 -1.1,0.83 0.97,1.56 1.43,0.49 1.64,-1.78 2.27,-0.39 0.62,1.89 6.26,5.16 2.89,3.86 2.84,1.09 -0.2,0.9 -1.39,1 1.84,2.73 0.67,2.66 1.28,1.91 3.15,1.16 1.36,1.7 -1.76,1.46 -0.98,-0.11 -0.58,1.39 -0.32,5.54 0.8,3.48 -1.67,4.24 0.13,4.61 -1.55,2.49 0.75,4.42 -1.15,5.65 1.56,2.26 3.18,-0.35 4.3,2.21 0.86,4.75 -2.64,3.8 0.04,2.56 1.17,1.37 2.36,0.56 5.18,3.86 -0.25,7.26 0,0 -1.26,4.09 -0.08,3.21 -2.83,3.33 -1.87,6.53 -1.59,3.01 -0.43,3.15 1.49,4.47 -2.12,2.61 -1.77,-0.71 -2.9,0.22 -6.37,-1.13 -1.89,-2.03 -4.59,-1.92 -3.7,-3.7 -0.85,0.2 -1.43,1.9 -3.58,1.07 -3.86,-0.7 -4.37,1.15 -3.79,-0.28 0,0 -2.29,-5.84 0.71,-3.09 -0.91,-3.33 -0.11,-4.43 1.79,-2.14 5.98,-1.96 1.38,-1.84 2.26,-1.33 1.28,-2.62 -1.92,-1.19 -0.49,-1.45 -2.29,-2.3 -0.22,-2.3 -1.22,-2.35 -1.58,-0.84 -3.48,-4.93 -1.33,-0.74 -3.09,-8.37 -2.76,-1.73 0.14,-1.19 -1.84,-1.06 -1.35,-2 -0.25,-1.12 0.98,-2.41 -0.85,-1.72 -1.74,-0.67 -3.64,-3.07 -2.35,-0.45 -0.1,-3.69 -1.19,-2.07 0.11,-3.46 -0.98,-0.53 -0.05,-4.1 -2.02,-2.28 -0.56,-6.07 -1.51,-2.96 -5.03,1.43 -5.2,-4.26 -6.530001,-0.27 -1.24,-1.63 -3.59,-0.85 -0.62,-3.45 -3.68,-1.31 -1.34,-1.63 0,0 1.92,-1.61 -0.39,-2.05 2.86,-1.45 -0.45,-2.93 0.76,-1.65 2.41,-1.49 0.91,-1.96 1.26,-0.04 0.24,0.82 1.610001,-0.23 1.57,-6.55 0.34,-0.66 3.18,-0.82 1.29,-4.98 3.56,-0.2 1.92,-1.45 1.33,-4.92 -1.57,-3.73 z" class=" mapsvg-region" style="background: #f98c0f;stroke: #e7e7e7;" transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Chukha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_c['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_c['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_c['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_c['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_c['count_rows']; ?><br>
  </p><?php $id=2;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>               
</div>
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Phuentsholing</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_pl['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_pl['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_pl['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_pl['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_pl['count_rows']; ?><br>
  </p><?php $id=28;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
  <i class='fa fa-times'></i>               
</div>
" id="CA" class="cls-1 active-state" d="m 190.02556,247.40095 3.02,0.92 1.71,3.2 1.34,0.91 0.02,6.19 0.64,1 3.25,-0.78 2.72,1.65 5.02,0.2 1.46,1.3 0.22,2.05 -0.67,0.75 -1.67,0.21 -2.24,1.95 -3.57,1.16 -2.48,3.03 -0.48,4.92 -2.01,0.95 -0.98,1.6 2.86,0.59 2.1,4.55 3.48,2.8 0.85,1.69 2.92,1.47 3.33,-1.02 0,0 3.28,4.44 0.19,4.02 2.76,6.2 0.6,3.51 4.68,-0.41 1.52,1.17 0.34,3.05 -1.86,2.93 0.12,3.36 2.29,0.69 6.21,-2.29 5.89,0.76 2.22,5.23 2.34,2.7 0.48,3.42 0.83,0.98 -0.45,2.85 1.9,9.06 2.46,-0.21 2.24,1.24 0.39,1.31 -2.18,2.87 0.95,1.68 0.11,2.61 3.74,2.37 0.45,1.37 0.28,1.31 -0.95,1.43 -3.13,0.19 -4.46,-1.06 -0.87,0.59 0.65,4.79 -1.62,1.62 0.47,2.97 -1.42,0.43 0.78,3.46 -0.67,1.41 -1.74,0.87 -0.37,2.25 0.64,2.36 -0.7,0.03 -1.19,-1.53 -1.13,2.26 0.35,1.79 -2.61,-0.51 -3.44,4.96 -1.26,3.38 0.49,1.98 -0.69,3.3 0.52,1.44 3.48,1.65 0,0 -3.73,2.35 -3.11,0.52 -5.17,-3.39 -1.02,-0.27 -2.06,1.02 -4.01,-1.64 -1.12,3.02 -2.4,2.72 -0.99,0.2 -2.3,-1.29 -2.25,-0.34 -0.76,1.43 -1.31,0.24 -1.45,-3.51 1.49,-2.68 4.6,-2.4 0.81,-3.51 1.31,-1.85 -0.5,-2.05 -1.62,-0.55 -0.59,-0.96 -1.93,0.01 -2.32,1.4 -0.85,-2.05 -6.37,-1.58 -4.46,-1.93 -2.41,-4.52 -3.1,1.38 -4.25,-0.74 -3.84,0.3 -1.19,0.92 -5.43,1.47 -3.65,0.19 -3.21,-3.28 -0.77,-5.33 -4.79,-0.31 -4.26,-1.36 -4.32,0.05 -0.94,-4.49 -1.1,-0.89 -2.56,0.41 0.37,-1.75 0,0 0.55,-2.64 -1.12,-2.2 -1.08,-0.52 -2.68,0.54 -3.12,2.36 -2.29,0.17 -0.68,-1.38 1.3,-1.61 0.08,-1.38 -1.83,-1.79 0.84,-2.76 -2.51,-0.41 -0.89,-1.3 -2.15,0.57 -0.47,-1.06 -1.59,-0.36 -1.69,-2.23 -0.94,0.08 -0.82,1.51 -1.3,-0.01 -0.71,-2.4 -1.46,-1.03 0.68,-2.63 -1.31,-4.14 2.19,-1.23 1.88,-0.12 7.22,-6.99 1.76,-3.16 0.25,-1.97 0.64,-0.16 2.19,-4.68 -1.17,-3.44 -1.3,-0.75 0.94,-4.26 -0.09,-4.35 0,0 -1.24,-2.97 -0.02,-2.64 7.55,-4.73 -0.82,-2.76 0.67,-2.07 2.91,-3.8 3.77,-3.47 -0.78,-1.8 -3.48,-2.44 -1.81,-3.41 -0.05,-2.24 0,0 3.79,0.28 4.37,-1.15 3.86,0.7 3.58,-1.07 1.43,-1.9 0.85,-0.2 3.7,3.7 4.59,1.92 1.89,2.03 6.37,1.13 2.9,-0.22 1.77,0.71 2.12,-2.61 -1.49,-4.47 0.43,-3.15 1.59,-3.01 1.87,-6.53 2.83,-3.33 0.08,-3.21 z" class=" mapsvg-region" style="background: #f98c0f;stroke: #e7e7e7;" transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Haa</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_haa['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_haa['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_haa['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_haa['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_haa['count_rows']; ?><br>
  </p><?php $id=5;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>               
</div>
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Sombeykha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sb['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sb['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sb['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sb['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_sb['count_rows']; ?><br>
  </p><?php $id=33;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
  <i class='fa fa-times'></i>               
</div>
" id="CA" class="cls-1 active-state" d="m 89.515559,168.27095 1.34,1.63 3.68,1.31 0.62,3.45 3.59,0.85 1.24,1.63 6.530001,0.27 5.2,4.26 5.03,-1.43 1.51,2.96 0.56,6.07 2.02,2.28 0.05,4.1 0.98,0.53 -0.11,3.46 1.19,2.07 0.1,3.69 2.35,0.45 3.64,3.07 1.74,0.67 0.85,1.72 -0.98,2.41 0.25,1.12 1.35,2 1.84,1.06 -0.14,1.19 2.76,1.73 3.09,8.37 1.33,0.74 3.48,4.93 1.58,0.84 1.22,2.35 0.22,2.3 2.29,2.3 0.49,1.45 1.92,1.19 -1.28,2.62 -2.26,1.33 -1.38,1.84 -5.98,1.96 -1.79,2.14 0.11,4.43 0.91,3.33 -0.71,3.09 2.29,5.84 0,0 0.05,2.24 1.81,3.41 3.48,2.44 0.78,1.8 -3.77,3.47 -2.91,3.8 -0.67,2.07 0.82,2.76 -7.55,4.73 0.02,2.64 1.24,2.97 0,0 -6.31,0.64 -5.2,-1.41 -1.19,0.98 -3.21,-0.02 -3.31,3.72 -0.14,2.96 -3.75,6.4 -2.44,0.71 -2.69,-4.19 -3.36,-2.53 -2.23,-6.12 -2.080001,-2.45 -0.74,0.35 -1.35,3.36 -0.21,3.44 -2.12,2.69 -2.55,1.54 -2.4,0.39 -2.13,1.59 -2.58,-0.12 -2.23,-2.65 -2.3,-0.24 -1.7,-2.01 -3.22,-1.5 -0.39,-3.09 -8.84,-5.57 -1.28,-1.82 0,-2.17 -1.52,-3.27 -4.38,-2.37 -1.56,0.39 -2.44,-1.38 0.21,-5.46 1.49,-4.31 -0.5,-6 -5.98,-6.22 -2.4,-3.48 -1.03,-3.24 -5.63,-3.53 -4.53,-1.35 -1.87,-1.53 0,0 1.4,-3.47 -1.49,-2.01 -0.23,-3.2 1.16,-1.5 0.36,-2.66 2.5,-2.6 1.48,0.66 6.92,8.05 4.84,4.01 1.19,-1 0,-2.41 0.85,-1.6 2.82,-1.8 0.22,-1.55 -1.83,-4.67 -4.78,-3.74 0.36,-1.9 -0.63,-3.7 1.03,-4.63 -1.19,-4.04 1.3,-2.6 1.68,-1.62 -0.56,-3.45 4.97,-5.69 -0.95,-4.19 -1.23,-1.19 -0.72,-2.01 3.52,-2.88 3.35,0 0.11,-0.81 -2.08,-2.61 -0.33,-2.32 1.22,-1.75 6.76,-4.01 0.33,-4.07 1.29,-1.26 -0.78,-3.13 0.7,-2.26 1.7,-0.5 1.56,-1.88 2.96,-0.81 3.02,-2.38 2.73,0 4.47,1.5 1.12,-2.07 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Samtse</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sam['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sam['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sam['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sam['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_sam['count_rows']; ?><br>
  </p><?php $id=13;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>               
</div>
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Tashichhoeling</h3>
  <p>
   Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_tc['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_tc['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_tc['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_tc['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_tc['count_rows']; ?><br>
  </p><?php $id=32;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>  <i class='fa fa-times'></i>                
</div><br />
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Dorokha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_do['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_do['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_do['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_do['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_do['count_rows']; ?><br>
  </p><?php $id=22;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>              
</div>
" id="CA" class="cls-1 active-state" d="m 35.445559,255.33095 1.87,1.53 4.53,1.35 5.63,3.53 1.03,3.24 2.4,3.48 5.98,6.22 0.5,6 -1.49,4.31 -0.21,5.46 2.44,1.38 1.56,-0.39 4.38,2.37 1.52,3.27 0,2.17 1.28,1.82 8.84,5.57 0.39,3.09 3.22,1.5 1.7,2.01 2.3,0.24 2.23,2.65 2.58,0.12 2.13,-1.59 2.4,-0.39 2.55,-1.54 2.12,-2.69 0.21,-3.44 1.35,-3.36 0.74,-0.35 2.080001,2.45 2.23,6.12 3.36,2.53 2.69,4.19 2.44,-0.71 3.75,-6.4 0.14,-2.96 3.31,-3.72 3.21,0.02 1.19,-0.98 5.2,1.41 6.31,-0.64 0,0 0.09,4.35 -0.94,4.26 1.3,0.75 1.17,3.44 -2.19,4.68 -0.64,0.16 -0.25,1.97 -1.76,3.16 -7.22,6.99 -1.88,0.12 -2.19,1.23 1.31,4.14 -0.68,2.63 1.46,1.03 0.71,2.4 1.3,0.01 0.82,-1.51 0.94,-0.08 1.69,2.23 1.59,0.36 0.47,1.06 2.15,-0.57 0.89,1.3 2.51,0.41 -0.84,2.76 1.83,1.79 -0.08,1.38 -1.3,1.61 0.68,1.38 2.29,-0.17 3.12,-2.36 2.68,-0.54 1.08,0.52 1.12,2.2 -0.55,2.64 0,0 -0.37,1.75 -10,4.33 -0.66,0.1 -1.43,-2.67 -0.88,0.11 -2.19,2.19 -9.89,4.5 -2.13,2.71 -5.15,-0.95 -4.72,0.71 -5.57,2.43 -5.000001,-2.37 -8.54,2.55 -0.72,-0.36 -1.36,-3.06 -2.49,-0.43 -0.89,-2.66 -1.59,-0.94 -0.42,-3.38 0.91,-2.78 -1.33,-2.01 -2.55,-1.18 1.8,-3.43 -1.16,-2.31 -5.32,-2.42 -4.98,-0.11 0.46,-2.97 -0.47,-1.24 -3.56,-2.66 -1.48,-2.72 -9.47,5.11 -3.14,0.06 -2.07,-0.95 -4.45,-3.3 -0.83,-1.48 0.31,-1.01 3.35,-2.08 -0.42,-3.67 -1.19,-2.07 -4.33,-1.95 -2.62,-3.31 -1.8,0.48 -1.68,2.85 -2.43,1.66 -1.23,4.5 -2.3,2.38 -0.89,-0.17 -0.53,-1.47 -0.52,-14.06 1.93,-7.93 -1.69,-9.61 0.28,-3.79 -0.66,-4.33 -3.08,0.43 -2.86,-2.43 -4.33,-0.35 -3.62,-2.12 -2.5,-2.9 -3.4499998,0.31 -4.48,-0.8 -3.57999998,-1.11 0.02,-0.67 0.65,-1.67 1.54999998,-1.39 -0.51,-3.09 0.6,-1.65 1.2,-0.88 4.39,-0.9 0.83,-1.01 0.34,-4.22 2.5899998,-4.93 0.09,-7.06 6.88,-3.94 3.15,0.46 4.69,-0.36 2.02,0.88 1.71,-1.08 2.31,0.13 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Thimphu</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_thp['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_thp['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_thp['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_thp['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_thp['count_rows']; ?><br>
  </p><?php $id=17;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Lingzhi</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_lz['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_lz['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_lz['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_lz['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_lz['count_rows']; ?><br>
  </p><?php $id=26;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Supreme Court</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sc['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sc['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sc['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sc['count_rows']; ?><br>
    
  </p><?php $id=14;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div><br />
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;High Court</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_hc['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_hc['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_hc['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_hc['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_hc['count_rows']; ?><br>
  </p><?php $id=6;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;High Court Larger Bench</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_hclb['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_hclb['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_hclb['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_hclb['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_hclb['count_rows']; ?><br>
  </p><?php $id=6;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
" id="CO" class="cls-1 active-state" d="m 190.02556,247.40095 0.25,-7.26 -5.18,-3.86 -2.36,-0.56 -1.17,-1.37 -0.04,-2.56 2.64,-3.8 -0.86,-4.75 -4.3,-2.21 -3.18,0.35 -1.56,-2.26 1.15,-5.65 -0.75,-4.42 1.55,-2.49 -0.13,-4.61 1.67,-4.24 -0.8,-3.48 0.32,-5.54 0.58,-1.39 0.98,0.11 1.76,-1.46 -1.36,-1.7 -3.15,-1.16 -1.28,-1.91 -0.67,-2.66 -1.84,-2.73 1.39,-1 0.2,-0.9 -2.84,-1.09 -2.89,-3.86 -6.26,-5.16 -0.62,-1.89 -2.27,0.39 -1.64,1.78 -1.43,-0.49 -0.97,-1.56 1.1,-0.83 0.35,-1.49 2.4,-1.56 1.52,-0.16 1.66,-2.42 -2.23,-4.18 -2.34,-1.82 0.99,-2.57 -1.2,-2.69 1.29,-1.46 0.33,-2.6 0.02,-3.76 -0.71,-1.91 -6.5,2.15 -3.14,2.91 -3.62,-2.8 -2.4,-0.08 -3.3,1.69 -0.58,2.27 -1.3,0.91 -3.39,-0.28 -4.63,-2.37 -0.76,0.13 -0.28,2.35 -4.78,1.06 -0.1,-2.47 0.73,-1.29 1.32,-0.43 -0.03,-1.26 -1.29,-0.67 -4.05,-0.04 -1.75,-0.98 -0.69,-2.53 -1.55,-1.4 0.17,-0.94 -2.5,-2.54 0,0 0.6,-2.15 1.92,-1.77 0.48,-2.2 2.06,-0.43 5.1,-3.18 -0.45,-1.57 1.32,-2.16 4.43,-3.37 1.96,-2.57 3.17,-0.9 5,0.98 1.61,-2.71 7.33,-4.39 1.22,-1.87 3.1,-2.16 1.09,-3.89 1.39,-0.94 -0.17,-1.1 0.77,-1.38 3.2,-2.08 -0.41,-1.65 1.71,-2.36 3.66,-2.14 1.19,-3.61 2.58,-3.34 -0.41,-6.25 0,0 2.89,1.5 4.16,0.38 2.53,3.5 2.28,1.24 5.16,0.98 1.28,1.53 0.93,3.46 -0.75,6.63 0.93,2.54 2.45,2.33 2.17,0.66 1.11,1.08 3.91,0.53 3.98,1.77 -0.62,1.81 -3.44,0.47 -2.5,1.44 -1.64,3.94 -3.79,2.59 -0.17,1.42 -2.84,2.48 0.09,1.13 -2.57,2.01 1.7,3.16 0.4,2.31 -0.14,1.79 -1.26,1.25 0.51,0.91 -0.53,0.76 0.43,1.3 -0.72,1.12 0.35,1.32 -1.03,1.16 -1.92,0.72 1.11,1.15 0.17,1.5 2,2.27 2.86,1.34 1.67,-1.92 0.59,-2.57 1.57,-0.8 0.92,-1.96 6.25,-0.02 0.49,0.81 -0.36,2.09 2.77,5.32 -0.5,0.68 0.48,0.74 -0.68,0.61 3,2.89 6.49,1.39 0.31,0.9 0.99,0.21 0,0 0.54,4.97 0.61,0.45 1.73,-0.52 1.51,1.22 0.32,2.52 1.15,0.77 -1.16,4.23 0.29,4.94 -1.44,2.86 0.3,2.67 2.28,4.03 2.76,1.42 2.9,9.09 3.04,1.05 1.96,2.57 0.76,2.6 -1.01,2.77 1.2,3.21 2.19,1.55 2.28,0.45 1.03,2.2 -0.18,1.11 0.85,1.2 2.59,1.45 2.55,5.26 0.62,0.12 0,0 -0.05,2.62 -1.04,1.99 -0.76,5.25 2.03,2.08 0.48,2.09 -3.65,2.74 -1.39,2.16 -8.55,5.89 2.62,2.9 2.79,1.32 -0.76,2.74 -0.86,0.85 1.3,7.38 -0.14,6.83 -1.16,2.98 0,0 -2.76,-0.59 -0.99,4.25 -2.62,2.26 0.42,2.08 -0.62,0.82 -2.17,1.07 -2.37,0.02 -3.61,1.72 -2.16,1.99 -2.01,8.87 0.51,3.19 -2.18,3.27 0.25,1.12 0,0 -3.33,1.02 -2.92,-1.47 -0.85,-1.69 -3.48,-2.8 -2.1,-4.55 -2.86,-0.59 0.98,-1.6 2.01,-0.95 0.48,-4.92 2.48,-3.03 3.57,-1.16 2.24,-1.95 1.67,-0.21 0.67,-0.75 -0.22,-2.05 -1.46,-1.3 -5.02,-0.2 -2.72,-1.65 -3.25,0.78 -0.64,-1 -0.02,-6.19 -1.34,-0.91 -1.71,-3.2 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ca'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Tsirang</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_tsi['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_tsi['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_tsi['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_tsi['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_tsi['count_rows']; ?><br>
  </p><?php $id=19;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
  <i class='fa fa-times'></i>               
</div>
" id="CA" class="cls-1 active-state" d="m 311.67556,297.40095 0.78,-1.62 -1.51,-3.02 0.51,-2.91 1.26,-2.03 -0.75,-1.27 -0.05,-5.71 0.22,-0.83 3.46,-2.09 6.76,2.38 1.74,1.38 4.67,1.83 0.42,1.21 0.95,0.31 2.66,-0.38 2.05,-1.14 6.36,0.35 1.57,-1.63 2.46,-0.41 4.02,4 1.99,0.29 2.85,3.11 1.05,0.17 2.83,-3.27 3.29,0.72 2.06,-2.01 2.23,0.1 3.32,-1.38 1.73,-2.84 1.79,-0.17 0,0 3.26,1.9 1.04,3.44 -1.49,3.51 -2.24,-1.13 -2.06,0.4 -5.37,3.34 -2.72,3.69 -2.93,1.36 -1,2.72 0.7,3.52 -3.11,3.51 0.38,1.93 -0.63,3.74 -3.01,1.35 -1.79,1.82 0.58,1.14 -0.03,3.55 -0.81,5.14 -3.28,4.23 -1.65,0.23 -1.21,2.42 -4.21,3.97 -0.64,2.95 0.38,2.41 -1.52,1.58 -0.87,-0.64 -2.88,1.49 -1.81,1.67 -0.41,2.57 -4.97,3.4 -1.57,4.8 -1.28,1.85 0.69,1.5 -0.33,4.66 -3.29,0.57 -2.04,1.64 -2.32,-0.87 -0.43,-0.86 -2.39,0.96 -2.64,1.69 -0.6,4.13 -3.47,1.17 -1.64,0.2 -1.74,-1.59 -3.17,-0.64 0,0 -2.46,1.13 -0.93,-3.02 -2.23,-2.53 -1.52,-3.06 2.59,-2.53 -3.33,-0.42 0.93,-0.36 0.2,-0.85 -0.84,-2.12 1.42,-0.51 0.54,-1.39 -0.66,-4.05 3.31,-2.76 2.13,0.61 0.76,-0.44 1.19,-1.88 -0.24,-1.72 0.67,-1.21 3.67,-2.97 1.58,-2.64 0.48,-3.41 1.26,-2.02 -0.46,-1.41 0.81,-1 -0.81,-1.01 0.15,-3.3 2.23,-9.7 -0.5,-2.37 0.51,-1.66 -1.84,-1.5 2.36,-4.35 -1.52,-3.28 0.7,-1.8 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Dagana</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_dag['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_dag['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_dag['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_dag['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_dag['count_rows']; ?><br>
  </p><?php $id=3;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Lhamoizingkha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_lhz['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_lhz['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_lhz['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_lhz['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_lhz['count_rows']; ?><br>
  </p><?php $id=25;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="CO" class="cls-1 active-state" d="m 231.17556,258.62095 1.87,0.38 3.23,-2.13 3.31,-0.55 1.15,-0.94 1.64,0.57 2.67,-0.38 4.64,3.48 8.18,-2.06 1.76,2.75 2.67,0.71 1.98,3.92 4.54,2.81 3.6,1.11 6.86,16.15 3.46,1.64 1.07,2.38 1.83,0.34 1.67,-0.9 2.31,1.06 4.79,-0.22 1.47,2.11 4.4,2.32 6.49,-0.26 4.91,4.49 0,0 0.35,4.03 -0.7,1.8 1.52,3.28 -2.36,4.35 1.84,1.5 -0.51,1.66 0.5,2.37 -2.23,9.7 -0.15,3.3 0.81,1.01 -0.81,1 0.46,1.41 -1.26,2.02 -0.48,3.41 -1.58,2.64 -3.67,2.97 -0.67,1.21 0.24,1.72 -1.19,1.88 -0.76,0.44 -2.13,-0.61 -3.31,2.76 0.66,4.05 -0.54,1.39 -1.42,0.51 0.84,2.12 -0.2,0.85 -0.93,0.36 3.33,0.42 -2.59,2.53 1.52,3.06 2.23,2.53 0.93,3.02 2.46,-1.13 0,0 -0.31,1.3 3.07,5.23 -0.9,1.92 -0.55,4.79 0.11,3.8 0.89,1.37 -0.33,0.43 -2.57,-1.68 -1.46,-0.18 -1.95,-2.86 -1,0 -0.73,1.43 0.95,1.12 -0.39,3.04 -1.01,0.38 -0.33,1.68 -1.51,1.8 0,0 -4.09,1.98 -6.31,0.94 -8.67,0.15 -7.38,-0.47 -6.82,-2.51 -1.49,4.78 0.11,4.69 -11.81,-2.98 -3.95,1.41 -6.86,1.01 -1.08,-3.82 -1.85,-1.03 1.18,-2.33 -1.06,-1.38 0,0 -3.48,-1.65 -0.52,-1.44 0.69,-3.3 -0.49,-1.98 1.26,-3.38 3.44,-4.96 2.61,0.51 -0.35,-1.79 1.13,-2.26 1.19,1.53 0.7,-0.03 -0.64,-2.36 0.37,-2.25 1.74,-0.87 0.67,-1.41 -0.78,-3.46 1.42,-0.43 -0.47,-2.97 1.62,-1.62 -0.65,-4.79 0.87,-0.59 4.46,1.06 3.13,-0.19 0.95,-1.43 -0.28,-1.31 -0.45,-1.37 -3.74,-2.37 -0.11,-2.61 -0.95,-1.68 2.18,-2.87 -0.39,-1.31 -2.24,-1.24 -2.46,0.21 -1.9,-9.06 0.45,-2.85 -0.83,-0.98 -0.48,-3.42 -2.34,-2.7 -2.22,-5.23 -5.89,-0.76 -6.21,2.29 -2.29,-0.69 -0.12,-3.36 1.86,-2.93 -0.34,-3.05 -1.52,-1.17 -4.68,0.41 -0.6,-3.51 -2.76,-6.2 -0.19,-4.02 -3.28,-4.44 0,0 -0.25,-1.12 2.18,-3.27 -0.51,-3.19 2.01,-8.87 2.16,-1.99 3.61,-1.72 2.37,-0.02 2.17,-1.07 0.62,-0.82 -0.42,-2.08 2.62,-2.26 0.99,-4.25 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Punakha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_pu['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_pu['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_pu['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_pu['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_pu['count_rows']; ?><br>
  </p><?php $id=11;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i>  
</div>
" id="CO" class="cls-1 active-state" d="m 210.64556,144.61095 1.91,-3.17 3.71,0.5 2.46,-1.09 6.27,2.37 2.04,-0.85 3.74,0.15 3.71,-2.3 -1.06,-2.46 2.07,-0.73 2.61,-4.59 1.5,-1.25 0.98,-0.24 2.51,1.53 1.9,3.85 3.24,-1.86 1.58,-4.23 3.41,-1.99 1.24,-2.71 3.19,-1.97 4.5,-8.8 3.88,-2.01 3.35,-0.63 2.54,0.3 4.74,-2.91 2.58,0.55 6.79,6.1 3.24,0.19 3.97,2.24 4.36,1.34 1.48,2.2 4.77,0.86 0,0 1.08,7.53 -0.45,1.62 -0.87,1.77 -4.33,2.52 -5.21,5.49 -1.53,5.96 0.25,1.83 -0.75,0.99 2.01,1.99 3.22,0.87 4.22,-1.3 3.17,0.7 3.33,4.31 2.9,2.42 0.53,1.32 -0.39,1.69 -2.6,1.75 -2.61,3.71 -4.97,0.46 -5.1,7.4 -5.3,2.65 -1.05,2.53 -4.27,2.49 0.15,2.82 -5.42,4.45 0.68,2.86 -0.63,2.66 -2.26,0.9 -3.36,-1.6 -3.7,0.31 -1.39,1.74 1.34,2.85 -0.36,1.04 -2.3,0.38 -3.11,1.93 -2.3,0.05 -4.12,2.4 -1.84,0.17 -3.41,-1.23 -1.79,1.92 -3.07,-0.29 -2.54,1.33 -5.39,0.41 0,0 -0.62,-0.12 -2.55,-5.26 -2.59,-1.45 -0.85,-1.2 0.18,-1.11 -1.03,-2.2 -2.28,-0.45 -2.19,-1.55 -1.2,-3.21 1.01,-2.77 -0.76,-2.6 -1.96,-2.57 -3.04,-1.05 -2.9,-9.09 -2.76,-1.42 -2.28,-4.03 -0.3,-2.67 1.44,-2.86 -0.29,-4.94 1.16,-4.23 -1.15,-0.77 -0.32,-2.52 -1.51,-1.22 -1.73,0.52 -0.61,-0.45 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box co'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Wangduephodrang</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_wp['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_wp['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_wp['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_wp['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_wp['count_rows']; ?><br>
  </p><?php $id=20;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i>
</div>
" id="CO" class="cls-1 active-state"  d="m 311.67556,297.40095 -4.91,-4.49 -6.49,0.26 -4.4,-2.32 -1.47,-2.11 -4.79,0.22 -2.31,-1.06 -1.67,0.9 -1.83,-0.34 -1.07,-2.38 -3.46,-1.64 -6.86,-16.15 -3.6,-1.11 -4.54,-2.81 -1.98,-3.92 -2.67,-0.71 -1.76,-2.75 -8.18,2.06 -4.64,-3.48 -2.67,0.38 -1.64,-0.57 -1.15,0.94 -3.31,0.55 -3.23,2.13 -1.87,-0.38 0,0 1.16,-2.98 0.14,-6.83 -1.3,-7.38 0.86,-0.85 0.76,-2.74 -2.79,-1.32 -2.62,-2.9 8.55,-5.89 1.39,-2.16 3.65,-2.74 -0.48,-2.09 -2.03,-2.08 0.76,-5.25 1.04,-1.99 0.05,-2.62 0,0 5.39,-0.41 2.54,-1.33 3.07,0.29 1.79,-1.92 3.41,1.23 1.84,-0.17 4.12,-2.4 2.3,-0.05 3.11,-1.93 2.3,-0.38 0.36,-1.04 -1.34,-2.85 1.39,-1.74 3.7,-0.31 3.36,1.6 2.26,-0.9 0.63,-2.66 -0.68,-2.86 5.42,-4.45 -0.15,-2.82 4.27,-2.49 1.05,-2.53 5.3,-2.65 5.1,-7.4 4.97,-0.46 2.61,-3.71 2.6,-1.75 0.39,-1.69 -0.53,-1.32 -2.9,-2.42 -3.33,-4.31 -3.17,-0.7 -4.22,1.3 -3.22,-0.87 -2.01,-1.99 0.75,-0.99 -0.25,-1.83 1.53,-5.96 5.21,-5.49 4.33,-2.52 0.87,-1.77 0.45,-1.62 -1.08,-7.53 0,0 0.58,-3.7 -0.45,-3.44 0.97,-2.34 8.31,-1.94 6.07,1.58 5.49,-5.11 2.32,-6.65 7.43,-10.08 3.41,-6.54 0.92,-5.54 2.66,-1.96 4.76,0.2 5.26,-1.06 1.72,-1.09 1.35,0.43 0.92,1.88 1.89,0.7 2.07,2.63 -1.15,4.55 2.79,6.46 1.72,1.96 0.58,2.34 2.51,0.7 2.35,2.26 2.23,-0.3 2.38,-3.38 1,-0.31 3.41,0.93 1.85,1.24 2.44,-1.95 1.22,0.18 1.04,1.32 1.17,-0.11 1.71,-3.37 -1.1,-3.99 0.56,-3.01 -1.79,-3.85 1.34,-2.26 -1.54,-3.38 0.01,-5.07 2.73,-2.42 6.77,0.21 1.28,-0.49 2.31,-4.45 2.86,-2.22 2.03,-4.73 0,0 1.67,0.62 3.24,-0.6 0,0 3.67,6.79 0.87,4.52 0,3.23 -2.75,6.64 1.78,1.41 -0.4,2.4 0.75,0.54 0.91,3.55 2.74,0.35 2.75,1.45 0.12,5.06 1.66,1.43 0.35,2.43 0.26,4.68 -0.57,1.91 0.48,2.9 -2.21,6.5 -1.57,2.01 -3.06,0.84 -1.52,-0.6 -1.21,1.4 0.28,4.22 2.18,2.44 -0.69,1.94 0.62,2.49 0,0 -0.84,8.2 -3.35,12.07 -3,2.14 -4.23,0.69 -7.29,3.52 -2.43,-0.55 -1.8,-2.37 -4.06,1.88 -3.17,0.31 -4.48,-1.21 -2.36,2.16 -1.19,4.23 0.66,1.79 -0.6,2.27 -4.85,4.32 -0.02,2.61 1.77,1.19 2.1,7.77 1.13,2.2 0.81,0.33 0.26,2.24 0.92,0.56 2,4.31 -0.04,1.36 2.43,1.19 3.84,-0.23 1.59,1.37 0.34,1.46 -3.74,2.65 -1.31,2.28 -3.4,-2.25 -1.13,1.18 -5.1,0.31 -2.38,1.3 -1.25,2.96 -1.43,1.48 -7.33,0.48 -2.97,1.76 1.41,1.23 0.42,3.75 4.15,2.59 0.49,2.76 -1.35,4.31 0.59,1.71 3.22,3.83 1.65,3.19 2.82,2.81 -1.36,1.7 0,2.36 3.39,3.55 4.91,3.19 2.64,3.08 -0.86,1.93 1.93,4.16 -0.78,2.13 1.39,0.52 1.3,1.74 1.52,0.2 0.23,3.31 -0.79,3.89 -4.79,3.76 -0.5,2.24 0,0 -2.1,2.62 -4.29,3.17 0.46,4.47 0,0 -1.79,0.17 -1.73,2.84 -3.32,1.38 -2.23,-0.1 -2.06,2.01 -3.29,-0.72 -2.83,3.27 -1.05,-0.17 -2.85,-3.11 -1.99,-0.29 -4.02,-4 -2.46,0.41 -1.57,1.63 -6.36,-0.35 -2.05,1.14 -2.66,0.38 -0.95,-0.31 -0.42,-1.21 -4.67,-1.83 -1.74,-1.38 -6.76,-2.38 -3.46,2.09 -0.22,0.83 0.05,5.71 0.75,1.27 -1.26,2.03 -0.51,2.91 1.51,3.02 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box mo'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Gasa</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_gasa['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_gasa['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_gasa['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_gasa['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_gasa['count_rows']; ?><br>
  </p><?php $id=4;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i>
</div>
" id="MO" class="cls-1 active-state" d="m 303.85556,123.00095 -4.77,-0.86 -1.48,-2.2 -4.36,-1.34 -3.97,-2.24 -3.24,-0.19 -6.79,-6.1 -2.58,-0.55 -4.74,2.91 -2.54,-0.3 -3.35,0.63 -3.88,2.01 -4.5,8.8 -3.19,1.97 -1.24,2.71 -3.41,1.99 -1.58,4.23 -3.24,1.86 -1.9,-3.85 -2.51,-1.53 -0.98,0.24 -1.5,1.25 -2.61,4.59 -2.07,0.73 1.06,2.46 -3.71,2.3 -3.74,-0.15 -2.04,0.85 -6.27,-2.37 -2.46,1.09 -3.71,-0.5 -1.91,3.17 0,0 -0.99,-0.21 -0.31,-0.9 -6.49,-1.39 -3,-2.89 0.68,-0.61 -0.48,-0.74 0.5,-0.68 -2.77,-5.32 0.36,-2.09 -0.49,-0.81 -6.25,0.02 -0.92,1.96 -1.57,0.8 -0.59,2.57 -1.67,1.92 -2.86,-1.34 -2,-2.27 -0.17,-1.5 -1.11,-1.15 1.92,-0.72 1.03,-1.16 -0.35,-1.32 0.72,-1.12 -0.43,-1.3 0.53,-0.76 -0.51,-0.91 1.26,-1.25 0.14,-1.79 -0.4,-2.31 -1.7,-3.16 2.57,-2.01 -0.09,-1.13 2.84,-2.48 0.17,-1.42 3.79,-2.59 1.64,-3.94 2.5,-1.44 3.44,-0.47 0.62,-1.81 -3.98,-1.77 -3.91,-0.53 -1.11,-1.08 -2.17,-0.66 -2.45,-2.33 -0.93,-2.54 0.75,-6.63 -0.93,-3.46 -1.28,-1.53 -5.16,-0.98 -2.28,-1.24 -2.53,-3.5 -4.16,-0.38 -2.89,-1.5 0,0 0.9,-1.35 3.66,-1.66 0.06,-1.93 -2.48,-2.85 0.1,-1.2 0.61,-0.95 2.64,-1.13 0.14,-1.85 1.91,-3.13 5.12,-4.94 0.84,-4.23 5.4,1.78 1.54,-0.64 3.05,-3.44 0.07,-3.44 4.79,-2.38 2.78,-4.86 2.31,-2.38 0.57,-4.05 3.86,-1.62 3.05,1.32 3.32,-2.63 2.78,1.8 1.52,-0.05 0.34,-1.02 2.48,-0.5 2.01,-2.57 1.1,-0.42 6.07,1.66 2.92,1.94 1.52,-0.3 1.29,-1.61 0.53,-3.72 1.47,-0.34 1.67,1.84 1.38,0.25 3.72,-2.81 0.94,-3.59 -1.34,-4.2 4.29,-2.65 1.58,-4.31 0.74,-0.32 1.34,0.82 0.53,2.1 2.37,-0.6 2.32,0.35 2.86,4.14 5.67,-1.06 2.15,2.62 1.34,3.72 2.68,2.67 1.92,4.38 2.95,0.61 2.41,-1.66 4.84,-0.31 0.45,0.25 -0.9,1.97 0.05,1.66 0.4,1.36 0.9,0.21 0.98,-0.51 2.68,-4.58 4.6,-0.61 2.72,2.02 1.57,2.87 4.06,1.56 1.52,1.26 1.3,4.89 2.81,2.57 1.48,-0.76 1.34,-2.97 1.87,-1.71 2.28,0.6 3.62,-0.3 4.71,5.54 3.48,0 0.76,-1.06 0.18,-2.67 -1.74,-3.72 1.83,-4.54 -1.92,-3.93 0.22,-0.61 2.06,-0.2 9.02,1.92 0.81,1.21 2.41,0.8 1.52,1.72 0.67,1.16 -0.36,2.97 2.1,0.91 1.25,1.36 8.22,3.27 4.42,-0.05 3,-4.08 5.38,-0.35 0.85,0.6 2.1,7.66 1.16,0.76 5.01,0.6 3.66,4.98 1.52,0.3 0.04,1.21 2.01,1.26 1.79,7.95 0.94,1.56 3.44,0.51 3.35,-2.52 2.72,1.16 2.5,-0.45 6.13,2.61 1.47,2.15 0,0 -2.03,4.73 -2.86,2.22 -2.31,4.45 -1.28,0.49 -6.77,-0.21 -2.73,2.42 -0.01,5.07 1.54,3.38 -1.34,2.26 1.79,3.85 -0.56,3.01 1.1,3.99 -1.71,3.37 -1.17,0.11 -1.04,-1.32 -1.22,-0.18 -2.44,1.95 -1.85,-1.24 -3.41,-0.93 -1,0.31 -2.38,3.38 -2.23,0.3 -2.35,-2.26 -2.51,-0.7 -0.58,-2.34 -1.72,-1.96 -2.79,-6.46 1.15,-4.55 -2.07,-2.63 -1.89,-0.7 -0.92,-1.88 -1.35,-0.43 -1.72,1.09 -5.26,1.06 -4.76,-0.2 -2.66,1.96 -0.92,5.54 -3.41,6.54 -7.43,10.08 -2.32,6.65 -5.49,5.11 -6.07,-1.58 -8.31,1.94 -0.97,2.34 0.45,3.44 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ga'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Sarpang</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sap['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sap['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sap['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sap['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_sap['count_rows']; ?><br>
  </p><?php $id=37;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a> 
</div>
<div class='map-popup-box ga'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Gelephu</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_gp['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_gp['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_gp['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_gp['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_gp['count_rows']; ?><br>
  </p><?php $id=23;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="GA" class="cls-1 active-state" d="m 419.74556,291.13095 0.61,4.16 3.17,1.84 0.46,1.79 2.36,-0.03 1.44,1.99 1.37,0.24 -0.58,1.06 1.04,1.61 3.32,-1.27 0.85,0.55 1.22,2.77 4.53,1.83 6.78,-3.35 1.66,2.04 2.57,0.3 3.68,3.87 -1.26,5.23 1.14,2.29 2.1,0.83 -0.76,4.24 1.35,4.23 -0.61,1.66 -1.97,2.04 1.06,4.52 2.48,1.21 -1.75,1.08 -3.27,4.95 -3.27,1.97 -2.01,6.07 -3.1,2.9 -0.25,1.49 -3.01,1.87 -1.01,1.77 0.76,2.52 -0.34,3.83 0.5,0.66 2.69,-0.19 3.43,1.87 6.78,0.28 2.27,1.96 1.75,0.37 1.18,1.4 0.08,2.8 0.76,0.75 5.44,-0.37 2.43,-1.03 1.42,-1.4 1.09,1.21 1.09,-0.37 0.59,-1.31 1,0 0.5,1.87 -0.5,3.08 1.17,2.52 -1.06,4.92 0,0 -5.85,-0.36 -2.83,1.75 -6.83,0.09 -4.8,-3.2 -2.25,-0.13 -4.86,1.69 -4.41,-4.55 -6.76,-1.53 -4.87,-0.01 -4.88,-0.9 -2.62,-2.85 -2.33,-1.14 -19.92,-14.69 -7.48,-6.73 -2.91,-0.99 -12.82,1.53 -2.18,5.14 -8,6.69 -2.39,0.69 -2.61,-0.06 -10.81,-2.48 -4.26,-0.08 -2.67,1.19 -4.73,5.41 -2.49,6.09 -0.24,2.96 1.34,7.28 -14.29,5.63 -17.04,5.15 -8.34,-0.31 -4.13,-1 0,0 1.51,-1.8 0.33,-1.68 1.01,-0.38 0.39,-3.04 -0.95,-1.12 0.73,-1.43 1,0 1.95,2.86 1.46,0.18 2.57,1.68 0.33,-0.43 -0.89,-1.37 -0.11,-3.8 0.55,-4.79 0.9,-1.92 -3.07,-5.23 0.31,-1.3 0,0 3.17,0.64 1.74,1.59 1.64,-0.2 3.47,-1.17 0.6,-4.13 2.64,-1.69 2.39,-0.96 0.43,0.86 2.32,0.87 2.04,-1.64 3.29,-0.57 0.33,-4.66 -0.69,-1.5 1.28,-1.85 1.57,-4.8 4.97,-3.4 0.41,-2.57 1.81,-1.67 2.88,-1.49 0.87,0.64 1.52,-1.58 -0.38,-2.41 0.64,-2.95 4.21,-3.97 1.21,-2.42 1.65,-0.23 3.28,-4.23 0.81,-5.14 0.03,-3.55 -0.58,-1.14 1.79,-1.82 3.01,-1.35 0.63,-3.74 -0.38,-1.93 3.11,-3.51 -0.7,-3.52 1,-2.72 2.93,-1.36 2.72,-3.69 5.37,-3.34 2.06,-0.4 2.24,1.13 1.49,-3.51 -1.04,-3.44 -3.26,-1.9 0,0 -0.46,-4.47 4.29,-3.17 2.1,-2.62 0,0 5.16,2.7 3.3,0.91 2.22,2.75 1.95,1.23 3.6,0.94 2.78,2.32 2.77,3.92 3.59,0.41 0.42,1.88 1.29,1.62 1.7,0.06 1.58,1.17 2.61,-0.86 0.6,-0.78 0.96,0.88 2.61,-0.2 0.9,1.88 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box ga'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Trongsa</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_trg['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_trg['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_trg['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_trg['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_trg['count_rows']; ?><br>
  </p><?php $id=18;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i>
</div>
" id="GA" class="cls-1 active-state" d="m 412.59556,128.38095 2.93,3.25 2.83,-1.1 3.88,1.58 3.13,4.59 0.05,1.52 1.57,2.43 -1.29,1.77 1.67,1.6 0.51,1.46 -0.31,3.13 -1.64,1.91 0.94,2.14 -0.36,1.2 -2.31,0.24 -0.71,0.99 -0.04,3.74 -0.8,2.77 0.43,1.99 -1.11,1.68 0.7,1.06 2.83,-0.05 -1.14,3.4 0.75,1.71 0.7,6.23 1.64,-0.12 0.73,0.92 0.75,6.86 1.99,6.19 1.8,2.12 -0.4,2.96 1.67,3.62 0.52,3.36 -2.1,2.01 1.64,4.73 2.76,2.22 6.39,0.29 1.23,0.69 0.27,2.53 11.38,3.53 1.75,2.94 2.82,1.91 1.28,2.81 1.44,0.24 1.28,1.43 1.69,0.26 1.52,2.42 0,0 0.35,0.33 0,0 2.07,3.86 0.19,2.25 -1.28,3.59 -2.34,3.42 -1.7,4.9 0.25,2.19 0.64,0.46 -0.6,3.8 0.41,2.59 -6.29,4.75 -12.27,3.45 -6.54,3.92 1.87,3.36 3.48,4.47 1.08,0.41 2.23,4.43 1.18,1.05 -4.57,-1.22 -5.43,1.79 -3.14,-0.56 -2.76,-2.82 -2.76,-0.47 -1.6,1.83 -3.09,0.59 -0.21,3.65 -3.97,-0.11 -2.23,1.44 -1.08,2.24 0,0 -3.38,-0.02 -0.9,-1.88 -2.61,0.2 -0.96,-0.88 -0.6,0.78 -2.61,0.86 -1.58,-1.17 -1.7,-0.06 -1.29,-1.62 -0.42,-1.88 -3.59,-0.41 -2.77,-3.92 -2.78,-2.32 -3.6,-0.94 -1.95,-1.23 -2.22,-2.75 -3.3,-0.91 -5.16,-2.7 0,0 0.5,-2.24 4.79,-3.76 0.79,-3.89 -0.23,-3.31 -1.52,-0.2 -1.3,-1.74 -1.39,-0.52 0.78,-2.13 -1.93,-4.16 0.86,-1.93 -2.64,-3.08 -4.91,-3.19 -3.39,-3.55 0,-2.36 1.36,-1.7 -2.82,-2.81 -1.65,-3.19 -3.22,-3.83 -0.59,-1.71 1.35,-4.31 -0.49,-2.76 -4.15,-2.59 -0.42,-3.75 -1.41,-1.23 2.97,-1.76 7.33,-0.48 1.43,-1.48 1.25,-2.96 2.38,-1.3 5.1,-0.31 1.13,-1.18 3.4,2.25 1.31,-2.28 3.74,-2.65 -0.34,-1.46 -1.59,-1.37 -3.84,0.23 -2.43,-1.19 0.04,-1.36 -2,-4.31 -0.92,-0.56 -0.26,-2.24 -0.81,-0.33 -1.13,-2.2 -2.1,-7.77 -1.77,-1.19 0.02,-2.61 4.85,-4.32 0.6,-2.27 -0.66,-1.79 1.19,-4.23 2.36,-2.16 4.48,1.21 3.17,-0.31 4.06,-1.88 1.8,2.37 2.43,0.55 7.29,-3.52 4.23,-0.69 3,-2.14 3.35,-12.07 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box mo'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Bumthang</h3>
  <p>
	Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_bt['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_bt['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_bt['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_bt['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_bt['count_rows']; ?><br>
  </p><?php $id=1;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="MO" class="cls-1 active-state" d="m 519.29556,230.09095 -1.41,3.22 -2.82,0.96 -1.13,1.32 -5.12,-0.7 -1.24,2.27 -5.22,0.04 -6.03,4.1 -0.66,0.01 -1.33,-1.99 -4.59,0.58 -3.57,-3.74 -0.94,-2.98 -2.8,-1.95 -2.61,-2.99 -2.36,-0.55 -5.71,0.73 -3.73,3.28 0,0 -0.17,-0.16 0,0 -1.52,-2.42 -1.69,-0.26 -1.28,-1.43 -1.44,-0.24 -1.28,-2.81 -2.82,-1.91 -1.75,-2.94 -11.38,-3.53 -0.27,-2.53 -1.23,-0.69 -6.39,-0.29 -2.76,-2.22 -1.64,-4.73 2.1,-2.01 -0.52,-3.36 -1.67,-3.62 0.4,-2.96 -1.8,-2.12 -1.99,-6.19 -0.75,-6.86 -0.73,-0.92 -1.64,0.12 -0.7,-6.23 -0.75,-1.71 1.14,-3.4 -2.83,0.05 -0.7,-1.06 1.11,-1.68 -0.43,-1.99 0.8,-2.77 0.04,-3.74 0.71,-0.99 2.31,-0.24 0.36,-1.2 -0.94,-2.14 1.64,-1.91 0.31,-3.13 -0.51,-1.46 -1.67,-1.6 1.29,-1.77 -1.57,-2.43 -0.05,-1.52 -3.13,-4.59 -3.88,-1.58 -2.83,1.1 -2.93,-3.25 0,0 -0.62,-2.49 0.69,-1.94 -2.18,-2.44 -0.28,-4.22 1.21,-1.4 1.52,0.6 3.06,-0.84 1.57,-2.01 2.21,-6.5 -0.48,-2.9 0.57,-1.91 -0.26,-4.68 -0.35,-2.43 -1.66,-1.43 -0.12,-5.06 -2.75,-1.45 -2.74,-0.35 -0.91,-3.55 -0.75,-0.54 0.4,-2.4 -1.78,-1.41 2.75,-6.64 0,-3.23 -0.87,-4.52 -3.67,-6.79 0,0 2.19,-1.98 0.45,-1.26 3.56,-1.61 5.21,1.81 2.72,2.05 4.51,1.33 2.72,2.2 0.73,2.05 4.15,1.81 3.25,-3.03 1.85,-2.91 2.58,0.28 2.69,-0.63 2.46,-2.27 4.15,-1.49 3.59,-3.97 2.87,-1.42 3.45,2.76 3.21,0.03 4.05,3.98 4.33,0.59 1.43,1.14 1.64,-0.99 1.29,2.09 1.15,0 1.64,-1.47 0,0 2.55,0.86 -0.76,3.98 0.22,3.12 1.75,1.05 -0.72,4.23 1.21,3.07 -0.81,4.08 -4.84,2.64 0.35,2.92 -2.51,3.16 -0.11,1.03 4.34,5.23 6.45,0.44 2.1,1.52 -0.36,2.27 0.85,3.38 3.29,7.19 0.04,2.78 -1.08,1.1 -0.16,1.33 1.72,1.66 1.79,-0.18 2.78,2.16 2.53,5.04 3.83,1.02 5.28,2.77 0.62,3.38 1.85,1.58 -0.41,2.86 2.21,5.06 -0.54,1.49 -1.9,1.01 -0.48,2.64 1.99,0.96 4.85,-0.44 5.5,4.65 3.84,4.16 -0.51,8.15 4.94,1.65 0.38,0.62 -5.31,6.57 0.33,1.13 -0.56,1.41 -1.63,2.02 0.84,1.86 -1.37,1.49 0.27,1.47 -1.87,1.99 3.68,5.8 -0.77,1.21 0.49,5.23 -1.77,2.22 0.59,2.64 4.98,2.52 2.73,4.31 -4.26,8.36 -3.49,3.76 0.3,1.85 3.26,2.8 0.89,3.33 0,0 0,1.13 -0.78,0.59 -4.74,-0.12 -0.87,1.45 -3.38,1.7 z"class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box mo'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Zhemgang</h3>
  <p>
	Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_zm['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_zm['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_zm['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_zm['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_zm['count_rows']; ?><br>
  </p><?php $id=21;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box mo'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Panbang</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_pb['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_pb['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_pb['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_pb['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_pb['count_rows']; ?><br>
  </p><?php $id=29;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="MO" class="cls-1 active-state"d="m 468.02556,231.70095 3.73,-3.28 5.71,-0.73 2.36,0.55 2.61,2.99 2.8,1.95 0.94,2.98 3.57,3.74 4.59,-0.58 1.33,1.99 0.66,-0.01 6.03,-4.1 5.22,-0.04 1.24,-2.27 5.12,0.7 1.13,-1.32 2.82,-0.96 1.41,-3.22 0,0 1.49,4.23 0.05,3.02 2.62,1.42 -0.13,6.45 1.33,1.19 0.07,3.59 1.7,1.78 -0.28,3.35 3.43,2.6 2.07,0.62 0.89,1.88 -0.71,3.37 0.33,1.78 3.29,4.16 -0.76,2.12 -0.26,6.92 -4.22,8.05 0.79,2.79 -0.61,4.4 0.4,2.08 2.02,2.08 2.95,1.01 1.5,11.3 5.12,1.76 4.92,0.46 2.5,3.54 -1.03,3.03 0.72,1.67 -0.79,3.52 1.63,2.28 -0.2,3.47 3.56,1.11 3.25,-0.18 3.03,2.05 0.44,3.69 0.9,0.92 2.83,1.89 0.85,-0.11 4.35,3.25 0,0 -0.2,1.65 -2.3,0.48 -0.95,1.07 0.36,1.3 -1.27,2.1 -0.54,2.6 0.82,2.39 -2.42,2.11 -3.9,0.98 -2.74,2.58 -3.55,-1.61 -1.66,-1.71 -3.5,2.04 -0.19,-2 -1.86,1.54 -7.16,3.17 -2.39,0.02 -1.07,-0.75 -2.2,1.05 -1.56,-0.21 -1.47,3.19 -1.69,0.92 0.75,2.54 -1.97,1.66 4.2,11.38 0,0 -3.77,-0.69 -23.25,2.52 -6.15,-0.26 -16.09,1.46 -8.5,0.1 0,0 1.06,-4.92 -1.17,-2.52 0.5,-1.03 -0.5,-3.92 -1,0 -0.59,1.31 -1.09,0.37 -1.09,-1.21 -1.42,1.4 -2.43,1.03 -5.44,0.37 -0.76,-0.75 -0.08,-2.8 -1.18,-1.4 -1.75,-0.37 -2.27,-1.96 -6.78,-0.28 -3.43,-1.87 -2.69,0.19 -0.5,-0.66 0.34,-3.83 -0.76,-2.52 1.01,-1.77 3.01,-1.87 0.25,-1.49 3.1,-2.9 2.01,-6.07 3.27,-1.97 3.27,-4.95 1.75,-1.08 -2.48,-1.21 -1.06,-4.52 1.97,-2.04 0.61,-1.66 -1.35,-4.23 0.76,-4.24 -2.1,-0.83 -1.14,-2.29 1.26,-5.23 -3.68,-3.87 -2.57,-0.3 -1.66,-2.04 -6.78,3.35 -4.53,-1.83 -1.22,-2.77 -0.85,-0.55 -3.32,1.27 -1.04,-1.61 0.58,-1.06 -1.37,-0.24 -1.44,-1.99 -2.36,0.03 -0.46,-1.79 -3.17,-1.84 -0.61,-4.16 0,0 1.08,-2.24 2.23,-1.44 3.97,0.11 0.21,-3.65 3.09,-0.59 1.6,-1.83 2.76,0.47 2.76,2.82 3.14,0.56 5.43,-1.79 4.57,1.22 -1.18,-1.05 -2.23,-4.43 -1.08,-0.41 -3.48,-4.47 -1.87,-3.36 6.54,-3.92 12.27,-3.45 6.29,-4.75 -0.41,-2.59 0.6,-3.8 -0.64,-0.46 -0.25,-2.19 1.7,-4.9 2.34,-3.42 1.28,-3.59 -0.19,-2.25 -2.07,-3.86 0,0 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box il'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Mongar</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_m['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_m['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_m['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_m['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_m['count_rows']; ?><br>
  </p><?php $id=8;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box il'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Weringla</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_w['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_w['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_w['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_w['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_w['count_rows']; ?><br>
  </p><?php $id=36;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="IL" class="cls-1 active-state" d="m 607.14556,172.23095 1.51,2.76 3.04,2.37 0.84,4.69 4.04,2.27 -0.12,2.63 5.82,6.05 3.12,5.43 1.71,1.45 1.48,0.21 1.07,4.13 1.81,1.7 0.61,4.72 1.51,2.29 -0.62,1.21 -1.93,1.05 -2.9,5.28 0,0 1.13,3.52 -2.46,2.71 4.9,1.76 4.17,5.66 1.62,0.56 2.35,-0.37 3.39,2.21 0.33,0.8 -0.8,1.58 2.73,3.11 0.06,3.87 -5.26,4.31 -3.02,0.8 -1.48,2.38 -2.46,0.54 -0.99,1.86 -5.08,1.43 -1.69,3.54 -4.31,4.03 -0.74,2.32 0.73,3.12 -0.87,1.05 0.99,3.87 -3.02,1.14 -1.27,3.16 0.45,0.24 -0.33,1.93 0,0 -1.26,0.77 0.07,1.53 -1.33,1.66 -1.48,1.01 0.87,2.12 -0.8,1.11 0.87,0.7 -0.17,1.2 1.33,0.37 -0.01,1.22 -0.48,0.64 -1.8,-0.07 -0.33,1.44 -1.62,0.64 -0.29,1.37 1.02,0.79 -1.96,0.31 -1.15,4.21 0.38,1.5 -2.83,1.62 -4.63,-0.36 -1.45,2.45 -1.38,-0.68 -2.22,2.21 -2.18,1.04 -3.66,-0.1 -3.48,1.64 -3.69,0.53 -0.3,2.64 -2.89,2.03 -0.37,3.13 -1.76,1.46 -0.41,2.91 -4.67,4.45 -0.7,5.1 -4.05,2.28 -0.15,3.2 1.09,2.96 0,0 -4.35,-3.25 -0.85,0.11 -2.83,-1.89 -0.9,-0.92 -0.44,-3.69 -3.03,-2.05 -3.25,0.18 -3.56,-1.11 0.2,-3.47 -1.63,-2.28 0.79,-3.52 -0.72,-1.67 1.03,-3.03 -2.5,-3.54 -4.92,-0.46 -5.12,-1.76 -1.5,-11.3 -2.95,-1.01 -2.02,-2.08 -0.4,-2.08 0.61,-4.4 -0.79,-2.79 4.22,-8.05 0.26,-6.92 0.76,-2.12 -3.29,-4.16 -0.33,-1.78 0.71,-3.37 -0.89,-1.88 -2.07,-0.62 -3.43,-2.6 0.28,-3.35 -1.7,-1.78 -0.07,-3.59 -1.33,-1.19 0.13,-6.45 -2.62,-1.42 -0.05,-3.02 -1.49,-4.23 0,0 -0.64,-0.81 3.38,-1.7 0.87,-1.45 4.74,0.12 0.78,-0.59 0,-1.13 0,0 2.11,0.79 3.28,-0.12 5.04,2.14 1.5,-0.27 1.2,-2.62 2.3,-0.59 4.07,-4.62 2.81,-1.62 4.69,-4.19 3.75,1.42 1.61,-0.59 8.21,1.54 1.47,4.8 3.49,4.32 3.88,-3.18 2.17,-0.29 3.23,-2.52 4.12,-1.12 2.97,-2.74 3.17,-0.45 3.83,-7.48 0.31,-4.85 -0.54,-1.48 -2.62,-2.07 -0.89,-3.15 1.48,-3.52 2.81,-1.36 1.42,-2.28 6.5,-3.08 -0.72,-3.16 -1.64,-2.1 1.26,-4 1.6,-1.67 z"  class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box il'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Pemagatshel</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_pg['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_pg['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_pg['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_pg['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_pg['count_rows']; ?><br>
  </p><?php $id=9;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box il'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Nganglam</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_ngl['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_ngl['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_ngl['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_ngl['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_ngl['count_rows']; ?><br>
  </p><?php $id=27;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="IL" class="cls-1 active-state" d="m 617.20556,281.60095 4.04,1.17 3.89,-1.49 8.04,0.61 -0.43,-2.22 1.74,-0.71 3.71,1.42 2.9,5.48 -0.67,3.6 0.81,1.46 -0.31,0.55 -2.15,-0.21 -0.17,0.56 4.44,2.15 1.59,1.5 1.09,4.21 1.59,0.75 0,4.12 0.67,0.75 3.77,-1.13 1.67,1.69 1.76,-0.1 1.84,1.78 -3.26,7.48 -1.01,1.22 -1.76,0.56 0.4,2.57 0,0 -1.01,1.08 -2.05,-0.31 -1.29,-2.14 -2.11,-0.82 -1.93,0.98 -2.25,2.73 -3.34,-0.23 -0.73,4.13 -5.74,6.93 0.01,5.78 1.06,2.71 -4.58,7.77 -2.88,0.65 -3.71,4.72 0.15,8.87 -2.6,1.39 0.96,2.13 4.52,2.32 0,0 -1.47,0.11 -5.27,8.8 -4.69,3.15 -5.47,2.57 -9.69,-1.44 -7.68,-5.19 -5.97,-1.04 -8.11,0.06 -5.16,-0.71 -11.88,0.78 -5.62,-1.5 -2.15,-1.46 -1.76,0.35 -3.17,4.7 -5.07,5.49 -2.93,0.12 -6.91,-1.73 0,0 -4.2,-11.38 1.97,-1.66 -0.75,-2.54 1.69,-0.92 1.47,-3.19 1.56,0.21 2.2,-1.05 1.07,0.75 2.39,-0.02 7.16,-3.17 1.86,-1.54 0.19,2 3.5,-2.04 1.66,1.71 3.55,1.61 2.74,-2.58 3.9,-0.98 2.42,-2.11 -0.82,-2.39 0.54,-2.6 1.27,-2.1 -0.36,-1.3 0.95,-1.07 2.3,-0.48 0.2,-1.65 0,0 -1.09,-2.96 0.15,-3.2 4.05,-2.28 0.7,-5.1 4.67,-4.45 0.41,-2.91 1.76,-1.46 0.37,-3.13 2.89,-2.03 0.3,-2.64 3.69,-0.53 3.48,-1.64 3.66,0.1 2.18,-1.04 2.22,-2.21 1.38,0.68 1.45,-2.45 4.63,0.36 2.83,-1.62 -0.38,-1.5 1.15,-4.21 1.96,-0.31 -1.02,-0.79 0.29,-1.37 1.62,-0.64 0.33,-1.44 1.8,0.07 0.48,-0.64 0.01,-1.22 -1.33,-0.37 0.17,-1.2 -0.87,-0.7 0.8,-1.11 -0.87,-2.12 1.48,-1.01 1.33,-1.66 -0.07,-1.53 z"  class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box mo'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Lhuntse</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_lhun['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_lhun['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_lhun['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_lhun['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_lhun['count_rows']; ?><br>
  </p><?php $id=7;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="MO" class="cls-1 active-state" d="m 605.51556,46.72095 0,3.3 0.63,0.63 4.53,0.16 5.03,4.72 3.21,0.08 2.16,2.51 3.98,0.32 3.98,2.2 4.82,0.24 0.69,0.7 -0.27,1.42 1.11,1.42 0.7,3.3 1.05,0.7 0,0 -3.49,3.46 -4.75,-1.41 -2.51,1.26 -3.84,7.07 -3.84,4.09 -1.12,0.55 -2.58,-0.16 -1.92,4.19 -0.16,1.06 1.3,1.91 -0.24,7.64 -1.6,7.66 1.52,5.35 0.21,4.56 -2.97,6.65 1.28,3.05 -0.36,4.05 -1.8,4.27 -2.13,2.7 0.39,3.27 2.53,5.35 -0.58,2.2 -2.16,2.17 1.62,6.33 -0.85,5.59 1.67,3.27 -1.08,2.62 -1.34,1.23 -1.19,3.83 0,0 -0.85,2.19 -1.6,1.67 -1.26,4 1.64,2.1 0.72,3.16 -6.5,3.08 -1.42,2.28 -2.81,1.36 -1.48,3.52 0.89,3.15 2.62,2.07 0.54,1.48 -0.31,4.85 -3.83,7.48 -3.17,0.45 -2.97,2.74 -4.12,1.12 -3.23,2.52 -2.17,0.29 -3.88,3.18 -3.49,-4.32 -1.47,-4.8 -8.21,-1.54 -1.61,0.59 -3.75,-1.42 -4.69,4.19 -2.81,1.62 -4.07,4.62 -2.3,0.59 -1.2,2.62 -1.5,0.27 -5.04,-2.14 -3.28,0.12 -2.11,-0.79 0,0 -0.89,-3.33 -3.26,-2.8 -0.3,-1.85 3.49,-3.76 4.26,-8.36 -2.73,-4.31 -4.98,-2.52 -0.59,-2.64 1.77,-2.22 -0.49,-5.23 0.77,-1.21 -3.68,-5.8 1.87,-1.99 -0.27,-1.47 1.37,-1.49 -0.84,-1.86 1.63,-2.02 0.56,-1.41 -0.33,-1.13 5.31,-6.57 -0.38,-0.62 -4.94,-1.65 0.51,-8.15 -3.84,-4.16 -5.5,-4.65 -4.85,0.44 -1.99,-0.96 0.48,-2.64 1.9,-1.01 0.54,-1.49 -2.21,-5.06 0.41,-2.86 -1.85,-1.58 -0.62,-3.38 -5.28,-2.77 -3.83,-1.02 -2.53,-5.04 -2.78,-2.16 -1.79,0.18 -1.72,-1.66 0.16,-1.33 1.08,-1.1 -0.04,-2.78 -3.29,-7.19 -0.85,-3.38 0.36,-2.27 -2.1,-1.52 -6.45,-0.44 -4.34,-5.23 0.11,-1.03 2.51,-3.16 -0.35,-2.92 4.84,-2.64 0.81,-4.08 -1.21,-3.07 0.72,-4.23 -1.75,-1.05 -0.22,-3.12 0.76,-3.98 -2.55,-0.86 0,0 1.08,-2.81 1.11,-0.86 0.49,-2.42 2.03,-0.87 1.26,1.18 2.93,0.79 -0.35,2.91 1.82,0.86 1.18,0.48 4.47,-0.79 8.66,3.22 -0.07,3.15 0.97,0.39 3.63,-0.7 0.91,-3.78 1.33,-0.63 1.39,0.32 4.47,3.38 0.98,1.34 0.56,2.91 3.69,3.14 1.19,0.24 1.26,-0.71 1.46,-4.48 0.91,-0.79 5.85,-0.81 0.81,0.2 2.16,3.5 1.88,1.3 1.61,-0.4 1.15,3.03 0.77,0.36 1.43,-0.28 1.42,0.69 0.64,-0.53 0.23,-2.52 5.14,1.15 1.34,-0.7 2.45,2.01 3.62,-0.87 2.34,0.83 1.88,-0.24 3.56,2.13 1.4,-1.34 3.07,-1.1 2.37,1.33 3.21,0.16 6.93,-4.79 2.09,-2.68 1.26,0.24 2.51,-2.6 4.68,-1.65 0.76,-2.36 4.19,-5.5 1.61,-4.57 2.72,0.32 2.72,-0.95 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/>
<path data-info="
<div class='map-popup-box mi'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Tashi Yangtse</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_ty['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_ty['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_ty['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_ty['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_ty['count_rows']; ?><br>
  </p><?php $id=16;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div>
" id="MI" class="cls-1 active-state" d="m 684.68556,196.14095 3.21,-0.29 0.71,-1.91 1.85,-0.55 4.36,2.64 0.75,4.64 1.88,1.65 2.9,0.71 3.86,-1.87 4.15,-0.66 0.66,2.44 0,0 -1.92,5.17 -2.14,2.83 -3.68,0.43 -2.48,-0.93 -10.31,4.3 -3.65,0.17 -2.52,2.46 -2.5,1.19 -7.59,-0.12 -6.72,8.2 -5.49,1.15 -0.91,1.72 -2.37,0.26 -4.54,-2.61 -6.1,-1.05 -2,-1.51 -1.52,0.28 -6.17,-3.57 -6,-1.36 -2.27,0.52 0,0 2.9,-5.28 1.93,-1.05 0.62,-1.21 -1.51,-2.29 -0.61,-4.72 -1.81,-1.7 -1.07,-4.13 -1.48,-0.21 -1.71,-1.45 -3.12,-5.43 -5.82,-6.05 0.12,-2.63 -4.04,-2.27 -0.84,-4.69 -3.04,-2.37 -1.51,-2.76 0,0 1.19,-3.83 1.34,-1.23 1.08,-2.62 -1.67,-3.27 0.85,-5.59 -1.62,-6.33 2.16,-2.17 0.58,-2.2 -2.53,-5.35 -0.39,-3.27 2.13,-2.7 1.8,-4.27 0.36,-4.05 -1.28,-3.05 2.97,-6.65 -0.21,-4.56 -1.52,-5.35 1.6,-7.66 0.24,-7.64 -1.3,-1.91 0.16,-1.06 1.92,-4.19 2.58,0.16 1.12,-0.55 3.84,-4.09 3.84,-7.07 2.51,-1.26 4.75,1.41 3.49,-3.46 0,0 1.46,0.4 1.99,3.79 -1.34,5.09 1.25,1.7 3.61,0.76 2.93,2.64 2.43,1.22 4.02,0.76 0.83,3.67 1.35,2.17 3.18,-0.09 2.34,-2.08 3.35,-1.69 0.17,1.51 1.51,1.41 2.18,1.13 3.1,0.19 0.5,1.98 -0.34,2.45 -1,3.2 -1.53,1.72 -1.35,-0.6 -2.12,0.56 -3.91,-1.67 -2.69,2.8 -2.14,-1.13 -0.96,1.08 4.79,9.23 1.76,0.69 2.63,-1.6 3.44,-0.55 6.88,5.29 0.7,7.72 1.99,1.68 0.1,1.9 -2.44,2.9 0.49,5.19 -2.48,9.37 -5.34,2.9 -3.04,5.25 -2.41,1.88 -1.96,0.33 -2.13,5.01 -0.68,3.35 4.6,5.48 -3.53,5.09 1.41,3.01 2.68,2.25 -0.1,2.86 3.59,3.23 2.22,-0.86 1.43,0.41 0.17,2.26 1.58,3.2 6.89,5.13 0.78,3.76 1.37,0.46 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/> 
<path data-info="
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Trashigang</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_tg['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_tg['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_tg['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_tg['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_tg['count_rows']; ?><br>
  </p><?php $id=15;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Sakteng</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sk['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sk['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sk['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sk['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_sk['count_rows']; ?><br>
  </p><?php $id=31;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div><br />
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Thrimshing</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_tm['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_tm['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_tm['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_tm['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_tm['count_rows']; ?><br>
  </p><?php $id=34;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Wamrong</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_wm['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_wm['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_wm['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_wm['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_wm['count_rows']; ?><br>
  </p><?php $id=35;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
" id="OH" class="cls-1 active-state" d="m 748.49556,204.09095 2.27,0.81 1.95,-0.1 2.21,-1.19 3.65,0 1.4,-1.81 0.72,-3.16 6.11,-0.69 0.56,4.17 -0.71,2.65 0.57,2.74 1.11,1.58 3.48,1.34 1.22,2.94 -0.44,3.29 2.55,2.28 0.36,1.06 -1.97,5.49 0.07,2.86 0.47,2.65 2.78,3.42 -0.34,4.75 4.51,4.44 5.78,2.32 3.45,2.27 0.77,1.38 -0.37,3.07 -4.09,1.78 -1.54,-1.03 -2.79,0.26 -3.08,-1.4 -7.14,2.81 0.08,1.28 6.06,4.42 0.91,5.6 -0.68,2.28 -2.23,3.11 -0.24,3.54 -1.21,1.38 -1.66,0.56 0,0 -2.29,-0.83 -9.24,0.05 -5.26,-2.48 -0.6,-0.71 0.02,-2.09 -2.07,-2.99 -1.65,-6.41 -1.73,-1.4 -2.01,-0.18 -1.92,2.1 -0.41,1.36 0.51,2.93 -0.66,3.67 0.81,2.05 -1.14,8.54 0.38,2.59 -4.2,-1.44 -1.74,0.42 -0.57,1.03 -2.71,-0.84 -6.99,1.52 -2.35,1.58 -3.52,0.68 -4.04,3.66 -1.32,2.75 -1.14,0.93 -0.64,2.22 -2.8,2.46 -0.61,1.83 -1.68,1.65 -3.72,1.06 -3.11,-0.5 -1.97,0.62 -1.43,1.63 -2.3,-0.75 -3.69,2.12 -2.4,-0.27 -5.2,2 -3,2.79 -4.7,1.36 -2.65,-0.5 -1.77,-1.65 -3.12,-0.07 -2.36,-1.07 -0.94,2.43 -2.38,1.43 -5.48,1.47 -3.64,3.13 -6.22,2.25 0,0 -0.4,-2.57 1.76,-0.56 1.01,-1.22 3.26,-7.48 -1.84,-1.78 -1.76,0.1 -1.67,-1.69 -3.77,1.13 -0.67,-0.75 0,-4.12 -1.59,-0.75 -1.09,-4.21 -1.59,-1.5 -4.44,-2.15 0.17,-0.56 2.15,0.21 0.31,-0.55 -0.81,-1.46 0.67,-3.6 -2.9,-5.48 -3.71,-1.42 -1.74,0.71 0.43,2.22 -8.04,-0.61 -3.89,1.49 -4.04,-1.17 0,0 0.33,-1.93 -0.45,-0.24 1.27,-3.16 3.02,-1.14 -0.99,-3.87 0.87,-1.05 -0.73,-3.12 0.74,-2.32 4.31,-4.03 1.69,-3.54 5.08,-1.43 0.99,-1.86 2.46,-0.54 1.48,-2.38 3.02,-0.8 5.26,-4.31 -0.06,-3.87 -2.73,-3.11 0.8,-1.58 -0.33,-0.8 -3.39,-2.21 -2.35,0.37 -1.62,-0.56 -4.17,-5.66 -4.9,-1.76 2.46,-2.71 -1.13,-3.52 0,0 2.27,-0.52 6,1.36 6.17,3.57 1.52,-0.28 2,1.51 6.1,1.05 4.54,2.61 2.37,-0.26 0.91,-1.72 5.49,-1.15 6.72,-8.2 7.59,0.12 2.5,-1.19 2.52,-2.46 3.65,-0.17 10.31,-4.3 2.48,0.93 3.68,-0.43 2.14,-2.83 1.92,-5.17 0,0 8.98,-2 4.47,0.95 4.85,-3.57 3.26,0.13 2.16,2.43 4.4,-0.11 1.77,1.31 5.68,-0.81 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/> 
<path data-info="
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Samdrup Jongkhar</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_sj['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_sj['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_sj['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_sj['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_sj['count_rows']; ?><br>
  </p><?php $id=12;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Jomotshangkha</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_jt['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_jt['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php echo $pd_jt['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_jt['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_jt['count_rows']; ?><br>
  </p><?php $id=24;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a><i class='fa fa-times'></i> 
</div><br />
<div class='map-popup-box oh'>
  <h3><i class='fas fa-map-marker-alt mr-1' style='color:red;'></i>&nbsp;&nbsp;Samdrupcholing</h3>
  <p>
    Opening Balance:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $op_smd['count_rows']; ?><br>
    Registered:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rd_smd['count_rows']; ?><br>
    Pending:&nbsp;&nbsp;&nbsp;<?php  echo $pd_smd['count_rows']; ?><br>
    Decided:&nbsp;&nbsp;<?php echo $dd_smd['count_rows']; ?><br>
    Appealed:&nbsp;&nbsp;<?php echo $ap_smd['count_rows']; ?><br>
  </p><?php $id=30;?>
  <a href='<?php echo site_url ('welcome/casetype/'.$id.''); ?>'>Click here to view detailed information</a>
</div>
" id="OH" class="cls-1 active-state"  d="m 651.39556,319.37095 6.22,-2.25 3.64,-3.13 5.48,-1.47 2.38,-1.43 0.94,-2.43 2.36,1.07 3.12,0.07 1.77,1.65 2.65,0.5 4.7,-1.36 3,-2.79 5.2,-2 2.4,0.27 3.69,-2.12 2.3,0.75 1.43,-1.63 1.97,-0.62 3.11,0.5 3.72,-1.06 1.68,-1.65 0.61,-1.83 2.8,-2.46 0.64,-2.22 1.14,-0.93 1.32,-2.75 4.04,-3.66 3.52,-0.68 2.35,-1.58 6.99,-1.52 2.71,0.84 0.57,-1.03 1.74,-0.42 4.2,1.44 -0.38,-2.59 1.14,-8.54 -0.81,-2.05 0.66,-3.67 -0.51,-2.93 0.41,-1.36 1.92,-2.1 2.01,0.18 1.73,1.4 1.65,6.41 2.07,2.99 -0.02,2.09 0.6,0.71 5.26,2.48 9.24,-0.05 2.29,0.83 0,0 -3.02,2.54 -0.07,2.3 1.68,7.22 -0.42,2.38 -2.3,4.47 1.88,3.98 -0.07,2.73 1.36,5.5 2.34,2.28 2.41,0.04 5.9,3.16 -0.94,3.15 0.27,2.5 5.69,3.08 0.7,7.38 3.52,2.5 0.21,3.66 -1.67,1.48 -0.14,0.93 1.04,2.34 -0.76,5.61 1.18,2.49 -1.18,3.89 -3.08,3.35 0,3.89 -1.25,1.09 -9.5,4.44 -3.35,0.15 -3.93,-1.47 -8.19,-1.39 -5.02,-3.05 -3.02,-2.79 -1.39,-2.66 -2.81,-1.87 -10.5,-5.56 -1.96,-0.1 -8.32,1.11 -5.07,9.39 -7.02,6.37 -17.61,10.33 -6.96,0.18 -2.35,1.77 -1.87,0.09 -6.03,-2.7 -6.99,-1.63 -7.75,4.33 -23,3.92 -3.41,-0.53 -16.4,-11.45 0,0 -4.52,-2.32 -0.96,-2.13 2.6,-1.39 -0.15,-8.87 3.71,-4.72 2.88,-0.65 4.58,-7.77 -1.06,-2.71 -0.01,-5.78 5.74,-6.93 0.73,-4.13 3.34,0.23 2.25,-2.73 1.93,-0.98 2.11,0.82 1.29,2.14 2.05,0.31 z" class=" mapsvg-region" style="background: #f98c0f; stroke: #e7e7e7; " transform="translate(0 0)"/> 
</g>
</svg>

<!--trafficlight-->
<div class="container-fluid" style="margin-top: -2cm;">
<div class="row">
<div class="col-12"> 
<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<div class="container" style="background-color: #e6e6e6;">
<div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success" style="padding: 5px 5px;">
              <p>Cases Registered and Unclosed for</br><b> 3 </b>Months or More</p>
              <?php $id=3;?>
              <a href="<?php echo site_url ('welcome/trafficlight/'.$id.''); ?>" style="color: black;">Click to view <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning" style="padding: 5px 5px;">
              <p>Cases Registered and Unclosed for</br><b> 6 </b>Months or More</p>
              <?php $id2=6;?>
              <a href="<?php echo site_url ('welcome/trafficlight/'.$id2.''); ?>" style="color: black;">Click to view <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger" style="padding: 5px 5px;">
              <?php $id3=9;?>
              <p>Cases Registered and Unclosed for</br><b> 9 </b>Months or More</p>
              <a href="<?php echo site_url ('welcome/trafficlight/'.$id3.''); ?>" style="color: black;">Click to view <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="padding: 5px 5px;">
              <?php $id4=1;?>
              <p>Cases Registered and Unclosed for</br><b> 12 </b>Months or More</p>
              <a href="<?php echo site_url ('welcome/trafficlight/'.$id4.''); ?>" style="color: black;">Click to view <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

<!--piechart-->
<div class="col-xs-12 col-md-6">
<br />
<div class="card bg-gradient-info">     
<style type="text/css">
  body 
  {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  }
  .card {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    margin-bottom: 1rem;
  }
  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
</style>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script>
// Create chart instance
var chart = am4core.create("chartdiv1", am4charts.PieChart);
// Add data
chart.data = [
{
  "country": "Thimphu",
  "litres": <?php echo $t['count_rows']; ?> 
}, 
{
  "country": "Chhukha",
  "litres": <?php echo $c['count_rows']; ?>
}, 
{
  "country": "Paro",
  "litres":<?php echo $h['count_rows']; ?>
}, 
{
  "country": "Bumthang",
  "litres": <?php echo $b['count_rows']; ?>
}, 
{
  "country": "Punakha",
  "litres": <?php echo $p['count_rows']; ?>
}, 
{
  "country": "Gasa",
  "litres": <?php echo $g['count_rows']; ?>
},
{
  "country": "Dagana",
  "litres": <?php echo $d['count_rows']; ?>
},
{
  "country": "Lhuntse",
  "litres": <?php echo $l['count_rows']; ?> 
},
{
  "country": "Mongar",
  "litres": <?php echo $m['count_rows']; ?>
},
{
  "country": "Pemagatshel",
  "litres": <?php echo $pg['count_rows']; ?>
},
{
  "country": "Samtse",
  "litres": <?php echo $sam['count_rows']; ?>
},
{
  "country": "S/Jongkhar",
  "litres": <?php echo $sj['count_rows']; ?>
},
{
  "country": "Trashigang",
  "litres": <?php echo $tg['count_rows']; ?>
},
{
  "country": "Tashiyangtse",
  "litres": <?php echo $ty['count_rows']; ?>
},
{
  "country": "Tsirang",
  "litres": <?php echo $tsirang['count_rows']; ?>
}, 
{
  "country": "Wangduephodrang",
  "litres": <?php echo $wangdi['count_rows']; ?>
}, 
{
  "country": "Trongsa",
  "litres": <?php echo $trongsa['count_rows']; ?>
},
{
  "country": "Sarpang",
  "litres": <?php echo $sarpang['count_rows']; ?> 
}, 
{
  "country": "Zhemgang",
  "litres": <?php echo $z['count_rows']; ?>
}, 
{
  "country": "Haa",
  "litres": <?php echo $haa['count_rows']; ?>
}
];
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 1;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.labels.template.paddingTop = 0;
pieSeries.labels.template.paddingBottom = 0;
pieSeries.labels.template.fontSize = 10;
///////
// Create chart instance
var chart = am4core.create("chartdiv11", am4charts.PieChart);
// Add data
chart.data = [{
  "country": "Thimphu",
  "litres": <?php echo $tcr['count_rows']; ?>
}, {
  "country": "Chhukha",
  "litres": <?php echo $ccr['count_rows']; ?>
}, {
  "country": "Paro",
  "litres":<?php echo $hcr['count_rows']; ?>
}, {
  "country": "Bumthang",
  "litres": <?php echo $bcr['count_rows']; ?>
}, {
  "country": "Punakha",
  "litres": <?php echo $pcr['count_rows']; ?>
}, {
  "country": "Gasa",
  "litres": <?php echo $gcr['count_rows']; ?>
},{
  "country": "Dagana",
  "litres": <?php echo $dcr['count_rows']; ?>
},{
  "country": "Lhuntse",
  "litres": <?php echo $lcr['count_rows']; ?>
},{
  "country": "Mongar",
  "litres": <?php echo $mcr['count_rows']; ?>
},{
  "country": "Pemagatshel",
  "litres": <?php echo $pgcr['count_rows']; ?>
},{
  "country": "Samtse",
  "litres": <?php echo $samcr['count_rows']; ?>
},{
  "country": "S/Jongkhar",
  "litres": <?php echo $sjcr['count_rows']; ?>
},{
  "country": "Trashigang",
  "litres": <?php echo $tgcr['count_rows']; ?>
}, {
  "country": "Tashiyangtse",
  "litres": <?php echo $tycr['count_rows']; ?>
},{
  "country": "Tsirang",
  "litres": <?php echo $tsirangcr['count_rows']; ?>
}, {
  "country": "Wangduephodrang",
  "litres": <?php echo $wangdicr['count_rows']; ?>
}, {
  "country": "Trongsa",
  "litres": <?php echo $trongsacr['count_rows']; ?>
},{
  "country": "Sarpang",
  "litres": <?php echo $sarpangcr['count_rows']; ?>
}, {
  "country": "Zhemgang",
  "litres": <?php echo $zcr['count_rows']; ?>
},  {
  "country": "Haa",
  "litres": <?php echo $haacr['count_rows']; ?>
}];
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 1;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.labels.template.paddingTop = 0;
pieSeries.labels.template.paddingBottom = 0;
pieSeries.labels.template.fontSize = 10;
</script>
<div class="card-header border-0 ui-sortable-handle" style="cursor: move; background-color: #a8a0a0;">
      <h5 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i><b>Civil Cases <?php echo date("Y");?></b>
      </h5>
</div>
<div id="chartdiv1" style=" width: 100%; height: 300px;" ></div>
</div>
</div>
<div class="col-xs-12 col-md-6">
<br />
<div class="card bg-gradient-info">
<div class="card-header border-0 ui-sortable-handle" style="cursor: move; background-color: #a8a0a0;">
      <h5 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i><b>Criminal Cases <?php echo date("Y");?></b>
      </h5>
  </div>

<div id="chartdiv11" style=" width: 100%; height: 300px;"></div>
</div>
</div>
<!--piechart_end-->
<!--YEARWISEMONTHWISE_PIECHART_REGISTRATION-->

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>
  <div class="col-xs-12 col-md-6"><div class="card bg-gradient-info">
    <div id="year_piereg" style="width: 400px; height: 400px; margin: 0 auto"></div>
  </div></div>
  <div class="col-xs-12 col-md-6"><div class="card bg-gradient-info">
    <div id="month_piereg" style="width: 400px; height: 400px; margin: 0 auto"></div>
  </div></div>
<script language="JavaScript">
  google.charts.setOnLoadCallback(monthWiseregChart);
  google.charts.setOnLoadCallback(yearWiseregChart); 
  //for month wise
  function monthWiseregChart() 
  {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Users Count'],
            <?php 
             foreach ($month_wisereg as $row){
             echo "['".$row->month_name."',".$row->count."],";
             }
             ?>
        ]);
        var options = {
            title: 'Month Wise Registered Cases Of Current Year <?php echo date("Y")?>',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('month_piereg'));
        chart.draw(data, options);
  }
  // for year wise
  function yearWiseregChart() 
  {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Users Count'],
        <?php 
         foreach ($year_wisereg as $row){
         echo "['".$row->year."',".$row->count."],";
         }
         ?>
    ]);
    var options = {
        title: 'Total Year Wise Registered Cases',
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('year_piereg'));
    chart.draw(data, options);
  }
</script>
<!--YEARWISEMONTHWISE_REGISTRATION_PIECHART_END-->
<!--TABLE-->
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped">
    <h4 style="background-color: #a6a6a6;padding: 5px;">Report Categories [CMS reports]</h4>
      <tbody>
      <tr>
      <th style="width:5%">1.</th>
      <td><a href="index.php/reports/cj_general/" title="Edit" target="_blank"><i class="fas fa-inbox">  </i>&nbsp;&nbsp;Overall Report</a></td>
      </tr>
      <tr>
      <th>2.</th>
      <td><a href="index.php/reports/chart_pc" title="Edit" target="_blank"><i class="fas fa-inbox"> </i>&nbsp;&nbsp;Pending Cases (Chart)</a></td>
      </tr>
      <tr>
      <th>3.</th>
      <td><a href="index.php/reports/chart_rc" title="Edit" target="_blank"><i class="fas fa-inbox"> </i>&nbsp;&nbsp;Registered Cases (Chart)</a></td>
      </tr>
      <tr>
      <th>4.</th>
      <td><a href="index.php/reports/chart_dc" title="Edit" target="_blank"><i class="fas fa-inbox"> </i>&nbsp;&nbsp;Decided Cases (Chart)</a></td>
      </tr>
      <tr>
      </tr>
      </tbody>
    </table>
    </div>
    <style type="text/css">
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    </style>
<!--TABLE_END-->


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--trafficlight end-->


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script id="rendered-js" >
$("path.active-state").hover(function (e) {
  $('#info-box').html($(this).data('info'));
});
$('.active-state').click(function (e) {
  $('#info-box').css('display', 'block');
  $('#info-box').css('top', e.pageY - $('#info-box').height() - 30);
  $('#info-box').css('left', e.pageX - $('#info-box').width() / 2);
});
$("#info-box .fa").click(function () {
  $('#info-box').css('display', 'none');
  alert("Handler for .click() called.");
});
window.setInterval(function () {
  $('.map-popup-box .fa').click(function () {
    $('#info-box').css('display', 'none');
  });100;});
</script>
<script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-bb9a2ba1f03f6147732cb3cd52ac86c6b24524aa87a05ed0b726f11e46d7e277.js"></script>
</body>
</html>






<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
  {
  box-sizing: border-box;
}
</style> 
<style type="text/css"> 
  .pingasa {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 36%;
  top: 160%;
  margin: -8px 0 0 -8px;
}
.pingasa:after {
   content: 'Gasa'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinthi {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 32%;
  top: 190%;
  margin: -8px 0 0 -8px;
}
.pinthi:after {
   content: 'HC'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinlin {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 34%; top: 220%; margin: -8px 0 0 -8px;
}
.pinlin:after {
   content: 'Lingzhi'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinsc {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 34%; top: 210%; margin: -8px 0 0 -8px;
}
.pinsc:after {
  content: 'SC'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinhc {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 34%; top: 229%; margin: -8px 0 0 -8px;
}
.pinhc:after {
  content: 'Thimphu'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinhclb {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 33%; top: 201%; margin: -8px 0 0 -8px;
}
.pinhclb:after {
  content: 'HCLB'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinparo {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 30%; top: 219%; margin: -8px 0 0 -8px;
}
.pinparo:after {
  content: 'Paro'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinhaa1 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 26%; top: 248%; margin: -8px 0 0 -8px;
}
.pinhaa1:after {
  content: 'Haa'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinhaa2 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 25%; top: 236%; margin: -8px 0 0 -8px;
}
.pinhaa2:after {
  content: 'Sombeykha'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinsam {
 width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 22%; top: 280%; margin: -8px 0 0 -8px;
}
.pinsam:after {
  content: 'Samtse'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinsam2 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 25%; top: 300%; margin: -8px 0 0 -8px;
}
.pinsam2:after {
   content: 'Dorokha'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinsam3 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 23%; top: 290%; margin: -8px 0 0 -8px;
}
.pinsam3:after {
  content: 'Tashichhoeling'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinchu {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 33%; top: 289%; margin: -8px 0 0 -8px;
}
.pinchu:after {
  content: 'Chukha'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pinchu1 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 32%; top: 299%; margin: -8px 0 0 -8px;
}
.pinchu1:after {
  content: 'Phuentsholing'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute; 
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pindag 
{
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 39%; top: 286%; margin: -8px 0 0 -8px;
}
.pindag:after 
{
  content: 'Dagana'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%; color:#fff; font-size: 12px;
}
.pindag1 
{
  width: 11px;  height: 10px;  border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 39%; top: 299%; margin: -8px 0 0 -8px;
}
.pindag1:after 
{
  content: 'L/Zinkha'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinpun {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 38%; top: 200%; margin: -8px 0 0 -8px;
}
.pinpun:after 
{
  content: 'Punakha'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.piwangdi {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 40%; top: 242%; margin: -8px 0 0 -8px;
}
.piwangdi:after 
{
  content: 'Wangduephodrang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pintron {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 50%; top: 240%; margin: -8px 0 0 -8px;
}
.pintron:after 
{
  content: 'Trongsa'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinsar {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 50%; top: 290%; margin: -8px 0 0 -8px;
}
.pinsar:after 
{
  content: 'Sarpang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pingel {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 49%; top: 296%; margin: -8px 0 0 -8px;
}
.pingel:after 
{
  content: 'Gelephu'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinbum:after 
{
  content: 'Bumthang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinbum {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 55%; top: 210%; margin: -8px 0 0 -8px;
}
.pinzam:after 
{
  content: 'Zhemgang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinzam {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 56%; top: 272%; margin: -8px 0 0 -8px;
}
.pinpanbang:after 
{
  content: 'Panbang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinpanbang {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 56%; top: 282%; margin: -8px 0 0 -8px;
}
.pinmon:after 
{
  content: 'Mongar'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinmon {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 63%; top: 260%; margin: -8px 0 0 -8px;
}
.pinmon1:after 
{
  content: 'Weringla'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinmon1 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 62%; top: 269%; margin: -8px 0 0 -8px;
}
.pinmpema:after 
{
  content: 'Nganglam'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinmpema {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 65%; top: 300%; margin: -8px 0 0 -8px;
}
.pinmpema1:after 
{
  content: 'Pemagatshel'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinmpema1 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 64%; top: 307%; margin: -8px 0 0 -8px;
}
.pinsj:after 
{
  content: 'S/Jongkhar'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinsj {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 70%; top: 308%; margin: -8px 0 0 -8px;
}
.pinJomotshangkha:after 
{
  content: 'Jomotshangkha';width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinJomotshangkha {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 71%; top: 297%; margin: -8px 0 0 -8px;
}
.pinSamdrupcholing:after 
{
  content: 'Samdrupcholing'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinSamdrupcholing {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 72%; top: 290%; margin: -8px 0 0 -8px;
}
.pintg:after 
{
  content: 'Trashigang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pintg {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 73%; top: 242%; margin: -8px 0 0 -8px;
}
.pintg1:after 
{
  content: 'Sakteng'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pintg1 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 72%; top: 248%; margin: -8px 0 0 -8px;
}
.pintg2:after 
{
  content: 'Thrimshing'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pintg2 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 71%; top: 254%; margin: -8px 0 0 -8px;
}
.pintg3:after 
{
  content: 'Wamrong'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pintg3 {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 72%; top: 263%; margin: -8px 0 0 -8px;
}
.pinty:after 
{
  content: 'T/Yangtse';width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinty {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 67%; top: 190%; margin: -8px 0 0 -8px;
}
.pinlhun:after 
{
  content: 'Lhuntse'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%;color:#fff;font-size: 12px;
}
.pinlhun {
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 62%; top: 180%; margin: -8px 0 0 -8px;
}
.pintsr 
{
  width: 11px; height: 10px; border-radius: 50% 50% 50% 50%; background: #f98c0f; position: absolute;
  left: 44%; top: 280%; margin: -8px 0 0 -8px;
}
.pintsr:after 
{
  content: 'Tsirang'; width: 5px; height: 5px; margin: 3px 0 0 3px; background: #2f2f2f; position: absolute;
  border-radius: 50%; color:#fff; font-size: 12px;
}
</style>





