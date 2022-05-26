<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Manage Live Meet</h1>
	</div>
<!--End Breadcrumb-->
<div id="myModal" class="modal">
  <div class="modal-content" id="a1"> <span class="close">&#215;</span>
    <div class="loader">Loading...</div>
  </div>
</div>
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
<?php } ?>
<table class="table table-bordered table-striped" style=" float:left;">
<tr>
<td><b>Case Title:</b></d><td><?php echo $case_title; ?></td>
<td><b>Judicial Process Name:</b></d>
<td>
<?php foreach($judicials as $fld): 
  echo $this->public->get_judicial_name($fld->judicial_process_id);
   endforeach; ?>
</td>
</tr>
</table>
<div class="main-content">  
     <div class="panel panel-default" style="width:100%; float:left; padding:10px; margin-bottom:10px;" > 
    <form name="frm1" method="post" action="index.php/registration/invite" >
     <input type="hidden" name="meeting_type" value="2" >
     <input type="hidden" name="caseid" value="<?php echo $case_id; ?>" >
    <input type="hidden" name="juid" value="<?php echo $ju_id; ?>" >
     <input type="hidden" name="courtid" value="<?php echo $court_id; ?>" >
     <?php foreach($judicials as $fld): ?>
     <input type="hidden" name="date" value="<?php echo $fld->activity_date; ?>" >
     <input type="hidden" name="start" value="<?php echo $fld->activity_start_time; ?>" >
     <input type="hidden" name="end" value="<?php echo $fld->activity_end_time; ?>" >
     <?php endforeach; ?> 
     <table class="table table-bordered table-striped" style=" float:left;">
        <thead>
        <tr><td colspan ="7"><b><font color = "green">Judges</font></b></td></tr>
        	<tr>
                <th width="2%">Sl.No</th>
                <th width="20%">Name</th>
                <th width="15%">Live Stream Date</th>
                <th width="15%">Live Stream Start Time</th>
                <th width="15%">Live Stream End Time</th>
                <th width="30%">eMail</th>                
          </tr>
         </thead>
         <tbody>
         <?php $i=1; foreach($judicials as $fld): ?>
         	<tr>
             <td><?php echo $i; ?></td>
             <td><?php foreach($aJudges as $aj){ echo $name = $this->public->get_UserName($aj->judge_id); } ?></td>
             <td><?php echo $fld->activity_date; ?></td>
             <td><?php echo $fld->activity_start_time; ?></td>
             <td><?php echo $fld->activity_end_time; ?></td>
             <td><?php foreach($aJudges as $aj){ $email = $this->public->get_UserEmail($aj->judge_id); } 
             $istatus = $this->public->get_invite_status($case_id, $ju_id);
            if($email != ''){
              if($istatus != '1') 
                 {
              ?>
             <?php echo $email; ?>&nbsp;&nbsp;&nbsp;<input type="checkbox" value="<?php echo $email; ?>" name="emails[]" />
             <br />
           <?php 
                 } else { ?><font color ="red"> Invitation Sent </font> <?php }
          } ?>
             </td>
            </tr>
         <?php $i++; endforeach; ?>
         </tbody>
    </table>
  </div>
  <?php $lc = count($this->public->get_LawyerID_all($case_id)); 
  if($lc != '0') {
  ?>
  <div class="panel panel-default" style="width:100%; float:left; padding:10px; margin-bottom:10px;" > 
  <table class="table table-bordered table-striped" style=" float:left;">
        <thead>
        <tr><td colspan ="7"><b><font color = "green">Lawyers</font></b></td></tr>
        	<tr>
          <th width="2%">Sl.No</th>
                <th width="20%">Name</th>
                <th width="15%">Live Stream Date</th>
                <th width="15%">Live Stream Start Time</th>
                <th width="15%">Live Stream End Time</th>
                <th width="30%">eMail</th>
          </tr>
         </thead>
         <tbody>
         <?php
         $i=1; foreach($judicials as $fld): ?>
         	<tr>
             <td><?php echo $i; ?></td>
             <td><?php 
             $lawyerid = $this->public->get_LawyerID($case_id);
             echo $name = $this->public->get_LawyerName($lawyerid);
             ?></td>
             <td><?php echo $fld->activity_date; ?></td>
             <td><?php echo $fld->activity_start_time; ?></td>
              <td><?php echo $fld->activity_end_time; ?></td>
             <td><?php $email = $this->public->get_UserLawyerEmail($lawyerid);
             $istatus = $this->public->get_invite_status($case_id, $ju_id);
             if($email != '') {
              if($istatus != '1') 
              {
             ?>
             <?php echo $email; ?>&nbsp;&nbsp;&nbsp;<input type="checkbox" value="<?php echo $email; ?>" name="emails[]" /><br />
            <?php 
            } else { ?><font color ="red"> Invitation Sent </font> <?php }
            } ?>
             </td>
             
            </tr>
         <?php $i++; endforeach; ?>
         </tbody>
    </table>
  </div>
  <?php } ?>
  <div class="panel panel-default" style="width:100%; float:left; padding:10px; margin-bottom:10px;" > 
  <table class="table table-bordered table-striped" style=" float:left;">
        <thead>
        <tr><td colspan ="7"><b><font color = "green">Litigants</font></b></td></tr>
        	<tr>
                <th width="2%">Sl.No</th>
                <th width="20%">Name</th>
                <th width="15%">Live Stream Date</th>
                <th width="15%">Live Stream Start Time</th>
                <th width="15%">Live Stream End Time</th>
                <th width="30%">eMail</th>  
          </tr>
         </thead>
         <tbody>
         <?php 
         $i=1; foreach($judicials as $fld): ?>
         	<tr>
             <td><?php echo $i; ?></td>
             <td><?php 
             $latigants = $this->public->get_LatigantID($case_id);
             $l = '1'; foreach($latigants as $lats){
             echo $l; echo ".";echo $this->public->get_LitigantName($lats->litigant);echo "<br>";
             $l++;}
             ?></td>
             <td><?php echo $fld->activity_date; ?></td>
             <td><?php echo $fld->activity_start_time; ?></td>
              <td><?php echo $fld->activity_end_time; ?></td>
             <td><?php 
                 $m = '1'; foreach($latigants as $lats){ 
                  echo $m; echo "."; $email = $this->public->get_UserLatigantEmail($lats->litigant); 
                  $istatus = $this->public->get_invite_status($case_id, $ju_id);

                  if($email != ''){
                      if($istatus != '1') 
                        {
                         ?>
                          <?php   
                           echo $email; ?>&nbsp;&nbsp;&nbsp;                   
                           <input type="checkbox" value="<?php echo $email; ?>" name="emails[]" /><br />
                           <?php  }
                         else { ?><font color ="red"> Invitation Sent </font> <?php } 
                 } 
                 else 
                 { ?>
                   <input type="email" name="emails[]" value="" placeholder="Enter Email"><br />
               <?php  }
             $m++;}
              
             ?></td>
            </tr>
         <?php $i++; endforeach; ?>
         </tbody>
    </table>
   </div>
    <div class="form-group">
      <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href=""index.php/registration/case_activity_elat/<?php echo $case_id; ?> style="color: white;">Cancel</a></button>
   </div>
</form>
</div>

