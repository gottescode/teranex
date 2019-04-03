<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xpertconnect extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index($page=0) {
		 
		$url = site_url()."xpertconnect/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){
			$start = $show * $page;
			}
		$pageData['start']=$start;	
		$pageData['end']=$end;	
		if(isset($_POST['btnSearch'])){
			$pageData['language'] = $_POST['language']; 
			$pageData['programerName'] = $_POST['programerName']; 
		}		
	 	$url = site_url()."xpertconnect/api/findMultipleProgrammerPost";
		$programmList =  apiCall($url, "post",$pageData);  

	 	$totalCount=count($programmList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show,"start"=>$start,"end"=>$end); 
	
		$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get");  
		
		$url = site_url()."xpertconnect/api/findMultipleCategory/";
		$xpertconnect_list =  apiCall($url, "get");
		echo $uid  = $this->session->userdata('uid');
		if($uid){
				$url = site_url()."consultant/api/findSingleRecentlyViewed/$uid";
				$recently_viewed_data =  apiCall($url,"get");
			//	print_r($recently_viewed_data);exit;
				$pageData['recentlyViewedId'] = $recently_viewed_data['result']['programmer_ids'];
				//get recently Viewd Data
				if($recently_viewed_data['result']['programmer_ids']){
					$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewed/";
					$recently_viewed_data =  apiCall($url,"post",$pageData);
					
			
				}				
		}
		
		$arrayData = array(
							'programmerList'=>$programmList['result'],
							'xpertconnect_list'=>$xpertconnect_list['result'],
							"pageintation"=>$pageintation,
							"language_list"=>$language_list['result'],
							"recently_viewed_data"=>$recently_viewed_data['result'],
							
							);
	
		$this->template->load("index",$arrayData);
	} 
	public function programmer($page=0) {  
		
		$url = site_url()."xpertconnect/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		$show=5;	
		$start=0;
		$end=3;
		if($page>0){
			$start = $show * $page;
			}
	 	$url = site_url()."xpertconnect/api/findMultipleProgrammer/$start/$end";
		$programmList =  apiCall($url, "get");  
		
	 	$totalCount=count($programmerList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show); 
		
		$arrayData = array('programmList'=>$programmList['result'],"pageintation"=>$pageintation);
			
		
		
		$this->template->load("programmer",$arrayData);
	}
	public function rfq() {   	
	
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
			
			$url  = site_url()."xpertconnect/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);
			if($response[response]){
				setFlash("dataMsgServiceRequestSuccess", $response['message']);
				redirect(site_url()."xpertconnect/index");
			}else{
				setFlash("dataMsgServiceRequestError", $response['message']);
				redirect(site_url()."xpertconnect/index");
			}
		}
	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  

	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  
	
		$arrayData  = [
				"material_list"=>$material_list['result'],
				"application_required"=>$application_required['result']
		
		];	
	 
		$this->template->load("rfq",$arrayData);
	}
	/**
	 * remote Application Programm users request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function xpertconnectProgrammer($rpr_id=0) {  
		$rpr_id;
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		$url = site_url()."/xpertconnect/api/xpertconnectProgrammBySupport/$userId";
		$programmReqList =  apiCall($url, "get");  
		
		if($rpr_id > 0){
			$url = site_url()."/customer/api/xpertconnectServiceConsultantUpdateByConsultant/$rpr_id";
			$requestConsultantList =  apiCall($url, "get"); 

			if($requestConsultantList['result']){
				setFlash("dataMsgAddError", $requestConsultantList['message']);
				redirect(site_url()."customer/xpertconnectConsultant/");	
			}else{
				setFlash("dataMsgAddError", $requestConsultantList['message']);
				redirect(site_url()."customer/xpertconnectConsultant/");
			}
		}   
		$arrayData=array( 
			"programmReqList"=>$programmReqList['result'],   
		); 
		$this->template->load("xpertconnectProgrammer",$arrayData); 	
	}	

	public function rfq2() {
		$this->template->load("rfq2",$arrayData);
	} 
}