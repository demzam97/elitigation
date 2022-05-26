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
<form method="post" action="index.php/registration/update_litigant_org" id="frm1" name="frm1">
<input type="hidden" value="<?php echo $id; ?>" name="org_id" />
<table class="table table-bordered table-striped">
	<tbody>
        <tr>
			<td width="20%"><label> Organization Name <span style="color:#F30;">*</span> :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="OrgName" value="<?php echo $org_name;?>"/>
            <div class="ErrMsg"></div>
            </td>
	
			<td width="20%"><label> Organization Code:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="OrgCode" value="<?php echo $org_code;?>"  />
            <div class="ErrMsg"></div>
            </td>
		</tr>
        <tr>
			<td width="20%"><label> License/Registration Number<span style="color:#F30;">*</span>:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="licenseNo" value="<?php echo $License_no;?>" />
    
            </td>
			<td width="20%"><label> Address <span style="color:#F30;">*</span> :</label></td>
			<td>
            <textarea class="form-control" name="caddress" style="width:80%;"><?php echo $litigant_current_address;?></textarea>
            
            
    
            </td>
		</tr>
         <tr>
			<td width="20%"><label>P.O Box No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cpobox" value="<?php echo $pobox;?>" />
    
            </td>

			<td width="20%"><label>Phone No <span style="color:#F30;">*</span> :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cpno" value="<?php echo $org_pno;?>"  />
    
            </td>
		</tr>
        <tr>
			<td width="20%"><label>Fax No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cfno" value="<?php echo $org_fax;?>"  />
    
            </td>
	
        	<td width="20%"><label> Contact Person Name:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="RName" value="<?php echo $contact_name;?>"  />
    
            </td>
		</tr>
          <tr>
			<td width="20%"><label>Contact Phone No  :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="Rpno" value="<?php echo $litigant_phone;?>"  />
    
            </td>

			<td width="20%"><label>Designation:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="designation" id="Rpost" value="<?php echo $contact_desg;?>"  />
            <div class="ErrMsg"></div>
            </td>
		</tr>
	</tbody>
</table>
<input type="submit" value="submit" class="btn btn-primary" style="float:right; margin-right:100px;">
<input type="button" onClick="history.go(-1);"class="btn btn-danger" style="float:right; margin-right:20px; " value="Cancel">
</form>
</div>