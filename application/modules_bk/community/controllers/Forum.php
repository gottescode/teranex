<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forum class.
 * 
 * @extends CI_Controller
 */
class Forum extends FRONTEND_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		//$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('forum_model');
		$this->load->model('user_model');
		$this->load->library('session');
		
		//$this->output->enable_profiler(TRUE);
		
	}
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @param mixed $slug (default: false)
	 * @return void
	 */
	public function index($slug = false) {

				$to = 'mangave1008@gmail.com';
		        $community_invite_code =random_string('unique');
				$body = '<p>Hi, </p> '; 
				$body.="<p>Please click this link to activate your account: <a href='test.html'>Link</a></p> <br/>";
				$email_content = $body;  
				$this->load->library('Email_PHPMailer');
				$subject = 'Registration Verification: Continuous Imapression :';
				//echo $mailresponse = email_Send($subject,$to,$email_content,$name);

			if ($slug === false) {
			
			// create objects
			$forums = $this->forum_model->get_forums();
			//print_r($forums);exit;
			foreach ($forums as $forum) {
				
				$forum->permalink    = base_url($forum->slug);
				$forum->topics       = $this->forum_model->get_forum_topics($forum->id);
				$forum->count_topics = count($forum->topics);
				$forum->count_posts  = $this->forum_model->count_forum_posts($forum->id);
				//$forum->count_posts  = $this->forum_model->count_forum_posts($forum->id);
				$forum->topic->title = $this->forum_model->get_forum_topics_title($forum->id);
				if ($forum->count_topics > 0) {
					
					// $forum has topics
					$forum->latest_topic            = $this->forum_model->get_forum_latest_topic($forum->id);
					$forum->latest_topic->permalink = $forum->slug . '/' . $forum->latest_topic->slug;
					$forum->latest_topic->author    = $this->user_model->get_username_from_uid($forum->latest_topic->uid);
					
				} else {
					
					// $forum doesn't have topics yet
					$forum->latest_topic = new stdClass();
					$forum->latest_topic->permalink = null;
					$forum->topic->title = null;
					$forum->latest_topic->title = null;
					$forum->latest_topic->author = null;
					$forum->latest_topic->created_at = null;
					
				}
	
			}
			$communityListId=array();
			if($_SESSION['uid']){

				$postData['user_email'] = $_SESSION['user_email'];
				
				$url = site_url()."community/api/getCommunityJoinListForUser";
				$response =  apiCall($url, "POST",$postData);
				
				$communityListFromUser=$response['result'];
				
				if($communityListFromUser){
					$communityList=array();
					foreach($communityListFromUser as $rowCom){
						array_push($communityList,$rowCom['community_id']);
					}
				}
			
			}

			// assign created objects to the data object
			$data->forums     = $forums;
			//print_r($data->forums);exit;
			$data->breadcrumb = $breadcrumb;
			$data->communityListId = $communityList;

			// load views and send data
			//$this->load->view('header');
			//$this->load->view('forum/index', $data);
			$this->template->load("community/forum/index",$data);
			//$this->load->view('footer');
			
		} else {
			
			// get id from slug
		 	$forum_id = $this->forum_model->get_forum_id_from_forum_slug($slug);
			
   			$query = $this->forum_model->getuserList($forum_id);
			//print_r($query);exit;
// create objects
			$forum    = $this->forum_model->get_forum($forum_id);
			// print_r($forum);exit;
			$moderator_image    = $this->forum_model->get_moderator_image($forum_id);
			$moderator_detail   = $this->forum_model->get_communityModerator($forum_id);
		    // print_r($moderator_details);exit;
			$topics   = $this->forum_model->get_forum_topics($forum_id);
			
			foreach ($topics as $topic) {
				
				$topic->author                  = $this->user_model->get_username_from_uid($topic->uid);
				$topic->permalink               = $slug . '/' . $topic->slug;
				$topic->posts                   = $this->forum_model->get_posts($topic->id);
				$topic->count_posts             = count($topic->posts);
				$topic->latest_post             = $this->forum_model->get_topic_latest_post($topic->id);
				$topic->latest_post->author     = $this->user_model->get_username_from_uid($topic->latest_post->uid);
				
			}

			// assign created objects to the data object
			$data->community_id  = $forum_id;
  			$data->userList      = $null;
  			if($query){
   			$data->userList  =  $query;
  			}
  			$data->moderator_details      = $null;
  			if($moderator_detail){
   			$data->moderator_details  =  $moderator_detail;
  			}
  			
			$data->forum      = $forum;
			//print_r($data->forum);exit;
			$data->forum_id      = $forum_id;
			$data->moderator_image = $moderator_image;
			$data->topics     = $topics;
			$data->breadcrumb = $breadcrumb;
			
			
			//print_r($data->forum_id);exit;
			
			// load views and send data
			$this->template->load("community/forum/single",$data);
			
		}
			//	exit;
		// create the data object
		$data = new stdClass();

		/* if ($slug === false) {
			
			// create objects
			$forums = $this->forum_model->get_forums();
			
			foreach ($forums as $forum) {
				
				$forum->permalink    = base_url($forum->slug);
				$forum->topics       = $this->forum_model->get_forum_topics($forum->id);
				$forum->count_topics = count($forum->topics);
				$forum->count_posts  = $this->forum_model->count_forum_posts($forum->id);
				//$forum->count_posts  = $this->forum_model->count_forum_posts($forum->id);
				$forum->topic->title = $this->forum_model->get_forum_topics_title($forum->id);
				if ($forum->count_topics > 0) {
					
					// $forum has topics
					$forum->latest_topic            = $this->forum_model->get_forum_latest_topic($forum->id);
					$forum->latest_topic->permalink = $forum->slug . '/' . $forum->latest_topic->slug;
					$forum->latest_topic->author    = $this->user_model->get_username_from_uid($forum->latest_topic->uid);
					
				} else {
					
					// $forum doesn't have topics yet
					$forum->latest_topic = new stdClass();
					$forum->latest_topic->permalink = null;
					$forum->topic->title = null;
					$forum->latest_topic->title = null;
					$forum->latest_topic->author = null;
					$forum->latest_topic->created_at = null;
					
				}
	
			}
			$communityListId=array();
			if($_SESSION['uid']){
				$postData['user_email'] = $_SESSION['user_email'];
				$url = site_url()."community/api/getCommunityJoinListForUser";
				$response =  apiCall($url, "POST",$postData);
				$communityListFromUser=$response['result'];
				if($communityListFromUser){
						$communityList=array();
					foreach($communityListFromUser as $rowCom){
						array_push($communityList,$rowCom['community_id']);
					}

				}
			}
			// assign created objects to the data object
			$data->forums     = $forums;
			$data->breadcrumb = $breadcrumb;
			$data->communityListId = $communityList;

			// load views and send data
			//$this->load->view('header');
			//$this->load->view('forum/index', $data);
			$this->template->load("community/forum/index",$data);
			//$this->load->view('footer');
			
		} else {
			
			// get id from slug
			$forum_id = $this->forum_model->get_forum_id_from_forum_slug($slug);
   			$query = $this->forum_model->getuserList($forum_id);
			// create objects
			$forum    = $this->forum_model->get_forum($forum_id);
			$moderator_image    = $this->forum_model->get_moderator_image($forum_id);
		
			$topics   = $this->forum_model->get_forum_topics($forum_id);
			
			foreach ($topics as $topic) {
				
				$topic->author                  = $this->user_model->get_username_from_uid($topic->uid);
				$topic->permalink               = $slug . '/' . $topic->slug;
				$topic->posts                   = $this->forum_model->get_posts($topic->id);
				$topic->count_posts             = count($topic->posts);
				$topic->latest_post             = $this->forum_model->get_topic_latest_post($topic->id);
				$topic->latest_post->author     = $this->user_model->get_username_from_uid($topic->latest_post->uid);
				
			}

			// assign created objects to the data object
			$data->community_id  = $forum_id;
  			$data->userList      = $null;
  			if($query){
   			$data->userList  =  $query;
  			}
  			
			$data->forum      = $forum;
			$data->moderator_image = $moderator_image;
			$data->topics     = $topics;
			$data->breadcrumb = $breadcrumb;
			
			// load views and send data
			$this->template->load("community/forum/single",$data);
			
		}
		 *//*else {
			
			// get id from slug
			$post_id = $this->forum_model->get_post_id_from_post_slug($slug);
			
			// create objects
			$forum    = $this->forum_model->get_forum($forum_id);
			$topics   = $this->forum_model->get_forum_topics($forum_id);
			$posts   = $this->forum_model->get_posts_reply($post_id);
			foreach ($posts as $post) {
				
				$post->author                  = $this->user_model->get_username_from_uid($post->uid);
				$post->permalink               = $slug . '/' . $post->slug;
				$post->posts                   = $this->forum_model->get_posts($post->id);
				$post->count_posts             = count($post->posts);
				$post->latest_post             = $this->forum_model->get_topic_latest_post($post->id);
				$post->latest_post->author     = $this->user_model->get_username_from_uid($post->latest_post->uid);
				
			}

			// assign created objects to the data object
			$data->forum      = $forum;
			$data->topics     = $topics;
			$data->posts     = $posts;
			$data->breadcrumb = $breadcrumb;
			
			// load views and send data
			$this->template->load("community/topic_/single",$data);
			
		}*/
		
	}	

	/**
	 * create function.
	 * 
	 * @access public
	 * @return void
	 */
	public function create_forum() {
		
		// create the data object
		$data = new stdClass();
		
	
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('title', 'Forum Title', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[255]|is_unique[forums.title]', array('is_unique' => 'The forum title you entered already exists. Please choose another forum title.'));
		$this->form_validation->set_rules('description', 'Description', 'trim|alpha_numeric_spaces|max_length[80]');
		
		if ($this->form_validation->run() === false) {
			
			// keep what the user has entered previously on fields
			$data->title       = $this->input->post('title');
			$data->description = $this->input->post('description');
			
			// validation not ok, send validation errors to the view
			
			$this->template->load('admin/create', $data);
	
			
		} else {
			
			// set variables from the form
			$title       = $this->input->post('title');
			$description = $this->input->post('description');
			
			if ($this->forum_model->create_forum($title, $description)) {
				
				// forum creation ok
				
				$this->template->load('admin/list', $data);
		
				
			} else {
				
				// forum creation failed, this should never happen
				$data->error = 'There was a problem creating the new forum. Please try again.';
				
				// send error to the view
				
				$this->template->load('admin/create', $data);
				
				
			}
			
		}
		
	}
	
	

	
	/**
	 * topic function.
	 * 
	 * @access public
	 * @param string $forum_slug
	 * @param string $topic_slug
	 * @return void
	 */
		public function topic($forum_slug, $topic_slug) {
	
//	echo 'hi';die;
		// create the data object
		$data = new stdClass();
			
		// get ids from slugs
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
          //print_r($pageData);die;
			$pageData['uid'] = $this->session->userdata('uid');
			
			$post_comment=$pageData['post_comment'];
			$post_answer=$pageData['post_answer'];
			$body=$pageData['content'];

			//print_r($pageData);die;
			$url = site_url()."community/api/createAttachment";
			$response =  apiCall($url,"POST",$pageData);
			//print_R($response);die;
		//print_r($pageData);exit;
		//echo "Here is form data"; exit;
	}
	
//		exit;
		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$forum = $this->forum_model->get_forum($forum_id);
		$moderator_image    = $this->forum_model->get_moderator_image($forum_id);

		$moderator_detail_single   = $this->forum_model->get_communityModerator($forum_id);
//print_r($moderator_detail_single);exit;
   		$query = $this->forum_model->getuserList($forum_id);
   		//print_r($query);exit;
		$topic_id = $this->forum_model->get_topic_id_from_topic_slug($topic_slug);
		
		// create objects
		$forum = $this->forum_model->get_forum($forum_id);
		$topic = $this->forum_model->get_topic($topic_id);
		$posts = $this->forum_model->get_posts($topic_id);
		//Post Lists By Topics
		$url = site_url()."community/api/findmultiplePostByTopics/{$topic_id}";
		$commentList = apiCall($url,"get");
		$comments = $commentList['result'];
	
		//exit;
		// assign created objects to the data object
		/* $data->forum      = $forum;
		$data->topic      = $topic;
		$data->posts      = $posts;
		$data->breadcrumb = $breadcrumb;
		 */
		//$arrayData->moderator_detail_single      = $moderator_detail_single;
  			/*if($moderator_detail){
   			$arrayData->moderator_details  =  $moderator_detail;
  			}
*/
$data=$this->forum_model->selectAllwhr('master_user','uid',$pageData['uid']);

//print_r($data);die;
/*   call push notification function*/
$fcm_id=array();

if($post_comment!="")
{
$this->sendPushNotification($fcm_id,$post_comment,$body);
}

if($post_answer!="")
{
$this->sendPushNotification($fcm_id,$post_answer,$body);
}
		$arrayData=[
			"comments"=>$comments,
			"query"=>$query,
			"forum"=>$forum,
			"moderator_image"=>$moderator_image,
			"topic"=>$topic,
			"moderator_detail_single"=>$moderator_detail_single
		];
		// load views and send data
		//$this->load->view('header');
		$this->template->load('community/topic/single', $arrayData);
		//$this->load->view('footer');
		
	}
	
	
	
		public function sendPushNotification($fcm_id = array(),$title,$body)
    {
        define('API_ACCESS_KEY', 'AIzaSyCPl35g9mYEtMuJGYKXjf3ERt4p80yF0HI');
        $registrationIDs = $fcm_id;
        $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => " #ec2f4b"
        );
        $dataParam = array(
            "title" => "This is used in the background",
            "body" => "This is used in the background"
        );
        if (!empty($registrationIDs)) {
            $fcmFields = array(
                'registration_ids' => $registrationIDs,
                'priority' => 'high',
                'notification' => $fcmMsg,
                'data' => $dataParam
            );

            $headers = array(
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } else {
            return 0;
        }
    }

	/**
	 * topic function.
	 * 
	 * @access public
	 * @param string $forum_slug
	 * @param string $topic_slug
	 * @return void
	 */
	public function topic_reply($forum_slug, $topic_slug, $post_slug) {
		
		// create the data object
		$data = new stdClass();
		
		// get ids from slugs
		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$topic_id = $this->forum_model->get_topic_id_from_topic_slug($topic_slug);
		$post_id = $this->forum_model->get_post_id_from_post_slug($post_slug);
		// create objects
		$forum = $this->forum_model->get_forum($forum_id);
		$topic = $this->forum_model->get_topic($topic_id);
		$posts = $this->forum_model->get_posts($topic_id);
		$posts_reply = $this->forum_model->get_posts_reply($post_id);
		
		foreach ($posts_reply as $post) {
			
			$post->author = $this->user_model->get_username_from_uid($post->uid);
			
		}
		
		
		
		// assign created objects to the data object
		$data->forum      = $forum;
		$data->topic      = $topic;
		$data->posts      = $posts;
		$data->posts_reply= $posts_reply;
		$data->breadcrumb = $breadcrumb;
		
		// load views and send data
		//$this->load->view('header');
		$this->template->load('community/topic_reply/single', $data);
		//$this->load->view('footer');
		
	}
	
	/**
	 * create_post function.
	 * 
	 * @access public
	 * @param string $forum_slug
	 * @param string $topic_slug
	 * @return void
	 */
	public function create_post_reply($forum_slug, $topic_slug, $post_slug) {
		
		// create the data object
		$data = new stdClass();
		
		// if the user is not logged in, he cannot reply to a topic
		/*if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
			$data->login_needed = true;
		} else {
			$data->login_needed = false;
		}/*/
		
		// get ids from slugs
		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$topic_id = $this->forum_model->get_topic_id_from_topic_slug($topic_slug);
		$post_id = $this->forum_model->get_topic_id_from_post_slug($post_slug);
		
		// create objects
		$forum = $this->forum_model->get_forum($forum_id);
		$topic = $this->forum_model->get_topic($topic_id);
		$posts = $this->forum_model->get_posts($topic_id);
		$posts_reply = $this->forum_model->get_posts_reply($post_id);
		
		foreach ($posts as $post) {
			
			$post->author = $this->user_model->get_username_from_uid($post->uid);
			
		}
		
		
		// assign created objects to the data object
		$data->forum      = $forum;
		$data->topic      = $topic;
		$data->posts      = $posts;
		$data->posts_reply= $posts_reply;
		$data->breadcrumb = $breadcrumb;
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('reply', 'Reply', 'required|min_length[2]');
		
		if ($this->form_validation->run() === false) {
			
			// keep what the user has entered previously on fields
			$data->content = $this->input->post('reply');
			
			// validation not ok, send validation errors to the view
			//$this->load->view('header');
			$this->template->load('community/topic_reply/topic_reply', $data);
			//$this->load->view('footer');
			
		} else {
			
			$uid = $_SESSION['uid'];
			$content = $this->input->post('reply');
			$post_id = $this->forum_model->get_post_id_from_post_slug($post_slug);

			if ($this->forum_model->create_post_reply($topic_id,$uid,$content,$post_id)) {
				
				// post creation ok
				redirect(site_url().'community/forum/create_post/'.$forum->slug .'/'.$topic->slug.'/'.$posts->slug);
				
			} else {
				
				// post creation failed, this should never happen
				$data->error = 'There was a problem creating your reply. Please try again.';
				
				// send error to the view
				//$this->load->view('header');
				$this->template->load('community/topic_reply/topic_reply', $data);
				//$this->load->view('footer');
				
			}
			
		}
		
	}





		public function send_invite_request($forum_slug) {  
	          
		//if($this->input->post()){
			$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
			$uid=$this->session->userdata('uid');
			$community_user_email=$this->forum_model->get_user_email_from_user_id($uid);
			//print_r($community_user_email);exit;
			$community_invite_code_expiredate = date('Y-m-d H:i:s');
			$community_request_date = date('Y-m-d H:i:s');
	        $chars2 = explode(',','0,1,2,3,4,5,6,7,8,9');
			$community_invite_code = random_string('unique');
				//Sending Email

				$link= site_url()."community/forum/verify".'/'.$community_user_email.'/'.$community_invite_code;
    			//$to = $community_invite_email1[$i];
				$to = $community_user_email;
				$body = '<p>Hi, </p> '; 
				$body.='<p>Please click this link to activate your account:';
				$body.= '<a href= "'.$link.'">Link</a>';
				$email_content = $body;  
				$this->load->library('Email_PHPMailer');
				$subject = 'Registration Verification: Continuous Imapression :';
			 	$mailresponse = email_Send($subject,$to,$email_content,$name);
				//echo $mailresponse = email_Send($subject,$to,$email_content,$name);
			
			
			if($uid != "")
				{
	
							$data = array(
								
								'community_id' => $forum_id,
								'community_invite_email' =>$community_user_email,
								'community_invite_code' => $community_invite_code,
					            'community_invite_code_expiredate' =>$community_invite_code_expiredate,
									);

					   
						//Transfering data to Model
						$result= $this->forum_model->send_invite_request($data);
						//print_r($result);exit;
						//$data['message'] = 'Send Request Successfully';
						if(!$result){
							setFlash("dataMsgEnquirySuccess", "Please check email and join community !!"); 
						}
						else
						{
						    setFlash("dataMsgEnquiryError", "Somthings going to wrong !!"); 
						}
						
						  //echo json_encode($data);
						//$this->template->load('community/forum/index', $data);
						redirect('community/forum/index');



				}
			
			else{
			redirect('community/forum/index');

			}
	 	//}
		

	} 
	
	public function verify($emailId, $community_invite_code) {
		    if($this->forum_model->update_user($emailId, $community_invite_code)){
		    setFlash("dataMsgverifySuccess", "Successfully Joined community !!");
		    redirect('community/forum/index');
		 
		    }
		}
}