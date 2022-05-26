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
        <b><p class="panel-heading no-collapse">Edit Village</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/village/update'); ?>"  name="form1" onSubmit="return validate()">
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">	                
                <div class="form-group">
                    <label><b>Dzongkhag</b></label>                    
                 <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag">
                 <?php
                 foreach($dzongkhag as $row){
                 ?>
                 <option value="<?php print $row->DzongkhagID; ?>" <?php if($dzoid==$row->DzongkhagID){ ?> selected<?php } ?>><?php print $row->Name; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>     
                
                  <?php if($dung!="")  { ?>
                 <div class="form-group">
                    <label><b>Dungkhag Name </b></label>
                    <select class="form-control_admin span12" name="dungkhag" id="dungkhag">
                 <?php
                 foreach($dungkhag as $row1){
                 ?>
                 <option value="<?php print $row1->DungkhagID; ?>" <?php if($dung==$row1->DungkhagID){ ?> selected<?php } ?>><?php print $row1->Name; ?></option>
                 <?php  } ?>
               </select>
                  </div>  
                 <?php } ?>
                 
                  <div class="form-group">
                    <label><b>Gewog Name </b></label>
                    <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag">
                 <?php
                 foreach($gewog as $row2){
                 ?>
                 <option value="<?php print $row2->GewogID; ?>" <?php if($gewodID==$row2->GewogID){ ?> selected<?php } ?>><?php print $row2->Name; ?></option>
                 <?php
                  }
                ?>
               </select>
                  </div>  
                  
                  <div class="form-group">
                    <label><b>Village Name </b></label>
                    <input  type="text" class="form-control_admin span12" name="village" value="<?php echo $village; ?>" />
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
