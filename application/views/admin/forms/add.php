<script type="text/javascript">
function validate()
{
if(document.form1.fname.value=="")
{
 document.form1.fname.focus();
 document.form1.fname.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Form</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/forms/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Form Name</b></label>
                    <input type="text" class="form-control_admin span12" name="fname" id="fname">
                </div>              
                <div class="form-group">
                    <label><b>Form Description</b></label>
                    <textarea class="form-control_admin span12" name="fdesp" id="fdesp"></textarea>
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

  