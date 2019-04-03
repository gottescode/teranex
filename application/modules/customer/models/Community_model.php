<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Community_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->community_path="uploads/communityFile/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('community', $strWhere,'');
	}
	 
	/* public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple("community", $strWhere,"");//exit; 
		return $result;
	} */
	public function findMultiple($strWhere) {
		$table = " community AS com LEFT JOIN master_user AS mu ON mu.uid = com.admin_user ";
		$select = " com.*,mu.* "; 
		$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY id DESC ",$select);
		return $result;
	}
	

	
   public function findMultipleAddress($strWhere) {
		$result=$this->db_lib->fetchMultiple("community", $strWhere,"");//exit; 
		return $result;
	}

    public function create($arrData) {
		$arrData["created_at"] = date('Y-m-d');
		$title=$arrData["title"];

		$arrData["slug"] = strtolower(url_title($title));
		 
		return $community_id = $this->db_lib->insert("community", $arrData);
		 
		
    }
	
	public function update($arrData) {
		/*$data = $this->file_manager->update('project_image', $this->community_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["project_image"] = $data[1];*/


		$result = $this->db_lib->update("community", $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCommunity($id) {
		$data = $this->db_lib->fetchSingle("community", "id = $id");
		if($data)
			$this->file_manager->delete($this->community_path, $data["project_image"]);
		
		$result = $this->db_lib->delete("community", "id = " . $id);
        return $result;
    }
    
	public function updatePublishCommunity($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["s_access"] = "Y";
				else
					$arrData["s_access"] = "N";
				// update record
				$result = $this->db_lib->update("community", $arrData, "id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	// address list as per community_id
	public function findAddressList($strWhere) {
		$result=$this->db_lib->fetchMultiple("community", $strWhere,""); 
		return $result;
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
		
		
			$this->db->insert('community_invite_request', $data);
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

	// get full user list
	public function getuserList()
	{
	
		$this->db->select('community_invite.*,master_user.u_name,master_user.uid'); 
   		$this->db->from('community_invite');
   		$this->db->join('master_user', 'master_user.u_email = community_invite.community_invite_email');
   		$this->db->where('active_status', 'Y');
    	$query = $this->db->get();
    	return $query->result();
	}
	// get full user list
	public function inactiveuserlist()
	{
	
		$this->db->select('*'); 
   		$this->db->from('community_invite');
   		$this->db->where('active_status', 'N');
    	$query = $this->db->get();
    	return $query->result();
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
	
	public function moderatorAssign($arrData) { 
	
		$result = $this->db_lib->update("community", $arrData, "id = " . $arrData["id"]);
        return $result;
    }
/* accept/reject community */
	public function AcceptCommunity($id){
		$arrData['status'] = 'A';
		$result = $this->db_lib->update("community", $arrData, "id = " . $id);
        return $result;
    	
	}

	public function RejectCommunity($id){
		$arrData['status'] = 'R';
		$result = $this->db_lib->update("community", $arrData, "id = " . $id);
        return $result;
    	
	}

	
}

?>