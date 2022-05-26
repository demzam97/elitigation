<?php
ini_set('memory_limit', '512M');
class Disposal_type extends CI_Controller {

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
			$this->load->model('public_model', 'public');
			$this->load->library("pagination");
			$this->load->library('custom_pagination');
			$this->load->helper('form');
			
			
		}
	function index(){
  
    $start = $this->uri->segment(4);
	$total_rows = count($this->_get_disposal_type(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/disposal_type/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['disposal_type'] = $this->_get_disposal_type($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);	
    $this->load->view('admin/disposal_type/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_disposal_type','disposal_type',$this->input->post('dt')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->disposal_type_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Disposal Type Created Successfully.');
			redirect('admin/disposal_type');
		}
 
 function update(){
		  $this->admin->disposal_type_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Disposal Type Updated Successfully.');
		  redirect('admin/disposal_type');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$asset = $this->admin->get_row_single('sc_tbl_disposal_type', $id);	
			$data['id'] = $asset->id;
			$data['name'] = $asset->disposal_type;
			$data['desp'] = $asset->disposal_type_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/disposal_type/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_disposal_type', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Disposal Type Deleted Successfully.');
   redirect('admin/disposal_type');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/disposal_type/add');
			$this->load->view('footer');	
		}
  function _get_disposal_type($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(disposal_type)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_disposal_type');			//change here

		return $query->result();

	}	
	
}
