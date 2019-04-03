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
	 	$url = site_url()."digitalmanufacturing/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."digitalmanufacturing/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}
	// if (!function_exists('create_slug')) {

		/*public function create_slug($string)
		{
		    $slug = trim($string);
		    $slug = strtolower($slug);
		    $slug = str_replace(' ', '-', $slug);

		    return $slug;
		} 
	// } */
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			
			$pageData = $this->input->post(); 
			/*$name = create_slug($pageData['digitalmanufacturing_cat_name']); 
			print_r($name);exit;*/
			$url = site_url()."digitalmanufacturing/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."digitalmanufacturing/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."digitalmanufacturing/admin/");			
		}
		$url = site_url()."/digitalmanufacturing/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/digitalmanufacturing/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."digitalmanufacturing/admin/");		
	} 

	/* Additive Digital Manufacturing Add / Insert / Update */
	public function additiveManufacturingList($amid) {

		$url = site_url()."digitalmanufacturing/api/findMultipleAdditiveManufacturing/$amid";
		$additiveManufacturing_list =  apiCall($url, "get"); 
		//print_r($casestudy_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."digitalmanufacturing/api/updatePublishAdditiveManufacturing";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('additiveManufacturing_list' =>$additiveManufacturing_list['result'] ,'$amid' =>$amid );
		//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturing/list",$arrData);
	}
	public function createAdditiveManufacturing($amid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$amid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/createAdditiveManufacturing"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingList/$amid");	
			} 	
		}  
		$arrData = array('digitalmanufacturing_cat_id' =>$amid);

		$this->template->load("admin/additiveManufacturing/create",$arrData);
	}
	public function updateAdditiveManufacturing($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$amid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/updateAdditiveManufacturing";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingList/$amid");			
		}
		$url = site_url()."/digitalmanufacturing/api/findSingleAdditiveManufacturing/$id";
		$additiveManufacturing_list =  apiCall($url, "get"); 
		//print_r($AdditiveManufacturing_data);exit;
		$arrayData = [
			"additiveManufacturing_list"=>$additiveManufacturing_list['result'], 
			"digitalmanufacturing_cat_id"=>$additiveManufacturing_list['result']['digitalmanufacturing_cat_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturing/update",$arrayData);
	}
	public function deleteAdditiveManufacturing($amid,$id) {  
		$url = site_url()."/digitalmanufacturing/api/deleteAdditiveManufacturing/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingList/$amid");		
	} 


    /*  Additive Manufacturing Processes Add / Insert / Update */
	public function additiveManufacturingProcessesList($ampid) {

		$url = site_url()."digitalmanufacturing/api/findMultipleAdditiveManufacturingProcesses/$ampid";
		$additiveManufacturingProcesses_list =  apiCall($url, "get"); 
		//print_r($additiveManufacturingProcesses_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."digitalmanufacturing/api/updatePublishAdditiveManufacturingProcesses";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('additiveManufacturingProcesses_list' =>$additiveManufacturingProcesses_list['result'] ,'$ampid' =>$ampid );
		//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturingProcesses/list",$arrData);
	}
	public function createAdditiveManufacturingProcesses($ampid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$ampid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/createAdditiveManufacturingProcesses"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingProcessesList/$ampid");	
			} 	
		}  
		$arrData = array('digitalmanufacturing_cat_id' =>$ampid);

		$this->template->load("admin/additiveManufacturingProcesses/create",$arrData);
	}
	public function updateAdditiveManufacturingProcesses($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$ampid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/updateAdditiveManufacturingProcesses";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingProcessesList/$ampid");			
		}
		$url = site_url()."/digitalmanufacturing/api/findSingleAdditiveManufacturingProcesses/$id";
		$additiveManufacturingProcesses_list =  apiCall($url, "get"); 
	//	print_r($additiveManufacturingProcesses_list);exit;
		$arrayData = [
			"additiveManufacturingProcesses_list"=>$additiveManufacturingProcesses_list['result'], 
			"digitalmanufacturing_cat_id"=>$additiveManufacturingProcesses_list['result']['digitalmanufacturing_cat_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/additiveManufacturingProcesses/update",$arrayData);
	}
	public function deleteAdditiveManufacturingProcesses($ampid,$id) {  
		$url = site_url()."/digitalmanufacturing/api/deleteAdditiveManufacturingProcesses/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."digitalmanufacturing/admin/additiveManufacturingProcessesList/$ampid");		
	} 


	 /*  3D Printing Materials Add / Insert / Update */
	public function PrintingMaterials3DList($pmid) {

		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingMaterials3D/$pmid";
		$PrintingMaterials3D_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."digitalmanufacturing/api/updatePublishPrintingMaterials3D";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('PrintingMaterials3D_list' =>$PrintingMaterials3D_list['result'] ,'$pmid' =>$pmid );
		//print_r($arrData);exit;
		$this->template->load("admin/3DPrintingMaterials/list",$arrData);
	}
	public function createPrintingMaterials3D($pmid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$pmid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/createPrintingMaterials3D"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/PrintingMaterials3DList/$pmid");	
			} 	
		}  
		$arrData = array('digitalmanufacturing_cat_id' =>$pmid);

		$this->template->load("admin/3DPrintingMaterials/create",$arrData);
	}
	public function update3DPrintingMaterials($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pmid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/update3DPrintingMaterials";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."digitalmanufacturing/admin/PrintingMaterials3DList/$pmid");			
		}
		$url = site_url()."/digitalmanufacturing/api/findSinglePrintingMaterials3D/$id";
		$PrintingMaterials3D_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		$arrayData = [
			"PrintingMaterials3D_list"=>$PrintingMaterials3D_list['result'], 
			"digitalmanufacturing_cat_id"=>$PrintingMaterials3D_list['result']['digitalmanufacturing_cat_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/3DPrintingMaterials/update",$arrayData);
	}
	public function deletePrintingMaterials3D($pmid,$id) {  
		$url = site_url()."/digitalmanufacturing/api/deletePrintingMaterials3D/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."digitalmanufacturing/admin/PrintingMaterials3DList/$pmid");		
	} 
     

	 /*  3D Printing Application Add / Insert / Update */
	public function PrintingApplicationList($paid) {

		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingApplication/$paid";
		$PrintingApplication_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."digitalmanufacturing/api/updatePublishPrintingApplication";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('PrintingApplication_list' =>$PrintingApplication_list['result'] ,'$paid' =>$paid );
		//print_r($arrData);exit;
		$this->template->load("admin/PrintingApplication/list",$arrData);
	}
	public function createPrintingApplication($paid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$paid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/createPrintingApplication"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/PrintingApplicationList/$paid");	
			} 	
		}  
		$arrData = array('digitalmanufacturing_cat_id' =>$paid);

		$this->template->load("admin/PrintingApplication/create",$arrData);
	}
	public function updatePrintingApplication($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$paid = $pageData['digitalmanufacturing_cat_id']; 
			$url = site_url()."digitalmanufacturing/api/updatePrintingApplication";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."digitalmanufacturing/admin/PrintingApplicationList/$paid");			
		}
		$url = site_url()."/digitalmanufacturing/api/findSinglePrintingApplication/$id";
		$PrintingApplication_list =  apiCall($url, "get"); 
		//print_r($PrintingMaterials3D_list);exit;
		$arrayData = [
			"PrintingApplication_list"=>$PrintingApplication_list['result'], 
			"digitalmanufacturing_cat_id"=>$PrintingApplication_list['result']['digitalmanufacturing_cat_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/PrintingApplication/update",$arrayData);
	}
	public function deletePrintingApplication($paid,$id) {  
		$url = site_url()."/digitalmanufacturing/api/deletePrintingApplication/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."digitalmanufacturing/admin/PrintingApplicationList/$paid");		
	} 

	/* Request To Supplier */

	public function RequestList() {
		$url= site_url()."digitalmanufacturing/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
		//print_r($requestList);exit;
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/rfq/list",$arrayData);
	}

	public function request_to_supplier($dmr_id){  
		$url = site_url()."digitalmanufacturing/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		//print_r($supplier_user_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;
			$url = site_url()."digitalmanufacturing/api/assignSuppliers";
			$response =  apiCall($url, "post",$pageData);
			//print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/admin/request_to_supplier/$dmr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."digitalmanufacturing/admin/request_to_supplier/$dmr_id");
			}  
		}
		$arrayData=[
			"supplier_user_list"=>$supplier_user_list['result'],
			"dmr_id"=>$dmr_id
		];
		$this->template->load("admin/rfq/request_to_supplier",$arrayData);
	}

     
}
?>