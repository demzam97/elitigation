<?php 
ini_set('memory_limit', '512M');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Case_type_3 extends CI_Controller {
 function __construct() {
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
	$total_rows = count($this->_get_case_type_3(0, '', false));
	$config = $this->custom_pagination->admin_configuration();
	$config['base_url'] = site_url('admin/case_type_3/index');
	$config['total_rows'] = $total_rows;
	$this->pagination->initialize($config);
	$data['case_type_3'] = $this->_get_case_type_3($start);	
	$data['title'] = "JMaster";
			$this->load->view('header', $data);		
    $this->load->view('admin/case_type_3/view',$data);
	$this->load->view('footer');	
  }
 
  function save(){
		
			if($this->admin->count_no_fields('sc_tbl_casetypelevel3','caseTypelevel3',$this->input->post('case_type_3')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->case_type_3_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Case Type Level 2 Created Successfully.');
			redirect('admin/case_type_3');
		}
 
 function update(){
		  $this->admin->case_type_3_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Case Type Level 2 Updated Successfully.');
		  redirect('admin/case_type_3');
 		 }
  
 function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['case_type'] = $this->admin->getAll_case_type2();
			$asset = $this->admin->get_row_single('sc_tbl_casetypelevel3', $id);	
			$data['id'] = $asset->id;
			$data['case_type_2'] = $asset->caseTypelevel2_id;
			$data['case_type_3'] = $asset->caseTypelevel3;
			$data['desp'] = $asset->caseTypelevel3_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);			
			$this->load->view('admin/case_type_3/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_casetypelevel1', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Case Type Level 2 Deleted Successfully.');
   redirect('admin/case_type_3');
  }	
  function add_new()
		{				
			$data['case_type_2'] = $this->admin->getAll_case_type2();
			$data['title'] = "JMaster";
			$this->load->view('header', $data);			
			$this->load->view('admin/case_type_3/add', $data);
			$this->load->view('footer');	
		}
  function _get_case_type_3($start = 0, $title = '', $paginate = true )

	{
		if($paginate)

		{

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);

		}

		if($title != '') 

		{

			$this->db->like('LTRIM(caseTypelevel3)', $title, "after");	//change here

		}

		$query = $this->db->get('sc_tbl_casetypelevel3');			//change here

		return $query->result();

	}

       function activeinactive()
           { 
            $this->user->check_valid_user_elat();	  
            $id = $this->input->post('id');
            $option = $this->input->post('activeinactive');
            $this->db->set('status',$option)
            ->where('id',$id)
            ->update('sc_tbl_casetypelevel3');
            $uid = $this->session->userdata('user_id');
            redirect('admin/case_type_3/index');
             
          }	
	
}
