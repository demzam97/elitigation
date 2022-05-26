
<link href="<?php echo base_url();?>BeatPicker/css/BeatPicker.min.css" rel="stylesheet">
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
<style>
  .btn
  {
	  line-height:20px;
	  border:1px solid #ddd;
	  padding-top:10px;
	  padding-left:15px;
	  padding-bottom:10px;
	  padding-right:15px;
	  color:#666;
	  background:#fff;
	  margin:0px;
	  font-size:14px;
  }
    .btn:hover
  {
	  line-height:20px;
	  border:1px solid #ddd;
	  padding-top:10px;
	  padding-left:15px;
	  padding-bottom:10px;
	  padding-right:15px;
	  color:#666;
	  background:#F4F4F4;
	  box-shadow:0px 0px 1px #ddd;
	  font-size:14px;
  }
  .active:focus
  {
	  border:0px;
  }
  #organ
  {
	  margin-left:-5px;
  }
    .active	
  {
	  line-height:20px;
	  border:1px solid #ddd;
	  padding-top:10px;
	  padding-left:15px;
	  padding-bottom:10px;
	  padding-right:15px;
	  color:#fff;
	  	  margin:0px;
	  background:#3DB51A;
	  font-size:14px;
  }
      .active2
  {
	  line-height:20px;
	  border:1px solid #ddd;
	  padding-top:10px;
	  padding-left:15px;
	  padding-bottom:10px;
	  padding-right:15px;
	  color:#fff;
	  	  margin:0px;
	  background:#F90;
	  font-size:14px;
  }
  .beatpicker-clearButton
  {
	  display:none;
  }
</style>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Add Litigant</h1>
         
	</div>
    <?php if ($this->session->flashdata('asset_class')): ?>
 <div class="message first">
      <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span> <a class="close" id="close" style="cursor:pointer;">x</a></div>
 </div>
<?php endif; ?>
<!--End Breadcrumb-->
<div style="width:100%; border:1px solid #ddd; padding:10px; float:left; margin-bottom:50px;">
<div style="width:50%; padding:10px; float:left;">
 <input type="button" value="Individual" id="indi" onclick="indSel()" class="btn"/> <input onclick="orgSel()" type="button" id="organ" value="Organization" onclick=""  class="btn"/><br />
 </div>
   <div class="search-well" style="float:right;">
   <form class="form-inline" style="margin-top:0px;">
   <input class="input-xlarge form-control" placeholder="Search by CID,Organization Code, License." style="width:400px;" id="search_cid" name="search_cid" type="text">
   <button class="btn btn-default" type="button" id="search_button" ><i class="fa fa-search"></i> Go</button>
   </form>
  </div>
</div>
<div class="main-content"> 



 <div id="main-tbody">
 
 </div>
 <br />


<div id="manBox" style="display:none;">
<h3>Enter Individual Detail</h3>
<hr />

<div style="width:100%; border:1px solid #ddd; padding:10px; float:left; margin-bottom:5px;">
<div style="width:50%; padding:10px; float:left;">
<div class="search-well" style="float:right;">
   <p>For Bhutanese Nationals:</p>
   <form class="form-inline" method="post" action="<?php echo site_url('registration/cid_lit_registration'); ?>" style="margin-top:0px;">
   <input class="input-xlarge form-control" placeholder="Enter CID Number to fetch Details." style="width:400px;" id="cid" name="cid" type="text">
   <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Fetch</button>
   </form> 
  </div>
 </div>
   </div>

<form method="post" action="index.php/registration/add_new_litigant" id="frm1" name="frm1">
<input type="hidden" value="1" name="point" />
<table class="table table-bordered table-striped">
	<tbody>
		
        <tr>
			<td width="15%"><label>Name :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="Name" id="Name" />
            <div class="ErrMsg"></div>
            </td>
			<td width="15%"><label>Nationality:</label></td>
			<td>
         
            <select name="Nationality" class="form-control" style="width:80%" >
            <option disabled="disabled" value="">Select One</option>
            <option value="Bhutanese">Bhutanese</option>
            <option value="Non Bhutanese">Non Bhutanese</option>
            </select>
            </td>
		</tr>
        
        <tr>
			<td ><label>CID / Passport / Work Permit No:</label><font color="red"><b>*</b></font></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cid" id="cid" required="required"/>
            <div class="ErrMsg"></div>
            </td>
			<td><label>Occupation:</label></td>
			<td>
            
             <select name="occupation" class="form-control" style="width:80%" >
            <option disabled="disabled" value="">Select One</option>
            <option value="Govt. Employee">Govt. Employee</option>
            <option value="Private">Private</option>
            <option value="Student">Student</option>
            <option value="Call Centers">Call Centers</option>
            <option value="Farmer">Farmer</option>
            <option value="Others">Others</option>
            </select>
            </td>
		</tr>
        
        <tr>
			<td><label>Gender:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="gender">
            <option value="0">Select One</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select>
            </td>
			<td><label>DOB:</label></td>
			<td>
           <input type="text"  name="dob"  placeholder="Date" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;"  data-beatpicker="true" />
            </td>
		</tr>
        
        <tr>
			<td><label>Age:</label><font color="red"><b>*</b></font></td>
			<td>
            <input type="number" class="form-control" style="width:80%" name="age" required="required">
           
            </td>
			<td width="20%"><label>House No:</label></td>
			<td>
           <input type="text" name="house_no" class='form-control' style="width:80%;" />
            </td>
		</tr>
        
        <tr>
			<td><label>Tharm No:</label></td>
			<td>
           <input type="text" name="tharm_no" class='form-control' style="width:80%;" />
            </td>
			<td><label>Dzongkhag:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="dzongkhag" onChange="getGewog(this.value)">
            <option value="0">Select One</option>
            <?php foreach($dzongkhag as $dzo): ?>
            <option value="<?php echo $dzo->DzongkhagID; ?>"><?php echo $dzo->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
		</tr>
        
        <tr>
			<td><label>Dungkhag:</label></td>
			<td>
            <select class="form-control" style="width:80%" name="dungkhag">
            <option value="0">Select One</option>
            <?php foreach($dungkhag as $dung): ?>
            <option value="<?php echo $dung->DungkhagID; ?>"><?php echo $dung->Name; ?></option>
            <?php endforeach; ?>
            </select>
            </td>
			<td><label>Gewog:</label></td>
			<td>
            <div id="Div_Gewog">
            <select class="form-control" style="width:80%" name="gewog">
            <option value="0">Select Dzongkhag First</option>
            </select>
            </div>
            </td>
		</tr>
        
        <tr>
			<td><label>Village:</label></td>
			<td>
            <div id="Div_Village">
            <select class="form-control" style="width:80%" name="village">
            <option value="0">Select Gewog First</option>
            </select>
            </div>
            </td>
			<td><label>Father's/Mother's Name:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="fatherName">
            </td>
		</tr>
        <tr>
			<td><label>Phone No:</label><font color="red"><b>*</b></font></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="phone" required="required">
            </td>
			<td><label>Email:</label><font color="red"><b></b></font></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="email">
            </td>
        </tr>
        <tr>
			<td colspan="4"><label>Contact Address:</label>
            <textarea class="form-control" style="width:40%; height:100px !important;" name="address" ></textarea>
            </td>
		</tr>
        
	</tbody>
</table>
<input type="submit" value="Save" class="btn btn-primary" style="float:right; margin-right:20px; ">
<a href="index.php/registration/registry_view" class="btn btn-danger" style="float:right; margin-right:20px; ">Cancel</a>
</form>
</div>


<div id="orgBox"style="display:none;">
<h3>Enter Organization Detail</h3>
<hr />
<form method="post" action="index.php/registration/add_new_litigant" id="frm1" name="frm1">
<input type="hidden" value="2" name="point" />
<table class="table table-bordered table-striped">
	<tbody>
        <tr>
			<td width="20%"><label> Organization Name <span style="color:#F30;">*</span> :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="OrgName"  />
            <div class="ErrMsg"></div>
            </td>
	
			<td width="20%"><label> Organization Code:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="OrgCode"  />
            <div class="ErrMsg"></div>
            </td>
		</tr>
        <tr>
			<td width="20%"><label> License/Registration Number<span style="color:#F30;">*</span>:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="licenseNo"  />
    
            </td>
			<td width="20%"><label> Address <span style="color:#F30;">*</span> :</label></td>
			<td>
            <textarea class="form-control" name="caddress" style="width:80%;"></textarea>
            
            
    
            </td>
		</tr>
         <tr>
			<td width="20%"><label>P.O Box No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cpobox"  />
    
            </td>

			<td width="20%"><label>Phone No <span style="color:#F30;">*</span> :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cpno"  />
    
            </td>
		</tr>
        <tr>
			<td width="20%"><label>Fax No:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cfno"  />
    
            </td>
	
        	<td width="20%"><label> Contact Person Name:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="RName" />
    
            </td>
		</tr>
          <tr>
			<td width="20%"><label>Contact Phone No  :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="Rpno"  />
    
            </td>

			<td width="20%"><label>Designation:</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="cid" id="Rpost" />
            <div class="ErrMsg"></div>
            </td>
		</tr>
	</tbody>
</table>

<a href="index.php/registration" class="btn btn-danger" style="float:right; margin-left:20px; ">Cancel</a>
<input type="submit" value="Save" class="btn btn-primary" style="float:right; margin-left:100px;">
</form>
</div>

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
	 

	
  });
</script>
<script type="text/javascript">

function indSel()
{
	document.getElementById('indi').className='active';
	document.getElementById('organ').className='btn';
	document.getElementById('orgBox').style.display='none';
	document.getElementById('manBox').style.display='block';
}

function orgSel()
{
	document.getElementById('organ').className='active2';
	document.getElementById('indi').className='btn';
	document.getElementById('orgBox').style.display='block';
	document.getElementById('manBox').style.display='none';
}
</script>
<script src="<?php echo base_url();?>BeatPicker/js/BeatPicker.min.js"></script>
<script src="<?php echo base_url();?>BeatPicker/js/jquery-1.11.0.min.js"></script>
