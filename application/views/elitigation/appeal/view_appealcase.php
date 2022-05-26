<div class="container">
<br /><br /><br />
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
 <?php $uid = $this->session->userdata('user_id');?>
 <div class="table-responsive">
 <h4>Appeal Detail</h4><br>
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Appeal Description</th>
      <th scope="col">Appeal Application Copy</th>
      <th scope="col">Appeal Status</th>
      <th scope="col"><i class="fa fa-cogs"></i> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->appeal_brief; ?></td>
      <td><?php echo $row->application_copy;?></td>
      <td>
      <?php if($row->case_status == 'A') { ?> <i class="fa fa-check-circle" style="color:green"></i>Accepted <?php } ?>
      <?php if($row->case_status == 'R') { ?> <i class="fa fa-times" style="color:red"></i>Rejected<br>
                    <?php echo $case->case_status_remarks;?>
                    <?php } ?>
                   <?php if($row->case_status == '') { ?> <span class="label label-warning">Pending</span>
                    <?php }        
                    ?>
      </td>
      <td>
      <a href="<?php echo site_url('publicregistration/delete_appeal_case/'.$row->id.'/'.$row->application_copy.'');?>" title="Delete" onclick="return confirm('Are you sure to Remove the File');">
        <i class="fa fa-trash" style="color:red;"></i> Delete</a></td>
    </tr>
    <?php $i++; endforeach;?>
    </tbody>
</table>
</div>
</div>
</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Case Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="<?php echo site_url('publicregistration/store_new_case_documents'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="caseid" id="dataid" value=""> 
<div class="row"> 
<div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Case Documents:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="case_document" class="form-control" required="required" id="fileUpload" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Document Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="document_name" class="form-control" required="required" id="fileUpload" >
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Upload</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
    </div>
  </div>
</div>



