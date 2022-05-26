<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Decided Case</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
      <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by Judgement No..." id="search_caseNo" name="search_caseNo" type="text">
                    <button class="btn btn-default" type="button" id="search_button" ><i class="fa fa-search"></i> Go</button>
                </form>
      </div>
       <table class="table table-bordered table-striped">
       	<thead>
        <tr>
        <th width="5%">SL No</th>
       		<th width="10%">Registration No</th>
            <th width="10%">Registration Date</th>
             <th width="10%">Judgment No</th>
             <th width="10%">Judgment Date</th>
             <th width="10%">Case Type</th>
            <th width="15%">Plainttiff/Appelant</th>
            <th width="15%">Defendant/Respondent</th>
            <th>Option</th>
         
        </tr>
       	</thead>
        <tbody id="main-body">
        <?php
		$i=1; 
		foreach($appeal_reg as $appreg) { 
          
		
			$from = strtotime($appreg->judgement_date);
			$today = time();
			$difference = $today - $from;
			$days=floor($difference / (60 * 60 * 24));
		
		
         if($days<=1000)
		 {
        
        ?>
		<tr><?php $case_id=$appreg->id;?>
        <td><?php echo $i;?>  </td>
        	<td><?php echo $appreg->reg_no;?>  </td> 
            <td><?php echo $appreg->reg_date; ?></td>
            <td><?php echo $appreg->judgement_no; ?></td>
            <td><?php echo $appreg->judgement_date; ?></td>
           <!-- <td><?php echo $this->public->get_UserName($appreg->clerk); ?></td>-->
            
             <td><?php
				  $case_types=array();
                  $case_types=$this->public->get_case_casetype($case_id);
				  if(empty($case_types))
				  {
					  echo "No Case Type Assigned!";
				  }
				  else
				  {
				  	$i=1;
					  foreach($case_types as $types)
					  {
						  $var = $types->case_type_id;
                     if(is_numeric($var)) 
                     {
                  echo $i."- ".$this->public->getLevel3Name($types->case_type_id)."<br>";
                     }
                    else
                     {
                  echo $i."- ".$types->case_type_id."<br>";
                     }
                      
                    
					  }

				  }
				  ?>  </td> 
			            
                 
             <td>
			  
              <?php
                          $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appreg->id'");
                          $fields2 = $qryFrm2->result();
                          if(count($fields2)==0)
                          {
                              echo "No Litigant Added";
                          }
                          else
                          {
                              foreach($fields2 as $lll) 
							  {								  
								  if($lll->litigant_type==14||$lll->litigant_type==15)
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
            
            <td>
			  
              <?php
                          $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appreg->id'");
                          $fields2 = $qryFrm2->result();
                          if(count($fields2)==0)
                          {
                              echo "No Litigant Added";
                          }
                          else
                          {
                                    foreach($fields2 as $lll) {
								  
								  if($lll->litigant_type==16||$lll->litigant_type==18)
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
           <td align="center">
            
            <?php  //echo $appreg->id;
			if($appreg->status!=5)
			{
			if($this->session->userdata('user_type')==3  && $this->session->userdata('court_type')!='1'
				||$this->session->userdata('user_type')==4 && $this->session->userdata('court_type')!='1'
			    ||$this->session->userdata('user_type')==5 && $this->session->userdata('court_type')!='1'
			    ||$this->session->userdata('user_type')==7 && $this->session->userdata('court_type')!='1' 
                ||$this->session->userdata('user_type')==10 && $this->session->userdata('court_type')!='1'
			) { ?>
            <a href="index.php/registration/appeal_request/<?php echo $appreg->id; ?>" class="css_btn_class" style="padding:5px; ">Appeal</a><br /><br>
            <?php } 
			
			}?>
            <a href="<?php echo site_url('registration/view_case/'.$case_id);?>" class="css_btn_class" style="padding:5px;">View</a>
            </td>  
		</tr>
        <?php  } 
		 $i++;
		}?>
        </tbody>
       </table>
    <br />
<?php echo anchor("registration/decided_case", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>

</div>
<script type="text/javascript">

$('document').ready(function(){

$('#all').css('display','none');
$('#search_button').click(search_case);
	 
	 function search_case()
	 {
	 	var val = $('#search_caseNo').val();
		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/DecidedCase_search');?>",
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
