<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Public_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		
    }
        function get_CountryName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_country');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->country;	
	}
        function get_country()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_country');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	 function get_all_courts()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_profile');
	   $query = $this->db->get();
	   return $query->result();
	 }

       function get_user_id($latemail) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_user_profile');
		  $this->db->where('email',$latemail);
		  $this->db->where('user_type >=','12');
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		  }
			
		}

     function get_user_id_bycid($cid) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_user_profile');
		  $this->db->where('CID',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		  }
			
		}


     function get_filename($caseid) 
		{
		  $this->db->select('upload');
	      $this->db->from('sc_tbl_judgement');
		  $this->db->where('case_id',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->upload;	
	      }else{
	   		return false;
		  }
			
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

		function get_elat_court_dzongkhag($courtid) 
		{
		  $this->db->select('dzongkhag_id');
	      $this->db->from('sc_tbl_court_profile');
	      $this->db->where('id',$courtid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->dzongkhag_id;	
	      }else{
	   		return false;
		  }
			
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

	function get_all_registration()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }	

	 function get_review_case($user_id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('clerk',$user_id);	  
       $this->db->where('registration_status', '0'); 
	   $this->db->order_by('id', 'desc');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	function get_temp_litigantID()
	{
	   $this->db->select('*');
	   $this->db->from('sc_temp_litigant');
	   $this->db->where('created_by',$this->session->userdata('user_id'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	 function get_temp_litigantID_elat($cid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_temp_litigant_elat');
	   $this->db->where('ecase_id',$cid);
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }

	 function get_temp_litigantID_elat_hc($cid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID',$cid);
	   $this->db->where('litigant_type !=','14');
	   $this->db->where('litigant_type !=','15');
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }

	 function get_temp_litigantID_elat_dunkhag($cid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID',$cid);
	   $this->db->where('litigant_type !=', '14');
	   $this->db->where('litigant_type !=','15');
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }

	 function get_case_info($case_id){
		$this->db->select('*');
		$this->db->from('sc_tbl_misc_case_info');
		$this->db->where('id',$case_id);
		$query = $this->db->get();
		return $query->result();

	}
	function get_case_judgement($case_id){
		$this->db->select('*');
		$this->db->from('sc_tbl_judgement');
		$this->db->where('case_id',$case_id);
		$query = $this->db->get();
		return $query->result();

	}
	function addCaseHearingJudge($cid,$newJudge)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_hjudge');
		$this->db->where('caseID', $cid);
		$this->db->where('hjudge', $newJudge);
		$query = $this->db->get();
		$chk=$query->result();
		if(empty($chk))
		{
			$data = array(
				'caseID' => $cid,
				'hjudge' => $newJudge
				);

			$this->db->insert('sc_tbl_registration_hjudge', $data); 
		}
		return;
	}

	function caseHearingJudgeDelete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sc_tbl_registration_hjudge'); 
		return;
	}
	function get_assigned_case_rejected()
		{
		  $court_id=$this->session->userdata('court_id');
		  $clerk=$this->session->userdata('user_id');
		  $str="select * from sc_tbl_misc_case_info where registration_status=1 AND court_id='$court_id' AND clerk='$clerk' AND (status=4 OR status=5) AND reject=1 ORDER BY id DESC";
		  $query =  $this->db->query($str);
		  $result = $query->result();
		  return $result;
		}
	function get_appealling_registration()
	{
	  $court_type=$this->session->userdata('court_type');
	  $court_id=$this->session->userdata('court_id');
	  if($court_type==2 || $court_type==1)
	  {
		  $dzo=$this->session->userdata('dzongkhag');
		  $str="select r.id as id, r.misc_case_no as case_no,r.case_title as case_title,d.court_id as court,r.status as status, d.litigant as litigant,d.appeal_date as created_on, d.case_source as case_source, d.applicant_type as applicant_type, d.appealent as appealent, j.judgement_date as judgement_date, j.judgement_no as judgement_no from sc_tbl_appeal d 
		  left join sc_tbl_misc_case_info as r on d.case_id = r.id
		  left join sc_tbl_judgement as j on d.case_id = j.case_id
		  where d.appealed_court_id='$court_id' and r.appeal_reg_status='0' order by d.id desc";
	  }
	  else
	  {
		  	  $dzo=$this->session->userdata('dzongkhag');
			  $str="select r.id as id, r.misc_case_no as case_no,r.case_title as case_title,d.court_id as court,r.status as status, d.litigant as litigant,d.appeal_date as created_on, d.case_source as case_source, d.applicant_type as applicant_type, d.appealent as appealent, j.judgement_date as judgement_date, j.judgement_no as judgement_no from sc_tbl_appeal d 
			  left join sc_tbl_misc_case_info as r on d.case_id = r.id
			  left join sc_tbl_judgement as j on d.case_id = j.case_id
			  where d.appealed_court_id='$court_id' and d.dzongkhag='$dzo' and r.appeal_reg_status='0' and year(d.appeal_date)=year(now()) order by d.id desc";
	  }
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	
	}
	 
	 
	 
	 function get_appealling_review()
	{
	  $court_type=$this->session->userdata('court_type');
	  $court_id=$this->session->userdata('court_id');
	  $dzo=$this->session->userdata('dzongkhag');
      $str="select * from sc_tbl_misc_case_info where status='6'";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	
	}
	
	
	function get_registered_registration()
	{

	  $court_id=$this->session->userdata('court_id');
	  $bench=$this->session->userdata('bench');
	  $uid=$this->session->userdata('user_id');

	  $str="select * from sc_tbl_misc_case_info where (registration_status=1 or registration_status=0) AND court_id='$court_id' AND bench='$bench' AND (status=0 OR status=1 OR status=2 OR status=3) AND  NOT reject<=>1 ORDER BY id DESC";

	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	  
	 }	
	 
	 function get_incase()
	{
	  $court_id=$this->session->userdata('court_id');
	  $bench=$this->session->userdata('bench');
	  $uid=$this->session->userdata('user_id');
	  $str="select * from sc_tbl_misc_case_info where registration_status=1 AND court_id='$court_id' AND bench='$bench' 
	  AND (status=3 OR (status=2 and clerk='$uid') )and (updatedby='$uid' or clerk='$uid') ORDER BY id DESC";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	  
	 }	
	 
	 function get_registered_registration_registry()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('createdby',$this->session->userdata('user_id'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 
	 function get_hybrid_case()
	{
	    $court_id=$this->session->userdata('court_id');

	  $str="select * from sc_tbl_misc_case_info where registration_status=1 AND court_id='$court_id'  AND (status=1 OR status=2 OR status=3) ORDER BY id DESC";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }	
	 
	function get_judge_dashboard()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('registration_status',1);
	   $this->db->where('approved',NULL);
	   $this->db->where('c_approved', NULL);
	   $this->db->where('a_approved', NULL);
	   $this->db->where('court_id',$this->session->userdata('court_id'));
	   $this->db->where('bench',$this->session->userdata('bench'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	   
	   
	   
	 }	
	 function addDisposal($case_id, $disposal_id)
  {
	  $data = array(
			   'dispossal_type' => $disposal_id
            );

		$this->db->where('case_id', $case_id);
		$this->db->update('sc_tbl_judgement', $data); 
		return;

  }
  function addDisposalType($case_id, $disposal_id)
  {
	  $data = array(
			   'dispossal_type' => $disposal_id
            );

		$this->db->where('case_id', $case_id);
		$this->db->update('sc_tbl_judgement', $data); 
		return;

  }
	 
	function get_assigned_case()
	{
	  $court_id=$this->session->userdata('court_id');
	  $clerk=$this->session->userdata('user_id');
	    $str="select * from sc_tbl_misc_case_info where registration_status=1 AND court_id='$court_id' AND clerk='$clerk' AND (status=2 OR status=3) AND NOT reject<=>1 ORDER BY id DESC";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }	
	 function get_approved_case()
	{
	  $court_id=$this->session->userdata('court_id');
	  $clerk=$this->session->userdata('user_id');
	 //$str="select * from sc_tbl_misc_case_info where registration_status=1 AND court_id='$court_id' AND clerk='$clerk' AND (approved=1 OR c_approved=1) AND NOT reject<=>1 ORDER BY id DESC";
	    $str="select * from sc_tbl_misc_case_info where (status='4' OR '5') AND court_id='$court_id' AND (approved=1 OR c_approved=1) ORDER BY id DESC";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }	
	 
	function CourtIDChange($cc,$dd)
	{
	   $this->db->select('court');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('court_type',$cc);
	   $this->db->where('dzongkhag',$dd);
	   $this->db->where('user_type',4);
	   $result = $this->db->get()->row();
	   return $result->court;
	}
	 
	function get_notregistered_registration()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('registration_status',2);
	   $this->db->where('court_id',$this->session->userdata('court_id'));
	   $this->db->where('clerk',$this->session->userdata('user_id'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }	

	 function get_remanded_registration()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('registration_status',3);
	   $this->db->where('court_id',$this->session->userdata('court_id'));
	   $this->db->where('clerk',$this->session->userdata('user_id'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }	
function get_withdrawn_registration()
 {
 	$this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('registration_status',4);
	   $this->db->where('court_id',$this->session->userdata('court_id'));
	   $this->db->where('clerk',$this->session->userdata('user_id'));
	   $this->db->order_by('id','DESC');
	   $query = $this->db->get();
	   return $query->result();
 }

	
	 
	function get_appealed_case()
	{
	  $court_id=$this->session->userdata('court_id');
	  $str="select reg.id as id,reg.case_title as case_title, reg.reg_no as reg_no, reg.misc_case_no as mcase_no, app.litigant as litigant,app.appeal_date as appeal_date,reg.casetypelevel3_id as casetypelevel3_id from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_appeal as app on reg.id = app.case_id 
      where reg.status=5 AND reg.court_id='$court_id' AND year(app.appeal_date)=year(now())ORDER BY id DESC";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }	
	 
	function get_court_type()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_type');
	   if($this->session->userdata('court_type')==4) {
	   $this->db->where('id', 3);
	   }
	   if($this->session->userdata('court_type')==3) {
	   $this->db->where('id', 2);
	   }
	   if($this->session->userdata('court_type')==2) {
	   $this->db->where('id', 1);
	   }
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 
	 function get_appeal_court_type()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_profile');
	   if($this->session->userdata('court_type')==4) {
	   $this->db->where('courttype_id', 3);
	    $this->db->where('dzongkhag_id', $this->session->userdata('dzongkhag'));
	   }
	   if($this->session->userdata('court_type')==3) {
	   $this->db->where('courttype_id', 2);
	   }
	   if($this->session->userdata('court_type')==2) {
	   $this->db->where('(courttype_id = 1 or courttype_id = 5)');
	   //$this->db->where('courttype_id', 5);
	   
	   }
	    if($this->session->userdata('court_type')==5) {
	   $this->db->where('courttype_id', 1);
	  }
	   $query = $this->db->get();
	   return $query->result();
	 }


       function get_appeal_court_type_elat($courttypeid)
	{	
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_profile');

	   if($courttypeid==4) {
	   $this->db->where('courttype_id', 3);
	    $this->db->where('dzongkhag_id', $this->session->userdata('dzongkhag'));
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
	
	 
	 function get_casetype_level1()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_casetypelevel1');
           $this->db->where('status', 1);
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 	function get_casetype_level2()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_casetypelevel2');
           $this->db->where('status', 1);
	   $query = $this->db->get();
	   return $query->result();
	 }
	
	 
	function get_casetype_level3()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_casetypelevel3');
       $this->db->where('status', 1);
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 	
	 
	function get_litigant()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	  
	function get_litigant_cid($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   	 return $result->litigant_CID;	
	   }else{
	   	 return false;
	   }
	}

    function get_litigantforms($miscid, $eid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_case_litigant_elat');
	   $this->db->where('case_id',$miscid);
	   $this->db->where('elat_id',$eid);
	   $query = $this->db->get();
	   return $query->result();
	 }

	function getReviewActivity($case_id){
		$this->db->select('*');
		$this->db->from('sc_tbl_review');
		$this->db->where('case_id',$case_id);
		$query = $this->db->get();
		return $query->result();

	}
	function get_ReviewTypeName($id)
	{
		$this->db->select('description');
		$this->db->from('enum_review_type');
		$this->db->where('id',$id);
		$result = $this->db->get()->row();
		return $result->description;	
	}

    function get_litigant_id($id)
	{
		$this->db->select('litigant');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('id',$id);
		$result = $this->db->get()->row();
		return $result->litigant;	
	}

	function get_review_activity()
	{
		$this->db->select('*');
		$this->db->from('enum_review_type');
		$query = $this->db->get();
		return $query->result();
	}
	 function getCaseLitigant($id)
	{
	   $this->db->select('*');
	   $this->db->where('caseID',$id);
	   $this->db->from('sc_tbl_registration_litigant');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 
	function get_CaseRelatedLitigant($id)
	{
	  $str="SELECT * FROM sc_tbl_registration_litigant a where caseID='$id'";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	 }	

	 function get_CaseRelatedLitigantElat($id)
	 {
	   $str="SELECT litigant FROM sc_tbl_registration_litigant a where caseID='$id'";
	   $query =  $this->db->query($str);
		$result = $query->result();
		  return $result;
	  } 
	 
	function get_hearing_judge()
	{
	$court=$this->session->userdata('court_id');
		if($court !=38)
		{	
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',2);
	   $this->db->where('court',$this->session->userdata('court_id'));
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
	 
	 function get_Bench_judge()
	{
		
		$user_id=$this->session->userdata('user_id');
		 $court=$this->session->userdata('court_id');
		
		$this->db->select('*');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('id', $user_id);
		$query = $this->db->get()->row();
		$bench=$query->bench;
		
	   
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',2);
	   $this->db->where('bench',$bench);
	   $this->db->where('court', $court);
	   $query = $this->db->get();
	   return $query->result();
	 }	

	 function get_highcourt_judge()
	{
		$court=$this->session->userdata('court_id');
		if($court !=38)
		{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',2);
	   $this->db->where('court', $court);
	   $query = $this->db->get();
	    }
	    else
	    {
	    	$this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type', 2);
	   $this->db->where('court', 6);
	   $query = $this->db->get();
	    }
	   return $query->result();
	 }
	 
	function get_clerk()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type',3);
	   $this->db->where('court',$this->session->userdata('court_id'));
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 function get_clerk_reg()
	{
		$court_id=$this->session->userdata('court_id');
	  $str="select * from sc_tbl_user_profile where court='$court_id' AND (user_type=3 OR user_type=5) ORDER BY id DESC";
 	 $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	  
	 
	 }	
	 
	 function get_clerk_bench($bench)
	{
		$court_id=$this->session->userdata('court_id');
	  $str="select * from sc_tbl_user_profile where court='$court_id' AND (user_type=3 OR user_type=5) and bench='$bench' ORDER BY id DESC";
 	 $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
	  
	 
	 }	
	 
   function get_all_collection()
   {
   
	   $this->db->select('*');
	   $this->db->from('sc_tbl_collection');
	   $this->db->where('court_id',$this->session->userdata('court_id'));
	   $query = $this->db->get();
	   return $query->result();
   
   }
	 
   function get_all_users()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	function get_all_cases()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
   function get_all_judgement()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_judgement_type');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 
	 function getCourtJudge()
	{
		$cid=$this->session->userdata('court_id');
	   $this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('user_type', 2);
	   $this->db->where('court', $cid);
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
   function get_dzongkhag()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_master_dzongkhag');
	   $this->db->order_by('DzongkhagID', 'asc');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	  function get_UserType($id)
		 {
			 $this->db->select('*');
	         $this->db->from('sc_tbl_role');
		   $this->db->where('id',$id);
		   $result = $this->db->get()->row();
		   return $result->role_name;	
		 }
	 
	 
   function get_litigant_type()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant_type');
	   
	   $query = $this->db->get();
	   return $query->result();
	 }
  
   function get_litigant_for_case($miscid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID',$miscid);
	   $query = $this->db->get();
	   return $query->result();
	 }
 
    function get_lawyer_for_case($miscid)
	{
	   $this->db->select('*');
	   $this->db->from('tbl_litigant_lawyer_link');
	   $this->db->where('Case_id',$miscid);
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	function get_all_acts()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_acts');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 
	function get_appeal_registration()
	{
	  $court_id=$this->session->userdata('court_id');
	  $clerk_id=$this->session->userdata('user_id');
	  $usertype=$this->session->userdata('user_type');

    if($usertype == 7 or 3){
	  $str="select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as casife_title,reg.application_date as app_date 
	  from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where (reg.status=4 or reg.status=5 ) AND reg.court_id= '$court_id' AND reg.clerk = '$clerk_id' 
      group by reg.id order by reg.created_on desc";

        } 
       else
       {
	  $str="select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as case_title,reg.application_date as app_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where (reg.status=4 or reg.status=5 ) AND reg.court_id='$court_id' order by reg.created_on desc";
        }
	  $query =  $this->db->query($str);
 	  return $query->result();
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
	 
	 
	 
	function get_benches()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_bench');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	function get_UserName($id)
	{
	   $this->db->select('judge_name');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->judge_name;	
	   }else{
	   		return false;
	   }
	}

       function get_UserContactNumber($id)
	{
	   $this->db->select('contact');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->contact;	
	   }else{
	   		return false;
	   }
	}


	function get_DefendantName($caseid)
	{
	  $this->db->select('name');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid',$caseid);	  
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

       function get_DefendantEmail($caseid)
	{
	   $this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid',$caseid);	  
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_DefendantDetail($id)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('id',$id);	  
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ClientDetail($id)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_client_registrations');
		$this->db->where('id',$id);	  
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ClientName($caseid)
	{
	   $this->db->select('name');
	   $this->db->from('elat_tbl_client_registrations');
	   $this->db->where('caseid',$caseid);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->name;	
	   }else{
	   		return false;
	   }
	}

	function get_DefendantID($caseid)
	{
	   $this->db->select('id');
	   $this->db->from('elat_tbl_respondent');
	   $this->db->where('caseid',$caseid);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->id;	
	   }else{
	   		return false;
	   }
	}


	function get_ClientID($caseid)
	{
	   $this->db->select('id');
	   $this->db->from('elat_tbl_client_registrations');
	   $this->db->where('caseid',$caseid);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->id;	
	   }else{
	   		return false;
	   }
	}

	function get_UserEmail($id)
	{
	   $this->db->select('email');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->email;	
	   }else{
	   		return false;
	   }
	}

	function get_UserLawyerEmail($id)
	{
	   $this->db->select('email');
	   $this->db->from('sc_tbl_lawyer');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->email;	
	   }else{
	   		return false;
	   }
	}

	function get_UserLatigantEmail($id)
	{
	   $this->db->select('litigant_email');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->litigant_email;	
	   }else{
	   		return false;
	   }
	}

       function get_UserLatigantNumber($id)
	{
	   $this->db->select('litigant_phone');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->litigant_phone;	
	   }else{
	   		return false;
	   }
	}


       function get_UserLatigantName($id)
        {
           $this->db->select('litigant_name');
           $this->db->from('sc_tbl_litigant');
           $this->db->where('id',$id);
           $result = $this->db->get()->row();
           if($result){
                        return $result->litigant_name;
           }else{
                        return false;
           }
        }

	function get_LawyerID($caseid)
	{
	   $this->db->select('Lawyer_id');
	   $this->db->from('tbl_litigant_lawyer_link');
	   $this->db->where('Case_id',$caseid);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->Lawyer_id;	
	   }else{
	   		return false;
	   }
	}

	function get_invite_status($caseid, $juid)
	{
	   $this->db->select('status');
	   $this->db->from('jitsi');
	   $this->db->where('case_id',$caseid);
	   $this->db->where('juid',$juid);
	   $result = $this->db->get()->row();
	   if($result){
	   		return $result->status;	
	   }else{
	   		return false;
	   }
	}

	function get_LawyerID_all($caseid)
	{ 
		$this->db->select('*');
		$this->db->from('tbl_litigant_lawyer_link');
		$this->db->where('Case_id',$caseid);
		$query = $this->db->get();
		return $query->result();
	}

	function get_LatigantID($caseid)
	{ 
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('caseID',$caseid);
		$query = $this->db->get();
		return $query->result();
	}

	function get_summon_ack($ecaseid)
	{ 
		$this->db->select('*');
		$this->db->from('sc_tbl_courtorders');
		$this->db->where('elatid',$ecaseid);
		$query = $this->db->get();
		return $query->result();
	}


	function get_signing_judge($judgement_id){
		$this->db->select('*');
		$this->db->from(' sc_tbl_judgement_signby');
		$this->db->where('judgement_id',$judgement_id);
		$query = $this->db->get()->row();
		if($query){
			return $query->judge_id;
		}else{
			return false;
		}
	}
	function get_CaseName($id)
	{
	   $this->db->select('case_title');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->case_title;	
	}
	
	
	function get_CaseNumber($id)
	{
	   $this->db->select('misc_case_no');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->misc_case_no;	
	}
	
	function getAppealentCourt($id)
	{
		
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   $old=$result->appeal_old_id;
	   
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$old);
	   $result = $this->db->get()->row();
	   return $result->court_id;	
	   
	   
		
	}
	
	function get_CaseID($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $query = $this->db->get();
	   return $query->result();	
	}
	
	function get_RegistrationDate($id)
	{
	   $this->db->select('reg_date');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->reg_date;	
	}
	
	function get_RegCaseType($id)
	{
	   $this->db->select('casetypelevel3_id');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->casetypelevel3_id;	
	}
	
	function get_Bench($id)
	{
	   $this->db->select('bench_name');
	   $this->db->from('sc_tbl_bench');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->bench_name;	
	}
	 
	function get_CourtName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_profile');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->court_name;	
	}

	function get_CourtDzongkhag($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_court_profile');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->dzongkhag_id;	
	}

	function get_MiscCaseType($id)
	{
	   $this->db->select('caseTypelevel3');
	   $this->db->from('sc_tbl_casetypelevel3');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->caseTypelevel3;	
	}
	function get_MiscellaneousActivities()
	{
		$this->db->select('*');
		$this->db->from('enm_misc_activity_type');
		$query = $this->db->get();
		return $query->result();
	}

	function get_miscellaneous_activity($misc_no){
		$this->db->select('*');
		$this->db->from('tbl_misc_activity');
		$this->db->where('misc_no', $misc_no);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_judicial_name($id)
	{
	   $this->db->select('process_name');
	   $this->db->from('sc_tbl_judicial_process');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->process_name;	
	}
	
	function get_misc_case_status($id)
	{
	   $this->db->select('status');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->status;	
	}
	
	function get_litigant_type_name($id)
	{
	   $this->db->select('litigant_type');
	   $this->db->from('sc_tbl_litigant_type');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->litigant_type;	
	}
	
	
	function get_form_name($id)
	{
	   $this->db->select('form_name');
	   $this->db->from('sc_tbl_forms');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->form_name;	
	}
	
	function get_ApplicantName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   	return $result->litigant_name;	
	   }else{
	   	return false;
	   }
	}
	function get_ApplicantCID($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_litigant');
		$this->db->where('id',$id);
		$result = $this->db->get()->row();
		return $result->litigant_CID;	
	}	
	
	function get_LawyerName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_lawyer');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->L_Name;	
	}
	
		function get_OrgName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->Organization_Name;	
	}
	
	function get_LitigantType($id)
	{
	   $this->db->select('litigant_type');
	   $this->db->from('sc_tbl_litigant_type');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   if($result){
	   	return $result->litigant_type;	
	   }else{
	   	return false;
	   }
	}

	function get_CaseTitle($id)
	{
		$this->db->select('case_title');
		$this->db->from('sc_tbl_misc_case_info');
		$this->db->where('id',$id);
		$result = $this->db->get()->row();
		return $result->case_title;	
	}
	
	function get_LitigantName($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id',$id);
	   $result = $this->db->get()->row();
	   return $result->litigant_name;	
	}
	function get_case_applicant($case_id){
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('caseID',$case_id);
		$this->db->where('litigant_type',14);
		$query = $this->db->get()->row();
		if($query){
			return $query->litigant;
		}else{
			return false;
		}
	}
	function get_case_opponent($case_id){
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('caseID',$case_id);
		$this->db->where('litigant_type',18);
		$query = $this->db->get()->row();
		if($query){
			return $query->litigant;
		}else{
			return false;
		}
	}

	function get_MiscellaneousActivityType($id){
		$this->db->select('description');
		$this->db->from('enm_misc_activity_type');
		$this->db->where('id',$id);
		$result = $this->db->get()->row();
		return $result->description;
	}
	function get_dungkhag()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_master_dungkhag');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	
	 
    function get_gewog()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_master_gewog');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 function get_gewogName($id)
	{
	   $this->db->select('*');
	   $this->db->where('GewogID',$id);
	   $this->db->from('sc_tbl_master_gewog');
	   $result = $this->db->get()->row();
	   return $result->Name;	
	 }	
	 
	function get_village()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_master_village');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	  function get_villageName($id)
	{
	   $this->db->select('*');
	   $this->db->where('VillageID',$id);
	   $this->db->from('sc_tbl_master_village');
	   $result = $this->db->get()->row();
	   return $result->Name;	
	 }	
	 
	function get_Activity_cases($id)
	{
	   $this->db->select('*');
	    $this->db->where('case_id', $id);
		$this->db->order_by('id', 'ASC');
	   $this->db->from('sc_tbl_case_activities');
	   $query = $this->db->get();
	   return $query->result();
	 }

	 function get_forms_cases($id)
	{
	   $this->db->select('*');
	    $this->db->where('case_id', $id);
		$this->db->order_by('id', 'ASC');
	   $this->db->from('sc_tbl_case_form_elat');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	 function get_Activity_cases_juid($caseid, $juid)
	{
	   $this->db->select('*');
		$this->db->where('case_id', $caseid);
		$this->db->where('judicial_process_id', $juid);
		$this->db->order_by('id', 'ASC');
	   $this->db->from('sc_tbl_case_activities');
	  
	   $query = $this->db->get();
	   return $query->result();
	 }

	 function get_court_meetings($courtid)
	{ 
	   $this->db->select('*');
		$this->db->where('court_id', $courtid);
        //$this->db->group_by('juid');
		$this->db->order_by('id', 'DESC');
		//$this->db->limit(1);
	    $this->db->from('jitsi');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	function get_single_row($table_name, $id)
		{
			$this->db->where('id', $id);
			return $this->db->get($table_name)->row();
		}

	function get_single_respondent($table_name, $id)
		{
			$this->db->where('caseid', $id);
			return $this->db->get($table_name)->row();
		}

	function fetch_case_activity()
	{
	   $this->db->select('DISTINCT(case_id)');
	   $this->db->from('sc_tbl_case_activities');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	function get_judicial_process()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_judicial_process');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	function get_disposal_type()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_disposal_type');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 function get_disposal_name($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_disposal_type');
	     $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->disposal_type;	
	 }	
	 
	  function get_act_name($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_acts');
	     $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   if($result)
	   	return $result->act_name;
	   else
	   	return false;	
	 }	
	 
	function get_sentence_type()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_sentence_type');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 
	 function get_sentence_Name($id)
	{
	     $this->db->select('*');
	   $this->db->from('sc_tbl_sentence_type');
	     $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->sentence_type;	
	 }	
	 function get_article_name($id)
	{
	    $this->db->select('*');
	   $this->db->from('sc_tbl_article');
	     $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->article_name;	
	 }	
	 
	 
	function get_forms()
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_forms');
	   $query = $this->db->get();
	   return $query->result();
	 }
	 
	function get_single_row1($table_name, $id)
	{
		$this->db->where('id', $id);
		return $this->db->get($table_name)->row();
	}
	
	
   function count_no_fields($table_name,$field_name,$value)

		{

			$this->db->where($field_name, $value);

			$this->db->from($table_name);					

			return $this->db->count_all_results();

		}	
		
	function count_no_fields1($table_name,$field_name,$field_name1,$value)

		{

			$this->db->where($field_name, $value);
			$this->db->or_where($field_name1, $value);

			$this->db->from($table_name);					

			return $this->db->count_all_results();

		}
		
		
		function searchLitCount($g)
		{
			
			$this->db->where('litigant_CID', $g);
			$this->db->or_where('Organization_Name', $g);
			$this->db->or_where('litigant_name', $g);
			$this->db->or_where('org_code', $g);
			$this->db->from('sc_tbl_litigant');					
			return $this->db->count_all_results();
		}
		
		
		function searchLit($title)
		{
			//$this->db->select('*');
			$this->db->where('litigant_CID', $title);
			$this->db->or_where('litigant_name', $title);
			$this->db->from('sc_tbl_litigant');					
			$query = $this->db->get();
	       		 return $query->result();
		}
		
		function searchOrg($title)
		{
			
			$this->db->where('Organization_Name', $title);
			$this->db->or_where('license_id', $title);
			$this->db->or_where('org_code', $title);
			$this->db->from('sc_tbl_litigant');					
			$query = $this->db->get();
	        return $query->result();
		}
	 
	function count_row($table_name, $field, $id)

		{

			$this->db->where($field, $id);

			$this->db->from($table_name);

			return $this->db->count_all_results();

		}
	
	function temp_LitiID_save(){
		$user_id=$this->session->userdata('user_id');
		$liti_id = $this->input->post('liti_id');
		$liti_type = $this->input->post('liti_type');
		
		  $data = array(
		  'litigant'=>$liti_id,
		  'litigant_type'=>$liti_type,
		  'created_by'=>$user_id
		  
		);
		$this->db->insert('sc_temp_litigant',$data);
  }

  function temp_LitiID_save_elat(){
	$user_id=$this->session->userdata('user_id');
	$liti_id = $this->input->post('liti_id');
	$liti_type = $this->input->post('liti_type');
	$ecaseid = $this->input->post('ecaseid');
	
	  $data = array(
	  'litigant'=>$liti_id,
	  'litigant_type'=>$liti_type,
	  'created_by'=>$user_id,
	  'ecase_id'=>$user_id
	  
	);
	$this->db->insert('sc_temp_litigant_elat',$data);
}
  function updateInfoCase($cid,$judge,$ctype)
  {
	  $data = array(
               'judge' => $judge,
			   'casetypelevel3_id' => $ctype
            );

		$this->db->where('id', $cid);
		$this->db->update('sc_tbl_misc_case_info', $data); 
		return;

  }
  
   function updateCaseType($cid,$ctype)
  {
	  $data = array(
			   'case_type_id' => $ctype,
			   'case_id' => $cid
            );

		$this->db->insert('sc_tbl_case_casetype_link', $data); 
		return;

  }
 
  function updateCloseAppeal($id)
  {
	   $data = array(
	   'appeal_reg_status' => 1
            );

		$this->db->where('id', $id);
		$this->db->update('sc_tbl_misc_case_info', $data); 
		return;
	  
  }
  
   function getLevel3Name($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_casetypelevel3');
	   $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->caseTypelevel3;	
	 }	
	 
	 function assignCaseJudge($id,$judge,$assigne,$case_Title)
	 {
		  $data = array(
		  'case_title' => $case_Title,
	   'judge' => $judge,
	   'clerk'=> $assigne
            );

		$this->db->where('id', $id);
		$this->db->update('sc_tbl_misc_case_info', $data); 
		return;
		 
	 }
	 
	 function get_case_casetype($id)
	 {
	   $this->db->select('*');
	   $this->db->where('case_id', $id);
	   $this->db->from('sc_tbl_case_casetype_link');
	   $query = $this->db->get();
	   return $query->result();
		 
	 }


	 function get_case_casetype3_id($id)
	 {
		$this->db->select('case_type_id');
		$this->db->from('sc_tbl_case_casetype_link');
		$this->db->where('case_id', $id);
		$result = $this->db->get()->row();
		return $result->case_type_id;
	 }

	 function get_case_casetype2_id($id)
	 {
		$this->db->select('caseTypelevel2_id');
		$this->db->from('sc_tbl_casetypelevel3');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		return $result->caseTypelevel2_id;
	 }

	 function get_case_casetype1_id($id)
	 {
		$this->db->select('caseTypelevel1_id');
		$this->db->from('sc_tbl_casetypelevel2');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		return $result->caseTypelevel1_id;
	 }
	 
	 function caseDeleteType($id)
	 {
		 $this->db->where('id', $id);
		 $this->db->delete('sc_tbl_case_casetype_link');
		 return;
	 }
	 
	 
	 function addCaseJudge($cid,$newJudge)
	 {
	   $this->db->select('*');
	   $this->db->from('tbl_case_judge_link');
	   $this->db->where('case_id', $cid);
	   $this->db->where('judge_id', $newJudge);
	   $query = $this->db->get();
	   $chk=$query->result();
	   if(empty($chk))
	   {
		  $data = array(
		  'case_id' => $cid,
	      'judge_id' => $newJudge
            );

		$this->db->insert('tbl_case_judge_link', $data); 
	   }
		return;
	 }
    function getAlCaseJudge($id)
	{
	   $this->db->select('*');
	   $this->db->from('tbl_case_judge_link');
	   $this->db->where('case_id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}
    
    function getAlCaseLawyers($id)
	{
	   $this->db->select('*');
	   $this->db->from('tbl_litigant_lawyer_link');
	   $this->db->where('Case_id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}

     function getAlCaseLitigants($id)
	{ 
	   $this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID', $id);
	   $query = $this->db->get();
	   return $query->result();
	}

	function getAlCaseBench($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}
	function caseJudgeDelete($id)
	{
	  $this->db->where('id', $id);
	  $this->db->delete('tbl_case_judge_link'); 
	  return;
	}

	function caseBenchDelete($id)
	{
	  $this->db->where('id', $id);
	  $this->db->delete('sc_tbl_misc_case_info'); 
	  return;
	}
	function signingJudgeDelete($id,$judge_id)
	{
	  $this->db->where('judgement_id', $id);
	  $this->db->where('judge_id', $judge_id);
	  $this->db->delete('sc_tbl_judgement_signby'); 
	  return;
	}

	function actTypeDelete($id,$act_id)
	{
	  $this->db->where('judgement_id', $id);
	  $this->db->where('Act_id', $act_id);
	  $this->db->delete('sc_tbl_judgement_act'); 
	  return;
	}

	function sentenceDelete($id)
	{
		//echo $id;
	  $this->db->where('judgement_id', $id);
	 // $this->db->where('case_id', $case_id);
	  $this->db->delete('tbl_sc_judgement_sentence'); 
	  return;
	}

	
	function getAllCaseLitigant($id)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID', $id);
	   $query = $this->db->get();
	   return $query->result();
	}

	function getAllUploads($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_case_form_elat');
	   $this->db->where('case_id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}

	function getAllUploads_1($id)
	{
	   $this->db->select('*');
	   $this->db->from('elat_tbl_case_files');
	   $this->db->where('misc_case_id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}

	function getAllUploadsName($id)
	{
	   $this->db->select('file_name');
	   $this->db->from('elat_tbl_case_files');
	   $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->file_name;
	}
	
	function addLitigantCase($case_id, $LitID, $litType)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID', $case_id);
	   $this->db->where('litigant', $LitID);
	   $this->db->where('litigant_type', $litType);
	   $query = $this->db->get();
	   $chk=$query->result();
		
		if(empty($chk))
		{
		 $data = array(
		  'caseID' => $case_id,
	      'litigant' => $LitID,
		  'litigant_type' => $litType
            );
		  $this->db->insert('sc_tbl_registration_litigant', $data); 
		}
		return;
	}
	
	function getJudicialForms($case_id,$jid)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_case_form');
	   $this->db->where('case_id', $case_id);
	   $this->db->where('judicial_process_id', $jid);
	   $query = $this->db->get();
	   return $query->result();
	}
	
	function getJudicialLit($id)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('id', $id);
	   $query = $this->db->get();
	   return $query->result();
	}
	
	function getJurLit($case_id, $lit_id)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID', $case_id);
	   $this->db->where('id', $lit_id);
	   $query = $this->db->get();
	   return $query->result();
	}
	
	function getSentLit($case_id, $lit_id)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_registration_litigant');
	   $this->db->where('caseID', $case_id);
	   $this->db->where('litigant', $lit_id);
	   $query = $this->db->get();
	   return $query->result();
	}
	
	function addJudForm($id,$case_id,$form_id,$issued,$frmdate)
	{
		 if($form_id!='')
		 {
			  $data = array(
			  'case_id' => $case_id,
			  'form_used' => $form_id,
			  'judicial_process_id' => $id,
			  'Issued'=>$issued,
			  'frmdate'=>$frmdate
				);
			  $this->db->insert('sc_tbl_case_form', $data);
		 }
		  return;
		
	}
function addJudForm1($id,$case_id,$form_id,$issued,$frmdate)
	{
		 if($form_id!='')
		 {
			  $data = array(
			  'case_id' => $case_id,
			  'form_used' => $form_id,
			  'judicial_process_id' => $id,
			  'Issued'=>$issued,
			  'frmdate'=>$frmdate
				);
			  $this->db->insert('sc_tbl_case_form', $data);
		 }
		  return;
		
	}
	

	
	function getBenchName($id)
	{		
	   $this->db->select('*');
	   $this->db->from('sc_tbl_bench');
	   $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   return $result->bench_name;
	}
	
	function checkLit($id)
	{
	   $this->db->select('*');
	   $this->db->from('sc_tbl_litigant');
	   $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   $holder=$result->is_org;
	   
	   if($holder==1)
	   {
		   return 'yes';
	   }
	   else
	   {
		   return 'no';
	   }
	}
	function checkRegLitPresent($lit_id, $case_id)
	{
		$this->db->select('*');
		$this->db->where('caseID', $case_id);
		$this->db->where('litigant', $lit_id);
		$this->db->from('sc_tbl_registration_litigant');
	    $total=$this->db->count_all_results();
		if($total>0)
		{
			return "yes";
		}
		else
		{
			return "no";
		}
		
	}
	
	function checkLawyerExists($c_id, $lit)
	{
		$this->db->select('*');
		$this->db->where('Case_id', $c_id);
		$this->db->where('Litigant_id', $lit);
		$this->db->from('tbl_litigant_lawyer_link');
		$query = $this->db->get();
	   return $query->result();
		
	}
	function getLawyerName($law)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_lawyer');
	   $this->db->where('id', $law);
	   $result = $this->db->get()->row();
	   return $result->L_Name;	
	}
	
	function get_UserDzongkhag($id)
	{
		$this->db->select('*');
	   $this->db->from('sc_tbl_user_profile');
	   $this->db->where('id', $id);
	   $result = $this->db->get()->row();
	   $d_id=$result->dzongkhag;
	   
	   $this->db->select('*');
	   $this->db->from('sc_tbl_master_dzongkhag');
	   $this->db->where('DzongkhagID', $d_id);
	   $result = $this->db->get()->row();
	   return $result->Name;	
	}
	
	function get_Judgement_Sentence($id)
	{
		$this->db->select('*');
		$this->db->where('Judgement_id', $id);
		$this->db->order_by('id', 'asc');
		$this->db->from('tbl_sc_judgement_sentence');
		$query = $this->db->get();
	    return $query->result();
	}
	
	function getSentanceCount($n)
	{
		return $n=$n+1;
	}
	
	
	function getAllReviewCases()
	{
		$clerk=$this->session->userdata('user_id');
	   $this->db->select('*');
	   $this->db->from('sc_tbl_misc_case_info');
	   $this->db->where('clerk', $clerk);
	   $this->db->where('status', 7);
	   $this->db->order_by('created_on','DESC');
	   $query = $this->db->get();
	   return $query->result();
	 }	
	 

	 function get_all_calendar_record()
		{
		   $str="select eve.event_date as event_date, eve.event_time as event_time, eve.title as title, eve.event as event, eve.court_id as court_id,jud_eve.Judge_id as Judge_id  from tbl_event as eve
   	  left join tbl_event_judge as jud_eve on eve.id = jud_eve.event_id  order by eve.id desc";
	  $query =  $this->db->query($str);
 	  $result = $query->result();
   	  return $result;
		 }


          function get_appeal_name($miscid) 
		 {
		   $this->db->select('defendent_name');
		   $this->db->from('elat_tbl_case_submission');
		   $this->db->where('misc_case_id',$miscid);
		   $result = $this->db->get()->row();
		   if($result){
				return $result->defendent_name;	
		   }else{
				return false;
		  }	 
		}


          function get_ecase_id($miscid)
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



               function get_ecase_latid($miscid)
                 {
                   $this->db->select('litigant');
                   $this->db->from('sc_tbl_registration_litigant');
                   $this->db->where('caseID',$miscid);
                   $this->db->where('litigant_type','15');
                   $result = $this->db->get()->row();
                   if($result){
                                return $result->litigant;
                   }else{
                                return false;
                  }
                } 

		function get_appeal_case_title($miscid) 
		 {
		   $this->db->select('case_title');
		   $this->db->from('elat_tbl_case_submission');
		   $this->db->where('misc_case_id',$miscid);
		   $result = $this->db->get()->row();
		   if($result){
				return $result->case_title;	
		   }else{
				return false;
		  }	 
		}

		function get_appeal_cases_status($cid) 
		{
		  $this->db->select('case_status');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->case_status;	
	      }else{
	   		return false;
		 }
		 
		}

		function get_cases_appealdetails($cid) 
		{
	      $this->db->select('*');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('id',$cid);	  
	      $this->db->order_by('id', 'desc');
	      $query = $this->db->get();
	      return $query->result();
			
		}

		function get_case_applicationcopy($cid) 
		{
		  $this->db->select('application_copy');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->application_copy;	
	      }else{
	   		return false;
		  }
			
		}

		function get_appeal_cidno($uid) 
		{
		  $this->db->select('cid');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('created_by',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->cid;	
	      }else{
	   		return false;
		  }
			
		} 

		function get_appeal_email($uid) 
		{
		  $this->db->select('email');
	      $this->db->from('sc_tbl_user_profile');
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->email;	
	      }else{
	   		return false;
		  }
			
		} 

		function get_user_type($uid) 
		{
		  $this->db->select('user_type');
	      $this->db->from('sc_tbl_user_profile');
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->user_type;	
	      }else{
	   		return false;
		  }
			
		} 

		function get_appeal_casebrief($miscid) 
		{
		  $this->db->select('appeal_brief');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$miscid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->appeal_brief;	
	      }else{
	   		return false;
		  }
			
		}

		function get_appeal_hearingoption($miscid) 
		{
		  $this->db->select('hearing_option');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$miscid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->hearing_option;	
	      }else{
	   		return false;
		  }
			
		}

		function get_appeal_date($miscid) 
		{
		  $this->db->select('appeal_date');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$miscid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->appeal_date;	
	      }else{
	   		return false;
		  }
			
		}

		function get_elat_uid($cid) 
		{
		  $this->db->select('created_by');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->created_by;	
	      }else{
	   		return false;
		  }
		 
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


		function get_elat_utype($cid) 
		{
		  $this->db->select('applicant_type');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->applicant_type;	
	      }else{
	   		return false;
		  }
		 
		}

		function get_elat_cid($uid) 
		{
		  $this->db->select('CID');
	      $this->db->from('sc_tbl_user_profile');
	      $this->db->where('id',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->CID;	
	      }else{
	   		return false;
		  }
			
		}


               function get_elatlawyer_cid($uid)
                {
                  $this->db->select('CID');
              $this->db->from('sc_tbl_user_profile');
              $this->db->where('id',$uid);
              $result = $this->db->get()->row();
              if($result){
                        return $result->CID;
              }else{
                        return false;
                  }

                }

              function get_elatlawyer_id($cid)
                {
                  $this->db->select('id');
              $this->db->from('sc_tbl_lawyer');
              $this->db->where('CID',$cid);
              $result = $this->db->get()->row();
              if($result){
                        return $result->id;
              }else{
                        return false;
                  }

                }
		

		function get_defendant_uid($defcid) 
		{
		  $this->db->select('created_by');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('cid',$defcid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->created_by;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defendant_name($caseid) 
		{
		  $this->db->select('name');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('caseid',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->name;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defendant_email($caseid) 
		{
		  $this->db->select('email');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('caseid',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->email;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defendant_contactno($caseid) 
		{
		  $this->db->select('email');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('caseid',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->email;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defuid($defcid) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_litigant');
	      $this->db->where('litigant_CID',$defcid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defuid_1($defcid) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_user_profile');
		  $this->db->where('CID',$defcid);
		  $this->db->where('user_type >=','12');
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defendant_cid($caseid) 
		{
		  $this->db->select('cid');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('caseid',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->cid;	
	      }else{
	   		return false;
		  }
			
		}

		function get_defendant_cid_1($uid) 
		{
		  $this->db->select('cid');
	      $this->db->from('elat_tbl_respondent');
	      $this->db->where('created_by',$uid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->cid;	
	      }else{
	   		return false;
		  }
			
		}

		function get_applicant_cid($caseid) 
		{
		  $this->db->select('CID');
	      $this->db->from('sc_tbl_user_profile');
		  $this->db->where('id',$caseid);
		  $this->db->where('user_type >=', '12');
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->CID;	
	      }else{
	   		return false;
		  }
			
		}

		function get_applicant_1_cid($miscid) 
		{
		  $this->db->select('created_by');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('misc_case_id',$miscid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->created_by;	
	      }else{
	   		return false;
		  }
			
		}


		function get_jp_id($id) 
		{
		  $this->db->select('judicial_process_id');
	      $this->db->from('sc_tbl_case_form_elat');
	      $this->db->where('id',$id);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->judicial_process_id;	
	      }else{
	   		return false;
		  }
			
		}

		function get_elat_cid_client($caseid) 
		{
		  $this->db->select('cid');
	      $this->db->from('elat_tbl_client_registrations');
	      $this->db->where('caseid',$caseid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->cid;	
	      }else{
	   		return false;
		  }
			
		}

		function get_latigant_id($latcid) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_litigant');
	      $this->db->where('litigant_CID',$latcid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	      }else{
	   		return false;
		  }
			
		}

              public function checkDuplicateUser($cid)
		  {
			  $this->db->where('CID', $cid);
		      $query = $this->db->get('sc_tbl_user_profile');
	          $count_row = $query->num_rows();
		    if ($count_row > 0) {
				return TRUE;
			   } else {
				return FALSE;
			}
		}


            public function checkDuplicateUser_summon($cid)
		  {
			  $this->db->where('CID', $cid);
			  $this->db->where('user_type >=', '11');
		      $query = $this->db->get('sc_tbl_user_profile');
	          $count_row = $query->num_rows();
		    if ($count_row > 0) {
				return TRUE;
			   } else {
				return FALSE;
			}
		}

		public function checkDuplicateLatigant($cid)
		  {
			  $this->db->where('litigant_CID', $cid);
		      $query = $this->db->get('sc_tbl_litigant');
	          $count_row = $query->num_rows();
		    if ($count_row > 0) {
				return TRUE;
			   } else {
				return FALSE;
			}
		}

     public function checkDuplicateLatigantOrg($cid)
		  {
			  $this->db->where('litigant_CID', $cid);
			  $this->db->where('is_org', 1);
		      $query = $this->db->get('sc_tbl_litigant');
	          $count_row = $query->num_rows();
		    if ($count_row > 0) {
				return TRUE;
			   } else {
				return FALSE;
			}
		}	


    function get_latigant_id_incase($latcid) 
		{
		  $this->db->select('id');
	      $this->db->from('sc_tbl_litigant');
		  $this->db->where('litigant_CID',$latcid);
          $this->db->limit(1);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->id;	
	          }else{
	   		return false;
		  }
			
		}
 
	
    function get_petition_filename($cid) 
		{
		  $this->db->select('petition_copy');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->petition_copy;	
	      }else{
	   		return false;
		  }
			
		}

		function get_apeal_userid($cid) 
		{
		  $this->db->select('elat_userid');
	      $this->db->from('sc_tbl_appeal');
	      $this->db->where('case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->elat_userid;	
	      }else{
	   		return false;
		  }
			
		}
		
		function get_apeal_appcopy($cid) 
		{
		  $this->db->select('application_copy');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->application_copy;	
	      }else{
	   		return false;
		  }
			
		}
		
		function get_judgementcopy($cid) 
		{
		  $this->db->select('upload');
	      $this->db->from('sc_tbl_judgement');
	      $this->db->where('case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->upload;	
	      }else{
	   		return false;
		  }
			
		}

		function get_apeal_hearingoption($cid) 
		{
		  $this->db->select('hearing_option');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->hearing_option;	
	      }else{
	   		return false;
		  }
			
		}

		function get_apeal_applivcanttype($cid) 
		{
		  $this->db->select('applicant_type');
	      $this->db->from('elat_tbl_case_submission');
	      $this->db->where('misc_case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->applicant_type;	
	      }else{
	   		return false;
		  }
			
		}

		function get_apeal_appealdate($cid) 
		{
		  $this->db->select('created_on');
	      $this->db->from('sc_tbl_appeal_elat');
	      $this->db->where('case_id',$cid);
	      $result = $this->db->get()->row();
	      if($result){
	   		return $result->created_on;	
	      }else{
	   		return false;
		  }
			
		}

//trafficlight_3month//
function trafficlight_3month() 
{
    $query = $this->db->query("SELECT * FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 3 MONTH);");  
    return $query->result();
}
function trafficlight_3monthtotal() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 3 MONTH);");   
    return $query->row_array();
}
//trafficlight_6month//
function trafficlight_6month() 
{  
     $query = $this->db->query("SELECT * FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 6 MONTH);");  
     return $query->result();
}
function trafficlight_6monthtotal() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 6 MONTH);");   
    return $query->row_array();
}
//trafficlight_9month//
function trafficlight_9month() 
{  
     $query = $this->db->query("SELECT * FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 9 MONTH);");  
     return $query->result();
}
function trafficlight_9monthtotal() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 9 MONTH);");   
    return $query->row_array();
}
//trafficlight_9month//
function trafficlight_12month() 
{  
     $query = $this->db->query("SELECT * FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 12 MONTH);");  
     return $query->result();
}
function trafficlight_12monthtotal() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info where year(reg_date) = YEAR(CURDATE()) and registration_status=1 and `status` !=4 and reg_date<= DATE_SUB(CURDATE(), INTERVAL 12 MONTH);");   
    return $query->row_array();
}

//datewise search CIVIL//
function cv_count123() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '10' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_count123_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
     WHERE court_id = '10' AND reg_date between '$fromdate' and '$todate'");   
	return $query2->result();
}
function cv_countbum() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '1' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countbum_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '1' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countchk() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '2' or misc.court_id = '28')and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countchk_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '2' OR sc_tbl_misc_case_info.court_id = '28') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countpun() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '11' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countpun_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '11' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countdag() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '3' or misc.court_id = '25') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countdag_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '3' OR sc_tbl_misc_case_info.court_id = '25') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countgas() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '4' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countgas_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '4' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_counthaa() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '5' or misc.court_id = '33') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_counthaa_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '5' OR sc_tbl_misc_case_info.court_id = '33') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countthi() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '17' or misc.court_id = '6' or misc.court_id = '14' or misc.court_id = '38' or misc.court_id = '26') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countthi_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '6' OR sc_tbl_misc_case_info.court_id = '14' OR sc_tbl_misc_case_info.court_id = '17' OR sc_tbl_misc_case_info.court_id = '38' OR sc_tbl_misc_case_info.court_id = '26') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countlhu() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '7' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countlhu_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '7' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countmon() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '8' or misc.court_id = '36') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countmon_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '8' OR sc_tbl_misc_case_info.court_id = '36') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countpema() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '9' or misc.court_id = '27') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countpema_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '9' OR sc_tbl_misc_case_info.court_id = '27') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countsjon() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '12' or misc.court_id = '24' or misc.court_id = '30' ) and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countsjon_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '12' OR sc_tbl_misc_case_info.court_id = '24' OR sc_tbl_misc_case_info.court_id = '30') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countsts() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '13' or misc.court_id = '22' or misc.court_id = '32') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countsts_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '13' OR sc_tbl_misc_case_info.court_id = '22' OR sc_tbl_misc_case_info.court_id = '32') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_counttashi() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '15' or misc.court_id = '31' or misc.court_id = '34' or misc.court_id = '35') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_counttashi_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '15' OR sc_tbl_misc_case_info.court_id = '31' OR sc_tbl_misc_case_info.court_id = '34' OR sc_tbl_misc_case_info.court_id = '35') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_counttyang() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '16' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_counttyang_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '16' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_counttong() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '18' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_counttong_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '18' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_counttsir() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '19' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_counttsir_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '19' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countwdue() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '20' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countwdue_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '20' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countzga() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '21' or misc.court_id = '29') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countzga_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '21' OR sc_tbl_misc_case_info.court_id = '29') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cv_countsarp() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '23' or misc.court_id = '37') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cv_countsarp_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '23' OR sc_tbl_misc_case_info.court_id = '37') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '1' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
//datewise search CIVIL END//
//datewise search CRIMINAL//
function cr_count123() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '10' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_count123_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '10' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countbum() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '1' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countbum_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '1' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countchk() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '2' or misc.court_id = '28') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countchk_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '2' OR sc_tbl_misc_case_info.court_id = '28') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countpun() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '11' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countpun_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '11' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countdag() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '3' or misc.court_id = '25') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countdag_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '3' OR sc_tbl_misc_case_info.court_id = '25') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countgas() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '4' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countgas_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '4' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_counthaa() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '5' or misc.court_id = '33') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counthaa_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '5' OR sc_tbl_misc_case_info.court_id = '33') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countthi() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '17' or misc.court_id = '6' or misc.court_id = '14' or misc.court_id = '38' or misc.court_id = '26') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countthi_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '6' OR sc_tbl_misc_case_info.court_id = '14' OR sc_tbl_misc_case_info.court_id = '17' OR sc_tbl_misc_case_info.court_id = '38' OR sc_tbl_misc_case_info.court_id = '26') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countlhu() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '7' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countlhu_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '7' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countmon() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '8' or misc.court_id = '36') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countmon_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '8' OR sc_tbl_misc_case_info.court_id = '36') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countpema() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '9' or misc.court_id = '27') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countpema_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '9' OR sc_tbl_misc_case_info.court_id = '27') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countsjon() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '12' or misc.court_id = '14' or misc.court_id = '24' or misc.court_id = '30') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countsjon_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '12' OR sc_tbl_misc_case_info.court_id = '24' OR sc_tbl_misc_case_info.court_id = '30') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countsts() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '13' or misc.court_id = '22' or misc.court_id = '32') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countsts_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '13' OR sc_tbl_misc_case_info.court_id = '22' OR sc_tbl_misc_case_info.court_id = '32') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_counttashi() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '15' or misc.court_id = '31' or misc.court_id = '34' or misc.court_id = '35')  and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counttashi_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '15' OR sc_tbl_misc_case_info.court_id = '31' OR sc_tbl_misc_case_info.court_id = '34' OR sc_tbl_misc_case_info.court_id = '35') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_counttyang() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '16' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counttyang_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '16' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_counttong() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '18' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counttong_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '18' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_counttsir() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '19' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counttsir_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '19' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countwdue() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '20' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countwdue_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  sc_tbl_misc_case_info.court_id = '20' AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countzga() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '21' or misc.court_id = '29') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countzga_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '21' OR sc_tbl_misc_case_info.court_id = '29') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
function cr_countsarp() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '23' or misc.court_id = '37') and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_countsarp_1() 
{
    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $query2 = $this->db->query("SELECT * FROM sc_tbl_misc_case_info
    INNER JOIN sc_tbl_casetypelevel3
    ON sc_tbl_casetypelevel3.id = sc_tbl_misc_case_info.casetypelevel3_id
    WHERE  (sc_tbl_misc_case_info.court_id = '23' OR sc_tbl_misc_case_info.court_id = '37') AND sc_tbl_casetypelevel3.caseTypelevel1_id = '2' and sc_tbl_misc_case_info.reg_date >= '$fromdate' and sc_tbl_misc_case_info.reg_date <= '$todate'");   
	return $query2->result();
}
///datawise search CRIMINAL END

////////////
function cv_count_paro() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '10' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_bumthang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '1' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_chukha() 
{
$query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '2' or misc.court_id = '28') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_punakha() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '11' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_dagana() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '3' or misc.court_id = '25') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_gasa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '4' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_haa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '5' or misc.court_id = '33') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_thimphu() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '17' or misc.court_id = '26' or misc.court_id = '6' or misc.court_id = '38' or misc.court_id = '14') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_lhuntse() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '7' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_mongar() 
{
$query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '8' or misc.court_id = '36') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_pg() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '9' or misc.court_id = '27') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_sj() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '12' or misc.court_id = '24' or misc.court_id = '30')and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_samtse() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '13' or misc.court_id = '32' or misc.court_id = '22') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_tg() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '15' or misc.court_id = '31' or misc.court_id = '34' or misc.court_id = '35') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_ty() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '16' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_trongsa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '18' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_tsirang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '19' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_wangdi() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.court_id = '20' and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function cv_count_zhemgang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '21' or misc.court_id = '29') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

function cv_count_sarpang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and (misc.court_id = '37' or misc.court_id = '23') and misc.registration_status = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}

////////////CRIMINAL///////////////////////////////////////////////
function cr_count_paro() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '10' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_bumthang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '1' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_chukha() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '2' or misc.court_id = '28') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_punakha() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '11'");
    return $query->row_array();
}
function cr_count_dagana() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '3' or misc.court_id = '25') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_gasa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '4' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_haa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '5' or misc.court_id = '33') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_thimphu() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '17' or misc.court_id = '6' or misc.court_id = '14' or misc.court_id = '26' or misc.court_id = '38') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_lhuntse() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '7' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_mongar() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '8' or misc.court_id = '36') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_pg() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '9' or misc.court_id = '27') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_sj() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '12' or misc.court_id = '24' or misc.court_id = '30') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_samtse() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '13' or misc.court_id = '22' or misc.court_id = '32') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_tg() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '15' or misc.court_id = '31' or misc.court_id = '34' or misc.court_id = '35') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_ty() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '16' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_trongsa() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '18' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_tsirang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '19' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_wangdi() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.court_id = '20' and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_zhemgang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '21' or misc.court_id = '29') and misc.registration_status = '1'");
    return $query->row_array();
}
function cr_count_sarpang() 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and (misc.court_id = '37' or misc.court_id = '23') and misc.registration_status = '1'"); 
    return $query->row_array();
}

////totalcount
function cv_counttotal($fromdate, $todate, $dzo) 
{

    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
WHERE cl1.id = '1' and crt.id = '$dzo' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}
function cr_counttotal($fromdate, $todate, $dzo) 
{
    $query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
WHERE cl1.id = '2' and crt.id = '$dzo' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'");   
    return $query->row_array();
}

////
function op_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '9' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '27' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_pg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '9' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_ngl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '27' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
//SJ
function rg1_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '12' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '12'");
    return $query->row_array();
    
}
function s1_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '12' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s4_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '12' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '12'");
    return $query->row_array();    
}
function s2_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_sj() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '12' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_jt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '24' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '30' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
////CHUKHA
function opening_balance($cid) 
{ 
    $query = $this->db->query("select bench_name as BENCH, sum(rowcount) as count_rows
from (
     ( select count(*) as rowcount, ci.court_id, pr.court_name, b.bench_name, b.id as bid
       from sc_tbl_misc_case_info ci
       Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
       Left JOIN sc_tbl_bench b ON ci.bench = b.id
       where year(ci.reg_date) < year(now()) and (ci.status!=4) and (ci.status!=5) and ci.court_id = $cid group by ci.court_id)
union all
     (select count(*) as rowcount, ci.court_id, pr.court_name, b.bench_name, b.id as bid
      from sc_tbl_misc_case_info ci
      Left join sc_tbl_judgement jd on ci.id = jd.case_id
      Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
      Left JOIN sc_tbl_bench b ON ci.bench = b.id
      where year(ci.reg_date) < year(now())  and year(jd.judgement_date)=year(now()) and ci.court_id = $cid and b.id is not null 
	  group by ci.court_id)
     )t
group by court_id order by bid desc");
    return $query->row_array();
    
}

function op_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '28' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_c() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '2' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function registered_case($cid) 
{ 
    $query = $this->db->query("select ifnull(count(case when (ci.registration_status = 1)  then 1 end),0) as count_rows
from sc_tbl_misc_case_info ci
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(reg_date) = year(now()) and ci.court_id = $cid and b.id is not null");
    return $query->row_array();
    
}
function s1_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function pending_case($cid) 
{ 
    $query = $this->db->query("select count(case when (ci.`status` != 4 and ci.`status` != 5) and (registration_status = 1) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where  ci.court_id = $cid and b.id is not null");
    return $query->row_array();
    
}
function s3_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function decided_case($cid) 
{ 
    $query = $this->db->query("select count(distinct j.case_id) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_judgement j on ci.id = j. case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(j.judgement_date) = year(now()) and b.id is not null
and (ci.`status` = 4 or ci.`status` = 5) and ci.registration_status = 1 and ci.court_id = $cid ");
    return $query->row_array();    
}
function s4_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_c() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '2' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function appealed_to_highcourt($cid) 
{ 
    $query = $this->db->query("select 
count(case when (app.appealed_court_id = 6 and app.appealed_court_id != 0) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_appeal app on ci.id=app.case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(appeal_date) = year(now()) and ci.court_id = $cid and b.id is not null");
    return $query->row_array();
}

function appealed_to_dzongkhag($cid) 
{ 
    $query = $this->db->query("select 
count(case when (app.appealed_court_id != 6 and app.appealed_court_id != 14 and app.appealed_court_id != 0 and app.appealed_court_id != 38) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_appeal app on ci.id=app.case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(appeal_date) = year(now()) and ci.court_id = $cid and b.id is not null");
    return $query->row_array();
}
function appealed_to_hclb($cid) 
{ 
    $query = $this->db->query("select 
count(case when (app.appealed_court_id = 14 and app.appealed_court_id != 0) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_appeal app on ci.id=app.case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(appeal_date) = year(now()) and ci.court_id = $cid and b.id is not null");
    return $query->row_array();
}
function appealed_to_sc($cid) 
{ 
    $query = $this->db->query("select 
count(case when (app.appealed_court_id = 14 and app.appealed_court_id != 0) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_appeal app on ci.id=app.case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(appeal_date) = year(now()) and ci.court_id = $cid and b.id is not null");
    return $query->row_array();
}
function s5_pl() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '28' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
////
function op_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '3' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_lhz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '25' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_dag() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '3' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '25' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
////HAA
function op_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '5' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '33' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_ha() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '5' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_sb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '33' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
////
function op_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
where registration_status = '1' and court_id = '10' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_paro() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '10' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
////GASA
function op_gasa() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '4' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_ga() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '4' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
//SMATSE
function op_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '13' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function op_tc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '32' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function op_do() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '22' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function rg1_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s4_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_sam() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '13' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_dr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '22' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_ss() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '32' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///THIMPHU
function op_tp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '17' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();  
}

function op_lz() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '26' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();  
}

function op_sc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '14' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();  
}

function op_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '6' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();  
}

function op_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '38' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();  
}


function rg1_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();  
}
function rg1_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();   
}
function s3_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();   
}
function s3_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_th() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '17' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_lh() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '26' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function rg1_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '1' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '1' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '1' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s4_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_suc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_hc() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '6' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_hclb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '38' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///TASHIGANG
function op_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '15' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function op_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '31' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function op_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '34' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function op_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '35' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
}
function rg1_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '15' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function rg1_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function rg1_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '35' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s1_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '15' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '35' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '15' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s3_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '35' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array(); 
}
function s4_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '15' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '14' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '35' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}

function s5_tg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '15' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_sk() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '31' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_tm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '34' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_wm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '35' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
////MONGAR
function op_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '8' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '36' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_m() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '8' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_w() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '36' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
////ZHEMGANG
function op_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '20' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '29' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_zm() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_pb() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '29' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
////T/YANGTSE
function op_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '16' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_ty() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '16' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
////WPHODRANG
function op_wd() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '20' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_wp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '20' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///TRONGSA
function op_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '18' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_trg() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '18' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///TSIRANG
function op_tsi() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '19' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}

function rg1_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_tsr() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '19' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///BUMTHANG
function op_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_bt() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '1' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
///LHUNTSE
function op_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '7' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}

function s1_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_lhun() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '7' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
////SARPANG
function op_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '37' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function op_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '23' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function rg1_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s4_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s2_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s5_sp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '37' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function s5_gp() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '23' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
///PUNAKHA
function op_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '11' and registration_status = '1' and `status` <> 4 and `status` <> 5 and YEAR(reg_date) = YEAR(CURDATE())-1");
    return $query->row_array();
    
}
function rg1_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s1_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where registration_status = '1' AND court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s3_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '3' AND court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
    
}
function s4_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '4' AND court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s2_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '2' AND court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();    
}
function s5_pu() 
{ 
    $query = $this->db->query("SELECT COUNT(*) as count_rows FROM sc_tbl_misc_case_info
    	     where status = '5' AND court_id = '11' and YEAR(reg_date) = YEAR(CURDATE())");
    return $query->row_array();
}
function get_casetypelevel2Name($caseTypelevel2_id)
{
    $this->db->select('caseTypeleve2');
	$this->db->from('sc_tbl_casetypelevel2');
	$this->db->where('id',$caseTypelevel2_id);
	$result = $this->db->get()->row();
	return $result->caseTypeleve2;
}

function current_total_case()
{
    $this->db->select('*');
	$this->db->from('sc_tbl_misc_case_info');
	$this->db->where('registration_status',1);
	$this->db->where('year(reg_date)',date("Y")); 
	$query = $this->db->get();
    return $query->result();
}

function current_total_decided()
{
    $query = $this->db->query("select count(distinct j.case_id) as count_rows
from sc_tbl_misc_case_info ci
left join sc_tbl_judgement j on ci.id = j. case_id
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where year(j.judgement_date) = year(now()) and b.id is not null
and (ci.`status` = 4 or ci.`status` = 5) and ci.registration_status = 1"); 
return $query->row_array();
}

function current_total_pending()
{
    $query = $this->db->query("select count(case when (ci.`status` != 4 and ci.`status` != 5) and (registration_status = 1) then 1 end) as count_rows
from sc_tbl_misc_case_info ci
Left JOIN sc_tbl_court_profile pr ON ci.court_id = pr.id
Left JOIN sc_tbl_bench b ON ci.bench = b.id
where b.id is not null"); 
return $query->row_array();
}

function current_total_active()
{
    $this->db->select('*');
	$this->db->from('sc_tbl_misc_case_info');
	$this->db->where('status',3);
	$this->db->where('year(reg_date)',date("Y"));
	$query = $this->db->get();
    return $query->result();
}

function current_total_assigned()
{
    $this->db->select('*');
	$this->db->from('sc_tbl_misc_case_info');
	$this->db->where('status',2);
	$this->db->where('year(reg_date)',date("Y"));
	$query = $this->db->get();
    return $query->result();
}
//casetype//
function courtwise_total_civil($courtid) 
{
$query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '1' and misc.registration_status = '1' and misc.court_id = '$courtid' and YEAR(reg_date) = YEAR(CURDATE())"); 
return $query->row_array();
}

function courtwise_total_criminal($courtid) 
{
$query = $this->db->query("SELECT COUNT(*) as count_rows 
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
WHERE cl1.id = '2' and misc.registration_status = '1' and misc.court_id = '$courtid' and YEAR(reg_date) = YEAR(CURDATE())"); 
return $query->row_array();
}

function courtwise_total_criminal_details($courtid) 
{
$query = $this->db->query("SELECT crt. court_name as CourtName, cl2.caseTypeleve2 as CaseLevel, misc.reg_date as RegDate, misc.status as cstatus
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
WHERE cl1.id = '2' and misc.registration_status = '1' and misc.court_id = '$courtid' and YEAR(reg_date) = YEAR(CURDATE())"); 
return $query->result();
}

function courtwise_total_criminal_details_search($fromdate, $todate, $dzo) 
{
$query = $this->db->query("SELECT crt. court_name as CourtName, dzo.`Name` as Dzongkhag, misc.case_title as casetitle, cl2.caseTypeleve2 as CaseLevel, misc.reg_date as RegDate, misc.status as cstatus
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
left join sc_tbl_master_dzongkhag dzo on crt.dzongkhag_id = dzo.DzongkhagID
WHERE cl1.id = '2' and crt.id = '$dzo' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'"); 
return $query->result();
}

function courtwise_total_civil_details_search($fromdate, $todate, $dzo) 
{
$query = $this->db->query("SELECT crt. court_name as CourtName, dzo.`Name` as Dzongkhag, misc.case_title as casetitle, cl2.caseTypeleve2 as CaseLevel, misc.reg_date as RegDate, misc.status as cstatus
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
left join sc_tbl_master_dzongkhag dzo on crt.dzongkhag_id = dzo.DzongkhagID
WHERE cl1.id = '1' and crt.id = '$dzo' and misc.registration_status = '1' and misc.reg_date between '$fromdate' and '$todate'"); 
return $query->result();
}

function courtwise_total_civil_details($courtid) 
{
$query = $this->db->query("SELECT crt. court_name as CourtName, cl2.caseTypeleve2 as CaseLevel, misc.reg_date as RegDate, misc.status as cstatus
FROM sc_tbl_misc_case_info misc
left JOIN sc_tbl_case_casetype_link cl on misc.id = cl.case_id
left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
left join sc_tbl_court_profile crt on misc.court_id = crt.id
WHERE cl1.id = '1' and misc.registration_status = '1' and misc.court_id = '$courtid' and YEAR(reg_date) = YEAR(CURDATE())"); 
return $query->result();
}

public function call_civil_count() {
			$str="SELECT count(*) as civil_total 
			FROM db_sc.sc_tbl_case_casetype_link cl
			left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
			left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
			left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
			where cl1.id = '1' limit 1000000000";
	        $query =  $this->db->query($str);
 	        $result = $query->result();
   	        return $result;
		 }

public function call_criminal_count() {
			$str="SELECT count(*) as criminal_total 
			FROM db_sc.sc_tbl_case_casetype_link cl
			left join sc_tbl_casetypelevel3 cl3 on cl.case_type_id = cl3.id
			left join sc_tbl_casetypelevel2 cl2 on cl3.caseTypelevel2_id = cl2.id
			left join sc_tbl_casetypelevel1 cl1 on cl2.caseTypelevel1_id = cl1.id
			where cl1.id = '2' limit 1000000000";
	        $query =  $this->db->query($str);
 	        $result = $query->result();
   	        return $result;
		 }

public function call_case_decided() {
			$str="SELECT count(*) as total_decided
			FROM db_sc.sc_tbl_misc_case_info
			where status = '4' limit 1000000000";
	        $query =  $this->db->query($str);
 	        $result = $query->result();
   	        return $result;
		 }

public function call_case_appealed() {
			$str="SELECT count(*) as total_appealed
			FROM db_sc.sc_tbl_misc_case_info
			where status = '5' limit 1000000000";
	        $query =  $this->db->query($str);
 	        $result = $query->result();
   	        return $result;
		 }

}
?>

