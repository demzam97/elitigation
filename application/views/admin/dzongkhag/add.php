<script type="text/javascript">
function validate()
{
if(document.form1.dzongkhag.value=="")
{
 document.form1.dzongkhag.focus();
 document.form1.dzongkhag.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add New Dzongkhag/Thromde</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/dzongkhag/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Dzongkhag/Thromde Name</b></label>
                    <input type="text" class="form-control_admin span12" name="dzongkhag" id="dzongkhag">
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

  