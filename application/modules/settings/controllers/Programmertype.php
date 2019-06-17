<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Programmertype extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/programmertypeapi/findMultiple/";
		$consultancytype_list =  apiCall($url, "get");  
		 
		$arrData = array('consultancytype_list' =>$consultancytype_list['result'] , );
		$this->template->load("programmertype/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			 
			$url = site_url()."settings/programmertypeapi/create"; 
			$response =  apiCall($url, "post",$pageData);
					
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/programmertype/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("programmertype/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/programmertypeapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/programmertype/");			
		}
		$url = site_url()."settings/programmertypeapi/findSingle/$id";
		$consultancytype_data =  apiCall($url, "get");
 
		$arrayData = [
			"consultancytype_data"=>$consultancytype_data['result'], 
		];
		$this->template->load("programmertype/update",$arrayData);
	}
	public function deleteType($id) {  
		$url = site_url()."settings/programmertypeapi/deleteType/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/programmertype/");		
	} 

	/* Front End Data On Demand Programming*/
	public function frontEndData() {
	 	$url = site_url()."settings/programmertypeapi/findMultipleFront/";
		$data =  apiCall($url, "get"); 
		
		$arrData = array('data' =>$data['result']);
		$this->template->load("machineProgramming/list",$arrData);
	}
	
	public function createfrontEndData() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/programmertypeapi/createFront"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/programmertype/frontEndData");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/programmertype/frontEndData");	
			}	
		} 
		 
	
		$this->template->load("machineProgramming/create");
	}
	public function updatefrontEndData($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
 
			$url = site_url()."settings/programmertypeapi/updateFront";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/programmertype/frontEndData");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/programmertype/frontEndData");	
			}
		}
		$url = site_url()."settings/programmertypeapi/findSingleFront/$id";
		$updateData =  apiCall($url, "get");
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineProgramming/update",$arrayData);
	}
	
	public function deleteFront($id) {  
		$url = site_url()."settings/programmertypeapi/deleteFront/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/programmertype/frontEndData");		
	}
	
}

?>
