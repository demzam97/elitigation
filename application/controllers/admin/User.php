<?php
ini_set('memory_limit', '512M');
class User extends CI_Controller
{

	function __Construct()
	{
		parent::__Construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model', 'user');
		$this->user->check_valid_user();
		$this->load->helper('url');
		$this->load->model('admin_model', 'admin');
		$this->load->model('public_model', 'public');
		$this->load->model('Elat_model', 'elat');
		$this->load->library('session');
		$this->load->library("pagination");
		$this->load->library('custom_pagination');
		$this->load->helper('form');
	}
	function index()
	{
		$user_type = $this->session->userdata('user_type');
		$start = $this->uri->segment(4);
		$total_rows = count($this->_get_users(0, '', false));
		$config = $this->custom_pagination->admin_configuration();
		$config['base_url'] = site_url('admin/user/index');
		$config['total_rows'] = $total_rows;
		$this->pagination->initialize($config);
		if ($user_type == 17) {
			$data['users'] = $this->_get_users_courtadmin($start);
		} else {
			$data['users'] = $this->_get_users($start);
		}
		$data['roles'] = $this->admin->get_user_role();
		$data['dzongkhag'] = $this->admin->get_all_Dzongkhag();
		$data['title'] = "Master";
		$this->load->view('header', $data);
		$this->load->view('admin/users/view', $data);
		$this->load->view('footer');
	}

	function user_save()
	{

		if ($this->admin->count_no_fields('sc_tbl_user_profile', 'user_name', $this->input->post('username')) != '0') {

			echo '<script type="text/javascript">alert("Duplicate Data Exist!!!"); </script>';
		} else {
			$this->admin->user_save();
		}
		$this->session->set_flashdata('save', 'success');
		$this->session->set_flashdata('save_msg', 'User Created Successfully.');
		redirect('admin/user');
	}


	function user_update()
	{
		$this->admin->user_update();
		$this->session->set_flashdata('update', 'success');
		$this->session->set_flashdata('update_msg', 'User Updated Successfully.');
		redirect('admin/user');
	}

	function edit_users()
	{
		$userID = $this->input->get('id');
		if ($userID) {
			$data['roles'] = $this->admin->get_user_role();
			$data['courts'] = $this->admin->get_court_profile();
			$data['benches'] = $this->admin->get_benches();
			$asset = $this->admin->get_row_single('sc_tbl_user_profile', $userID);
			$data['id'] = $asset->id;
			$data['usertype'] = $asset->user_type;
			$data['name'] = $asset->judge_name;
			$data['username'] = $asset->user_name;
			$data['court'] = $asset->court;
			$data['ben'] = $asset->bench;
			$data['cid'] = $asset->CID;
			$data['eid'] = $asset->EID;
			$data['email'] = $asset->email;
			$data['contact'] = $asset->contact;
			$data['title'] = "Master";
			$this->load->view('header', $data);
			$this->load->view('admin/users/edit_user', $data);
			$this->load->view('footer');
		}
	}
	function transfer()
	{
		$userID = $this->input->get('id');
		if ($userID) {
			$data['roles'] = $this->admin->get_user_role();
			$data['courts'] = $this->admin->get_court_profile();
			$data['benches'] = $this->admin->get_benches();
			$asset = $this->admin->get_row_single('sc_tbl_user_profile', $userID);
			$data['id'] = $asset->id;
			$data['usertype'] = $asset->user_type;
			$data['name'] = $asset->judge_name;
			//$data['username'] = $asset->user_name;
			$data['dzongkhag'] = $this->admin->get_all_Dzongkhag();
			$data['court'] = $asset->court;
			$data['ben'] = $asset->bench;
			$data['cid'] = $asset->CID;
			$data['eid'] = $asset->EID;
			$data['title'] = "Master";
			$this->load->view('header', $data);
			$this->load->view('admin/users/transfer', $data);
			$this->load->view('footer');
		}
	}
	function transfer_update()
	{
		$insert_data['user_id'] = $this->input->post('id');
		$insert_data['from_court'] = $this->input->post('fcourtname');
		$insert_data['transfer_date'] = $this->input->post('torder_date');
		$insert_data['to_court'] = $this->input->post('tcourtname');
		$insert_data['transfer_order_no'] = $this->input->post('torder_no');
		$insert_data['effective_date'] = $this->input->post('edate');
		$insert_data['remarks'] = $this->input->post('remarks');
		$insert_data['updated_by'] = $this->session->userdata('user_id');
		$insert_data['updated_on'] = date('y-m-d');

		if ($this->db->insert('sc_tbl_transfer', $insert_data)) {
			$user_id = $this->input->post('id');
			$court = $this->input->post('tcourtname');
			$dzongkhag = $this->input->post('dzongkhagname');

			$this->admin->transfer_update($user_id, $court, $dzongkhag);
			$this->session->set_flashdata('update', 'success');
			$this->session->set_flashdata('update_msg', 'User Updated Successfully');
			redirect('admin/user');
		} else {
			echo "Not Success";
		}
	}
	function delete()
	{
		$id = $this->input->get('id');
		$this->db->delete('sc_tbl_user_profile', array('id' => $id));
		$this->session->set_flashdata('asset_class', 'success');
		$this->session->set_flashdata('asset_msg', 'User Deleted Successfully.');
		redirect('admin/user');
	}

	function reset_pass()
	{
		$id = $this->input->get('id');
		$pass = md5('pass@123');
		$data = array(
			'password' => $pass
		);
		$this->db->where('id', $id);
		$this->db->update('sc_tbl_user_profile', $data);
		$this->session->set_flashdata('asset_class', 'success');
		$this->session->set_flashdata('asset_msg', 'Password Reset successfully.');
		redirect('admin/user');
	}

	function _get_users($start = 0, $title = '', $paginate = true)

	{
		if ($paginate) {

			$per_page = $this->custom_pagination->per_page();

			$this->db->limit($per_page, $start);
		}

		if ($title != '') {

			$this->db->like('LTRIM(user_name)', $title, "after");	//change here

		}
		$this->db->where('user_type <=', '11');
		$this->db->order_by('judge_name', 'ASC');
		$query = $this->db->get('sc_tbl_user_profile');			//change here

		return $query->result();
	}


	function _get_users_courtadmin($start = 0, $title = '', $paginate = true)

	{
		$court_id = $this->session->userdata('court_id');
		if ($paginate) {

			$per_page = $this->custom_pagination->per_page();
			$this->db->where('court', $court_id);
			$this->db->limit($per_page, $start);
		}

		if ($title != '') {
			$this->db->where('court', $court_id);
			$this->db->like('LTRIM(user_name)', $title, "after");	//change here

		}
		$this->db->where('court', $court_id);
		$this->db->order_by('judge_name', 'ASC');
		$query = $this->db->get('sc_tbl_user_profile');			//change here

		return $query->result();
	}

	function add_users()
	{
		$data['roles'] = $this->admin->get_user_role();
		$data['courts'] = $this->admin->get_court_profile();
		$data['benches'] = $this->admin->get_benches();
		$data['title'] = "Master";
		$this->load->view('header', $data);
		$this->load->view('admin/users/add_users', $data);
		$this->load->view('footer');
	}

	function searchUser()
	{
		$user_type = $_POST['user_type'];
		$Court_id = $_POST['court_id'];

		if ($user_type != 0 && $Court_id != 0) {
			$this->db->select('*');
			$this->db->from('sc_tbl_user_profile');
			$this->db->where('user_type', $user_type);
			$this->db->where('court', $Court_id);
			$query = $this->db->get();
			$data['users'] = $query->result();
			$data['title'] = "Master";
			$this->load->view('header', $data);
			$this->load->view('admin/users/search_user', $data);
			$this->load->view('footer');
		} elseif ($user_type == 0 && $Court_id != 0) {
			$this->db->select('*');
			$this->db->from('sc_tbl_user_profile');
			$this->db->where('court', $Court_id);
			$query = $this->db->get();
			$data['users'] = $query->result();
			$data['title'] = "Master";
			$this->load->view('header', $data);
			$this->load->view('admin/users/search_user', $data);
			$this->load->view('footer');
		} elseif ($user_type != 0 && $Court_id == 0) {
			$this->db->select('*');
			$this->db->from('sc_tbl_user_profile');
			$this->db->where('user_type', $user_type);
			$query = $this->db->get();
			$data['users'] = $query->result();
			$data['title'] = "Master";
			$this->load->view('header', $data);
			$this->load->view('admin/users/search_user', $data);
			$this->load->view('footer');
		} else {
			$this->session->set_flashdata('update', 'success');
			$this->session->set_flashdata('update_msg', 'Filter is empty!');
			redirect('admin/user', 'refresh');
		}
	}

	function TypeSearchUser()
	{
		$userName = $_POST['userName'];

		$this->db->select('*');
		$this->db->from('sc_tbl_user_profile');
		$this->db->where('judge_name', $userName);
		$this->db->or_where('CID', $userName);
		$this->db->or_where('EID', $userName);
		$this->db->or_where('user_name', $userName);
		$query = $this->db->get();
		$data['users'] = $query->result();
		$data['title'] = "Master";
		$this->load->view('header', $data);
		$this->load->view('admin/users/search_user', $data);
		$this->load->view('footer');
	}
}

