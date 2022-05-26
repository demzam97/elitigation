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
		<h1 class="page-title">Incase Activity</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

            <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by Case No..." id="search_case" name="search_case" type="text">
                    <button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button>
                </form>
            </div>

	<div class="panel panel-default">
  
		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($registration)==0) { ?>
	              <tr>
	                  <th colspan="6"><strong>Record Not Found...</strong></td>
	              </tr>
              	<?php } 
              	else 
              		{ ?>
                <tr>
                  <th width="5%">Sl.No</th>
                   <th><b><font color="blue">eLitigation</font></b></th>
                   <th>Registration No</th>
                    <th>Registration Date</th>
                  <th>Issue</th>
                  <th>Petitioner/Plaintiff</th>
                             
                  <th width="15%">Case Activity</th>
                </tr>
                
              </thead>
              <tbody id="main-tbody">
	              <?php $i=1; foreach($registration as $reg) { ?>
	                <tr>
	                  <td><?php echo $i; ?></td>
                          <td><?php if($reg->case_source=='1'){ ?>
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
	                 
	                         
	                  <td>
	                  <?php
	                  if(($this->session->userdata('user_id')==$reg->clerk)||($this->session->userdata('user_id')==$reg->updatedby))
					  { 
						if($reg->case_source=='1'){	
					       echo "<a href='index.php/registration/case_activity_elat/".$reg->id."'>Insert Case Activities</a>";
						}
						else
						{
							echo "<a href='index.php/registration/case_activity/".$reg->id."'>Insert Case Activities</a>";	
						}
					  }
					  ?>
	                  </td>
	                </tr>
	              <?php $i++; 
	          		$this->session->set_userdata('i',$i);
	          	  } 
	          		$i = $this->session->userdata('i');
					$reg_no=$this->session->userdata('regno');
					$reg_date=$this->session->userdata('regdate');
    				$case_id= $this->session->userdata('case_id');
    					
    				if ($case_id != NULL){
    				?>

	                <tr>
	                  <td><?php echo ($i!=NULL ?$i:" "); ?></td>
	                  <td><?php echo ($reg_no!=NULL ?$reg_no:"");?></td>
	                  <td><?php echo ($this->public->get_CaseTitle($case_id)); ?></td>
	                  <td><?php
					  $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$case_id'");
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
	                  <td><?php echo $reg_date; ?></td>
	                         
	                  <td>
	                  <?php
	                  if(($this->session->userdata('user_id')==$reg->clerk)||($this->session->userdata('user_id')==$reg->updatedby))
					  { 
						if($reg->case_source=='1'){	  
					   echo "<a href='index.php/registration/case_activity_elat/".$case_id."'>Insert Case Activities</a>";
						}
						else
						{
							echo "<a href='index.php/registration/case_activity/".$case_id."'>Insert Case Activities</a>";	
						}
					  }
					  ?>
	                  </td>
	                </tr>
	              <?php $i++; }  }
	          		
	          	?>
              </tbody>
		</table>
</div>
<br />
<?php echo anchor("registration", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>


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
