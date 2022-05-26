<script type="text/javascript">
function validate()
{
if(document.form1.act.value=="")
{
 document.form1.act.focus();
 document.form1.act.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Act</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/acts/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Act Name</b></label>
                    <input type="text" class="form-control_admin span12" name="act" id="act">
                </div>              
                <div class="form-group">
                    <label><b>Act Description</b></label>
                    <textarea class="form-control_admin span12" name="actdesp" id="actdesp"></textarea>
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

  