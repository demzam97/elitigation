<script type="text/javascript">
function validate()
{
if(document.form1.et.value=="")
{
 document.form1.et.focus();
 document.form1.et.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Enforcement Type</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/enforcement_type/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Enforcement Type</b></label>
                    <input type="text" class="form-control_admin span12" name="et" id="et">
                </div>              
                <div class="form-group">
                    <label><b>Enforcement Type Description</b></label>
                    <textarea class="form-control_admin span12" name="etdesp" id="etdesp"></textarea>
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
