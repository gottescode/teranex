<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Suppliertype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/api/findMultiple/";
		$supplier_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."settings/api/updatePublishSupplierType";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('supplier_list' =>$supplier_list['result'] , );
		$this->template->load("suppliertype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/api/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/suppliertype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("suppliertype/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/suppliertype/");			
		}
		$url = site_url()."settings/api/findSingle/$id";
		$supplier_data =  apiCall($url, "get");
 
		$arrayData = [
			"supplier_data"=>$supplier_data['result'], 
		];
		$this->template->load("suppliertype/update",$arrayData);
	}
	public function deleteSupplierType($id) {  
		$url = site_url()."settings/api/deleteSupplierType/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/suppliertype/");		
	} 
}

?>
