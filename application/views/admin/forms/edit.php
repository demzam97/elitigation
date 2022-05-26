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
        <b><p class="panel-heading no-collapse">Update Forms</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/forms/update'); ?>"  name="form1" onSubmit="return validate()">	
                <input type="hidden"  name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Form Name</b></label>
                    <input type="text" class="form-control_admin span12" name="fname" id="fname" value="<?php echo $fname;?>">
                </div>              
                <div class="form-group">
                    <label><b>Form Description</b></label>
                    <textarea class="form-control_admin span12" name="fdesp" id="fdesp" ><?php echo $fdesp?></textarea>
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
