<?php if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Groupbuying extends FRONTEND_Controller {



    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();
    }
    /* Customer */
	public function rfqListConsumableCustomer() {
		$userId = $this->session->userdata('uid');		
		$url = site_url()."customer/groupbuyingapi/findmultipleConsumableRfq/{$userId}";
		$rfqData =  apiCall($url,"get");
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("consumables/customer_rfq_list", $arrayData);
	}
	
	public function quoatationDetails($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/groupbuyingapi/findSingleConsumableRfq/{$id}";
		$rfqData =  apiCall($url,"get");
		$arrayData = [
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("consumables/customer_rfq_detail", $arrayData);
	}
	/* Supplier */
	public function rfqListConsumableSupplier(){
		$userId = $this->session->userdata('uid');
		$url = site_url()."customer/groupbuyingapi/findmultipleConsumableRfqByAdminToSupplier/$userId";
	
		$rfqData =  apiCall($url,"get");
		
	
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("consumables/supplier_rfq_list", $arrayData);
	}
	public function sendQuoatationToAdmin($id){
		$userId = $this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				
				$url = site_url()."customer/groupbuyingapi/sendQuotToAdmin/";
				$response =  apiCall($url, "post",$pageData);
			
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."customer/groupbuying/rfqListConsumableSupplier/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."customer/groupbuying/rfqListConsumableSupplier/");
				}  
			}
		
		//print_r($rfqData);
		//echo "</pre>";exit;
		$arrayData = [
						"id"=>$id
					];
		$this->template->load("consumables/sendQuoatToAdmin", $arrayData);
	}
	
	/* === Service Part === */
	public function rfqListServicePartsCustomer() {
		$userId = $this->session->userdata('uid');		
		$url = site_url()."customer/groupbuyingapi/findmultipleServicePartsRfq/{$userId}";
		$rfqData =  apiCall($url,"get");
		
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("serviceparts/customer_rfq_list", $arrayData);
	}
	
	public function quoatationDetailsServiceParts($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/groupbuyingapi/findSingleServicePartsRfq/{$id}";
		$rfqData =  apiCall($url,"get");
			
		$arrayData = [
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("serviceparts/customer_rfq_detail", $arrayData);
	}
	/* Supplier */
	public function rfqListSupplierServiceParts(){
		$userId = $this->session->userdata('uid');
	 	$url = site_url()."customer/groupbuyingapi/findmultipleServicePartsRfqByAdminToSupplier/$userId";
	
		$rfqData =  apiCall($url,"get");
		
	
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("serviceparts/supplier_rfq_list", $arrayData);
	}
	public function sendQuoatationToAdminServiceParts($id){
		$userId = $this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				
				$url = site_url()."customer/groupbuyingapi/sendQuotToAdminServiceParts/";
				$response =  apiCall($url, "post",$pageData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."customer/groupbuying/rfqListSupplierServiceParts/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."customer/groupbuying/rfqListSupplierServiceParts/");
				}  
			}
		
		//print_r($rfqData);
		//echo "</pre>";exit;
		$arrayData = [
						"id"=>$id
					];
		$this->template->load("serviceparts/sendQuoatToAdmin", $arrayData);
	}
	
/* === SheetMetal === */
	public function rfqListSheetMetalCustomer() {
		$userId = $this->session->userdata('uid');		
		$url = site_url()."customer/groupbuyingapi/findmultipleSheetMetalRfq/{$userId}";
		$rfqData =  apiCall($url,"get");
	
		
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("sheetmetal/customer_rfq_list", $arrayData);
	}
	
	public function quoatationDetailsSheetMetal($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/groupbuyingapi/findSingleSheetMetalRfq/{$id}";
		$rfqData =  apiCall($url,"get");
			
		$arrayData = [
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("sheetmetal/customer_rfq_detail", $arrayData);
	}
	/* Supplier */
	public function rfqListSupplierSheetMetal(){
		$userId = $this->session->userdata('uid');
	 	$url = site_url()."customer/groupbuyingapi/findmultipleSheetMetalRfqByAdminToSupplier/$userId";
		$rfqData =  apiCall($url,"get");
		
	
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("sheetmetal/supplier_rfq_list", $arrayData);
	}
	public function sendQuoatationToAdminSheetMetal($id){
		$userId = $this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				$url = site_url()."customer/groupbuyingapi/sendQuotToAdminSheetMetal/";
				$response =  apiCall($url, "post",$pageData);
			
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."customer/groupbuying/rfqListSupplierSheetMetal/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."customer/groupbuying/rfqListSupplierSheetMetal/");
				}  
			}
		
		//print_r($rfqData);
		//echo "</pre>";exit;
		$arrayData = [
						"id"=>$id
					];
		$this->template->load("sheetmetal/sendQuoatToAdmin", $arrayData);
	}
	

}