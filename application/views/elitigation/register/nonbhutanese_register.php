<br><br><br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Non-Bhutanese Registration </h5>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_nonbhutanese_register'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="16">

                <div class="row">

                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><b>Nationality<font color="red">*</font></b></label>
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
                             <label for="wp_passport"><b>Work Permit / Passport No.<font color="red">*</font></b></b></label>
                             <input type="wp_passport" class="form-control" name="wp_passport" placeholder="Work Permit/Passport No." required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><b>Name<font color="red">*</font></b></label>
                            <input type="name" class="form-control" name="name" required="required">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="gender"><b>Gender</b></label>
                               <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                               </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="dob"><b>DOB</b></label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><b>State/Province</b></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="district"><b>District/City</b></label>
                            <input type="district" class="form-control" name="district">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="occupation"><b>Occupation</b></label>
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
                              <label for="father_mother_name"><b>Father's/Mother's Name</b></label>
                              <input type="father_mother_name" class="form-control" name="father_mother_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><b>Email ID<font color="red">*</font></b></label>
                             <input type="email" class="form-control" name="email" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b>Mobile No.<font color="red">*</font></b></label>
                             <input type="number" class="form-control" name="mobile" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="md-form">
                             <label for="mobile"><b>Alternate Mobile No.<font color="red">*</font></b>(Contact of a person through which you can be reached)</label>
                             <input type="number" class="form-control" name="alternate_mobile" required autofocus>
                        </div>
                    </div>
                   
                </div>


<br>
<div class="card">
<div class="card-body" style="background-color: #edecec;">
<div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><b>Current Address<font color="red">*</font></b></label></div></div></div>

                <div class="row">
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label">House/Building Number<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Street Name<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Place<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Country<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_country" required autofocus/>
                        </div>
                    </div>
                </div>
</div>
</div>

                <div class="row">                    
                    
                <div class="col-md-4">
                    <br><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
                    <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration'); ?>" style="color: white;">Cancel</button></a>

                </div>
                </div>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
        </div>
    </div>

</div>
</div> 
</div>   

</div> 
</div>
