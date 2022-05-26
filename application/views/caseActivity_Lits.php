<style>
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
</style>

<table style="width:48%; float:right; marginl-left:1%;" cellspacing="10px" class="table table-bordered table-striped">
    <tr>
       <td colspan="3"><strong>Litigant</strong><input type="button" value="Add" class="css_btn_class" onClick="addLit()" style="width:70px; height:30px; line-height:20px; float:right;"/></td>
      
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
										   echo "<tr><td><span style='width:90%;'>".$this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='case_lit_del'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></span>
										   <a href='".site_url('registration/deleteCaseLatigantTypeReview/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='review_lit_del' style='display:none;'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
									   }
									   else
									   {				   	
										 echo "<tr><td>";
										 echo $this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
										 foreach($check as $ck)
										 {
											 echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
										 }
										 echo "</td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='case_lit_del'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></span>
										   <a href='".site_url('registration/deleteCaseLatigantTypeReview/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='review_lit_del' style='display:none;'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
									   }
								  }
								  else
								  {
									  
									  
									   $check=$this->public->checkLawyerExists($case_id, $lit->litigant);
									   if(empty($check))
									   {
										   echo "<tr><td><span style='width:90%;'>".$this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='case_lit_del'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></span>
										   <a href='".site_url('registration/deleteCaseLatigantTypeReview/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='review_lit_del' style='display:none;'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
									   }
									   else
									   {				   	
										 echo "<tr><td>";
										 echo $this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
										 foreach($check as $ck)
										 {
											 echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
										 }
										 echo "</td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='case_lit_del'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></span>
										   <a href='".site_url('registration/deleteCaseLatigantTypeReview/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")' class='review_lit_del' style='display:none;'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
									   }
								  }
								  
                   }
           }
           ?>
    
    </table>