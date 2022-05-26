<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
  class Calcase_model extends CI_Model {
  function __construct(){
  parent::__construct();
  $this->load->library(array('form_validation','session'));
 }
 
 // for get all event date in one month
	 function getEvents($year,$month)
		{
					  
			$events = array();
			
			$dt=$year."-".$month;
		 if($this->session->userdata('user_type')==3 || $this->session->userdata('user_type')==4|| $this->session->userdata('user_type')==7)
		   {
			$this->db->distinct('event_date');
			$this->db->like('event_date', $dt, 'after'); 
			$this->db->from("tbl_event");
			$this->db->where("court_id", $this->session->userdata('court_id'));
			$this->db->where("clerk_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        $query= $query->result();
			 foreach ($query as $e)
                     {
						    $day=date('d', strtotime($e->event_date));
						    $this->db->select('*');
							$this->db->from('tbl_event');
							$this->db->where('event_date', $e->event_date);
							$total=$this->db->count_all_results();
							
							
							$events[(int)$day]= $total; 
						
					}
					return $events;
		   }
		   elseif($this->session->userdata('user_type')==2 || $this->session->userdata('user_type')==5)
		   {
			   $this->db->distinct('ev.event_date as event_date');
			   $this->db->like('ev.event_date', $dt, 'after'); 
			   $this->db->from("tbl_event ev");
			   $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			   $this->db->where("ev.court_id", $this->session->userdata('court_id'));
			   $this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        $query= $query->result();
		   }
		    foreach ($query as $e)
                     {
						   $day=date('d', strtotime($e->event_date));
						   $this->db->select('*'); 
						   $this->db->from("tbl_event ev");
						   $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
						   $this->db->where('ev.event_date', $e->event_date);
						   $this->db->where("ev.court_id", $this->session->userdata('court_id'));
						   $this->db->where("jd.judge_id", $this->session->userdata('user_id'));
						   $total=$this->db->count_all_results();
						   $events[(int)$day]= $total; 
						
					}
					return $events;
		   
			 }
			 
function getEventsAll($crtid,$year,$month)
		{
					  
			$events = array();
			
			$dt=$year."-".$month;
		 
		   
			   $this->db->distinct('ev.event_date as event_date');
			   $this->db->like('ev.event_date', $dt, 'after'); 
			   $this->db->from("tbl_event ev");
			   $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			   $this->db->where("ev.court_id", $crtid);
			   //$this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        $query= $query->result();
		   
		    foreach ($query as $e)
                     {
						   $day=date('d', strtotime($e->event_date));
						   $this->db->select('*'); 
						   $this->db->from("tbl_event ev");
						   $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
						   $this->db->where('ev.event_date', $e->event_date);
						   $this->db->where("ev.court_id", $crtid);
						   //$this->db->where("jd.judge_id", $this->session->userdata('user_id'));
						   $total=$this->db->count_all_results();
						   $events[(int)$day]= $total; 
						
					}
					return $events;
		   
			 }			
			
			 
  
  
   function getEventOn($year,$month,$day)
 {
	 $now=strtotime($year.'-'.$month.'-'.$day);
	 $sdate=date('y-m-d', $now);
	
	 if($this->session->userdata('user_type')==3||$this->session->userdata('user_type')==4|| $this->session->userdata('user_type')==7 || $this->session->userdata('user_type')==5)
		   {
			$this->db->select('*');
			$this->db->like('event_date', $sdate); 
			$this->db->from("tbl_event");
			$this->db->where("court_id", $this->session->userdata('court_id'));
			$this->db->where("clerk_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        $query= $query->result();
		   }
		   elseif($this->session->userdata('user_type')==2)
		   {
			 $this->db->select('ev.id as id,
			                   ev.event_date as event_date,
							   ev.event_time as event_time,
							   ev.title as title,
							   ev.event as event,
							   ev.court_id as court_id,
							   ev.clerk_id as clerk_id,
							   ev.created_date as created_date,
							   ev.status as status,
							   ');  
			 $this->db->from("tbl_event ev");
			 $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			 $this->db->where('ev.event_date', $sdate);
			 $this->db->where("ev.court_id", $this->session->userdata('court_id'));
			 $this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
			$query= $query->result();
		   }
	
	 return $query;
 }
 
 
 function getEventOnAll($year,$month,$day, $crtid)
 {
	 $now=strtotime($year.'-'.$month.'-'.$day);
	 $sdate=date('y-m-d', $now);
	 
			 $this->db->select('ev.id as id,
			                   ev.event_date as event_date,
							   ev.event_time as event_time,
							   ev.title as title,
							   ev.event as event,
							   ev.court_id as court_id,
							   ev.clerk_id as clerk_id,
							   ev.created_date as created_date,
							   ev.status as status,
							   ');  
			 $this->db->from("tbl_event ev");
			 $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			 $this->db->where('ev.event_date', $sdate);
			 $this->db->where("ev.court_id", $crtid);
			 //$this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
			$query= $query->result();
		   
	
	 return $query;
 }
  
function getMonthEvent($year,$month)
{
	     if($this->session->userdata('user_type')==3||$this->session->userdata('user_type')==4|| $this->session->userdata('user_type')==7)
	      {
    		$events = array();
			$dt=$year."-".$month;
			$this->db->select('*');
			$this->db->like('event_date', $dt, 'after'); 
			$this->db->from("tbl_event");
			$this->db->where("court_id", $this->session->userdata('court_id'));
			$this->db->where("clerk_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        return $query= $query->result();
          }
		  if($this->session->userdata('user_type')==2 || $this->session->userdata('user_type')==6)
	      {
    		$events = array();
			$dt=$year."-".$month;
			$this->db->select('ev.id as id,
			                   ev.event_date as event_date,
							   ev.event_time as event_time,
							   ev.title as title,
							   ev.event as event,
							   ev.court_id as court_id,
							   ev.clerk_id as clerk_id,
							   ev.created_date as created_date,
							   ev.status as status,
							   '); 
			 $this->db->from("tbl_event ev");
			 $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			 $this->db->like('ev.event_date', $dt);
			 $this->db->where("ev.court_id", $this->session->userdata('court_id'));
			 $this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
			return  $query->result();
          }
}

function getMonthEventWithJudge($crtid,$year,$month)
{
    		$events = array();
			$dt=$year."-".$month;
			$this->db->select('ev.id as id,
			                   ev.event_date as event_date,
							   ev.event_time as event_time,
							   ev.title as title,
							   ev.event as event,
							   ev.court_id as court_id,
							   ev.clerk_id as clerk_id,
							   ev.created_date as created_date,
							   ev.status as status,
							   jdn.judge_name as judge,
							   '); 
			 $this->db->from("tbl_event ev");
			 $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			 $this->db->join('sc_tbl_user_profile jdn','jd.Judge_id=jdn.id','left');

			 $this->db->like('ev.event_date', $dt);
			 $this->db->where("ev.court_id", $crtid);
			 //$this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
			return  $query->result();
          //}
}

function getMonthEventAll($crtid,$year,$month)
{
	    /* if($this->session->userdata('user_type')==3||$this->session->userdata('user_type')==4|| $this->session->userdata('user_type')==7)
	      {
    		$events = array();
			$dt=$year."-".$month;
			$this->db->select('*');
			$this->db->like('event_date', $dt, 'after'); 
			$this->db->from("tbl_event");
			$this->db->where("court_id", $this->session->userdata('court_id'));
			$this->db->where("clerk_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
	        return $query= $query->result();
          }*/
		  //if($this->session->userdata('user_type')==2 || $this->session->userdata('user_type')==6)
	      //{
    		$events = array();
			$dt=$year."-".$month;
			$this->db->select('ev.id as id,
			                   ev.event_date as event_date,
							   ev.event_time as event_time,
							   ev.title as title,
							   ev.event as event,
							   ev.court_id as court_id,
							   ev.clerk_id as clerk_id,
							   ev.created_date as created_date,
							   ev.status as status,
							   '); 
			 $this->db->from("tbl_event ev");
			 $this->db->join('tbl_event_judge jd','ev.id=jd.event_id','left');
			 $this->db->like('ev.event_date', $dt);
			 $this->db->where("ev.court_id", $crtid);
			 //$this->db->where("jd.judge_id", $this->session->userdata('user_id'));
       		$query = $this->db->get();
			return  $query->result();
          //}
}
 
 function getJudges()
 {
		$uid = array('2','6');
	        $this->db->select('*');
		$this->db->from("sc_tbl_user_profile");
		if($this->session->userdata('court_id')==14){
		$this->db->where_in("user_type", $uid);	
		}else{
		$this->db->where_in("user_type",2);	
		}
		$this->db->where("court",$this->session->userdata('court_id'));
       		$query = $this->db->get();
	       return $query->result();
	       
 }
 
 
  function getMonth($month){
  $month = (int) $month;
  switch($month){
   case 1 : $month = 'January'; Break;
   case 2 : $month = 'February'; Break;
   case 3 : $month = 'March'; Break;
   case 4 : $month = 'April'; Break;
   case 5 : $month = 'May'; Break;
   case 6 : $month = 'June'; Break;
   case 7 : $month = 'July'; Break;
   case 8 : $month = 'August'; Break;
   case 9 : $month = 'September'; Break;
   case 10 : $month = 'October'; Break;
   case 11 : $month = 'November'; Break;
   case 12 : $month = 'December'; Break;
  }
  return $month;
 }
  
  
  function getEventJudges($id)
  {
	  $this->db->select("*");
	  $this->db->where("event_id", $id);
	  $this->db->from('tbl_event_judge');
	  $query = $this->db->get();
	       return $query->result();
  }
}
?>
