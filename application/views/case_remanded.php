
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Cases Remanded</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 

	<div class="panel panel-default">
		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($registration)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="7%">Sl.No</th>
                  <th>Case Title</th>
                  <th>Misc Case No</th>
                  <th>Application Date</th>
                  <th>Misc Hearing Date</th> 
                  <th>Litigants</th>
                  <th width="15%">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($registration as $reg) { ?>
                <tr>
                  <td width="5%"><?php echo $i; ?></td>
                  <td width="15%"><?php echo $reg->case_title; ?></td>
                  <td width="15%"><?php echo $reg->misc_case_no; ?></td>
                  <td width="15%"><?php echo $reg->application_date; ?></td>
                  <td width="15%"><?php echo $reg->misc_hearing_date; ?></td>
				     <td width="25%"><?php
							  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg->id'");
							  $fields2 = $qryFrm2->result();
							  if(count($fields2)==0)
							  {
								  echo "No Litigant Added";
							  }
							  else
							  {
								  foreach($fields2 as $lll) {
									  if($this->public->checkLit($lll->litigant)=='yes')
									  {
									  ?>
									  <div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
									  <?php
									  echo "<span title='".$this->public->get_LitigantType($lll->litigant_type)."'>".$this->public->get_OrgName($lll->litigant)."</span>";
									
									  ?>
									  </div>
								   <?php
									  }
									  else
									  {
									  
									  ?>
									  <div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
									  <?php
									  echo "<span title='".$this->public->get_LitigantType($lll->litigant_type)."'>".$this->public->get_ApplicantName($lll->litigant)."</span>";
									
									  ?>
									  </div>
								   <?php
									  }
								   }
							  }
                           ?></td>
                  
                  <td width="15%;"><a href="index.php/registration/view_case/<?php echo $reg->id; ?>" title="Edit"><i class="fa fa-camera"></i> View</a></td>
                </tr>
              <?php $i++; } } ?>
              </tbody>
		</table>
</div>
</div>

<script type="text/javascript">
function Delete()
{
confirm('Do you really want to Delete');
}
</script>