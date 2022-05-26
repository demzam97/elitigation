<script type="text/javascript">
function validate()
{
if(document.form1.cg.value=="")
{
 document.form1.cg.focus();
 document.form1.cg.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Case Ground</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/case_ground/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Case Ground</b></label>
                    <input type="text" class="form-control_admin span12" name="cg" id="cg">
                </div>              
                <div class="form-group">
                    <label><b>Case Ground Description</b></label>
                    <textarea class="form-control_admin span12" name="cgdesp" id="cgdesp"></textarea>
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

  