<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get");  
		 
		$arrData = array('language_list' =>$language_list['result'] , );
		$this->template->load("language/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/languageapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/language/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$this->template->load("language/create",$result);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/languageapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/language/");			
		}
		$url = site_url()."settings/languageapi/findSingle/$id";
		$language_data =  apiCall($url, "get");
 
		$arrayData = [
			"language_data"=>$language_data['result'], 
		];
		$this->template->load("language/update",$arrayData);
	}
	public function deleteLanguage($id) {  
		$url = site_url()."settings/languageapi/deleteLanguage/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/language/");		
	} 
}

?>
