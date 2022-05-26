<script type="text/javascript">
function validate()
{
if(document.form1.st.value=="")
{
 document.form1.st.focus();
 document.form1.st.style.borderColor="#cc0000";
 return false;
 }

}
</script>
<div class="content">
<div class="dialog1">
    <div class="panel panel-default">
        <b><p class="panel-heading no-collapse">Add Sentence Type</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/sentence_type/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Sentence Type</b></label>
                    <input type="text" class="form-control_admin span12" name="st" id="st">
                </div>              
                <div class="form-group">
                    <label><b>Sentence Type Description</b></label>
                    <textarea class="form-control_admin span12" name="stdesp" id="stdesp"></textarea>
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

  