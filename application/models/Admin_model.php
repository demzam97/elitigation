<?php
class Admin_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function count_no_fields($table_name, $field_name, $value)

  {
    $this->db->where($field_name, $value);
    $this->db->from($table_name);
    return $this->db->count_all_results();
  }
  function get_usertype($id)
  {
    $this->db->where('id', $id);
    $q = $this->db->get('sc_tbl_role');
    $data = $q->result_array();
    $name = ($data[0]['role_name']);
    return $name;
  }
  function user_save()
  {
    $usertype = $this->input->post('usertype');
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $uemail = $this->input->post('uemail');
    $courtname = $this->input->post('courtname');
    $bench = $this->input->post('benchname');
    $crt_dzongkhag = $this->get_court_dzongkhag($courtname);
    $crt_dungkhag = $this->get_court_dungkhag($courtname);
    $crt_type = $this->get_court_type1($courtname);
    $crt_abbreviation = $this->get_court_abbreviation($courtname);
    $ucontact = trim($this->input->post('ucontact'));
    $cid = $this->input->post('cid');
    $eid = $this->input->post('eid');
    $pswd = md5('pass@123');

    $data = array(
      'user_type' => $usertype,
      'judge_name' => $name,
      'user_name' => $username,
      'email' => $uemail,
      'CID' => $cid,
      'EID' => $eid,
      'password' => $pswd,
      'court' => $courtname,
      'dzongkhag' => $crt_dzongkhag,
      'dungkhag' => $crt_dungkhag,
      'bench' => $bench,
      'court_type' => $crt_type,
      'court_abb' => $crt_abbreviation,
      'contact' => $ucontact,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_user_profile', $data);
  }

  function get_court_dzongkhag($court_id)
  {
    $this->db->select('dzongkhag_id');
    $this->db->from('sc_tbl_court_profile');
    $this->db->where('id', $court_id);
    $result = $this->db->get()->row();
    return $result->dzongkhag_id;
  }

  function get_court_type1($court_id)
  {
    $this->db->select('courttype_id');
    $this->db->from('sc_tbl_court_profile');
    $this->db->where('id', $court_id);
    $result = $this->db->get()->row();
    return $result->courttype_id;
  }

  function get_court_abbreviation($court_id)
  {
    $this->db->select('court_type_description');
    $this->db->from('sc_tbl_court_profile');
    $this->db->where('id', $court_id);
    $result = $this->db->get()->row();
    return $result->court_type_description;
  }

  function get_court_dungkhag($court_id)
  {
    $this->db->select('dungkhag_id');
    $this->db->from('sc_tbl_court_profile');
    $this->db->where('id', $court_id);
    $result = $this->db->get()->row();
    return $result->dungkhag_id;
  }

  function usertype_save()
  {
    $usertype = $this->input->post('usertype');
    $desp = $this->input->post('desp');

    $data = array(
      'role_name' => $usertype,
      'role_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_role', $data);
  }


  function dzongkhag_save()
  {
    $dzoname = $this->input->post('dzongkhag');
    $data = array(
      'Name' => $dzoname,
      'CreatedBy' => $this->session->userdata('user_id'),
      'CreatedOn' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_master_dzongkhag', $data);
  }

  function dungkhag_save()
  {
    $dzoid = $this->input->post('dzongkhag');
    $gewog = $this->input->post('dungkhag');
    $data = array(
      'DzongkhagID' => $dzoid,
      'Name' => $gewog,
      'CreatedBy' => $this->session->userdata('user_id'),
      'CreatedOn' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_master_dungkhag', $data);
  }


  function gewog_save()
  {
    $dzoid = $this->input->post('dzongkhag');
    $gewog = $this->input->post('gewog');
    $data = array(
      'DzongkhagID' => $dzoid,
      'Name' => $gewog,
      'CreatedBy' => $this->session->userdata('user_id'),
      'CreatedOn' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_master_gewog', $data);
  }

  function village_save()
  {
    $dzoid = $this->input->post('dzongkhag');
    $gewog = $this->input->post('gewog');
    $village = $this->input->post('village');
    $data = array(
      'DzongkhagID' => $dzoid,
      'GewogID' => $gewog,
      'Name' => $village,
      'CreatedBy' => $this->session->userdata('user_id'),
      'CreatedOn' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_master_village', $data);
  }


  function litigant_save()
  {
    $lntt = $this->input->post('lntt');
    $desp = $this->input->post('lnttdesp');
    $data = array(
      'litigant_type' => $lntt,
      'litigant_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_litigant_type', $data);
  }

  function form_save()
  {
    $fname = $this->input->post('fname');
    $desp = $this->input->post('fdesp');
    $data = array(
      'form_name' => $fname,
      'form_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_forms', $data);
  }

  function judicial_process_save()
  {
    $fname = $this->input->post('jpname');
    $desp = $this->input->post('jpdesp');
    $data = array(
      'process_name' => $fname,
      'process_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_judicial_process', $data);
  }

  function enforcement_type_save()
  {
    $fname = $this->input->post('et');
    $desp = $this->input->post('etdesp');
    $data = array(
      'enforcement_type' => $fname,
      'enforcement_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_enforcement_type', $data);
  }

  function sentence_type_save()
  {
    $name = $this->input->post('st');
    $desp = $this->input->post('stdesp');
    $data = array(
      'sentence_type' => $name,
      'sentence_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_sentence_type', $data);
  }

  function document_type_save()
  {
    $name = $this->input->post('dt');
    $desp = $this->input->post('dtdesp');
    $data = array(
      'document_type' => $name,
      'document_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_document_type', $data);
  }

  function judgement_type_save()
  {
    $name = $this->input->post('jt');
    $desp = $this->input->post('jtdesp');
    $data = array(
      'judgement_type' => $name,
      'judgement_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_judgement_type', $data);
  }

  function disposal_type_save()
  {
    $name = $this->input->post('dt');
    $desp = $this->input->post('dtdesp');
    $data = array(
      'disposal_type' => $name,
      'disposal_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_disposal_type', $data);
  }

  function court_type_save()
  {
    $name = $this->input->post('ct');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'court_type' => $name,
      'court_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_court_type', $data);
  }

  function court_profile_save()
  {
    $dzo = $this->input->post('dzongkhag');
    $dung = $this->input->post('dungkhag');
    $ct = $this->input->post('court_type');
    $name = $this->input->post('name');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'dzongkhag_id' => $dzo,
      'dungkhag_id' => $dung,
      'courttype_id' => $ct,
      'court_name' => $name,
      'court_type_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_court_profile', $data);
  }

  function acts_save()
  {
    $name = $this->input->post('act');
    $desp = $this->input->post('actdesp');
    $data = array(
      'act_name' => $name,
      'act_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_acts', $data);
  }

  function article_save()
  {
    $name = $this->input->post('article');
    $desp = $this->input->post('articledesp');
    $data = array(
      'article_name' => $name,
      'article_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_article', $data);
  }
  function bench_save()
  {
    $name = $this->input->post('bench');
    $desp = $this->input->post('benchdesp');
    $data = array(
      'bench_name' => $name,
      'bench_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_bench', $data);
  }

  function case_ground_save()
  {
    $name = $this->input->post('cg');
    $desp = $this->input->post('cgdesp');
    $data = array(
      'case_ground' => $name,
      'case_ground_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_case_ground', $data);
  }

  function case_status_save()
  {
    $name = $this->input->post('ct');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'caseType' => $name,
      'caseType_Description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_casetype', $data);
  }

  function case_type_1_save()
  {
    $name = $this->input->post('case_type_1');
    $desp = $this->input->post('case_type_1desp');
    $data = array(
      'caseTypelevel1' => $name,
      'caseTypelevel1_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_casetypelevel1', $data);
  }
  function case_type_2_save()
  {
    $case1 = $this->input->post('case_type_1');
    $name = $this->input->post('case_type_2');
    $desp = $this->input->post('case_type_2desp');
    $data = array(
      'caseTypelevel1_id' => $case1,
      'caseTypeleve2' => $name,
      'caseTypelevel2_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_casetypelevel2', $data);
  }

  function case_type_3_save()
  {
    $case2 = $this->input->post('case_type_2');
    $name = $this->input->post('case_type_3');
    $desp = $this->input->post('case_type_3desp');
    $data = array(
      'caseTypelevel2_id' => $case2,
      'caseTypelevel3' => $name,
      'caseTypelevel3_description' => $desp,
      'createdby' => $this->session->userdata('user_id'),
      'created_on' => date('y/m/d')

    );
    $this->db->insert('sc_tbl_casetypelevel3', $data);
  }

  function user_update()
  {
    $id = $this->input->post('id');
    $usertype = $this->input->post('usertype');
    $name = $this->input->post('name');
    $username = $this->input->post('username');
    $uemail = $this->input->post('uemail');
    $courtname = $this->input->post('courtname');
    $bench = $this->input->post('benchname');
    $crt_dzongkhag = $this->get_court_dzongkhag($courtname);
    $crt_dungkhag = $this->get_court_dungkhag($courtname);
    $crt_type = $this->get_court_type1($courtname);
    $crt_abbreviation = $this->get_court_abbreviation($courtname);
    $ucontact = trim($this->input->post('ucontact'));
    $cid = $this->input->post('cid');
    $eid = $this->input->post('eid');

    $data = array(
      'user_type' => $usertype,
      'judge_name' => $name,
      'user_name' => $username,
      'email' => $uemail,
      'CID' => $cid,
      'EID' => $eid,
      'court' => $courtname,
      'dzongkhag' => $crt_dzongkhag,
      'dungkhag' => $crt_dungkhag,
      'bench' => $bench,
      'court_type' => $crt_type,
      'court_abb' => $crt_abbreviation,
      'contact' => $ucontact,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_user_profile', $data);
  }
  function transfer_update($user_id, $court, $dzongkhag)
  {
    $data = array(
      'court' => $court,
      'dzongkhag' => $dzongkhag,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $user_id);
    $this->db->update('sc_tbl_user_profile', $data);
  }
  function usertype_update()
  {
    $id = $this->input->post('id');
    $usertype = $this->input->post('usertype');
    $desp = $this->input->post('desp');

    $data = array(
      'role_name' => $usertype,
      'role_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_role', $data);
  }


  function dzongkhag_update()
  {
    $id = $this->input->post('id');
    $dzoname = $this->input->post('dzongkhag');
    $data = array(
      'Name' => $dzoname,
      'UpdatedBy' => $this->session->userdata('user_id'),
      'UpdatedOn' => date('y/m/d')
    );
    $this->db->where('DzongkhagID', $id);
    $this->db->update('sc_tbl_master_dzongkhag', $data);
  }
  function dungkhag_update()
  {
    $id = $this->input->post('id');
    $dzoid = $this->input->post('dzongkhag');
    $dungkhag = $this->input->post('dungkhag');
    $data = array(
      'DzongkhagID' => $dzoid,
      'Name' => $dungkhag,
      'UpdatedBy' => $this->session->userdata('user_id'),
      'UpdatedOn' => date('y/m/d')
    );
    $this->db->where('DungkhagID', $id);
    $this->db->update('sc_tbl_master_dungkhag', $data);
  }
  function gewog_update()
  {
    $id = $this->input->post('id');
    $dzoid = $this->input->post('dzongkhag');
    $gewog = $this->input->post('gewog');
    $data = array(
      'DzongkhagID' => $dzoid,
      'Name' => $gewog,
      'UpdatedBy' => $this->session->userdata('user_id'),
      'UpdatedOn' => date('y/m/d')
    );
    $this->db->where('GewogID', $id);
    $this->db->update('sc_tbl_master_gewog', $data);
  }

  function village_update()
  {
    $id = $this->input->post('id');
    $dzoid = $this->input->post('dzongkhag');
    $dungkhag = $this->input->post('dungkhag');
    $gewog = $this->input->post('gewog');
    $village = $this->input->post('village');
    $data = array(
      'DzongkhagID' => $dzoid,
      'GewogID' => $dzoid,
      'DungkhagID' => $dungkhag,
      'Name' => $village,
      'UpdatedBy' => $this->session->userdata('user_id'),
      'UpdatedOn' => date('y/m/d')
    );
    $this->db->where('VillageID', $id);
    $this->db->update('sc_tbl_master_village', $data);
  }

  function litigant_update()
  {
    $id = $this->input->post('id');
    $lntt = $this->input->post('lntt');
    $lnttdesp = $this->input->post('lnttdesp');
    $data = array(
      'litigant_type' => $lntt,
      'litigant_type_description' => $lnttdesp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_litigant_type', $data);
  }

  function form_update()
  {
    $id = $this->input->post('id');
    $fname = $this->input->post('fname');
    $fdesp = $this->input->post('fdesp');
    $data = array(
      'form_name' => $fname,
      'form_description' => $fdesp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_forms', $data);
  }


  function judicial_process_update()
  {
    $id = $this->input->post('id');
    $fname = $this->input->post('jpname');
    $fdesp = $this->input->post('jpdesp');
    $data = array(
      'process_name' => $fname,
      'process_description' => $fdesp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_judicial_process', $data);
  }

  function enforcement_type_update()
  {
    $id = $this->input->post('id');
    $fname = $this->input->post('et');
    $fdesp = $this->input->post('etdesp');
    $data = array(
      'enforcement_type' => $fname,
      'enforcement_type_description' => $fdesp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_enforcement_type', $data);
  }

  function sentence_type_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('st');
    $desp = $this->input->post('stdesp');
    $data = array(
      'sentence_type' => $name,
      'sentence_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_sentence_type', $data);
  }

  function document_type_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('dt');
    $desp = $this->input->post('dtdesp');
    $data = array(
      'document_type' => $name,
      'document_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_document_type', $data);
  }

  function judgement_type_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('jt');
    $desp = $this->input->post('jtdesp');
    $data = array(
      'judgement_type' => $name,
      'judgement_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_judgement_type', $data);
  }

  function disposal_type_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('dt');
    $desp = $this->input->post('dtdesp');
    $data = array(
      'disposal_type' => $name,
      'disposal_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_disposal_type', $data);
  }

  function court_type_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('ct');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'court_type' => $name,
      'court_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_court_type', $data);
  }

  function court_profile_update()
  {
    $id = $this->input->post('id');
    $dzo = $this->input->post('dzongkhag');
    $dung = $this->input->post('dungkhag');
    $ct = $this->input->post('court_type');
    $name = $this->input->post('name');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'dzongkhag_id' => $dzo,
      'dungkhag_id' => $dung,
      'courttype_id' => $ct,
      'court_name' => $name,
      'court_type_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_court_profile', $data);
  }

  function acts_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('act');
    $desp = $this->input->post('actdesp');
    $data = array(
      'act_name' => $name,
      'act_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_acts', $data);
  }

  function article_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('article');
    $desp = $this->input->post('articledesp');
    $data = array(
      'article_name' => $name,
      'article_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_article', $data);
  }

  function bench_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('bench');
    $desp = $this->input->post('benchdesp');
    $data = array(
      'bench_name' => $name,
      'bench_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_bench', $data);
  }

  function case_ground_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('cg');
    $desp = $this->input->post('cgdesp');
    $data = array(
      'case_ground' => $name,
      'case_ground_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_case_ground', $data);
  }

  function case_status_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('ct');
    $desp = $this->input->post('ctdesp');
    $data = array(
      'caseType' => $name,
      'caseType_Description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_casetype', $data);
  }

  function case_type_1_update()
  {
    $id = $this->input->post('id');
    $name = $this->input->post('case_type_1');
    $desp = $this->input->post('case_type_1desp');
    $data = array(
      'caseTypelevel1' => $name,
      'caseTypelevel1_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_casetypelevel1', $data);
  }

  function case_type_2_update()
  {
    $id = $this->input->post('id');
    $case1 = $this->input->post('case_type_1');
    $name = $this->input->post('case_type_2');
    $desp = $this->input->post('case_type_2desp');
    $data = array(
      'caseTypelevel1_id' => $case1,
      'caseTypeleve2' => $name,
      'caseTypelevel2_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_casetypelevel2', $data);
  }

  function case_type_3_update()
  {
    $id = $this->input->post('id');
    $case1 = $this->input->post('case_type_2');
    $name = $this->input->post('case_type_3');
    $desp = $this->input->post('case_type_3desp');
    $data = array(
      'caseTypelevel2_id' => $case1,
      'caseTypelevel3' => $name,
      'caseTypelevel3_description' => $desp,
      'updatedby' => $this->session->userdata('user_id'),
      'updated_on' => date('y/m/d')
    );
    $this->db->where('id', $id);
    $this->db->update('sc_tbl_casetypelevel3', $data);
  }
  function get_row_single($table_name, $id)

  {

    $this->db->where('id', $id);

    return $this->db->get($table_name)->row();
  }
  function get_row_single_dzo($table_name, $id)

  {

    $this->db->where('DzongkhagID', $id);

    return $this->db->get($table_name)->row();
  }

  function get_row_single_gewog($table_name, $id)

  {

    $this->db->where('GewogID', $id);

    return $this->db->get($table_name)->row();
  }

  function get_row_single_dungkhag($table_name, $id)

  {

    $this->db->where('DungkhagID', $id);

    return $this->db->get($table_name)->row();
  }
  function get_row_single_court_profile($table_name, $id)

  {

    $this->db->where('id', $id);

    return $this->db->get($table_name)->row();
  }
  function get_all_Dzongkhag()
  {

    $this->db->select('*');
    $this->db->from('sc_tbl_master_dzongkhag');
    $this->db->order_by('DzongkhagID', 'ASC');
    $query = $this->db->get();

    return $query->result();
  }

  function get_user_role()
  {
    $user_type = $this->session->userdata('user_type');
    if ($user_type == '1') {
      $this->db->select('*');
      $this->db->where('id !=', 12);
      $this->db->where('id !=', 13);
      $this->db->where('id !=', 14);
      $this->db->where('id !=', 15);
      $this->db->where('id !=', 16);
      $this->db->from('sc_tbl_role');
    }
    if ($user_type == '17') {
      $this->db->select('*');
      $this->db->where('id !=', 1);
      $this->db->where('id !=', 12);
      $this->db->where('id !=', 13);
      $this->db->where('id !=', 14);
      $this->db->where('id !=', 15);
      $this->db->where('id !=', 16);
      $this->db->where('id !=', 17);
      $this->db->from('sc_tbl_role');
    }
    $query = $this->db->get();
    return $query->result();
  }

  function get_court_profile()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_court_profile');
    $this->db->order_by('court_name', 'asc');
    $query = $this->db->get();
    return $query->result();
  }

  function get_benches()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_bench');
    $query = $this->db->get();
    return $query->result();
  }

  function getAll()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_master_dzongkhag');
    //$this->db->limit(50);
    $this->db->order_by('DzongkhagID', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  function getAll_Dungkhag()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_master_dungkhag');
    //$this->db->limit(50);
    $this->db->order_by('DungkhagID', 'ASC');
    $query = $this->db->get();

    return $query->result();
  }

  function getAll_court_type()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_court_type');
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  function getAll_case_type1()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_casetypelevel1');
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }
  function getAll_case_type2()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_casetypelevel2');
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  function get_Dzongkhag($id)
  {
    $this->db->select('Name');
    $this->db->from('sc_tbl_master_dzongkhag');
    $this->db->where('DzongkhagID', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->Name;
  }

  function get_Dungkhag($id)
  {
    $this->db->select('Name');
    $this->db->from('sc_tbl_master_dungkhag');
    $this->db->where('DungkhagID', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->Name;
  }

  function get_Gewog($id)
  {
    $this->db->select('Name');
    $this->db->from('sc_tbl_master_dzongkhag');
    $this->db->where('DzongkhagID', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->Name;
  }

  function get_court_type($id)
  {
    $this->db->select('court_type');
    $this->db->from('sc_tbl_court_type');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->court_type;
  }

  function get_court_name($id)
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_court_profile');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->court_name;
  }
  function get_casel1($id)
  {
    $this->db->select('caseTypelevel1');
    $this->db->from('sc_tbl_casetypelevel1');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->caseTypelevel1;
  }
  function get_casel2($id)
  {
    $this->db->select('caseTypeleve2');
    $this->db->from('sc_tbl_casetypelevel2');
    $this->db->where('id', $id);
    $query = $this->db->get();
    $dname = $query->row();
    return $dname->caseTypeleve2;
  }

  function getAll_Gewog()
  {
    $this->db->select('*');
    $this->db->from('sc_tbl_master_gewog');
    //$this->db->limit(50);
    $this->db->order_by('GewogID', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }
}

