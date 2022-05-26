<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Approved Cases</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
     
      	<table class="table table-bordered table-striped">
		              <thead>
		              
		                <tr>
		                  <th width="7%">Sl.No</th>
		                  <th width="10%">Court</th>
		                  <th width="10%">Misc Case No</th>
		                  <th width="10%">Case No</th>
		                  <th width="12%">Registered Date</th>
		                  <th>Case Title</th>
		                  <th>Case Status</th>
		                  <th width="10%">Action</th>
		                  <th width="12%">Approve Status</th>
		                </tr>
		              </thead>
		              <tbody id="main-tbody">
		              <?php $i=1; foreach($registration as $reg) { ?>
		                <tr>
		                  <td><?php echo $i; ?></td>
		                  <td><?php if($reg->court_id==0 || $reg->court_id=="") {} else {
						  echo $this->public->get_CourtName($reg->court_id); }?></td>
		                  <td><?php echo $reg->misc_case_no; ?></td>
		                  <td><?php echo $reg->reg_no; ?></td>
		                  <td><?php echo $reg->reg_date; ?></td>
		                  <td><?php echo $reg->case_title; ?></td>
		                  <td>
						  <?php 
						  
						  if($reg->status==4){ echo "<font color=#0099ff>Case Closed</font>"; }
						  if($reg->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
						  ?>
		                  </td>
		                  <td><a href="index.php/registration/view_case/<?php echo $reg->id; ?>" title="View"><i class="fa fa-camera"></i>View</a></td>
		                  <td>
		                  <?php 
						
						  if($reg->status==4 && $reg->c_approved==1 && $reg->approved=1){ echo "<font color=#009933>Approved</font>"; } 
						 if($reg->status==5 && $reg->c_approved==1 && $reg->approved=1){ echo "<font color=#009933>Approved</font>"; } 
						
						 
						  ?>
		                  </td>
		                 
		                </tr>
		              <?php $i++; }  ?>
		              </tbody>
				</table>
    <br />
<?php echo anchor("registration/approved_case", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>