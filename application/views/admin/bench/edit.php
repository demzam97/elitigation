<script type="text/javascript">
function validate()
{
if(document.form1.article.value=="")
{
 document.form1.article.focus();
 document.form1.article.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Update Bench</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/bench/update'); ?>"  name="form1" onSubmit="return validate()">	
                <input type="hidden"  name="id" id="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label><b>Bench Name</b></label>
                    <input type="text" class="form-control_admin span12" name="bench" id="bench" value="<?php echo $name;?>">
                </div>              
                <div class="form-group">
                    <label><b>Bench Description</b></label>
                    <textarea class="form-control_admin span12" name="benchdesp" id="benchdesp" ><?php echo $desp?></textarea>
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

  