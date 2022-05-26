<div class="col-sm-12">
<div class="card">
<?php $uid = $this->session->userdata('user_id');?>
<form action="<?php echo site_url('elatappeal/add_appeal_def'); ?>" method="post" enctype="multipart/form-data" onsubmit="$('#loading').show();">
<input type="hidden" name="court_id" value="<?php echo $court_id; ?>" />
<input type="hidden" name="case_id" value="<?php echo $case_id; ?>" />
<input type="hidden" name="elatid" value="<?php echo $elatid; ?>" />
<input type="hidden" name="sign_judge[]" value="'.$judges.'" />
<input type="hidden" name="applicant_type" value="2" />

<div class="row"> 
  <div class="card-body mx-xl-4">                          
    <div class="form-group col-md-14">
        <label for="court"><b>Deciding Court:<font color="red">*</font></b></label>
        <input type="text" name="court" value="<?php echo $this->public->get_CourtName($court_id); ?>" class="form-control form-control" readonly />

    </div>
    <div class="form-group col-md-14">
        <label for="Name"><b>Appeallate Court:</b></label>
        <select name="appeal_court" class="form-control form-control">
        <option value="0" selected>Select One</option>
        <?php foreach($court_type as $court): ?>
        <option value="<?php echo $court->id; ?>" selected><?php echo $court->court_name; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-md-14">
        <label for="case_brief"><b>Appeal Brief:</b></label>
        <textarea class="form-control form-control" name="appeal_brief"  id="case_brief" rows="3"></textarea>
    </div>
  </div>
<div class="card-body mx-xl-4">
  <br>
    <div class="form-group col-md-14">
    <label for="case_title"><b>Upload Appeal Application Copy:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="application_copy" class="form-control" required="required" id="fileUpload" >
    </div>
    </div>

    <div class="form-group col-md-14">      
    <label for="case_title"><b>Hearing Option:<font color="red">*</font></b></label>
    <br>

    <div class="custom-control custom-radio">
    <input type="radio" id="defaultUnchecked" name="hearingoption" value='R' required="required">
    <label for="defaultUnchecked">Remote Hearing</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="defaultChecked" name="hearingoption" value='C' required="required">
    <label for="defaultChecked">Courtroom Hearing</label>
    </div>

    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="<?php echo site_url('publicregistration/caseappeal/'.$uid.''); ?>" style="color: white;">Cancel</a></button>
    
  </div>
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
  <div id="loading" style="display:none">Please Wait...</div>
</div>
</form>
</div>
</div>
</body>
</html>


