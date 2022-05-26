<script type="text/javascript" src="css/jquery.js"></script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Edit Live Stream </h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
			<li class="active">Edit Live Stream</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">
<?php foreach($meetings as $mt){ ?>
 <form name="frm1" id="frm1" method="post" action="<?php echo site_url('registration/update_invite'); ?>" enctype="multipart/form-data"> 
         <input type="hidden" name="caseid" value="<?php echo $caseid; ?>" >
         <input type="hidden" name="meetingtype" value="<?php echo $meetingtype; ?>" >
         <input type="hidden" name="roomid" value="<?php echo $roomid; ?>" >
         
       <table class="table table-bordered table-striped">
       <tr>
       <td width="25%"><strong>Meeting Date:</strong><font color="red">*</font></td>
       <td>
       <input type="date" name="meeting_date" id="meeting_date" value="<?php echo $mt->meeting_date; ?>" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Start Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="start_time" id="start_time" value="<?php echo $mt->start_time; ?>" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>End Time:</strong><font color="red">*</font></td>
       <td>
       <input type="time" name="end_time" id="end_time" value="<?php echo $mt->end_time; ?>" required="required" class="datepicker" style="width:40%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
       <div class="ErrMsg"></div>
       </td>
       </tr>
       </table>
        <div>
           <input type="submit" value="Update" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">
           <a href="<?php echo site_url('registration/jitsi_live/'.$caseid.''); ?>" class="btn btn-danger">Cancel</a>
        </div>

</form>
 <?php } ?>
 </div>
 
