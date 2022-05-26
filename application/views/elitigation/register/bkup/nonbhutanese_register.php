<br><br>
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
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="12">
<input type="hidden" name="party_type" value="1" >
                <div class="row">
                    <!--<div class="col-md-4">
                        <div class="md-form">
                            <label for="party_type"><b>Party Type<font color="red">*</font></b></label>
                            <select class="form-control" name="party_type" id="party_type" required autofocus>
                             <option value="">Select</option>
                             <option value="1">Individual</option>
                             <option value="2">Organization</option>
                            </select>
                        </div>
                    </div>-->
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
                    <!--<div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><b>Name<font color="red">*</font></b></label>
                            <input type="name" class="form-control" name="name" required="required">
                        </div>
                    </div>-->
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
                            <label for="state"><b>State / Province</b></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>                    

                </div>
                <div class="row">
                   <!-- <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><b>State / Province</b></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>-->
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
                              <label for="father_mother_name"><b>Father's / Mother's Name</b></label>
                              <input type="father_mother_name" class="form-control" name="father_mother_name">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b>Mobile No.</b></label>
                             <input type="number" class="form-control" name="mobile">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b>Alternate Mobile No.</b></label>
                             <input type="number" class="form-control" name="mobile">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><b>Email ID<font color="red">*</font></b></label>
                             <input type="email" class="form-control" name="email" required autofocus>
                        </div>
                    </div>
<div class="col-md-4">
                        <div class="md-form">
                            <label for="cur_address"><b>Current Address</b></label>
                            <textarea class="form-control md-textarea" name="cur_address" rows="3" placeholder="House/Building Number,&#10;Country"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">                    
                   <!-- <div class="col-md-4">
                        <div class="md-form">
                            <label for="cur_address"><b>Current Address</b></label>
                            <textarea class="form-control md-textarea" name="cur_address" rows="3" placeholder="House/Building Number,&#10;Country"></textarea>
                        </div>
                    </div>-->
                <div class="col-md-4">
                    <br><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
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
