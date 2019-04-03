<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {
    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
		   $this->load->library('Email_PHPMailer');
    }
	public function index($id){ 
			if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				$url = site_url()."/pages/api/update"; 
				$response =  apiCall($url, "post",$pageData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
				}else{
					setFlash("dataMsgError", $response['message']);
					
				}  
			} 
			$url = site_url()."/pages/api/findSingle/$id";
			$result =  apiCall($url, "get");
 			$arraydata=array(
						"result"=>$result['result']
					); 	
		$this->template->load("admin/_form",$arraydata);
	}
	public function about_us() {
		$this->template->load("admin/about_us");
	}
    public function refundpolicy() {
        $this->template->load("admin/refundpolicy");
    }
    public function privacystatement() {
        $this->template->load("admin/privacystatement");
    }
    public function termsconditionsofservice() {
        $this->template->load("admin/termsconditionsofservice");
    }
    public function termsofuse() {
        $this->template->load("admin/termsofuse");
    }
    public function desclaimer() {
        $this->template->load("admin/desclaimer");
    }

	/*Request for Quotation 
			31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function requestforQuotation() { 
		$url = site_url()."pages/api/requestforQuotation"; 
		$requestforQuotation =  apiCall($url, "get"); 
		//print_r($requestforQuotation);exit;
		$arrayData = [ 
			"requestforQuotation" => $requestforQuotation['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/requestforquotation',$arrayData);
	}  


	/*Supplier Membership 
			31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function SupplierMembershipList() { 
		$url = site_url()."pages/api/SupplierMembershipList"; 
		$SupplierMembership =  apiCall($url, "get"); 
		//print_r($requestforQuotation);exit;
		$arrayData = [ 
			"SupplierMembership" => $SupplierMembership['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/suppliermembershiplist',$arrayData);
	}  

	 /*Service Provider
			31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function ServiceProvidersList() { 
		$url = site_url()."pages/api/ServiceProvidersList"; 
		$ServiceProviders =  apiCall($url, "get"); 
		//print_r($requestforQuotation);exit;
		$arrayData = [ 
			"ServiceProviders" => $ServiceProviders['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/serviceproviderslist',$arrayData);
	}  
	/* Feedback
	  22/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function PaidForYourFeedbackList() { 
		$url = site_url()."pages/api/PaidForYourFeedbackList"; 
		$PaidForYourFeedbackList =  apiCall($url, "get"); 
		//print_r($PaidForYourFeedbackList);exit;
		$arrayData = [ 
			"PaidForYourFeedbackList" => $PaidForYourFeedbackList['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/getfeedback',$arrayData);
	}  
	/* Feedback
	  22/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function PaidForYourFeedbackSingleDetails($id) { 
		$url = site_url()."pages/api/PaidForYourFeedbackSingleDetails/$id"; 
		$PaidForYourFeedbackSingleDetails =  apiCall($url, "get"); 
		//print_r($PaidForYourFeedbackSingleDetails);exit;
		$arrayData = [ 
			"PaidForYourFeedbackSingleDetails" => $PaidForYourFeedbackSingleDetails['result'] , 
		]; 	


		//print_r($arrayData);exit;
		$this->template->load('pages/admin/getfeedbacksingledetails',$arrayData);
	}  

	/* Report Abuse
	   23/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function ReportAbuseList() { 
		$url = site_url()."pages/api/ReportAbuseList"; 
		$ReportAbuseList =  apiCall($url, "get"); 
		//print_r($PaidForYourFeedbackList);exit;
		$arrayData = [ 
			"ReportAbuseList" => $ReportAbuseList['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/reportabuselist',$arrayData);
	}  

	 public function dashboardSidemenu() {//echo "hi"
		$url = site_url()."pages/adminapi/userTypeList"; 
		$userTypeList =  apiCall($url, "get"); 
		//print_r($userTypeList);exit;
		// $url = site_url()."pages/adminapi/userRoleList"; 
		// $userTypeList =  apiCall($url, "get"); 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."pages/adminapi/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."pages/admin/dashboardSidemenu");	
			}else{
				
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."pages/admin/dashboardSidemenu");	
			}  
		}
		$url = site_url()."pages/adminapi/menuList"; 
		$menuList =  apiCall($url, "get"); 
		
	 	$arrayData = [ 
			"userTypeList" => $userTypeList['result'], 
			"menuList" => $menuList['result'], 
		]; 			
        $this->template->load("admin/dashboardSidemenu",$arrayData);
    }

    /* Video Chat Request s
	   20-11-2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function VideoChatRequestList() { 
		$url = site_url()."pages/api/VideoChatRequestList"; 
		$VideoChatRequestList =  apiCall($url, "get"); 
	
		$arrayData = [ 
			"VideoChatRequestList" => $VideoChatRequestList['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('pages/admin/videoChatRequestList',$arrayData);
	}  

	public function scheduleVideoChatMeeting($id,$customerID) {

      
		//$this->load->library('Email_PHPMailer');

        $this->load->library('ZoomAPI');

        if (isset($_POST['btnSubmit'])) {

            $data = $this->input->post();
		
            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

             $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;
 
            $responseZoom1 = array();



            $responseZoom1['vcr_id'] = $id;

            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];

            $url = site_url() . "pages/api/zoomResponseUpdateVideoChatRequest/";
            $updateZooms = apiCall($url, "post", $responseZoom1);



            if ($updateZooms['result']) {
				$url = site_url()."exchangegroups/adminapi/getAllUserInfo/$customerID";
				$customerData = apiCall($url,"get");
				$customerData = $customerData['result'];
			
				$customer_user_u_name = $customerData['u_name'];
				$customer_user_email_id = $customerData['u_email'];
				$customer_user_mobileNo = $customerData['u_mobileno'];
				$join_url = $responseZoom1['join_url'];
				$start_time = $responseZoom['start_time'];
         
				
				$to  = "mangaveatul@gmail.com";
				$body  = '<p>Hello '.$customer_user_u_name. ',</p> ';
				$body .= '<p> Your Video Chat meeting has been scheduled successfully.</p>';
				$body .= '<p>Start Time: '.$start_time.' </p>';
				$body .= '<p> <a href= '.$join_url.'> Click here to join </a> </p>';
				 $email_content = $body;
                    
				$subject = 'Stelmac.io- Video Chat Details...';
			
				$mailresponse = email_Send($subject, $to, $email_content, $name);  
			
			 if($mailresponse){
				setFlash("dataMsgSuccess", " Video chat request has been scheduled successfully..!!");
				redirect(site_url()."pages/admin/videoChatRequestList");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."pages/admin/videoChatRequestList");
			}   
			}}
        $arrayData = [
            "reqData" => $reqData['result']
        ];


		$this->template->load('pages/admin/remoteProgrammingClassSchedule',$arrayData);
    
			
		
	}

}
