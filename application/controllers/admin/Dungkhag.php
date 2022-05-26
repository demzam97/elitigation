<?php 
ini_set('memory_limit', '512M');
class Dungkhag extends CI_Controller {

	function __construct()	{
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
	
	function index()
		{
			$data['dzongkhag'] = $this->admin->getAll();
			$start = $this->uri->segment(4);
			$total_rows = count($this->_get_dungkhag(0, '', false));
			$config = $this->custom_pagination->admin_configuration();
			$config['base_url'] = site_url('admin/dungkhag/index');
			$config['total_rows'] = $total_rows;
			$this->pagination->initialize($config);
			$data['dungkhag'] = $this->_get_dungkhag($start);	
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/dungkhag/view',$data);
			$this->load->view('footer');	
		}
		
		
		 function save(){
		
			if($this->admin->count_no_fields('sc_tbl_master_dungkhag','Name',$this->input->post('dungkhag')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->dungkhag_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Dungkhag Created Successfully.');
			redirect('admin/dungkhag');
		}
 
 function update(){
		  $this->admin->dungkhag_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Dungkhag Updated Successfully.');
		  redirect('admin/dungkhag');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$asset = $this->admin->get_row_single_dungkhag('sc_tbl_master_dungkhag', $id);	
			$data['id'] = $asset->DungkhagID;
			$data['dzoid'] = $asset->DzongkhagID;
			$data['dungkhag'] = $asset->Name;	
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/dungkhag/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_master_gewog', array('DungkhagID' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Dungkhag Deleted Successfully.');
   redirect('admin/dungkhag');
  }	
  function add_new()
		{	
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/dungkhag/add', $data);
			$this->load->view('footer');	
		}
  function _get_dungkhag($start = 0, $title = '', $paginate = true )

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

		$query = $this->db->get('sc_tbl_master_dungkhag');			//change here

		return $query->result();

	}	
	
}

