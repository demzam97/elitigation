<br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
 <h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;འབྲུག་མི་ཐོ་བཀོད། </h3>
    <div class="row">
        <div class="col-md-8 col-xl-12">
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_bhutanese_register_dzo'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="1">
<input type="hidden" name="cid" value="<?php echo $cidno;?>" >


<div class="col-md-8 col-xl-12" style="background-color:lightblue">
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="party_type"><h3>མིང༌།</h3></label>
                            <input type="text" class="form-control-plaintext" name="name" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality"><h3>ཕོ་མོའི་དབྱེ།</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="gender" value="">                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="wp_passport"><h3>སྐྱེས་ཚེས།</h3></label>
                             <input type="text" readonly class="form-control-plaintext" name="dob" value="">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="name"><h3>ཁྲམ་ཨང་།</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="thram" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="gender"><h3>གུང་ཨང་།</h3></label>
                               <input type="text" readonly class="form-control-plaintext" name="houseno" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="dob"><h3>གཡུས།</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="village" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="state"><h3>རྒེད་འོག</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="gewog" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="district"><h3>དྲུང་ཁག</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="dungkhag" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="occupation"><h3>རྫོང་ཁག</h3></label>
                            <input type="text" readonly class="form-control-plaintext" name="dzongkhag" value="">
                        </div>
                    </div>
                </div>
</div>                
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="party_type"><h3>ལས་འགན།<font color="red">*</font></h3></label>
                               <select class="form-control" name="party_type" id="party_type" required autofocus>
                                <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                                <option value="1">Individual</option>
                                <option value="2">Organization</option>
                               </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                              <label for="occupation"><h3>ལཱ་གཡོག</h3></label>
                                <select class="form-control" name="occupation" id="occupation">
                                <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
                                <option value="1">Goverment Employee</option>
                                <option value="2">Private Employee</option>
                                <option value="3">Freelance Employee</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཨང་།</h3></label>
                             <input type="number" class="form-control form-control-sm" name="mobile">
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<font color="red">*</font></h3></label>
                             <input type="email" class="form-control form-control-sm" name="email" required="required">
                        </div>
                    </div>                   
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="cur_address"><h3>ད་ལྟོའི་ཁ་བྱང་། </h3></label>
                            <textarea class="form-control md-textarea" name="cur_address" rows="3" placeholder="གུང་ཨང༌། ཁྱིམ་ཨང༌།&#10;རྒྱལ་ཁབ"></textarea>
                        </div>
                    </div>
                <div class="col-md-4">
                    <br><br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');"><h3 style="color: white;">ཕུལ་ནི།</h3></button>
                    <button type="cancel" class="btn btn-danger"><h3><a href="<?php echo site_url('welcome/elat_registration_dzo'); ?>" style="color: white;">ཆ་མེད་བཏང་ནི།</h3></button></a>

                </div>
                </div>
            <div id="loading" style="display:none"><font color = "red"><h4>བསྒུག་གནང་།</h4>...</font></div>
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
 <h3 class="card-title text-center"><i class="far fa-address-card"></i>&nbsp;&nbsp;འབྲུག་མི་ཐོ་བཀོད། </h3>
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
<form action="<?php echo site_url('publicregistration/store_bhutanese_register_dzo'); ?>" method="post" onsubmit="$('#loading').show();">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <input type="hidden" class="form-control form-control-sm" id="user_type" name="user_type" value="1">
 <input type="hidden" name="cid" value="<?php echo $cidno;?>" >

    <div class="form-group row" style="background-color:lightblue">
        <label for="name" class="col-sm-2 col-form-label"><h3>མིང༌།</h3></label>
        <div class="col-sm-4">
            <input type="text" class="form-control-plaintext" name="name" value="<?php echo trim($cDetail1[0]['firstName'].' '.$cDetail1[0]['middleName'].' '.$cDetail1[0]['lastName']);?>">
        </div>

        <label for="gender" class="col-sm-3 col-form-label"><h3>ཕོ་མོའི་དབྱེ།</h3></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="gender" value="<?php echo $cDetail1[0]['gender'];?>">
        </div>
    
        <label for="dob" class="col-sm-2 col-form-label"><h3>སྐྱེས་ཚེས།</h3></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="dob" value="<?php echo $cDetail1[0]['dob'];?>">
        </div>
    
        <label for="thram" class="col-sm-3 col-form-label"><h3>ཁྲམ་ཨང་།</h3></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="thram" value="<?php echo $cDetail1[0]['thramNo'];?>">
        </div>
   
        <label for="houseno" class="col-sm-3 col-form-label"><h3>གུང་ཨང་།</h3></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="houseno" value="<?php echo $cDetail1[0]['houseNo'];?>">
        </div>
    
        <label for="village" class="col-sm-2 col-form-label"><h3>གཡུས།</h3></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="village" value="<?php echo $cDetail1[0]['villageName'];?>">
        </div>
    
        <label for="gewog" class="col-sm-2 col-form-label"><h3>རྒེད་འོག</h3></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="gewog" value="<?php echo $cDetail1[0]['gewogName'];?>">
        </div>
   
        <label for="dungkhag" class="col-sm-3 col-form-label"><h3>དྲུང་ཁག</h3></label>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext" name="dungkhag" value="<?php echo $cDetail1[0]['dungkhag'];?>">
        </div>
   
        <label for="dzongkhag" class="col-sm-3 col-form-label"><h3>རྫོང་ཁག</h3></label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" name="dzongkhag" value="<?php echo $cDetail1[0]['dzongkhagName'];?>">
        </div>
    </div>
    <div class="form-group">
        <label for="party_type"><h3>ལས་འགན།</h3><font color="red">*</font></label>
        <select class="form-control form-control-sm" name="party_type" id="party_type" required autofocus>
            <option value="">Select</option>
            <option value="1">Individual</option>
            <option value="2">Organization</option>
      </select>
    </div>
      <div class="form-group">
        <label for="occupation"><b>Occupation</b></label>
        <select class="form-control form-control-sm" name="occupation" id="occupation" required autofocus>
            <option value=""><h2>གདམ་ཁ་རྐྱབ</h2></option>
            <option value="1">Goverment Employee</option>
            <option value="2">Private Employee</option>
            <option value="3">Freelance Employee</option>
      </select>
    </div>
    <div class="form-group">
        <label for="mobile"><h3>འགྲུལ་འཕྲིན་ཨང་།</h3></label>
        <input type="mobile" class="form-control form-control-sm" name="mobile">
    </div>
    <div class="form-group">
        <label for="email"><h3>གློག་འཕྲིན་ཁ་བྱང་།<font color="red">*</font></h3></label>
        <input type="email" class="form-control form-control-sm" name="email" required="required">
    </div>
    <div class="form-group">
        <label for="cur_address"><h3>ད་ལྟོའི་ཁ་བྱང་། </h3></label>
        <textarea class="form-control form-control-sm" name="cur_address" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');"><h3>ཕུལ་ནི།</h3></button>
    <button type="submit" class="btn btn-danger"><a href="/elat/public/register/registration_request_dzo" style="color: white;"><h3>ཆ་མེད་བཏང་ནི།</h3></button></a>
</form>
 <?php } else { echo "No records found "; }?> 
      </div>
      <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
    </div>
  </div>

 </div>
</div>
</div>
</div>-->




