<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Appealed Cases</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 

	<div class="panel panel-default">

		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($appealed_case)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="7%">Sl.No</th>
                  <th>Registration No</th>
                  <th>Case Title</th>
                  <th>Litigants</th>
                  <th>Appealed Date</th>
                  <th width="10%">View</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($appealed_case as $appcase) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $appcase->reg_no; ?></td>
                  <td><?php echo $appcase->case_title; ?></td>
                 <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appcase->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields2 as $lll) {
						  $check=$this->public->checkLit($lll->litigant);
						  if($check=='yes')
						  {
					           echo "<span title='".$this->public->get_LitigantType($lll->litigant_type)."'>".$this->public->get_OrgName($lll->litigant)."</span><br>";
						  }
						  else
						  {
							  echo "<span title='".$this->public->get_LitigantType($lll->litigant_type)."'>".$this->public->get_ApplicantName($lll->litigant)."</span><br>";
						  }
					   }
				  }
				   ?>
                   </td>
                  <td><?php echo $appcase->appeal_date; ?></td>
                  <td><a href="index.php/registration/view_case/<?php echo $appcase->id; ?>" title="View">View</a></td>
                </tr>
              <?php $i++; } } ?>
              </tbody>
		</table>
</div>
</div>
