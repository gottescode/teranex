<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * WizIQ class.
 * developed By :  Jaywant Narwade
 * date : 08/03/2018
 * @extends FRONTEND_Controller
 */
 
class Wiziq extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->access_key="Y+3o6ugzf3k=";
		$this->secretAcessKey="IMAnxRILkLxrldrbBvONMQ==";
		$this->webServiceUrl="http://classapi.wiziqxt.com/apimanager.ashx";
		$this->load->helper(array('authbase'));
    }
	/**
	 * addTeacherClass function.
	 * 
	 * @access public 
	 * @return void
	 */
	public function addTeacherClass()
	{ 
		$addteacher=$this->input->post(); 
		//$this->load->library('AuthBase');
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "add_teacher";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		 
		#for teacher account pass parameter 'presenter_email'
                //This is the unique email of the presenter that will identify the presenter in WizIQ. Make sure to add
                //this presenter email to your organization’s teacher account. ’ For more information visit at: (http://developer.wiziq.com/faqs)
 
		$requestParameters["email"]			= $addteacher['email'];//"joshi@teranex.co";Required
		$requestParameters["name"] 			= $addteacher['name'];//"joshi krishna";  Required
		$requestParameters["image"]			= $addteacher['image']; 
		$requestParameters["phone_number"]	= $addteacher['phone_number']; 
		$requestParameters["mobile_number"]	= $addteacher['mobile_number']; 
		$requestParameters["about_the_teacher"] = $addteacher['about_the_teacher']; 
		$requestParameters["password"]=$addteacher['password'];//Required
		$requestParameters["time_zone"]="Asia/Kolkata"; //optional
 
		$httpRequest=new HttpRequest();
		try
		{	
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=add_teacher',http_build_query($requestParameters, '', '&')); exit;
		}
		catch(Exception $e)
		{	 
	  		echo $e->getMessage();
		}
		exit;
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status"); 
		if($attribNode=="ok")
		{
			$methodTag=$objDOM->getElementsByTagName("method");
			echo "method=".$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("teacher_id");
			echo "<br>teacher ID=".$class_id=$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("teacher_email");
			echo "<br>email Id=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			 
		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
   			echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	 
		}
		}//end if	
	}//end function
	/**
	 * Edit Teacher Class function.
	 * 
	 * @access public 
	 * @return void
	 */
	public function editTeacherClass()
	{ 
		$editteacher=$this->input->post(); 
		//$this->load->library('AuthBase');
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "edit_teacher";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		 
		$requestParameters["teacher_id"]=	$addteacher['teacher_id'];// Required
		$requestParameters["name"] = 		$addteacher['name'];//"joshi krishna";  Required
		$requestParameters["email"]	=		$addteacher['email'];//"joshi@teranex.co";Required
		$requestParameters["password"]=		$addteacher['password'];//Required
		$requestParameters["image"] = 		$addteacher['image']; 
		$requestParameters["phone_number"] = $addteacher['phone_number']; 
		$requestParameters["mobile_number"] = $addteacher['mobile_number']; 
		$requestParameters["about_the_teacher"] = $addteacher['about_the_teacher']; 
		$requestParameters["time_zone"]="Asia/Kolkata"; //optional
 
		$httpRequest=new HttpRequest();
		try
		{	
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=edit_teacher',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	 
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status"); 
		if($attribNode=="ok")
		{
			$methodTag=$objDOM->getElementsByTagName("method");
			echo "method=".$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("teacher_id");
			echo "<br>teacher ID=".$class_id=$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("teacher_email");
			echo "<br>email Id=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			 
		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
   			echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	 
		}
		}//end if	
	}//end function
	
	/**
	 * cancelClass function.
	 * @param mixed $teacher_id (required)
	 * @access public 
	 * @return void
	 */
	public function detailsTeacher($teacher_id)
	{ 
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "get_teacher_details";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		 
		#for teacher account pass parameter 'presenter_email'
                //This is the unique email of the presenter that will identify the presenter in WizIQ. Make sure to add
                //this presenter email to your organization’s teacher account. ’ For more information visit at: (http://developer.wiziq.com/faqs)
		$requestParameters["teacher_id"]=$teacher_id;//"70317"; required
		$httpRequest=new HttpRequest();
		try
		{	
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=get_teacher_details',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	 
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status"); 
		if($attribNode=="ok")
		{
		 
			$methodTag=$objDOM->getElementsByTagName("method");
			echo "method=".$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("teacher_id");
			echo "<br>teacher ID=" .$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("email");
			echo "<br>email Id=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			 
			$recording_urlTag=$objDOM->getElementsByTagName("password");
			echo "<br>password=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("phone_number");
			echo "<br>phone_number=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("is_active");
			echo "<br>is_active=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("can_schedule_class");
			echo "<br>can_schedule_class=".$recording_url=$recording_urlTag->item(0)->nodeValue;
			 
		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
   			echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	 
		}
		}//end if	
	}//end function
   
	/**
	 * cancelClass function.
	 * @param mixed $class_id (required)
	 * @access public 
	 * @return void
	 */
	public function cancelClass($wiziq_class_id,$class_id,$course_id)
	{ 
		echo "Wiziq Class ID : ".$wiziq_class_id;
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "cancel";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $wiziq_class_id;
		$httpRequest=new HttpRequest();
		try
		{
		 	$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=cancel',http_build_query($requestParameters, '', '&')); 
			
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
			$status=$objDOM->getElementsByTagName("rsp")->item(0);
    		$attribNode = $status->getAttribute("status");
			if($attribNode=="ok"){
				$methodTag=$objDOM->getElementsByTagName("method");
				$method=$methodTag->item(0)->nodeValue;
				$cancelTag=$objDOM->getElementsByTagName("cancel")->item(0);
				$cancel = $cancelTag->getAttribute("status");
				$cancel1.= "Class Has Been Cancelled Successfully..!!";
				//update in course_list table
				$wiziq['status'] = 'Y';
				$wiziq['id'] = $class_id;
				$url = site_url()."customer/api/updateCourseSchecduleCancel";
				$response =  apiCall($url, "post",$wiziq); 
				setFlash("dataMsgWizSuccess", $cancel1);
				redirect(site_url()."customer/scheduleCourse/{$course_id}");	
			}else if($attribNode=="fail"){
				$error=$objDOM->getElementsByTagName("error")->item(0);
				$errorcode = "Error Code :".$error->getAttribute("code");	
				$errorcode.= "<br/>Error Message :".$error->getAttribute("msg");	
				setFlash("dataMsgWizError", $errorcode);
				redirect(site_url()."customer/scheduleCourse/{$course_id}");	
			}
	 	}//end if	
	}//end function	
	/**
	 * addAttendee function.
	 * @param mixed $class_id, attendee list  (required)
	 * @access public 
	 * @return attendee_id ,attendee_url
	 */
	public function addAttendee($wiziqData)
	{
		$course_enrollment_assign_user= $wiziqData['assignUser'];
		 
		$class_id= $wiziqData['wiziq_class_id'];
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$XMLAttendee= $wiziqData['XMLAttendee'];/* "<attendee_list>
			<attendee>
			  <attendee_id>222</attendee_id>
			  <screen_name>krishna</screen_name>
                          <language_culture_name><![CDATA[es-ES]]></language_culture_name>
			</attendee>
			<attendee>
			  <attendee_id>223</attendee_id>
			  <screen_name>joshi</screen_name>
                          <language_culture_name><![CDATA[ru-RU]]></language_culture_name>
			</attendee>
		  </attendee_list>" */;
		$method = "add_attendees";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $class_id;//required
		$requestParameters["attendee_list"]=$XMLAttendee;
		$httpRequest=new HttpRequest();
		 
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=add_attendees',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
			$status=$objDOM->getElementsByTagName("rsp")->item(0);
    		$attribNode = $status->getAttribute("status");
			if($attribNode=="ok")
			{
				$methodTag=$objDOM->getElementsByTagName("method");
				 $method=$methodTag->item(0)->nodeValue;
				
				$class_idTag=$objDOM->getElementsByTagName("class_id");
				$class_id=$class_idTag->item(0)->nodeValue;
				
				$add_attendeesTag=$objDOM->getElementsByTagName("add_attendees")->item(0);
				 $add_attendeesStatus = $add_attendeesTag->getAttribute("status");
				
				$attendeeTag=$objDOM->getElementsByTagName("attendee");
				$length=$attendeeTag->length;
				for($i=0;$i<$length;$i++)
				{
					$attendee_urlTag=$objDOM->getElementsByTagName("attendee_url");
					$attendee_url=$attendee_urlTag->item($i)->nodeValue;
					$ceauId= $course_enrollment_assign_user[$i];
					//updateCourseScheduleList
					$wiziq['ceauId']	=$ceauId; 
					$wiziq['wiziq_attendee_url']		=$attendee_url;
					$wiziq['wizid_class_id']	=$class_id; 
					$wiziq['course_schecdule_list_id']	=$wiziqData['course_schecdule_list_id']; 
				
					//update in course_list table
					$url = site_url()."customer/api/updateCourseScheduleList";
					$response =  apiCall($url, "post",$wiziq);
 				
					$attendee_idTag=$objDOM->getElementsByTagName("attendee_id");
					$attendee_id=$attendee_idTag->item($i)->nodeValue; 
				}
				 
				if($response['result']){
					setFlash("dataMsgWizSuccess", $response['message']);
				}else{
					setFlash("dataMsgWizError", "Some Problem in scheduling");
				}
				$course_id=$wiziqData['course_id'];
				redirect(site_url()."customer/scheduleCourse/$course_id");	
 			}
			else if($attribNode=="fail")
			{
				$error=$objDOM->getElementsByTagName("error")->item(0);
				$errorcode =  "<br>errorcode=".$error->getAttribute("code");	
				$errorcode.= "<br>errormsg=". $error->getAttribute("msg");	
				 
					setFlash("dataMsgWizError", $errorcode);
				 
				$course_id=$wiziqData['course_id'];
				redirect(site_url()."customer/scheduleCourse/$course_id");	
			}
	 	}//end if	
    }//end function
	/**
	 * ScheduleClass function.
	 * @param mixed presenter_email, presenter_id, presenter_name  (required)
	 * @access public 
	 * @return Class ID ,recording_url,presenter_email,presenter_url,start_time, title
	 */
	public function scheduleClass($wiziqData)
	{
	 
		$classDetails=$wiziqData;  
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
	 	$method = "create";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
	 
	
		#for teacher account pass parameter 'presenter_email'
                //This is the unique email of the presenter that will identify the presenter in WizIQ. Make sure to add
                //this presenter email to your organization’s teacher account. ’ For more information visit at: (http://developer.wiziq.com/faqs)
	//	$requestParameters["presenter_email"]=$classDetails['presenter_email'];//Required
		#for room based account pass parameters 'presenter_id', 'presenter_name' 
		$requestParameters["presenter_id"] = $classDetails['presenter_id'];//Required
		$requestParameters["presenter_name"] = $classDetails['presenter_name'];//Required
		$requestParameters["start_time"] = $classDetails['start_time'];//"2018-03-08 12:20";
		$requestParameters["title"]=$classDetails['title'];//"my php-class"; //Required
		$requestParameters["duration"]=$classDetails['duration']; //optional
		$requestParameters["time_zone"]="Asia/Kolkata"; //optional
		$requestParameters["attendee_limit"]=""; //optional
		//$requestParameters["control_category_id"]=""; //optional
		$requestParameters["create_recording"]=""; //optional
		$requestParameters["return_url"]=$classDetails['return_url']; //optional
		$requestParameters["status_ping_url"]=$classDetails['status_ping_url']; //optional
        $requestParameters["language_culture_name"]="en-us";
		
		$httpRequest=new HttpRequest();
		try
		{	
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=create',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	 
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	 $attribNode = $status->getAttribute("status"); 
	 
		if($attribNode=="ok")
		{
			$methodTag=$objDOM->getElementsByTagName("method");
			 $method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("class_id");
			 $class_id=$class_idTag->item(0)->nodeValue; //echo "<br>Class ID=";
			$recording_urlTag=$objDOM->getElementsByTagName("recording_url");
			$recording_url=$recording_urlTag->item(0)->nodeValue;//echo "<br>recording_url=".
			$presenter_emailTag=$objDOM->getElementsByTagName("presenter_email");
			$presenter_email=$presenter_emailTag->item(0)->nodeValue; //echo "<br>presenter_email=".
			$presenter_urlTag=$objDOM->getElementsByTagName("presenter_url");
			 $presenter_url=$presenter_urlTag->item(0)->nodeValue;  //echo "<br>presenter_url=".
			
			$wiziq['wiziq_class_id']		=$class_id;
			$wiziq['wiziq_recording_url']	=$recording_url;
			$wiziq['wiziq_presenter_url']	=$presenter_url;
			$wiziq['id']	=$classDetails['course_schecdule_id'];
		 
			//update in course_list table
			$url = site_url()."customer/api/updateCourseSchecdule";
			$response =  apiCall($url, "post",$wiziq);
			if($response['result']){
				setFlash("dataMsgWizSuccess", $response['message']);
			}else{
				setFlash("dataMsgWizError", "Some Problem in scheduling");
			}
			$course_id=$classDetails['course_id'];
			redirect(site_url()."customer/scheduleCourse/$course_id");	
		}
		else if($attribNode=="fail")
		{
			$course_id=$classDetails['course_id'];
		 	/* Delete Entry IF Failed */
			$wiziq['id']	=$classDetails['course_schecdule_id'];
			$url = site_url()."customer/api/deleteCourseSchecdule";
			$response =  apiCall($url, "post",$wiziq);
			//print_r($response);exit;
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			$error1= "<br>errorcode=". $error->getAttribute("code");	
   			$error1.= "<br>errormsg=". $error->getAttribute("msg");
			setFlash("dataMsgWizError",$error1);
			redirect(site_url()."customer/scheduleCourse/$course_id");				
		}
	 }//end if	
	}//end function
	
	/**
	 * modifyClass function.
	 * @param mixed class_id,presenter_email, presenter_id, presenter_name  (required)
	 * @access public 
	 * @return Class ID ,recording_url,presenter_email,presenter_url,start_time, title
	 */
	public function modifyClass()
	{
		$classDetails=$this->input->post();  
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "create";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		 
		#for teacher account pass parameter 'presenter_email'
                //This is the unique email of the presenter that will identify the presenter in WizIQ. Make sure to add
                //this presenter email to your organization’s teacher account. ’ For more information visit at: (http://developer.wiziq.com/faqs)
		$requestParameters["class_id"]=$classDetails['class_id'];//Required 
		$requestParameters["presenter_name"] = "asd";  
		$requestParameters["start_time"] = $classDetails['start_time'];//"2018-03-08 12:20";
		$requestParameters["title"]=$classDetails['title'];//"my php-class"; //Required
		$requestParameters["duration"]=""; //optional
		$requestParameters["time_zone"]="Asia/Kolkata"; //optional
		$requestParameters["attendee_limit"]=""; //optional
		//$requestParameters["control_category_id"]=""; //optional
		$requestParameters["create_recording"]=""; //optional
		$requestParameters["return_url"]=$classDetails['return_url']; //optional
		$requestParameters["status_ping_url"]=$classDetails['status_ping_url']; //optional
        $requestParameters["language_culture_name"]="en-us";
		$httpRequest=new HttpRequest();
		try
		{	
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=create',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	 
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status"); 
		if($attribNode=="ok")
		{
			$methodTag=$objDOM->getElementsByTagName("method");
			echo "method=".$method=$methodTag->item(0)->nodeValue;
			 
		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
   			echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	 
		}
	 }//end if	
	}//end function
	
	/**
	 * viewSchedule function.
	 * @param mixed $class_id (required)
	 * @access public 
	 * @return attendee_id ,attendee_url
	 */
	public function viewSchedule($class_id)
	{

	 	$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "view_schedule";
	 	$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $class_id;//required
	 
		$httpRequest=new HttpRequest();
		try
		{	  
			 
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=view_schedule',http_build_query($requestParameters, '', '&'));
                        echo $XMLReturn;
		}
		catch(Exception $e)
		{
                        header('Content-type: text/html');
	  		echo $e->getMessage();
		}

    }//end function
	
	//end function
	/**
	 * downloadRecording function.
	 * @param mixed $class_id (required)
	 * @access public 
	 * @return attendee_id ,attendee_url
	 */
	public function downloadRecording($class_id)
	{

		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "download_recording";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $class_id;//"15754";
		
		//recording_format value can be zip, exe or mp4
		//mp4 recording is available only for classes conducted on WizIQ desktop app
		$requestParameters["recording_format"] = "zip";
		

		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=download_recording',http_build_query($requestParameters, '', '&'));
                        echo $XMLReturn;
		}
		catch(Exception $e)
		{
                        header('Content-type: text/html');
	  		echo $e->getMessage();
		}

    }//end function
}