<script type="text/javascript">
function validate()
{
if(document.form1.lntt.value=="")
{
 document.form1.lntt.focus();
 document.form1.lntt.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Update Litigant Type</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/litigant_type/update'); ?>"  name="form1" onSubmit="return validate()">	
                <input type="hidden"  name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Litigant Type</b></label>
                    <input type="text" class="form-control_admin span12" name="lntt" id="lntt" value="<?php echo $lntt;?>">
                </div>              
                <div class="form-group">
                    <label><b>Litigant Type Description</b></label>
                    <textarea class="form-control_admin span12" name="lnttdesp" id="lnttdesp" ><?php echo $lnttdesp?></textarea>
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Update"
                    
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
        </div>
    </div>
</div>

  