<script type="text/javascript" src="css/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	
	$('.msg').click(function(e) {
			$(this).parents('.first').fadeOut();
        });
		
		 $('.close').click(function(e) {
			$(this).parents('.first').fadeOut();
      });
});

</script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Add Litigant</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
<?php if ($this->session->flashdata('asset_class')): ?>
 <div class="message first">
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span> <a class="close" id="close" style="cursor:pointer;">x</a></div>
 </div>

<?php endif; ?>

  <div class="search-well">
   <form class="form-inline" style="margin-top:0px;">
   <input class="input-xlarge form-control" placeholder="Search by CID." id="search_cid" name="search_cid" type="text">
   <button class="btn btn-default" type="button" id="search_button" ><i class="fa fa-search"></i> Go</button>
   </form>
  </div>
 <div id="main-tbody">
 
 </div>
 <br />
<form method="post" action="index.php/registration/add_new_litigant_CaseAct" id="frm1" name="frm1">
<table class="table table-bordered table-striped">
	<tbody>
		<tr>
			<td width="20%"><label>Litigant Type:</label></td>
			<td>
            <select name="litigant_type" id="litigant_type" class="form-control" style="width:40%">
            <option value="" selected>Select One</option>
            <?php foreach($litigant_types as $lit_type): ?>
            <option value="<?php echo $lit_type->id; ?>"><?php echo $lit_type->litigant_type; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="hidden" value="<?php echo $case_id; ?>" name="CaID" />
            <div class="ErrMsg"></div>
            </td>
		</tr>
        <tr>
			<td width="20%"><label>Name (Individual or Organization):</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="Name" id="Name" />
            <div class="ErrMsg"></div>
            </td>
		</tr>
        <tr>
			<td width="20%"><label>Nationality:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="Nationality" />
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>CID:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="cid" id="cid" />
            <div class="ErrMsg"></div>
            </td>
		</tr>
        
         <tr>
			<td width="20%"><label>Occupation:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="occupation" />
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Gender:</label></td>
			<td>
            <select class="form-control" style="width:40%" name="gender">
            <option value="0">Select One</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
            </select>
            </td>
		</tr>
        
         <tr>
			<td width="20%"><label>DOB:</label></td>
			<td>
           <input type="text" id="start_dt" name="dob" class='datepicker' style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Age:</label></td>
			<td>
            <select class="form-control" style="width:40%" name="age">
            <option value="0">Select One</option>
            <?php for($i=1; $i<=100; $i++) { ?>
            <option><?php echo $i; ?></option>
            <?php } ?>
            </select>
            </td>
		</tr>
        
         <tr>
			<td width="20%"><label>House No:</label></td>
			<td>
           <input type="text" name="house_no" class='form-control' style="width:40%;" />
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Tharm No:</label></td>
			<td>
           <input type="text" name="tharm_no" class='form-control' style="width:40%;" />
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Dzongkhag:</label></td>
			<td>
            <select class="form-control" style="width:40%" name="dzongkhag" onChange="getGewog(this.value)">
            <option value="0">Select One</option>
            <?php foreach($dzongkhag as $dzo): ?>
            <option value="<?php echo $dzo->DzongkhagID; ?>"><?php echo $dzo->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Dungkhag:</label></td>
			<td>
            <select class="form-control" style="width:40%" name="dungkhag">
            <option value="0">Select One</option>
            <?php foreach($dungkhag as $dung): ?>
            <option value="<?php echo $dung->DungkhagID; ?>"><?php echo $dung->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
		</tr>
        
         <tr>
			<td width="20%"><label>Gewog:</label></td>
			<td>
            <div id="Div_Gewog">
            <select class="form-control" style="width:40%" name="gewog">
            <option value="0">Select Dzongkhag First</option>
            </select>
            </div>
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Village:</label></td>
			<td>
            <div id="Div_Village">
            <select class="form-control" style="width:40%" name="village">
            <option value="0">Select Gewog First</option>
            </select>
            </div>
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Father's Name:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="fatherName">
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Phone No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="phone">
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Email:</label></td>
			<td>
            <input type="text" class="form-control" style="width:40%" name="email">
            </td>
		</tr>
        
        <tr>
			<td width="20%"><label>Contact Address:</label></td>
			<td>
            <textarea class="form-control" style="width:40%" name="address"></textarea>
            </td>
		</tr>
        
	</tbody>
</table>
<input type="submit" value="Save" class="btn btn-primary">
<a href="index.php/registration" class="btn btn-danger">Cancel</a>
</form>


</div>


<script type="text/javascript">
 $('document').ready(function(){
 
  $('#search_button').click(search_litigant);
	 
	 function search_litigant()
	 {
	 	var val = $('#search_cid').val();		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_litigant');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#main-tbody').html(msg);	
										
				}
			});
	 }
	 
$('#litigant_type').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});
	
$('#Name').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

$('#cid').focus(function(){
		$(this).parent().find('.ErrMsg').html('');
	});

$('#frm1').submit(function(){
if($('#litigant_type').val() == ''){
			$('#litigant_type').parent().find('.ErrMsg').html('<font color=red>Litigant Type cannot be empty</font>');
			return false;
		}
		
if($('#Name').val() == ''){
			$('#Name').parent().find('.ErrMsg').html('<font color=red>Litigant Name cannot be empty</font>');
			return false;
		}
		
if($('#cid').val() == ''){
			$('#cid').parent().find('.ErrMsg').html('<font color=red>CID cannot be empty</font>');
			return false;
		}
		
		
});

  });
</script>