<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');
class Dzongkhag extends CI_Controller {
 function __construct() {
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
	$total_rows = count($this->_get_dzongkhag(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/dzongkhag/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['dzongkhag'] = $this->_get_dzongkhag($start);	
	$data['title'] = "Master";
			$this->load->view('header', $data);	
    $this->load->view('admin/dzongkhag/view',$data);
	$this->load->view('footer');	
  }
 
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_master_dzongkhag','Name',$this->input->post('dzongkhag')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->dzongkhag_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Dzongkhag Created Successfully.');
			redirect('admin/dzongkhag');
		}
 
 function update(){
		  $this->admin->dzongkhag_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Dzongkhag Updated Successfully.');
		  redirect('admin/dzongkhag');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['roles'] = $this->admin->get_user_role();	
			$asset = $this->admin->get_row_single_dzo('sc_tbl_master_dzongkhag', $id);	
			$data['id'] = $asset->DzongkhagID;
			$data['dzongkhag'] = $asset->Name;	
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/dzongkhag/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_master_dzongkhag', array('DzongkhagID' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Dzongkhag Deleted Successfully.');
   redirect('admin/dzongkhag');
  }	
  function add_new()
		{	
			//$data['roles'] = $this->admin->get_user_role();	
			//$data['dzongkhag'] = $this->admin->get_all_Dzongkhag();
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/dzongkhag/add');
			$this->load->view('footer');	
		}
  function _get_dzongkhag($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(Name)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_master_dzongkhag');			//change here

		return $query->result();

	}	
	
}
