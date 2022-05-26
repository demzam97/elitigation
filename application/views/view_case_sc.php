<style>
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
		<table class="table table-bordered"  >
              <tbody>
                <tr>
                  <td width="20%"><strong>Misc Case No:</strong></td>
                  <td><?php echo $mis_case_no; ?></td>
                   <td width="40%" rowspan="7"><div style="text-align:center; width:100% !important;"><strong style="color:#09F;">Litigant</strong></div>
                  <table class="table table-bordered table-striped">
                  <tr>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Lawyer</th>
                     </tr>
                  <?php 
				  $qryFrm = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$case_id'");
				  $fields = $qryFrm->result();
				  foreach($fields as $ind=>$fld){
					   if($this->public->checkLit($fld->litigant)=='yes')
								  {
									   $lawyers=$this->public->checkLawyerExists($case_id, $fld->litigant);
									   if(empty($lawyers))
									   {
										  echo "<tr><td><span style='min-width:100%; margin-bottom: 5px;' title='".$this->public->get_LitigantType($fld->litigant_type)."'>".$this->public->get_OrgName($fld->litigant)."</span></td><td>".$this->public->get_LitigantType($fld->litigant_type)."</td>";
											
										  echo "<td> Not Assigned</td></tr>";
									   }
									   else
									   {
											  echo "<tr><td><span style='min-width:100%;' title='".$this->public->get_LitigantType($fld->litigant_type)."'>".$this->public->get_OrgName($fld->litigant)."</td><td>".$this->public->get_LitigantType($fld->litigant_type);
											
										  echo "</td><td>";
										  
										   foreach($lawyers as $law)
										   {
											   
											echo "<a href='' id='".$law->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($law->Lawyer_id)."</a><br>";
											
										   }
										   echo "</td></tr>";
									   }
								  ?>
                                  
                               <?php
								  }
								  else
								  {
								    $lawyers=$this->public->checkLawyerExists($case_id, $fld->litigant);
									   if(empty($lawyers))
									   {
										  echo "<tr><td><span style='min-width:100%; margin-bottom: 5px;' title='".$this->public->get_LitigantType($fld->litigant_type)."'>".$this->public->get_ApplicantName($fld->litigant)."</span></td><td>".$this->public->get_LitigantType($fld->litigant_type)."</td>";
											
										  echo "<td> Not Assigned</td></tr>";
									   }
									   else
									   {
											  echo "<tr><td><span style='min-width:100%;' title='".$this->public->get_LitigantType($fld->litigant_type)."'>".$this->public->get_ApplicantName($fld->litigant)."</td><td>".$this->public->get_LitigantType($fld->litigant_type);
											
										  echo "</td><td>";
										  
										   foreach($lawyers as $law)
										   {
											   
											echo "<a href='' id='".$law->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($law->Lawyer_id)."</a><br>";
											
										   }
										   echo "</td></tr>";
									   }
                                  ?>
                                 
                               <?php
								  }
								  
								  
					 
				  }
				  ?>
                  </table>
                  </td>
                </tr>
               
                <tr>
                <td width="20%"><strong>Case Title :</strong></td>
                  <td><?php echo $case_title; ?></td>
                </tr>
                <tr>
                 <td width="20%"><strong>Case Type:</strong></td>
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
				  ?></td>
                </tr>
                 
                <tr>
                 <td width="20%"><strong>Misc Hearing Date:</strong></td>
                  <td><?php echo $misc_hearing_date; ?></td>
                </tr>
                <tr>
                 <td width="20%"><strong>Registration Status:</strong></td>
                  <td> <?php if($registration_status==1) { echo "Registered"; } elseif($registration_status==2) { echo "Not Registered"; }?></td>
                </tr>
                

                
                 <tr>
                 <td width="20%"><strong>Review Date:</strong></td>
                  <td><?php echo $review_date; ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Review Judges:</strong></td>
                              <td>
                  <?php 
				  $qryFrm1 = $this->db->query("select * from sc_tbl_review_judges where case_id='$case_id'");
				  $fields1 = $qryFrm1->result();
				  if(empty($fields1))
				  {
					  echo "No Review Judge Assigned!";
				  }
				  foreach($fields1 as $ind=>$fld1){	
				  echo $this->public->get_UserName($fld1->judge_id)."<br />";
				  }
				  ?>
                  </td>
         
                              <td width="20%"><strong>Review Comments:</strong></td>
                              <td>
                  <?php 
				  
					  echo $review_summery;
				 
				  ?>
                  </td>
                  
                          
                </tr>
                <tr>
                              <td width="20%" rowspan="2"><strong>Hearing Judges:</strong></td>
                              <td>
                  <?php 
				  $qryFrm1 = $this->db->query("select * from sc_tbl_registration_hjudge where caseID='$case_id'");
				  $fields1 = $qryFrm1->result();
				  if(empty($fields1))
				  {
					  echo "No Hearing Judge Assigned!";
				  }
				  foreach($fields1 as $ind=>$fld1){	
				  echo "-&nbsp;".$this->public->get_UserName($fld1->hjudge)."<br />";
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
         		<td><?php echo $reg_date; ?></td>
         	
         		<td width="20%"><strong>Registration No:</strong></td>
         		<td><?php echo $reg_no; ?></td>
         	</tr>
             <tr>
         		<td><strong>Judge Assigned:</strong></td>
         		<td>  <?php
				
				 $c_Judges=$this->public->getAlCaseJudge($case_id);
				 if(empty($c_Judges))
				 {
					 echo "Judge Not Assigned";
				 }
				 else
				 {
					 foreach($c_Judges as $cju)
					 {
						 echo "-&nbsp;".$this->public->get_UserName($cju->judge_id)."<br>";
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
					<td width="20%"><strong>Judgement No:</strong></td>
					<td><?php echo $qr->judgement_no; ?></td>
					<td width="20%"><strong>Judgement Date:</strong></td>
					<td><?php echo $qr->judgement_date; ?></td>
				</tr>
				<tr>
					<td width="20%"><strong>Dispossal Type:</strong></td>
					<td><?php
					  if($qr->dispossal_type==''||$qr->dispossal_type==0)
					  {
						  echo "<span style='color:#f00;'> Disposal type not selected!</span>";
					  }
					  else
					  {
					    echo $this->public->get_disposal_name($qr->dispossal_type); 
					  }?>
                      
                      </td>
                      	<td width="20%"><strong>Judgement Document:</strong></td>
					<td>
                    <?php
					if($qr->upload=='')
					{
						echo "<span style='color:#f00;'>No Judgement Document!</span>";
					}
					else
					{
					$ext = pathinfo($judgementcopy, PATHINFO_EXTENSION);
					if($ext == 'pdf' || $ext == 'PDF') {
					?> 
                  <a href="<?php echo base_url('images/courtorder/'.$judgementcopy); ?>" target="_blank" ><?php echo $judgementcopy; ?></a>
                    <?php
					}
					else
					{ ?> 
					<a href="index.php/registration/download_jf/<?php echo ($case_id); ?>"><?php echo $judgementcopy; ?></a>
				<?php	}
					}
				?>	
                    </td>
             
				</tr>
                <tr>
					<td width="20%"><strong>Article Reference:</strong></td>
					<td><?php echo $qr->article; ?></td>
					<td width="20%"><strong>Judgement Brief:</strong></td>
					<td><?php echo $qr->judgement_brief; ?></td>
				</tr>
                 <tr>
					<td width="20%"><strong>Signing Judge :</strong></td>
					<td><?php 
					   $this->db->select('*');
					   $this->db->where('judgement_id', $qr->id);
					   $this->db->from('sc_tbl_judgement_signby');
					   $results = $this->db->get();
	                   $j_juds=$results->result();
					  foreach($j_juds as $j_jud)
					  {
						  echo $this->public->get_UserName($j_jud->judge_id)."<br>";
					  }
					  ?>
				    </td>
				    <td width="20%"><strong>Act Type:</strong></td>
					<td><?php
					
					$this->db->select('*');
					$this->db->where('Judgement_id', $qr->id);
					$this->db->from('sc_tbl_judgement_act');
					$query = $this->db->get();
	                $acts=$query->result();
					
					if(!empty($acts))
					{
						foreach($acts as $act)
						{
						   echo $this->public->get_act_name($act->Act_id)."<br>"; 
						}
					}
					else
					{				 
					 
					    echo "<span style='color:#f00;'> Act type not selected!</span>";
					  }
					 
                 ?></td>
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
						 echo "Not Sentenced";
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
         		<td><strong>Signed By:</strong></td>
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


<?php 

$a_court_id=$this->session->userdata('court_id');
$this->db->select('*');
$this->db->where('case_id', $case_id);
$this->db->where('appealed_court_id', $a_court_id);
$this->db->from('sc_tbl_appeal');
$appeal_status=$this->db->count_all_results();

if($appeal_status==0)
{
}
else
{
?>
	<table class="table table-bordered table-striped">
        	<tr>
				<!-- <div id="regBox"> -->
				<div>
				<form id="appReg" method="post" action="<?php echo site_url('registration/appealReg'); ?>" >  
					<input type="hidden" name="reg_status" value="1" />
				   	<input type="hidden" name="old_case_id" value="<?php echo $case_id;?>" />
				   	<table class="blank_tbl ">
				   		<h3>Appeal Details</h3>
				   		<div class="form-group col-md-6">
			<label>Case Title :</label>
			<textarea class='form-control' name="case_title"><?php echo $case_title; ?></textarea>
		</div>
		<div class="col-md-6 form-group">
			<?php 
				$this->db->select('*');
				$this->db->where('case_id', $case_id);
				$this->db->from('sc_tbl_appeal');
				$result = $this->db->get()->row();
				$apl_dt=$result->appeal_date;
			?>

			<label>Application Date:</label>
			<input type="text" name="app_date"  value="<?php echo $apl_dt;?>"  class="form-control" />
		</div>
		<div class="form-group col-md-6">
		  
                <tr>
                 <td width="10%"><strong>Case Type:</strong></td>
                  <?php
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
						  echo $i."- ".$this->public->getLevel3Name($types->case_type_id)."<br>";
						  $i++;
					  }
				  }
				  ?>
                </tr></div>
					   	<tr>
					       <td style="width:50%;">
					           <div class="form-group">
					            <label>Misc Case No :</label><br />
					            <input type="text" name="misc_case"  style="width:70%;" class='form-control' value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" />
					          </div>
					       </td>
					       <td>
						        <div class="form-group">
						            <label> Miscellaneous Date:</label><br />
						            <input type="date" name="hearing_date"  style="width:70%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
						        </div>
						    </td>
					   	</tr>
					   	<div class="col-md-6">
			
			<table style="width: 50%;" class="table table-bordered table-striped" >
			<label>Appeal Requested By</label>
				<tr>
					<td> <strong>Name</strong> </td>
					<td> <strong>CID</strong> </td>
				</tr>
				<?php
					$this->db->select("*");
					$this->db->where('case_id', $case_id);
					$this->db->from('sc_tbl_appeal');
					$result = $this->db->get()->row();
					$appl_id=$result->litigant;
					
					if($appl_id!=''){
						echo "<tr><td>". $this->public->get_ApplicantName($appl_id)."</td><td>".$this->public->get_litigant_cid($appl_id)."</td></tr>";
				}?>
			</table>
		</div>
		<div class="clearfix"></div>
		<div class="form-group col-md-6">
			<div style="float:left; margin-top:-8px;">Defendant / Respondent : &nbsp;&nbsp;&nbsp;&nbsp;
				<a id="create-daily" class="btn btn-default">Add</a>
			</div>
		</div>
		<div id="show">
			<?php $this->load->view('temp_litigantName'); ?> 
		</div>	
					   	<tr>
					          <td>
					          	<div class="form-group">
						            <label>Assigned to which bench:</label><br />
						            <select name="bench" style="width:70%;" class='form-control'>
							            <option value="0" selected>Select One</option>
							            <?php 
										$benches=$this->public->get_benches();
							   
										foreach($benches as $bench):?>
							            <option value="<?php echo $bench->id; ?>"><?php echo $bench->bench_name; ?></option>
							            <?php endforeach; ?>
						            </select>
					            </div>
					          </td>
				          </tr>
				    </table>      
						<br /><br />
				        <div id="rtio_type3">
				            <input type="submit" value="Submit" class="btn btn-primary" >
				              <a href="index.php/registration" class="btn btn-danger">Cancel</a>
				        </div>
				</form>
				</div>
         	</tr>
        </table>
        <?php
}
?>
</div>
  




<div id="lawView">

</div>
<div id="form_input" title="Insert/Edit Item">
      <table>
        <?php echo form_open('registration/insert_liti_id'); ?>
        <tr>
         <td><input class="input-xlarge form-control" placeholder="Search by CID / Name" id="search_CID" name="search_CID" type="text"></td>
         <td>&nbsp;&nbsp;<button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button></td>
        </tr>
         <tr>
        <td colspan="2">
        <br /><input type="radio" Name="s_check" value="ind" id="s_check" checked="checked"/><label for="ind">Individual</label>&nbsp;&nbsp;&nbsp;<input type="radio" Name="s_check" value="org" id="s_check"/><label for="org">Organization</label>
        <br />
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <tr id="main-body">
        
        </tr>
      </table>
    </div>
    <div id="dialog-confirm" title="Delete Item ?">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        <input type="hidden" value='' id="del_id" name="del_id">
        Are you sure?</p>
</div>


<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

<script type="text/javascript">

$('document').ready(function(){

$('#add_rtio_type3').click(function(e) {
	$('#rtio_type3').append($('#div_rtio_type3').html());
	return false;
})

$('#add_rtio_type2').click(function(e) {
	$('#rtio_type2').append($('#div_rtio_type4').html());
	return false;
})
		
$('#add_rtio_type1').click(function(e) {
	$('#rtio_type1').append($('#div_rtio_type1').html());
	return false;
})

$('#add_rtio_type').click(function(e) {
	$('#rtio_type').append($('#div_rtio_type').html());
	return false;
})

$('.remove_table').live('click', function(){
	$(this).parents('table').remove();
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


function showhidediv( rad )
    {
        var rads = document.getElementsByName( rad.name );
        document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
        document.getElementById( 'two' ).style.display = ( rads[1].checked ) ? 'block' : 'none';
    }
function closeVLaw()
{
	document.getElementById('lawView').style.display='none';
}

</script>


