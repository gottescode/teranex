<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machine extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index( ) {
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		 
		$arrayData = array("categoryList"=>$machineCatList['result']['result']);
		$this->template->load("index",$arrayData);
	} 
	public function machineList($catId=0,$machinUsed=0) {
			if($_POST['btnSearch']=='Search'){
				$pageData = $this->input->post();  
				$catId= $pageData['machine_type']; 
				$machinUsed= $pageData['used'];  
			}	 
			$url = site_url()."/machine/api/findMachineListCategory/$catId/$machinUsed";
			$machineList =  apiCall($url, "post",$pageData );
		 
			$url = site_url()."/machine/api/findMachineRecommendedListCategory/$catId/$machinUsed";
			$recommendedMachineList =  apiCall($url, "get");
		
			$url= site_url()."machine/api/findMultipleMachineCat";
			$machineCatList = apiCall($url,"get");
		
		
			$url = site_url()."/machine/api/findCategoryCount/$catId/$machinUsed";
			$categoryCount =  apiCall($url, "get");
			$this->load->model("location/country_model");
			
			$url	= site_url()."machine/api/machineBrandList";
			$brandList = apiCall($url,"get");
	 
			$url = site_url()."settings/languageapi/findMultiple/";
			$language_list =  apiCall($url, "get");  
			$arrayData = array(  "machineList"=>$machineList['result'], "catId"=>$catId,"categoryCount"=>$categoryCount['result'],"categoryList"=>$machineCatList['result'] ['result'],"countryList" => $this->country_model->getCountryListForSite(),"recommendedMachineList" => $recommendedMachineList['result'],"brandList" =>$brandList['result']['result'], "language_list"=>$language_list['result']);
		$this->template->load("machines",$arrayData);
	}
	public function compare_machine() {
		$data = $this->input->post();
		if(isset($_POST['btnEnquiry'])){
			$pageData = $this->input->post();  
			$url = site_url()."machine/api/machineEnquiryRequest/"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("machine");
			}else{
					setFlash("dataMsgEnquiryError", $response['message']); 
					redirect("machine");
			}
			
		}
			$arrayData = [
				"data" => $data 
			];
		
		$this->template->load("compare_machine",$arrayData);
	} 
	/*get single Machine details with multiple photo
			19/4/2018
	 * @access public
	 * @param  get machine Id
	 * @return array   
	 */
	public function machine_details($mid) {
		
		
		if(isset($_POST['btnRequest'])){
			$pageData = $this->input->post();  
			 
			$url = site_url()."machine/api/machineFinaceRequestInsert/"; 
			$pageData['machine_id']	= $mid;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("machine/machine/machine_details");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			 
			}
		}
		if(isset($_POST['btnContactEnquiry'])){
			$user_id = $this->session->userdata('uid');
			if($user_id){
				$pageData = $this->input->post();   
				$url = site_url()."machine/api/machineContactRequestInsert/"; 
				$pageData['user_id']	= $user_id;
				$pageData['machine_id']	= $mid;
				$response =  apiCall($url, "post",$pageData); 
			 
				if($response['result']){
						setFlash("dataMsgContactSuccess", $response['message']);
					 
				}else{
					setFlash("dataMsgContactError", $response['message']); 
				 
				}
			}else{
				redirect("pages/signIn");		
			}
		}
		if(isset($_POST['btnMachineVideo'])){
			$user_id = $this->session->userdata('uid');
			if($user_id){
				$pageData = $this->input->post();   
				$url = site_url()."machine/api/machineVideoRequestInsert/"; 
				$pageData['user_id']	= $user_id;
				$pageData['machine_id']	= $mid;
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
		if(isset($_POST['btnEnquiry'])){
			$user_id = $this->session->userdata('uid');
			$pageData = $this->input->post();  
			$pageData['md_id']=$mid;  
			$pageData['compared_machine_ids']=$mid;  
			$pageData['u_id']=$user_id;  
			$url = site_url()."machine/api/machineEnquiryRequest/"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
					setFlash("dataMsgEnquirySuccess", $response['message']);
					 
			}else{
					setFlash("dataMsgEnquiryError", $response['message']); 
					 
			}
			
		}
		$url = site_url()."machine/api/findSingleMachineDetailsFront/$mid";
		$machineDetails = apiCall($url,"get");
		
		$url = site_url()."machine/api/findMultipleGalleryImages/$mid"; 
		$machineAllImages =  apiCall($url, "get"); 
		//print_r($machineAllImages);exit;
		$url = site_url()."machine/api/machineSoftwareList/$mid";
		$softwareList =  apiCall($url, "get");
		
		$arrayData = array(  "machineDetails"=>$machineDetails['result'], "machineAllImages"=>$machineAllImages['result'],
			"softwareList"=>$softwareList['result']);
		$this->template->load("machine_details",$arrayData);
	}  
	public function softwarelist()
	{
		$this->template->load("softwarelist",$arrayData);
	}
}