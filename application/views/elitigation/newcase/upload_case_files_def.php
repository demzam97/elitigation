

 
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Case Documents</h5>
      </div>
      <div class="modal-body">
<form action="<?php echo site_url('publicregistration/store_new_case_documents_def'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="fileid" id="dataid" value="<?php echo $fileid; ?>">
    <input type="hidden" name="litid" id="dataid" value="<?php echo $litid; ?>">
    <input type="hidden" name="jpid" id="dataid" value="<?php echo $jpid; ?>">
     
<div class="row"> 
<div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Upload Form:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="case_document" class="form-control" required="required" id="fileUpload" >
    </div>
  </div>
      </div>
      <div class="modal-footer">
         <?php  $uid = $this->session->userdata('user_id');?>
        <a href="<?php echo site_url('publicregistration/casesubmisions_def/'.$uid.''); ?>"><button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button></a>
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit ?');">Upload</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
    </div>
  </div>
</div>
</div>

</body>
</html>


