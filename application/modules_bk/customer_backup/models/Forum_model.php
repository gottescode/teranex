<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Forum_model class.
 * 
 * @extends CI_Model
 */
class Forum_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));
		
	}
	
	/**
	 * create_forum function.
	 * 
	 * @access public
	 * @param string $title
	 * @param string $description
	 * @return bool
	 */
	public function create_forum($title, $description) {
		
		$data = array(
			'title'       => $title,
			'slug'        => strtolower(url_title($title)),
			'description' => $description,
			'created_at'  => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('community', $data);
		
	}
	


	/**
	 * Insert Invite Colde function.
	 * 
	 * @access public
	 * @param string $community Invite Code
	 * @param string $community Invite Email
	 * @return bool
	 */
	public function send_invite_code($data) {
		
		
			$this->db->insert('community_invite', $data);
	}




	/**
	 * Insert Invite Code function.
	 * 
	 * @access public
	 * @param string $postData
	 * @return bool
	 */
	

function verify_invitecode($postData){

        $this->db->select('*');
        $this->db->where('community_invite_code', $postData['community_invite_code']);
        $this->db->where('community_id', $postData['community_id']);
        $this->db->from('community_invite');
        $query=$this->db->get();

        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }



	/**
	 * create_forum function.
	 * 
	 * @access public
	 * @param string $title
	 * @param string $description
	 * @return bool
	 */
	public function community_topic($title, $description) {
		
		$data = array(
			'title'       => $title,
			'slug'        => strtolower(url_title($title)),
			'description' => $description,
			'created_at'  => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('community_topic', $data);

	}

	/**
	 * get_forum_id_from_forum_slug function.
	 * 
	 * @access public
	 * @param string $slug
	 * @return int
	 */
	public function get_user_id_from_user_email($uemail) {
		
		$this->db->select('uid');
		$this->db->from('master_user');
		$this->db->where('u_email', $uemail);
		return $this->db->get()->row('uid');
		
	}

	
	/**
	 * get_forum_id_from_forum_slug function.
	 * 
	 * @access public
	 * @param string $slug
	 * @return int
	 */
	public function get_forum_id_from_forum_slug($slug) {
		
		$this->db->select('id');
		$this->db->from('community');
		$this->db->where('slug', $slug);
		return $this->db->get()->row('id');
		
	}


	
	/**
	 * get_topic_id_from_topic_slug function.
	 * 
	 * @access public
	 * @param string $topic_slug
	 * @return int
	 */
	public function get_topic_id_from_topic_slug($topic_slug) {
		
		$this->db->select('id');
		$this->db->from('topics');
		$this->db->where('slug', $topic_slug);
		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_forums function.
	 * 
	 * @access public
	 * @return array of objects
	 */
	public function get_forums($uid) {
		
		//return $this->db->get('community')->result();
		
		$this->db->from('community');
	//	$this->db->order_by("id", "DESC");
		$this->db->where('admin_user', $uid);
		return $this->db->get()->result();
		
	}
	

	/**
	 * get_forums function.
	 * 
	 * @access public
	 * @return array of objects
	 */
	public function get_community_topics() {
	
		$query = $this->db->get('topics');  
         return $query;
	}
	
	/**
	 * get_forum function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return object
	 */
	public function get_forum($forum_id) {
		
		$this->db->from('community');
		$this->db->where('id', $forum_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * get_topic function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @return object
	 */
	public function get_topic($topic_id) {
		
		$this->db->from('topics');
		$this->db->where('id', $topic_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * get_forum_topics function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return array of objects
	 */
	public function get_forum_topics($forum_id) {
		
		$this->db->from('topics');
		$this->db->where('community_id', $forum_id);
		return $this->db->get()->result();
		
	}
	


	/**
	 * get_forum_topics_title function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return array of objects
	 */
	public function get_forum_topics_title($forum_id) {
		
		$this->db->select('title');
		$this->db->from('topics');
		$this->db->where('community_id',  $forum_id);
		return $this->db->get()->result();
	}
	

	/**
	 * get_posts function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @return array of objects
	 */
	public function get_posts($topic_id) {
		
		$this->db->from('posts');
		$this->db->where('topic_id', $topic_id);
		return $this->db->get()->result();
		
	}
	
	/**
	 * get_topic_latest_post function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @return object
	 */
	public function get_topic_latest_post($topic_id) {
		
		$this->db->from('posts');
		$this->db->where('topic_id', $topic_id);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
		
	}
	
	/**
	 * create_topic function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @param string $title
	 * @param string $content
	 * @param int $user_id
	 * @return bool
	 */
	public function create_topic($forum_id, $title, $content, $uid) {
		
		$data = array(
			'title'      => $title,
			'slug'       => strtolower(url_title($title)),
			'uid'    => $uid,
			'community_id'   => $forum_id,
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		if ($this->db->insert('topics', $data)) {
			$topic_id = $this->db->insert_id();
			return $this->create_post($topic_id, $uid, $content);
		}
		return false;
		
	}
	
	/**
	 * create_post function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @param int $user_id
	 * @param string $content
	 * @return bool
	 */
	public function create_post($topic_id, $uid, $content) {
		
		$data = array(
			'content'    => $content,
			'uid'    => $uid,
			'topic_id'   => $topic_id,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		if ($this->db->insert('posts', $data)) {
			
			$data = array('updated_at' => date('Y-m-j H:i:s'));
			$this->db->where('id', $topic_id);
			return $this->db->update('topics', $data);
			
		}
		return false;
		
	}
	
	/**
	 * count_forum_posts function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return int
	 */
	public function count_forum_posts($forum_id) {
		
		$this->db->select('posts.id');
		$this->db->from('posts');
		$this->db->join('topics', 'posts.topic_id = topics.id');
		$this->db->where('topics.community_id', $forum_id);
		$this->db->group_by('posts.id');
		return count($this->db->get()->result());
		
	}
	

	function deleteForum($id){
 
		$this->db_lib->delete('community',"id = $id");
}
	/**
	 * get_forum_latest_topic function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return object
	 */
	public function get_forum_latest_topic($forum_id) {
		
		$this->db->from('topics');
		$this->db->where('community_id', $forum_id);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
		
	} 

	 public function send_invite_link($data) {
			 
			 $this->db->insert('community_invite', $data);

  	}


	 public function update_user($emailId,$community_invite_code)  {
				 
			
			 $this->db->where('community_invite_email',$emailId);
			 $this->db->where('community_invite_code',$community_invite_code);
			 $data = array(
					'active_status' => 'Y',
			  );
			 return $this->db->update('community_invite', $data);

			}


     // get full user list
	public function getuserList($community_id)
	{
		
		$this->db->select('community_invite.*,master_user.u_name,master_user.uid'); 
   		$this->db->from('community_invite');
   		$this->db->join('master_user', 'master_user.u_email = community_invite.community_invite_email');
   		$this->db->where('active_status', 'Y');
   		$this->db->where('community_id', $community_id);
    	$query = $this->db->get();
    	return $query->result();
	}
	
	// get full user list
	public function inactiveuserlist($community_id)
	{
	
		$this->db->select('*'); 
   		$this->db->from('community_invite');
   		$this->db->where('active_status', 'N');
   		$this->db->where('community_id', $community_id);
    	$query = $this->db->get();
    	return $query->result();
	}

	
}
