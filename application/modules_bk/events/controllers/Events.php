<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Events extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index() {
		$url = site_url()."events/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 		
		$arrayData = array('category_list' =>$category_list['result'] , );
		$this->template->load("index",$arrayData);
	}
	public function events_list($eid) {
		$url = site_url()."events/api/findMultipleEvent/$eid/front";
		$event_list =  apiCall($url, "get");	
		$arrayData = array('event_list' =>$event_list['result'] ,'eid' =>$eid );
		$this->template->load("events_list",$arrayData);
	}
	public function get_events() {  
		 // Our Start and End Dates
		$start = $this->input->get("start");
		$end = $this->input->get("end");
		$catId = $this->input->get("catId");
		
		if( time() > $start ){
			$start_format = date('Y-m-d');
		}else{
		$startdt = new DateTime('now'); // setup a local datetime
		$startdt->setTimestamp($start); // Set the date based on timestamp
		$start_format = $startdt->format('Y-m-d');
		}
		$enddt = new DateTime('now'); // setup a local datetime
		$enddt->setTimestamp($end); // Set the date based on timestamp
		$end_format = $enddt->format('Y-m-d');

		//$events = $this->calendar_model->getEvents($start_format, $end_format);
		$url = site_url()."events/api/getEvents/$catId/$start_format/$end_format";
		$event_list =  apiCall($url, "get");	
	 
		$data_events = array();

		foreach($event_list['result']  as $r) {

		 $data_events[] = array(
			 "id" => $r['event_id'],
			 "title" => $r['event_name'],
			 "description" => strhtmldecode($r['event_description']),
			 "end" => $r['event_end_date'],
			 "start" => $r['event_start_date'],
			 "event_start_time" => $r['event_start_time'],
			 "event_end_time" => $r['event_end_time'],
			 "event_cat_name" => $r['event_cat_name'],
			 "event_price" => $r['event_price'],
			 "event_user_limit" => $r['event_user_limit'],
			 "event_start_date" => $r['event_start_date'],
			 "event_end_date" => $r['event_end_date']
		 );
		}
		echo json_encode(array("events" => $data_events));
		exit();
	}
	public function eventbooking() {  
		 	if(isset($_POST['btnEventBooking'])){ 
			$pageData = $this->input->post(); 
			//&& $pageData["captcha"] == $this->session->userdata("joinliveevent" )
              		$event_start_date=$pageData['event_start_date'];
                     
			if (!empty($pageData) ){ 
				$userid= $this->session->userdata('uid');
				$pageData['user_id']=$userid;
                                $user_email=$pageData['user_email'];
                                $participant_no=$pageData['participant_no'];
			 	$url = site_url()."/events/api/eventBooking"; 
				$response =  apiCall($url,"post",$pageData);
   
				if($response['result'])
                                {
                                    // print_r($event_start_date);die;
                                    $to = $user_email;
                                    $body = '<p>Hello '.$pageData['user_name'] . ',</p> ';
                                    $body .= '<p>Your payment has been successfully processed for  '.$pageData['event_name'].'</p>';
                                    $body .= '<p>We are very thankful to join our ' . $pageData['user_name'] .'. Event details are as follows</p>';
                //                   $body .= '<p>Click  <a href= "http://test.orendaventures.com/" alt="Here">Here</a> to sign up to Stelmac.io platform with below details – </p>';
                                    $body .= 'Event Name: '.$pageData['event_name'] .'<br/>';
                                    $body .= 'Event Start Date: '.$event_start_date .'<br/>';
                                    $body .= 'Event Start Time: '.$pageData['event_start_time'].'<br/>';
                                    $body .= 'Event End Time: '.$pageData['event_end_time'].'<br/><br/>';
                                     if($participant_no>1)
                                     {
                                        $body .= 'Attendees to invite:'  .$participant_no.'<br/>';
                                     }
                                    
                                    $body .= 'If you have difficulty to look event, do contact us at support@stelmac.io.:<br/><br/>';
                                    $body .= 'We look forward to seeing you on :  '. $event_start_date .'<br/>';
                                    $body .= 'Thank you,<br/>';
                                    $body .=  SUPPORT_TEAM_NAME . '<br/>';
                                    $body .=  SUPPORT_MAIL;
                                    $email_content = $body;
                                   // print_r($email_content);exit;
                                    $this->load->library('Email_PHPMailer');
                                    $subject = 'Thank you for joining  '.$pageData['event_name'].', your assistant for join event needs';
                                    $mailresponse = email_Send($subject, $to, $email_content, $name);  

                                    
					 
					$pageData['surl']=site_url()."payment/success/eventBooking/".$response['result'];
					$pageData['furl']=site_url()."payment/fail/eventBooking/".$response['result'];
					$pageData['firstname']=$pageData['user_name']; 
					$pageData['productinfo']=$pageData['event_name']; 
					$pageData['phone']=$pageData['phone_no']; 
					$pageData['email']=$pageData['user_email']; 
					$pageData['amount']=$pageData['totalPrice']; 
					$pageData['corseEnroll']="eventBooking";
					 
					$this->session->set_flashdata('payuData',$pageData);
                                         $transaction_type=6;
                                         //echo $data;die;
                                         $this->user_log($transaction_type);
					redirect('payment/index');
				}
				else{
				 	setFlash("eventErrorMsg", $response['message']);
					redirect("events/events_list/$eid");
				}
			}
			else{
					setFlash("ErrorMsg", "Captcha Code enter wrong");
			}		
		}
		//redirect('eAcademy/course_details/4');
	}
	public function join_event() {  
		$arrayData = [];
		$this->template->load("join_event",$arrayData);
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
}

?>
