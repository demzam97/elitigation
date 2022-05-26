<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		
    }
	function check_user_exists($cidno) 
		{
		  $this->db->select('*');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('CID',$cidno);
	      $query = $this->db->get();
	      return ($query->result_array()); 
		 
		}
	function get_user_cid($cidno) 
		{
		  $this->db->select('CID');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('CID',$cidno);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->CID;	
	      }else{
	   		return false;
		 }
		 
		}	
		
	function check_user_exists_lawyer($cidno) 
		{
		  $this->db->select('*');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('CID',$cidno);
		  $this->db->where('user_type', '13');
	      $query = $this->db->get();
	      return ($query->result_array()); 
		 
		}	

		function get_user_type($cidno) 
		{
		  $this->db->select('user_type');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('CID',$cidno);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->user_type;	
	      }else{
	   		return false;
		 }
		 
		}

       function get_user_id($cidno) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('CID',$cidno);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		 }
		 
		}	

	function get_user_name($uid) 
		{
		  $this->db->select('judge_name');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->judge_name;	
	      }else{
	   		return false;
		 }
		 
		}

         function get_user_contact($uid) 
		{
		  $this->db->select('contact');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->contact;	
	      }else{
	   		return false;
		 }
		 
		}

	function check_valid_user() 
		{
			if($this->session->userdata('Logged_in')!="Yes")
			{
				redirect('welcome');
			}
			//loading previlages
			$page = $_SERVER["PHP_SELF"];
			$page = explode('/',$page);
			
		}
		function check_valid_user_elat() 
		{
			if($this->session->userdata('Logged_in')!="Yes")
			{ echo 
				$login['login_class'] = 'failure';
				$login['login_msg']   = '<font color=red>Your Session Expired</font>';
				$this->session->set_flashdata($login);
				redirect('welcome/elitigation');
			}
			//loading previlages
			$page = $_SERVER["PHP_SELF"];
			$page = explode('/',$page);
			
		}
	function get_user($username, $password)
     {
        $this->db->where("user_name",$username);
        $this->db->where("password",$password);
        $query=$this->db->get("sc_tbl_user_profile");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->id,
                    	'user_name' 	=> $rows->judge_name,
		                'user_type'    => $rows->user_type,
						'court_id'    => $rows->court,
						'court_type'    => $rows->court_type,
						'bench'    => $rows->bench,
						'dzongkhag'    => $rows->dzongkhag,
						'dungkhag'    => $rows->dungkhag,
						'court_abb'    => $rows->court_abb,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
				$this->session->set_userdata('Logged_in','Yes');
                return true;            
		}
		
		return false;
	 }
	 
	 function get_user_elat($username, $password)
     {
        $this->db->where("user_name",$username);
        $this->db->where("password",$password);
        $query=$this->db->get("sc_tbl_user_profile");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' => $rows->id,
                    	        'user_name' => $rows->judge_name,
                                'email' => $rows->user_name,
		                'user_type' => $rows->user_type,
	                        'logged_in' => TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
				$this->session->set_userdata('Logged_in','Yes');
                return true;            
		}
		
		return false;
	 }
	 
	 function get_password_status($uid) 
		{
		  $this->db->select('pwdchange_status');
	      $this->db->from('sc_tbl_user_profile');
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->pwdchange_status;	
	      }else{
	   		return false;
		 }
		 
		}

		 function check_otp_no($otp) 
		{
		  $this->db->select('otp_no');
	      $this->db->from('sc_tbl_otp');
	      $this->db->where('otp_no',$otp);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->otp_no;	
	      }else{
	   		return false;
		 }
		 
		}

		////
		function get_user_email($uid) 
		{
		  $this->db->select('user_name');
	      $this->db->from('sc_tbl_user_profile'); 
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->user_name;	
	      }else{
	   		return false;
		 }
		 
		}

	function get_user_profile($eid)
	{
	   $this->db->select('*');
	   $this->db->from('elat_tbl_bht_registrations');
	   $this->db->where('email',$eid);
	   $query = $this->db->get();
	   return ($query->result_array());     	
	 }

    function get_user_profile_nonbht($eid)
	{
	   $this->db->select('*');
	   $this->db->from('elat_tbl_nonbht_registrations');
	   $this->db->where('email',$eid);
	   $query = $this->db->get();
	   return ($query->result_array());     	
	 }	
	function get_user_profile_org($eid)
	{
	   $this->db->select('*');
	   $this->db->from('elat_tbl_org_registrations');
	   $this->db->where('email',$eid);
	   $query = $this->db->get();
	   return ($query->result_array());     	
	 }	
	 function get_user_profile_lawyer($eid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_lawyer');
	   $this->db->where('email',$eid);
	   $query = $this->db->get();
	   return ($query->result_array());     	
	 }	
    ///
	
}
?>
