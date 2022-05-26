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
	  
$('#all').css('display','none');
$('#search_button').click(search_case);
	 
	 function search_case()
	 {
	 	var val = $('#search_any').val();		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_by_registry');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-body').html(msg);	
										
				}
			});
	 }
});

</script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
 <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by Case No/Title" id="search_any" name="search_any" type="text">
                    <button class="btn btn-default" type="button" id="search_button" ><i class="fa fa-search"></i> Go</button>
                </form>
      </div>
<?php if($this->session->userdata('court_type')==4 ) { ?>
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
                  <th width="12%">Misc. No</th>
                  <th width="10%">Registration No</th>
                  <th width="10%">Registration Date</th>
                   <th width="7%">Bench</th>
                   <th width="15%">Issue</th>
                  <th width="10%">Litigant</th>
                  <th width="10%">Status</th>
                  <th width="5%">Option</th>
                 <!-- <th width="10%">Action</th>-->
                  
                </tr>
              </thead>
              <tbody id="main-body">
              <?php $i=1; foreach($registration as $reg) 
			  { 
			      
				  if( ($reg->status==1 &&  $reg->registration_status==1) || $reg->status==2 || $reg->status==3 )
				  {?>
                        <tr>
                         <td><?php echo $i; ?></td>
                         <td>
                         <?php if($reg->case_source=='1'){ ?>
                          <font color="green"><i class="fa fa-check" aria-hidden="true"></i></font>
                          <?php } else { ?> <font color="red"><i class="fa fa-times" aria-hidden="true"></i></font><?php } ?>
                          
                         </td>
                          <td><?php echo $reg->misc_case_no; ?></td>
                          <td><?php echo $reg->reg_no; ?></td>
                          <td><?php echo $reg->reg_date; ?></td>
                          <td><?php echo $this->public->getBenchName($reg->bench); ?></td>
                          <td><?php echo $reg->case_title; ?></td>
                          <td><?php
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
                          <td>
                          <?php 
                          if($reg->status==1){
                                  if($reg->registration_status==1)
                                  {
                                       echo "<font color=#0099ff>Registered</font>";
                                  }
                                  elseif($reg->registration_status==2)
                                  {	
                                      echo "<font color=#0099ff>Dismissed</font>";
                                  }
                               } 
                          if($reg->status==2){ echo "<font color=#0099ff>Active</font>"; }
                          if($reg->status==3){ echo "<font color=#0099ff>Active</font>"; }
                          if($reg->status==4){ echo "<font color=#0099ff>Closed</font>&nbsp;&nbsp;&nbsp;<a href='". site_url('registration/appeal_request/'.$reg->id)."' class='myButton'>APPEAL</a>"; }
                          if($reg->status==5){ echo "<font color=#0099ff>Appealed</font>"; }
						  
				  ?>
                  </td>
                 <td>
                 <a href="<?php echo site_url(); ?>/registration/view_case/<?php echo $reg->id; ?>" title="View" class="css_btn_class" style="padding:5px;"> View</a></td>
                </tr>
                 <?php
				  $i++;
                }
              } } ?>
              </tbody>
		</table>
<?php } else { ?>
<ul class="tabs"> 
        <li class="active" rel="tab1">Registered Case</li>
        <li rel="tab2">Appealed Case
        <?php $i=0; foreach($appeal_registration as $appreg) {
           if($appreg->case_source == '1'){ $i=$i+1; } }
          if($i >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font>
        <?php  } ?>
        </li>
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
                  <th width="12%">Misc. No</th>
                  <th width="10%">Registration No</th>
                  <th width="10%">Registration Date</th>
                   <th width="7%">Bench</th>
                   <th width="15%">Issue</th>
                  <th width="10%">Litigant</th>
                  <th width="10%">Status</th>
                  <th width="5%">Option</th>
                 <!-- <th width="10%">Action</th>-->
                  
                </tr>
              </thead>
              <tbody id="main-body">
              <?php $i=1; foreach($registration as $reg) 
			  { 
			      
				  if( ($reg->status==1 &&  $reg->registration_status==1) || $reg->status==2 || $reg->status==3 )
				  {?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td>
                         <?php if($reg->case_source=='1'){ ?>
                          <font color="green"><i class="fa fa-check" aria-hidden="true"></i></font>
                          <?php } else { ?> <font color="red"><i class="fa fa-times" aria-hidden="true"></i></font><?php } ?>
                         </td>
                          <td><?php echo $reg->misc_case_no; ?></td>
                          <td><?php echo $reg->reg_no; ?></td>
                          <td><?php echo $reg->reg_date; ?></td>
                          <td><?php echo $this->public->getBenchName($reg->bench); ?></td>
                          <td><?php echo $reg->case_title; ?></td>
                          
                          <td><?php
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
                          <td>
                          <?php 
                          if($reg->status==1){
                                  if($reg->registration_status==1)
                                  {
                                       echo "<font color=#0099ff>Case Registered</font>";
                                  }
                                  elseif($reg->registration_status==2)
                                  {	
                                      echo "<font color=#0099ff>Case Dismissed</font>";
                                  }
                               } 
                          if($reg->status==2){ echo "<font color=#0099ff>Active</font>"; }
                          if($reg->status==3){ echo "<font color=#0099ff>Active</font>"; }
                          if($reg->status==4){ echo "<font color=#0099ff>Closed</font>&nbsp;&nbsp;&nbsp;<a href='". site_url('registration/appeal_request/'.$reg->id)."' class='myButton'>APPEAL</a>"; }
                          if($reg->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
				  ?>
                  </td>
                   <td><a href="<?php echo site_url(); ?>/registration/view_case/<?php echo $reg->id; ?>" title="View" class="css_btn_class" style="padding:5px;"> View</a></td>
                  <?php /*?><td><a href="index.php/registration/edit_registration/<?php echo $reg->id; ?>" title="Edit"><i class="fa fa-pencil"></i> Edit</a></td><?php */?>
                </tr>
                 <?php
				  $i++;
                }
              } } ?>
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
                  <th>Date of filing</th>
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
    
</div>	

<?php } ?>
<br />
<?php echo anchor("registration/registry_view", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>
</div>

<style type="text/css">
  .blink_me {
  animation: blinker 1s linear infinite;
}
@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>