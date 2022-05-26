<script type="text/javascript">
function validate()
{
if(document.form1.dzongkhag.value==0)
{
 document.form1.dzongkhag.focus();
 document.form1.dzongkhag.style.borderColor="#cc0000";
 return false;
 }
 if(document.form1.dungkhag.value=="")
{
 document.form1.dungkhag.focus();
 document.form1.dungkhag.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Edit Dungkhag</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/dungkhag/update'); ?>"  name="form1" onSubmit="return validate()">
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
                    <label><b>Dungkhag Name </b></label>
                    <input type="text" class="form-control_admin span12" name="dungkhag" id="dungkhag" value="<?php echo $dungkhag;?>">
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

  