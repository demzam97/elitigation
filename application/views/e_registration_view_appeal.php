<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Case Appeal Application</h1>
	</div>
     <!--End Breadcrumb-->


  <div class="main-content">
   
  <div class="container">
   <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
   
  <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>Case Detail</h5>
  <form name="frm1" method="post" action="index.php/registration/add_appeal_elat" >
    <input type="hidden" name="userid" value="<?php echo $uid; ?>" >
    <input type="hidden" name="email" value="<?php echo $email; ?>" >
    <input type="hidden" name="court_id" value="<?php echo $court_id; ?>" />
    <input type="hidden" name="case_id" value="<?php echo $case_id; ?>" />
    <div class="form-group">
        <label for="party_type"><b>Court:</b></label>
        <input type="text" name="court" value="<?php echo $this->public->get_CourtName($court_id); ?>" class="form-control" readonly />
    </div>
    <div class="form-group">
        <label for="party_type"><b>Appellent:</b></label>
        <select name="litigant[]" class="form-control" multiple="multiple">
        <?php foreach($litigants as $liti): ?>
        <option value="<?php echo $liti->litigant; ?>" selected><?php echo $this->public->get_ApplicantName($liti->litigant); ?></option>
        <?php endforeach; ?>
        </select><font color="red"> * </font>Press CTRL to MultiSelect
    </div>
    <div class="form-group">
        <label for="party_type"><b>Appeal Brief:</b></label>
        <textarea class="form-control" name="appeal_brief"  id="case_brief" rows="6">
        <?php echo $this->public->get_appeal_casebrief($miscid);?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="party_type"><b>Appeallate Court:</b></label>
        <select name="appeal_court" class="form-control">
        <?php foreach($court_type as $court): ?>
        <option value="<?php echo $court->id; ?>" selected><?php echo $court->court_name; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="party_type"><b>Singning Judge:</b></label>
        <select name="sign_judge[]" class="form-control" multiple="multiple">
        <?php foreach($judges as $judge): ?>
        <option value="<?php echo $judge->id; ?>" selected><?php echo $judge->judge_name; ?></option>
        <?php endforeach; ?>
        </select>
        <font color="red"> * </font>Press CTRL to MultiSelect
    </div>
    <div class="form-group">
        <label for="party_type"><b>Appeal Date::</b></label>
        <input type="date" name="appeal_date" value="<?php echo $this->public->get_appeal_date($miscid);?>" class="form-control" readonly />
    </div>
    <div class="form-group">
        <label for="party_type"><b>Hearing Option:</b></label>
        <?php $h = $this->public->get_appeal_hearingoption($miscid);
             if($h == 'R'){ echo "Remote Hearing";} else {echo "Court Room Hearing";}
        ?>
    </div>
    
    <hr>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="defaultUnchecked" name="hearingoption" value='R'
 <?php if($h == 'R'){ ?> checked="checked" <?php } ?>
    >
    <label class="custom-control-label" for="defaultUnchecked">Remote Hearing</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="defaultChecked" name="hearingoption" value='C'
    <?php if($h == 'C'){ ?> checked="checked" <?php } ?>
    >
    <label class="custom-control-label" for="defaultChecked">Courtroom Hearing</label>
    </div>
    <hr>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" name="casestatus" value='A' id="register">
    <label class="custom-control-label" for="defaultUnchecked"><b><font color = 'green'>Register</font></b></label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" name="casestatus" value='R' id="reject">
    <label class="custom-control-label" for="defaultChecked"><b><font color = 'red'>Reject</font></b></label>
    </div>
    <label for="party_type" class="txbx" hidden="true"><b>Enter Appeal No:</b></label>
    <input type="text" name="appeal_no" value="" class="txbx" hidden="true" />
    <br>
    <label for="party_type"><b>Remarks:</b></label>
    <textarea class="form-control" name="remarks" rows="1"></textarea>


    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="<?php echo site_url('registration/e_appeal'); ?>" style="color: white;">Cancel</a></button>
    </form>    
   </div>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
   <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>Case Application Copy</h5>
   <?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
     { ?>
       <object width="700px" height="750px" data="<?php echo base_url('/images/appeal_applicationcopy/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/images/appeal_applicationcopy/<?php echo $filename;?>&embedded=true"
        style="width: 120%; height: 750px">
            <p>Your browser does not support iframes.</p>
        </iframe>
   <?php } ?>
   
   </div>
<div>
   
  </div>
</div>

<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
    $('#register').click(function() {
        $('.txbx').attr('hidden',false);
    });           
    $('#reject').click(function() {
        $('.txbx').attr('hidden',true);
    });
});
</script>