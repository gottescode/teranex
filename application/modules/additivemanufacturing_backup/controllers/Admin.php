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
	 	$url = site_url()."additivemanufacturing/api/findMultipleAdditiveManufacturing";
		$additiveManufacturing_list =  apiCall($url, "get"); 
		//print_r($additiveManufacturing_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."additivemanufacturing/api/updatePublishAdditiveManufacturing";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('additiveManufacturing_list' =>$additiveManufacturing_list['result'] );
		//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturing/list",$arrData);
	}


	/* Additive Digital Manufacturing Add / Insert / Update */
	
	public function createAdditiveManufacturing() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			/*//print_r($pageData);exit;
			$amid = $pageData['digitalmanufacturing_cat_id']; */
			$url = site_url()."additivemanufacturing/api/createAdditiveManufacturing"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/admin");	
			} 	
		}  
		//$arrData = array('digitalmanufacturing_cat_id' =>$amid);

		$this->template->load("admin/additiveManufacturing/create",$arrData);
	}
	public function updateAdditiveManufacturing($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."additivemanufacturing/api/updateAdditiveManufacturing";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."additivemanufacturing/admin");			
		}
		$url = site_url()."/additivemanufacturing/api/findSingleAdditiveManufacturing/$id";
		$additiveManufacturing_list =  apiCall($url, "get"); 
		//print_r($AdditiveManufacturing_data);exit;
		$arrayData = [
			"additiveManufacturing_list"=>$additiveManufacturing_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturing/update",$arrayData);
	}
	public function deleteAdditiveManufacturing($id) {  
		$url = site_url()."/additivemanufacturing/api/deleteAdditiveManufacturing/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."additivemanufacturing/admin");		
	} 


    /*  Additive Manufacturing Processes Add / Insert / Update */
	public function additiveManufacturingProcessesList() {

		$url = site_url()."additivemanufacturing/api/findMultipleAdditiveManufacturingProcesses/";
		$additiveManufacturingProcesses_list =  apiCall($url, "get"); 
		//print_r($additiveManufacturingProcesses_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."additivemanufacturing/api/updatePublishAdditiveManufacturingProcesses";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('additiveManufacturingProcesses_list' =>$additiveManufacturingProcesses_list['result'] ,'$ampid' =>$ampid );
		//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturingProcesses/list",$arrData);
	}
	public function createAdditiveManufacturingProcesses() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."additivemanufacturing/api/createAdditiveManufacturingProcesses"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/admin/additiveManufacturingProcessesList");	
			} 	
		}  
		$this->template->load("admin/additiveManufacturingProcesses/create",$arrData);
	}
	public function updateAdditiveManufacturingProcesses($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."additivemanufacturing/api/updateAdditiveManufacturingProcesses";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."additivemanufacturing/admin/additiveManufacturingProcessesList");			
		}
		$url = site_url()."/additivemanufacturing/api/findSingleAdditiveManufacturingProcesses/$id";
		$additiveManufacturingProcesses_list =  apiCall($url, "get"); 
	//	print_r($additiveManufacturingProcesses_list);exit;
		$arrayData = [
			"additiveManufacturingProcesses_list"=>$additiveManufacturingProcesses_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturingProcesses/update",$arrayData);
	}
	public function deleteAdditiveManufacturingProcesses($id) {  
		$url = site_url()."/additivemanufacturing/api/deleteAdditiveManufacturingProcesses/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."additivemanufacturing/admin/additiveManufacturingProcessesList");		
	} 


	 /*  3D Printing Materials Add / Insert / Update */
	public function PrintingMaterials3DList() {

		$url = site_url()."additivemanufacturing/api/findMultiplePrintingMaterials3D/";
		$PrintingMaterials3D_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."additivemanufacturing/api/updatePublishPrintingMaterials3D";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('PrintingMaterials3D_list' =>$PrintingMaterials3D_list['result'] );
		//print_r($arrData);exit;
		$this->template->load("admin/3DPrintingMaterials/list",$arrData);
	}
	public function createPrintingMaterials3D() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit; 
			$url = site_url()."additivemanufacturing/api/createPrintingMaterials3D"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/admin/PrintingMaterials3DList");	
			} 	
		}  

		$this->template->load("admin/3DPrintingMaterials/create",$arrData);
	}
	public function update3DPrintingMaterials($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."additivemanufacturing/api/update3DPrintingMaterials";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."additivemanufacturing/admin/PrintingMaterials3DList");			
		}
		$url = site_url()."/additivemanufacturing/api/findSinglePrintingMaterials3D/$id";
		$PrintingMaterials3D_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		$arrayData = [
			"PrintingMaterials3D_list"=>$PrintingMaterials3D_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/3DPrintingMaterials/update",$arrayData);
	}
	public function deletePrintingMaterials3D($id) {  
		$url = site_url()."/additivemanufacturing/api/deletePrintingMaterials3D/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."additivemanufacturing/admin/PrintingMaterials3DList");		
	} 
     

	 /*  3D Printing Application Add / Insert / Update */
	public function PrintingApplicationList() {

		$url = site_url()."additivemanufacturing/api/findMultiplePrintingApplication";
		$PrintingApplication_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."additivemanufacturing/api/updatePublishPrintingApplication";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('PrintingApplication_list' =>$PrintingApplication_list['result'] );
		//print_r($arrData);exit;
		$this->template->load("admin/PrintingApplication/list",$arrData);
	}
	public function createPrintingApplication() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."additivemanufacturing/api/createPrintingApplication"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/admin/PrintingApplicationList");	
			} 	
		}  

		$this->template->load("admin/PrintingApplication/create",$arrData);
	}
	public function updatePrintingApplication($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."additivemanufacturing/api/updatePrintingApplication";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."additivemanufacturing/admin/PrintingApplicationList");			
		}
		$url = site_url()."/additivemanufacturing/api/findSinglePrintingApplication/$id";
		$PrintingApplication_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		$arrayData = [
			"PrintingApplication_list"=>$PrintingApplication_list['result'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/PrintingApplication/update",$arrayData);
	}
	public function deletePrintingApplication($id) {  
		$url = site_url()."/additivemanufacturing/api/deletePrintingApplication/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."additivemanufacturing/admin/PrintingApplicationList");		
	} 

	/* Request To Supplier */

	public function RequestList() {
		$url= site_url()."additivemanufacturing/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
		//print_r($requestList);exit;
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/rfq/list",$arrayData);
	}

	public function request_to_supplier($dmr_id){  
		$url = site_url()."additivemanufacturing/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url,"get");
		//print_r($supplier_user_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;
			$url = site_url()."additivemanufacturing/api/assignSuppliers";
			$response =  apiCall($url, "post",$pageData);
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/admin/request_to_supplier/$dmr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."additivemanufacturing/admin/request_to_supplier/$dmr_id");
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

	 * Additive Manufacturing Request From Supplier

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function additivemanufacturing_req_suppliers($dmrID) {  

	

		$url = site_url()."/additivemanufacturing/api/AdditivemanufacturingSuppliers/$dmrID";
        $requestList =  apiCall($url, "get"); 
       // print_r($requestList);exit;
        $url = site_url()."/additivemanufacturing/api/SingleAdditivemanufacturingSuppliers/$dmrID";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   

			); 
			//print_r($arrayData);exit;
			$this->template->load("admin/additivemanufacturing_req_suppliers",$arrayData); 	

		 

	}

	public function viewAdditiveManufacturingSupplierQoute($drrs_id=0) { 

		
        
		//Application List By Post Method

		$url = site_url()."additivemanufacturing/api/findSingle_AdditiveManufacturing_quote_supplier/$drrs_id";
		$result = apiCall($url,"get");

		//print_r($result);exit;
		$dmr_id=$result['result']['dmr_id'];
        $url = site_url()."/additivemanufacturing/api/SingleAdditivemanufacturingSuppliers/$dmr_id";
        $singleList =  apiCall($url, "get"); 
		$arrayData=array( 

			"result"=>$result['result'],   
			"singleList"=>$singleList['result']

		); 

			$this->template->load("admin/viewAdditiveManufacturingSupplierQoute",$arrayData); 	

		 

	}

	/**

	 * Additive Manufacturing  Supplier Accept By Admin

	   19-07-2018 Deepak Shinde

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function AdditiveManufacturingSupplierListAcceptByadmin($drrs_id){

	//	echo 'hi';die;

			$url = site_url()."/additivemanufacturing/api/AdditiveManufacturingSupplierListAcceptByadmin/$drrs_id";

			$requestSupplierList =  apiCall($url, "get"); 
		  //  print_r($requestSupplierList);exit;
			redirect(site_url()."additivemanufacturing/admin/RequestList/");	

	}


     
}
?>