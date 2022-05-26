<script type="text/javascript" src="css/jquery.js"></script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
   <h1 class="page-title">Summon Respondent / Defendant / Witness </h1>
   <ul class="breadcrumb">
   <li><a href="index.html">Home</a> </li>
   <li class="active">Summon</li>
        </ul>
	</div>
<!--End Breadcrumb-->
<div class="main-content">
 <form name="frm1" id="frm1" method="post" action="<?php echo site_url('registration/sendmail_redef'); ?>" enctype="multipart/form-data"> 
         <input type="hidden" name="caseid" value="<?php echo $caseid; ?>" >
         <input type="hidden" name="cid" value="<?php echo $cid; ?>" >
         <input type="hidden" name="email" value="<?php echo $email; ?>" >
         <input type="hidden" name="name" value="<?php echo $name; ?>" >
         <input type="hidden" name="type" value="<?php echo $type; ?>" >
         <input type="hidden" name="mobile" value="<?php echo $mobile; ?>" > 
       <table class="table table-bordered table-striped">
       <tr>
       <td width="25%"><strong>Issue Date:</strong><font color="red">*</font></td>
       <td>
       <input type="date" name="issue_date" id="start_dt2" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Document Type:</strong><font color="red">*</font></td>
       <td>
       <select name="document_type" id="coll_type" class="form-control" style="width:40%;" required="required">
       <option value="">Select One</option>
       <option value="1">Summons</option>
       <option value="2">Arrest Warrant</option>
       <option value="3">Injunction Order</option>
       <option value="4">Remand Order</option>
       </select>
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Document Issued To:</strong><font color="red">*</font></td>
       <td>
       <input type="text" name="issue_to" id="case_no" required="required" class="form-control" style="width:40%;" value = "<?php echo $name; ?>" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Corrospondence Type:</strong><font color="red">*</font></td>
       <td>
       <select name="corrospondence_type" id="litigant" class="form-control" style="width:40%;" required="required">
       <option value="">Select One</option>
       <option value="1">Email</option>
       
       </select>
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Summon Date:</strong><font color="red">*</font></td>
       <td>
       <input type="date" name="summon_date" id="start_dt2" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Issue Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="summon_time" id="start_dt2" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Document Copy:</strong><font color="red">*</font></td>
       <td>
       <input type="file" name="document_copy" class="form-control" required="required" id="fileUpload" style="width:40%;">
       <div class="ErrMsg"></div>
       </td>
       </tr>
       </table>
        <div>
           <input type="submit" value="Send Mail/SMS" class="btn btn-primary">
           <a href="<?php echo site_url('registration/case_activity/'.$caseid.''); ?>" class="btn btn-danger">Cancel</a>
        </div>

</form>

 </div>
 
