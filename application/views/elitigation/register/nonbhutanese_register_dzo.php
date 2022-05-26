<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;
   font-size: 20px;
}
</style>
<br><br><br><br>
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
                            <label for="nationality"><h3>མི་ཁུངས།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <select class="form-control" name="nationality" id="nationality" required autofocus>
                            <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                            <?php foreach($country as $row)
                            { echo '<option value="'.$row->id.'">'.$row->country.'</option>';}
                            ?>
                            </select> 
                                                      
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="wp_passport"><h3>ལཱ་གཡོག་ཆོག་ཐམ། / ལམ་ཡིག་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="wp_passport" class="form-control" name="wp_passport" required="required">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><h3>མིང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="name" class="form-control" name="name" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                   
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
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><h3>མངའ་སྡེ།</h3></label>
                            <input type="state" class="form-control" name="state">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
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
                             <option value="3">Unemployed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="father_mother_name"><h3>ཕ/མའི་མིང་།</h3></label>
                              <input type="father_mother_name" class="form-control" name="father_mother_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="email" class="form-control" name="email" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="number" class="form-control" name="mobile" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཚབ་ཨང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="number" class="form-control" name="alternate_mobile" required autofocus>
                        </div>
                    </div>
                   
                </div>


<br>
<div class="card">
<div class="card-body" style="background-color: #edecec;">
<div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><h3>ད་ལྟོའི་ཁ་བྱང་། <b style="color:red; font-size: 35px;">*</b></h3></label></div></div></div>

                <div class="row">
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><h3>ཁྱིམ་/གུང་ཨང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_house" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><h3>ཁྲོམ་ལམ་མིང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_street" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><h3>ས་གནས།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_place" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label class="control-label"><h3>རྒྱལ་ཁབ།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_country" required autofocus/>
                        </div>
                    </div>
                </div>
</div>
</div>

                <div class="row">                    
                    
                <div class="col-md-4">
                    <br><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');"><h3 style="color: white;">ཕུལ་ནི།</h3></button>
                    <button type="cancel" class="btn btn-danger"><h3><a href="<?php echo site_url('welcome/elat_registration_dzo'); ?>" style="color: white;font-size: 35px;">ཆ་མེད་བཏང་ནི།</a></h3></button>

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
