<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Helpcenter extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	
	 	$url = site_url()."settings/helpcenterapi/findMultiple/";
		$material_list =  apiCall($url,"get");  
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("helpcenter/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/helpcenterapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/helpcenter/");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
			}	
		} 
		$url = site_url()."settings/helpcenterapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		 
		$arrData = array('type_list' =>$type_list['result'] , );
		$this->template->load("helpcenter/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/helpcenterapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/helpcenter/");			
		}
		$url = site_url()."settings/helpcenterapi/findSingle/$id";
		$type_data =  apiCall($url, "get");
		
		
		$url = site_url()."settings/helpcenterapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("helpcenter/update",$arrayData);
	}
	public function deletetype($id) {  
		$url = site_url()."settings/helpcenterapi/deletetype/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/helpcenter/");		
	} 
	/* public function helpCenterTopicData($id) {
	 	$url = site_url()."settings/helpcenterapi/findSingleTopicData/$id";
		$topicData =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['topic_id'] = $id; 
			$url = site_url()."settings/helpcenterapi/helpCenterTopicData";
			$response =  apiCall($url, "post",$pageData);
		
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/helpcenter/");			
		}
		 
		$arrData = array('topicData' =>$topicData['result'] , );
		$this->template->load("helpcenter/topic_data",$arrData);
	}
	 */
	
	
}

?>
