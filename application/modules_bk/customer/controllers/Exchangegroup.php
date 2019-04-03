<?php if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Exchangegroup extends FRONTEND_Controller {



    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();
    }
    /* Customer */
	public function rfqListExchangeGroupCustomer() {
		$userId = $this->session->userdata('uid');		
		$url = site_url()."customer/exchangegroupapi/findmultipleExchangegroup/{$userId}";
		$rfqData =  apiCall($url,"get");
		
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("exchangegroups/customer_rfq_list", $arrayData);
	}
	
	public function viewDetails($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/exchangegroupapi/findSingleExchangeRfq/{$id}";
		$rfqData =  apiCall($url,"get");
	
		$arrayData = [
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("exchangegroups/customer_rfq_detail", $arrayData);
	}
	public function viewDetailsSupplier($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/exchangegroupapi/findSingleExchangeRfqSupplier/{$id}";
		$rfqData =  apiCall($url,"get");

		$contry_id = $rfqData['result']['contry_id'];
		$state_id = $rfqData['result']['state_id'];
		$city_id = $rfqData['result']['city_id'];
		
		$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$contry_id}";
		$countryName =  apiCall($url,"get");
		
		$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
		$stateName =  apiCall($url,"get");
	
		$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
		$cityName =  apiCall($url,"get");

		$arrayData = [
						"rfqData"=>$rfqData['result'],
						"country_name"=>$countryName['result']['country_name'],
						"state_name"=>$stateName['result']['state_name'],
						"city_name"=>$cityName['result']['city_name'],
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("exchangegroups/customer_rfq_detail_for_supplier", $arrayData);
	}
	/* Supplier */
	public function rfqListExchangeGroupSupplier(){
		$userId = $this->session->userdata('uid');
		$url = site_url()."customer/exchangegroupapi/findmultipleExchangegroupSupplier/$userId";
	
		$rfqData =  apiCall($url,"get");

	
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("exchangegroups/supplier_rfq_list", $arrayData);
	}
	public function rfqListExchangeGroupSupplierAccepted(){
		$userId = $this->session->userdata('uid');
		$url = site_url()."customer/exchangegroupapi/findmultipleExchangegroupAccepted/$userId";
	
		$rfqData =  apiCall($url,"get");
		
	
		$arrayData = [
						"rfqData"=>$rfqData
					];
		$this->template->load("exchangegroups/supplier_rfq_list_accept", $arrayData);
	}
	public function acceptEnq($id){
		$supplier_id = $this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				$pageData['supplier_id'] = $supplier_id; 
			
				$url = site_url()."customer/exchangegroupapi/sendQuotToAdmin/";
				$response =  apiCall($url, "post",$pageData);
						
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."customer/exchangegroup/rfqListExchangeGroupSupplier/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."customer/exchangegroups/rfqListExchangeGroupSupplier/");
				}  
			}
		$arrayData = [
						"id"=>$id
					];
		$this->template->load("exchangegroups/sendQuoatToAdmin", $arrayData);
	}
	public function cancelEnq($id){
		
			$pageData['id'] = $id;
			$url = site_url()."customer/exchangegroupapi/sendQuotToAdminCancel/";
			$response =  apiCall($url, "post",$pageData);
						
				
				if($response['result']){
					setFlash("dataMsgSuccess", " Order Cancelled Successfully..!");
					redirect(site_url()."customer/exchangegroup/rfqListExchangeGroupSupplierAccepted/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."customer/exchangegroups/rfqListExchangeGroupSupplierAccepted/");
				}  
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