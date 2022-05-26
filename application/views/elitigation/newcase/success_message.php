<br><br>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<div class="container py-6">
<div class="col-sm-12">
<h4>Add Respondent / Defendant</h4>   
<div class="card">
<?php $uid = $this->session->userdata('user_id');?>
<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .red{ background: #f5f5f5; }
    .green{ background: #f5f5f5; }
    .blue{ background: #f5f5f5; }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
<!-- start -->
<div>
        <label><input type="radio" name="colorRadio" value="red"> Bhutanese</label>
        <label><input type="radio" name="colorRadio" value="green"> Non Bhutanese</label>
        <label><input type="radio" name="colorRadio" value="blue"> Organization</label>
    </div>
    <div class="red box">      
      <form action="<?php echo site_url('publicregistration/respondentdefendant_registration'); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="caseid" value="<?php echo $caseid; ?>">
      <input type="hidden" name="type" value="14"> 
           <div class="form-group">
            <label for="recipient-name" class="col-form-label"><font color = "black">Enter CID:</font><font color = "red">*</font></label>
            <input type="number" class="form-control" id="recipient-name" name="cid" required="required">
           </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" >Next</button>
      </div>
  </form> 
    </div>
    <div class="green box">
    <form action="<?php echo site_url('publicregistration/respondentdefendant_registration'); ?>" method="post" onsubmit="$('#loading').show();">
    <input type="hidden" name="type" id="dataid" value="16"> 
    <input type="hidden" name="caseid" id="dataid" value="<?php echo $caseid; ?>"> 
                <div class="row">
                <div class="col-md-4">
                    <div class="md-form">
                    <label for="occupation"><b><font color = "black">Respondent / Defendant / Witness</font><font color="red">*</font></b></label>
                    <select class="form-control" name="resdef" id="resdef" required="required">
                    <option value="">-- Select --</option>
                    <option value="1">Respondent</option>
                    <option value="2">Defendant</option>
                    <option value="3">Witness</option>
                    </select>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><b><font color = "black">Nationality</font><font color="red">*</font></b></label>
                            <select class="form-control" name="nationality" id="nationality" required autofocus>
                            <option value="">Select</option>
                            <?php foreach($country as $row)
                            { echo '<option value="'.$row->id.'">'.$row->country.'</option>';}
                            ?>
                            </select>                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="wp_passport"><b><font color = "black">Work Permit / Passport No.</font></b></b></label>
                             <input type="wp_passport" class="form-control" name="cid" placeholder="Work Permit/Passport No.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><b><font color = "black">Name</font><font color="red">*</font></b></label>
                            <input type="name" class="form-control" name="name" required="required">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="gender"><b><font color = "black">Gender</font></b></label>
                               <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                               </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="dob"><b><font color = "black">DOB</font></b></label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><b><font color = "black">State/Province</font></b></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="district"><b><font color = "black">District/City</font></b></label>
                            <input type="district" class="form-control" name="district">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="occupation"><b><font color = "black">Occupation </font></b></label>
                             <select class="form-control" name="occupation">
                              <option selected>Select Occupation</option>
                              <option value="1">Goverment Employee</option>
                              <option value="2">Private Employee</option>
                              <option value="3">Unemployed</option>
                             </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="father_mother_name"><b><font color = "black">Father's/Mother's Name</font></b></label>
                              <input type="father_mother_name" class="form-control" name="father_mother_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><b><font color = "black">Email ID</font></b></label>
                             <input type="email" class="form-control" name="email" autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b><font color = "black">Mobile No.</font><font color="red">*</font></b></label>
                             <input type="number" class="form-control" name="mobile" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="md-form">
                             <label for="mobile"><b><font color = "black">Alternate Mobile No.</font></label>
                             <input type="number" class="form-control" name="alternate_mobile" autofocus>
                        </div>
                    </div>
                   
                </div>


<br>
<div class="card">
<div class="card-body" style="background-color: #edecec;">
<div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><b><font color = "black">Current Address</font><font color="red">*</font></b></label></div></div></div>

                <div class="row">
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><font color = "black">House/Building Number</font><font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><font color = "black">Street Name</font><font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><font color = "black">Place</font><font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" required autofocus/>
                        </div>
                    </div>

                    
                </div>
</div>
</div>

                <div class="row">                    
                    
                <div class="col-md-4">
                    <br><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
                   
                </div>
                </div>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
    </div>
    <div class="blue box">
    <form action="<?php echo site_url('publicregistration/respondentdefendant_registration'); ?>" method="post" onsubmit="$('#loading').show();">
    <input type="hidden" name="type" id="dataid" value="15"> 
    <input type="hidden" name="caseid" id="dataid" value="<?php echo $caseid; ?>"> 
                <div class="row">
                <div class="col-md-4">
                    <div class="md-form">
                    <label for="occupation"><b><font color = "black">Respondent / Defendant / Witness</font><font color="red">*</font></b></label>
                    <select class="form-control" name="resdef" id="resdef" required="required">
                    <option value="">-- Select --</option>
                    <option value="1">Respondent</option>
                    <option value="2">Defendant</option>
                    <option value="3">Witness</option>
                    </select>
                    </div>
                </div>
                        <div class="col-md-4">
                        <div class="md-form">
                             <label for="licenseno"><b><font color = "black">Organization Name</font><font color="red">*</font></b></label>
                             <input type="text" class="form-control" name="orgname" required autofocus>
                        </div>
                        </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><b><font color = "black">Organization Type</font><font color="red">*</font></b></label>
                            <select class="form-control" name="org_type" id="org_type" required autofocus>
                             <option value="">Select</option>
                             <option value="1">Government Agency</option>
                             <option value="2">Private Company</option>
                             <option value="3">International Company</option>
                             <option value="4">Corporation</option>
                             <option value="5">Civil Society Organization</option> 
                            </select>                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="office_address"><b><font color = "black">Office Address</font><font color="red">*</font></b></label>
                            <textarea class="form-control" name="office_address" rows="3" required="required"></textarea>
                        </div>
                    </div>                
                </div>
                <div class="row">
                    <div class="col-md-4">                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
                    </div>
                </div>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
    </div>

<!-- end -->    
</div>
</div>
</div>
</body>
</html>
