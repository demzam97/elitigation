<div class="container py-5">
<div class="row">
<div class="col-md-6 mx-auto">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body"><div id="loading" style="display:none">Please Wait...</div>
    <h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Litigant Registration </h5>
    <form method="post" action="<?php echo site_url('publicregistration/litigant_registration'); ?>" onsubmit="$('#loading').show();">
        <input type="hidden" name="miscid" value="<?php echo $miscid;?>"
        <div class="form-group">
        <label for="cid"><b>Enter CID No.<font color="red">*</font></b></label>
        <input type="cid" class="form-control form-control-sm" name="cid" placeholder="Citizen Identity Card" required="required">
        </div>
        <button type="submit" class="btn btn-primary">Continue</button>
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
