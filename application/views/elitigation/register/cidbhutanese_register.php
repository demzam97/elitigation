<br><br><div class="container py-5">
<div class="row">
<div class="col-md-10 mx-auto">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body"><div id="loading" style="display:none">Please Wait...</div>
    <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Bhutanese Registration </h5>
    <form method="post" action="<?php echo site_url('publicregistration/bht_registration'); ?>" onsubmit="$('#loading').show();">
        <div class="form-group">
        <label for="cid"><b>Enter CID No.<font color="red">*</font></b></label>
        <input type="cid" class="form-control form-control-sm" name="cid" placeholder="Citizen Identity Card" required="required">
        </div>
        <button type="submit" class="btn btn-primary">Continue</button>
     </form>

<form action="<?php echo site_url('publicregistration/store_bhutanese_register_nocid'); ?>" method="post" onsubmit="$('#loading').show();">



<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="12">



<br><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
<i class="fas fa-hand-pointer"></i>&nbsp;&nbsp;Others [Bhutanese without CID card]
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
  <div class="col-md-8 col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="party_type"><b>Name:<font color="red">*</font></b></label>
                            <input type="text" class="form-control" name="name" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="nationality"><b>Gender:<font color="red">*</font></b></label>
                            <select class="form-control" name="gender" required="required">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                               </select>                         
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                             <label for="wp_passport"><b>DOB:</b></label>
                             <input type="date" class="form-control" name="dob" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name"><b>Thram Number:</b></label>
                            <input type="text" class="form-control" name="thram" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="gender"><b>House Number:</b></label>
                               <input type="text" class="form-control" name="houseno" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="dob"><b>Village:</b></label>
                            <input type="text" class="form-control" name="village">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="state"><b>Gewog:</b></label>
                            <input type="text" class="form-control" name="gewog">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="district"><b>Dungkhag:</b></label>
                            <input type="text" class="form-control" name="dungkhag">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="occupation"><b>Dzongkhag:<font color="red">*</font></b></label>
                            <input type="text" class="form-control" name="dzongkhag" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                    <label for="occupation"><b>Occupation</b></label>
                                <select class="form-control" name="occupation" id="occupation">
                                <option value="">Select</option>
                                <option value="1">Goverment Employee</option>
                                <option value="2">Private Employee</option>
                                <option value="3">Unemployed</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="md-form">
                             <label for="email"><b>Email ID<font color="red">*</font></b></label>
                             <input type="email" class="form-control" name="email" required="required">
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                	<div class="col-md-4">
                         <div class="md-form">
                             <label for="routepermitno"><b>Route Permit No.<font color="red">*</font></b></label>
                             <input type="text" class="form-control" name="routepermitno" required="required">
                        </div>
                    </div>
                	<div class="col-md-4">
                         <div class="md-form">
                             <label for="mobile"><b>Mobile No.<font color="red">*</font></b></label>
                             <input type="number" class="form-control" name="mobile" placeholder="Mobile No" required="required">
                        </div>
                    </div>
                	<div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b>Alternate Contact<font color="red">*</font></b></label>
                             <input type="number" class="form-control" name="alternate_mobile" required autofocus>
                        </div>
                    </div>
                </div>
<br>
<div class="card">
<div class="card-body" style="background-color: #edecec;">
                <label for="cur_address"><b>Current Address<font color="red">*</font></b></label>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="md-form">
                        	
                            
                            <label class="control-label">House/Building No<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b> <br></b></label>

                            <label class="control-label">Street Name<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" required autofocus/>
                        </div>
                    </div>

                      <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b><br> </b></label>
                            <label class="control-label">Place<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" required autofocus/>
                        </div>
                      </div>

                     <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b><br> </b></label>
                            <label class="control-label">Country<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_country" required autofocus/>
                        </div>
                    </div>
                </div>
</div>
</div>                
                    <div class="row">
                    <div class="col-md-3"><div class="md-form">
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
                    <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration'); ?>" style="color: white;">Cancel</button></a>
                    </div></div>
                </div>
            </form>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
</div>  
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
