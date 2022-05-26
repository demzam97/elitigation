<?php
ini_set('memory_limit', '512M');
class User_dashboard extends CI_Controller {

	function __Construct()
		{
			parent::__Construct();
			$this->load->helper('url');
          	$this->load->helper('form');
          	$this->load->library('form_validation');
          	$this->load->model('user_model','user');
			$this->load->model('public_model','public');
			$this->load->library('custom_pagination');
			$this->load->helper('form');
			$this->load->library("pagination");
			$this->user->check_valid_user();
			
		}
	function index()
		{
		 $data['dzongkhag'] = $this->public->get_dzongkhag();
  		 $data['dungkhag'] = $this->public->get_dungkhag();
	     $data['gewog'] = $this->public->get_gewog();
		 $data['village'] = $this->public->get_village();
		 $data['users'] = $this->public->get_all_users();
 $data['cases'] = $this->public->get_all_cases();   
 		$data['title'] = "Dashboard";
		 $this->load->view('header', $data);
	     $this->load->view('dashboard', $data);
		 $this->load->view('footer');
		}
		
	function user_group()
		{
		 $start = $this->uri->segment(4);
		 $total_rows = count($this->_get_user_role(0, '', false));
		 $config = $this->custom_pagination->admin_configuration();
		 $config['base_url'] = site_url('user_dashboard/user_group/index');
		 $config['total_rows'] = $total_rows;
		 $this->pagination->initialize($config);
		 $data['user_group'] = $this->_get_user_role($start);	
		 $this->load->view('header');
	     $this->load->view('user_group/input', $data);
		 $this->load->view('footer');
		}
		
	function _get_user_role($start = 0, $title = '', $paginate = true )

		{
			if($paginate)
	
			{
	
				$per_page = $this->custom_pagination->per_page();
	
				$this->db->limit($per_page, $start);
	
			}
	
			if($title != '') 
	
			{
	
				$this->db->like('LTRIM(role_name)', $title, "after");	//change here
	
			}
	
			$query = $this->db->get('sc_tbl_role');			//change here
	
			return $query->result();
	
		}	
	
}
?>
