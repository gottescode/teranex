<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pojectcategory extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/categoryapi/findMultiple/";
		$supplier_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."settings/categoryapi/updatePublishpojectcategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('pojectcategory_list' =>$supplier_list['result'] , );
		$this->template->load("pojectcategory/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/categoryapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/pojectcategory/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("pojectcategory/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/categoryapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/pojectcategory/");			
		}
		$url = site_url()."settings/categoryapi/findSingle/$id";
		$supplier_data =  apiCall($url, "get");
 
		$arrayData = [
			"supplier_data"=>$supplier_data['result'], 
		];
		$this->template->load("pojectcategory/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."settings/categoryapi/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/pojectcategory/");		
	} 
}

?>
