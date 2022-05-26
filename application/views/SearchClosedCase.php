<?php
if(empty($cases))
{?>
  <tr><td colspan="8"> <span style="color:#F60;"> No Records Found! </span></td></tr>	
<?php
}
else
{
	?>
   
  <?php
		$i=1;
		 foreach($cases as $appreg) { 
        ?>
		<tr><?php $case_id=$appreg->id;?>
        <td><?php echo $i++;?>  </td>
        	<td><?php echo $appreg->reg_no;?>  </td> 
            <td><?php echo $appreg->reg_date; ?></td>
            <td><?php echo $appreg->judgement_no; ?></td>
            <td><?php echo $appreg->judgement_date; ?></td>
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
                      
                    $i++;
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
            
            <?php 
			if($appreg->status!=5)
			{
			if($this->session->userdata('user_type')==3  && $this->session->userdata('court_type')!='1'||$this->session->userdata('user_type')==4 && $this->session->userdata('court_type')!='1'||$this->session->userdata('user_type')==5 && $this->session->userdata('court_type')!='1'||$this->session->userdata('user_type')==7 && $this->session->userdata('court_type')!='1' ) { ?>
            <a href="index.php/registration/appeal_request/<?php echo $appreg->id; ?>" class="css_btn_class" style="padding:5px; ">Appeal</a><br /><br>
            <?php } 
			
			}?>
            <a href="<?php echo site_url('registration/view_case/'.$case_id);?>" class="css_btn_class" style="padding:5px;">View</a>
            </td>  
		</tr>
        <?php } 
		
		
}?>