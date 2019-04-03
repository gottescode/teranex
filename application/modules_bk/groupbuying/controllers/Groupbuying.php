<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groupbuying extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	/**
		* group buying request form
		16/5/2018
		* @access public
		* @param  post form data
		* @return  
	*/ 
	public function index() {
		$user_id = $this->session->userdata('uid');
	/* 	if($user_id==''){
			redirect(site_url()."pages/signIn");	
			exit;
		} */
		if(isset($_POST['addSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$pageData['customer_id']	= $user_id;
			$url = site_url()."groupbuying/api/buyingRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataGroupMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/index/");	
			} 	
		} 
		
		/* $url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		//print_r($brandList);exit;
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");
		$url = site_url()."groupbuying/api/findMultipleCategory/";
		$groupbuying_list =  apiCall($url, "get");
		 */
		/* Consumable Data */
		$url = site_url()."groupbuying/api/findMultipleConsumableCategory/";
		$consumableCategoryData  =  apiCall($url,"POST");
		
		$url = site_url()."groupbuying/api/findMultipleConsumableType/";
		$consumableTypeData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleConsumableQty/";
		$consumableQtyData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleConsumableBrand/";
		$consumableBrandData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleConsumableUnit/";
		$consumableUnitData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleConsumableName/";
		$consumableNameData  =  apiCall($url, "POST","");
		
	/* Service Part Data */
		$url = site_url()."groupbuying/api/findMultipleServiceCategory/";
		$serviceCategoryData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleServiceType/";
		$serviceTypeData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleServiceQty/";
		$serviceQtyData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleServiceBrand/";
		$serviceBrandData  =  apiCall($url, "POST","");
		
		$url = site_url()."groupbuying/api/findMultipleServiceUnit/";
		$serviceUnitData  =  apiCall($url, "POST","");
	
		$url = site_url()."groupbuying/api/findMultipleserviceName/";
		$serviceName  =  apiCall($url, "POST","");
	
	/* Sheet Metal Data */
		$url = site_url()."groupbuying/api/findMultipleSheetMetalCategory/";
		$sheetMetalCategoryData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalType/";
		$sheetMetalTypeData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalBrand/";
		$sheetMetalBrandData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalUnit/";
		$sheetMetalUnitData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalSize/";
		$SheetMetalSizeData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalThickness/";
		$SheetMetalThicknessData  =  apiCall($url, "POST","");
		$url = site_url()."groupbuying/api/findMultipleSheetMetalName/";
		$SheetMetalName  =  apiCall($url, "POST","");
		
		if(isset($_POST['servicepartSubmit'])){
				$pageData = $this->input->post();
				$pageData['customer_id'] = $this->session->userdata('uid');	
				
				$url = site_url()."groupbuying/adminapi/createServicePartRequest/";
				$response =  apiCall($url, "post",$pageData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying");
				}  
		}
		if(isset($_POST['consumableSubmit'])){
				$pageData = $this->input->post(); 
				$pageData['customer_id'] = $this->session->userdata('uid');
				$url = site_url()."groupbuying/adminapi/createConsumableRequest/";
				$response =  apiCall($url, "post",$pageData);
			
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying");
				}  
		}
		if(isset($_POST['sheetMetalSubmit'])){
				$pageData = $this->input->post(); 
				$pageData['customer_id'] = $this->session->userdata('uid');
				$url = site_url()."groupbuying/adminapi/createSheetMetalRequest/";
				$response =  apiCall($url, "post",$pageData);
				
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying");
				}  
		}
		
		$url = site_url()."groupbuying/api/findMultipleCategory/";
		$groupbuying_list =  apiCall($url, "get");
		//print_r($consumableCatData);exit;
		$arrayData=array(
							"consumableCategoryData"=>$consumableCategoryData['result'],
							"consumableUnitData"=>$consumableUnitData['result'],
							"consumableTypeData"=>$consumableTypeData['result'],
							"consumableQtyData"=>$consumableQtyData['result'],
							"consumableBrandData"=>$consumableBrandData['result'],
							"consumableNameData"=>$consumableNameData['result'],
							"serviceCategoryData"=>$serviceCategoryData['result'],
							"serviceBrandData"=>$serviceBrandData['result'],
							"serviceTypeData"=>$serviceTypeData['result'],
							"serviceQtyData"=>$serviceQtyData['result'],
							'serviceName'=>$serviceName['result'],
							"serviceUnitData"=>$serviceUnitData['result'],
							"SheetMetalSizeData"=>$SheetMetalSizeData['result'],
							"SheetMetalThicknessData"=>$SheetMetalThicknessData['result'],
							"sheetMetalUnitData"=>$sheetMetalUnitData['result'],
							"sheetMetalBrandData"=>$sheetMetalBrandData['result'],
							"sheetMetalTypeData"=>$sheetMetalTypeData['result'],
							"SheetMetalName"=>$SheetMetalName['result'],
							"sheetMetalCategoryData"=>$sheetMetalCategoryData['result'],
							'groupbuying_list'=>$groupbuying_list['result']
						);	
					
		$this->template->load("groupbuying",$arrayData);
	} 
}