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
		$url= site_url()."remoteapplication/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/list",$arrayData);
	}
/* Request To Programmer */
	public function request_to_programmer($rpr_id){  
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."remoteapplication/api/assignProgrammers";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remoteapplication/admin/request_to_programmer/$rpr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."remoteapplication/admin/request_to_programmer/$rpr_id");
			}  
		}
		
		$url = site_url()."remoteapplication/api/findMultipleProgrammer/";
		$programmer_user_list =  apiCall($url, "get");
		$arrayData=[
			"programmer_user_list"=>$programmer_user_list['result'],
			"rpr_id"=>$rpr_id
		];
		$this->template->load("admin/request_to_programmer",$arrayData);
	}

	public function xpertconnectCategory() {
	 	$url = site_url()."xpertconnect/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."xpertconnect/api/updatePublishCategory";
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
			$url = site_url()."xpertconnect/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."xpertconnect/admin/xpertconnectCategory");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."xpertconnect/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."xpertconnect/admin/xpertconnectCategory");			
		}
		$url = site_url()."/xpertconnect/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/xpertconnect/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."xpertconnect/admin/xpertconnectCategory");		
	}
	public function XpertsFeaturedThisMonth(){
		$url = site_url()."xpertconnect/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url,"get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."xpertconnect/api/updateXpertConnect"; 
			$response =  apiCall($url, "post",$pageData); 
			
			if($response['result']){
				setFlash("dataMsgSuccess", 'Updated Successfully');
				redirect(site_url()."xpertconnect/admin/XpertsFeaturedThisMonth");	
			} 	
		} 
		$arrayData = [
			"programmerList" => $programmerList['result']
		];
		$this->template->load("admin/category/featuredMonth",$arrayData);
	}	
	public function remoteTrainingFeaturedThisMonth(){
		$url = site_url()."remotetraining/api/findMultipleTrainers/";
		$trainerList =  apiCall($url, "get");   
		
		//exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."xpertconnect/api/updateRemoteTraining"; 
			$response =  apiCall($url, "post",$pageData); 
			
			if($response['result']){
				setFlash("dataMsgSuccess", 'Updated Successfully');
				redirect(site_url()."xpertconnect/admin/remoteTrainingFeaturedThisMonth");	
			} 	
		} 
		$arrayData = [
			"programmerList" => $trainerList['result']
		];
		$this->template->load("admin/category/featuredMonthRemoteTraining",$arrayData);
	}	
	public function remoteApplicationFeaturedThisMonth(){
		$url = site_url()."remoteapplication/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		
		//exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."xpertconnect/api/updateRemoteApplication"; 
			$response =  apiCall($url, "post",$pageData); 
			
			if($response['result']){
				setFlash("dataMsgSuccess", 'Updated Successfully');
				redirect(site_url()."xpertconnect/admin/remoteApplicationFeaturedThisMonth");	
			} 	
		} 
		$arrayData = [
			"programmerList" => $programmerList['result']
		];
		$this->template->load("admin/category/featuredMonthRemoteApplication",$arrayData);
	}	
	public function remoteProgrammingFeaturedThisMonth(){
		 
		$url = site_url()."remoteprogramming/api/findMultipleProgrammer/";
		$programmerList =  apiCall($url, "get");  
		
		
		//exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."xpertconnect/api/updateRemoteProgramming"; 
			$response =  apiCall($url, "post",$pageData); 
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgSuccess", 'Updated Successfully');
				redirect(site_url()."xpertconnect/admin/remoteProgrammingFeaturedThisMonth");	
			} 	
		} 
		$arrayData = [
			"programmerList" => $programmerList['result']
		];
		$this->template->load("admin/category/featuredMonthRemoteProgramming",$arrayData);
	}	
	
}
?>