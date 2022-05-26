

<style>
.myButton {
	-moz-box-shadow: -1px 1px 10px -1px #3e7327;
	-webkit-box-shadow: -1px 1px 10px -1px #3e7327;
	box-shadow: -1px 1px 10px -1px #3e7327;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
	background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
	background-color:#77b55a;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	float:right;
	color:#ffffff;
	font-family:Verdana;
	font-size:10px;
	padding:4px 7px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
	background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
	background-color:#72b352;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>


<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>
	</div>
<!--End Breadcrumb-->
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
<div class="main-content"> 
   		   <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by CID" id="search_case" name="search_case" type="text">
                    <button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button>
                </form>
            </div>
 <div class="panel panel-default">

<ul class="tabs"> 
        <li class="active" rel="tab1">Registered Case</li>
        <?php
		if($this->session->userdata('court_type')!='4')
		{?>
        <li rel="tab2">Appealed Case
		
		<?php $i=0; foreach($appeal_registration as $appreg) {
           if($appreg->case_source == '1'){ $i=$i+1; } }
          if($i >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font>
        <?php  } ?>
		</li>
        <?php
		}?>
		<?php if(count($registration_rejected)!=0) { ?>
        <li rel="tab3">Rejected Case</li>
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
							  if($lll->litigant_type=='14'||$lll->litigant_type=='15' || $lll->litigant_type=='17')
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
                  <?php if($reg->status==1){ ?>
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
              <?php if(count($appeal_registration)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="7%">Sl.No</th>
				  <th><b><font color="blue">eLitigation</font></b></th>
                  <th>Applealed Court</th>
                  <th>Issue</th>
                  <th>Appealing Litigant</th>
                  <th>Appeal Date</th>
                  <th>Judgement Date</th>
                  <th>Judgement No</th>
                  <th>View</th>
                  
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($appeal_registration as $appreg) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td>
                         <?php if($appreg->case_source=='1'){ ?>
                          <font color="green"><i class="fa fa-check" aria-hidden="true"></i></font>
                          <?php } else { ?> <font color="red"><i class="fa fa-times" aria-hidden="true"></i></font><?php } ?>
                         </td>
                  <td><?php echo $this->public->get_CourtName($appreg->court); ?></td>
                  <td><?php echo $appreg->case_title; ?></td>
				  <td><?php 
				  if($appreg->case_source=='1'){ 
				  echo $this->public->get_ApplicantName($appreg->appealent);
				    
				  } else
				  {
					echo $this->public->get_ApplicantName($appreg->litigant);   
				  }
				  ?></td>
                  <td><?php echo $appreg->created_on; ?></td>
                  <td><?php echo $appreg->judgement_date; ?></td>
                  <td><?php echo $appreg->judgement_no; ?></td>
                  <td><a href="index.php/registration/view_case/<?php echo $appreg->id; ?>">View</a></td>
                </tr>
              <?php $i++; } } ?>
              </tbody>
		</table>
    </div>

    <div id="tab3" class="tab_content">  
      	<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($registration_rejected)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
               
                <tr>
                  <th width="5%">Sl.No</th>
                  <th>Misc Case No</th>
                  <th>Case Title</th>
                  <th>Petitioner/Plaintiff</th>
                  <th>Registration Date</th>
                  <th>Registration No</th>
                  <th>Case Status</th>
                  <th width="15%">Options</th>
                
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($registration_rejected as $reg_rej) { 
			 ?>
              
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $reg_rej->misc_case_no; ?></td>
                 
                  <td><?php echo $reg_rej->case_title; ?></td>
                 
                  <td><?php
				  $qryFrm3 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg_rej->id'");
				  $fields3 = $qryFrm3->result();
				  $cnt1 = count($qryFrm3->result());
				  if($cnt1==0)
				  {
					  echo "<span style='color:#F30'>No Litigant Added</span>"."<br />"; 
				  }
				  else
				  {
					  foreach($fields3 as $ll) {
					   echo "<span title='".$this->public->get_LitigantType($ll->litigant_type)."'>".$this->public->get_ApplicantName($ll->litigant)."</span><br>";
					   }
				  }
				   ?>
                   </td>
                  <td><?php echo $reg_rej->reg_date; ?></td>
                  <td><?php echo $reg_rej->reg_no; ?></td>
                  <td>
				  <?php 
				  
				  if($reg_rej->status==1){ echo "<font color=#0099ff>Registered Case</font>"; } 
				  if($reg_rej->status==2){ 
				                       if($reg_rej->clerk=='' || $reg_rej->clerk==0)
									   echo "<font color=#0099ff>Assign Clerk</font>"; 
									   else
									   echo "<font color=#0099ff>Assigned to &nbsp;(".$this->public->get_UserName($reg_rej->clerk).")</font>";
				                     }
				  if($reg_rej->status==3 && $reg_rej->updatedby!=$this->session->userdata('user_id'))
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
                  <?php if($reg_rej->status==1){ ?>
                  <a href="index.php/registration/edit_registration/<?php echo $reg_rej->id; ?>" title="Edit"><i class="fa fa-pencil"></i> Assign</a>
                  <?php } ?>
                  <a href="<?php echo site_url('registration/view_rejected_case/'.$reg_rej->id);?>" > <i class="fa fa-camera"></i> View</a>
                  </td>
                 
                </tr>
              <?php 
			  
			  $i++; } } ?>
              </tbody>
		</table>
    </div>
    
</div>	


<br />
<?php echo anchor("registration/hybrid_dash", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>
</div>

<script type="text/javascript">
 $('document').ready(function(){
  $('#all').css('display','none');
  $('#search_button').click(search_litigant);
	 
	 function search_litigant()
	 {
	 	var val = $('#search_case').val();		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_by_registry');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-tbody').html(msg);	
										
				}
			});
	 }
	 
	 
	 $(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	 
 });
</script>
