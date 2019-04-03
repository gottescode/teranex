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
	 	$url = site_url()."laserprocessing/api/findMultipleLaserProcessing";
		$LaserProcessing_list =  apiCall($url, "get"); 
		//print_r($additiveManufacturing_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."laserprocessing/api/updatePublishLaserProcessing";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('LaserProcessing_list' =>$LaserProcessing_list['result'] );
		//print_r($arrData);exit;
		$this->template->load("admin/LaserProcessing/list",$arrData);
	}


	/* Additive Digital Manufacturing Add / Insert / Update */
	
	public function createLaserProcessing() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			/*//print_r($pageData);exit;
			$amid = $pageData['digitalmanufacturing_cat_id']; */
			$url = site_url()."laserprocessing/api/createLaserProcessing"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."laserprocessing/admin");	
			} 	
		}  
		//$arrData = array('digitalmanufacturing_cat_id' =>$amid);

		$this->template->load("admin/LaserProcessing/create",$arrData);
	}
	public function updateLaserProcessing($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."laserprocessing/api/updateLaserProcessing";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."laserprocessing/admin");			
		}
		$url = site_url()."/laserprocessing/api/findSingleLaserProcessing/$id";
		$LaserProcessing_list =  apiCall($url, "get"); 
		//print_r($LaserProcessing_list);exit;
		$arrayData = [
			"LaserProcessing_list"=>$LaserProcessing_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/LaserProcessing/update",$arrayData);
	}
	public function deleteLaserProcessing($id) {  
		$url = site_url()."/laserprocessing/api/deleteLaserProcessing/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."laserprocessing/admin");		
	} 


    /*  Additive Manufacturing Processes Add / Insert / Update */
	public function laserProcessingMaterialList() {

		$url = site_url()."laserprocessing/api/findMultipleLaserProcessingMaterial/";
		$LaserProcessingMaterial_list =  apiCall($url, "get"); 
	    //print_r($LaserProcessingMaterial_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."laserprocessing/api/updatePublishLaserProcessingMaterial";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('LaserProcessingMaterial_list' =>$LaserProcessingMaterial_list['result']);
		//print_r($arrData);exit;
		$this->template->load("admin/LaserprocessingMaterial/list",$arrData);
	}
	public function createLaserProcessingMaterial() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."laserprocessing/api/createLaserProcessingMaterial"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."laserprocessing/admin/laserProcessingMaterialList");	
			} 	
		}  
		$this->template->load("admin/LaserprocessingMaterial/create",$arrData);
	}
	public function updateLaserProcessingMaterial($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."laserprocessing/api/updateLaserProcessingMaterial";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."laserprocessing/admin/laserProcessingMaterialList");			
		}
		$url = site_url()."/laserprocessing/api/findSingleLaserProcessingMaterial/$id";
		$LaserProcessingMaterial_list =  apiCall($url, "get"); 
	//	print_r($additiveManufacturingProcesses_list);exit;
		$arrayData = [
			"LaserProcessingMaterial_list"=>$LaserProcessingMaterial_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/LaserprocessingMaterial/update",$arrayData);
	}
	public function deleteLaserProcessingMaterial($id) {  
		$url = site_url()."/laserprocessing/api/deleteLaserProcessingMaterial/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."laserprocessing/admin/laserProcessingMaterialList");		
	} 


	/************************* RFQ GENERATION LEASER PROCESSING **************************/

	public function RequestList() {
		$url= site_url()."laserprocessing/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
	//	print_r($requestList);exit;
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/rfq/list",$arrayData);
	}

	public function request_to_supplier($dmr_id){  
		$url = site_url()."laserprocessing/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		//print_r($supplier_user_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;
			$url = site_url()."laserprocessing/api/assignSuppliers";
			$response =  apiCall($url, "post",$pageData);
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."laserprocessing/admin/request_to_supplier/$dmr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."laserprocessing/admin/request_to_supplier/$dmr_id");
			}  
		}
		$arrayData=[
			"supplier_user_list"=>$supplier_user_list['result'],
			"dmr_id"=>$dmr_id
		];

		//print_r($arrayData);die;
		$this->template->load("admin/rfq/request_to_supplier",$arrayData);
	}

	 /**
	 * LEASER PROCESSING Request From Supplier
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function laserprocessing_req_suppliers($dmrID) {  

		$url = site_url()."/laserprocessing/api/LaserprocessingSuppliers/$dmrID";
        $requestList =  apiCall($url, "get"); 
       // print_r($requestList);exit;
        $url = site_url()."/laserprocessing/api/SingleLaserprocessingSuppliers/$dmrID";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 
				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   
			); 
		//print_r($arrayData);exit;
			$this->template->load("admin/laserprocessing_req_suppliers",$arrayData); 	
	}

	public function viewLaserprocessingSupplierQoute($drrs_id=0) { 

		//Application List By Post Method
            
            if(isset($_POST['btnRfqQuot'])){
			$pageData = $this->input->post(); 
                        //print_r($pageData);die;
			$url = site_url()."/laserprocessing/api/LaserProcessingSupplierListAcceptByadmin/";
			$requestSupplierList =  apiCall($url,"post",$pageData); 
		 	//print_r($requestSupplierList);exit;
		
			redirect(site_url()."laserprocessing/admin/RequestList/");
        }
            
            
            
		$url = site_url()."laserprocessing/api/findSingle_Laserprocessing_quote_supplier/$drrs_id";
		$result = apiCall($url,"get");
		//print_r($result);exit;
		$dmr_id=$result['result']['dmr_id'];
        $url = site_url()."/laserprocessing/api/SingleLaserprocessingSuppliers/$dmr_id";
        $singleList =  apiCall($url, "get"); 
		$arrayData=array( 
			"result"=>$result['result'],   
			"singleList"=>$singleList['result'] 
		); 
                
               // print_r($arrayData);die;
			$this->template->load("admin/viewLaserprocessingSupplierQoute",$arrayData); 		 
	}

	/**
	 * LEASER PROCESSING Supplier Accept By Admin
	   26-07-2018 Deepak Shinde
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function LaserprocessingSupplierListAcceptByadmin($drrs_id){

		$url = site_url()."/laserprocessing/api/LaserprocessingSupplierListAcceptByadmin/$drrs_id";
		$requestSupplierList =  apiCall($url, "get"); 
		  //  print_r($requestSupplierList);exit;
		redirect(site_url()."laserprocessing/admin/RequestList/");	

	}

     
}
?>