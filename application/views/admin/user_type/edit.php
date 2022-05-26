<script type="text/javascript">
function validate()
{
if(document.form1.usertype.value=="")
{
 document.form1.usertype.focus();
 document.form1.usertype.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Edit User Type</p></b>
         <div class="panel-body">
         <form method="post" action="<?php echo site_url('admin/user_type/update'); ?>" name="form1" onSubmit="return validate()">	
           <input type="hidden" name="id" id="id"  value="<?php echo $id; ?>" />
                
                <div class="form-group">
                    <label><b>User Type</b></label>
                    <input type="text" class="form-control_admin span12" name="usertype" id="usertype" value="<?php echo $usertype;?>">
                </div>
                 <div class="form-group">
                    <label><b>Username</b></label>
                    <input type="text" class="form-control_admin span12" name="desp" id="desp" value="<?php echo $desp;?>">
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

  