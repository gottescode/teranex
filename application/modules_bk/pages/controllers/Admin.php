<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {
    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
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

}

?>
