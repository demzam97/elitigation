<?php
ini_set('memory_limit', '512M');
class Court_profile extends CI_Controller {

	function __Construct()
		{
			parent::__Construct();
          	$this->load->helper('form');
          	$this->load->library('form_validation');
          	$this->load->model('user_model','user');
			$this->load->model('public_model', 'public');
			$this->user->check_valid_user();
			
		}
	function index()
		{
		 $this->load->view('header');
	     $this->load->view('court_profile');
		 $this->load->view('footer');
		}
		
	
}
?>
