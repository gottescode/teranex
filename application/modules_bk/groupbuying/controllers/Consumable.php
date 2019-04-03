<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consumable extends BACKEND_Controller {

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
		$url = site_url()."groupbuying/adminapi/consumableCustrequestList"; 
		$consumableCustrequestList =  apiCall($url, "get");
		$arrayData=array("consumableCustrequestList"=>$consumableCustrequestList['result']);	
		$this->template->load("consumable/rfqList",$arrayData);
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
					redirect(site_url()."groupbuying/consumable/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/consumable/");
				}  
			} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array("supplierList"=>$supplierList['result'],"rfq_ids"=>$rfq_ids );	
			
		$this->template->load("consumable/supplierList",$arrayData); 
	}
	public function createAdminRfq() {
			$formData = $this->input->post(); 
			$rfq_ids=  implode (", ", $formData['rfq_ids']);
			$findArray = array();
			$findArray['rfq_ids'] = $rfq_ids;
			$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetails";
			$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
			if(isset($_POST['addAdminRfq'])){
				$pageData = $this->input->post(); 
				$url = site_url()."groupbuying/adminapi/assignSupplier";
				$response =  apiCall($url, "post",$pageData);
				//print_r($response);exit;
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/consumable/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/consumable/");
				}  
			}


			
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$rfq_ids,
							"rfqDetails"=>$rfqDetails['result'],
						);	
			
		$this->template->load("consumable/rfq",$arrayData); 
	}
	public function assignSupplierForRequest() {
			
				$pageData = $this->input->post(); 
			
			if(isset($_POST['btnSubmitSupplier'])){
				$supplierData = $this->input->post(); 
				$supplierData['rfq_ids'] = $pageData['rfq_ids'];
				$supplierData['cons_quantity'] = $pageData['cons_quantity'];
				$supplierData['title'] = $pageData['title'];
				$supplierData['consumable_name'] = $pageData['consumable_name'];
			
				$url = site_url()."groupbuying/adminapi/assignSupplier";
				$response =  apiCall($url, "post",$supplierData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/consumable/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/consumable/");
				} 
			} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$pageData['rfq_ids'], 
							"cons_quantity"=>$pageData['cons_quantity'],
							"consumable_name"=>$pageData['consumable_name'],
							"title"=>$pageData['title'],
						);	
			
		$this->template->load("consumable/supplierList",$arrayData); 
	}
	/* Group Buying rfq request List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfqList() {
			
		$url	= site_url()."groupbuying/adminapi/adminRfqList";
		$rfqList = apiCall($url,"get"); 
		
		$arrayData=array("rfqList"=>$rfqList['result'] );	
		$this->template->load("consumable/adminRfqList",$arrayData);
	}
	public function rfqDetails($id) {
		$url	= site_url()."groupbuying/adminapi/singleRfqDetails/{$id}";
		$rfqList = apiCall($url,"get");
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetails";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("consumable/singleRfqDetails",$arrayData);
	}
	public function singleRfqDetails($id) {
		$url	= site_url()."groupbuying/adminapi/singleRfqDetails/{$id}";
		$rfqList = apiCall($url,"get");
		
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetails";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("consumable/singleRfqDetails",$arrayData);
	}
	


	public function sendQuotationCustomer($id,$admin_rfq_id,$supplier_id) {

		$url	= site_url()."groupbuying/adminapi/singleRfqDetails/{$admin_rfq_id}";
		$rfqList = apiCall($url,"get");
		
		//print_r($rfqList);exit;
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		$findArray['cons_quantity'] = $rfqList['result']['cons_quantity'];
	
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$pageData['rfq_ids']=$findArray['rfq_ids'];
			$pageData['cons_quantity']=$findArray['cons_quantity'];
			$pageData['id']=$id;
			$pageData['supplier_id']=$supplier_id;
			$pageData['admin_rfq_id']=$admin_rfq_id;
			$url = site_url()."groupbuying/adminapi/updateQuotationSupplierPrice";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/consumable/adminRfqList");			
			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/consumable/adminRfqList");			
			}
			
		}
		//print_r($gcrID);exit;
		$url = site_url()."/groupbuying/api/findSingleCustomerRequestList/$gcrID";
		$customer_request_data =  apiCall($url, "get"); 
		//print_r($customer_request_data);exit;
		$arrayData = [
			"rfqList"=>$customer_request_data['result'], 
			];
		$this->template->load("consumable/createquotation",$arrayData);


	}
	
	public function quotationList($id) { 
		$url = site_url()."/groupbuying/adminapi/supplierQuotationList/$id";
		$supplierQuotationList =  apiCall($url, "get"); 
		
		$arrayData = [
			"supplierQuotationList"=>$supplierQuotationList['result'], 
			];
		$this->template->load("consumable/quotationList",$arrayData);


	}


	
}
?>