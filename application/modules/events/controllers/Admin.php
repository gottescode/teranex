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
	 	$url = site_url()."events/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."events/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			$url = site_url()."events/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."events/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."events/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."events/admin/");			
		}
		$url = site_url()."/events/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/events/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."events/admin/");		
	} 
	
	/* Event Add / Insert / Update */
	public function eventList($eid) {

		$url = site_url()."events/api/findMultipleEvent/$eid";
		$event_list =  apiCall($url, "get"); 
		/* Front END API */
			//$community_id = 2;
			//$url = site_url()."events/api/findMultipleEventByCommunityID/$community_id";
			//$event_list_by_community_id =  apiCall($url, "get"); 
		/* Front END API */
		
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."events/api/updatePublishEvent";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('event_list' =>$event_list['result'] ,'eid' =>$eid );
		//print_r($arrData);exit;
		$this->template->load("admin/event/list",$arrData);
	}
	public function createEvent($eid) {  
			$url = site_url()."events/api/findMultiplecommunityList"; 
			$communityList =  apiCall($url, "get");
			
			
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
                        
			$eid = $pageData['event_cat_id']; 
			$event_start_date = $pageData['event_start_date']; 
                        $newDate = date("Y-m-d", strtotime($event_start_date));
                        $pageData['event_start_date']=$newDate;
                        //print_r($pageData);die;
			$organizer_email = $pageData['organizer_name']; 
			$url = site_url()."events/api/createEvent"; 
			$response =  apiCall($url, "post",$pageData);
                        //print_r($response);die;
//Community List


						if($response){
                            
                            
                    $to = $organizer_email;
                    $body = '<p>Hello  ' . $pageData['organizer_name'] . ',</p> ';
                    $body .= '<p>We are organizing an event for you. Please look into details as follows:</p>';
//                   $body .= '<p>Click  <a href= "http://test.orendaventures.com/" alt="Here">Here</a> to sign up to Stelmac.io platform with below details – </p>';
                    $body .= 'Event Name:' . $pageData['event_name'] .'<br/>';
                    $body .= 'Event Start Date:' . $event_start_date .'<br/>';
                    $body .= 'Event Start Time:' .  $pageData['event_start_time'].'<br/>';
                    $body .= 'Event Price:' . $pageData['event_price'].'<br/>';
                    $body .= 'If you have difficulty to look event, do contact us at support@stelmac.io.:<br/><br/>';
                    $body .= 'Thank you,<br/>';
                    $body .=  SUPPORT_TEAM_NAME . '<br/>';
                    $body .=  SUPPORT_MAIL;
                    $email_content = $body;
                   // print_r($email_content);exit;
                    $this->load->library('Email_PHPMailer');
                    $subject =   $pageData['event_name'] .'&nbsp;is organize';
                    $mailresponse = email_Send($subject, $to, $email_content, $name);
                            
                            
                            
                            
                            
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."events/admin/eventList/$eid");	
			} 	
		}  
                
                 $assingUrl = site_url() . "events/api/findMultipleOrganier";
                 $oragnizerList = apiCall($assingUrl, "get");
                 
                
		$arrData = array(
                    'event_cat_id' =>$eid,
                    'communityList' =>$communityList['result'],
                    'oragnizerList' =>$oragnizerList['result']
                        );
                //print_r($oragnizerList);die;

		$this->template->load("admin/event/create",$arrData);
	}
	public function updateEvent($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$eid = $pageData['event_cat_id']; 
                        $event_start_date = $pageData['event_start_date']; 
                        $newDate = date("Y-m-d", strtotime($event_start_date));
                        $pageData['event_start_date']=$newDate;
                        //print_r($pageData);die;
			$organizer_email = $pageData['organizer_name']; 
	
			$url = site_url()."events/api/updateEvent";
			$response =  apiCall($url, "post",$pageData);
                      //  print_r($response);die;
			if($response)
                        {
                            $to = $organizer_email;
                            $body = '<p>Hello  ' . $pageData['organizer_name'] . ',</p> ';
                            $body .= '<p>We are organizing an event for you. Please look into details as follows:</p>';
        //                   $body .= '<p>Click  <a href= "http://test.orendaventures.com/" alt="Here">Here</a> to sign up to Stelmac.io platform with below details – </p>';
                            $body .= 'Event Name:' . $pageData['event_name'] .'<br/>';
                            $body .= 'Event Start Date:' .$event_start_date.'<br/>';
                            $body .= 'Event Start Time:' .  $pageData['event_start_time'].'<br/>';
                            $body .= 'Event Price:' . $pageData['event_price'].'<br/>';

                            $body .= 'If you have difficulty to look event, do contact us at support@stelmac.io.:<br/><br/>';
                            $body .= 'Thank you,<br/>';
                            $body .=  SUPPORT_TEAM_NAME . '<br/>';
                            $body .=  SUPPORT_MAIL;
                            $email_content = $body;
                           // print_r($email_content);exit;
                            $this->load->library('Email_PHPMailer');
                            $subject =   $pageData['event_name'] .'is organize';
                            $mailresponse = email_Send($subject, $to, $email_content, $name);  

				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."events/admin/eventList/$eid");			
                        }
                        $url = site_url()."/events/api/findSingleEvent/$id";
                        $event_data =  apiCall($url, "get"); 
                        $assingUrl = site_url() . "events/api/findMultipleOrganier";
                         $oragnizerList = apiCall($assingUrl, "get");

                        $arrayData = [
                                "event_data"=>$event_data['result'], 
                                "event_cat_id"=>$event_data['result']['event_cat_id'], 
                                "oragnizerList"=>$oragnizerList['result'], 
                                ];
			//print_r($arrData);exit;
		$this->template->load("admin/event/update",$arrayData);
	}
	public function deleteEvent($eid,$id) {  
		$url = site_url()."/events/api/deleteEvent/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."events/admin/eventList/$eid");		
	}  
}

?>
