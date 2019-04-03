<?php
if (!defined('BASEPATH'))     exit('No direct script access allowed');

/**
 * braincert class.
 * developed By :  Jaywant Narwade
 * date : 05/04/2018
 * @extends FRONTEND_Controller
 */
 
class Braincert extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		//$this->apiKey="VJdvsxxT8eKxPmYKUsa1";
		$this->apiKey="nTKBaFgUNzJ7BXmj3Uid";
		$this->webServiceUrl="https://api.braincert.com";  
    }
	/**
	 * schedule Live Class function.
	 * braincert.com
	 * @access public 
	 * @return void
	 */
	public function scheduleLiveClass()
	{ 
		$pageData = $this->input->post(); 	 
		$startDate=date_ymd($pageData['courseStartDate']);
		$classTitle=$pageData['class_title'];
		$start_time=trim($pageData['course_start_time']);
		$end_time=trim($pageData['course_end_time']);
		$apiKey=$this->apiKey;
		$timezone=33;//(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
  
			 $url="https://api.braincert.com/v2/schedule";
			  $parameter="apikey=$apiKey&title=$classTitle&timezone=$timezone&date=$startDate&start_time=$start_time&end_time=$end_time& currency=usd&ispaid=0&is_recurring=1&repeat=1&weekdays=1,2,3&end_classes_count=10&seat_attendees=2&record=1";
			 	$result=	curlUrlCall($url,$parameter);
		 
				if($result->class_id){
				 
					$pageDataBrain['entry_date']=date('Y-m-d');
					$pageDataBrain['class_id']=$result->class_id;
					$pageDataBrain['customer_user_id']=$pageData['customer_user_id'];
					$pageDataBrain['startDate']=$startDate;
					$pageDataBrain['rar_id']=$pageData['rar_id'];
					$pageDataBrain['class_title']=$pageData['class_title'];
					$pageDataBrain['start_time']=date("H:i", strtotime($pageData['course_start_time']));
					$pageDataBrain['end_time']=date("H:i", strtotime($pageData['course_end_time']));
					$url = site_url()."customer/api/requestServiceBraincert";
					$response =  apiCall($url, "post",$pageDataBrain);
					// print_r($response);exit;
					if($response['result']){
						 
						$brainData['courseName'] =$pageData['class_title'];
						$brainData['class_id'] 	=	$result->class_id;
						$brainData['rab_id'] 	=	$response['result'];
						$brainData['customer_user_id'] 	=	$pageData['customer_user_id'];
						$brainData['customer_user_name'] 	=	$pageData['customer_user_name'];
					 

						require_once APPPATH."modules\customer\controllers\Braincert.php";
						$objBraincert = new Braincert;
						$objBraincert->getClassLaunchTeacher($brainData);	 

					}  
					else{	
						setFlash("dataMsgServiceRequestError", $response['message']);
						redirect(site_url()."customer/remoteApplicationConsultant/");
					}
				}
				else{	
						setFlash("dataMsgServiceRequestError", $result['error']);
						redirect(site_url()."customer/remoteApplicationConsultant/");
				}				
			 

	}//end function
	
	/**
	 * Get Class Launch
	 * braincert.com
	 * @parameter required  class_id, userId, userName, isTeacher, lessonName, courseName
	 * @return void
	 */
	public function getClassLaunchTeacher($pageData)
	{ 
		 
		$courseName=$pageData['courseName'];
		$isTeacher=1; /// 1 - Teacher 0 - Student
		$userId	= $this->session->userdata('uid');
		$userName	= $this->session->userdata('u_name');
		$class_id=$pageData['class_id'];
		$apiKey=$this->apiKey;
		$timezone=33;//(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
		
		
		$url="https://api.braincert.com/v2/getclasslaunch";
		$parameter="apikey=$apiKey&class_id=$class_id&userId=$userId&userName=$userName&isTeacher=$isTeacher&courseName=$courseName&lessonName=tester&lessonTime=60&isRecord=0";
		$result=	curlUrlCall($url,$parameter);
		 
		$pageDataBrain['rab_id'] =$pageData['rab_id']; 
		$pageDataBrain['presenter_launchurl'] =$result->launchurl; 
		$url = site_url()."customer/api/requestServiceBraincertUpdate";
			$response =  apiCall($url, "post",$pageDataBrain); 
			 
			if($response['result']){
				 
				$brainData['courseName'] =	$courseName;
				$brainData['class_id'] 	=	$class_id;
				$brainData['rab_id'] 	=	$pageData['rab_id'];
				$brainData['customer_user_id'] 	=	$pageData['customer_user_id'];
				$brainData['customer_user_name'] 	=	$pageData['customer_user_name'];
			 

				require_once APPPATH."modules\customer\controllers\Braincert.php";
				$objBraincert = new Braincert;
				$objBraincert->getClassLaunchStudent($brainData);	 
	
			}  
			else{	
				setFlash("dataMsgServiceRequestError", $response['message']);
			}

	}//end function 
	/**
	 * Get Class Launch Student
	 * braincert.com
	 * @parameter required  class_id, userId, userName, isTeacher, lessonName, courseName
	 * @return void
	 */
	public function getClassLaunchStudent($pageData)
	{  
		$courseName=$pageData['courseName'];
		$isTeacher=0; /// 1 - Teacher 0 - Student
		$userName=$pageData['customer_user_name'];
		$userId=$pageData['customer_user_id'];
		$class_id=$pageData['class_id'];
		$apiKey=$this->apiKey;
		$timezone=33;//(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
		 
		$url="https://api.braincert.com/v2/getclasslaunch";
		$parameter="apikey=$apiKey&class_id=$class_id&userId=$userId&userName=$userName&isTeacher=$isTeacher&courseName=$courseName&lessonName=tester&lessonTime=60&isRecord=0";
		$result=	curlUrlCall($url,$parameter);
		 
		$pageDataBrain['rab_id'] =$pageData['rab_id']; 
		$pageDataBrain['attendee_launchurl'] =$result->launchurl; 
		$url = site_url()."customer/api/requestServiceBraincertUpdate";
		$response =  apiCall($url, "post",$pageDataBrain); 
	  
			if($response['result']){ 
				 setFlash("dataMsgServiceRequestError", $response['message']); 
				 redirect(site_url()."customer/remoteApplicationConsultant/");
			}  
			else{	
				setFlash("dataMsgAddError", $response['message']);
				 redirect(site_url()."customer/remoteApplicationConsultant/");
			}

	}//end function 
	/**
	 * Remove Class Launch
	 * braincert.com
	 * @parameter required  cid
	 * @return void
	 */
	public function removeClass()
	{ 
		$pageData = $this->input->post();  
		$class_id=$pageData['class_id'];
		$apiKey=$this->apiKey; 
		
		$schedulUrl= "https://api.braincert.com/v2/removeclass?apikey=$apiKey&cid=$class_id"; 
		$url = $schedulUrl;
		$data = array(); 
			// use key 'http' even if you send the request to https://...
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
			if ($result === FALSE) { /* Handle error */ }

			var_dump($result);

	}//end function 
}

?>