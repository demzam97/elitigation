<?php
ini_set('memory_limit', '3000M');
error_reporting(E_ERROR | E_PARSE);
class Registration extends CI_Controller
{

	function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download');
		$this->load->library('form_validation');
		$this->load->model('user_model', 'user');
		$this->load->model('public_model', 'public');
		$this->load->model('Elat_model', 'elat');
		$this->user->check_valid_user();
		header('Cache-Control: no-cache, must-revalidate, max-age = 0');
		header('Cache-Control: post-check = 0, pre-check = 0', false);
		header('Pragma: no-cache');
	}

	public function update_userprofilebht()
	{
		$bhtid = $this->input->post('bhtid');
		$this->db->where('id', $bhtid);
		$update_data['occupation'] = $this->input->post('occupation');
		$update_data['email'] = $this->input->post('email');
		$update_data['mobile'] = $this->input->post('mobile');
		$update_data['alternate_mobile'] = $this->input->post('alternate_mobile');
		$update_data['cur_address_house'] = $this->input->post('cur_address_house');
		$update_data['cur_address_street'] = $this->input->post('cur_address_street');
		$update_data['cur_address_place'] = $this->input->post('cur_address_place');
		$update_data['cur_address_country'] = $this->input->post('cur_address_country');

		$this->db->set($update_data);
		$this->db->where('id', $bhtid);
		$this->db->update('elat_tbl_bht_registrations', $update_data);

		$uid = $this->session->userdata('user_id');
		$eid = $this->user->get_user_email($uid);
		$data['stuff']  = $this->user->get_user_profile($eid);
		$data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
		$data['stuff2'] = $this->user->get_user_profile_org($eid);
		$data['stuff3'] = $this->user->get_user_profile_lawyer($eid);

		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/user_profile', $data);
		$this->load->view('elitigation/footer');
	}
	public function update_userprofilenonbht()
	{
		$nonbhtid = $this->input->post('nonbhtid');
		$this->db->where('id', $nonbhtid);
		$update_data['occupation'] = $this->input->post('occupation');
		//$update_data['email'] = $this->input->post('email');
		$update_data['mobile'] = $this->input->post('mobile');
		$update_data['alternate_mobile'] = $this->input->post('alternate_mobile');
		$update_data['cur_address_house'] = $this->input->post('cur_address_house');
		$update_data['cur_address_street'] = $this->input->post('cur_address_street');
		$update_data['cur_address_place'] = $this->input->post('cur_address_place');
		$update_data['cur_address_country'] = $this->input->post('cur_address_country');

		$this->db->set($update_data);
		$this->db->where('id', $nonbhtid);
		$this->db->update('elat_tbl_nonbht_registrations', $update_data);

		$uid = $this->session->userdata('user_id');
		$eid = $this->user->get_user_email($uid);
		$data['stuff']  = $this->user->get_user_profile($eid);
		$data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
		$data['stuff2'] = $this->user->get_user_profile_org($eid);
		$data['stuff3'] = $this->user->get_user_profile_lawyer($eid);

		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/user_profile', $data);
		$this->load->view('elitigation/footer');
	}
	public function update_userprofile()
	{
		$orgid = $this->input->post('orgid');
		$this->db->where('id', $orgid);
		$update_data['org_name'] = $this->input->post('org_name');
		$update_data['org_type'] = $this->input->post('org_type');
		$update_data['licenseno'] = $this->input->post('licenseno');
		$update_data['po_box'] = $this->input->post('po_box');
		$update_data['phone'] = $this->input->post('phone');
		$update_data['contactperson_mobile'] = $this->input->post('contactperson_mobile');
		$update_data['alternate_mobile'] = $this->input->post('alternate_mobile');
		$update_data['fax'] = $this->input->post('fax');
		$update_data['contact_person'] = $this->input->post('contact_person');
		$update_data['office_address'] = $this->input->post('office_address');

		$this->db->set($update_data);
		$this->db->where('id', $orgid);
		$this->db->update('elat_tbl_org_registrations', $update_data);

		$uid = $this->session->userdata('user_id');
		$eid = $this->user->get_user_email($uid);
		$data['stuff']  = $this->user->get_user_profile($eid);
		$data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
		$data['stuff2'] = $this->user->get_user_profile_org($eid);
		$data['stuff3'] = $this->user->get_user_profile_lawyer($eid);

		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/user_profile', $data);
		$this->load->view('elitigation/footer');
	}
	public function update_userprofilelaw()
	{
		$lawid = $this->input->post('lawid');
		$this->db->where('id', $lawid);
		$update_data['license'] = $this->input->post('license');
		//$update_data['email'] = $this->input->post('email');
		$update_data['Firm'] = $this->input->post('Firm');
		$update_data['Mobile'] = $this->input->post('Mobile');
		$update_data['alternate_mobile'] = $this->input->post('alternate_mobile');
		$update_data['cur_address_house'] = $this->input->post('cur_address_house');
		$update_data['cur_address_street'] = $this->input->post('cur_address_street');
		$update_data['cur_address_place'] = $this->input->post('cur_address_place');
		$update_data['cur_address_country'] = $this->input->post('cur_address_country');

		$this->db->set($update_data);
		$this->db->where('id', $lawid);
		$this->db->update('sc_tbl_lawyer', $update_data);

		$uid = $this->session->userdata('user_id');
		$eid = $this->user->get_user_email($uid);
		$data['stuff']  = $this->user->get_user_profile($eid);
		$data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
		$data['stuff2'] = $this->user->get_user_profile_org($eid);
		$data['stuff3'] = $this->user->get_user_profile_lawyer($eid);

		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/user_profile', $data);
		$this->load->view('elitigation/footer');
	}
	public function update_userprofilelawcertificate()
	{
		$lawid = $this->input->post('lawid');
		$this->db->where('id', $lawid);
		$update_data['barcouncilcertificate'] =  $_FILES["barcouncilcertificate"]["name"];
		$folder = "images/barcouncilcertificate/";
		move_uploaded_file($_FILES["barcouncilcertificate"]["tmp_name"], "$folder" . $_FILES["barcouncilcertificate"]["name"]);

		$this->db->set($update_data);
		$this->db->where('id', $lawid);
		$this->db->update('sc_tbl_lawyer', $update_data);

		$uid = $this->session->userdata('user_id');
		$eid = $this->user->get_user_email($uid);
		$data['stuff']  = $this->user->get_user_profile($eid);
		$data['stuff1'] = $this->user->get_user_profile_nonbht($eid);
		$data['stuff2'] = $this->user->get_user_profile_org($eid);
		$data['stuff3'] = $this->user->get_user_profile_lawyer($eid);

		$this->load->view('elitigation/header1');
		$this->load->view('elitigation/user_profile', $data);
		$this->load->view('elitigation/footer');
	}


	function index()
	{
		$data['registration_rejected'] = $this->public->get_assigned_case_rejected();
		$data['registration'] = $this->public->get_registered_registration();
		$data['appeal_registration'] = $this->public->get_appealling_registration();
		if ($this->session->userdata('court_type') == '1') {
			$data['review_cases'] = $this->public->get_appealling_review();
		}
		$this->load->view('header');
		$this->load->view('registration_view', $data);
		$this->load->view('footer');
	}

	function registry_view()
	{
		$data['registration'] = $this->public->get_registered_registration_registry();
		$data['appeal_registration'] = $this->public->get_appealling_registration();

		$this->load->view('header');
		$this->load->view('registration_view_registry', $data);
		$this->load->view('footer');
	}

	function hybrid_dash()
	{
		$data['registration'] = $this->public->get_hybrid_case();
		$data['appeal_registration'] = $this->public->get_appealling_registration();
		$data['registration_rejected'] = $this->public->get_assigned_case_rejected();

		$this->load->view('header');
		$this->load->view('hybrid_dash', $data);
		$this->load->view('footer');
	}

	function judge_dashboard()
	{
		$data['registration'] = $this->public->get_judge_dashboard();
		$this->load->view('header');
		$this->load->view('judge_dashboard', $data);
		$this->load->view('footer');
	}

	function approve_case($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_misc_case_info');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$status = $result->status;

		if ($status == 2 or $status == 1) {
			$update_data['approved'] = 1;
		}
		if ($status == 5) {
			$update_data['a_approved'] = 1;
			$update_data['approved'] = 1;
		}
		if ($status == 4) {
			$update_data['c_approved'] = 1;
			$update_data['approved'] = 1;
		}

		$this->db->where('id', $id);
		$this->db->update('sc_tbl_misc_case_info', $update_data);
		redirect('registration/judge_dashboard');
	}
	function case_notregistered()
	{
		$data['registration'] = $this->public->get_notregistered_registration();
		$this->load->view('header');
		$this->load->view('case_notregistered', $data);
		$this->load->view('footer');
	}

	function case_remanded()
	{
		$data['registration'] = $this->public->get_remanded_registration();
		$this->load->view('header');
		$this->load->view('case_remanded', $data);
		$this->load->view('footer');
	}
	function case_withdrawn()
	{
		$data['registration'] = $this->public->get_withdrawn_registration();
		$this->load->view('header');
		$this->load->view('case_withdrawn', $data);
		$this->load->view('footer');
	}
	function review_activity()
	{
		$user_id = $this->session->userdata('user_id');
		$data['registration'] = $this->public->get_review_case($user_id);
		$this->load->view('header');
		$this->load->view('review_activity', $data);
		$this->load->view('footer');
	}
	function insert_review_activities($id)
	{
		$data['case_id'] = $id;
		$data['case_info'] = $this->public->get_case_info($id);
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
		$data['case_id'] = $id;
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$data['judges'] = $this->public->getCourtJudge();
		$this->load->view('header');
		$this->load->view('insert_review_activities', $data);
		$this->load->view('footer');
	}
	function add_review_activity($id)
	{
		$data['review_activity_type'] = $this->public->get_review_activity();
		$data['case_id'] = $id;
		$data['judges'] = $this->public->getCourtJudge();
		$data['aJudges'] = $this->public->getAlCaseJudge($id);

		$this->load->view('header');
		$this->load->view('add_review_activity', $data);
		$this->load->view('footer');
	}
	function addJudgePresent()
	{
		$cid = $this->input->post('cid');
		$newJudge = $this->input->post('newJudge');
		$this->public->addCaseJudge($cid, $newJudge);
		redirect('registration/add_review_activity/' . $cid);
	}

	function deleteJudgePresent($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_case_judge_link');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseJudgeDelete($id);
		redirect('registration/add_review_activity/' . $case_id);
	}
	function addDisposal()
	{
		$case_id = $this->input->post('cid');
		$disposalType = $this->input->post('disposal_type');
		$this->public->addDisposalType($case_id, $disposalType);
		redirect('registration/view_rejected_case/' . $case_id);
	}
	function insert_review_activity($id)
	{
		$data['case_id'] = $id;
		/*Selecting the court_id, bench_id,assigned clerk, case_id form sc_misc_case_info*/
		$case_info = $this->public->get_case_info($id);
		foreach ($case_info as $row) :
			$bench = $row->bench;
			$court_id = $row->court_id;
			$clerk = $row->clerk;
			$misc_no = $row->misc_case_no;
			$misc_date = $row->misc_hearing_date;
		endforeach;
		$insert_data['court_id'] = $court_id;
		$insert_data['bench_id'] = $bench;
		$insert_data['assigned_clerk'] = $clerk;
		$insert_data['case_id'] = $id;
		$insert_data['sc_misc_no'] = $misc_no;
		$insert_data['sc_misc_date'] = $misc_date;
		$insert_data['review_type_id'] = $this->input->post('activity_type');
		$insert_data['activity_date'] = $this->input->post('activity_date');
		$insert_data['judge_present'] = $this->input->post('judge_present');
		$insert_data['remarks'] = $this->input->post('remarks');
		$insert_data['created_by'] = $this->session->userdata('user_id');
		$insert_data['created_on'] = date('y-m-d');

		if ($this->db->insert('sc_tbl_review', $insert_data)) {
			$data['case_id'] = $id;
			$data['case_info'] = $this->public->get_case_info($id);
			$data['judicial_process'] = $this->public->get_judicial_process();
			$data['forms'] = $this->public->get_forms();
			$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
			$data['case_id'] = $id;
			$data['temp_litiID'] = $this->public->get_temp_litigantID();
			$data['judges'] = $this->public->getCourtJudge();
			$this->load->view('header');
			$this->load->view('insert_review_activities', $data);
			$this->load->view('footer');
		} else {
			?>
            <script type="text/javascript">
			alert("Check again the fields and Try again");
			</script>
        <?php
			redirect('registration/review_activity');
		}
	}
	function reject_case()
	{
		$caseid = $this->input->post('cas_id');
		$comment = $this->input->post('rej_comment');

		$this->db->where('id', $caseid);
		$update_data['reject'] = 1;
		$update_data['reject_comment'] = $comment;
		$this->db->update('sc_tbl_misc_case_info', $update_data);
		redirect('registration/judge_dashboard');
	}
	function view_rejected_case($id)
	{
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['court_id'] = $case->court_id;
		$data['lits'] = $this->public->getAllCaseLitigant($id);
		$data['judges'] = $this->public->getCourtJudge();
		$data['case_id'] = $case->id;
		$data['mis_case_no'] = $case->misc_case_no;
		$data['case_no'] = $case->reg_no;
		$data['app_date'] = $case->application_date;
		$data['level3'] = $case->casetypelevel3_id;
		$data['case_title'] = $case->case_title;
		$data['applicant_id'] = $case->applicant_id;
		$data['case_brief'] = $case->case_brief;
		$data['misc_hearing_date'] = $case->misc_hearing_date;
		$data['hearing_judge_id'] = $case->hearing_judge_id;
		$data['registration_status'] = $case->registration_status;
		$data['file_attached'] = $case->file_attached;
		$data['reg_date'] = $case->reg_date;
		$data['sentences'] = $this->public->get_sentence_type();
		$data['reg_no'] = $case->reg_no;
		$data['bench'] = $case->bench;
		$data['judge'] = $case->judge;
		$data['clerk'] = $case->clerk;
		$data['reason'] = $case->reason;
		$data['dismissal_no'] = $case->dismissal_no;
		$data['dismissal_date'] = $case->dismissal_date;
		$data['signed_by'] = $case->signed_by;
		$data['issue_order'] = $case->issue_order;
		$data['collected_by'] = $case->collected_by;
		$data['status'] = $case->status;
		$data['approved'] = $case->approved;
		$data['reject_comment'] = $case->reject_comment;
		$data['cid'] = $case->cid;
		$data['upload_order'] = $case->upload_order;
		$data['GetDisposal'] = $this->public->get_disposal_type();
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$data['case_type3'] = $this->public->get_casetype_level3();
		$data['case_type1'] = $this->public->get_casetype_level1();
		$data['case_type2'] = $this->public->get_casetype_level2();
		$data['case_types'] = $this->public->get_case_casetype($id);
		$data['users'] = $this->public->get_hearing_judge();
		$data['act_name'] = $this->public->get_all_acts();
		$data['sentence'] = $this->public->get_sentence_type();
		$data['judicials'] = $this->public->get_Activity_cases($id);
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$this->load->view('header');
		$this->load->view('rejected_case', $data);
		$this->load->view('footer');
	}

	function updateCaseTypeRejected()
	{
		$other = $this->input->post('othercl3');
		$cl3 = $this->input->post('level3');
		if ($other == '') {
			$ctype = $cl3;
		} else {
			$ctype = $other;
		}
		$cid = $this->input->post('caseid');
		$this->public->updateCaseType($cid, $ctype);
		redirect('registration/view_rejected_case/' . $cid);
	}
	function deleteCaseTypeRejected($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_case_casetype_link');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseDeleteType($id);
		redirect('registration/view_rejected_case/' . $case_id);
	}

	function user_dashboard()
	{
		$data['registration'] = $this->public->get_assigned_case();
		$data['registration_rejected'] = $this->public->get_assigned_case_rejected();
		$this->load->view('header');
		$this->load->view('user_dashboard', $data);
		$this->load->view('footer');
	}

	function edit_case($id)
	{
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['court_id'] = $case->court_id;
		$data['case_id'] = $case->id;
		$data['judges'] = $this->public->getCourtJudge();
		$data['mis_case_no'] = $case->misc_case_no;
		$data['case_no'] = $case->reg_no;
		//$data['app_date'] = $case->application_date;
		$data['level3'] = $case->casetypelevel3_id;
		$data['case_title'] = $case->case_title;
		$data['applicant_id'] = $case->applicant_id;
		//$data['review_date']=$case->review_date;
		$data['case_brief'] = $case->case_brief;
		$data['misc_hearing_date'] = $case->misc_hearing_date;
		$data['hearing_judge_id'] = $case->hearing_judge_id;
		$data['registration_status'] = $case->registration_status;
		$data['file_attached'] = $case->file_attached;
		$data['reg_date'] = $case->reg_date;
		$data['reg_no'] = $case->reg_no;
		$data['bench'] = $case->bench;
		$data['judge'] = $case->judge;
		$data['clerk'] = $case->clerk;
		$data['reason'] = $case->reason;
		$data['dismissal_no'] = $case->dismissal_no;
		$data['dismissal_date'] = $case->dismissal_date;
		$data['signed_by'] = $case->signed_by;
		$data['issue_order'] = $case->issue_order;
		$data['collected_by'] = $case->collected_by;
		$data['status'] = $case->status;
		$data['cid'] = $case->cid;
		$data['upload_order'] = $case->upload_order;
		$data['temp_litiID'] = $this->public->get_temp_litigantID();


		$data['case_type1'] = $this->public->get_casetype_level1();
		$data['case_type2'] = $this->public->get_casetype_level2();
		$data['case_type3'] = $this->public->get_casetype_level3();
		$data['lits'] = $this->public->getAllCaseLitigant($id);



		$this->load->view('header');
		$this->load->view('edit_case', $data);
		$this->load->view('footer');
	}
	function editCaseType()
	{
		$other = $this->input->post('othercl3');
		$cl3 = $this->input->post('level3');
		if ($other == '') {
			$ctype = $cl3;
		} else {
			$ctype = $other;
		}
		$cid = $this->input->post('caseid');
		$ctype = $this->input->post('level3');
		$this->public->updateCaseType($cid, $ctype);
		redirect('registration/edit_case/' . $cid);
	}
	function deleteCaseType($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_case_casetype_link');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseDeleteType($id);
		redirect('registration/edit_case/' . $case_id);
	}
	function update_case($id)
	{
		$update_data['misc_case_no'] = $this->input->post('misc_no');
		$update_data['case_title'] = $this->input->post('issue');
		$update_data['misc_hearing_date'] = $this->input->post('misc_hearing_date');
		$update_data['application_date'] = $this->input->post('application_date');
		$update_data['review_date'] = $this->input->post('review_date');
		$update_data['reg_date'] = $this->input->post('reg_date');
		$update_data['reg_no'] = $this->input->post('reg_no');

		$this->db->set($update_data);
		$this->db->where('id', $id);
		$this->db->update('sc_tbl_misc_case_info', $update_data);

		redirect('registration/view_case/' . $id);
	}


	function getEditLit()
	{

		$data['lityps'] = $this->public->get_litigant_type();
		$this->load->view('searchLit', $data);
	}

	function getRejectedEditLit()
	{

		$data['lityps'] = $this->public->get_litigant_type();
		$this->load->view('rejectedLit', $data);
	}
	function editLitCase()
	{
		$case_id = $this->input->post('caseID');
		$LitID = $this->input->post('LitID');
		$litType = $this->input->post('litType');
		$this->public->addLitigantCase($case_id, $LitID, $litType);
		redirect('registration/edit_case/' . $case_id);
	}
	function editRejectedLitCase()
	{
		$case_id = $this->input->post('caseID');
		$LitID = $this->input->post('LitID');
		$litType = $this->input->post('litType');
		$this->public->addLitigantCase($case_id, $LitID, $litType);
		redirect('registration/view_rejected_case/' . $case_id);
	}
	function deleteEditCaseLatigantType($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->caseID;
		$L_id = $result->litigant;

		if ($case_id != '') {
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_litigant');

			$this->db->where('Case_id', $case_id);
			$this->db->where('Litigant_id', $L_id);
			$this->db->delete('tbl_litigant_lawyer_link');
		}

		redirect('registration/edit_case/' . $case_id);
	}
	function deleteRejectedCaseLatigantType($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_litigant');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->caseID;
		$L_id = $result->litigant;

		if ($case_id != '') {
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_litigant');

			$this->db->where('Case_id', $case_id);
			$this->db->where('Litigant_id', $L_id);
			$this->db->delete('tbl_litigant_lawyer_link');
		}

		redirect('registration/view_rejected_case/' . $case_id);
	}
	function editCaseJudge()
	{
		$cid = $this->input->post('cid');
		$newJudge = $this->input->post('newJudge');
		$this->public->addCaseJudge($cid, $newJudge);
		redirect('registration/edit_case/' . $cid);
	}
	function deleteCaseJudge($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_case_judge_link');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseJudgeDelete($id);
		redirect('registration/edit_case/' . $case_id);
	}

	function deleteCaseBench($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_misc_case_info');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseDelete($id);
		redirect('registration/edit_case/' . $case_id);
	}
	//Rejected Case judge
	function editRejectedCaseJudge()
	{
		$cid = $this->input->post('cid');
		$newJudge = $this->input->post('newJudge');
		$this->public->addCaseJudge($cid, $newJudge);
		redirect('registration/view_rejected_case/' . $cid);
	}
	function deleteRejectedCaseJudge($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_case_judge_link');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$this->public->caseJudgeDelete($id);
		redirect('registration/view_rejected_case/' . $case_id);
	}

	function deleteRejectedSigningJudge($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_judgement');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$judge_id = $this->session->flashdata('judge_id');
		$this->public->signingJudgeDelete($id, $judge_id);
		redirect('registration/view_rejected_case/' . $case_id);
	}


	function deleteRejectedActType($id)
	{
		//echo $id;
		$this->db->select('*');
		$this->db->from('sc_tbl_judgement');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();

		$case_id = $result->case_id;
		$act_id = $this->session->flashdata('act_iddd');
		$this->public->actTypeDelete($id, $act_id);
		redirect('registration/view_rejected_case/' . $case_id);
	}


	function deleteSentence($id)
	{
		//echo $id;
		$this->db->select('*');
		$this->db->from('sc_tbl_judgement');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$act_id = $this->session->flashdata('act_ids');
		$this->public->sentenceDelete($id, $act_id);
		redirect('registration/view_rejected_case/' . $case_id);
	}
	//edition of case hearing judge
	function editCaseHearingJudge()
	{
		$cid = $this->input->post('case_id');
		$newJudge = $this->input->post('newHearingJudge');
		$this->public->addCaseHearingJudge($cid, $newJudge);
		redirect('registration/edit_case/' . $cid);
	}
	function deleteCaseHearingJudge($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_hjudge');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->caseID;
		$this->public->caseHearingJudgeDelete($id);
		redirect('registration/edit_case/' . $case_id);
	}
	//For rejected case
	function editRejectedCaseHearingJudge()
	{
		$cid = $this->input->post('case_id');
		$newJudge = $this->input->post('newHearingJudge');
		$this->public->addCaseHearingJudge($cid, $newJudge);
		redirect('registration/view_rejected_case/' . $cid);
	}
	function deleteRejectedCaseHearingJudge($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_registration_hjudge');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->caseID;
		$this->public->caseHearingJudgeDelete($id);
		redirect('registration/view_rejected_case/' . $case_id);
	}
	function deleteRejectedjprocess($id)
	{
		$this->db->select('*');
		$this->db->from('sc_tbl_case_activities');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->caseID;
		$this->public->caseHearingJudgeDelete($id);
		redirect('registration/view_rejected_case/' . $case_id);
	}
	function update_rejected_case()
	{
		$caseid = $this->input->post('case_id');
		$misc_case = $this->input->post('misc_case');
		$issue = $this->input->post('issue');
		$reg_no = $this->input->post('reg_no');
		$reg_date = $this->input->post('reg_date');
		$h_date = $this->input->post('misc_date');
		$a_date = $this->input->post('app_date');
		$judge_date = $this->input->post('judge_date');

		$judge_No = $this->input->post('judge_No');
		$disposal_type = $this->input->post('disposal_type');
		$art_ref = $this->input->post('art_ref');
		$judge_brief = $this->input->post('judge_brief');
		$judgement_upload = $this->input->post('judgement_document');

		$role = $this->session->userdata('user_type');
		$this->db->where('id', $caseid);
		$update_data['misc_case_no'] = $misc_case;
		$update_data['case_title'] = $issue;
		$update_data['reg_no'] = $reg_no;
		$update_data['reg_date'] = $reg_date;
		$update_data['misc_hearing_date'] = $h_date;
		$update_data['application_date'] = $a_date;
		$update_data['reject'] = "0";
		$update_data['reject_comment'] = "";
		$this->db->update('sc_tbl_misc_case_info', $update_data);


		$this->db->where('case_id', $caseid);
		$update_judgement['judgement_no'] = $judge_No;
		$update_judgement['judgement_date'] = $judge_date;
		$update_judgement['upload'] = $judgement_upload;
		$update_judgement['dispossal_type'] = $disposal_type;
		$update_judgement['article'] = $art_ref;
		$update_judgement['judgement_brief'] = $judge_brief;
		$this->db->update('sc_tbl_judgement', $update_judgement);

		$judge = $this->input->post('signed_by');
		$judID = $this->input->post('judgementID');
		for ($i = 0; $i < count($judge); $i++) {
			$inst_data['judgement_id'] = $judID;
			$inst_data['judge_id'] = $judge[$i];
			$inst_data['created_date'] = date("Y-m-d");
			$this->db->insert('sc_tbl_judgement_signby', $inst_data);
		}

		$act = $this->input->post('act_name');
		$article = $this->input->post('article');
		$section = $this->input->post('section');
		$subsection = $this->input->post('subsection');
		for ($j = 0; $j < count($act); $j++) {
			$insert_acts['Judgement_id'] = $judID;
			$insert_acts['Act_id'] = $act[$j];
			$insert_acts['ArticleChapter'] = $article[$j];
			$insert_acts['Section'] = $section[$j];
			$insert_acts['Subsection'] = $subsection[$j];
			$this->db->insert('sc_tbl_judgement_act', $insert_acts);
		}
		if ($this->input->post('litagent') != '') {
			$litagent = $this->input->post('litagent');
			$sentence_type = $this->input->post('sentence_type');
			$year = $this->input->post('year');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$start_date = $this->input->post('start_date');
			$release_date = $this->input->post('release_date');
			$amount = $this->input->post('amount');
			$receipt_no = $this->input->post('receipt_no');


			for ($k = 0; $k < count($sentence_type); $k++) {
				$insert_process3['Judgement_id'] = $judID;
				$insert_process3['court_id'] = $this->session->userdata('court_id');
				$insert_process3['case_id'] = $this->input->post('case_id');
				$insert_process3['Litigant'] = $litagent[$k];
				$insert_process3['Sentence_type'] = $sentence_type[$k];


				if ($sentence_type[$k] == 7 || $sentence_type[$k] == 6 || $sentence_type[$k] == 10) {
					$insert_process3['Amount'] = $amount[$k];
					$insert_process3['Reciept'] = $receipt_no[$k];
				} elseif ($sentence_type[$k] == 8) {
				} elseif ($sentence_type[$k] == 9) {
					$insert_process3['Year'] = $year[$k];
					$insert_process3['Month'] = $month[$k];
					$insert_process3['Day'] = $day[$k];
					$insert_process3['Start_Date'] = $start_date[$k];
					$insert_process3['End_Date'] = $release_date[$k];
				}

				$this->db->insert('tbl_sc_judgement_sentence', $insert_process3);
			}
		}

		if ($role == 5) {
			redirect('registration');
		} elseif ($role == 2) {
			redirect('registration/judge_dashboard');
		} else {
			redirect('registration/user_dashboard');
		}
	}
	function insert_registration()
	{
		//$data['court_type'] = $this->public->get_court_type();
		$data['level3'] = $this->public->get_casetype_level3();
		$data['litigants'] = $this->public->get_litigant();
		$data['judges'] = $this->public->get_hearing_judge();
		$data['benches'] = $this->public->get_benches();
		$data['clerks'] = $this->public->get_clerk();
		$data['users'] = $this->public->get_all_users();
		$data['registration'] = $this->public->get_all_registration();
		$data['temp_litiID'] = $this->public->get_temp_litigantID();

		$this->load->view('header');
		$this->load->view('registration', $data);
		$this->load->view('footer');
	}

        function e_feedback()
	{
		$court_id = $this->session->userdata('court_id');
		$data['feedback'] = $this->elat->get_feedback($court_id);
		$this->load->view('header');
		$this->load->view('e_feedback', $data);
		$this->load->view('footer');
	}

       function view_elat_feedback($caseid)
	{
		
		$data['feedback'] = $this->elat->get_feedback_details($caseid);
		$this->load->view('header');
		$this->load->view('e_feedback_view', $data);
		$this->load->view('footer');
	}

      function send_judgement_copy($caseid) 
	{
		        $latigants = $this->public->getAllCaseLitigant($caseid);
			    foreach ($latigants as $lats) {				
				$latemail = $this->public->get_UserLatigantEmail($lats->litigant);
				$latname = $this->public->get_UserLatigantName($lats->litigant);
				$latno = $this->public->get_UserLatigantNumber($lats->litigant);
				$message = 'Dear ' . $latname . ',<br />Thank you for your Feed Back. PFA, the judgment Copy  <br /><br />Please help us to serve you better<br />Judiciary';
				$this->load->library("email");
				$this->email->set_newline("\r\n");
				$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
				$this->email->to($latemail);
				$this->email->subject('judgment Copy');
				$this->email->message($message);

				$filename = $this->public->get_filename($caseid);
				$path = "images/courtorder/";
				$file = $path . "/$filename";
				$this->email->attach($file);
				$this->email->send();

				$tom = $latno;
				$mmsg = urlencode("judgment Copy is sent to your email.");
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
			}

			$this->db->where('case_id', $caseid);
		    $update_data['judgement'] = '1';
                    $update_data['send_date'] = date('Y-m-d');
		    $this->db->update('elat_tbl_feedback', $update_data);

		    $court_id = $this->session->userdata('court_id');
		    $data['feedback'] = $this->elat->get_feedback($court_id);
		    $this->load->view('header');
		    $this->load->view('e_feedback', $data);
		    $this->load->view('footer');
	}


	function accept_elat_feedback()
	{
		$caseid = $this->input->post('case_id');

		$this->db->where('case_id', $caseid);
		$update_data['status'] = '1';
		$this->db->update('elat_tbl_feedback', $update_data);

		$court_id = $this->session->userdata('court_id');
		$data['feedback'] = $this->elat->get_feedback($court_id);
		$this->load->view('header');
		$this->load->view('e_feedback', $data);
		$this->load->view('footer');
	}


	function e_registration()
	{
		$court_id = $this->session->userdata('court_id');
		$data['cases'] = $this->elat->get_cases($court_id);
		$this->load->view('header');
		$this->load->view('e_registration', $data);
		$this->load->view('footer');
	}

	function e_appeal()
	{
		$court_id = $this->session->userdata('court_id');
		$data['cases'] = $this->elat->get_appealcases($court_id);
		$this->load->view('header');
		$this->load->view('e_appealregistration', $data);
		$this->load->view('footer');
	}

	function view_elat_case($caseid)
	{
		$uid = $this->elat->get_case_cmsuserid($caseid);
		$cid = $this->elat->get_case_cmscid($uid);
		$ut = $this->public->get_user_type($uid);
		$data['individual_detail'] = $this->elat->get_individual_details($cid);
		$data['lawyer_detail'] = $this->elat->get_lawyer_details($cid);
		$data['org_detail'] = $this->elat->get_org_details($cid);
        $data['org_name'] = $this->elat->get_org_name($cid);
		$data['nonbht'] = $this->elat->get_nonbht_details($cid);
		$data['applicantname'] = $this->public->get_UserName($uid);
        $data['applicantemail'] = $this->elat->get_email($uid);
		$data['defendantname'] = $this->public->get_DefendantName($caseid);
        $data['defendantEmail'] = $this->public->get_DefendantEmail($caseid);
		$data['applicantno'] = $this->public->get_UserContactNumber($uid);
		$data['DefendantID'] = $this->public->get_DefendantID($caseid);
		$data['clientname'] = $this->public->get_ClientName($caseid);
		$data['clientID'] = $this->public->get_ClientID($caseid);
		$data['ut'] = $ut;
		$data['cidno'] = $cid;
		$data['caseid'] = $caseid;
		$data['uid'] = $uid;
		$data['cases'] = $this->elat->get_cases_details($caseid);
		$data['revdocs'] = $this->elat->get_cases_revdocs($caseid);
		$data['barfile'] = $this->elat->get_bar_lic_copy($caseid);
        $data['casetype'] = $this->elat->get_case_type($caseid);
        $data['remandstatus'] = $this->elat->get_remand_status($caseid);
		$data['miscstatus'] = $this->elat->get_mischear_status($caseid);
        $data['judges'] = $this->elat->get_judges($this->session->userdata('court_id'));
		$this->load->view('header');
		$this->load->view('e_registration_view', $data);
		$this->load->view('footer');
	}

	function view_elat_case_appeal($cid, $uid, $miscid)
	{
		$data['uid'] = $uid;
		$data['miscid'] = $miscid;
		//$data['cidno'] = $this->public->get_appeal_cidno($uid);
		$data['email'] = $this->public->get_appeal_email($uid);
		$data['cases'] = $this->public->get_cases_appealdetails($cid);
		$data['filename'] = $this->public->get_case_applicationcopy($cid);
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $miscid);
		$data['court_id'] = $case->court_id;
		$data['case_id'] = $case->id;
		$court_typeid = $this->public->get_elat_court_type($case->court_id);
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($miscid);
		$data['court_type'] = $this->public->get_appeal_court_type_elat($court_typeid);
		$data['judges'] = $this->public->get_hearing_judge_elat($case->court_id);
		$this->load->view('header');
		$this->load->view('e_registration_view_appeal', $data);
		$this->load->view('footer');
	}

	function register_elat_case($cid)
	{   
		$euid = $this->elat->get_case_createdby($cid);
		$hearingdate = $this->elat->get_case_hearingdate($cid);
		$hearingtime = $this->elat->get_case_hearingtime($cid);
		$email = $this->elat->get_email($euid);
		$data['appno'] =  $this->elat->get_case_application_number($cid);
		$data['pstatus'] =  $this->elat->get_cases_payment_status($cid);
		$data['appdate'] =  $this->elat->get_case_applicationdate($cid);
		$data['emailid'] = $email;
		$data['ecaseid'] = $cid;
		$data['hearingdate'] = $hearingdate;
		$data['hearingtime'] = $hearingtime;
		$data['casetype'] = $this->elat->get_casetitle($cid);
		$data['casedate'] = $this->elat->get_case_date($cid);
		$data['level3'] = $this->public->get_casetype_level3();
		$data['litigants'] = $this->public->get_litigant();
		$data['judges'] = $this->public->get_hearing_judge();
		$data['benches'] = $this->public->get_benches();
		$data['clerks'] = $this->public->get_clerk();
		$data['users'] = $this->public->get_all_users();
		$data['registration'] = $this->public->get_all_registration();
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$data['temp_litiID_elat'] = $this->public->get_temp_litigantID_elat($cid);

		$this->load->view('header');
		$this->load->view('e_registration_form', $data);
		$this->load->view('footer');
	}

        function e_remand_submit()
	{
		$roomid = md5(date('d-m-Y H:i:s')) . substr(md5(rand(1000000, 2000000)), 0, 10);
		$join_url = 'https://elitigation.judiciary.gov.bt/'.$roomid.''; 
				$insert_data['court_id'] = $this->input->post('court_id');
				$insert_data['case_id'] = $this->input->post('caseid');
				$insert_data['meeting_type'] = "1";
				$insert_data['meeting_date'] = $this->input->post('remand_date');
				$insert_data['start_time'] = $this->input->post('start_time');
				$insert_data['end_time'] = $this->input->post('end_time');
				$insert_data['status'] = '1';
				$insert_data['room_id'] = $roomid;
				$insert_data['url'] = $join_url;
				$insert_data['created_by'] = $this->session->userdata('user_id');
				$insert_data['created_date'] = date('y-m-d');
				$this->db->insert('jitsi', $insert_data);
                
				$date = $this->input->post('remand_date');
				$stime = $this->input->post('start_time');
				$etime = $this->input->post('end_time');
				$emails = $this->input->post('emails');
		        for ($k = 0; $k < count($emails); $k++) {
			    if (isset($emails[$k])) {
				$to = $emails[$k];
				$this->load->config('email');
				$this->load->library('email');
				$from = $this->config->item('smtp_user');
				$subject = "Judiciary Notice";
				$message = 'Dear User,<br />The Remand hearing for case No. is scheduled on ' . $date . ' from ' . $stime . ' to '.$etime.'.<br />Please click the link to join the court hearing virtually or may come in person.<br />' . $join_url . '<br />Please help us to serve you better.<br /><br />Judiciary';
				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);
				if ($this->email->send()) {
				} else {
					?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
				}	
			}
		}
		$caseid = $this->input->post('caseid');
		$update_data['remand_status'] = '1';
        $this->db->where('id',$caseid);
        $this->db->update('elat_tbl_case_submission',$update_data);
		$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Participants');
		redirect('registration/e_registration');
	}
	
	function e_mischear_submit()
	{
		$roomid = md5(date('d-m-Y H:i:s')) . substr(md5(rand(1000000, 2000000)), 0, 10);
		$join_url = 'https://elitigation.judiciary.gov.bt/'.$roomid.''; 
				$insert_data['court_id'] = $this->input->post('court_id');
				$insert_data['case_id'] = $this->input->post('caseid');
				$insert_data['meeting_type'] = "1";
				$insert_data['meeting_date'] = $this->input->post('remand_date');
				$insert_data['start_time'] = $this->input->post('start_time');
				$insert_data['end_time'] = $this->input->post('end_time');
				$insert_data['status'] = '1';
				$insert_data['room_id'] = $roomid;
				$insert_data['url'] = $join_url;
				$insert_data['created_by'] = $this->session->userdata('user_id');
				$insert_data['created_date'] = date('y-m-d');
				$this->db->insert('jitsi', $insert_data);
                
				$date = $this->input->post('remand_date');
				$stime = $this->input->post('start_time');
				$etime = $this->input->post('end_time');
				$emails = $this->input->post('emails');
		        for ($k = 0; $k < count($emails); $k++) {
			    if (isset($emails[$k])) {
				$to = $emails[$k];
				$this->load->config('email');
				$this->load->library('email');
				$from = $this->config->item('smtp_user');
				$subject = "Judiciary Notice";
				$message = 'Dear User,<br />The Remand hearing for case No. is scheduled on ' . $date . ' from ' . $stime . ' to '.$etime.'.<br />Please click the link to join the court hearing virtually or may come in person.<br />' . $join_url . '<br />Please help us to serve you better.<br /><br />Judiciary';
				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);
				if ($this->email->send()) {
				} else {
					?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
				}	
			}
		}
		$caseid = $this->input->post('caseid');
		$update_data['mischearing_status'] = '1';
        $this->db->where('id',$caseid);
        $this->db->update('elat_tbl_case_submission',$update_data);
		$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Participants');
		redirect('registration/e_registration');
	}


	function e_registration_submit()
	{
		$appno = abs(rand(100000000000000, 900000000000000));
		$tz_object = new DateTimeZone('Asia/Dhaka');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		$timenow = $datetime->format('H:i:s');

		$caseid = $this->input->post('caseid');
		$hearingoption = $this->input->post('hearingoption');
		$acceptreject = $this->input->post('casestatus');
		$rejectreason = $this->input->post('rejectreason');
		$remarks = $this->input->post('remarks');
		$uname = $this->input->post('uname');
		$unumber = $this->input->post('unumber');

		$this->db->where('id', $caseid);
		$update_data['application_no'] = $appno;
		$update_data['hearing_option'] = $hearingoption;
		$update_data['misc_hearing_date'] = date("Y-m-d");
		$update_data['misc_hearing_time'] = $timenow;
		$update_data['case_status'] = $acceptreject;
		$update_data['reject_reason'] = $rejectreason;
		$update_data['case_status_by'] = $this->session->userdata('user_id');
		$update_data['case_status_remarks'] = $remarks;
		$this->db->update('elat_tbl_case_submission', $update_data);

		$court_id = $this->session->userdata('court_id');
		$data['cases'] = $this->elat->get_cases($court_id);
		$data['appno'] = $appno;

		if ($rejectreason == '1') {
			$rr = "No concrete case or controversy";
		}
		if ($rejectreason == '2') {
			$rr = "No legal standing";
		}
		if ($rejectreason == '3') {
			$rr = "Jurisdiction";
		}

		if ($acceptreject == 'A') {

			$message = 'Dear ' . $uname . ',<br /><br />Your case has been <b>Approved</b> for e-litigation.
			            Application No: ' . $appno . '<br />kindly pay the court fee using this link https://cms.judiciary.gov.bt/index.php/g2cPayment/index/1
					   
					   <br /><br />Please help us to serve you better<br />Judiciary';

		$to = $this->input->post('email');
		$this->load->config('email');
		$this->load->library('email');
		$from = $this->config->item('smtp_user');
		$subject = "Judiciary Notice";
		$this->email->set_newline("\r\n");
		//$this->email->from($from);
		$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		} else {
		$to = $this->input->post('email');
		$subject = "Judiciary Notice";
		$message = 'Dear ' . $uname . ',<br /><br />We are Sorry to inform you that, Your case has been <b>Rejected</b> for e-litigation.
			              <br /><br /> Reason: ' . $rr . '
                                      <br /> Remarks: ' . $remarks . '
                                      <br /><br />If the Reason is Jurisdiction, you are eligilbe for Resubmission                                      
                                      <br />Please help us to serve you better. PFA, the Dismissal order<br />Judiciary';

		$folder = "images/dismissal_order/";
		move_uploaded_file($_FILES["dismissal_order"]["tmp_name"], "$folder" . $_FILES["dismissal_order"]["name"]);
		$this->load->library("email");
		$this->email->set_newline("\r\n");
		$this->email->from('administrator@judiciary.gov.bt', 'administrator@judiciary.gov.bt');
		$this->email->to($to);
		$this->email->subject('Judiciary Notice');
		$this->email->message($message);

		$filename = $_FILES["dismissal_order"]["name"];
		$path = "images/dismissal_order/";
		$file = $path . "/$filename";
		$this->email->attach($file);
		$this->email->send();
		}

		if ($acceptreject == 'A') {
			$cs = "Approved";
			$mmsg = urlencode("Your case is $cs. And Application No is '.$appno.' Details has been sent to your email.");
		}
		if ($acceptreject == 'R') {
			$cs = "Rejected";
			$mmsg = urlencode("Your case is $cs. Details has been sent to your email.");
		}
		$tom = trim($unumber);

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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

		if ($this->email->send()) {
		} else {
			?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
		}
		$this->session->set_flashdata('success', 'A Notice Mail has been sent to ' . $to . '');
		$this->load->view('header');
		$this->load->view('e_registration', $data);
		$this->load->view('footer');
	}

	function re_insrt_rg()
	{
		//$data['court_type'] = $this->public->get_court_type();
		$data['level3'] = $this->public->get_casetype_level3();
		$data['litigants'] = $this->public->get_litigant();
		$data['judges'] = $this->public->get_hearing_judge();
		$data['benches'] = $this->public->get_benches();
		$data['clerks'] = $this->public->get_clerk();
		$data['users'] = $this->public->get_all_users();
		$data['registration'] = $this->public->get_all_registration();
		$data['temp_litiID'] = $this->public->get_temp_litigantID();

		$this->load->view('header');
		$this->load->view('registration', $data);
		$this->load->view('footer');
	}
	function decided_case()
	{
		$data['appeal_reg'] = $this->public->get_appeal_registration();
		$this->load->view('header');
		$this->load->view('decided_case', $data);
		$this->load->view('footer');
	}
	function approved_case()
	{
		$data['registration'] = $this->public->get_approved_case();
		$this->load->view('header');
		$this->load->view('approved_case', $data);
		$this->load->view('footer');
	}
	function litigantCase()
	{

		$this->load->view('header');
		$this->load->view('litigantCase');
		$this->load->view('footer');
	}
	function case_activity($id)
	{
		$ecaseid = $this->elat->get_ecaseid($id);
		$data['resdef'] = $this->elat->get_resdef($ecaseid);
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['case_no'] = $case->misc_case_no;
		$data['case_id'] = $case->id;
		$data['app_date'] = $case->application_date;
		$data['reg_no'] = $case->reg_no;
		$data['reg_date'] = $case->reg_date;
		$data['hearing_date'] = $case->misc_hearing_date;
		$data['case_type'] = $case->casetypelevel3_id;
		$data['case_title'] = $case->case_title;
		$data['judge_id'] = $case->judge;
		$data['judicials'] = $this->public->get_Activity_cases($id);
		$data['case_type3'] = $this->public->get_casetype_level3();
		$data['case_type1'] = $this->public->get_casetype_level1();
		$data['case_type2'] = $this->public->get_casetype_level2();
		$data['case_types'] = $this->public->get_case_casetype($id);
		$data['judges'] = $this->public->getCourtJudge();
		$data['aJudges'] = $this->public->getAlCaseJudge($case->id);
		$data['lits'] = $this->public->getAllCaseLitigant($case->id);
		$data['uploads'] = $this->public->getAllUploads($id);
		$data['petitionfilename'] = $this->public->get_petition_filename($ecaseid);
		$this->load->view('header');
		$this->load->view('case_activity', $data);
		$this->load->view('footer');
	}

	function case_activity_elat($id)
	{
		
		$ecaseid = $this->elat->get_ecaseid($id);
		$data['resdef'] = $this->elat->get_resdef($ecaseid);
		$data['resdefpayment'] = $this->elat->get_resdef_payment($id);
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['case_no'] = $case->misc_case_no;
		$data['case_id'] = $case->id;
		$data['app_date'] = $case->application_date;
		$data['reg_no'] = $case->reg_no;
		$data['reg_date'] = $case->reg_date;
		$data['hearing_date'] = $case->misc_hearing_date;
		$data['case_type'] = $case->casetypelevel3_id;
		$data['case_title'] = $case->case_title;
		$data['judge_id'] = $case->judge;
		$data['judicials'] = $this->public->get_Activity_cases($id);
		$data['case_type3'] = $this->public->get_casetype_level3();
		$data['case_type1'] = $this->public->get_casetype_level1();
		$data['case_type2'] = $this->public->get_casetype_level2();
		$data['case_types'] = $this->public->get_case_casetype($id);
		$data['judges'] = $this->public->getCourtJudge();
		$data['aJudges'] = $this->public->getAlCaseJudge($case->id);
		$data['lits'] = $this->public->getAllCaseLitigant($case->id);
		$data['uploads'] = $this->public->getAllUploads($id);
		$data['uploads_1'] = $this->public->getAllUploads_1($id);
		$data['petitionfilename'] = $this->public->get_petition_filename($ecaseid);
		$this->load->view('header');
		$this->load->view('case_activity_elat', $data);
		$this->load->view('footer');
	}

	function call_redef($caseid, $email, $cid, $name, $mobile, $type)
	{
		$dname = urldecode($name);
		$mobileno = trim($mobile);
		$data['caseid'] = $caseid;
		$data['email'] = $email;
		$data['cid'] = $cid;
		$data['name'] = $dname;
		$data['mobile'] = $mobileno;
		$data['type'] = $type;
		$latigantid = $this->public->get_latigant_id_incase($cid, $mobile);
		if ($type == '1') {
			$latype = '16';
		}
		if ($type == '2') {
			$latype = '18';
		}
		if ($type == '3') {
			$latype = '25';
		}
		
		

		/*$idata = [
                            'caseID' => $caseid, 
			    'litigant' => $latigantid,
			    'litigant_type' => $latype        
			   ];
		   $this->db->insert('sc_tbl_registration_litigant',$idata);*/


		$this->load->view('header');
		$this->load->view('case_activity_summon', $data);
		$this->load->view('footer');
	}

	function sendmail_redef()
	{
		$name = $this->input->post('name');
		$caseid = $this->input->post('caseid');
		$email = $this->input->post('email');
		$cid = $this->input->post('cid');
		$mobile = $this->input->post('mobile');
		$type = $this->input->post('type');
		$elatid = $this->public->get_elat_caseid($caseid);

		$insert_frm['misc_caseid'] = $caseid;
		$insert_frm['elatid'] = $elatid;
		$insert_frm['issue_date'] = $this->input->post('issue_date');
		$insert_frm['document_type'] = $this->input->post('document_type');
		$insert_frm['issue_to'] = $this->input->post('name');
		$insert_frm['corrospondence_type'] = $this->input->post('corrospondence_type');
		$insert_frm['summon_date'] = $this->input->post('summon_date');
		$insert_frm['summon_time'] = $this->input->post('summon_time');
		$insert_frm['document_copy'] = $_FILES['document_copy']['name'];
		$insert_frm['document_type'] = "Summon Order";
		$insert_frm['created_by'] = $this->session->userdata('user_id');
		$insert_frm['created_on'] = date("Y-m-d");
		$this->db->insert('sc_tbl_courtorders', $insert_frm);
		
		$appno = abs(rand(100000000000000, 900000000000000));
		$data = [
			'application_no' => $appno,
			'caseid' => $caseid,
			'payment' => '0'
			
		  ];
		  $this->db->insert('elat_tbl_defendant_payment', $data);

		$elatid = $this->public->get_elat_caseid($caseid);
		$this->db->set('summon', '1')
			->where('caseid', $elatid)
			->where('cid', $cid)
			->update('elat_tbl_respondent');
                
               $userid = $this->public->checkDuplicateUser_summon($cid);
			if ($userid != '1') 
			{
		          $userdata = [
			      'user_type' => '14',
			      'judge_name' => $this->input->post('name'),
			      'CID' => $cid,
			      'user_name' => $this->input->post('email'),
			      'email' => $this->input->post('email'),
			      'password' => md5('pass@123'),
			      'contact' => $mobile,
			      'created_on' => date('Y-m-d H:i:s')
		         ];
		$this->db->insert('sc_tbl_user_profile', $userdata);
		$reid = $this->db->insert_id();
	}else
	   { 
		 $this->db->set('user_type', '14')
		->where('CID', $cid)
                ->where('user_type >=', '11')
		->update('sc_tbl_user_profile');
		$reid = $this->public->get_user_id_bycid($cid);
	   }

		$userdata = [
			'userid' => $reid,
			'caseid' => $caseid
		];
		$this->db->insert('tbl_respondent_link', $userdata);
		$courtid = $this->session->userdata('court_id');
		$courtname = $this->public->get_CourtName($courtid);
		$subject = "Summon Order from Royal Court of Justice";
		$sdate = $this->input->post('summon_date');
		$ssdate = date("M j, Y", strtotime($sdate));
		$stime = $this->input->post('summon_time');
		$sstime = date("g:i a", strtotime($stime));
		$message = 'Dear ' . $name . ',
			  <br />You have been summoned to ' . $courtname . ' Court on ' . $ssdate . ' at ' . $sstime . '. Should you want to sign up for e-litigation to attend remotely, please click the link and follow the instructions.
              <br /> Username: ' . $email . '
              <br /> Password: pass@123
              <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/
			  <br /><br />
			  Your Application No. is  ' . $appno . '.<br />Kindly pay the court fee using this link https://cms.judiciary.gov.bt/index.php/g2cPayment/index/1
			  <br />Please help us to serve you better.
			  <br />Judiciary.
			  ';

		$folder = "images/courtorder/";
		move_uploaded_file($_FILES["document_copy"]["tmp_name"], "$folder" . $_FILES["document_copy"]["name"]);
		$this->load->library("email");
		$this->email->set_newline("\r\n");
		$this->email->from('administrator@judiciary.gov.bt', 'administrator@judiciary.gov.bt');
		$this->email->to($email);
		$this->email->subject('Judiciary Notice');
		$this->email->message($message);

		$filename = $_FILES["document_copy"]["name"];
		$path = "images/courtorder/";
		$file = $path . "/$filename";
		$this->email->attach($file);
		$this->email->send();


		$tom = trim($this->input->post('mobile'));
		$mmsg = urlencode("You got a summon order, check your mail for detail");
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
		$this->session->set_flashdata('success', 'A Summon Mail has been sent to ' . $email . '');
		redirect('registration/case_activity_elat/' . $caseid);
	}

	function viewUserSubmit($filename)
	{
		//$data['filename']=$this->public->getAllUploadsName($id);
		$data['filename'] = $filename;
		$this->load->view('header');
		$this->load->view('case_activity_view_file', $data);
		$this->load->view('footer');
	}

	function viewUserSubmitCasefiles($filename)
	{
		//$data['filename']=$this->public->getAllUploadsName($id);
		$data['filename'] = $filename;
		$this->load->view('header');
		$this->load->view('case_activity_view_file_case', $data);
		$this->load->view('footer');
	}

	function viewUserAppealCopy($filename)
	{
		//$data['filename']=$this->public->getAllUploadsName($id);
		$data['filename'] = $filename;
		$this->load->view('header');
		$this->load->view('case_view_appeal_copy', $data);
		$this->load->view('footer');
	}

	function viewUserSubmit_p($filename)
	{
		$data['filename'] = urldecode($filename);
		$this->load->view('header');
		$this->load->view('case_activity_view_file_p', $data);
		$this->load->view('footer');
	}

	function ViewCaseDocs($filename, $type)
	{
		$data['filename'] = $filename;
		$data['type'] = $type;
		$this->load->view('header');
		$this->load->view('case_view_file', $data);
		$this->load->view('footer');
	}

	function ViewBARDocs($filename)
	{
		$data['filename'] = $filename;
		$this->load->view('header');
		$this->load->view('case_view_bar', $data);
		$this->load->view('footer');
	}

	function viewElatUploads($id, $filename)
	{
		$data['filename'] = $filename;
		$this->load->view('header');
		$this->load->view('case_activity_view_file', $data);
		$this->load->view('footer');
	}

	function insert_case_activity($id)
	{
		$data['registration'] = $this->public->get_assigned_case();
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
		$data['case_id'] = $id;
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$this->load->view('header');
		$this->load->view('insert_case_activity', $data);
		$this->load->view('footer');
	}

	function insert_case_activity_elat($id)
	{
		$data['registration'] = $this->public->get_assigned_case();
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
		$data['case_id'] = $id;
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$this->load->view('header');
		$this->load->view('insert_case_activity_elat', $data);
		$this->load->view('footer');
	}

	function add_caseActivity2()
	{
		$liti_added = false;
		$form_added = false;
		$case_id = $this->input->post('case');
		if ($this->input->post()) {
			$insert_data['case_id'] = $this->input->post('case');
			$insert_data['judicial_process_id'] = $this->input->post('jProcess');
			$insert_data['activity_date'] = $this->input->post('act_date');
			$insert_data['form_used_id'] = $this->input->post('forms');
			//$insert_data['amount'] = $this->input->post('amount');
			//$insert_data['receipt_no'] = $this->input->post('receipt_no');
			//$insert_data['surety'] = $this->input->post('surety');
			$insert_data['remarks'] = $this->input->post('act_desc');
			$this->db->insert('sc_tbl_case_activities', $insert_data);
			$insert_id = $this->db->insert_id();

			$this->db->where('id', $this->input->post('case'));
			$update_data['status'] = 3;
			$update_data['updatedby'] = $this->session->userdata('user_id');
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			$sch_rows = $this->input->post('litigant');
			if (isset($sch_rows['steps']) && !$liti_added) {
				for ($j = 0; $j < count($sch_rows['steps'][1]); $j++) {
					$insert_dep['case_id'] = $this->input->post('case');
					$insert_dep['litigant_id'] = $sch_rows['steps'][1][$j];
					$insert_dep['litigant_type_id'] = $sch_rows['steps'][2][$j];
					$insert_dep['judicial_process_id'] = $insert_id;
					$this->db->insert('sc_tbl_case_litigant', $insert_dep);
				}
				$liti_added = true;
			}

			$form_rows = $this->input->post('rowws');
			if (isset($form_rows['step']) && !$form_added) {
				for ($k = 0; $k < count($form_rows['step'][1]); $k++) {
					$insert_frm['case_id'] = $this->input->post('case');
					$insert_frm['judicial_process_id'] = $insert_id;
					$insert_frm['form_used'] = $form_rows['step'][1][$k];
					//$insert_frm['frmdate'] = $form_rows['step'][1][$k];
					$this->db->insert('sc_tbl_case_form', $insert_frm);
				}
				$form_added = true;
			}

			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		redirect('registration/case_activity/' . $case_id);
	}


	function add_caseActivity20()
	{
		$liti_added = false;
		$form_added = false;
		$case_id = $this->input->post('case');
		if ($this->input->post()) {
			$insert_data['case_id'] = $this->input->post('case');
			$insert_data['judicial_process_id'] = $this->input->post('jProcess');
			$insert_data['activity_date'] = $this->input->post('act_date');
			$this->db->insert('sc_tbl_case_activities', $insert_data);
			$insert_id = $this->db->insert_id();

			$this->db->where('id', $this->input->post('case'));
			$update_data['status'] = 3;
			$update_data['updatedby'] = $this->session->userdata('user_id');
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			$sch_rows = $this->input->post('litigant');
			if (isset($sch_rows['steps']) && !$liti_added) {
				for ($j = 0; $j < count($sch_rows['steps'][1]); $j++) {
					$insert_dep['case_id'] = $this->input->post('case');
					$insert_dep['litigant_id'] = $sch_rows['steps'][1][$j];
					$insert_dep['litigant_type_id'] = $sch_rows['steps'][2][$j];
					$insert_dep['judicial_process_id'] = $insert_id;
					$this->db->insert('sc_tbl_case_litigant', $insert_dep);
				}
				$liti_added = true;
			}

			$form_rows = $this->input->post('rowws');
			if (isset($form_rows['step']) && !$form_added) {
				for ($k = 0; $k < count($form_rows['step'][1]); $k++) {
					$insert_frm['case_id'] = $this->input->post('case');
					$insert_frm['judicial_process_id'] = $insert_id;
					$insert_frm['form_used'] = $form_rows['step'][1][$k];
					$this->db->insert('sc_tbl_case_form', $insert_frm);
				}
				$form_added = true;
			}

			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		redirect('registration/view_rejected_case/' . $case_id);
	}

	function add_caseActivity()
	{
		//echo $frmdate = $this->input->post('frmdate');
		$case_id = $this->input->post('case');
		$insert_data['case_id'] = $this->input->post('case');
		$insert_data['judicial_process_id'] = $this->input->post('jProcess');
		$insert_data['activity_date'] = $this->input->post('act_date');
		$insert_data['activity_start_time'] = $this->input->post('act_time');
		$insert_data['amount'] = $this->input->post('amount');
		$insert_data['receipt_no'] = $this->input->post('receipt_no');
		$insert_data['surety'] = $this->input->post('surety');
		$insert_data['remarks'] = $this->input->post('act_desc');
		$this->db->insert('sc_tbl_case_activities', $insert_data);
		$insert_id = $this->db->insert_id();

		$this->db->where('id', $this->input->post('case'));
		$update_data['status'] = 3;
		$update_data['updatedby'] = $this->session->userdata('user_id');
		$this->db->update('sc_tbl_misc_case_info', $update_data);

		$form_rows = $this->input->post('form');
		$frmdate = $this->input->post('formdate');

		$form_issued = $this->input->post('form_issued');

		for ($k = 0; $k < count($form_rows); $k++) {
			$insert_frm['case_id'] = $this->input->post('case');
			$insert_frm['judicial_process_id'] = $insert_id;
			$insert_frm['form_used'] = $form_rows[$k];
			$insert_frm['Issued'] = $form_issued[$k];
			$insert_frm['frmdate'] = $frmdate;

			$this->db->insert('sc_tbl_case_form', $insert_frm);
		}

		$lit_rows = $this->input->post('lits');

		for ($j = 0; $j < count($lit_rows); $j++) {
			if (isset($lit_rows[$j])) {
				$insert_lit['case_id'] = $this->input->post('case');
				$insert_lit['litigant_id'] = $lit_rows[$j];
				$insert_lit['judicial_process_id'] = $insert_id;
				$this->db->insert('sc_tbl_case_litigant', $insert_lit);
			}
		}
		redirect('registration/case_activity/' . $case_id);
	}

	function add_caseActivity_elat()
	{
		//echo $frmdate = $this->input->post('frmdate');
		$case_id = $this->input->post('case');
		$insert_data['case_id'] = $this->input->post('case');
		$insert_data['judicial_process_id'] = $this->input->post('jProcess');
		$insert_data['activity_date'] = $this->input->post('act_date');
		$insert_data['activity_start_time'] = $this->input->post('start_act_time');
                 $insert_data['activity_end_time'] = $this->input->post('end_act_time');
		$insert_data['amount'] = $this->input->post('amount');
		$insert_data['receipt_no'] = $this->input->post('receipt_no');
		$insert_data['surety'] = $this->input->post('surety');
		$insert_data['remarks'] = $this->input->post('act_desc');
		$this->db->insert('sc_tbl_case_activities', $insert_data);
		$insert_id = $this->db->insert_id();

		$this->db->where('id', $this->input->post('case'));
		$update_data['status'] = 3;
		$update_data['updatedby'] = $this->session->userdata('user_id');
		$this->db->update('sc_tbl_misc_case_info', $update_data);

		$form_rows = $this->input->post('form');
		$frmdate = $this->input->post('formdate');
		$elatid = $this->elat->get_ecaseid($this->input->post('case'));

		$form_issued = $this->input->post('form_issued');

		for ($i = 0; $i < count($form_rows); $i++) {
			$insert_frm['case_id'] = $this->input->post('case');
			$insert_frm['judicial_process_id'] = $insert_id;
			$insert_frm['form_used'] = $form_rows[$i];
			$insert_frm['Issued'] = $form_issued[$i];
			$insert_frm['frmdate'] = $frmdate;
			$this->db->insert('sc_tbl_case_form', $insert_frm);
                        $form[] = $this->public->get_form_name($form_rows[$i]);
		}
                 $formused = implode(', ', $form);

		for ($l = 0; $l < count($form_rows); $l++) {
			$insert_frm1['case_id'] = $this->input->post('case');
			$insert_frm1['elat_id'] = $elatid;
			$insert_frm1['judicial_process_id'] = $insert_id;
			$insert_frm1['form_used'] = $form_rows[$l];
			$insert_frm1['Issued'] = $form_issued[$l];
			$insert_frm1['frmdate'] = $frmdate;
			$insert_frm1['frmdate'] = $frmdate;
			$insert_frm1['craeted_by'] = $this->session->userdata('user_id');
			$insert_frm1['created_on'] = date("Y-m-d");
			$this->db->insert('sc_tbl_case_form_elat', $insert_frm1);
		}

		$lit_rows = $this->input->post('lits');

		for ($j = 0; $j < count($lit_rows); $j++) {
			if (isset($lit_rows[$j])) {
				$insert_lit['case_id'] = $this->input->post('case');
				$insert_lit['litigant_id'] = $lit_rows[$j];
				$insert_lit['judicial_process_id'] = $insert_id;
				$this->db->insert('sc_tbl_case_litigant', $insert_lit);
			}
		}

		$elit_rows = $this->input->post('elits');
		for ($k = 0; $k < count($elit_rows); $k++) {
			if (isset($elit_rows[$k])) {
				$litid = $this->public->get_litigant_id($elit_rows[$k]);
				$insert_lit1['case_id'] = $this->input->post('case');
				$insert_lit1['elat_id'] = $elatid;
				$insert_lit1['lit_id'] = $litid;
				$insert_lit1['litigant_id'] = $lit_rows[$k];
				$insert_lit1['judicial_process_id'] = $insert_id;
				$this->db->insert('sc_tbl_case_litigant_elat', $insert_lit1);
			}
		}

		$latigants = $this->public->getAllCaseLitigant($this->input->post('case'));
		foreach ($latigants as $lats) {
			$latemail = $this->public->get_UserLatigantEmail($lats->litigant);
			$latname = $this->public->get_UserLatigantName($lats->litigant);
			$latno = $this->public->get_UserLatigantNumber($lats->litigant);
                        $date = $this->input->post('act_date');
			$jname = $this->public->get_judicial_name($this->input->post('jProcess'));

			$this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "Judiciary Notice";
            $message = 'Dear ' . $latname . ',<br />A judicial Activity ' . $jname . ' is scheduled on ' . $date . '.<br />Please upload the forms ' .$formused. '.<br />Form(s) can be downloaded from https://www.judiciary.gov.bt/index.php/Welcome/get_pages?id=59 <br />Help us to serve you better<br />Judiciary';
            $this->email->set_newline("\r\n");
            //$this->email->from($from);
            $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
            $this->email->to($latemail);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) { } else { ?>
				<script type="text/javascript">
				   alert("Could not Reach SMPT server, eMail not sent");
				</script>
				<?php }

			$tom = $latno;
			$mmsg = urlencode("You have been notified to upload judicial forms, please check your email.");
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
		}

		$this->session->set_flashdata('success', 'Case Activity Notification sent to the Parties');
		redirect('registration/case_activity_elat/' . $case_id);
	}

	function Update_caseActivity()
	{

		if ($this->input->post()) {
			$id = $this->input->post('activity_id');
			$this->db->where('id', $id);
			$update_data['case_id'] = $this->input->post('case');
			$update_data['judicial_process_id'] = $this->input->post('jProcess');
			$update_data['activity_date'] = $this->input->post('act_date');
			$update_data['remarks'] = $this->input->post('act_desc');
			$this->db->update('sc_tbl_case_activities', $update_data);
            
			$form_rows = $this->input->post('form');
			$frmdate = $this->input->post('formdate');

			$form_issued = $this->input->post('form_issued');

			for ($k = 0; $k < count($form_rows); $k++) {
				$insert_frm['case_id'] = $this->input->post('case');
				$insert_frm['judicial_process_id'] = $id;
				$insert_frm['form_used'] = $form_rows[$k];
				$insert_frm['Issued'] = $form_issued[$k];
				$insert_frm['frmdate'] = $frmdate;

				$this->db->insert('sc_tbl_case_form', $insert_frm);
			}
		}
		redirect('registration/case_activity/' . $this->input->post('case'));
	}

	function Update_caseActivity_elat()
	{

		if ($this->input->post()) {
			$id = $this->input->post('activity_id');
			$this->db->where('id', $id);
			$update_data['case_id'] = $this->input->post('case');
			$update_data['judicial_process_id'] = $this->input->post('jProcess');
			$update_data['activity_date'] = $this->input->post('act_date');
			$update_data['activity_start_time'] = $this->input->post('act_time');
			$update_data['remarks'] = $this->input->post('act_desc');
			$this->db->update('sc_tbl_case_activities', $update_data);

			$form_rows = $this->input->post('form');
			$frmdate = $this->input->post('formdate');

			$form_issued = $this->input->post('form_issued');

			for ($k = 0; $k < count($form_rows); $k++) {
				$insert_frm['case_id'] = $this->input->post('case');
				$insert_frm['judicial_process_id'] = $id;
				$insert_frm['form_used'] = $form_rows[$k];
				$insert_frm['Issued'] = $form_issued[$k];
				$insert_frm['frmdate'] = $frmdate;

				$this->db->insert('sc_tbl_case_form', $insert_frm);
			}
		}
		redirect('registration/case_activity_elat/' . $this->input->post('case'));
	}



	function Update_caseActivity1()
	{

		if ($this->input->post()) {
			$id = $this->input->post('activity_id');
			$this->db->where('id', $id);
			$update_data['case_id'] = $this->input->post('case');
			$update_data['judicial_process_id'] = $this->input->post('jProcess');
			$update_data['activity_date'] = $this->input->post('act_date');
			$update_data['remarks'] = $this->input->post('act_desc');
			$this->db->update('sc_tbl_case_activities', $update_data);

			$form_rows = $this->input->post('form');
			$frmdate = $this->input->post('formdate');

			$form_issued = $this->input->post('form_issued');

			for ($k = 0; $k < count($form_rows); $k++) {
				$insert_frm['case_id'] = $this->input->post('case');
				$insert_frm['judicial_process_id'] = $id;
				$insert_frm['form_used'] = $form_rows[$k];
				$insert_frm['Issued'] = $form_issued[$k];
				$insert_frm['frmdate'] = $frmdate;

				$this->db->insert('sc_tbl_case_form', $insert_frm);
			}
		}
		//redirect('registration/view_rejected_case/'.$id);
		redirect('registration/view_rejected_case/' . $this->input->post('case'));
	}


	function add_registration()
	{
		$litigant_added = false;
		$hjudge_added = false;
		$judge_added = false;
		$signby_added = false;

		if ($this->input->post()) {
			$app_date = date("Y-m-d", strtotime($this->input->post('app_date')));
			$misc_hearing_date = date("Y-m-d", strtotime($this->input->post('hearing_date')));
			$registration_date = date("Y-m-d", strtotime($this->input->post('reg_date')));

			if ($this->input->post('reg_status') == 1) {
                                $insert_data['application_no'] = abs(rand(100000000000000, 900000000000000));
				$insert_data['court_id'] = $this->input->post('court');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				$insert_data['elatcaseid'] = $this->input->post('elatcaseid');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $app_date;
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['case_brief'] = $this->input->post('case_brief');
				$insert_data['applicant_id'] = $this->input->post('applicant');
				$insert_data['misc_hearing_date'] = $misc_hearing_date;
				$insert_data['registration_status'] = $this->input->post('reg_status');
				$insert_data['reg_date'] = $registration_date;
				$insert_data['reg_no'] = $this->input->post('reg_number');
				$insert_data['bench'] = $this->input->post('bench');
				$insert_data['status'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();


				if ($this->input->post('bench') != '') {
					$this->db->select('*');
					$this->db->where('bench', $this->input->post('bench'));
					$this->db->where('user_type', '2');
					$this->db->where('court', $this->session->userdata('court_id'));
					$this->db->from('sc_tbl_user_profile');
					$query = $this->db->get();
					$judges = $query->result();
					foreach ($judges as $juds) {
						$insert_judge['case_id'] = $insert_id;
						$insert_judge['judge_id'] = $juds->id;
						$this->db->insert('tbl_case_judge_link', $insert_judge);
					}
				}
			} elseif ($this->input->post('reg_status') == 2) {
				$insert_data['court_id'] = $this->input->post('court');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $app_date;
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['case_brief'] = $this->input->post('case_brief');
				$insert_data['applicant_id'] = $this->input->post('applicant');
				$insert_data['misc_hearing_date'] = $misc_hearing_date;
				$insert_data['registration_status'] = $this->input->post('reg_status');
				$insert_data['reason'] = $this->input->post('notreg_reason');
				$insert_data['dismissal_no'] = $this->input->post('notreg_dis_no');
				$insert_data['dismissal_date'] = $this->input->post('notreg_dis_date');
				$insert_data['status'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();
			}
			/* -------------Add Litigant------------------*/
			$liti_rows = $this->input->post('litigant');
			if (isset($liti_rows['steps']) && !$litigant_added) {
				for ($i = 0; $i < count($liti_rows['steps'][1]); $i++) {
					$insert_process['caseID'] = $insert_id;
					$insert_process['litigant'] = $liti_rows['steps'][1][$i];
					$insert_process['litigant_type'] = $liti_rows['steps'][2][$i];
					$this->db->insert('sc_tbl_registration_litigant', $insert_process);
				}
				$litigant_added = true;
			}
			/* -------------End Add Litigant------------------*/

			/* -------------Add Hearing Judge------------------*/
			$hjudge_rows = $this->input->post('hjudge');
			if (isset($hjudge_rows['step']) && !$hjudge_added) {
				for ($j = 0; $j < count($hjudge_rows['step'][1]); $j++) {
					$insert_process1['caseID'] = $insert_id;
					$insert_process1['hjudge'] = $hjudge_rows['step'][1][$j];
					$this->db->insert('sc_tbl_registration_hjudge', $insert_process1);
				}
				$hjudge_added = true;
			}
			/* -------------End Hearing Judge------------------*/


			/* -------------Add Judge------------------*/
			$judge_rows = $this->input->post('judge');
			if (isset($judge_rows['st']) && !$judge_added) {
				for ($k = 0; $k < count($judge_rows['st'][1]); $k++) {
					$insert_process3['caseID'] = $insert_id;
					$insert_process3['judge'] = $judge_rows['st'][1][$k];
					$this->db->insert('sc_tbl_registration_judge', $insert_process3);
				}
				$judge_added = true;
			}
			/* -------------End Judge------------------*/

			/* -------------Add Signed By------------------*/
			$sign_rows = $this->input->post('sign');
			if (isset($sign_rows['ste']) && !$signby_added) {
				for ($m = 0; $m < count($sign_rows['ste'][1]); $m++) {
					$insert_process2['caseID'] = $insert_id;
					$insert_process2['signed_by'] = $sign_rows['ste'][1][$m];
					$this->db->insert('sc_tbl_registration_signby', $insert_process2);
				}
				$signby_added = true;
			}
			/* -------------End Signed By------------------*/


			/*--------Add Lawyer Info-----*/
			$this->db->select('*');
			$this->db->where('created_by', $this->session->userdata('user_id'));
			$this->db->from('sc_tbl_temp_lawyer_link');
			$qust = $this->db->get();
			$lawyers = $qust->result();

			if (empty($lawyers)) {
			} else {
				$litigants = $this->public->getCaseLitigant($insert_id);
				foreach ($lawyers as $lays) {
					foreach ($litigants as $lits) {
						if ($lays->Lit_id == $lits->litigant) {
							$insert_law['Lawyer_id'] = $lays->Lawyer_id;
							$insert_law['Case_id'] = $insert_id;
							$insert_law['Litigant_id'] = $lits->litigant;
							$insert_law['created_date'] = date('y-m-d');
							$insert_law['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_law);
						}
					}
				}
			}
			/**********END LAWYER****************/
			$this->db->delete('sc_tbl_temp_lawyer_link', array('created_by' => $this->session->userdata('user_id')));
			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		if ($this->session->userdata('user_type') == 7) {
			$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Litigants');
			redirect('registration/hybrid_dash');
		} else {
			$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Litigants');
			redirect('registration/registry_view');
		}
	}

	function add_elat_registration_1()
	{
		echo $registration_date = date("Y-m-d", strtotime($this->input->post('reg_date')));
	}

	function add_elat_registration()
	{
		$litigant_added = false;
		$hjudge_added = false;
		$judge_added = false;
		$signby_added = false;

		if ($this->input->post()) {
			$app_date = date("Y-m-d", strtotime($this->input->post('app_date')));
			$misc_hearing_date = date("Y-m-d", strtotime($this->input->post('hearing_date')));
			$registration_date = date("Y-m-d", strtotime($this->input->post('reg_date')));
			$misc_hearing_time = $this->input->post('hearing_time');

			if ($this->input->post('reg_status') == 1) {
				$insert_data['application_no'] = $this->input->post('appno');
				$insert_data['court_id'] = $this->input->post('court');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				$insert_data['elatcaseid'] = $this->input->post('elatcaseid');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $app_date;
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['case_brief'] = $this->input->post('case_brief');
				$insert_data['applicant_id'] = $this->input->post('applicant');
				$insert_data['misc_hearing_date'] = $misc_hearing_date;
				$insert_data['registration_status'] = $this->input->post('reg_status');
				$insert_data['reg_date'] = $registration_date;
				$insert_data['reg_no'] = $this->input->post('reg_number');
				$insert_data['bench'] = $this->input->post('bench');
				$insert_data['status'] = 1;
				$insert_data['case_source'] = 1;
				$insert_data['payment_status'] = $this->input->post('pstatus');
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();

				$ecaseid = $this->input->post('elatcaseid');
				$ereg_number = $this->input->post('reg_number');
				$case_title = $this->input->post('case_title');

				$data = array('reg_no' => $ereg_number, 'case_title' => $case_title, 'misc_case_id' => $insert_id, 'registered' => '1');
				$this->db->where('id', $ecaseid);
				$this->db->update('elat_tbl_case_submission', $data);

				$insert_data1['case_id'] = $insert_id;
				$insert_data1['judicial_process_id'] = '5';
				$insert_data1['activity_date'] = $misc_hearing_date;
				$insert_data1['activity_start_time'] = $misc_hearing_time;
				$insert_data1['remarks'] = "eLitigation Auto Hearing";
				$this->db->insert('sc_tbl_case_activities', $insert_data1);
				$iinsert_id = $this->db->insert_id();

				$insert_frm['case_id'] = $insert_id;
				$insert_frm['judicial_process_id'] = $iinsert_id;
				$insert_frm['form_used'] = '1';
				$insert_frm['Issued'] = "eLitigation Auto Hearing";
				$insert_frm['frmdate'] = $misc_hearing_date;
				$this->db->insert('sc_tbl_case_form', $insert_frm);

				$insert_frm1['case_id'] = $insert_id;
				$insert_frm1['elat_id'] = $ecaseid;
				$insert_frm1['judicial_process_id'] = $iinsert_id;
				$insert_frm1['form_used'] = '1';
				$insert_frm1['Issued'] = "eLitigation Auto Hearing";
				$insert_frm1['frmdate'] = $misc_hearing_date;
				$insert_frm1['craeted_by'] = $this->session->userdata('user_id');
				$insert_frm1['created_on'] = date("Y-m-d");
				$this->db->insert('sc_tbl_case_form_elat', $insert_frm1);

				if ($this->input->post('bench') != '') {
					$this->db->select('*');
					$this->db->where('bench', $this->input->post('bench'));
					$this->db->where('user_type', '2');
					$this->db->where('court', $this->session->userdata('court_id'));
					$this->db->from('sc_tbl_user_profile');
					$query = $this->db->get();
					$judges = $query->result();
					foreach ($judges as $juds) {
						$insert_judge['case_id'] = $insert_id;
						$insert_judge['judge_id'] = $juds->id;
						$this->db->insert('tbl_case_judge_link', $insert_judge);
					}
				}
			} elseif ($this->input->post('reg_status') == 2) {
				$insert_data['court_id'] = $this->input->post('court');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $app_date;
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['case_brief'] = $this->input->post('case_brief');
				$insert_data['applicant_id'] = $this->input->post('applicant');
				$insert_data['misc_hearing_date'] = $misc_hearing_date;
				$insert_data['registration_status'] = $this->input->post('reg_status');
				$insert_data['reason'] = $this->input->post('notreg_reason');
				$insert_data['dismissal_no'] = $this->input->post('notreg_dis_no');
				$insert_data['dismissal_date'] = $this->input->post('notreg_dis_date');
				$insert_data['status'] = 1;
				$insert_data['case_source'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();
			}
			/* -------------Add Litigant------------------*/
			/*$elatcaseid = $this->input->post('elatcaseid');
		$applicant_type = $this->public->get_elat_utype($elatcaseid);

		if($applicant_type == '12'){
		$uid = $this->public->get_elat_uid($elatcaseid);
		$ucid = $this->public->get_elat_cid($uid);
		$latigantid = $this->public->get_latigant_id($ucid);
                     $data = [
			'caseID' => $insert_id, 
			'litigant' => $latigantid,
			'litigant_type' => '14'        
			];
		$this->db->insert('sc_tbl_registration_litigant',$data);

		}

		if($applicant_type == '13'){
			
			$ucid = $this->public->get_elat_cid_client($elatcaseid);
			$latigantid = $this->public->get_latigant_id($ucid);
			 $data = [
				'caseID' => $insert_id, 
				'litigant' => $latigantid,
				'litigant_type' => '14'        
				];
			$this->db->insert('sc_tbl_registration_litigant',$data);

                         $uid = $this->public->get_elat_uid($elatcaseid);
                         $lcid = $this->public->get_elatlawyer_cid($uid); 
                         $lawyerid = $this->public->get_elatlawyer_id($lcid); 
                      
                         $insert_law['Lawyer_id']=$lawyerid;
                         $insert_law['Case_id']=$insert_id;
                         $insert_law['Litigant_id']=$latigantid;
                         $insert_law['created_date']=date('y-m-d');
                         $insert_law['created_by']= $this->session->userdata('user_id');
                         $this->db->insert('tbl_litigant_lawyer_link', $insert_law);



		}

		if($applicant_type == '15'){
			$uid = $this->public->get_elat_uid($elatcaseid);
			$ucid = $this->public->get_elat_cid($uid);
			$latigantid = $this->public->get_latigant_id($ucid);
			 $data = [
				'caseID' => $insert_id, 
				'litigant' => $latigantid,
				'litigant_type' => '15'        
				];
			$this->db->insert('sc_tbl_registration_litigant',$data);
		}*/


			$liti_rows = $this->input->post('litigant');
			if (isset($liti_rows['steps']) && !$litigant_added) {
				for ($i = 0; $i < count($liti_rows['steps'][1]); $i++) {
					$insert_process['caseID'] = $insert_id;
					$insert_process['litigant'] = $liti_rows['steps'][1][$i];
					$insert_process['litigant_type'] = $liti_rows['steps'][2][$i];
					$this->db->insert('sc_tbl_registration_litigant', $insert_process);
				}
				$litigant_added = true;
			}
			/* -------------End Add Litigant------------------*/

			/* -------------Add Hearing Judge------------------*/
			$hjudge_rows = $this->input->post('hjudge');
			if (isset($hjudge_rows['step']) && !$hjudge_added) {
				for ($j = 0; $j < count($hjudge_rows['step'][1]); $j++) {
					$insert_process1['caseID'] = $insert_id;
					$insert_process1['hjudge'] = $hjudge_rows['step'][1][$j];
					$this->db->insert('sc_tbl_registration_hjudge', $insert_process1);
				}
				$hjudge_added = true;
			}
			/* -------------End Hearing Judge------------------*/


			/* -------------Add Judge------------------*/
			$judge_rows = $this->input->post('judge');
			if (isset($judge_rows['st']) && !$judge_added) {
				for ($k = 0; $k < count($judge_rows['st'][1]); $k++) {
					$insert_process3['caseID'] = $insert_id;
					$insert_process3['judge'] = $judge_rows['st'][1][$k];
					$this->db->insert('sc_tbl_registration_judge', $insert_process3);
				}
				$judge_added = true;
			}
			/* -------------End Judge------------------*/

			/* -------------Add Signed By------------------*/
			$sign_rows = $this->input->post('sign');
			if (isset($sign_rows['ste']) && !$signby_added) {
				for ($m = 0; $m < count($sign_rows['ste'][1]); $m++) {
					$insert_process2['caseID'] = $insert_id;
					$insert_process2['signed_by'] = $sign_rows['ste'][1][$m];
					$this->db->insert('sc_tbl_registration_signby', $insert_process2);
				}
				$signby_added = true;
			}
			/* -------------End Signed By------------------*/


			/*--------Add Lawyer Info-----*/
			$this->db->select('*');
			$this->db->where('created_by', $this->session->userdata('user_id'));
			$this->db->from('sc_tbl_temp_lawyer_link');
			$qust = $this->db->get();
			$lawyers = $qust->result();

			if (empty($lawyers)) {
			} else {
				$litigants = $this->public->getCaseLitigant($insert_id);
				foreach ($lawyers as $lays) {
					foreach ($litigants as $lits) {
						if ($lays->Lit_id == $lits->litigant) {
							$insert_law['Lawyer_id'] = $lays->Lawyer_id;
							$insert_law['Case_id'] = $insert_id;
							$insert_law['Litigant_id'] = $lits->litigant;
							$insert_law['created_date'] = date('y-m-d');
							$insert_law['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_law);
						}
					}
				}
			}
			/**********END LAWYER****************/
			$this->db->delete('sc_tbl_temp_lawyer_link', array('created_by' => $this->session->userdata('user_id')));
			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		if ($this->session->userdata('user_type') == 7) {
			$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Litigants');
			redirect('registration/hybrid_dash');
		} else {
			redirect('registration/registry_view');
		}
	}
	
	function appealReg()
	{
		$litigant_added = false;
		$hjudge_added = false;
		$judge_added = false;
		$signby_added = false;
		$role = $this->session->userdata('user_type');
		$restat = $this->input->post('reg_status');
		if ($this->input->post()) {

			if ($this->input->post('reg_status') == 1) {
				$regd = $this->input->post('reg_date');
				$reg_date = date("Y-m-d", strtotime($regd));
				$role = $this->session->userdata('user_type');
				$insert_data['court_id'] = $this->session->userdata('court_id');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				$insert_data['misc_hearing_date'] = $this->input->post('hearing_date');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $this->input->post('appeal_date');
				$insert_data['case_title'] = $this->input->post('case_title');
				if ($role == 8) {
					$insert_data['registration_status'] = 0;
				} else {
					$insert_data['registration_status'] = $this->input->post('reg_status'); //checking registratiin status=1 for SC
				}
				$insert_data['reg_date'] = $reg_date;
				$insert_data['reg_no'] = $this->input->post('reg_number');
				$insert_data['bench'] = $this->input->post('bench');
				$insert_data['appeal_old_id'] = $this->input->post('old_case_id');
				$insert_data['status'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y-m-d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();

				$case_appeal_id = $this->input->post('case_id');
				$this->public->updateCloseAppeal($this->input->post('old_case_id'));


				if ($this->input->post('bench') != '') {
					$this->db->select('*');
					$this->db->where('bench', $this->input->post('bench'));
					$this->db->where('user_type', '2');
					$this->db->where('court', $this->session->userdata('court_id'));
					$this->db->from('sc_tbl_user_profile');
					$query = $this->db->get();
					$judges = $query->result();
					foreach ($judges as $juds) {
						$insert_judge['case_id'] = $insert_id;
						$insert_judge['judge_id'] = $juds->id;
						$this->db->insert('tbl_case_judge_link', $insert_judge);
					}
				}
			} elseif ($this->input->post('reg_status') == 2) {
				$insert_data['court_id'] = $this->session->userdata('court_id');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $this->input->post('app_date');
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['misc_hearing_date'] = $this->input->post('hearing_date');

				$insert_data['registration_status'] = $this->input->post('reg_status'); //checking registratiin status=1 for SC

				$insert_data['reason'] = $this->input->post('notreg_reason');
				$insert_data['dismissal_no'] = $this->input->post('notreg_dis_no');
				$insert_data['dismissal_date'] = $this->input->post('notreg_dis_date');
				$insert_data['status'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");

				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();

				$n_signby = $this->input->post('notreg_signedby');

				for ($s = 0; $s < count($n_signby); $s++) {
					$insert_nsign['caseID'] = $insert_id;
					$insert_nsign['signed_by'] = $this->session->userdata('user_id');
					$this->db->insert('sc_tbl_registration_signby', $insert_nsign);
				}
			}
			/* -------------Add Litigant------------------*/
			$this->db->select("*");
			$this->db->where('case_id', $this->input->post('old_case_id'));
			$this->db->from('sc_tbl_appeal');
			$result = $this->db->get()->row();
			$appl_lit = $result->litigant;
			$insert_p['caseID'] = $insert_id;
			$insert_p['litigant'] = $appl_lit;
			$insert_p['litigant_type'] = 15;
			$this->db->insert('sc_tbl_registration_litigant', $insert_p);


			$liti_rows = $this->input->post('litigant');

			if (isset($liti_rows['steps']) && !$litigant_added) {
				for ($i = 0; $i < count($liti_rows['steps'][1]); $i++) {
					$insert_process['caseID'] = $insert_id;
					$insert_process['litigant'] = $liti_rows['steps'][1][$i];
					$insert_process['litigant_type'] = $liti_rows['steps'][2][$i];
					$this->db->insert('sc_tbl_registration_litigant', $insert_process);
				}
				$litigant_added = true;
			}
			/* -------------End Add Litigant------------------*/

			/* -------------Add Hearing Judge------------------*/
			$hjudge_rows = $this->input->post('hjudge');
			if (isset($hjudge_rows['step']) && !$hjudge_added) {
				for ($j = 0; $j < count($hjudge_rows['step'][1]); $j++) {
					$insert_process1['caseID'] = $insert_id;
					$insert_process1['hjudge'] = $hjudge_rows['step'][1][$j];
					$this->db->insert('sc_tbl_registration_hjudge', $insert_process1);
				}
				$hjudge_added = true;
			}
			/* -------------End Hearing Judge------------------*/



			/* -------------Add Judge------------------*/
			$judge_rows = $this->input->post('judge');
			if (isset($judge_rows['st']) && !$judge_added) {
				for ($k = 0; $k < count($judge_rows['st'][1]); $k++) {
					$insert_process3['caseID'] = $insert_id;
					$insert_process3['judge'] = $judge_rows['st'][1][$k];
					$this->db->insert('sc_tbl_registration_judge', $insert_process3);
				}
				$judge_added = true;
			}
			/* -------------End Judge------------------*/

			/* -------------Add Signed By------------------*/
			$sign_rows = $this->input->post('sign');
			if (isset($sign_rows['ste']) && !$signby_added) {
				for ($m = 0; $m < count($sign_rows['ste'][1]); $m++) {
					$insert_process2['caseID'] = $insert_id;
					$insert_process2['signed_by'] = $sign_rows['ste'][1][$m];
					$this->db->insert('sc_tbl_registration_signby', $insert_process2);
				}
				$signby_added = true;
			}
			/* -------------End Signed By------------------*/


			/*--------Add Lawyer Info-----*/
			$this->db->select('*');
			$this->db->where('created_by', $this->session->userdata('user_id'));
			$this->db->from('sc_tbl_temp_lawyer_link');
			$qust = $this->db->get();
			$lawyers = $qust->result();

			if (empty($lawyers)) {
			} else {
				$litigants = $this->public->getCaseLitigant($insert_id);
				foreach ($lawyers as $lays) {
					foreach ($litigants as $lits) {
						if ($lays->Lit_id == $lits->litigant) {
							$insert_law['Lawyer_id'] = $lays->Lawyer_id;
							$insert_law['Case_id'] = $insert_id;
							$insert_law['Litigant_id'] = $lits->litigant;
							$insert_law['created_date'] = date('y-m-d');
							$insert_law['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_law);
						}
					}
				}
			}


			/**********END LAWYER****************/
			$this->db->delete('sc_tbl_temp_lawyer_link', array('created_by' => $this->session->userdata('user_id')));
			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		redirect('registration/registry_view');
	}


	function appealReg_elat()
	{
		$litigant_added = false;
		$hjudge_added = false;
		$judge_added = false;
		$signby_added = false;
		$role = $this->session->userdata('user_type');
		$restat = $this->input->post('reg_status');
		if ($this->input->post()) {

			if ($this->input->post('reg_status') == 1) {
				$tz_object = new DateTimeZone('Asia/Dhaka');
				$datetime = new DateTime();
				$datetime->setTimezone($tz_object);
				$timenow = $datetime->format('H:i:s');

				$uid = $this->session->userdata('user_id');
				$regd = $this->input->post('reg_date');
				$reg_date = date("Y-m-d", strtotime($regd));
				$data = [
					'applicant_type' => $this->input->post('applicantype'),
					'court_id' => $this->session->userdata('court_id'),
					'reg_no' => $this->input->post('reg_number'),
					'case_title' => $this->input->post('case_title'),
					'misc_case_id' => '',
					'misc_hearing_date' => $this->input->post('hearing_date'),
					'misc_hearing_time' => $timenow,
					'hearing_option' => $this->input->post('hearingoption'),
					'case_status' => 'A',
					'petition_copy' => $this->input->post('appcopy'),
					'case_status_by' => $this->session->userdata('user_id'),
					'registered' => '1',
					'created_by' => $this->input->post('elatuser'),
					'created_on' => $this->input->post('appealdate')
				];
				$this->db->insert('elat_tbl_case_submission', $data);
				$ecaseid = $this->db->insert_id();

				$oldelatid = $this->public->get_ecase_id($this->input->post('old_case_id'));
				$respondent = $this->public->get_single_respondent('elat_tbl_respondent', $oldelatid);
				$rdata = [
					'caseid' => $ecaseid,
					'cid' => $respondent->cid,
					'name' => $respondent->name,
					'gender' => $respondent->gender,
					'dob' => $respondent->dob,
					'thram' => $respondent->thram,
					'houseno' => $respondent->houseno,
					'village' => $respondent->village,
					'gewog' => $respondent->gewog,
					'dungkhag' => $respondent->dungkhag,
					'dzongkhag' => $respondent->dzongkhag,
					'respondent_defendant' => $respondent->respondent_defendant,
					'mobile' => $respondent->mobile,
					'email' => $respondent->email,
					'mobile2' => $respondent->mobile2,
					'cur_address' => $respondent->cur_address,
					'summon' => '0',
					'created_by' => $this->input->post('elatuser'),
					'created_at' => $this->input->post('appealdate')
				];
				$this->db->insert('elat_tbl_respondent', $rdata);


				$role = $this->session->userdata('user_type');
				$insert_data['court_id'] = $this->session->userdata('court_id');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				$insert_data['elatcaseid'] = $ecaseid;
				$insert_data['misc_hearing_date'] = $this->input->post('hearing_date');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $this->input->post('appealdate');
				$insert_data['case_title'] = $this->input->post('case_title');
				if ($role == 8) {
					$insert_data['registration_status'] = 0;
				} else {
					$insert_data['registration_status'] = $this->input->post('reg_status'); //checking registratiin status=1 for SC
				}
				$insert_data['reg_date'] = $reg_date;
				$insert_data['reg_no'] = $this->input->post('reg_number');
				$insert_data['bench'] = $this->input->post('bench');
				$insert_data['appeal_old_id'] = $this->input->post('old_case_id');
				$insert_data['status'] = 1;
				$insert_data['case_source'] = '1';
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y-m-d");
				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();

				$update_data['misc_case_id'] = $insert_id;
				$this->db->where('id', $ecaseid);
				$this->db->update('elat_tbl_case_submission', $update_data);

				$case_appeal_id = $this->input->post('case_id');
				$this->public->updateCloseAppeal($this->input->post('old_case_id'));

				if ($this->input->post('bench') != '') {
					$this->db->select('*');
					$this->db->where('bench', $this->input->post('bench'));
					$this->db->where('user_type', '2');
					$this->db->where('court', $this->session->userdata('court_id'));
					$this->db->from('sc_tbl_user_profile');
					$query = $this->db->get();
					$judges = $query->result();
					foreach ($judges as $juds) {
						$insert_judge['case_id'] = $insert_id;
						$insert_judge['judge_id'] = $juds->id;
						$this->db->insert('tbl_case_judge_link', $insert_judge);
					}
				}
			} elseif ($this->input->post('reg_status') == 2) {
				$insert_data['court_id'] = $this->session->userdata('court_id');
				$insert_data['misc_case_no'] = $this->input->post('misc_case');
				//$insert_data['casetypelevel3_id'] = $this->input->post('level3');
				$insert_data['application_date'] = $this->input->post('app_date');
				$insert_data['case_title'] = $this->input->post('case_title');
				$insert_data['misc_hearing_date'] = $this->input->post('hearing_date');

				$insert_data['registration_status'] = $this->input->post('reg_status'); //checking registratiin status=1 for SC

				$insert_data['reason'] = $this->input->post('notreg_reason');
				$insert_data['dismissal_no'] = $this->input->post('notreg_dis_no');
				$insert_data['dismissal_date'] = $this->input->post('notreg_dis_date');
				$insert_data['status'] = 1;
				$insert_data['createdby'] = $this->session->userdata('user_id');
				$insert_data['created_on'] = date("Y/m/d");

				$this->db->insert('sc_tbl_misc_case_info', $insert_data);
				$insert_id = $this->db->insert_id();

				$n_signby = $this->input->post('notreg_signedby');

				for ($s = 0; $s < count($n_signby); $s++) {
					$insert_nsign['caseID'] = $insert_id;
					$insert_nsign['signed_by'] = $this->session->userdata('user_id');
					$this->db->insert('sc_tbl_registration_signby', $insert_nsign);
				}
			}
			/* -------------Add Litigant------------------*/
			$this->db->select("*");
			$this->db->where('case_id', $this->input->post('old_case_id'));
			$this->db->from('sc_tbl_appeal');
			$result = $this->db->get()->row();
			$appl_lit = $result->appealent;
			$insert_p['caseID'] = $insert_id;
			$insert_p['litigant'] = $appl_lit;
			$insert_p['litigant_type'] = 15;
			$this->db->insert('sc_tbl_registration_litigant', $insert_p);


			$liti_rows = $this->input->post('litigant');

			if (isset($liti_rows['steps']) && !$litigant_added) {
				for ($i = 0; $i < count($liti_rows['steps'][1]); $i++) {
					$insert_process['caseID'] = $insert_id;
					$insert_process['litigant'] = $liti_rows['steps'][1][$i];
					$insert_process['litigant_type'] = $liti_rows['steps'][2][$i];
					$this->db->insert('sc_tbl_registration_litigant', $insert_process);
				}
				$litigant_added = true;
			}
			/* -------------End Add Litigant------------------*/

			/* -------------Add Hearing Judge------------------*/
			$hjudge_rows = $this->input->post('hjudge');
			if (isset($hjudge_rows['step']) && !$hjudge_added) {
				for ($j = 0; $j < count($hjudge_rows['step'][1]); $j++) {
					$insert_process1['caseID'] = $insert_id;
					$insert_process1['hjudge'] = $hjudge_rows['step'][1][$j];
					$this->db->insert('sc_tbl_registration_hjudge', $insert_process1);
				}
				$hjudge_added = true;
			}
			/* -------------End Hearing Judge------------------*/



			/* -------------Add Judge------------------*/
			$judge_rows = $this->input->post('judge');
			if (isset($judge_rows['st']) && !$judge_added) {
				for ($k = 0; $k < count($judge_rows['st'][1]); $k++) {
					$insert_process3['caseID'] = $insert_id;
					$insert_process3['judge'] = $judge_rows['st'][1][$k];
					$this->db->insert('sc_tbl_registration_judge', $insert_process3);
				}
				$judge_added = true;
			}
			/* -------------End Judge------------------*/

			/* -------------Add Signed By------------------*/
			$sign_rows = $this->input->post('sign');
			if (isset($sign_rows['ste']) && !$signby_added) {
				for ($m = 0; $m < count($sign_rows['ste'][1]); $m++) {
					$insert_process2['caseID'] = $insert_id;
					$insert_process2['signed_by'] = $sign_rows['ste'][1][$m];
					$this->db->insert('sc_tbl_registration_signby', $insert_process2);
				}
				$signby_added = true;
			}
			/* -------------End Signed By------------------*/


			/*--------Add Lawyer Info-----*/
			$this->db->select('*');
			$this->db->where('created_by', $this->session->userdata('user_id'));
			$this->db->from('sc_tbl_temp_lawyer_link');
			$qust = $this->db->get();
			$lawyers = $qust->result();

			if (empty($lawyers)) {
			} else {
				$litigants = $this->public->getCaseLitigant($insert_id);
				foreach ($lawyers as $lays) {
					foreach ($litigants as $lits) {
						if ($lays->Lit_id == $lits->litigant) {
							$insert_law['Lawyer_id'] = $lays->Lawyer_id;
							$insert_law['Case_id'] = $insert_id;
							$insert_law['Litigant_id'] = $lits->litigant;
							$insert_law['created_date'] = date('y-m-d');
							$insert_law['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_law);
						}
					}
				}
			}


			/**********END LAWYER****************/
			$this->db->delete('sc_tbl_temp_lawyer_link', array('created_by' => $this->session->userdata('user_id')));
			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		$regstatus = $this->input->post('reg_status');
		if ($regstatus == '1') {
			$status = "Accepted";
		}
		if ($regstatus == '2') {
			$status = "Rejected";
		}
		$sdate = date("Y-m-d");
		$latemail = $this->public->get_UserLatigantEmail($appl_lit);
		$latname = $this->public->get_UserLatigantName($appl_lit);
		$latno = $this->public->get_UserLatigantNumber($appl_lit);
		$message = 'Dear ' . $latname . ',<br />Your Appeal Application is ' . $status . ' on ' . $sdate . '.<br />Please help us to serve you better<br />Judiciary';

		$this->load->library("email");
		$this->email->set_newline("\r\n");
		$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
		$this->email->to($latemail);
		$this->email->subject('Case Appeal');
		$this->email->message($message);
		$this->email->send();

		$tom = $latno;
		$mmsg = urlencode("Your Appeal Application is '.$status.'");
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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

		redirect('registration/registry_view');
	}

	function appealReviewAssign()
	{
		$old_case_id = $this->input->post('old_case_id');
		$case_title = $this->input->post('case_title');
		$misc_case = $this->input->post('misc_case');
		$app_date = $this->input->post('app_date');
		$bench = $this->input->post('bench');

		$review = array(
			'court_id' => $this->session->userdata('court_id'),
			'misc_case_no' => $misc_case,
			'application_date' => $app_date,
			'case_title' => $case_title,
			'bench' => $bench,
			'appeal_old_id' => $old_case_id,
			'created_on' => date('y-m-d'),
			'createdby' => $this->session->userdata('user_id'),
			'status' => '6'
		);
		if ($this->db->insert('sc_tbl_misc_case_info', $review)) {
			$update = array('appeal_reg_status' => '1');
			$this->db->where('id', $old_case_id);
			$this->db->update('sc_tbl_misc_case_info', $update);
		}
		redirect('registration/registry_view');
	}

	function judgement($id)
	{
        	 
		
		$data['registration'] = $this->public->get_all_registration();
		$data['disposals'] = $this->public->get_disposal_type();
		$data['users'] = $this->public->get_hearing_judge();
		$data['sentences'] = $this->public->get_sentence_type();
		$data['judgement'] = $this->public->get_all_judgement();
		$data['act_name'] = $this->public->get_all_acts();
		$data['case_id'] = $id;
		$this->load->view('header');
		$this->load->view('judgement', $data);
		$this->load->view('footer');
	}
	function judgement_elat($id)
	{
        $cl3id = $this->public->get_case_casetype3_id($id); 
		$cl2id = $this->public->get_case_casetype2_id($cl3id); 
		$data['cl1id'] = $this->public->get_case_casetype1_id($cl2id);
		$data['registration'] = $this->public->get_all_registration();
		$data['disposals'] = $this->public->get_disposal_type();
		$data['users'] = $this->public->get_hearing_judge();
		$data['sentences'] = $this->public->get_sentence_type();
		$data['judgement'] = $this->public->get_all_judgement();
		$data['act_name'] = $this->public->get_all_acts();
		$data['case_id'] = $id;
		$this->load->view('header');
		$this->load->view('judgement_elat', $data);
		$this->load->view('footer');
	}


	function add_litigant()
	{
		$data['litigant_types'] = $this->public->get_litigant_type();
		$data['dzongkhag'] = $this->public->get_dzongkhag();
		$data['dungkhag'] = $this->public->get_dungkhag();
		$this->load->view('header');
		$this->load->view('litigant', $data);
		$this->load->view('footer');
	}
	
	function cid_lit_registration()
	{   
        $data['cidno']=$this->input->post('cid');
		$data['litigant_types'] = $this->public->get_litigant_type();
		$data['dzongkhag'] = $this->public->get_dzongkhag();
		$data['dungkhag'] = $this->public->get_dungkhag();
		$this->load->view('header');
		$this->load->view('litigant_cid', $data);
		$this->load->view('footer');
	}

	function appealed_case()
	{
		$data['appealed_case'] = $this->public->get_appealed_case();
		$this->load->view('header');
		$this->load->view('appealed_case', $data);
		$this->load->view('footer');
	}


	function appeal_request($id)
	{
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['court_id'] = $case->court_id;
		// $data['bench_id'] =$case->bench_id;
		$data['case_id'] = $case->id;
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
		$data['court_type'] = $this->public->get_appeal_court_type();
		$data['judges'] = $this->public->get_hearing_judge();
		$this->load->view('header');
		$this->load->view('appeal_form', $data);
		$this->load->view('footer');
	}

	function appeal_request_elat($id)
	{
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$data['court_id'] = $case->court_id;
		// $data['bench_id'] =$case->bench_id;
		$data['case_id'] = $case->id;
		$data['litigants'] = $this->public->get_CaseRelatedLitigant($id);
		$data['court_type'] = $this->public->get_appeal_court_type();
		$data['judges'] = $this->public->get_hearing_judge();
		$this->load->view('header');
		$this->load->view('appeal_form', $data);
		$this->load->view('footer');
	}

	function add_appeal()
	{

		if ($this->input->post()) {
			$multi_latigant = implode(', ', $_POST['litigant']);
			$signing_judge = implode(', ', $_POST['sign_judge']);
			$insert_data['case_id'] = $this->input->post('case_id');
			$insert_data['appeal_date'] = $this->input->post('appeal_date');
			$insert_data['court_id'] = $this->input->post('court_id');
			$insert_data['signing_judge_id'] = $signing_judge;


			$insert_data['appeal_brief'] = $this->input->post('appeal_brief');
			$insert_data['appealed_court_id'] = $this->input->post('appeal_court');
			$insert_data['appeal_no'] = $this->input->post('appeal_no');
			$insert_data['litigant'] = $multi_latigant;
			$insert_data['dzongkhag'] = $this->session->userdata('dzongkhag');
			$insert_data['updated_by_id'] = $this->session->userdata('user_id');
			$insert_data['updated_date'] = date("Y-m-d");
			$cc = $this->input->post('appeal_court');
			$dd = $this->session->userdata('dzongkhag');
			$court_id = $this->public->CourtIDChange($cc, $dd);
			$insert_data['app_court_profile'] = $court_id;
			$this->db->insert('sc_tbl_appeal', $insert_data);


			$this->db->where('id', $this->input->post('case_id'));
			$update_data['status'] = 5;
			$update_data['appeal_reg_status'] = 0;
			$this->db->update('sc_tbl_misc_case_info', $update_data);
		}
		redirect('registration/registry_view');
	}

	function add_appeal_elat()
	{

		if ($this->input->post()) {
			$multi_latigant = implode(', ', $_POST['litigant']);
			$signing_judge = implode(', ', $_POST['sign_judge']);
			$insert_data['case_id'] = $this->input->post('case_id');
			$insert_data['appeal_date'] = $this->input->post('appeal_date');
			$insert_data['court_id'] = $this->input->post('court_id');
			$insert_data['signing_judge_id'] = $signing_judge;


			$insert_data['appeal_brief'] = $this->input->post('appeal_brief');
			$insert_data['appealed_court_id'] = $this->input->post('appeal_court');
			$insert_data['appeal_no'] = $this->input->post('appeal_no');
			$insert_data['litigant'] = $multi_latigant;
			$insert_data['dzongkhag'] = $this->session->userdata('dzongkhag');
			$insert_data['updated_by_id'] = $this->session->userdata('user_id');
			$insert_data['updated_date'] = date("Y-m-d");
			$cc = $this->input->post('appeal_court');
			$dd = $this->session->userdata('dzongkhag');
			$court_id = $this->public->CourtIDChange($cc, $dd);
			$insert_data['app_court_profile'] = $court_id;
			$this->db->insert('sc_tbl_appeal', $insert_data);


			$this->db->where('id', $this->input->post('case_id'));
			$update_data['status'] = 5;
			$update_data['appeal_reg_status'] = 0;
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			$this->db->where('id', $this->input->post('case_id'));
			$update_data['status'] = 5;
			$update_data['appeal_reg_status'] = 0;
			$this->db->update('sc_tbl_misc_case_info', $update_data);
		}
		redirect('registration/registry_view');
	}

	function view_case($id)
	{
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $id);
		$elat = $case->case_source;
		$hearingoption = $this->public->get_apeal_hearingoption($id);
		//$cID= $this->public->get_single_row('sc_tbl_appeal', $id);
		$data['appealdate'] = $this->public->get_apeal_appealdate($id);
		$data['applicantype'] = $this->public->get_apeal_applivcanttype($id);
		$data['hearingoption'] = $this->public->get_apeal_hearingoption($id);
		$data['appcopy'] = $this->public->get_apeal_appcopy($id);
		$data['judgementcopy'] = $this->public->get_judgementcopy($id);
		$data['elatuser'] = $this->public->get_apeal_userid($id);
		$data['elat'] = $case->case_source;
		$data['court_id'] = $case->court_id;
		$data['case_id'] = $case->id;
		$data['mis_case_no'] = $case->misc_case_no;
		$data['case_no'] = $case->reg_no;
		$data['app_date'] = $case->application_date;
		// $data['appeal_date']=$cID->appeal_date;
		$data['level3'] = $case->casetypelevel3_id;
		$data['case_title'] = $case->case_title;
		$data['applicant_id'] = $case->applicant_id;
		$data['case_brief'] = $case->case_brief;
		$data['misc_hearing_date'] = $case->misc_hearing_date;
		$data['hearing_judge_id'] = $case->hearing_judge_id;
		$data['registration_status'] = $case->registration_status;
		$data['file_attached'] = $case->file_attached;
		$data['reg_date'] = $case->reg_date;
		$data['reg_no'] = $case->reg_no;
		$data['bench'] = $case->bench;
		$data['judge'] = $case->judge;
		$data['clerk'] = $case->clerk;
		$data['reason'] = $case->reason;
		$data['dismissal_no'] = $case->dismissal_no;
		$data['dismissal_date'] = $case->dismissal_date;
		$data['signed_by'] = $case->signed_by;
		$data['issue_order'] = $case->issue_order;
		$data['collected_by'] = $case->collected_by;
		$data['status'] = $case->status;
		$data['cid'] = $case->cid;
		$data['upload_order'] = $case->upload_order;
		$data['review_date'] = $case->review_date;
		$data['review_summery'] = $case->review_summery;
		$data['approved'] = $case->approved;
		$data['a_approved'] = $case->c_approved;
		$data['c_approved'] = $case->c_approved;
		$data['reject'] = $case->reject;
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$data['judicials'] = $this->public->get_Activity_cases($id);
		$this->load->view('header');
		if ($this->session->userdata('user_type') == 8) {
			//Registry Registrar of Supreme Court
			if ($elat == '1') {
				$data['temp_litiID_hc'] = $this->public->get_temp_litigantID_elat_hc($id);
				$this->load->view('view_case_sc_elat', $data);
			} else {
				$this->load->view('view_case_sc', $data);
			}
		} elseif ($this->session->userdata('user_type') == 9) {
			//Registry Register of High Court
			if ($elat == '1') {
				$data['temp_litiID_hc'] = $this->public->get_temp_litigantID_elat_hc($id);
				$this->load->view('view_case_hc_elat', $data);
			} else {
				$this->load->view('view_case_hc', $data);
			}
		} elseif ($this->session->userdata('user_type') == 10) {
			//Registry Register of High Court larger Bench
			if ($elat == '1') {
				$data['temp_litiID_hc'] = $this->public->get_temp_litigantID_elat_hc($id);
				$this->load->view('view_case_hc_lb_elat', $data);
			} else {
				$this->load->view('view_case_hc_lb', $data);
			}
		} else {
			//dzongkhag court and dungkhag court
			if ($elat == '1') {
				$data['temp_litiID_dunkhag'] = $this->public->get_temp_litigantID_elat_dunkhag($id);
				$this->load->view('view_case_elat', $data);
			} else {
				$this->load->view('view_case', $data);
			}
		}
		$this->load->view('footer');
	}

	function review_case()
	{
		$this->load->view('header');
		$this->load->view('review_case');
		$this->load->view('footer');
	}

	function edit_registration($id)
	{
		$data['court_type'] = $this->public->get_court_type();
		$data['level3'] = $this->public->get_casetype_level3();
		$data['litigants'] = $this->public->get_litigant();
		$data['judges'] = $this->public->get_highcourt_judge();
		//$data['judges'] = $this->public->get_Bench_judge();
		$data['benches'] = $this->public->get_benches();
		$data['clerks'] = $this->public->get_clerk();
		$data['users'] = $this->public->get_all_users();
		$data['temp_litiID'] = $this->public->get_temp_litigantID();
		$asset = $this->public->get_single_row1('sc_tbl_misc_case_info', $id);
		$data['id'] = $asset->id;
		$data['courtID'] = $asset->court_id;
		$data['misc_case_no'] = $asset->misc_case_no;
		$data['casetypelevel3_id'] = $asset->casetypelevel3_id;
		$data['application_date'] = $asset->application_date;
		$data['case_title'] = $asset->case_title;
		$data['applicant_id'] = $asset->applicant_id;
		$data['misc_hearing_date'] = $asset->misc_hearing_date;
		$data['hearing_judge_id'] = $asset->hearing_judge_id;
		$data['registration_status'] = $asset->registration_status;
		$data['reg_date'] = $asset->reg_date;
		$data['reg_no'] = $asset->reg_no;
		$data['benche'] = $asset->bench;
		$data['judge'] = $asset->judge;
		$data['caselevel3'] = $asset->casetypelevel3_id;
		$data['clerk'] = $asset->clerk;
		$data['reason'] = $asset->reason;
		$data['dismissal_no'] = $asset->dismissal_no;
		$data['dismissal_date'] = $asset->dismissal_date;
		$data['signed_by'] = $asset->signed_by;
		$data['case_type1'] = $this->public->get_casetype_level1();
		$data['case_type2'] = $this->public->get_casetype_level2();
		$data['case_type3'] = $this->public->get_casetype_level3();
		$data['case_types'] = $this->public->get_case_casetype($asset->id);
		$this->load->view('header');
		$this->load->view('registration_edit', $data);
		$this->load->view('footer');
	}
	function reassign_case($id)
	{
		$asset = $this->public->get_single_row1('sc_tbl_misc_case_info', $id);
		$data['case_id'] = $id;

		$data['benche'] = $asset->bench;
		$data['judges'] = $this->public->get_highcourt_judge();
		$data['clerks'] = $this->public->get_clerk();

		$this->load->view('header');
		$this->load->view('reassign_case', $data);
		$this->load->view('footer');
	}

	function assignCase()
	{
		$id = $this->input->post('reg_id');
		$judge = $this->input->post('reg_judge');
		$assigne = $this->input->post('reg_clerk');
		$case_Title = $this->input->post('case_Title');
		$this->public->assignCaseJudge($id, $judge, $assigne, $case_Title);
	}

	function reviewCaseAssign($id)
	{
		$data['benches'] = $this->public->get_benches();
		$data['judges'] = $this->public->get_hearing_judge();
		$data['lits'] = $this->public->getAllCaseLitigant($id);
		$data['cases'] = $this->public->get_CaseID($id);
		$data['case_id'] = $id;

		$this->load->view('header');
		if ($this->session->userdata('user_type') == 3) {
			$this->load->view('reviewRegisteration', $data);
		} else {
			$this->load->view('reviewAssign', $data);
		}
		$this->load->view('footer');
	}

	function update_registration()
	{
		$litigant_added = false;
		$hjudge_added = false;
		$judge_added = false;
		$signby_added = false;
		if ($this->input->post()) {

			$id = $this->input->post('reg_id');
			$this->db->where('id', $id);
			$update_data['case_Title'] = $this->input->post('case_Title');
			$update_data['judge'] = $this->input->post('reg_judge');
			$update_data['clerk'] = $this->input->post('reg_clerk');
			$update_data['status'] = 2;
			//$update_data['updatedby'] = $this->session->userdata('user_id');
			$update_data['updated_on'] = date("Y/m/d");
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			/* -------------Add Judge------------------*/
			$judge_rows = $this->input->post('judge');
			if (isset($judge_rows['st']) && !$judge_added) {
				for ($k = 0; $k < count($judge_rows['st'][1]); $k++) {
					$insert_process3['caseID'] = $id;
					$insert_process3['judge'] = $judge_rows['st'][1][$k];
					$this->db->insert('sc_tbl_registration_judge', $insert_process3);
				}
				$judge_added = true;
			}
			/* -------------End Judge------------------*/

			$this->db->delete('sc_temp_litigant', array('created_by' => $this->session->userdata('user_id')));
		}
		if ($this->session->userdata('user_type') == 7) {
			redirect('registration/hybrid_dash');
		} else {
			redirect('registration');
		}
	}

	function reassign_case_to()
	{
		$case_id = $this->input->post('case_id');
		$update_data['judge'] = $this->input->post('reg_judge');
		$update_data['clerk'] = $this->input->post('reg_clerk');
		$update_data['updated_on'] = date("Y/m/d");

		$this->db->where('id', $case_id);
		$result = $this->db->update('sc_tbl_misc_case_info', $update_data);

		if ($result) {
			$insert_data['case_id'] = $this->input->post('case_id');
			$insert_data['judge_id'] = $this->input->post('reg_judge');
			$insert_data['clerk_id'] = $this->input->post('reg_clerk');
			$insert_data['updated_on'] = date("Y/m/d");
			$this->db->insert('sc_tbl_reassign_case', $insert_data);

			redirect('registration');
		}
	}
	function delete_litigant($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_litigant');
		}
	}

	function delete_hjudge($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_hjudge');
		}
	}

	function delete_judge($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_judge');
		}
	}

	function delete_sign($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_registration_signby');
		}
	}

	function delete_ActivityLitigant($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_case_litigant');
		}
	}

	function delete_ActivityForm($id = NULL)
	{
		if ($this->input->post('id')) {

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('sc_tbl_case_form');
		}
	}

	function enforcement()
	{
		$data['judges'] = $this->public->get_hearing_judge();

		$this->load->view('header');
		$this->load->view('enforcement', $data);
		$this->load->view('footer');
	}
	function add_enforcement()
	{
		$enforcement_case = $this->session->userdata('caseinfo');

		foreach ($enforcement_case as $row) :
			$case_id = $row->id;
			$bench = $row->bench;
		endforeach;
		if ($bench == '') {
			echo "
			<script>
				if(confirm('Some of your field is empty')) document.location = 'user_dashboard';
			</script>
			";
		} else {
			$insert_data['court_id'] = $this->session->userdata('court_id');
			$insert_data['bench_id'] = $bench;
			$insert_data['case_id'] = $case_id;
			$insert_data['application_date'] = $this->input->post('application_date');
			$insert_data['applicant_id'] = $this->public->get_case_applicant($case_id);
			$insert_data['opponent_id'] = $this->public->get_case_opponent($case_id);
			$insert_data['misc_no'] = $this->input->post('misc_no');
			$insert_data['misc_hearing_date'] = $this->input->post('misc_hearing_date');
			$insert_data['hearing_judge'] = $this->input->post('hearing_judge');
			$insert_data['details'] = $this->input->post('details');
			$insert_data['created_by'] = $this->session->userdata('user_id');
			$insert_data['created_on'] = date('y-m-d');

			if ($this->db->insert('tbl_enforcement', $insert_data)) {
				$data['judges'] = $this->public->get_hearing_judge();
				$data['enforcement_case'] = $this->public->get_case_info($case_id);
				$data['judgement'] = $this->public->get_case_judgement($case_id);

				$this->load->view('header');
				$this->load->view('enforcement', $data);
				$this->load->view('footer');

				$this->session->unset_userdata('caseinfo');
				//redirect('registration/search_case_info');
			} else {
				echo "Not inserted the data to the database";
			}
		}
	}
	function search_case_info()
	{
		$case_id = $this->input->post('search_case');
		$data['judges'] = $this->public->get_hearing_judge();
		$data['enforcement_case'] = $this->public->get_case_info($case_id);
		$data['judgement'] = $this->public->get_case_judgement($case_id);

		$this->load->view('header');
		$this->load->view('enforcement', $data);
		$this->load->view('footer');
	}

	function collection()
	{
		$data['litigants'] = $this->public->get_litigant();
		$this->load->view('header');
		$this->load->view('collection', $data);
		$this->load->view('footer');
	}


	function edit_caseActivity($id)
	{
		$data['registration'] = $this->public->get_registered_registration();
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$asset = $this->public->get_single_row1('sc_tbl_case_activities', $id);
		$data['id'] = $asset->id;
		$data['case_id'] = $asset->case_id;
		$data['judicial_process_id'] = $asset->judicial_process_id;
		$data['activity_date'] = $asset->activity_date;
		$data['form_used_id'] = $asset->form_used_id;
		$data['form_date'] = $asset->form_date;
		$data['amount'] = $asset->amount;
		$data['receipt_no'] = $asset->receipt_no;
		$data['surety'] = $asset->surety;
		$data['remarks'] = $asset->remarks;
		$data['file_attached'] = $asset->file_attached;
		$data['litigants'] = $this->public->getCaseLitigant($asset->case_id);
		$this->load->view('header');
		$this->load->view('case_activity_edit', $data);
		$this->load->view('footer');
	}

	function edit_caseActivity_elat($id)
	{
		$data['registration'] = $this->public->get_registered_registration();
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$asset = $this->public->get_single_row1('sc_tbl_case_activities', $id);
		$data['id'] = $asset->id;
		$data['case_id'] = $asset->case_id;
		$data['judicial_process_id'] = $asset->judicial_process_id;
		$data['activity_date'] = $asset->activity_date;
		$data['activity_start_time'] = $asset->activity_start_time;
		$data['form_used_id'] = $asset->form_used_id;
		$data['form_date'] = $asset->form_date;
		$data['amount'] = $asset->amount;
		$data['receipt_no'] = $asset->receipt_no;
		$data['surety'] = $asset->surety;
		$data['remarks'] = $asset->remarks;
		$data['file_attached'] = $asset->file_attached;
		$data['litigants'] = $this->public->getCaseLitigant($asset->case_id);
		$this->load->view('header');
		$this->load->view('case_activity_edit_elat', $data);
		$this->load->view('footer');
	}

	function send_mail_forms($caseid, $fldid)
	{
		$j_form = $this->public->getJudicialForms($caseid, $fldid);
		foreach ($j_form as $jfm) {
			$formname = $this->public->get_form_name($jfm->form_used);
		} //get_email
		$userid = $this->elat->get_created_by($caseid);

		$email = $this->elat->get_email($userid);
		$name = $this->public->get_UserName($userid);
		$mobile = $this->public->get_UserContactNumber($userid);
		$this->load->config('email');
		$this->load->library('email');
		$from = $this->config->item('smtp_user');
		$subject = "Judiciary Notice";
		$message = $message = 'Dear ' . $name . ',<br /><br />please Download the form ' . $formname . ' from the following link. Fill up and upload to proceed to the next stage of hearing.
                   <br /><br /> http://www.judiciary.gov.bt/elat/index.php/Welcome/get_pages?id=59/<br /><br /><br />Please help us to serve you better<br />Judiciary';
		$this->email->set_newline("\r\n");
		//$this->email->from($from);
                $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
		} else {
			?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
		}

		$tom = trim($mobile);
		$mmsg = urlencode("You got a Notice from Judiciary, check your mail for detail");
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
		$this->session->set_flashdata('success', 'A Notification Mail has been sent to ' . $email . '');
		redirect('registration/case_activity/' . $caseid);
	}

	function livemeet($juid, $caseid, $ec)
	{
		$data['roomid'] = md5(date('d-m-Y H:i:s')) . substr(md5(rand(1000000, 2000000)), 0, 10);
		$case = $this->public->get_single_row('sc_tbl_misc_case_info', $caseid);
		$data['ec'] = $ec;
		$data['case_id'] = $caseid;
		$data['court_id'] = $this->session->userdata('court_id');
		$data['ju_id'] = $juid;
		$data['case_title'] = $case->case_title;
		$data['judicials'] = $this->public->get_Activity_cases_juid($caseid, $juid);
		$data['aJudges'] = $this->public->getAlCaseJudge($caseid);
		$data['alawyers'] = $this->public->getAlCaseLawyers($caseid);
		$data['alitigants'] = $this->public->getAlCaseLitigants($caseid);
		$this->load->view('header');
		$this->load->view('livemeet', $data);
		$this->load->view('footer');
	}

        function edit_invite($caseid, $meetingtype, $roomid)
	{
		$data['caseid']= $caseid;
		$data['meetingtype']= $meetingtype;
		$data['roomid']= $roomid;
		$courtid = $this->session->userdata('court_id');
		$data['meetings'] = $this->public->get_court_meetings($courtid);
		$this->load->view('header');
		$this->load->view('live/edit', $data);
		$this->load->view('footer');
	}

	function update_invite() 
	{
	
        $caseid = $this->input->post('caseid');
		$meetingtype = $this->input->post('meetingtype');
		$roomid = $this->input->post('roomid');
        $this->db->where('case_id', $caseid);
		$update_data['meeting_date'] = $this->input->post('meeting_date');
		$update_data['start_time'] = $this->input->post('start_time');
		$update_data['end_time'] = $this->input->post('end_time');
		$this->db->update('jitsi', $update_data);
        $join_url = 'https://elitigation.judiciary.gov.bt/'.$roomid.''; 
        $latigants = $this->public->getAllCaseLitigant($this->input->post('case_id'));
		$date = $this->input->post('meeting_date');
		$stime = $this->input->post('start_time');
		$etime = $this->input->post('end_time');
		if($meetingtype == '2'){
			foreach ($latigants as $lats) {
				$latemail = $this->public->get_UserLatigantEmail($lats->litigant);
				$latname = $this->public->get_UserLatigantName($lats->litigant);
				$latno = $this->public->get_UserLatigantNumber($lats->litigant);
                $uid = $this->public->get_user_id($latemail);
				$ct = $this->public->get_CaseTitle($caseid);	
				$message = 'Dear User,<br />The Hearing for case '.$ct.' is Rescheduled on ' . $date . ' from ' . $stime . ' to '.$etime.'.<br />Please click the link to join the court hearing virtually or may come in person.<br />' . $join_url . '
<br />Username: judiciary
<br /> Password: pass@123
<br />Please help us to serve you better.<br /><br />Judiciary';                                
                                $this->load->library("email");
				$this->email->set_newline("\r\n");
				$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
				$this->email->to($latemail);
				$this->email->subject('Judiciary Notice');
				$this->email->message($message);
				if ($this->email->send()) {
				} else {
					?>
				<script type="text/javascript">
				   alert("Could not Reach SMPT server, eMail not sent");
				</script>
				<?php
				}
				$tom = $latno;
				$mmsg = urlencode("There has been a change in hearing time, pls. check your email.");
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
			}
		}
        if($meetingtype == '1')
		{
			$ruid = $this->elat->get_case_cmsuserid($caseid);
            $defendantEmail = $this->public->get_DefendantEmail($caseid);
            $applicantemail = $this->elat->get_email($ruid);
			$message = 'Dear User,<br />The Remand Hearing is Rescheduled on ' . $date . ' from ' . $stime . ' to '.$etime.'.<br />Please click the link to join the court hearing virtually or may come in person.<br />' . $join_url . '
<br /> Username: judiciary
<br /> Password: pass@123
<br />Please help us to serve you better.<br /><br />Judiciary';                
                                $this->load->library("email");
				$this->email->set_newline("\r\n");
				$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
				$this->email->to($applicantemail);
				$this->email->subject('Remand Hearing');
				$this->email->message($message);
				if ($this->email->send()) {
				} else {
					?>
				<script type="text/javascript">
				   alert("Could not Reach SMPT server, eMail not sent");
				</script>
				<?php
				}
				foreach($defendantEmail as $deff) 
				 {
					$this->load->library("email");
					$this->email->set_newline("\r\n");
					$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
					$this->email->to($deff->email);
					$this->email->subject('Judiciary Notice');
					$this->email->message($message);
					if ($this->email->send()) {
					} else {
						?>
					<script type="text/javascript">
					   alert("Could not Reach SMPT server, eMail not sent");
					</script>
					<?php
					}
				 }
		}
		$courtid = $this->session->userdata('court_id');
		$data['meetings'] = $this->public->get_court_meetings($courtid);
		$this->session->set_flashdata('success', 'A Notice Mail has been sent to the Participants');
		$this->load->view('header');
		$this->load->view('live/jitsi_live', $data);
		$this->load->view('footer');	

	}


	function invite()
	{	
	  $roomid = md5(date('d-m-Y H:i:s')) . substr(md5(rand(1000000, 2000000)), 0, 10);
	  $join_url = 'https://elitigation.judiciary.gov.bt/'.$roomid.''; 
	  $insert_data['court_id'] = $this->input->post('courtid');
	  $insert_data['case_id'] = $this->input->post('caseid');
      $insert_data['juid'] = $this->input->post('juid');
	  $insert_data['meeting_type'] = "2";
	  $insert_data['meeting_date'] = $this->input->post('date');
	  $insert_data['start_time'] = $this->input->post('start');
	  $insert_data['end_time'] = $this->input->post('end');
	  $insert_data['status'] = '1';
	  $insert_data['room_id'] = $roomid;
	  $insert_data['url'] = $join_url;
	  $insert_data['created_by'] = $this->session->userdata('user_id');
	  $insert_data['created_date'] = date('y-m-d');
	  $this->db->insert('jitsi', $insert_data);
                
	  $date = $this->input->post('date');
	  $stime = $this->input->post('start');
	  $etime = $this->input->post('end');
          $ct = $this->public->get_CaseTitle($this->input->post('caseid'));
	  $emails = $this->input->post('emails');
	  for ($k = 0; $k < count($emails); $k++) {
	    if (isset($emails[$k])) {
            $to = $emails[$k];
			if($to != ""){
	    $this->load->config('email');
	    $this->load->library('email');
        $from = $this->config->item('smtp_user');
	    $subject = "Judiciary Notice";
	    $message = 'Dear User,<br />The Hearing for case '.$ct.' is scheduled on ' . $date . ' from ' . $stime . ' to '.$etime.'.<br />Please click the link to join the court hearing virtually or may come in person.<br />' . $join_url . '<br />
        <br /> Username: judiciary
        <br /> Password: pass@123
         <br />Please help us to serve you better.<br /><br />Judiciary';	    
        $this->email->set_newline("\r\n");
	    $this->email->from($from);
        $this->email->to($to);
	    $this->email->subject($subject);
	    $this->email->message($message);
	    if ($this->email->send()) {
	    } else {
			?>
			<script type="text/javascript">
			   alert("Could not Reach SMPT server, eMail not sent");
			</script>
			<?php
	         }	
	       }
	     }
        }
	   $this->session->set_flashdata('success', 'A Notice Mail has been sent to the Participants');
	   redirect('registration/case_activity_elat/'.$this->input->post('caseid')); 
        }

	public function jitsi_live()
	{
		$courtid = $this->session->userdata('court_id');
		$data['meetings'] = $this->public->get_court_meetings($courtid);
		$this->load->view('header');
		$this->load->view('live/jitsi_live', $data);
		$this->load->view('footer');
	}

	function stream_jitsi($jitsi_id, $courtname, $caseid)
	{       
		$page_data['jitsi_id'] = $jitsi_id;
		$page_data['courtname'] = $courtname;
		$page_data['casetitle'] = $this->public->get_CaseTitle($caseid);
		$this->load->view('live/jitsi_live_stream', $page_data);
	}

	function edit_caseActivity1($id)
	{
		$data['registration'] = $this->public->get_registered_registration();
		$data['judicial_process'] = $this->public->get_judicial_process();
		$data['forms'] = $this->public->get_forms();
		$asset = $this->public->get_single_row1('sc_tbl_case_activities', $id);
		$data['id'] = $asset->id;
		$data['case_id'] = $asset->case_id;
		$data['judicial_process_id'] = $asset->judicial_process_id;
		$data['activity_date'] = $asset->activity_date;
		$data['form_used_id'] = $asset->form_used_id;
		$data['form_date'] = $asset->form_date;
		$data['amount'] = $asset->amount;
		$data['receipt_no'] = $asset->receipt_no;
		$data['surety'] = $asset->surety;
		$data['remarks'] = $asset->remarks;
		$data['file_attached'] = $asset->file_attached;
		$data['litigants'] = $this->public->getCaseLitigant($asset->case_id);
		$this->load->view('header');
		$this->load->view('case_activity_edit1', $data);
		$this->load->view('footer');
	}


	function add_new_litigant()
	{
        
		$pointer = $this->input->post('point');
		if ($pointer == '1') {
			if ($this->input->post()) {
				if ($this->public->count_no_fields('sc_tbl_litigant', 'litigant_CID', $this->input->post('cid')) != '0') {
					$this->session->set_flashdata('asset_class', 'failure');
					$this->session->set_flashdata('asset_msg', 'The Litigant with this CID already exists.');
				} else {

					$insert_data['litigant_name'] = $this->input->post('Name');
					$insert_data['litigant_nationality'] = $this->input->post('Nationality');
					$insert_data['litigant_CID'] = $this->input->post('cid');
					$insert_data['occupation'] = $this->input->post('occupation');
					$insert_data['litigant_gender'] = $this->input->post('gender');
					$insert_data['litigant_DOB'] = $this->input->post('dob');
					$insert_data['litigant_age'] = $this->input->post('age');
					$insert_data['litigant_house_no'] = $this->input->post('house_no');
					$insert_data['litigant_thram_no'] = $this->input->post('tharm_no');
					$insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
					$insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
					$insert_data['litigant_gewog'] = $this->input->post('gewog');
					$insert_data['litigant_village'] = $this->input->post('village');
					$insert_data['litigant_father'] = $this->input->post('fatherName');
					$insert_data['litigant_phone'] = $this->input->post('phone');
					$insert_data['litigant_email'] = $this->input->post('email');
					$insert_data['litigant_current_address'] = $this->input->post('address');
					$this->db->insert('sc_tbl_litigant', $insert_data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'New Litigant Added added successfully.');
				}
			}
		} elseif ($pointer == '2') {
			if ($this->input->post()) {
				if ($this->public->count_no_fields('sc_tbl_litigant', 'license_id', $this->input->post('licenseNo')) != '0') {
					$this->session->set_flashdata('asset_class', 'failure');
					$this->session->set_flashdata('asset_msg', 'The Organization with this License already exists.');
				} else {
					$insert_data['is_org'] = 1;
					$insert_data['Organization_Name'] = $this->input->post('OrgName');
					$insert_data['org_code'] = $this->input->post('OrgCode');
					$insert_data['license_id'] = $this->input->post('licenseNo');
					$insert_data['litigant_current_address'] = $this->input->post('caddress');
					$insert_data['org_pobox'] = $this->input->post('cpobox');
					$insert_data['org_pno'] = $this->input->post('cpno');
					$insert_data['org_fax'] = $this->input->post('cfno');

					$insert_data['litigant_name'] = $this->input->post('RName');
					$insert_data['litigant_phone'] = $this->input->post('Rpno');
					$insert_data['occupation'] = $this->input->post('Rpost');
					$insert_data['created_on'] = date('y-m-d');
					$insert_data['createdby'] = $this->session->userdata('user_id');

					$this->db->insert('sc_tbl_litigant', $insert_data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'New Litigant Added added successfully.');
				}
			}
		}
		redirect('registration/add_litigant');
	}
	
	
	function add_new_litigant_cid()
	{
        
		$var = $this->input->post('dob');
        $date = str_replace('/', '-', $var);
        $dob = date('Y-m-d', strtotime($date));
		$pointer = $this->input->post('point');
		if ($pointer == '1') {
			if ($this->input->post()) {
				if ($this->public->count_no_fields('sc_tbl_litigant', 'litigant_CID', $this->input->post('cid')) != '0') {
					
				   $litCID = $this->input->post('cid');
		           $this->db->where('litigant_CID', $litCID);
		           $update_data['litigant_name'] = $this->input->post('Name');
		           $update_data['litigant_nationality'] = $this->input->post('Nationality');
		           $update_data['litigant_CID'] = $this->input->post('cid');
		           $update_data['occupation'] = $this->input->post('occupation');
		           $update_data['litigant_gender'] = $this->input->post('gender');
		           $update_data['litigant_DOB'] = $dob;
		           $update_data['litigant_age'] = $this->input->post('age');
		           $update_data['litigant_house_no'] = $this->input->post('house_no');
		           $update_data['litigant_thram_no'] = $this->input->post('tharm_no');
		           $update_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
		           $update_data['litigant_dungkhag'] = $this->input->post('dungkhag');
		           $update_data['litigant_gewog'] = $this->input->post('gewog');
		           $update_data['litigant_village'] = $this->input->post('village');
		           $update_data['litigant_father'] = $this->input->post('fatherName');
		           $update_data['litigant_phone'] = $this->input->post('phone');
		           $update_data['litigant_email'] = $this->input->post('email');
		           $update_data['litigant_current_address'] = $this->input->post('address');
		           $this->db->update('sc_tbl_litigant', $update_data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'The Litigant already Exists, Details has been Updated.');
				} else {

					$insert_data['litigant_name'] = $this->input->post('Name');
					$insert_data['litigant_nationality'] = $this->input->post('Nationality');
					$insert_data['litigant_CID'] = $this->input->post('cid');
					$insert_data['occupation'] = $this->input->post('occupation');
					$insert_data['litigant_gender'] = $this->input->post('gender');
					$insert_data['litigant_DOB'] = $dob;
					$insert_data['litigant_age'] = $this->input->post('age');
					$insert_data['litigant_house_no'] = $this->input->post('house_no');
					$insert_data['litigant_thram_no'] = $this->input->post('tharm_no');
					$insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
					$insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
					$insert_data['litigant_gewog'] = $this->input->post('gewog');
					$insert_data['litigant_village'] = $this->input->post('village');
					$insert_data['litigant_father'] = $this->input->post('fatherName');
					$insert_data['litigant_phone'] = $this->input->post('phone');
					$insert_data['litigant_email'] = $this->input->post('email');
					$insert_data['litigant_current_address'] = $this->input->post('address');
					$this->db->insert('sc_tbl_litigant', $insert_data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'New Litigant Added added successfully.');
				}
			}
		} elseif ($pointer == '2') {
			if ($this->input->post()) {
				if ($this->public->count_no_fields('sc_tbl_litigant', 'license_id', $this->input->post('licenseNo')) != '0') {
					$this->session->set_flashdata('asset_class', 'failure');
					$this->session->set_flashdata('asset_msg', 'The Organization with this License already exists.');
				} else {
					$insert_data['is_org'] = 1;
					$insert_data['Organization_Name'] = $this->input->post('OrgName');
					$insert_data['org_code'] = $this->input->post('OrgCode');
					$insert_data['license_id'] = $this->input->post('licenseNo');
					$insert_data['litigant_current_address'] = $this->input->post('caddress');
					$insert_data['org_pobox'] = $this->input->post('cpobox');
					$insert_data['org_pno'] = $this->input->post('cpno');
					$insert_data['org_fax'] = $this->input->post('cfno');

					$insert_data['litigant_name'] = $this->input->post('RName');
					$insert_data['litigant_phone'] = $this->input->post('Rpno');
					$insert_data['occupation'] = $this->input->post('Rpost');
					$insert_data['created_on'] = date('y-m-d');
					$insert_data['createdby'] = $this->session->userdata('user_id');

					$this->db->insert('sc_tbl_litigant', $insert_data);
					$this->session->set_flashdata('asset_class', 'success');
					$this->session->set_flashdata('asset_msg', 'New Litigant Added added successfully.');
				}
			}
		}
		redirect('registration/add_litigant');
	}

	function update_litigant()
	{
		$litID = $this->input->post('liti_id');
		$this->db->where('id', $litID);
		$update_data['litigant_name'] = $this->input->post('Name');
		$update_data['litigant_nationality'] = $this->input->post('Nationality');
		$update_data['litigant_CID'] = $this->input->post('cid');
		$update_data['occupation'] = $this->input->post('occupation');
		$update_data['litigant_gender'] = $this->input->post('gender');
		$update_data['litigant_DOB'] = $this->input->post('dob');
		$update_data['litigant_age'] = $this->input->post('age');
		$update_data['litigant_house_no'] = $this->input->post('house_no');
		$update_data['litigant_thram_no'] = $this->input->post('tharm_no');
		$update_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
		$update_data['litigant_dungkhag'] = $this->input->post('dungkhag');
		$update_data['litigant_gewog'] = $this->input->post('gewog');
		$update_data['litigant_village'] = $this->input->post('village');
		$update_data['litigant_father'] = $this->input->post('fatherName');
		$update_data['litigant_phone'] = $this->input->post('phone');
		$update_data['litigant_email'] = $this->input->post('email');
		$update_data['litigant_current_address'] = $this->input->post('address');
		$this->db->update('sc_tbl_litigant', $update_data);
		$this->session->set_flashdata('asset_class', 'success');
		$this->session->set_flashdata('asset_msg', 'Litigant Updated successfully.');
		redirect('registration/edit_litigant/' . $litID);
	}

	function update_litigant_org()
	{
		$litID = $this->input->post('org_id');
		$this->db->where('id', $litID);
		$update_data['Organization_Name'] = $this->input->post('OrgName');
		$update_data['org_code'] = $this->input->post('OrgCode');
		$update_data['license_id'] = $this->input->post('licenseNo');
		$update_data['org_pno'] = $this->input->post('cpno');
		$update_data['org_pobox'] = $this->input->post('cpobox');
		$update_data['org_fax'] = $this->input->post('cfno');
		$update_data['litigant_current_address'] = $this->input->post('caddress');
		$update_data['litigant_name'] = $this->input->post('RName');
		$update_data['occupation'] = $this->input->post('designation');
		$update_data['litigant_phone'] = $this->input->post('Rpno');
		$this->db->update('sc_tbl_litigant', $update_data);
		$this->session->set_flashdata('asset_class', 'success');
		$this->session->set_flashdata('asset_msg', 'Litigant Updated successfully.');
		redirect('registration/edit_litigant_org/' . $litID);
	}


	function delete_caseActivity($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sc_tbl_case_activities');

		$this->db->where('judicial_process_id', $id);
		$this->db->delete('sc_tbl_case_form');

		$this->db->where('judicial_process_id', $id);
		$this->db->delete('sc_tbl_case_litigant');

		redirect('registration/case_activity');
	}

	function add_judgement()
	{

		$a = explode('-', $_POST["judgement_date"]);
		$judgementdate = $a[2] . '-' . $a[1] . '-' . $a[0];

		if ($this->input->post()) {
			$folder1 = "images/courtorder/";
			move_uploaded_file($_FILES["judgement_upload"]["tmp_name"], "$folder1" . $_FILES["judgement_upload"]["name"]);
			$insert_data['case_id'] = $this->input->post('case_id');
			$insert_data['judgement_type'] = $this->input->post('judgement_type');
			$insert_data['judgement_no'] = $this->input->post('judgement_no');
			$insert_data['judgement_date'] = $judgementdate;
			$insert_data['dispossal_type'] = $this->input->post('disposal');
			$insert_data['judgement_brief'] = $this->input->post('judgement_brief');
			$insert_data['upload'] = $_FILES["judgement_upload"]["name"];

			if (isset($_POST['sentenced'])) {
				$insert_data['sentence_status'] = 1;
			}
			$this->db->insert('sc_tbl_judgement', $insert_data);
			$insert_id = $this->db->insert_id();

			$this->db->where('id', $this->input->post('case_id'));
			$update_data['status'] = 4;
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			$this->db->where('misc_case_id', $this->input->post('case_id'));
			$update_data_elat['case_complete_status'] = 4;
			$this->db->update('elat_tbl_case_submission', $update_data_elat);

			$judges = $this->input->post('signed_by');

			for ($i = 0; $i < count($judges); $i++) {
				$insert_process['judgement_id'] = $insert_id;
				$insert_process['judge_id'] = $judges[$i];
				$insert_process['created_date'] = date('y-m-d');
				$this->db->insert('sc_tbl_judgement_signby', $insert_process);
			}

			$act_name = $this->input->post('act_name');
			$article = $this->input->post('article');
			$section = $this->input->post('section');
			$subsection = $this->input->post('subsection');

			for ($j = 0; $j < count($act_name); $j++) {
				$insert_process2['judgement_id'] = $insert_id;
				$insert_process2['Act_id'] = $act_name[$j];
				$insert_process2['ArticleChapter'] = $article[$j];
				$insert_process2['Section'] = $section[$j];
				$insert_process2['Subsection'] = $subsection[$j];
				$this->db->insert('sc_tbl_judgement_act', $insert_process2);
			}




			if (isset($_POST['sentenced'])) {

				$litagent = $this->input->post('litagent');
				$sentence_type = $this->input->post('sentence_type');
				$year = $this->input->post('year');
				$month = $this->input->post('month');
				$day = $this->input->post('day');
				$start_date = $this->input->post('start_date');
				$release_date = $this->input->post('release_date');
				$amount = $this->input->post('amount');
				$receipt_no = $this->input->post('receipt_no');


				for ($k = 0; $k < count($sentence_type); $k++) {
					$insert_process3['Judgement_id'] = $insert_id;
					$insert_process3['court_id'] = $this->session->userdata('court_id');
					$insert_process3['case_id'] = $this->input->post('case_id');
					$insert_process3['Litigant'] = $litagent[$k];
					$insert_process3['Sentence_type'] = $sentence_type[$k];


					if ($sentence_type[$k] == 7 || $sentence_type[$k] == 6 || $sentence_type[$k] == 10) {
						$insert_process3['Amount'] = $amount[$k];
						$insert_process3['Reciept'] = $receipt_no[$k];
					} elseif ($sentence_type[$k] == 8) {
					} elseif ($sentence_type[$k] == 9) {
						$insert_process3['Year'] = $year[$k];
						$insert_process3['Month'] = $month[$k];
						$insert_process3['Day'] = $day[$k];
						$insert_process3['Start_Date'] = $start_date[$k];
						$insert_process3['End_Date'] = $release_date[$k];
					}

					$this->db->insert('tbl_sc_judgement_sentence', $insert_process3);
				}
			}
		}
		if ($this->session->userdata('user_type') == '7') {
			redirect('registration/hybrid_dash');
		} else {
			redirect('registration/user_dashboard');
		}
	}

	function add_judgement_elat()
	{

		//echo $a = explode('-',$_POST["judgement_date"]);
		//echo $judgementdate = $a[2].'-'.$a[1].'-'.$a[0];

		if ($this->input->post()) {
			$folder = "images/courtorder/";
			move_uploaded_file($_FILES["judgement_upload"]["tmp_name"], "$folder" . $_FILES["judgement_upload"]["name"]);
			$insert_data['case_id'] = $this->input->post('case_id');
			$insert_data['judgement_type'] = $this->input->post('judgement_type');
			$insert_data['judgement_no'] = $this->input->post('judgement_no');
			$insert_data['judgement_date'] = $this->input->post('judgement_date');
			$insert_data['dispossal_type'] = $this->input->post('disposal');
			$insert_data['judgement_brief'] = $this->input->post('judgement_brief');
			$insert_data['upload'] = $_FILES["judgement_upload"]["name"];

			if (isset($_POST['sentenced'])) {
				$insert_data['sentence_status'] = 1;
			}
			$this->db->insert('sc_tbl_judgement', $insert_data);
			$insert_id = $this->db->insert_id();

			$tz_object = new DateTimeZone('Asia/Dhaka');
			$datetime = new DateTime();
			$datetime->setTimezone($tz_object);
			$timenow = $datetime->format('H:i:s');

			$folder1 = "images/courtorder/";
			move_uploaded_file($_FILES["judgement_upload"]["tmp_name"], "$folder1" . $_FILES["judgement_upload"]["name"]);
			$elatid = $this->public->get_elat_caseid($this->input->post('case_id'));
			$insert_data1['misc_caseid'] = $this->input->post('case_id');
			$insert_data1['elatid'] = $elatid;
			$insert_data1['document_copy'] = $_FILES["judgement_upload"]["name"];
			$insert_data1['document_type'] = "Judgement";
			$insert_data1['issue_date'] = $this->input->post('judgement_date');
			$insert_data1['issue_to'] = "";
			$insert_data1['corrospondence_type'] = "1";
			$insert_data1['summon_date'] = $this->input->post('judgement_date');
			$insert_data1['summon_time'] = $timenow;
			$insert_data1['created_by'] = $this->session->userdata('user_id');
			$insert_data1['created_on'] = date('y-m-d');
			$this->db->insert('sc_tbl_courtorders', $insert_data1);

                         $caseid = $this->input->post('case_id');
			$courtid = $this->session->userdata('court_id');

			$latigants = $this->public->getAllCaseLitigant($this->input->post('case_id'));
			foreach ($latigants as $lats) {
				$latemail = $this->public->get_UserLatigantEmail($lats->litigant);
				$latname = $this->public->get_UserLatigantName($lats->litigant);
				$latno = $this->public->get_UserLatigantNumber($lats->litigant);
                $uid = $this->public->get_user_id($latemail);
				$message = 'Dear ' . $latname . ',<br />Thank you. Your Judgment has been rendered. Please Find the Judgment copy attached. <br />Please fill up the Feedack to help us serve you better.<br />https://cms.judiciary.gov.bt/index.php/welcome/feed_back/'.$uid.'/'.$caseid.'/'.$courtid.' <br /><br />Please help us to serve you better<br />Judiciary';
				$folder1 = "images/courtorder/";
				move_uploaded_file($_FILES["judgement_upload"]["tmp_name"], "$folder1" . $_FILES["judgement_upload"]["name"]);
				$this->load->library("email");
				$this->email->set_newline("\r\n");
				$this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
				$this->email->to($latemail);
				$this->email->subject('Judgment Copy');
				$this->email->message($message);

				$filename = $_FILES["judgement_upload"]["name"];
				$path = "images/courtorder/";
				$file = $path . "/$filename";
				$this->email->attach($file);
				$this->email->send();

				$tom = $latno;
				$mmsg = urlencode("judgment File has been sent to your email.");
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
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
			}

			$this->db->where('id', $this->input->post('case_id'));
			$update_data['status'] = 4;
			$this->db->update('sc_tbl_misc_case_info', $update_data);

			$this->db->where('misc_case_id', $this->input->post('case_id'));
			$update_data_elat['case_complete_status'] = 4;
			$this->db->update('elat_tbl_case_submission', $update_data_elat);

			$judges = $this->input->post('signed_by');

			for ($i = 0; $i < count($judges); $i++) {
				$insert_process['judgement_id'] = $insert_id;
				$insert_process['judge_id'] = $judges[$i];
				$insert_process['created_date'] = date('y-m-d');
				$this->db->insert('sc_tbl_judgement_signby', $insert_process);
			}

			$act_name = $this->input->post('act_name');
			$article = $this->input->post('article');
			$section = $this->input->post('section');
			$subsection = $this->input->post('subsection');

			for ($j = 0; $j < count($act_name); $j++) {
				$insert_process2['judgement_id'] = $insert_id;
				$insert_process2['Act_id'] = $act_name[$j];
				$insert_process2['ArticleChapter'] = $article[$j];
				$insert_process2['Section'] = $section[$j];
				$insert_process2['Subsection'] = $subsection[$j];
				$this->db->insert('sc_tbl_judgement_act', $insert_process2);
			}




			if (isset($_POST['sentenced'])) {

				$litagent = $this->input->post('litagent');
				$sentence_type = $this->input->post('sentence_type');
				$year = $this->input->post('year');
				$month = $this->input->post('month');
				$day = $this->input->post('day');
				$start_date = $this->input->post('start_date');
				$release_date = $this->input->post('release_date');
				$amount = $this->input->post('amount');
				$receipt_no = $this->input->post('receipt_no');


				for ($k = 0; $k < count($sentence_type); $k++) {
					$insert_process3['Judgement_id'] = $insert_id;
					$insert_process3['court_id'] = $this->session->userdata('court_id');
					$insert_process3['case_id'] = $this->input->post('case_id');
					$insert_process3['Litigant'] = $litagent[$k];
					$insert_process3['Sentence_type'] = $sentence_type[$k];


					if ($sentence_type[$k] == 7 || $sentence_type[$k] == 6 || $sentence_type[$k] == 10) {
						$insert_process3['Amount'] = $amount[$k];
						$insert_process3['Reciept'] = $receipt_no[$k];
					} elseif ($sentence_type[$k] == 8) {
					} elseif ($sentence_type[$k] == 9) {
						$insert_process3['Year'] = $year[$k];
						$insert_process3['Month'] = $month[$k];
						$insert_process3['Day'] = $day[$k];
						$insert_process3['Start_Date'] = $start_date[$k];
						$insert_process3['End_Date'] = $release_date[$k];
					}

					$this->db->insert('tbl_sc_judgement_sentence', $insert_process3);
				}
			}
		}
		if ($this->session->userdata('user_type') == '7') {
			redirect('registration/hybrid_dash');
		} else {
			redirect('registration/user_dashboard');
		}
	}

	function updateJP()
	{
		$cid = $this->input->post('caseid');
		$insert_data['case_id'] = $this->input->post('caseid');
		$insert_data['judicial_process_id'] = $this->input->post('jProcess');
		$insert_data['activity_date'] = $this->input->post('act_date');
		$insert_data['form_used_id'] = $this->input->post('formused');
		$this->db->insert('sc_tbl_case_activities', $insert_data);



		redirect('registration/view_rejected_case/' . $cid);
	}

	function updateSentence()
	{
		$cid = $this->input->post('caseid');
		$judID = $this->input->post('judgementID');
		$litagent = $this->input->post('litagent');
		$sentence_type = $this->input->post('sentence_type');
		$year = $this->input->post('year');
		$month = $this->input->post('month');
		$day = $this->input->post('day');
		$start_date = $this->input->post('start_date');
		$release_date = $this->input->post('release_date');
		$amount = $this->input->post('amount');
		$receipt_no = $this->input->post('receipt_no');

		$insert_process3['Judgement_id'] = $judID;
		$insert_process3['court_id'] = $this->session->userdata('court_id');
		$insert_process3['case_id'] = $this->input->post('caseid');
		$insert_process3['Litigant'] = $litagent;
		$insert_process3['Sentence_type'] = $sentence_type;


		if ($sentence_type == 7 || $sentence_type == 6 || $sentence_type == 10) {
			$insert_process3['Amount'] = $amount;
			$insert_process3['Reciept'] = $receipt_no;
		} elseif ($sentence_type == 8) {
		} elseif ($sentence_type == 9) {
			$insert_process3['Year'] = $year;
			$insert_process3['Month'] = $month;
			$insert_process3['Day'] = $day;
			$insert_process3['Start_Date'] = $start_date;
			$insert_process3['End_Date'] = $release_date;
		}

		$this->db->insert('tbl_sc_judgement_sentence', $insert_process3);
		redirect('registration/view_rejected_case/' . $cid);
	}

	function deleteSentence_1($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_sc_judgement_sentence');
		$this->db->where('id', $id);
		$result = $this->db->get()->row();
		$case_id = $result->case_id;
		$act_id = $this->session->flashdata('act_ids');
		$this->db->where('id', $id);
		$this->db->delete('tbl_sc_judgement_sentence');
		redirect('registration/view_rejected_case/' . $case_id);
	}



	function get_gewog()
	{
		$this->load->view('get_gewog');
	}

	function get_village()
	{
		$this->load->view('get_village');
	}


	function search_litigant()
	{
		$title = $this->input->post('value');
		$this->db->from('sc_tbl_litigant');
		$this->db->where('litigant_CID', $title);
		$this->db->or_where('license_id', $title);
		$this->db->or_where('Organization_Name', $title);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		if ($rowcount == '0') {
			echo "<strong>No Litigant Found with CID No:&nbsp;" . $title . "</strong>";
		} else {
			$liti = $this->_get_Litigant($title);
?>

			<?php
			$i = 1;
			foreach ($liti as $row) {
				if ($row->is_org != 1) {
					if ($i == 1) { ?>
						<table class="table table-bordered table-striped" style="float:left;">
							<thead>
								<th>Sl No</th>
								<th>Name</th>
								<th>CID / Passport / Work Permit No</th>
								<th>DoB</th>
								<th>Occupation</th>
								<th>Option</th>
							</thead>
							<tbody>
							<?php
						} ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row->litigant_name; ?></td>
								<td><?php echo $row->litigant_CID; ?></td>
								<td><?php echo $row->litigant_DOB; ?></td>
								<td><?php echo $row->occupation; ?></td>
								<td><a href="index.php/registration/edit_litigant/<?php echo $row->id; ?>">View / Edit</a></td>
							</tr>
							<?php
							$i++;
						}
					}
					echo "</tbody>";
					echo "</table>";


					$j = 1;
					foreach ($liti as $row) {
						if ($row->is_org == 1) {
							if ($j == 1) { ?>
								<table class="table table-bordered table-striped" style="float:left;">
									<thead>
										<th>Sl No</th>
										<th>Organization Name</th>
										<th>License #</th>
										<th>Code</th>
										<th>Address</th>
										<th>Option</th>
									</thead>
									<tbody>
									<?php
								} ?>
									<tr>
										<td><?php echo $j; ?></td>
										<td><?php echo $row->Organization_Name; ?></td>
										<td><?php echo $row->license_id; ?></td>
										<td><?php echo $row->org_code; ?></td>
										<td><?php echo $row->litigant_current_address; ?></td>
										<td><a href="index.php/registration/edit_litigant_org/<?php echo $row->id; ?>">View / Edit</a></td>
									</tr>
								<?php
								$j++;
							}
						}
						echo "</tbody>";
						echo "</table>";
					}
				}

				function edit_litigant($id)
				{
					$data['litigant_types'] = $this->public->get_litigant_type();
					$data['dzongkhag'] = $this->public->get_dzongkhag();
					$data['dungkhag'] = $this->public->get_dungkhag();
					$litigant = $this->public->get_single_row('sc_tbl_litigant', $id);
					$data['id'] = $litigant->id;

					$data['litigant_name'] = $litigant->litigant_name;
					$data['litigant_nationality'] = $litigant->litigant_nationality;
					$data['litigant_CID'] = $litigant->litigant_CID;
					$data['occupation'] = $litigant->occupation;
					$data['litigant_gender'] = $litigant->litigant_gender;
					$data['litigant_DOB'] = $litigant->litigant_DOB;
					$data['litigant_age'] = $litigant->litigant_age;
					$data['litigant_house_no'] = $litigant->litigant_house_no;
					$data['litigant_thram_no'] = $litigant->litigant_thram_no;
					$data['litigant_dzongkhag'] = $litigant->litigant_dzongkhag;
					$data['litigant_dungkhag'] = $litigant->litigant_dungkhag;
					$data['litigant_gewog'] = $litigant->litigant_gewog;
					$data['litigant_village'] = $litigant->litigant_village;
					$data['litigant_father'] = $litigant->litigant_father;
					$data['litigant_phone'] = $litigant->litigant_phone;
					$data['litigant_email'] = $litigant->litigant_email;
					$data['litigant_current_address'] = $litigant->litigant_current_address;
					$this->load->view('header');
					$this->load->view('edit_litigant', $data);
					$this->load->view('footer');
				}
				function edit_litigant_org($id)
				{
					$data['litigant_types'] = $this->public->get_litigant_type();
					$data['dzongkhag'] = $this->public->get_dzongkhag();
					$data['dungkhag'] = $this->public->get_dungkhag();
					$litigant = $this->public->get_single_row('sc_tbl_litigant', $id);
					$data['id'] = $litigant->id;

					$data['org_name'] = $litigant->Organization_Name;
					$data['org_code'] = $litigant->org_code;
					$data['License_no'] = $litigant->license_id;
					$data['litigant_current_address'] = $litigant->litigant_current_address;

					$data['pobox'] = $litigant->org_pobox;
					$data['org_fax'] = $litigant->org_fax;
					$data['org_pno'] = $litigant->org_pno;

					$data['contact_name'] = $litigant->litigant_name;
					$data['litigant_phone'] = $litigant->litigant_phone;
					$data['litigant_email'] = $litigant->litigant_email;
					$data['contact_desg'] = $litigant->occupation;

					$this->load->view('header');
					$this->load->view('edit_litigant_org', $data);
					$this->load->view('footer');
				}
				function search_case()
				{
					$title = $this->input->post('value');
					if ($this->public->count_no_fields('sc_tbl_misc_case_info', 'reg_no', $title) == '0') {
						echo "<tr><td colspan=7>No Record Found with Registration Case No:&nbsp;" . $title . "</td></tr>";
					} else {
						$case = $this->_get_Reg_Case($title);
						$i = 1;
						foreach ($case as $reg) :
								?>

								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $reg->reg_no; ?></td>
									<td><?php echo $reg->reg_date; ?></td>
									<td><?php echo $reg->case_title; ?></td>

									<td><?php
										$qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg->id'");
										$fields2 = $qryFrm2->result();
										$cnt = count($qryFrm2->result());
										if ($cnt == 0) {
											echo "<span style='color:#F30'>No Litigant Added</span>" . "<br />";
										} else {
											foreach ($fields2 as $lll) {
												if ($lll->litigant_type == '14' || $lll->litigant_type == '15') {
													if ($this->public->checkLit($lll->litigant) == 'yes') {
										?>
														<div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
															<?php
															echo "<span title='" . $this->public->get_LitigantType($lll->litigant_type) . "'>" . $this->public->get_OrgName($lll->litigant) . "</span>";

															?>
														</div>
													<?php
													} else {

													?>
														<div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
															<?php
															echo "<span title='" . $this->public->get_LitigantType($lll->litigant_type) . "'>" . $this->public->get_ApplicantName($lll->litigant) . "</span>";

															?>
														</div>
										<?php
													}
												}
											}
										}
										?>
									</td>


									<td><?php
										$qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$reg->id'");
										$fields2 = $qryFrm2->result();
										$cnt = count($qryFrm2->result());
										if ($cnt == 0) {
											echo "<span style='color:#F30'>No Litigant Added</span>" . "<br />";
										} else {
											foreach ($fields2 as $lll) {
												if ($lll->litigant_type == '18' || $lll->litigant_type == '16') {
													if ($this->public->checkLit($lll->litigant) == 'yes') {
										?>
														<div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
															<?php
															echo "<span title='" . $this->public->get_LitigantType($lll->litigant_type) . "'>" . $this->public->get_OrgName($lll->litigant) . "</span>";

															?>
														</div>
													<?php
													} else {

													?>
														<div style="width:100%; padding:3px; font-size:12px; margin-bottom:3px;">
															<?php
															echo "<span title='" . $this->public->get_LitigantType($lll->litigant_type) . "'>" . $this->public->get_ApplicantName($lll->litigant) . "</span>";

															?>
														</div>
										<?php
													}
												}
											}
										}
										?>
									</td>



									<td><?php echo $this->public->getBenchName($reg->bench); ?></td>
									<td>
										<?php

										if ($reg->status == 1) {
											echo "<font color=#0099ff>Registered Case</font>";
										}
										if ($reg->status == 2) {
											if ($reg->clerk == '')
												echo "<font color=#0099ff>Assign Clerk</font>";
											else
												echo "<font color=#0099ff>Assigned to &nbsp;(" . $this->public->get_UserName($reg->clerk) . ")</font>";
										}
										if ($reg->status == 3 && $reg->updatedby != $this->session->userdata('user_id')) {
											if ($reg->clerk == '')
												echo "<font color=#0099ff>Active &nbsp;(Clerk Not Assigned)</font>";
											else
												echo "<font color=#0099ff>Active &nbsp;( Case Handeled By " . $this->public->get_UserName($reg->clerk) . ")</font>";
										}
										if ($reg->status == 3 && $reg->updatedby == $this->session->userdata('user_id')) {
											echo "<font color=#0099ff>Active</font>";
										}
										if ($reg->status == 4) {
											echo "<font color=#0099ff>Case Closed</font>";
										}
										if ($reg->status == 5) {
											echo "<font color=#0099ff>Case Appealed</font>";
										}
										?>
									</td>
									<td>
										<?php if ($reg->status == 1) { ?>
											<a href="index.php/registration/edit_registration/<?php echo $reg->id; ?>" title="Edit"><i class="fa fa-pencil"></i> Assign</a>
										<?php } ?>
										<a href="<?php echo site_url('registration/view_case/' . $reg->id); ?>"> <i class="fa fa-camera"></i> View</a>
									</td>

								</tr>
							<?php
						endforeach;
					}
				}



				function search_case_clerk()
				{
					$title = $this->input->post('value');
					$court_id = $this->session->userdata('court_id');
					if ($this->public->count_no_fields('sc_tbl_misc_case_info', 'misc_case_no', $title) == '0') {
						echo "<tr><td colspan=8>No Record Found with Misc Case No:&nbsp;" . $title . "</td></tr>";
					} else {
						$case = $this->_get_Misc_Case($title);
						$i = 1;
						foreach ($case as $row) :
							echo "<tr>";
							echo "<td>" . $i . "</td>";
							echo "<td>" . $row->misc_case_no . "</td>";
							echo "<td>" . $this->public->get_MiscCaseType($row->casetypelevel3_id) . "</td>";
							echo "<td>" . $this->public->get_ApplicantName($row->applicant_id) . "</td>";
							echo "<td>" . $row->updated_on . "</td>";
							?>
								<td>
									<?php
									if ($row->status == 2) {
										echo "<font color=#0099ff>New Case</font>";
									}
									if ($row->status == 3) {
										echo "<font color=#0099ff>Active</font>";
									}
									if ($row->status == 4) {
										echo "<font color=#0099ff>Case Closed</font>";
									}
									?>
								</td>
								<td><a href="index.php/registration/view_case/<?php echo $row->id; ?>" title="View"><i class="fa fa-camera"></i> View</a></td>
								<td><a href="#">Insert Case Activities</a></td>
							<?php
							echo "</tr>";
							$i++;
						endforeach;
					}
				}

				function search_appealingcase()
				{
					$title = $this->input->post('value');
					$case = $this->_get_judgementCaseNo($title);
					if ($case) {
						$i = 1;
						foreach ($case as $appreg) {


							?>
								<tr><?php $case_id = $appreg->id; ?>
									<td><?php echo $i++; ?> </td>
									<td><?php echo $appreg->reg_no; ?> </td>
									<td><?php echo $appreg->reg_date; ?></td>
									<td><?php echo $appreg->judgement_no; ?></td>
									<td><?php echo $appreg->judgement_date; ?></td>
									<td><?php echo $this->public->get_UserName($appreg->clerk); ?></td>
									<td><?php echo $this->public->getLevel3Name($appreg->case_type_id); ?></td>
									<td><?php
										$qryFrm2 = $this->db->query("select * from sc_tbl_registration_litigant where caseID='$appreg->id'");
										$fields2 = $qryFrm2->result();
										foreach ($fields2 as $lll) {
											echo "-&nbsp;" . $this->public->get_ApplicantName($lll->litigant) . "<br />";
										}
										?></td>

									<td align="center">

										<?php
										if ($appreg->status != 5) {
											if ($this->session->userdata('user_type') == 3  && $this->session->userdata('court_type') != '1' || $this->session->userdata('user_type') == 4 && $this->session->userdata('court_type') != '1') { ?>
												<a href="index.php/registration/appeal_request/<?php echo $appreg->id; ?>" class="css_btn_class" style="padding:5px; ">Appeal</a><br /><br>
												<?php }
										} ?>&nbsp;&nbsp;
												<a href="<?php echo site_url('registration/view_case/' . $case_id); ?>" class="css_btn_class" style="padding:5px;">View</a>
									</td>
								</tr>
							<?php }
					} else {
						echo '<tr><td colspan="9"><h4>No Result Found!</h4></td></tr>';
					}
				}

				function searchLitigantCase()
				{
					$title = $this->input->post('value');
					$data['case'] = $this->_get_caseLitigant($title);
					$this->load->view('minLitigantCase', $data);
				}



				function _check_CID($cid)
				{
					$child = 'duplicate';
					$row = $this->public->count_row('sc_tbl_litigant', 'litigant_CID', $cid);
					if ($row == 0) {
						$child = 'single';
					}
					return $child;
				}

				function _get_caseNo($title = '')

				{
					$court_id = $this->session->userdata('court_id');
					$str = "select reg.id as id,reg.reg_no as reg_no, reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.case_title as case_title,reg.application_date as app_date,jud.judgement_date as judge_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
      where (reg.status=4 or reg.status=5 ) AND ( reg.misc_case_no='$title' OR reg.reg_no='$title' OR reg.case_title) AND reg.court_id='$court_id' order by reg.created_on desc";
					$query =  $this->db->query($str);
					$result = $query->result();
					return $result;
				}


				function _get_judgementCaseNo($title = '')

				{
					$court_id = $this->session->userdata('court_id');

					$str = "select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as case_title,reg.application_date as app_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where (reg.status=4 or reg.status=5 ) and jud.judgement_no='$title' AND reg.court_id='$court_id' order by reg.created_on desc";
					$query =  $this->db->query($str);
					$result = $query->result();
					return $result;
				}


				function _get_caseLitigant($title = '')

				{
					$court_id = $this->session->userdata('court_id');
					$str = "select reg.id as id,reg.reg_date as reg_date,reg.clerk as clerk,reg.reg_no as reg_no,reg.court_id as court_id, reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.misc_case_no as mcase_no, reg.status as status, reg.registration_status as registration_status, reg.case_title as case_title,reg.application_date as app_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_registration_litigant as rlit on reg.id = rlit.caseID
	  left join sc_tbl_litigant as lit on rlit.litigant = lit.id 
      where lit.litigant_CID='$title' order by reg.created_on desc";
					$query =  $this->db->query($str);
					$result = $query->result();
					return $result;
				}


				function _get_Litigant($title = '')

				{

					$this->db->select('*');
					$this->db->where('litigant_CID', $title);
					$this->db->or_where('license_id', $title);
					$this->db->or_where('Organization_Name', $title);
					$this->db->from('sc_tbl_litigant');
					$query = $this->db->get();
					return $query->result();
				}

				function _get_Misc_Case($title = '')

				{

					$this->db->select('*');
					$this->db->from('sc_tbl_misc_case_info');
					$this->db->where('misc_case_no', $title);
					$query = $this->db->get();
					return $query->result();
				}

				function _get_Reg_Case($title = '')
				{

					$this->db->select('*');
					$this->db->from('sc_tbl_misc_case_info');
					$this->db->where('reg_no', $title);
					$query = $this->db->get();
					return $query->result();
				}

				function collection_view()
				{
					$data['collections'] = $this->public->get_all_collection();
					$this->load->view('header');
					$this->load->view('collection_view', $data);
					$this->load->view('footer');
				}
				function insert_collection()
				{
					if ($this->input->post()) {
						$insert_data['court_id'] = $this->session->userdata('court_id');
						$insert_data['case_no'] = $this->input->post('case_no');
						$insert_data['collection_type'] = $this->input->post('coll_type');
						$insert_data['payer'] = $this->input->post('litigant');
						$insert_data['amount'] = $this->input->post('amount');
						$insert_data['receipt_no'] = $this->input->post('receipt_no');
						$insert_data['receipt_date'] = $this->input->post('receipt_date');
						$this->db->insert('sc_tbl_collection', $insert_data);
					}
					redirect('registration/collection_view');
				}

				function update_collection()
				{
					if ($this->input->post()) {
						$this->db->where('id', $this->input->post('id'));
						$update_data['case_no'] = $this->input->post('case_no');
						$update_data['collection_type'] = $this->input->post('coll_type');
						$update_data['payer'] = $this->input->post('litigant');
						$update_data['amount'] = $this->input->post('amount');
						$update_data['receipt_no'] = $this->input->post('receipt_no');
						$update_data['receipt_date'] = $this->input->post('receipt_date');
						$this->db->update('sc_tbl_collection', $update_data);
					}
					redirect('registration/collection_view');
				}

				function edit_collection($id)
				{
					$data['litigants'] = $this->public->get_litigant();
					$coll = $this->public->get_single_row('sc_tbl_collection', $id);
					$data['case_no'] = $coll->case_no;
					$data['id'] = $coll->id;
					$data['collection_type'] = $coll->collection_type;
					$data['payer'] = $coll->payer;
					$data['amount'] = $coll->amount;
					$data['receipt_no'] = $coll->receipt_no;
					$data['receipt_date'] = $coll->receipt_date;
					$this->load->view('header');
					$this->load->view('collection_edit', $data);
					$this->load->view('footer');
				}

				function miscellaneous_activities()
				{
					$data['judges'] = $this->public->get_hearing_judge();
					$data['benches'] = $this->public->get_benches();
					if (isset($_REQUEST['applicant_id'])) {
						$data['applicant_id'] = $_REQUEST['applicant_id'];
					}
					$data['miscellaneous_activity_type'] = $this->public->get_MiscellaneousActivities();

					$this->load->view('header');
					$this->load->view('miscellaneous_activities', $data);
					$this->load->view('footer');
				}

				function search_applicant()
				{
					$title = $this->input->post('value');
					if (!($this->public->count_no_fields('sc_tbl_litigant', 'litigant_CID', $title) or $this->public->count_no_fields('sc_tbl_litigant', 'litigant_name', $title))) {
						echo "<table id='main-body' class='table table-bordered '><tr><td><strong>No Record Found</strong><input type=hidden name=liti_id id=liti_id value=></td><td>&nbsp;&nbsp;<a href=index.php/registration/add_litigant target=new><font color=#0099ff>Add New</font></a></td><tr></table>";
					} else {
						$case = $this->_get_Litigant_CID($title);
						$i = 0; ?>
							<table id='main-body' class='table table-bordered'>
								<tr>
									<th>Sl no</th>
									<th>Lititgant Name</th>
									<th>Lititgant CID</th>
									<th>Action</th>
								</tr>
								<?php
								foreach ($case as $row) :
									echo "<tr id='select_applicant'>";
									echo "<td>" . $i . "</td><td> " . $row->litigant_name . "<input type=hidden name=liti_id id=liti_id value=" . $row->id . "></td>
			<td>" . $row->litigant_CID . "</td>" . "<td><a href='index.php/registration/miscellaneous_activities?applicant_id=" . $row->id . "'>Add</a></td>";
									$i++;
								endforeach;
								?>
								</tr>
							</table>
							<?php
						}
					}
					function add_miscellaneous()
					{

						$aid = $this->input->post('applicant_id');
						$insert_data['court_id'] = $this->session->userdata('court_id');
						$insert_data['bench_id'] = $this->input->post('bench');
						$insert_data['misc_activity_type_id'] = $this->input->post('miscellaneous_activity_type');
						$insert_data['misc_no'] = $this->input->post('miscellaneous_no');
						$insert_data['application_date'] = $this->input->post('application_date');
						$insert_data['case_title'] = $this->input->post('case_title');
						$insert_data['misc_hearing_date'] = $this->input->post('miscellaneous_hearing');
						$insert_data['hearing_judge'] = $this->input->post('hearing_judge');
						$insert_data['status'] = $this->input->post('approve');
						$insert_data['applicant_id'] = $aid;
						$insert_data['order_no'] = $this->input->post('order_no');
						$insert_data['order_date'] = $this->input->post('order_date');
						$insert_data['remarks'] = $this->input->post('remarks');
						$insert_data['created_by'] = $this->session->userdata('user_id');
						$insert_data['created_on'] = date('y-m-d');

						if ($this->db->insert('tbl_misc_activity', $insert_data)) {
							$misc_no = $this->input->post('miscellaneous_no');
							$data['miscellaneous'] = $this->public->get_miscellaneous_activity($misc_no);
							$this->load->view('header');
							$this->load->view('view_miscellaneous', $data);
							$this->load->view('footer');
							//redirect('registration/view_miscellaneous',$misc_no);
						} else {
							echo "Not inserted the data to the database";
						}
					}

					function view_miscellaneous()
					{
						$misc_no = $this->input->post('search_any');
						$data['miscellaneous'] = $this->public->get_miscellaneous_activity($misc_no);

						$this->load->view('header');
						$this->load->view('view_miscellaneous', $data);
						$this->load->view('footer');
					}

					function search_lititgant_by_cid()
					{
						$title = $this->input->post('value');
						$check = $this->input->post('schk');
						if ($check == 'ind') {
							if ($this->public->count_no_fields1('sc_tbl_litigant', 'litigant_CID', 'litigant_name', $title) == '0') {
								echo "<table id='main-body' class='table table-bordered '><tr><td><strong>No Record Found</strong><input type=hidden name=liti_id id=liti_id value=></td><td>&nbsp;&nbsp;<a href=index.php/registration/add_litigant target=new><font color=#0099ff>Add New</font></a></td><tr></table>";
							} else {
								$case = $this->_get_Litigant_CID($title);
								$i = 0;
								foreach ($case as $row) :
									echo "<table id='main-body' class='table table-bordered'><tr><td> Name:</td><td> " . $row->litigant_name . "<input type=hidden name=liti_id id=liti_id value=" . $row->id . "></td></tr><tr><td> CID:</td><td>" . $row->litigant_CID . "</td></tr><tr><td>Type:</td><td>";
									$liti_type = $this->public->get_litigant_type();
							?>

									<select name="liti_type" id="liti_type">
										<option value="0">Select Litigant Type</option>
										<?php foreach ($liti_type as $litype) { ?>
											<option value="<?php echo $litype->id; ?>"><?php echo $litype->litigant_type; ?></option>
										<?php } ?>
									</select>
								<?php
									echo "</td></tr><tr><td colspan='2' style='display:none;'> <a href=index.php/registration/add_litigant target=new><font color=#0099ff>Add New</font></a></td></tr></table>";

								endforeach;
							}
						}
						if ($check == 'org') {
							if ($this->public->count_no_fields1('sc_tbl_litigant', 'Organization_Name', 'license_id', $title) == '0') {
								echo "<table id='main-body' class='table table-bordered '><tr><td><strong>No Record Found</strong><input type=hidden name=liti_id id=liti_id value=></td><td>&nbsp;&nbsp;<a href='index.php/registration/add_new_ligitant' target='new'><font color=#0099ff>Add New</font></a></td><tr></table>";
							} else {
								$case = $this->_get_Litigant_Org($title);
								$i = 0;
								foreach ($case as $row) :
									echo "<table id='main-body' class='table table-bordered'><tr><td> Name:</td><td> " . $row->Organization_Name . "<input type=hidden name=liti_id id=liti_id value=" . $row->id . "></td></tr><tr><td> License No:</td><td>" . $row->license_id . "</td></tr><tr><td>Type:</td><td>";
									$liti_type = $this->public->get_litigant_type();
								?>

									<select name="liti_type" id="liti_type">
										<option value="0">Select Litigant Type</option>
										<?php foreach ($liti_type as $litype) { ?>
											<option value="<?php echo $litype->id; ?>"><?php echo $litype->litigant_type; ?></option>
										<?php } ?>
									</select>
							<?php
									echo "</td></tr><tr><td colspan='2' style='display:none;'> <input type='submit' class='btn btn-primary pull-right' value='Add'></td></tr></table>";

								endforeach;
							}
						}
					}

					function _get_Litigant_CID($title = '')

					{
						$this->db->select('*');
						$this->db->from('sc_tbl_litigant');
						$this->db->where('litigant_CID', $title);
						$this->db->or_where('litigant_name', $title);
						$query = $this->db->get();
						return $query->result();
					}

					function _get_Litigant_Org($title = '')

					{
						$this->db->select('*');
						$this->db->from('sc_tbl_litigant');
						$this->db->where('Organization_Name', $title);
						$this->db->or_where('license_id', $title);
						$query = $this->db->get();
						return $query->result();
					}

					function insert_liti_id()
					{
						$this->public->temp_LitiID_save();
						$data['temp_litiID'] = $this->public->get_temp_litigantID();
						$this->load->view('temp_litigantName', $data);
					}

					function insert_liti_id_elat()
					{
						//$this->public->temp_LitiID_save_elat();
						//$data['temp_litiID_elat'] = $this->public->get_temp_litigantID_elat();			
						// $this->load->view('temp_litigantName_elat', $data);

					}

					function delete_temp_LitiID()
					{
						$id = $this->input->post('id');
						$this->db->delete('sc_temp_litigant', array('id' => $id));
						$data['temp_litiID'] = $this->public->get_temp_litigantID();
						$this->load->view('temp_litigantName', $data);
					}


					function delete_temp_Lawyer()
					{
						$id = $this->input->post('id');
						$this->db->delete('sc_tbl_temp_lawyer_link', array('id' => $id));
						$this->load->view('lawyerRegForm');
					}


					function add_organization()
					{

						if ($this->input->post()) {
							$insert_data['litigant_name'] = $this->input->post('org_name');
							$insert_data['litigant_CID'] = $this->input->post('org_id');
							$insert_data['org_name'] = $this->input->post('org_organization');
							$insert_data['litigant_phone'] = $this->input->post('org_phone');
							$insert_data['litigant_fax'] = $this->input->post('org_fax');
							$insert_data['litigant_current_address'] = $this->input->post('org_address');
							$this->db->insert('sc_tbl_litigant', $insert_data);
							$this->session->set_flashdata('asset_class', 'success');
							$this->session->set_flashdata('asset_msg', 'New Litigant Added added successfully.');
						}

						redirect('registration/add_litigant');
					}

					function get_bench_clerk()
					{
						$this->load->view('get_bench_clerk');
					}

					function add_new_ligitant()
					{
						$data['litigant_types'] = $this->public->get_litigant_type();
						$data['dzongkhag'] = $this->public->get_dzongkhag();
						$data['dungkhag'] = $this->public->get_dungkhag();
						$this->load->view('header');
						$this->load->view('litigant', $data);
						$this->load->view('footer');
					}

					function add_new_ligitant_CaseAct($id)
					{
						$data['litigant_types'] = $this->public->get_litigant_type();
						$data['dzongkhag'] = $this->public->get_dzongkhag();
						$data['dungkhag'] = $this->public->get_dungkhag();
						$data['case_id'] = $id;
						$this->load->view('header');
						$this->load->view('add_litigant_CaseAct', $data);
						$this->load->view('footer');
					}

					function add_new_litigant_reg()
					{
						if ($this->input->post()) {
							if ($this->public->count_no_fields('sc_tbl_litigant', 'litigant_CID', $this->input->post('cid')) != '0') {
								$this->session->set_flashdata('asset_class', 'failure');
								$this->session->set_flashdata('asset_msg', 'The Litigant with this CID already exists.');
							} else {

								$insert_data['litigant_name'] = $this->input->post('Name');
								$insert_data['litigant_nationality'] = $this->input->post('Nationality');
								$insert_data['litigant_CID'] = $this->input->post('cid');
								$insert_data['occupation'] = $this->input->post('occupation');
								$insert_data['litigant_gender'] = $this->input->post('gender');
								$insert_data['litigant_DOB'] = $this->input->post('dob');
								$insert_data['litigant_age'] = $this->input->post('age');
								$insert_data['litigant_house_no'] = $this->input->post('house_no');
								$insert_data['litigant_thram_no'] = $this->input->post('tharm_no');
								$insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
								$insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
								$insert_data['litigant_gewog'] = $this->input->post('gewog');
								$insert_data['litigant_village'] = $this->input->post('village');
								$insert_data['litigant_father'] = $this->input->post('fatherName');
								$insert_data['litigant_phone'] = $this->input->post('phone');
								$insert_data['litigant_email'] = $this->input->post('email');
								$insert_data['litigant_current_address'] = $this->input->post('address');
								$this->db->insert('sc_tbl_litigant', $insert_data);
								$insert_id = $this->db->insert_id();
							}
							$insert_liti['litigant'] = $insert_id;
							$insert_liti['litigant_type'] = $this->input->post('litigant_type');
							$insert_liti['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('sc_temp_litigant', $insert_liti);
						}
						redirect('registration/insert_registration');
					}

					function update_caseType3()
					{
						$id = $this->input->post('CasseID');
						$this->db->where('id', $id);
						$update_data['casetypelevel3_id'] = $this->input->post('case_type3');
						$this->db->update('sc_tbl_misc_case_info', $update_data);
						redirect('registration/case_activity/' . $id);
					}

					function search_lititgant_caseAct()
					{
						$title = $this->input->post('value');
						$title1 = $this->input->post('value1');

						if ($this->public->count_no_fields1('sc_tbl_litigant', 'litigant_CID', 'litigant_name', $title) == '0') {
							echo "<td><strong>No Record Found</strong><input type=hidden name=liti_id id=liti_id value=></td><td>&nbsp;&nbsp;"
							?>

							<a href="index.php/registration/add_new_ligitant_CaseAct/<?php echo $title1; ?>" target="new">
								<font color="#0099ff">Add New</font>
							</a></td>
							<?php
						} else {
							$case = $this->_get_Litigant_CID($title);
							foreach ($case as $row) :
								echo "<td colspan=2>" . $row->litigant_name . "<input type=hidden name=liti_id id=liti_id value=" . $row->id . ">";
								$liti_type = $this->public->get_litigant_type();
							?>

								<select name="liti_type" id="liti_type">
									<option value="0">Select Litigant Type</option>
									<?php foreach ($liti_type as $litype) { ?>
										<option value="<?php echo $litype->id; ?>"><?php echo $litype->litigant_type; ?></option>
									<?php } ?>
								</select>
								<?php
								echo "</td>";
								?>
							<?php
							endforeach;
						}
					}


					function add_new_litigant_CaseAct()
					{
						if ($this->input->post()) {
							if ($this->public->count_no_fields('sc_tbl_litigant', 'litigant_CID', $this->input->post('cid')) != '0') {
								$this->session->set_flashdata('asset_class', 'failure');
								$this->session->set_flashdata('asset_msg', 'The Litigant with this CID already exists.');
							} else {

								$insert_data['litigant_name'] = $this->input->post('Name');
								$insert_data['litigant_nationality'] = $this->input->post('Nationality');
								$insert_data['litigant_CID'] = $this->input->post('cid');
								$insert_data['occupation'] = $this->input->post('occupation');
								$insert_data['litigant_gender'] = $this->input->post('gender');
								$insert_data['litigant_DOB'] = $this->input->post('dob');
								$insert_data['litigant_age'] = $this->input->post('age');
								$insert_data['litigant_house_no'] = $this->input->post('house_no');
								$insert_data['litigant_thram_no'] = $this->input->post('tharm_no');
								$insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
								$insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
								$insert_data['litigant_gewog'] = $this->input->post('gewog');
								$insert_data['litigant_village'] = $this->input->post('village');
								$insert_data['litigant_father'] = $this->input->post('fatherName');
								$insert_data['litigant_phone'] = $this->input->post('phone');
								$insert_data['litigant_email'] = $this->input->post('email');
								$insert_data['litigant_current_address'] = $this->input->post('address');
								$this->db->insert('sc_tbl_litigant', $insert_data);
								$insert_id = $this->db->insert_id();
							}
							$insert_liti['litigant'] = $insert_id;
							$insert_liti['litigant_type'] = $this->input->post('litigant_type');
							$insert_liti['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('sc_temp_litigant', $insert_liti);
						}
						$CaseID = $this->input->post('CaID');
						redirect('registration/insert_case_activity/' . $CaseID);
					}


					function search_by_registry()
					{
						$title = $this->input->post('value');
						$data['cases'] = $this->_get_allTitle($title);
						$this->load->view('searchedCases', $data);
					}

					function hybrid_case_search()
					{
						$title = $this->input->post('value');
						$data['cases'] = $this->_get_allTitle($title);
						$court_id = $this->session->userdata('court_id');
						$str = "select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as case_title,reg.application_date as app_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where (reg.status=4 or reg.status=5 ) and jud.judgement_no='$title' AND reg.court_id='$court_id' order by reg.created_on desc";
						$query =  $this->db->query($str);
						$data['cases'] = $query->result();
						$this->load->view('hybridSearch', $data);
					}

					function _get_allTitle($title)
					{
						$court_id = $this->session->userdata('court_id');
						$str = "select * from sc_tbl_misc_case_info
      where (misc_case_no='$title' OR case_title='$title' OR reg_no='$title') AND court_id='$court_id'";
						$query =  $this->db->query($str);
						$result = $query->result();
						return $result;
					}


					function DecidedCase_search()
					{
						$title = $this->input->post('value');
						$data['cases'] = $this->_get_allTitle($title);

						$court_id = $this->session->userdata('court_id');
						$str = "select reg.id as id,reg.reg_no as reg_no,reg.reg_date as reg_date,reg.clerk as clerk,clink.case_type_id as case_type_id,jud.judgement_no as judgement_no,jud.judgement_date as judgement_date,reg.misc_case_no as mcase_no,reg.applicant_id as applicant_id, reg.status as status, reg.case_title as case_title,reg.application_date as app_date from sc_tbl_misc_case_info as reg
   	  left join sc_tbl_judgement as jud on reg.id = jud.case_id 
	  left join sc_tbl_case_casetype_link as clink on clink.case_id = reg.id 
      where (reg.status=4 or reg.status=5 ) and jud.judgement_no='$title' AND reg.court_id='$court_id' order by reg.created_on desc";

						$query =  $this->db->query($str);
						$data['cases'] = $query->result();

						$this->load->view('SearchClosedCase', $data);
					}

					function case_search()
					{
						$title = $this->input->post('value');
						$Case = $this->_get_cases($title);
						if ($Case) {
							$i = 1;
							foreach ($Case as $row) :
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php if ($row->court_id == 0 || $row->court_id == "") {
										} else {
											echo $this->public->get_CourtName($row->court_id);
										} ?></td>
									<td><?php echo $row->misc_case_no; ?></td>
									<td><?php echo $row->reg_no; ?></td>
									<td><?php echo $row->reg_date; ?></td>
									<td><?php echo $row->case_title; ?></td>
									<td>
										<?php
										if ($row->status == 2) {
											echo "<font color=#0099ff>Case Registered</font>";
										}
										if ($row->status == 3) {
											echo "<font color=#0099ff>Active</font>";
										}
										if ($row->status == 4) {
											echo "<font color=#0099ff>Case Closed</font>";
										}
										if ($row->status == 5) {
											echo "<font color=#0099ff>Case Appealed</font>";
										}
										?>
									</td>
									<td><a href="index.php/registration/view_case/<?php echo $row->id; ?>" title="View"><i class="fa fa-camera"></i>View</a></td>
									<td>
										<?php
										if ($row->status == 1 && $row->approved == 1 && $row->reject != 1) {
											echo "<font color=#009933>Approved</font>";
										}
										if ($row->status == 1 && $row->approved == 1 && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 1 && $row->approved == "" && $row->reject != 1) {
											echo "<font color=#990000>Not Approved</font>";
										}
										if ($row->status == 1 && $row->approved == "" && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 2 && $row->approved == 1 && $row->reject != 1) {
											echo "<font color=#009933>Approved</font>";
										}
										if ($row->status == 2 && $row->approved == 1 && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 2 && $row->approved == "" && $row->reject != 1) {
											echo "<font color=#990000>Not Approved</font>";
										}
										if ($row->status == 2 && $row->approved == "" && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 3 && $row->approved == 1) {
										}
										if ($row->status == 3 && $row->approved == "") {
										}
										if ($row->status == 4 && $row->c_approved == 1 && $row->reject != 1) {
											echo "<font color=#009933>Approved</font>";
										}
										if ($row->status == 4 && $row->c_approved == 1 && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 4 && $row->c_approved == "" && $row->reject != 1) {
											echo "<font color=#990000>Not Approved</font>";
										}
										if ($row->status == 4 && $row->c_approved == "" && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 5 && $row->a_approved == 1 && $row->reject != 1) {
											echo "<font color=#009933>Approved</font>";
										}
										if ($row->status == 5 && $row->a_approved == 1 && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										if ($row->status == 5 && $row->a_approved == "" && $row->reject != 1) {
											echo "<font color=#990000>Not Approved</font>";
										}
										if ($row->status == 5 && $row->a_approved == "" && $row->reject == 1) {
											echo "<font color=#ff0000>Rejected</font>";
										}
										?>
									</td>

								</tr>
						<?php
								$i++;
							endforeach;
						} else {
							echo '<tr><td colspan="6" align="center">No Result Found!</td></tr>';
						}
					}

					function incase_activity($cid = '')
					{

						if (isset($_POST['submit'])) {
							$registration  = $this->input->post('registration');
							$dismiss = $this->input->post('dismiss');
							$remand = $this->input->post('remand');
							$withdraw = $this->input->post('withdraw');


							$reg_no = $this->input->post('registration_no');
							$reg_date = $this->input->post('registration_date');

							$dismissal_no = $this->input->post('order_no');
							$dismissal_date = $this->input->post('order_date');

							if ($registration == 1) {
								$update = array(
									'registration_status' => $registration,
									'reg_date' => $reg_date,
									'reg_no' => $reg_no
								);
								$this->db->where('id', $cid);
								$this->db->update('sc_tbl_misc_case_info', $update);
							}
							if ($dismiss == 2) {
								$update = array(
									'registration_status' => $dismiss,
									'dismissal_no' => $dismissal_no,
									'dismissal_date' => $dismissal_date
								);
								$this->db->where('id', $cid);
								$this->db->update('sc_tbl_misc_case_info', $update);
							}

							if ($remand == 3) {
								$update = array(
									'registration_status' => $remand,
									'dismissal_no' => $dismissal_no,
									'dismissal_date' => $dismissal_date
								);
								$this->db->where('id', $cid);
								$this->db->update('sc_tbl_misc_case_info', $update);
							}
							if ($withdraw == 4) {
								$update = array(
									'registration_status' => $withdraw,
									'dismissal_no' => $dismissal_no,
									'dismissal_date' => $dismissal_date
								);
								$this->db->where('id', $cid);
								$this->db->update('sc_tbl_misc_case_info', $update);
							}
						}

						$data['registration'] = $this->public->get_incase();
						$data['appeal_registration'] = $this->public->get_appealling_registration();

						$this->load->view('header');
						$this->load->view('incase_view', $data);
						$this->load->view('footer');
					}

					function getFilter2()
					{
						$this->load->view('caselevel/level2');
					}
					function getFilter3()
					{
						$this->load->view('caselevel/level3');
					}
					function getFilter22()
					{
						$this->load->view('caselevel/level22');
					}
					function getFilter23()
					{
						$this->load->view('caselevel/level23');
					}
					function updateCaseInfo()
					{
						$judge = $this->input->post('judge');
						$cid = $this->input->post('caseid');
						$ctype = $this->input->post('level2');
						$this->public->updateInfoCase($cid, $judge, $ctype);
						redirect('registration/case_activity/' . $cid);
					}

					function updateCaseType()
					{
						$other = $this->input->post('othercl3');
						$cl3 = $this->input->post('level3');
						if ($other == '') {
							$ctype = $cl3;
						} else {
							$ctype = $other;
						}
						$cid = $this->input->post('caseid');
						$this->public->updateCaseType($cid, $ctype);
						redirect('registration/edit_registration/' . $cid);
						$cid = $this->input->post('caseid');
						$ctype = $this->input->post('level3');
						$this->public->updateCaseType($cid, $ctype);
						redirect('registration/edit_registration/' . $cid);
					}
					function updateCaseTypeIncase()
					{
						$other = $this->input->post('othercl3');
						$cl3 = $this->input->post('level3');
						if ($other == '') {
							$ctype = $cl3;
						} else {
							$ctype = $other;
						}
						$cid = $this->input->post('caseid');
						$this->public->updateCaseType($cid, $ctype);
						redirect('registration/case_activity/' . $cid);
						$cid = $this->input->post('caseid');
						$ctype = $this->input->post('level3');
						$this->public->updateCaseType($cid, $ctype);
						redirect('registration/case_activity/' . $cid);
					}
					function deleteCaseTypeCase($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_casetype_link');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->case_id;
						$this->public->caseDeleteType($id);
						redirect('registration/edit_registration/' . $case_id, 'refresh');
					}
					function deleteCaseTypeCaseIncase($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_casetype_link');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->case_id;
						$this->public->caseDeleteType($id);
						redirect('registration/case_activity/' . $case_id);
					}

					function deleteCaseTypeCaseAssign($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_casetype_link');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->case_id;
						$this->public->caseDeleteType($id);
						redirect('registration/edit_registration/' . $case_id);
					}

					function addCaseJudge()
					{
						$cid = $this->input->post('cid');
						$newJudge = $this->input->post('newJudge');
						$this->public->addCaseJudge($cid, $newJudge);
						redirect('registration/case_activity/' . $cid);
					}

					function deleteCaseJudgeIncase($id)
					{
						$this->db->select('*');
						$this->db->from('tbl_case_judge_link');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->case_id;
						$this->public->caseJudgeDelete($id);
						redirect('registration/case_activity/' . $case_id);
					}
					function getLitIncase()
					{
						$data['g'] = $this->input->post('g');
						$data['case_id'] = $this->input->post('case_id');
						$data['val'] = $this->input->post('reject');
						$data['lityps'] = $this->public->get_litigant_type();
						$this->load->view('litSearch', $data);
					}


					function getLitAssign()
					{

						$data['lityps'] = $this->public->get_litigant_type();
						$this->load->view('assignLitSearch', $data);
					}

					function addLitCase()
					{
						$val = $this->input->post('reject');
						$case_id = $this->input->post('caseID');
						$LitID = $this->input->post('LitID');
						$litType = $this->input->post('litType');
						$this->public->addLitigantCase($case_id, $LitID, $litType);
						if ($val == 1) {
							redirect('registration/view_rejected_case/' . $case_id);
						} else {
							redirect('registration/case_activity/' . $case_id);
						}
					}

					function addLitCaseAssignReview()
					{
						$case_id = $this->input->post('caseID');
						$LitID = $this->input->post('LitID');
						$litType = $this->input->post('litType');
						$this->public->addLitigantCase($case_id, $LitID, $litType);
						redirect('registration/reviewCaseAssign/' . $case_id);
					}

					function deleteCaseLatigantType($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_registration_litigant');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->caseID;
						$L_id = $result->litigant;

						if ($case_id != '') {
							$this->db->where('id', $id);
							$this->db->delete('sc_tbl_registration_litigant');

							$this->db->where('Case_id', $case_id);
							$this->db->where('Litigant_id', $L_id);
							$this->db->delete('tbl_litigant_lawyer_link');
						}

						redirect('registration/case_activity/' . $case_id);
					}


					function deleteCaseLatigantTypeReview($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_registration_litigant');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$case_id = $result->caseID;
						$L_id = $result->litigant;

						if ($case_id != '') {
							$this->db->where('id', $id);
							$this->db->delete('sc_tbl_registration_litigant');

							$this->db->where('Case_id', $case_id);
							$this->db->where('Litigant_id', $L_id);
							$this->db->delete('tbl_litigant_lawyer_link');
						}

						redirect('registration/reviewCaseAssign/' . $case_id);
					}


					function ReviewAssignClerk()
					{
						$case_id = $this->input->post('case_id');
						$case_title = $this->input->post('case_title');
						$clerk = $this->input->post('clerk');

						$update = array(
							'case_title' => $case_title,
							'clerk' => $clerk,
							'status' => '7'
						);
						$this->db->where('id', $case_id);
						$this->db->update('sc_tbl_misc_case_info', $update);
						redirect('registration');
					}
					function deleteCaseJudicalLit($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_litigant');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$jid = $result->judicial_process_id;

						$this->db->where('id', $id);
						$this->db->delete('sc_tbl_case_litigant');
						redirect('registration/edit_caseActivity/' . $jid);
					}

					function deleteJudicalLitigant($id)
					{

						$this->db->select('*');
						$this->db->from('sc_tbl_case_litigant');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$jud_id = $result->judicial_process_id;

						if ($jud_id != '') {
							$this->db->where('id', $id);
							$this->db->delete('sc_tbl_case_litigant');
						}

						redirect('registration/edit_caseActivity/' . $jud_id);
					}

					function deleteJudicialForm($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_form');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$jud_id = $result->judicial_process_id;

						if ($jud_id != '') {
							$this->db->where('id', $id);
							$this->db->delete('sc_tbl_case_form');
						}

						redirect('registration/edit_caseActivity/' . $jud_id);
					}

					function deleteJudicialForm1($id)
					{
						$this->db->select('*');
						$this->db->from('sc_tbl_case_form');
						$this->db->where('id', $id);
						$result = $this->db->get()->row();
						$jud_id = $result->judicial_process_id;

						if ($jud_id != '') {
							$this->db->where('id', $id);
							$this->db->delete('sc_tbl_case_form');
						}

						redirect('registration/edit_caseActivity1/' . $jud_id);
					}



					function addJudicialForm()
					{
						$id = $this->input->post('id');
						$case_id = $this->input->post('case_id');
						$issued = $this->input->post('issued');
						$form_id = $this->input->post('form_id');
						$jud_id = $this->input->post('jud_id');
						$frmdate = $this->input->post('formdate');
						$this->public->addJudForm($id, $case_id, $form_id, $issued, $frmdate);
						redirect('registration/edit_caseActivity/' . $id);
					}
					function addJudicialForm1()
					{
						$id = $this->input->post('id');
						$case_id = $this->input->post('case_id');
						$issued = $this->input->post('issued');
						$form_id = $this->input->post('form_id');
						$jud_id = $this->input->post('jud_id');
						$frmdate = $this->input->post('formdate');
						$this->public->addJudForm($id, $case_id, $form_id, $issued, $frmdate);
						redirect('registration/edit_caseActivity1/' . $id);
					}


					function addJurdLit()
					{
						$id = $this->input->post('idr');
						$case_id = $this->input->post('caseID');
						$jud_id = $this->input->post('judr_id');
						$lits = $this->input->post('lit');

						for ($i = 0; $i < count($lits); $i++) {
							if (isset($lits[$i])) {
								$this->db->select('*');
								$this->db->where('case_id', $case_id);
								$this->db->where('litigant_id', $lits[$i]);
								$this->db->where('judicial_process_id', $id);
								$this->db->from('sc_tbl_case_litigant');
								$count = $this->db->count_all_results();
								if ($count == '0') {
									$insert_process['case_id'] = $case_id;
									$insert_process['litigant_id'] = $lits[$i];
									$insert_process['judicial_process_id'] = $id;
									$this->db->insert('sc_tbl_case_litigant', $insert_process);
								}
							}
						}
						redirect('registration/edit_caseActivity/' . $id);
					}

					function assignLitLawyer()
					{
						$checker = $this->input->post('checker');
						if ($checker == 'new') {
							$lit_id = $this->input->post('litig');
							$lname = $this->input->post('lname');
							$lcid = $this->input->post('lcid');
							$lqul = $this->input->post('lqul');
							$lph = $this->input->post('lph');
							$lmob = $this->input->post('lmob');
							$lfname = $this->input->post('lfname');
							$lfadd = $this->input->post('lfadd');

							$insert_data['L_Name'] = $this->input->post('lname');
							$insert_data['CID'] = $this->input->post('lcid');
							$insert_data['Qualification'] = $this->input->post('lqul');
							$insert_data['Phone'] = $this->input->post('lph');
							$insert_data['Mobile'] = $this->input->post('lmob');
							$insert_data['Firm'] = $this->input->post('lfname');
							$insert_data['Address'] = $this->input->post('lfadd');
							$insert_data['created_date'] = date('y-m-d');
							$this->db->insert('sc_tbl_lawyer', $insert_data);
							$insert_id = $this->db->insert_id();

							$insert_data2['Lawyer_id'] = $insert_id;
							$insert_data2['Lit_id'] = $lit_id;
							$insert_data2['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('sc_tbl_temp_lawyer_link', $insert_data2);
						} elseif ($checker == 'old') {


							$insert_data3['Lawyer_id'] = $this->input->post('lawyerID');
							$insert_data3['Lit_id'] = $this->input->post('litig');
							$insert_data3['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('sc_tbl_temp_lawyer_link', $insert_data3);
						}

						$this->load->view('lawyerRegForm');
					}


					function assignCaseActivityLitLawyer()
					{
						$checker = $this->input->post('checker');
						if ($checker == 'new') {
							$lit_id = $this->input->post('LitigantID');
							$lname = $this->input->post('lname');
							$lcid = $this->input->post('lcid');
							$lqul = $this->input->post('lqul');
							$lph = $this->input->post('lph');
							$lmob = $this->input->post('lmob');
							$lfname = $this->input->post('lfname');
							$lfadd = $this->input->post('lfadd');
							$case_id = $this->input->post('case_id');

							$insert_data['L_Name'] = $this->input->post('lname');
							$insert_data['CID'] = $this->input->post('lcid');
							$insert_data['Qualification'] = $this->input->post('lqul');
							$insert_data['Phone'] = $this->input->post('lph');
							$insert_data['Mobile'] = $this->input->post('lmob');
							$insert_data['Firm'] = $this->input->post('lfname');
							$insert_data['Address'] = $this->input->post('lfadd');
							$insert_data['created_date'] = date('y-m-d');
							$this->db->insert('sc_tbl_lawyer', $insert_data);
							$insert_id = $this->db->insert_id();

							$insert_data2['Lawyer_id'] = $insert_id;
							$insert_data2['Case_id'] = $case_id;
							$insert_data2['Litigant_id'] = $lit_id;
							$insert_data2['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_data2);
						} elseif ($checker == 'old') {
							$lit_id = $this->input->post('LitigantID');
							$case_id = $this->input->post('case_id');

							$insert_data3['Lawyer_id'] = $this->input->post('lawyerID');
							$insert_data3['Case_id'] = $case_id;
							$insert_data3['Litigant_id'] = $lit_id;
							$insert_data3['created_date'] = date('y-m-d');
							$insert_data3['created_by'] = $this->session->userdata('user_id');
							$this->db->insert('tbl_litigant_lawyer_link', $insert_data3);
						}
						$case_id = $this->input->post('case_id');
						$data['case_id'] = $case_id;
						$data['lits'] = $this->public->getAllCaseLitigant($case_id);
						$this->load->view('caseActivity_Lits', $data);
					}

					function download($judgement_document = NULL)
					{
						// load download helper
						$this->load->helper('download');
						// read file contents
						$data = file_get_contents(base_url('/images/media/' . $judgement_document));
						force_download($judgement_document, $data);
					}
					
					function download_jf($caseID = NULL)
					{
						$filename = $this->public->get_judgementcopy($caseID);						 
						$this->load->helper('download');
						$content = file_get_contents(base_url('/images/courtorder/'.$filename));
						force_download($filename, $content);
					}


					function lawRefresh()
					{
						$this->load->view('lawyerForm');
					}

					function showLawyer()
					{

						$this->load->view('lawyerView');
					}


					function search_lawyer_info()
					{
						$title = $this->input->post('value');
						if ($this->public->count_no_fields1('sc_tbl_lawyer', 'L_Name', 'CID', $title) == '0') {
							echo "<br>";
							echo "<span style='color:#f00'>No lawyer found for <span style='color:#666'> <strong>'" . $title . "'</strong></span>, add the details below!</span>";
							echo '<table class="table table-bordered table-striped">
				  <tr>
					<td><input type="hidden" name="checker" value="new">
					   <label>Name :<span style="color:#F00;">*</span></label><input type="text" name="lname" class="form-control" required>
					</td>
				   
					<td>
					 <label>CID : <span style="color:#F00;">*</span></label><input type="text" name="lcid" class="form-control" required>
					</td>
				  </tr>
					 <tr>
					<td>
					<label>Qualification :</label><input type="text" name="lqul" class="form-control">
					</td>
					<td>
					<label>Phone No <span style="color:#F00;">*</span>:</label><input type="text" name="lph" class="form-control" required>
					</td>
				  </tr>
					 <tr>
					<td>
					<label>Mobile No :</label><input type="text" name="lmob" class="form-control">
					</td>
					<td>
					<label>Firm Name :</label><input type="text" name="lfname" class="form-control">
					</td>
				  </tr>
					 <tr>
					<td>
					  <label>Firm Address :</label><input type="text" name="lfadd" class="form-control">
					</td>
					<td>
					<input type="submit" value="Assign" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-danger"  onclick="hideLawyer();">
					</td>
				  </tr>
				</table>';
						} else {
							$this->db->select('*');
							$this->db->where('L_Name', $title);
							$this->db->or_where('CID', $title);
							$this->db->from('sc_tbl_lawyer');
							$query = $this->db->get();
							$laws = $query->result();
							foreach ($laws as $law) {
								echo "<br>";
								echo "<input type='hidden' name='LawyerID' value='" . $law->id . "'><input type='hidden' name='checker' value='old'>";
								echo '<table class="table table-bordered table-striped"><tr>';
								echo '<tr><td style="width:10%;"><strong>Name</strong></td><td style="width:30%;">';
								echo $law->L_Name;
								echo '</td><td style="width:20%;"><strong>CID</strong></td><td style="width:10%;">';
								echo $law->CID;
								echo "</td>";
								echo '<td style="width:20%;"><input type="radio" id="lawyerID"  name="lawyerID" value="' . $law->id . '" style="float:left;">Select</td>';
								echo "</tr>";
								echo "</table>";
							}
							echo 	'<input type="submit" value="Assign" class="btn btn-primary" style="float:right;">';
						}
					}


					function delete_judicialProcess($id)
					{
						$this->db->select('*');
						$this->db->where('id', $id);
						$query = $this->db->get('sc_tbl_case_activities');

						foreach ($query->result() as $get) {
							$case_id = $get->case_id;
							$process_id = $get->judicial_process_id;
						}


						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_litigant');

						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_form');

						$this->db->where('id', $id);
						$this->db->where('case_id', $case_id);
						$this->db->delete('sc_tbl_case_activities');

						redirect('registration/case_activity/' . $case_id, 'refresh');
					}

					function delete_judicialProcess_elat($id)
					{
						$this->db->select('*');
						$this->db->where('id', $id);
						$query = $this->db->get('sc_tbl_case_activities');

						foreach ($query->result() as $get) {
							$case_id = $get->case_id;
							$process_id = $get->judicial_process_id;
						}
						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_litigant');
						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_form');

						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_litigant_elat');
						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_form_elat');

						$this->db->where('id', $id);
						$this->db->where('case_id', $case_id);
						$this->db->delete('sc_tbl_case_activities');

						redirect('registration/case_activity_elat/' . $case_id, 'refresh');
					}

					function delete_judicialProcess1($id)
					{
						$this->db->select('*');
						$this->db->where('id', $id);
						$query = $this->db->get('sc_tbl_case_activities');

						foreach ($query->result() as $get) {
							$case_id = $get->case_id;
							$process_id = $get->judicial_process_id;
						}


						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_litigant');

						$this->db->where('judicial_process_id', $process_id);
						$this->db->delete('sc_tbl_case_form');

						$this->db->where('id', $id);
						$this->db->where('case_id', $case_id);
						$this->db->delete('sc_tbl_case_activities');

						redirect('registration/view_rejected_case/' . $case_id, 'refresh');
					}


					function addSentDetail()
					{
						$this->load->view('addSentance');
					}


					function CheckExistMis()
					{


						if (isset($_POST['misc_no'])) {
							$misc_no = trim($_POST['misc_no']);
							$this->db->where('misc_case_no', $misc_no);
							$this->db->from('sc_tbl_misc_case_info');
							$total = $this->db->count_all_results();

							if ($total >= 1) {
								//echo "<span style='color:#f00; margin:5px; float:left; padding:3px; background:#FCFFDA;'>This Miscellaneous number already exist!</span>";
								echo "<script>alert('Misc Case No. Already exist, Try Again !');window.location.href='index.php/registration/insert_registration';
                  </script>";
							}
						}
					}


					function CheckExistReg()
					{


						if (isset($_POST['reg_number'])) {
							$reg_number = trim($_POST['reg_number']);
							$this->db->where('reg_no', $reg_number);
							$this->db->from('sc_tbl_misc_case_info');
							$total = $this->db->count_all_results();

							if ($total >= 1) {
								//echo "<span style='color:#f00; margin:5px; float:left; padding:3px; background:#FCFFDA;'>Registeration number already exist!</span>";
								echo "<script>alert('Registration No. Already exist, Try Again !');window.location.href='index.php/registration/insert_registration';
                  </script>";
							}
						}
					}


					function CheckExistDiss()
					{


						if (isset($_POST['notreg_dis_no'])) {
							$notreg_dis_no = trim($_POST['notreg_dis_no']);
							$this->db->where('dismissal_no', $notreg_dis_no);
							$this->db->from('sc_tbl_misc_case_info');
							$total = $this->db->count_all_results();

							if ($total >= 1) {
								echo "<span style='color:#f00; margin:5px; float:left; padding:3px; background:#FCFFDA;'>Dissmissal number already exist!</span>";
							}
						}
					}
					//Check Judgment Number Duplicate
					function CheckExistJudgno()
					{

						if (isset($_POST['judgement_no'])) {
							$judgement_no = trim($_POST['judgement_no']);
							$this->db->where('judgement_no', $judgement_no);
							$this->db->from('sc_tbl_judgement');
							$total = $this->db->count_all_results();

							if ($total >= 1) {
								//echo "<span style='color:#f00; margin:5px; float:left; padding:3px; background:#FCFFDA;'>Judgment number already exist!</span>";
								echo "<script>alert('Judgment No. Already exist, Try Again !');window.location.href='index.php/registration/judgement';
</script>";
							}
						}
					}

					function updateCaseTitle()
					{
						$newtitle = $_POST['newtitle'];
						$case_id = $_POST['case_id'];

						$data = array(
							'case_title' => $newtitle
						);

						$this->db->where('id', $case_id);
						$this->db->update('sc_tbl_misc_case_info', $data);

						$this->db->select('*');
						$this->db->where('id', $case_id);
						$query = $this->db->get('sc_tbl_misc_case_info');
						foreach ($query->result() as $get) {
							$case_id = $get->id;
							$case_title = $get->case_title;
						}
						?>
						<div id="caseTitle">
							<?php echo $case_title; ?><a href="#" style="float:right; margin:10px;" id="editTitle"><i class="fa fa-pencil"></i> Edit</a>
						</div>
						<div id="editCaseTitle" style="display:none;">
							<input type="text" value="<?php echo $case_title; ?>" name="newCaseTitle" id="newCaseTitle" class='form-control' style="width:100%;" /><a href="#" style="float:right; margin:10px; background:#06C; color:#fff; padding:5px 10px; border-radius: 3px;" id="saveTitle">Save</a>
						</div>
						<script>
							$('#editTitle').click(function(e) {

								e.preventDefault();

								$('#caseTitle').css('display', 'none');
								$('#editCaseTitle').css('display', 'block');
							});

							$('#saveTitle').click(function(e) {
								e.preventDefault();
								var newtitle = $('#newCaseTitle').val();
								var case_id = <?php echo $case_id; ?>;
								if (newtitle == '') {
									alert("Title cannot be empty.");
								} else {


									$.ajax({
										type: "post",
										url: "index.php/registration/updateCaseTitle",
										data: {
											'newtitle': newtitle,
											'case_id': case_id
										},

										success: function(msg) {

											$('#caseTitleBox').html(msg);
											$('#caseTitle').css('display', 'block');
											$('#editCaseTitle').css('display', 'none');


										}
									});
								}
							});
						</script>
				<?php
					}


					function getReviewCases()
					{

						$data['reviews'] = $this->public->getAllReviewCases();
						$this->load->view('header');
						$this->load->view('clerkReviewCases', $data);
						$this->load->view('footer');
					}

					function reviewRegisteration($id)
					{
						$data['benches'] = $this->public->get_benches();
						$data['judges'] = $this->public->get_hearing_judge();
						$data['lits'] = $this->public->getAllCaseLitigant($id);
						$data['cases'] = $this->public->get_CaseID($id);
						$data['case_id'] = $id;
						$this->load->view('header');
						$this->load->view('reviewRegisteration', $data);
						$this->load->view('footer');
					}


					function ReviewCaseRegisteration()
					{

						$update_data['case_title'] = $this->input->post('case_title');
						$update_data['review_summery'] = $this->input->post('remarks');
						$update_data['review_date'] = $this->input->post('review_date');
						$update_data['misc_hearing_date'] = date('d-m-y');

						$case_id = $this->input->post('case_id');

						if ($this->input->post('reg_status') == 1) {
							$update_data['reg_date'] = $this->input->post('reg_date');
							$update_data['reg_no'] = $this->input->post('reg_number');
							$update_data['registration_status'] = 1;
							$update_data['status'] = 3;
							$this->db->where('id', $case_id);
							$this->db->update('sc_tbl_misc_case_info', $update_data);
						} elseif ($this->input->post('reg_status') == 2) {
							$update_data['reason'] = $this->input->post('notreg_reason');
							$update_data['dismissal_no'] = $this->input->post('notreg_dis_no');
							$update_data['dismissal_date'] = $this->input->post('notreg_dis_date');
							$update_data['registration_status'] = 2;
							$update_data['status'] = 1;
							$this->db->where('id', $case_id);
							$this->db->update('sc_tbl_misc_case_info', $update_data);
						}

						$review_judges = $this->input->post('newJudge');

						for ($i = 0; $i < count($review_judges); $i++) {
							$insert_process['case_id'] = $case_id;
							$insert_process['judge_id'] = $review_judges[$i];
							$this->db->insert('sc_tbl_review_judges', $insert_process);
						}

						/*--------Add Lawyer Info-----*/
						$this->db->select('*');
						$this->db->where('created_by', $this->session->userdata('user_id'));
						$this->db->from('sc_tbl_temp_lawyer_link');
						$qust = $this->db->get();
						$lawyers = $qust->result();

						if (empty($lawyers)) {
						} else {
							$litigants = $this->public->getCaseLitigant($case_id);
							foreach ($lawyers as $lays) {
								foreach ($litigants as $lits) {
									if ($lays->Lit_id == $lits->litigant) {
										$insert_law['Lawyer_id'] = $lays->Lawyer_id;
										$insert_law['Case_id'] = $case_id;
										$insert_law['Litigant_id'] = $lits->litigant;
										$insert_law['created_date'] = date('y-m-d');
										$insert_law['created_by'] = $this->session->userdata('user_id');
										$this->db->insert('tbl_litigant_lawyer_link', $insert_law);
									}
								}
							}
						}

						redirect('registration/getReviewCases');
					}

					function _get_cases($title = '')
					{
						if ($title == 1) {
							$this->db->select('*');
							$this->db->from('sc_tbl_misc_case_info');
							$this->db->where('registration_status', 1);
							$this->db->where('status', 2);
							$this->db->where('court_id', $this->session->userdata('court_id'));
							$this->db->where('bench', $this->session->userdata('bench'));
							$this->db->order_by('id', 'DESC');
							$query = $this->db->get();
							return $query->result();
						}

						if ($title == 2) {
							$this->db->select('*');
							$this->db->from('sc_tbl_misc_case_info');
							$this->db->where('registration_status', 1);
							$this->db->where('status', 3);
							$this->db->where('court_id', $this->session->userdata('court_id'));
							$this->db->where('bench', $this->session->userdata('bench'));
							$this->db->order_by('id', 'DESC');
							$query = $this->db->get();
							return $query->result();
						}

						if ($title == 3) {
							$this->db->select('*');
							$this->db->from('sc_tbl_misc_case_info');
							$this->db->where('registration_status', 1);
							$this->db->where('status', 4);
							$this->db->where('court_id', $this->session->userdata('court_id'));
							$this->db->where('bench', $this->session->userdata('bench'));
							$this->db->order_by('id', 'DESC');
							$query = $this->db->get();
							return $query->result();
						}

						if ($title == 4) {
							$this->db->select('*');
							$this->db->from('sc_tbl_misc_case_info');
							$this->db->where('registration_status', 1);
							$this->db->where('status', 5);
							$this->db->where('court_id', $this->session->userdata('court_id'));
							$this->db->where('bench', $this->session->userdata('bench'));
							$this->db->order_by('id', 'DESC');
							$query = $this->db->get();
							return $query->result();
						}
					}

					function ack_court_app_form()
					{
						$this->user->check_valid_user_elat();
						$id = $this->input->post('id');
						$ack = $this->input->post('appack');
						$caseid = $this->input->post('caseid');
						$udata = array('cack_app' => $ack, 'cack_app_date' => date("Y/m/d"));
						$this->db->where('id', $id);
						$this->db->update('sc_tbl_case_form_elat', $udata);
						$uid = $this->session->userdata('user_id');
						redirect('registration/case_activity_elat/' . $caseid);
					}

					function ack_court_def_form()
					{
						$this->user->check_valid_user_elat();
						$id = $this->input->post('id');
						$ack = $this->input->post('defack');
						$caseid = $this->input->post('caseid');
						$udata = array('cack_def' => $ack, 'cack_def_date' => date("Y/m/d"));
						$this->db->where('id', $id);
						$this->db->update('sc_tbl_case_form_elat', $udata);
						$uid = $this->session->userdata('user_id');
						redirect('registration/case_activity_elat/' . $caseid);
					}

					function ack_submissions()
					{
						$this->user->check_valid_user_elat();
						$id = $this->input->post('id');
						$ack = $this->input->post('ack');
						$caseid = $this->input->post('caseid');
						$udata = array('ack' => $ack, 'ack_date' => date("Y/m/d"));
						$this->db->where('id', $id);
						$this->db->update('elat_tbl_case_files', $udata);
						$uid = $this->session->userdata('user_id');
						redirect('registration/case_activity_elat/' . $caseid);
					}
				}
				?>


