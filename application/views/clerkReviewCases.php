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
		<h1 class="page-title">Pending Review Cases</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

	<div class="panel panel-default">
  
		<table class="table table-bordered table-striped">
              <thead>
              <?php if(count($reviews)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="5%">Sl.No</th>
                   <th>Misc No</th>
                  <th>Case Title</th>
                  <th>Litigants</th>
                   <th>Appealent Court</td>
                  <th>Appeal Date</th>            
                  <th width="15%">Case Activity</th>
                  
                </tr>
              </thead>
              <tbody id="main-tbody">
              <?php $i=1; foreach($reviews as $reg) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $reg->misc_case_no; ?></td>
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
                   <td><?php 
				$appealent_Court=$this->public->getAppealentCourt($reg->id);
				echo $this->public->get_CourtName($appealent_Court); ?></td>
                  <td><?php echo $reg->application_date; ?></td>
                         
                  <td>
                  <?php
                  if(($this->session->userdata('user_id')==$reg->clerk)||($this->session->userdata('user_id')==$reg->updatedby))
				  {
				   echo "<a href='index.php/registration/reviewRegisteration/".$reg->id."'>Insert Review</a>";
				  }
				  ?>
                  </td>
                </tr>
              <?php $i++; } } ?>
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