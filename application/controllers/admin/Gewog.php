<?php
ini_set('memory_limit', '512M'); 
class Gewog extends CI_Controller {

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
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$start = $this->uri->segment(4);
			$total_rows = count($this->_get_gewog(0, '', false));
			$config = $this->custom_pagination->admin_configuration();
			$config['base_url'] = site_url('admin/gewog/index');
			$config['total_rows'] = $total_rows;
			$this->pagination->initialize($config);
			$data['gewog'] = $this->_get_gewog($start);	
			$data['title'] = "Master";
			$this->load->view('header', $data);	
			$this->load->view('admin/gewog/view',$data);
			$this->load->view('footer');	
		}
		
		
		 function save(){
		
			if($this->admin->count_no_fields('sc_tbl_master_gewog','Name',$this->input->post('gewog')) != '0')
				{
				
				echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
				
				}
				else{
			$this->admin->gewog_save();	
			}
			$this->session->set_flashdata('save', 'success');
	        $this->session->set_flashdata('save_msg', 'Gewog Created Successfully.');
			redirect('admin/gewog');
		}
 
 function update(){
		  $this->admin->gewog_update();
		  $this->session->set_flashdata('update', 'success');
	      $this->session->set_flashdata('update_msg', 'Gewog Updated Successfully.');
		  redirect('admin/gewog');
 		 }
  
    function edit()
		{		$id = $this->input->get('id');
			if($id)

		   {
			$data['dzongkhag'] = $this->admin->getAll();
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$asset = $this->admin->get_row_single_gewog('sc_tbl_master_gewog', $id);	
			$data['id'] = $asset->GewogID;
			$data['dzoid'] = $asset->DzongkhagID;
			$data['gewog'] = $asset->Name;	
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/gewog/edit', $data);
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
			$data['dungkhag'] = $this->admin->getAll_Dungkhag();
			$data['title'] = "Master";
			$this->load->view('header', $data);		
			$this->load->view('admin/gewog/add', $data);
			$this->load->view('footer');	
		}
  function _get_gewog($start = 0, $title = '', $paginate = true )

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

		$query = $this->db->get('sc_tbl_master_gewog');			//change here

		return $query->result();

	}	
	
	function search()
	{
		$title = $this->input->post('value');
		$gewogs = $this->_getgewog($title);
		if($gewogs){
			$i = 1;  
			foreach($gewogs as $row):
			 echo "<tr>";
			 echo    "<td>$i</td>";
			 echo    "<td>".$this->admin->get_Dzongkhag($row->DzongkhagID)."</td>";
			 echo    "<td>".$row->Name."</td>";
			 echo    "<td>";
			 ?>
			 <a href="<?php echo site_url('admin/gewog/edit')?>?id=<?php echo $row->GewogID; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="<?php echo site_url('admin/gewog/delete')?>?id=<?php echo $row->GewogID; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
			 <?php
			 echo "</td>";

			 echo  "</tr>";
			 $i++; endforeach;
			}else{

			echo '<tr><td colspan="4" align="center">No Result Found!</td></tr>';

		}

	}
	function _getgewog($title='')
	{
		   $this->db->select('*');
		   $this->db->from('sc_tbl_master_gewog');
		   $this->db->like('Name', $title);
		   
		   $query = $this->db->get();
		   return $query->result();
	}
	
}

