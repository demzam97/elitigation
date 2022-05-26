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
        <b><p class="panel-heading no-collapse">Update Court Profile</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/court_profile/update'); ?>"  name="form1" onSubmit="return validate()">	
           <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Dzongkhag </b></label>                    
                 <select class="form-control_admin span12" name="dzongkhag" id="dzongkhag" onChange="get_dungkhag(this.value)">
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
                 <label><b>Dungkhag</b></label>
                <div id="dungkhagout">
                <?php $qryFrm1 = $this->db->query("select * from sc_tbl_master_dungkhag where DzongkhagID ='$dzoid'");
				$fields1= $qryFrm1->result();
				?>
                <select name="dungkhag" id ="dungkhag" class="form-control_admin span12">
                <option value="0">Select One</option>
                <?php foreach($fields1 as $fld1) { ?>
                <option value="<?php echo $fld1->DungkhagID; ?>" <?php if($fld1->DungkhagID==$dungid) { ?> selected <?php } ?> ><?php echo $fld1->Name; ?></option>
                <?php } ?>
                </select>
            </div>
                </div> 
                <div class="form-group">
                    <label><b>Court Type</b></label>
                <select class="form-control_admin span12" name="court_type" id="court_type">
                <option value="<?php echo $court_type; ?>"><?php echo $this->admin->get_court_type($court_type); ?></option>
                 <?php
                 foreach($court_type1 as $row){
                 ?>
                 <option value="<?php print $row->id; ?>"><?php print $row->court_type; ?></option>
                 <?php
                  }
                ?>
               </select>
                </div>      
                <div class="form-group">
                    <label><b>Court Name</b></label>
                    <input type="text" class="form-control_admin span12" name="name" id="name" value="<?php echo $court_profile; ?>">
                </div>               
                        
                <div class="form-group">
                    <label><b>Court Abbreviation</b></label>
                    <input type="text" name="ctdesp" id="ctdesp" class="form-control_admin span12" value="<?php echo $desp; ?>" />
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

  