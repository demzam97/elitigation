<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Welcome extends CI_Controller {

	function __Construct()
		{
			parent::__Construct();
			header ('Cache-Control: no-cache, must-revalidate, max-age = 0');
                header ('Cache-Control: post-check = 0, pre-check = 0', false);
                header ('Pragma: no-cache');
          	$this->load->helper('form');
          	$this->load->library('form_validation');
          	$this->load->model('user_model','user');
			$this->load->model('public_model','public');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('Elat_model','elat');

            $this->load->database();
            $this->load->helper(array('url','html','form'));
			
		}
        function user_profile()
		{
		 $uid = $this->session->userdata('user_id');
		 $eid = $this->user->get_user_email($uid);
		 
         $data['stuff'] = $this->user->get_user_profile($eid);
         $data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
         $data['stuff2'] = $this->user->get_user_profile_org($eid);
         $data['stuff3'] = $this->user->get_user_profile_lawyer($eid);
		 
		 $this->load->view('elitigation/header1');
		 $this->load->view('elitigation/user_profile',$data);
		 $this->load->view('elitigation/footer');
		}

       function feed_back($uid, $caseid, $courtid)
		{
		$data['uid'] = $uid;
		$data['caseid'] = $caseid; 
		$data['courtid'] = $courtid; 	
		$this->load->view('elitigation/header');
		$this->load->view('elitigation/feedback', $data);
		$this->load->view('elitigation/footer');
	}
		function dashboard()
		{
		 $this->load->view('elitigation/header1');
		 $this->load->view('elitigation/elitigation_dashboard');
		 $this->load->view('elitigation/footer');
		}
 
		function dashboard_defendant()
		{
		 $this->load->view('elitigation/header1');
		 $this->load->view('elitigation/defendant/elitigation_dashboard_respondent');
		 $this->load->view('elitigation/footer');
		}

		function dashboard_dzo()
		{
		 $this->load->view('elitigation/header1_dzo');
		 $this->load->view('elitigation/elitigation_dashboard_dzo');
		 $this->load->view('elitigation/footer');
		}
///forgotpassword
		function elat_forgotpassword()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('forgotpassword');
		 $this->load->view('elitigation/footer');
		}
		function forgotpasswordlink()
		{
			$email = $this->input->post('email');
			$result= $this->db->query("select * from sc_tbl_user_profile where user_name='".$email."'")->result_array();
			if(count($result)>0)
			{
				$tokan=rand(1000,9999);
				$this->db->query("update sc_tbl_user_profile set password='".$tokan."' where email='".$email."'");

            $to = $this->input->post('email');
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "Password Reset Link";
            $message = "Dear User,<br /><br />Your request has been received please follow the link to reset your password.<a href='".site_url('welcome/reset?tokan=').$tokan."'>Reset Password</a>
            <br />Please help us to serve you better<br />Judiciary";

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) 
            	{
            	   $this->load->view('elitigation/header');

            	   $login['login_class'] = 'failure';
				   $login['login_msg']   = '<font color=red>EMAIL HAS BEEN SENT WITH A PASSWORD RESET LINK.</font>';
				   $this->session->set_flashdata($login);
		           $this->load->view('forgotpassword');
		           $this->load->view('elitigation/footer');
            	} 
            	 else {?>
					<script type="text/javascript">
					   alert("Could not Reach SMPT server, eMail not sent");
					</script>
					<?php }
			}
			else
			{
            $this->load->view('elitigation/header');
		    $this->session->set_flashdata('message',"<div style='color:red;'>INVALID EMAIL/EMAIL ADDRESS IS NOT REGISTERED.<div>");
		    $this->load->view('forgotpassword');
		    $this->load->view('elitigation/footer');
			}
		}
		function reset()
		{
		 $data['tokan'] = $this->input->get('tokan');
		 $_SESSION['tokan']=$data['tokan'];
		 $this->load->view('elitigation/header');
		 $this->load->view('resetpassword');
		 $this->load->view('elitigation/footer');
		}
		function updatepass()
		{
		 $_SESSION['tokan'];
		 $data=$this->input->post();
         if($data['password']==$data['cpassword'])
         {
         $pwdchange_status=$this->input->post('pwdchange_status');
         $password=md5($this->input->post('password'));
         $this->db->set('password', $password);
         $this->db->set('pwdchange_status', $pwdchange_status);
         $this->db->where('password', $_SESSION['tokan']);
         $this->db->update('sc_tbl_user_profile'); 
					$login['login_class'] = 'failure';
				    $login['pwdchange_msg']   = '<font color=red>PASSWORD HAS BEEN SUCCESSFULLY CHANGED.
				    <a href="' . base_url() . 'index.php/welcome/elitigation' .'">Goto the LOGIN page</a>
				</font>';
				$this->session->set_flashdata($login);

         }              
		 $this->load->view('elitigation/header');
		 $this->load->view('resetpasswordsuccessmsg');
		 $this->load->view('elitigation/footer');
		}
//DZONGKHA
function elat_forgotpassword_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('forgotpassword_dzo');
		 $this->load->view('elitigation/footer');
		}
		function forgotpasswordlink_dzo()
		{
			$email = $this->input->post('email');
			$result= $this->db->query("select * from sc_tbl_user_profile where user_name='".$email."'")->result_array();
			if(count($result)>0)
			{
				$tokan=rand(1000,9999);
				$this->db->query("update sc_tbl_user_profile set password='".$tokan."' where email='".$email."'");

            $to = $this->input->post('email');
		 	$this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "Password Reset Link";
            $message = "Dear User,<br /><br />Your request has been received please follow the link to reset your password.<a href='".site_url('welcome/reset?tokan=').$tokan."'>Reset Password</a>
            <br />Please help us to serve you better<br />Judiciary";

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) 
            	{
            	   $this->load->view('elitigation/header');

            	   $login['login_class'] = 'failure';
				   $login['login_msg']   = '<font color=red>EMAIL HAS BEEN SENT WITH A PASSWORD RESET LINK.</font>';
				   $this->session->set_flashdata($login);
		           $this->load->view('forgotpassword_dzo');
		           $this->load->view('elitigation/footer');
            	} 
            	 else {?>
					<script type="text/javascript">
					   alert("Could not Reach SMPT server, eMail not sent");
					</script>
					<?php }
			}
			else
			{
            $this->load->view('elitigation/header');
		    $this->session->set_flashdata('message',"<div style='color:red;'>INVALID EMAIL/EMAIL ADDRESS IS NOT REGISTERED.<div>");
		    $this->load->view('forgotpassword_dzo');
		    $this->load->view('elitigation/footer');
			}
		}
		function reset_dzo()
		{
		 $data['tokan'] = $this->input->get('tokan');
		 $_SESSION['tokan']=$data['tokan'];
		 $this->load->view('elitigation/header');
		 $this->load->view('resetpassword_dzo');
		 $this->load->view('elitigation/footer');
		}
		function updatepass_dzo()
		{
		 $_SESSION['tokan'];
		 $data=$this->input->post();
         if($data['password']==$data['cpassword'])
         {
         $pwdchange_status=$this->input->post('pwdchange_status');
         $password=md5($this->input->post('password'));
         $this->db->set('password', $password);
         $this->db->set('pwdchange_status', $pwdchange_status);
         $this->db->where('password', $_SESSION['tokan']);
         $this->db->update('sc_tbl_user_profile'); 
					$login['login_class'] = 'failure';
				     $login['pwdchange_msg']   = '<font color=red><h3>à½‚à½¦à½„à¼‹à½šà½²à½‚à¼‹ à½‚à½¦à½¢à½”à¼‹à½–à½Ÿà½¼à¼‹à½šà½¢à¼‹à½¡à½²à¼</h3>
				    <a href="' . base_url() . 'index.php/welcome/elitigation_dzo' .'"><h3>à½•à¾±à½²à½¢à¼‹à½£à½¼à½‚à¼‹ à½“à½„à¼‹à½ à½›à½´à½£à¼‹à½¤à½¼à½‚à¼‹à½£à½ºà½–à¼‹à½“à½„à¼Œ à½–à¾±à½¼à½“à¼‹à½‚à½“à½„à¼Œà¼</h3></a>
				</font>';
				$this->session->set_flashdata($login);

         }              
		 $this->load->view('elitigation/header');
		 $this->load->view('resetpasswordsuccessmsg_dzo');
		 $this->load->view('elitigation/footer');
		}
			
/////
		//dzongkha//
		function index_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/landing_dzo');
		 $this->load->view('elitigation/footer');
		}
		function elitigation_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/elitigation_login_dzo');
		 $this->load->view('elitigation/footer');
		}
		function elat_registration_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/registration_request_dzo');
		 $this->load->view('elitigation/footer');
		}
		function elat_registration_bht_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/cidbhutanese_register_dzo');
		 $this->load->view('elitigation/footer');
		}	

        function elat_registration_lawyer()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/cidbhutaneselawyer_register');
		 $this->load->view('elitigation/footer');
		}        
                
        function elat_registration_lawyer_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/cidbhutaneselawyer_register_dzo');
		 $this->load->view('elitigation/footer');
		}  
        

		function elat_registration_nonbht_dzo()
		{
         $data['country'] = $this->public->get_country();
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/nonbhutanese_register_dzo',$data);
		 $this->load->view('elitigation/footer');
		}
		function elat_registration_org_dzo()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/organization_register_dzo');
		 $this->load->view('elitigation/footer');
		}
		function signInelat_dzo()
		 {
			 $username=$this->input->post('username');
			 $password=md5($this->input->post('password'));
			 
			 $result=$this->user->get_user_elat($username,$password);
			 if($result)
			  {
				$this->load->view('elitigation/header1_dzo');
				if($this->session->userdata('user_type')==12 || $this->session->userdata('user_type')==13 || $this->session->userdata('user_type')==15)
			     {
				   $this->load->view('elitigation/elitigation_dashboard_dzo');
				 }  
				
				if($this->session->userdata('user_type')==14)
			     {
				   $this->load->view('elitigation/defendant/elitigation_dashboard_respondent');
				 }  
		        $this->load->view('elitigation/footer');
			  }    
			 else
			 {
				$login['login_class'] = 'failure';
				$login['login_msg']   = '<font color=red>Invalid username / password.</font>';
				$this->session->set_flashdata($login);
				$this->load->view('elitigation/header');
				$this->load->view('elitigation/elitigation_login_dzo');
				$this->load->view('elitigation/footer');
			 }
			 
		 }
		 function changePasswordelat_dzo()
		 {
			// $this->load->view('elitigation/header1_dzo');
			 $this->load->view('changePasswordelat_dzo');
			 $this->load->view('elitigation/footer');
		 }
		  function passwordChangeElat_dzo()
		 {
			 $pwdchange_status=$this->input->post('pwdchange_status');

			 $old_pass=$this->input->post('old_pass');
			 $new_pass1=$this->input->post('new_pass1');
			 $new_pass2=$this->input->post('new_pass2');
			 $pass=$new_pass1;
			  $this->db->where("id",$this->session->userdata('user_id'));
				$query=$this->db->get("sc_tbl_user_profile");
				if($query->num_rows()>0)
				{
					foreach($query->result() as $rows)
					{
						$password=$rows->password;
					}
				}
			 if($password==md5($old_pass))
			 {
				 if($pass==$new_pass2)
				 {
					 $newPassword=md5($new_pass1);
					 
					$data = array(
						   'password' => $newPassword,
						   'pwdchange_status' => $pwdchange_status
						);

					$this->db->where('id', $this->session->userdata('user_id'));
					$this->db->update('sc_tbl_user_profile', $data);
					$login['login_class'] = 'failure';
				    $login['login_msg']   = '<font color=green>password Successfully Updated, Please Login</font>';
				    $this->session->set_flashdata($login);
					$this->session->set_userdata('logged_in', FALSE);
			    $this->load->view('elitigation/header1_dzo');
		            $this->load->view('elitigation/elitigation_login_dzo');
		            $this->load->view('elitigation/footer');
				 }
				 else
				 {
					 $this->session->set_flashdata('asset_class', 'error');
					 $this->session->set_flashdata('asset_msg', 'New Password did not match.');
				// $this->load->view('elitigation/header1_dzo');
			         $this->load->view('changePasswordelat_dzo');
			         $this->load->view('elitigation/footer');
				 }
			 }
			 else
			 {
				$this->session->set_flashdata('asset_class', 'error');
				$this->session->set_flashdata('asset_msg', 'Invalid Old Password.');
			    // $this->load->view('elitigation/header1_dzo');
			     $this->load->view('changePasswordelat_dzo');
			     $this->load->view('elitigation/footer');
			 } 
		 }
		 function passwordAuthenticator_dzo($uid)
		 { 
		 	date_default_timezone_set("Asia/Dhaka");
                        $datebht = date("Y-m-d H:i:s");
                       
                        $otp = rand(100000,999999);
		 	$insert_data['otp_no']=$otp;
		 	$insert_data['otp_expiry']='0';
		      	$insert_data['otp_dated']=$datebht;
                        $this->db->insert('sc_tbl_otp', $insert_data);

          ////
                  // $tom = $this->elat->get_mobile($uid);
                  // $mmsg = "The OTP is valid for 15 minutes.<br /> Your OTP is $otp";
                   $tom = trim($this->elat->get_mobile($uid));
                   $mmsg = urlencode("The OTP is valid for 15 minutes.Your OTP is $otp");
                   $curl = curl_init();
                   curl_setopt_array($curl, array(
                   CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to='.$tom.'&msg='.$mmsg.'',
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_ENCODING => '',
                   CURLOPT_MAXREDIRS => 10,
                   CURLOPT_TIMEOUT => 0,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                   CURLOPT_CUSTOMREQUEST => 'GET',
                   ));
                   $response = curl_exec($curl);
                   curl_close($curl);
         ////

		 	$to=$this->elat->get_email($uid);
		 	$this->load->config('email');
                        $this->load->library('email');
                        $from = $this->config->item('smtp_user');
                        $subject = "OTP For Account Verification";
                        $message = "Your OTP is $otp";
                        $this->email->set_newline("\r\n");
                        $this->email->from($from);
                        $this->email->to($to);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        if ($this->email->send()) {
            //echo 'Your Email has successfully been sent.';
                        } else {
							?>
							<script type="text/javascript">
							   alert("Could not Reach SMPT server, eMail not sent");
							</script>
							<?php
                        }
			 $this->load->view('elitigation/header');
			 $this->load->view('passwordAuthenticator_dzo');
			 $this->session->set_flashdata('message',"<div style='color:red;'>INVALID OTP/EXPIRED OTP.<div>");
			 $this->load->view('elitigation/footer');
		 }
        function passwordAuthenticating_dzo($uid) 
        { 
            date_default_timezone_set("Asia/Dhaka");
            $datebht = date("Y-m-d H:i:s");

            $otp_no=$this->input->post('otp_no');
	    $count = $this->db->where(['otp_no'=>$otp_no])->where(['otp_expiry'=>'0'])->where('DATE_ADD(otp_dated,INTERVAL 15 MINUTE) >','NOW()', FALSE)->from("sc_tbl_otp")->count_all_results();
           
            if($count == '1')
            {
             $data = array('otp_expiry' => '1');
             $this->db->where('otp_no', $otp_no);
             $this->db->update('sc_tbl_otp', $data);

             $userid = array('pwdchange_status' => '2');
             $this->db->where('id', $uid);
             $this->db->update('sc_tbl_user_profile', $userid);

                     /*    $this->load->view('elitigation/header1_dzo');
			 $this->load->view('elitigation/elitigation_dashboard_dzo');
			 $this->load->view('elitigation/footer');
                     */
             if($this->session->userdata('user_type')==12 || $this->session->userdata('user_type')==13 || $this->session->userdata('user_type')==15)
			     {
				   $this->load->view('elitigation/header1_dzo');
				   $this->load->view('elitigation/elitigation_dashboard_dzo');
		             }  
				
			     if($this->session->userdata('user_type')==14)
			     {
				   $this->load->view('elitigation/header1');
				   $this->load->view('elitigation/defendant/elitigation_dashboard_respondent');
			     }  
		             $this->load->view('elitigation/footer');


            }
            else
            {
	         $this->load->view('elitigation/header');
	         $this->load->view('passwordAuthenticator_dzo');
	         $this->session->set_flashdata('message',"<div style='color:red;'>INVALID OTP/EXPIRED OTP.<div>");
			 $this->load->view('elitigation/footer');
			
            }
		 	
		 }


		////////////
        /* SMS */
	function index()
		{  
            $data['civiltotal'] = $this->public->call_civil_count();
			$data['criminaltotal'] = $this->public->call_criminal_count();
			$data['totaldecided'] = $this->public->call_case_decided();
			$data['courts'] = $this->public->get_all_courts(); 
            $data['totalappealed'] = $this->public->call_case_appealed(); 			
		   $this->load->view('elitigation/header');
		   $this->load->view('elitigation/landing', $data);
		   $this->load->view('elitigation/footer');
		}
	function cmis()
		{
		 $this->load->view('welcome_message');
		}
	function elitigation()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/elitigation_login');
		 $this->load->view('elitigation/footer');
		}

    function elitigation_cjb()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/elitigation_login_cjb');
		 $this->load->view('elitigation/footer');
		}		
		
	function elat_registration()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/registration_request');
		 $this->load->view('elitigation/footer');
		}	
		
	function video_tutorial()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/vidoes');
		 $this->load->view('elitigation/footer');
		}	

   function vdownload($filename = NULL)
		{
			
			$this->load->helper('download');
			$data = file_get_contents(base_url('/images/videos/'.$filename));
			force_download($filename, $data);
		}
    function videoplay($filename = NULL)
		{
		 $data['filname'] = $filename;
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/vidoe_play', $data);
		 $this->load->view('elitigation/footer');
			
		}		

	function elat_registration_bht()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/cidbhutanese_register');
		 $this->load->view('elitigation/footer');
		}	

	function elat_registration_nonbht()
		{
		 $data['country'] = $this->public->get_country();
                 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/nonbhutanese_register',$data);
		 $this->load->view('elitigation/footer');
		}
	function elat_registration_org()
		{
		 $this->load->view('elitigation/header');
		 $this->load->view('elitigation/register/organization_register');
		 $this->load->view('elitigation/footer');
		}
		
		
		
	function signIn()
		 {
			 $username=$this->input->post('username');
			 $password=md5($this->input->post('password'));
			 $result=$this->user->get_user($username,$password);
			 
			 if($result) {
			 $uid = $this->session->userdata('user_id'); 
			 $resultpassword=$this->user->get_password_status($uid);	

			  if($resultpassword != '0'){	 
			 $data['dzongkhag'] = $this->public->get_dzongkhag();
			 $data['dungkhag'] = $this->public->get_dungkhag();
			 $data['gewog'] = $this->public->get_gewog();
			 $data['village'] = $this->public->get_village();
			 $data['users'] = $this->public->get_all_users();
			 $data['cases'] = $this->public->get_all_cases();
 			 $data['title'] = "Dashboard";
			 $this->load->view('header', $data);
			 if($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==17) {
		   	 //$this->load->view('dashboard', $data);
			  redirect('registration/user_dashboard');
			 }
			 if($this->session->userdata('user_type')==4) {
			 	//chnage
			 $data['registration'] = $this->public->get_hybrid_case();
			 $data['registration'] = $this->public->get_registered_registration_registry();
			 $data['appeal_registration'] = $this->public->get_appealling_registration();
		   	 $this->load->view('registration_view_registry', $data);
		   	 //change
		   	 //$this->load->view('hybrid_dash', $data);
			 }
			 if($this->session->userdata('user_type')==8) {
			 $data['registration'] = $this->public->get_registered_registration_registry();
			 $data['appeal_registration'] = $this->public->get_appealling_registration();
		   	 $this->load->view('registration_view_registry', $data);
			 }
			 if($this->session->userdata('user_type')==9) {
			 $data['registration'] = $this->public->get_registered_registration_registry();
			 $data['appeal_registration'] = $this->public->get_appealling_registration();
		   	 $this->load->view('registration_view_registry', $data);
			 }
			 if($this->session->userdata('user_type')==5) {
			redirect('registration');
			 }
			 if($this->session->userdata('user_type')==3) {
			    redirect('registration/user_dashboard');
			 }
			 
			 if($this->session->userdata('user_type')==2) {
			 $data['registration'] = $this->public->get_judge_dashboard();
		   	 $this->load->view('judge_dashboard', $data);
			 }
			 if($this->session->userdata('user_type')==7) 
			 { 
			 $data['registration'] = $this->public->get_hybrid_case();
			 $data['appeal_registration'] = $this->public->get_appealling_registration();
		 	 $data['registration_rejected'] = $this->public->get_assigned_case_rejected();
             $this->load->view('hybrid_dash', $data);
			 }

			 if($this->session->userdata('user_type')==10) 
			 {
			 $data['registration'] = $this->public->get_hybrid_case();
			 $data['appeal_registration'] = $this->public->get_appealling_registration();
		 	 $data['registration_rejected'] = $this->public->get_assigned_case_rejected();
             $this->load->view('hybrid_dash', $data);
			 }
			
			 if($this->session->userdata('user_type')==6)
			  {
			   $data['registration'] = $this->public->get_judge_dashboard();
		   	   $this->load->view('judge_dashboard', $data);
			  } 
			    } 
              else
			{
				$data['uid'] = $uid;
				$this->load->view('welcome_message_1', $data);
			}
			 }			
			 else
			 {
			 $login['login_class'] = 'failure';
			 $login['login_msg']   = '<font color=red>Invalid username / password.</font>';
			 $this->session->set_flashdata($login);
			 $this->cmis();
			 }
			 
		 }


		 function signInelat()
		 {
			 $username=$this->input->post('username');
			 $password=md5($this->input->post('password'));
			 
			 $result=$this->user->get_user_elat($username,$password);
			 if($result)
			  {
				//$this->load->view('elitigation/header1');
				if($this->session->userdata('user_type')==12 || $this->session->userdata('user_type')==13 || $this->session->userdata('user_type')==15)
			        {
				   $this->load->view('elitigation/header1');
                                   $this->load->view('elitigation/elitigation_dashboard');
                                   $this->load->view('elitigation/footer');
			        }  
				
				if($this->session->userdata('user_type')==14)
			        {
				   $this->load->view('elitigation/header1');
                                   $this->load->view('elitigation/defendant/elitigation_dashboard_respondent');
                                   $this->load->view('elitigation/footer');
				}  
		                //$this->load->view('elitigation/footer');
//JUDGEDASHBOARD
	if($this->session->userdata('user_type')==6)
	{
    $monthQuery2 =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(reg_date) as month_name FROM sc_tbl_misc_case_info WHERE YEAR(reg_date) = YEAR(CURDATE())
    GROUP BY YEAR(reg_date),MONTH(reg_date)"); 
    $yearQuery2 =  $this->db->query("SELECT COUNT(id) as count,YEAR(reg_date) as year FROM sc_tbl_misc_case_info 
    WHERE YEAR(reg_date) != '1970' GROUP BY YEAR(reg_date)"); 
    $data['month_wisereg'] = $monthQuery2->result();
    $data['year_wisereg'] = $yearQuery2->result();
	$data['dzongkhag'] = $this->public->get_all_courts(); 
//////CIVIL
$data['h']= $this->public->cv_count_paro();
$data['b']= $this->public->cv_count_bumthang(); 
$data['c']= $this->public->cv_count_chukha();
$data['p']= $this->public->cv_count_punakha();
$data['d']= $this->public->cv_count_dagana();
$data['g']= $this->public->cv_count_gasa();
$data['haa']= $this->public->cv_count_haa();
$data['t']= $this->public->cv_count_thimphu();
$data['l']= $this->public->cv_count_lhuntse();
$data['m']= $this->public->cv_count_mongar();
$data['pg']= $this->public->cv_count_pg();
$data['sj']= $this->public->cv_count_sj();
$data['sam']= $this->public->cv_count_samtse();
$data['tg']= $this->public->cv_count_tg();
$data['ty']= $this->public->cv_count_ty();
$data['trongsa']= $this->public->cv_count_trongsa();
$data['tsirang']= $this->public->cv_count_tsirang();
$data['wangdi']= $this->public->cv_count_wangdi(); 
$data['z']= $this->public->cv_count_zhemgang();
$data['sarpang']= $this->public->cv_count_sarpang();
//////CRIMINAL
$data['hcr']= $this->public->cr_count_paro();
$data['bcr']= $this->public->cr_count_bumthang();
$data['ccr']= $this->public->cr_count_chukha();
$data['pcr']= $this->public->cr_count_punakha();
$data['dcr']= $this->public->cr_count_dagana();
$data['gcr']= $this->public->cr_count_gasa();
$data['haacr']= $this->public->cr_count_haa();
$data['tcr']= $this->public->cr_count_thimphu();
$data['lcr']= $this->public->cr_count_lhuntse();
$data['mcr']= $this->public->cr_count_mongar();
$data['pgcr']= $this->public->cr_count_pg();
$data['sjcr']= $this->public->cr_count_sj();
$data['samcr']= $this->public->cr_count_samtse();
$data['tgcr']= $this->public->cr_count_tg();
$data['tycr']= $this->public->cr_count_ty();
$data['trongsacr']= $this->public->cr_count_trongsa();
$data['tsirangcr']= $this->public->cr_count_tsirang();
$data['wangdicr']= $this->public->cr_count_wangdi();
$data['zcr']= $this->public->cr_count_zhemgang();
$data['sarpangcr']= $this->public->cr_count_sarpang();
///P/G
$data['op_pg']= $this->public->opening_balance('9');
$data['rd_pg']= $this->public->registered_case('9');
$data['pd_pg']= $this->public->pending_case('9');
$data['dd_pg']= $this->public->decided_case('9');
$data['ap_pg']= $this->public->appealed_to_highcourt('9');
$data['op_ngl']= $this->public->opening_balance('27');
$data['rd_ngl']= $this->public->registered_case('27');
$data['pd_ngl']= $this->public->pending_case('27');
$data['dd_ngl']= $this->public->decided_case('27');
$data['ap_ngl']= $this->public->appealed_to_dzongkhag('27');
//S/J
$data['op_sj']= $this->public->opening_balance('12');
$data['rd_sj']= $this->public->registered_case('12');
$data['pd_sj']= $this->public->pending_case('12');
$data['dd_sj']= $this->public->decided_case('12');
$data['ap_sj']= $this->public->appealed_to_highcourt('12');
$data['op_jt']= $this->public->opening_balance('24');
$data['rd_jt']= $this->public->registered_case('24');
$data['pd_jt']= $this->public->pending_case('24');
$data['dd_jt']= $this->public->decided_case('24');
$data['ap_jt']= $this->public->appealed_to_dzongkhag('24');
$data['op_smd']= $this->public->opening_balance('30');
$data['rd_smd']= $this->public->registered_case('30');
$data['pd_smd']= $this->public->pending_case('30');
$data['dd_smd']= $this->public->decided_case('30');
$data['ap_smd']= $this->public->appealed_to_dzongkhag('30');
//CHUKHA
$data['op_c']= $this->public->opening_balance('2');
$data['rd_c']= $this->public->registered_case('2');
$data['pd_c']= $this->public->pending_case('2');
$data['dd_c']= $this->public->decided_case('2');
$data['ap_c']= $this->public->appealed_to_highcourt('2');
$data['op_pl']= $this->public->opening_balance('28');
$data['rd_pl']= $this->public->registered_case('28');
$data['pd_pl']= $this->public->pending_case('28');
$data['dd_pl']= $this->public->decided_case('28');
$data['ap_pl']= $this->public->appealed_to_dzongkhag('28');

//DAGANA
$data['op_dag']= $this->public->opening_balance('3');
$data['rd_dag']= $this->public->registered_case('3');
$data['pd_dag']= $this->public->pending_case('3');
$data['dd_dag']= $this->public->decided_case('3');
$data['ap_dag']= $this->public->appealed_to_highcourt('3');
$data['op_lhz']= $this->public->opening_balance('25');
$data['rd_lhz']= $this->public->registered_case('25');
$data['pd_lhz']= $this->public->pending_case('25');
$data['dd_lhz']= $this->public->decided_case('25');
$data['ap_lhz']= $this->public->appealed_to_dzongkhag('25');
//HAA
$data['op_haa']= $this->public->opening_balance('5');
$data['rd_haa']= $this->public->registered_case('5');
$data['pd_haa']= $this->public->pending_case('5');
$data['dd_haa']= $this->public->decided_case('5');
$data['ap_haa']= $this->public->appealed_to_highcourt('5');
$data['op_sb']= $this->public->opening_balance('33');
$data['rd_sb']= $this->public->registered_case('33');
$data['pd_sb']= $this->public->pending_case('33');
$data['dd_sb']= $this->public->decided_case('33');
$data['ap_sb']= $this->public->appealed_to_dzongkhag('33');
//PARO
$data['op_paro']= $this->public->opening_balance('10');
$data['rd_paro']= $this->public->registered_case('10');
$data['pd_paro']= $this->public->pending_case('10');
$data['dd_paro']= $this->public->decided_case('10');
$data['ap_paro']= $this->public->appealed_to_highcourt('10');
//GASA
$data['op_gasa']= $this->public->opening_balance('4');
$data['rd_gasa']= $this->public->registered_case('4');
$data['pd_gasa']= $this->public->pending_case('4');
$data['dd_gasa']= $this->public->decided_case('4');
$data['ap_gasa']= $this->public->appealed_to_highcourt('4');
//SAMTSE
$data['op_sam']= $this->public->opening_balance('13');
$data['rd_sam']= $this->public->registered_case('13');
$data['pd_sam']= $this->public->pending_case('13');
$data['dd_sam']= $this->public->decided_case('13');
$data['ap_sam']= $this->public->appealed_to_highcourt('13');
$data['op_tc']= $this->public->opening_balance('32');
$data['rd_tc']= $this->public->registered_case('32');
$data['pd_tc']= $this->public->pending_case('32');
$data['dd_tc']= $this->public->decided_case('32');
$data['ap_tc']= $this->public->appealed_to_dzongkhag('32');
$data['op_do']= $this->public->opening_balance('22');
$data['rd_do']= $this->public->registered_case('22');
$data['pd_do']= $this->public->pending_case('22');
$data['dd_do']= $this->public->decided_case('22');
$data['ap_do']= $this->public->appealed_to_dzongkhag('22');
//THIMPHU
$registration_date = date("Y-m-d", strtotime($this->input->post('reg_date')));
$data['op_thp']= $this->public->opening_balance('17');
$data['rd_thp']= $this->public->registered_case('17');
$data['pd_thp']= $this->public->pending_case('17');
$data['dd_thp']= $this->public->decided_case('17');
$data['ap_thp']= $this->public->appealed_to_highcourt('17');
$data['op_lz']= $this->public->opening_balance('26');
$data['rd_lz']= $this->public->registered_case('26');
$data['pd_lz']= $this->public->pending_case('26');
$data['dd_lz']= $this->public->decided_case('26');
$data['ap_lz']= $this->public->appealed_to_dzongkhag('26');
$data['op_hc']= $this->public->opening_balance('6');
$data['rd_hc']= $this->public->registered_case('6');
$data['pd_hc']= $this->public->pending_case('6');
$data['dd_hc']= $this->public->decided_case('6');
$data['ap_hc']= $this->public->appealed_to_hclb('6');
$data['op_hclb']= $this->public->opening_balance('38');
$data['rd_hclb']= $this->public->registered_case('38');
$data['pd_hclb']= $this->public->pending_case('38');
$data['dd_hclb']= $this->public->decided_case('38');
$data['ap_hclb']= $this->public->appealed_to_sc('38');
$data['op_sc']= $this->public->opening_balance('14');
$data['rd_sc']= $this->public->registered_case('14');
$data['pd_sc']= $this->public->pending_case('14');
$data['dd_sc']= $this->public->decided_case('14');

//T/GANG
$data['op_tg']= $this->public->opening_balance('15');
$data['rd_tg']= $this->public->registered_case('15');
$data['pd_tg']= $this->public->pending_case('15');
$data['dd_tg']= $this->public->decided_case('15');
$data['ap_tg']= $this->public->appealed_to_highcourt('15');
$data['op_sk']= $this->public->opening_balance('31');
$data['rd_sk']= $this->public->registered_case('31');
$data['pd_sk']= $this->public->pending_case('31');
$data['dd_sk']= $this->public->decided_case('31');
$data['ap_sk']= $this->public->appealed_to_dzongkhag('31');
$data['op_tm']= $this->public->opening_balance('34');
$data['rd_tm']= $this->public->registered_case('34');
$data['pd_tm']= $this->public->pending_case('34');
$data['dd_tm']= $this->public->decided_case('34');
$data['ap_tm']= $this->public->appealed_to_dzongkhag('34');
$data['op_wm']= $this->public->opening_balance('35');
$data['rd_wm']= $this->public->registered_case('35');
$data['pd_wm']= $this->public->pending_case('35');
$data['dd_wm']= $this->public->decided_case('35');
$data['ap_wm']= $this->public->appealed_to_dzongkhag('35');
//MONGAR
$data['op_m']= $this->public->opening_balance('8');
$data['rd_m']= $this->public->registered_case('8');
$data['pd_m']= $this->public->pending_case('8');
$data['dd_m']= $this->public->decided_case('8');
$data['ap_m']= $this->public->appealed_to_highcourt('8');
$data['op_w']= $this->public->opening_balance('36');
$data['rd_w']= $this->public->registered_case('36');
$data['pd_w']= $this->public->pending_case('36');
$data['dd_w']= $this->public->decided_case('36');
$data['ap_w']= $this->public->appealed_to_dzongkhag('36');
//ZHEMGANG
$data['op_zm']= $this->public->opening_balance('21');
$data['rd_zm']= $this->public->registered_case('21');
$data['pd_zm']= $this->public->pending_case('21');
$data['dd_zm']= $this->public->decided_case('21');
$data['ap_zm']= $this->public->appealed_to_highcourt('21');
$data['op_pb']= $this->public->opening_balance('29');
$data['rd_pb']= $this->public->registered_case('29');
$data['pd_pb']= $this->public->pending_case('29');
$data['dd_pb']= $this->public->decided_case('29');
$data['ap_pb']= $this->public->appealed_to_dzongkhag('29');
//T/YANGTSE
$data['op_ty']= $this->public->opening_balance('16');
$data['rd_ty']= $this->public->registered_case('16');
$data['pd_ty']= $this->public->pending_case('16');
$data['dd_ty']= $this->public->decided_case('16');
$data['ap_ty']= $this->public->appealed_to_highcourt('16');
//w/PHODRANG
$data['op_wp']= $this->public->opening_balance('20');
$data['rd_wp']= $this->public->registered_case('20');
$data['pd_wp']= $this->public->pending_case('20');
$data['dd_wp']= $this->public->decided_case('20');
$data['ap_wp']= $this->public->appealed_to_highcourt('20');
//TRONGSA
$data['op_trg']= $this->public->opening_balance('18');
$data['rd_trg']= $this->public->registered_case('18');
$data['pd_trg']= $this->public->pending_case('18');
$data['dd_trg']= $this->public->decided_case('18');
$data['ap_trg']= $this->public->appealed_to_highcourt('18');
//TSIRANG
$data['op_tsi']= $this->public->opening_balance('19');
$data['rd_tsi']= $this->public->registered_case('19');
$data['pd_tsi']= $this->public->pending_case('19');
$data['dd_tsi']= $this->public->decided_case('19');
$data['ap_tsi']= $this->public->appealed_to_highcourt('19');
//BUMTHANG
$data['op_bt']= $this->public->opening_balance('1');
$data['rd_bt']= $this->public->registered_case('1');
$data['pd_bt']= $this->public->pending_case('1');
$data['dd_bt']= $this->public->decided_case('1');
$data['ap_bt']= $this->public->appealed_to_highcourt('1');
//LHUNTSE
$data['op_lhun']= $this->public->opening_balance('7');
$data['rd_lhun']= $this->public->registered_case('7');
$data['pd_lhun']= $this->public->pending_case('7');
$data['dd_lhun']= $this->public->decided_case('7');
$data['ap_lhun']= $this->public->appealed_to_highcourt('7');
//SARPANG
$data['op_sap']= $this->public->opening_balance('37');
$data['rd_sap']= $this->public->registered_case('37');
$data['pd_sap']= $this->public->pending_case('37');
$data['dd_sap']= $this->public->decided_case('37');
$data['ap_sap']= $this->public->appealed_to_highcourt('37');
$data['op_gp']= $this->public->opening_balance('23');
$data['rd_gp']= $this->public->registered_case('23');
$data['pd_gp']= $this->public->pending_case('23');
$data['dd_gp']= $this->public->decided_case('23');
$data['ap_gp']= $this->public->appealed_to_dzongkhag('23');
//PUNAKHA
$data['op_pu']= $this->public->opening_balance('11');
$data['rd_pu']= $this->public->registered_case('11');
$data['pd_pu']= $this->public->pending_case('11');
$data['dd_pu']= $this->public->decided_case('11');
$data['ap_pu']= $this->public->appealed_to_highcourt('11');

$data['current_total_case'] = count($this->public->current_total_case());
$data['current_total_decided'] = $this->public->current_total_decided();
$data['current_total_pending'] = $this->public->current_total_pending();
$data['current_total_active'] = count($this->public->current_total_active());
$data['current_total_assigned'] = count($this->public->current_total_assigned());
$this->load->view('elitigation/header1_cj');
$this->load->view('elitigation/elitigation_dashboard_cj',$data);
$this->load->view('elitigation/footer');
	} 


			  }    
			 else
			 {
				$login['login_class'] = 'failure';
				$login['login_msg']   = '<font color=red>Invalid username / password.</font>';
				$this->session->set_flashdata($login);
				$this->load->view('elitigation/header');
				$this->load->view('elitigation/elitigation_login');
				$this->load->view('elitigation/footer');
			 }
			 
		 }

	 function passwordAuthenticator($uid)
	 { 
            date_default_timezone_set("Asia/Dhaka");
            $datebht = date("Y-m-d H:i:s");
      
	    $otp = rand(100000,999999);
	    $insert_data['otp_no']=$otp;
	    $insert_data['otp_expiry']='0';
	    $insert_data['otp_dated']=$datebht;
            $this->db->insert('sc_tbl_otp', $insert_data);

////
	    $tom = trim($this->elat->get_mobile($uid));
            $mmsg = urlencode("The OTP is valid for 15 minutes.Your OTP is $otp");
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to='.$tom.'&msg='.$mmsg.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
////

	    $to=$this->elat->get_email($uid);
	    $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "OTP For Account Verification";
            $message = "Your OTP is $otp";
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
             if ($this->email->send()) {
            //echo 'Your Email has successfully been sent.';
            } else {
				?>
				<script type="text/javascript">
				   alert("Could not Reach SMPT server, eMail not sent");
				</script>
				<?php
            }
			 $this->load->view('elitigation/header');
			 $this->load->view('passwordAuthenticator');
			 $this->session->set_flashdata('message',"<div style='color:red;'>INVALID OTP/EXPIRED OTP.<div>");
			 $this->load->view('elitigation/footer');
		 }
	    function passwordAuthenticating($uid) 
	    { 
		date_default_timezone_set("Asia/Dhaka");
                $datebht = date("Y-m-d H:i:s");
               
                $otp_no=$this->input->post('otp_no');
	        $count = $this->db->where(['otp_no'=>$otp_no])->where(['otp_expiry'=>'0'])->where('DATE_ADD(otp_dated,INTERVAL 15 MINUTE) >','NOW()', FALSE)->from("sc_tbl_otp")->count_all_results();
           
            if($count == '1')
            {
             $data = array('otp_expiry' => '1');
             $this->db->where('otp_no', $otp_no);
             $this->db->update('sc_tbl_otp', $data);

             $userid = array('pwdchange_status' => '2');
             $this->db->where('id', $uid);
             $this->db->update('sc_tbl_user_profile', $userid);

		       /*$this->load->view('elitigation/header1');
			 $this->load->view('elitigation/elitigation_dashboard');
			 $this->load->view('elitigation/footer');
                       */
                       $this->load->view('elitigation/header1');
                       if($this->session->userdata('user_type')==12 || $this->session->userdata('user_type')==13 || $this->session->userdata('user_type')==15)
			     {
			     $this->load->view('elitigation/elitigation_dashboard');
	                     }  
				
			     if($this->session->userdata('user_type')==14)
			     {
			     $this->load->view('elitigation/defendant/elitigation_dashboard_respondent');
			     }  
		        $this->load->view('elitigation/footer');

            }
            else
            {
	         $this->load->view('elitigation/header');
	         $this->load->view('passwordAuthenticator');
	         $this->session->set_flashdata('message',"<div style='color:red;'>INVALID OTP/EXPIRED OTP.<div>");
			 $this->load->view('elitigation/footer');
			
            }
		 	
		 }

		 function changePasswordelat($email)
		 {
			 $data['email'] = $email;
			 $this->load->view('changePasswordelat', $data);
			 $this->load->view('elitigation/footer');
		 }
		 
		 function changePasswordCmis($userid)
		 {
			 $data['userid'] = $userid;
			 $this->load->view('changepasswordcmis.php', $data);
			 
		 }
		 
		  function passwordChangeElat()
		 {
			 $data['email'] = $this->input->post('email');
		$rules = array(
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required',
			],
			[
				'field' => 'new_password',
				'label' => 'New Password',
				'rules' => 'callback_valid_password',
			],
			[
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'matches[new_password]',
			],
		);
		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('changePasswordelat', $data);
		    $this->load->view('elitigation/footer');
		} else {
            $pwdchange_status = $this->input->post('pwdchange_status');
			$email = $this->input->post('email');
			$password = $this->input->post('confirm_password');
            $uid = $this->session->userdata('user_id');
            $newPassword = md5($password);
	    $data = array(
	        'password' => $newPassword,
		'pwdchange_status' => $pwdchange_status
		);
		$this->db->where('id', $this->session->userdata('user_id'));
		$this->db->update('sc_tbl_user_profile', $data);
		$login['login_class'] = 'failure';
		$login['login_msg']   = '<font color=green>password Successfully Updated, Please Login</font>';
		$this->session->set_flashdata($login);
		$this->session->set_userdata('logged_in', FALSE);
		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/elitigation_login');
		$this->load->view('elitigation/footer');
			
	    	}
			 
		 }

    function passwordChangeCmis()
		 {
			$data['email'] = $this->input->post('email');
		    $rules = array(
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required',
			],
			[
				'field' => 'new_password',
				'label' => 'New Password',
				'rules' => 'callback_valid_password',
			],
			[
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'matches[new_password]',
			],
		);
		$this->form_validation->set_rules($rules);


		if ($this->form_validation->run() == FALSE) {
			$data['userid'] = $this->input->post('userid');
			$this->load->view('changepasswordcmis', $data);
		    
		} else {
            $uid = $this->input->post('userid');
			$email = $this->input->post('email');
			$mobileno = $this->input->post('mobileno');
			$password = $this->input->post('confirm_password');
            $newPassword = md5($password);
	        $data = array(
	        'password' => $newPassword,
			'email' => $email,
			'contact' => $mobileno,
		    'pwdchange_status' => '2'
		);
		$this->db->where('id', $uid);
		$this->db->update('sc_tbl_user_profile', $data);
		$login['login_class'] = 'failure';
		$login['login_msg']   = '<font color=green>password Successfully Updated, Please Login</font>';
		$this->session->set_flashdata($login);
		$this->session->set_userdata('logged_in', FALSE);
		$this->load->view('welcome_message', $data);
			
		}
			 
			 
		 }

       public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>à¸¢à¸‡~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>à¸¢à¸‡~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}

	 function changePassword()
		 {
			 $this->load->view('header');
			 $this->load->view('changePassword');
			 $this->load->view('footer');
		 }
		 
   function passwordChange()
		 {
			  $old_pass=$this->input->post('old_pass');
			 $new_pass1=$this->input->post('new_pass1');
			 $new_pass2=$this->input->post('new_pass2');
			 $pass=$new_pass1;
			  $this->db->where("id",$this->session->userdata('user_id'));
				$query=$this->db->get("sc_tbl_user_profile");
				if($query->num_rows()>0)
				{
					foreach($query->result() as $rows)
					{
						$password=$rows->password;
					}
				}
			 if($password==md5($old_pass))
			 {
				 if($pass==$new_pass2)
				 {
					 $newPassword=md5($new_pass1);
					 
					$data = array(
						   'password' => $newPassword
						);

					$this->db->where('id', $this->session->userdata('user_id'));
					$this->db->update('sc_tbl_user_profile', $data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'Password Sucessfully Updated');
				 }
				 else
				 {
					 $this->session->set_flashdata('asset_class', 'error');
				     $this->session->set_flashdata('asset_msg', 'New Password did not match.');
				 }
			 }
			 else
			 {
				$this->session->set_flashdata('asset_class', 'error');
				$this->session->set_flashdata('asset_msg', 'Invalid Old Password.');
			 }
			 
			 $this->load->view('header');
			 $this->load->view('changePassword');
			 $this->load->view('footer');
		 }
	function log_out()
		 {
			  //$this->session->set_userdata('Logged_in');
			  $this->session->set_userdata('logged_in', FALSE);
			  //$this->index();
                          redirect('welcome/cmis');
		 }
 
           function log_out_elat()
                 {
                          //$this->session->set_userdata('Logged_in');
                          $this->session->set_userdata('logged_in', FALSE);
                          //$this->index();
                          redirect('welcome/elitigation');
                 }
				 
	function log_out_elat_cjb()
                 {
                          //$this->session->set_userdata('Logged_in');
                          $this->session->set_userdata('logged_in', FALSE);
                          //$this->index();
                          redirect('welcome');
                 }			 

/////SEARCH
function date_search()
{    
     $data['dzongkhag'] = $this->public->get_all_courts(); 
	//CIVIL
	 $data['h123']= $this->public->cv_count123();
	 $data['hbum']= $this->public->cv_countbum();
	 $data['hchk']= $this->public->cv_countchk();
	 $data['hpun']= $this->public->cv_countpun();
	 $data['hdag']= $this->public->cv_countdag();
	 $data['hgas']= $this->public->cv_countgas();
	 $data['hhaa']= $this->public->cv_counthaa();
	 $data['hthi']= $this->public->cv_countthi();
	 $data['hlhu']= $this->public->cv_countlhu();
	 $data['hmon']= $this->public->cv_countmon();
	 $data['hpema']= $this->public->cv_countpema();
	 $data['hsjon']= $this->public->cv_countsjon();
	 $data['hsts']= $this->public->cv_countsts();
	 $data['htashi']= $this->public->cv_counttashi();
	 $data['htyang']= $this->public->cv_counttyang();
	 $data['htong']= $this->public->cv_counttong();
	 $data['htsir']= $this->public->cv_counttsir();
	 $data['hwdue']= $this->public->cv_countwdue();
	 $data['hzga']= $this->public->cv_countzga();
	 $data['hsarp']= $this->public->cv_countsarp();
	//CRIMINAL
	 $data['rh123']= $this->public->cr_count123();
	 $data['rhbum']= $this->public->cr_countbum();
	 $data['rhchk']= $this->public->cr_countchk();
	 $data['rhpun']= $this->public->cr_countpun();
	 $data['rhdag']= $this->public->cr_countdag();
	 $data['rhgas']= $this->public->cr_countgas();
	 $data['rhhaa']= $this->public->cr_counthaa();
	 $data['rhthi']= $this->public->cr_countthi();
	 $data['rhlhu']= $this->public->cr_countlhu();
	 $data['rhmon']= $this->public->cr_countmon();
	 $data['rhpema']= $this->public->cr_countpema();
	 $data['rhsjon']= $this->public->cr_countsjon();
	 $data['rhsts']= $this->public->cr_countsts();
	 $data['rhtashi']= $this->public->cr_counttashi();
	 $data['rhtyang']= $this->public->cr_counttyang();
	 $data['rhtong']= $this->public->cr_counttong();
	 $data['rhtsir']= $this->public->cr_counttsir();
	 $data['rhwdue']= $this->public->cr_countwdue();
	 $data['rhzga']= $this->public->cr_countzga();
	 $data['rhsarp']= $this->public->cr_countsarp();
	//totalcountcivil
	 $fromdate = $this->input->post('fromdate');
     $todate = $this->input->post('todate');
	 $dzongkhag = $this->input->post('dzongkhag');
	 $data['totcv']= $this->public->cv_counttotal($fromdate, $todate, $dzongkhag);
	 $data['totcr']= $this->public->cr_counttotal($fromdate, $todate, $dzongkhag);
     $data['criminal']= $this->public->courtwise_total_criminal_details_search($fromdate, $todate, $dzongkhag);
	 $data['civil']= $this->public->courtwise_total_civil_details_search($fromdate, $todate, $dzongkhag);
     $data['fromdate'] = $this->input->post('fromdate');
     $data['todate'] = $this->input->post('todate'); 
     
     $this->load->view('elitigation/header1_cj');
     $this->load->view('elitigation/elitigation_dashboard_cj_datesearch',$data);
     $this->load->view('elitigation/footer');
}
function dashboard_cj()
{
//
    $monthQuery2 =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(reg_date) as month_name FROM sc_tbl_misc_case_info WHERE YEAR(reg_date) = YEAR(CURDATE()) GROUP BY YEAR(reg_date),MONTH(reg_date)"); 
    $yearQuery2 =  $this->db->query("SELECT COUNT(id) as count,YEAR(reg_date) as year FROM sc_tbl_misc_case_info GROUP BY YEAR(reg_date)"); 
    $data['month_wisereg'] = $monthQuery2->result();
    $data['year_wisereg'] = $yearQuery2->result();
//
//////CIVIL
$data['h']= $this->public->cv_count_paro();
$data['b']= $this->public->cv_count_bumthang();
$data['c']= $this->public->cv_count_chukha();
$data['p']= $this->public->cv_count_punakha();
$data['d']= $this->public->cv_count_dagana();
$data['g']= $this->public->cv_count_gasa();
$data['haa']= $this->public->cv_count_haa();
$data['t']= $this->public->cv_count_thimphu();
$data['l']= $this->public->cv_count_lhuntse();
$data['m']= $this->public->cv_count_mongar();
$data['pg']= $this->public->cv_count_pg();
$data['sj']= $this->public->cv_count_sj();
$data['sam']= $this->public->cv_count_samtse();
$data['tg']= $this->public->cv_count_tg();
$data['ty']= $this->public->cv_count_ty();
$data['trongsa']= $this->public->cv_count_trongsa();
$data['tsirang']= $this->public->cv_count_tsirang();
$data['wangdi']= $this->public->cv_count_wangdi();
$data['z']= $this->public->cv_count_zhemgang();
$data['sarpang']= $this->public->cv_count_sarpang();
//////CRIMINAL
$data['hcr']= $this->public->cr_count_paro();
$data['bcr']= $this->public->cr_count_bumthang();
$data['ccr']= $this->public->cr_count_chukha();
$data['pcr']= $this->public->cr_count_punakha();
$data['dcr']= $this->public->cr_count_dagana();
$data['gcr']= $this->public->cr_count_gasa();
$data['haacr']= $this->public->cr_count_haa();
$data['tcr']= $this->public->cr_count_thimphu();
$data['lcr']= $this->public->cr_count_lhuntse();
$data['mcr']= $this->public->cr_count_mongar();
$data['pgcr']= $this->public->cr_count_pg();
$data['sjcr']= $this->public->cr_count_sj();
$data['samcr']= $this->public->cr_count_samtse();
$data['tgcr']= $this->public->cr_count_tg();
$data['tycr']= $this->public->cr_count_ty();
$data['trongsacr']= $this->public->cr_count_trongsa();
$data['tsirangcr']= $this->public->cr_count_tsirang();
$data['wangdicr']= $this->public->cr_count_wangdi();
$data['zcr']= $this->public->cr_count_zhemgang();
$data['sarpangcr']= $this->public->cr_count_sarpang();
///P/G
$data['rg1_pg']= $this->public->rg1_pg();
$data['rg1_ngl']= $this->public->rg1_ngl();
$data['s1_pg']= $this->public->s1_pg();
$data['s1_ngl']= $this->public->s1_ngl();
$data['s3_pg']= $this->public->s3_pg();
$data['s3_ngl']= $this->public->s3_ngl();
$data['s4_pg']= $this->public->s4_pg();
$data['s4_ngl']= $this->public->s4_ngl();
$data['s2_pg']= $this->public->s2_pg();
$data['s2_ngl']= $this->public->s2_ngl();
$data['s5_pg']= $this->public->s5_pg();
$data['s5_ngl']= $this->public->s5_ngl();
//S/J
$data['rg1_sj']= $this->public->rg1_sj();
$data['rg1_jt']= $this->public->rg1_jt();
$data['rg1_sc']= $this->public->rg1_sc();
$data['s1_sj']= $this->public->s1_sj();
$data['s1_jt']= $this->public->s1_jt();
$data['s1_sc']= $this->public->s1_sc();
$data['s3_sj']= $this->public->s3_sj();
$data['s3_jt']= $this->public->s3_jt();
$data['s3_sc']= $this->public->s3_sc();
$data['s4_sj']= $this->public->s4_sj();
$data['s4_jt']= $this->public->s4_jt();
$data['s4_sc']= $this->public->s4_sc();
$data['s2_sj']= $this->public->s2_sj();
$data['s2_jt']= $this->public->s2_jt();
$data['s2_sc']= $this->public->s2_sc();
$data['s5_sj']= $this->public->s5_sj();
$data['s5_jt']= $this->public->s5_jt();
$data['s5_sc']= $this->public->s5_sc();
//CHUKHA
$data['rg1_c']= $this->public->rg1_c();
$data['rg1_pl']= $this->public->rg1_pl();
$data['s1_c']= $this->public->s1_c();
$data['s1_pl']= $this->public->s1_pl();
$data['s3_c']= $this->public->s3_c();
$data['s3_pl']= $this->public->s3_pl();
$data['s4_c']= $this->public->s4_c();
$data['s4_pl']= $this->public->s4_pl();
$data['s2_c']= $this->public->s2_c();
$data['s2_pl']= $this->public->s2_pl();
$data['s5_c']= $this->public->s5_c();
$data['s5_pl']= $this->public->s5_pl();
//DAGANA

$data['rg1_dag']= $this->public->rg1_dag();
$data['rg1_lz']= $this->public->rg1_lz();
$data['s1_dag']= $this->public->s1_dag();
$data['s1_lz']= $this->public->s1_lz();
$data['s3_dag']= $this->public->s3_dag();
$data['s3_lz']= $this->public->s3_lz();
$data['s4_dag']= $this->public->s4_dag();
$data['s4_lz']= $this->public->s4_lz();
$data['s2_dag']= $this->public->s2_dag();
$data['s2_lz']= $this->public->s2_lz();
$data['s5_dag']= $this->public->s5_dag();
$data['s5_lz']= $this->public->s5_lz();
//HAA
$data['rg1_ha']= $this->public->rg1_ha();
$data['rg1_sb']= $this->public->rg1_sb();
$data['s1_ha']= $this->public->s1_ha();
$data['s1_sb']= $this->public->s1_sb();
$data['s3_ha']= $this->public->s3_ha();
$data['s3_sb']= $this->public->s3_sb();
$data['s4_ha']= $this->public->s4_ha();
$data['s4_sb']= $this->public->s4_sb();
$data['s2_ha']= $this->public->s2_ha();
$data['s2_sb']= $this->public->s2_sb();
$data['s5_ha']= $this->public->s5_ha();
$data['s5_sb']= $this->public->s5_sb();
//PARO
$data['rg1_paro']= $this->public->rg1_paro();
$data['s1_paro']= $this->public->s1_paro();
$data['s3_paro']= $this->public->s3_paro();
$data['s4_paro']= $this->public->s4_paro();
$data['s2_paro']= $this->public->s2_paro();
$data['s5_paro']= $this->public->s5_paro();
//GASA
$data['rg1_ga']= $this->public->rg1_ga();
$data['s1_ga']= $this->public->s1_ga();
$data['s3_ga']= $this->public->s3_ga();
$data['s4_ga']= $this->public->s4_ga();
$data['s2_ga']= $this->public->s2_ga();
$data['s5_ga']= $this->public->s5_ga();
//SAMTSE
$data['rg1_sam']= $this->public->rg1_sam();
$data['rg1_dr']= $this->public->rg1_dr();
$data['rg1_ss']= $this->public->rg1_ss();
$data['s1_sam']= $this->public->s1_sam();
$data['s1_dr']= $this->public->s1_dr();
$data['s1_ss']= $this->public->s1_ss();
$data['s3_sam']= $this->public->s3_sam();
$data['s3_dr']= $this->public->s3_dr();
$data['s3_ss']= $this->public->s3_ss();
$data['s4_sam']= $this->public->s4_sam();
$data['s4_dr']= $this->public->s4_dr();
$data['s4_ss']= $this->public->s4_ss();
$data['s2_sam']= $this->public->s2_sam();
$data['s2_dr']= $this->public->s2_dr();
$data['s2_ss']= $this->public->s2_ss();
$data['s5_sam']= $this->public->s5_sam();
$data['s5_dr']= $this->public->s5_dr();
$data['s5_ss']= $this->public->s5_ss();
//THIMPHU
$data['rg1_th']= $this->public->rg1_th();
$data['rg1_lh']= $this->public->rg1_lh();
$data['s1_th']= $this->public->s1_th();
$data['s1_lh']= $this->public->s1_lh();
$data['s3_th']= $this->public->s3_th();
$data['s3_lh']= $this->public->s3_lh();
$data['s4_th']= $this->public->s4_th();
$data['s4_lh']= $this->public->s4_lh();
$data['s2_th']= $this->public->s2_th();
$data['s2_lh']= $this->public->s2_lh();
$data['s5_th']= $this->public->s5_th();
$data['s5_lh']= $this->public->s5_lh();
$data['rg1_suc']= $this->public->rg1_suc();
$data['rg1_hc']= $this->public->rg1_hc();
$data['rg1_hclb']= $this->public->rg1_hclb();
$data['s1_suc']= $this->public->s1_suc();
$data['s1_hc']= $this->public->s1_hc();
$data['s1_hclb']= $this->public->s1_hclb();
$data['s3_suc']= $this->public->s3_suc();
$data['s3_hc']= $this->public->s3_hc();
$data['s3_hclb']= $this->public->s3_hclb();
$data['s4_suc']= $this->public->s4_suc();
$data['s4_hc']= $this->public->s4_hc();
$data['s4_hclb']= $this->public->s4_hclb();
$data['s2_suc']= $this->public->s2_suc();
$data['s2_hc']= $this->public->s2_hc();
$data['s2_hclb']= $this->public->s2_hclb();
$data['s5_suc']= $this->public->s5_suc();
$data['s5_hc']= $this->public->s5_hc();
$data['s5_hclb']= $this->public->s5_hclb();
//T/GANG
$data['rg1_tg']= $this->public->rg1_tg();
$data['rg1_sk']= $this->public->rg1_sk();
$data['rg1_tm']= $this->public->rg1_tm();
$data['rg1_wm']= $this->public->rg1_wm();
$data['s1_tg']= $this->public->s1_tg();
$data['s1_sk']= $this->public->s1_sk();
$data['s1_tm']= $this->public->s1_tm();
$data['s1_wm']= $this->public->s1_wm();
$data['s3_tg']= $this->public->s3_tg();
$data['s3_sk']= $this->public->s3_sk();
$data['s3_tm']= $this->public->s3_tm();
$data['s3_wm']= $this->public->s3_wm();
$data['s4_tg']= $this->public->s4_tg();
$data['s4_sk']= $this->public->s4_sk();
$data['s4_tm']= $this->public->s4_tm();
$data['s4_wm']= $this->public->s4_wm();
$data['s2_tg']= $this->public->s2_tg();
$data['s2_sk']= $this->public->s2_sk();
$data['s2_tm']= $this->public->s2_tm();
$data['s2_wm']= $this->public->s2_wm();
$data['s5_tg']= $this->public->s5_tg();
$data['s5_sk']= $this->public->s5_sk();
$data['s5_tm']= $this->public->s5_tm();
$data['s5_wm']= $this->public->s5_wm();
//MONGAR
$data['rg1_m']= $this->public->rg1_m();
$data['rg1_w']= $this->public->rg1_w();
$data['s1_m']= $this->public->s1_m();
$data['s1_w']= $this->public->s1_w();
$data['s3_m']= $this->public->s3_m();
$data['s3_w']= $this->public->s3_w();
$data['s4_m']= $this->public->s4_m();
$data['s4_w']= $this->public->s4_w();
$data['s2_m']= $this->public->s2_m();
$data['s2_w']= $this->public->s2_w();
$data['s5_m']= $this->public->s5_m();
$data['s5_w']= $this->public->s5_w();
//ZHEMGANG
$data['rg1_zm']= $this->public->rg1_zm();
$data['rg1_pb']= $this->public->rg1_pb();
$data['s1_zm']= $this->public->s1_zm();
$data['s1_pb']= $this->public->s1_pb();
$data['s3_zm']= $this->public->s3_zm();
$data['s3_pb']= $this->public->s3_pb();
$data['s4_zm']= $this->public->s4_zm();
$data['s4_pb']= $this->public->s4_pb();
$data['s2_zm']= $this->public->s2_zm();
$data['s2_pb']= $this->public->s2_pb();
$data['s5_zm']= $this->public->s5_zm();
$data['s5_pb']= $this->public->s5_pb();
//T/YANGTSE
$data['rg1_ty']= $this->public->rg1_ty();
$data['s1_ty']= $this->public->s1_ty();
$data['s3_ty']= $this->public->s3_ty();
$data['s4_ty']= $this->public->s4_ty();
$data['s2_ty']= $this->public->s2_ty();
$data['s5_ty']= $this->public->s5_ty();
//w/PHODRANG
$data['rg1_wp']= $this->public->rg1_wp();
$data['s1_wp']= $this->public->s1_wp();
$data['s3_wp']= $this->public->s3_wp();
$data['s4_wp']= $this->public->s4_wp();
$data['s2_wp']= $this->public->s2_wp();
$data['s5_wp']= $this->public->s5_wp();
//TRONGSA
$data['op_trg']= $this->public->op_trg();
$data['rg1_trg']= $this->public->rg1_trg();
$data['s1_trg']= $this->public->s1_trg();
$data['s3_trg']= $this->public->s3_trg();
$data['s4_trg']= $this->public->s4_trg();
$data['s2_trg']= $this->public->s2_trg();
$data['s5_trg']= $this->public->s5_trg();
//TSIRANG
$data['rg1_tsr']= $this->public->rg1_tsr();
$data['s1_tsr']= $this->public->s1_tsr();
$data['s3_tsr']= $this->public->s3_tsr();
$data['s4_tsr']= $this->public->s4_tsr();
$data['s2_tsr']= $this->public->s2_tsr();
$data['s5_tsr']= $this->public->s5_tsr();
//BUMTHANG
$data['rg1_bt']= $this->public->rg1_bt();
$data['s1_bt']= $this->public->s1_bt();
$data['s3_bt']= $this->public->s3_bt();
$data['s4_bt']= $this->public->s4_bt();
$data['s2_bt']= $this->public->s2_bt();
$data['s5_bt']= $this->public->s5_bt();
//LHUNTSE
$data['rg1_lhun']= $this->public->rg1_lhun();
$data['s1_lhun']= $this->public->s1_lhun();
$data['s3_lhun']= $this->public->s3_lhun();
$data['s4_lhun']= $this->public->s4_lhun();
$data['s2_lhun']= $this->public->s2_lhun();
$data['s5_lhun']= $this->public->s5_lhun();
//SARPANG
$data['op_sp']= $this->public->op_sp();
$data['op_gp']= $this->public->op_gp();
$data['rg1_sp']= $this->public->rg1_sp();
$data['rg1_gp']= $this->public->rg1_gp();
$data['s1_sp']= $this->public->s1_sp();
$data['s1_gp']= $this->public->s1_gp();
$data['s3_sp']= $this->public->s3_sp();
$data['s3_gp']= $this->public->s3_gp();
$data['s4_sp']= $this->public->s4_sp();
$data['s4_gp']= $this->public->s4_gp();
$data['s2_sp']= $this->public->s2_sp();
$data['s2_gp']= $this->public->s2_gp();
$data['s5_sp']= $this->public->s5_sp();
$data['s5_gp']= $this->public->s5_gp();
//PUNAKHA

$data['rg1_pu']= $this->public->rg1_pu();
$data['s1_pu']= $this->public->s1_pu();
$data['s3_pu']= $this->public->s3_pu();
$data['s4_pu']= $this->public->s4_pu();
$data['s2_pu']= $this->public->s2_pu();
$data['s5_pu']= $this->public->s5_pu();

      $this->load->view('elitigation/header1_cj');
      $this->load->view('elitigation/elitigation_dashboard_cj',$data);
      $this->load->view('elitigation/footer');
}
function trafficlight($id)
{
	 $data['id'] = $id;	 
	 $data['threemonth']= $this->public->trafficlight_3month();
	 $data['threemonthtotal']= $this->public->trafficlight_3monthtotal();
	 $data['sixmonth']= $this->public->trafficlight_6month();
	 $data['sixmonthtotal']= $this->public->trafficlight_6monthtotal();
	 $data['ninemonth']= $this->public->trafficlight_9month();
	 $data['ninemonthtotal']= $this->public->trafficlight_9monthtotal();
	 $data['twlmonth']= $this->public->trafficlight_12month();
	 $data['twlmonthtotal']= $this->public->trafficlight_12monthtotal();
	 $this->load->view('elitigation/header1_cj');
	 $this->load->view('elitigation/elitigation_dashboard_cj_trafficlight',$data);
	 $this->load->view('elitigation/footer');
}
function casetype($id)
{    
     $data['id'] = $id;	 
	 $data['totalcase_civil']= $this->public->courtwise_total_civil($id);
	 $data['totalcase_criminal']= $this->public->courtwise_total_criminal($id);
	 $data['criminal']= $this->public->courtwise_total_criminal_details($id);
	 $data['civil']= $this->public->courtwise_total_civil_details($id);
	 
	 $this->load->view('elitigation/header1_cj');
	 $this->load->view('elitigation/elitigation_dashboard_cj_casetype',$data);
	 $this->load->view('elitigation/footer');
}

///////

		 
}

?>


