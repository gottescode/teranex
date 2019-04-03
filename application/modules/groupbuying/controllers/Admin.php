<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
		$url = site_url()."groupbuying/api/productList"; 
		$prodcuctList =  apiCall($url, "get"); 
		$arrayData=array("prodcuctList"=>$prodcuctList['result']);	
		$this->template->load("admin/list",$arrayData);
	}
	/* Group Buying rfq request List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function rfqList() {
		 
		$url	= site_url()."groupbuying/api/adminRfqList";
		$machineRaqList = apiCall($url,"get"); 
		$arrayData=array("machineRaqList"=>$machineRaqList['result'] );	
			
		$this->template->load("admin/rfqList",$arrayData);
	}
	/* Group Buying rfq Assign to supplier 
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function supplierList($gar_id) {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."groupbuying/api/assignSupplier";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/admin/rfqList/");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."groupbuying/admin/rfqList/");
			}  
		} 
		$url	= site_url()."groupbuying/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array("supplierList"=>$supplierList['result'],"gar_id"=>$gar_id );	
			
		$this->template->load("admin/supplierList",$arrayData);
	}
	/* Group Buying rfq request generate
		15/5/2018
	 * @access public
	 * @param   
	 * @r
	 */
	public function rfq() {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."groupbuying/api/adminRfq"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/admin/rfqList");	
			} 
			else{
				setFlash("dataMsgError", $response['message']);
			}
		} 
		
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		$arrayData=array("machineCatList"=>$machineCatList['result']['result'],"brandList"=>$brandList['result']['result'], );	
			
		$this->template->load("admin/rfq",$arrayData);
	}
	public function create() {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."groupbuying/api/productAdd"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/admin/");	
			} 	
		} 
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");
	 
	 
		$arrayData=array("machineCatList"=>$machineCatList['result']['result'],"brandList"=>$brandList['result']['result'],"brandModelList"=>$brandModelList['result']['result'],);	
		
		$this->template->load("admin/create",$arrayData);
	}
	public function productUpdate($id) {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."groupbuying/api/productUpdate"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/admin/");	
			} 	
		} 
		$url = site_url()."groupbuying/api/productSingle/$id"; 
		$prodcuctData =  apiCall($url, "get"); 
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandModelList/".$prodcuctData['result']['prod_brandName'];
		$brandModelList = apiCall($url,"get");
	 
	 
		$arrayData=array("rowProduct"=>$prodcuctData['result'],"machineCatList"=>$machineCatList['result']['result'],"brandList"=>$brandList['result']['result'],"brandModelList"=>$brandModelList['result']['result'],);	
		$this->template->load("admin/create",$arrayData);
	}
	/* Product delete api call
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function productDelete($id) {
			$url = site_url()."groupbuying/api/productDelete/$id"; 
			$response =  apiCall($url, "get",$pageData); 
			redirect(site_url()."groupbuying/admin/");
	}
	/* public function _form() {
		
		$this->template->load("admin/_form",$arrayData);
	} */
	public function collective_buying_req_list() {
		$url = site_url()."groupbuying/api/collectiveBuyingReqList/"; 
		$response =  apiCall($url, "get"); 
		//print_r($response);exit;
		$arrayData=array("buyingList"=>$response['result'] ,);	
		$this->template->load("admin/collective_buying_req_list",$arrayData);
	}


	public function groupbuyingCategory() {
	 	$url = site_url()."groupbuying/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."groupbuying/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."groupbuying/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/admin/groupbuyingCategory");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."groupbuying/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."groupbuying/admin/groupbuyingCategory");			
		}
		$url = site_url()."/groupbuying/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/groupbuying/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."groupbuying/admin/groupbuyingCategory");		
	} 

	  	/**

	 * Group Buying Request From Supplier

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function groupbuying_req_suppliers($garID) {  

	

		$url = site_url()."/groupbuying/api/GroupbuyingSuppliers/$garID";
        $requestList =  apiCall($url, "get"); 
      //  print_r($requestList);exit;
        $url = site_url()."/groupbuying/api/SingleGroupbuyingSuppliers/$garID";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   

			); 
			//print_r($arrayData);exit;
			$this->template->load("admin/groupbuying_req_suppliers",$arrayData); 	

		 

	}


	public function viewGroupBuyingSupplierQoute($gsr_id=0) { 

		

		//Application List By Post Method

		$url = site_url()."groupbuying/api/findSingle_GroupBuying_quote_supplier/$gsr_id";

		$result = apiCall($url,"get");
	//	print_r($result);exit;
		$gar_id=$result['result']['gar_id'];
        $url = site_url()."/groupbuying/api/SingleGroupbuyingSuppliers/$gar_id";
        $singleList =  apiCall($url, "get"); 
		$arrayData=array( 

			"result"=>$result['result'],   
			"singleList"=>$singleList['result'] 

		); 

			$this->template->load("admin/viewGroupBuyingSupplierQoute",$arrayData); 	

		 

	}

	/**

	 * Group Buying Supplier Accept By Admin

	   12-07-2018 Deepak Shinde

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function GroupBuyingSupplierListAcceptByadmin($gsr_id){

			$url = site_url()."/groupbuying/api/GroupBuyingSupplierListUpdate/$gsr_id";

			$requestSupplierList =  apiCall($url, "get"); 
		     //print_r($requestSupplierList);exit;
			redirect(site_url()."groupbuying/admin/rfqList/");	

	}



	public function sendQuotationCustomer($gcrID) { 

		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."groupbuying/api/updateQuotationSupplierPrice";
			$response =  apiCall($url, "post",$pageData);
		
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."groupbuying/admin/sendQuotationCustomer/$gcrID");			
		}
		//print_r($gcrID);exit;
		$url = site_url()."/groupbuying/api/findSingleCustomerRequestList/$gcrID";
		$customer_request_data =  apiCall($url, "get"); 
		//print_r($customer_request_data);exit;
		$arrayData = [
			"customer_request_data"=>$customer_request_data['result'], 
			];
		$this->template->load("admin/createquotation",$arrayData);


	}


	
}
?>