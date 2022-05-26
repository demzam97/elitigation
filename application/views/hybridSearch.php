<?php
if(empty($cases))
{?>
  <tr><td colspan="8"> <span style="color:#F60;"> No Records Found! </span></td></tr>	
<?php
}
else
{
	?>
   
 <?php $i=1;

       foreach($cases as $reg) 
			  { 
			      
				  if( ($reg->status==1 &&  $reg->registration_status==1) || $reg->status==2 || $reg->status==3 )
				  {?>
                        <tr>
                          <td><?php echo $i; ?></td>
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