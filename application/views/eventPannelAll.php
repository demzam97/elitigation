<?php
$year=$_GET['y'];
$month=$_GET['m'];
$day=$_GET['d'];
$crtid=$_GET['c'];
//$courtid=$_GET['c'];
if($month<10)
{
	$month="0".$month;
}
if($day<10)
{
	$day="0".$day;
}
?>	

 <h3 class="ctitle">Hearings On &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F60; font-weight:bold; font-size:13px; font-family:Arial, Helvetica, sans-serif;"><?php echo $day." ".$this->calcase->getMonth($month)." ".$year?></span></h3>

<br />
<?php
$events=array();
$events=$this->calcase->getEventOnAll($year,$month,$day,$crtid);

foreach($events as $event)
{
?>
<div class='lst'>
                         <a href="<?php echo site_url('casecal/deleteEvent?id='.$event->id."&y=".$year."&m=".$month); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><img src="<?php echo base_url();?>images/close.png" style="float:right; margin:-5px;" /></a>
                          <strong><?php echo $event->title;?></strong>
                          <hr style="border-top:1px solid #ddd;"
                 
                          <p> <?php echo $event->event;?></p>
                          <span style="font-size:12px; color:#666; font-weight:bold;">Judges: </span>
                          <?php $judges=$this->calcase->getEventJudges($event->id);
						  
						  foreach($judges as $judge)
						  {
							  echo $this->public->get_UserName($judge->Judge_id).", ";
						  }?>
                          <span id="etime">Time: <?php echo $event->event_time;?></span>
                        </div>
<?php
}
?>
<?php
$judges=array();
$judges=$this->calcase->getJudges();
?>
<div class="showPop" id="myfrm" style="display:none;">
<button id="judgeAdd" onclick="appendJudge()">Add Judge</button><br>
<img src="<?php echo base_url();?>images/close.png" style=" float:right; cursor:pointer; margin:-25px 0 0 -25px;" onClick="closeBox();">
 <form method="post" action="<?php echo site_url('casecal/addCalEvent');?>">
 <input type="hidden" name="edate" value="<?php echo date('y-m-d', strtotime($year."-".$month."-".$day));?>" />

   
   
   <label> Judge: </label>
   <select name="judge_id[]">
   <?php
   foreach($judges as $j)
   {
	   ?>
       <option value="<?php echo $j->id;?>"><?php echo $j->judge_name;?></option>
<?php 
   }
   ?>
   </select>   
   
   <div id='judgeBox'>
   </div>
    
   
   <br />
   <label> Event Title: </label><input type="text" required name="title"><br>
   <label> Description: </label><br /><textarea name="event"></textarea><br>
   <label> Time: </label>
   
   <input type="number" name="hour" style="width:50px; padding:5px;" />
  
<input type="number" name="min" style="width:50px; padding:5px;"  />
   <select name="period">
   <option value="AM">AM</option>
   <option value="PM">PM</option>
   </select><br /><br />
<input type="submit" value="ADD" class="btn btn-primary" />    <input type="button" value="Cancel" onClick="closeBox();" class="btn btn-danger"/>
  </form>
</div>

 <div id='judgeBoxNew' style="display:none;" >
 <div class="judgeAddedBox" style="width:100%;">
   <label>Judge:</label>
   <select name="judge_id[]">
   <?php
   foreach($judges as $j)
   {
	   ?>
       <option value="<?php echo $j->id;?>"><?php echo $j->judge_name;?></option>
<?php 
   }
   ?>
   </select>
   <a href="#" class="remove_this">Remove</a>
   </div>
   </div>


