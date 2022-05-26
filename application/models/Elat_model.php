<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Elat_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function get_mobile($uid)
	{
		$this->db->select('contact');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('id', $uid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->contact;
		} else {
			return false;
		}
	}
	
	function get_resdef_payment($id)
	{
		$this->db->select('payment');
		$this->db->from('elat_tbl_defendant_payment');
		$this->db->where('caseid', $id);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->payment;
		} else {
			return false;
		}
	}

	function get_resdef($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public($uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		//$this->db->where('case_status !=', '');
		$this->db->where('created_by', $uid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public_def($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('cid', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


        function get_cases_public_def_limit1($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('cid', $cid);
		$this->db->order_by('id', 'desc');
                $this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public_caseid($caseid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $caseid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_cases_courtdocuments($miscid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_courtorders');
		$this->db->where('misc_caseid', $miscid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_clients($uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_client_registrations');
		$this->db->where('created_by', $uid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_appeal_cases_public($uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('created_by', $uid);
		$this->db->where('case_complete_status', '4');
		$this->db->or_where('case_complete_status', '5');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_appealcases_public($miscid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_appeal_elat');
		$this->db->where('case_id', $miscid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public_case_submission($uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('case_status', 'A');
		$this->db->where('created_by', $uid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public_case_appeal($appealid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_appeal_elat');
		$this->db->where('id', $appealid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_public_case_files($caseid, $uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_files');
		$this->db->where('case_id', $caseid);
		$this->db->where('user_type', '12');
		$this->db->where('created_by', $uid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_cases_public_case_files_def($caseid, $uid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_files');
		$this->db->where('case_id', $caseid);
		$this->db->where('user_type', '14');
		$this->db->where('created_by', $uid);
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


	function get_cases($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('court_id', $cid);
		$this->db->where('registered', '0');
		$this->db->where('deff_status', '1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

        function get_feedback($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_feedback');
		$this->db->where('court_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

       function get_feedback_header($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_feedback');
		$this->db->where('status', '0');
		$this->db->where('court_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

       function get_caseno_1($miscid)
	{
		$this->db->select('reg_no');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('misc_case_id', $miscid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->reg_no;
		} else {
			return false;
		}
	}

      function get_feedback_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_feedback');
		$this->db->where('case_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_header($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('case_status', '');
		$this->db->where('court_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_appealcases($cid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_appeal_elat');
		$this->db->where('court_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_cases_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_revdocs($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_relevantdoccopy');
		$this->db->where('case_id', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_individual_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_bht_registrations');
		$this->db->where('cid', $cid);
		$this->db->where('user_type', '12');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_lawyer_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_bht_registrations');
		$this->db->where('cid', $cid);
		$this->db->where('user_type', '13');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_lawyer_ldetails($cid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_lawyer');
		$this->db->where('CID', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_org_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_org_registrations');
		$this->db->where('cid', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

       function get_org_name($cid)
	{
                $this->db->select('org_name');
		$this->db->from('elat_tbl_org_registrations');
		$this->db->where('cid', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->org_name;
		} else {
			return false;
		}
	}

	function get_nonbht_details($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_nonbht_registrations');
		$this->db->where('wp_passport', $cid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_respondent($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid', $cid);
                //$this->db->where('draft', '1');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_defendant_caseid($defcid)
	{
		$this->db->select('caseid');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('cid', $defcid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->caseid;
		} else {
			return false;
		}
	}

	function get_cases_defendant($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid', $cid);
		$this->db->where('case_type', 'Criminal');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_court_orders($misccaseid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_courtorders');
		$this->db->where('misc_caseid', $misccaseid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_court_orders_def($caseid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_courtorders');
		$this->db->where('elatid', $caseid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_live_details($caseid)
	{
		$this->db->select('*');
		$this->db->from('jitsi');
		$this->db->where('case_id', $caseid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_respondent_1($cid)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_respondent');
		$this->db->where('caseid', $cid);
		$this->db->where('case_type', 'Constitutional');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_bar_lic_copy($cid)
	{
		$this->db->select('petition_copy');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->petition_copy;
		} else {
			return false;
		}
	}

       function get_case_type($cid)
	{
		$this->db->select('case_type');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->case_type;
		} else {
			return false;
		}
	}

       function get_remand_status($cid)
	{
		$this->db->select('remand_status');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->remand_status;
		} else {
			return false;
		}
	}
	
	function get_mischear_status($cid)
	{
		$this->db->select('mischearing_status');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->mischearing_status;
		} else {
			return false;
		}
	}

	function get_regno($miscid)
	{
		$this->db->select('reg_no');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('misc_case_id', $miscid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->reg_no;
		} else {
			return false;
		}
	}

	function get_case_cmsuserid($cid)
	{
		$this->db->select('created_by');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->created_by;
		} else {
			return false;
		}
	}

	function get_case_cmscid($uid)
	{
		$this->db->select('CID');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('id', $uid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->CID;
		} else {
			return false;
		}
	}

	function get_misccaseid($cid)
	{
		$this->db->select('misc_case_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->misc_case_id;
		} else {
			return false;
		}
	}

	function get_misccaseid_withcreatedby($uid)
	{
		$this->db->select('misc_case_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('created_by', $uid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->misc_case_id;
		} else {
			return false;
		}
	}

	function get_misccaseid_withcreatedby_dash($uid)
	{
		$this->db->select('misc_case_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('created_by', $uid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_misccaseid_withcreatedby_defdash($ecaseid)
	{
		$this->db->select('misc_case_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $ecaseid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_app_forms($miscid)
	{
		$this->db->select('form_name');
		$this->db->from('sc_tbl_case_form_elat');
		$this->db->where('case_id', $miscid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_app_forms_def($miscid)
	{
		$this->db->select('form_name_def');
		$this->db->from('sc_tbl_case_form_elat');
		$this->db->where('case_id', $miscid);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	function get_cases_status($cid)
	{
		$this->db->select('case_status');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->case_status;
		} else {
			return false;
		}
	}

	function get_cases_payment_status($cid)
	{
		$this->db->select('payment_status');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->payment_status;
		} else {
			return false;
		}
	}

	function get_elat_username($uid)
	{
		$this->db->select('judge_name');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('id', $uid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->judge_name;
		} else {
			return false;
		}
	}

	function get_email($uid)
	{
		$this->db->select('email');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('id', $uid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->email;
		} else {
			return false;
		}
	}

	function get_casetitle($cid)
	{
		$this->db->select('case_title');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->case_title;
		} else {
			return false;
		}
	}

	function get_casetitle_1($miscid)
	{
		$this->db->select('case_title');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('misc_case_id', $miscid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->case_title;
		} else {
			return false;
		}
	}
	function get_ecaseid($cid)
	{
		$this->db->select('id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('misc_case_id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->id;
		} else {
			return false;
		}
	}
	function get_created_by($cid)
	{
		$this->db->select('created_by');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('misc_case_id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->created_by;
		} else {
			return false;
		}
	}

	function get_case_date($cid)
	{
		$this->db->select('created_on');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->created_on;
		} else {
			return false;
		}
	}
	function get_case_createdby($cid)
	{
		$this->db->select('created_by');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->created_by;
		} else {
			return false;
		}
	}


	function get_case_hearingdate($cid)
	{
		$this->db->select('misc_hearing_date');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->misc_hearing_date;
		} else {
			return false;
		}
	}

	function get_case_applicationdate($cid)
	{
		$this->db->select('created_on');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->created_on;
		} else {
			return false;
		}
	}

	function get_case_application_number($cid)
	{
		$this->db->select('application_no');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->application_no;
		} else {
			return false;
		}
	}

	function application_search($searchterm)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('application_no', $searchterm);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	function application_search_def($searchterm)
	{
		$this->db->select('*');
		$this->db->from('elat_tbl_defendant_payment');
		$this->db->where('application_no', $searchterm);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
     
        function get_judges($courtid)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('court', $courtid);
		$this->db->where('user_type', '2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	function get_case_hearingtime($cid)
	{
		$this->db->select('misc_hearing_time');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('id', $cid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->misc_hearing_time;
		} else {
			return false;
		}
	}


	function get_application_courtid($searchterm) 
	{
		$this->db->select('court_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('application_no', $searchterm);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->court_id;
		} else {
			return false;
		}
	}

	function get_application_accounthead($pt) 
	{
		$this->db->select('acount_head');
		$this->db->from('tbl_court_fee');
		$this->db->where('id', $pt);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->acount_head;
		} else {
			return false;
		}
	}

	function get_application_account_amount($pt) 
	{
		$this->db->select('amount');
		$this->db->from('tbl_court_fee');
		$this->db->where('id', $pt);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->amount;
		} else {
			return false;
		}
	}


	function get_application_agencycode($courtid) 
	{
		$this->db->select('AgencyCode');
		$this->db->from('sc_tbl_court_profile');
		$this->db->where('id', $courtid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->AgencyCode;
		} else {
			return false;
		}
	}
	
	function get_caseid_defpayment($appno) 
	{
		$this->db->select('caseid');
		$this->db->from('elat_tbl_defendant_payment');
		$this->db->where('application_no', $appno);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->caseid;
		} else {
			return false;
		}
	}
	
	function get_courtid_defpayment($id) 
	{
		$this->db->select('court_id');
		$this->db->from('sc_tbl_misc_case_info');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->court_id;
		} else {
			return false;
		}
	}

	function get_application_courtname($courtid) 
	{
		$this->db->select('court_name');
		$this->db->from('sc_tbl_court_profile');
		$this->db->where('id', $courtid);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->court_name;
		} else {
			return false;
		}
	}

	function get_application_servicename($id) 
	{
		$this->db->select('fee_type');
		$this->db->from('tbl_court_fee');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->fee_type;
		} else {
			return false;
		}
	}
       
        function get_court_id($id) 
	{
		$this->db->select('court_id');
		$this->db->from('elat_tbl_case_submission');
		$this->db->where('application_no', $id);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->court_id;
		} else {
			return false;
		}
	}

	function get_courttype_id($id) 
	{
		$this->db->select('courttype_id');
		$this->db->from('sc_tbl_court_profile');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		if ($result) {
			return $result->courttype_id;
		} else {
			return false;
		}
	}

	function get_application_account_amount_courtwiese($pt, $courttypeid) 
	{ 
		if($courttypeid =='4')
		   {
		        $this->db->select('amount');
		        $this->db->from('tbl_court_fee');
		        $this->db->where('court_type', $courttypeid);
		        $result = $this->db->get()->row();
		        if ($result) {
			      return $result->amount;
		         } else {
			    return false;
		          }
	          }
			  else
			  {
				$this->db->select('amount');
		        $this->db->from('tbl_court_fee');
		        $this->db->where('court_type', '1');
		        $result = $this->db->get()->row();
		        if ($result) {  
			      return $result->amount;
		         } else {
			    return false;
		          }

			  }
        }


}

