<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class G2cPayment extends CI_Controller
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

  function index($id)
  {
      $data['pt'] = $id;   
      $this->load->view('elitigation/header');
      $this->load->view('elitigation/payment/epay_application_no', $data);
      $this->load->view('elitigation/footer');
    
  }  

  function app_search()
  {
      $pt = $this->input->post('pt');
      $data['pt'] = $this->input->post('pt');
      $data['appno'] = trim($this->input->post('appno'));
      $searchterm = trim($this->input->post('appno'));
      $courtid = $this->elat->get_application_courtid($searchterm);
      $data['servicename'] = $this->elat->get_application_servicename($this->input->post('pt')); 
      $data['accountno'] = $this->elat->get_application_accounthead($this->input->post('pt'));
      if($pt =='1'){
      $courtid = $this->elat->get_court_id($searchterm);
      $courtypeid = $this->elat->get_courttype_id($courtid);
      $data['amount'] = $this->elat->get_application_account_amount_courtwiese($pt, $courtypeid);
      }
      else
      {
        $data['amount'] = $this->elat->get_application_account_amount($pt);
      }   
      
      $result_1 = count($this->elat->application_search($searchterm));
      $result_2 = count($this->elat->application_search_def($searchterm));
      if($result_1 == '0' && $result_2 == '0')
	  { 
           $data['agencycode'] = $this->elat->get_application_agencycode($courtid);	 
		   $data['courtid'] = $this->elat->get_application_courtid($searchterm); 
           $data['courtname'] = $this->elat->get_application_courtname($courtid);	 
           $this->session->set_flashdata('fail', 'Application No.found');
           $this->load->view('elitigation/header');
           $this->load->view('elitigation/payment/epay_confirm', $data);
           $this->load->view('elitigation/footer');
		
		}
	  
      if($result_1 != '0')
         {
		   $data['agencycode'] = $this->elat->get_application_agencycode($courtid);	 
		   $data['courtid'] = $this->elat->get_application_courtid($searchterm); 
           $data['courtname'] = $this->elat->get_application_courtname($courtid);	 
          // $this->session->set_flashdata('fail', 'Application No.found');
           $this->load->view('elitigation/header');
           $this->load->view('elitigation/payment/epay_confirm', $data);
           $this->load->view('elitigation/footer');
         }
		 
      if($result_2 != '0')
         {
		
		  $dcaseid = $this->elat->get_caseid_defpayment($searchterm);
          $courtid = $this->elat->get_courtid_defpayment($dcaseid);		  
		  $data['agencycode'] = $this->elat->get_application_agencycode($courtid); 	 
		  $data['courtid'] = $this->elat->get_application_courtid($searchterm); 
          $data['courtname'] = $this->elat->get_application_courtname($courtid);	 
          //$this->session->set_flashdata('fail', 'Application No.found');	 
          $this->load->view('elitigation/header');
          $this->load->view('elitigation/payment/epay_confirm', $data);
          $this->load->view('elitigation/footer');
         }
  } 

  function payment()
  { 
     $applicationNo = trim($this->input->post('applicationNo'));
     $agencyCode = $this->input->post('agencyCode');
     $paymentDate =  date("Y-m-d");
     $accountHeadId = trim($this->input->post('accountHeadId'));	
     $serviceFee = trim($this->input->post('serviceFee'));
     $serviceName = $this->input->post('serviceName');
     $url = "https://www.citizenservices.gov.bt/G2CPaymentAggregator/services/G2CPaymentInitiatorBusiness?wsdl";
    $client = new SoapClient($url);
    $params = array(
      'dto' =>
      array(
        'agencyCode' => $agencyCode,
        'applicationNo' => $applicationNo,
        'expiryDate' => "0000-00-00",
        'paymentDate' => $paymentDate,
        'paymentList' =>
        array(
          'item' =>
          array(
            'accountHeadId' => $accountHeadId,
            'serviceFee' => $serviceFee,
          ),
        ),
        'receiptNumber' => "",
        'serviceName' => $serviceName,
      ),
    );
    $result = $client->__soapCall('insertPaymentDetailsOnSubmission', array($params));
    $jsonencode = json_encode($result);
    $jsonendecode = json_decode($jsonencode);
    $data['bfsorderno'] = $jsonendecode->insertPaymentDetailsOnSubmissionReturn;
    
    $this->db->where('application_no', $applicationNo);
	$update_data['payment_status'] = '1';
    $this->db->update('elat_tbl_case_submission', $update_data);
	
	$this->db->where('application_no', $applicationNo);
	$update_data1['payment'] = '1';
    $this->db->update('elat_tbl_defendant_payment', $update_data1);
    
    $this->load->view('elitigation/header');
    $this->load->view('elitigation/payment/rma_gateway', $data);
    $this->load->view('elitigation/footer');
  }

 function payment_complete()
  {        
	        $inst_data['applicationNo'] = $this->input->post('applicationNo');
			$inst_data['paymentDate'] = $this->input->post('paymentDate');
			$inst_data['txnId'] = $this->input->post('txnId');
			$inst_data['txnAmount'] = $this->input->post('txnAmount');
			$inst_data['paymentStatus'] = $this->input->post('paymentStatus');
			$this->db->insert('tbl_payment_details', $inst_data);    
  }
}
