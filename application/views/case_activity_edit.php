<script type="text/javascript" src="css/jquery.js"></script>

<style>
#formBox
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 10% 0 20%;
	width:450px;
	position:fixed;
	left:100px;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}

#litBox
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 10% 0 20%;
	width:450px;
	position:fixed;
	left:100px;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}

</style>
<div id="formBox">
 <span style="width:100%;">
      <strong>Add Form</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeForm();"/>
  </span><br />
  <hr />
  <form action="<?php echo site_url('registration/addJudicialForm'); ?>" method="post">
  <input type="hidden" name="id" value="<?php echo $id;?>" />
  <input type="hidden" name="jud_id" value="<?php echo $judicial_process_id;?>" />
  <input type="hidden" name="case_id" value="<?php echo $case_id;?>" />
  <label>Select Form :</label>
  <select name="form_id" style="width:50%;">
  <option value="" selected="selected" disabled="disabled">Select a Form</option>
  <?php
  $frmLst=$this->public->get_forms();
  foreach($frmLst as $frmL)
  {?>
	  <option value="<?php echo $frmL->id;?>"><?php echo $frmL->form_name; ?></option>
  <?php
  }
  ?>
  </select>
  <br /><br>
   <label style="float:left;">Form Date: &nbsp;&nbsp;&nbsp;</label>
   <input type="Date" name="formdate" class="datepicker"  place holder="Date" style="height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
  <br /><br />
  <label style="float:left;">Issued: &nbsp;&nbsp;&nbsp;</label>
  <input type="text" placeholder="Form Usage" style="width:70%; float:left;" class="form-control" name="issued" />
   <br /><br /><br /><br />
    <input type="button" value="Cancel" class="btn btn-primary" style="float:right;" onclick="closeForm()" />
    <input type="submit" value="Add" class="btn btn-primary" style="float:right; margin-right:20px;" />
  </form>
</div>

<div id="litBox">
 <span style="width:100%;">
      <strong>Add Litigant</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeLit();"/>
  </span>
  <hr />
  <form action="<?php echo site_url('registration/addJurdLit');?>" method="post">
  <input type="hidden" name="idr" value="<?php echo $id;?>" />
  <input type="hidden" name="judr_id" value="<?php echo $judicial_process_id;?>" />
  <input type="hidden" name="caseID" value="<?php echo $case_id;?>" />
  <table class="table table-bordered table-striped">
  <tr>
  <td></td>
  <td><strong>Litigant Name</strong></td>
  <td><strong>Litigant Type</strong></td>
  </tr>
  <?php
  foreach($litigants as $lits)
  {
  
  if($this->public->checkLit($lits->litigant)=='yes')
        {?>
            <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="lit[]" /></td><td><?php echo $this->public->get_OrgName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
		}
        else
        {?>
           <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="lit[]" /></td><td><?php echo $this->public->get_ApplicantName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
        }
		 
  }?>
  </table>
   <input type="submit" value="Add" class="btn btn-primary" style="float:right; margin-left:20px;" />
    <input type="button" value="Cancel" class="btn btn-primary" style="float:right;" onclick="closeLit();" />
  </form>
</div>

<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Edit Case Activity</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">  
<form method="post" action="index.php/registration/Update_caseActivity" enctype="multipart/form-data"> 

 <div class="panel panel-default">
 <table class="table table-bordered table-striped">
 	
    <tr>
		<td width="25%"><strong>Judicial Process:</strong></td>
		<td colspan="2">
        <select class="form-control" name="jProcess">
        <option value="0" selected>Select One</option>
        <?php foreach($judicial_process as $j_process): ?>
        <option value="<?php echo $j_process->id; ?>" <?php if($judicial_process_id==$j_process->id) { ?> selected <?php } ?>><?php echo $j_process->process_name; ?></option>
        <?php endforeach; ?>
        </select>
        <input type="hidden" name="activity_id" value="<?php echo $id; ?>" />
        <input type="hidden" name="case" value="<?php echo $case_id; ?>" />
        </td>

		<td><strong>Activity Date:</strong></td>
		<td colspan="2">
        <input type="text" id="start_dt" name="act_date" class="datepicker" style=" height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" value="<?php echo $activity_date; ?>" />
        </td>
	</tr>
    </table>
    </div>
     <div class="panel panel-default" style="width:100%; float:left; padding:10px; margin-bottom:10px;" > 
       <div style="width:49%; float:left;">
      <table class="table table-bordered table-striped" > 
      <tr>
      <td> <strong>Form Used</strong> <input type="button" onclick="showForm()" class="css_btn_class" value="Add" style="float:right;" /></td>
      </tr>
       <?php 
          $qryFrm = $this->db->query("select * from sc_tbl_case_form where judicial_process_id='$id'");
          $fields = $qryFrm->result();
          foreach($fields as $ind=>$fld){	
          ?>
     <tr><td><?php echo $this->public->get_form_name($fld->form_used); ?><span style="float:right; "><a href="<?php echo site_url('registration/deleteJudicialForm/'.$fld->id); ?>"  style="cursor:pointer;" onclick='return confirm("Are you sure?")' ><img src='<?php echo base_url(); ?>images/cross.png' style='width:10px; float:right; margin-top:5px;'></a></span> -  <?php echo $fld->Issued; ?></td></tr>
          <?php } ?>
     
     </table>
     </div>
        <div style="width:49%; float:right;">
     
     <table class="table table-bordered table-striped"> 
      <tr>
      <td> <strong>Litigant Present</strong> <input type="button" class="css_btn_class" value="Add" style="float:right;" onclick="showLit()"/></td>
      </tr>
       <?php 
          $qryFrm2 = $this->db->query("select * from sc_tbl_case_litigant where judicial_process_id='$id'");
          $fields2 = $qryFrm2->result();
          foreach($fields2 as $ind=>$fld2)
		  {	
		          $jud_lits=$this->public->getJurLit($fld2->case_id,$fld2->litigant_id);
				  foreach($jud_lits as $jud_lit)
				  {
					   if($this->public->checkLit($jud_lit->litigant)=='yes')
						{ 
						 echo "<tr><td>".$this->public->get_OrgName($jud_lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_litigant_type_name($jud_lit->litigant_type)."</span><span style='width:10%; margin:5px;'><a href='".site_url('registration/deleteJudicalLitigant/'.$fld2->id)."' onclick='return confirm(\"Are you sure?\")' ><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></td></tr>";
						}
						else
						{  echo "<tr><td>".$this->public->get_ApplicantName($jud_lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_litigant_type_name($jud_lit->litigant_type)."</span><span style='width:10%; margin:5px;'><a href='".site_url('registration/deleteJudicalLitigant/'.$fld2->id)."' onclick='return confirm(\"Are you sure?\")' ><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></td></tr>";
						}
					 
				  }
            } ?>
     
     </table>
     
     </div>
   
   </div>


<div id="form_one" <?php if($amount=="") { ?>style="display:none;" <?php } else { ?> style="display:block;" <?php } ?>>  
      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="25%"><strong>Amount:</strong></td>
        	<td>
            <input type="text" name="amount" class="form-control" style="width:40%" value="<?php echo $amount; ?>">
            </td> 
      </tr> 
      <tr>
        	<td width="25%"><strong>Receipt No:</strong></td>
        	<td>
            <input type="text" name="receipt_no" class="form-control" style="width:40%" value="<?php echo $receipt_no; ?>">
            </td>
      </tr>
      <tr>
        	<td width="25%"><strong>Surety:</strong></td>
        	<td>
            <input type="text" name="surety" class="form-control" style="width:40%" value="<?php echo $surety; ?>">
            </td>
      </tr> 
        
    </table>
    
    </div>

<div class="panel panel-default" style="float:left; width:100%;">
	<table class="table table-bordered table-striped">
    <tr>
		<td width="25%"><strong>Acivity Description:</strong></td>
		<td colspan="2">
        <textarea name="act_desc" style="width:40%;" class="form-control"><?php echo $remarks; ?> </textarea>
        </td>
	</tr>
    <?php if($file_attached!=""){?>
    <tr>
		<td><strong>Attached Document:</strong></td>
		<td colspan="2">
        <?php echo $file_attached; ?>
        </td>
	</tr>
    <?php } ?>
   <!-- <tr>
		<td><strong>Upload Document:</strong></td>
		<td colspan="2">
        <input type="file" name="file" class="form-control" style="width:40%;" />
        </td>
	</tr>-->
   
    </table>
</div>
<input type="submit" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-primary" onclick="history.go(-1);" />
</form>
</div>



<script type="text/javascript">
function showForm()
    {
       
		document.getElementById( 'formBox' ).style.display ="block";

    }
function closeForm()
    {
       
		document.getElementById( 'formBox' ).style.display ="none";

    }
	
	function showLit()
    {
       
		document.getElementById( 'litBox' ).style.display ="block";

    }
function closeLit()
    {
       
		document.getElementById( 'litBox' ).style.display ="none";

    }
</script>