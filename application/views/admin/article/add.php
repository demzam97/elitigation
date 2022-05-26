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
        <b><p class="panel-heading no-collapse">Add Article</p></b>
         <div class="panel-body">
           <form method="post" action="<?php echo site_url('admin/article/save'); ?>"  name="form1" onSubmit="return validate()">	
                
                <div class="form-group">
                    <label><b>Article Name</b></label>
                    <input type="text" class="form-control_admin span12" name="article" id="article">
                </div>              
                <div class="form-group">
                    <label><b>Act Description</b></label>
                    <textarea class="form-control_admin span12" name="articledesp" id="articledesp"></textarea>
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

  