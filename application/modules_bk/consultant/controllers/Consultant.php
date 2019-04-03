<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultant extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }
	
	public function index() { 
	$uid  = $this->session->userdata('uid');
	if($uid){
				$url = site_url()."consultant/api/findSingleRecentlyViewedServiceEngineer/$uid";
				$recently_viewed_data =  apiCall($url,"get");
				
					
				$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
				//get recently Viewd Data
				if($recently_viewed_data['result']['consultant_ids']){
					$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedTraining/";
					$recently_viewed_data =  apiCall($url,"post",$pageData);
	
				}				
		}		
		

	// SEO end Here	 
		// on demand request INSERT
		if(isset($_POST['btnOnDemandService'])){
				$uid  = $this->session->userdata('uid');			
				$user_type  = $this->session->userdata('user_type');			
				$pageData = $this->input->post();
				$pageData['user_id']=$uid;
				$pageData['user_type']=$user_type;
                               // print_r($pageData);die;
                               $url = site_url()."consultant/api/createRemoteMachineRequest";
				$response  = apiCall($url,"post",$pageData);

                 $transaction_type = 4;
                //echo $data;die;
                $this->user_log($transaction_type);			// print_r($response);die;
				if($response['result']){
					setFlash("dataMsgSuccess","On-Demand Service request added successfully.");
					redirect(site_url()."consultant/index/$id");	
				}else{
					setFlash("dataMsgError", $response['message']);
					redirect(site_url()."consultant/index/$id");	
				}
			}


		if(isset($_POST['btnVideoRequest'])){
			//print_r(hello);exit;
			$user_id = $this->session->userdata('uid');
			//print_r($user_id);exit;
			if($user_id){
				$pageData = $this->input->post();   
				//print_r($pageData);exit;
				$url = site_url()."consultant/api/VideoRequestInsert/"; 
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
		
		//TERANEX & Freelancer Service engineers
		$url = site_url()."consultant/api/findMultipleServiceEngineer/";
		$serviceEngineerList =  apiCall($url, "get");  

		$arrayData = array(
							"serviceEngineerList"=>$serviceEngineerList,
							"recently_viewed_data"=>$recently_viewed_data['result']
						);
		
		$this->template->load("business_development",$arrayData);
	}
	public function consultantslist() {  
		if($_POST['btnSearch']){
			 
		 }
		$url = site_url()."consultant/api/findMultiple/";
		$consultant_list =  apiCall($url, "get");  
		$arrayData = [ 
			"consultant_list"=>$consultant_list['result'],
		];
		$this->template->load("consultants",$arrayData);
	}
	public function consultantDetail($id) {
		$uid  = $this->session->userdata('uid');
		if($uid){
		//get Single record from recently viewed
		$url = site_url()."consultant/api/findSingleRecentlyViewedRemoteProgramming/$uid";
		$recently_viewed_data =  apiCall($url,"get");
		$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
		
		if($recently_viewed_data['result']){
			$recently_viewed_data1 = $recently_viewed_data['result']['consultant_ids'];
			$recently_viewed_data = $recently_viewed_data['result']['consultant_ids'];
			$checkInarray = explode(',',$recently_viewed_data);
		

			if (!(in_array($id, $checkInarray))) {
					$oldarray = $checkInarray;
					array_push($oldarray,$id);
					//add new programmer
					$newData['consultant_ids'] = implode(",",$oldarray);
					$newData['user_id'] = $uid;
					$url = site_url()."consultant/api/updateRecentlyViewedProgramming/";
					$result = apiCall($url,"POST",$newData); 
			}
		}else{
			$newData['consultant_ids'] = $id;
			
			$newData['user_id'] = $uid;
			
			$url = site_url()."consultant/api/createRecentlyViewedProgramming/";
			$result = apiCall($url,"POST",$newData);
			
		}
		//get recently Viewd Data
		$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedProgramming/";
		$recently_viewed_data =  apiCall($url,"post",$pageData);

		}
		$url = site_url()."consultant/api/findSingleConsultant/$id";
		$consultant_data =  apiCall($url,"get");
		
		//Customer User Data
		$uid  = $this->session->userdata('uid');
		$url = site_url()."consultant/api/findSingleConsultant/$uid";
		$customer_data =  apiCall($url, "get");
			
		if(isset($_POST['btnAvailabilty'])){	
				$pageData = $this->input->post();
				$user_type=$this->session->userdata('user_type');
				$pageData['user_type']=$user_type;
				$url = site_url()."consultant/api/createRemoteMachineRequest";
				$response  = apiCall($url,"post",$pageData);
				if($response['result']){
					  $transaction_type = 18;
                      $this->user_log($transaction_type);	
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."consultant/consultantDetail/$id");	
				}else{
					setFlash("dataMsgError", $response['message']);
					redirect(site_url()."consultant/consultantDetail/$id");	
				}
			}
		$url = site_url()."customer/api/findWorkExperinceList/$id";
		$workList =  apiCall($url, "get"); 
		$url = site_url()."customer/api/commenttotraineeFetchMultiple/$id";
		$commentList =  apiCall($url, "get");
	 	 
		$arrayData = [
			"workList"=>$workList['result'], 
			"commentList"=>$commentList['result'], 
			"consultant_data"=>$consultant_data['result'], 
			"customer_data"=>$customer_data['result']
		]; 
		$this->template->load("consultant_details",$arrayData);
	}
	public function advanceSearch( ) {
		
		$arrayData = [ ]; 
		$this->template->load("advance_search",$arrayData);
	}
	public function bookAppointment($id) {
		$url = site_url()."/consultant/api/findSingle/$id";
		$consultant_data =  apiCall($url, "get"); 		
		$arrayData = [
			"consultant_data"=>$consultant_data['result'], 
		]; 
		$this->template->load("book_appointment",$arrayData);
	}
	public function consultantAvailability( ) { 
	
	
		if($_POST['btnAvailabilty']){
			$arrayData = []; 
			$this->template->load("consultant_availability",$arrayData);
			 
		 }else{
			 redirect(site_url()."consultant/bookAppointment/");			
		 }
	}
	public function profile() {  
		if($this->session->userdata('uid')){
			$user_id = $this->session->userdata('uid');
			$arrayData=array();
			$this->template->load("profile",$arrayData);
		}
		else{
			redirect("pages/login");
		}
	}
	public function page() {  
			$this->template->load("consultant");
	}
	public function remoteapp_service() {  
			$this->template->load("remoteapp_service");
	}
	/**
	 * remote Application Service support request
	 * @access public
	 * @param  post data, login user data 
	 * @return array of objects
	 */ 
	public function request_service_support() {  
		if($this->session->userdata('uid')){
			
			if(isset($_POST['btnRequest'])){

				$pageData = $this->input->post();
				$pageData['user_id']=$this->session->userdata('uid');
				$pageData['request_date_time']=date('Y-m-d H:i:S');
				$url = site_url()."consultant/api/requestServiceSupport";
				$response =  apiCall($url, "post",$pageData);
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect("consultant/index");
				}else{
					setFlash("dataMsgError", $response['message']);
					redirect("consultant/index");
				}  
			}
			//$this->template->load("remoteapp_service");
		}
		else{
			redirect("pages/signIn");
		}	
	}
	public function remoteservice_availability() {  
			$this->template->load("remoteservice_availability");
	}
	public function rfa() {  
			$this->template->load("rfa");
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
	
	public function serviceEngineerDetails($id) {
		
		echo $uid  = $this->session->userdata('uid');
		
		if($uid){
		//get Single record from recently viewed
		$url = site_url()."consultant/api/findSingleRecentlyViewedServiceEngineer/$uid";
		$recently_viewed_data =  apiCall($url,"get");
	
		$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
		
		if($recently_viewed_data['result']){
			//$recently_viewed_data1 = $recently_viewed_data['result']['consultant_ids'];
			$recently_viewed_data = $recently_viewed_data['result']['consultant_ids'];
			$checkInarray = explode(',',$recently_viewed_data);
		

			if (!(in_array($id, $checkInarray))) {
					$oldarray = $checkInarray;
					array_push($oldarray,$id);
					//add new programmer
					$newData['consultant_ids'] = implode(",",$oldarray);
					$newData['user_id'] = $uid;
					$url = site_url()."consultant/api/updateRecentlyViewedServiceEnginner/";
					$result = apiCall($url,"POST",$newData); 
			}
		}else{
			$newData['consultant_ids'] = $id;
			
			$newData['user_id'] = $uid;
			
			$url = site_url()."consultant/api/createRecentlyViewedServiceEngineer/";
			$result = apiCall($url,"POST",$newData);
		
			
		}
		//get recently Viewd Data
		$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedApplication/";
		$recently_viewed_data =  apiCall($url,"post",$pageData);

		}
		
	
		$url = site_url()."consultant/api/findSingleConsultant/$id";
		$consultant_data =  apiCall($url,"get");
		
		//Customer User Data
		$uid  = $this->session->userdata('uid');
		$url = site_url()."consultant/api/findSingleConsultant/$uid";
		$customer_data =  apiCall($url, "get");
			
	
		$url = site_url()."customer/api/findWorkExperinceList/$id";
		$workList =  apiCall($url, "get"); 
		$url = site_url()."customer/api/commenttotraineeFetchMultiple/$id";
		$commentList =  apiCall($url, "get");
	 	 
		$arrayData = [
			"workList"=>$workList['result'], 
			"commentList"=>$commentList['result'], 
			"consultant_data"=>$consultant_data['result'], 
			"customer_data"=>$customer_data['result']
		]; 
		$this->template->load("trainer_details",$arrayData);
	}

	
	
}