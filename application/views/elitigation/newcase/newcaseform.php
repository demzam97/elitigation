<br><br>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<div class="container py-6">
<div class="col-sm-12">
<h4>Add New Case</h4>   
<div class="card">
<?php $uid = $this->session->userdata('user_id');?>
<form action="<?php echo site_url('publicregistration/store_new_case'); ?>" method="post" enctype="multipart/form-data" onsubmit="$('#loading').show();">
<div class="row"> 
  <div class="card-body mx-xl-4">                          
  <div class="form-group col-md-14">
        <label for="court"><b>Select Court:<font color="red">*</font></b></label>
        <select class="form-control form-control" name="court" id="court" required="required">
          <option value="" selected>-- Select --</option>
          <?php foreach($courts as $row):?>
          <option value="<?php echo $row->id;?>"><?php echo $row->court_name;?></option>
          <?php endforeach;?>
        </select>
    </div>



    <?php if($this->session->userdata('user_type')=='12') { ?>
    <div class="form-group col-md-14">
    <label for="case_title"><b>Upload Proof of Jurisdiction Document:<font color="red">*</font></b>
  <i>(e.g. Concern letter if employed, Business License and Occupancy Certificate of your Building, etc.)</i>
   </label>
    <div class="input-group">   
     <input type="file" name="jurisdiction_copy" class="form-control" id="fileUpload" required="required">
    </div>
   <b><i> Note: </i></b><br>
    <p>As per Section 120 of CCPC, where:</p>
    <ul>
    <li>The cause of action arose or</li>
    <li>Plaintiff/Defendant resdies or</li>
    <li>Property is situated</li>
    <li>Agreement is signed/Entered or</li>
    <li>The Government authority is located</li>
    </ul>
    </div>
  </div>

  <div class="card-body mx-xl-4">
  <br>
    <div class="form-group col-md-14">
    <label for="case_title"><b>Upload Petition(Include Power of Attorney if applicable):<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="petition_copy" class="form-control" required="required" id="fileUpload" >
    </div>
    </div>
	
	<div class="form-group col-md-14">
    <label for="case_title"><b>Upload CID Copy:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="cid_copy" class="form-control" required="required" id="fileUpload" >
     

    </div>
    </div>
    <b>Upload Other Relevant Documents:</b>
    <div class="input-group control-group img_div form-group col-md-4" >
          <input type="file" name="relevant_copy[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide ">
          <div class="control-group input-group form-group col-md-4" style="margin-top:10px">
            <input type="file" name="relevant_copy[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
    </div>
	  </div>


     <div class="form-group col-md-14">
    <label for="case_title"><b>Select Mode of Hearing:<font color="red">*</font></b></label>
    <br>

    <div class="custom-control custom-radio">
    <input type="radio" id="defaultUnchecked" name="hearingoption" value='R' required="required">
    <label for="defaultUnchecked">Remote Hearing</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="defaultChecked" name="hearingoption" value='C' required="required">
    <label for="defaultChecked">Courtroom Hearing</label>
    </div>
    <hr>
    <div class="custom-control custom-radio">
    <input type="checkbox" id="defaultChecked" name="checkopt" value='1' required="required">
    <p> I hereby agree to appear in person before the court as and when directed by the court.</p>
    </div>


     <?php } ?>
    
    <?php if($this->session->userdata('user_type')=='15') { ?>

    <div class="form-group col-md-14">
    <label for="case_title"><b>Upload ChargeSheet:<font color="red">*</font></b></label>
    <div class="input-group">
     <input type="file" name="chargesheet" class="form-control" required="required" id="fileUpload" >
    </div>
   <b><i> Note: </i></b><br>
    <p>As per Section 187 of CCPC</p>
   </div>

<div class="form-group col-md-14">
    <label for="case_title"><b>Upload Power of Attorney:<font color="red">*</font></b></label>
    <div class="input-group">
     <input type="file" name="petition_copy" class="form-control" required="required" id="fileUpload" >
    </div>
    </div>
    <b>Upload Other Relevant Documents:</b>
    <div class="input-group control-group img_div form-group col-md-4" >
          <input type="file" name="relevant_copy[]" class="form-control">
          <div class="input-group-btn">
            <button class="btn btn-success btn-add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide ">
          <div class="control-group input-group form-group col-md-4" style="margin-top:10px">
            <input type="file" name="relevant_copy[]" class="form-control">
            <div class="input-group-btn">
              <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
    </div>
          </div>

  <div class="form-group col-md-14">
    <label for="court"><b>Select Case Type:<font color="red">*</font></b></label>
    <select class="form-control form-control" name="casetype" id="casetype" >
      <option value="1" selected>Criminal</option>
      <option value="2">Civil</option>
    </select>
  </div>

   <div class="form-group col-md-14">
    <label for="case_title"><b>Select Mode of Hearing:<font color="red">*</font></b></label>
    <br>

    <div class="custom-control custom-radio">
    <input type="radio" id="defaultUnchecked" name="hearingoption" value='R' required="required">
    <label for="defaultUnchecked">Remote Hearing</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" id="defaultChecked" name="hearingoption" value='C' required="required">
    <label for="defaultChecked">Courtroom Hearing</label>
    </div>
    <hr>
    <div class="custom-control custom-radio">
    <input type="checkbox" id="defaultChecked" name="checkopt" value='1' required="required">
    <p>1. I hereby acknowledge that I have read and understood section 187 of the Civil and Criminal Procedure Code and I am submitting the chargesheet accordingly.</p>
    <p>2. I hereby agree to appear in person before the court as and when directed by the court.</p>
    </div>


    <?php } ?>

    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="<?php echo site_url('publicregistration/newcase/'.$uid.''); ?>" style="color: white;">Cancel</a></button>
    
  </div>
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
  <div id="loading" style="display:none">Please Wait...</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>

<script type="text/javascript"> 
    $(document).ready(function() { 
      $(".btn-add-more").click(function(){ 
          var html = $(".clone").html();
          $(".img_div").after(html);
      }); 
      $("body").on("click",".btn-remove",function(){ 
          $(this).parents(".control-group").remove();
      }); 
    });
 
</script>


