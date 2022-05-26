<?php
ini_set('memory_limit', '512M');
class Case_ground extends CI_Controller {
	function __Construct()
		{
			parent::__Construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('user_model','user');
			$this->user->check_valid_user();
			$this->load->helper('url');
			$this->load->model('public_model', 'public');
			$this->load->model('admin_model', 'admin');
			$this->load->library('session');
			$this->load->library("pagination");
			$this->load->library('custom_pagination');
			$this->load->helper('form');
			
			
		}
	function index(){
  
    $start = $this->uri->segment(4);
	$total_rows = count($this->_get_case_ground(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/case_ground/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['case_ground'] = $this->_get_case_ground($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);		
    $this->load->view('admin/case_ground/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_case_ground','case_ground',$this->input->post('cg')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->case_ground_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Case Ground Created Successfully.');
			redirect('admin/case_ground');
		}
 
 function update(){
		  $this->admin->case_ground_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Case Ground Updated Successfully.');
		  redirect('admin/case_ground');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$asset = $this->admin->get_row_single('sc_tbl_case_ground', $id);	
			$data['id'] = $asset->id;
			$data['name'] = $asset->case_ground;
			$data['desp'] = $asset->case_ground_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/case_ground/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_case_ground', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Case Ground Deleted Successfully.');
   redirect('admin/case_ground');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/case_ground/add');
			$this->load->view('footer');	
		}
  function _get_case_ground($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(case_ground)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_case_ground');			//change here

		return $query->result();

	}	
	
}
