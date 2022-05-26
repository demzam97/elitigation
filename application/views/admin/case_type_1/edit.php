<script type="text/javascript">
function validate()
{
if(document.form1.case_type_1.value=="")
{
 document.form1.case_type_1.focus();
 document.form1.case_type_1.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add New Case Type Level 1</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/case_type_1/update'); ?>" name="form1" onSubmit="return validate()">	
           <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>" />
                
                <div class="form-group">
                    <label><b>Case Name</b></label>
                    <input type="text" class="form-control_admin span12" name="case_type_1" id="case_type_1" value="<?php echo $case_type_1; ?>">
                </div>              
                <div class="form-group">
                    <label><b>Case Description</b></label>
                    <textarea class="form-control_admin span12" name="case_type_1desp" id="case_type_1desp" ><?php echo $desp?></textarea>
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

  