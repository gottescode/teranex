<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."site/api/findMultipleTestimonial/";
		$testimonial_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."site/api/updatePublishTestimonial";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('testimonial_list' =>$testimonial_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("testimonial/list",$arrData);
	}
	public function createTestimonial() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."site/api/createTestimonial"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."site/admin/");	
			} 	
		} 
		

		$this->template->load("testimonial/create",$arrData);
	}
	public function updateTestimonial($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."site/api/updateTestimonial";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."site/admin/");			
		}
		$url = site_url()."/site/api/findSingleTestimonial/$id";
		$testimonial_data =  apiCall($url, "get"); 
		$arrayData = [
			"testimonial_data"=>$testimonial_data['result'], 
			];
		$this->template->load("testimonial/update",$arrayData);
	}
	public function deleteTestimonial($id) {  
		$url = site_url()."/site/api/deleteTestimonial/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."site/admin/");		
	} 

   
}

?>
