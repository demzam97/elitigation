
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

<div class="main-content"> 
 <div id="main-tbody">
 
 </div>
 <br />


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
<?php
require_once('SwaggerClient-php/vendor/autoload.php');
$token_url = "https://datahub-apim.dit.gov.bt/token";
$test_api_url = "https://staging-datahub-apim.dit.gov.bt/dcrc_citizen_details_api/1.0.0";
$client_id = "Czzl9myYchdsnSwpVf8d_Hl1x_wa";
$client_secret = "niUb1bRpj136KfHrxhVy7yUo7TYa";
//$access_token = getAccessToken($token_url, $client_id, $client_secret); 
$access_token = "a465ccf7-3be9-3839-b765-0009ac6eed4d";
$cDetail1 = "";
function getAccessToken($token_url, $client_id, $client_secret)
     {
      $content = "grant_type=client_credentials";
      $authorization = base64_encode("$client_id:$client_secret");
      $header = array("Authorization: Basic {$authorization}", "Content-Type: application/x-www-form-urlencoded");
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => $token_url,
      CURLOPT_HTTPHEADER => $header,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $content
      ));
      $response = curl_exec($curl);
      curl_close($curl);
      return json_decode($response)->access_token;
     }
     if ($cidno != '') {
     $cid = $cidno;
     $config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
     $config->setHost($test_api_url);
     $apiInstance = new Swagger\Client\Api\DefaultApi(
     new GuzzleHttp\Client(['verify' => false]),
     $config
     );
     try {
     $result1 = $apiInstance->citizendetailsCidGet($cid);
     $data1 = json_decode($result1, true);
     foreach ($data1['citizenDetailsResponse'] as $cDetails1) {
     $cDetail1 = $cDetails1;
     }
     //print_r($cDetail1);
     } catch (Exception $e) {
     ?>
    <p>Could not connect to Department of Census and Registration. Try again Latter</p>
    <a href="<?php echo site_url('welcome/elat_registration_bht') ?>" class="btn btn-primary">Return</a>
    <?php
    //echo 'Exception when calling DefaultApi->citizendetailsCidGet: ', $e->getMessage(), PHP_EOL;
     }
    } else {
    }
?>

<form method="post" action="index.php/registration/add_new_litigant_cid" id="frm1" name="frm1">
<input type="hidden" value="1" name="point" />
<input type="hidden" value="<?php echo $cidno; ?>" name="cid" />
<table class="table table-bordered table-striped">
	<tbody>
		<?php error_reporting(E_ALL & ~E_NOTICE); ?>
        <tr>
			<td width="15%"><label>Name :</label></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="Name" id="Name" value="<?php echo trim($cDetail1[0]['firstName'] . ' ' . $cDetail1[0]['middleName'] . ' ' . $cDetail1[0]['lastName']); ?>" />
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
			
			<td><label>Occupation:</label><font color="red"><b>*</b></font></td>
			<td>
            
            <select name="occupation" class="form-control" style="width:80%" required="required" >
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
			<input type="text" class="form-control" style="width:80%" name="gender" id="gender" value="<?php echo $cDetail1[0]['gender']; ?>"  />
            </td>
			<td><label>DOB:</label></td>
			<td>
           <input type="text"  name="dob"  placeholder="Date" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" value="<?php echo $cDetail1[0]['dob']; ?>"/>
            </td>
		</tr>
        
        <tr>
		<?php
         $birthDate = $cDetail1[0]['dob'];
         $birthDate = explode("/", $birthDate);
         $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
          ?>
			<td><label>Age:</label></td>
			<td>
            <input type="number" class="form-control" style="width:80%" name="age" value="<?php echo $age; ?>">
           
            </td>
			<td width="20%"><label>House No:</label></td>
			<td>
           <input type="text" name="house_no" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['houseNo']; ?>"/>
            </td>
		</tr>
        
        <tr>
			<td><label>Tharm No:</label></td>
			<td>
           <input type="text" name="tharm_no" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['thramNo']; ?>"/>
            </td>
			<td><label>Dzongkhag:</label></td>
			<td>
			<input type="text" name="dzongkhag" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['dzongkhagName']; ?>"/>
            </td>
		</tr>
        
        <tr>
			<td><label>Dungkhag:</label></td>
			<td>
			<input type="text" name="dungkhag" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['dungkhag']; ?>"/>
            </td>
			<td><label>Gewog:</label></td>
			<td>
			<input type="text" name="gewog" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['gewogName']; ?>"/>
            
            </td>
		</tr>
        
        <tr>
			<td><label>Village:</label></td>
			<td>
			<input type="text" name="village" class='form-control' style="width:80%;" value="<?php echo $cDetail1[0]['villageName']; ?>"/>
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
			<td><label>Email:</label><font color="red"><b>*</b></font></td>
			<td>
            <input type="text" class="form-control" style="width:80%" name="email" required="required">
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
