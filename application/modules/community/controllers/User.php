<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		
	}
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @param mixed $username (default: false)
	 * @return void
	 */
	public function index($u_email = false) {
		
		if ($u_email === false) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		// load the forum model
		$this->load->model('forum_model');
		
		// get user id from username
		$uid = $this->user_model->get_uid_from_username($u_email);
		
		// create the user object
		$user               = $this->user_model->get_user($uid);
		$user->count_topics = $this->user_model->count_user_topics($uid);
		$user->count_posts  = $this->user_model->count_user_posts($uid);
		$user->latest_post  = $this->user_model->get_user_last_post($uid);
		if ($user->latest_post !== null) {
			$user->latest_post->topic            = $this->forum_model->get_topic($user->latest_post->topic_id);
			$user->latest_post->topic->forum     = $this->forum_model->get_forum($user->latest_post->topic->forum_id);
			$user->latest_post->topic->permalink = base_url($user->latest_post->topic->forum->slug . '/' . $user->latest_post->topic->slug);
		} else {
			$user->latest_post = new stdClass();
			$user->latest_post->created_at = $user->username . ' has not posted yet';
		}
		$user->latest_topic = $this->user_model->get_user_last_topic($uid);
		if ($user->latest_topic !== null) {
			$user->latest_topic->forum     = $this->forum_model->get_forum($user->latest_topic->forum_id);
			$user->latest_topic->permalink = base_url($user->latest_topic->forum->slug . '/' . $user->latest_topic->slug);
		} else {
			$user->latest_topic        = new stdClass();
			$user->latest_topic->title = $user->username . ' has not started a topic yet';
		}
		
		// create breadcrumb
		$breadcrumb  = '<ol class="breadcrumb">';
		$breadcrumb .= '<li><a href="' . base_url() . '">Home</a></li>';
		$breadcrumb .= '<li class="active">' . $u_email . '</li>';
		$breadcrumb .= '</ol>';
		
		// create a button to permit profile edition
		$edit_button = '<a href="' . base_url('user/' . $user->username . '/edit') . '" class="btn btn-xs btn-success">Edit your profile</a>';
		
		// assign created objects to the data object
		$data->user       = $user;
		$data->breadcrumb = $breadcrumb;
		if (isset($_SESSION['u_email']) && $_SESSION['u_email'] === $u_email) {
			// user is on his own profile
			$data->edit_button = $edit_button;
		} else {
			// user is not on his own profile
			$data->edit_button = null;
		}
		
		$this->load->view('header');
		$this->load->view('user/profile/profile', $data);
		$this->load->view('footer');
		
	}
	
}
