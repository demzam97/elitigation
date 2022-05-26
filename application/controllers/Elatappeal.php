<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Elatappeal extends CI_Controller 
  {

	function __Construct()
		{
          parent::__Construct();
          header ('Cache-Control: no-cache, must-revalidate, max-age = 0');
          header ('Cache-Control: post-check = 0, pre-check = 0', false);
          header ('Pragma: no-cache');
	        $this->load->helper('url');
          $this->load->helper('form');
          $this->load->helper('download');
          $this->load->library('form_validation');
          $this->load->model('user_model','user');
		      $this->load->model('public_model','public');
		      $this->load->model('Elat_model','elat');
			    $this->load->model('Elatappeal_model','appeal');
        }
               
        function caseappeal($uid) 
             { 
              $this->user->check_valid_user_elat();	
              $data['usercases'] = $this->appeal->get_all_appeal_cases_public($uid);
              $data['courts'] = $this->appeal->get_court(); 
              $this->load->view('elitigation/header1');
	            $this->load->view('elitigation/appeal/caseappealtable', $data); 
              $this->load->view('elitigation/footer1');
             } 

             function appealcase($miscid) 
             {
               $case = $this->appeal->get_single_row('sc_tbl_misc_case_info', $miscid);
               $dcourt = $case->court_id;
               $cdid = $this->public->get_elat_court_dzongkhag($dcourt);
               $data['court_id'] = $case->court_id;
               $data['miscid'] = $miscid;
               $data['case_id'] = $case->id;
               $data['elatid'] = $this->appeal->get_elat_caseid($miscid);
               $court_typeid = $this->appeal->get_elat_court_type($case->court_id);
               $data['litigants'] = $this->appeal->get_CaseRelatedLitigant($miscid);
               $data['court_type'] = $this->appeal->get_appeal_court_type_elat($court_typeid, $cdid);
               $data['judges'] = $this->appeal->get_hearing_judge_elat($case->court_id);
               $this->load->view('elitigation/header1');
               $this->load->view('elitigation/appeal/appealcaseform', $data);
               $this->load->view('elitigation/footer1');
             } 


             function appealcase_def($miscid) 
             {
               $case = $this->appeal->get_single_row('sc_tbl_misc_case_info', $miscid);
               $dcourt = $case->court_id;
               $cdid = $this->public->get_elat_court_dzongkhag($dcourt);
               $data['court_id'] = $case->court_id;
               $data['miscid'] = $miscid;
               $data['case_id'] = $case->id;
               $data['elatid'] = $this->appeal->get_elat_caseid($miscid);
               $court_typeid = $this->appeal->get_elat_court_type($case->court_id);
               $data['litigants'] = $this->appeal->get_CaseRelatedLitigant($miscid);
               $data['court_type'] = $this->appeal->get_appeal_court_type_elat($court_typeid, $cdid);
               $data['judges'] = $this->appeal->get_hearing_judge_elat($case->court_id);
               $this->load->view('elitigation/header1');
               $this->load->view('elitigation/appeal/appealcaseform_def', $data);
               $this->load->view('elitigation/footer1');
             } 
             
             function view_appealcase($appealid)
           {  
               $data['usercases'] = $this->appeal->get_cases_public_case_appeal($appealid);
               $this->load->view('elitigation/header1');
               $this->load->view('elitigation/appeal/view_appealcase', $data); 
               $this->load->view('elitigation/footer1');
          }

          function add_appeal(){	
              
            $uid = $this->session->userdata('user_id');
            $usercid = $this->public->get_applicant_cid($uid);
            $latid = $this->public->get_latigant_id($usercid);
            if($this->input->post()) {
            $insert_data['elatid'] = $this->input->post('elatid');
            $insert_data['case_id'] = $this->input->post('case_id');
            $insert_data['deciding_court'] = $this->input->post('court_id');
            $insert_data['appeal_brief'] = $this->input->post('appeal_brief');
            $insert_data['appealed_court_id'] = $this->input->post('appeal_court');
            $insert_data['hearing_option'] = $this->input->post('hearingoption');
            $insert_data['application_copy'] = $_FILES["application_copy"]["name"];
            $insert_data['applicant_type'] = $this->input->post('applicant_type');
            $insert_data['created_by'] = $uid;
            $insert_data['created_on'] = date('Y-m-d');
            $this->db->insert('sc_tbl_appeal_elat', $insert_data);
            $folder = "images/appeal_applicationcopy/";
            move_uploaded_file($_FILES["application_copy"]["tmp_name"], "$folder".$_FILES["application_copy"]["name"]);
            
            $latigants = $this->public->get_CaseRelatedLitigantElat($this->input->post('case_id'));
            foreach ($latigants as $value){ $array[] = $value->litigant;} $multi_latigant = implode(",", $array);
            $case = $this->public->get_single_row('sc_tbl_misc_case_info', $this->input->post('case_id'));
            $judges = $this->public->get_hearing_judge_elat($case->court_id);
            foreach ($judges as $value1){ $array1[] = $value1->id;} $signing_judge = implode(",", $array1);

            $dzo = $this->public->get_CourtDzongkhag($this->input->post('court_id'));
		        $insert_data1['case_id'] = $this->input->post('case_id');
		        $insert_data1['appeal_date'] = date('Y-m-d');
		        $insert_data1['court_id'] = $this->input->post('court_id');
            $insert_data1['signing_judge_id'] = $signing_judge; 
		        $insert_data1['appeal_brief'] = $this->input->post('appeal_brief');
		        $insert_data1['appealed_court_id'] = $this->input->post('appeal_court');
		        $insert_data1['appeal_no'] = "";
            $insert_data1['litigant'] = $multi_latigant;
            $insert_data1['appealent'] = $latid;
		        $insert_data1['dzongkhag'] = $dzo;
		        $insert_data1['updated_by_id'] = $this->session->userdata('user_id');
            $insert_data1['updated_date'] = date("Y-m-d");
            $insert_data1['case_source'] = '1';
            $insert_data1['elat_userid'] = $this->session->userdata('user_id');
            $insert_data1['applicant_type'] = $this->input->post('applicant_type');
            
		        $cc=$this->input->post('appeal_court');
		        $court_id=$this->public->CourtIDChange($cc,$dzo);
		        $insert_data1['app_court_profile'] = $court_id;
		        $this->db->insert('sc_tbl_appeal', $insert_data1);
	
		        $this->db->where('id', $this->input->post('case_id'));
		        $update_data['status'] = 5;
		        $update_data['appeal_reg_status'] = 0;
		        $this->db->update('sc_tbl_misc_case_info', $update_data);
            
            $this->user->check_valid_user_elat();	
            $data['usercases'] = $this->elat->get_all_appeal_cases_public($uid);
            $data['courts'] = $this->elat->get_court(); 
            $this->session->set_flashdata('success', 'Case appeal application successful');
            redirect('publicregistration/newcase/'.$uid);
            
            }
            else
            {
              redirect('publicregistration/newcase/'.$uid);
            }
           }

           function add_appeal_def(){	
              
            $uid = $this->session->userdata('user_id');
            $usercid = $this->public->get_applicant_cid($uid);
            $latid = $this->public->get_latigant_id($usercid);
            if($this->input->post()) {
            $insert_data['elatid'] = $this->input->post('elatid');
            $insert_data['case_id'] = $this->input->post('case_id');
            $insert_data['deciding_court'] = $this->input->post('court_id');
            $insert_data['appeal_brief'] = $this->input->post('appeal_brief');
            $insert_data['appealed_court_id'] = $this->input->post('appeal_court');
            $insert_data['hearing_option'] = $this->input->post('hearingoption');
            $insert_data['application_copy'] = $_FILES["application_copy"]["name"];
            $insert_data['applicant_type'] = $this->input->post('applicant_type');
            $insert_data['created_by'] = $uid;
            $insert_data['created_on'] = date('Y-m-d');
            $this->db->insert('sc_tbl_appeal_elat', $insert_data);
            $folder = "images/appeal_applicationcopy/";
            move_uploaded_file($_FILES["application_copy"]["tmp_name"], "$folder".$_FILES["application_copy"]["name"]);
            
            $latigants = $this->public->get_CaseRelatedLitigantElat($this->input->post('case_id'));
            foreach ($latigants as $value){ $array[] = $value->litigant;} $multi_latigant = implode(",", $array);
            $case = $this->public->get_single_row('sc_tbl_misc_case_info', $this->input->post('case_id'));
            $judges = $this->public->get_hearing_judge_elat($case->court_id);
            foreach ($judges as $value1){ $array1[] = $value1->id;} $signing_judge = implode(",", $array1);

            $dzo = $this->public->get_CourtDzongkhag($this->input->post('court_id'));
		        $insert_data1['case_id'] = $this->input->post('case_id');
		        $insert_data1['appeal_date'] = date('Y-m-d');
		        $insert_data1['court_id'] = $this->input->post('court_id');
            $insert_data1['signing_judge_id'] = $signing_judge; 
		        $insert_data1['appeal_brief'] = $this->input->post('appeal_brief');
		        $insert_data1['appealed_court_id'] = $this->input->post('appeal_court');
		        $insert_data1['appeal_no'] = "";
            $insert_data1['litigant'] = $multi_latigant;
            $insert_data1['appealent'] = $latid;
		        $insert_data1['dzongkhag'] = $dzo;
		        $insert_data1['updated_by_id'] = $this->session->userdata('user_id');
            $insert_data1['updated_date'] = date("Y-m-d");
            $insert_data1['case_source'] = '1';
            $insert_data1['elat_userid'] = $this->session->userdata('user_id');
            $insert_data1['applicant_type'] = $this->input->post('applicant_type');
            
		        $cc=$this->input->post('appeal_court');
		        $court_id=$this->public->CourtIDChange($cc,$dzo);
		        $insert_data1['app_court_profile'] = $court_id;
		        $this->db->insert('sc_tbl_appeal', $insert_data1);
	
		        $this->db->where('id', $this->input->post('case_id'));
		        $update_data['status'] = 5;
		        $update_data['appeal_reg_status'] = 0;
		        $this->db->update('sc_tbl_misc_case_info', $update_data);
            
            $this->user->check_valid_user_elat();	
            $data['usercases'] = $this->elat->get_all_appeal_cases_public($uid);
            $data['courts'] = $this->elat->get_court(); 
            $this->session->set_flashdata('success', 'Case appeal application successful');
            redirect('publicregistration/def_caseappeal/'.$uid);
            
            }
            else
            {
              redirect('publicregistration/def_caseappeal/'.$uid);
            }
           }
      
    }   