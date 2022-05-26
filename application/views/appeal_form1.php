<style>
  .beatpicker-clearButton
  {
	  display:none;
  }
</style>

<link href="<?php echo base_url();?>BeatPicker/css/BeatPicker.min.css" rel="stylesheet">
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Case Appeal Form </h1>
		<ul class="breadcrumb">
			<li><a href="index.php/registration/registry_view">Home</a> </li>
			<li class="active">Appeal Case</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">
<form name="frm" method="post" action="index.php/registration/add_appeal" enctype="multipart/form-data" onsubmit="disableSubmit()">
<table class="table table-bordered table-striped">
	<tr>
		<td width="20%">Court:</td>
        <td>
        <input type="text" name="court" value="<?php echo $this->public->get_CourtName($court_id); ?>" class="form-control" style="width:40%" readonly />
        <input type="hidden" name="court_id" value="<?php echo $court_id; ?>" />
        <input type="hidden" name="case_id" value="<?php echo $case_id; ?>" />
       
        </td>
	</tr>
    
    <tr>
		<td>Appellent:</td>
        <td>
        <select name="litigant" class="form-control" style="width:40%">
        <option value="0" selected>Select One</option>
        <?php foreach($litigants as $liti): ?>
        <option value="<?php echo $liti->litigant; ?>"><?php echo $this->public->get_ApplicantName($liti->litigant); ?></option>
        <?php endforeach; ?>
        </select>
    
        </td>
	</tr>
    
    <tr>
		<td>Appeal Brief:</td>
        <td>
        <textarea name="appeal_brief" class="form-control" style="width:40%"></textarea>
        </td>
	</tr>
    
    <tr>
		<td>Appeallate Court:</td>
        <td>
        <select name="appeal_court" class="form-control" style="width:40%">
        <option value="0" selected>Select One</option>
        <?php foreach($court_type as $court): ?>
        <option value="<?php echo $court->id; ?>"><?php echo $court->court_name; ?></option>
        <?php endforeach; ?>
        </select>
        </td>
	</tr>
    
     <tr>
		<td>Singning Judge:</td>
        <td>
        <select name="sign_judge" class="form-control" style="width:40%">
        <option value="0" selected>Select One</option>
        <?php foreach($judges as $judge): ?>
        <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
        <?php endforeach; ?>
        </select>
        </td>
	</tr>
    
    <tr>
		<td>Appeal Number:</td>
        <td>
        <input type="text" name="appeal_no" class="form-control" style="width:40%" />
        </td>
	</tr>
    
     <tr>
		<td>Appeal Date:</td>
        <td>
        <input type="text" name="appeal_date" data-beatpicker="true" placeholder="date" style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
        </td>
	</tr>
    
   
    
</table>
<div>
<span style="float:right;">
<input type="submit" value="Submit" class="btn btn-primary" id="submitBtn">
<a href="index.php/registration" class="btn btn-danger">Cancel</a>
</span>

</div>
</form>
</div>
<script src="<?php echo base_url();?>BeatPicker/js/BeatPicker.min.js"></script>


<script>
function disableSubmit()
{
	document.getElementById('submitBtn').style.display='none';	
}
</script>

