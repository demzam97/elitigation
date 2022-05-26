<script type="text/javascript">
function validate()
{
if(document.jpname.lntt.value=="")
{
 document.jpname.lntt.focus();
 document.jpname.lntt.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Edit Judicial Process</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/judicial_process/update'); ?>"  name="form1" onSubmit="return validate()">	
                <input type="hidden"  name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Judicial Process Name</b></label>
                    <input type="text" class="form-control_admin span12" name="jpname" id="jpname" value="<?php echo $jpname;?>">
                </div>              
                <div class="form-group">
                    <label><b>Judicial Process Description</b></label>
                    <textarea class="form-control_admin span12" name="jpdesp" id="jpdesp" ><?php echo $jpdesp?></textarea>
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

  