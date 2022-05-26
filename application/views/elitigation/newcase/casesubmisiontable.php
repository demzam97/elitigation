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
<h3>Judicial Form Submissions</h3>
<i><b>Note:</b>&nbsp;&nbsp;<font color='red'>You can upload the relevant Judicial Forms here.</font></i>
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
      <th scope="col">Upload</th>
      <th scope="col">Status</th>
      <th scope="col">Acknowledgement</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $uid = $this->session->userdata('user_id'); 
      $appcid = $this->public->get_applicant_cid($uid);
      $ap_lat_id = $this->public->get_defuid($appcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
            $j=1; foreach($forms as $fld):
              if($lt->lit_id == $ap_lat_id && $lt->judicial_process_id == $fld->judicial_process_id){
             echo $this->public->get_form_name($fld->form_used); 
            if($fld->form_name != ''){
            ?>
            <a href="<?php echo site_url('publicregistration/delete_case_files/'.$fld->id.'');?>" title="Delete" onclick="return confirm('Are you sure to Remove the File');">
            <i class="fa fa-trash" style="color:red;"></i></a>
            &nbsp;&nbsp;<a href="<?php echo site_url('publicregistration/viewCaseFile/'.$fld->form_name.'');?>" target="_blank"><i class="fa fa-download" style="color:green;"></i></a>
            <?php } echo "<br>"; } 
            $j++; endforeach; } else { echo "No Judicial Process"; }           
      endforeach;  
      ?>
      
      </td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $uid = $this->session->userdata('user_id'); 
      $appcid = $this->public->get_applicant_cid($uid);
      $ap_lat_id = $this->public->get_defuid($appcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
            $j=1; foreach($forms as $fld):
              if($lt->lit_id == $ap_lat_id && $lt->judicial_process_id == $fld->judicial_process_id){
              if($fld->form_name == ''){
            ?>
       <a href="<?php echo site_url('publicregistration/upload_case_files/'.$fld->id.'/'.$lt->lit_id.'/'.$fld->judicial_process_id.'');?>"><i class="fa fa-upload" style="color:blue;"></i></a>
            <?php } echo "<br>"; } 
            $j++; endforeach; } else { echo "No Judicial Process"; }
      endforeach;  
      ?>
      </td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $uid = $this->session->userdata('user_id'); 
      $appcid = $this->public->get_applicant_cid($uid);
      $ap_lat_id = $this->public->get_defuid($appcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
              $j=1; foreach($forms as $fm):
              if($lt->lit_id == $ap_lat_id && $lt->judicial_process_id == $fm->judicial_process_id){  
              if($fm->form_name == ''){ ?><font color="red">Pending</font> <?php } 
              else { ?><font color="green">Uploaded</font> <?php } echo "<br>"; };
               $j++; endforeach; } else { echo "No Judicial Process"; } 
               
      endforeach;  
      ?>
      </td>

      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $uid = $this->session->userdata('user_id'); 
      $appcid = $this->public->get_applicant_cid($uid);
      $ap_lat_id = $this->public->get_defuid($appcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
              $j=1; foreach($forms as $fm):
              if($lt->lit_id == $ap_lat_id && $lt->judicial_process_id == $fm->judicial_process_id)
              { 
               if($fm->cack_app == '0'){ ?>Pending<?php }
               if($fm->cack_app == '1'){ ?><font color="green">Accepted</font> <?php } 
               if($fm->cack_app == '2'){ ?><font color="red">Rejected</font> <?php }echo "<br>";
              }
               $j++; endforeach; } else { echo "No Judicial Process"; } 
               
      endforeach;  
      ?>
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
      <th scope="col">Case Documents</th>
      <th scope="col">Status</th>
      <th scope="col">Acknowledgement</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $defcid = $this->public->get_defendant_cid($row->id);
      $defuid = $this->public->get_defuid($defcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
            $j=1; foreach($forms as $fld):
              if($lt->lit_id == $defuid && $lt->judicial_process_id == $fld->judicial_process_id){
             echo $this->public->get_form_name($fld->form_used); 
            if($fld->form_name_def != ''){
            ?>
            &nbsp;&nbsp;<a href="<?php echo site_url('publicregistration/viewCaseFile/'.$fld->form_name_def.'');?>" target="_blank"><i class="fa fa-download" style="color:green;"></i></a>
            <?php }  echo "<br>"; }
            $j++; endforeach; } else { echo "No Judicial Process"; }
      endforeach;  
      ?>
      
      </td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $defcid = $this->public->get_defendant_cid($row->id);
      $defuid = $this->public->get_defuid($defcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
              $j=1; foreach($forms as $fm): 
                if($lt->lit_id == $defuid && $lt->judicial_process_id == $fm->judicial_process_id){
              if($fm->form_name_def == '')
              { ?><font color="red">Pending</font> <?php } else { ?><font color="green">Uploaded</font> <?php }
              
              echo "<br>"; }
               $j++; endforeach; } else { echo "No Judicial Process"; } 
      endforeach;  
      ?>
      </td>

      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
      $defcid = $this->public->get_defendant_cid($row->id);
      $defuid = $this->public->get_defuid($defcid);
      $latigants = $this->public->get_litigantforms($miscid, $row->id);
      $m=1; foreach($latigants as $lt):
            $forms =$this->public->get_forms_cases($miscid);
            $jcf = count($forms);
            if($jcf != '0'){
              $j=1; foreach($forms as $fm): 
                if($lt->lit_id == $defuid && $lt->judicial_process_id == $fm->judicial_process_id){
              if($fm->cack_def == '0'){ ?>Pending<?php }
              if($fm->cack_def == '1'){ ?><font color="green">Accepted</font> <?php }
              if($fm->cack_def == '2'){ ?><font color="red">Rejected</font> <?php }
              
              echo "<br>"; }
               $j++; endforeach; } else { echo "No Judicial Process"; } 
      endforeach;  
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






