<style>
   .levels
   {
   max-width:250px;
   min-width:250px;
   margin-left:30px;
   }
   .addLaw
   {
   border:1px solid #ddd;;
   background:#fff;
   font-size:12px;
   color:#666;
   padding:3px;
   }
   .addLaw:hover
   {
   border:1px solid #ddd;;
   background:#EAEAEA;
   font-size:12px;
   color:#0C3;
   }
   .addLaw:before
   {
   content:"+ ";
   color:#390;
   font-weight:bold;
   font-size:14px;
   }
   #litAdd
   {
   display:none;
   top:80px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
   max-height:500px;
   }
   #lawBox
   {
   display: none;
   top: 100px !important;
   z-index: 10;
   padding: 10px;
   margin: 10px 20% 0 20%;
   width: 600px;
   position: fixed;
   background: #fff;
   border: 1px solid #BBB;
   box-shadow: 0px 0px 30px #999;
   max-height:500px;
   overflow:auto;
   height: auto;
   }
   #hearingJudgeAdd{
   display:none;
   top:100px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
   }
   #judgeAdd
   {
   display:none;
   top:100px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
   }
    #disposalAdd
   {
   display:none;
   top:100px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
   }
   #editBox
   {
   display:none;
   top:100px !important;
   z-index:10;
   padding:10px;
   margin: 10px 20% 0 20%;
   width:450px;
   position:fixed;
   background:#fff;
   border:1px solid #BBB;
   box-shadow:0px 0px 30px #999;
   height:auto;
   }
   #lawView
   {
   display: none;
   top: 100px !important;
   z-index: 10;
   padding: 10px;
   margin: 10px 20% 0 20%;
   width: 600px;
   position: fixed;
   background: #fff;
   border: 1px solid #BBB;
   box-shadow: 0px 0px 30px #999;
   max-height:500px;
   overflow:auto;
   height: auto;
   }
</style>
<div class="content">
<!--Breadcrumb-->
<div class="header">
   <h1 class="page-title">Case Details</h1>
</div>
<!--End Breadcrumb-->
<div class="main-content">
<div class="panel panel-default">
   <form method="post" action="index.php/registration/update_rejected_case">
      <table class="table table-bordered"  >
         <tbody>
            <tr>
               <td width="20%"><strong>Misc Case No:</strong></td>
               <td><input type="text" class="form-control" name="misc_case" value="<?php echo $mis_case_no; ?>" ><input type="hidden" name="case_id" value="<?php echo $case_id; ?>"></td>
               <td   width="40%" rowspan="7">
                  <div id="litBox">
                     <table style="width:95%; float:left; margin-left:3%;" cellspacing="10px" class="table table-bordered table-striped">
                        <tr>
                           <th colspan="3"><strong>Litigant</strong><input type="button" value="Add" class="css_btn_class" onClick="addLit()" style="width:70px; height:30px; line-height:20px; float:right;"/></th>
                        </tr>
                        <?php 
                           if(empty($lits))
                           {
                           	echo "<tr> <td>No Litigant Added!</td></tr>";
                           }
                           else
                           {
                           	foreach($lits as $lit)
                           	{
                           		if($this->public->checkLit($lit->litigant)=='yes')
                           		{
                           			
                           			$check=$this->public->checkLawyerExists($case_id, $lit->litigant);
                           			if(empty($check))
                           			{
                           				echo "<tr><td><span style='width:90%;'>".$this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteRejectedCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></span></span></a></td></tr>";
                           			}
                           			else
                           			{				   	
                           				echo "<tr><td>";
                           				echo $this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
                           				foreach($check as $ck)
                           				{
                           					echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
                           				}
                           				echo "</td><td><a href='".site_url('registration/deleteRejectedCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
                           			}
                           		}
                           		else
                           		{
                           			
                           			
                           			$check=$this->public->checkLawyerExists($case_id, $lit->litigant);
                           			if(empty($check))
                           			{
                           				echo "<tr><td><span style='width:90%;'>".$this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteRejectedCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></span></span></a></td></tr>";
                           			}
                           			else
                           			{				   	
                           				echo "<tr><td>";
                           				echo $this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
                           				foreach($check as $ck)
                           				{
                           					echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
                           				}
                           				echo "</td><td><a href='".site_url('registration/deleteRejectedCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
                           			}
                           		}
                           		
                           	}
                           }
                           ?>
                     </table>
                  </div>
               </td>
            </tr>
            <tr>
               <td width="20%"><strong>Issue :</strong></td>
               <td><input type="text" name="issue" class="form-control" value="<?php echo $case_title; ?>"></td>
            </tr>
            <tr>
               <td width="20%"><strong>Case Type:<input type="button" value="Add" class="css_btn_class" onclick="showEdit()" style="width:70px; height:30px; line-height:20px; float:right;"/></strong></td>
               <td><?php
                  $case_types=array();
                              $case_types=$this->public->get_case_casetype($case_id);
                  if(empty($case_types))
                  {
                   echo "No Case Type Assigned!";
                  }
                  else
                  {$i=1;
                   foreach($case_types as $types)
                   {
                  
                    echo $i."- ".$this->public->getLevel3Name($types->case_type_id)."&nbsp;<a href='".site_url('registration/deleteCaseTypeRejected/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                    $i++;
                   }
                  }
                  ?></td>
            </tr>
            <tr>
               <td width="20%"><strong>Misc Hearing Date:</strong></td>
               <td><input type="date"  name="misc_date" class="form-control" value="<?php echo $misc_hearing_date; ?>"/></td>
            </tr>
            <tr>
               <td width="20%"><strong>Registration Status:</strong></td>
               <td> <?php if($registration_status==1) { echo "Registered"; } elseif($registration_status==2) { echo "Not Registered"; }?></td>
            </tr>
            <tr>
               <td width="20%"><strong>Application Date:</strong></td>
               <td><input type="date"   class="form-control" name="app_date"   value="<?php echo $app_date; ?>"/></td>
            </tr>
            <tr>
               <td width="20%" rowspan="2">
                  <strong>Hearing Judges:</strong>
                  <input type="button" value="Add" class="css_btn_class" onclick="addHearingJudge()" style="width:70px; height:30px; line-height:20px; float:right;"/>
               </td>
               <td>
                  <?php 
                     $qryFrm1 = $this->db->query("select * from sc_tbl_registration_hjudge where caseID='$case_id'");
                     $fields1 = $qryFrm1->result();
                     if(empty($fields1))
                     	{
                     		echo "No Hearing Judge Assigned!";
                     	}
                     	foreach($fields1 as $ind=>$fld1){	
                     		echo "-&nbsp;".$this->public->get_UserName($fld1->hjudge)."<a href='".site_url('registration/deleteRejectedCaseHearingJudge/'.$fld1->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; 
                     	}
                     ?> 	
               </td>
            </tr>
         </tbody>
      </table>
      <?php if($registration_status==1) { ?>
      <table class="table table-bordered table-striped">
         <tr>
            <td width="20%"><strong>Registration Date:</strong></td>
            <td><input type="date"  class="form-control" name="reg_date"   value="<?php echo $reg_date; ?>"/></td>
            <td width="20%"><strong>Registration No:</strong></td>
            <td><input type="text" name="reg_no" class="form-control" value="<?php echo $reg_no; ?>" ></td>
         </tr>
         <tr>
            <td>
               <strong>Judge Assigned:</strong>
               <input type="button" value="Add" class="css_btn_class" onclick="addJudge()" style="width:70px; height:30px; line-height:20px; float:right;"/>
            </td>
            <td><?php
               $c_Judges=$this->public->getAlCaseJudge($case_id);
               if(empty($c_Judges))
               {
               	echo "Judge Not Assigned";
               }
               else
               {
               	foreach($c_Judges as $cju)
               	{
               		echo "-&nbsp;".$this->public->get_UserName($cju->judge_id)."<a href='".site_url('registration/deleteRejectedCaseJudge/'.$cju->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; 
               	}
               }
               ?></td>
            <td><strong>Case Status:</strong></td>
            <td>  <?php 
               if($status=='1')
               {
               	echo " Registered";
               }
               elseif($status=='2')
               {
               	echo " Assigned to ".$this->public->get_UserName($clerk);
               }
               elseif($status=='3')
               {
               	echo " Active Case handeled by ".$this->public->get_UserName($clerk);
               }
               elseif($status=='4')
               {
               	echo " Case Closed ";
               }
               elseif($status=='5')
               {
               	echo "Case Appealed";
               }
                ?></td>
         </tr>
      </table>
      <?php } ?>
        
      <table class="table table-bordered table-striped">
         <?php
            $qry=array();
            $this->db->select('*');
            $this->db->where('case_id', $case_id);
            $this->db->from('sc_tbl_judgement'); 
            $qryr=$this->db->get();
            $qry=$qryr->result();
            if(!empty($qry))
            {
            foreach($qry as $qr)
            {?>
         <tr>
            <td width="20%"><strong>Judgment No:</strong></td>
            <td><input  type="text" name="judge_No" class="form-control" value="<?php echo $qr->judgement_no; ?>"/></td>
            <td width="20%"><strong>Judgment Date:</strong></td>
            <td><input type="date"  class="form-control" name="judge_date"   value="<?php echo $qr->judgement_date; ?>"/></td>
         </tr>
         <tr>
            <td width="20%"><strong>Disposal Type:</strong>
               <input type="button" value="Add" class="css_btn_class" onclick="addDisposal()" style="width:70px; height:30px; line-height:20px; float:right;"/>

            </td>

            <td>
               <?php
                  if($qr->dispossal_type==''||$qr->dispossal_type==0)
                  {
                   echo "<span style='color:#f00;'> Disposal type not selected!</span>";
                  }
                  else
                  {
                  echo "-&nbsp;".$this->public->get_disposal_name($qr->dispossal_type); 
                  }?>
            </td>
            <td width="20%"><strong>Judgment Document:</strong></td>
            <td>
               <?php
                  if($qr->upload=='')
                  {
                  	echo "<span style='color:#f00;'>No Judgment Document!</span>";
                  ?>
               <input type="file" name="judgement_document" class="form-control"/>
               <?php
                  }
                  else
                  {?>
               <a href="<?php echo base_url('/images/media/'.$qr->upload);?>" target="new">Download</a>
               <?php
                  }
                  ?>	
            </td>
         </tr>
         <tr>
           
            <td width="20%"><strong>Judgment Brief:</strong></td>
            <td><textarea name="judge_brief" class="form-control"><?php echo $qr->judgement_brief; ?></textarea></td>
            <td width="20%"><strong>:</strong></td>
            <td><textarea name="judge_brief" class="form-control"><?php echo $qr->judgement_brief; ?></textarea></td>

         </tr>
         <tr>
            <td width="20%"><strong>Signing Judge:</strong></td>
            <td>
               <?php $jud = $qr->id;
                  $qry = $this->db->query("select * from sc_tbl_judgement_signby where judgement_id=$jud");
                  $field = $qry->result();
                  if(empty($field))
                  {
                   echo "No Signing Judge Found";
                  }
                  else{
                  foreach($field as $j_jud)
                   {
                   	if($j_jud->judge_id==0){
                  	
                  }else{
                  $this->session->set_flashdata("judge_id",$j_jud->judge_id);
                  echo $this->public->get_UserName($j_jud->judge_id)."&nbsp;<a href='".site_url('registration/deleteRejectedSigningJudge/'.$jud)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br> "; }
                    
                   }
                  }
                  
                  ?>
               <a href="#" id="add_rtio_type" class="btn btn-default btn-sm pull-right">Add Judge</a>
               <div id="rtio_type"><input  type="hidden" name="judgementID" value="<?php echo $jud; ?>"/></div>
            </td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <td width="20%"><strong>Act Type:</strong></td>
            <td>
               <?php
                  $this->db->select('*');
                  $this->db->where('Judgement_id', $qr->id);
                  $this->db->from('sc_tbl_judgement_act');
                  $query = $this->db->get();
                              $acts=$query->result();
                  
                  if(!empty($acts))
                  {
                  	foreach($acts as $act)
                  	{
                  		$this->session->set_flashdata("act_id",$act->Act_id);
                  
                  	   echo $this->public->get_act_name($act->Act_id)."&nbsp;<a href='".site_url('registration/deleteRejectedActType/'.$qr->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br> "; 
                  	}
                  }
                  else
                  {				 
                   
                      echo "<span style='color:#f00;'> Act type not selected!</span>";
                    }
                   
                              ?><br />
               <a href="#" id="add_act_article" class="btn btn-default btn-sm pull-right">Add More</a>
               <div id="act_article_section">
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <strong>Sentence:</strong>
            </td>
            <td>
               <?php
                  if($qr->sentence_status=='1')
                  {
                  if($qr->sentence_type==0 || $qr->sentence_type=="") {} else {
                  echo $this->public->get_sentence_Name($qr->sentence_type);
                  }
                  if($qr->amount!='')
                  {
                  echo "&nbsp;&nbsp;|&nbsp;&nbsp;Nu. ".$qr->amount;
                  }
                  
                  }
                  else
                  {
                  echo "<input type='text' value='Not Sentenced' class='form-control' name='sentence'";
                  }
                  ?>
            </td>
            <td>
               <?php
                  if($qr->sentence_type=='9')
                  {
                  echo "<strong> Duration: </strong> ";	
                  }
                  
                    if($qr->sentence_type=='6' || $qr->sentence_type=='7')
                    {?>
               <strong> Receipt no :</strong>
               <?php } ?>
            </td>
            <td>
               <?php
                  if($qr->receipt_no!='')
                  {
                  echo $qr->receipt_no;
                  }
                  
                  if($qr->sentence_type=='9')
                  {
                  
                  echo $qr->year." Year ".$qr->month." Month ".$qr->day." Day";
                  
                  
                  echo "<br> <strong>From</strong> ".date('d F Y', strtotime($qr->start_date))." <strong>To</strong> ".date('d F Y', strtotime($qr->release_date));
                  }
                  
                  ?>
            </td>
         </tr>
         <?php
            }
            }
            else
            {
            echo "<tr><td><span style='color:#F00; text-align: center;'>No judgement avaliable for this case.</span></td></tr>";
            }?>
      </table>
      <?php if($registration_status==2) { ?>
      <table class="table table-bordered table-striped">
         <tr>
            <td width="20%"><strong>Reasons For Not Registering:</strong></td>
            <td><?php echo $reason; ?></td>
         </tr>
         <tr>
            <td><strong>Dismissal Order Number:</strong></td>
            <td><?php echo $dismissal_no; ?></td>
         </tr>
         <tr>
            <td><strong>Dismissal Order Date:</strong></td>
            <td><?php echo $dismissal_date; ?></td>
         </tr>
         <tr>
            <td><strong>Signed By: </strong></td>
            <td>
               <?php 
                  $qryFrm3 = $this->db->query("select * from sc_tbl_registration_signby where caseID='$case_id'");
                  $fields3 = $qryFrm3->result();
                  if(empty($fields3))
                  {
                   echo "No Signing Judge Found";
                  }
                  else
                  {
                   foreach($fields3 as $ind=>$fld3){	
                   echo "<br />-&nbsp;".$this->public->get_UserName($fld3->signed_by);
                   }
                  }
                  ?>
            </td>
         </tr>
      </table>
      <?php } ?>
      <?php if($this->session->userdata('user_type')!=2){ ?>
      <table class="table table-bordered table-striped">
         <tr>
            <td><label><strong>Comment from Judge:</strong></label></td>
         </tr>
         <tr>
            <td><textarea name="rejected" class="form-control" rows="5"><?php echo $reject_comment; ?></textarea></td>
         </tr>
      </table>
      <?php } ?>
      <input type="submit" class="btn btn-primary" value="Submit">
   </form>
</div>
<div id='editBox'>
   <span style="width:100%;">
   <strong>Edit Case Detail</strong>
   <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeEdit();"/>
   </span>
   <hr />
   <form name="caseFilter" method="post" action="<?php echo site_url('registration/updateCaseTypeRejected'); ?>">
      <input type="hidden" name="caseid" value="<?php echo $case_id; ?>" />
      <div id="clevel1">
         <label>Case Level 1 </label>
         <select name="level1" id="level1" class="levels">
            <option value="0" disabled="disabled" selected="selected">Select One</option>
            <?php
               foreach($case_type1 as $case1)
               {?>
            <option value="<?php echo $case1->id?>"><?php echo $case1->caseTypelevel1?></option>
            <?php
               }
               ?>
         </select>
      </div>
      <br />
      <div id="clevel2">
         <label>Case Level 2 </label>
         <select name="level2" class="levels">
            <option value="0" disabled="disabled" selected="selected">Select Level1 One</option>
         </select>
      </div>
      <br />
      <div id="clevel3">
         <label>Case Level 3 </label>
         <select name="level3" id="level3" class="levels">
            <option value="0" disabled="disabled" selected="selected">Select Level2 One</option>
         </select>
      </div>
      <br />
      <input type="submit" value="Update" class="btn btn-primary pull-left" style="margin-left:270px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="closeEdit();"/>
   </form>
</div>
<div id="lawBox">
   <?php
      $this->load->view('case_activityLawyerAdd');
      ?>
</div>
<?php $this->load->view('LitAdd'); ?>
<div id="div_rtio_type" style="display:none">
   <table class="table table-bordered table-striped" id="table_judge">
      <tr>
         <td width="35%"><strong>Delivered By:</strong></td>
         <td>
            <select class="form-control"  name="signed_by[]">
               <option value="0" selected>Select One</option>
               <?php foreach($users as $usr):?>
               <option value="<?php echo $usr->id; ?>"><?php echo $usr->judge_name; ?></option>
               <?php endforeach ?>
            </select>
         </td>
         <td width="10%"><a href="#" class="remove_table_judge" style="float:left;">Remove</a></td>
      </tr>
   </table>
</div>
<div id="div_act_article" style="display:none">
   <table class="table table-bordered table-striped"  id="table_act">
      <tr>
         <td width="35%"><strong>Act Name:</strong></td>
         <td>
            <select class="form-control" style="width:80%;" name="act_name[]">
               <option value="0" selected>Select One</option>
               <?php foreach($act_name as $act):?>
               <option value="<?php echo $act->id; ?>"><?php echo $act->act_name; ?></option>
               <?php endforeach ?>
            </select>
         </td>
         <td width="10%"><a href="#" class="remove_table_act" style="float:left;">Remove</a></td>
      </tr>
      <tr>
         <td width="35%"><strong>Article/Chapter:</strong></td>
         <td>   <input type="text" class="form-control" name="article[]" />
         </td>
      </tr>
      <tr>
         <td width="35%"><strong>Section:</strong></td>
         <td>   <input type="text" class="form-control" name="section[]" />
         </td>
      </tr>
      <tr>
         <td width="35%"><strong>Subsection:</strong></td>
         <td>   <input type="text" class="form-control" name="subsection[]" />
         </td>
      </tr>
   </table>
</div>
<div id="hearingJudgeAdd">
   <span style="width:100%;">
   <strong>Assign Hearing Judge</strong>
   <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addHearingJudgeClose();"/>
   </span>
   <hr />
   <form action="<?php echo site_url('registration/editRejectedCaseHearingJudge');?>" method="post">
      <input type="hidden" value="<?php echo $case_id; ?>" name="case_id" />
      <label>Select Judge : </label>
      <select name="newHearingJudge" class="levels">
         <option value="" selected="selected" disabled="disabled">Select One</option>
         <?php
            foreach($judges as $jd)
            	{?>
         <option value="<?php echo $jd->id; ?>"><?php echo $this->public->get_UserName($jd->id);?></option>
         <?php
            }?>
      </select>
      <br /><br />
      <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addHearingJudgeClose();"/>
   </form>
</div>
<div id="judgeAdd">
   <span style="width:100%;">
   <strong>Assign Judge</strong>
   <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addJudgeClose();"/>
   </span>
   <hr />
   <form action="<?php echo site_url('registration/editRejectedCaseJudge');?>" method="post">
      <input type="hidden" value="<?php echo $case_id; ?>" name="cid" />
      <label>Select Judge : </label>
      <select name="newJudge" class="levels">
         <option value="" selected="selected" disabled="disabled">Select One</option>
         <?php
            foreach($judges as $jd)
            {?>
         <option value="<?php echo $jd->id; ?>"><?php echo $this->public->get_UserName($jd->id);?></option>
         <?php
            }?>
      </select>
      <br /><br />
      <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addJudgeClose();"/>
   </form>
</div>
<div id="disposalAdd">
   <span style="width:100%;">
   <strong>Disposal Type</strong>
   <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addDisposalClose();"/>
   </span>
   <hr />
   <form action="<?php echo site_url('registration/addDisposal');?>" method="post">
      <input type="hidden" value="<?php echo $case_id; ?>" name="cid" />
      <label>Select Disposal : </label>
            <select name="disposal_type" class="form-control">
                  <?php foreach($GetDisposal as $dis): ?>
                  <option value="<?php echo $dis->id; ?>"><?php echo $dis->disposal_type;
                   ?></option>

                  <?php 
                     endforeach; 
                  ?>
            </select>
      <br /><br />
      <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addDisposalClose();"/>
   </form>
</div>
<div id="lawView">
</div>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">
   function showEdit()
   {
   	document.getElementById( 'editBox' ).style.display = 'block';
   	//alert("HI");
   }
   
   function closeEdit()
   {
   	document.getElementById( 'editBox' ).style.display = 'none';
   }
   
   function addLit()
   {
   	document.getElementById( 'litAdd' ).style.display = 'block';
   	$('#reject').val('1');
   }
   
   function addLitClose()
   {
   	document.getElementById( 'litAdd' ).style.display = 'none';
   }
   function addHearingJudge()
   		{
   			document.getElementById( 'hearingJudgeAdd' ).style.display = 'block';
   		}
   
   		function addHearingJudgeClose()
   		{
   			document.getElementById( 'hearingJudgeAdd' ).style.display = 'none';
   		}
</script>
<script type="text/javascript">
   $('document').ready(function(){
   	
   	
    $('#level1').change(function(){
           $.ajax({
               url: "index.php/registration/getFilter2",
               type: "post",
               data: {q: $(this).find("option:selected").val()},
   			dataType: "html",
               success: function(data){
                   //adds the echoed response to our container
                   $("#clevel2").html(data);
               }
           });
       });
       
   
     $("#search_button_lit").click(function(){
   				search();
   			});
       
    function search(){
        
         var title=$("#search_Lit_CID").val();
         var case_id=$("#caseLit").val();
         
         if(title !=""){
          $.ajax({
           type:"post",
           url:"index.php/registration/getRejectedEditLit",
           data:{'g' : title,
           'case_id' : case_id
         },
         
         success:function(data){
           $("#litResult").html(data);
           $("#search_CID").val("");
         }
       });
        }                      
      }
   
   $("#Reject").click(function(){
           $("#reject_comment").show();
       });
   $("#Rej_cancel").click(function(){
           $("#reject_comment").hide();
       });
   
   $('#add_rtio_type3').click(function(e) {
   	$('#rtio_type3').append($('#div_rtio_type3').html());
   	return false;
   });
   
   $('#add_rtio_type2').click(function(e) {
   	$('#rtio_type2').append($('#div_rtio_type4').html());
   	return false;
   });
   		
   $('#add_rtio_type1').click(function(e) {
   	$('#rtio_type1').append($('#div_rtio_type1').html());
   	return false;
   });
   
   $('#add_rtio_type').click(function(e) {
   	$('#rtio_type').append($('#div_rtio_type').html());
   	return false;
   });
   
   $('#add_act_article').click(function() {
   	$('#act_article_section').append($('#div_act_article').html());
   	return false;
   });
   
   $('.remove_table').live('click', function(){
   	$(this).parents('table').remove();
   	return false;
   });	
   
   $('.remove_table_judge').live('click', function(){
   	$(this).parents('#table_judge').remove();
   	return false;
   });
   
   $('.remove_table_act').live('click', function(){
   	$(this).parents('#table_act').remove();
   	return false;
   });		
   
   $('#search_button').click(search_litigantCID);
   
    function search_litigantCID()
   	 {
   	 	var val = $('#search_CID').val();
   		var schk = $("#s_check:checked").val();
   		//alert(val);		
   		$.ajax({
   			type: "POST",
   			url : "<?php echo site_url('registration/search_lititgant_by_cid');?>",
   			data: {"value":val,
   			       "schk":schk 
   				   },
   			dataType : 'html',
   			success: function(msg){	
   						$('#'+val).css('color','#960');
   						$('#main-body').html(msg);	
   										
   				}
   			});
   	 }
   	 
   	 
   	 $(function() {
   	    $( "#dialog:ui-dialog" ).dialog( "destroy" );
    
           $( "#dialog-confirm" ).dialog({
               autoOpen: false,
               resizable: false,
               height:170,
               modal: true,
               hide: 'Slide',
               buttons: {
                   "Delete": function() {
                       var del_id = {id : $("#del_id").val()};
   					  	$.ajax({
                           type: "POST",
                           url : "<?php echo site_url('registration/delete_temp_LitiID')?>",
                           data: del_id,
                           success: function(msg){
                               $('#show').html(msg);
                               $('#dialog-confirm' ).dialog( "close" );
                               //$( ".selector" ).dialog( "option", "hide", 'slide' );
                           }
                       });
    
                       },
                   Cancel: function() {
                       $( this ).dialog( "close" );
                   }
               }
           });
   	
           $( "#form_input" ).dialog({
               autoOpen: false,
               height: 280,
               width: 440,
               modal: false,
               hide: 'Slide',
               buttons: {
                   "Add": function() {
                       var form_data = {
   						liti_id: $('#liti_id').val(),
   						liti_type: $('#liti_type').val(),
                           ajax:1
                       };
    
                       if($('#liti_id').val() == ""){
   					$('#search_CID').focus();
    					$('#search_CID').style.borderColor="#cc0000";
   					return false;
   					}
   					
   					if($('#search_CID').val() == ""){
   					$('#search_CID').focus();
    					$('#search_CID').style.borderColor="#cc0000";
   					return false;
   					}
   					
   					if($('#liti_type').val() == 0){
   					$('#liti_type').focus();
    					$('#liti_type').style.borderColor="#cc0000";
   					return false;
   					}
                     $.ajax({
                       url : "<?php echo site_url('registration/insert_liti_id')?>",
                       type : 'POST',
                       data : form_data,
                       success: function(msg){
   					$('#show').html(msg),
                       $('#liti_id').val(''),
   					$('#liti_type').val(''),
                       
                       $('#liti_id').attr("disabled",false);
   					$('#liti_type').attr("disabled",false);
                       $( '#form_input' ).dialog( "close" )
   					
                       }
   					
                     });
     				  
               },
                   Cancel: function() {
                       $('#liti_id').val(''),
   					$('#liti_type').val(''),
                       $( this ).dialog( "close" );
                   }
               },
               close: function() {
                   $('#liti_id').val('');
   				$('#liti_type').val('');
                 
               }
           });
    
       $( "#create-daily" )
               .button()
               .click(function() {
                   $( "#form_input" ).dialog( "open" );
               });
       });
   	
   	$(".delbutton").live("click",function(){
           var element = $(this);
           var del_id = element.attr("id");
           var info = 'id=' + del_id;
           $('#del_id').val(del_id);
           $( "#dialog-confirm" ).dialog( "open" );
    
           return false;
       });
   	
   	$(".viewLaw").live("click",function(e){
   	   e.preventDefault();
           var element = $(this);
           var del_id = element.attr("id");
   		
   		  $.ajax({
               url: "index.php/registration/showLawyer",
               type: "post",
               data: {"l_id":del_id
   				   },
   			dataType: "html",
               success: function(data){
                   //adds the echoed response to our container
   				
                   $("#lawView").html(data);
   				    $('#lawView').css('display', 'block');
               }
           });
           
       });
      $(".addLaw").live("click",function(){
   		        var element = $(this);
   		        var litID = element.attr("id");
   		        var info = 'id=' + litID;
   		        $('#LitigantID').val(litID);
   		        $( "#lawBox" ).css( "display", "block" );
   		 
   		        return false;
   	});   
      $('#addLaw').submit(function(event){
   
   event.preventDefault();
   $( "#lawBox" ).css( "display", "none" );
   
  $.ajax({
    url: 'index.php/registration/assignCaseActivityLitLawyer',
    type: 'post',
    dataType:'html',   //expect return data as html from server
   data: $('#addLaw').serialize(),
   success: function(response, textStatus, jqXHR){
     
      $('#litBox').html(response);   //select the id and put the response in the html
    },
   error: function(jqXHR, textStatus, errorThrown){
      console.log('error(s):'+textStatus, errorThrown);
   }
 });
 });           
    
    $('#Law_search').click(search_Lawyer);
   	 
   function search_Lawyer()
   	 {
   	 	var val = $('#LawName').val();
   		$.ajax({
   			type: "POST",
   			url : "<?php echo site_url('registration/search_lawyer_info');?>",
   			data: {"value":val
   				  },
   			dataType : 'html',
   			success: function(msg){	
   						$('#lawForm').html(msg);	
   										
   				}
   			});
   	 }
   
   	 	
   });
</script>
<script>
   function validate(){
   if(document.frm1.court.value==0){
   document.frm1.court.focus();
   document.frm1.court.style.borderColor="#0099ff";
   return false;
   }
   
   if(document.frm1.misc_case.value==""){
   document.frm1.misc_case.focus();
   document.frm1.misc_case.style.borderColor="#0099ff";
   return false;
   }
   
   
   }
   
   function addJudge()
   		{
   			document.getElementById( 'judgeAdd' ).style.display = 'block';
   		}
   
   function addJudgeClose()
   		{
   			document.getElementById( 'judgeAdd' ).style.display = 'none';
   		}
   function addDisposal()
         {
            document.getElementById( 'disposalAdd' ).style.display = 'block';
         }
   
   function addDisposalClose()
         {
            document.getElementById( 'disposalAdd' ).style.display = 'none';
         }
   
   function showhidediv( rad )
       {
           var rads = document.getElementsByName( rad.name );
           document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
           document.getElementById( 'two' ).style.display = ( rads[1].checked ) ? 'block' : 'none';
       }
   	
   	
   	function showReg()
   {
   	document.getElementById('regBox').style.display='block';
   	document.getElementById('noRegBox').style.display='none';
   	
   }
   function closeReg()
   {
   	document.getElementById('regBox').style.display='none';
   	document.getElementById('noRegBox').style.display='block';
   }
   
   function closeVLaw()
   {
   	document.getElementById('lawView').style.display='none';
   }
   function showLawyer()
      {
         document.getElementById( 'lawBox' ).style.display = 'block';
      }

   function hideLawyer()
      {
         document.getElementById( 'lawBox' ).style.display = 'none';
      }
   
</script>
