<?php
ini_set('memory_limit', '512M');
class User_type extends CI_Controller {

	function __Construct()
		{
			parent::__Construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('user_model','user');
			$this->user->check_valid_user();
			$this->load->helper('url');
			$this->load->model('admin_model', 'admin');
			$this->load->library('session');
			$this->load->library("pagination");
			$this->load->library('custom_pagination');
			$this->load->helper('form');
			$this->load->model('public_model', 'public');
			
		}
	function index(){
  
    $start = $this->uri->segment(4);
	$total_rows = count($this->_get_usertype(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/user_type/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['usertype'] = $this->_get_usertype($start);	
	$data['title'] = "Master";
	$this->load->view('header', $data);	
    $this->load->view('admin/user_type/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_role','role_name',$this->input->post('usertype')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->usertype_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'User Type Created Successfully.');
			redirect('admin/user_type');
		}
		
		
		function update(){
		  $this->admin->usertype_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'User Type Updated Successfully.');
		  redirect('admin/user_type');
 		 }
  
    function edit()
		{		$userID = $this->input->get('id');
			if($userID)

		   {
			$data['roles'] = $this->admin->get_user_role();	
			$asset = $this->admin->get_row_single('sc_tbl_role', $userID);	
			$data['id'] = $asset->id;
			$data['usertype'] = $asset->role_name;
			$data['desp'] = $asset->role_description;
			$data['title'] = "Master";
			$this->load->view('header', $data);			
			$this->load->view('admin/user_type/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_role', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'User Deleted Successfully.');
   redirect('admin/user_type');
  }	
  
  function _get_usertype($start = 0, $title = '', $paginate = true )

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
	
	function add_new()
		{	
			$data['roles'] = $this->admin->get_user_role();	
			//$data['dzongkhag'] = $this->admin->get_all_Dzongkhag();
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/user_type/add', $data);
			$this->load->view('footer');	
		}
	
}
