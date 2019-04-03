<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Companytype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/companyapi/findMultiple/";
		$type_list =   apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."settings/companyapi/updatePublishcompanytype";
			$response =   apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('type_list' =>$type_list['result'] , );
		$this->template->load("companytype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/companyapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/companytype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("companytype/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/companyapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/companytype/");			
		}
		$url = site_url()."settings/companyapi/findSingle/$id";
		$supplier_data =  apiCall($url, "get");
 
		$arrayData = [
			"supplier_data"=>$supplier_data['result'], 
		];
		$this->template->load("companytype/update",$arrayData);
	}
	public function deleteCompanytype($id) {  
		 $url = site_url()."settings/companyapi/deletecompanytype/$id";
		$response =  apiCall($url, "get",1);
 	
		setFlash("dataMsgSuccess", $response['message']);
		 redirect(site_url()."settings/companytype/");		
	} 
}

?>
