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
	 	$url = site_url()."remotetraining/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."remotetraining/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."remotetraining/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."remotetraining/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."remotetraining/admin/");			
		}
		$url = site_url()."remotetraining/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."remotetraining/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/");		
	} 
	
	/* course Add / Insert / Update */
	public function courseList($cid) {
	 	$url = site_url()."remotetraining/api/findMultipleCourse/$cid";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."remotetraining/api/updatePublishCourse";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] ,'cid' =>$cid );
		$this->template->load("admin/course/list",$arrData);
	}
	public function createCourse($cid) { 
		$traineeurl = site_url()."remotetraining/api/traineeUserList/";
		$traineeuData =  apiCall($traineeurl, "get"); 	
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$cid = $pageData['cat_id']; 
			$url = site_url()."remotetraining/api/createCourse"; 
			$response =  apiCall($url, "post",$pageData); 
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseList/$cid");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseList/$cid");	
			}
		}  
		$arrData = array('catid' =>$cid ,
				"traineeuData"=>$traineeuData['result'], 
	);
		$this->template->load("admin/course/create",$arrData);
	}
	public function updateCourse($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['cat_id']; 
			$url = site_url()."remotetraining/api/updateCourse";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."remotetraining/admin/courseList/$cid");			
		}
		$url = site_url()."remotetraining/api/findSingleCourse/$id";
		$course_data =  apiCall($url, "get"); 
		$traineeurl = site_url()."remotetraining/api/traineeUserList/";
		$traineeuData =  apiCall($traineeurl, "get"); 
		$arrayData = [
			"course_data"=>$course_data['result'], 
			"traineeuData"=>$traineeuData['result'], 
			"catid"=>$course_data['result']['cat_id'], 
			];
		$this->template->load("admin/course/update",$arrayData);
	}
	public function deleteCourse($cid,$id) {  
		$url = site_url()."remotetraining/api/deleteCourse/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/courseList/$cid");		
	} 
	/* Course Module */
	public function createCourseModule($cid) { 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$pageData['course_id'] = $cid;
			$url = site_url()."remotetraining/api/createCourseModule"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleList/$cid");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleList/$cid");	
			}
		}  
		$arrData = array(
					'catid' =>$cid ,
					"traineeuData"=>$traineeuData['result'], 
					);
		$this->template->load("admin/module/create",$arrData);
	}
	public function updateCourseModule($id) {  
		$url = site_url()."remotetraining/api/findSingleCourseModule/$id";
		$course_data =  apiCall($url, "get"); 
		
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $course_data['result']['course_id']; 
			$url = site_url()."remotetraining/api/updateCourseModule";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleList/$cid");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleList/$cid");	
			}		
		}
		
		$arrayData = [
			"course_data"=>$course_data['result'], 
			];
		$this->template->load("admin/module/update",$arrayData);
	}
	public function deleteCourseModule($id) {  
		$url = site_url()."remotetraining/api/deleteCourseModule/$id";
		$response =  apiCall($url, "get"); 
		//print_r($response);exit;
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/courseModuleList/$id");	
		//redirect(site_url()."remotetraining/admin/courseList/$cid");		
	} 
	
	
	public function courseModuleList($cid) { 
		$url = site_url()."remotetraining/api/courseModuleList/$cid"; 
		$courseModule =  apiCall($url, "get"); 
		  
		$arrData = array(
					'cid' =>$cid ,
					"courseModule"=>$courseModule['result'], 
					);
		$this->template->load("admin/module/list",$arrData);
	}
	public function courseModuleListContent($id) { 
		$url = site_url()."remotetraining/api/courseModuleListContent/$id"; 
		$module_content =  apiCall($url, "get");
		$arrData = array(
					'id' =>$id ,
					"module_content"=>$module_content['result'], 
					);
		$this->template->load("admin/module_content/list",$arrData);
	}
	public function courseModuleListContentSub($id) { 
		$url = site_url()."remotetraining/api/courseModuleListContentSub/$id"; 
		$module_content =  apiCall($url, "get");
		
		$arrData = array(
					'id' =>$id ,
					"module_content"=>$module_content['result'], 
					);
		$this->template->load("admin/module_content_data/list",$arrData);
	}
	
	public function createModuleContent($id) { 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$pageData['module_id'] = $id;
			$url = site_url()."remotetraining/api/createModuleContent"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContent/$id");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContent/$id");	
			}
		}  
		$arrData = array(
					'catid' =>$cid ,
					"traineeuData"=>$traineeuData['result'], 
					);
		$this->template->load("admin/module_content/create",$arrData);
	}
	public function updateCourseModuleContent($id) {  
		$url = site_url()."remotetraining/api/findSingleCourseModuleContent/$id";
		$content_data =  apiCall($url, "get");
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			
			$url = site_url()."remotetraining/api/updateCourseModuleContent";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContent/$id");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContent/$id");	
			}		
		}
		
		$arrayData = [
			"content_data"=>$content_data['result'], 
			];
		$this->template->load("admin/module_content/update",$arrayData);
	}
	public function deleteCourseModuleContent($id) {  
		$url = site_url()."remotetraining/api/deleteCourseModule/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/courseModuleList/$id");	
	} 
	
	public function createModuleContentSub($id) { 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$pageData['module_title_id'] = $id;
			$url = site_url()."remotetraining/api/createModuleContentSub"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContentSub/$id");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContentSub/$id");	
			}
		}  
		$arrData = array(
					'catid' =>$cid ,
					"traineeuData"=>$traineeuData['result'], 
					);
		$this->template->load("admin/module_content_data/create",$arrData);
	}
	public function updateCourseModuleContentSub($id) {  
		$url = site_url()."remotetraining/api/findSingleCourseModuleContent/$id";
		$content_data =  apiCall($url, "get");
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			
			$url = site_url()."remotetraining/api/updateCourseModuleContentSub";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContentSub/$id");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."remotetraining/admin/courseModuleListContentSub/$id");	
			}		
		}
		
		$arrayData = [
			"content_data"=>$content_data['result'], 
			];
		$this->template->load("admin/module_content_data/update",$arrayData);
	}
	public function deleteCourseModuleContentSub($id) {  
		$url = site_url()."remotetraining/api/deleteCourseModuleSub/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/courseModuleListSub/$id");	
	} 
	
	/* content add as per course */
	
	public function contentList($id) {
	 	$url = site_url()."remotetraining/api/findMultipleContent/$courseid";
		$content_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."remotetraining/api/updatePublishContent";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$url = site_url()."remotetraining/api/findSingleContent/$courseid";
		$course_data =  apiCall($url, "get"); 
		
		$arrData = array('category_list' =>$content_list['result'] ,'courseid' =>$courseid,"course_data"=>$course_data['result'] );
		$this->template->load("admin/content/list",$arrData);
	}
	public function createContent($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$course_id = $pageData['course_id']; 
			$url = site_url()."remotetraining/api/createContent"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/contentList/$course_id");	
			} 	
		}  
		$arrData = array('course_id' =>$course_id , );
		$this->template->load("admin/content/create",$arrData);
	}
	public function updateContent($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['course_id']; 
			$url = site_url()."remotetraining/api/updateContent";
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."remotetraining/admin/contentList/$cid");			
		}
		$url = site_url()."remotetraining/api/findSingleContent/$id";
		$content_data =  apiCall($url, "get"); 
		 
		$arrayData = [
			"content_data"=>$content_data['result'], 
			"course_id"=>$content_data['result']['course_id'], 
			];
		$this->template->load("admin/content/update",$arrayData);
	}
	public function deleteContent($id) {  
		$url = site_url()."remotetraining/api/deleteContent/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/contentList/$cid");		
	}

	
	 /* FAQ CRUD */ 
	public function faqList($courseid) {
	 	$url = site_url()."remotetraining/api/findMultipleFaq/$courseid";
		$content_list =  apiCall($url, "get");  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."remotetraining/api/updatePublishFaq";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$url = site_url()."remotetraining/api/findSingleFaq/$courseid";
		$course_data =  apiCall($url, "get"); 
		
		$arrData = array('category_list' =>$content_list['result'] ,'courseid' =>$courseid,"course_data"=>$course_data['result'] );
		$this->template->load("admin/faq/list",$arrData);
	}
	public function createFaq($course_id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$course_id = $pageData['course_id']; 
			$url = site_url()."remotetraining/api/createFaq"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/faqList/$course_id");	
			} 	
		}  
		$arrData = array('course_id' =>$course_id , );
		$this->template->load("admin/faq/create",$arrData);
	}
	public function updateFaq($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$cid = $pageData['course_id']; 
			$url = site_url()."remotetraining/api/updateFaq";
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."remotetraining/admin/faqList/$cid");			
		}
		$url = site_url()."remotetraining/api/findSingleFaq/$id";
		$faq_data =  apiCall($url, "get"); 
		 
		$arrayData = [
			"faq_data"=>$faq_data['result'], 
			"course_id"=>$faq_data['result']['course_id'], 
			];
		$this->template->load("admin/faq/update",$arrayData);
	}
	public function deleteFaq($cid,$id) {  
		$url = site_url()."remotetraining/api/deleteFaq/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."remotetraining/admin/faqList/$cid");		
	}	

	public function course_req_list() {
		$url = site_url()."remotetraining/api/courseReqList/"; 
		$response =  apiCall($url, "get"); 
		//print_r($response);exit;
		$arrayData=array("courseList"=>$response['result'] ,);	
		$this->template->load("admin/course_req_list",$arrayData);
	}

	/* Group Buying rfq Assign to supplier 
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function supplierList($ccr_id) {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."remotetraining/api/assignSupplier";
			$response =  apiCall($url, "post",$pageData);
			//print_r($response);exit;

			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/admin/course_req_list/");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."remotetraining/admin/course_req_list/");
			}  
		} 
		$url	= site_url()."remotetraining/api/supplierList";
		$supplierList = apiCall($url,"get"); 
		$arrayData=array("supplierList"=>$supplierList['result'],"ccr_id"=>$ccr_id );	
			
		$this->template->load("admin/supplierList",$arrayData);
	}

	/*
	 * Group Buying Request From Supplier

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function course_req_suppliers($ccrID) {  

	

		$url = site_url()."/remotetraining/api/CourseSuppliers/$ccrID";
        $requestList =  apiCall($url, "get"); 
        //print_r($requestList);exit;
        $url = site_url()."/remotetraining/api/SingleCourseSuppliers/$ccrID";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   

			); 
			//print_r($arrayData);exit;
			$this->template->load("admin/course_req_suppliers",$arrayData); 	

		 

	}

	public function viewCourseSupplierQoute($csr_id=0) { 

		

		//Application List By Post Method

		$url = site_url()."remotetraining/api/findSingle_Course_quote_supplier/$csr_id";

		$result = apiCall($url,"get");
		//print_r($result);exit;
		$ccr_id=$result['result']['ccr_id'];
        $url = site_url()."/remotetraining/api/SingleCourseSuppliers/$ccr_id";
        $singleList =  apiCall($url, "get"); 
		$arrayData=array( 

			"result"=>$result['result'],   
			"singleList"=>$singleList['result'] 

		); 

			$this->template->load("admin/viewCourseSupplierQoute",$arrayData); 	

		 

	}


	/**

	 * Group Buying Supplier Accept By Admin

	   12-07-2018 Deepak Shinde

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function CourseSupplierListAcceptByadmin($csr_id){

			$url = site_url()."/remotetraining/api/CourseSupplierListUpdate/$csr_id";

			$requestSupplierList =  apiCall($url, "get"); 
		     //print_r($requestSupplierList);exit;
			redirect(site_url()."remotetraining/admin/course_req_list/");	

	}



}

?>
