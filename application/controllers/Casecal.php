<?php
ini_set('memory_limit', '512M');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Casecal extends CI_Controller {
 function __construct(){
  parent::__construct();
$this->load->model('public_model', 'public');
$this->load->model('evencal_model', 'evencal');
$this->load->model('Elat_model','elat');
$this->load->helper(array('form', 'url'));
$this->load->library(array('form_validation','session')); 
$this->load->library('session');		
$this->load->library("pagination");
$this->load->model('calcase_model','calcase');
	    
 }
 
 function index($year = null, $month = null, $day = null)
 {
	
	 if($year=='')
	 {
		 $year=date('y');
		
	 }
	 if($month=='')
	 {
		 $month=date('m');
	 }
	 if($day=='')
	 {
		 $day=date('d');
	 }
	 
	 
	 
	 $frm=strtotime($year."-".$month."-".$day);
	 $year=date('y', $frm);
	 $month=date('m', $frm);
	 $day=date('d', $frm);
	 
	   $prefs = array(
        'start_day'    => 'monday',
        'month_type'      => 'long',
        'day_type'        => 'short',
		'show_next_prev'  => TRUE,
        'next_prev_url'   => site_url('casecal/index/')		
               		  );
    $prefs['template'] = '
    {table_open}<table class="calendar">{/table_open}
    {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
    {cal_cell_content}<span class="day_listing">{day}</span> <span id="c_data">{content} Events</span>{/cal_cell_content}
    {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span><span id="c_data" style="color:#fff !important;">{content} Events</span></div>{/cal_cell_content_today}
    {cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
    {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
';
     $year="20".$year;
     $data['year']=$year;
	 $data['month']=$month;
	 $data['day']=$day;
     $this->load->library('calendar', $prefs);
     $events=array();
	 $events=$this->calcase->getEvents($year,$month);
	 $data['elists']=$this->calcase->getMonthEvent($year,$month);
	 $data['calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);
	 $this->load->view("header");
	 $this->load->view("viewCal", $data);
	 $this->load->view("footer");
  
 }
 
 function elatcal($year = null, $month = null, $day = null, $crtid = null)
 { 
     
	 if($year=='')
	 {
		 echo $year=date('y');
		
	 }
	 if($month=='')
	 {
		 echo $month=date('m');
	 }
	 if($day=='')
	 {
		 echo $day=date('d');
	 }
	 $year=date('y');
	 $month=date('m');
	 $day=date('d');
	 $frm=strtotime($year."-".$month."-".$day);
	 $year=date('y', $frm);
	 $month=date('m', $frm);
	 $day=date('d', $frm);
	 
	   $prefs = array(
        'start_day'    => 'monday',
        'month_type'      => 'long',
        'day_type'        => 'short',
		'show_next_prev'  => TRUE,
        'next_prev_url'   => site_url('casecal/elatcal/')		
               		  );
    $prefs['template'] = '
    {table_open}<table class="calendar">{/table_open}
    {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
    {cal_cell_content}<span class="day_listing">{day}</span> <span id="c_data">{content} Events</span>{/cal_cell_content}
    {cal_cell_content_today}<div class="today"><span class="day_listing">{day}</span><span id="c_data" style="color:#fff !important;">{content} Events</span></div>{/cal_cell_content_today}
    {cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
    {cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
';
     $year="20".$year;
     $data['year']=$year;
	 $data['month']=$month;
	 $data['day']=$day;
	 $data['crtid']=$crtid;
     $this->load->library('calendar', $prefs);
     $events=array();
	 $events=$this->calcase->getEventsAll($crtid,$year,$month);
	 $data['elists']=$this->calcase->getMonthEventAll($crtid,$year,$month);
	 $data['calendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);
	 $this->load->view('elitigation/headercal');
	 $this->load->view("elitigation/viewCal", $data);
 }
 
 function showCalPannel()
 {
	 $this->load->view("eventPannel");
 }
 
 function showCalPannelAll()
 {
	 $this->load->view("eventPannelAll");
 }
 
 function addCalEvent()
 {
	 $edate=$this->input->post('edate');
	 $insert_data['title']=$this->input->post('title');
	 $insert_data['event']=$this->input->post('event');
	 $insert_data['event_date']=$edate;
	 $insert_data['clerk_id']=$this->session->userdata('user_id');;
	 $insert_data['court_id']=$this->session->userdata('court_id');
	 $insert_data['event_time']=$this->input->post('hour').":".$this->input->post('min').":00";
	 $insert_data['created_date']=date('y-m-d');
	 $insert_data['status']="Active";
	 $this->db->insert('tbl_event', $insert_data);
	 $insert_id = $this->db->insert_id();
	 if($insert_id!=0||$insert_id!=''||$insert_id!=null)
	 {
		  $judge_id=$this->input->post('judge_id');
		  for($i=0;$i<count($judge_id);$i++)
		  {
			 $event_data['Judge_id']=$judge_id[$i];
			 $event_data['event_id']=$insert_id;
			 $this->db->insert('tbl_event_judge', $event_data);
		  }
		 
		 $edt=strtotime($edate);
		 $year=date('y', $edt);
		 $month=date('m', $edt);
		 $day=date('d', $edt);
		 redirect('casecal/index/'.$year.'/'.$month, 'refresh');
	 }
	 
	 
 }
 
 function deleteEvent()
 {
	 $id=$_GET['id'];
	 $year=$_GET['y'];
	 $month=$_GET['m'];
	 if($this->db->delete('tbl_event', array('id' => $id)))
	 {
		redirect('casecal/index/'.$year.'/'.$month, 'refresh');
	 }
 }

function view_all()
 {
	$data['calenders'] = $this->public->get_all_calendar_record();
	$this->load->view("header");
	 $this->load->view("viewCal_all", $data);
	 $this->load->view("footer");
}
}
