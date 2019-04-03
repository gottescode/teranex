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
	 * get_post_id_from_post_slug function.
	 * 
	 * @access public
	 * @param string $post_slug
	 * @return int
	 */
	public function get_post_id_from_post_slug($post_slug) {
		
		$this->db->select('id');
		$this->db->from('posts');
		$this->db->where('slug', $post_slug);
		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_forums function.
	 * 
	 * @access public
	 * @return array of objects
	 */
	public function get_forums() {
		
		//return $this->db->get('community')->result();
		$this->db->select('community.*,master_user.u_name,master_user.u_avatar as moderator_image,user_details.user_company_name as company_name,user_contact.person_designation as designation');
		$this->db->from('community');
		$this->db->join('master_user', 'community.admin_user = master_user.uid','left');
		$this->db->join('user_details', 'user_details.uid = master_user.uid','LEFT');
		$this->db->join('user_contact', 'user_contact.user_id = master_user.uid','LEFT');
		$this->db->where(' status = "A" ');
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result();
	/* $this->db->select('*');
$this->db->from('community');
$this->db->where(' status = "A" ');
return $this->db->get()->result(); */
	}
	
	/**
	 * get_forum function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return object
	 */
	public function get_forum($forum_id) {
	
	 $this->db->select('community.*,master_user.u_avatar as user_image,master_user.u_avatar as moderator_image,master_user.u_name as moderator_name,master_user.u_name as user_name,user_details.user_company_name as company_name');
		$this->db->from('community');
		$this->db->join('master_user', 'community.admin_user = master_user.uid','community.moderator_user = master_user.uid','left');
		$this->db->join('user_details', 'user_details.uid = master_user.uid','LEFT');
		//$this->db->join('master_user', 'community.moderator_user = master_user.uid','left');
		$this->db->where(" status = 'A' AND community.id = {$forum_id} ");
		return $this->db->get()->row(); 
	}

	/**
	 * get_forum function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return object
	 */
	public function get_communityModerator($forum_id) {
		
	$this->db->select('community.*,master_user.u_avatar as moderator_image,master_user.u_name as moderator_name,user_contact.person_designation,user_details.user_company_name as company_name');
		$this->db->from('community');
		$this->db->join('master_user','community.moderator_user = master_user.uid','left');
		$this->db->join('user_contact', 'user_contact.user_id = master_user.uid','LEFT');
		$this->db->join('user_details', 'user_details.uid = master_user.uid','LEFT');
		$this->db->where(" status = 'A' AND community.id = {$forum_id} ");
		return $this->db->get()->row(); 
	}
	

	/**
	 * get_forum function.
	 * 
	 * @access public
	 * @param int $forum_id
	 * @return object
	 */
	public function get_moderator_image($forum_id) {
	
	 $this->db->select('community.*,master_user.u_avatar as moderator_image');
		$this->db->from('community');
		$this->db->join('master_user','community.moderator_user = master_user.uid','left');
		//$this->db->join('master_user', 'community.moderator_user = master_user.uid','left');
		$this->db->where(" status = 'A' AND community.id = {$forum_id} ");
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
		$this->db->select('po.*,mu.u_name as username,mu.u_avatar as userImage');
		$this->db->from('posts AS po');
		$this->db->where('topic_id', $topic_id);
		$this->db->join('master_user AS mu', 'po.uid = mu.uid','left');
		return $this->db->get()->result();
/* 
		$this->db->from('posts');
		$this->db->where('topic_id', $topic_id);
		return $this->db->get()->result();
		 */
	}

	/**
	 * get_posts function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @return array of objects
	 */
	public function get_posts_reply($post_id) {
		
		$this->db->from('posts_reply');
		$this->db->where('post_id', $post_id);
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
	 * create_post function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @param int $uid
	 * @param string $content
	 * @return bool
	 */
	public function create_post($topic_id, $uid,$content) {
		
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
	 * create_post_reply function.
	 * 
	 * @access public
	 * @param int $topic_id
	 * @param int $uid
	 * @param string $content
	 * @return bool
	 */
	public function create_post_reply($topic_id, $uid,$post_id,$content) {
		
		$data = array(
			'content'    => $content,
			'uid'    => $uid,
			'post_id'    => $post_id,
			'topic_id'   => $topic_id,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		if ($this->db->insert('posts_reply', $data)) {
			
			$data = array('updated_at' => date('Y-m-j H:i:s'));
			$this->db->where('id', $post_id);
			return $this->db->update('posts', $data);
			
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


	/**
	 * get_user_email_from_user_id function.
	 * 
	 * @access public
	 * @param string $slug
	 * @return int
	 */
	public function get_user_email_from_user_id($uid) {
		
		$this->db->select('u_email');
		$this->db->from('master_user');
		$this->db->where('uid', $uid);
		return $this->db->get()->row('u_email');
		
	}

	/**
	 * Send Request Code function.
	 * 
	 * @access public
	 * @param string $community Invite ID
	 * @param string $community Invite Request user Email
	 * @return bool
	 */
	public function send_invite_request($data) {
		
		
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
		
		$this->db->select('community_invite.*,master_user.u_name,master_user.uid,fcm_id,user_details.user_company_name,master_user.u_avatar,user_contact.person_designation'); 
   		$this->db->from('community_invite');
   		$this->db->join('master_user', 'master_user.u_email = community_invite.community_invite_email','LEFT');
   		$this->db->join('user_details', 'user_details.uid = master_user.uid','LEFT');
   		$this->db->join('user_contact', 'user_contact.user_id = master_user.uid','LEFT');
   		//$this->db->where('active_status', 'Y');
   		$this->db->where(" 1 AND active_status= 'Y' AND community_id= '{$community_id}' ");
    	$query = $this->db->get();
		 //$this->db->last_query();
    	return $query->result();
	}

		public function selectAllWhr($tblname, $where, $condition) {
        $this->db->where($where, $condition);
        $query = $this->db->get($tblname);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[] = $row;
            }
            return $tbl_data;
        } else {
            return false;
        }
    }

	
	
	
}
