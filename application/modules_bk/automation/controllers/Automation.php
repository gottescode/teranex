<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Automation extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index( ) {
		$url= site_url()."automation/api/findMultipleAutomationCat";
		$automationCatList = apiCall($url,"get"); 
		 
		$arrayData = array("categoryList"=>$automationCatList['result']['result']);
		$this->template->load("index",$arrayData);
	} 
	public function automationList($catId=0,$automationUsed=0) {
			if($_POST['btnSearch']=='Search'){
				$pageData = $this->input->post();  
				$catId= $pageData['automation_type']; 
				$automationUsed= $pageData['used'];  
			}	 
			$url = site_url()."/automation/api/findAutomationListCategory/$catId/$automationUsed";
			$automationList =  apiCall($url, "post",$pageData );
		 
			$url = site_url()."/automation/api/findAutomationRecommendedListCategory/$catId/$automationUsed";
			$recommendedAutomationList =  apiCall($url, "get");
		
			$url= site_url()."automation/api/findMultipleAutomationCat";
			$automationCatList = apiCall($url,"get");
		
		
			$url = site_url()."/automation/api/findCategoryCount/$catId/$automationUsed";
			$categoryCount =  apiCall($url, "get");
			$this->load->model("location/country_model");
			
			$url	= site_url()."automation/api/automationBrandList";
			$brandList = apiCall($url,"get");
	 
			$url = site_url()."settings/languageapi/findMultiple/";
			$language_list =  apiCall($url, "get");  
			$arrayData = array(  "automationList"=>$automationList['result'], "catId"=>$catId,"categoryCount"=>$categoryCount['result'],"categoryList"=>$automationCatList['result'] ['result'],"countryList" => $this->country_model->getCountryListForSite(),"recommendedAutomationList" => $recommendedAutomationList['result'],"brandList" =>$brandList['result']['result'], "language_list"=>$language_list['result'],"automationUsed"=>$automationUsed);
			$this->template->load("automation",$arrayData);
	}
	public function compare_automation($catId=0,$automationUsed=0) {
		$data = $this->input->post();
		
		if(isset($_POST['btnEnquiry'])){
			$pageData = $this->input->post();  
			$url = site_url()."automation/api/automationEnquiryRequest/"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("automation");
			}else{
					setFlash("dataMsgEnquiryError", $response['message']); 
					redirect("automation");
			}
			
		}
			$arrayData = [
				"data" => $data,
				"catId" => $catId,
				"automationUsed" => $automationUsed 
			];
		//print_r($arrayData);exit;
		$this->template->load("compare_automation",$arrayData);
	} 
	/*get single Automation details with multiple photo
			19/4/2018
	 * @access public
	 * @param  get automation Id
	 * @return array   
	 */
	public function automation_details($aid) {
		
		
		if(isset($_POST['btnRequest'])){
			$pageData = $this->input->post();  
			 
			$url = site_url()."automation/api/automationFinaceRequestInsert/"; 
			$pageData['automation_id']	= $aid;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("automation/automation_details/$aid");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}
		if(isset($_POST['btnContactEnquiry'])){
			$user_id = $this->session->userdata('uid');
			if($user_id){
				$pageData = $this->input->post();   
				//print_r($pageData);exit;
				$url = site_url()."automation/api/automationContactRequestInsert/"; 
				$pageData['user_id']	= $user_id;
				$pageData['automation_id']	= $aid;
				$response =  apiCall($url, "post",$pageData); 
			   // print_r($response);exit;
				if($response['result']){
						setFlash("dataMsgContactSuccess", $response['message']);
					 
				}else{
					setFlash("dataMsgContactError", $response['message']); 
				 
				}
			}else{
				redirect("pages/signIn");		
			}
		}
		if(isset($_POST['btnAutomationVideo'])){
			$user_id = $this->session->userdata('uid');
			if($user_id){
				$pageData = $this->input->post();   
				$url = site_url()."automation/api/automationVideoRequestInsert/"; 
				$pageData['user_id']	= $user_id;
				$pageData['automation_id']	= $aid;
				$response =  apiCall($url, "post",$pageData); 
			 
				if($response['result']){
						setFlash("dataMsgEnquirySuccess", $response['message']);
					 
				}else{
					setFlash("dataMsgEnquirySuccess", $response['message']); 
				 
				}
			}else{
				redirect("pages/signIn");		
			}
		}
		if(isset($_POST['btnEnquiry'])){
			$user_id = $this->session->userdata('uid');
			$pageData = $this->input->post();  
			$pageData['ad_id']=$aid;  
			$pageData['compared_automation_ids']=$aid;  
			$pageData['u_id']=$user_id;  
			$url = site_url()."automation/api/automationEnquiryRequest/"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					 
			}else{
					setFlash("dataMsgEnquiryError", $response['message']); 
					 
			}
			
		}
		$url = site_url()."automation/api/findSingleAutomationDetailsFront/$aid";
		$automationDetails = apiCall($url,"get");
		
		$url = site_url()."automation/api/findMultipleGalleryImages/$aid"; 
		$automationAllImages =  apiCall($url, "get"); 
		
		
		$arrayData = array(  "automationDetails"=>$automationDetails['result'], "automationAllImages"=>$automationAllImages['result'],
			"softwareList"=>$softwareList['result']);
		$this->template->load("automation_details",$arrayData);
	}  
	
}