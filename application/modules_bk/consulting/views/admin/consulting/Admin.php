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
	 	$url = site_url()."consulting/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consulting/api/updatePublishCategory";
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
			$url = site_url()."consulting/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consulting/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consulting/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."consulting/admin/");			
		}
		$url = site_url()."/consulting/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/consulting/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consulting/admin/");		
	} 

	/* consulting Case Study Add / Insert / Update */
	public function caseStudyList($cid) {

		$url = site_url()."consulting/api/findMultipleCaseStudy/$cid";
		$casestudy_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consulting/api/updatePublishCaseStudy";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('casestudy_list' =>$casestudy_list['result'] ,'cid' =>$cid );
		//print_r($arrData);exit;
		$this->template->load("admin/consulting/list",$arrData);
	}
	public function createCaseStudy($cid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$cid = $pageData['consulting_category_id']; 
			$url = site_url()."consulting/api/createCaseStudy"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consulting/admin/caseStudyList/$cid");	
			} 	
		}  
		$arrData = array('consulting_category_id' =>$cid);

		$this->template->load("admin/consulting/create",$arrData);
	}
	public function updateCaseStudy($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['consulting_category_id']; 
			$url = site_url()."consulting/api/updateCaseStudy";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."consulting/admin/caseStudyList/$cid");			
		}
		$url = site_url()."/consulting/api/findSingleCaseStudy/$id";
		$casestudy_data =  apiCall($url, "get"); 
		$arrayData = [
			"casestudy_data"=>$casestudy_data['result'], 
			"consulting_category_id"=>$casestudy_data['result']['consulting_category_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/consulting/update",$arrayData);
	}
	public function deleteCaseStudy($cid,$id) {  
		$url = site_url()."/consulting/api/deleteCaseStudy/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consulting/admin/caseStudyList/$cid");		
	} 

	/*Request a call
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function consultingRequestCall() { 
		$url = site_url()."consulting/api/consultingRequestCall"; 
		$requestCall =  apiCall($url, "get"); 
		$arrayData = [ 
			"requestCall" => $requestCall['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/consulting/consultingRequestCall',$arrayData);
	}  

	/*consulting Speak Consultant
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function consultingSpeakConsultant() { 
		$url = site_url()."consulting/api/consultingSpeakConsultant"; 
		$SpeakConsultant =  apiCall($url, "get"); 
		print_r($SpeakConsultant);exit;
		$arrayData = [ 
			"SpeakConsultant" => $SpeakConsultant['result'] , 
		]; 			
		$this->template->load('admin/consulting/consultingSpeakConsultant',$arrayData);
	}  


	/*Analyst Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function analystQuery() { 
		$url = site_url()."consulting/api/analystQuery"; 
		$analystQuery =  apiCall($url, "get"); 
      // print_r($analystQuery);exit;
		$arrayData = [ 
			"analystQuery" => $analystQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/consulting/analystQuery',$arrayData);
	}   

	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function salesQuery() { 
		$url = site_url()."consulting/api/salesQuery"; 
		$salesQuery =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"salesQuery" => $salesQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/consulting/salesQuery',$arrayData);
	}  

	/*Webinar
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function webinar() { 
		$url = site_url()."consulting/api/webinar"; 
		$webinar =  apiCall($url, "get"); 
		//print_r($webinar);exit;
		$arrayData = [ 
			"webinar" => $webinar['result'] , 
		]; 			
		$this->template->load('admin/consulting/webinar',$arrayData);
	}  

		/* Team Member Add / Insert / Update */
	public function teamList() {

		$url = site_url()."consulting/api/findMultipleTeam";
		$team_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consulting/api/updatePublishTeam";
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
			$url = site_url()."consulting/api/createTeam"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consulting/admin/teamList");	
			} 	
		} 
		

		$this->template->load("admin/team/create",$arrData);
	}
	public function updateTeam($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consulting/api/updateTeam";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."consulting/admin/teamList");			
		}
		$url = site_url()."/consulting/api/findSingleTeam/$id";
		$team_data =  apiCall($url, "get"); 
		$arrayData = [
			"team_data"=>$team_data['result'], 
			];
		$this->template->load("admin/team/update",$arrayData);
	}
	public function deleteTeam($id) {  
		$url = site_url()."/consulting/api/deleteTeam/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consulting/admin/teamList");		
	}

		 /* Client List  Add / Insert / Update */
	public function clientList() {

		$url = site_url()."consulting/api/findMultipleClient";
		$client_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consulting/api/updatePublishClient";
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
			$url = site_url()."consulting/api/createClient"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consulting/admin/clientList");	
			} 	
		} 
		

		$this->template->load("admin/client/create",$arrData);
	}
	public function updateClient($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consulting/api/updateClient";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."consulting/admin/clientList");			
		}
		$url = site_url()."/consulting/api/findSingleClient/$id";
		$client_data =  apiCall($url, "get"); 
		$arrayData = [
			"client_data"=>$client_data['result'], 
			];
		$this->template->load("admin/client/update",$arrayData);
	}
	public function deleteClient($id) {  
		$url = site_url()."/consulting/api/deleteClient/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consulting/admin/clientList");		
	} 

	
	
}

?>
