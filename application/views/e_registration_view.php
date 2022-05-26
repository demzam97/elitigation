<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">eRegistration</h1>
	</div>
     <!--End Breadcrumb-->
<div class="main-content">
<div class="container">  
    <div class='column'>
      <div class='blue-column'>
      <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>Case Application</h5>
      <?php foreach($cases as $case) { ?> 

        <div class="form-group">
        <label for="party_type"><b>Applicant Type:</b></label>
        <?php
            if($ut == '13') { echo "Lawyer";}
            if($ut == '12') { echo "Individual";}
            if($ut == '15') { echo "Organization";}     
        ?>
        </div> 
        <?php if($casetype == '1'){ ?>
        <div class="form-group">
        <label for="party_type"><b>Organization:</b></label>
        <?php echo $org_name; ?>
        </div> 
        <?php } ?>
        <div class="form-group">
        <label for="party_type"><b>Case Type:</b></label>
        <?php if($casetype == '1'){ echo "Criminal"; } else { echo "civil"; } ?>
        </div>

        <div class="form-group">
        <label for="party_type"><b>Applicant:</b></label>
        <button class="btn btn btn-outline-primary py-0"><a  href="<?php echo site_url('publicregistration/view_applicant_detail/'.$uid.'');?>" target="_blank"><?php echo $applicantname; ?></a></button>
        </div>

        <div class="form-group">
        <label for="party_type"><b>Respondent/Defendant:</b></label>
        <?php foreach($defendantname as $def) {?>
        <button class="btn btn btn-outline-primary py-0"><a  href="<?php echo site_url('publicregistration/view_respondent_detail/'.$DefendantID.'');?>" target="_blank"><?php echo $def->name; ?></a></button>
        <?php } ?>
        </div> 
        <?php if($ut == '13') { ?>
          <div class="form-group">
        <label for="party_type"><b>Client:</b></label>
        <button class="btn btn btn-outline-primary py-0"><a  href="<?php echo site_url('publicregistration/view_client_detail/'.$clientID.'');?>" target="_blank"><?php echo $clientname; ?></a></button>
        
        </div> 
        <?php } ?> 

    <div class="form-group">
        <label for="party_type"><b>Mode of Hearing:</b></label>
        <?php $h = $case->hearing_option; 
             if($h == 'R'){ echo "Remote Hearing";} else {echo "Court Room Hearing";}
        ?>
    </div>
    <div class="form-group">
        <label for="party_type"><b>Petition copy:</b></label>
        <?php $t = "PT";?>
        <a href="<?php echo site_url('registration/ViewCaseDocs/'.$case->petition_copy.'/'.$t.''); ?>" target="_blank"><?php echo $case->petition_copy; ?></a>
    </div>

    <div class="form-group">
        <label for="party_type"><b>Proof for Jurisdiction/Power of Attorney:</b></label>
        <?php $t = "JD";?>
        <a href="<?php echo site_url('registration/ViewCaseDocs/'.$case->jurisdiction_copy.'/'.$t.''); ?>" target="_blank"><?php echo $case->jurisdiction_copy; ?></a>
    </div>

    <div class="form-group">
        <label for="party_type"><b>CID Copy:</b></label>
        <?php $t = "CID";?>
        <a href="<?php echo site_url('registration/ViewCaseDocs/'.$case->cid_copy.'/'.$t.''); ?>" target="_blank"><?php echo $case->cid_copy; ?></a>
    </div>
	
	<div class="form-group">
        <label for="party_type"><b>Other Relevant Documents:</b></label>
        <?php $t = "RD";
        foreach($revdocs as $rev) {
        ?>
        <a href="<?php echo site_url('registration/ViewCaseDocs/'.$rev->file.'/'.$t.''); ?>" target="_blank"><?php echo $rev->file; ?></a><br>
       <?php } ?>
      </div>

     <?php if($casetype == '1'){ ?>
    <div class="form-group">
        <label for="party_type"><b>Chargesheet:</b></label>
        <?php $t = "CS";?>
        <a href="<?php echo site_url('registration/ViewCaseDocs/'.$case->chargesheet.'/'.$t.''); ?>" target="_blank"><?php echo $case->chargesheet; ?></a>
    </div>
     <?php } ?>    

    <hr>
    <?php if($casetype != '1') { 

      if($miscstatus == '0'){
      ?>
      <form name="frm2" method="post" action="index.php/registration/e_mischear_submit" >
      <input type = 'hidden' name="court_id" value="<?php echo $this->session->userdata('court_id'); ?>">
      <input type = 'hidden' name="caseid" value="<?php echo $caseid; ?>">
      <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>Miscellaneous Hearing Setting</h5>
     <table width="100%">
     <tr>
       <td width="25%"><strong>Hearing Date:</strong><font color="red">*</font></td>
       <td>
       <input type="date" name="remand_date" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
     <tr>
       <td width="25%"><strong>Start Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="start_time" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       </td>
       <td width="25%"><strong>End Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="end_time" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       </td>
       </tr>
       <tr><td colspan="4"><strong>Select Participants</strong></td></tr>
       <tr><td><strong>Judges</strong><font color="red">*</font></td></tr>
       <?php foreach($judges as $jd ) {?>
       <tr>
       <td><?php echo $jd->judge_name; ?></td>
       <td><?php echo $jd->email; ?>&nbsp;&nbsp;&nbsp;
       <?php if($jd->email != '') { ?> <input type="checkbox" value="<?php echo $jd->email; ?>" name="emails[]" /><?php } ?>
       </td>
       </tr>
       <?php } ?>
       <tr><td><strong>Applicant</strong><font color="red">*</font></td></tr>
       <tr>
       <td><?php echo $applicantname; ?></td>
       <td><?php echo $applicantemail; ?>&nbsp;&nbsp;&nbsp;
       <?php if($applicantemail != '') { ?><input type="checkbox" value="<?php echo $applicantemail; ?>" name="emails[]" /> <?php } ?>
       </td>
       </tr>
       <tr><td><strong>Respondent / Defendant</strong><font color="red">*</font></td></tr>
       <?php foreach($defendantEmail as $deff) { ?>
       <tr>
       <td><?php echo $deff->name; ?></td>
       <td><?php echo $deff->email; ?>&nbsp;&nbsp;&nbsp;
       <?php if($deff->email != '') { ?> <input type="checkbox" value="<?php echo $deff->email; ?>" name="emails[]" /> <?php } ?>
       </td>
       </tr>
       <?php } ?>
     </table>
      <div class="form-group">
      <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="" style="color: white;">Cancel</a></button>
    </form>
        </div>
    <?php } 
    else{ ?>
              <form name="frm1" method="post" action="index.php/registration/e_registration_submit" enctype="multipart/form-data">
             <input type="hidden" name="caseid" value="<?php echo $case->id; ?>" >
              <input type="hidden" name="userid" value="<?php echo $uid = $case->created_by; ?>" >
             <input type="hidden" name="email" value="<?php echo $email = $this->elat->get_email($uid); ?>" >
             <input type="hidden" name="uname" value="<?php echo $applicantname; ?>" >
            <input type="hidden" name="unumber" value="<?php echo $applicantno; ?>" >
             <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="hearingoption" value='R'
           <?php if($h == 'R'){ ?> checked="checked" <?php } ?> >
            <label class="custom-control-label" for="defaultUnchecked">Remote Hearing</label>
               </div>
               <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultChecked" name="hearingoption" value='C'
                <?php if($h == 'C'){ ?> checked="checked" <?php } ?>
                  >
                <label class="custom-control-label" for="defaultChecked">Courtroom Hearing</label>
                 </div>
                    <hr>
                  <label for="chkEmail_yes">
            Case Status:&nbsp;&nbsp;&nbsp;
            <input type="radio" id="accept1" value="A" name="casestatus" required = "required"/>
            <b><font color = 'green'>Accept</font></b> &nbsp;&nbsp;&nbsp;
            <input type="radio" id="reject1" value="R" name="casestatus" required = "required"/>
            <b><font color = 'red'>Reject</font></b>
                 </label>
                  <hr />
                 <div id="div_email" style="display: none;">
                <table>
                 <tr>
                  <td>Upload Dismissal Oeder:</td>
                   <td><input type="file" name="dismissal_order" style="width:40%;"></td>
                      </tr>
                  <tr>
                    <td>Select Reason For Rejection:</td>
                      <td>
                        <option value="0" selected>-- Select --</option>
                       <option value="1" >No concrete case or controversy</option>
                      <option value="2" >No legal standing</option>
                      <option value="3" >Jurisdiction</option>
		                    <option value="4" >Others</option>
                       </select> 
                           </td>
                     <td>Additional Remarks:</td>
                   <td><textarea name="remarks" rows="2" cols="20"></textarea></td>
                    </tr>     
                      </table>
                     </div>
                    <script>
                    $(function () {
                $("input[name='casestatus']").click(function () {
                    if ($("#reject1").is(":checked")) {
                        $("#div_email").show();
                    } else {
                        $("#div_email").hide();
                    }
                });
            });
        </script>
    <hr>
    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="" style="color: white;">Cancel</a></button>
    </form>
     <?php  }
    
    ?>
      </div>
    </div>
    <?php  
      } 
      else 
    { 
      if($remandstatus == '0'){
      ?>
      <form name="frm2" method="post" action="index.php/registration/e_remand_submit" >
      <input type = 'hidden' name="court_id" value="<?php echo $this->session->userdata('court_id'); ?>">
      <input type = 'hidden' name="caseid" value="<?php echo $caseid; ?>">
      <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>Remote Remand Hearing Setting</h5>
     <table width="100%">
     <tr>
       <td width="25%"><strong>Hearing Date:</strong><font color="red">*</font></td>
       <td>
       <input type="date" name="remand_date" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
     <tr>
       <td width="25%"><strong>Start Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="start_time" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       </td>
       <td width="25%"><strong>End Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="end_time" id="start_dt2" required = "required" class="datepicker" style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       </td>
       </tr>
       <tr><td colspan="4"><strong>Select Participants</strong></td></tr>
       <tr><td><strong>Judges</strong><font color="red">*</font></td></tr>
       <?php foreach($judges as $jd ) {?>
       <tr>
       <td><?php echo $jd->judge_name; ?></td>
       <td><?php echo $jd->email; ?>&nbsp;&nbsp;&nbsp;
       <?php if($jd->email != '') { ?> <input type="checkbox" value="<?php echo $jd->email; ?>" name="emails[]" /><?php } ?>
       </td>
       </tr>
       <?php } ?>
       <tr><td><strong>Applicant</strong><font color="red">*</font></td></tr>
       <tr>
       <td><?php echo $applicantname; ?></td>
       <td><?php echo $applicantemail; ?>&nbsp;&nbsp;&nbsp;
       <?php if($applicantemail != '') { ?><input type="checkbox" value="<?php echo $applicantemail; ?>" name="emails[]" /> <?php } ?>
       </td>
       </tr>
       <tr><td><strong>Respondent / Defendant</strong><font color="red">*</font></td></tr>
       <?php foreach($defendantEmail as $deff) { ?>
       <tr>
       <td><?php echo $deff->name; ?></td>
       <td><?php echo $deff->email; ?>&nbsp;&nbsp;&nbsp;
       <?php if($deff->email != '') { ?> <input type="checkbox" value="<?php echo $deff->email; ?>" name="emails[]" /> <?php } ?>
       </td>
       </tr>
       <?php } ?>
     </table>
      <div class="form-group">
      <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="" style="color: white;">Cancel</a></button>
    </form>
        </div>
    <?php } 
    else{ ?>
     <form name="frm1" method="post" action="index.php/registration/e_registration_submit" enctype="multipart/form-data">
    <input type="hidden" name="caseid" value="<?php echo $case->id; ?>" >
    <input type="hidden" name="userid" value="<?php echo $uid = $case->created_by; ?>" >
    <input type="hidden" name="email" value="<?php echo $email = $this->elat->get_email($uid); ?>" >
    <input type="hidden" name="uname" value="<?php echo $applicantname; ?>" >
    <input type="hidden" name="unumber" value="<?php echo $applicantno; ?>" >
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
    <label for="chkEmail_yes">
            Case Status:&nbsp;&nbsp;&nbsp;
            <input type="radio" id="accept1" value="A" name="casestatus" required = "required"/>
            <b><font color = 'green'>Accept</font></b> &nbsp;&nbsp;&nbsp;
            <input type="radio" id="reject1" value="R" name="casestatus" required = "required"/>
            <b><font color = 'red'>Reject</font></b>
        </label>
        <hr />
        <div id="div_email" style="display: none;">
    <table>
      <tr>
        <td>Upload Dismissal Oeder:</td>
        <td><input type="file" name="dismissal_order" style="width:40%;"></td>
      </tr>
      <tr>
        <td>Select Reason For Rejection:</td>
        <td>
        <select name="rejectreason">
        <option value="0" selected>-- Select --</option>
        <option value="1" >No concrete case or controversy</option>
        <option value="2" >No legal standing</option>
        <option value="3" >Jurisdiction</option>
		    <option value="4" >Others</option>
        </select> 
        </td>
        <td>Additional Remarks:</td>
        <td><textarea name="remarks" rows="2" cols="20"></textarea></td>
      </tr>     
    </table>
    </div>
        <script>
            $(function () {
                $("input[name='casestatus']").click(function () {
                    if ($("#reject1").is(":checked")) {
                        $("#div_email").show();
                    } else {
                        $("#div_email").hide();
                    }
                });
            });
        </script>
    <hr>
    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="" style="color: white;">Cancel</a></button>
    </form>
     <?php  }
    }
    ?>
      </div>
    </div>
    <?php  
    } 
     ?> 
    
  
</div>
</div>
</div>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
    $('#reject').click(function() {
        $('.txbx').attr('hidden',false);
    });           
    $('#register').click(function() {
        $('.txbx').attr('hidden',true);
    });
});
</script>
<style>
.row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
}

.column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1;
}
</style>

