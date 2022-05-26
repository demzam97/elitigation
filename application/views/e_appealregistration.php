<?php ini_set('memory_limit','3000M');?>
<style>
#lawBox
{
   display: none;
    top: 100px !important;
    z-index: 10;
    padding: 10px;
    margin: 10px 20% 0 20%;
    width: 600px;
    position: fixed;
    background: #fff;
    border: 1px solid #BBB;
    box-shadow: 0px 0px 30px #999;
	max-height:500px;
	overflow:auto;
    height: auto;
}
</style>
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Appeal</h1>
	</div>
     <!--End Breadcrumb-->
     <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
  <div class="main-content">
     	<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($cases)==0) { ?>
              <tr>
                  <th colspan="6"><strong>No Records ...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="1%">Sl.No</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Case Title</th>
                  <th>Hearing Option</th>
                  <th>Application Copy</th>
                  <th>Case Status</th>
                  <th>Action</th>  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($cases as $case) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $case->created_on; ?></td>
                  <td><?php //echo $this->public->get_appeal_name($case->case_id); ?></td>
                  <td><?php //echo $this->public->get_appeal_case_title($case->case_id); ?></td>
                  <td><?php $ho = $case->hearing_option; if($ho == 'R') { echo "Remote Hearing"; } else { echo "Courtroom Hearing"; } ?></td>
                  <td><?php  ?><i class="fa fa-fw fa-file-word-o"></i></td>
                  <td><?php $cstatus = $this->public->get_appeal_cases_status($case->case_status);
                   if($cstatus == 'A') { ?> <span class="label label-success">Accepted</span> <?php } ?>
                   <?php if($cstatus == 'R') { ?> <span class="label label-danger">Rejected</span><br>
                    <?php echo $case->case_status_remarks;?>
                    <?php } ?>
                   <?php if($cstatus == '') { ?> <span class="label label-warning">Pending</span> <?php } ?>
                  </td>
                  <td>
                  <?php if($cstatus == '') { ?>
                  <a href="index.php/registration/view_elat_case_appeal/<?php echo $case->id; ?>/<?php echo $case->created_by; ?>/<?php echo $case->case_id; ?>"><i class="fa fa-camera"></i>View</a>
                  <?php } ?>
                  <?php if($cstatus == 'A') { ?>
                  <a href="index.php/registration/register_elat_case/<?php echo $case->id; ?>"><span class="label label-success">Register</span></a>
                  <?php } ?>
                  <?php if($cstatus == 'R') { ?><?php } ?>
                  </td>
                </tr>
              <?php $i++; } } ?>
              </tbody>
		</table>
</div>
</div>

<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>



	 
	 
