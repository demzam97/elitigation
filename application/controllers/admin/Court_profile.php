<?php
ini_set('memory_limit', '512M');
class Court_profile extends CI_Controller {

	function __Construct()
		{
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
	function index()
		{   
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['court_type'] = $this->admin->getAll_court_type();	
			$start = $this->uri->segment(4);
			$total_rows = count($this->_get_court_profile(0, '', false));
			$config = $this->custom_pagination->admin_configuration();
			$config['base_url'] = site_url('admin/court_profile/index');
			$config['total_rows'] = $total_rows;
			$this->pagination->initialize($config);
			$data['court_profile'] = $this->_get_court_profile($start);	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);		
			$this->load->view('admin/court_profile/view',$data);
			$this->load->view('footer');			
		}
		
		
function save(){

if($this->admin->count_no_fields('sc_tbl_court_profile','court_name',$this->input->post('name')) != '0')
	{
	
	echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
	
	}
	else{
$this->admin->court_profile_save();	
}
$this->session->set_flashdata('save', 'success');
$this->session->set_flashdata('save_msg', 'Court Profile Created Successfully.');
redirect('admin/court_profile');
}
 
 function update(){
		  $this->admin->court_profile_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Court Profile Updated Successfully.');
		  redirect('admin/court_profile');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['court_type1'] = $this->admin->getAll_court_type();	
			$asset = $this->admin->get_row_single_court_profile('sc_tbl_court_profile', $id);	
			$data['id'] = $asset->id;
			$data['court_type'] = $asset->courttype_id;
			$data['dzoid'] = $asset->dzongkhag_id;
			$data['dungid'] = $asset->dungkhag_id;
			$data['court_profile'] = $asset->court_name;
			$data['desp'] = $asset->court_type_description;	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);	
			$this->load->view('admin/court_profile/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_court_profile', array('id' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Court Profile Deleted Successfully.');
   redirect('admin/court_profile');
  }	
  function add_new()
		{	
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['court_type'] = $this->admin->getAll_court_type();	
			$data['title'] = "JMaster";
			$this->load->view('header', $data);	
			$this->load->view('admin/court_profile/add', $data);
			$this->load->view('footer');	
		}
  function _get_court_profile($start = 0, $title = '', $paginate = true )

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

		$query = $this->db->get('sc_tbl_court_profile');			//change here

		return $query->result();

	}	
	function get_dungkhag()
	  {			
		$q=$_GET['q'];
		$qryFrm1 = $this->db->query("select * from sc_tbl_master_dungkhag where DzongkhagID ='$q'");
		$fields1= $qryFrm1->result();
		echo "<select name=dungkhag id = dungkhag class=form-control_admin span12>";
		echo "<option value=0 selected>---Select One---</option>";	
		foreach($fields1 as $fld1){
		echo "<option value=$fld1->DungkhagID>$fld1->Name</option>";         
		}
	    echo "</select>";
		
	  }
	
}

