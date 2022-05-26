<div class="container">
<br /><br /><br />
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
 <?php $uid = $this->session->userdata('user_id'); ?>
 <div class="table-responsive">
 <h4>Respondent/Defendant/Witness Page</h4>
 <a href = "<?php echo site_url('publicregistration/add_defreswit/'.$caseid.'');?>" style="float:right;"class="btn btn btn-outline-primary py-0">Add Respondent/Defendant/Witness</a>
<br /><br />
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Name</th>
      <th scope="col">CID</th>
      <th scope="col">Email</th>
      <th scope="col">Contact No.</th>
      <th scope="col">Address</th>
      <th scope="col"><i class="fa fa-cogs"></i> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($respondent as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->name; ?></td>
      <td><?php echo $row->cid; ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo $row->mobile; ?></td>
      <td><?php echo $row->cur_address; ?></td>
      <td>
      <a href="<?php echo site_url('publicregistration/delete_respondent/'.$row->id.'/'.$row->caseid.'');?>" title="Delete">
      <button class="btn btn btn-outline-primary py-0" onclick="return confirm('Are you sure to Delete');"><font color="red">Delete</font></button>  
      </td>
    </tr>
    <?php $i++; endforeach; ?>
    </tbody>
</table>
<!-- <form action="<?php echo site_url('publicregistration/respondent_updatedraft/'.$caseid); ?>" method="post" enctype="multipart/form-data" onsubmit="$('#loading').show();">
<button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
</form> -->
</div>
</div>
</body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Respondent / Defendant / Witness</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo site_url('publicregistration/respondentdefendant_registration'); ?>" method="post" enctype="multipart/form-data">
           <input type="hidden" name="caseid" id="dataid" value=""> 
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">CID:<font color = "red">*</font></label>
            <input type="number" class="form-control" id="recipient-name" name="cid" required="required">
           </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" >Next</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
    </div>
  </div>
</div>



