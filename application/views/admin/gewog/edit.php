<script type="text/javascript">
function validate()
{
if(document.form1.dzongkhag.value==0)
{
 document.form1.dzongkhag.focus();
 document.form1.dzongkhag.style.borderColor="#cc0000";
 return false;
 }
 if(document.form1.gewog.value=="")
{
 document.form1.gewog.focus();
 document.form1.gewog.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Edit Gewog</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/gewog/update'); ?>"  name="form1" onSubmit="return validate()">
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">	                
                <div class="form-group">
                    <label><b>Dzongkhag</b></label>                    
                 <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag">
                 <option selected value="<?php echo $dzoid; ?>"><?php echo $this->admin->get_Dzongkhag($dzoid); ?></option>
                 <?php
                 foreach($dzongkhag as $row){
                 ?>
                 <option value="<?php print $row->DzongkhagID; ?>"><?php print $row->Name; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>              
                 <div class="form-group">
                    <label><b>Gewog Name </b></label>
                    <input type="text" class="form-control_admin span12" name="gewog" id="gewog" value="<?php echo $gewog;?>">
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
