<div class="container">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
<br /><br /> <br /><br /><br />
 <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
<?php } ?>
 <?php $uid = $this->session->userdata('user_id'); $utype = $this->session->userdata('user_type');?>
 <a  href="<?php echo site_url('publicregistration/newcaseform'); ?>"><button type="button" class="btn btn-info btn-sm">Add New Case</button></a>
 
 <br /><br />
 <div class="table-responsive">
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th>Sl.No</th>
      <th>Reg.No</th>
      <th>Case Title</th>
      <th>Hearing Option</th>
      <?php if($utype == '13'){ ?>
      <th>Client</th>
      <?php } ?>
      <th>Respondent/<br>Defendant/<br>Witness</th>
      <?php if($utype == '15'){ ?>
      <th>Chargesheet</th>
      <?php } ?>
      <th>Petition Copy</th>
      <th>Jurisdiction Copy</th>
      <th>Case Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title ;?></td>
      <td><?php $ho = $row->hearing_option; if($ho == 'R') { echo "Remote Hearing"; } else { echo "Courtroom Hearing"; }?>
      <form action="<?php echo site_url('publicregistration/change_hearing_option'); ?>" method="post">
      <input type="hidden" name="caseid" value="<?php echo $row->id;?>" />
       <select name="hearing_option" id="hearing_option" onchange="submit();">
        <option value="">-- Change --</option>
        <option value="C">Courtroom Hearing</option>
        <option value="R">Remote Hearing</option>
        </select></form>
      </td>
      <?php if($utype == '13'){ ?>
      <td>
      <?php $j=1; foreach($clients as $crow):
      if($row->id == $crow->caseid){
      echo $j; echo ". "; echo $crow->name; echo "<br>";
      }
      $j++; endforeach;?> 
      <a  href="<?php echo site_url('publicregistration/add_client/'.$row->id.''); ?>">Add Client</a>
      </td>
      <?php } ?>
      <td>
      <?php $respondents = $this->elat->get_cases_respondent($row->id);
      foreach($respondents as $rrow):
        echo $rrow->name; echo "<br>";
      endforeach;
     echo "\n";   
      ?>
      <button class="btn btn btn-outline-primary py-0"><a  href="<?php echo site_url('publicregistration/view_respondent/'.$row->id.'/'.$row->case_type.'');?>">View Detail</a></button>
      </td>

      <?php if($utype == '15'){?>
       <td>
       <?php if($row->chargesheet == '') {?>
       <a href="<?php echo site_url('publicregistration/upload_chargesheet/'.$row->id.'');?>">Upload Chargesheet</a>
       <?php } ?>
      <a href="<?php echo site_url('publicregistration/viewChargesheetFile/'.$row->chargesheet.'');?>" target="_blank"><?php echo $row->chargesheet; ?><i class="fa fa-download" style="color:green;"></i></a>
       </td>
       <?php } ?>
      <td>
      <?php echo $row->petition_copy; ?>
      <a href="<?php echo site_url('publicregistration/viewPetitionFile/'.$row->petition_copy.'');?>" target="_blank"><i class="fa fa-download" style="color:green;"></i></a>
       </td> 
       <td>
       <?php echo $row->jurisdiction_copy; ?>
      <a href="<?php echo site_url('publicregistration/viewjurisdictionnFile/'.$row->jurisdiction_copy.'');?>" target="_blank"><i class="fa fa-download" style="color:green;"></i></a>
       </td> 
      <td><?php 
      if($row->case_complete_status== '4') 
      { ?>Completed <?php } 
      else {
      if($row->case_status == 'A') { ?> Registered <?php } ?>
      <?php if($row->case_status == 'R') { ?> Rejected<br>
                   <?php $rt = $row->reject_reason;
                   if($rt == '1'){ echo "No concrete case or controversy"; }
                   if($rt == '2'){ echo "No legal standing"; }
                   if($rt == '3'){ echo "Jurisdiction"; }
                   ?><br>
                    <?php echo $row->case_status_remarks;?>
                    <?php } ?>
                   <?php if($row->case_status == '') { ?> <span class="label label-warning">Pending</span>
      <?php 
         }
       }        
      ?>    
      </td>           
      <td style="width: 5cm;"> 
      <?php if($row->case_status == 'R' && $row->reject_reason == '3') { ?>
        <a  href="<?php echo site_url('publicregistration/newcaseform'); ?>">
          <button type="button" class="btn btn-info btn-sm">Resubmit</button></a>
      <?php } 
      if($row->case_complete_status== '4') {
      $appeal = $this->appeal->get_appealcases_public($row->misc_case_id);
      if(count($appeal) <= '0') { ?>
      <a  href="<?php echo site_url('elatappeal/appealcase/'.$row->misc_case_id.''); ?>">Appeal</a>
      <?php } else  { ?>
       <font color = 'blue'>Appealed on:<br> <?php foreach($appeal as $ap) { $apid = $ap->id; echo $ap->created_on; }?><br>
       <a  href="<?php echo site_url('elatappeal/view_appealcase/'.$apid.''); ?>">View</a>
      <?php } ?>
      <?php } ?>
      </td>
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
    <input type="text" name="caseid" id="dataid" value="">
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
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit ?');">Upload</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
    </div>
  </div>
</div>

