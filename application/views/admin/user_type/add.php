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
       <b> <p class="panel-heading no-collapse">User Type</p></b>
        <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/user_type/save'); ?>"  name="form1" onSubmit="return validate()">	           
                <div class="form-group">
                    <label>User Type</label>
                    <input type="text" class="form-control_admin span12" name="usertype" id="usertype">
                </div>
                 <div class="form-group">
                    <label>User Type Description</label>
                    <textarea class="form-control_admin span12" name="desp" id="desp"></textarea>
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
  