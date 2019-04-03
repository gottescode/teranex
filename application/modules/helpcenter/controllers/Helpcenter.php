<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Helpcenter extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
       
		 
    }
   function _remap($id) {
        $this->index($id);
    }

	public function index($id) {
		//print_r($id);exit;
		//$id = $this->input->post('id');
	//	print_r($id);exit;
        $url = site_url()."helpcenter/api/findMultipleCategory/";
        $category_list =  apiCall($url, "get"); 
		//$id = $category_list['result'][0]['helpcenter_category_id'];

        $url = site_url()."helpcenter/api/findMultipleSubCat/$hcid";
        $subcat_list =  apiCall($url, "get"); 
		//print_r($subcat_list);exit;
        $url = site_url()."helpcenter/api/findSingleSubCat/$id";
		$helpcenter_list =  apiCall($url, "get");	
       // print_r($helpcenter_list);exit;
        $arrayData = array('helpcenter_list' =>$helpcenter_list['result'] ,'category_list' =>$category_list['result'],'subcat_list' =>$subcat_list['result'],'single_subcat_list' =>$single_subcat_list['result'],);
		$this->template->load("index",$arrayData);
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

	

/*	public function analytics_category_detail($id) {

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
	}*/


	
}