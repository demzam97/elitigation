<br><div class="container">
 <br /><br /><br />
<?php $uid = $this->session->userdata('user_id')?>

<div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">close ×</span></button>
            <p class="alert-title">Search Results.</p>
            <p class="alert-body">
            You are viewing data dated from <b style="color: #2d6281;">
              <?php 
              $date = "$fromdate";
              echo date("M d, Y", strtotime($date)); 
              ?></b> to 
              <b style="color: #2d6281;">
              <?php 
              $date = "$todate";
              echo date("M d, Y", strtotime($date)); 
              ?></b>
            </p>
    </div> 
<style type="text/css">
.alert-body {
  font-size: 15px;
}
.alert-title {
  font-size: 15px;
  font-weight: bold;
}
.alert-warning {
    border-radius: 0;
    background: orange;
  border: 0;
  color: black;
}
</style>

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
 
<div class="invoice p-3 mb-3">
<div class="row">

<div class="col-12">
  <!--SEARCH-->
<div class="card-header border-0 ui-sortable-handle" style="cursor: move; background-color: #8ebbcf;">
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
    <label for="exampleInputEmail3">From Date</label>
    <input type="date" class="form-control input-sm" id="fromdate" name="fromdate" placeholder="From Date" required="required">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword3">To Date</label>
    <input type="date" class="form-control input-sm" id="todate" name="todate" placeholder="To Date" required="required">
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" style="background-color: #245f79;color: #fff;" >Search</button>
</form>
</div><br />
<!--searchend-->
<!--FIRST ROW(MAP&PIE)-->
<div class="row">
<div class="col-xs-6 col-md-6">

 
  <style type="text/css">
  body 
  {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  }
  </style>
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script>
var chart = am4core.create("chartdiv1", am4charts.PieChart);
chart.data = [{
  "country": "Paro",
  "litres":<?php echo $h123['count_rows']; ?>
},{
  "country": "Chhukha",
  "litres":<?php echo $hchk['count_rows']; ?>
}, {
  "country": "Punakha",
  "litres":<?php echo $hpun['count_rows']; ?>
},{
  "country": "Dagana",
  "litres":<?php echo $hdag['count_rows']; ?>
}, {
  "country": "Gasa",
  "litres":<?php echo $hgas['count_rows']; ?>
}, {
  "country": "Haa",
  "litres":<?php echo $hhaa['count_rows']; ?>
},{
  "country": "Thimphu",
  "litres":<?php echo $hthi['count_rows']; ?>
},{
  "country": "Lhuntse",
  "litres":<?php echo $hlhu['count_rows']; ?>
}, {
  "country": "Mongar",
  "litres":<?php echo $hmon['count_rows']; ?>
}, {
  "country": "Pemagatshel",
  "litres":<?php echo $hpema['count_rows']; ?>
},{
  "country": "Samtse",
  "litres":<?php echo $hsts['count_rows']; ?>
},  {
  "country": "S/Jongkhar",
  "litres":<?php echo $hsjon['count_rows']; ?>
}, {
  "country": "Trashigang",
  "litres":<?php echo $htashi['count_rows']; ?>
}, {
  "country": "Tashiyangtse",
  "litres":<?php echo $htyang['count_rows']; ?>
}, {
  "country": "Trongsa",
  "litres":<?php echo $htong['count_rows']; ?>
}, {
  "country": "Tsirang",
  "litres":<?php echo $htsir['count_rows']; ?>
}, {
  "country": "W/Phodrang",
  "litres":<?php echo $hwdue['count_rows']; ?>
}, {
  "country": "Zhemgang",
  "litres":<?php echo $hzga['count_rows']; ?>
}, {
  "country": "Sarpang",
  "litres":<?php echo $hsarp['count_rows']; ?>
}, {
  "country": "Bumthang",
  "litres": <?php echo $hbum['count_rows']; ?>
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


//CRIMINAL
var chart = am4core.create("chartdiv11", am4charts.PieChart);
chart.data = [{
  "country": "Paro",
  "litres":<?php echo $rh123['count_rows']; ?>
},{
  "country": "Chhukha",
  "litres":<?php echo $rhchk['count_rows']; ?>
}, {
  "country": "Punakha",
  "litres":<?php echo $rhpun['count_rows']; ?>
},{
  "country": "Dagana",
  "litres":<?php echo $rhdag['count_rows']; ?>
}, {
  "country": "Gasa",
  "litres":<?php echo $rhgas['count_rows']; ?>
}, {
  "country": "Haa",
  "litres":<?php echo $rhhaa['count_rows']; ?>
},{
  "country": "Thimphu",
  "litres":<?php echo $rhthi['count_rows']; ?>
},{
  "country": "Lhuntse",
  "litres":<?php echo $rhlhu['count_rows']; ?>
}, {
  "country": "Mongar",
  "litres":<?php echo $rhmon['count_rows']; ?>
}, {
  "country": "Pemagatshel",
  "litres":<?php echo $rhpema['count_rows']; ?>
},{
  "country": "Samtse",
  "litres":<?php echo $rhsts['count_rows']; ?>
},  {
  "country": "S/Jongkhar",
  "litres":<?php echo $rhsjon['count_rows']; ?>
}, {
  "country": "Trashigang",
  "litres":<?php echo $rhtashi['count_rows']; ?>
}, {
  "country": "Tashiyangtse",
  "litres":<?php echo $rhtyang['count_rows']; ?>
}, {
  "country": "Trongsa",
  "litres":<?php echo $rhtong['count_rows']; ?>
}, {
  "country": "Tsirang",
  "litres":<?php echo $rhtsir['count_rows']; ?>
}, {
  "country": "Wangdue",
  "litres":<?php echo $rhwdue['count_rows']; ?>
}, {
  "country": "Zhemgang",
  "litres":<?php echo $rhzga['count_rows']; ?>
}, {
  "country": "Sarpang",
  "litres":<?php echo $rhsarp['count_rows']; ?>
}, {
  "country": "Bumthang",
  "litres": <?php echo $rhbum['count_rows']; ?>
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

<div class="card bg-gradient-info">   
<div class="card-header border-0 ui-sortable-handle" style="cursor: move; background-color: #e6e6e6;">
      <h5 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i><b>Civil Cases </b>
      </h5>
</div>
<div id="chartdiv1" style=" width: 450px; height: 300px;" ></div>
</div>

</div>
<div class="col-xs-6 col-md-6">
<div class="card bg-gradient-info">   
<div class="card-header border-0 ui-sortable-handle" style="cursor: move; background-color: #e6e6e6;">
      <h5 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i><b>Criminal Cases </b>
      </h5>
</div>
<div id="chartdiv11" style=" width: 450px; height: 300px;" ></div>
</div>

</div>

<div class="col-xs-6 col-md-6" >


</div>

</div>
<!--FIRST ROW(MAP&PIE)-->
<!-- Nav tabs -->
<h4 style="background-color: #a6a6a6;padding: 5px;">Detailed Information / Breakdown of Cases </h4>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="background-color: orange;">Civil Cases Details</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Criminal Cases Details</a></li>
  </ul><br />
  <div class="tab-content">
<!--TABCIVIL-->
<div role="tabpanel" class="tab-pane active" id="home">
<!--TABLECIVIL-->
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totcv['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Reg.Date</th>
      <th scope="col">Case Type (L2)</th>
      <th scope="col">Case Title</th>      
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($civil as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->CourtName;?></td>
      <td><?php echo $row->Dzongkhag;?></td>
      <td><?php echo $row->RegDate;?></td>
      <td><?php echo $row->CaseLevel;?></td>
      <td><?php echo $row->casetitle;?></td>
      <td><?php 
                   if( $row->cstatus=='1' )
                   echo 'Case Registered';
                   elseif( $row->cstatus=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->cstatus=='5' )
                   echo 'Case Appealed';
                   elseif( $row->cstatus=='2' )
                   echo 'Case Assigned';
                   elseif( $row->cstatus=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
    <?php $i++; endforeach;?>
    
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
<!--TABLECIVIL_END-->
</div>
<!--TABCIVIL_END-->
<!--TAB CRIMINAL-->
<div role="tabpanel" class="tab-pane" id="profile">
<!--TABLECRIMINAL-->
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totcr['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Reg.Date</th>
      <th scope="col">Case Type (L2)</th>
      <th scope="col">Case Title</th>      
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($criminal as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->CourtName;?></td>
      <td><?php echo $row->Dzongkhag;?></td>
      <td><?php echo $row->RegDate;?></td>
      <td><?php echo $row->CaseLevel;?></td>
      <td><?php echo $row->casetitle;?></td>
      <td><?php 
                   if( $row->cstatus=='1' )
                   echo 'Case Registered';
                   elseif( $row->cstatus=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->cstatus=='5' )
                   echo 'Case Appealed';
                   elseif( $row->cstatus=='2' )
                   echo 'Case Assigned';
                   elseif( $row->cstatus=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
    <?php $i++; endforeach;?>
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
<!--TABLECRIMINAL_END-->
</div>

</div>
<!--TAB CRIMINALEND-->
  </div>
</div>



</div>


</div>
</div>
</div>






