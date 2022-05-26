<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Miscellaneous Activities</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 

	<div class="panel panel-default">
		<table  class="table table-bordered">
            <thead>
              <?php if(count($miscellaneous)==0) { ?>
              <tr>
        		<th colspan="6"><strong>Record Not Found...</strong></th>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="5%">Sl.No</th>
                  <th width="15%">Miscellaneous Type</th>
                  <th width="12%">Miscellaneous No</th>
                  <th width="12%">Application Date</th>
                  <th width="12%">Misc Hearing Date</th>
                  <th width="10%">Bench</th>
                  <th width="15%">Applicant</th>               
                </tr>
            </thead>
      <?php }
          $i=1;
			 		foreach($miscellaneous as $row) :
				  echo "<tr>";
					echo "<td>".$i."</td>
						<td> ".$this->public->get_MiscellaneousActivityType($row->misc_activity_type_id)."</td>
						<td>".$row->misc_no."</td>
						<td>".$row->application_date."</td>
						<td>".$row->misc_hearing_date."</td>
						<td>".$this->public->getBenchName($row->bench_id)."</td>
						<td>".$this->public->get_ApplicantName($row->applicant_id)." (".$this->public->get_ApplicantCID($row->applicant_id).")"."</td>";
					$i++;
			 		endforeach; 
					?>
				</tr>
        </table>
    </div>
        <a href="<?php echo site_url('registration/miscellaneous_activities');?>" class="btn btn-primary"> Add Miscellaneous Activity</a>
</div>

<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

