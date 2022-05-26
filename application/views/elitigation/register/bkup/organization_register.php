<br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Organization Registration </h5>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_organization_register'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="15">
                <div class="row">                  
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><b>Organization Type<font color="red">*</font></b></label>
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
                             <label for="licenseno"><b>License No / Registration No.</b></label>
                             <input type="text" class="form-control" name="licenseno" >
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="md-form">
                            <label for="office_address"><b>Office Address</b></label>
                            <textarea class="form-control" name="office_address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="po_box"><b>P.O. Box</b></label>
                            <input type="text" class="form-control" name="po_box">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="phone"><b>Office Phone</b></label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="fax"><b>Office Fax</b></label>
                            <input type="number" class="form-control" name="fax">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <!--<div class="col-md-4">
                        <div class="md-form">
                            <label for="email"><b>Office Email<font color="red">*</font></b></label>
                            <input type="email" class="form-control" name="email" required="required">
                        </div>
                    </div>-->
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="contact_person"><b>Contact Person <font color="red">*</font></b></label>
                             <input type="text" class="form-control" name="contact_person" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="contactperson_mobile"><b>Contact Person's Mobile No. <font color="red">*</font></b></label>
                            <input type="number" class="form-control" name="contactperson_mobile" required="required">
                        </div>
                    </div>
                
              <div class="col-md-4">
                        <div class="md-form">
                             <label for="contactperson_email"><b>Contact Person's Email ID<font color="red">*</font></b></label>
                             <input type="email" class="form-control" name="email"  required="required" >
                        </div>
                    </div>

                <div class="col-md-4">
                <br>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
                <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration'); ?>" style="color: white;">Cancel</button></a>
                </div>

                </div>
                
                   <!--<div class="row">
                   <div class="col-md-4">
                        <div class="md-form">
                             <label for="contactperson_email"><b>Contact Person's Email ID</b></label>
                             <input type="email" class="form-control" name="email" >
                        </div>
                   </div>
                   <div class="col-md-4">
                   <br>
                   <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
                   <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration'); ?>" style="color: white;">Cancel</button></a>
                   </div>
                   </div>-->
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
        </div>
    </div>

</div>
</div> 
</div>   

</div> 
</div>
