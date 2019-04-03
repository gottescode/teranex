<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultancytype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/consultancytypeapi/findMultiple/";
		$consultancytype_list =  apiCall($url, "get");  
		 
		$arrData = array('consultancytype_list' =>$consultancytype_list['result'] , );
		$this->template->load("consultancytype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			 
			$url = site_url()."settings/consultancytypeapi/create"; 
			$response =  apiCall($url, "post",$pageData);
			 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/consultancytype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("consultancytype/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/consultancytypeapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/consultancytype/");			
		}
		$url = site_url()."settings/consultancytypeapi/findSingle/$id";
		$consultancytype_data =  apiCall($url, "get");
 
		$arrayData = [
			"consultancytype_data"=>$consultancytype_data['result'], 
		];
		$this->template->load("consultancytype/update",$arrayData);
	}
	public function deleteType($id) {  
		$url = site_url()."settings/consultancytypeapi/deleteType/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/consultancytype/");		
	} 
}

?>
