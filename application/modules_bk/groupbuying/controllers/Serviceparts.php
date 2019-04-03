<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Serviceparts extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }
/* Group Buying Customer rfq request List
		21/09/2018 -Atul Mangave
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function index() {
		$url = site_url()."groupbuying/adminapi/servicepartsCustrequestList"; 
		$servicepartsCustrequestList =  apiCall($url, "get");
		
		$arrayData=array("servicepartsCustrequestList"=>$servicepartsCustrequestList['result']);	
		$this->template->load("serviceparts/rfqList",$arrayData);
	}
	public function assignSupplier() {
			$formData = $this->input->post(); 
			$rfq_ids=  implode (", ", $formData['rfq_ids']);
			//print_r($pageData);exit;
			if(isset($_POST['btnSubmitSupplier'])){
				$pageData = $this->input->post(); 
				//$pageData['rfq_ids'] =  $rfq_ids;
				print_r($pageData);exit;
				$url = site_url()."groupbuying/adminapi/assignSupplier";
				$response =  apiCall($url, "post",$pageData,1);
				//print_r($response);exit;
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/serviceparts/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/serviceparts/");
				}  
			} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array("supplierList"=>$supplierList['result'],"rfq_ids"=>$rfq_ids );	
			
		$this->template->load("serviceparts/supplierList",$arrayData); 
	}
	public function createAdminRfq() {
			$formData = $this->input->post(); 
			
			$rfq_ids=  implode (", ", $formData['rfq_ids']);
			$findArray = array();
			$findArray['rfq_ids'] = $rfq_ids;
			$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetailsServiceParts";
			$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
			if(isset($_POST['addAdminRfq'])){
				$pageData = $this->input->post(); 
				$url = site_url()."groupbuying/adminapi/assignSupplier";
				$response =  apiCall($url, "post",$pageData);
				//print_r($response);exit;
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/serviceparts/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/serviceparts/");
				}  
			}


			
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$rfq_ids,
							"rfqDetails"=>$rfqDetails['result'],
						);	
			
		$this->template->load("serviceparts/rfq",$arrayData); 
	}
	public function assignSupplierForRequest() {
			
			$pageData = $this->input->post(); 
	
			if(isset($_POST['btnSubmitSupplier'])){
				$supplierData = $this->input->post(); 
				$supplierData['rfq_ids'] = $pageData['rfq_ids'];
				$supplierData['service_quantity'] = $pageData['service_quantity'];
				
				$supplierData['title'] = $pageData['title'];
				$supplierData['service_parts_name'] = $pageData['service_parts_name'];
			
				$url = site_url()."groupbuying/adminapi/assignSupplierServiceParts";
				$response =  apiCall($url, "post",$supplierData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/serviceparts/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/serviceparts/");
				} 
			} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$pageData['rfq_ids'], 
							"service_quantity"=>$pageData['service_quantity'],
							"service_parts_name"=>$pageData['service_parts_name'],
							"title"=>$pageData['title'],
						);	
			
		$this->template->load("serviceparts/supplierList",$arrayData); 
	}
	/* Group Buying rfq request List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfqList() {
			
		$url	= site_url()."groupbuying/adminapi/adminRfqListServiceParts";
		$rfqList = apiCall($url,"get"); 
		
		
		$arrayData=array("rfqList"=>$rfqList['result'] );	
		$this->template->load("serviceparts/adminRfqList",$arrayData);
	}
	public function rfqDetails($id) {
		$url	= site_url()."groupbuying/adminapi/singleRfqDetailsServiceParts/{$id}";
		$rfqList = apiCall($url,"get");
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetails";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("serviceparts/singleRfqDetails",$arrayData);
	}
	public function singleRfqDetails($id) {
	 	$url	= site_url()."groupbuying/adminapi/singleRfqDetailsServiceParts/{$id}";
		$rfqList = apiCall($url,"get");
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetailsServiceParts";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("serviceparts/singleRfqDetails",$arrayData);
	}
	


	public function sendQuotationCustomer($id,$admin_rfq_id,$supplier_id) {

		$url	= site_url()."groupbuying/adminapi/singleRfqDetailsServiceParts/{$admin_rfq_id}";
		$rfqList = apiCall($url,"get");
		
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		$findArray['service_quantity'] = $rfqList['result']['service_quantity'];
	
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$pageData['rfq_ids']=$findArray['rfq_ids'];
			$pageData['service_quantity']=$findArray['service_quantity'];
			$pageData['id']=$id;
			$pageData['supplier_id']=$supplier_id;
			$pageData['admin_rfq_id']=$admin_rfq_id;
			
			$url = site_url()."groupbuying/adminapi/updateQuotationSupplierPriceServiceParts";
			$response =  apiCall($url, "post",$pageData);
		
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/serviceparts/");			
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."groupbuying/serviceparts/");
			}
		}
		
		$this->template->load("serviceparts/createquotation",$arrayData);


	}
	
	public function quotationList($id) { 
		$url = site_url()."/groupbuying/adminapi/supplierQuotationListServiceParts/$id";
		$supplierQuotationList =  apiCall($url, "get"); 
		
		$arrayData = [
			"supplierQuotationList"=>$supplierQuotationList['result'], 
			];
		$this->template->load("serviceparts/quotationList",$arrayData);


	}


	
}
?>