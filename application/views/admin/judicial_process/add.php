<script type="text/javascript">
function validate()
{
if(document.form1.jpname.value=="")
{
 document.form1.jpname.focus();
 document.form1.jpname.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Judicial Process</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/judicial_process/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Judicial Process Name</b></label>
                    <input type="text" class="form-control_admin span12" name="jpname" id="jpname">
                </div>              
                <div class="form-group">
                    <label><b>Judicial Process Description</b></label>
                    <textarea class="form-control_admin span12" name="jpdesp" id="jpdesp"></textarea>
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit"
                    
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
        </div>
    </div>
</div>
