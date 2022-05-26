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
<br><br><div class="container py-5">
<div class="row">
<div class="col-md-10 mx-auto">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body"><div id="loading" style="display:none">Please Wait...</div>
    <h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;འབྲུག་མི་ཐོ་བཀོད། </h3>
    <form method="post" action="<?php echo site_url('publicregistration/bht_registration_dzo'); ?>" onsubmit="$('#loading').show();">
        <div class="form-group">
        <label for="cid"><b><h3>མི་ཁུངས་ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></b></label>
        <input type="cid" class="form-control form-control-sm" name="cid" placeholder="Citizen Identity Card" required="required">
        </div>
        <button type="submit" class="btn btn-primary"><h3>འཕྲོ་མཐུད།</h3></button>
     </form>

<form action="<?php echo site_url('publicregistration/store_bhutanese_register_nocid'); ?>" method="post" onsubmit="$('#loading').show();">



<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="12">



<br><a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
<h3><i class="fas fa-hand-pointer"></i>&nbsp;&nbsp;མི་ཁུངས་ངོ་སྤྲོད་ལག་ཁྱེར་མེད་མི་འབྲུག་མི་གི་་ཐོ་བཀོད།</h3>
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
  <div class="col-md-8 col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="party_type"><h3>མིང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="name" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="nationality"><h3>ཕོ་མོའི་དབྱེ།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <select class="form-control" name="gender" required="required">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                               </select>                         
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                             <label for="wp_passport"><h3>སྐྱེས་ཚེས།</h3></label>
                             <input type="date" class="form-control" name="dob" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="name"><h3>ཁྲམ་ཨང་།</h3></label>
                            <input type="text" class="form-control" name="thram" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="gender"><h3>གུང་ཨང་།</h3></label>
                               <input type="text" class="form-control" name="houseno" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="dob"><h3>གཡུས།</h3></label>
                            <input type="text" class="form-control" name="village">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="state"><h3>རྒེད་འོག</h3></label>
                            <input type="text" class="form-control" name="gewog">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="district"><h3>དྲུང་ཁག</h3></label>
                            <input type="text" class="form-control" name="dungkhag">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="md-form">
                            <label for="occupation"><h3>རྫོང་ཁག<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="dzongkhag" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form">
                    <label for="occupation"><h3>ལཱ་གཡོག</h3></label>
                                <select class="form-control" name="occupation" id="occupation">
                                <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                                <option value="1">Goverment Employee</option>
                                <option value="2">Private Employee</option>
                                <option value="3">Unemployed</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="md-form">
                             <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="email" class="form-control" name="email" required="required">
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                  <div class="col-md-4">
                         <div class="md-form">
                             <label for="routepermitno"><h3>ལམ་འགྲུལ་ཆོག་ཐམ་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="text" class="form-control" name="routepermitno" required="required">
                        </div>
                    </div>
                  <div class="col-md-4">
                         <div class="md-form">
                             <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
                             <input type="number" class="form-control" name="mobile" required="required">
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
                <label for="cur_address"><h3>[ཁ་བྱང་།] <b style="color:red; font-size: 35px;">*</b></h3></label>
                 <div class="row">
                    <div class="col-md-3">
                        <div class="md-form">
                          
                            
                            <label class="control-label"><h3>ཁྱིམ་/གུང་ཨང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_house" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b> <br></b></label>

                            <label class="control-label"><h3>ཁྲོམ་ལམ་མིང༌།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_street" required autofocus/>
                        </div>
                    </div>

                      <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b><br> </b></label>
                            <label class="control-label"><h3>ས་གནས།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_place" required autofocus/>
                        </div>
                      </div>

                     <div class="col-md-3">
                        <div class="md-form"><label for="cur_address"><b><br> </b></label>
                            <label class="control-label"><h3>རྒྱལ་ཁབ།<b style="color:red; font-size: 35px;">*</b></h3></label>
                            <input type="text" class="form-control" name="cur_address_country" required autofocus/>
                        </div>
                    </div>
                </div>
</div>
</div>                
                    <div class="row">
                    <div class="col-md-3"><div class="md-form">
                    <br>
                     <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to Submit ?');"><h5 style="font-size: 35px;">ཕུལ་ནི།</h5></button>
                    <button type="cancel" class="btn btn-danger btn-sm"><h5><a href="<?php echo site_url('welcome/elat_registration_dzo'); ?>" style="color: white;font-size: 35px;">ཆ་མེད་བཏང་ནི།</a></h5></button>
                    </div></div>
                </div>
            </form>
            <div id="loading" style="display:none"><font color = "red"><h4>བསྒུག་གནང་།</h4>...</font></div>
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
