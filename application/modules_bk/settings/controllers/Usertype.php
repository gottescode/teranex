<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usertype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/userapi/findMultiple/";
		$supplier_list =  apiCall($url, "get");  
		 
		$arrData = array('supplier_list' =>$supplier_list['result'] , );
		$this->template->load("usertype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/userapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/usertype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$url = site_url()."settings/userapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		 
		$arrData = array('type_list' =>$type_list['result'] , );
		$this->template->load("usertype/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/userapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/usertype/");			
		}
		$url = site_url()."settings/userapi/findSingle/$id";
		$type_data =  apiCall($url, "get");
		$url = site_url()."settings/userapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("usertype/update",$arrayData);
	}
	public function deletetype($id) {  
		$url = site_url()."settings/userapi/deletetype/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/usertype/");		
	} 
}

?>
