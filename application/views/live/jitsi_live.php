<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Courtroom Live Streaming</h1>
	</div>
<div class="main-content">  
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>     
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                          
                                <div class="panel-body table-responsive">
								  
								  <hr class="sep-2">
			
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
						     <th>Type</th>
							<th>Court Name</th>
                            <th>Misc Case No.</th>
							<th>Title</th>
							<th>Hearing Date</th>
							<th>Hearing Start Time</th>
							<th>Hearing End Time</th>
							<th>Status</th>							
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
						<?php $i=1; foreach($meetings as $mt) { ?>
                        <tr>
						    <td><?php  
							if($mt->meeting_type == '1'){ echo "Remand"; } else { echo "Judicial Process"; }
							$court = $this->public->get_CourtName($mt->court_id);?></td>
							<td><?php echo $court = $this->public->get_CourtName($mt->court_id);?></td>
							<td><?php 
							echo $this->public->get_CaseNumber($mt->case_id);?></td>
							<td><?php if($this->public->get_CaseTitle($mt->case_id) == ''){ echo $ct = "Remand";}
							else {echo $ct = $this->public->get_CaseTitle($mt->case_id);}?></td>
							<td><?php echo $mt->meeting_date;?></td>
                            <td><?php echo $mt->start_time;?></td>
							<td><?php echo $mt->end_time;?></td>
							<td><?php $tz_object = new DateTimeZone('Asia/Dhaka');
			                          $datetime = new DateTime();
			                          $datetime->setTimezone($tz_object);
			                          $timenow = $datetime->format('H:i:s');
									  echo $datenow = $datetime->format('Y-m-d');
									  if($datenow >= $mt->meeting_date) {
									     if ($timenow >= $mt->start_time) 
									        { ?> <strong><font color="green">Expired</font></strong> <?php } 
									   else { ?> <strong><font color="red">Active</font></strong> <?php }
									    }
										else
										{ ?>
											<strong><font color="red">Expired</font></strong>
										<?php }
									 ?>
									 
									 </td>
							<td>
							<?php $tz_object = new DateTimeZone('Asia/Dhaka');
									  if($datenow >= $mt->meeting_date) {
									     if ($timenow <= $mt->start_time) 
									        { ?> <a href="https://elitigation.judiciary.gov.bt/<?php echo $mt->room_id; ?>" target="_blank"><button type="button" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-youtube-play"></i> Start Live Streaming</button></a>  <?php } 
									   else { }
									    }
										else
										{  }
									  ?>
      <a href="<?php echo site_url('registration/edit_invite/'.$mt->case_id.'/'.$mt->meeting_type.'/'.$mt->room_id); ?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
							                         
                            </td>
                        </tr>
						<?php $i++; } ?>

       			
						
                    </tbody>
                </table>
				</div>
			</div>    
  
  
</div>

