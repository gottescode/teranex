<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
		
    }

	public function index() {
		$url= site_url()."automation/api/findMultipleAutomationCat";
		$automationCatList = apiCall($url,"get");
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			
			$url = site_url()."automation/api/updatePublishAutomationCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				
				redirect(site_url()."automation/admin/");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/");	
			}  
		}

		$arrayData = [
			"automationCatList" => $automationCatList['result']
		];
		$this->template->load("admin/list",$arrayData);
	}
	public function create_category() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/createCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/");	
			} 	
		} 
		$this->template->load("admin/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/updateAutomationCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/");	
			}			
		}
		$url = site_url()."/automation/api/findSingleAutomationCategory/$id";
		$result =  apiCall($url, "get");
		$arrayData = [
			"result"=>$result['result'], 
			];
		$this->template->load("admin/update",$arrayData);
	}
	public function delete($id) {  
		$url = site_url()."/automation/api/delete/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."automation/admin/");		
	} 
		
/* =====================automation DETAILS======================= */
	public function automationList() {  
		$url= site_url()."automation/api/automationDetailsMultiple";
		$automationCatList = apiCall($url,"get");
		//print_r($automationCatList);exit;
		$arrayData = [
			"automationCatList"=>$automationCatList['result']['result']
		];
		$this->template->load("admin/automation/list",$arrayData);
	}
	public function create_automation() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			
			$url = site_url()."automation/api/automationInsertDetails";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automationList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automationList");	
			} 	
		}
		$this->load->model("location/country_model");
		$url= site_url()."automation/api/findMultipleAutomationCat";
		$categoryList = apiCall($url,"get");
		$url	= site_url()."automation/api/automationBrandList";
		$brandList = apiCall($url,"get");
			
		$arrayData = [
			"categoryList"=>$categoryList['result'],
			"countryList" => $this->country_model->getCountryListForSite(),
			"brandList" =>$brandList['result']['result']
		];		
		$this->template->load("admin/automation/create",$arrayData);
	}
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update automation details
	 * @return array of post data
	 */
	public function update_automation($aid) {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
		//	print_r($pageData);exit;
			$url = site_url()."automation/api/updateAutomationDetails";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automationList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automationList");	
			} 	
		}
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		$this->load->model("location/city_model");
		$url = site_url()."automation/api/findSingleAutomationDetails/$aid";
		$automationDetails = apiCall($url,"get");
		//print_r($automationDetails);exit;
		$url	= site_url()."automation/api/findMultipleAutomationCat";
		$categoryList = apiCall($url,"get");
		//print_r($automationDetails);exit;
		$country_id	=	$automationDetails['result']['automation_location_country'];
		$state_id	=	$automationDetails['result']['automation_location_state'];
		//print_r($brandList);exit;
		$url	= site_url()."automation/api/automationBrandList";
		$brandList = apiCall($url,"get");
		//print_r($brandList);exit;
		$url	= site_url()."automation/api/automationBrandModelList/".$automationDetails['result']['brand_name'];
		$brandModelList = apiCall($url,"get");
		
		$arrayData = [
			"automation_data"=>$automationDetails['result'],
			"country_id"=>$country_id,
			"categoryList"=>$categoryList['result'],
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
			"cityList" => $this->city_model->getCityList($state_id),
			"brandList" =>$brandList['result']['result'],
			"brandModelList" =>$brandModelList['result']['result'],
		];		
		$this->template->load("admin/automation/update",$arrayData);
	}
	public function deleteAutomationDetails($id) {  
		$url = site_url()."/automation/api/deleteAutomationDetails/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."automation/admin/automationList");		
	} 
	////////////////         Automation gallery  ///////////////////////////
	public function add_automationDetail_image($ad_id) {
				if(isset($_POST['btnSubmit'])){
						$pageData = $this->input->post();  
						$url = site_url()."automation/api/createGallery";
						$response =  apiCall($url, "post",$pageData);
						if($response['result']){
							setFlash("dataMsgSuccess", $response['message']);
							redirect("automation/admin/add_automationDetail_image/{$pageData['ad_id']}");	
						}else{
							setFlash("dataMsgError", $response['message']);
							
							redirect("automation/admin/add_automationDetail_image/{$pageData['ad_id']}");
						}
				
				}

		$url = site_url()."automation/api/findMultipleGalleryImages/$ad_id"; 
		$automationAllImages =  apiCall($url, "get"); 
		$arrayData = [ 
			"automationAllImages" => $automationAllImages ,
			"ad_id" => $ad_id 
		]; 					
		$this->template->load('admin/automation/automation_gallary',$arrayData);
	}
	public function delete_gallary($id,$pid) { 
		$url = site_url()."/automation/api/delete_gallary/$id"; 
		$response =  apiCall($url,"get");  
		setFlash("dataMsgSuccess", $response['message']);
		redirect("automation/admin/add_automationDetail_image/$pid");		
	} 
	/////////////////////////////    automation Finace Request  //////////////////////////////////
	/*automation Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationFinaceRequest() { 
		$url = site_url()."automation/api/automationFinaceRequest"; 
		$automationFinace =  apiCall($url, "get"); 
		$arrayData = [ 
			"automationFinace" => $automationFinace['result'] , 
		]; 					
		$this->template->load('admin/automation/automationFinaceRequest',$arrayData);
	} 
	public function automationRequest() { 
		$url = site_url()."automation/api/automationRequest"; 
		$automationRequestList =  apiCall($url, "get"); 
		//print_r($automationRequestList);exit;
		$arrayData = [ 
			"automationRequestList" => $automationRequestList['result'] , 
		]; 					
		$this->template->load('admin/automation/automationRequest',$arrayData);
	} 
			
/* =====================Automation DETAILS======================= */
	/*master Automation Brand List 
			20/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function automation_brand() {
		 
		$url	= site_url()."automation/api/automationBrandList";
		$brandList = apiCall($url,"get");
	 
		$arrayData = [
			"brandList"=>$brandList['result'],  
		];		
		$this->template->load("admin/brand/list",$arrayData);
	}
	/*delett master Automation Brand  
			20/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function deleteAutomationBrand($id) {  
		$url = site_url()."/automation/api/deleteAutomationBrand/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."automation/admin/automation_brand");		
	}

	public function create_brand() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/createBrand";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automation_brand");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automation_brand");	
			} 	
		} 
		$this->template->load("admin/brand/create",$arrData);
	}

	public function update_brand($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/updateAutomationBrand";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automation_brand");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automation_brand");	
			}			
		}
		$url = site_url()."/automation/api/findSingleAutomationBrand/$id";
		$result =  apiCall($url, "get");
		$arrayData = [
			"result"=>$result['result'], 
			];
		$this->template->load("admin/brand/update",$arrayData);
	}	
		
/* =====================Automation Branch Model DETAILS======================= */
	/*master Automation Brand Model List 
			21/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function automation_brand_model() {
	 
		$url	= site_url()."automation/api/automationBrandModelList";
		$brandModelList = apiCall($url,"get");
	 
		$arrayData = [
			"brandModelList"=>$brandModelList['result'],  
		];		
		$this->template->load("admin/brand_model/list",$arrayData);
	}
	public function deleteAutomationBrandModel($id) {  
		$url = site_url()."/automation/api/deleteAutomationBrandModel/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."automation/admin/automation_brand_model");		
	}
	public function create_brandModel() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/createBrandModel";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automation_brand_model");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automation_brand_model");	
			} 	
		} 
		$url	= site_url()."automation/api/automationBrandList";
		$brandList = apiCall($url,"get");
		$arrayData = [
			"brandList"=>$brandList['result']['result'],  
		];	
		$this->template->load("admin/brand_model/create",$arrayData);
	}
	public function update_brandModel($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."automation/api/updateAutomationBrandModel";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."automation/admin/automation_brand_model");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."automation/admin/automation_brand_model");	
			}			
		}
		$url = site_url()."/automation/api/findSingleAutomationBrandModel/$id";
		$result =  apiCall($url, "get");
		$url	= site_url()."automation/api/automationBrandList";
		$brandList = apiCall($url,"get");
		$arrayData = [
			"result"=>$result['result'],
			"brandList"=>$brandList['result']['result'],  			
			];
		$this->template->load("admin/brand_model/update",$arrayData);
	}
	/*master Automation Brand Model comment list
			21/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	 
	public function automationFinaceComment() {  
		 
		$url = site_url()."automation/api/automationContactRequestAdmin/"; 
		$automationContactRequest =  apiCall($url, "get"); 
		//print_r($automationContactRequest);exit;
		$arrayData = array(  "automationContactRequest"=>$automationContactRequest['result'] ); 
		
		$this->template->load("admin/automationlist",$arrayData);
	}
/**
	 * automation comment as per user List
		21/4/2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function automationcomment($amid) {  
		$user_id = $this->session->userdata('uid');
		if(isset($_POST['btnComment'])){
			$pageData = $this->input->post(); 
			$pageData['user_id'] = $user_id; 
			$pageData['automation_comment_id'] = $amid; 
			$pageData['comment_date_time'] = date('Y-m-d H:i:s'); 
			$url = site_url()."automation/api/addAutomationComment"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgCommentSuccess", $response['message']); 
			}else{
				setFlash("dataMsgCommentError", $response['message']); 
			}
		}
		
		$url = site_url()."automation/api/automationCommentReplyList/$amid"; 
		$automationCommentReplyList =  apiCall($url, "get"); 
		
		$arrayData = array(  "automationCommentReplyList"=>$automationCommentReplyList['result'] ); 
		$this->template->load("admin/automationcomment",$arrayData);
	}	
	public function videoRequests(){
		$url = site_url()."automation/api/findMultipleVideoRequest"; 
		$videoRequestList =  apiCall($url, "get"); 
		$arrayData = [
			"videoRequestList"=>$videoRequestList['result']
		];
		$this->template->load('admin/videoRequest',$arrayData);
	}
	public function assignSupplier($avr_id){
		$url = site_url()."automation/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		$arrayData = [
			"supplier_user_list"=>$supplier_user_list['result'],
			"avr_id"=>$avr_id
		];
		$this->template->load('admin/request_to_supplier',$arrayData);
	}
	
	
}
?>