<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remoteapplication extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index($page=0) {
		

		
		if(isset($_POST['btnVideoRequest'])){
			//print_r(hello);exit;
			$user_id = $this->session->userdata('uid');
			//print_r($user_id);exit;
			if($user_id){
				$pageData = $this->input->post();   
				$url = site_url()."remoteapplication/api/VideoRequestInsert/"; 
				$pageData['user_id']	= $user_id;
				//$pageData['machine_id']	= $mid;
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

		$url = site_url()."remoteapplication/api/findMultipleProgrammerPost";
		$programmList =  apiCall($url, "post",$pageData);  
		
/* 
		$url = site_url()."remoteapplication/api/findMultipleApplicationEngg/";
		$programmerList =  apiCall($url,"get");  
 */
	 	$url = site_url()."settings/consultancytypeapi/findMultiple/";
		$consultancytype_list =  apiCall($url, "get");  
		
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
	 	$url = site_url()."remoteapplication/api/findMultipleProgrammerPost";
		$programmList =  apiCall($url, "post",$pageData);  
//print_r($programmList);exit;

	 	$totalCount=count($programmList['result']);
		$pageintation=array(
							"totalCount"=>$totalCount,
							"page"=>$page,
							"show"=>$show,
							"start"=>$start,
							"end"=>$end
						); 
	
		$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get");  


		$arrayData = array('programmerList'=>$programmList['result'],"pageintation"=>$pageintation,"language_list"=>$language_list['result'],	"consultancytype_list"=>$consultancytype_list
						);
		
		$this->template->load("index",$arrayData);
	} 
	public function programmer($page=0) {  
		
		$url = site_url()."remoteapplication/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		$show=5;	
		$start=0;
		$end=3;
		if($page>0){
			$start = $show * $page;
			}
	 	$url = site_url()."remoteapplication/api/findMultipleProgrammer/$start/$end";
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
			$pageData['user_type']  = $this->session->userdata('user_type'); 
			//print_r($pageData);exit;
			$url  = site_url()."remoteapplication/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);
			if($response[response]){
				setFlash("dataMsgServiceRequestSuccess", $response['message']);
				redirect(site_url()."remoteapplication/index");
			}else{
				setFlash("dataMsgServiceRequestError", $response['message']);
				redirect(site_url()."remoteapplication/index");
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
	/* 
		if(!$this->session->userdata('uid') && !$this->session->userdata('user_email')){
			redirect("pages/login");
		}
		$user_id = $this->session->userdata('uid');		
		$user_type = $this->session->userdata('user_type'); 
		
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			$pageData['user_id']  = $userId; 
			
			$url = site_url()."/customer/api/addAddress"; 
			$response =  apiCall($url,"post",$pageData);
			 
		} */
		$this->template->load("rfq",$arrayData);
	}
	/**
	 * remote Application Programm users request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function remoteApplicationProgrammer($rpr_id=0) {  
		$rpr_id;
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		$url = site_url()."/remoteapplication/api/remoteApplicationProgrammBySupport/$userId";
		$programmReqList =  apiCall($url, "get");  
		//print_r($programmReqList);exit;
		if($rpr_id > 0){
			$url = site_url()."/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$rpr_id";
			$requestConsultantList =  apiCall($url, "get"); 

			if($requestConsultantList['result']){
				setFlash("dataMsgAddError", $requestConsultantList['message']);
				redirect(site_url()."customer/remoteApplicationConsultant/");	
			}else{
				setFlash("dataMsgAddError", $requestConsultantList['message']);
				redirect(site_url()."customer/remoteApplicationConsultant/");
			}
		}   
		$arrayData=array( 
			"programmReqList"=>$programmReqList['result'],   
		); 
		$this->template->load("remoteApplicationProgrammer",$arrayData); 	
	}	

	public function rfq2() {
		$this->template->load("rfq2",$arrayData);
	} 
}