<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Community_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			
			$this->community_path="uploads/communityFile/"; 
			$this->attachment_path="uploads/attachmentfiles/"; 
			$this->load->library("file_manager");
			$this->community="community";
			$this->load->model('forum_model');
			$this->posts="posts";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('community', $strWhere,'');
	}
	
	public function findmultiplePostByTopics($strWhere = 1) {
		$table = " posts as po LEFT JOIN master_user as mu ON po.uid=mu.uid ";
		$select = " po.*,mu.u_name as username,mu.u_avatar as userImage ";
		return $this->db_lib->fetchMultiple($table,$strWhere." ORDER BY po.created_at DESC ",$select);
	}
/*  POST LIKES*/
	public function likesCount($data) {
		$post_id = $data['post_id'];
		$opr = $data['opr'];
		$uid = $data['uid'];
		$strWhere = " post_id = '{$post_id}' AND uid='{$uid}' ";
		$result = $this->db_lib->fetchSingle('posts_likes_dislikes', $strWhere);
		if($result){
			$result['id']= $result['id'];
			$arradata['like_dis']=$opr;
			$result = $this->db_lib->update("posts_likes_dislikes", $arradata, "id = " . $result["id"]);
			if($opr==='L'){
				$strwhr = " post_id = {$post_id} AND like_dis='L' ";
				return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
		
			}else{
				$strwhr = " post_id = {$post_id} AND like_dis='D' ";
				return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
			}
		}else{
			$data['like_dis']=$opr;
			$like_id = $this->db_lib->insert("posts_likes_dislikes", $data);
			if($opr==='L'){
				$strwhr = " post_id = {$post_id} AND like_dis='L' ";
				return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
			}else{
				$strwhr = " post_id = {$post_id} AND like_dis='D' ";
				return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
			}
		}
		//return $data;
		/* 
		$strWhere = " id = '$post_id' ";
		$result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		$arradata['likes'] = $result['likes']+1;
		$result = $this->db_lib->update("posts", $arradata, "id = " . $result["id"]);
		return $result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		 */
	}
	public function followsCount($data) {
		$post_id = $data['post_id'];
		$uid = $data['uid'];
		$strWhere = " post_id = '{$post_id}' AND uid='{$uid}' ";
		$result = $this->db_lib->fetchSingle('posts_follows', $strWhere);
		if($result){
			$strwhr = " post_id = {$post_id}  ";
			return $result = $this->db_lib->fetchSingle('posts_follows',$strwhr,'COUNT(*) as count');
		}else{
			$data['like_dis']=$opr;
			$like_id = $this->db_lib->insert("posts_follows", $data);

			$strwhr = " post_id = {$post_id}  ";
			return $result = $this->db_lib->fetchSingle('posts_follows',$strwhr,'COUNT(*) as count');
		
		}
		//return $data;
		/* 
		$strWhere = " id = '$post_id' ";
		$result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		$arradata['likes'] = $result['likes']+1;
		$result = $this->db_lib->update("posts", $arradata, "id = " . $result["id"]);
		return $result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		 */
	}
	

	public function likeCount($post_id){
		$strwhr = " post_id = {$post_id} AND like_dis='L' ";
		return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');

	}

	public function likesCountTopic($topic_id){
		$strwhr = " topic_id = {$topic_id} AND like_dis='L' ";
	    $result = $this->db_lib->fetchMultiple('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
		foreach ($result as $row) {
			
		}
		return $result;

	}
	public function followCountTopic($topic_id){
		$strwhr = " topic_id = {$topic_id}  ";
	    $result = $this->db_lib->fetchMultiple('posts_follows',$strwhr,'COUNT(*) as count');
		foreach ($result as $row) {
			
		}
		return $result;

	}
	public function answerCountTopic($topic_id){
		$strwhr = " topic_id = {$topic_id}  ";
	    $result = $this->db_lib->fetchMultiple('posts',$strwhr,'COUNT(*) as count');
		foreach ($result as $row) {
			
		}
		return $result;

	}

	public function communityviewerCount($community_id) {


		$strwhr = " community_id = {$community_id}  ";
	    $result = $this->db_lib->fetchMultiple('topics',$strwhr,'SUM(views) as count');
		foreach ($result as $row) {
			
		}
		return $result;

	}

	public function communityanswerCount($community_id) {

		$strwhr = "community_id = '$community_id'";
 		$result = $this->db_lib->fetchMultiple('topics',$strwhr,"");
 		$count_answer = 0;
 		foreach ($result as $row) {
			$topic_id = $row['id'];
			$strwhr = " topic_id = {$topic_id}";
			$count_answer_new = $this->db_lib->fetchMultiple('posts',$strwhr,'COUNT(*) as count');
		// echo "</br> The Topic is:{$topic_id} and count for topic = {$count_answer_new[0][count]} </br>";
			$count_answer = $count_answer+$count_answer_new[0][count];
			
		}
		$result  = array();
		$result['count'] = $count_answer;
		//print_r($result['count']);exit;
		return $result;

	}

	public function communityvoteCount($community_id) {

		$strwhr = "community_id = '$community_id'";
 		$result = $this->db_lib->fetchMultiple('topics',$strwhr,"");
 		//print_r($result);exit;
		$count_like = 0;
		foreach ($result as $row) {
			$topic_id = $row['id'];
			$strwhr = " topic_id = {$topic_id} AND like_dis='L' ";
			$count_like_new = $this->db_lib->fetchMultiple('posts_likes_dislikes',$strwhr,'COUNT(*) as count');
			// echo "</br> The Topic is:{$topic_id} and count for topic = {$count_like_new[0][count]} </br>";
			$count_like = $count_like+$count_like_new[0][count];

		}
		$result  = array();
		$result['count'] = $count_like;

// 		echo "The Final Result is :".$count_like ;
// exit;

		
	   
		return $result;

	}
	
	
	public function foll_Count($post_id){
		$strwhr = " post_id = {$post_id} ";
		return $result = $this->db_lib->fetchSingle('posts_follows',$strwhr,'COUNT(*) as count');

	}
	public function dislikeCount($post_id){
		$strwhr = " post_id = {$post_id} AND like_dis='D' ";
		return $result = $this->db_lib->fetchSingle('posts_likes_dislikes',$strwhr,'COUNT(*) as count');

	}
	/*  POST LIKES*/
	public function dislikesCount($post_id) {
		$strWhere = " id = '$post_id' ";
		$result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		$arradata['dislikes'] = $result['dislikes']+1;
		$result = $this->db_lib->update("posts", $arradata, "id = " . $result["id"]);
		return $result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		
	}
	public function followCount($post_id) {
		$strWhere = " id = '$post_id' ";
		$result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		$arradata['follows'] = $result['follows']+1;
		$result = $this->db_lib->update("posts", $arradata, "id = " . $result["id"]);
		return $result = $this->db_lib->fetchSingle('posts', $strWhere,'');
		
	}
	 
	/* public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple("community", $strWhere,"");//exit; 
		return $result;
	} */
	public function viewerCount($topic_id) {
	
	$result=$this->db_lib->fetchMultiple("posts", $strWhere,"");//exit; 
		foreach($result as $row){
			$arrData['views']  = $row['views']+1;
			$result = $this->db_lib->update("posts", $arrData, "id = " . $row["id"]);
		}
		return $result;
	}





	public function viewerCountTopic($topic_id) {
		$strWhere = " id = '$topic_id' ";
		$result=$this->db_lib->fetchSingle("topics", $strWhere,"");
		$arrData['views']  = $result['views']+1;
		$result = $this->db_lib->update("topics", $arrData, "id = " . $topic_id);
		return $result;
	}


	public function findMultiple($strWhere) {
		$table = " community AS com LEFT JOIN master_user AS mu ON mu.uid = com.admin_user ";
		$select = " com.*,mu.* "; 
		$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY id ASC ",$select);
		return $result;
	}
	
	
	public function findMultipleAddress($strWhere) {
		$result=$this->db_lib->fetchMultiple("community", $strWhere,"");//exit; 
		return $result;
	}

   /*  public function create($arrData) {
		$arrData["created_at"] = date('Y-m-d');
		$title=$arrData["title"];

		$arrData["slug"] = strtolower(url_title($title));
		 
		return $community_id = $this->db_lib->insert("community", $arrData);
		 
		
    } */
	 public function create($arrData) {
		
		$arrData["created_at"] = date('Y-m-d');
		$title=$arrData["title"];

		$arrData["slug"] = strtolower(url_title($title));
		 
		$community_id = $this->db_lib->insert("community", $arrData);
		$arr_Data  = array();
		$arr_Data['g_id'] = $community_id;
		$arr_Data['createdBy'] = $arrData['admin_user'];
		$arr_Data['type'] = 1;
		$this->db_lib->insert("im_group",$arr_Data);
		return $community_id;  
		
    }
	/* Add Comments On post */
	public function createPostComment($arrData) {
     //print_r($arrData);die;
       
				$parent_id_from_api = $arrData['parent_id'];
				$content_from_api = $arrData['content'];
				$uid_from_api = $arrData['uid'];
				$topic_id_from_api = $arrData['topic_id'];
       
           
            $data=$this->db_lib->fetchSingle('master_user',$arrData['uid']);
           // print_r($data);die;
            $arrData["created_at"] = date('Y-m-d H:i:s');
            $datafcm=array($data['fcm_id']);
            $topicID = $arrData['topic_id'];

          //  print_r($datafcm);die;
            $topic_data = $this->db_lib->fetchSingle("topics", " id ={$topicID}");
           // $topic_data = $this->db_lib->fetchSingle("posts", " id ={$topic_id}");
             //$topic_data=$this->db_lib->fetchSingle('topics',$arrData['topic_id'],'');
           
             $topicID = $arrData['topic_id'];
             $communityID=$topic_data['community_id'];
          // print_r($communityID);die;

            $url = site_url() . "community/api/getUserList/$communityID";
           $team_list = apiCall($url, "get");

           $fcm_id=array();
           foreach($team_list['result'] as $key)
           {

               $fcm_id[]=$key['fcm_id'];
                     	
           }

         // print_r($fcm_id);die;
             $UID=$arrData['parent_id'];

             //print_r($topic_data['community_id']);
             $user_id=$this->session->userdata('uid');
            // $data_param=array($topic_data['id'],$topic_data['community_id']);
			
					 
			
			/* API  Logic*/
			 //FOR TOPIC->COMMENT	
			if($parent_id_from_api==0){
				$this->sendPushNotification($fcm_id,"New discussion kicked-off",$content_from_api,$topic_id_from_api,$communityID,$uid_from_api);
			}else{
				 $post_data = $this->db_lib->fetchSingle("posts", " id ={$parent_id_from_api}");
				 $sendToUserId = $post_data['uid'];
				
				
				$data=$this->db_lib->fetchSingle('master_user'," uid = {$sendToUserId}");
				  
					$datafcm=array($data['fcm_id']);
				// print_r($datafcm);exit;
				// $UID = $post_data['uid']; 
				 $this->sendPushNotification($datafcm,"You got a response",$content_from_api,$topic_id_from_api,$communityID,$uid_from_api);
			}
			
			
			
             if($arrData['comment_post']!='')
             {
             	//echo 'post_comment';die;
            $this->sendPushNotification($fcm_id,$arrData['comment_post'],$arrData['content'],$topicID,$communityID,$user_id);
              }

            if($arrData['post_answer']!='')
            {
            	//echo 'post_answer';die;
            $this->sendPushNotification($datafcm,$arrData['post_answer'],$arrData['content'],$topicID,$communityID,$UID);
            }
                       return $community_id = $this->db_lib->insert("posts",$arrData);  

 

    }
    
    
        public function sendPushNotification($fcm_id = array(),$title,$body,$topicID,$communityID,$UID)
    {
    //echo $topicID.$communityID.$UID;die;
        define('API_ACCESS_KEY','AIzaSyAYhpFIbahJLGKMhewBX7Ms9knLfv9jA2k');
        $registrationIDs = $fcm_id;
        $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => " #ec2f4b"
        );
        $dataParam = array(
            "title" => "This is used in the background",
            "body" => "This is used in the background",
            "topic_id" =>"This is topic id",
            "community_id" =>"community id",
            "user_id" =>"uid",
        );
        if (!empty($registrationIDs)) {
            $fcmFields = array(
                'registration_ids' => $registrationIDs,
                'priority' => 'high',
                'notification' => $fcmMsg,
            );

            $headers = array(
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
          
            $result = curl_exec($ch);
           //print_r($result);die;
            curl_close($ch);
            return $result;
        } else {
            return 0;
        }
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
	public function inactiveuserlist($community_id)
	{
	
		$this->db->select('*'); 
   		$this->db->from('community_invite');
   		$this->db->where('active_status', 'N');
		$this->db->where('community_id', $community_id);
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
	/* 11 May - Atul */
	 public function getCommunityJoinListForUser($data)  { 
	 $user_email = $data['user_email'];
		$table = " community_invite AS CI ";
		$select =" CI.community_id ";
		$strWhere = " CI.community_invite_email = '$user_email' AND active_status = 'Y' ";
		return $this->db_lib->fetchMultiple($table,$strWhere,$select); 
		
		/* 
		return $this->db_lib->fetchMultiple('community_invite CI join master_user MU ON CI.community_invite_email=MU.u_email  '," community_invite_email = $user_email AND active_status='Y' "," community_id",1); */ 
	}

	
	// get full user list
	public function getActiveUserList($community_id)
	{
	
		$this->db->select('community_invite.*,master_user.u_name,master_user.uid'); 
   		$this->db->from('community_invite');
   		$this->db->join('master_user', 'master_user.u_email = community_invite.community_invite_email');
   		$this->db->where('active_status', 'Y');
   		$this->db->where('community_id', $community_id);
    	$query = $this->db->get();
    	return $query->result();
	}

	public function createAttachment($arrData) {
		$data = $this->file_manager->upload('commentFile', $this->attachment_path,MIX_FORMAT,"",1);

		if($data[0])
			$arrData["attached_file"] = $data[1];
			
		$page_id = $this->db_lib->insert("post_attachments", $arrData);
		if ($page_id) {
			return $page_id;
		}
        return false;
    }
	public function commentAttachementlist($strWhere = 1) {
		return $this->db_lib->fetchMultiple('post_attachments', $strWhere,'');
	}
	
		
}

?>