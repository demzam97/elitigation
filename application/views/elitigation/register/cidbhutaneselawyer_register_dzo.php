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
<div class="col-md-6 mx-auto">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body"><div id="loading" style="display:none">Please Wait...</div>
    <h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;ཁྲིམས་རྩོདཔ།་ཐོ་བཀོད། </h3>
    <form method="post" action="<?php echo site_url('publicregistration/bht_registration_lawyer_dzo'); ?>" onsubmit="$('#loading').show();">
        <div class="form-group">
        <label for="cid"><h3>མི་ཁུངས་ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།<b style="color:red; font-size: 35px;">*</b></h3></label>
        <input type="cid" class="form-control form-control-sm" name="cid" placeholder="Citizen Identity Card" required="required">
        </div>
        <button type="submit" class="btn btn-primary"><h3>འཕྲོ་མཐུད།</h3></button>
    
     </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
