<?php
ini_set('memory_limit', '512M');
class Judicial_process extends CI_Controller {

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
	$total_rows = count($this->_get_judicial_process(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/judicial_process/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['jc'] = $this->_get_judicial_process($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);	
    $this->load->view('admin/judicial_process/view', $data);
	$this->load->view('footer');	
  }
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_judicial_process','process_name',$this->input->post('jpname')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->judicial_process_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Judicial Process Created Successfully.');
			redirect('admin/judicial_process');
		}
 
 function update(){
		  $this->admin->judicial_process_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Judicial Process Updated Successfully.');
		  redirect('admin/judicial_process');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$asset = $this->admin->get_row_single('sc_tbl_judicial_process', $id);	
			$data['id'] = $asset->id;
			$data['jpname'] = $asset->process_name;
			$data['jpdesp'] = $asset->process_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/judicial_process/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_judicial_process', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Judicial Process Deleted Successfully.');
   redirect('admin/judicial_process');
  }	
  function add_new()
		{	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/judicial_process/add');
			$this->load->view('footer');	
		}
  function _get_judicial_process($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(process_name)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_judicial_process');			//change here

		return $query->result();

	}	
	
}
