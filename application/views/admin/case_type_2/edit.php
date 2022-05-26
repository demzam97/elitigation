<script type="text/javascript">
function validate()
{
if(document.form1.case_type_1.value==0)
{
 document.form1.case_type_1.focus();
 document.form1.case_type_1.style.borderColor="#cc0000";
 return false;
 }
if(document.form1.case_type_2.value=="")
{
 document.form1.case_type_2.focus();
 document.form1.case_type_2.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add New Case Type Level 2</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/case_type_2/update'); ?>" name="form1" onSubmit="return validate()">	
           <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>" />
                 <div class="form-group">
                    <label><b>Case Type Level 1</b></label>                    
                    <select class="form-control_admin span12" name="case_type_1" id="case_type_1">
                 <option selected value="<?php echo $case_type_1;?>"><?php echo $this->admin->get_casel1($case_type_1); ?></option>
                 <?php
                 foreach($case_type as $row){
                 ?>
                 <option value="<?php print $row->id; ?>"><?php print $row->caseTypelevel1; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>   
                <div class="form-group">
                    <label><b>Case Name</b></label>
                    <input type="text" class="form-control_admin span12" name="case_type_2" id="case_type_2" value="<?php echo $case_type_2; ?>">
                </div>              
                <div class="form-group">
                    <label><b>Case Description</b></label>
                    <textarea class="form-control_admin span12" name="case_type_2desp" id="case_type_2desp" ><?php echo $desp?></textarea>
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

  