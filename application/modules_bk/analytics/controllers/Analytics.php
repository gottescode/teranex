<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analytics extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index() {


		if(isset($_POST['btnRequestCall'])){
			$pageData = $this->input->post();  
			$url = site_url()."analytics/api/analyticsRequestCallInsert/"; 
			$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics");
		}

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/analyticsSpeakConsultantInsert/"; 
		//	$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		



			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully"); 
              $transaction_type = 12;
              $this->user_log($transaction_type);	

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
				redirect("analytics");
		}

        $url = site_url()."analytics/api/findMultipleCategory/";
        $category_list =  apiCall($url, "get"); 
		
		$analy_first_cat_id = $category_list['result'][0]['analytics_category_id'];
			
		$url = site_url()."analytics/api/findSingleCategory/$analy_first_cat_id";
		$single_category_details =  apiCall($url, "get"); 
		
		$url = site_url()."analytics/api/findMultipleCaseStudy/$analy_first_cat_id";
		$analytics_list =  apiCall($url, "get");	
		 
        $url = site_url()."analytics/api/findMultipleClient/";
		$client_list =  apiCall($url, "get"); 

        $arrayData = array(
				'category_list' =>$category_list['result'],
				'client_list' =>$client_list['result'],
				'single_category_details' =>$single_category_details['result'],
				'analytics_list' =>$analytics_list['result']
			);

		$this->template->load("index",$arrayData);
	}
	
	public function case_studies($id) {

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/analyticsSpeakConsultantInsert/"; 
		//	$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		

			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics/case_studies/$id");
		}

		
		if(isset($_POST['btnReportCustomization'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/reportCustomizationInsert/"; 
			$pageData['case_study_id']	= $id;
			//print_r($pageData['case_study_id']);exit;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request For Report Customization Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics/case_studies/$id");
		}

		if(isset($_POST['btnWebinar'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;  
			$url = site_url()."analytics/api/webinarInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Webinar Request Submited Successfully"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics/case_studies/$id");
		}



		$url = site_url()."analytics/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 


		$url = site_url()."analytics/api/findSingleCaseStudy/$id";
		$analytics_list =  apiCall($url, "get");	

		$url = site_url()."analytics/api/findMultipleTeam/";
		$team_list =  apiCall($url, "get"); 
		
		//print_r($team_list);exit;
		$arrayData = array('analytics_list' =>$analytics_list['result'] ,'team_list' =>$team_list['result'] ,'single_team_list' =>$single_team_list['result'] ,'id' =>$id ,'category_list' =>$category_list['result']);
		//print_r($analytics_list);exit;
		$this->template->load("case_studies",$arrayData);
	}


		/*public function team($id) {

			print_r($id);exit;
		$url = site_url()."analytics/api/findSingleTeam/$id";
		$single_team_list =  apiCall($url, "get");	
		print_r($single_team_list);exit;
		$arrayData = array('analytics_list' =>$analytics_list['result'] ,'team_list' =>$team_list['result'] ,'single_team_list' =>$single_team_list['result'] ,'id' =>$id ,'category_list' =>$category_list['result']);
		//print_r($analytics_list);exit;
		$this->template->load("case_studies",$arrayData);
	}*/

	

	public function analytics_category_detail($id) {

		if(isset($_POST['btnRequestCall'])){
			$pageData = $this->input->post();  
			$url = site_url()."analytics/api/analyticsRequestCallInsert/"; 
			//$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics");
		}

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/analyticsSpeakConsultantInsert/"; 
			//$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
		
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics/case_studies/$id");
		}

		if(isset($_POST['btnReportCustomization'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/reportCustomizationInsert/"; 
			$pageData['case_study_id']	= $id;
			//print_r($pageData['case_study_id']);exit;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request For Report Customization Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("analytics/case_studies/$id");
		}

		$url = site_url()."analytics/api/findSingleCategory/$id";
		$category_list =  apiCall($url, "get"); 

		$url = site_url()."analytics/api/findMultipleCategory/";
		$total_category_list =  apiCall($url, "get"); 
		//print_r($category_list);exit;
		$url = site_url()."analytics/api/findMultipleCaseStudy/$id";
		$analytics_list =  apiCall($url, "get");	
		$arrayData = array('category_list' =>$category_list['result'],'total_category_list' =>$total_category_list['result'],'id' =>$id,'analytics_list' =>$analytics_list['result']);
		//print_r($analytics_list);exit;
		$this->template->load("analytics_category_detail",$arrayData);
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
					redirect("analytics/case_studies/$id");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}

			
	}

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