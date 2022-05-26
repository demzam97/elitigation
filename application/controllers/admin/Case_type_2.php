<?php 
ini_set('memory_limit', '512M');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Case_type_2 extends CI_Controller {
 function __construct() {
        parent::__Construct();
		
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('user_model','user');
			$this->user->check_valid_user();
			$this->load->helper('url');
			$this->load->model('admin_model', 'admin');
			$this->load->model('public_model', 'public');
			$this->load->library('session');
			$this->load->library("pagination");
			$this->load->library('custom_pagination');
			$this->load->helper('form');
    }
 
 function index(){
  
    $start = $this->uri->segment(4);
	$total_rows = count($this->_get_case_type_2(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/case_type_2/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['case_type_2'] = $this->_get_case_type_2($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);		
    $this->load->view('admin/case_type_2/view',$data);
	$this->load->view('footer');	
  }
 
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_casetypelevel2','caseTypeleve2',$this->input->post('case_type_2')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->case_type_2_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Case Type Level 2 Created Successfully.');
			redirect('admin/case_type_2');
		}
 
 function update(){
		  $this->admin->case_type_2_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Case Type Level 2 Updated Successfully.');
		  redirect('admin/case_type_2');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['case_type'] = $this->admin->getAll_case_type1();
			$asset = $this->admin->get_row_single('sc_tbl_casetypelevel2', $id);	
			$data['id'] = $asset->id;
			$data['case_type_1'] = $asset->caseTypelevel1_id;
			$data['case_type_2'] = $asset->caseTypeleve2;
			$data['desp'] = $asset->caseTypelevel2_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);			
			$this->load->view('admin/case_type_2/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_casetypelevel1', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Case Type Level 2 Deleted Successfully.');
   redirect('admin/case_type_2');
  }	
  function add_new()
		{				
			$data['case_type_1'] = $this->admin->getAll_case_type1();
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/case_type_2/add', $data);
			$this->load->view('footer');	
		}
  function _get_case_type_2($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(caseTypelevel2)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_casetypelevel2');			//change here

		return $query->result();

	}

      function activeinactive()
           { 
            $this->user->check_valid_user_elat();	  
            $id = $this->input->post('id');
            $option = $this->input->post('activeinactive');
            $this->db->set('status',$option)
            ->where('id',$id)
            ->update('sc_tbl_casetypelevel2');
            $uid = $this->session->userdata('user_id');
            redirect('admin/case_type_2/index');
             
          }	
	
}
