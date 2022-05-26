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
<?php 
    if($id == '3')
    {
      ?>
      <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">close ×</span></button>
            <p class="alert-title">Search Results.</p>
            <p class="alert-body">
            You are viewing data of Cases Registered and Unclosed for <b style="color: #2d6281;">3</b> Months or more from the
            <b style="color: #2d6281;">Case Registration Date.</b>
            </p>
      </div> 
      
 
<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<h4 style="background-color: #a6a6a6;padding: 5px;">Detailed Information / Breakdown of Cases </h4>
<div>
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $threemonthtotal['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Registered Date</th>
      <th scope="col">Case Title</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($threemonth as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php 
            if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'High Court';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Supreme Court';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Dorokha';
          elseif( $row->court_id=='23' )
            echo 'Gelephu';
          elseif( $row->court_id=='24' )
            echo 'Jomotshangkha';
          elseif( $row->court_id=='25' )
            echo 'Lhamoizingkha';
          elseif( $row->court_id=='26' )
            echo 'Lingzhi';
          elseif( $row->court_id=='27' )
            echo 'Nganglam';
          elseif( $row->court_id=='28' )
            echo 'Phuentsholing';
          elseif( $row->court_id=='29' )
            echo 'Panbang';
          elseif( $row->court_id=='30' )
            echo 'Samdrupcholing';
          elseif( $row->court_id=='31' )
            echo 'Sakteng';
          elseif( $row->court_id=='32' )
            echo 'Tashichhoeling';
          elseif( $row->court_id=='33' )
            echo 'Sombeykha';
          elseif( $row->court_id=='34' )
            echo 'Thrimshing';
          elseif( $row->court_id=='35' )
            echo 'Wamrong';
          elseif( $row->court_id=='36' )
            echo 'Weringla';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'High Court Larger Bench';

          ?>
      </td>
      <td><?php 
              if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'Thimphu';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Thimphu';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Samtse';
          elseif( $row->court_id=='23' )
            echo 'Sarpang';
          elseif( $row->court_id=='24' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='25' )
            echo 'Dagana';
          elseif( $row->court_id=='26' )
            echo 'Thimphu';
          elseif( $row->court_id=='27' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='28' )
            echo 'Chukha';
          elseif( $row->court_id=='29' )
            echo 'Zhemgang';
          elseif( $row->court_id=='30' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='31' )
            echo 'Trashigang';
          elseif( $row->court_id=='32' )
            echo 'Samtse';
          elseif( $row->court_id=='33' )
            echo 'Haa';
          elseif( $row->court_id=='34' )
            echo 'Trashigang';
          elseif( $row->court_id=='35' )
            echo 'Trashigang';
          elseif( $row->court_id=='36' )
            echo 'Mongar';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'Thimphu';
          ?></td>
      <td><?php echo $row->reg_date;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php 
                   if( $row->status=='1' )
                   echo 'Case Registered';
                   elseif( $row->status=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->status=='5' )
                   echo 'Case Appealed';
                   elseif( $row->status=='2' )
                   echo 'Case Assigned';
                   elseif( $row->status=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
  <?php $i++; endforeach;?>
  </tbody>
</table>
</div>
   
</div>
</div>
</div>
</div>

  <?php
    }
     elseif($id == '6')
    { 
      ?>
      <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">close ×</span></button>
            <p class="alert-title">Search Results.</p>
            <p class="alert-body">
            You are viewing data of Cases Registered and Unclosed for <b style="color: #2d6281;">6</b> Months or more from the
            <b style="color: #2d6281;">Case Registration Date.</b>              
            </p>
      </div>
      <div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<h4 style="background-color: #a6a6a6;padding: 5px;">Detailed Information / Breakdown of Cases </h4>
<div>
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sixmonthtotal['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Registered Date</th>
      <th scope="col">Case Title</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($sixmonth as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php 
            if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'High Court';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Supreme Court';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Dorokha';
          elseif( $row->court_id=='23' )
            echo 'Gelephu';
          elseif( $row->court_id=='24' )
            echo 'Jomotshangkha';
          elseif( $row->court_id=='25' )
            echo 'Lhamoizingkha';
          elseif( $row->court_id=='26' )
            echo 'Lingzhi';
          elseif( $row->court_id=='27' )
            echo 'Nganglam';
          elseif( $row->court_id=='28' )
            echo 'Phuentsholing';
          elseif( $row->court_id=='29' )
            echo 'Panbang';
          elseif( $row->court_id=='30' )
            echo 'Samdrupcholing';
          elseif( $row->court_id=='31' )
            echo 'Sakteng';
          elseif( $row->court_id=='32' )
            echo 'Tashichhoeling';
          elseif( $row->court_id=='33' )
            echo 'Sombeykha';
          elseif( $row->court_id=='34' )
            echo 'Thrimshing';
          elseif( $row->court_id=='35' )
            echo 'Wamrong';
          elseif( $row->court_id=='36' )
            echo 'Weringla';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'High Court Larger Bench';

          ?>
      </td>
      <td><?php 
              if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'Thimphu';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Thimphu';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Samtse';
          elseif( $row->court_id=='23' )
            echo 'Sarpang';
          elseif( $row->court_id=='24' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='25' )
            echo 'Dagana';
          elseif( $row->court_id=='26' )
            echo 'Thimphu';
          elseif( $row->court_id=='27' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='28' )
            echo 'Chukha';
          elseif( $row->court_id=='29' )
            echo 'Zhemgang';
          elseif( $row->court_id=='30' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='31' )
            echo 'Trashigang';
          elseif( $row->court_id=='32' )
            echo 'Samtse';
          elseif( $row->court_id=='33' )
            echo 'Haa';
          elseif( $row->court_id=='34' )
            echo 'Trashigang';
          elseif( $row->court_id=='35' )
            echo 'Trashigang';
          elseif( $row->court_id=='36' )
            echo 'Mongar';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'Thimphu';
          ?></td>
      <td><?php echo $row->reg_date;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php 
                   if( $row->status=='1' )
                   echo 'Case Registered';
                   elseif( $row->status=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->status=='5' )
                   echo 'Case Appealed';
                   elseif( $row->status=='2' )
                   echo 'Case Assigned';
                   elseif( $row->status=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
  <?php $i++; endforeach;?>
  </tbody>
</table>
</div>
    
</div>
</div>
</div>
</div>
  
  <?php
    }
     elseif($id == '9')
    { 
      ?>
     <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">close ×</span></button>
            <p class="alert-title">Search Results.</p>
            <p class="alert-body">
            You are viewing data of Cases Registered and Unclosed for <b style="color: #2d6281;">9</b> Months or more from the
            <b style="color: #2d6281;">Case Registration Date.</b>             
            </p>
      </div>
<div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<h4 style="background-color: #a6a6a6;padding: 5px;">Detailed Information / Breakdown of Cases </h4>
<div>
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ninemonthtotal['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Registered Date</th>
      <th scope="col">Case Title</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($ninemonth as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php 
            if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'High Court';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Supreme Court';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Dorokha';
          elseif( $row->court_id=='23' )
            echo 'Gelephu';
          elseif( $row->court_id=='24' )
            echo 'Jomotshangkha';
          elseif( $row->court_id=='25' )
            echo 'Lhamoizingkha';
          elseif( $row->court_id=='26' )
            echo 'Lingzhi';
          elseif( $row->court_id=='27' )
            echo 'Nganglam';
          elseif( $row->court_id=='28' )
            echo 'Phuentsholing';
          elseif( $row->court_id=='29' )
            echo 'Panbang';
          elseif( $row->court_id=='30' )
            echo 'Samdrupcholing';
          elseif( $row->court_id=='31' )
            echo 'Sakteng';
          elseif( $row->court_id=='32' )
            echo 'Tashichhoeling';
          elseif( $row->court_id=='33' )
            echo 'Sombeykha';
          elseif( $row->court_id=='34' )
            echo 'Thrimshing';
          elseif( $row->court_id=='35' )
            echo 'Wamrong';
          elseif( $row->court_id=='36' )
            echo 'Weringla';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'High Court Larger Bench';

          ?>
      </td>
      <td><?php 
              if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'Thimphu';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Thimphu';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Samtse';
          elseif( $row->court_id=='23' )
            echo 'Sarpang';
          elseif( $row->court_id=='24' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='25' )
            echo 'Dagana';
          elseif( $row->court_id=='26' )
            echo 'Thimphu';
          elseif( $row->court_id=='27' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='28' )
            echo 'Chukha';
          elseif( $row->court_id=='29' )
            echo 'Zhemgang';
          elseif( $row->court_id=='30' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='31' )
            echo 'Trashigang';
          elseif( $row->court_id=='32' )
            echo 'Samtse';
          elseif( $row->court_id=='33' )
            echo 'Haa';
          elseif( $row->court_id=='34' )
            echo 'Trashigang';
          elseif( $row->court_id=='35' )
            echo 'Trashigang';
          elseif( $row->court_id=='36' )
            echo 'Mongar';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'Thimphu';
          ?></td>
      <td><?php echo $row->reg_date;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php 
                   if( $row->status=='1' )
                   echo 'Case Registered';
                   elseif( $row->status=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->status=='5' )
                   echo 'Case Appealed';
                   elseif( $row->status=='2' )
                   echo 'Case Assigned';
                   elseif( $row->status=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
  <?php $i++; endforeach;?>
  </tbody>
</table>
</div>
    
</div>
</div>
</div>
</div>
  <?php
    }
     elseif($id == '1')
    { 
      ?>
     <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">close ×</span></button>
            <p class="alert-title">Search Results.</p>
            <p class="alert-body">
            You are viewing data of Cases Registered and Unclosed for <b style="color: #2d6281;">12</b> Months or more from the
            <b style="color: #2d6281;">Case Registration Date.</b>              
            </p>
      </div>
                  <div class="invoice p-3 mb-3">
<div class="row">
<div class="col-12">
<h4 style="background-color: #a6a6a6;padding: 5px;">Detailed Information / Breakdown of Cases </h4>
<div>
<b>TOTAL CASES:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $twlmonthtotal['count_rows']; ?></b>
<div class="table-responsive">
  <table class="table table-bordered table-sm table-striped">
  <thead style="background-color: #66aac1;">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Court</th>
      <th scope="col">Dzongkhag</th>
      <th scope="col">Registered Date</th>
      <th scope="col">Case Title</th>      
      <th scope="col" style="width:4cm;">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($twlmonth as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php 
            if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'High Court';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Supreme Court';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Dorokha';
          elseif( $row->court_id=='23' )
            echo 'Gelephu';
          elseif( $row->court_id=='24' )
            echo 'Jomotshangkha';
          elseif( $row->court_id=='25' )
            echo 'Lhamoizingkha';
          elseif( $row->court_id=='26' )
            echo 'Lingzhi';
          elseif( $row->court_id=='27' )
            echo 'Nganglam';
          elseif( $row->court_id=='28' )
            echo 'Phuentsholing';
          elseif( $row->court_id=='29' )
            echo 'Panbang';
          elseif( $row->court_id=='30' )
            echo 'Samdrupcholing';
          elseif( $row->court_id=='31' )
            echo 'Sakteng';
          elseif( $row->court_id=='32' )
            echo 'Tashichhoeling';
          elseif( $row->court_id=='33' )
            echo 'Sombeykha';
          elseif( $row->court_id=='34' )
            echo 'Thrimshing';
          elseif( $row->court_id=='35' )
            echo 'Wamrong';
          elseif( $row->court_id=='36' )
            echo 'Weringla';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'High Court Larger Bench';

          ?>
      </td>
      <td><?php 
              if( $row->court_id=='1' )
            echo 'Bumthang';
            elseif( $row->court_id=='2' )
            echo 'Chukha';
          elseif( $row->court_id=='3' )
            echo 'Dagana';
          elseif( $row->court_id=='4' )
            echo 'Gasa';
          elseif( $row->court_id=='5' )
            echo 'Haa';
          elseif( $row->court_id=='6' )
            echo 'Thimphu';
          elseif( $row->court_id=='7' )
            echo 'Lhuentse ';
          elseif( $row->court_id=='8' )
            echo 'Mongar';
          elseif( $row->court_id=='9' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='10' )
            echo 'Paro';
          elseif( $row->court_id=='11' )
            echo 'Punakha';
          elseif( $row->court_id=='12' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='13' )
            echo 'Samtse';
          elseif( $row->court_id=='14' )
            echo 'Thimphu';
          elseif( $row->court_id=='15' )
            echo 'Trashigang';
          elseif( $row->court_id=='16' )
            echo 'Tashiyangtse';
          elseif( $row->court_id=='17' )
            echo 'Thimphu';
          elseif( $row->court_id=='18' )
            echo 'Trongsa';
          elseif( $row->court_id=='19' )
            echo 'Tsirang';
          elseif( $row->court_id=='20' )
            echo 'Wangdrephodrang';
          elseif( $row->court_id=='21' )
            echo 'Zhemgang';
          elseif( $row->court_id=='22' )
            echo 'Samtse';
          elseif( $row->court_id=='23' )
            echo 'Sarpang';
          elseif( $row->court_id=='24' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='25' )
            echo 'Dagana';
          elseif( $row->court_id=='26' )
            echo 'Thimphu';
          elseif( $row->court_id=='27' )
            echo 'Pemagatshel';
          elseif( $row->court_id=='28' )
            echo 'Chukha';
          elseif( $row->court_id=='29' )
            echo 'Zhemgang';
          elseif( $row->court_id=='30' )
            echo 'Samdrup Jongkhar';
          elseif( $row->court_id=='31' )
            echo 'Trashigang';
          elseif( $row->court_id=='32' )
            echo 'Samtse';
          elseif( $row->court_id=='33' )
            echo 'Haa';
          elseif( $row->court_id=='34' )
            echo 'Trashigang';
          elseif( $row->court_id=='35' )
            echo 'Trashigang';
          elseif( $row->court_id=='36' )
            echo 'Mongar';
          elseif( $row->court_id=='37' )
            echo 'Sarpang';
          elseif( $row->court_id=='38' )
            echo 'Thimphu';
          ?></td>
      <td><?php echo $row->reg_date;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php 
                   if( $row->status=='1' )
                   echo 'Case Registered';
                   elseif( $row->status=='4' )
                   echo "<b style='color:red;'>" . 'Case Closed' . "</b>";
                   elseif( $row->status=='5' )
                   echo 'Case Appealed';
                   elseif( $row->status=='2' )
                   echo 'Case Assigned';
                   elseif( $row->status=='3' )
                   echo 'Active Case';
                ?></td>
    </tr>
  <?php $i++; endforeach;?>
  </tbody>
</table>
</div>
    
</div>
</div>
</div>
</div>

<?php } ?> 

</div>






