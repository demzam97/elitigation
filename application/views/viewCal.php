
<script src="<?php echo base_url ();?>scripts/jquery-1.11.3.min.js"></script>
<script>
$(document).ready(function(){
    $(".day_listing").click(function(){
		$('.day_listing').removeClass('selected');
		$(this).addClass('selected');
		$("#addEventDetails").show();
		var today=$('.selected').text();		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			
			document.getElementById("addEventDetails").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","index.php/casecal/showCalPannel?&d="+today+"&y="+<?php echo $year; ?>+"&m="+<?php echo $month; ?>,true);
		xmlhttp.send();

        
		
    });
});
</script>

<script>
$(document).ready(function(){
    $("#addEvent").click(function(){
		$('#myfrm').removeClass('hidePop');
		$('#myfrm').addClass('showPop');
			
    });
	
	  $("#judgeAdd").click(function(e){
		  alert("sdsdS");
		  e.preventDefault();
		$('#judgeBox').append($('#judgeBoxNew').html());
					
    });
	
	 $('.remove_this').click(function(e){
		 e.preventDefault();
		 $(this).parents('.judgeAddedBox').remove();
		 return false;
	});	

	
});
</script>

<style>
#c_data
{
	font-size:11px;
	margin-left:5px;
	width:100%;
	line-height:18px;
	font-family:Arial, Helvetica, sans-serif;
	text-align:center;
	color:#E33F0F;
}
.calendar {
    font-family: Arial, Verdana, Sans-serif;
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
}

.calendar tbody tr:first-child th {
    color: #fff;
    margin:10px;
	padding:10px;
	text-align:center;
	background:#09C;
		border:3px #39C solid;
	font-size:16px;
	
}
.calendar .selected
{
	background:#690;
	color:#fff;
}
.calendar tbody tr:first-child th a {
    color: #fff;
    margin:10px;
	background:#09C;
	
}

.day_header {
    font-weight: normal;
    text-align: center;
    color: #09C;
    font-size: 12px;
	font-weight:bold;
	padding:5px;
	border:1px #39C solid;
}


.calendar td {
    width: 14%; /* Force all cells to be about the same width regardless of content */
    border:1px solid #39C;
    height: 50px;
    vertical-align: top;
    font-size: 12px;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-weight:bold;
    padding: 0;
}

.calendar td:hover {
    background: #FDE3B3;
}

.day_listing {
    display: block;
    text-align: right;
    font-size: 12px;
	background:#fff;
    color: #2C2C2C;
	cursor:pointer;
    padding: 10px;
}

div.today {
    background: #3CF;
    height: 100%;
} 

</style>
<div class="content" >
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Event Calander</h1>
		<ul class="breadcrumb">
			<li><a href="index.php/registration/user_dashboard">Home</a> </li>
			<li class="active">Event Calander</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">   

<?php /*?>User Id: <?php echo $this->session->userdata('user_id');?><br />
user_name: <?php echo $this->session->userdata('user_name');?><br />
user_type: <?php echo $this->session->userdata('user_type');?><br />
court_id: <?php echo $this->session->userdata('court_id');?><br />
court_type: <?php echo $this->session->userdata('court_type');?><br />
bench: <?php echo $this->session->userdata('bench');?><br />
dzongkhag: <?php echo $this->session->userdata('dzongkhag');?><br />
dungkhag: <?php echo $this->session->userdata('dungkhag');?><br /><?php */?>

<table style="width:100%;">
<tr valign="top">
<td style="width:50%">
    <div style="width:100%; display:block; position:relative;">
                
                
                <?php
                 echo  $calendar;
                ?>
                
                
        </div>
</td>
<td>
        <div style="width:100%; display:block; position:relative;">
                
               <div id="addEventDetails" style="width:80%; margin:10px 10% 0px 10%;">
                          
               <h3 class="ctitle">Hearings On &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#F60; font-weight:bold; font-size:13px; font-family:Arial, Helvetica, sans-serif;"><?php echo $this->calcase->getMonth($month)." ".$year?></span></h3>
             <hr/>
              <?php foreach($elists as $list)
						{
						?>
						<div class='lst'>
                         <a href="<?php echo site_url('casecal/deleteEvent?id='.$list->id."&y=".$year."&m=".$month); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><img src="<?php echo base_url();?>images/close.png" style="float:right; margin:-5px;" /></a>
                          <strong><?php echo $list->title;?></strong>
                          <hr style="border-top:1px solid #ddd;"
                 
                          <p> <?php echo $list->event;?></p>
                          <span style="font-size:12px; color:#666; font-weight:bold;">Judges: </span>
                          <?php $judges=$this->calcase->getEventJudges($list->id);
						  
						  foreach($judges as $judge)
						  {
							  echo $this->public->get_UserName($judge->Judge_id).", ";
						  }?>
                          <span id="etime">Time: <?php echo $list->event_time;?></span>
                        </div>
						<?php
						}
						?>
               </div>
         </div>
         </td>
         </tr>
         </table>
</div>
</div>

<script type="text/javascript">
function showBox()
{
	document.getElementById('myfrm').style.display='block';
}
function closeBox()
{
	document.getElementById('myfrm').style.display='none';
}
function appendJudge()
{
	$('#judgeBox').append($('#judgeBoxNew').html());
}

	</script>
<style>
.hidePop
{
	display:none;
}
.showPop
{
	display:block;
	position:fixed;
	left:35%;
	top:100px;
	padding:30px 5px 30px 30px;
	border:1px solid #ddd;
	border-radius:3px;
	width:500px;
	max-height:400px;
	height:auto;
	overflow-y:scroll;
	background:#fff;
	box-shadow:0px 1px 3px #8B8B8B;
}
.showPop label
{
	width:100px;
	line-height:20px;
	font-size:12px;
}

.showPop input[type="text"]
{
	margin-bottom:20px;
	min-width:280px;
}
.showPop input[type="submit"], input[type="button"]
{
	margin-bottom:20px;
	max-width:100px !important;
	float:right;
	margin-right:20px;
	background:#1BAFDA;
	border:1px solid #09C;
	padding:5px;
	margin-top:-10px;
	font-size:10px;
}
.showPop textarea
{
	margin-bottom:20px;

	height:100px;
	min-width:280px;
	margin-left:100px;
}

.lst
{
	width:100%; 
	border: 1px solid #ddd; 
	line-height:20px;
	font-size:12px;
	color:#666;
	padding:10px; 
	margin-bottom:10px;
	box-shadow:0px 1px 1px #ccc;
	background:#fff;	
}
.lst strong
{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	font-weight:bold;
	color:#069;
}
.lst p
{
	line-height:14px;
}
#etime
{
	text-align:right;
	display:block;
	font-family:"Times New Roman", Times, serif;
	color:#E98312;
	font-size:11px;
}
.ctitle
{
	font-family:"Times New Roman", Times, serif;
	font-family:14px;
	color:#1B75B8;
}
</style>




