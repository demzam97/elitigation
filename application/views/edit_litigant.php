<script type="text/javascript" src="css/jquery.js"></script>

<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">View/Edit Litigant</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
<?php if ($this->session->flashdata('asset_class')): ?>
 <div class="message first">
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span> <a class="close" id="close" style="cursor:pointer;">x</a></div>
 </div>
<div class="clear"></div>
<?php endif; ?>

<div id="main-tbody">
 
 </div>
 <br />
<form method="post" action="index.php/registration/update_litigant" id="frm1" name="frm1">
<input type="hidden" value="<?php echo $id;?>" name="liti_id" />
<table class="table table-bordered table-striped">
	<tbody>
		    <tr>
			<td width="20%"><label>Name :</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="Name" id="Name" value="<?php echo $litigant_name ?>" />
            <div class="ErrMsg"></div>
            </td>
			<td width="15%"><label>Nationality:</label></td>
			<td>
         
            <select name="Nationality" class="form-control" style="width:40%" >
           
            <option value="Bhutanese" <?php if($litigant_nationality=='Bhutanese'){ echo 'selected="selected"';} ?> >Bhutanese</option>
            <option value="Non Bhutanese" <?php if($litigant_nationality=='Non Bhutanese'){ echo 'selected="selected"';} ?>>Non Bhutanese</option>
            </select>
            </td>
		</tr>
        
        <tr>
			<td ><label>CID / Passport / Work Permit No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" name="cid" id="cid" value="<?php echo $litigant_CID ?>" />
            <div class="ErrMsg"></div>
            </td>
			<td><label>Occupation:</label></td>
			<td>
            
             <select name="occupation" class="form-control" style="width:70%" >
            <option value="Govt. Employee" <?php if($occupation=='Govt. Employee'){ echo 'selected="selected"';} ?>>Govt. Employee</option>
            <option value="Private" <?php if($occupation=='Private'){ echo 'selected="selected"';} ?>>Private</option>
            <option value="Student" <?php if($occupation=='Student'){ echo 'selected="selected"';} ?>>Student</option>
            <option value="Call Centers" <?php if($occupation=='Call Centers'){ echo 'selected="selected"';} ?>>Call Centers</option>
            <option value="Farmer" <?php if($occupation=='Farmer'){ echo 'selected="selected"';} ?>>Farmer</option>
            <option value="Others" <?php if($occupation=='Others'){ echo 'selected="selected"';} ?>>Others</option>
            </select>
            </td>
		</tr>
        
        <tr>
			<td><label>Gender:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="gender">
            <option value="0">Select One</option>
            <option value="Male"  <?php if($litigant_gender=='Male'){ echo 'selected="selected"';} ?>>Male</option>
            <option value="Female"  <?php if($litigant_gender=='Female'){ echo 'selected="selected"';} ?> >Female</option>
            <option value="Other"  <?php if($litigant_gender=='Other'){ echo 'selected="selected"';} ?>>Other</option>
            </select>
            </td>
			<td><label>DOB:</label></td>
			<td>
           <input type="text"  name="dob"  placeholder="Date" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;"  data-beatpicker="true"  value="<?php echo $litigant_DOB; ?>" />
            </td>
		</tr>
        
        <tr>
			<td><label>Age:</label></td>
			<td>
            <input type="number" class="form-control" style="width:80%" name="age" value="<?php echo $litigant_age ?>">
           
            </td>
			<td width="20%"><label>House No:</label></td>
			<td>
           <input type="text" name="house_no" class='form-control' style="width:80%;" value="<?php echo $litigant_house_no ?>" />
            </td>
		</tr>
        
        <tr>
			<td><label>Tharm No:</label></td>
			<td>
           <input type="text" name="tharm_no" class='form-control' style="width:80%;" value="<?php echo $litigant_thram_no ?>" />
            </td>
			<td><label>Dzongkhag:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="dzongkhag" onChange="getGewog(this.value)" value="<?php echo $litigant_age ?>">
            <option value="0">Select One</option>
            <?php foreach($dzongkhag as $dzo): ?>
            <option value="<?php echo $dzo->DzongkhagID; ?>" <?php if($litigant_dzongkhag==$dzo->DzongkhagID){ echo 'selected="selected"';} ?> ><?php echo $dzo->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
		</tr>
        
        <tr>
			<td><label>Dungkhag:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="dungkhag">
            <option value="0">None</option>
            <?php foreach($dungkhag as $dung): ?>
            <option value="<?php echo $dung->DungkhagID; ?>" <?php if($litigant_dungkhag==$dung->DungkhagID){ echo 'selected="selected"';} ?> ><?php echo $dung->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
			<td><label>Gewog:</label></td>
			<td>
            <div id="Div_Gewog">
            <select class="form-control" style="width:80%" name="gewog">
            <option value="<?php echo $litigant_gewog;?>" selected="selected"><?php echo $this->public->get_gewogName($litigant_gewog);?></option>
            <option value="">Change Dzongkhag First</option>
            
            </select>
            </div>
            </td>
		</tr>
        
        <tr>
			<td><label>Village:</label></td>
			<td>
            <div id="Div_Village">
            <select class="form-control" style="width:80%" name="village">
             <option value="<?php echo $litigant_village;?>" selected="selected"><?php echo $this->public->get_villageName($litigant_village);?></option>
             <option value="">Change Gewog First</option>
            </select>
            </div>
            </td>
			<td><label>Father's/Mother's Name:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="fatherName" value="<?php echo $litigant_father ?>">
            </td>
		</tr>
        <tr>
			<td><label>Phone No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="phone" value="<?php echo $litigant_phone ?>">
            </td>
			<td><label>Email:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="email" value="<?php echo $litigant_email ?>">
            </td>
        </tr>
        <tr>
			<td colspan="4"><label>Contact Address:</label>
            <textarea class="form-control" style="width:40%; height:100px !important;" name="address" ><?php echo $litigant_current_address ?></textarea>
            </td>
		</tr>
        
	</tbody>
</table>
<input type="submit" value="submit" class="btn btn-primary" style="float:right; margin-right:20px; ">
<a href="index.php/registration/registry_view" class="btn btn-danger" style="float:right; margin-right:20px; ">Cancel</a>
</form>
</div>