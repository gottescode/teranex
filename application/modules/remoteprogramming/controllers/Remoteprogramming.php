<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remoteprogramming extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index($page=0) {
		 
		$url = site_url()."remoteprogramming/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		//print_r($programmerList);exit;
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){
			$start = $show * $page;
			}
	 	//unset($_SESSION['programerName']);
		$this->session->unset_userdata('programerName');
		$pageData['start']=$start;	
		$pageData['end']=$end;	
		if(isset($_POST['btnSearch'])){
			
			$pageData['programerName'] = $_POST['programerName']; 
				if($_POST['language']){
					$pageData['language'] = $_POST['language']; 
				}
				if($_POST['qualification']){
					$pageData['qualification'] = $_POST['qualification']; 					
				}
				if($_POST['exp_yr']){
					$pageData['exp_yr'] = $_POST['exp_yr']; 					
				}
				if($_POST['programmer_type']){
					$pageData['programmer_type'] = $_POST['programmer_type']; 					
				}
				if($_POST['programerName']){
					$pageData['programerName'] = $_POST['programerName'];
				}
				if($_POST['consultant']){
					$pageData['consultant'] = $_POST['consultant'];
				}
				
			$this->session->set_userdata('programerName',$pageData['programerName']);
		}
		
		$uid  = $this->session->userdata('uid');
		if($uid){
				$url = site_url()."consultant/api/findSingleRecentlyViewedRemoteProgramming/$uid";
				$recently_viewed_data =  apiCall($url,"get");
				
			// print_r($recently_viewed_data);exit;
				$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
				//get recently Viewd Data
				if($recently_viewed_data['result']['consultant_ids']){
					$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedProgramming/";
					$recently_viewed_data =  apiCall($url,"post",$pageData);
					//print_r($recently_viewed_data);exit;
				}				
		}		
		 
		
		$url = site_url()."remoteprogramming/api/findMultipleProgrammerPost";
		$programmList =  apiCall($url, "post",$pageData);
	
	 	$totalCount=count($programmerList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show,"start"=>$start,"end"=>$end); 
		
		$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get"); 
		$url = site_url()."settings/programmertypeapi/findMultiple/";
		$programmertype_list =  apiCall($url, "get");  
		$url = site_url()."consultant/api/findMultipleConsultantQualification/";
		$qualificationList  =  apiCall($url, "get"); 

		$url = site_url()."remoteprogramming/api/findMultipleCategory/";
		$remoteprogramming_list =  apiCall($url, "get");	
		//print_r($remoteprogramming_list);exit;
		$arrayData = array(
							'qualificationList'=>$qualificationList['result'],
							'programmerList'=>$programmerList['result'],
							'language_list'=>$language_list['result'],
							'remoteprogramming_list'=>$remoteprogramming_list['result'],
							"pageintation"=>$pageintation,
							"programmertype_list"=>$programmertype_list['result'],
							"recently_viewed_data"=>$recently_viewed_data['result']
						);
		//print_r($arrayData);die;
		$this->template->load("index",$arrayData);
	} 
	public function programmer($page=0) {  
		
		$url = site_url()."remoteprogramming/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		$show=5;	
		$start=0;
		$end=3;
		if($page>0){
			$start = $show * $page;
			}
	 	$url = site_url()."remoteprogramming/api/findMultipleProgrammer/$start/$end";
		$programmList =  apiCall($url, "get");  
		
	 	$totalCount=count($programmerList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show); 
		
		$arrayData = array('programmList'=>$programmList['result'],"pageintation"=>$pageintation);
			
		
		
		$this->template->load("programmer",$arrayData);
	}
	public function rfq() {   	
	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  
      $url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  

		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
			
			$url  = site_url()."remoteprogramming/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);
			    $transaction_type = 19;
  				$this->user_log($transaction_type);	
			if($response[response]){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remoteprogramming/remoteprogramming");
            

			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remoteprogramming/remoteprogramming");
			}
		}
	
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
		$url = site_url()."/remoteprogramming/api/remoteApplicationProgrammBySupport/$userId";
		$programmReqList =  apiCall($url, "get");  
		print_r($programmReqList);exit;
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