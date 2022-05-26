<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Publicregistration extends CI_Controller
{

  function __Construct()
  {
    parent::__Construct();
    header('Cache-Control: no-cache, must-revalidate, max-age = 0');
    header('Cache-Control: post-check = 0, pre-check = 0', false);
    header('Pragma: no-cache');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('download');
    $this->load->library('form_validation');
    $this->load->model('user_model', 'user');
    $this->load->model('public_model', 'public');
    $this->load->model('Elat_model', 'elat');
    $this->load->model('Elatappeal_model', 'appeal');
  }

  public function store_bhutanese_register_other($cidno)
  {
    $usertype = $this->user->get_user_type($cidno);
    $uid = $this->user->get_user_id($cidno);
    $email = $this->user->get_user_email($uid);
    $name = $this->user->get_user_name($uid);
    $number = $this->user->get_user_contact($uid);

    $this->db->where('id', $uid);
    $update_data['user_type'] = "12";
    $this->db->update('sc_tbl_user_profile', $update_data);

    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $subject = "Judiciary Notice";
    $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Your role in the system is set to Applicant / Petitioner.
         <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($email);
    $this->email->subject($subject);
    $this->email->message($message);
    if ($this->email->send()) {
    } else {
      ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
    }
    $tom = $number;
    $mmsg = urlencode("Your role in the system is set to Applicant / Petitioner.");
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $data['cidno'] = $cidno;
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/success_message', $data);
    $this->load->view('elitigation/footer');
  }

  public function store_bhutanese_register_nocid()
  {
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'user_type' => $this->input->post('user_type'),
      'routepermitno' => $this->input->post('routepermitno'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),
      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('CID', 'CID', 'required|is_unique[sc_tbl_user_profile.CID]');
    if ($this->form_validation->run() == FALSE) {
      $data['cidno'] = $this->input->post('cid');
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/cidbhutanese_register', $data);
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_bht_registrations', $data);
      $eid = $this->db->insert_id();
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);

      $userdata = [
        'user_type' => '12',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('cid'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('mobile'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "Judiciary Notice";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('mobile'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message', $data);
      $this->load->view('elitigation/footer');
    }
  }

  public function store_nonbhutanese_register()
  {
    $data = [
      'user_type' => $this->input->post('user_type'),
      'nationality' => $this->input->post('nationality'),
      'wp_passport' => $this->input->post('wp_passport'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $this->input->post('dob'),
      'state' => $this->input->post('state'),
      'district' => $this->input->post('district'),
      'occupation' => $this->input->post('occupation'),
      'father_mother_name' => $this->input->post('father_mother_name'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[sc_tbl_user_profile.email]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/nonbhutanese_register');
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_nonbht_registrations', $data);
      $userdata = [
        'user_type' => '16',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('wp_passport'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('mobile'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "Judiciary Notice";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }
      //$tom = '17172308';
      $tom = trim($this->input->post('mobile'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message', $data);
      $this->load->view('elitigation/footer');
    }
  }

  public function store_organization_register()
  {
    $data = [
      'user_type' => $this->input->post('user_type'),
      'org_type' => $this->input->post('org_type'),
      'org_name' => $this->input->post('orgname'),
      'licenseno' => $this->input->post('licenseno'),
      'office_address' => $this->input->post('office_address'),
      'po_box' => $this->input->post('po_box'),
      'phone' => $this->input->post('phone'),
      'fax' => $this->input->post('fax'),
      'email' => $this->input->post('email'),
      'cid' => $this->input->post('cid'),
      'contact_person' => $this->input->post('contact_person'),
      'contactperson_mobile' => $this->input->post('contactperson_mobile'),
      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('elat_tbl_org_registrations', $data);
    $userdata = [
      'user_type' => '15',
      'judge_name' => $this->input->post('contact_person'),
      'CID' => $this->input->post('cid'),
      'user_name' => $this->input->post('email'),
      'email' => $this->input->post('email'),
      'password' => md5('pass@123'),
      'contact' => $this->input->post('contactperson_mobile'),
      'created_on' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('sc_tbl_user_profile', $userdata);
    $latcid = $this->public->checkDuplicateLatigantOrg($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['is_org'] = '1';
      $insert_data['Organization_Name'] = $this->input->post('orgname');
      $insert_data['license_id'] = $this->input->post('licenseno');
      $insert_data['litigant_name'] = $this->input->post('contact_person');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = "";
      $insert_data['litigant_gender'] = "";
      $insert_data['litigant_DOB'] = "";
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = "";
      $insert_data['litigant_thram_no'] = "";
      $insert_data['litigant_dzongkhag'] = "";
      $insert_data['litigant_dungkhag'] = "";
      $insert_data['litigant_gewog'] = "";
      $insert_data['litigant_village'] = "";
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('contactperson_mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('office_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    } else {
      $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
      $this->db->where('id', $latid);
      $update_data['litigant_phone'] = $this->input->post('mobile');
      $update_data['litigant_email'] = $this->input->post('email');
      $update_data['updatedby'] = $this->session->userdata('user_id');
      $this->db->update('sc_tbl_litigant', $update_data);
?>
      <script type="text/javascript">
        alert("You are already Registered as Litigant, Phone Number and eMail are updated");
      </script>
    <?php

    }
    $to = $this->input->post('email');
    $name = $this->input->post('contact_person');
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $subject = "Judiciary Notice";
    $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';

    $this->email->set_newline("\r\n");
    //$this->email->from($from);
    $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    if ($this->email->send()) {
    } else { ?>
      <script type="text/javascript">
        alert("Could not Reach SMPT server, eMail not sent");
      </script>
    <?php }

    $tom = trim($this->input->post('contactperson_mobile'));
    $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/success_message', $data);
    $this->load->view('elitigation/footer');
  }


  function bht_registration()
  {
    $data['cidno'] = $this->input->post('cid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/bhutanese_register', $data);
    $this->load->view('elitigation/footer');
  }

  function client_registration()
  {
    $data['cidno'] = $this->input->post('cid');
    $data['caseid'] = $this->input->post('caseid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/client_register', $data);
    $this->load->view('elitigation/footer');
  }

  function victim_registration()
  {
    $data['cidno'] = $this->input->post('cid');
    $data['caseid'] = $this->input->post('caseid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/victim_register', $data);
    $this->load->view('elitigation/footer');
  }


  function bht_registration_lawyer()
  {
    $data['cidno'] = $this->input->post('cid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/lawyer_register', $data);
    $this->load->view('elitigation/footer');
  }
  function bht_registration_lawyer_dzo()
  {
    $data['cidno'] = $this->input->post('cid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/lawyer_register_dzo', $data);
    $this->load->view('elitigation/footer');
  }


  public function store_bhutanese_register()
  {

    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'user_type' => $this->input->post('user_type'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_bht_registrations', $data);
    $eid = $this->db->insert_id();
    $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    } else {
      $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
      $this->db->where('id', $latid);
      $update_data['litigant_phone'] = $this->input->post('mobile');
      $update_data['litigant_email'] = $this->input->post('email');
      $update_data['updatedby'] = $this->session->userdata('user_id');
      $this->db->update('sc_tbl_litigant', $update_data);
    ?>
      <script type="text/javascript">
        alert("You are already Registered as Litigant, Phone Number and eMail are updated");
      </script>
    <?php

    }
    $userdata = [
      'user_type' => '12',
      'judge_name' => $this->input->post('name'),
      'CID' => $this->input->post('cid'),
      'user_name' => $this->input->post('email'),
      'email' => $this->input->post('email'),
      'password' => md5('pass@123'),
      'contact' => $this->input->post('mobile'),
      'created_on' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('sc_tbl_user_profile', $userdata);
    $name = $this->input->post('name');
    $to = $this->input->post('email');
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $subject = "Judiciary Notice";
    $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
    $this->email->set_newline("\r\n");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    if ($this->email->send()) {
    } else {
    ?>
      <script type="text/javascript">
        alert("Could not Reach SMPT server, eMail not sent");
      </script>
<?php
    }
    $tom = trim($this->input->post('mobile'));
    $mmsg = urlencode("eLitigation service signup Successful, details has been sent to your email.");
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/success_message', $data);
    $this->load->view('elitigation/footer');
  }


  public function store_client_register()
  {
    $uid = $this->session->userdata('user_id');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'mobile2' => $this->input->post('amobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('elat_tbl_client_registrations', $data);
    $eid = $this->db->insert_id();
    $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    }
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/success_message_3', $data);
    $this->load->view('elitigation/footer');
  }

  public function store_victim_register()
  {
    $uid = $this->session->userdata('user_id');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'mobile2' => $this->input->post('amobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('elat_tbl_client_registrations', $data);
    $eid = $this->db->insert_id();
    $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    }
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/success_message_3', $data);
    $this->load->view('elitigation/footer');
  }

  public function store_elawyer_register()
  {
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data =  [
      'user_type' => $this->input->post('user_type'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'mobile' => $this->input->post('contactno'),
      'email' => $this->input->post('email'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'cur_address' => $this->input->post('cur_address'),
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
   // $this->form_validation->set_rules('email', 'Email', 'required|is_unique[sc_tbl_user_profile.email]');
    /*if ($this->form_validation->run() == FALSE) {
      $data['cidno'] = $this->input->post('cid');
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/lawyer_register', $data);
      $this->load->view('elitigation/footer');
    } else {*/
      $this->db->insert('elat_tbl_bht_registrations', $data);
      $eid = $this->db->insert_id();
      $insert_data['L_Name'] = $this->input->post('name');
      $insert_data['CID'] = $this->input->post('cid');
      $insert_data['license'] = $this->input->post('license');
      $insert_data['Mobile'] = $this->input->post('contactno');
      $insert_data['email'] = $this->input->post('email');
      $insert_data['Firm'] = $this->input->post('fname');
      $insert_data['alternate_mobile'] =  $this->input->post('alternate_mobile');
      $insert_data['cur_address_house'] =  $this->input->post('cur_address_house');
      $insert_data['cur_address_street'] =  $this->input->post('cur_address_street');
      $insert_data['cur_address_place'] =  $this->input->post('cur_address_place');
      $insert_data['cur_address_country'] =  $this->input->post('cur_address_country');

      $insert_data['barcouncilcertificate'] =  $_FILES["barcouncilcertificate"]["name"];
      $this->db->insert('sc_tbl_lawyer', $insert_data);
      $folder = "images/barcouncilcertificate/";
      move_uploaded_file($_FILES["barcouncilcertificate"]["tmp_name"], "$folder" . $_FILES["barcouncilcertificate"]["name"]);


      $userdata = [
        'user_type' => '13',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('cid'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('contactno'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "eLitigation Signup";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                                   <br /><br /> Username: ' . $to . '
                                   <br /> Password: pass@123
                                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';

      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('contactno'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message', $data);
      $this->load->view('elitigation/footer');
    //}
  }

  public function store_elawyer_register_dzo()
  {

    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data =  [
      'user_type' => $this->input->post('user_type'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'mobile' => $this->input->post('contactno'),
      'email' => $this->input->post('email'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'cur_address' => $this->input->post('cur_address'),
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[sc_tbl_user_profile.email]');
    if ($this->form_validation->run() == FALSE) {
      $data['cidno'] = $this->input->post('cid');
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/lawyer_register_dzo', $data);
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_bht_registrations', $data);
      $eid = $this->db->insert_id();
      $insert_data['L_Name'] = $this->input->post('name');
      $insert_data['CID'] = $this->input->post('cid');
      $insert_data['license'] = $this->input->post('license');
      $insert_data['Mobile'] = $this->input->post('contactno');
      $insert_data['email'] = $this->input->post('email');
      $insert_data['Firm'] = $this->input->post('fname');
      $insert_data['alternate_mobile'] =  $this->input->post('alternate_mobile');
      $insert_data['cur_address_house'] =  $this->input->post('cur_address_house');
      $insert_data['cur_address_street'] =  $this->input->post('cur_address_street');
      $insert_data['cur_address_place'] =  $this->input->post('cur_address_place');
      $insert_data['cur_address_country'] =  $this->input->post('cur_address_country');

      $insert_data['barcouncilcertificate'] =  $_FILES["barcouncilcertificate"]["name"];
      $this->db->insert('sc_tbl_lawyer', $insert_data);
      $folder = "images/barcouncilcertificate/";
      move_uploaded_file($_FILES["barcouncilcertificate"]["tmp_name"], "$folder" . $_FILES["barcouncilcertificate"]["name"]);


      $userdata = [
        'user_type' => '13',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('cid'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('contactno'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "eLitigation Signup";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                                   <br /><br /> Username: ' . $to . '
                                   <br /> Password: pass@123
                                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';

      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('contactno'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message_dzo', $data);
      $this->load->view('elitigation/footer');
    }
  }


  //////DZONGKHA///////
  function bht_registration_dzo()
  {
    $data['cidno'] = $this->input->post('cid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/register/bhutanese_register_dzo', $data);
    $this->load->view('elitigation/footer');
  }
  public function store_bhutanese_register_dzo()
  {
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'user_type' => $this->input->post('user_type'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[sc_tbl_user_profile.email]');
    if ($this->form_validation->run() == FALSE) {
      $data['cidno'] = $this->input->post('cid');
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/bhutanese_register_dzo', $data);
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_bht_registrations', $data);
      $eid = $this->db->insert_id();
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);

      $userdata = [
        'user_type' => '12',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('cid'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('mobile'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "Judiciary Notice";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('mobile'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message_dzo', $data);
      $this->load->view('elitigation/footer');
    }
  }

  public function store_nonbhutanese_register_dzo()
  {
    $data = [
      'user_type' => $this->input->post('user_type'),
      'nationality' => $this->input->post('nationality'),
      'wp_passport' => $this->input->post('wp_passport'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $this->input->post('dob'),
      'state' => $this->input->post('state'),
      'district' => $this->input->post('district'),
      'occupation' => $this->input->post('occupation'),
      'father_mother_name' => $this->input->post('father_mother_name'),
      'mobile' => $this->input->post('mobile'),
      'email' => $this->input->post('email'),

      'alternate_mobile' => $this->input->post('alternate_mobile'),
      'cur_address_house' => $this->input->post('cur_address_house'),
      'cur_address_street' => $this->input->post('cur_address_street'),
      'cur_address_place' => $this->input->post('cur_address_place'),
      'cur_address_country' => $this->input->post('cur_address_country'),

      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[elat_tbl_nonbht_registrations.email]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/nonbhutanese_register_dzo');
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_nonbht_registrations', $data);
      $userdata = [
        'user_type' => '16',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('wp_passport'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('mobile'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);
      $name = $this->input->post('name');
      $to = $this->input->post('email');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "Judiciary Notice";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';
      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('mobile'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message_dzo', $data);
      $this->load->view('elitigation/footer');
    }
  }
  public function store_organization_register_dzo()
  {
    $data = [
      'user_type' => $this->input->post('user_type'),
      'org_type' => $this->input->post('org_type'),
      'org_name' => $this->input->post('orgname'),
      'licenseno' => $this->input->post('licenseno'),
      'office_address' => $this->input->post('office_address'),
      'po_box' => $this->input->post('po_box'),
      'phone' => $this->input->post('phone'),
      'fax' => $this->input->post('fax'),
      'email' => $this->input->post('email'),
      'cid' => $this->input->post('cid'),
      'contact_person' => $this->input->post('contact_person'),
      'contactperson_mobile' => $this->input->post('contactperson_mobile'),
      'alternate_mobile' => $this->input->post('alternate_mobile'),

      'created_at' => date('Y-m-d H:i:s')
    ];

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[sc_tbl_user_profile.email]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/organization_register_dzo');
      $this->load->view('elitigation/footer');
    } else {
      $this->db->insert('elat_tbl_org_registrations', $data);
      $userdata = [
        'user_type' => '15',
        'judge_name' => $this->input->post('name'),
        'CID' => $this->input->post('cid'),
        'user_name' => $this->input->post('email'),
        'email' => $this->input->post('email'),
        'password' => md5('pass@123'),
        'contact' => $this->input->post('contactperson_mobile'),
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('sc_tbl_user_profile', $userdata);

      $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
      if ($latcid != '1') {
        $insert_data['is_org'] = '1';
        $insert_data['Organization_Name'] = $this->input->post('orgname');
        $insert_data['license_id'] = $this->input->post('licenseno');
        $insert_data['litigant_name'] = $this->input->post('contact_person');
        $insert_data['litigant_nationality'] = "Bhutanese";
        $insert_data['litigant_CID'] = $this->input->post('cid');
        $insert_data['occupation'] = "";
        $insert_data['litigant_gender'] = "";
        $insert_data['litigant_DOB'] = "";
        $insert_data['litigant_age'] = "";
        $insert_data['litigant_house_no'] = "";
        $insert_data['litigant_thram_no'] = "";
        $insert_data['litigant_dzongkhag'] = "";
        $insert_data['litigant_dungkhag'] = "";
        $insert_data['litigant_gewog'] = "";
        $insert_data['litigant_village'] = "";
        $insert_data['litigant_father'] = "";
        $insert_data['litigant_phone'] = $this->input->post('contactperson_mobile');
        $insert_data['litigant_email'] = $this->input->post('email');
        $insert_data['litigant_current_address'] = $this->input->post('office_address');
        $this->db->insert('sc_tbl_litigant', $insert_data);
      }
      $to = $this->input->post('email');
      $name = $this->input->post('contact_person');
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $subject = "Judiciary Notice";
      $message = 'Dear ' . $name . ',<br /><br />Thank you for signing up for e-litigation. Please follow the link to get the user log in ID and Password.
                   <br /><br /> Username: ' . $to . '
                   <br /> Password: pass@123
                   <br /> https://cms.judiciary.gov.bt/index.php/welcome/elitigation/<br /><br />Please help us to serve you better<br />Judiciary';

      $this->email->set_newline("\r\n");
      //$this->email->from($from);
      $this->email->from('administrator@judiciary.gov.bt', 'Judiciary of Bhutan');
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);
      if ($this->email->send()) {
      } else {
        ?>
        <script type="text/javascript">
           alert("Could not Reach SMPT server, eMail not sent");
        </script>
        <?php
      }

      $tom = trim($this->input->post('contactperson_mobile'));
      $mmsg = urlencode("eLitigation service Signup Successful, details has been sent to your email.");
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://172.30.16.136/g2csms/push.php?to=' . $tom . '&msg=' . $mmsg . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      $response = curl_exec($curl);
      curl_close($curl);


      $this->load->view('elitigation/header');
      $this->load->view('elitigation/register/success_message_dzo', $data);
      $this->load->view('elitigation/footer');
    }
  }

  /////////////////////             

  function login()
  {
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/elitigation_login');
    $this->load->view('elitigation/footer');
  }

  function newcase($uid)
  {
    $this->user->check_valid_user_elat();
    $data['usercases'] = $this->elat->get_cases_public($uid);
    $data['clients'] = $this->elat->get_cases_clients($uid);
    $data['victims'] = $this->elat->get_cases_clients($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casetable', $data);
    $this->load->view('elitigation/footer1');
  }

  function newcase_1($uid, $caseid)
  {
    $this->user->check_valid_user_elat();
    $data['caseid'] = $caseid;
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }


  function incase($uid)
  {
    $this->user->check_valid_user_elat();
    $data['usercases'] = $this->elat->get_cases_public($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/incasetable', $data);
    $this->load->view('elitigation/footer1');
  }

  function def_incase($uid)
  {
    $this->user->check_valid_user_elat();
    $defcid = $this->elat->get_case_cmscid($uid);
    $data['defendants'] = $this->elat->get_cases_public_def($defcid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/def_incasetable', $data);
    $this->load->view('elitigation/footer1');
  }

  function caseappeal($uid)
  {
    $this->user->check_valid_user_elat();
    $data['usercases'] = $this->elat->get_all_appeal_cases_public($uid);
    $data['courts'] = $this->elat->get_court();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/caseappealtable', $data);
    $this->load->view('elitigation/footer1');
  }

  function def_caseappeal($uid)
  {
    $this->user->check_valid_user_elat();
    $ucid = $this->public->get_elat_cid($uid);
    $defcreatedid = $this->public->get_defendant_uid($ucid);
    $data['usercases'] = $this->elat->get_all_appeal_cases_public($defcreatedid);
    $data['courts'] = $this->elat->get_court();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/appeal/def_caseappealtable', $data);
    $this->load->view('elitigation/footer1');
  }

  function casedocuments($uid)
  {
    $this->user->check_valid_user_elat();
    $data['misccaseid'] = $this->elat->get_cases_public($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casedocumentstable', $data);
    $this->load->view('elitigation/footer1');
  }

  function casedocuments_def($uid)
  {
    $this->user->check_valid_user_elat();
    $defcid = $this->elat->get_case_cmscid($uid);
    $data['defendants'] = $this->elat->get_cases_public_def($defcid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/def_casedocumentstable', $data);
    $this->load->view('elitigation/footer1');
  }

  function casesubmisions($uid)
  {
    $this->user->check_valid_user_elat();
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casesubmisiontable', $data);
    $this->load->view('elitigation/footer1');
  }

  function casesubmisions_1($uid)
  {
    $this->user->check_valid_user_elat();
    $defcid = $this->public->get_defendant_cid_1($uid);
    $data['defuid'] = $this->public->get_defuid_1($defcid);
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casesubmisiontable_1', $data);
    $this->load->view('elitigation/footer1');
  }

  function casesubmisions_def($uid)
  {
    $this->user->check_valid_user_elat();
    $ucid = $this->public->get_elat_cid($uid);
    $defcreatedid = $this->public->get_defendant_uid($ucid);
    $data['pid'] = $defcreatedid;
    $data['usercases'] = $this->elat->get_cases_public_case_submission($defcreatedid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/def_casesubmisiontable', $data);
    $this->load->view('elitigation/footer1');
  }

  function livehearing($uid)
  {
    $this->user->check_valid_user_elat();
    $data['usercases'] = $this->elat->get_cases_public($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/caselivehearingtable', $data);
    $this->load->view('elitigation/footer1');
  }

  function def_livehearing($uid)
  {
    $this->user->check_valid_user_elat();
    $defcid = $this->elat->get_case_cmscid($uid);
    $data['defendants'] = $this->elat->get_cases_public_def($defcid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/def_caselivehearingtable', $data);
    $this->load->view('elitigation/footer1');
  }

  function newcaseform()
  {
    $data['utype'] = $this->session->userdata('user_type');
    $this->user->check_valid_user_elat();
    $data['courts'] = $this->elat->get_court();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform', $data);
    $this->load->view('elitigation/footer1');
  }

  function add_client($caseid)
  {
    $utype = $this->session->userdata('user_type');
    $this->user->check_valid_user_elat();
    $data['courts'] = $this->elat->get_court();
    $data['caseid'] = $caseid;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/cid_client_register', $data);
    $this->load->view('elitigation/footer1');
  }

  function add_victim($caseid)
  {
    $utype = $this->session->userdata('user_type');
    $this->user->check_valid_user_elat();
    $data['courts'] = $this->elat->get_court();
    $data['caseid'] = $caseid;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/add_victim', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_new_case_1()
  {
    $this->user->check_valid_user_elat();
    $data['court'] = $this->input->post('court');
    $data['case_type'] = $this->input->post('case_type');
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_new_case()
  {
    
    $uid = $this->session->userdata('user_id');
    if ($this->input->post()) {
      $this->user->check_valid_user_elat();
      if ($this->session->userdata('user_type') != '15') {
        $casetype = '2';
      } else {
        $casetype = $this->input->post('casetype');
      }
      $data = [
        'case_type' => $casetype,
        'applicant_type' => $this->session->userdata('user_type'),
        'court_id' => $this->input->post('court'),
        'petition_copy' => $_FILES["petition_copy"]["name"],
	'jurisdiction_copy' => $_FILES["jurisdiction_copy"]["name"],
	'cid_copy' => $_FILES["cid_copy"]["name"],
        'hearing_option' => $this->input->post('hearingoption'),
        'created_by' => $uid,
        'created_on' => date('Y-m-d H:i:s')
      ];
      $this->db->insert('elat_tbl_case_submission', $data); 
      $caseid = $this->db->insert_id();

      $folder = "images/petition_copy/";
      move_uploaded_file($_FILES["petition_copy"]["tmp_name"], "$folder" . $_FILES["petition_copy"]["name"]);
      
      $folder_1 = "images/juirisdication_copy/";
      move_uploaded_file($_FILES["jurisdiction_copy"]["tmp_name"], "$folder_1" . $_FILES["jurisdiction_copy"]["name"]);
	 
      $folder_2 = "images/cid_copy/";
      move_uploaded_file($_FILES["cid_copy"]["tmp_name"], "$folder_2" . $_FILES["cid_copy"]["name"]);

       $data = [];
       $count = count($_FILES['relevant_copy']['name']);  
       for($i=0;$i<$count;$i++){  
       if(!empty($_FILES['relevant_copy']['name'][$i])){  
        $_FILES['file']['name'] = $_FILES['relevant_copy']['name'][$i];
        $_FILES['file']['type'] = $_FILES['relevant_copy']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['relevant_copy']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['relevant_copy']['error'][$i];
        $_FILES['file']['size'] = $_FILES['relevant_copy']['size'][$i];

        $config['upload_path'] = 'images/relevant_copy/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
        $config['max_size'] = '5000';
        $config['file_name'] = $_FILES['relevant_copy']['name'][$i];
 
        $this->load->library('upload',$config); 
  
        if($this->upload->do_upload('file'))
            {
              $uploadData = $this->upload->data();
              $filename = $uploadData['file_name'];
              $datafile = [
              'case_id' => $caseid,
              'file' => $filename
              ];
                $this->db->insert('elat_tbl_relevantdoccopy', $datafile);
          
            }
        }
 
      }

      $usercid = $this->public->get_elat_cid($uid);
      $usercontact = $this->public->get_UserContactNumber($uid);
      $latid = $this->public->get_latigant_id_incase($usercid, $usercontact);

      $data1 = [
        'litigant' => $latid,
        'litigant_type' => '14',
        'created_by' => $uid,
        'ecase_id' => $caseid
      ];
      $this->db->insert('sc_temp_litigant_elat', $data1);

      $data['uid'] = $uid;
      $data['caseid'] = $caseid;
      $ct = $this->input->post('case_type');
      $data['country'] = $this->public->get_country();
      $this->load->view('elitigation/header1');
      $this->load->view('elitigation/newcase/success_message', $data);
      $this->load->view('elitigation/footer1');
    } else {
      $this->user->check_valid_user_elat();
      $data['usercases'] = $this->elat->get_cases_public($uid);
      $this->load->view('elitigation/header1');
      $this->load->view('elitigation/newcase/casetable', $data);
      $this->load->view('elitigation/footer1');
    }
  }

  function random_string($length)
  {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
    }

    return $key;
  }

  public function store_new_case_documents()
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $name_file = time() . $_FILES["case_document"]['name'];

    $update_data['form_name'] = $name_file;
    $update_data['ack'] = '1';
    $update_data['updated_by'] = $uid;
    $update_data['updated_on'] = date("Y-m-d");
    $this->db->where('id', $this->input->post('fileid'));
    $this->db->update('sc_tbl_case_form_elat', $update_data);

    $new_name = time() . $_FILES["case_document"]['name'];
    $config['upload_path'] = FCPATH . "images/jforms/";
    $config['allowed_types'] = '*';
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('case_document')) {
    } else {
      $data = $this->upload->data();
    }
    $this->session->set_flashdata('success', 'Case File/Files has been Uploaded');
    redirect('publicregistration/casesubmisions/' . $uid);
  }

  public function store_chargesheet()
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $name_file = time() . $_FILES["chargesheet"]['name'];

    $update_data['chargesheet'] = $name_file;
    $this->db->where('id', $this->input->post('caseid'));
    $this->db->update('elat_tbl_case_submission', $update_data);

    $new_name = time() . $_FILES["chargesheet"]['name'];
    $config['upload_path'] = FCPATH . "images/chargesheet/";
    $config['allowed_types'] = '*';
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('chargesheet')) {
    } else {
      $data = $this->upload->data();
    }
    $this->session->set_flashdata('success', 'Case File/Files has been Uploaded');
    redirect('publicregistration/newcase/' . $uid);
  }

  public function store_new_case_documents_def()
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $name_file = time() . $_FILES["case_document"]['name'];

    $update_data['form_name_def'] = $name_file;
    $update_data['ack_def'] = '1';
    $update_data['updated_by_def'] = $uid;
    $update_data['updated_on_def'] = date("Y-m-d");
    $this->db->where('id', $this->input->post('fileid'));
    $this->db->update('sc_tbl_case_form_elat', $update_data);

    $new_name = time() . $_FILES["case_document"]['name'];
    $config['upload_path'] = FCPATH . "images/jforms/";
    $config['allowed_types'] = '*';
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('case_document')) {
    } else {
      $data = $this->upload->data();
    }
    $this->session->set_flashdata('success', 'Case File/Files has been Uploaded');
    redirect('publicregistration/casesubmisions_def/' . $uid);
  }


  public function respondantdefendent_exists($cidno, $caseid)
  {
    $data['cidno'] = $cidno;
    $data['caseid'] = $caseid;
    $data['respondents'] = $this->elat->get_cases_public_def_limit1($cidno);
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/rspondentdefendant_register_duplicate', $data);
    $this->load->view('elitigation/footer');
  }

  public function store_respondantdefendent_exists()
  {
    $caseid = $this->input->post('caseid');
    $uid = $this->session->userdata('user_id');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),

      'respondent_defendant' => $this->input->post('resdef'),
      'mobile' => $this->input->post('mobile'),
      'mobile2' => $this->input->post('amobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_respondent', $data);
    $eid = $this->db->insert_id();

    $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
    $resdef = $this->input->post('resdef');
    if ($resdef == '1') {
      $lattype = '16';
    }
    if ($resdef == '2') {
      $lattype = '18';
    }
    if ($resdef == '3') {
      $lattype = '25';
    }

    $data1 = [
      'litigant' => $latid,
      'litigant_type' => $lattype,
      'created_by' => $uid,
      'ecase_id' => $caseid
    ];
    $this->db->insert('sc_temp_litigant_elat', $data1);

    $data['caseid'] = $this->input->post('caseid');
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_respondantdefendent()
  {
    $caseid = $this->input->post('caseid');
    $uid = $this->session->userdata('user_id');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
      'dob' => $dob,
      'thram' => $this->input->post('thram'),
      'houseno' => $this->input->post('houseno'),
      'village' => $this->input->post('village'),
      'gewog' => $this->input->post('gewog'),
      'dungkhag' => $this->input->post('dungkhag'),
      'dzongkhag' => $this->input->post('dzongkhag'),

      'respondent_defendant' => $this->input->post('resdef'),
      'mobile' => $this->input->post('mobile'),
      'mobile2' => $this->input->post('amobile'),
      'email' => $this->input->post('email'),
      'cur_address' => $this->input->post('cur_address'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_respondent', $data);
    $eid = $this->db->insert_id();
	
	  $this->db->where('id', $caseid);
	  $update_data1['deff_status'] = '1';
    $this->db->update('elat_tbl_case_submission', $update_data1);

    $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = "Bhutanese";
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('houseno');
      $insert_data['litigant_thram_no'] = $this->input->post('thram');
      $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
      $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
      $insert_data['litigant_gewog'] = $this->input->post('gewog');
      $insert_data['litigant_village'] = $this->input->post('village');
      $insert_data['litigant_father'] = "";
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    }
    else 
      {
        $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
        $this->db->where('id', $latid);
			  $update_data['litigant_phone'] = $this->input->post('mobile');
        $update_data['litigant_email'] = $this->input->post('email');
			  $update_data['updatedby'] = $this->session->userdata('user_id');
			  $this->db->update('sc_tbl_litigant', $update_data);
        ?>
        <script type="text/javascript">
           alert("You are already Registered as Litigant, Phone Number and eMail are updated");
        </script>
        <?php

      }

    $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
    $resdef = $this->input->post('resdef');
    if ($resdef == '1') {
      $lattype = '16';
    }
    if ($resdef == '2') {
      $lattype = '18';
    }
    if ($resdef == '3') {
      $lattype = '25';
    }

    $data1 = [
      'litigant' => $latid,
      'litigant_type' => $lattype,
      'created_by' => $uid,
      'ecase_id' => $caseid
    ];
    $this->db->insert('sc_temp_litigant_elat', $data1);

    $data['caseid'] = $this->input->post('caseid');
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }


  public function view_respondent($caseid)
  {
    $data['caseid'] = $caseid;
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }

  public function respondent_updatedraft($caseid)
  {

    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $update_data['draft'] = '1';
    $this->db->where('caseid', $caseid);
    $this->db->update('elat_tbl_respondent', $update_data);
    $this->session->set_flashdata('success', 'Submission Success');
    redirect('publicregistration/view_respondent/' . $caseid);
  }

  public function delete_respondent($did, $caseid)
  {
    $this->db->where('id', $did);
    $this->db->delete('elat_tbl_respondent');
    $this->session->set_flashdata('success', 'Respondent/Defendant Removed Successfully');
    $data['caseid'] = $caseid;
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
  }

  public function delete_case_files($fileid)
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $update_data['form_name'] = '';
    $update_data['ack'] = '0';
    $this->db->where('id', $fileid);
    $this->db->update('sc_tbl_case_form_elat', $update_data);
    $this->session->set_flashdata('success', 'Case File Removed Successfully');
    redirect('publicregistration/casesubmisions/' . $uid);
  }

  public function delete_case_files_def($fileid)
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $update_data['form_name_def'] = '';
    $update_data['ack_def'] = '0';
    $this->db->where('id', $fileid);
    $this->db->update('sc_tbl_case_form_elat', $update_data);
    $this->session->set_flashdata('success', 'Case File Removed Successfully');
    redirect('publicregistration/casesubmisions_def/' . $uid);
  }

  public function upload_case_files($fileid, $litid, $jpid)
  {
    $data['fileid'] = $fileid;
    $data['litid'] = $litid;
    $data['jpid'] = $jpid;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/upload_case_files', $data);
    $this->load->view('elitigation/footer1');
  }

  public function upload_chargesheet($caseid)
  {
    $data['caseid'] = $caseid;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/upload_chargesheet', $data);
    $this->load->view('elitigation/footer1');
  }

  public function upload_case_files_def($fileid, $litid, $jpid)
  {
    $data['fileid'] = $fileid;
    $data['litid'] = $litid;
    $data['jpid'] = $jpid;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/upload_case_files_def', $data);
    $this->load->view('elitigation/footer1');
  }

  function appeal_request_elat($caseid)
  {
    $case = $this->public->get_single_row('sc_tbl_misc_case_info', $caseid);
    $data['court_id'] = $case->court_id;
    $data['case_id'] = $case->id;
    $data['litigants'] = $this->public->get_CaseRelatedLitigant($caseid);
    $data['court_type'] = $this->public->get_appeal_court_type();
    $data['judges'] = $this->public->get_hearing_judge();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/appeal_form', $data);
    $this->load->view('elitigation/footer1');
  }

  function view_appealcase($appealid)
  {
    $data['usercases'] = $this->elat->get_cases_public_case_appeal($appealid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_appealcase', $data);
    $this->load->view('elitigation/footer1');
  }

  function appealcase($miscid)
  {
    $case = $this->public->get_single_row('sc_tbl_misc_case_info', $miscid);
    $data['court_id'] = $case->court_id;
    $data['case_id'] = $case->id;
    $court_typeid = $this->public->get_elat_court_type($case->court_id);
    $data['litigants'] = $this->public->get_CaseRelatedLitigant($miscid);
    $data['court_type'] = $this->public->get_appeal_court_type_elat($court_typeid);
    $data['judges'] = $this->public->get_hearing_judge_elat($case->court_id);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/appealcaseform', $data);
    $this->load->view('elitigation/footer1');
  }

  function add_appeal()
  {
    $uid = $this->session->userdata('user_id');
    if ($this->input->post()) {
      $multi_latigant = implode(', ', $_POST['litigant']);
      $signing_judge = implode(', ', $_POST['sign_judge']);
      $insert_data['case_id'] = $this->input->post('case_id');
      $insert_data['appeal_date'] = $this->input->post('appeal_date');
      $insert_data['court_id'] = $this->input->post('court_id');
      $insert_data['signing_judge_id'] = $signing_judge;
      $insert_data['appeal_brief'] = $this->input->post('appeal_brief');
      $insert_data['appealed_court_id'] = $this->input->post('appeal_court');
      $insert_data['litigant'] = $multi_latigant;
      $insert_data['hearing_option'] = $this->input->post('hearingoption');
      $insert_data['application_copy'] = $_FILES["application_copy"]["name"];
      $insert_data['created_by'] = $uid;
      $insert_data['created_on'] = date('Y-m-d H:i:s');
      $this->db->insert('sc_tbl_appeal_elat', $insert_data);
      $folder = "images/appeal_applicationcopy/";
      move_uploaded_file($_FILES["application_copy"]["tmp_name"], "$folder" . $_FILES["application_copy"]["name"]);
      $this->user->check_valid_user_elat();
      $data['usercases'] = $this->elat->get_all_appeal_cases_public($uid);
      $data['courts'] = $this->elat->get_court();
      $this->session->set_flashdata('success', 'Case appeal application successful');
      $this->load->view('elitigation/header1');
      $this->load->view('elitigation/newcase/caseappealtable', $data);
      $this->load->view('elitigation/footer1');
    } else {
      $this->user->check_valid_user_elat();
      $data['usercases'] = $this->elat->get_all_appeal_cases_public($uid);
      $data['courts'] = $this->elat->get_court();
      $this->load->view('elitigation/header1');
      $this->load->view('elitigation/newcase/caseappealtable', $data);
      $this->load->view('elitigation/footer1');
    }
  }

  public function delete_appeal_case($appealid, $filename)
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $this->db->where('id', $appealid);
    $this->db->delete('sc_tbl_appeal_elat');
    $path_to_file = 'images/casefiles/' . $filename . '';
    //unlink($path_to_file);
    $this->session->set_flashdata('success', 'Appeal Case Deleted Successfully');
    $data['usercases'] = $this->elat->get_cases_public_case_appeal($appealid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_appealcase', $data);
    $this->load->view('elitigation/footer1');
  }

  public function add_elat_litigants($miscid)
  {
    $data['miscid'] = $miscid;
    $this->user->check_valid_user_elat();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/litigant_register', $data);
    $this->load->view('elitigation/footer1');
  }

  function litigant_registration()
  {
    $this->user->check_valid_user_elat();
    $data['cidno'] = $this->input->post('cid');
    $data['miscid'] = $this->input->post('miscid');
    $data['litigants'] = $this->public->get_litigant_type();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/litigant_register_store', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_litigant_register()
  {
    $miscid = $this->input->post('miscid');
    $litigant_type = $this->input->post('litigant_type');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));

    $insert_data['litigant_name'] = $this->input->post('name');
    $insert_data['litigant_nationality'] = "Bhutanese";
    $insert_data['litigant_CID'] = $this->input->post('cid');
    $insert_data['occupation'] = $this->input->post('occupation');
    $insert_data['litigant_gender'] = $this->input->post('gender');
    $insert_data['litigant_DOB'] = $dob;
    $insert_data['litigant_age'] = "";
    $insert_data['litigant_house_no'] = $this->input->post('houseno');
    $insert_data['litigant_thram_no'] = $this->input->post('thram');
    $insert_data['litigant_dzongkhag'] = $this->input->post('dzongkhag');
    $insert_data['litigant_dungkhag'] = $this->input->post('dungkhag');
    $insert_data['litigant_gewog'] = $this->input->post('gewog');
    $insert_data['litigant_village'] = $this->input->post('village');
    $insert_data['litigant_father'] = "";
    $insert_data['litigant_phone'] = $this->input->post('mobile');
    $insert_data['litigant_email'] = $this->input->post('email');
    $insert_data['litigant_current_address'] = $this->input->post('cur_address');
    $this->db->insert('sc_tbl_litigant', $insert_data);
    $insert_id = $this->db->insert_id();

    $insert_process['caseID'] = $miscid;
    $insert_process['litigant'] = $insert_id;
    $insert_process['litigant_type'] = $litigant_type;
    $this->db->insert('sc_tbl_registration_litigant', $insert_process);
    $this->session->set_flashdata('success', 'Litigant assigned successfully');
    $uid = $this->session->userdata('user_id');
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casesubmisiontable', $data);
    $this->load->view('elitigation/footer1');
  }

  public function add_elat_lawyers($miscid)
  {
    $data['miscid'] = $miscid;
    $this->user->check_valid_user_elat();
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/lawyer_register', $data);
    $this->load->view('elitigation/footer1');
  }

  function lawyer_registration()
  {
    $this->user->check_valid_user_elat();
    $data['cidno'] = $this->input->post('cid');
    $data['miscid'] = $this->input->post('miscid');
    $miscid = $this->input->post('miscid');
    $data['litigants'] = $this->public->get_litigant_for_case($miscid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/lawyer_register_store', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_lawyer_register()
  {
    $miscid = $this->input->post('miscid');
    $litigant_id = $this->input->post('litigant_id');
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));

    $insert_data['L_Name'] = $this->input->post('name');
    $insert_data['CID'] = $this->input->post('cid');
    $insert_data['Qualification'] = $this->input->post('qualification');
    $insert_data['Mobile'] = $this->input->post('mphone');
    $insert_data['email'] = $this->input->post('email');
    $insert_data['Firm'] = $this->input->post('fname');
    $insert_data['Address'] = $this->input->post('fadd');
    $this->db->insert('sc_tbl_lawyer', $insert_data);
    $insert_id = $this->db->insert_id();

    $insert_process['Lawyer_id'] = $insert_id;
    $insert_process['Case_id'] = $miscid;
    $insert_process['Litigant_id'] = $litigant_id;
    $this->db->insert('tbl_litigant_lawyer_link', $insert_process);
    $this->session->set_flashdata('success', 'Lawyer assigned successfully');
    $uid = $this->session->userdata('user_id');
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/casesubmisiontable', $data);
    $this->load->view('elitigation/footer1');
  }


  function change_hearing_option()
  {
    $this->user->check_valid_user_elat();
    $caseid = $this->input->post('caseid');
    $option = $this->input->post('hearing_option');

    $this->db->set('hearing_option', $option)
      ->where('id', $caseid)
      ->update('elat_tbl_case_submission');
    $uid = $this->session->userdata('user_id');
    redirect('publicregistration/newcase/' . $uid);
  }
  function ack_court_docs()
  {
    $this->user->check_valid_user_elat();
    $id = $this->input->post('id');
    $ack = $this->input->post('ack');
    $udata = array('ack' => $ack, 'ack_date' => date("Y/m/d"));
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_courtorders', $udata);
    $uid = $this->session->userdata('user_id');
    redirect('publicregistration/casedocuments_def/' . $uid);
  }

  function add_defreswit($caseid)
  {
      $data['caseid'] = $caseid;
      $data['country'] = $this->public->get_country();
      $this->load->view('elitigation/header1');
      $this->load->view('elitigation/newcase/success_message', $data);
      $this->load->view('elitigation/footer1');
  }

  function respondentdefendant_registration() 
  {
    if($this->input->post('type') == '14')
    {
    $data['cidno'] = $this->input->post('cid');
    $data['caseid'] = $this->input->post('caseid');
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/newcase/rspondentdefendant_register', $data);
    $this->load->view('elitigation/footer');
    }

    if($this->input->post('type') == '16')
    {
    $caseid = $this->input->post('caseid');
    $uid = $this->session->userdata('user_id'); 
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'respondent_defendant' => $this->input->post('resdef'),
      'nationality' => $this->input->post('nationality'),
      'cid' => $this->input->post('cid'),
      'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'), 
      'dob' => $dob,
      'houseno' => $this->input->post('cur_address_house'),
      'gewog' => $this->input->post('state'),
      'dzongkhag' => $this->input->post('district'),
      'fathername' => $this->input->post('father_mother_name'),
      'occupation' => $this->input->post('occupation'),
      'mobile' => $this->input->post('mobile'),
      'mobile2' => $this->input->post('alternate_mobile'),
      'email' => $this->input->post('email'),
      'streetname' => $this->input->post('cur_address_street'),
      'placename' => $this->input->post('cur_address_place'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_respondent', $data);
    $eid = $this->db->insert_id();

    $this->db->where('id', $caseid);
	  $update_data1['deff_status'] = '1';
    $this->db->update('elat_tbl_case_submission', $update_data1);

    $latcid = $this->public->checkDuplicateLatigant($this->input->post('cid'));
    if ($latcid != '1') {
      $insert_data['litigant_name'] = $this->input->post('name');
      $insert_data['litigant_nationality'] = $this->input->post('nationality');
      $insert_data['litigant_CID'] = $this->input->post('cid');
      $insert_data['occupation'] = $this->input->post('occupation');
      $insert_data['litigant_gender'] = $this->input->post('gender');
      $insert_data['litigant_DOB'] = $dob;
      $insert_data['litigant_age'] = "";
      $insert_data['litigant_house_no'] = $this->input->post('cur_address_house');      
      $insert_data['litigant_dzongkhag'] = $this->input->post('district');      
      $insert_data['litigant_gewog'] = $this->input->post('state');
      $insert_data['litigant_father'] = $this->input->post('father_mother_name');
      $insert_data['litigant_phone'] = $this->input->post('mobile');
      $insert_data['litigant_email'] = $this->input->post('email');
      $insert_data['litigant_current_address'] = $this->input->post('cur_address_place');
      $this->db->insert('sc_tbl_litigant', $insert_data);
    }
    else 
      {
        $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
        $this->db->where('id', $latid);
			  $update_data['litigant_phone'] = $this->input->post('mobile');
        $update_data['litigant_email'] = $this->input->post('email');
			  $update_data['updatedby'] = $this->session->userdata('user_id');
			  $this->db->update('sc_tbl_litigant', $update_data);
        ?>
        <script type="text/javascript">
           alert("You are already Registered as Litigant, Phone Number and eMail are updated");
        </script>
        <?php
      }
    $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
    $resdef = $this->input->post('resdef');
    if ($resdef == '1') {
      $lattype = '16';
    }
    if ($resdef == '2') {
      $lattype = '18';
    }
    if ($resdef == '3') {
      $lattype = '25';
    }

    $data1 = [
      'litigant' => $latid,
      'litigant_type' => $lattype,
      'created_by' => $uid,
      'ecase_id' => $caseid
    ];
    $this->db->insert('sc_temp_litigant_elat', $data1);

    $data['caseid'] = $this->input->post('caseid');
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
    }
    
    if($this->input->post('type') == '15')
    {
    $caseid = $this->input->post('caseid');
    $uid = $this->session->userdata('user_id'); 
    $dob = $this->input->post('dob');
    $date = str_replace('/', '-', $dob);
    $dob = date('Y-m-d', strtotime($date));
    $data = [
      'caseid' => $this->input->post('caseid'),
      'respondent_defendant' => $this->input->post('resdef'), 
      'nationality' => $this->input->post('nationality'),
      'name' => $this->input->post('orgname'),
      'orgtype' => $this->input->post('org_type'),
      'placename' => $this->input->post('cur_address_place'),
      'created_by' => $uid,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_respondent', $data);
    $eid = $this->db->insert_id();

    $this->db->where('id', $caseid);
	  $update_data1['deff_status'] = '1';
    $this->db->update('elat_tbl_case_submission', $update_data1);

    $latid = $this->public->get_latigant_id_incase($this->input->post('cid'));
    $resdef = $this->input->post('resdef');
    if ($resdef == '1') {
      $lattype = '16';
    }
    if ($resdef == '2') {
      $lattype = '18';
    }
    if ($resdef == '3') {
      $lattype = '25';
    }

    $data1 = [
      'litigant' => $latid,
      'litigant_type' => $lattype,
      'created_by' => $uid,
      'ecase_id' => $caseid
    ];
    $this->db->insert('sc_temp_litigant_elat', $data1);

    $data['caseid'] = $this->input->post('caseid');
    $data['respondent'] = $this->elat->get_cases_respondent($caseid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/newcaseform_2', $data);
    $this->load->view('elitigation/footer1');
    
    }
  }

  public function view_applicant_detail($uid)
  {
    $data['uid'] = $uid;
    $cid = $this->elat->get_case_cmscid($uid);
    $ut = $this->public->get_user_type($uid);
    if ($ut == '15') {
      $data['details'] = $this->elat->get_org_details($cid);
      $this->load->view('header');
      $this->load->view('view_parties/org', $data);
      $this->load->view('footer');
    }
    if ($ut == '12') {
      $data['details'] = $this->elat->get_individual_details($cid);
      $this->load->view('header');
      $this->load->view('view_parties/applicant', $data);
      $this->load->view('footer');
    }
    if ($ut == '13') {
      $data['details'] = $this->elat->get_lawyer_details($cid);
      $data['ldetails'] = $this->elat->get_lawyer_ldetails($cid);
      $this->load->view('header');
      $this->load->view('view_parties/lawyer', $data);
      $this->load->view('footer');
    }
  }

  public function view_respondent_detail($id)
  {
    $data['details'] = $this->public->get_DefendantDetail($id);
    $this->load->view('header');
    $this->load->view('view_parties/defendant', $data);
    $this->load->view('footer');
  }

  public function view_client_detail($id)
  {
    $data['details'] = $this->public->get_ClientDetail($id);
    $this->load->view('header');
    $this->load->view('view_parties/client', $data);
    $this->load->view('footer');
  }

  function casefiledownload($filename = NULL)
  {
    $this->load->helper('download');
    $data = file_get_contents(base_url('/elat/images/casefiles/' . $filename));
    force_download($filename, $data);
  }

  function viewFile($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_file', $data);
    $this->load->view('elitigation/footer1');
  }

  function viewCaseFile($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_case_file', $data);
    $this->load->view('elitigation/footer1');
  }

  function viewCaseFile_1($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_case_file_1', $data);
    $this->load->view('elitigation/footer1');
  }

  function viewPetitionFile($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_petition_file', $data);
    $this->load->view('elitigation/footer1');
  }
  function viewjurisdictionnFile($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_jurisdiction_file', $data);
    $this->load->view('elitigation/footer1');
  }

  function viewChargesheetFile($filename)
  {
    //$data['filename']=$this->public->getAllUploadsName($id);
    $data['filename'] = $filename;
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/view_chargesheet_file', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_new_case_documents_1()
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $name_file = $_FILES['case_document']['name'];
    $uid = $this->session->userdata('user_id');
    $misccaseid = $this->elat->get_misccaseid($this->input->post('caseid'));
    $data = [
      'user_type' => $this->input->post('utype'),
      'case_id' => $this->input->post('caseid'),
      'misc_case_id' => $misccaseid,
      'document_name' => $this->input->post('document_name'),
      'file_name' => $name_file,
      'created_by' => $uid,
      'created_on' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_case_files', $data);

    $folder = "images/casefiles/";
    move_uploaded_file($_FILES["case_document"]["tmp_name"], "$folder" . $_FILES["case_document"]["name"]);
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->session->set_flashdata('success', 'Case File/Files has been Uploaded');
    redirect('publicregistration/casesubmisions_1/' . $uid);
  }

  function casesubmisions_def_1($uid)
  {
    $ucid = $this->public->get_elat_cid($uid);
    $defcreatedid = $this->public->get_defendant_uid($ucid);
    $this->user->check_valid_user_elat();
    $data['pid'] = $defcreatedid;
    $data['usercases'] = $this->elat->get_cases_public_case_submission($defcreatedid);
    $this->load->view('elitigation/header1');
    $this->load->view('elitigation/newcase/def_casesubmisiontable_1', $data);
    $this->load->view('elitigation/footer1');
  }

  public function store_new_case_documents_def_1()
  {
    $this->user->check_valid_user_elat();
    $uid = $this->session->userdata('user_id');
    $name_file = $_FILES['case_document']['name'];
    $misccaseid = $this->elat->get_misccaseid($this->input->post('caseid'));
    $data = [
      'user_type' => $this->input->post('utype'),
      'case_id' => $this->input->post('caseid'),
      'misc_case_id' => $misccaseid,
      'document_name' => $this->input->post('document_name'),
      'file_name' => $name_file,
      'created_by' => $uid,
      'created_on' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('elat_tbl_case_files', $data);

    $folder = "images/casefiles/";
    move_uploaded_file($_FILES["case_document"]["tmp_name"], "$folder" . $_FILES["case_document"]["name"]);
    $data['usercases'] = $this->elat->get_cases_public_case_submission($uid);
    $this->session->set_flashdata('success', 'Case File/Files has been Uploaded');
    redirect('publicregistration/casesubmisions_def_1/' . $uid);
  }

  public function store_feedback()
  {
    $this->input->post('user_id');
    $insert_data['court_id'] = $this->input->post('court_id');
    $insert_data['case_id'] = $this->input->post('case_id');
    $insert_data['q1'] = $this->input->post('q1');
    $insert_data['q1ans'] = $this->input->post('q1ans');
    $insert_data['q2'] = $this->input->post('q2');
    $insert_data['q2ans'] = $this->input->post('q2ans');
    $insert_data['q3'] = $this->input->post('q3');
    $insert_data['q3ans'] = $this->input->post('q3ans');
    $insert_data['q4'] = $this->input->post('q4');
    $insert_data['q4ans'] = $this->input->post('q4ans');
    $insert_data['q5'] = $this->input->post('q5');
    $insert_data['created_on'] = date('Y-m-d');
    $insert_data['ceeated_by'] = $this->input->post('user_id');;
    $this->db->insert('elat_tbl_feedback', $insert_data);
    $this->session->set_flashdata('success', 'Feed Back submitted Successfully');
    redirect('welcome/index/');
  }
}


