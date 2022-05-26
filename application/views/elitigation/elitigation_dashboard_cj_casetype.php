<br><div class="container">
 <br /><br /><br />
<?php $uid = $this->session->userdata('user_id')?>
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
    <style type="text/css">
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }
    </style> 
<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<div>
<!-- Nav tabs -->
<?php $courtname = $this->public->get_CourtName($id); ?>
<h4 style="background-color: #a6a6a6;padding: 5px;"><?php echo $courtname; ?> [Detailed Information / Breakdown of Cases]</h4>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="background-color: orange;">Civil Cases Details</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Criminal Cases Details</a></li>
  </ul><br />
  <div class="tab-content">
<!--TABCIVIL-->
<div role="tabpanel" class="tab-pane active" id="home">
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totalcase_civil['count_rows']?></b><br>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Civil Case Type</th>
      <th scope="col">Registered Date</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($civil as $row):?>
  <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->CourtName; ?></td>
      <td><?php echo $row->CaseLevel; ?></td>
      <td><?php echo $row->RegDate;?></td>
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
<!--TAB CRIMINAL-->
<div role="tabpanel" class="tab-pane" id="profile">
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totalcase_criminal['count_rows']; ?></b><br>

<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Case Type (L2)</th>
      <th scope="col">Registered Date</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($criminal as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->CourtName; ?></td>
      <td><?php echo $row->CaseLevel; ?></td>
      <td><?php echo $row->RegDate;?></td>
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
</div>
</div>
</div>
</div>
</div>

</div>






