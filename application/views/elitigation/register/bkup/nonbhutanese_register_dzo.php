<br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;ཕྱིའི་མི་ཐོ་བཀོད། </h3>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_nonbhutanese_register_dzo'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="12">

                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="party_type"><h3>རྩ་ཕན་གྱི་དབྱེ་ཁག།<font color="red">*</font></h3></label>
                            <select class="form-control" name="party_type" id="party_type" required autofocus>
                             <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                             <option value="1"><h2>མི་ངོ་།</h2></option>
                             <option value="2"><h2>ལས་ཚོགས།</h2></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><h3>མི་ཁུངས།<font color="red">*</font></h3></label>
                            <select class="form-control" name="nationality" id="nationality" required autofocus>
                            <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                            <?php foreach($country as $row)
                            { echo '<option value="'.$row->id.'">'.$row->country.'</option>';}
                            ?>
                            </select> 
                            </select>                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="wp_passport"><h3>ལཱ་གཡོག་ཆོག་ཐམ། / ལམ་ཡིག་ཨང་།<font color="red">*</font></h3></label>
                             <input type="wp_passport" class="form-control" name="wp_passport" required="required">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><h3>མིང༌།<font color="red">*</font></h3></label>
                            <input type="name" class="form-control" name="name" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="gender"><h3>ཕོ་མོའི་དབྱེ།</h3></label>
                               <select class="form-control" name="gender">
                                <option value=""></option>
                                <option value="1"><h3>ཕོ།</h3></option>
                                <option value="2"><h3>མོ།</h3></option>
                               </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="dob"><h3>སྐྱེས་ཚེས།</h3></label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><h3>མངའ་སྡེ།</h3></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="district"><h3>རྫོང་ཁག།</h3></label>
                            <input type="district" class="form-control" name="district">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="occupation"><h3>ལས་འགན།</h3></label>
                            <select class="form-control" name="occupation">
                             <option selected><h2>གདམ་ཁ་རྐྱབ</h2></option>
                             <option value="1">Goverment Employee</option>
                             <option value="2">Private Employee</option>
                             <option value="3">Freelance Employee</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="father_mother_name"><h3>ཕ/མའི་མིང་།</h3></label>
                              <input type="father_mother_name" class="form-control" name="father_mother_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཨང་།</h3></label>
                             <input type="number" class="form-control" name="mobile">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<font color="red">*</font></h3></label>
                             <input type="email" class="form-control" name="email" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="cur_address"><h3>ད་ལྟོའི་ཁ་བྱང་། </h3></label>
                            <textarea class="form-control md-textarea" name="cur_address" rows="3" placeholder="གུང་ཨང༌། ཁྱིམ་ཨང༌།,&#10;རྒྱལ་ཁབ།"></textarea>
                        </div>
                    </div>
                <div class="col-md-4">
                    <br><br>
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
