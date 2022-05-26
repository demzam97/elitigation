<?php
ini_set('memory_limit', '512M');
class Forms extends CI_Controller {

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
	$total_rows = count($this->_get_form(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/forms/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['form'] = $this->_get_form($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);	
    $this->load->view('admin/forms/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_forms','form_name',$this->input->post('fname')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->form_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Form Created Successfully.');
			redirect('admin/forms');
		}
 
 function update(){
		  $this->admin->form_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Form Updated Successfully.');
		  redirect('admin/forms');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$asset = $this->admin->get_row_single('sc_tbl_forms', $id);	
			$data['id'] = $asset->id;
			$data['fname'] = $asset->form_name;
			$data['fdesp'] = $asset->form_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);			
			$this->load->view('admin/forms/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_forms', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Form Deleted Successfully.');
   redirect('admin/forms');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/forms/add');
			$this->load->view('footer');	
		}
  function _get_form($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(form_name)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_forms');			//change here

		return $query->result();

	}	
	
}
