<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remotetraining extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	
	public function index($page=0) {  
		$url = site_url()."remotetraining/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		$uid  = $this->session->userdata('uid');
		if($uid){
				$url = site_url()."consultant/api/findSingleRecentlyViewedRemoteTraining/$uid";
				$recently_viewed_data =  apiCall($url,"get");
				
			
				$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
				//get recently Viewd Data
				if($recently_viewed_data['result']['consultant_ids']){
					$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedTraining/";
					$recently_viewed_data =  apiCall($url,"post",$pageData);
				
				}				
		}		
		 

		$url = site_url()."remotetraining/api/findMultipleTrainers/";
		$trainerList =  apiCall($url, "get");   
		//print_r($trainerList);exit;
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){
			$start = $show * $page;
			}
		$pageData['start']=$start;	
		$pageData['end']=$end;	
		if(isset($_POST['btnSearch'])){
			$pageData['language'] = $_POST['language']; 
			$pageData['trainerName'] = $_POST['trainerName']; 
		}	


	 	$url = site_url()."remotetraining/api/findMultipleTrainersPost";
		$trainingList =  apiCall($url, "post",$pageData);  
		//print_r($programmList);exit;
	 	$totalCount=count($trainingList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show,"start"=>$start,"end"=>$end); 
	
		$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get");  
		$user_id = $this->session->userdata('uid');
                $user_type = $this->session->userdata('user_type');

		if(isset($_POST['btnMachineVideo'])){
			//print_r("Hello");exit;
			$pageData = $this->input->post();  
			$pageData['customer_id']	= $this->session->userdata('uid');
			$pageData['requested_date']	= date('Y-m-d');;

			$url = site_url()."groupbuying/api/videoChatRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining");	
			} 	
		}  
		  
		if(isset($_POST['addSubmit'])){
			$pageData = $this->input->post();
                      	$pageData['user_type']=$user_type;
			//print_r($pageData);exit;
			$pageData['customer_id']=$user_id;
			$transaction_type = 9;
            $this->user_log($transaction_type);	
			$url = site_url()."remotetraining/api/courseRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataGroupMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/index");	
			} 	
		} 
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		//print_r($brandList);exit;
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");



		$arrData = array('trainingList'=>$trainingList['result'],'trainerList'=>$trainerList['result'],"pageintation"=>$pageintation,'category_list' =>$category_list['result'] ,"machineCatList"=>$machineCatList['result']['result'],"brandList"=>$brandList['result']['result'],
		"brandModelList"=>$brandModelList['result']['result'],"recently_viewed_data"=>$recently_viewed_data['result']
		
		);
                
                //print_r($arrData);die;
		$this->template->load("index",$arrData);
	}
	public function courseList($catId, $page=0) { 
		$url = site_url()."remotetraining/api/findSingleCategory/$catId";
		$category_data =  apiCall($url, "get"); 
		$url = site_url()."remotetraining/api/findMultipleCourse/$catId";
		$courseTotalList =  apiCall($url, "get"); 
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){$start = $show * $page;}
	 	$url = site_url()."remotetraining/api/findMultipleCourse/$catId/$start/$end";
		$courseList =  apiCall($url, "get");  
		$totalCount=count($courseTotalList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show); 
		
		$arrayData = array('courseList'=>$courseList['result'],"category_data"=>$category_data['result'],"pageintation"=>$pageintation);
		$this->template->load("courseList",$arrayData);
	} 
	
	public function course_details($courseId) { 
            	if(isset($_POST['btnCourseEnrollment'])){ 
                  // echo 'hi';die;
			$pageData = $this->input->post(); 
                        print_r($pageData);exit;
			//&& $pageData["captcha"] == $this->session->userdata("captcha_courseEnrolll" )
			   
			if (!empty($pageData) ){ 
				$userid= $this->session->userdata('uid');
				$pageData['enroller_user']=$userid;
                                //print_r($pageData);die;
			 	$url = site_url()."remotetraining/api/courseEnrollment"; 
				$response =  apiCall($url,"post",$pageData);
				  
				if($response['result']){
					$pageData['surl']=site_url()."payment/success/corseEnroll/".$response['result'];
					$pageData['furl']=site_url()."payment/fail/corseEnroll/".$response['result'];
					$pageData['amount']=$pageData['totalPrice']; 
					$pageData['corseEnroll']="corseEnroll";
					 
					$this->session->set_flashdata('payuData',$pageData);
					
					redirect('payment/index');
				}
				else{
				 	setFlash("ErrorMsg", $response['message']);
					redirect('remotetraining/course_details/'.$pageData['course_id']);
				}
			}
			else{
					setFlash("ErrorMsg", "Captcha Code enter wrong");
			}		
		}
		$url = site_url()."remotetraining/api/findSingleCourse/$courseId";
		$course_data =  apiCall($url, "get"); 	
		  $url = site_url()."remotetraining/api/findMultipleContent/$courseId";
		$content_list =  apiCall($url, "get");
		 $faqurl = site_url()."remotetraining/api/findMultipleFaq/$courseId";
		$faq_list =  apiCall($faqurl, "get"); 
		
		$commenturl = site_url()."remotetraining/api/findMultipleComment/$courseId";
		$commentList =  apiCall($commenturl, "get");  
		 
		$arrayData = ["course_data"=>$course_data['result'],"content_list"=>$content_list['result'],"faq_list"=>$faq_list['result'], "commentList"=>$commentList['result'], ];
		$this->template->load("course_details",$arrayData);
	}
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
	 
	public function trainers_list() {  
		$arrayData = [];
		$this->template->load("trainers_list",$arrayData);
	}
	
	public function course_enrollment() { 
           // echo 'hi';die;
		if(isset($_POST['btnCourseEnrollment'])){ 
                  // echo 'hi';die;
			$pageData = $this->input->post(); 
                        print_r($pageData);exit;
			//&& $pageData["captcha"] == $this->session->userdata("captcha_courseEnrolll" )
			   
			if (!empty($pageData) ){ 
				$userid= $this->session->userdata('uid');
				$pageData['enroller_user']=$userid;
                                //print_r($pageData);die;
			 	$url = site_url()."remotetraining/api/courseEnrollment"; 
				$response =  apiCall($url,"post",$pageData);
				  
				if($response['result']){
					$pageData['surl']=site_url()."payment/success/corseEnroll/".$response['result'];
					$pageData['furl']=site_url()."payment/fail/corseEnroll/".$response['result'];
					$pageData['amount']=$pageData['totalPrice']; 
					$pageData['corseEnroll']="corseEnroll";
					 
					$this->session->set_flashdata('payuData',$pageData);
					
					redirect('payment/index');
				}
				else{
				 	setFlash("ErrorMsg", $response['message']);
					redirect('remotetraining/course_details/'.$pageData['course_id']);
				}
			}
			else{
					setFlash("ErrorMsg", "Captcha Code enter wrong");
			}		
		}
		//redirect('remotetraining/course_details/4');
	}
	
	public function On_demand_course() {  
		$arrayData = [];
		$this->template->load("On_demand_course",$arrayData);
	}
	 
	public function advance_search() {  
		$arrayData = [];
		$this->template->load("advance_search",$arrayData);
	}
	// public function online_courses() {
	// 	$this->template->load("online_courses",$arrayData);
	// }
	public function online_courses($page=0) {  
		$url = site_url()."remotetraining/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		$uid  = $this->session->userdata('uid');
		if($uid){
				$url = site_url()."consultant/api/findSingleRecentlyViewedRemoteTraining/$uid";
				$recently_viewed_data =  apiCall($url,"get");
				
			
				$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
				//get recently Viewd Data
				if($recently_viewed_data['result']['consultant_ids']){
					$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedTraining/";
					$recently_viewed_data =  apiCall($url,"post",$pageData);
				
				}				
		}		
		 

		$url = site_url()."remotetraining/api/findMultipleTrainers/";
		$trainerList =  apiCall($url, "get");   
		//print_r($trainerList);exit;
		$show=20;	
		$start=0;
		$end=20;
		if($page>0){
			$start = $show * $page;
			}
		$pageData['start']=$start;	
		$pageData['end']=$end;	
		if(isset($_POST['btnSearch'])){
			$pageData['language'] = $_POST['language']; 
			$pageData['trainerName'] = $_POST['trainerName']; 
		}	


	 	$url = site_url()."remotetraining/api/findMultipleTrainersPost";
		$trainingList =  apiCall($url, "post",$pageData);  
		//print_r($programmList);exit;
	 	$totalCount=count($trainingList['result']);
		$pageintation=array("totalCount"=>$totalCount,"page"=>$page,"show"=>$show,"start"=>$start,"end"=>$end); 
	
		$url = site_url()."settings/languageapi/findMultiple/";
		$language_list =  apiCall($url, "get");  
		$user_id = $this->session->userdata('uid');
                $user_type = $this->session->userdata('user_type');
	   
		if(isset($_POST['addSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$pageData['customer_id']=$user_id;
			$pageData['user_type']=$user_type;
           $url = site_url()."remotetraining/api/courseRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataGroupMsgSuccess", $response['message']);
				redirect(site_url()."remotetraining/index");	
			} 	
		} 
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		//print_r($brandList);exit;
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");



		$arrData = array('trainingList'=>$trainingList['result'],'trainerList'=>$trainerList['result'],"pageintation"=>$pageintation,'category_list' =>$category_list['result'] ,"machineCatList"=>$machineCatList['result']['result'],"brandList"=>$brandList['result']['result'],
		"brandModelList"=>$brandModelList['result']['result'],"recently_viewed_data"=>$recently_viewed_data['result']
		
		);
		$this->template->load("online_courses",$arrData);
	}

	// user log 

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
