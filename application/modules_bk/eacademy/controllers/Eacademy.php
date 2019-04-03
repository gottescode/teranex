<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eacademy extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	/**
	 * course category List display
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function index() {  
		$url = site_url()."eacademy/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
	
		$arrData = array('category_list' =>$category_list['result'] , );
		$this->template->load("index",$arrData);
	}
	/**
	 * Display course list as per category id
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function courseList($catId, $page=0) { 
		$url = site_url()."/eacademy/api/findSingleCategory/$catId";
		$category_data =  apiCall($url, "get"); 
		$url = site_url()."eacademy/api/findMultipleCourse/$catId";
		$courseTotalList =  apiCall($url, "get"); 
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){$start = $show * $page;}
		if(isset($_POST['btnSearch'])){ 
			$postData = $this->input->post();   
		}
		
	 	$url = site_url()."eacademy/api/findMultipleCourse/$catId/$start/$end";
		$courseList =  apiCall($url, "post",$postData);  
		$totalCount=count($courseTotalList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show); 
		$url = site_url()."eacademy/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		
		$arrayData = array('courseList'=>$courseList['result'],"category_data"=>$category_data['result'],"pageintation"=>$pageintation,'category_list' =>$category_list['result'] ,);
		$this->template->load("courseList",$arrayData);
	} 
	/**
	 * Display course details  asd per course id
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function course_details($courseId) { 
		$url = site_url()."eacademy/api/findSingleCourse/$courseId";
		$course_data =  apiCall($url, "get"); 	
		  $url = site_url()."eacademy/api/findMultipleContent/$courseId";
		$content_list =  apiCall($url, "get");
		 $faqurl = site_url()."eacademy/api/findMultipleFaq/$courseId";
		$faq_list =  apiCall($faqurl, "get"); 
		
		$commenturl = site_url()."eacademy/api/findMultipleComment/$courseId";
		$commentList =  apiCall($commenturl, "get");  
		 
		$arrayData = ["course_data"=>$course_data['result'],"content_list"=>$content_list['result'],"faq_list"=>$faq_list['result'], "commentList"=>$commentList['result'], ];
		$this->template->load("course_details",$arrayData);
	}
	/**
	 * Display trainer details as per trainer id
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function trainer_details($id) {  
		$url = site_url()."consultant/api/findSingleConsultant/$id";
		$consultant_data =  apiCall($url,"get");

		$url = site_url()."customer/api/findWorkExperinceList/$id";
		$workList =  apiCall($url, "get"); 
			
		$url = site_url()."customer/api/trainingSpecialtiesList/$id";
		$trainingList =  apiCall($url, "get"); 
			
		$arrayData = ["consultant_data"=>$consultant_data['result'],"workList"=>$workList['result'],"trainingList"=>$trainingList['result']];
		$this->template->load("trainer_details",$arrayData);
	}
	/**
	 * Display trainer list
	 * @access public
	 * @param   
	 * @return array of objects
	 */  
	public function trainers_list() {  
		$arrayData = [];
		$this->template->load("trainers_list",$arrayData);
	}
	
	/**
	 * Display course enrollment
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function course_enrollment() { 
		if(isset($_POST['btnCourseEnrollment'])){ 
			$pageData = $this->input->post(); 
			//&& $pageData["captcha"] == $this->session->userdata("captcha_courseEnrolll" )
			   
			if (!empty($pageData) ){ 
				$userid= $this->session->userdata('uid');
				$user_type= $this->session->userdata('user_type');
				$pageData['enroller_user']=$userid;
				$pageData['user_type']=$user_type;
			 	$url = site_url()."/eacademy/api/courseEnrollment"; 
				$response =  apiCall($url,"post",$pageData);
				  
				if($response['result']){
					$transaction_type = 17;
                    $this->user_log($transaction_type);
					$pageData['surl']=site_url()."payment/success/corseEnroll/".$response['result'];
					$pageData['furl']=site_url()."payment/fail/corseEnroll/".$response['result'];
					$pageData['amount']=$pageData['totalPrice']; 
					$pageData['corseEnroll']="corseEnroll";
					 
					$this->session->set_flashdata('payuData',$pageData);
					
					redirect('payment/index');
				}
				else{
				 	setFlash("ErrorMsg", $response['message']);
					redirect('eAcademy/course_details/'.$pageData['course_id']);
				}
			}
			else{
					setFlash("ErrorMsg", "Captcha Code enter wrong");
			}		
		}
		//redirect('eAcademy/course_details/4');
	}
	
	public function On_demand_course() {  
		$arrayData = [];
		$this->template->load("On_demand_course",$arrayData);
	}
	 
	public function advance_search() {  
		$arrayData = [];
		$this->template->load("advance_search",$arrayData);
	}

		public function user_log($data) {
        //  echo 'hi';die;
        //print_r($data);die;
        $pageData['transaction_type'] = $data;
        $pageData['uid'] = $this->session->userdata('uid');

        //print_r($pageData);die;
        $url = site_url() . "/customer/api/insertUserLog";
        $response = apiCall($url, "post", $pageData);
        //print_r($response);die;
    }

	
	 /* FAQ CRUD */
}

?>
