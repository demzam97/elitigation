<script type="text/javascript">
function validate()
{
if(document.form1.usertype.value==0)
{
 document.form1.usertype.focus();
 document.form1.usertype.style.borderColor="#cc0000";
 return false;
 }
if(document.form1.name.value=="")
{
 document.form1.name.focus();
 document.form1.name.style.borderColor="#cc0000";
 return false;
 }
if(document.form1.username.value=="")
{
 document.form1.username.focus();
 document.form1.username.style.borderColor="#cc0000";
 return false;
 }

var numbers = /^[-+]?[0-9]+$/;  
if(!document.form1.cid.value.match(numbers))
{
alert('Please enter valid CID!');
document.form1.cid.focus();
error = true;
document.form1.cid.style.borderColor="#cc0000";
return false;
}
}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Transfer User</p></b>
         <div class="panel-body">
  <form method="post" action="<?php echo site_url('admin/user/transfer_update'); ?>" name="form1" onSubmit="return validate()">  
           <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>" />
            <div class="form-group">
            <label><b>User Type</b></label>
             <select name="usertype" id="usertype" class="form-control_admin span12" >
            <option value="<?php echo $usertype;?>" selected><?php echo $this->admin->get_usertype($usertype);?></option> 
            <?php foreach($roles as $rr){ ?>
            <option value="<?php echo $rr->id; ?>"><?php echo $rr->role_name; ?></option>
            <?php } ?>
            </select>  
                </div>
                <div class="form-group">
                    <label><b>Name</b></label>
                    <input type="text" class="form-control_admin span12" name="name" id="name" value="<?php echo $name;?>">
                </div>
                 <!-- <div class="form-group">
                    <label><b>Username</b></label>
                    <input type="text" class="form-control_admin span12" name="username" id="username" value="<?php echo $username;?>">
                                 </div> -->
                <div class="form-group">
                    <label><b>Court Name</b></label>
                     <select name="fcourtname" id="courtname" class="form-control_admin span12" >
                        <option value="0" selected>---Select One---</option> 
                        <?php foreach($courts as $cort){ ?>
                        <option value="<?php echo $cort->id; ?>" <?php if($court==$cort->id){ ?> selected <?php } ?>><?php echo $cort->court_name; ?></option>
                        <?php } ?>
                     </select>  
                </div>
                
                 <div class="form-group">
                    <label><b>Bench Name</b></label>
                     <select name="benchname" id="benchname" class="form-control_admin span12" >
                        <option value="0" selected>---Select One---</option> 
                        <?php foreach($benches as $bench){ ?>
                        <option value="<?php echo $bench->id; ?>" <?php if($ben==$bench->id){ ?> selected <?php } ?>><?php echo $bench->bench_name; ?></option>
                        <?php } ?>
                     </select>  
                </div>
                <div class="form-group">
                    <label><b>CID</b></label>
                    <input type="text" class="form-control_admin span12" name="cid" id="cid" value="<?php echo $cid;?>">
                </div>
                <div class="form-group">
                    <label><b>EID</b></label>
                    <input type="text" class="form-control_admin span12" name="eid" id="eid" value="<?php echo $eid;?>">
                </div>
                <div class="form-group">
                  <label for="court">Transfer To(court)</label>
                  <select name="tcourtname" id="courtname" class="form-control_admin span12" required >
                        <option value="0" selected>---Select One---</option> 
                        <?php foreach($courts as $cort){ ?>
                        <option value="<?php echo $cort->id; ?>" <?php if($court==$cort->id){ ?>  <?php } ?>><?php echo $cort->court_name; ?></option>
                        <?php } ?>
                     </select>
                </div>
                <div class="form-group">
                  <label for="court">Transfer To(Dzongkhag)</label>
                  <select name="dzongkhagname" class="form-control_admin span12" required >
                        <option value="0" selected>---Select One---</option> 
                        <?php foreach($dzongkhag as $dzongkhag){ ?>
                        <option value="<?php echo $dzongkhag->DzongkhagID; ?>" <?php if($dzongkhag==$dzongkhag->DzongkhagID){ ?>  <?php } ?>><?php echo $dzongkhag->Name; ?></option>
                        <?php } ?>
                     </select>
                </div>

                <div class="form-group">
                    <label><b>Transfer Order Date</b></label>
                    <input type="date" class="form-control_admin span12" name="torder_date"  value="" required>
                </div>
                <div class="form-group">
                    <label><b>Transfer Order No</b></label>
                    <input type="text" class="form-control_admin span12" name="torder_no"  value="" required>
                </div>
               <div class="form-group">
                    <label><b>Effective Date</b></label>
                    <input type="date" class="form-control_admin span12" name="edate" value="" required>
                </div>
                <div class="form-group" >
                    <label><b>Remarks</b></label>
                    <textarea name="remarks" value="<?php echo set_value('remarks'); ?>" class="form-control_admin span12" cols="30" rows="10" style="margin: 0px 133.125px 0px 0px; width: 598px; height: 114px;"></textarea>
                </div>
               <div class="clearfix"></div>
                
                <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit"/>&nbsp;&nbsp;
                <a href="index.php/user_dashboard" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

  