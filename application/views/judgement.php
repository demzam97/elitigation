<link href="<?php echo base_url();?>BeatPicker/css/BeatPicker.min.css" rel="stylesheet">
<script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<style>
.beatpicker-clear
{
	display:none;
}


</style>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Judgment</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">  
<form method="post" action="index.php/registration/add_judgement" id="frm1" name="frm1"  enctype="multipart/form-data"> 

	<table class="table table-bordered table-striped">
    
     <tr>
		<td width="15%"><strong>Judgment Type:</strong></td>
		<td width="30%"> 
        <select class="form-control" style="width:80%;" name="judgement_type" id="judgement_type">
        <option value="">Select One</option>
        <?php foreach($judgement as $jud){ ?>
        <option value="<?php echo $jud->id; ?>"><?php echo $jud->judgement_type; ?></option>
        <?php } ?>
        </select>
        <input type="hidden" name="case_id" value="<?php echo $case_id; ?>"  />
        <div class="ErrMsg"></div>
        </td>

		<td width="15%"><strong>Judgment Number:</strong></td>
		<td width="30%">

    <input type="text" name="judgement_no" id="judgement_no" style="width:80%;" class='form-control' value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" />
    <!--    <div id="showExistJudg"</div> -->
        </td>
	</tr>
    
     <tr>
		<td><strong>Judgment Date:</strong></td>
		<td >
         <input type="text" name="judgement_date" id="start_dt" name="judgement_date" class="datepicker" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />

       <!-- <input type="text" placeholder="dd-mm-yyyy" name="judgement_date" id="judgement_date" data-beatpicker="true"  style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" /> -->
        
        <div class="ErrMsg"></div>
        </td>
		<td><strong>Disposal Type:</strong></td>
		<td>
        <select class="form-control" style="width:80%;" name="disposal" id="disposal">
        <option value="" selected>Select One</option>
        <?php foreach($disposals as $disp):?>
        <option value="<?php echo $disp->id; ?>"><?php echo $disp->disposal_type; ?></option>
        <?php endforeach ?>
        </select>
        </td>
	</tr>
    <tr>
		
        
        <td><strong>Act Name:</strong></td>
		<td>
        <select class="form-control" style="width:80%;" name="act_name[]">
        <option value="" selected>Select One</option>
        <?php foreach($act_name as $act):?>
        <option value="<?php echo $act->id; ?>"><?php echo $act->act_name; ?></option>
        <?php endforeach ?>
        </select>
        </td>
         
         <td><strong>Article/Chapter:</strong></td>
	 <td>   <input type="text" class="form-control" name="article[]" />
     </td>
		
	</tr>
    
    
    
    <tr>
	
</tr>
<tr>
	<td ><strong>Section:</strong></td>
	 <td>   <input type="text" class="form-control" name="section[]" />
     </td>

	<td ><strong>Subsection:</strong></td>
	 <td>   <input type="text" class="form-control" name="subsection[]" />
     </td>

</tr>
<tr>
<td colspan="2"><strong>Add More Act,Artcle, Section, Sub-Section :</strong> 
<a href="#" id="add_rtio_act" class="btn btn-default pull-right">Add More</a>
</td>

<td><strong>Delivered By:</strong></td>
		<td>
        <select class="form-control" style="width:70%; float:left;" name="signed_by[]">
        <option value="0" selected>Select One</option>
        <?php foreach($users as $usr):?>
        <option value="<?php echo $usr->id; ?>"><?php echo $usr->judge_name; ?></option>
        <?php endforeach ?>
        </select>
        
        <a href="#" id="add_rtio_type" class="btn btn-default pull-right">Add More</a>
        </td>
        
</tr>


    </table>
   <div style="width:100%; float:left;">
           <div style="max-width:50%; min-width:50%; float:right;"> 
                    <div id="rtio_type">
                   </div>
           </div>
           
           <div style="max-width:50%; min-width:50%; float:left;"> 
                    <div id="act_type">
              
                   </div>
           </div>
           
    </div>
   
    <table class="table table-bordered table-striped">
    
     <tr>
		<td width="15%"><strong>Judgment Brief:</strong></td>
		<td width="30%">
        <textarea name="judgement_brief" class="form-control" style="width:300px;"  placeholder="Optional"></textarea>
        </td>
        
	
		<td width="15%"><strong>Upload Judgment:</strong></td>
		<td>
         <input type="file" name="judgement_upload" id="judgement_upload" class='form-control' style="width:80%;" />
       <span style="color:#F00; font-size:11px;">Upload Limit: 50MB</span>
         <div class="ErrMsg"></div>
        </td>
	</tr>
   
    <tr>
		<td colspan="4" align="center"><strong>Conviction</strong>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="sentenced" onClick="showhidediv(this);" value="1">&nbsp;&nbsp;<strong>Yes</strong>
      <?php $n=1; ?>     
       
       </td>
	</tr>
    
    </table>
    
    <div id="one" style="display:none; padding:10px; border:1px solid #F90; margin-bottom:10px">
    
    
<script>
function SentenceType<?php echo $n;?>( id )
    {
        if(id==6){
			
			$( "ul.level-2" ).children().css( "background-color", "red" );
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==7){
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==10){
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==9){
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="none";
		}
		if(id==8){
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="none";
		}
		
    }
    </script>
    <table class="table table-bordered table-striped" style="border:1px solid #F90;">
        <tr>
        	<td width="15%"><strong>Sentence Type:</strong></td>
        	<td>
            <select class="form-control" style="width:40%;" name="sentence_type[]" onchange="SentenceType<?php echo $n;?>(this.value)">
            <option value="0" selected>Select One</option>
            <?php foreach($sentences as $sent):?>
            <option value="<?php echo $sent->id; ?>"><?php echo $sent->sentence_type; ?></option>
            <?php endforeach ?>
            </select>
            </td>
        </tr>
      </table> 
       
     <table class="table table-bordered table-striped">
     <tr>
     <td>
     <strong>Select Litigant for sentance :</strong>
     </td>
     <td>
     <?php
	   $Lits=$this->public->getAllCaseLitigant($case_id); 
	   if(empty($Lits))
           {
               echo "<tr> <td>No Litigant Added!</td></tr>";
           }
           else
           {?>
           
           <select name="litagent[]" class="form-control" style="width:400px;">
           <?php
                   foreach($Lits as $lit)
                   {
					   if($this->public->checkLit($lit->litigant)=='yes')
								  {
									  
									  		   	
										 echo "<option value='".$lit->id."'>";
										 echo $this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span>";
										 echo "</option>";
									  
								  }
								  else
								  {
									  
									  		   	
										echo "<option value='".$lit->litigant."'>";
										 echo $this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span>";
										  echo "</option>";
									  
								  }
								  
                   }
           }
	 ?>
     </select>
     </td>
     </tr>
     </table>

    
     <div id="sentence_one<?php echo $n; ?>" style="display:none;"> 

      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="15%"><strong>Year:</strong></td>
        	<td>
            <select name="year[]" id="year" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($j=1;$j<=100; $j++) { ?>
            <option><?php echo $j; ?></option>
            <?php } ?>
            </select>
            </td> 
        	<td width="15%"><strong>Month:</strong></td>
        	<td>
            <select name="month[]" id="month" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($k=1;$k<=100; $k++) { ?>
            <option><?php echo $k; ?></option>
            <?php } ?>
            </select>
            </td>
      </tr> 
      
      <tr>
        	<td width="15%"><strong>Day:</strong></td>
        	<td>
            <select name="day[]" id="day" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($l=1;$l<=100; $l++) { ?>
            <option><?php echo $l; ?></option>
            <?php } ?>
            </select>
            </td>
        	<td ><strong>Sentence Start Date:</strong></td>
        	<td>
            <input type="text" class="start_dt"  name="start_date[]" placeholder="yyyy-mm-dd"  placeholder="Date"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
            </td>
        </tr>
        <tr>
                <td width="15%"><strong>Release Date:</strong></td>
                <td>
                <input type="text" class="release_date" name="release_date[]"  placeholder="yyyy-mm-dd" placeholder="dd-mm-yyyy"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                </td>
        </tr>
        
    </table>
    </div>
    
       
     <div id="sentence_two<?php echo $n;?>" style="display:none;">  
      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="15%"><strong>Amount:</strong></td>
        	<td>
            <input type="text" name="amount[]" class="form-control" style="width:40%">
            </td> 
      </tr> 
      <tr>
        	<td width="15%"><strong>Receipt No:</strong></td>
        	<td>
            <input type="text" name="receipt_no[]" class="form-control" style="width:40%">
            </td>
      </tr> 
        
    </table>
    
    </div><br />
    
     <input type="button" style="float:right;" value="Add" id="addSentance" class="btn btn-default pull-right" />
 </div>   

<div id="addSent<?php echo $n;?>">

</div>
<div id="displayBtns">
<input type="submit" class="btn btn-primary" value="Submit" onclick="this.style.display='none';"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel" onclick="history.go(-1);" />
</div>
</form>
</div>

<div id="div_rtio_type" style="display:none">
<table class="table table-bordered table-striped">
<tr>
	<td width="35%"><strong>Delivered By:</strong></td>
	 <td>   <select class="form-control"  name="signed_by[]">
        <option value="0" selected>Select One</option>
        <?php foreach($users as $usr):?>
        <option value="<?php echo $usr->id; ?>"><?php echo $usr->judge_name; ?></option>
        <?php endforeach ?>
        </select>
     </td>
	<td width="10%"><a href="#" class="remove_table" style="float:left;">Remove</a></td>
</tr>
</table>
</div>



<div id="div_rtio_act" style="display:none">
<table class="table table-bordered table-striped">
<tr>
	<td width="35%"><strong>Act Name:</strong></td>
	 <td>   <select class="form-control" style="width:80%;" name="act_name[]">
        <option value="0" selected>Select One</option>
        <?php foreach($act_name as $act):?>
        <option value="<?php echo $act->id; ?>"><?php echo $act->act_name; ?></option>
        <?php endforeach ?>
        </select>
     </td>
	<td width="10%"><a href="#" class="remove_table" style="float:left;">Remove</a></td>
</tr>
<tr>
	<td width="35%"><strong>Article/Chapter:</strong></td>
	 <td>   <input type="text" class="form-control" name="article[]" />
     </td>
</tr>
<tr>
	<td width="35%"><strong>Section:</strong></td>
	 <td>   <input type="text" class="form-control" name="section[]" />
     </td>
</tr>
<tr>
	<td width="35%"><strong>Subsection:</strong></td>
	 <td>   <input type="text" class="form-control" name="subsection[]" />
     </td>
</tr>
</table>


</div>

<script src="<?php echo base_url();?>BeatPicker/js/BeatPicker.min.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">


$(document).ready(function(){

$('#add_rtio_type').click(function(e) {
	$('#rtio_type').append($('#div_rtio_type').html());
	return false;
})


$('#add_rtio_act').click(function() {
	$('#act_type').append($('#div_rtio_act').html());
	return false;
})


$('.remove_table').live('click', function(){
	$(this).parents('table').remove();
	return false;
i});	

$('#judgement_type').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#judgement_no').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
$("#judgement_no").keyup(function() {
var judgement_no = $('#judgement_no').val();
        if(judgement_no=="")
        {
        $("#showExistJudg").html("");
        }
        else
        {
            $.ajax({
            type: "POST",
            url: "<?php echo site_url('registration/CheckExistJudgno');?>",
            data: "judgement_no="+ judgement_no ,
            success: function(html){
            $("#showExistJudg").html(html).show();
            }
            });
        }
});
$('#start_dt').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#judgement_upload').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

	
$('#frm1').submit(function(){
	
	$('#displayBtns').css('display','none');
	
if($('#judgement_type').val() == ''){
			$('#judgement_type').parent().find('.ErrMsg').html('<font color=red>Judgement Type cannot be empty</font>');
			$('#displayBtns').css('display','block');
			return false;
			
		}
		
if($('#judgement_no').val() == ''){
			alert('Judgement Number cannot be empty');
			$('#displayBtns').css('display','block');
			return false;
			
		}
		if($('#judgement_date').val() == ''){
			alert('Judgement Date cannot be empty');
			$('#displayBtns').css('display','block');
			return false;
			
		}

});
$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();

$('.datepicker').datepicker({
maxDate: new Date(currentYear, currentMonth, currentDate),
dateFormat: "dd-mm-yy"
});


});

$('#addSentance').click(function(e) {
	
	$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/addSentDetail');?>",
			data: {"n":<?php echo $n;?>,
			"case_id":<?php echo $case_id;?>},
			dataType : 'html',
			success: function(msg){	
						$('#addSent<?php echo $n;?>').html(msg);	
										
				}
			});
			

});

		
});


function showhidediv( rad )
    {
        var rads = document.getElementsByName( rad.name );
        document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
    }
	
function getReleaseDate() {
		var year=document.getElementById('year');
		var month=document.getElementById('month');
		var day=document.getElementById('day');
		
		var year= year*365;
		var month=month*30;
		var total_days=year+month+days;
		var startDate=document.getElementById('start_date');
    var datestrings = startDate.split("-"),
        date = new Date(+datestrings[2], datestrings[1]-1, +datestrings[0]);
    date.setDate(date.getDate() + total_days);
    document.getElementById('release_date')=[("0" + date.getDate()).slice(-2), ("0" + (date.getMonth()+1)).slice(-2), date.getFullYear()].join("-");
}
</script>
