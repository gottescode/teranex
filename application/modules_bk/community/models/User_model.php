<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param string $username
	 * @param string $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('master_user');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_uid_from_username function.
	 * 
	 * @access public
	 * @param string $username
	 * @return int the user id
	 */
	public function get_uid_from_username($u_email) {
		
		$this->db->select('uid');
		$this->db->from('master_user');
		$this->db->where('u_email', $u_email);

		return $this->db->get()->row('uid');
		
	}
	
	/**
	 * get_username_from_uid function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return string
	 */
	public function get_username_from_uid($uid) {
		
		$this->db->select('u_name');
		$this->db->from('master_user');
		$this->db->where('uid', $uid);

		return $this->db->get()->row('u_name');
		
	}
	public function get_userimage_from_uid($uid) {
		
		$this->db->select('u_avatar');
		$this->db->from('master_user');
		$this->db->where('uid', $uid);

		return $this->db->get()->row('u_avatar');
		
	}
	
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return object the user object
	 */
	public function get_user($uid) {
		
		$this->db->from('master_user');
		$this->db->where('uid', $uid);
		return $this->db->get()->row();
		
	}
	
	/**
	 * get_users function.
	 * 
	 * @access public
	 * @return object
	 */
	public function get_users() {
		
		$this->db->from('master_user');
		return $this->db->get()->result();
		
	}
	
	/**
	 * count_user_posts function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return int
	 */
	public function count_user_posts($uid) {
		
		$this->db->select('id');
		$this->db->from('posts');
		$this->db->where('uid', $uid);
		return $this->db->get()->num_rows();
		
	}
	
	/**
	 * count_user_topics function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return int
	 */
	public function count_user_topics($uid) {
		
		$this->db->select('id');
		$this->db->from('topics');
		$this->db->where('uid', $uid);
		return $this->db->get()->num_rows();
		
	}
	
	/**
	 * get_user_last_post function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return mixed object or false if no post
	 */
	public function get_user_last_post($uid) {
		
		$this->db->from('posts');
		$this->db->where('uid', $uid);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
		
	}
	
	/**
	 * get_user_last_topic function.
	 * 
	 * @access public
	 * @param int $uid
	 * @return object or false if no topic
	 */
	public function get_user_last_topic($uid) {
		
		$this->db->from('topics');
		$this->db->where('uid', $uid);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
		
	}

}
