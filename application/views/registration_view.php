<script type="text/javascript" src="css/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	
	$('.msg').click(function(e) {
			$(this).parents('.first').fadeOut();
        });
		
		 $('.close').click(function(e) {
			$(this).parents('.first').fadeOut();
      });
});

</script>

<div class="content"
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

            <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by Registration No..." id="search_case" name="search_case" type="text">
                    <button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button>
                </form>
            </div>
            
<?php

if($this->session->userdata('court_type')=='1')
{?>
            
<!-------------------------------REVIEW CASES---------------------------->


	<div class="panel panel-default">
  
		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($review_cases)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="5%">Sl.No</th>
                  <th>Miscellaneous No</th>
                  <th>Appeal Date</th>
                  <th>Case Title</th>
                  <th>Plainttiff / Appelant </th>  
                  <th>Defendant / Respondent</th>                  
                  <th>Bench</th>
                  <th>Case Status</th>
                  <th width="15%">Options</th>
                
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($review_cases as $rew) { 
			 ?>
              
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $rew->misc_case_no; ?></td>
                  <td><?php echo $rew->application_date; ?></td>
                  <td><?php echo $rew->case_title; ?></td>
                 
                  <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$rew->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields2 as $lll)
					  {
						  if($lll->litigant_type=='14'||$lll->litigant_type=='15'|| $lll->litigant_type=='17')
						  {
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
				  }
				   ?>
                   </td>
                   
                   
                    <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$rew->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields2 as $lll)
					  {
						   if($lll->litigant_type=='18'||$lll->litigant_type=='16')
						  {
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
				  }
				   ?>
                   </td>
                   
                   
                 
                  <td><?php echo $this->public->getBenchName($rew->bench); ?></td>
                  <td>
				  <?php 

					 if($rew->status==6){ echo "<font color=#0099ff>Appeal Review</font>"; }
				  ?>
                  </td>
                  <td>
                  <?php if($rew->status==1){ ?>
                  <a href="index.php/registration/edit_registration/<?php echo $rew->id; ?>" title="Edit"><i class="fa fa-pencil"></i> Assign</a>
                  <?php } ?>
                  <a href="<?php echo site_url('registration/view_case/'.$rew->id);?>" > <i class="fa fa-camera"></i> View</a>
                  &nbsp;&nbsp;
                  <a href="<?php echo site_url('registration/reviewCaseAssign/'.$rew->id);?>" > <i class="fa fa-pencil"></i>Assign</a>
                  </td>
                 
                </tr>
              <?php 
			  
			  $i++; } } ?>
              </tbody>
		</table>  
    <?php 
} ?>
    </div>
    <!------------------------------------------REVIEW END---------------->

<h3> Active Cases</h3>
<hr />
	<div class="panel panel-default">
  	
  	<ul class="tabs"> 
        <li class="active" rel="tab1">Registered Case</li>
        <?php if(count($registration_rejected)!=0) { ?>
        <li rel="tab2">Rejected Case</li>
        <?php } ?>
	</ul>
    <div class="tab_container"> 
 	
    <div id="tab1" class="tab_content"> 
		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($registration)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="5%">Sl.No</th>
				  <th><b><font color="blue">eLitigation</font></b></th>
                  <th>Registration No</th>
                  <th>Registration Date</th>
                  <th>Case Title</th>
                  <th>Plainttiff / Appelant </th>  
                  <th>Defendant / Respondent</th>                  
                  <th>Bench</th>
                  <th>Case Status</th>
                  <th width="15%">Options</th>
                
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($registration as $reg) { 
			 ?>
              
                <tr>
                  <td><?php echo $i; ?></td>
				  <td>
                         <?php if($reg->case_source=='1'){ ?>
                          <font color="green"><i class="fa fa-check" aria-hidden="true"></i></font>
                          <?php } else { ?> <font color="red"><i class="fa fa-times" aria-hidden="true"></i></font><?php } ?>
                          
                         </td>
                  <td><?php echo $reg->reg_no; ?></td>
                  <td><?php echo $reg->reg_date; ?></td>
                  <td><?php echo $reg->case_title; ?></td>
                 
                  <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields2 as $lll)
					  {
						  if($lll->litigant_type=='14'||$lll->litigant_type=='15')
						  {
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
				  }
				   ?>
                   </td>
                   
                   
                    <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields2 as $lll)
					  {
						   if($lll->litigant_type=='18'||$lll->litigant_type=='16')
						  {
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
				  }
				   ?>
                   </td>
                   
                   
                 
                  <td><?php echo $this->public->getBenchName($reg->bench); ?></td>
                  <td>
				  <?php 
				  
				  if($reg->status==1){ echo "<font color=#0099ff>Registered Case</font>"; } 
				  if($reg->status==2){ 
				                       if($reg->clerk=='')
									   echo "<font color=#0099ff>Assign Clerk</font>"; 
									   else
									   echo "<font color=#0099ff>Assigned to &nbsp;(".$this->public->get_UserName($reg->clerk).")</font>";
				                     }
				  if($reg->status==3 && $reg->updatedby!=$this->session->userdata('user_id'))
				                     {
					                   if($reg->clerk=='')
									   echo "<font color=#0099ff>Active &nbsp;(Clerk Not Assigned)</font>"; 
									   else
									    echo "<font color=#0099ff>Active &nbsp;( Case Handeled By ".$this->public->get_UserName($reg->clerk).")</font>";                                             
									  }
				  if($reg->status==3 && $reg->updatedby==$this->session->userdata('user_id')){ echo "<font color=#0099ff>Active</font>"; }
				    if($reg->status==4){ echo "<font color=#0099ff>Case Closed</font>"; }
					 if($reg->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
				  ?>
                  </td>
                  <td>
                  <?php if($reg->status==0 or $reg->status==1){ ?>
                  <a href="index.php/registration/edit_registration/<?php echo $reg->id; ?>" title="Edit"><i class="fa fa-pencil"></i> Assign</a>
                  <?php }else{?>
                  	<a href="<?php echo site_url('registration/reassign_case/'.$reg->id);?>" > <i class="fa fa-refresh"></i> Reassign</a>
                  <?php } ?>
                  <a href="<?php echo site_url('registration/view_case/'.$reg->id);?>" > <i class="fa fa-camera"></i> View</a>
	                  
                  	  &nbsp;
	                  &nbsp;
	                  &nbsp;
	                  <a href="<?php echo site_url('registration/edit_case/'.$reg->id);?>" > <i class="fa fa-edit"></i> Edit</a>
                  </td>
                </tr>
              <?php 
			  
			  $i++; } } ?>
              </tbody>
		</table>
		</div>
		
		 <div id="tab2" class="tab_content"> 
    	<table class="table table-bordered table-striped">
              <thead>
               <?php if(count($registration_rejected)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="5%">Sl.No</th>
                  <th>Registration No</th>
                  <th>Issue</th>
                  <th>Petitioner/Plaintiff</th>
                  <th>Registration Date</th>
                  <th>Bench</th>
                  <th>Case Status</th>
                  <th width="15%">Options</th>
                
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($registration_rejected as $reg_rej) { 
			 ?>
              
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $reg_rej->reg_no; ?></td>
                 
                  <td><?php echo $reg_rej->case_title; ?></td>
                 
                  <td><?php
				  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg_rej->id'");
				  $fields2 = $qryFrm2->result();
				  $cnt = count($qryFrm2->result());
				  if($cnt==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
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
				   ?>
                   </td>
                  <td><?php echo $reg_rej->reg_date; ?></td>
                  <td>
				  <?php if($reg_rej->bench==0 || $reg_rej->bench=="") {} else {
				  echo $this->public->getBenchName($reg_rej->bench);
				  }
				  ?>
                  </td>
                  <td>
				  <?php 
				  
				  if($reg_rej->status==1){ echo "<font color=#0099ff>Registered Case</font>"; } 
				  if($reg_rej->status==2){ 
				                       if($reg_rej->clerk=='' || $reg_rej->clerk==0)
									   echo "<font color=#0099ff>Assign Clerk</font>"; 
									   else
									   echo "<font color=#0099ff>Assigned to &nbsp;(".$this->public->get_UserName($reg_rej->clerk).")</font>";
				                     }
				  if($reg_rej->status==3 && $reg_rej->updatedby!=$reg_rej->session->userdata('user_id'))
				                     {
					                   if($reg_rej->clerk=='' || $reg_rej->clerk==0)
									   echo "<font color=#0099ff>Active &nbsp;(Clerk Not Assigned)</font>"; 
									   else
									    echo "<font color=#0099ff>Active &nbsp;( Case Handeled By ".$this->public->get_UserName($reg_rej->clerk).")</font>";                                             
									  }
				  if($reg_rej->status==3 && $reg_rej->updatedby==$this->session->userdata('user_id')){ echo "<font color=#0099ff>Active</font>"; }
				    if($reg_rej->status==4){ echo "<font color=#0099ff>Case Closed</font>"; }
					 if($reg_rej->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
				  ?>
                  </td>
                  <td>
                  
                    <a href="<?php echo site_url('registration/view_rejected_case/'.$reg_rej->id);?>" > <i class="fa fa-camera"></i> View</a>
                  </td>
                 
                </tr>
              <?php 
			  
			  $i++; } } ?>
              </tbody>
		</table>
    </div>
    </div>
    
        
</div>
<br />
<?php echo anchor("registration", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>
<p>&nbsp;</p>

<script type="text/javascript">
 $('document').ready(function(){
  $('#all').css('display','none');
  $('#search_button').click(search_litigant);
	 
	 function search_litigant()
	 {
	 	var val = $('#search_case').val();		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_case');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-tbody').html(msg);	
										
				}
			});
	 }
	 
 });
</script>