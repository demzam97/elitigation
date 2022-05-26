<?php
ini_set('memory_limit', '512M');
class Case_status extends CI_Controller {
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
			$this->load->model('public_model', 'public');
			$this->load->library('custom_pagination');
			$this->load->helper('form');
			
			
		}
	function index(){
  
    $start = $this->uri->segment(4);
	$total_rows = count($this->_get_case_status(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/case_status/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['case_status'] = $this->_get_case_status($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);	
    $this->load->view('admin/case_status/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_casetype','caseType',$this->input->post('ct')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->case_status_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Case Status Created Successfully.');
			redirect('admin/case_status');
		}
 
 function update(){
		  $this->admin->case_status_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Case Status Updated Successfully.');
		  redirect('admin/case_status');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$asset = $this->admin->get_row_single('sc_tbl_casetype', $id);	
			$data['id'] = $asset->id;
			$data['name'] = $asset->caseType;
			$data['desp'] = $asset->caseType_Description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/case_status/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_casetype', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Case Status Deleted Successfully.');
   redirect('admin/case_status');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);			
			$this->load->view('admin/case_status/add');
			$this->load->view('footer');	
		}
  function _get_case_status($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(caseType)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_casetype');			//change here

		return $query->result();

	}	
	
}
