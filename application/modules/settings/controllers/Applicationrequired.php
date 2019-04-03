<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Applicationrequired extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("applicationrequired/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/applicationrequiredapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/applicationrequired/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		 
		 
		$arrData = array( );
		$this->template->load("applicationrequired/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/applicationrequiredapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/applicationrequired/");			
		}
		$url = site_url()."settings/applicationrequiredapi/findSingle/$id";
		$type_data =  apiCall($url, "get");
		 
		$arrayData = [
			"type_data"=>$type_data['result'],  
		];
		$this->template->load("applicationrequired/update",$arrayData);
	}
	public function deletetype($id) {  
		$url = site_url()."settings/applicationrequiredapi/deletetype/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/applicationrequired/");		
	} 
}

?>
