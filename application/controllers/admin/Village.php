<?php
ini_set('memory_limit', '512M'); 
class Village extends CI_Controller {

	function __construct()	{
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
	
	function index()
		{
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['gewog'] = $this->admin->getAll_Gewog();	
			$start = $this->uri->segment(4);
			$total_rows = count($this->_get_village(0, '', false));
			$config = $this->custom_pagination->admin_configuration();
			$config['base_url'] = site_url('admin/village/index');
			$config['total_rows'] = $total_rows;
			$this->pagination->initialize($config);
			$data['village'] = $this->_get_village($start);	
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/village/view',$data);
			$this->load->view('footer');			
		}
		
		
function save(){

if($this->admin->count_no_fields('sc_tbl_master_village','Name',$this->input->post('village')) != '0')
	{
	
	echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
	
	}
	else{
$this->admin->village_save();	
}
$this->session->set_flashdata('save', 'success');
$this->session->set_flashdata('save_msg', 'Village Created Successfully.');
redirect('admin/village');
}
 
 function update(){
		  $this->admin->village_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Gewog Updated Successfully.');
		  redirect('admin/village');
 		 }
  
    function edit()
		{	
			$id = $this->input->get('id');
			if($id)

		   {
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['gewog'] = $this->admin->getAll_Gewog();
			$asset = $this->admin->get_row_single_gewog('sc_tbl_master_village', $id);	
			$data['id'] = $asset->VillageID;
			$data['dzoid'] = $asset->DzongkhagID;
			$data['dung'] = $asset->DungkhagID;
			$data['gewodID'] = $asset->GewogID;
			$data['village'] = $asset->Name;	
			$data['title'] = "Master";
			$this->load->view('header', $data);	
			$this->load->view('admin/village/edit', $data);
			$this->load->view('footer');	
			}			
		
		}
		
   function delete(){
    $id = $this->input->get('id');
    $this->db->delete('sc_tbl_master_gewog', array('GewogID' => $id));
	$this->session->set_flashdata('asset_class', 'success');
	$this->session->set_flashdata('asset_msg', 'Gewog Deleted Successfully.');
   redirect('admin/gewog');
  }	
  function add_new()
		{	
			$data['dzongkhag'] = $this->admin->getAll();
			$data['gewog'] = $this->admin->getAll_Gewog();	
			$data['title'] = "Master";
			$this->load->view('header', $data);	
			$this->load->view('admin/village/add', $data);
			$this->load->view('footer');	
		}
  function _get_village($start = 0, $title = '', $paginate = true )

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

		$query = $this->db->get('sc_tbl_master_village');			//change here

		return $query->result();

	}	
	
	function search()
	{
		$title = $this->input->post('value');
		$villages = $this->_getvillage($title);
		if($villages){
			$i = 1;  
			foreach($villages as $row):
			 echo "<tr>";
			 echo    "<td>$i</td>";
			 echo    "<td>".$this->admin->get_Dzongkhag($row->DzongkhagID)."</td>";
			 echo    "<td>".$this->admin->get_Gewog($row->GewogID)."</td>";
			 echo    "<td>".$row->Name."</td>";
			 echo    "<td>";
			 ?>
			 <a href="<?php echo site_url('admin/village/edit')?>?id=<?php echo $row->GewogID; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="<?php echo site_url('admin/village/delete')?>?id=<?php echo $row->GewogID; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
			 <?php
			 echo "</td>";
			 echo  "</tr>";
			 $i++; endforeach;
			}else{

			echo '<tr><td colspan="5" align="center">No Result Found!</td></tr>';

		}

	}
	function _getvillage($title='')
	{
		   $this->db->select('*');
		   $this->db->from('sc_tbl_master_village');
		   $this->db->like('Name', $title);
		   $query = $this->db->get();
		   return $query->result();
	}
	
	
	
}

