<style type="text/css">
  #judgeAdd
 {
   display:none;
   top:100px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
 }
</style>
<div class="content">

  <!--Breadcrumb-->
  <div class="header">
    <h1 class="page-title">Add Activities</h1>

  </div>
  <!--End Breadcrumb-->

  <div class="main-content"> 

   <div class="panel panel-default">
    <table class="table table-bordered table-striped">
      <form action="index.php/registration/insert_review_activity/<?php echo $case_id; ?>" method="post">

      <div style="margin-top: 2%;" class="col-md-6">
          <strong>Judge Present</strong>
            <input type="button" value="Add" class="css_btn_class" onclick="addJudge()" style="width:70px; height:30px; line-height:20px; float:right;"/>
        </div>
        <div style="margin-top: 2%;" class="col-md-6">
          <?php foreach($aJudges as $aj){ echo $this->public->get_UserName($aj->judge_id)."<a href='".site_url('registration/deleteJudgePresent/'.$aj->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; } ?>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-6">
      
          <label for="activity_type"><strong>Review Activity Type</strong></label>
          <select name="activity_type" class="form-control">
            <option value="0" selected>--Select Review Activity Type---</option>
            <?php foreach($review_activity_type as $review_activity):?>
              <option value="<?php echo $review_activity->id; ?>"><?php echo $review_activity->description; ?></option>
            <?php endforeach; ?>
          </select>
          
        </div>
        <div class="form-group col-md-6">
          <label for="activity_date"><strong>Date</strong></label>
          <input type="date" class="form-control" name="activity_date" value="<?php echo set_value('activity_date'); ?>" required>
        </div>
        <div class="col-md-12 form-group">
          <label for="remarks"><strong>Remarks</strong></label>
          <textarea name="remarks" class="form-control" cols="10" rows="2" required></textarea>
        </div>
        <div class="form-group col-md-4 col-md-offset-8">
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          <a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
        </div>
      </form>  
    </table>
    <div id="judgeAdd">
     <span style="width:100%;">
      <strong>Assign Judge</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addJudgeClose();"/>
    </span>
    <hr />
      <form action="<?php echo site_url('registration/addJudgePresent');?>" method="post">
        <input type="hidden" value="<?php echo $case_id; ?>" name="cid" />
        <label>Select Judge : </label>
        <select name="newJudge" class="levels">
            <option value="" selected="selected" disabled="disabled">Select One</option>
            <?php
            foreach($judges as $jd)
             {?>
           <option value="<?php echo $jd->id; ?>"><?php echo $this->public->get_UserName($jd->id);?></option>
            <?php
          }?>
        </select><br /><br />
      <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addJudgeClose();"/>
     </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">
    function addJudge(){
      document.getElementById( 'judgeAdd' ).style.display = 'block';
    }

   function addJudgeClose(){
     document.getElementById( 'judgeAdd' ).style.display = 'none';
   }
</script>
