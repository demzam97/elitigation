<?php
ini_set('memory_limit', '512M');
class Litigant_type extends CI_Controller {
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
	$total_rows = count($this->_get_latigant_type(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/litigant_type/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['litigant_type'] = $this->_get_latigant_type($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);	
    $this->load->view('admin/litigant_type/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_litigant_type','litigant_type',$this->input->post('lntt')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->litigant_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Litigant Type Created Successfully.');
			redirect('admin/litigant_type');
		}
 
 function update(){
		  $this->admin->litigant_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Litigant Type Updated Successfully.');
		  redirect('admin/litigant_type');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['roles'] = $this->admin->get_user_role();	
			$asset = $this->admin->get_row_single('sc_tbl_litigant_type', $id);	
			$data['id'] = $asset->id;
			$data['lntt'] = $asset->litigant_type;
			$data['lnttdesp'] = $asset->litigant_type_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);	
			$this->load->view('admin/litigant_type/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_litigant_type', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Litigant Deleted Successfully.');
   redirect('admin/litigant_type');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);	
			$this->load->view('admin/litigant_type/add');
			$this->load->view('footer');	
		}
  function _get_latigant_type($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(litigant_type)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_litigant_type');			//change here

		return $query->result();

	}	
	
}
