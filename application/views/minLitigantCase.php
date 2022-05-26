
<?php
if($case){
	   foreach($case as $appreg) { 
          
	echo"<tr>".$case_id=$appreg->id;
        	echo"<td>".$appreg->reg_no."</td> ";
            echo"<td>".$appreg->case_title."</td> ";
            echo"<td>".$appreg->reg_date."</td> ";
            echo "<td>";
			
			
			 $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appreg->id'");
                          $fields2 = $qryFrm2->result();
                          if(count($fields2)==0)
                          {
                              echo "No Litigant Added";
                          }
                          else
                          {
                              foreach($fields2 as $lll) {
								   if($lll->litigant_type==18)
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
			
			
			
			echo "</td>";
				  
		      echo "<td>";
			
			
			 $qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appreg->id'");
                          $fields2 = $qryFrm2->result();
                          if(count($fields2)==0)
                          {
                              echo "No Litigant Added";
                          }
                          else
                          {
                              foreach($fields2 as $lll) {
								  
								  if($lll->litigant_type==16)
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
			
			
			
			echo "</td>";  
			echo "<td>".$this->public->get_UserName($appreg->clerk)."</td> ";	  
            echo "<td>".$this->public->get_CourtName($appreg->court_id)."</td> ";
            ?>
            
             <td>
                          <?php 
                          if($appreg->status==1){
                                  if($appreg->registration_status==1)
                                  {
                                       echo "<font color=#0099ff>Case Registered</font>";
                                  }
                                  elseif($appreg->registration_status==2)
                                  {	
                                      echo "<font color=#0099ff>Case Dismissed</font>";
                                  }
                               } 
                          if($appreg->status==2){ echo "<font color=#0099ff>Active</font>"; }
                          if($appreg->status==3){ echo "<font color=#0099ff>Active</font>"; }
                          if($appreg->status==4){ echo "<font color=#0099ff>Closed</font>"; }
                          if($appreg->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
				  ?>
                  
            <?php
            echo '<td align="center">';
         
            echo '<a href="'.site_url("registration/view_case/".$case_id).'" class="css_btn_class" style="padding:5px;">View</a>
            </td>  
		</tr>';
        		
		}
	 }
	 else
	 {
	 echo '<tr><td colspan="6"><h4>No Result Found!</h4></td></tr>';
	 }
	 
	 ?>