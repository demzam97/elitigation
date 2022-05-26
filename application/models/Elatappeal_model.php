<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Elatappeal_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		
	}

	function get_all_appeal_cases_public($uid) 
		{
	      $this->db->select('*');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('created_by',$uid);
	      $this->db->where('case_complete_status', '4');	
	      $this->db->or_where('case_complete_status', '5');	  
	      $this->db->order_by('id', 'desc');
	      $query = $this->db->get();
	      return $query->result();	
		}

		function get_court() 
		{
	      $this->db->select('*');
	      $this->db->from('sc_tbl_court_profile');
	      $query = $this->db->get();
	      return $query->result();
			
		}
		
		function get_misc_case_id($cid) 
		{
		  $this->db->select('misc_case_id');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->misc_case_id;	
	      }else{
	   		return false;
		  }
			
		}

		function get_appeal_registration_user($caseid)
	{	  
	  $str="select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as casife_title,reg.application_date as app_date 
	  from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where reg.id='$caseid' and (reg.status=4 or reg.status=5 )";
	  $query =  $this->db->query($str);
 	  return $query->result();
	 }

	 function get_disposal_id($caseid) 
		{
		  $this->db->select('dispossal_type');
	      $this->db->from('sc_tbl_judgement');
	      $this->db->where('case_id',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->dispossal_type;	
	      }else{
	   		return false;
		  }
			
		}

		function get_disposal_name($id)
		{
		   $this->db->select('*');
		   $this->db->from('sc_tbl_disposal_type');
			 $this->db->where('id', $id);
		   $result = $this->db->get()->row();
		   return $result->disposal_type;	
		 }	
		 
		 function get_appealcases_public($miscid) 
		 {
		   $this->db->select('*');
		   $this->db->from('sc_tbl_appeal_elat');
		   $this->db->where('case_id',$miscid);	  
		   $this->db->order_by('id', 'desc');
		   $query = $this->db->get();
		   return $query->result();	
		 }
		 
		 function get_single_row($table_name, $id)
		{
			$this->db->where('id', $id);
			return $this->db->get($table_name)->row();
		}

	function get_elat_court_type($courtid) 
	{
	  $this->db->select('courttype_id');
	  $this->db->from('sc_tbl_court_profile');
	  $this->db->where('id',$courtid);
	  $result = $this->db->get()->row();
	  if($result){
		   return $result->courttype_id;	
	  }else{
		   return false;
	  }
		
	}

	function get_CaseRelatedLitigant($id)
	{
	  $str="SELECT * FROM sc_tbl_registration_litigant a where caseID='$id'";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }

	 function get_appeal_court_type_elat($courttypeid, $dzongkhagid)
	 {	
		$this->db->select('*');
		$this->db->from('sc_tbl_court_profile');
 
		if($courttypeid==4) {
		$this->db->where('courttype_id', 3);
		 $this->db->where('dzongkhag_id', $dzongkhagid);
		}
		if($courttypeid==3) {
		$this->db->where('courttype_id', 2);
		}
		if($courttypeid==2) {
		$this->db->where('courttype_id', 5);
		
		}
		 if($courttypeid==5) {
		$this->db->where('courttype_id', 1);
	   }
		$query = $this->db->get();
		return $query->result();
	  }
	  
	  function get_hearing_judge_elat($court)
	{ 
		
        if($court !=38)
		{	
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',2);
	   $this->db->where('court',$court);
	   $query = $this->db->get();
	   }
	  else
	  {
		$this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',2);
	   $this->db->where('court',6);
	   $query = $this->db->get();
	   }
	   return $query->result();
	 }

	 function get_cases_public_case_appeal($appealid) 
		{
	      $this->db->select('*');
		  $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('id',$appealid);	  
	      $this->db->order_by('id', 'desc');
	      $query = $this->db->get();
	      return $query->result();
			
		}	

		function get_elat_caseid($miscid)
		{
		  $this->db->select('id');
	  $this->db->from('elat_tbl_case_submission');
	  $this->db->where('misc_case_id',$miscid);
	  $result = $this->db->get()->row();
	  if($result){
				return $result->id;
	  }else{
				return false;
		  }

		}

}                  
?>


