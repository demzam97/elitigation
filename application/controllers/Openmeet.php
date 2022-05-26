<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Openmeet extends CI_Controller { 

    function __construct() {
             parent::__construct();
        	$this->load->database();                                //Load Databse Class
            $this->load->library('session');					    //Load library for session
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('download');
          	$this->load->library('form_validation');
          	$this->load->model('user_model','user');
			$this->load->model('public_model','public');
            $this->load->model('live_class_model','live_class_model');
			$this->user->check_valid_user();
    }

    function live_class_openmeet()
    {
        
        $this->load->view('header');
        $this->load->view('live/live_openmeet');
        $this->load->view('footer');
    }

    function invite($juid, $caseid, $email, $pid, $type, $date, $time, $roomid, $court_id){
        if($type == 'judge'){ $name = $this->public->get_UserName($pid); }
        if($type == 'lawyer'){ $name = $this->public->get_LawyerName($pid);}
        if($type == 'lat'){ $name = $this->public->get_LitigantName($pid);}
        

            $insert_data['court_id'] = $court_id;
			$insert_data['case_id'] = $caseid;
            $insert_data['invitee_name'] = $name;
            $insert_data['invitee_email'] = $email;
            $insert_data['meeting_date'] = $date;
            $insert_data['start_time'] = $time;
            $insert_data['status'] = '1';
            $insert_data['room_id'] = $roomid;
            $insert_data['created_by'] = $this->session->userdata('user_id');
			$insert_data['created_date'] = date('y-m-d');
			
			$this->db->insert('jitsi', $insert_data);
        
            $join_url = 'https://meet.jit.si/'.$roomid.''; 
            $to = $email;
		    $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $subject = "Judiciary Notice";
            $message = "Join URL is $join_url";
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) { } else { show_error($this->email->print_debugger()); }

            $case=$this->public->get_single_row('sc_tbl_misc_case_info', $caseid);
            $data['roomid'] = $roomid;
            $data['case_id'] = $caseid;
            $data['court_id'] = $this->session->userdata('court_id');;
            $data['ju_id'] = $juid;
            $data['case_title'] = $case->case_title;
            $data['judicials'] =$this->public->get_Activity_cases_juid($caseid, $juid);
            $data['aJudges']=$this->public->getAlCaseJudge($caseid);
            $data['alawyers']=$this->public->getAlCaseLawyers($caseid);
            $data['alitigants']=$this->public->getAlCaseLitigants($caseid);
            $this->load->view('header');
            $this->load->view('livemeet', $data);
            $this->load->view('footer');
    }

    


    


    


}
