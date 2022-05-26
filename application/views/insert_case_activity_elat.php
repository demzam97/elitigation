<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script>
    $(function() {
	    $( "#dialog:ui-dialog" ).dialog( "destroy" );
 
        $( "#dialog-confirm" ).dialog({
            autoOpen: false,
            resizable: false,
            height:170,
            modal: true,
            hide: 'Slide',
            buttons: {
                "Delete": function() {
                    var del_id = {id : $("#del_id").val()};
					  	$.ajax({
                        type: "POST",
                        url : "<?php echo site_url('registration/delete_temp_LitiID')?>",
                        data: del_id,
                        success: function(msg){
                            $('#show').html(msg);
                            $('#dialog-confirm' ).dialog( "close" );
                            //$( ".selector" ).dialog( "option", "hide", 'slide' );
                        }
                    });
 
                    },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
	
        $( "#form_input" ).dialog({
            autoOpen: false,
            height: 280,
            width: 440,
            modal: false,
            hide: 'Slide',
            buttons: {
                "Add": function() {
                    var form_data = {
						liti_id: $('#liti_id').val(),
						liti_type: $('#liti_type').val(),
                        ajax:1
                    };
 
                    if($('#liti_id').val() == ""){
					$('#search_CID').focus();
 					$('#search_CID').style.borderColor="#cc0000";
					return false;
					}
					
					if($('#search_CID').val() == ""){
					$('#search_CID').focus();
 					$('#search_CID').style.borderColor="#cc0000";
					return false;
					}
					
					if($('#liti_type').val() == 0){
					$('#liti_type').focus();
 					$('#liti_type').style.borderColor="#cc0000";
					return false;
					}
                  $.ajax({
                    url : "<?php echo site_url('registration/insert_liti_id')?>",
                    type : 'POST',
                    data : form_data,
                    success: function(msg){
					$('#show').html(msg),
                    $('#liti_id').val(''),
					$('#liti_type').val(''),
                    
                    $('#liti_id').attr("disabled",false);
					$('#liti_type').attr("disabled",false);
                    $( '#form_input' ).dialog( "close" )
					
                    }
					
                  });
  				  
            },
                Cancel: function() {
                    $('#liti_id').val(''),
					$('#liti_type').val(''),
                    $( this ).dialog( "close" );
                }
            },
            close: function() {
                $('#liti_id').val('');
				$('#liti_type').val('');
              
            }
        });
 
    $( "#create-daily" )
            .button()
            .click(function() {
                $( "#form_input" ).dialog( "open" );
            });
    });
	
	$(".delbutton").live("click",function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        $('#del_id').val(del_id);
        $( "#dialog-confirm" ).dialog( "open" );
 
        return false;
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
    </script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Insert Case Activity</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">  
<form method="post" action="index.php/registration/add_caseActivity_elat" name="frm1" onsubmit="return validate()"> 

 <div class="panel panel-default">
 <table class="table table-bordered table-striped">
 	
    <tr>
		<td width="25%"><strong>Judicial Process:</strong></td>
		<td colspan="2">
        <select class="form-control" name="jProcess">
        <option value="0" selected>Select One</option>
        <?php foreach($judicial_process as $j_process): ?>
        <option value="<?php echo $j_process->id; ?>"><?php echo $j_process->process_name; ?></option>
        <?php endforeach; ?>
        </select>
        <input type="hidden" name="case" value="<?php echo $case_id; ?>" />
        </td>
		<td width="10%"><strong>Activity Date:</strong></td>
		<td colspan="3">
        <input type="date" name="act_date" min="<?php $date = date("Y/m/d"); echo date('Y-m-d', strtotime($date. ' - 10 days'));?>" onkeydown="return false" style=" height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" required />
        Start Time<input type="time" id="appt" name="start_act_time" min="05:00" max="21:00" placeholder="Time" style=" height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" required />End Time<input type="time" id="appt" name="end_act_time" min="05:00" max="21:00" placeholder="Time" style=" height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" required />        </td>	</tr>
    </table>
</div>
 <div class="panel panel-default">
    <table class="table table-bordered table-striped" id="table2">
<tr>
<td width="10%"><strong>Forms Used: </strong></td>
<td width="35%">
<select class="form-control" name="form[]" >
<option value="0" disabled selected>Select One</option>
<?php foreach($forms as $form):?>
<option value="<?php echo $form->id; ?>"><?php echo $form->form_name; ?></option>
<?php endforeach; ?>
</select>

</td>

 <td width='25%'>
              <strong>  Form Date:</strong>
       </td>
      <td colspan="35%">
       <input type="date" name="formdate" min="<?php $date = date("Y/m/d"); echo date('Y-m-d', strtotime($date. ' - 10 days'));?>" onkeydown="return false" style="height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                </td>
 <td width='10%'>
              <strong>Detail:</strong>
       </td>
       <td width="35%">
       <input type="text" name="form_issued[]" class="form-control" style="width:100%; float:right;" />
                
                </td>
 <td width="10%">
                <div style="float:right; "><a id="add_rtio_type1" class="btn btn-default">Add More</a></div>
                </td>
             </tr>
             
         </table>
        
       
    </div>
    <div id="rtio_type1">

	</div>
    <div id="form_one" style="display:none;">  
      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="25%"><strong>Amount:</strong></td>
        	<td>
            <input type="text" name="amount" class="form-control" style="width:40%">
            </td> 
      </tr> 
      <tr>
        	<td width="25%"><strong>Receipt No:</strong></td>
        	<td>
            <input type="text" name="receipt_no" class="form-control" style="width:40%">
            </td>
      </tr>
      <tr>
        	<td width="25%"><strong>Surety:</strong></td>
        	<td>
            <input type="text" name="surety" class="form-control" style="width:40%">
            </td>
      </tr> 
        
    </table>
    
    </div>

    <div class="panel panel-default" style="float:left; width:100%; padding:10px;">
   <div style="width:49%; float:left;">
    <table class="table table-bordered table-striped">
    <tr>
		<td colspan="3"><strong>Parties Present:</strong></td>
	</tr>
    <tr>
     <?php 
	 foreach($litigants as $lits)
	 {
        if($this->public->checkLit($lits->litigant)=='yes')
        {?>
            <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="lits[]" /></td><td><?php echo $this->public->get_OrgName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
		}
        else
        {?>
           <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="lits[]" /></td><td><?php echo $this->public->get_ApplicantName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
        }

	 }?>
    </tr>
    
   </table>
   </div>
   <div style="width:49%; float:right;">
    <table class="table table-bordered table-striped">
    <tr>
		<td colspan="3"><strong>Select to Notify the Parties about Judicial Form upload.</strong></td>
	</tr>
    <tr>
     <?php 
	 foreach($litigants as $lits)
	 {
        
        if($this->public->checkLit($lits->litigant)=='yes')
        {?>
            <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="elits[]" /></td><td><?php echo $this->public->get_OrgName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
		}
        else
        {?>
           <tr><td><input type="checkbox" value="<?php echo $lits->id; ?>" name="elits[]" /></td><td><?php echo $this->public->get_ApplicantName($lits->litigant);?></td><td><?php echo $this->public->get_litigant_type_name($lits->litigant_type);?></td></tr>
        <?php
        }

	 }?>
    </tr>
    
   </table>
   </div>
   <div style="width:49%; float:right;">
         <table class="table table-bordered table-striped">
    
    </table>
    </div>
     
</div>

<div id="SubmitBox">
<input type="button" value="Cancel" class="btn btn-danger" onclick="history.go(-1)" style="float:right;" />
<input type="submit" value="Submit" class="btn btn-primary" style="float:right; margin-right:50px;" />
</div>
</form>


<div id="div_rtio_type1" style="display:none">
<table class="table table-bordered table-striped" id="table2">
<tr>
<td width="10%"><strong>Forms Used: </strong></td>
<td width="35%">
<select class="form-control" name="form[]" >
<option value="0" disabled selected>Select One</option>
<?php foreach($forms as $form):?>
<option value="<?php echo $form->id; ?>"><?php echo $form->form_name; ?></option>
<?php endforeach; ?>
</select>

</td>

 <td width='25%'>
              <strong>  Form Date:</strong>
       </td>
      <td colspan="2">
       <input type="Date" name="formdate" class="datepicker"  place holder="Date" min="<?php $date = date("Y/m/d"); echo date('Y-m-d', strtotime($date. ' - 10 days'));?>" onkeydown="return false" style="height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                </td>
 <td width='10%'>
              <strong>  Detail:</strong>
       </td>
       <td width="35%">
       <input type="text" name="form_issued[]" class="form-control" style="width:100%; float:right;" />
                
                </td>
 <td width="10%"><a href="#" class="remove_table1" style="float:left;">Remove</a></td>
</tr>

</table>
</div>

<div id="form_input" title="Insert/Edit Item">
      <table>
        <?php echo form_open('registration/insert_liti_id'); ?>
        <tr>
         <td><input class="input-xlarge form-control" placeholder="Search by CID / Name" id="search_CID" name="search_CID" type="text"></td>
         <td>&nbsp;&nbsp;<button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;<input type="hidden" name="CaID" id="CaID" value="<?php echo $case_id; ?>" /></td>
        </tr>
        <tr id="main-body">
        
        </tr>
      </table>
    </div>
<div id="dialog-confirm" title="Delete Item ?">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        <input type="hidden" value='' id="del_id" name="del_id">
        Are you sure?</p>
</div>

<script type="text/javascript">

$('document').ready(function(){

$('#add_rtio_type').click(function(e) {
 $('#rtio_type').append($('#div_rtio_type').html());
 return false;
})


$('#add_rtio_type1').click(function(e) {
 $('#rtio_type1').append($('#div_rtio_type1').html());
 return false;
})
		
$('.remove_table').live('click', function(){
 $(this).parents('#table1').remove();
 return false;
});	

$('.remove_table1').live('click', function(){
 $(this).parents('#table2').remove();
 return false;
});	

$('#search_button').click(search_litigantCID);
	 
	 function search_litigantCID()
	 {
	 	var val = $('#search_CID').val();
		var val1 = $('#CaID').val();
		//alert(val1);		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_lititgant_caseAct');?>",
			data: {"value":val, "value1":val1},
			
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#main-body').html(msg);	
										
				}
			});
	 }
	
});

</script>

<script type="text/javascript">
function validate(){
	$('#SubmitBox').css('display','none');
if(document.frm1.jProcess.value==0){
document.frm1.jProcess.focus();
document.frm1.jProcess.style.borderColor="#0099ff";
$('#SubmitBox').css('display','block');
return false;

}

if(document.frm1.act_date.value==""){
document.frm1.act_date.focus();
document.frm1.act_date.style.borderColor="#0099ff";
$('#SubmitBox').css('display','block');
return false;
}


}
function FormUsed( id )
    {
       if(id==12){
		document.getElementById( 'form_one' ).style.display ="block";
		}
         if(id!=12){
		document.getElementById( 'form_one' ).style.display ="none";
		}
    }
	

</script>

