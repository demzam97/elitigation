<?php error_reporting(E_ALL & ~E_NOTICE);?>
<div class="container">
<br /><br /><br />
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
 <?php $uid = $this->session->userdata('user_id'); $utype = $this->session->userdata('user_type');?>
<!-- Tab Start -->
<div>
<h3>Submissions / Resubmission</h3>
<i><b>Note:</b>&nbsp;&nbsp;<font color='red'>Parties can submit documents related to case and access documents submitted by other party/parties here.</font></i>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Plaintiff / Petitioner / Applicant</a></li>
  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Respondent / Defendant</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">

  <div class="table-responsive">
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Case Documents</th>
      <th>Court Status </th>
      <th scope="col"><i class="fa fa-cogs"></i> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php
      $casefiles = $this->elat->get_cases_public_case_files($row->id, $uid);
        $k = 1; foreach($casefiles as $row1):
        echo $k; echo ". "; echo $row1->file_name;?>
        <a href="<?php echo site_url('publicregistration/delete_case_files/'.$row1->id.'/'.$row1->file_name.'');?>" title="Delete" onclick="return confirm('Are you sure to Remove the File');">
        <i class="fa fa-trash" style="color:red;"></i></a>
&nbsp;&nbsp;<a href="<?php echo site_url('publicregistration/viewCaseFile_1/'.$row1->file_name.'');?>" target="_blank"><i class="fa fa-download" style="color:green;"></i></a>
    
        <br/>
       <?php $k++; endforeach;
      ?></td>
       <td>
      <?php
      $casefiles = $this->elat->get_cases_public_case_files($row->id, $uid);
        $k = 1; foreach($casefiles as $row1):
          if($row1->ack == '0'){ ?>Pending<?php }
          if($row1->ack == '1'){ ?><font color="green">Accepted</font> <?php }
          if($row1->ack == '2'){ ?><font color="red">Rejected</font> <?php }
         ?>
        <br/>
       <?php $k++; endforeach;
      ?>
      </td>
      <td>
      <button data-id="<?php echo $row->id;?>" class="btn btn btn-outline-primary py-0" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" >Upload Documents</button>

      </td>
    </tr>
    <?php $i++; endforeach;?>
    </tbody>
</table>
</div>

  </div>
  <div role="tabpanel" class="tab-pane" id="profile">
  <div class="table-responsive">
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Case Documents Uploaded by Respndent / Defendent</th>
     <th>Court Status </th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php
      $casefiles = $this->elat->get_cases_public_case_files_def($row->id, $defuid);
        $k = 1; foreach($casefiles as $row1):
        echo $k; echo ". "; echo $row1->file_name;?>
        <a href="<?php echo site_url('publicregistration/delete_case_files/'.$row1->id.'/'.$row1->file_name.'');?>" title="Delete" onclick="return confirm('Are you sure to Remove the File');">
        <i class="fa fa-trash" style="color:red;"></i></a>
&nbsp;&nbsp;<a href="<?php echo site_url('publicregistration/viewCaseFile_1/'.$row1->file_name.'');?>"><i class="fa fa-download" style="color:green;"></i></a>
        <br/>
       <?php $k++; endforeach;
      ?></td>
      <td>
      <?php
      $casefiles = $this->elat->get_cases_public_case_files_def($row->id, $defuid);
        $k = 1; foreach($casefiles as $row1):
          if($row1->ack == '0'){ ?>Pending<?php }
          if($row1->ack == '1'){ ?><font color="green">Accepted</font> <?php }
          if($row1->ack == '2'){ ?><font color="red">Rejected</font> <?php }
          ?>
          <br/>
       <?php $k++; endforeach;
      ?>
      </td>
    </tr>
    <?php $i++; endforeach;?>
    </tbody>
</table>
</div>
  </div>
</div>
</div>

<!-- Tabs End --></div>
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
<form action="<?php echo site_url('publicregistration/store_new_case_documents_1'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="caseid" id="dataid" value="">
    <input type="hidden" name="utype" id="utype" value="<?php echo $utype; ?>"> 
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
<script type="text/javascript">
  $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>



