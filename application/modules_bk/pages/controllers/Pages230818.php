<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model('User_Model');
        $this->load->model("pages_model");
    }
	public function index(){ 
		$arrData=array( 
		); 
		$this->template->load("index",$arrData);
	}
	public function signIn(){
		if($this->session->userdata('uid')!=''){
			 redirect(site_url()."customer/profile/");exit;
		}
		if(isset($_POST['otp_no'])){ 
				$pageData = $this->input->post(); 
				
				//print_r($pageData);exit;
			if (!empty($pageData) && $pageData["captcha"] == $this->session->userdata("captcha_SignUp" )){ 
				$user_verify_code= random_string('unique');
				$emailId =$pageData['s_email'];
				$pageData['user_verify_code'] = $user_verify_code;
			 	$url = site_url()."/pages/api/insertSignUpForm"; 
				$response =  apiCall($url,"post",$pageData);
				 
				if($response['result']){ 
					$user_verify_code = $pageData['user_verify_code'];
					$link= site_url()."pages/verify".'/'.$emailId.'/'.$user_verify_code;
					
			    $to = $emailId;
				$body = '<p>Hi, </p> '; 
				$body.="<p>Please click this link to activate your account:</p>";
				$body.= '<a href= "'.addhttp($link).'" alt="click Here">click Here</a>';
				$email_content = $body;  
				$this->load->library('Email_PHPMailer');
				$subject = 'Registration Verification: Continuous Imapression :';
				$mailresponse = email_Send($subject,$to,$email_content,$name);
					

				 	 setFlash("dataMsgSuccessSign", "Thank You! Please check your email to activate your Account");
				}
				else{
				 	setFlash("ErrorMsg", $response['message']);
				}	
			}			
			else{
					setFlash("ErrorMsg", "Please enter correct captcha code..!!");
				}			
		}
		$otp_no= rand(100000, 999999);
		
		$arrData=array( 
		 "otp_no" => $otp_no,
		); ?>
		
		<?php $this->template->load("sign_in",$arrData);
	}
///forgot password
	public function forgotPassword() {
		if(isset($_POST['resetSubmit'])){ 
				$pageData = $this->input->post();  
				$emailId =$pageData['r_email'];
				$r_password =rand();
				$pageData['r_password'] =$r_password;
			 
			 	$url = site_url()."/pages/api/forgotPassword"; 
				$response =  apiCall($url,"post",$pageData);
			
				if($response['result']){ 
					$user_verify_code = $pageData['user_verify_code'];
					  
					$to = $pageData['r_email'];
					$body ='<p>Hi, </p> '; 
					$body.='<p>Please click this link to activate your account:</p>';
					$body.='<p>New Password : '.$pageData['r_password'].'</p>'; 
					 $email_content = $body;  
					$this->load->library('Email_PHPMailer');
					$subject = 'New password ';
					$mailresponse = email_Send($subject,$to,$email_content,$name); 

					/*$to = 'mangave1008@gmail.com';
					$body = '<p>Hi, </p> '; 
					$body.="<p> Thank You,</p> <br/>";
					$email_content = $body;  
					$this->load->library('Email_PHPMailer');
					$subject = 'New contact inquiry:';
					echo $mailresponse = email_Send($subject,$to,$email_content,$name);*/
						 setFlash("dataMsgSuccessSign", "Password Changed Successfully..!!Please Check Email..!!");
						  redirect(site_url()."pages/signIn");	
				}
				else{
				 	setFlash("ErrorMsg", "Something Went Wrong Please Try Again..!!");
				 	redirect(site_url()."pages/signIn");	
				}	
			 	
		}
	}
	public function verify($emailId, $user_verify_code) {
		if($this->pages_model->update_user($emailId, $user_verify_code)){
	 
		$this->template->load("sign_in");
	 
		}
	}
	public function login(){
		if(isset($_POST['btnLogin'])){ 
				$pageData = $this->input->post(); 
			if (!empty($pageData)  ){ 
			
			 	$url = site_url()."/pages/api/checkLogin"; 
				$response =  apiCall($url,"post",$pageData); 
				 //print_r($response);exit;
				if($response['result']){
				 	setFlash("dataMsgSuccessSign", "Login Success"); 
					$session= array("uid" =>  $response['result']['uid']); 
					$session["user_email"] = $response['result']['u_email']; 
					$session["user_type"] = $response['result']['u_user_type'];  
					$session["u_name"] = $response['result']['u_name'];  
				/* 	$session["kicked"] = $response['result']['kicked'];  
					$session["warning_text"] = $response['result']['warning_text'];  
					$session["banned"] = $response['result']['banned'];  
					$session["active"] = $response['result']['active'];  
					$session["last_msg"] = $response['result']['last_msg'];  
					$session["user_room"] = $response['result']['user_room'];  
					$session["readyChatUser"] = $response['result']['u_name'];  
					$session["warned"] = $response['result']['warned'];  */ 
					$session["reset"] = "";  
					$this->session->set_userdata($session);
					 
					 redirect(site_url()."customer/profile/");	
				}
				else{
				 	setFlash("ErrorLoginMsg", $response['message']);
				}	
			}			
			else{
					setFlash("ErrorLoginMsg", "Please Enter correct Email and password");
				}			
		}
		 
		$this->template->load("sign_in" );
	}
	public function send_otp(){
		$data = $this->input->post();  
		sms_send($data['mobile_no']," One Time Password for sign up in Teranex {$data['otp_no']}. This can used only once, Thank you.");  
		echo '1';
	}	
	
	// logout method to exit from system
	public function logout()
	{
		$session= array( "uid" , "user_email", "user_type");
		$this->session->unset_userdata($session);
		$this->session->sess_destroy(); 
		
		$uid=$this->session->userdata('uid');
		$updata['active']= 0;
		$emailExit = $this->db_lib->update("master_user",$updata,"uid='$uid'  " ); 
		 
		// redirect to login method
		redirect("pages/signIn");
	}

	

	public function about()
	{	 
		$aboutUrl = site_url()."/pages/api/findSingle/1";
		$aboutList = apiCall($aboutUrl, "get");

		$arrayData = array(
			"aboutList"=>$aboutList['result']
		);
		
		$this->template->load("about",$arrayData);
	}
	public function contact()
	{	 	
			$pageData = $this->input->post();
			if(isset($_POST['btnSubmit'])){
				if (!empty($pageData) && $pageData["captcha"] == $this->session->userdata("captcha_contactUs")){ 
				$pageData = $this->input->post();  
				$url = site_url()."pages/api/contactInsert/";
				$response =  apiCall($url,"post",$pageData); 
			//	print_r($response);exit;
				 
				if($response['result']){ 
					
					

				 	 setFlash("dataMsgSuccessSign","Thank You..! Form has been submitted successfully..!");
				}
				else{
				 	setFlash("ErrorMsg", $response['message']);
				}	
			}			
			else{
					setFlash("ErrorMsg", "Please Enter Correct Captcha Code..!!");
				}
		/* Contact Us Data */
		
		
			if($response['result']){
				setFlash("dataMsgEnquirySuccess","Contact Us form has been saved successfully"); 
				redirect("pages/contact");
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
				redirect("pages/contact");
			}
		}
		$this->template->load("contact" );
	}
	public function teranex_team()
	{	 
		// redirect to team

		$url = site_url()."pages/api/findMultipleTeam/";
        $team_list =  apiCall($url, "get"); 
        //print_r($team_list);exit;
        $url = site_url()."pages/api/findMultipleAdvisoryboardTeam/";
        $team_advisory_list =  apiCall($url, "get"); 
		//print_r($team_advisory_list);exit;
		
		
        $arrayData = array(
				'team_list' =>$team_list['result'],
				'team_advisory_list' =>$team_advisory_list['result']
			);
		$this->template->load("team",$arrayData);
	}
	public function teranex_faq()
	{	 
		// redirect to team

		$url = site_url()."pages/api/findMultipleFaq/";
        $faq_list =  apiCall($url, "get"); 
        //print_r($team_list);exit;
    
		
        $arrayData = array(
				'faq_list' =>$faq_list['result'],
			);
		$this->template->load("faq",$arrayData);
	}

	public function allcategories()
	{	 
		// redirect to team

		$url = site_url()."pages/api/findMultipleAllcategorie/";
        $allcategories_list =  apiCall($url, "get"); 
        //print_r($allcategories_list);exit;
    	$url = site_url()."pages/api/findMultipleSubCategorie/";
    	$allsubcategories_list =  apiCall($url, "get"); 
		//print_r($allsubcategories_list);exit;
        $arrayData = array(
				'allcategories_list' =>$allcategories_list['result'],
				'allsubcategories_list' =>$allsubcategories_list['result'],
			);
		$this->template->load("allcategories",$arrayData);
	}

	public function teranex_rfq()
	{	 
		// redirect to team
		if(isset($_POST['btnRfq'])){
			$pageData = $this->input->post();  
			$url = site_url()."pages/api/rfqInsert/";
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("pages/teranex_rfq");
		}

		$this->template->load("rfq");
	}

	public function suppliermembership()
	{	 
		// redirect to team
		//print_r("expression");exit;
		if(isset($_POST['btnSupplierMembership'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit; 
			$url = site_url()."pages/api/SupplierMembership/";
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("pages/suppliermembership");
		}

		// redirect to suppliers
		$this->template->load("suppliermembership");
	}
	public function serviceproviders()
	{	 

		if(isset($_POST['btnServiceProvider'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit; 
			$url = site_url()."pages/api/ServiceProviders/";
			$response =  apiCall($url, "post",$pageData); 
		 //	print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}


			redirect("pages/serviceproviders");
		}
		// redirect to serviceproviders
		$this->template->load("serviceproviders" );
	}
	public function returnscancellations()
	{	 
		$refundURL = site_url()."/pages/api/findSingle/2";
		$refundList = apiCall($refundURL, "get");

		$arrayData = array(
			"refundList"=>$refundList['result']
		);
		$this->template->load("returns-cancellations",$arrayData);
	}
	public function termsconditions()
	{	 
		// redirect to termsconditions
		$this->template->load("terms-conditions" );
	}
	public function termsuse()
	{	
		$termsuseURL = site_url()."/pages/api/findSingle/8";
		$termsuseList = apiCall($termsuseURL, "get");

		$arrayData = array(
			"termsuseList"=>$termsuseList['result']
		);
		// redirect to termsuse
		$this->template->load("terms-use",$arrayData);
	}
	public function disclaimer()
	{	
		$disclaimerURL = site_url()."/pages/api/findSingle/8";
		$disclaimerList = apiCall($disclaimerURL, "get");

		$arrayData = array(
			"disclaimerList"=>$disclaimerList['result']
		);
		// redirect to termsuse
		$this->template->load("disclaimer",$arrayData );
	}
	public function privacystatement()
	{	 
		$privacyStatementURL = site_url()."/pages/api/findSingle/3";
		$privacyStatementList = apiCall($privacyStatementURL, "get");
		$arrayData = [
			"privacyStatementList"=>$privacyStatementList['result']
		];
		$this->template->load("privacy-statement",$arrayData);
	}
	public function market_place()
	{	 
		// redirect to termsuse
		$this->template->load("market_place" );
	}
	public function trainers()
	{	 
		// redirect to termsuse
		$this->template->load("trainers" );
	}
	public function trainings()
	{	 
		// redirect to termsuse
		$this->template->load("trainings" );
	}
	public function commingsoon()
	{	 
		// redirect to termsuse
		$this->template->load("coming_soon" );
	}
	
	/* public function ajaxLogin(){
		 
			$pageData = $this->input->post(); 
			if (!empty($pageData)  ){ 
			
				$pageDataNew['u_email']=$pageData['user_email'];
				$pageDataNew['u_password']=$pageData['user_password'];
			 	$url = site_url()."/pages/api/checkLogin"; 
				$response =  apiCall($url,"post",$pageDataNew); 
			 
				if((int)$response['result']['uid']){
				 	setFlash("dataMsgSuccessSign", "Login Success"); 
					$session= array("uid" =>  $response['result']['uid']); 
					$session["user_email"] = $response['result']['u_email']; 
					$session["user_type"] = $response['result']['u_user_type'];  
					$session["u_name"] = $response['result']['u_name'];   
					$this->session->set_userdata($session);
					 
					$arrayData=array("success"=>'success',"response"=>$response);
					echo json_encode($arrayData);
				}
				else{
					$arrayData=array("fail"=>'fail');
					echo json_encode($arrayData);
				 	 ,
			}			
			else{
					$arrayData=array("fail"=>'No data found');
					echo json_encode($arrayData); 
				}			
		 
	}
	 */
	 
	 public function ajaxLogin(){
		 
			$pageData = $this->input->post(); 

		if (!empty($pageData)  ){ 
				
				$pageDataNew['u_email']=$pageData['user_email'];
				$pageDataNew['u_password']=$pageData['user_password'];
			 	$url = site_url()."/pages/api/checkLogin"; 
				$response =  apiCall($url,"post",$pageDataNew); 
			// print_r($response);exit;
				if((int)$response['result']['uid']){
				 	setFlash("dataMsgSuccessSign", "Login Success"); 
					$session= array("uid" =>  $response['result']['uid']); 
					$session["user_email"] = $response['result']['u_email']; 
					$session["user_type"] = $response['result']['u_user_type'];  
					$session["u_name"] = $response['result']['u_name'];   
					$this->session->set_userdata($session);
					/* JWT  */
					if ($this->User_Model->checkUser($pageDataNew['u_email'],$pageDataNew['u_password'])) {
						if(!ID_LOGIN){
							$token = $this->User_Model->getToken($pageDataNew['u_email']);
							$type="token";	
						}else{
							$token=$this->User_Model->getTokenRAWData($pageDataNew['u_email']);
							$type="raw";
						}
						
						/* $response = array(
											"status" => array(
																"code" => REST_Controller::HTTP_OK,
																"message" => "Success"
															),
											"response" => $token,"type"=>$type
									);
						 */			
						//$this->response($response, REST_Controller::HTTP_OK);
                        
					}	
					 /* JWT  */
					$arrayData=array(
										"success"=>'success',
										"response"=>$response,
										"status" => array(	
															"code" => REST_Controller::HTTP_OK,
															"message" => "Success"
														),
										"token" => $token,
										"type"=>$type
									);
					echo json_encode($arrayData);
					
				}else{
					$arrayData=array("fail"=>'fail');
					echo json_encode($arrayData);
				 	 
				}	
			}else{
					$arrayData=array("fail"=>'No data found');
					echo json_encode($arrayData); 
			}			
		 
	}
	
	 
	 
	public function digital_manufacturing()
	{	 
		// redirect to termsuse
		$this->template->load("digital_manufacturing" );
	}
	public function digital_manufacturingRFQ()
	{	 
		// redirect to termsuse
		$this->template->load("digital_manufacturingRFQ" );
	}
	public function ajaxLoginFront(){
		$pageData = $this->input->post(); 
		if (!empty($pageData)  ){ 
				$pageDataNew['u_email']=$pageData['u_email'];
				$pageDataNew['u_password']=$pageData['u_password'];
				
			 	$url = site_url()."/pages/api/checkLogin"; 
				$response =  apiCall($url,"post",$pageDataNew); 
				
					
				if((int)$response['result']['uid']){
				 	setFlash("dataMsgSuccessSign", "Login Success"); 
					$session= array("uid" =>  $response['result']['uid']); 
					$session["user_email"] = $response['result']['u_email']; 
					$session["user_type"] = $response['result']['u_user_type'];  
					$session["u_name"] = $response['result']['u_name']; 

					$this->session->set_userdata($session);
					/* JWT  */
					if ($this->User_Model->checkUser($pageDataNew['u_email'],$pageDataNew['u_password'])) {
						if(!ID_LOGIN){
							$token = $this->User_Model->getToken($pageDataNew['u_email']);
							$type="token";	
						}else{
							$token=$this->User_Model->getTokenRAWData($pageDataNew['u_email']);
							$type="raw";
						}
					}	
					 /* JWT  */
					$arrayData=array(
										"success"=>'success',
										"response"=>$response,
										"status" => array(	
															"code" => REST_Controller::HTTP_OK,
															"message" => "Success"
														),
										"token" => $token,
										"type"=>$type
									);
					echo json_encode($arrayData);
					
				}else{
					$arrayData=array("fail"=>'fail');
					echo json_encode($arrayData);
				 	 
				}	
			}else{
					$arrayData=array("fail"=>'No data found');
					echo json_encode($arrayData); 
			}			
	}
	public function feedback()
	{	 
		// redirect to termsuse
		$this->template->load("feedback" );
	}

	public function getPaidForYourFeedback()
	{	 
		$pageData = $this->input->post();
		if(!empty($pageData)){
		
			$pageData = $this->input->post();  
			//$checkBox = implode(',', $_POST['Days']);
			// implode(',',$_POST['cust_option']);
			//$interested_category =implode(',',$pageData['interested_category']);
			//print_r($interested_category);exit;
			//$pageData['interested_category'] =$interested_category;
			$url = site_url()."pages/api/PaidForYourFeedback/";
			$response =  apiCall($url,"post",$pageData); 
		    //print_r($response);exit;
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("pages/getPaidForYourFeedback");
		}
		// redirect to termsuse
		$this->template->load("getPaidForYourFeedback" );
	}
	

}