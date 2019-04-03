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
	 	$url = site_url()."snapshot/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."snapshot/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}

	/*Snapshot Create Category
			04/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."snapshot/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."snapshot/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
		//	print_r($pageData);exit;
			$url = site_url()."snapshot/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."snapshot/admin/");			
		}
		$url = site_url()."/snapshot/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/snapshot/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."snapshot/admin/");		
	} 
    

    /*Snapshot Subscription
			06/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 


	public function subscriptionlist() {
	 	$url = site_url()."snapshot/api/findMultipleSubscription/";
		$subscription_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."snapshot/api/updatePublishSubscription";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('subscription_list' =>$subscription_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/subscription/list",$arrData);
	}

	public function createSubscription() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."snapshot/api/createSubscription"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."snapshot/admin/subscriptionlist");	
			} 	
		} 
		

		$this->template->load("admin/subscription/create",$arrData);
	}
	public function updateSubscription($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."snapshot/api/updateSubscription";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."snapshot/admin/subscriptionlist");			
		}
		$url = site_url()."/snapshot/api/findSingleSubscription/$id";
		$subscription_data =  apiCall($url, "get"); 
		
		$arrayData = [
			"subscription_data"=>$subscription_data['result'], 
			];
		$this->template->load("admin/subscription/update",$arrayData);
	}
	public function deleteSubscription($id) {  
		$url = site_url()."/snapshot/api/deleteSubscription/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."snapshot/admin/subscriptionlist");		
	} 

	
	/*Snapshot Speak Consultant
			04/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function snapshotSpeakConsultant() { 
		$url = site_url()."snapshot/api/snapshotSpeakConsultant"; 
		$SpeakConsultant =  apiCall($url, "get"); 
		//print_r($SpeakConsultant);exit;
		$arrayData = [ 
			"SpeakConsultant" => $SpeakConsultant['result'] , 
		]; 			
		$this->template->load('admin/snapshot/snapshotSpeakConsultant',$arrayData);
	}  

		/*Sales Query
			06/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function salesPurchaseList() { 
		$url = site_url()."snapshot/api/subscription_purchases_list/";
		$purchasesList = apiCall($url,"get");
		$arrayData=array( 
			"purchasesList"=>$purchasesList['result'],    
		); 		
 		//print_r($arrayData);exit;
		$this->template->load('admin/salesPurchaseList',$arrayData);
	}   
	

	/* Team Member Add / Insert / Update */
	public function teamList() {

		$url = site_url()."snapshot/api/findMultipleTeam";
		$team_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."snapshot/api/updatePublishTeam";
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
			$url = site_url()."snapshot/api/createTeam"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."snapshot/admin/teamList");	
			} 	
		} 
		

		$this->template->load("admin/team/create",$arrData);
	}
	public function updateTeam($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."snapshot/api/updateTeam";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."snapshot/admin/teamList");			
		}
		$url = site_url()."/snapshot/api/findSingleTeam/$id";
		$team_data =  apiCall($url, "get"); 
		$arrayData = [
			"team_data"=>$team_data['result'], 
			];
		$this->template->load("admin/team/update",$arrayData);
	}
	public function deleteTeam($id) {  
		$url = site_url()."/snapshot/api/deleteTeam/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."snapshot/admin/teamList");		
	} 


	/*Request a call
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function snapshotRequestCall() { 
		$url = site_url()."snapshot/api/snapshotRequestCall"; 
		$requestCall =  apiCall($url, "get"); 
		$arrayData = [ 
			"requestCall" => $requestCall['result'] , 
		]; 			
		//print_r($arrayData);exit;
		$this->template->load('admin/snapshot/snapshotRequestCall',$arrayData);
	}  


	/*Analyst Query
			18/7/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function analystQuery() { 
		$url = site_url()."snapshot/api/analystQuery"; 
		$analystQuery =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"analystQuery" => $analystQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/snapshot/analystQuery',$arrayData);
	}   

	/*Sales Query
			18/7/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function salesQuery() { 
		$url = site_url()."snapshot/api/salesQuery"; 
		$salesQuery =  apiCall($url, "get"); 
       
		$arrayData = [ 
			"salesQuery" => $salesQuery['result'] , 
		]; 			
 		//print_r($arrayData);exit;
		$this->template->load('admin/snapshot/salesQuery',$arrayData);
	}  

 /* Client List  Add / Insert / Update */
	public function clientList() {

		$url = site_url()."snapshot/api/findMultipleClient";
		$client_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."snapshot/api/updatePublishClient";
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
			$url = site_url()."snapshot/api/createClient"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."snapshot/admin/clientList");	
			} 	
		} 
		

		$this->template->load("admin/client/create",$arrData);
	}
	public function updateClient($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."snapshot/api/updateClient";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."snapshot/admin/clientList");			
		}
		$url = site_url()."/snapshot/api/findSingleClient/$id";
		$client_data =  apiCall($url, "get"); 
		$arrayData = [
			"client_data"=>$client_data['result'], 
			];
		$this->template->load("admin/client/update",$arrayData);
	}
	public function deleteClient($id) {  
		$url = site_url()."/snapshot/api/deleteClient/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."snapshot/admin/clientList");		
	} 

	



	
}

?>
