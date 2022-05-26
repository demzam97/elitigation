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
        <b><p class="panel-heading no-collapse">Add New Gewog</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/gewog/save'); ?>"  name="form1" onSubmit="return validate()">	                
                <div class="form-group">
                    <label><b>Dzongkhag </b></label>                    
                    <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag">
                 <option selected value="0">Select Dzongkhag</option>
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
                    <input type="text" class="form-control_admin span12" name="gewog" id="gewog">
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

  