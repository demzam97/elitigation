<br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;ལས་ཚོགས་ཐོ་བཀོད། </h3>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_organization_register_dzo'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="12">

                <div class="row">                  
                    <div class="col-md-4">
                        <label for="org_type"><h3>ལས་ཚོགས་དབྱེ་ཁག<font color="red">*</font></h3></label>
                         <select class="form-control" name="org_type" id="org_type" required autofocus>
                          <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                          <option value="1"><h2>གཞུང་གི་ལས་སྡེ།</h2></option>
                          <option value="2"><h2>སྒེར་དབང་ཚོང་སྡེ།</h2></option>
                          <option value="3"><h2>རྒྱལ་སྤྱིའི་ཚོང་སྡེ།</h2></option>
                          <option value="4"><h2>ལས་འཛིན།</h2></option>
                         </select>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="licenseno"><h3>ཆོག་ཐམ་ཨང་།/ཐོ་བཀོད་ཨང་།<font color="red">*</font></h3></label>
                            <input type="text" class="form-control" name="licenseno" required="required">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="md-form">
                            <label for="office_address"><h3>ཡིག་ཚང་ཁ་བྱང་།</h3></label>
                            <textarea class="form-control" name="office_address" rows="3"></textarea>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="po_box"><h3>འགྲེམས་ཨང་།</h3></label>
                            <input type="text" class="form-control" name="po_box">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="phone"><h3>བརྒྱུད་འཕྲིན་ཨང༌།</h3></label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="fax"><h3>པར་འཕྲིན།</h3></label>
                            <input type="number" class="form-control" name="fax">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<font color="red">*</font></h3></label>
                            <input type="email" class="form-control" name="email" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="contact_person"><h3>འབྲེལ་བ་འཐབ་སའི་མི་ངོ།</h3></label>
                             <input type="text" class="form-control" name="contact_person">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="contactperson_mobile"><h3>འབྲེལ་བ་འཐབ་སའི་འགྲུལ་འཕྲིན་ཨང་།</h3></label>
                            <input type="number" class="form-control" name="contactperson_mobile">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="contactperson_email"><h3>འབྲེལ་བ་འཐབ་སའི་གློག་འཕྲིན་ཁ་བྱང་།</h3></label>
                             <input type="email" class="form-control" name="contactperson_email" >
                        </div>
                    </div>
                    <div class="col-md-4">
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');"><h3 style="color: white;">ཕུལ་ནི།</h3></button>
                    <button type="cancel" class="btn btn-danger"><h3><a href="<?php echo site_url('welcome/elat_registration_dzo'); ?>" style="color: white;">ཆ་མེད་བཏང་ནི།</h3></button></a>
                    </div>
                </div>
            <div id="loading" style="display:none"><font color = "red"><h4>བསྒུག་གནང་།</h4>...</font></div>
            </form>
        </div>
    </div>

</div>
</div> 
</div>   

</div> 
</div>
