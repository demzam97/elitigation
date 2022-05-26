<br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Lawyer Registration </h5>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_elawyer_register'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="13">
<input type="hidden" name="cid" value="<?php echo $cidno;?>" >


<a class="btn btn-warning btn-sm" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
<i class="fas fa-eye"></i>&nbsp;&nbsp;View CID Details
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
  <div class="col-md-8 col-xl-12" style="background-color:lightblue">
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="party_type"><b>Name:</b></label>
                            <input type="text" class="form-control-plaintext" name="name" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><b>Gender:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="gender" value="">                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="wp_passport"><b>DOB:</b></label>
                             <input type="text" readonly class="form-control-plaintext" name="dob" value="">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><b>Thram Number:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="thram" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="gender"><b>House Number:</b></label>
                               <input type="text" readonly class="form-control-plaintext" name="houseno" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="dob"><b>Village:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="village" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><b>Gewog:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="gewog" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="district"><b>Dungkhag:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="dungkhag" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="occupation"><b>Dzongkhag:</b></label>
                            <input type="text" readonly class="form-control-plaintext" name="dzongkhag" value="">
                        </div>
                    </div>
                </div>
</div>  
</div>
</div>
                             
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="license"><b>Bar Council License No.<font color="red">*</font></b></label>
                               <input type="text" class="form-control" name="license" id="license" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="mobile"><b>Firm Name:</b></label>
                              <input type="text" class="form-control" name="fname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><b>Contact No.<font color="red">*</font></b></label>
                             <input type="number" class="form-control" name="contactno" required="required">
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><b>Email ID<font color="red">*</font></b></label>
                             <input type="email" class="form-control form-control-sm" name="email" required="required">
                        </div>
                    </div>                   
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="cur_address"><b>Firm Address</b></label>
                            <textarea class="form-control" name="firmaddress" rows="3"></textarea>
                        </div>
                    </div>

    <div class="col-md-4"> 
    <div class="md-form">
    <label for="case_title"><b>Bar Council Certificate:<font color="red">*</font></b></label>
    <input type="file" name="" class="form-control" required="required" id="fileUpload" >
    </div>
    </div>

                <div class="col-md-4">
                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
                    <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration'); ?>" style="color: white;">Cancel</button></               </div>
                </div>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
        </div>
    </div>

</div>
</div> 
</div>   

</div> 
</div>




<!--<div class="container py-5">
<div class="row">
<div class="col-md-6 mx-auto">
 <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
<h5 class="card-title font-weight-bold text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;Lawyer Registration </h5>
<?php
require_once('SwaggerClient-php/vendor/autoload.php');
$token_url = "https://datahub-apim.dit.gov.bt/token";
$test_api_url = "https://staging-datahub-apim.dit.gov.bt/dcrc_citizen_details_api/1.0.0";
$client_id = "Czzl9myYchdsnSwpVf8d_Hl1x_wa";
$client_secret = "niUb1bRpj136KfHrxhVy7yUo7TYa";
//$access_token = getAccessToken($token_url, $client_id, $client_secret); 
$access_token = "a465ccf7-3be9-3839-b765-0009ac6eed4d";
$cDetail1="";
function getAccessToken($token_url, $client_id, $client_secret) 
{
  $content = "grant_type=client_credentials";
  $authorization = base64_encode("$client_id:$client_secret");
  $header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");
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
  if($cidno != '')
        {
        $cid = $cidno;
        $config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
        $config->setHost($test_api_url);
        $apiInstance = new Swagger\Client\Api\DefaultApi(
          new GuzzleHttp\Client(['verify' => false]),
          $config);
        try {
          $result1 = $apiInstance->citizendetailsCidGet($cid);
          $data1 = json_decode($result1, true);
          foreach ($data1['citizenDetailsResponse'] as $cDetails1)
          {
            $cDetail1 = $cDetails1;
          }
          //print_r($cDetail1);
        } catch (Exception $e) {
          echo 'Exception when calling DefaultApi->citizendetailsCidGet: ', $e->getMessage(), PHP_EOL;
          }
        }
 else {}
 if(count($data1) != '') {
?>
<form action="<?php echo site_url('publicregistration/store_elawyer_register'); ?>" method="post" onsubmit="$('#loading').show();">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="2">
 <input type="hidden" name="cid" value="<?php echo $cidno;?>" >

    <div class="form-group row" style="background-color:lightblue">
        <label for="name" class="col-sm-2 col-form-label"><b>Name:</b></label>
        <div class="col-sm-4">
            <input type="text" class="form-control-plaintext" name="name" value="<?php echo trim($cDetail1[0]['firstName'].' '.$cDetail1[0]['middleName'].' '.$cDetail1[0]['lastName']);?>">
        </div>

        <label for="gender" class="col-sm-3 col-form-label"><b>Gender:</b></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="gender" value="<?php echo $cDetail1[0]['gender'];?>">
        </div>
    
        <label for="dob" class="col-sm-2 col-form-label"><b>DOB:</b></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="dob" value="<?php echo $cDetail1[0]['dob'];?>">
        </div>
    
        <label for="thram" class="col-sm-3 col-form-label"><b>Thram no.:</b></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="thram" value="<?php echo $cDetail1[0]['thramNo'];?>">
        </div>
   
        <label for="houseno" class="col-sm-3 col-form-label"><b>House no.:</b></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="houseno" value="<?php echo $cDetail1[0]['houseNo'];?>">
        </div>
    
        <label for="village" class="col-sm-2 col-form-label"><b>Village:</b></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="village" value="<?php echo $cDetail1[0]['villageName'];?>">
        </div>
    
        <label for="gewog" class="col-sm-2 col-form-label"><b>Gewog:</b></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="gewog" value="<?php echo $cDetail1[0]['gewogName'];?>">
        </div>
   
        <label for="dungkhag" class="col-sm-3 col-form-label"><b>Dungkhag:</b></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="dungkhag" value="<?php echo $cDetail1[0]['dungkhag'];?>">
        </div>
   
        <label for="dzongkhag" class="col-sm-3 col-form-label"><b>Dzongkhag:</b></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="dzongkhag" value="<?php echo $cDetail1[0]['dzongkhagName'];?>">
        </div>
    </div>
    <div class="form-group">
        <label for="mobile"><b>Qualification:</b></label>
        <input type="text" class="form-control form-control-sm" name="qualification">
    </div>
    <div class="form-group">
        <label for="mobile"><b>Firm Name:</b></label>
        <input type="text" class="form-control form-control-sm" name="fname">
    </div>
    <div class="form-group">
        <label for="cur_address"><b>Firm Address</b></label>
        <textarea class="form-control form-control-sm" name="firmaddress" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="mobile"><b>Contact No.<font color="red">*</font></b></label>
        <input type="text" class="form-control form-control-sm" name="contactno" required="required">
    </div>
    <div class="form-group">
        <label for="email"><b>Email ID<font color="red">*</font></b></label>
        <input type="email" class="form-control form-control-sm" name="email" required="required">
    </div>
    
    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="<?php echo site_url('welcome/elat_registration_bht'); ?>" style="color: white;">Cancel</button></a>
</form>
 <?php } else { echo "No records found "; }?> 
      </div>
      <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
    </div>
  </div>

 </div>
</div>
</div>
</div>
</body>
</html>-->
