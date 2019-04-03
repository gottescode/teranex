<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materialtype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/materialtypeapi/findMultiple/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("materialtype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/materialtypeapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/materialtype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$url = site_url()."settings/materialtypeapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		 
		$arrData = array('type_list' =>$type_list['result'] , );
		$this->template->load("materialtype/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/materialtypeapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/materialtype/");			
		}
		$url = site_url()."settings/materialtypeapi/findSingle/$id";
		$type_data =  apiCall($url, "get");
		$url = site_url()."settings/materialtypeapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("materialtype/update",$arrayData);
	}
	public function deletetype($id) {  
		$url = site_url()."settings/materialtypeapi/deletetype/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/materialtype/");		
	} 
}

?>
