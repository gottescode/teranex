<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consulting extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index() {


		if(isset($_POST['btnRequestCall'])){
			$pageData = $this->input->post();  

			$url = site_url()."consulting/api/consultingRequestCallInsert/"; 
			//$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("consulting");
		}

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."consulting/api/consultingSpeakConsultantInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 

			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("consulting");
		}

		


        $url = site_url()."consulting/api/findMultipleCategory/";
        $category_list =  apiCall($url, "get"); 
		//print_r($category_list);exit;
		$consulting_first_cat_id = $category_list['result'][0]['consulting_category_id'];
			
		$url = site_url()."consulting/api/findSingleCategory/$consulting_first_cat_id";
		$single_category_details =  apiCall($url, "get"); 
		
		$url = site_url()."consulting/api/findMultipleCaseStudy/$consulting_first_cat_id";
		$consulting_list =  apiCall($url, "get");	
		

        $url = site_url()."analytics/api/findMultipleClient/";
		$client_list =  apiCall($url, "get"); 

        $arrayData = array(
				'category_list' =>$category_list['result'],
				'client_list' =>$client_list['result'],
				'single_category_details' =>$single_category_details['result'],
				'consulting_list' =>$consulting_list['result']
			);
//print_r($arrayData);die;
		$this->template->load("index",$arrayData);
	}
	
	public function case_studies($id) {

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."consulting/api/consultingSpeakConsultantInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully"); 
				redirect("consulting/case_studies/$id");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
		}

		if(isset($_POST['btnWebinar'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;  
			$url = site_url()."consulting/api/webinarInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Webinar Request Submited Successfully"); 
				redirect("consulting/case_studies/$id");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
		}
		if(isset($_POST['btnRequest'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;  
			$url = site_url()."consulting/api/consultingRequestCallInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("consulting");
		}


		if(isset($_POST['btnanalystQuery'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$url = site_url()."consulting/api/analystQueryInsert/"; 
			$pageData['case_study_id']	= $id;

			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Analyst Query Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("consulting/case_studies/$id");
		}

		if(isset($_POST['btnsalesQuery'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$url = site_url()."consulting/api/salesQueryInsert/"; 
			$pageData['case_study_id']	= $id;

			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Sales Query Successfully Submited"); 

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("consulting/case_studies/$id");
		}



		$url = site_url()."consulting/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 

		$url = site_url()."consulting/api/findSingleCaseStudy/$id";
		$consulting_list =  apiCall($url, "get");	

		$url = site_url()."consulting/api/findMultipleTeam/";
		$team_list =  apiCall($url, "get"); 
		//print_r($team_list);exit;
		$arrayData = array('consulting_list' =>$consulting_list['result'] ,'team_list' =>$team_list['result'],'id' =>$id ,'category_list' =>$category_list['result']);
		//print_r($consulting_list);exit;
		$this->template->load("case_studies",$arrayData);
	}

	

	public function consulting_category_detail($id) {

		if(isset($_POST['btnRequestCall'])){
			$pageData = $this->input->post();  
			$url = site_url()."consulting/api/consultingRequestCallInsert/"; 
			//$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("consulting");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}
		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."consulting/api/consultingSpeakConsultantInsert/"; 
			$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("consulting/case_studies/$id");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}
		$url = site_url()."consulting/api/findSingleCategory/$id";
		$category_list =  apiCall($url, "get"); 

		$url = site_url()."consulting/api/findMultipleCategory/";
		$total_category_list =  apiCall($url, "get"); 
		//print_r($category_list);exit;
		$url = site_url()."consulting/api/findMultipleCaseStudy/$id";
		$consulting_list =  apiCall($url, "get");	
		//print_r($consulting_list);exit;
		$arrayData = array('category_list' =>$category_list['result'],'total_category_list' =>$total_category_list['result'],'id' =>$id,'consulting_list' =>$consulting_list['result']);
		//print_r($consulting_list);exit;
		$this->template->load("consulting_category_detail",$arrayData);
	}
	
}