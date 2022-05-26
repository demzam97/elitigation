<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Live_class_model extends CI_Model { 
	
	function __construct(){
        parent::__construct();
    }



    function saveLiveClassToDatabase(){

        $arrayLive = array(

            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'join_url'          => $this->input->post('join_url'),
            'date'              => $this->input->post('date'),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks')),
            'created_by'        => $this->session->userdata('user_id')

        );

        $this->db->insert('live_class', $arrayLive);
        $sendPhone = $this->input->post('send_notification_sms');
        $senddate  = $this->input->post('date');

    }

    function editLiveClassInformation($param2){

        $arrayLive = array(

            'title'             => html_escape($this->input->post('title')),
            'meeting_id'        => $this->input->post('meeting_id'),
            'meeting_password'  => $this->input->post('meeting_password'),
            'class_id'          => html_escape($this->input->post('class_id')),
            'section_id'        => html_escape($this->input->post('section_id')),
            'date'              => strtotime($this->input->post('date')),
            'start_time'        => date("H:i", strtotime($this->input->post('start_time'))),
            'end_time'          => date("H:i", strtotime($this->input->post('end_time'))),
            'remarks'           => html_escape($this->input->post('remarks'))

        );
        
        $this->db->where('live_class_id', $param2);
        $this->db->update('live_class', $arrayLive);
        $sendPhone = $this->input->post('send_notification_sms');
        $senddate  = $this->input->post('date');

        if($sendPhone == '1'){

            $students = $this->db->get_where('student', array('class_id' => $this->input->post('class_id')))->row();
            $student_parent_id = $students->parent_id;
            $parents = $this->db->get_where('parent', array('parent_id' => $student_parent_id))->result_array();
            $student_array = $this->db->get_where('student', array('class_id' => $students->class_id))->result_array();

            $message = $this->input->post('title').' ';
            $message .= get_phrase('on').' '. $senddate;

            foreach ($parents as $key => $parent){
                $recieverPhoneNumber = $parent['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }

            foreach ($student_array as $key => $student){
                $recieverPhoneNumber = $student['phone'];
                $this->sms_model->send_sms($message, $recieverPhoneNumber);
            }
        }
    }

    function deleteLiveClassInformation($param2){
        $this->db->where('live_class_id', $param2);
        $this->db->delete('live_class');
    }



    function selectLiveClassInformationByUser(){
        $user_type_id = $this->session->userdata('user_id');
        $sql = "select * from live_class where created_by ='".$user_type_id."' order by live_class_id asc";
        return $this->db->query($sql)->result_array();
    }

    function selectLiveLitigant($caseid){
        $sql = "select * from elat_tbl_litigants where case_id ='".$caseid."' order by id asc";
        return $this->db->query($sql)->result_array();
    }

    function selectLiveClassByStudentClassId($caseid){

        $sql = "select * from live_class order by live_class_id asc";
        return $this->db->query($sql)->result_array();
    }

    function get_api()
	{
	   $this->db->select('zoom_api_key');
	   $this->db->from('zoom_api_settings');
	   $result = $this->db->get()->row();
	   return $result->zoom_api_key;	
    }
    
    function get_api_secret()
	{
	   $this->db->select('zoom_api_secret_key');
	   $this->db->from('zoom_api_settings');
	   $result = $this->db->get()->row();
	   return $result->zoom_api_secret_key;	
	}







}