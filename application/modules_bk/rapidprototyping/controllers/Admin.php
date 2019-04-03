<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
        /*$autoload['helper'] = array('slug');*/

    }

		public function index() {
	 	$url = site_url()."rapidprototyping/api/findMultipleRapidPrototyping";
		$Rapidprototyping_list =  apiCall($url, "get"); 
		//print_r($additiveManufacturing_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."rapidprototyping/api/updatePublishRapidPrototyping";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('Rapidprototyping_list' =>$Rapidprototyping_list['result'] );
		//print_r($arrData);exit;
		$this->template->load("admin/rapidprototyping/list",$arrData);
	}


	/* Additive Digital Manufacturing Add / Insert / Update */
	
	public function createRapidPrototyping() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			/*//print_r($pageData);exit;
			$amid = $pageData['digitalmanufacturing_cat_id']; */
			$url = site_url()."rapidprototyping/api/createRapidPrototyping"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."rapidprototyping/admin");	
			} 	
		}  
		//$arrData = array('digitalmanufacturing_cat_id' =>$amid);

		$this->template->load("admin/rapidprototyping/create",$arrData);
	}
	public function updateRapidPrototyping($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."rapidprototyping/api/updateRapidPrototyping";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."rapidprototyping/admin");			
		}
		$url = site_url()."/rapidprototyping/api/findSingleRapidPrototyping/$id";
		$Rapidprototyping_list =  apiCall($url, "get"); 
		//print_r($LaserProcessing_list);exit;
		$arrayData = [
			"Rapidprototyping_list"=>$Rapidprototyping_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/rapidprototyping/update",$arrayData);
	}
	public function deleteRapidPrototyping($id) {  
		$url = site_url()."/rapidprototyping/api/deleteRapidPrototyping/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."rapidprototyping/admin");		
	} 


    /*  Additive Manufacturing Processes Add / Insert / Update */
	public function rapidprototypingOnlineFeatures() {

		$url = site_url()."rapidprototyping/api/findMultipleRapidprototypingOnlineFeatures/";
		$RapidprototypingOnlineFeatures_list =  apiCall($url, "get"); 
	    //print_r($LaserProcessingMaterial_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."rapidprototyping/api/updatePublishRapidprototypingOnlineFeatures";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('RapidprototypingOnlineFeatures_list' =>$RapidprototypingOnlineFeatures_list['result']);
		//print_r($arrData);exit;
		$this->template->load("admin/RapidPrototypingOnlineFeatures/list",$arrData);
	}
	public function createRapidPrototypingOnlineFeatures() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."rapidprototyping/api/createRapidPrototypingOnlineFeatures"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."rapidprototyping/admin/rapidprototypingOnlineFeatures");	
			} 	
		}  
		$this->template->load("admin/RapidPrototypingOnlineFeatures/create",$arrData);
	}
	public function updateRapidPrototypingOnlineFeatures($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."rapidprototyping/api/updateRapidPrototypingOnlineFeatures";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."rapidprototyping/admin/rapidprototypingOnlineFeatures");			
		}
		$url = site_url()."/rapidprototyping/api/findSingleRapidprototypingOnlineFeatures/$id";
		$RapidprototypingOnlineFeatures_list =  apiCall($url, "get"); 
	//	print_r($additiveManufacturingProcesses_list);exit;
		$arrayData = [
			"RapidprototypingOnlineFeatures_list"=>$RapidprototypingOnlineFeatures_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/RapidPrototypingOnlineFeatures/update",$arrayData);
	}
	public function deleteRapidprototypingOnlineFeatures($id) {  
		$url = site_url()."/rapidprototyping/api/deleteRapidprototypingOnlineFeatures/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."rapidprototyping/admin/rapidprototypingOnlineFeatures");		
	} 


	/************************* RFQ GENERATION  ADDITIVE MANUFACTURING**************************/

	public function RequestList() {
		$url= site_url()."rapidprototyping/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
	//	print_r($requestList);exit;
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/rfq/list",$arrayData);
	}

	public function request_to_supplier($dmr_id){  
		$url = site_url()."rapidprototyping/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		//print_r($supplier_user_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;
			$url = site_url()."rapidprototyping/api/assignSuppliers";
			$response =  apiCall($url, "post",$pageData);
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."rapidprototyping/admin/request_to_supplier/$dmr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."rapidprototyping/admin/request_to_supplier/$dmr_id");
			}  
		}
		$arrayData=[
			"supplier_user_list"=>$supplier_user_list['result'],
			"dmr_id"=>$dmr_id
		];
		$this->template->load("admin/rfq/request_to_supplier",$arrayData);
	}

	 /**
	 * Rapid Prototyping Request From Supplier
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function rapidprototyping_req_suppliers($dmrID) {  

		$url = site_url()."/rapidprototyping/api/RapidprototypingSuppliers/$dmrID";
        $requestList =  apiCall($url, "get"); 
       // print_r($requestList);exit;
        $url = site_url()."/rapidprototyping/api/SingleRapidprototypingSuppliers/$dmrID";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 
				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   
			); 
			//print_r($arrayData);exit;
			$this->template->load("admin/rapidprototyping_req_suppliers",$arrayData); 	
	}

	public function viewRapidprototypingSupplierQoute($drrs_id=0) { 

		//Application List By Post Method

		 if(isset($_POST['btnRfqQuot'])){
			$pageData = $this->input->post();   
			$url = site_url()."/rapidprototyping/api/RapidprototypingSupplierListAcceptByadmin/";
			$requestSupplierList =  apiCall($url,"post",$pageData); 
		 	//print_r($requestSupplierList);exit;
		
			redirect(site_url()."rapidprototyping/admin/RequestList/");
        }
		$url = site_url()."rapidprototyping/api/findSingle_Rapidprototyping_quote_supplier/$drrs_id";
		$result = apiCall($url,"get");
		//print_r($result);exit;
		$dmr_id=$result['result']['dmr_id'];
        $url = site_url()."/rapidprototyping/api/SingleRapidprototypingSuppliers/$dmr_id";
        $singleList =  apiCall($url, "get"); 
		$arrayData=array( 
			"result"=>$result['result'],   
			"singleList"=>$singleList['result'] 
		); 
			$this->template->load("admin/viewRapidprototypingSupplierQoute",$arrayData); 		 
	}

	/**
	 * Additive Manufacturing  Supplier Accept By Admin
	   19-07-2018 Deepak Shinde
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function RapidprototypingSupplierListAcceptByadmin($drrs_id){

		$url = site_url()."/rapidprototyping/api/RapidprototypingSupplierListAcceptByadmin/$drrs_id";
		$requestSupplierList =  apiCall($url, "get"); 
		  //  print_r($requestSupplierList);exit;
		redirect(site_url()."rapidprototyping/admin/RequestList/");	

	}


     
}
?>