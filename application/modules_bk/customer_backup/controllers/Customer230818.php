<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');



class Customer extends FRONTEND_Controller {



    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();

		if(!$this->session->userdata('uid') && !$this->session->userdata('user_email')){

			redirect("pages/login");

			exit;

		}	

		$user_id = $this->session->userdata('uid');		

		$user_type = $this->session->userdata('user_type'); 

    }



	public function index() { 

		// SEO end Here	

		$url = site_url()."/customer/api/findMultiple/";

		$project_data =  apiCall($url, "get");

		$arrayData = [

			"project_data"=>$project_data

		];

		$this->template->load("project",$arrayData);

	}

	public function customerDetail($id) {

		$url = site_url()."/customer/api/findSingle/$id";

		$project_data =  apiCall($url, "get");

        $url = site_url()."/customer/api/findMultipleImage/$id";

		$project_images =  apiCall($url, "get");

        $url = site_url()."/customer/api/findMultiple/$id";

		$Project_list =  apiCall($url, "get","");

         

		 

		$arrayData = [

			"project_data"=>$project_data,

			"project_images"=>$project_images,

			'Project_list' => $Project_list['result'],

		];

		//print_r($Project_list);exit;

		$this->template->load("projectDetail",$arrayData);

	}

	

	public function profile() {  

		if($this->session->userdata('uid')){

			$user_id = $this->session->userdata('uid');

			$url = site_url()."/customer/api/bankDetails/$user_id";

			$customer_data =  apiCall($url, "get"); 

		 	$url = site_url()."/customer/api/findAddressList/$user_id";

			$customerAddressList =  apiCall($url, "get");

			 

			$url = site_url()."/customer/api/findContactList/$user_id";

			$customerContactList =  apiCall($url, "get"); 

			$url = site_url()."settings/userapi/findMultipleChild/";

			$userTypeList =  apiCall($url, "get");  

			

		 	$array['language']=$customer_data['result']['language'];

			$url = site_url()."settings/languageapi/findMultipleLanguage/";

			$languageList =  apiCall($url, "post",$array);  

			 

			$arrayData=array(

				"customer_data"=>$customer_data['result'],

				"languageList"=>$languageList['result'],

				"customerAddressList"=>$customerAddressList['result'],

				"customerContactList"=>$customerContactList['result'],

				"userTypeList"=>$userTypeList['result'],

			);

			$this->template->load("profile",$arrayData);

		}

		else{

			redirect("pages/login");

		}

	}

	public function companyDetails() {  

		if($this->session->userdata('uid')){

			$user_id = $this->session->userdata('uid');

				

			if(isset($_POST['btnCompany'])){

				$pageData = $this->input->post(); 

				$pageData['uid'] = $user_id; 

				$url = site_url()."customer/api/updateDetails"; 

				$response =  apiCall($url, "post",$pageData);



			} 

			

			$url = site_url()."/customer/api/bankDetails/$user_id";

			$customer_data =  apiCall($url, "get"); 



			$arrayData=array(

				"customer_data"=>$customer_data['result'],

			);

			$this->template->load("company_details",$arrayData);

		}

		else{

			redirect("pages/login");

		}

	}

	public function changePassword() {  

		if($this->session->userdata('uid')){

			$user_id = $this->session->userdata('uid');

				

			if(isset($_POST['btnChangepassword'])){

				$pageData = $this->input->post(); 

				$pageData['uid'] = $user_id; 

				$url = site_url()."customer/api/updatePassword";

				$response =  apiCall($url, "post",$pageData);  

			//	print_r($response);exit; 

			

			} 



			$arrayData=array(

				"user_data"=>$response['result'],

			);

			

			$this->template->load("change_password",$arrayData);

		}

		else{

			redirect("pages/login");

		}

	}

	public function document() {  

		if($this->session->userdata('uid')){

			$user_id = $this->session->userdata('uid');

			if(isset($_POST['btnDocument'])){

				$pageData = $this->input->post(); 

				$pageData['uid'] = $user_id; 

				$url = site_url()."customer/api/updateDetails"; 

				$response =  apiCall($url, "post",$pageData);  

			} 

			

			$url = site_url()."/customer/api/bankDetails/$user_id";

			$customer_data =  apiCall($url, "get"); 



			$arrayData=array(

				"customer_data"=>$customer_data['result'],

			);

			$this->template->load("upload_docs",$arrayData);

		}

		else{

			redirect("pages/login");

		}

	}

	 

	// other Document Upload

	public function otherDocument() {  

		$userId =  $this->session->userdata('uid');

			if(isset($_POST['submit'])){ 

				$pageData = $this->input->post(); 

				$pageData['user_id']  = $userId; 

				

				$url = site_url()."/customer/api/otherDocument"; 

				$response =  apiCall($url,"post",$pageData);

			}

			

		$url = site_url()."/customer/api/otherDocumentList/$userId";

		$documentList =  apiCall($url, "get");

		

		$arrayData=array("documentList"=>$documentList['result'], );

		$this->template->load("upload_other_files",$arrayData);

		 

	}

	// other Document Delete

	public function otherDocumentDelete($id) {  

		$url = site_url()."/customer/api/otherDocumentDelete/$id";

		$response =  apiCall($url, "get"); 

		setFlash("dataMsgSuccess", $response['message']);

		redirect(site_url()."customer/otherDocument");		

		 

	}

	// Mulitple Address Upload

	public function address() {  

		$userId =  $this->session->userdata('uid');

		if(isset($_POST['submit'])){ 

			$pageData = $this->input->post(); 

			$pageData['user_id']  = $userId; 

			

			$url = site_url()."/customer/api/addAddress"; 

			$response =  apiCall($url,"post",$pageData);

			 

		}

		$this->load->model("location/country_model");

		$url = site_url()."/customer/api/findAddressList/$userId";

		$customerAddressList =  apiCall($url, "get");

		

		$arrayData=array("countryList" => $this->country_model->getCountryListForSite(),

			"customerAddressList"=>$customerAddressList['result'], 

		);

		$this->template->load("address",$arrayData);

		 

	}

	//   Address update

	public function addressUpdate($id) {

		$this->load->model("location/country_model");

		$this->load->model("location/state_model");

		$this->load->model("location/city_model");		

		$userId =  $this->session->userdata('uid');

		if(isset($_POST['updateSubmit'])){ 

			$pageData = $this->input->post(); 

			$pageData['user_id']  = $userId;  

			$url = site_url()."/customer/api/updateAddress"; 

			$response =  apiCall($url,"post",$pageData);

			if($response){

				setFlash("dataMsgSuccess", $response['message']);

				redirect(site_url()."customer/address");			

			}

		}

		$this->load->model("location/country_model");

		$url = site_url()."/customer/api/findAddress/$id";

		$response =  apiCall($url, "get"); 

		

		$country_id =$response['result']['country'];

		$state_id =$response['result']['state'];

		$arrayData=array("countryList" => $this->country_model->getCountryListForSite(),

			"addressEdit"=>$response['result'], "country_id"=>$country_id,  "state_id"=>$state_id,  

			"stateList" => $this->state_model->getStateList($country_id), 

			"cityList" => $this->city_model->getCityList($state_id),

		);

		$this->template->load("addressUpdate",$arrayData); 

	}

	// Address Delete

	public function addressDelete($id) {  

		$url = site_url()."/customer/api/addressDelete/$id";

		$response =  apiCall($url, "get"); 

		setFlash("dataMsgSuccess", $response['message']);

		redirect(site_url()."customer/address");		

		 

	}

	public function bankDetails() {  

		 

			$user_id = $this->session->userdata('uid');

			

			if(isset($_POST['btnBankDetails'])){

				$pageData = $this->input->post(); 

				$pageData['uid'] = $user_id;

 			

				$url = site_url()."customer/api/updateDetails"; 

				$response =  apiCall($url, "post",$pageData);

				 

			} 

			$url = site_url()."/customer/api/bankDetails/$user_id";

			$customer_data =  apiCall($url, "get"); 



			$this->load->model("location/country_model");

			$this->load->model("location/state_model");

			$this->load->model("location/city_model");

			$country_id =$customer_data['result']['user_branch_country'];

			$state_id =$customer_data['result']['user_branch_state'];

			

			$arrayData=array("customer_data"=>$customer_data['result'],

				"countryList" => $this->country_model->getCountryListForSite(),

				"stateList" => $this->state_model->getStateList($country_id), 

				"cityList" => $this->city_model->getCityList($state_id),

				"country_id" => $country_id,

			);

			$this->template->load("bank_details",$arrayData);

		 

	}

	

	// Mulitple contact Upload

	public function contact() {  

		$userId =  $this->session->userdata('uid');

		if(isset($_POST['submit'])){ 

			$pageData = $this->input->post(); 

			$pageData['user_id']  = $userId; 

			

			$url = site_url()."/customer/api/addContact"; 

			$response =  apiCall($url,"post",$pageData);

			 

		}

 

		$url = site_url()."/customer/api/findContactList/$userId";

		$customerContactList =  apiCall($url, "get");

		

		$arrayData=array( 

			"customerContactList"=>$customerContactList['result'], 

		);

		$this->template->load("contact",$arrayData);

		 

	}

	//   contact update

	public function contactUpdate($id) {

		 

		$userId =  $this->session->userdata('uid');

		if(isset($_POST['updateSubmit'])){ 

			$pageData = $this->input->post(); 

			$pageData['user_id']  = $userId;  

			$url = site_url()."/customer/api/updateContact"; 

			$response =  apiCall($url,"post",$pageData);

			if($response){

				setFlash("dataMsgSuccess", $response['message']);

				redirect(site_url()."customer/contact");			

			}

		}

		$this->load->model("location/country_model");

		$url = site_url()."/customer/api/findContact/$id";

		$response =  apiCall($url, "get"); 

 

		$arrayData=array( 

			"conatactEdit"=>$response['result'],  

			 

		);

		$this->template->load("contactUpdate",$arrayData); 

	}

	// contact Delete

	public function contactDelete($id) {  

		$url = site_url()."/customer/api/contactDelete/$id";

		$response =  apiCall($url, "get"); 

		setFlash("dataMsgSuccess", $response['message']);

		redirect(site_url()."customer/contact");		

			

	}

	

	/**

	 * attendee user List

	 * 

	 * @access public

	 * @param  

	 * @return array of objects

	 */

 

	public function attendeeList() {  

		$userId =  $this->session->userdata('uid');

		$user_type = $this->session->userdata('user_type'); 

		if($user_type=='C'){

			$url = site_url()."/customer/api/attendeeList/$userId";

			$response =  apiCall($url, "get");  

			$arrayData=array( 

				"attendeeList"=>$response['result'],   

			);

			$this->template->load("attendeeList",$arrayData); 

		}	

	}

	/**

	 * attendee Add 

	 * @access public

	 * @param  

	 * @return array of objects

	 */

 

	public function attendeeAdd() {  

		$userId =  $this->session->userdata('uid');

		$user_type = $this->session->userdata('user_type'); 

		if($user_type=='C'){

			 

			if(isset($_POST['addSubmit'])){ 

				$pageData = $this->input->post(); 

				$pageData['u_parent_id']  = $userId;  

				$password  = str_makerand(6,1,1,0);  

				$pageData['u_password']  = md5($password );  

				$pageData['u_email_verified']  = 'Y';  

				

				$url = site_url()."/customer/api/attendeeAdd"; 

				$response =  apiCall($url,"post",$pageData);

				//print_r($response);exit;

			 

				if((int)$response['result']){

				$to = $pageData['u_email'];

				$body ='<p>Hi '.$pageData['u_name'].',</p> '; 

				$body.='<p> Your Account Has Been Created Successfully.</p>';

				$body.='<p> The Credentials For Account : </p>';

				$body.='<p> USERNAME : '.$pageData['u_email'].' </p>';

				$body.='<p> PASSWORD : '.$password.' </p>';

				$body.='<p> Thank You,</p> <br/>';

				$body.='<p> Teranex</p> <br/>';

				$email_content = $body;  

				$this->load->library('Email_PHPMailer');

				$subject = 'Login Details Teranex ';

				$mailresponse = email_Send($subject,$to,$email_content,$name); 

	

				setFlash("dataMsgAttSuccess", $response['message']);

					redirect(site_url()."customer/attendeeList");			

				}

				else{

					setFlash("dataMsgAddError", $response['message']);

				}

			}

			

			$this->template->load("attendeeAdd",$arrayData); 

		}	

	}

	

	/**

	 * attendee Delete 

	 * @access public

	 * @param  $id

	 * @return array of objects

	 */ 

	public function attendeeDelete($id) {  

		$url = site_url()."/customer/api/attendeeDelete/$id";

		$response =  apiCall($url, "get"); 

		setFlash("dataMsgAttSuccess", $response['message']);

		redirect(site_url()."customer/attendeeList");		

			

	}

	

	/**

	 * Trainee / Consultant user List

	 * 

	 * @access public

	 * @param  

	 * @return array of objects

	 */

 

	public function traineeList() {  

		$userId =  $this->session->userdata('uid');

		$user_type = $this->session->userdata('user_type'); 

		if($user_type=='S'){

		 	$url = site_url()."/customer/api/traineeList/$userId";

			$response =  apiCall($url, "get");  

			$arrayData=array( 

				"traineeList"=>$response['result'],   

			);

			$this->template->load("traineeList",$arrayData); 

		}	

	}

	/**

	 * Trainee / Consultant Add 

	 * @access public

	 * @param  

	 * @return array of objects

	 */

 

	public function traineeAdd() {  

		$userId =  $this->session->userdata('uid');

		$user_type = $this->session->userdata('user_type'); 

		if($user_type=='S'){

			 

			if(isset($_POST['addSubmit'])){ 

				$pageData = $this->input->post(); 

				$pageData['u_parent_id']  = $userId;  

				$password  = str_makerand(6,1,1,0);  

				$pageData['u_password']  = md5($password );  

				 

				$url = site_url()."/customer/api/traineeAdd"; 

				$response =  apiCall($url,"post",$pageData);

				if((int)$response['result']){

					$to = $pageData['u_email'];

					$body ='<p>Hi '.$pageData['u_name'].',</p> '; 

					$body.='<p> Your Account Has Been Created Successfully.</p>';

					$body.='<p> The Credentials For Account : </p>';

					$body.='<p> USERNAME : '.$pageData['u_email'].' </p>';

					$body.='<p> PASSWORD : '.$password.' </p>';

					$body.='<p> Thank You,</p> <br/>';

					$body.='<p> Teranex</p> <br/>';

					$email_content = $body;  

					$this->load->library('Email_PHPMailer');

					$subject = 'Login Details Teranex ';

					$mailresponse = email_Send($subject,$to,$email_content,$name); 

				

					setFlash("dataMsgAttSuccess", $response['message']);

					redirect(site_url()."customer/traineeList");			

				}

				else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/traineeList");	

				}

			}

			

			$this->template->load("traineeAdd",$arrayData); 

		}	

	}

	

	/**

	 * Trainee / Consultant Delete 

	 * @access public

	 * @param  $id

	 * @return array of objects

	 */ 

	public function traineeDelete($id) {  

		$userId =  $this->session->userdata('uid');

		$url = site_url()."/customer/api/traineeDelete/$userId";

		$response =  apiCall($url, "get"); 

		

		$this->template->load("traineeAdd",$arrayData);	

			

	}

	/**

	 * course Enrollment   

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function courseEnrollment() {  

	

		$userId =  $this->session->userdata('uid');

		$url = site_url()."/customer/api/courseEnrollment/$userId";

		$response =  apiCall($url, "get"); 

		$arrayData=array( 

			"courseList"=>$response['result'],   

		);

		$this->template->load("courseEnrollment",$arrayData); 	

			

	}

	/**

	 * course Comment   

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function course_comment($cid) {  

	

		$userId =  $this->session->userdata('uid');

		

	

			if(isset($_POST['btnSubmit'])){ 

				$pageData = $this->input->post(); 

					

				$pageData['user_id']  = $userId;  

				$pageData['commented_date']  = date("Y-m-d H:i:s");   

				 

				$url = site_url()."/customer/api/courseComment"; 

				$response =  apiCall($url,"post",$pageData);

				 

				if($response['result']){ 

					setFlash("dataMsgCommentSuccess", $response['message']); 

				}

				else{

					setFlash("dataMsgCommentError", $response['message']);

				 

				}

			}

			$courseSingle = site_url()."customer/api/singleCourseComment/$cid";

			$course_data =  apiCall($courseSingle, "get");

			$arrayData=array( 

				"course_data"=>$course_data['result'],   

			);

		$this->template->load("course_comment",$arrayData); 	

			

	}

	/**

	 * assign Course from admin List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function assignCourseList() {  

	

		$userId =  $this->session->userdata('uid');

		$url = site_url()."/customer/api/assignCourseList/$userId";  

		$response =  apiCall($url, "get"); 

	 

		$arrayData=array( 

			"courseList"=>$response['result'],   

		); 

		$this->template->load("assignCourseList",$arrayData); 	

			

	}

	/**

	 * assign Schedule Class List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function scheduleCourse($cid) {  

	

		$userId =  $this->session->userdata('uid');

		//$user_email =  $this->session->userdata('user_email');

		$u_name =  $this->session->userdata('u_name');

		

		

		if($_POST['btnSubmit']){

			$pageData = $this->input->post();  

			$pageData['trainee_user_id']=$userId ; 

	  	$date1=date_ymd($pageData['courseStartDate'])." ".$pageData['course_start_time'];

		$date2=date_ymd($pageData['courseStartDate'])." ".$pageData['course_end_time'];

	  	$minutes = intval((strtotime($date2)-strtotime($date1))/60);

			if($minutes >0 ){ 

				$url = site_url()."customer/api/createCourseSchedule"; 

				$response =  apiCall($url, "post",$pageData); 

			 

				if($response['result']){

					setFlash("dataMsgSuccess", $response['message']);

					

					$wiziqData['presenter_id']=$userId;

					//$wiziqData['presenter_email']="support@teranex.co";

					$wiziqData['presenter_name']	=$u_name;

					$wiziqData['start_time']		=date_ymd($pageData['courseStartDate'])." ".$pageData['course_start_time'];

					$wiziqData['title']			=$pageData['course_name'];

					$wiziqData['course_schecdule_id'] =$response['result'];

					$wiziqData['course_id'] 	=	$pageData['course_id'];

					$wiziqData['return_url']		= site_url();

					$wiziqData['duration']		= "90";
					require_once APPPATH."modules/customer/controllers/Wiziq.php";
					$objWiziq = new wiziq;
					$objWiziq->scheduleClass($wiziqData);
					} 

			}			

		}

		 

		$url = site_url()."/customer/api/scheduleCourse/$userId/$cid";  

		$response =  apiCall($url, "get");  

		$courseSingle = site_url()."eacademy/api/findSingleCourse/$cid";

		$course_data =  apiCall($courseSingle, "get");

		$arrayData=array( 

			"courseScheduleList"=>$response['result'],   

			"course_data"=>$course_data['result'],   

		); 

		

		$this->template->load("scheduleCourse",$arrayData); 	

			

	}

	/**

	 * Cancel Class

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function cancel_class($wiziq_class_id,$class_id,$course_id){

		

					require_once APPPATH."modules/customer/controllers/Wiziq.php";

					$objWiziq = new wiziq;

					$objWiziq->cancelClass($wiziq_class_id,$class_id,$course_id);	 

		

		

	}

	

	/**

	 * assign Schedule Class List BY Trainee

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function scheduleAttendeeCourse($courserId,$course_schecdule_list_id) {  

	

		$userId =  $this->session->userdata('uid');

		//$user_email =  $this->session->userdata('user_email');

		$u_name =  $this->session->userdata('u_name');

		

		

		if($_POST['btnSubmit']){

			$pageData = $this->input->post();  

			/* $pageData['trainee_user_id']=$userId ; 

			$pageData['courserId']=$courserId ; 

			$pageData['course_schecdule_list_id']=$id ; 

		 	  

				$url = site_url()."customer/api/getCourseScheduleAttendeeListXML"; 

				$response =  apiCall($url, "post",$pageData); 

				 */ 

		$assignUser = $pageData["course_enrollment_assign_user"];

	

		if(count($assignUser)>0){

			$XMLAttendee="<attendee_list>";

			foreach($assignUser as $id){

					$singleUser= $this->db_lib->fetchSingle('course_enrollment_assign_user CEAU JOIN master_user MU  ON  CEAU.attendee_user_id= MU.uid', "CEAU.ceau_id= $id  ","MU.uid,MU.u_name");

				 

			$XMLAttendee.="<attendee>

			  <attendee_id>". $singleUser['uid'] ."</attendee_id>

			  <screen_name>". $singleUser['u_name'] ."</screen_name>

                          <language_culture_name><![CDATA[es-ES]]></language_culture_name>

			</attendee>  ";

		 

			}

			$XMLAttendee.=" </attendee_list>"; 

		}

		 

			$assignUser = $pageData["course_enrollment_assign_user"];

				if($XMLAttendee){ 

					$wiziqData['wiziq_class_id'] =$pageData['wiziq_class_id'];

					$wiziqData['XMLAttendee']	 =$XMLAttendee; 

					$wiziqData['assignUser']	 =$assignUser; 

					$wiziqData['course_id']	 =$pageData['course_id']; 

					$wiziqData['course_schecdule_list_id']	 =$course_schecdule_list_id; 

					

					require_once APPPATH."modules/customer/controllers/Wiziq.php";

					$objWiziq = new wiziq;

					$objWiziq->addAttendee($wiziqData);	 /* */

					

					exit;

				} 

			 	 

		}

		$url = site_url()."/customer/api/scheduleAttendeeCourse/$courserId/$course_schecdule_list_id";

		$attendeeList =  apiCall($url, "get");  

		$courseSingle = site_url()."customer/api/findSingleCourseSchecduleList/$course_schecdule_list_id";

		$course_data =  apiCall($courseSingle, "get");

		 

		$arrayData=array( 

			"attendeeList"=>$attendeeList['result'],   

			"courseData"=>$course_data['result'],   

		); 

	 

		$this->template->load("scheduleAttendeeCourse",$arrayData); 	

			

	}

	

	/**

	 * Assign course to user 

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function assign_attendee($enrollId) { 

		$userId =  $this->session->userdata('uid');	

		

		if($_POST['btnSubmit']){

			$pageData = $this->input->post(); 

			$pageData['assign_by_user']=$userId ;  

				$url = site_url()."customer/api/assign_attendee"; 

				$response =  apiCall($url, "post",$pageData); 

			//	print_r($response);exit;

				if($response['result']){

					setFlash("dataMsgAttSuccess", $response['message']); 

				}  

		} 

		

		$enrollUrl = site_url()."customer/api/courseEnrollmentSingle/$enrollId";

		$enrollData =  apiCall($enrollUrl, "get"); 

		$url = site_url()."/customer/api/attendeeList/$userId";

		$attendeeList =  apiCall($url, "get");  

		

		$assingUrl = site_url()."customer/api/courseEnrollmentAssignList/$enrollId";

		$courseEnrollmentAssignList =  apiCall($assingUrl, "get");  

		

		$arrayData=array( 

			"attendeeList"=>$attendeeList['result'],   

			"courseData"=>$enrollData['result'],   

			"courseEnrollmentAssignList"=>$courseEnrollmentAssignList['result'],   

		);

		$this->template->load("assign_attendee",$arrayData);

	}

	

	/**

	 * assign Course from customer for attendee List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function attendeeAssignCourseList() {  

	

		

		$userType =  $this->session->userdata('user_type');

		if($userType=='A'){

			$userId =  $this->session->userdata('uid');

		 	$url = site_url()."customer/api/attendeeAssignCourseList/$userId";  

			$response =  apiCall($url, "get"); 

		  

			$arrayData=array( 

				"courseList"=>$response['result'],   

			); 

			$this->template->load("attendeeAssignCourseList",$arrayData); 	

		}	

	}

	

	/**

	 * events List as per buying

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function eventsList() {  

	

		

		$userType =  $this->session->userdata('user_type');

			$userId =  $this->session->userdata('uid');

		  	$url = site_url()."customer/api/eventsList/$userId";  

			$response =  apiCall($url, "get"); 

		 

			$arrayData=array( 

				"eventList"=>$response['result'],   

			); 

			$this->template->load("eventsList",$arrayData); 	

		if($userType=='A'){

		}	

	}

	/**

	 * event Assign Attendee List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function eventAssignAttendee($eventId) {  

	

		

		$userType =  $this->session->userdata('user_type');

			$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/attendeeList/$userId";

		$attendeeList =  apiCall($url, "get");  

		

			$arrayData=array( 

				"attendeeList"=>$attendeeList['result'],   

			); 

			$this->template->load("eventAssignAttendee",$arrayData); 	

		 

	}

	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationService() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/remoteApplicationService/$userId";

		$requestList =  apiCall($url, "get");  

		

			$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("remoteApplicationService",$arrayData); 	

		 

	}

	/**

	 * remote Application Service cunsultant request List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationServiceConsultant($requestId, $remote_application_id=0) {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		if($remote_application_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceConsultantUpdate/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get");  

			redirect(site_url()."customer/remoteApplicationServiceConsultant/".$requestId);	

		}   

		$url = site_url()."/customer/api/remoteApplicationServiceConsultant/$requestId";

		$requestConsultantList =  apiCall($url, "get");  

		

		

			$arrayData=array( 

				"requestConsultantList"=>$requestConsultantList['result'],   

			); 

			$this->template->load("remoteApplicationServiceConsultant",$arrayData); 	

		 

	}

	/**

	 * remote Application Service cunsultant user request List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationConsultant($remote_application_id=0) {  

		$remote_application_id;

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		

	 	$url = site_url()."/customer/api/remoteApplicationServicesBySupport/$userId";

		$consultReqList =  apiCall($url, "get");  

		 

		

		if($remote_application_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get"); 



			if($requestConsultantList['result']){

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");	

			}else{

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");

			}

		}   

		$arrayData=array( 

			"consultReqList"=>$consultReqList['result'],   

		); 

		$this->template->load("remoteApplicationConsultant",$arrayData); 	

		 

	}

	

	/**

	 *remote Application Service Invoice generation

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function remoteApplicationServiceInvoice($raar_id) {  

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post();

			$pageData['raar_id'] = $raar_id;

			$url  = site_url()."customer/api/createRemoteServiceInvoice";

			$response = apiCall($url,"POST",$pageData);

			if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");

			}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");

			}

		}

		$url  = site_url()."customer/api/fetchRemoteServiceInvoice/$raar_id";

		$invoiceList = apiCall($url,"get");

		$arrayData = [

			"raar_id"=>$raar_id,

			"invoiceList"=>$invoiceList['result'],

		];

		$this->template->load("remoteApplicationServiceInvoice",$arrayData); 	

	}

	

	public function remoteApplicationConsultantReject($remote_application_id=0) {  

			$url = site_url()."/customer/api/remoteApplicationServiceConsultantUpdateByConsultantReject/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get"); 



			if($requestConsultantList['result']){

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");	

			}else{

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteApplicationConsultant/");

			}

	}

	public function scheduleCourseConsultant($rar_id=0) {  

			if(isset($_POST['btnSubmit'])){

				$pageData = $this->input->post();

			

				$pageDataBrain['entry_date']=date('Y-m-d');

				$pageDataBrain['customer_user_id']=$pageData['customer_user_id'];

				$pageDataBrain['startDate']=date_ymd($pageData['courseStartDate']);

				$pageDataBrain['rar_id']=$pageData['rar_id'];

				$pageDataBrain['class_title']=$pageData['class_title'];

				$pageDataBrain['start_time']=date("H:i", strtotime($pageData['course_start_time']));

				$pageDataBrain['end_time']=date("H:i", strtotime($pageData['course_end_time']));
				
				
			//	require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
			//	$objTokbox = new tokbox;
			//	$responseData= $objTokbox->tokenGenration();	
			//	$pageDataBrain['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
			//	$pageDataBrain['tokbox_token'] = $responseData['tokbox_token'];

				$url = site_url()."customer/api/requestServiceBraincert";

				$response1 =  apiCall($url, "post",$pageDataBrain);

				if($response['result']){

					setFlash("dataMsgMachSuccess", $response['message']);

					redirect(site_url()."customer/scheduleCourseConsultant/$rar_id");

				}else{

					setFlash("dataMsgMachError", $response['message']);

					redirect(site_url()."customer/scheduleCourseConsultant/$rar_id");

				} 

			}

			

		$url = site_url()."/customer/api/remoteApplicationServicesById/$rar_id";

		$reqData =  apiCall($url, "get");  



		$url = site_url()."/customer/api/remoteApplicationServicesBrainCertList/$rar_id";

		$brainCertData =  apiCall($url, "get");  

	

	$arrayData = [

			"reqData"=>$reqData['result'],

			"brainCertList"=>$brainCertData,

			"rar_id"=>$rar_id,

		];

		$this->template->load("scheduleCourseConsultant",$arrayData); 

	}	

	/**

	 * Profile Edit

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function editprofile() {  

		$user_id = $this->session->userdata('uid');

		if(isset($_POST['btnUpdate'])){

			$pageData = $this->input->post();

			$pageData['uid'] = $user_id; 

			$pageData['u_date_birth'] =  ($pageData['birthdate']); 

			$url = site_url()."customer/api/updateDetails"; 

			$response =  apiCall($url, "post",$pageData);

			 

			if($response['result']){

				setFlash("dataMsgProfileSuccess", $response['message']); 

			}else{

				setFlash("dataMsgProfileError", $response['message']); 

			}

		}

		$url = site_url()."/customer/api/bankDetails/$user_id";

		$customer_data =  apiCall($url, "get"); 

		$arrayData=array("customer_data"=>$customer_data['result']);

		$this->template->load("editprofile",$arrayData);

	}

	public function remoteMachineServiceRequest(){

		$uid = $this->session->userdata('uid');

		$url = site_url()."consultant/api/remoteServiceRequestList/$uid";

		$requestListRemoteService = apiCall($url,"get");

	 

		$arrayData = [

			"requestListRemoteService"=>$requestListRemoteService['result']

		];

		$this->template->load("remote_machine_req",$arrayData);

	}



	public function rejectRequestRemoteService($id=0){

		$uid = $this->session->userdata('uid');

		$url = site_url()."consultant/api/rejectRequestRemoteService/{$id}";

		$response = apiCall($url,"get");

		if($response['result']){

			setFlash("dataMsgSuccess", $response['message']);

			redirect(site_url()."customer/remoteMachineServiceRequest/$uid");	

		}else{

			setFlash("dataMsgError", $response['message']);

			redirect(site_url()."customer/remoteMachineServiceRequest/$uid");	

		}

		

	}

	public function acceptRequestRemoteService($id=0){

		$uid = $this->session->userdata('uid');

		$url = site_url()."consultant/api/acceptRequestRemoteService/{$id}";

		$response = apiCall($url,"get");

		if($response['result']){

			setFlash("dataMsgSuccess", $response['message']);

			redirect(site_url()."customer/remoteMachineServiceRequest/$uid");	

		}else{

			setFlash("dataMsgError", $response['message']);

			redirect(site_url()."customer/remoteMachineServiceRequest/$uid");	

		}

		

	

	}

	

	public function remoteApplicationMachineService(){

			$customer_user_id = $this->session->userdata('uid');

			$url = site_url()."customer/api/remoteServiceCustomerRequestList/$customer_user_id";

			$requestedListRemoteService = apiCall($url,"get");

			

			$arrayData = [

				"requestListRemoteService"=>$requestedListRemoteService['result']

			];

			$this->template->load("remote_machine_req_customer",$arrayData);

		}

	/**

	 * work Experince CRUD operation by User

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function workExperince(){

			$userId =  $this->session->userdata('uid');

			if(isset($_POST['btnExperince'])){ 

				$pageDataq = $this->input->post(); 

				$pageData['user_id']  = $userId; 

				$pageData['title']  = $pageDataq['title']; 

				$pageData['exp_details']  =$pageDataq['exp_details']; 

				$pageData['start_date']  = $pageDataq['sartDatepicker']; 

				$pageData['end_date']  = $pageDataq['endDatepicker']; 

				$pageData['current_company']  = $pageDataq['current_company']; 

				

				$url = site_url()."/customer/api/addExperince"; 

				$response =  apiCall($url,"post",$pageData);

				 

			}

			 

			$url = site_url()."customer/api/findWorkExperinceList/$userId";

			$workList =  apiCall($url, "get"); 

			$arrayData=array( 

				"workList"=>$workList['result'], 

			);

			$this->template->load("workExperince",$arrayData);

	}

	/**

	 * work Experince delete

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function workExperinceDelete($id){ 

		$url = site_url()."customer/api/workExperinceDelete/$id";

		$workList =  apiCall($url, "get"); 

		redirect(site_url()."customer/workExperince");		 

	}

	

	/**

	 * training Specialties

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function trainingSpecialties(){

			$userId =  $this->session->userdata('uid');

			if(isset($_POST['btnSpecialties'])){ 

				$pageDataq = $this->input->post(); 

				$pageData['user_id']  = $userId; 

				$pageData['title']  = $pageDataq['title']; 

				 

				$url = site_url()."/customer/api/trainingSpecialties"; 

				$response =  apiCall($url,"post",$pageData);

				 

			}

			 

			$url = site_url()."customer/api/trainingSpecialtiesList/$userId";

			$rainingList =  apiCall($url, "get"); 

			$arrayData=array( 

				"rainingList"=>$rainingList['result'], 

			);

			$this->template->load("trainingSpecialties",$arrayData);

	}

	/**

	 * training Specialties

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function trainingSpecialtiesDelete($id){ 

		$url = site_url()."customer/api/trainingSpecialtiesDelete/$id";

		$workList =  apiCall($url, "get"); 

		redirect(site_url()."customer/trainingSpecialties");		 

	}

	/**

	 * training Specialties

	 * @access public

	 jaywant narwade 11/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function invoiceList(){ 

			$userId =  $this->session->userdata('uid');

			$url = site_url()."customer/api/eventInvoceList/$userId";   

			$eventInvoceList =  apiCall($url, "get"); 

			$InvoceListUrl = site_url()."/customer/api/courseEnrollmentInvoceList/$userId";

			$courseInvoceList =  apiCall($InvoceListUrl, "get"); 

			$arrayData=array( 

				"eventInvoceList"=>$eventInvoceList['result'], 

				"courseInvoceList"=>$courseInvoceList['result'], 

			);

			$this->template->load("invoiceList",$arrayData);	 

	}



	public function profile_detail(){ 

			$this->template->load("profile_detail",$arrayData);	 

	}

	/**

	 * Customer Course List 

	 * @access public

		Atul Mangave 12/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function scheduledCoursesCustomer($rar_id=0) {  

		$uid=$this->session->userdata('uid');

		$url = site_url()."/customer/api/remoteApplicationServicesBrainCertListbyCust/$rar_id/$uid";

		$brainCertData =  apiCall($url, "get");

		

		$arrayData = [

			"brainCertList"=>$brainCertData['result'],

			"rar_id"=>$rar_id,

		];

		$this->template->load("scheduleCourseCustomer",$arrayData); 

	}	

	/**

	 * Customer Course List 

	 * @access public

		Atul Mangave 12/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	/* Remote Machine Invoice  Details*/

	public function remoteMachineInvoiceRequestfinal($id=0){

		

		$url = site_url()."consultant/api/findSingleInvoiceDetailsRemoteMachineFinal/{$id}";

		$invoiceList =  apiCall($url, "get");

		$arrayData=[

			"result"=>$invoiceList['result']

		];		



		$this->template->load("invoice_details_final",$arrayData);

	}

	

	/**

	 *remote Machine Application Service Invoice generation

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function remoteMachineServiceInvoice($rmr_id) {  

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post();

			$pageData['rmr_id'] = $rmr_id;

			$url  = site_url()."customer/api/createMachineServiceInvoice";

			$response = apiCall($url,"POST",$pageData);

			$updateData['rmr_id'] = $rmr_id;

			$updateData['invoiceByConsultant'] = 'Y';

			if($response['result']){

			$url  = site_url()."customer/api/updateRemoteMachineRequestInvoice";

			$update_response = apiCall($url,"POST",$updateData);

				

				redirect(site_url()."customer/remoteMachineServiceInvoice/$rmr_id");

			}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remoteMachineServiceInvoice/$rmr_id");

			} 

		}

		$url  = site_url()."customer/api/fetchMachineServiceInvoice/$rmr_id";

		$invoiceList = apiCall($url,"get");

		$arrayData = [

			"rmr_id"=>$rmr_id,

			"invoiceList"=>$invoiceList['result'],

		];

		$this->template->load("remoteMachineServiceInvoice",$arrayData); 	

	}

	/**

	 *remote Machine Class Schedule

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function remoteMachineClassSchedule($rmr_id=0) {  

		$uid=$this->session->userdata('uid');

		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$pageData['rmr_id'] = $rmr_id;
			$pageData['created_by_user'] = $uid;
			
		//	require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
		//	$objTokbox = new tokbox;
		//	$responseData= $objTokbox->tokenGenration();	
		//	$pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
		//	$pageData['tokbox_token'] = $responseData['tokbox_token'];

			//print_r($pageData);exit;
			$url = site_url()."customer/api/remoteMachineClassScheduleInsert";
			$response =  apiCall($url, "post",$pageData); 
			
			if($response['result']){

				setFlash("dataMsgWizSuccess", $response['message']);

			}else{

				setFlash("dataMsgWizError", $response['message']);

			} 

			redirect(site_url()."customer/remoteMachineClassSchedule/$rmr_id");

			exit;

		}

	 	$url = site_url()."customer/api/remoteMachineClassScheduleList/$rmr_id/$uid";

		$reqData =  apiCall($url, "get");  

	 

		$arrayData = [

			"scheduleList"=>$reqData['result'], 

		];

		$this->template->load("remoteMachineClassSchedule",$arrayData); 

	}

	/**

	 *remote Machine Class Schedule

	 * Atul Mangave

			13/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleCustomer($rmr_id=0) {  

		$uid=$this->session->userdata('uid');

		$url = site_url()."customer/api/remoteMachineClassScheduleListCustomer/$rmr_id/$uid";

		$reqData =  apiCall($url, "get");

		$arrayData = [

			"scheduleList"=>$reqData['result'], 

		];

		$this->template->load("remoteMachineClassScheduleCustomer",$arrayData); 

	}

	/**

	 *remote Machine Class Schedule

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function tokboxLunch($rmstId) {  

		$uid=$this->session->userdata('uid');

		if((int)($rmstId)){ 

			$url = site_url()."customer/api/remoteMachineClassScheduleFetchSingle/$rmstId";

			$response =  apiCall($url, "get");

			 

			if($response['result']){

				 

				if($response['result']['tokbox_sessionid']){

					$sessionId=$response['result']['tokbox_sessionid'];

					$token=$response['result']['tokbox_token'];

					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");

				}

				else{

					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";

					$objTokbox = new tokbox;

					$stringData= $objTokbox->tokenGenration();	

					 $stringData['rmstId']=$rmstId;	

					$url = site_url()."customer/api/remoteMachineClassScheduleUpdate/";

					$response =  apiCall($url, "post",$stringData);

					if($response['result']){

						redirect(site_url()."customer/tokboxLunch/$rmstId");

					 

					}

					else{

						echo "error".$response['message'];

					}	

				}

			}else{

				 

			} 

		}

	 	 

	}



	/**

	 * remote Application Programm users request List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationProgrammer($rpr_id=0) {  

		$rpr_id;

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		

		$url = site_url()."/remoteprogramming/api/remoteApplicationProgrammBySupport/$userId";

		$programmReqList =  apiCall($url, "get");  

		

		$arrayData=array( 

			"programmReqList"=>$programmReqList['result'],   

		); 

		$this->template->load("remoteApplicationProgrammer",$arrayData); 	

	}	

	public function customerRequestsProgrammer($rarp_id,$rpr_id){

		$url = site_url()."remoteprogramming/api/findSingleDetailsCustomerPrgrammingReq/".$rpr_id;

		$result = apiCall($url,"get");

		$data['material_type']  = $result['result']['material_type'];

		$data['application_required']  = $result['result']['application_required'];

		//Material List by Post

		$url = site_url()."settings/materialtypeapi/findmultipletypes";

		$materialList = apiCall($url,"post",$data);



		//Application List By Post Method

		$url = site_url()."settings/applicationrequiredapi/findmultipleApplication";

		$applicationList = apiCall($url,"post",$data);

		$arrayData=array( 

			"result"=>$result['result'],   

			"materialList"=>$materialList['result'],   

			"applicationList"=>$applicationList['result'],   

			"rpr_id"=>$rpr_id,   

			"rarp_id"=>$rarp_id,   

		); 

		$this->template->load("customerRequestsDetails",$arrayData); 	

	}

	

	//remote Application Programm Accept

	public function remoteApplicationProgrammAccept($rarp_id){

		

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post(); 

			$pageData['rarp_id'] = $rarp_id;

			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 

			 

			$url = site_url()."customer/api/remoteApplicationProgrammAccept/";

			$response = apiCall($url,"post",$pageData);

	 

			if($response['result']){

					setFlash("dataMsgAddSuccess", $response['message']);

					redirect(site_url()."customer/remoteApplicationProgrammer/");

			}else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/remoteApplicationProgrammer/");

			}

			exit;

		}

		//Application List By Post Method

		$url = site_url()."remoteprogramming/api/findSingle_remote_application_aggrement_request_programmer/$rarp_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

		$this->template->load("remoteApplicationProgrammQoutation",$arrayData); 	

	}



	public function remoteApplicationProgrammReject($rarp_id){

		$url = site_url()."customer/api/remoteApplicationProgrammReject/".$rarp_id;

		$response = apiCall($url,"get");

		if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/remoteApplicationProgrammer/$rmr_id");

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remoteApplicationProgrammer/$rmr_id");

		}

	}



	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationProgramm() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/remoteApplicationProgramm/$userId";

		$requestList =  apiCall($url, "get"); 

			

		$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("remoteApplicationProgrammers",$arrayData); 	

		 

	}

	

	public function dashboard() {  

			$this->template->load("dashboard");

	}

	public function profile_edit() {  

		$user_id = $this->session->userdata('uid');

		if(isset($_POST['btnUpdate'])){

			$pageData = $this->input->post();

			$pageData['uid'] = $user_id; 

		

			$pageData['u_date_birth'] =  ($pageData['birthdate']); 

			$url = site_url()."customer/api/updateDetails"; 

			$response =  apiCall($url, "post",$pageData); 

			 

			if($response['result']){

				setFlash("dataMsgProfileSuccess", "Profile updated successfully"); 

			}else{

				setFlash("dataMsgProfileError", $response['message']); 

			}

		}

			$this->load->model("location/country_model");

			$this->load->model("location/state_model");

			$this->load->model("location/city_model");		

			

		$url = site_url()."settings/userapi/findMultipleChild/";

		$userTypeList =  apiCall($url, "get");  

		$url = site_url()."/customer/api/findAddressList/$user_id";

		$customerAddressList =  apiCall($url, "get");

		/* Qualification */

		$url = site_url()."consultant/api/findMultipleConsultantQualification/";

		$qualificationList  =  apiCall($url, "get"); 

		

		

		$url = site_url()."/customer/api/bankDetails/$user_id";

		$customer_data =  apiCall($url, "get"); 

		

		$url = site_url()."/customer/api/findContactList/$user_id";

		$customerContactList =  apiCall($url, "get"); 

		$url = site_url()."settings/languageapi/findMultiple/";

		$language_list =  apiCall($url, "get");  

		 	

		$arrayData=	array(	

							"customer_data"=>$customer_data['result'],

							"userTypeList"=>$userTypeList['result'], 

							"customerAddressList"=>$customerAddressList['result'],

							"customerContactList"=>$customerContactList['result'],

							"language_list"=>$language_list['result'],

							"countryList" => $this->country_model->getCountryListForSite(),

							"qualificationList"=>$qualificationList['result']

					);

			$this->template->load("profile_edit",$arrayData);

	}

	

		/**

	 * remote Application Service cunsultant request List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationServiceProgrammers($requestId, $rarp_id=0) { 

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		/* 

		if($rarp_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

			$requestConsultantList =  apiCall($url, "get"); 

			redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);	

		}    */

		$url = site_url()."/customer/api/remoteApplicationServiceProgrammers/$requestId";

		$requestProgrammers =  apiCall($url, "get"); 

			$arrayData=array( 

				"requestProgrammers"=>$requestProgrammers['result'], 

			); 

			$this->template->load("remoteApplicationServiceprogrammers",$arrayData); 	

		 

	}

	

	public function remoteApplicationServiceProgrammersAcceptByCustomer($rarp_id=0,$requestId){

			$url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

			$requestConsultantList =  apiCall($url, "get"); 

			redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);	

	}

	public function machinelist() { 

		$user_id = $this->session->userdata('uid');

		$url = site_url()."machine/api/machineContactRequest/$user_id"; 

		$machineContactRequest =  apiCall($url, "get"); 

		$arrayData = array(  "machineContactRequest"=>$machineContactRequest['result'] );

		$this->template->load("machinelist",$arrayData);

	}

	/**

	 * machine comment as per user List

		21/4/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function machinecomment($mcid) {  

		$user_id = $this->session->userdata('uid');

		if(isset($_POST['btnComment'])){

			$pageData = $this->input->post(); 

			$pageData['user_id'] = $user_id; 

			$pageData['machine_comment_id'] = $mcid; 

			$pageData['comment_date_time'] = date('Y-m-d H:i:s'); 

			$url = site_url()."machine/api/addMachineComment"; 

			$response =  apiCall($url, "post",$pageData);

			

			if($response['result']){

				setFlash("dataMsgCommentSuccess", $response['message']); 

			}else{

				setFlash("dataMsgCommentError", $response['message']); 

			}

		}

		

		$url = site_url()."machine/api/machineCommentReplyList/$mcid"; 

		$machineCommentReplyList =  apiCall($url, "get"); 

		

		$arrayData = array(  "machineCommentReplyList"=>$machineCommentReplyList['result'] ); 

		$this->template->load("machinecomment",$arrayData);

	}

	/**

	 * machine video request

		21/4/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function machineVideoEnquiry() {  

		$user_id = $this->session->userdata('uid');

		

		$url = site_url()."machine/api/machineVideoRequestList/$user_id"; 

		$machineVideoRequestList =  apiCall($url, "get"); 

		

		$arrayData = array(  "machineVideoRequestList"=>$machineVideoRequestList['result'] ); 

		$this->template->load("machineVideoList",$arrayData);

	}

	public function machineVideoEnquirySupplier() {  

		$user_id = $this->session->userdata('uid');

		

		$url = site_url()."machine/api/machineVideoRequestListSupplier/$user_id"; 

		$machineVideoRequestList =  apiCall($url, "get");

	

		$arrayData = [

			"machineVideoRequestList"=>$machineVideoRequestList['result'] 

		]; 

		$this->template->load("machineVideoEnquirySupplier",$arrayData);

	}




	public function automationlist() { 
		$user_id = $this->session->userdata('uid');
		$url = site_url()."automation/api/automationContactRequest/$user_id"; 
		$automationContactRequest =  apiCall($url, "get"); 
		$arrayData = array(  "automationContactRequest"=>$automationContactRequest['result'] );
		$this->template->load("automationlist",$arrayData);
	}
	/**
	 * Automation comment as per user List
	   09-07-2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function automationcomment($amid) {  
		$user_id = $this->session->userdata('uid');
		if(isset($_POST['btnComment'])){
			$pageData = $this->input->post(); 
			$pageData['user_id'] = $user_id; 
			$pageData['automation_comment_id'] = $mcid; 
			$pageData['comment_date_time'] = date('Y-m-d H:i:s'); 
			$url = site_url()."automation/api/addAutomationComment"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgCommentSuccess", $response['message']); 
			}else{
				setFlash("dataMsgCommentError", $response['message']); 
			}
		}
		
		$url = site_url()."automation/api/automationCommentReplyList/$amid"; 
		$automationCommentReplyList =  apiCall($url, "get"); 
		
		$arrayData = array("automationCommentReplyList"=>$automationCommentReplyList['result'] ); 
		$this->template->load("automationcomment",$arrayData);
	}

	/**
	 * Automation video request
		09/07/2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 

	public function automationVideoEnquiry() {  
		$user_id = $this->session->userdata('uid');
		
		$url = site_url()."automation/api/automationVideoRequestList/$user_id"; 
		$automationVideoRequestList =  apiCall($url, "get"); 
		
		$arrayData = array(  "automationVideoRequestList"=>$automationVideoRequestList['result'] ); 
		$this->template->load("automationVideoList",$arrayData);
	}


	public function automationVideoEnquirySupplier() {  
		$user_id = $this->session->userdata('uid');
		
		$url = site_url()."automation/api/automationVideoRequestListSupplier/$user_id"; 
		$automationVideoRequestList =  apiCall($url, "get");
	
		$arrayData = [
			"automationVideoRequestList"=>$automationVideoRequestList['result'] 
		]; 
		$this->template->load("automationVideoEnquirySupplier",$arrayData);
	}
	

	

	/* =========== MAchine Video Request ============= */





/**

	 *remote Machine Class Schedule

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function MachineVideoClassSchedule($mvr_id=0) {  

		$uid=$this->session->userdata('uid');

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post();

			$pageData['mvr_id'] = $mvr_id;

			$pageData['created_by_user'] = $uid;

			//require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
		//	$objTokbox = new tokbox;
		//	$responseData= $objTokbox->tokenGenration();	
		//	$pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
		//	$pageData['tokbox_token'] = $responseData['tokbox_token'];

			$url = site_url()."customer/api/remoteMachineVideoClassScheduleInsert";

			$response =  apiCall($url, "post",$pageData);

			 

			if($response['result']){

				setFlash("dataMsgMachSuccess", $response['message']);

				redirect(site_url()."customer/MachineVideoClassSchedule/$mvr_id");

			}else{

				setFlash("dataMsgMachError", $response['message']);

				redirect(site_url()."customer/MachineVideoClassSchedule/$mvr_id");

			} 

		}

	 	$url = site_url()."customer/api/remoteMachineVideoClassScheduleList/$mvr_id/$uid";

		$reqData =  apiCall($url, "get");  

		

		$arrayData = [

			"scheduleList"=>$reqData['result'], 

		];

		$this->template->load("remoteMachineVideoClassSchedule",$arrayData); 

	}

	/**

	 *remote Machine Video Class Schedule

	 * Atul Mangave

			24/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function MachineVideoClassScheduleCustomer($mvr_id=0) {  

		$uid=$this->session->userdata('uid');

		 $url = site_url()."customer/api/remoteMachineVideoClassScheduleListCustomer/$mvr_id/$uid";

		$reqData =  apiCall($url, "get");

		$arrayData = [

			"scheduleList"=>$reqData['result'], 

		];

		$this->template->load("remoteMachineVideoClassScheduleCustomer",$arrayData); 

	}

	/**

	 *remote Machine Video Class Schedule

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function tokboxLunchVideo($id) {  

		$uid=$this->session->userdata('uid');

		if((int)($id)){ 

		 	$url = site_url()."customer/api/remoteMachineVideoClassScheduleFetchSingle/$id";

			$response =  apiCall($url, "get");

			if($response['result']){

				 

				if($response['result']['tokbox_sessionid']){

					$sessionId=$response['result']['tokbox_sessionid'];

					$token=$response['result']['tokbox_token'];

					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");

				}

				else{

					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";

					$objTokbox = new tokbox;

					$stringData= $objTokbox->tokenGenration();	

					$stringData['id']=$id;	

					$url = site_url()."customer/api/remoteMachineVideoClassScheduleUpdate/";

					$response =  apiCall($url, "post",$stringData);

					

					if($response['result']){

						redirect(site_url()."customer/tokboxLunchVideo/$id");

					 

					}

					else{

						echo "error".$response['message'];

					}	

				}

			}else{

				 

			} 

		}

	 	 

	}



/* =========== Automation Video Request ============= */


/**
	 *remote Automation Class Schedule
	 * Deepak Shinde
		09/07/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */
	public function AutomationVideoClassSchedule($avr_id=0) {  
		$uid=$this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$pageData['avr_id'] = $avr_id;
			$pageData['created_by_user'] = $uid;
			 
			$url = site_url()."customer/api/remoteAutomationVideoClassScheduleInsert";
			$response =  apiCall($url, "post",$pageData);
			 
			if($response['result']){
				setFlash("dataMsgMachSuccess", $response['message']);
				redirect(site_url()."customer/AutomationVideoClassSchedule/$avr_id");
			}else{
				setFlash("dataMsgMachError", $response['message']);
				redirect(site_url()."customer/AutomationVideoClassSchedule/$avr_id");
			} 
		}
	 	$url = site_url()."customer/api/remoteAutomationVideoClassScheduleList/$avr_id/$uid";
		$reqData =  apiCall($url, "get");  
		
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];
		$this->template->load("remoteAutomationVideoClassSchedule",$arrayData); 
	}
	/**
	 *remote Automation Video Class Schedule
	 * Deepak shinde
			09/07/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */
	public function AutomationVideoClassScheduleCustomer($avr_id=0) {  
		$uid=$this->session->userdata('uid');
		 $url = site_url()."customer/api/remoteAutomationVideoClassScheduleListCustomer/$avr_id/$uid";
		$reqData =  apiCall($url, "get");
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];
		$this->template->load("remoteAutomationVideoClassScheduleCustomer",$arrayData); 
	}
	/**
	 *remote Automation Video Class Schedule
	 *Deepak shinde
			09/07/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */
	/*public function tokboxLunchVideo($id) {  
		$uid=$this->session->userdata('uid');
		if((int)($id)){ 
		 	$url = site_url()."customer/api/remoteAutomationVideoClassScheduleFetchSingle/$id";
			$response =  apiCall($url, "get");
			if($response['result']){
				 
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");
				}
				else{
					require_once APPPATH."modules\wtokbox\controllers\Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['id']=$id;	
					$url = site_url()."customer/api/remoteAutomationVideoClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					
					if($response['result']){
						redirect(site_url()."customer/tokboxLunchVideo/$id");
					 
					}
					else{
						echo "error".$response['message'];
					}	
				}
			}else{
				 
			} 
		}
	 	 
	}*/

	

/*  */

	/**

	 * remote on demand  cunsultant user request List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteOnDemandConsultantCustomer($requestId,$remote_application_id=0) {  

		 $remote_application_id;

		

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		

	 	$url = site_url()."/customer/api/remoteApplicationServiceOnDemandConsultant/$requestId";

		$consultReqList =  apiCall($url, "get");  

		if($remote_application_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceOnDemandConsultantUpdate/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get"); 

			// print_r($requestConsultantList);exit;

			if($requestConsultantList['result']){

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultantCustomer/".$requestId);	

			}else{

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultantCustomer/".$requestId);

			}

		}    

		$arrayData=array( 

			"consultReqList"=>$consultReqList['result'],   

		); 

		$this->template->load("remoteApplicationServiceOnDemandConsultant",$arrayData); 	

		 

	}

		public function remoteOnDemandConsultant($remote_application_id=0) {  

		$remote_application_id;

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		

	 	$url = site_url()."/customer/api/remoteOnDemandServicesBySupport/$userId";

		$consultReqList =  apiCall($url, "get");  

		 

		

		if($remote_application_id > 0){

			$url = site_url()."/customer/api/remoteOnDemandConsultantUpdate/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get"); 

			 

			if($requestConsultantList['result']){

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultant/");	

			}else{

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultant/");

			}

		}   

		$arrayData=array( 

			"consultReqList"=>$consultReqList['result'],   

		); 

		$this->template->load("remoteOnDemandConsultant",$arrayData); 	

		 

	}



/**

	 * remote Application Service cunsultant request List  for 

	 customer View

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteOnDemandServiceConsultant($requestId, $remote_application_id=0) {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		if($remote_application_id > 0){

			$url = site_url()."/customer/api/remoteOnDemandServiceConsultantUpdate/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get");  

			redirect(site_url()."customer/remoteOnDemandServiceConsultant/".$requestId);	

		}   

		$url = site_url()."/customer/api/remoteOnDemandServiceConsultant/$requestId";

		$requestConsultantList =  apiCall($url, "get");  

		

		

			$arrayData=array( 

				"requestConsultantList"=>$requestConsultantList['result'],   

			); 

			$this->template->load("remoteOnDemandServiceConsultant",$arrayData); 	

		 

	}

	//// reject accept request

	public function remoteOnDemandConsultantReject($remote_application_id=0) {  

			$url = site_url()."/customer/api/remoteOnDemandConsultantReject/$remote_application_id";

			$requestConsultantList =  apiCall($url, "get"); 



			if($requestConsultantList['result']){

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultant/");	

			}else{

				setFlash("dataMsgAddError", $requestConsultantList['message']);

				redirect(site_url()."customer/remoteOnDemandConsultant/");

			}

	}

	/**

	 * commenttotrainee

	 * @access public

		Atul Mangave 26/4/2018 

	 * @param   

	 * @return array of objects

	 */ 

	public function commenttotrainee($rar_id=0) {  

		$uid=$this->session->userdata('uid');

	

			if(isset($_POST['btnSubmit'])){

				$pageData = $this->input->post(); 

				$pageData['comment_by_user_id'] = $uid;

				$pageData['comment_date'] = date('Y-m-d H:i:s');

				 

				$url = site_url()."customer/api/commenttotraineeInsert";

				$response =  apiCall($url, "post",$pageData);

	 

				if($response['result']){

					setFlash("dataMsgMachSuccess", $response['message']);

					redirect(site_url()."customer/remoteApplicationService/");

				}else{

					setFlash("dataMsgMachError", $response['message']);

					redirect(site_url()."customer/remoteApplicationService/"); 

				} 

			}

		$url = site_url()."/customer/api/remoteApplicationServicesBrainCertListbyCustSingle/$rar_id/$uid";

		$singleData =  apiCall($url, "get");

		$arrayData = [

			"rowList"=>$singleData['result'],

			"rar_id"=>$rar_id,

		];

		$this->template->load("trainee_comment",$arrayData); 

	}

	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function remote_application_consultant($rpr_id=0) {  

		$rpr_id;

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		

	  	$url = site_url()."remoteapplication/api/remote_application_consultant/$userId";

		$programmReqList =  apiCall($url, "get"); 

		$arrayData=array( 

			"programmReqList"=>$programmReqList['result'],   

		); 

		$this->template->load("remote_application_consultant",$arrayData); 	

	}

	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsApplication($rarp_id,$rpr_id){

		$url = site_url()."remoteapplication/api/findSingleDetailsCustomerPrgrammingReq/".$rpr_id;

		$result = apiCall($url,"get");

		$data['material_type']  = $result['result']['material_type'];

		$data['application_required']  = $result['result']['application_required'];

		//Material List by Post

		$url = site_url()."settings/materialtypeapi/findmultipletypes";

		$materialList = apiCall($url,"post",$data);



		//Application List By Post Method

		$url = site_url()."settings/applicationrequiredapi/findmultipleApplication";

		$applicationList = apiCall($url,"post",$data);

		$arrayData=array( 

			"result"=>$result['result'],   

			"materialList"=>$materialList['result'],   

			"applicationList"=>$applicationList['result'],   

			"rpr_id"=>$rpr_id,   

			"rarp_id"=>$rarp_id,   

		); 

		$this->template->load("customerRequestsApplication",$arrayData); 	

	}

	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsApplicationAccept($rarp_id){

		 

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post(); 

			$pageData['racrp_id'] = $rarp_id;

			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 

			$url = site_url()."customer/api/customerRequestsApplicationAccept/";

			$response = apiCall($url,"post",$pageData); 

			if($response['result']){

					setFlash("dataMsgAddSuccess", $response['message']);

					redirect(site_url()."customer/remote_application_consultant/");

			}else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/remote_application_consultant/");

			}

			exit;

		}

		//Application List By Post Method

		$url = site_url()."remoteapplication/api/findSingle_remote_application_consultant/$rarp_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

		$this->template->load("customerRequestsApplicationQoutation",$arrayData); 

	}

	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsApplicationReject($rarp_id){

		$url = site_url()."customer/api/customerRequestsApplicationReject/".$rarp_id;

		$response = apiCall($url,"get");

		if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/remote_application_consultant/$rarp_id");

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remote_application_consultant/$rarp_id");

		}

	}

	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remote_machine_req_customers() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/remoteApplicationConsultant/$userId";

		$requestList =  apiCall($url, "get"); 

			$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("remote_machine_req_customers",$arrayData); 	

		 

	}

	/**

	 * remote Application Service

	 30/4/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationConsultantList($requestId, $rarp_id=0) { 

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		/* 

		if($rarp_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

			$requestConsultantList =  apiCall($url, "get"); 

			redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);	

		}    */

		$url = site_url()."/customer/api/remoteApplicationConsultantList/$requestId";

		$requestProgrammers =  apiCall($url, "get"); 

			$arrayData=array( 

				"requestProgrammers"=>$requestProgrammers['result'], 

			); 

			$this->template->load("remoteApplicationConsultantList",$arrayData); 	

		 

	}

	/**

	 * remote Application Service Programmers Accept By Customer

	 30/4/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remoteApplicationConsultantListAcceptByCustomer($rarp_id=0,$requestId){

			$url = site_url()."/customer/api/remoteApplicationConsultantListUpdate/$rarp_id";

			$requestConsultantList =  apiCall($url, "get"); 

			redirect(site_url()."customer/remote_machine_req_customers/".$requestId);	

	}

	

	/**

	 *schedule Application Consultant Course

	 30/4/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function scheduleApplicationConsultantCourse($racrp_id,$rpr_id) {  

	

		$uid=$this->session->userdata('uid');

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post();

			$pageData['rpr_id'] = $rpr_id;

			$pageData['created_by_user'] = $uid;

			 

			$url = site_url()."customer/api/scheduleApplicationConsultantCourseInsert";

			$response =  apiCall($url, "post",$pageData);

			 

			if($response['result']){

				setFlash("dataMsgMachSuccess", $response['message']);

			}else{

				setFlash("dataMsgMachError", $response['message']);

			} 

			redirect(site_url()."customer/remoteMachineClassSchedule/$rpr_id");

			exit;

		}

	 	$url = site_url()."customer/api/scheduleApplicationConsultantCourseList/$rpr_id/$uid";

		$reqData =  apiCall($url, "get");  

	 

		$arrayData = [

			"scheduleList"=>$reqData['result'], 

		];

		$this->template->load("scheduleApplicationConsultantCourse",$arrayData);  

	}

	

	/**

	 *schedule Application Consultant Tokbox Lunch

	 * jaywant narwade

			30/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function scheduleApplicationConsultantTokboxLunch($rmstId) {  

		$uid=$this->session->userdata('uid');

		if((int)($rmstId)){ 

			$url = site_url()."customer/api/scheduleApplicationConsultantCourseFetchSingle/$rmstId";

			$response =  apiCall($url, "get");

			 

			if($response['result']){

				 

				if($response['result']['tokbox_sessionid']){

					$sessionId=$response['result']['tokbox_sessionid'];

					$token=$response['result']['tokbox_token'];

					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");

				}

				else{

					require_once APPPATH."modules\wtokbox\controllers\Tokbox.php";

					$objTokbox = new tokbox;

					$stringData= $objTokbox->tokenGenration();	

					 $stringData['rmstId']=$rmstId;	

					$url = site_url()."customer/api/scheduleApplicationConsultantCourseUpdate/";

					$response =  apiCall($url, "post",$stringData);

					if($response['result']){

						redirect(site_url()."customer/tokboxLunch/$rmstId");

					 

					}

					else{

						echo "error".$response['message'];

					}	

				}

			}else{

				 

			} 

		}

	}

	/**

	//view Remote Program Qoute

	 9/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function viewRemoteProgramQoute($rarp_id=0) { 

		

		//Application List By Post Method

		$url = site_url()."remoteprogramming/api/findSingle_remote_application_aggrement_request_programmer/$rarp_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

			$this->template->load("viewRemoteProgramQoute",$arrayData); 	

		 

	}

	/**

	//view  Remote Application Consultant Qoute

	 10/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function viewRemoteApplicationConsultantQoute($rarp_id=0) { 

		

		//Application List By Post Method

		$url = site_url()."remoteapplication/api/findSingle_remote_application_consultant/$rarp_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

			$this->template->load("viewRemoteApplicationConsultantQoute",$arrayData); 	

		 

	}

	/**

	//group buying List asa per user list 

	 10/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function groupbuyingList() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."groupbuying/api/requestListAsUser/$uid";

		$requestList = apiCall($url,"get");
        //print_r($requestList);exit;
		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("groupbuyingList",$arrayData); 	

		 

	}

	/**

	//view group buying request details 

	 10/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function viewGroupBuyingRequest($gsrId,$garID) { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."groupbuying/api/requestDetails/$gsrId/$uid/";

		$requestList = apiCall($url,"get");
       // print_r($requestList);exit;
		$arrayData=array( 

			"result"=>$requestList['result'],    

		); 

			$this->template->load("viewGroupBuyingRequest",$arrayData); 	

		 

	}



	/**

	 * Group Buying Consultant users request List

	 * @access public

	  11-7-2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsGroupBuyingAccept($gsr_id){

		 

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post(); 
           
			$pageData['gsr_id'] = $gsr_id;
 
			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 

			$url = site_url()."customer/api/customerRequestsGroupBuyingAccept/";

			$response = apiCall($url,"post",$pageData); 
           // print_r($response);exit;
			if($response['result']){

					setFlash("dataMsgAddSuccess", $response['message']);

					redirect(site_url()."customer/groupbuyingList/");

			}else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/groupbuyingList/");

			}

			exit;

		}

		//Application List By Post Method

		$url = site_url()."digitalmanufacturing/api/findSingle_remote_Rfq_consultant/$gsr_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

		$this->template->load("customerRequestsGroupBuyingQoutation",$arrayData); 

	}

	/**

	 * Group Buying Consultant users request List

	 * @access public

		11-7-2018 Deepak shinde

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsGroupBuyingReject($gsr_id){

		$url = site_url()."customer/api/customerRequestsGroupBuyingReject/".$gsr_id;

		$response = apiCall($url,"get");

		if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/groupbuyingList/$gsr_id");

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remote_Rfq_consultant/$gsr_id");

		}

	}
 

   
	/**

	//view research purchases list

		21/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function research_purchases_list() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."research/api/research_purchases_list/$uid/";

		$purchasesList = apiCall($url,"get");

		$arrayData=array( 

			"purchasesList"=>$purchasesList['result'],    

		); 

			$this->template->load("research_purchases_list",$arrayData); 	

		 

	}

	

	/**

	//Expert Enquiry Details For customer

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function xpert_enquiry() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."customer/api/findMultipleExpertRequestList/$uid/";

		$requestList = apiCall($url,"get");

		//print_r()

		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("expert/expertRequest",$arrayData); 	

		 

	}

		/**

	//Remote Application Enquiry Details For customer

		21/June/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function remote_application_enquiry() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."customer/api/findMultipleRemoteApplicationRequestList/$uid/";

		$requestList = apiCall($url,"get");

		//print_r()

		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("remoteapplication/remoteapplicationRequest",$arrayData); 	

		 

	}

	/**

	//Expert Enquiry Details for consultant

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function xpert_enquiry_details() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."customer/api/findMultipleExpertRequestListConsultant/$uid/";

		$requestList = apiCall($url,"get");

		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("expert/expertRequestConsultant",$arrayData); 	

	}

		/**

	//Remote Application Enquiry Details for consultant

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function remote_application_enquiry_details() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."customer/api/findMultipleRemoteRequestListConsultant/$uid/";

		$requestList = apiCall($url,"get");

		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("remoteapplication/remoteapplicationConsultant",$arrayData); 	

	}

	/**

	//Expert Enquiry Accept By consultant

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function accept_xpert_request($expert_id=0) { 

		$url = site_url()."customer/api/accpetRequestByConsultant/{$expert_id}";

		$acceptResponse = apiCall($url,"get");

		if($acceptResponse['result']){

			setFlash("dataMsgAddSuccess", $response['message']);

			redirect(site_url()."customer/xpert_enquiry_details/");	

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/accept_xpert_request/");

		}

		

		$this->template->load("expert/xpert_enquiry_details"); 	

	}



	public function accept_request_remoteapplication($remote_id=0) { 

		$url = site_url()."customer/api/accpetRequestByConsultantRemoteApplication/{$remote_id}";

		$acceptResponse = apiCall($url,"get");

		if($acceptResponse['result']){

			setFlash("dataMsgAddSuccess", $response['message']);

			redirect(site_url()."customer/remote_application_enquiry_details/");	

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remote_application_enquiry_details/");

		}

	}

/**

	//Reject Enquiry Accept By consultant

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function reject_xpert_request($expert_id) { 

		$url = site_url()."customer/api/rejectRequestByConsultant/{$expert_id}";

		$acceptResponse = apiCall($url,"get");

		if($acceptResponse['result']){

			setFlash("dataMsgAddSuccess", $response['message']);

			redirect(site_url()."customer/xpert_enquiry_details/");	

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/accept_xpert_request/");

		}

	}

	public function reject_remoteapplication_request($remote_id) { 

		$url = site_url()."customer/api/rejectRequestByConsultantRemoteApplication/{$remote_id}";

		$acceptResponse = apiCall($url,"get");

		if($acceptResponse['result']){

			setFlash("dataMsgAddSuccess", $response['message']);

			redirect(site_url()."customer/remote_application_enquiry_details/");	

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remote_application_enquiry_details/");

		}

	}

/**

	//Reject Enquiry Accept By consultant

		24/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 *Atul Mangave **/ 

	public function scheduleCourseExpert($expert_id) { 

			

				$this->load->library('ZoomAPI');

			if(isset($_POST['btnSubmit'])){

				$data = $this->input->post();

				//CREATE OBJECT OF PERTICULAR CLASS

				$zoomCalls = new ZoomAPI();

				$createMeeting = $zoomCalls->createMeeting($data);
				
				$responseArray = json_decode($createMeeting);

				$responseZoom =  (array) $responseArray;

				

				$responseZoom1 = array();
				

				$responseZoom1['expert_id']= $expert_id;

				$responseZoom1['start_url']= $responseZoom['start_url'];

				$responseZoom1['join_url']= $responseZoom['join_url'];

				$responseZoom1['start_time']= $responseZoom['start_time'];

				$responseZoom1['created_at']= $responseZoom['created_at'];

				$responseZoom1['host_id']= $responseZoom['host_id'];

				$responseZoom1['uuid']= $responseZoom['uuid'];

				$responseZoom1['meeting_id']= $responseZoom['id'];

				$responseZoom1['duration']= $responseZoom['duration'];





				$url = site_url()."customer/api/zoomResponseUpdate/";

				$acceptResponse = apiCall($url,"post",$responseZoom1);



				if($acceptResponse['result']){

					setFlash("dataMsgAddSuccess", $acceptResponse['message']);

					redirect(site_url()."customer/xpert_enquiry_details/");	

				}else{

						setFlash("dataMsgAddError", $acceptResponse['message']);

						redirect(site_url()."customer/accept_xpert_request/");

				}



			} 

			$this->template->load("expert_schedule_form"); 	

	

	}

	/* Remote Application Request Schedule */

	public function scheduleCourseRemoteApplication($remote_id) { 

			

				$this->load->library('ZoomAPI');

			if(isset($_POST['btnSubmit'])){

				$data = $this->input->post();

				//CREATE OBJECT OF PERTICULAR CLASS

				$zoomCalls = new ZoomAPI();

				$createUser = $zoomCalls->createMeeting($data);

				$responseArray = json_decode($createUser);

				$responseZoom =  (array) $responseArray;

				

				$responseZoom1 = array();

				

				$responseZoom1['remote_id']= $remote_id;

				$responseZoom1['start_url']= $responseZoom['start_url'];

				$responseZoom1['join_url']= $responseZoom['join_url'];

				$responseZoom1['start_time']= $responseZoom['start_time'];

				$responseZoom1['created_at']= $responseZoom['created_at'];

				$responseZoom1['host_id']= $responseZoom['host_id'];

				$responseZoom1['uuid']= $responseZoom['uuid'];

				$responseZoom1['meeting_id']= $responseZoom['id'];

				$responseZoom1['duration']= $responseZoom['duration'];





				$url = site_url()."customer/api/zoomResponseUpdateRemoteApplication/";

				$acceptResponse = apiCall($url,"post",$responseZoom1);



				if($acceptResponse['result']){

					setFlash("dataMsgAddSuccess", $acceptResponse['message']);

					redirect(site_url()."customer/remote_application_enquiry_details/");	

				}else{

						setFlash("dataMsgAddError", $acceptResponse['message']);

						redirect(site_url()."customer/remote_application_enquiry_details/");

				}



			} 

			$this->template->load("remoteapplication_schedule_form"); 	

	

	}

	/* Remote MAchine Programming  */

	public function scheduleRemoteMachineprogramming($rpr_id) { 

			 $url = site_url()."customer/api/remoteProgrammingclassScheduleListConsultant/$rpr_id";

			$reqData =  apiCall($url, "get");  

	

				$this->load->library('ZoomAPI');

			if(isset($_POST['btnSubmit'])){

				$data = $this->input->post();

				

				//CREATE OBJECT OF PERTICULAR CLASS

				$zoomCalls = new ZoomAPI();

				$createUser = $zoomCalls->createMeeting($data);

				$responseArray = json_decode($createUser);

				$responseZoom =  (array) $responseArray;

				$responseZoom1 = array();

				

				$responseZoom1['rpr_id']= $rpr_id;

				$responseZoom1['start_url']= $responseZoom['start_url'];

				$responseZoom1['join_url']= $responseZoom['join_url'];

				$responseZoom1['start_time']= $responseZoom['start_time'];

				$responseZoom1['created_at']= $responseZoom['created_at'];

				$responseZoom1['host_id']= $responseZoom['host_id'];

				$responseZoom1['uuid']= $responseZoom['uuid'];

				$responseZoom1['meeting_id']= $responseZoom['id'];

				$responseZoom1['duration']= $responseZoom['duration'];





				$url = site_url()."customer/api/zoomResponseInsertRemoteProgramming/";

				$acceptResponse = apiCall($url,"post",$responseZoom1);

			

				if($acceptResponse['result']){

					setFlash("dataMsgAddSuccess", $acceptResponse['message']);

					redirect(site_url()."customer/scheduleRemoteMachineprogramming/$rpr_id");	

				}else{

						setFlash("dataMsgAddError", $acceptResponse['message']);

						redirect(site_url()."customer/scheduleRemoteMachineprogramming/$rpr_id");

				}



			} 

			$arrayData = [

					"reqData"=>$reqData['result']

			];

			

			$this->template->load("remoteProgrammingClassSchedule",$arrayData); 	

	

	}

		public function scheduleListRemoteProgramming($rpr_id) { 

			 $url = site_url()."customer/api/remoteProgrammingclassScheduleListConsultant/$rpr_id";

			$reqData =  apiCall($url, "get");  

	

				$this->load->library('ZoomAPI');

			if(isset($_POST['btnSubmit'])){

				$data = $this->input->post();

				

				//CREATE OBJECT OF PERTICULAR CLASS

				$zoomCalls = new ZoomAPI();

				$createUser = $zoomCalls->createMeeting($data);

				$responseArray = json_decode($createUser);

				$responseZoom =  (array) $responseArray;

				$responseZoom1 = array();

				

				$responseZoom1['rpr_id']= $rpr_id;

				$responseZoom1['start_url']= $responseZoom['start_url'];

				$responseZoom1['join_url']= $responseZoom['join_url'];

				$responseZoom1['start_time']= $responseZoom['start_time'];

				$responseZoom1['created_at']= $responseZoom['created_at'];

				$responseZoom1['host_id']= $responseZoom['host_id'];

				$responseZoom1['uuid']= $responseZoom['uuid'];

				$responseZoom1['meeting_id']= $responseZoom['id'];

				$responseZoom1['duration']= $responseZoom['duration'];





				$url = site_url()."customer/api/zoomResponseInsertRemoteProgramming/";

				$acceptResponse = apiCall($url,"post",$responseZoom1);

			

				if($acceptResponse['result']){

					setFlash("dataMsgAddSuccess", $acceptResponse['message']);

					redirect(site_url()."customer/scheduleRemoteMachineprogramming/$rpr_id");	

				}else{

						setFlash("dataMsgAddError", $acceptResponse['message']);

						redirect(site_url()."customer/scheduleRemoteMachineprogramming/$rpr_id");

				}



			} 

			$arrayData = [

					"reqData"=>$reqData['result']

			];

			

			$this->template->load("remoteProgrammingClassScheduleList",$arrayData); 	

	

	}

	/*  */

	public function tokboxLunchRemoteService($rab_id) {  

		$uid=$this->session->userdata('uid');

		if((int)($rab_id)){ 

			$url = site_url()."customer/api/remoteServiceClassScheduleFetchSingle/$rab_id";

			$response =  apiCall($url, "get");



			if($response['result']){

				if($response['result']['tokbox_sessionid']){

					$sessionId=$response['result']['tokbox_sessionid'];

					$token=$response['result']['tokbox_token'];

					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");

				}

				else{

					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";

					$objTokbox = new tokbox;

					$stringData= $objTokbox->tokenGenration();	

					$stringData['rab_id']=$rab_id;	

					$url = site_url()."customer/api/remoteServiceClassScheduleUpdate/";

					$response =  apiCall($url, "post",$stringData);

					if($response['result']){

						redirect(site_url()."customer/tokboxLunchRemoteService/$rab_id");

					}

					else{

						echo "error".$response['message'];

					}	

				}

			}else{

				 

			} 

		}

	 	 

	}	



	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function groupbuyingQuotationList() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/groupbuyingQuotationList/$userId";

		$requestList =  apiCall($url, "get"); 
       // print_r($requestList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("groupbuying_quotation_list",$arrayData); 	

		 

	}

/***************************************** COURSE RFQ LIST FOR SUPPLIER ******************************/
	/**

	//Course List asa per user list 

	 10/5/2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function courseList() { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."remotetraining/api/requestListAsUser/$uid";

		$requestList = apiCall($url,"get");
        //print_r($requestList);exit;
		$arrayData=array( 

			"requestList"=>$requestList['result'],    

		); 

			$this->template->load("courseList",$arrayData); 	

		 

	}

	public function viewCourseRequest($csrId,$ccrID) { 

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."remotetraining/api/requestDetails/$csrId/$uid/";

		$requestList = apiCall($url,"get");
       // print_r($requestList);exit;
		$arrayData=array( 

			"result"=>$requestList['result'],    

		); 

			$this->template->load("viewCourseRequest",$arrayData); 	

		 

	}

	/**

	 * Group Buying Consultant users request List

	 * @access public

	  11-7-2018

	 * @param   

	 * @return array of objects

	 */ 

	public function supplierCourseRfqAccept($csr_id){

		 

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post(); 
           
			$pageData['csr_id'] = $csr_id;
 
			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 

			$url = site_url()."customer/api/supplierCourseRfqAccept/";

			$response = apiCall($url,"post",$pageData); 
           // print_r($response);exit;
			if($response['result']){

					setFlash("dataMsgAddSuccess", $response['message']);

					redirect(site_url()."customer/courseList/");

			}else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/courseList/");

			}

			exit;

		}

		//Application List By Post Method

		$uid=$this->session->userdata('uid');

		//Application List By Post Method

		$url = site_url()."remotetraining/api/requestDetails/$csrId/$uid/";

		$requestList = apiCall($url,"get");
       // print_r($requestList);exit;
		$arrayData=array( 

			"result"=>$requestList['result'],    

		); 

		$this->template->load("customerRequestsCourseQoutation",$arrayData); 

	}

	/**

	 * Group Buying Consultant users request List

	 * @access public

		11-7-2018 Deepak shinde

	 * @param   

	 * @return array of objects

	 */ 

	public function supplierCourseRfqReject($csr_id){

		$url = site_url()."customer/api/supplierCourseRfqReject/".$csr_id;

		$response = apiCall($url,"get");

		if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/courseList/$csr_id");

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/courseList/$csr_id");

		}

	}

	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function courseRfqList() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/courseRfqList/$userId";

		$requestList =  apiCall($url,"get"); 
       //print_r($requestList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("course_quotation_list",$arrayData); 	

		 

	}

    /********************  Digital Manufacturing Customer Code ***************************/

 /*/**
	 *Additive Manufactring RFQ users request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */


	public function digitalmanufacturingList($dmr_id=0) { 

		$dmr_id;
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		
		$url = site_url()."/additivemanufacturing/api/remoteApplicationProgrammBySupport/$userId";
		$supplierReqList =  apiCall($url, "get");  
		//print_r($supplierReqList);exit;
		$arrayData=array( 
			"supplierReqList"=>$supplierReqList['result'],   
		); 
		$this->template->load("digitalmanufacturingSupplier",$arrayData); 	
	}

	public function customerRequestsSupplier($dmr_id,$drrs_id){
		$url = site_url()."/additivemanufacturing/api/findSingleDetailsSupplierReq/".$dmr_id;
		$result = apiCall($url,"get");
	  //  print_r($result );exit;
		$data['material_type']  = $result['result']['material_type'];
		$data['application_required']  = $result['result']['application_required'];
		//Material List by Post
		$url = site_url()."settings/materialtypeapi/findmultipletypes";
		$materialList = apiCall($url,"post",$data);

		//Application List By Post Method
		$url = site_url()."settings/applicationrequiredapi/findmultipleApplication";
		$applicationList = apiCall($url,"post",$data);
		$arrayData=array( 
			"result"=>$result['result'],   
			"materialList"=>$materialList['result'],   
			"applicationList"=>$applicationList['result'],   
			"dmr_id"=>$dmr_id,   
			"drrs_id"=>$drrs_id,   
		); 
		$this->template->load("customerRequestsDetailsRfq",$arrayData); 	
	}

	//remote Application Programm Accept
	public function digitalmanufacturingRfqAccept($drrs_id){
		
		
		$url = site_url()."customer/api/digitalmanufacturingRfqAccept/{$drrs_id}";
		$response = apiCall($url,"get");
		//print_r($response);exit;
		if($response['result']){
			setFlash("dataMsgAddSuccess", $response['message']);
			redirect(site_url()."customer/digitalmanufacturingList");	
		}else{
				setFlash("dataMsgAddError", $response['message']);
				redirect(site_url()."customer/digitalmanufacturingList");
		}
		
		$this->template->load("digitalmanufacturingSupplier"); 	
	}

	public function digitalmanufacturingRfqReject($drrs_id){
		$url = site_url()."customer/api/digitalmanufacturingRfqReject/".$drrs_id;
		$response = apiCall($url,"get");
		if($response['result']){
				setFlash("dataMsgAddSuccess", $response['message']);
				redirect(site_url()."customer/digitalmanufacturingList");
		}else{
				setFlash("dataMsgAddError", $response['message']);
				redirect(site_url()."customer/digitalmanufacturingList");
		}
	}


	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsRfqAccept($drrs_id){

		 

		if(isset($_POST['btnSubmit'])){

			$pageData = $this->input->post(); 

			$pageData['drrs_id'] = $drrs_id;

			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 

			$url = site_url()."customer/api/customerRequestsRfqAccept/";

			$response = apiCall($url,"post",$pageData); 

			if($response['result']){

					setFlash("dataMsgAddSuccess", $response['message']);

					redirect(site_url()."customer/digitalmanufacturingList/");

			}else{

					setFlash("dataMsgAddError", $response['message']);

					redirect(site_url()."customer/digitalmanufacturingList/");

			}

			exit;

		}

		//Application List By Post Method

		$url = site_url()."additivemanufacturing/api/findSingle_remote_Rfq_consultant/$drrs_id";

		$result = apiCall($url,"get");

		$arrayData=array( 

			"result"=>$result['result'],    

		); 

		$this->template->load("customerRequestsRfqQoutation",$arrayData); 

	}

	/**

	 * remote Application Consultant users request List

	 * @access public

		27/4/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsRfqReject($drrs_id){

		$url = site_url()."customer/api/customerRequestsRfqReject/".$drrs_id;

		$response = apiCall($url,"get");

		if($response['result']){

				setFlash("dataMsgAddSuccess", $response['message']);

				redirect(site_url()."customer/remote_Rfq_consultant/$drrs_id");

		}else{

				setFlash("dataMsgAddError", $response['message']);

				redirect(site_url()."customer/remote_Rfq_consultant/$drrs_id");

		}

	}


	/**

	 * remote Application Service

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function remote_digitalmanufacturing_req_customers() {  

	

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		   

		$url = site_url()."/customer/api/remoteRfqSupplier/$userId";

		$requestList =  apiCall($url, "get"); 
//print_r($requestList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'],   

			); 

			$this->template->load("remote_digitalmanufacturing_req_customers",$arrayData); 	

		 

	}

		/**

	 *  Digital Manufacturing Service

		10-07-2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function DigitalmanufacturingSupplierList($requestId, $drrs_id=0) { 

		

		$userType =  $this->session->userdata('user_type');

		$userId =  $this->session->userdata('uid');

		/* 

		if($rarp_id > 0){

			$url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

			$requestConsultantList =  apiCall($url, "get"); 

			redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);	

		}    */

		$url = site_url()."/customer/api/DigitalmanufacturingSupplierList/$requestId";

		$requestSuppliers =  apiCall($url, "get"); 
		//print_r($requestSuppliers);exit;
			$arrayData=array( 

				"requestSuppliers"=>$requestSuppliers['result'], 

			); 

			$this->template->load("digitalmanufacturingSupplierList",$arrayData); 	

		 

	}

	/**

	 * Digital Manufacturing Supplier Accept By Customer

	   10-07-2018

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function DigitalmanufacturingSupplierListAcceptByCustomer($drrs_id=0,$requestId){

			$url = site_url()."/customer/api/DigitalmanufacturingSupplierListUpdate/$drrs_id";

			$requestSupplierList =  apiCall($url, "get"); 
		//print_r($result);exit;
			redirect(site_url()."customer/digitalmanufacturingSupplierList/".$requestId);	

	}


	public function viewDigitalManufacturingSupplierQoute($drrs_id=0) { 

		

		//Application List By Post Method

		$url = site_url()."additivemanufacturing/api/findSingle_remote_rfq_consultant/$drrs_id";

		$result = apiCall($url,"get");
		//print_r($result);exit;
		$arrayData=array( 

			"result"=>$result['result'],    

		); 

			$this->template->load("viewDigitalManufacturingSupplierQoute",$result); 	

		 

	}


	/*/**
	 *Rapid Prototyping  RFQ users request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */


	public function rapidprototypingList($dmr_id=0) { 

		$dmr_id;
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		
		$url = site_url()."/rapidprototyping/api/rapidprototypingBySupport/$userId";
		$supplierReqList =  apiCall($url, "get");  
		//print_r($supplierReqList);exit;
		$arrayData=array( 
			"supplierReqList"=>$supplierReqList['result'],   
		); 
		$this->template->load("rapidprototypingSupplier",$arrayData); 	
	}


	public function customerRequestsSupplierForRapidprototyping($dmr_id,$drrs_id){
		$url = site_url()."/rapidprototyping/api/findSingleDetailsSupplierReq/".$dmr_id;
		$result = apiCall($url,"get");
	  //  print_r($result );exit;
		$data['material_type']  = $result['result']['material_type'];
		$data['application_required']  = $result['result']['application_required'];
		//Material List by Post
		$url = site_url()."settings/materialtypeapi/findmultipletypes";
		$materialList = apiCall($url,"post",$data);

		//Application List By Post Method
		$url = site_url()."settings/applicationrequiredapi/findmultipleApplication";
		$applicationList = apiCall($url,"post",$data);
		$arrayData=array( 
			"result"=>$result['result'],   
			"materialList"=>$materialList['result'],   
			"applicationList"=>$applicationList['result'],   
			"dmr_id"=>$dmr_id,   
			"drrs_id"=>$drrs_id,   
		); 
		$this->template->load("customerRequestsDetailsRapidprototypingRfq",$arrayData); 	
	}

	/**

	 * Accept Quotation For Rapid Prototyping

	 * @access public

		26/07/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsRfqForRapidprototypingAccept($drrs_id){

		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['drrs_id'] = $drrs_id;
			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 
			$url = site_url()."customer/api/customerRequestsRfqAcceptForRapidprototyping/";
			$response = apiCall($url,"post",$pageData); 
			if($response['result']){
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url()."customer/rapidprototypingList/");
			}else{
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url()."customer/rapidprototypingList/");
			}
			exit;
		}
		//Application List By Post Method
		$url = site_url()."rapidprototyping/api/findSingle_remote_Rfq_consultant/$drrs_id";
		$result = apiCall($url,"get");
		$arrayData=array( 
			"result"=>$result['result'],    
		); 
		$this->template->load("customerRequestsRfqQoutationForRapidprototyping",$arrayData); 
	}

	/**
	 * Reject Quotation For Rapid Prototyping
	 * @access public
		26/07/2018
	 * @param   
	 * @return array of objects
	 */ 
	public function customerRequestsRfqForRapidprototypingReject($drrs_id){
		$url = site_url()."customer/api/customerRequestsRfqReject/".$drrs_id;
		$response = apiCall($url,"get");
		if($response['result']){
				setFlash("dataMsgAddSuccess", $response['message']);
				redirect(site_url()."customer/rapidprototypingList");
		}else{
				setFlash("dataMsgAddError", $response['message']);
				redirect(site_url()."customer/rapidprototypingList");
		}
	}

	/**

	 * Rapid Prototyping RFQ List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function RapidprototypingRfqList() {  
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		$url = site_url()."/customer/api/RapidprototypingRfqList/$userId";
		$requestList =  apiCall($url,"get"); 
       // print_r($requestList);exit;
			$arrayData=array( 
				"requestList"=>$requestList['result'],   
			); 
			$this->template->load("rapid_prototyping_quotation_list",$arrayData); 	
	}


	/*/**
	 * Laser Processing RFQ users request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */


	public function laserprocessingList($dmr_id=0) { 

		$dmr_id;
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		
		$url = site_url()."/laserprocessing/api/laserprocessingBySupport/$userId";
		$supplierReqList =  apiCall($url, "get");  
		//print_r($supplierReqList);exit;
		$arrayData=array( 
			"supplierReqList"=>$supplierReqList['result'],   
		); 
		$this->template->load("laserprocessingSupplier",$arrayData); 	
	}


	public function customerRequestsSupplierForLaserprocessing($dmr_id,$drrs_id){
		$url = site_url()."/laserprocessing/api/findSingleDetailsSupplierReq/".$dmr_id;
		$result = apiCall($url,"get");
	  //  print_r($result );exit;
		$data['material_type']  = $result['result']['material_type'];
		$data['application_required']  = $result['result']['application_required'];
		//Material List by Post
		$url = site_url()."settings/materialtypeapi/findmultipletypes";
		$materialList = apiCall($url,"post",$data);

		//Application List By Post Method
		$url = site_url()."settings/applicationrequiredapi/findmultipleApplication";
		$applicationList = apiCall($url,"post",$data);
		$arrayData=array( 
			"result"=>$result['result'],   
			"materialList"=>$materialList['result'],   
			"applicationList"=>$applicationList['result'],   
			"dmr_id"=>$dmr_id,   
			"drrs_id"=>$drrs_id,   
		); 
		$this->template->load("customerRequestsDetailsLaserprocessingRfq",$arrayData); 	
	}

	/**

	 * Accept Quotation For Laser Processing

	 * @access public

		26/07/2018

	 * @param   

	 * @return array of objects

	 */ 

	public function customerRequestsRfqForLaserprocessingAccept($drrs_id){

		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['drrs_id'] = $drrs_id;
			$pageData['qoutation_date'] = date('Y-m-d H:i:s'); 
			$url = site_url()."customer/api/customerRequestsRfqForLaserprocessingAccept/";
			$response = apiCall($url,"post",$pageData); 
			if($response['result']){
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url()."customer/laserprocessingList/");
			}else{
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url()."customer/laserprocessingList/");
			}
			exit;
		}
		//Application List By Post Method
		$url = site_url()."laserprocessing/api/findSingle_remote_Rfq_consultant/$drrs_id";
		$result = apiCall($url,"get");
		$arrayData=array( 
			"result"=>$result['result'],    
		); 
		$this->template->load("customerRequestsRfqQoutationForLaserprocessing",$arrayData); 
	}

	/**
	 * Reject Quotation For Laser Processing
	 * @access public
		26/07/2018
	 * @param   
	 * @return array of objects
	 */ 
	public function customerRequestsRfqForLaserprocessingReject($drrs_id){
		$url = site_url()."customer/api/customerRequestsRfqForLaserprocessingReject/".$drrs_id;
		$response = apiCall($url,"get");
		if($response['result']){
				setFlash("dataMsgAddSuccess", $response['message']);
				redirect(site_url()."customer/laserprocessingList");
		}else{
				setFlash("dataMsgAddError", $response['message']);
				redirect(site_url()."customer/laserprocessingList");
		}
	}

	/**

	 * Laser Processing RFQ List

	 * @access public

	 * @param   

	 * @return array of objects

	 */ 

	public function LaserprocessingRfqList() {  
		$userType =  $this->session->userdata('user_type');
		$userId =  $this->session->userdata('uid');
		$url = site_url()."/customer/api/LaserprocessingRfqList/$userId";
		$requestList =  apiCall($url,"get"); 
       // print_r($requestList);exit;
			$arrayData=array( 
				"requestList"=>$requestList['result'],   
			); 
			$this->template->load("Laser_processing_quotation_list",$arrayData); 	
	}



	/***************** Remote application Video Request Supplier **************/

	public function remoteappVideoEnquirySupplier() {  

		$user_id = $this->session->userdata('uid');
		$url = site_url()."remoteapplication/api/VideoRequestListSupplier/$user_id"; 
		$VideoRequestList =  apiCall($url, "get");
		//print_r($VideoRequestList);exit;
		$arrayData = [
			"VideoRequestList"=>$VideoRequestList['result'] 
		]; 
		$this->template->load("remoteappVideoEnquirySupplier",$arrayData);
	}


/**

	 *Remote Apllication Class Schedule
	 *Deepak Shinde
	  13/08/2018
	 *@access public
	 *@param  add Experince
	 *@return array of objects
	 */

	public function remoteappVideoClassSchedule($ravr_id=0) {  
		$uid=$this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$pageData['ravr_id'] = $ravr_id;
			$pageData['created_by_user'] = $uid;
			//require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
		//	$objTokbox = new tokbox;
		//	$responseData= $objTokbox->tokenGenration();	
		//	$pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
		//	$pageData['tokbox_token'] = $responseData['tokbox_token'];

			$url = site_url()."customer/api/remoteappVideoClassScheduleInsert";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgMachSuccess", $response['message']);
				redirect(site_url()."customer/remoteappVideoClassSchedule/$ravr_id");
			}else{
				setFlash("dataMsgMachError", $response['message']);
				redirect(site_url()."customer/remoteappVideoClassSchedule/$ravr_id");
			} 
		}
	 	$url = site_url()."customer/api/remoteappVideoClassScheduleList/$ravr_id/$uid";
		$reqData =  apiCall($url, "get");  
		//print_r($reqData);exit;
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];

		$this->template->load("remoteappVideoClassSchedule",$arrayData); 

	}

	/**
	 * Remote Application Video Class Schedule
	 * Deepak Shinde
	   12/4/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */
	public function tokboxLunchVideoRemoteApp($id) {  
		$uid=$this->session->userdata('uid');
		if((int)($id)){ 
		 	$url = site_url()."customer/api/remoteappVideoClassScheduleFetchSingle/$id";
			$response =  apiCall($url, "get");
			if($response['result']){
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");
				}
				else{
					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['id']=$id;	
					//print_r($stringData['id']);exit;
					$url = site_url()."customer/api/remoteappVideoClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					if($response['result']){
						redirect(site_url()."customer/tokboxLunchVideoRemoteApp/$id");
					}
					else{
						echo "error".$response['message'];
					}	
				}
			}else{
				 
			} 
		}
	}

	/**
	 *Remote Application request
		14/8/2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function remoteappVideoEnquiry() {  

		$user_id = $this->session->userdata('uid');		
		$url = site_url()."remoteapplication/api/VideoRequestList/$user_id"; 
		$remoteappVideoRequestList =  apiCall($url, "get"); 	
		//print_r($remoteappVideoRequestList);exit;	
		$arrayData = array("remoteappVideoRequestList"=>$remoteappVideoRequestList['result'] ); 
		$this->template->load("remoteappVideoList",$arrayData);
	}


	/**

	 * Rmote Application Video Class Schedule
	 * Deepak Shinde
	   14/08/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */

	public function remoteappVideoClassScheduleCustomer($ravr_id=0) {  
		$uid=$this->session->userdata('uid');
		 $url = site_url()."customer/api/remoteappVideoClassScheduleListCustomer/$ravr_id/$uid";
		$reqData =  apiCall($url, "get");
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];
		$this->template->load("remoteappVideoClassScheduleCustomer",$arrayData); 
	}



	/***************** Remote Service Video Request Supplier **************/

	public function remoteServiceVideoEnquiryProgrammer() {  

		$user_id = $this->session->userdata('uid');
		$url = site_url()."consultant/api/VideoRequestListProgrammer/$user_id"; 
		$VideoRequestList =  apiCall($url, "get");
		//print_r($VideoRequestList);exit;
		$arrayData = [
			"VideoRequestList"=>$VideoRequestList['result'] 
		]; 
		$this->template->load("remoteServiceVideoEnquiryProgrammer",$arrayData);
	}


	/**

	 *Remote Service Class Schedule
	 *Deepak Shinde
	  14/08/2018
	 *@access public
	 *@param  add Experince
	 *@return array of objects
	 */

	public function remoteServiceVideoClassSchedule($rsvr_id=0) {  
		$uid=$this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$pageData['rsvr_id'] = $rsvr_id;
			$pageData['created_by_user'] = $uid;
			//require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
		//	$objTokbox = new tokbox;
		//	$responseData= $objTokbox->tokenGenration();	
		//	$pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
		//	$pageData['tokbox_token'] = $responseData['tokbox_token'];

			$url = site_url()."customer/api/remoteServiceVideoClassScheduleInsert";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgMachSuccess", $response['message']);
				redirect(site_url()."customer/remoteServiceVideoClassSchedule/$rsvr_id");
			}else{
				setFlash("dataMsgMachError", $response['message']);
				redirect(site_url()."customer/remoteServiceVideoClassSchedule/$rsvr_id");
			} 
		}
	 	$url = site_url()."customer/api/remoteServiceVideoClassScheduleList/$rsvr_id/$uid";
		$reqData =  apiCall($url, "get");  
		//print_r($reqData);exit;
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];

		$this->template->load("remoteServiceVideoClassSchedule",$arrayData); 

	}

	/**
	 * Remote Service Video Class Schedule
	 * Deepak Shinde
	   12/4/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */
	public function tokboxLunchVideoRemoteService($id) {  
		$uid=$this->session->userdata('uid');
		if((int)($id)){ 
		 	$url = site_url()."customer/api/remoteServiceVideoClassScheduleFetchSingle/$id";
			$response =  apiCall($url, "get");
			if($response['result']){
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");
				}
				else{
					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['id']=$id;	
					//print_r($stringData['id']);exit;
					$url = site_url()."customer/api/remoteappVideoClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					if($response['result']){
						redirect(site_url()."customer/tokboxLunchVideoRemoteService/$id");
					}
					else{
						echo "error".$response['message'];
					}	
				}
			}else{
				 
			} 
		}
	}

	/**
	 *Remote service request
		14/8/2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function remoteServiceVideoEnquiry() {  

		$user_id = $this->session->userdata('uid');		
		$url = site_url()."consultant/api/VideoRequestList/$user_id"; 
		$remoteServiceVideoRequestList =  apiCall($url, "get"); 	
		//print_r($remoteServiceVideoRequestList);exit;	
		$arrayData = array("remoteServiceVideoRequestList"=>$remoteServiceVideoRequestList['result'] ); 
		$this->template->load("remoteServiceVideoList",$arrayData);
	}


	/**

	 * Rmote Services Video Class Schedule
	 * Deepak Shinde
	   14/08/2018
	 * @access public
	 * @param  add Experince
	 * @return array of objects
	 */

	public function remoteServiceVideoClassScheduleCustomer($rsvr_id=0) {  
		$uid=$this->session->userdata('uid');
		 $url = site_url()."customer/api/remoteServiceVideoClassScheduleListCustomer/$rsvr_id/$uid";
		$reqData =  apiCall($url, "get");
		$arrayData = [
			"scheduleList"=>$reqData['result'], 
		];
		$this->template->load("remoteappVideoClassScheduleCustomer",$arrayData); 
	}
}