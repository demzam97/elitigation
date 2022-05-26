<script type="text/javascript" src="css/jquery.js"></script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Collecton</h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
			<li class="active">Collections</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">
 <form name="frm1" id="frm1" method="post" action="index.php/registration/update_collection" > 
       <table class="table table-bordered table-striped">
       <tr>
       <td width="25%"><strong>Collection Type:</strong></td>
       <td>
       <select name="coll_type" id="coll_type" class="form-control" style="width:40%;">
       <option value="0">Select One</option>
       <option <?php if($collection_type=="Court Fee") { ?> selected <?php } ?>>Court Fee</option>
       <option <?php if($collection_type=="Recovery") { ?> selected <?php } ?>>Recovery</option>
       <option <?php if($collection_type=="Others") { ?> selected <?php } ?>>Others</option>
       </select>
       <div class="ErrMsg"></div>
       <input type="hidden" name="id" value="<?php echo $id; ?>" />
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Case Number /Judgement Number /Appeal Number:</strong></td>
       <td>
       <input type="text" name="case_no" id="case_no" class="form-control" style="width:40%;" value="<?php echo $case_no; ?>" >
       <div class="ErrMsg"></div>
       </td>
       </tr>
       <tr>
       <td width="25%"><strong>Litigant(Payer):</strong></td>
       <td>
       <select name="litigant" id="litigant" class="form-control" style="width:40%;">
       <option value="0" disabled selected>Select One</option>
       <?php foreach($litigants as $litigant):?>
       <option value="<?php echo $litigant->id; ?>" <?php if($payer==$litigant->id) { ?> selected <?php } ?>><?php echo $litigant->litigant_name; ?></option>
        <?php endforeach; ?>
       </select>
       <div class="ErrMsg"></div>
       </td>
       </tr>
       
       <tr>
       <td width="25%"><strong>Amount:</strong></td>
       <td>
       <input type="text" name="amount" id="amount" class="form-control" style="width:40%;" value="<?php echo $amount; ?>">
       <div class="ErrMsg"></div>
       </td>
       </tr>
       
       <tr>
       <td width="25%"><strong>Receipt Number:</strong></td>
       <td>
       <input type="text" name="receipt_no" id="receipt_no" class="form-control" style="width:40%;" value="<?php echo $receipt_no; ?>">
       <div class="ErrMsg"></div>
       </td>
       </tr>
       
        <tr>
       <td width="25%"><strong>Receipt Date:</strong></td>
       <td>
       <input type="text" name="receipt_date" id="start_dt2" class="datepicker" style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" value="<?php echo $receipt_date; ?>"/>
       <div class="ErrMsg"></div>
       </td>
       </tr>
       </table>
        <div>
           <input type="submit" value="Update" class="btn btn-primary">
           <a href="index.php/registration" class="btn btn-danger">Cancel</a>
        </div>

</form>

 </div>
 
<script type="text/javascript">
$('document').ready(function(){

$('#coll_type').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#case_no').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

$('#litigant').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#amount').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#receipt_no').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

$('#start_dt2').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

	
$('#frm1').submit(function(){
if($('#coll_type').val() == 0){
			$('#coll_type').parent().find('.ErrMsg').html('<font color=red>Collection Type cannot be empty</font>');
			return false;
		}
		
if($('#case_no').val() == ''){
			$('#case_no').parent().find('.ErrMsg').html('<font color=red>Case Number cannot be empty</font>');
			return false;
		}
		
if($('#litigant').val() == ''){
			$('#litigant').parent().find('.ErrMsg').html('<font color=red>Litigant(Payer) cannot be empty</font>');
			return false;
		}
		
if($('#amount').val() == ''){
			$('#amount').parent().find('.ErrMsg').html('<font color=red>Amount cannot be empty</font>');
			return false;
		}
		
if($('#receipt_no').val() == ''){
			$('#amount').parent().find('.ErrMsg').html('<font color=red>Receipt Number cannot be empty</font>');
			return false;
		}
		
if($('#start_dt2').val() == ''){
			$('#start_dt2').parent().find('.ErrMsg').html('<font color=red>Receipt Date cannot be empty</font>');
			return false;
		}
		
		
});
		
});
</script>