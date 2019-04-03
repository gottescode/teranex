<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sheetmetal extends BACKEND_Controller {

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
		$url = site_url()."groupbuying/adminapi/sheetmetalCustrequestList"; 
		$sheetmetalCustrequestList =  apiCall($url, "get");
	
		$arrayData=array("sheetmetalCustrequestList"=>$sheetmetalCustrequestList['result']);	
		$this->template->load("sheetmetal/rfqList",$arrayData);
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
					redirect(site_url()."groupbuying/sheetmetal/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/sheetmetal/");
				}  
			} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array("supplierList"=>$supplierList['result'],"rfq_ids"=>$rfq_ids );	
			
		$this->template->load("sheetmetal/supplierList",$arrayData); 
	}
	public function createAdminRfq() {
			$formData = $this->input->post(); 
			
			$rfq_ids=  implode (", ", $formData['rfq_ids']);
			$findArray = array();
			$findArray['rfq_ids'] = $rfq_ids;
			$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetailssheetmetal";
			$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
			
			if(isset($_POST['addAdminRfq'])){
				$pageData = $this->input->post(); 
				$url = site_url()."groupbuying/adminapi/assignSupplier";
				$response =  apiCall($url, "post",$pageData);
				//print_r($response);exit;
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/sheetmetal/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/sheetmetal/");
				}  
			}


			
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$rfq_ids,
							"rfqDetails"=>$rfqDetails['result'],
						);	
			
		$this->template->load("sheetmetal/rfq",$arrayData); 
	}
	public function assignSupplierForRequest() {
			
			$pageData = $this->input->post(); 
			
			if(isset($_POST['btnSubmitSupplier'])){
				$supplierData = $this->input->post(); 
				$supplierData['rfq_ids'] = $pageData['rfq_ids'];
				$supplierData['sheet_quantity'] = $pageData['sheet_quantity'];
				
				$supplierData['title'] = $pageData['title'];
				$supplierData['sheet_metal_name'] = $pageData['sheet_metal_name'];
				
				$url = site_url()."groupbuying/adminapi/assignSuppliersheetmetal";
				$response =  apiCall($url, "post",$supplierData);
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."groupbuying/sheetmetal/");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."groupbuying/sheetmetal/");
				} 
			} 
			$url	= site_url()."groupbuying/api/supplierList";
			$supplierList = apiCall($url,"get"); 
			$arrayData=array(
							"supplierList"=>$supplierList['result'],
							"rfq_ids"=>$pageData['rfq_ids'], 
							"sheet_quantity"=>$pageData['sheet_quantity'],
							"sheet_metal_name"=>$pageData['sheet_metal_name'],
							"title"=>$pageData['title'],
						);	
		
		$this->template->load("sheetmetal/supplierList",$arrayData); 
	}
	/* Group Buying rfq request List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfqList() {
			
		$url	= site_url()."groupbuying/adminapi/adminRfqListsheetmetal";
		$rfqList = apiCall($url,"get"); 

		$arrayData=array("rfqList"=>$rfqList['result'] );	
		$this->template->load("sheetmetal/adminRfqList",$arrayData);
	}
	public function rfqDetails($id) {
		$url	= site_url()."groupbuying/adminapi/singleRfqDetailssheetmetal/{$id}";
		$rfqList = apiCall($url,"get");
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetails";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("sheetmetal/singleRfqDetails",$arrayData);
	}
	public function singleRfqDetails($id) {
	 	$url	= site_url()."groupbuying/adminapi/singleRfqDetailssheetmetal/{$id}";
		$rfqList = apiCall($url,"get");
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		
		$rfqDetailsUrl = site_url()."groupbuying/adminapi/rfqDetailssheetmetal";
		$rfqDetails =  apiCall($rfqDetailsUrl, "post",$findArray);
		
		$arrayData=array(
							"rfqList"=>$rfqList['result'],
							"rfqDetails"=>$rfqDetails['result'],
						);	
		$this->template->load("sheetmetal/singleRfqDetails",$arrayData);
	}
	


	public function sendQuotationCustomer($id,$admin_rfq_id,$supplier_id) {

		$url	= site_url()."groupbuying/adminapi/singleRfqDetailssheetmetal/{$admin_rfq_id}";
		$rfqList = apiCall($url,"get");
	
		
		$findArray = array();
		$findArray['rfq_ids'] = $rfqList['result']['rfq_ids'];
		$findArray['sheet_quantity'] = $rfqList['result']['sheet_quantity'];
	
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			
			$pageData['rfq_ids']=$findArray['rfq_ids'];
			$pageData['sheet_quantity']=$findArray['sheet_quantity'];
			$pageData['id']=$id;
			$pageData['supplier_id']=$supplier_id;
			$pageData['admin_rfq_id']=$admin_rfq_id;
			
			$url = site_url()."groupbuying/adminapi/updateQuotationSupplierPricesheetmetal";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/sheetmetal/quotationList/$admin_rfq_id");			
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."groupbuying/sheetmetal/quotationList/$admin_rfq_id");		
			}
		}
		
		$this->template->load("sheetmetal/createquotation",$arrayData);
	}
	
	public function quotationList($id) { 
		$url = site_url()."/groupbuying/adminapi/supplierQuotationListsheetmetal/$id";
		$supplierQuotationList =  apiCall($url, "get"); 
		
		$arrayData = [
			"supplierQuotationList"=>$supplierQuotationList['result'], 
			];
		$this->template->load("sheetmetal/quotationList",$arrayData);


	}


	
}
?>