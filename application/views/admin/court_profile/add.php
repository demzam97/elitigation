<script type="text/javascript">
function validate()
{
if(document.form1.dzongkhag.value==0)
{
 document.form1.dzongkhag.focus();
 document.form1.dzongkhag.style.borderColor="#cc0000";
 return false;
 }
 
 if(document.form1.court_type.value==0)
{
 document.form1.court_type.focus();
 document.form1.court_type.style.borderColor="#cc0000";
 return false;
 }
 
 if(document.form1.name.value=="")
{
 document.form1.name.focus();
 document.form1.name.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Court Profile</p></b>
         <div class="panel-body">
         
           <form method="post" action="<?php echo site_url('admin/court_profile/save'); ?>"  name="form1" onSubmit="return validate()">	
                <div class="form-group">
                    <label><b>Dzongkhag </b></label>                    
                 <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag" onChange="get_dungkhag(this.value)">
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
                 <label><b>Dungkhag</b></label>
                <div id="dungkhagout">
                <select name="dungkhag" id ="dungkhag" class="form-control_admin span12">
                <option value="0">Select Dzongkhag First</option>
                </select>
                </div>
                </div> 
                <div class="form-group">
                    <label><b>Court Type</b></label>
                    <select class="form-control_admin span12" name="court_type" id="court_type">
                 <option selected value="0">Select Court</option>
                 <?php
                 foreach($court_type as $row){
                 ?>
                 <option value="<?php print $row->id; ?>"><?php print $row->court_type; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>      
                <div class="form-group">
                    <label><b>Court Name</b></label>
                    <input type="text" class="form-control_admin span12" name="name" id="name">
                </div>               
                        
                <div class="form-group">
                    <label><b>Court Abbreviation</b></label>
                    <input type="text" name="ctdesp" id="ctdesp" class="form-control_admin span12" />
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

  