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
	 	$url = site_url()."eacademy/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."eacademy/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."eacademy/admin/");	
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."eacademy/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."eacademy/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."eacademy/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."eacademy/admin/");			
		}
		$url = site_url()."/eacademy/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/eacademy/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."eacademy/admin/");		
	} 
	
	/* course Add / Insert / Update */
	public function courseList($cid) {
	 	$url = site_url()."eacademy/api/findMultipleCourse/$cid";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."eacademy/api/updatePublishCourse";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] ,'cid' =>$cid );
		$this->template->load("admin/course/list",$arrData);
	}
	public function createCourse($cid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$cid = $pageData['cat_id']; 
			$url = site_url()."eacademy/api/createCourse"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				
				/* $pageData['presenter_email']=$pageData['email_trainee'];
				$pageData['presenter_name']	=$pageData['presenter_name'];
				$pageData['start_time']		=$pageData['course_start_time'];
				$pageData['title']			=$pageData['name'];
				$pageData['course_id']=$response['result'];
				$this->session->set_flashdata('wiziqData',$pageData);
				redirect('payment/scheduleClass'); */
				redirect(site_url()."eacademy/admin/courseList/$cid");	
			} 	
		}  
		$arrData = array('catid' =>$cid , );
		$this->template->load("admin/course/create",$arrData);
	}
	public function updateCourse($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['cat_id']; 
			$url = site_url()."eacademy/api/updateCourse";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."eacademy/admin/courseList/$cid");			
		}
		$url = site_url()."/eacademy/api/findSingleCourse/$id";
		$course_data =  apiCall($url, "get"); 
		$traineeurl = site_url()."/eacademy/api/traineeUserList/";
		$traineeuData =  apiCall($traineeurl, "get"); 
		$arrayData = [
			"course_data"=>$course_data['result'], 
			"traineeuData"=>$traineeuData['result'], 
			"catid"=>$course_data['result']['cat_id'], 
			];
		$this->template->load("admin/course/update",$arrayData);
	}
	public function deleteCourse($cid,$id) {  
		$url = site_url()."/eacademy/api/deleteCourse/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."eacademy/admin/courseList/$cid");		
	} 
	
	/* content add as per course */
	
	public function contentList($courseid) {
	 	$url = site_url()."eacademy/api/findMultipleContent/$courseid";
		$content_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."eacademy/api/updatePublishContent";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$url = site_url()."/eacademy/api/findSingleContent/$courseid";
		$course_data =  apiCall($url, "get"); 
		
		$arrData = array('category_list' =>$content_list['result'] ,'courseid' =>$courseid,"course_data"=>$course_data['result'] );
		$this->template->load("admin/content/list",$arrData);
	}
	public function createContent($course_id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$course_id = $pageData['course_id']; 
			$url = site_url()."eacademy/api/createContent"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."eacademy/admin/contentList/$course_id");	
			} 	
		}  
		$arrData = array('course_id' =>$course_id , );
		$this->template->load("admin/content/create",$arrData);
	}
	public function updateContent($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['course_id']; 
			$url = site_url()."eacademy/api/updateContent";
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."eacademy/admin/contentList/$cid");			
		}
		$url = site_url()."/eacademy/api/findSingleContent/$id";
		$content_data =  apiCall($url, "get"); 
		 
		$arrayData = [
			"content_data"=>$content_data['result'], 
			"course_id"=>$content_data['result']['course_id'], 
			];
		$this->template->load("admin/content/update",$arrayData);
	}
	public function deleteContent($cid,$id) {  
		$url = site_url()."/eacademy/api/deleteContent/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."eacademy/admin/contentList/$cid");		
	}

	
	 /* FAQ CRUD */ 
	public function faqList($courseid) {
	 	$url = site_url()."eacademy/api/findMultipleFaq/$courseid";
		$content_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."eacademy/api/updatePublishFaq";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$url = site_url()."/eacademy/api/findSingleFaq/$courseid";
		$course_data =  apiCall($url, "get"); 
		
		$arrData = array('category_list' =>$content_list['result'] ,'courseid' =>$courseid,"course_data"=>$course_data['result'] );
		$this->template->load("admin/faq/list",$arrData);
	}
	public function createFaq($course_id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$course_id = $pageData['course_id']; 
			$url = site_url()."eacademy/api/createFaq"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."eacademy/admin/faqList/$course_id");	
			} 	
		}  
		$arrData = array('course_id' =>$course_id , );
		$this->template->load("admin/faq/create",$arrData);
	}
	public function updateFaq($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['course_id']; 
			$url = site_url()."eacademy/api/updateFaq";
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."eacademy/admin/faqList/$cid");			
		}
		$url = site_url()."/eacademy/api/findSingleFaq/$id";
		$faq_data =  apiCall($url, "get"); 
		 
		$arrayData = [
			"faq_data"=>$faq_data['result'], 
			"course_id"=>$faq_data['result']['course_id'], 
			];
		$this->template->load("admin/faq/update",$arrayData);
	}
	public function deleteFaq($cid,$id) {  
		$url = site_url()."/eacademy/api/deleteFaq/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."eacademy/admin/faqList/$cid");		
	}	
}

?>
