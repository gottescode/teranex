<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."analytics/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."analytics/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."analytics/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."analytics/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."analytics/admin/");			
		}
		$url = site_url()."/analytics/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/analytics/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."analytics/admin/");		
	} 

	/* Analytics Case Study Add / Insert / Update */
	public function caseStudyList($cid) {

		$url = site_url()."analytics/api/findMultipleCaseStudy/$cid";
		$casestudy_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."analytics/api/updatePublishCaseStudy";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('casestudy_list' =>$casestudy_list['result'] ,'cid' =>$cid );
		//print_r($arrData);exit;
		$this->template->load("admin/analytics/list",$arrData);
	}
	public function createCaseStudy($cid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$cid = $pageData['analytics_category_id']; 
			$url = site_url()."analytics/api/createCaseStudy"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."analytics/admin/caseStudyList/$cid");	
			} 	
		}  
		$arrData = array('analytics_category_id' =>$cid);

		$this->template->load("admin/analytics/create",$arrData);
	}
	public function updateCaseStudy($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['analytics_category_id']; 
			$url = site_url()."analytics/api/updateCaseStudy";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."analytics/admin/caseStudyList/$cid");			
		}
		$url = site_url()."/analytics/api/findSingleCaseStudy/$id";
		$casestudy_data =  apiCall($url, "get"); 
		$arrayData = [
			"casestudy_data"=>$casestudy_data['result'], 
			"analytics_category_id"=>$casestudy_data['result']['analytics_category_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/analytics/update",$arrayData);
	}
	public function deleteCaseStudy($cid,$id) {  
		$url = site_url()."/analytics/api/deleteCaseStudy/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."analytics/admin/caseStudyList/$cid");		
	} 

	/*Request a call
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function analyticsRequestCall() { 
		$url = site_url()."analytics/api/analyticsRequestCall"; 
		$requestCall =  apiCall($url, "get"); 
		$arrayData = [ 
			"requestCall" => $requestCall['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/analytics/analyticsRequestCall',$arrayData);
	}  

	/*Analytics Speak Consultant
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function analyticsSpeakConsultant() { 
		$url = site_url()."analytics/api/analyticsSpeakConsultant"; 
		$SpeakConsultant =  apiCall($url, "get"); 
		//print_r($SpeakConsultant);exit;
		$arrayData = [ 
			"SpeakConsultant" => $SpeakConsultant['result'] , 
		]; 			
		$this->template->load('admin/analytics/analyticsSpeakConsultant',$arrayData);
	}  

	/*Webinar
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function webinar() { 
		$url = site_url()."analytics/api/webinar"; 
		$webinar =  apiCall($url, "get"); 
		//print_r($webinar);exit;
		$arrayData = [ 
			"webinar" => $webinar['result'] , 
		]; 			
		$this->template->load('admin/analytics/webinar',$arrayData);
	}  

	/* Team Member Add / Insert / Update */
	public function teamList() {

		$url = site_url()."analytics/api/findMultipleTeam";
		$team_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."analytics/api/updatePublishTeam";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
	
		$arrData = array('team_list' =>$team_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/team/list",$arrData);
	}
	public function createTeam() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/createTeam"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."analytics/admin/teamList");	
			} 	
		} 
		

		$this->template->load("admin/team/create",$arrData);
	}
	public function updateTeam($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."analytics/api/updateTeam";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."analytics/admin/teamList");			
		}
		$url = site_url()."/analytics/api/findSingleTeam/$id";
		$team_data =  apiCall($url, "get"); 
		$arrayData = [
			"team_data"=>$team_data['result'], 
			];
		$this->template->load("admin/team/update",$arrayData);
	}
	public function deleteTeam($id) {  
		$url = site_url()."/analytics/api/deleteTeam/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."analytics/admin/teamList");		
	} 

	/*Report Customization
	  31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function reportCustomizationList() { 
		$url = site_url()."analytics/api/reportCustomizationList"; 
		$reportcustomization =  apiCall($url, "get"); 
      // print_r($reportSample);exit;
		$arrayData = [ 
			"reportcustomization" => $reportcustomization['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/analytics/reportcustomization',$arrayData);
	}  


		 /* Client List  Add / Insert / Update */
	public function clientList() {

		$url = site_url()."analytics/api/findMultipleClient";
		$client_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."analytics/api/updatePublishClient";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
	
		$arrData = array('client_list' =>$client_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/client/list",$arrData);
	}
	public function createClient() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."analytics/api/createClient"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."analytics/admin/clientList");	
			} 	
		} 
		

		$this->template->load("admin/client/create",$arrData);
	}
	public function updateClient($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."analytics/api/updateClient";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."analytics/admin/clientList");			
		}
		$url = site_url()."/analytics/api/findSingleClient/$id";
		$client_data =  apiCall($url, "get"); 
		$arrayData = [
			"client_data"=>$client_data['result'], 
			];
		$this->template->load("admin/client/update",$arrayData);
	}
	public function deleteClient($id) {  
		$url = site_url()."/analytics/api/deleteClient/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."analytics/admin/clientList");		
	} 

	
	
}

?>
