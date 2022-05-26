<script type="text/javascript">
function validate()
{
if(document.form1.case_type_2.value==0)
{
 document.form1.case_type_2.focus();
 document.form1.case_type_2.style.borderColor="#cc0000";
 return false;
 }
if(document.form1.case_type_3.value=="")
{
 document.form1.case_type_3.focus();
 document.form1.case_type_3.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add New Case Type Level 3</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/case_type_3/update'); ?>" name="form1" onSubmit="return validate()">	
           <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>" />
                 <div class="form-group">
                    <label><b>Case Type Level 2</b></label>                    
                    <select class="form-control_admin span12" name="case_type_2" id="case_type_2">
                 <option selected value="<?php echo $case_type_2;?>"><?php echo $this->admin->get_casel2($case_type_2); ?></option>
                 <?php
                 foreach($case_type as $row){
                 ?>
                 <option value="<?php print $row->id; ?>"><?php print $row->caseTypeleve2; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>   
                <div class="form-group">
                    <label><b>Case Name</b></label>
                    <input type="text" class="form-control_admin span12" name="case_type_3" id="case_type_3" value="<?php echo $case_type_3; ?>">
                </div>              
                <div class="form-group">
                    <label><b>Case Description</b></label>
                    <textarea class="form-control_admin span12" name="case_type_3desp" id="case_type_3desp" ><?php echo $desp?></textarea>
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

  