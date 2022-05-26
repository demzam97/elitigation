<div class="content">

  <!--Breadcrumb-->
  <div class="header">
    <h1 class="page-title">Case Review Activities</h1>
  </div>
  <!--End Breadcrumb-->

  <div class="main-content"> 
   <div class="panel panel-default">
    <table class="table table-bordered table-striped">
      <thead>
        <?php if(count($case_info)==0) { ?>
        <tr>
          <th colspan="6"><strong>Record Not Found...</strong></td>
          </tr>
          <?php } else { ?>
          <tr>
            <th width="7%">Sl.No</th>
            <th>SC Misc Case No</th>
            <th>SC Misc Case Date</th>
            <th>Activity Type</th>
            <th>Activity Date</th>
            <th>Judge Present</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $ca=count($this->public->getReviewActivity($case_id));
          $i=1; 
          foreach($case_info as $row) { ?>
          <tr>
            <td><?php echo $i;?></td>
           
            <td><?php echo $row->misc_case_no;?></td>
            <td><?php echo $row->misc_hearing_date;?></td>            
            <?php  
            $case_id=$row->id;
            ?>
            <td>
            <?php
              $caseActivity=$this->public->getReviewActivity($case_id);
            if(count($caseActivity)!=0){
               foreach($caseActivity as $row) :?>
                <?php echo $this->public->get_ReviewTypeName($row->review_type_id);?><br>               
              <?php endforeach;
            }
            ?> 
            </td>
  
            <td>
            <?php
              $caseActivity=$this->public->getReviewActivity($case_id);
            if(count($caseActivity)!=0){
               foreach($caseActivity as $row) :?>
                <?php echo $row->activity_date;?> <br>            
              <?php endforeach;
            }
            ?> 
            </td>

             <td>
            <?php
            $caseJudge=$this->public->getAlCaseJudge($case_id);
            if(count($caseJudge)!=0){
              foreach($caseJudge as $row) :?>
                <?php echo $this->public->get_UserName($row->judge_id);?><br>
              <?php endforeach;
            } ?>
            </td>
            </tr>
         <?php
          } 
       }
            ?>
             
    </tbody>
  </table>
</div>
<div class="col-md-4 col-md-offset-8">
  <button type="button" id="add_activity" class="btn btn-success">Add Activity</button>
  <button type="button" id="complete_review" class="btn btn-success">Complete Review</button>
</div>
<div id="decision" title="Choose your Decision">
  <form action="">
    <div class="form-group col-md-12">
      <select id="decision_made" name="choose_decision" class="form-control">
        <option value="0">Select your Decision</option>
        <option value="register">Registered</option>
        <option value="remand">Remand</option>
        <option value="withdraw">Withdraw</option>
        <option value="dismiss">Dismissed</option>
      </select>
    </div>
  </form>
</div>
<div id="register" >

<form action="index.php/registration/incase_activity/<?php echo $case_id; ?>" method="post">
<input type="hidden" name="registration" value="1">
    <?php 
    $this->session->set_userdata('case_id',$case_id);
    ?>
    <div class="form-group col-md-6">
      <label for="registration_no">Registration No</label>
      <input type="text" name="registration_no"  style="width:70%;" class='form-control' value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" />
    
    </div>
    <div class="form-group col-md-6">
      <label for="registration_date">Registration Date</label>
      <input type="date" class="form-control" name="registration_date" value="<?php echo set_value('registration_date'); ?>">
    </div>
    <div class="form-group col-md-4 col-md-offset-8">
      <input type="submit" id="register_id" class="btn btn-primary" name="submit" value="Submit">
      <a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
    </div>
  </form>
</div>


 <form action=" index.php/registration/incase_activity/<?php echo $case_id;?>" method="post">
 <input type="hidden" name="dismiss" value="2">
<div id="other" >
  <div class="form-group col-md-6">
    <label for="order_no">Dismiss Order No</label>
    <input type="text" class="form-control" name="order_no" value="">
  </div>
  <div class="form-group col-md-6">
    <label for="order_date">Order Date</label>
    <input type="date" class="form-control" name="order_date" value="">
  </div>
  <div class="col-md-6 form-group">
    <label for="judge"> Judge</label>
    <select name="judge" class="form-control">
      <option value="0" selected>--Select judge---</option>
      <?php foreach($judges as $judge):?>
        <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-4 col-md-offset-8">
    <input type="submit" id="other_id" class="btn btn-primary" name="submit" value="Submit">
    <a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
  </div>
  </div></form>


<form action=" index.php/registration/incase_activity/<?php echo $case_id;?>" method="post">
 <input type="hidden" name="remand" value="3">
<div id="remand" >
  <div class="form-group col-md-6">
    <label for="order_no">Remand Order No</label>
    <input type="text" class="form-control" name="order_no" value="">
  </div>
  <div class="form-group col-md-6">
    <label for="order_date">Order Date</label>
    <input type="date" class="form-control" name="order_date" value="">
  </div>
  <div class="col-md-6 form-group">
    <label for="judge"> Judge</label>
    <select name="judge" class="form-control">
      <option value="0" selected>--Select judge---</option>
      <?php foreach($judges as $judge):?>
        <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-4 col-md-offset-8">
    <input type="submit" id="other_id" class="btn btn-primary" name="submit" value="Submit">
    <a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
  </div>
  </div></form>


  <form action=" index.php/registration/incase_activity/<?php echo $case_id;?>" method="post">
 <input type="hidden" name="withdraw" value="4">
<div id="withdraw" >
  <div class="form-group col-md-6">
    <label for="order_no">Withdraw Order No</label>
    <input type="text" class="form-control" name="order_no" value="">
  </div>
  <div class="form-group col-md-6">
    <label for="order_date">Order Date</label>
    <input type="date" class="form-control" name="order_date" value="">
  </div>
  <div class="col-md-6 form-group">
    <label for="judge"> Judge</label>
    <select name="judge" class="form-control">
      <option value="0" selected>--Select judge---</option>
      <?php foreach($judges as $judge):?>
        <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-4 col-md-offset-8">
    <input type="submit" id="other_id" class="btn btn-primary" name="submit" value="Submit">
    <a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
  </div>
  </div></form>




</div>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script>


$(function(){
    $('#add_activity').click(function(){
       window.location.href = "index.php/registration/add_review_activity/<?php echo $case_id; ?>";
    });
 
    $('#decision').hide();
    $('#complete_review').click(function(){
     $('#decision').dialog('open');
   });
    $('#decision').dialog({
      autoOpen: false,
      height: 280,
      width: 440,
      modal: false,
      hide: 'Slide',
      buttons:{
        "Close":function(){
          $('#decision_made').val('');
          $(this).dialog( "close" );
        }
      }
    });
    $('#register').hide();
    $('#other').hide();
    $('#remand').hide();
    $('#withdraw').hide();


    $('#decision').change(function(){
      var value = $('#decision_made').val();
      //alert(value);
      if(value == 'register'){
        $('#register').show();
        $('#other').hide();
        $('#remand').hide();
        $('#withdraw').hide();
      }
      else if(value == 'remand')
      {
        $('#remand').show();
        $('#other').hide();
        $('#register').hide();
        $('#withdraw').hide();
      }
      else if(value == 'withdraw')
      {
        $('#remand').hide();
        $('#other').hide();
        $('#register').hide();
        $('#withdraw').show();
      }
      else
        {
        $('#remand').hide();
        $('#other').show();
        $('#register').hide();
        $('#withdraw').hide();
      }

      $(this).dialog( "close" );
    });
  });
</script>

