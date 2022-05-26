<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Jitsilive extends CI_Controller {

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
      $this->load->model('Live_class_model','live_class_model');
			
		}
    public function jitsi_live()
       {
        $this->load->view('header');
        $this->load->view('live/jitsi_live');
        $this->load->view('footer');
       }

  }        