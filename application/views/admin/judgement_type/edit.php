<script type="text/javascript">
function validate()
{
if(document.form1.jt.value=="")
{
 document.form1.jt.focus();
 document.form1.jt.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Update Judgement Type</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/judgement_type/update'); ?>"  name="form1" onSubmit="return validate()">	
                <input type="hidden"  name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Judgement Type</b></label>
                    <input type="text" class="form-control_admin span12" name="jt" id="jt" value="<?php echo $name;?>">
                </div>              
                <div class="form-group">
                    <label><b>Judgement Type Description</b></label>
                    <textarea class="form-control_admin span12" name="jtdesp" id="jtdesp" ><?php echo $desp?></textarea>
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
