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
		$this->load->model('community_model');
		
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
	
		// create the data object
		//$data = new stdClass();
		
		if ($slug === false) {
			$uid = $this->session->userdata('uid');
			// create objects
			$forums = $this->forum_model->get_forums($uid);
		//print_r($forums);exit;
			foreach ($forums as $forum) {
				
				$forum->permalink    = base_url($forum->slug);
				$forum->topics       = $this->forum_model->get_forum_topics($forum->id);
				$forum->count_topics = count($forum->topics);
				$forum->count_posts  = $this->forum_model->count_forum_posts($forum->id);
				$forum->topic->title = $this->forum_model->get_forum_topics_title($forum->id);
				if ($forum->count_topics > 0) {
					
					// $forum has topics
					$forum->latest_topic            = $this->forum_model->get_forum_latest_topic($forum->id);
					$forum->latest_topic->permalink = $forum->slug . '/' . $forum->latest_topic->slug;
					$forum->latest_topic->author    = $this->user_model->get_username_from_user_id($forum->latest_topic->user_id);
					
				} else {
					
					// $forum doesn't have topics yet
					$forum->latest_topic = new stdClass();
					$forum->latest_topic->permalink = null;
					$forum->latest_topic->title = null;
					$forum->latest_topic->author = null;
					$forum->latest_topic->created_at = null;
					
				}
	
			}
			
			// create breadcrumb
			$breadcrumb  = '<ol class="breadcrumb">';
			$breadcrumb .= '<li class="active">Home</li>';
			$breadcrumb .= '</ol>';
			
			// assign created objects to the data object
			$data->forums     = $forums;
			$data->breadcrumb = $breadcrumb;

			// load views and send data
			$this->template->load("customer/forum/create/list",$data);
			
		} else {
			
			// get id from slug
			$forum_id = $this->forum_model->get_forum_id_from_forum_slug($slug);
			
			// create objects
			$forum    = $this->forum_model->get_forum($forum_id);
			$topics   = $this->forum_model->get_forum_topics($forum_id);
			
			// create breadcrumb
			$breadcrumb  = '<ol class="breadcrumb">';
			$breadcrumb .= '<li><a href="' . base_url() . '">Home</a></li>';
			$breadcrumb .= '<li class="active">' . $forum->title . '</li>';
			$breadcrumb .= '</ol>';
			
			foreach ($topics as $topic) {
				
				$topic->author                  = $this->user_model->get_username_from_user_id($topic->user_id);
				$topic->permalink               = $slug . '/' . $topic->slug;
				$topic->posts                   = $this->forum_model->get_posts($topic->id);
				$topic->count_posts             = count($topic->posts);
				$topic->latest_post             = $this->forum_model->get_topic_latest_post($topic->id);
				$topic->latest_post->author     = $this->user_model->get_username_from_user_id($topic->latest_post->user_id);
				
			}
			
			// assign created objects to the data object
			$data->forum      = $forum;
			$data->topics     = $topics;
			$data->breadcrumb = $breadcrumb;
			
			// load views and send data
			$this->template->load("customer/forum/single",$data);
		
		} 
		 
	}	

	

	// Delete Forum
	public function delete_forum($id) {  
	 	$url = site_url()."/community/api/deleteForum/$id"; 
		$response =  apiCall($url, "get");  
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."community/forum/");		
	} 

	/**
	 * create function.
	 * 
	 * @access public
	 * @return void
	 */
	public function community_topic() {
	
		// create the data object
		$data['topics']=$this->forum_model->get_community_topics();
		
		//$data = new stdClass();
		
		// assign breadcrumb to the data object
		$data->breadcrumb = $breadcrumb;
		
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
			
			$this->template->load("customer/community-topic/create/create",$data);
						
		} else {
			
			// set variables from the form
			$title       = $this->input->post('title');
			$description = $this->input->post('description');
			
			if ($this->forum_model->community_topic($title, $description)) {
				
				// forum creation ok
				
				$this->template->load("customer/community-topic/create/create",$data);
			
				
			} else {
				
				// forum creation failed, this should never happen
				$data->error = 'There was a problem creating the new forum. Please try again.';
				
				// send error to the view
				$this->template->load('customer/community-topic/create/list',$data);
			}
			
		}
		
	}
	/**
	 * create_topic function.
	 * 
	 * @access public
	 * @param string $forum_slug
	 * @return void
	 */
	public function create_topic($forum_slug) {
		
		// create the data object
		$data = new stdClass();
	
		
		// set variables from the the URI
		$forum_slug = $this->uri->segment(4);
		
		$forum_id   = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$forum      = $this->forum_model->get_forum($forum_id);
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('title', 'Topic Title', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[255]|is_unique[topics.title]', array('is_unique' => 'The topic title you entered already exists in our database. Please enter another topic title.'));
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[4]');
		
		if ($this->form_validation->run() === false) {
			
			// keep what the user has entered previously on fields
			$data->title   = $this->input->post('title');
			$data->content = $this->input->post('content');
			
			// validation not ok, send validation errors to the view
			
			$this->template->load("customer/topic/create/create",$data);
		
			
		} else {
			
			// set variables from the form
			$title   = $this->input->post('title');
			$content = $this->input->post('content');
			$uid = $_SESSION['uid'];
			
			if ($this->forum_model->create_topic($forum_id, $title, $content, $uid)) {
				
				// topic creation ok
			 redirect(site_url()."customer/forum/topic/".$forum_slug . '/' . strtolower(url_title($title)));
				
				} else {
				
				// topic creation failed, this should never happen
				$data->error = 'There was a problem creating your new topic. Please try again.';
				
				// send error to the view
				
				$this->template->load("customer/topic/create/create",$data);
				
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
		
		// create the data object
		$data = new stdClass();
		
		// get ids from slugs
		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$topic_id = $this->forum_model->get_topic_id_from_topic_slug($topic_slug);
		
		
		// create objects
		$forum = $this->forum_model->get_forum($forum_id);
		$topic = $this->forum_model->get_topic($topic_id);
		$posts = $this->forum_model->get_posts($topic_id);
		
		foreach ($posts as $post) {
			
			$post->author = $this->user_model->get_username_from_user_id($post->user_id);
			
		}
		
		// create breadcrumb
		$breadcrumb  = '<ol class="breadcrumb">';
		$breadcrumb .= '<li><a href="' . base_url() . '">Home</a></li>';
		$breadcrumb .= '<li><a href="' . base_url($forum->slug) . '">' . $forum->title . '</a></li>';
		$breadcrumb .= '<li class="active">' . $topic->title . '</li>';
		$breadcrumb .= '</ol>';
		
		// assign created objects to the data object
		$data->forum      = $forum;
		$data->topic      = $topic;
		$data->posts      = $posts;
		$data->breadcrumb = $breadcrumb;
		
		// load views and send data
		$this->template->load('customer/topic/single', $data);
	}
	
	/**
	 * create_post function.
	 * 
	 * @access public
	 * @param string $forum_slug
	 * @param string $topic_slug
	 * @return void
	 */
	public function create_post($forum_slug, $topic_slug) {
		
		// create the data object
		$data = new stdClass();
		
		// if the user is not logged in, he cannot reply to a topic
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
			$data->login_needed = true;
		} else {
			$data->login_needed = false;
		}
		
		// get ids from slugs
		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		$topic_id = $this->forum_model->get_topic_id_from_topic_slug($topic_slug);
		
		// create objects
		$forum = $this->forum_model->get_forum($forum_id);
		$topic = $this->forum_model->get_topic($topic_id);
		$posts = $this->forum_model->get_posts($topic_id);
		
		foreach ($posts as $post) {
			
			$post->author = $this->user_model->get_username_from_user_id($post->user_id);
			
		}
		
		// create breadcrumb
		$breadcrumb  = '<ol class="breadcrumb">';
		$breadcrumb .= '<li><a href="' . base_url() . '">Home</a></li>';
		$breadcrumb .= '<li><a href="' . base_url($forum->slug) . '">' . $forum->title . '</a></li>';
		$breadcrumb .= '<li class="active">' . $topic->title . '</li>';
		$breadcrumb .= '</ol>';
		
		// assign created objects to the data object
		$data->forum      = $forum;
		$data->topic      = $topic;
		$data->posts      = $posts;
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
			$this->template->load('customer/topic/reply', $data);
			} else {
			
			$user_id = $_SESSION['user_id'];
			$content = $this->input->post('reply');
			
			if ($this->forum_model->create_post($topic_id, $user_id, $content)) {
				
				// post creation ok
			 redirect(site_url()."customer/forum/topic/".$forum_slug . '/' . $topic_slug);
			} else {
				
				// post creation failed, this should never happen
				$data->error = 'There was a problem creating your reply. Please try again.';
				
				// send error to the view
				$this->template->load('customer/topic/reply', $data);
							
			}
			
		}
		
	}


   // Invite Code
	public function send_invite_code($forum_slug) {  
		
		if($this->input->post()){
			$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
		
		    $community_invite_code_expiredate = date('Y-m-d H:i:s');
		    $community_invite_id = $this->input->post('community_invite_id');
			$community_invite_email =  $this->input->post('community_invite_email');
			$community_invite_code=$this->input->post('community_invite_code');
				
			$community_invite_email1=explode(',', $community_invite_email);
			for ($i = 0; $i < count($community_invite_email1); $i++) 
			{
				$chars2 = explode(',','0,1,2,3,4,5,6,7,8,9');
				$community_invite_code = random_string('unique');
				//Sending Email

				$link= site_url()."customer/forum/verify".'/'.$community_invite_email1[$i].'/'.$community_invite_code;
    			$to = $community_invite_email1[$i];

				$body = '<p>Hi, </p> '; 
				$body.='<p>Please click this link to activate your account:';
				$body.= '<a href= "'.$link.'">Link</a>';
				$email_content = $body;  
				$this->load->library('Email_PHPMailer');
				$subject = 'Registration Verification: Continuous Imapression :';
			 	$mailresponse = email_Send($subject,$to,$email_content,$name);
				//echo $mailresponse = email_Send($subject,$to,$email_content,$name);exit;
				
				if($community_invite_email1[$i] != "")
				{
							$data = array(
								'community_invite_id' => $community_invite_id,
								'community_id' => $forum_id,
								'community_invite_email' =>$community_invite_email1[$i],
								'community_invite_code' => $community_invite_code,
					            'community_invite_code_expiredate' =>$community_invite_code_expiredate,
									);

								
						//Transfering data to Model
							$result = $this->forum_model->send_invite_code($data);
			/* 			$data['message'] = 'Data Inserted Successfully';
						//Loading View
						$this->template->load('customer/communities_invite', $data);

 */

				}
				
			}
			
					//redirect(site_url()."customer/forum/");	
		 	}
		$this->template->load('customer/communities_invite', $data);

	} 
	


			public function verify($emailId, $community_invite_code) {
		    if($this->forum_model->update_user($emailId, $community_invite_code)){
		 
		    $this->template->load("customer/invite/invite_request_success");
		 
		    }
		}



			/**
			 * verify_invitecode function.
			 * 
			 * @access public
			 * @return void
			 */
	public function verify_invitecode(){
			       

					$forum_slug = $this->uri->segment(4);
					$community_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);
					$postData = $this->input->post();
				    $postData['community_id'] =$community_id;
			        $validate = $this->forum_model->verify_invitecode($postData);
			        if ($validate){
			            $newdata = array(
			                'community_invite_code'=> $validate[0]->community_invite_code,
			                'community_id' => $validate[0]->community_id,
			                'logged_in' => TRUE,
			              
			            );
						 $this->session->set_userdata($newdata);
			          
			            redirect(site_url('customer/forum/create_topic/' . $forum_slug)); 
			        }
			        else{
			            $data = array('alert' => true);
			            $this->template->load('customer/invite-login', $data);
			        }
			}
/* CREATE COMMUNITY FROM FRONTEND */

	public function createCommunity(){
		$uid = $this->session->userdata('uid');
		if(isset($_POST['btnSubmit'])){
				$pageData = $this->input->post(); 
				$pageData['admin_user'] = $uid;
				$url = site_url()."community/api/create";
				$response =  apiCall($url, "post",$pageData);
			if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."customer/forum/index/");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."customer/forum/index");
			} 	
		}
		$this->template->load("create_community",$arrayData);		
	}
	public function sendInvite($id){
			if($this->input->post()){
		    $forum_id = $this->community_model->get_forum_id_from_forum_slug($id);
		    $community_invite_code_expiredate = date('Y-m-d H:i:s');
		   	$community_invite_email =  $this->input->post('community_invite_email');
			$community_invite_code=$this->input->post('community_invite_code');
			// Email content --------------

			/*$subject = "Invite to join community on Teranex";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "Reply-To:<info@teranex.co>\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:Admin<info@teranex.co>' . "\r\n";*/
			
			//-----------------------------------------
			
				
			$community_invite_email1=explode(',', $community_invite_email);
			print_r($community_invite_email1);exit;
			for ($i = 0; $i < count($community_invite_email1); $i++) 
			{
				$chars2 = explode(',','0,1,2,3,4,5,6,7,8,9');
				$random2 = "";
				
				for($j=0; $j<6;$j++)  
				{
					$random2.=$chars2[mt_rand(0,count($chars2)-1)];
				}
			
				if($community_invite_email1[$i] != "")
				{
					
					/*$to  = $Email1[$i];
					$msg1 ="Your code for joining the community on Teranex is $random2. You are required to register first at teranex.co and then proceed to forum section.";
					mail($to, $subject, $msg1, $headers);*/


					/*$config = Array(
					  'protocol' => 'smtp',
					  'smtp_host' => 'ssl://smtp.googlemail.com',
					  'smtp_port' => 465,
					  'smtp_user' => 'dvs261089@gmail.com', // change it to yours
					  'smtp_pass' => 'test', // change it to yours
					  'mailtype' => 'html',
					  'charset' => 'iso-8859-1',
					  'wordwrap' => TRUE
					);

					 $message = '';
					        $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('dvs261089@gmail.com'); // change it to yours
					      $this->email->to('deepakshinde0007@gmail.com');// change it to yours
					      $this->email->subject('Your code for joining the community on Teranex is '.$random2.'You are required to register first at teranex.co and then proceed to forum section.');
					      $this->email->message($message);
					      if($this->email->send())
					     {
					      echo 'Email sent.';
					     }
					     else
					    {
					     show_error($this->email->print_debugger());
					    }*/

		
							$data = array(
									'community_id' => $forum_id,
									'community_invite_email' =>$community_invite_email1[$i],
									'community_invite_code' => $random2,
									'community_invite_code_expiredate' =>$community_invite_code_expiredate,
								);

							
						//Transfering data to Model
						$this->community_model->send_invite_code($data);
						$data['message'] = 'Data Inserted Successfully';
						//Loading View
						$this->template->load("community/invite/create", $data);



				}
			}
	 	}
	
		$this->template->load("send_invite",$arrayData);		
	}

	public function activeuserlist() {
	
		$community_name=$this->uri->segment(4);
		$community_id = $this->forum_model->get_forum_id_from_forum_slug($community_name);
		// prepare data
		$query = $this->forum_model->getuserList($community_id);
		//print_r($community_id);
		$data['community_id'] = $community_id ;
		$data['userList'] = null;
		if($query){
			$data['userList'] =  $query;
		}
		//$this->template->load("active_user_list",$data);	
		$this->template->load("customer/forum/create/active_user_list", $data);
	}

	public function inactiveuserlist(){
	 	// prepare data
	 	$community_name=$this->uri->segment(4);
		$community_id = $this->forum_model->get_forum_id_from_forum_slug($community_name);
		$query = $this->forum_model->inactiveuserlist($community_id);
		$data['inactiveuserList'] = null;
		if($query){
			$data['inactiveuserList'] =  $query;
		}
		$this->template->load("customer/forum/create/inactive_user_list", $data);
	}
}
