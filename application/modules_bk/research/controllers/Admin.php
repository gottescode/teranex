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
	 	$url = site_url()."research/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."research/api/updatePublishCategory";
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
			$url = site_url()."research/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."research/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."research/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."research/admin/");			
		}
		$url = site_url()."/research/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/research/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."research/admin/");		
	} 
	
	/* Research Report Add / Insert / Update */
	public function researchList($rid) {

		$url = site_url()."research/api/findMultipleresearch/$rid";
		$research_list =  apiCall($url, "get"); 
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."research/api/updatePublishresearch";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('research_list' =>$research_list['result'] ,'rid' =>$rid );
		//print_r($arrData);exit;
		$this->template->load("admin/research/list",$arrData);
	}
	public function createResearch($rid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$rid = $pageData['report_category_id']; 
			$url = site_url()."research/api/createResearch"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."research/admin/researchList/$rid");	
			} 	
		}  
		$arrData = array('report_category_id' =>$rid);

		$this->template->load("admin/research/create",$arrData);
	}
	public function updateResearch($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$rid = $pageData['report_category_id']; 
			$url = site_url()."research/api/updateResearch";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."research/admin/researchList/$rid");			
		}
		$url = site_url()."/research/api/findSingleResearch/$id";
		$research_data =  apiCall($url, "get"); 
		$arrayData = [
			"research_data"=>$research_data['result'], 
			"report_category_id"=>$research_data['result']['report_category_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/research/update",$arrayData);
	}
	public function deleteResearch($rid,$id) {  
		$url = site_url()."/research/api/deleteResearch/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."research/admin/researchList/$rid");		
	} 

	/*Research Report Sample 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function researchReportSample() { 
		$url = site_url()."research/api/researchReportSample"; 
		$reportSample =  apiCall($url, "get"); 
      // print_r($reportSample);exit;
		$arrayData = [ 
			"reportSample" => $reportSample['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/research/researchReportSample',$arrayData);
	}  

		/*Inquiry Before Buying
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function inquiryBeforeBuying() { 
		$url = site_url()."research/api/inquiryBeforeBuying"; 
		$inquiryBeforeBuying =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"inquiryBeforeBuying" => $inquiryBeforeBuying['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/research/inquiryBeforeBuying',$arrayData);
	} 


	/*Speak To Consultant Before Buying
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function researchSpeakConsultant() { 
		$url = site_url()."research/api/researchSpeakConsultant"; 
		$researchSpeakConsultant =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"researchSpeakConsultant" => $researchSpeakConsultant['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/research/researchSpeakConsultant',$arrayData);
	} 

	/*Analyst Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function analystQuery() { 
		$url = site_url()."research/api/analystQuery"; 
		$analystQuery =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"analystQuery" => $analystQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/research/analystQuery',$arrayData);
	}   

	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function salesQuery() { 
		$url = site_url()."research/api/salesQuery"; 
		$salesQuery =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"salesQuery" => $salesQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/research/salesQuery',$arrayData);
	}  


	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function salesPurchaseList() { 
		$url = site_url()."research/api/research_purchases_list/";
		$purchasesList = apiCall($url,"get");
		$arrayData=array( 
			"purchasesList"=>$purchasesList['result'],    
		); 		
 		//print_r($arrayData);exit;
		$this->template->load('admin/salesPurchaseList',$arrayData);
	}

	
	/* Team Member Add / Insert / Update */
	public function teamList() {

		$url = site_url()."research/api/findMultipleTeam";
		$team_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."research/api/updatePublishTeam";
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
			$url = site_url()."research/api/createTeam"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."research/admin/teamList");	
			} 	
		} 
		

		$this->template->load("admin/team/create",$arrData);
	}
	public function updateTeam($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."research/api/updateTeam";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."research/admin/teamList");			
		}
		$url = site_url()."/research/api/findSingleTeam/$id";
		$team_data =  apiCall($url, "get"); 
		$arrayData = [
			"team_data"=>$team_data['result'], 
			];
		$this->template->load("admin/team/update",$arrayData);
	}
	public function deleteTeam($id) {  
		$url = site_url()."/research/api/deleteTeam/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."research/admin/teamList");		
	} 

	/*Report Customization
	  31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function reportCustomizationList() { 
		$url = site_url()."research/api/reportCustomizationList"; 
		$reportcustomization =  apiCall($url, "get"); 
      // print_r($reportSample);exit;
		$arrayData = [ 
			"reportcustomization" => $reportcustomization['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/research/reportcustomization',$arrayData);
	}

	 /* Client List  Add / Insert / Update */
	public function clientList() {

		$url = site_url()."research/api/findMultipleClient";
		$client_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."research/api/updatePublishClient";
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
			$url = site_url()."research/api/createClient"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."research/admin/clientList");	
			} 	
		} 
		

		$this->template->load("admin/client/create",$arrData);
	}
	public function updateClient($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."research/api/updateClient";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."research/admin/clientList");			
		}
		$url = site_url()."/research/api/findSingleClient/$id";
		$client_data =  apiCall($url, "get"); 
		$arrayData = [
			"client_data"=>$client_data['result'], 
			];
		$this->template->load("admin/client/update",$arrayData);
	}
	public function deleteClient($id) {  
		$url = site_url()."/research/api/deleteClient/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."research/admin/clientList");		
	} 

	

   
}

?>
