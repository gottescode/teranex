<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Research extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index() {
		$url = site_url()."research/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
        
        $url = site_url()."research/api/findMultipleClient/";
		$client_list =  apiCall($url, "get"); 
		//print_r($client_list);exit;
		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."research/api/researchSpeakConsultantInsert/"; 
		    $pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research");
		}

		$url = site_url()."research/api/findMultipleReport/";
		$research_list =  apiCall($url, "get"); 
		//print_r($research_list);exit;	
		$arrayData = array('category_list' =>$category_list['result'] ,'client_list' =>$client_list['result'] , 'research_list' =>$research_list['result']);

		$this->template->load("index",$arrayData);
	}
	public function research_list($rid) {
		$url = site_url()."research/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 


		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."research/api/researchSpeakConsultantInsert/"; 
			$pageData['report_id']	= $rid;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$rid");
		}

		$url = site_url()."research/api/findMultipleResearch/$rid/front";
		$research_list =  apiCall($url, "get");	
		$arrayData = array('research_list' =>$research_list['result'] ,'rid' =>$rid ,'category_list' =>$category_list['result']);
		//print_r($research_list);exit;
		$this->template->load("research_list",$arrayData);
	}
	public function report_detail($id) {
			$pageData = $this->input->post();  
 
		if(isset($_POST['btnRequest'])){
			$url = site_url()."research/api/researchReportSampleInsert/"; 
			$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");

		}


		if(isset($_POST['btnInquirybuying'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$url = site_url()."research/api/inquiryBeforeBuyingInsert/"; 
			$pageData['report_id']	= $id;

			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Enquiry Before Buying Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");
		}

		if(isset($_POST['btnanalystQuery'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$url = site_url()."research/api/analystQueryInsert/"; 
			$pageData['report_id']	= $id;

			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Analyst Query Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");
		}

		if(isset($_POST['btnsalesQuery'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$url = site_url()."research/api/salesQueryInsert/"; 
			$pageData['report_id']	= $id;

			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Sales Query Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");
		}

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."research/api/researchSpeakConsultantInsert/"; 
			$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully");

				  $transaction_type = 10;
                //echo $data;die;
                $this->user_log($transaction_type);	

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");
		}
		//  Licence purchase for signle or corporate

		if(isset($_POST['btnReportCustomization'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."research/api/reportCustomizationInsert/"; 
			$pageData['report_id']	= $id;
			//print_r($pageData['report_id']);exit;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request for Customization request Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("research/report_detail/$id");
		}
		
 
		if(isset($_POST['btnLicence'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$pageData['user_id']=$this->session->userdata('uid');
			$pageData['user_type']=$this->session->userdata('user_type');
			//	print_r($pageData);exit; 
				if($pageData['licence_type']=='Single'){
					$licence_amount	= $pageData['licence_single'];
					$pageData['licence_amount']	= $pageData['licence_single'];
				}
				if($pageData['licence_type']=='Corporate'){
					$licence_amount	= $pageData['licence_corporate'];
					$pageData['licence_amount']	= $pageData['licence_corporate'];
				}
			$pageData['report_id']	= $id;
			  $transaction_type = 11;
              $this->user_log($transaction_type);	

			$url = site_url()."research/api/licencePurchase/"; 
			$response =  apiCall($url, "post",$pageData);
  
			if($response['result']){
				$u_mobileno = $this->db_lib->fetchSingle("master_user","uid='$pageData[user_id]'","u_mobileno" );
					$pageData['surl']=site_url()."payment/success/reportData/".$response['result'];
					$pageData['furl']=site_url()."payment/fail/reportData/".$response['result'];
					$pageData['amount']=$licence_amount; 
					$pageData['firstname']=	$this->session->userdata('u_name'); 
					$pageData['email']	=	$this->session->userdata('user_email'); 
					$pageData['phone'] = $u_mobileno['u_mobileno'];
					$pageData['productinfo']="report Data";  
					 
					$this->session->set_flashdata('payuData',$pageData); 
				 
						redirect(site_url()."payment/index");			
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
				redirect(site_url()."research/report_detail/$id");
			}
		}
		$url = site_url()."research/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 

		$url = site_url()."research/api/findSingleResearch/$id";
		$research_list =  apiCall($url, "get");	

		$url = site_url()."research/api/findMultipleTeam/";
		$team_list =  apiCall($url, "get");

		
		$arrayData = array('research_list' =>$research_list['result'] ,'team_list' =>$team_list['result'] ,'id' =>$id ,'category_list' =>$category_list['result']);
		//print_r($research_list);exit;
		$this->template->load("report_detail",$arrayData);
	} 
	public function report_customization(){
			if(isset($_POST)){
				$customization_for = implode(',',$_POST['cust_option']);
				echo $customization_for;
			  $pageData = $this->input->post(); exit;
			//print_r($pageData);exit; 

			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("research/report_detail/$id");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}

			
	}

	// user log

public function user_log($data) {
        //  echo 'hi';die;
        //print_r($data);die;
        $pageData['transaction_type'] = $data;
        $pageData['uid'] = $this->session->userdata('uid');

        //print_r($pageData);die;
        $url = site_url() . "/customer/api/insertUserLog";
        $response = apiCall($url, "post", $pageData);
        //print_r($response);die;
    }

	
}