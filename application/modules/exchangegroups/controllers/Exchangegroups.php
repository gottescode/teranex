<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exchangegroups extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
	   $this->load->library('Email_PHPMailer');
    }
	/**
		* group buying request form
		16/5/2018
		* @access public
		* @param  post form data
		* @return  
	*/ 
	public function index() {
		$this->load->model("location/country_model");
		$url = site_url()."customer/exchangegroupapi/offeredListFrontEnd/";
		$offeredData  =  apiCall($url, "get");

		$url	= site_url()."exchangegroups/adminapi/adminRfqList";
		$rfqList = apiCall($url,"get"); 
		
		
		if(isset($_POST['Submit'])){
			$pageData = $this->input->post(); 
			
			$pageData['customer_id'] = $this->session->userdata('uid');
			$url = site_url()."exchangegroups/api/createExchangeGroup/";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."exchangegroups");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."exchangegroups");
			}  
		}

		if(isset($_POST['btnMachineVideo'])){
			//print_r("Hello");exit;
			$pageData = $this->input->post();  
			$pageData['customer_id']	= $this->session->userdata('uid');
			$pageData['requested_date']	= date('Y-m-d');

			$url = site_url()."groupbuying/api/videoChatRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."exchangegroups");	
			} 	
		} 

		 if(isset($_POST['offerSubmit'])){
			$pageData = $this->input->post(); 
			
			$offer_id = $pageData['offer_id'];
			$supplier_id = $pageData['supplier_id'];
			$customer_id = $this->session->userdata('uid');
			//fetch suplier and user account info
			$url = site_url()."exchangegroups/adminapi/getAllUserInfo/$supplier_id";
			$SupplierData = apiCall($url,"get");
			$SupplierData = $SupplierData['result'];
			$email_id = $SupplierData['u_email'];
			$u_name = $SupplierData['u_name'];
			$mobileNo = $SupplierData['u_mobileno'];
			
			
			$url = site_url()."customer/exchangegroupapi/findSingleOfferedData/$offer_id";
			$offeredData = apiCall($url,"get");
			$offeredData = $offeredData['result'];
			$description = $offeredData['description'];
			$timeline = $offeredData['timeline'];
			
			$url = site_url()."exchangegroups/adminapi/getAllUserInfo/$customer_id";
			$loggedUserData = apiCall($url,"get");
			$loggedUserData = $loggedUserData['result'];
			
			$loggedUser_u_name = $loggedUserData['u_name'];
			$loggedUser_email_id = $loggedUserData['u_email'];
			$loggedUser_mobileNo = $loggedUserData['u_mobileno'];
			
			$to  = $email_id;
			$body  = '<p>Hello '.$u_name. ',</p> ';
			$body .= '<p> Someone has shown interest in your Exchange group offer...</p>';
			$body .= '<p>Description: '.$description.' </p>';
			$body .= '<p>TimeLine: '.$timeline.' </p>';
			$body .= '<p>Responded By:  </p>';
			$body .= '<p>Name: '.$loggedUser_u_name.' </p>';
			$body .= '<p>Email: '.$loggedUser_email_id.' </p>';
			$body .= '<p>Mobile No: '.$loggedUser_mobileNo.' </p>';
			$body .= '<p>Comment: '.$pageData['description'].' </p>';
			$email_content = $body;
		 
			$subject = 'Stelmac.io- Your Exchange group offer has been responded...';
			$mailresponse = email_Send($subject, $to, $email_content, $name);  
			if($mailresponse){
				setFlash("dataMsgSuccess", " Request has been sent successfully..!!");
				redirect(site_url()."exchangegroups");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."exchangegroups");
			}  
		}
		 if(isset($_POST['requestSubmit'])){
			$pageData = $this->input->post(); 
		
			$req_id = $pageData['req_id'];
			$user_Id = $this->session->userdata('uid');
			$customer_id = $pageData['customer_id'];
			//fetch suplier and user account info
			$url = site_url()."exchangegroups/adminapi/getAllUserInfo/$customer_id";
			$customerData = apiCall($url,"get");
		
			$customerData = $customerData['result'];
			$email_id = $customerData['u_email'];
			$u_name = $customerData['u_name'];
			$mobileNo = $customerData['u_mobileno'];
			
			$url = site_url()."customer/exchangegroupapi/findSingleExchangeRfq/{$req_id}";
			$requestedSingleData =  apiCall($url,"get");
				
			$requestedSingleData = $requestedSingleData['result'];
			$description = $requestedSingleData['description'];
			$timeline = $requestedSingleData['timeline'];
			
			$url = site_url()."exchangegroups/adminapi/getAllUserInfo/$user_Id";
			$loggedUserData = apiCall($url,"get");
			$loggedUserData = $loggedUserData['result'];
			
			$loggedUser_u_name = $loggedUserData['u_name'];
			$loggedUser_email_id = $loggedUserData['u_email'];
			$loggedUser_mobileNo = $loggedUserData['u_mobileno'];
			
			$to  = $email_id;
			$body  = '<p>Hello '.$u_name. ',</p> ';
			$body .= '<p> Someone has shown interest in your Exchange group request:</p>';
			$body .= '<p>Description: '.$description.' </p>';
			$body .= '<p>TimeLine: '.$timeline.' </p>';
			$body .= '<p>Responded By:  </p>';
			$body .= '<p>Name: '.$loggedUser_u_name.' </p>';
			$body .= '<p>Email: '.$loggedUser_email_id.' </p>';
			$body .= '<p>Mobile No: '.$loggedUser_mobileNo.' </p>';
			$body .= '<p>Comment: '.$pageData['description'].' </p>';
			$email_content = $body;
		 
			$subject = 'Stelmac.io- Someone has shown interest in your Exchange group offer...';
			$mailresponse = email_Send($subject, $to, $email_content, $name);  
			if($mailresponse){
				setFlash("dataMsgSuccess", " Request has been sent successfully..!!");
				redirect(site_url()."exchangegroups");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."exchangegroups");
			}  
		}
		 
	
		$arrayData = [
            "countryList" => $this->country_model->getCountryListForSite(),
            "offeredData" => $offeredData['result'],
            "requestedData" => $rfqList['result']
      
        ];
        
		$this->template->load("exchangegroups/index",$arrayData);
	} 
}