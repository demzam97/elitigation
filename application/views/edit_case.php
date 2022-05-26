<style>
	.addLaw
	{
		border:1px solid #ddd;
		background:#fff;
		font-size:12px;
		color:#666;
		padding:3px;
	}
	.addLaw:hover
	{
		border:1px solid #ddd;
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
	#lawView
	{
		display: none;
		top: 100px !important;
		z-index: 10;
		padding: 10px;
		margin: 10px 30% 0px 30%;
		width: 600px;
		position: fixed;
		background: #fff;
		border: 1px solid #BBB;
		box-shadow: 0px 0px 30px #999;
		max-height:500px;
		overflow:auto;
		height: auto;
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
	#benchAdd
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
	#editBox
	{
		display:none;
		top:100px !important;
		z-index:10;
		padding:10px;
		margin: 10px 20% 0 20%;
		width:auto;
		position:fixed;
		background:#fff;
		border:1px solid #BBB;
		box-shadow:0px 0px 30px #999;
		height:250px;
	}
	.levels
	{
		max-width:250px;
		min-width:250px;
		margin-left:30px;
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
</style>
<div class="content">

	<!--Breadcrumb-->
	<div class="header">
		<h1 class="page-title">Edit Case Details</h1>
	</div>
	<!--End Breadcrumb-->

	<div class="main-content"> 
	 	<form action="index.php/registration/update_case/<?php echo $case_id;?>" method="post">
		 <div class="panel panel-default">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td width="20%">
							<strong>Misc Case No:</strong>
						</td>
						<td>
							<input type="text" class="form-control" name="misc_no" value="<?php echo $mis_case_no; ?>">
						</td>
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
					echo "<tr><td><span style='width:90%;'>".$this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteEditCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></span></span></a></td></tr>";
				}
				else
				{				   	
					echo "<tr><td>";
					echo $this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
					foreach($check as $ck)
					{
						echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
					}
					echo "</td><td><a href='".site_url('registration/deleteEditCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
				}
			}
			else
			{
				
				
				$check=$this->public->checkLawyerExists($case_id, $lit->litigant);
				if(empty($check))
				{
					echo "<tr><td><span style='width:90%;'>".$this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td><button name='addLaw' id='".$lit->litigant."' class='addLaw'>Lawyer</button></td><td><span style=' margin:5px;'><a href='".site_url('registration/deleteEditCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></span></span></a></td></tr>";
				}
				else
				{				   	
					echo "<tr><td>";
					echo $this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span></td><td>";
					foreach($check as $ck)
					{
						echo "<span style='font-size:12px;'>Lawyer:&nbsp;&nbsp;<a href='#' id='".$ck->Lawyer_id."' class='viewLaw'>".$this->public->getLawyerName($ck->Lawyer_id)."</a></span><br>";
					}
					echo "</td><td><a href='".site_url('registration/deleteEditCaseLatigantType/'.$lit->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:11px; float:right; margin-top:5px;'></a></td></tr>";
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
							<td><input type="text" class="form-control" name="issue" value="<?php echo $case_title; ?>"></td>

						</tr>

						<tr>
							<td width="20%">
								<strong>Case Type:</strong>
								<input type="button" value="Add" class="css_btn_class"  onclick="showEdit()" style="width:70px; height:30px; line-height:20px; float:right;"/>
							</td>

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
                  echo $i."<span style='width:100%; margin:5px;'><span style='width:90%;'>".$this->public->getLevel3Name($types->case_type_id)."</span><span style='width:10%; margin:5px;'><a href='".site_url('registration/deleteCaseType/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                     }
                    else
                     {
                  echo $i."- ".$types->case_type_id."<br>";
                     }
                      
                    $i++;
					  }
				  }
				  ?>  </td> 
							
								</tr>

								<tr>
									<td width="20%"><strong>Misc Hearing Date:</strong></td>
									<td><input type="date" class="form-control" name="misc_hearing_date" value="<?php echo $misc_hearing_date; ?>"></td>
								</tr>
								<tr>
									<td width="20%"><strong>Registration Status:</strong></td>
									<td> <?php if($registration_status==1) { echo "Registered"; } elseif($registration_status==2) { echo "Not Registered"; }?></td>
											</td>
											</tr>

							 <!--  <tr>
									<td width="20%"><strong>Application Date:</strong></td>
									<td><input type="date" class="form-control" name="application_date" value="<?php echo $app_date; ?>"></td>
								</tr> -->
															
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
											echo "-&nbsp;".$this->public->get_UserName($fld1->hjudge)."<a href='".site_url('registration/deleteCaseHearingJudge/'.$fld1->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; 
										}
										?>
								</tr>						
							</tbody>
						</table>


					</div>
					<?php if($registration_status==1) { ?>
					<table class="table table-bordered table-striped">
						<tr>
							<td width="20%"><strong>Registration Date:</strong></td>
							<td><input type="date" class="form-control" name="reg_date" value="<?php echo $reg_date; ?>"></td>

							<td width="20%"><strong>Registration No:</strong></td>
							<td><input type="text" class="form-control" name="reg_no" value="<?php echo $reg_no; ?>"></td>
						</tr>
						<tr>
							<td><strong>Judge Assigned:</strong>
								<input type="button" value="Add" class="css_btn_class" onclick="addJudge()" style="width:70px; height:30px; line-height:20px; float:right;"/>
							</td>
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
										echo "-&nbsp;".$this->public->get_UserName($cju->judge_id)."<a href='".site_url('registration/deleteCaseJudge/'.$cju->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; 
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
												{?>
											<a href="<?php echo base_url('/images/media/'.$qr->upload);?>" target="new">Download</a>
											<?php
										}
										?>	
									</td>

								</tr>
								<tr>
									<td width="20%"><strong>Artical Referance:</strong></td>
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
						<div class="col-md-6 col-md-offset-3">
							<input type="submit" value="Update" class="btn btn-success" name="update">
							<a href="index.php/registration/user_dashboard" class="btn btn-danger">Cancel</a>
						</div>
					</form>
					<?php $this->load->view('LitAdd'); ?>

					<div id="judgeAdd">
						<span style="width:100%;">
							<strong>Assign Judge</strong>
							<img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addJudgeClose();"/>
						</span>
						<hr />
						<form action="<?php echo site_url('registration/editCaseJudge');?>" method="post">
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
				
						</select><br /><br />
						<input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
						<input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addJudgeClose();"/>
					</form>
				</div>
				<div id="hearingJudgeAdd">
					<span style="width:100%;">
						<strong>Assign Hearing Judge</strong>
						<img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addHearingJudgeClose();"/>
					</span>
					<hr />
					<form action="<?php echo site_url('registration/editCaseHearingJudge');?>" method="post">
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
					</select><br /><br />
					<input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
					<input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addHearingJudgeClose();"/>
				</form>
			</div>
			<div id="lawBox">
				<?php
				$this->load->view('case_activityLawyerAdd');
				?>
			</div>
			<div id='editBox'>
				<span style="width:100%;">
					<strong>Edit Case Detail</strong>
					<img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeEdit();"/>
				</span>
				<hr />
				<form name="caseFilter" method="post" action="<?php echo site_url('registration/editCaseType'); ?>">
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
				</div><br />
				<div id="clevel2">
					<label>Case Level 2 </label>
					<select name="level2" class="levels"> 
						<option value="0" disabled="disabled" selected="selected">Select Level1 One</option>
					</select>
				</div> <br />
				<div id="clevel3">
					<label>Case Level 3 </label>
					<select name="level3" id="level3" class="levels">
						<option value="0" disabled="disabled" selected="selected">Select Level2 One</option>
					</select>
				</div><br />
				<input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
				<input type="button" value="cancel" class="btn btn-primary pull-right" onclick="closeEdit();"/>
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

		function addJudge()
		{
			document.getElementById( 'judgeAdd' ).style.display = 'block';
		}

		function addBench()
		{
			document.getElementById( 'benchAdd' ).style.display = 'block';
		}
		function addBenchClose()
		{
			document.getElementById( 'benchAdd' ).style.display = 'block';
		}

		function addJudgeClose()
		{
			document.getElementById( 'judgeAdd' ).style.display = 'none';
		}

		function addHearingJudge()
		{
			document.getElementById( 'hearingJudgeAdd' ).style.display = 'block';
		}

		function addHearingJudgeClose()
		{
			document.getElementById( 'hearingJudgeAdd' ).style.display = 'none';
		}
		function showEdit()
		{
			document.getElementById( 'editBox' ).style.display = 'block';
		}

		function closeEdit()
		{
			document.getElementById( 'editBox' ).style.display = 'none';
		}

		function addLit()
		{
			document.getElementById( 'litAdd' ).style.display = 'block';
		}

		function addLitClose()
		{
			document.getElementById( 'litAdd' ).style.display = 'none';
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
$('document').ready(function(){

	$(	"#search_button_lit").click(function(){
				search();
			});
    
    function search(){
     
      var title=$("#search_Lit_CID").val();
      var case_id=$("#caseLit").val();
      
      if(title !=""){
       $.ajax({
        type:"post",
        url:"index.php/registration/getEditLit",
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
 });
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function () {
		
	$(".viewLaw").live("click",function(event){
	   event.preventDefault();
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
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
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
        });
</script>
