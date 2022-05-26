<?php
ini_set('memory_limit', '512M');
class Reports extends CI_Controller {

	function __Construct() 
		{
			parent::__Construct();
			$this->load->helper('url');
          	$this->load->helper('form');
          	$this->load->library('form_validation');
          	$this->load->model('user_model','user');
			$this->load->model('public_model','public');
			$this->load->model('Elat_model', 'elat');
			$this->user->check_valid_user();
			
		}
	function index()
		{
		 $this->load->view('header');
	     $this->load->view('report_view');
		 $this->load->view('footer');
		}    
	   
	   function monthly_case_count()
        { 		
          $court_id=$this->session->userdata('court_id');	
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=monthly_case_count.rptdesign&usercid=$court_id";		
		header("Location: $dest" );		
       }
	   function case_level_count()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=case_levels.rptdesign";		
		header("Location: $dest" );		
       }
	   	
	   function stages_of_hearing()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=Stages_of_Hearing.rptdesign";		
		header("Location: $dest" );		
       }
	   function decided_case()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=Decided_Cases.rptdesign";		
		header("Location: $dest" );		
       }
	   function judge_decided()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=judge_decide_case.rptdesign";		
		header("Location: $dest" );		
       }
	   	
	   function deposition_decided()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=deposition_decide.rptdesign";		
		header("Location: $dest" );		
       }
	   
	   function clerk_decided()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=clerk_decide_case.rptdesign";		
		header("Location: $dest" );		
       }
	   
	   function chart_rc()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=line_graph_case_reg.rptdesign";		
		header("Location: $dest" );		
       }
	   function chart_dc()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=line_graph_case_decided.rptdesign";		
		header("Location: $dest" );		
       }
	   function chart_pc()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=line_graph_case_pending.rptdesign";		
		header("Location: $dest" );		
       }
       function pie_cl()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=line_graph_case_pending.rptdesign";		
		header("Location: $dest" );		
       }
       function general()
        { 
        $court_id=$this->session->userdata('court_id');		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=general.rptdesign&cid=$court_id";		
		header("Location: $dest" );		
       }
       function cj_general()
        { 
        $court_id=$this->session->userdata('court_id');		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=cj_general.rptdesign&cid=$court_id";		
		header("Location: $dest" );		
       }
        function supremebench()
        { 	
         $court_id=$this->session->userdata('court_id');		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=supremebench.rptdesign&courtid=$court_id";		
		header("Location: $dest" );		
       } 
       function cl_1()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=CL1.rptdesign";		
		header("Location: $dest" );		
       }
       
       function cl_11()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=CL11.rptdesign";		
		header("Location: $dest" );		
       }
       
       
       function cl_2()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=CL2.rptdesign";		
		header("Location: $dest" );		
       }
       
       function cl_3()
        { 		
		$dest = "http://cms.judiciary.gov.bt:8080/birt_viewer/frameset?__report=CL3.rptdesign";		
		header("Location: $dest" );		
       }
	   
		
}
?>
