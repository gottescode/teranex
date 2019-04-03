<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("community_model");
		$this->load->model("forum_model");
    }

	public function findSingle_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND community_id = $id ";
			$response = [
				"result" => $this->community_model->findSingle($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	
	/* Find multiple post by topic list */
	public function findmultiplePostByTopics_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND topic_id = $id ";
			$response = [
				"result" => $this->community_model->findmultiplePostByTopics($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* ACCEPT-REJECT COMMUNITY*/
	public function AcceptCommunity_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->community_model->AcceptCommunity($id)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function RejectCommunity_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->community_model->RejectCommunity($id)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultiple_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and community_id <>$id";
		    }
			$response = [
				"result" => $this->community_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

		public function findMultipleAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and community_id=$id";
		    }
			$response = [
				"result" => $this->community_model->findMultipleAddress($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
	 
        $this->form_validation->set_rules('title', 'Name Required', 'trim|required');
		 
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // get input data
			$data = $this->post(); 
		 
			$page_id = $this->community_model->create($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function update_post() {
		$this->form_validation->set_rules('com_name', 'Name Required', 'trim|required');
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			$data = $this->post();
			$result = $this->community_model->update($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function deleteCommunity_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->community_model->deleteCommunity($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishCommunity_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->community_model->updatePublishCommunity($data),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	
	// address list as per Community_id
	public function findAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and community_id = $id";
		    }
			$response = [
				"result" => $this->community_model->findAddressList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	//moderator Assign from communitee list
	public function moderatorAssign_get($communiteeID, $uid) {  
		$data['id']=$communiteeID;
		$data['moderator_user']=$uid;
			$response = [
				"result" => $this->community_model->moderatorAssign($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	//Increment View Counter
	public function viewerCount_get($topic_id) {  
		$response = [
				"result" => $this->community_model->viewerCount($topic_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function communityviewerCount_get($community_id) {  
		$response = [
				"result" => $this->community_model->communityviewerCount($community_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function communityvoteCount_get($community_id) {  
		$response = [
				"result" => $this->community_model->communityvoteCount($community_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function communityanswerCount_get($community_id) {  
		$response = [
				"result" => $this->community_model->communityanswerCount($community_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	
	
	public function likesCount_post() {  
		$data = $this->post(); 
		$response = [
				"result" => $this->community_model->likesCount($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function statusLikeDislike_post() {  
		$data = $this->post(); 
		
		$response = [
				"result" => $this->community_model->statusLikeDislike($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	
	public function likesCountTopic_get($topic_id) {  

	  $response = [
				"result" => $this->community_model->likesCountTopic($topic_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


    public function viewerCountTopic_get($topic_id) {  
		$response = [
				"result" => $this->community_model->viewerCountTopic($topic_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function followCountTopic_get($topic_id) {  

	  $response = [
				"result" => $this->community_model->followCountTopic($topic_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function answerCountTopic_get($topic_id) {  

	  $response = [
				"result" => $this->community_model->answerCountTopic($topic_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function followCount_post() {  
	$data = $this->post(); 
		$response = [
				"result" => $this->community_model->followsCount($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function likeCount_get($post_id) {  
		$response = [
				"result" => $this->community_model->likeCount($post_id)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function dislikeCount_get($post_id) {  
		$response = [
				"result" => $this->community_model->dislikeCount($post_id)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function foll_Count_get($post_id) {  
		$response = [
				"result" => $this->community_model->foll_Count($post_id)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function dislikesCount_get($post_id) {  
		$response = [
				"result" => $this->community_model->dislikesCount($post_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function followCount_get($post_id) {  
		$response = [
				"result" => $this->community_model->followCount($post_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

/* create comment post */
	public function createPostComment_post() {
	 
        $this->form_validation->set_rules('uid', 'User Id Required', 'trim|required');
        $this->form_validation->set_rules('topic_id', 'Topic Id Required', 'trim|required');
        $this->form_validation->set_rules('content', 'Name Required', 'trim|required');
		 
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // get input data
			$data = $this->post(); 
		 
			$page_id = $this->community_model->createPostComment($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Comment Inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	
	/* get coummuntiy join List
		
	*/
	
	public function getCommunityJoinListForUser_post() {  
			 $data = $this->input->post();
			
		$response = [
				"result" => $this->community_model->getCommunityJoinListForUser($data)
			]; 
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function createAttachment_post() {
	
        $this->form_validation->set_rules('post_id', 'post_id File', 'trim|required');
		 
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // get input data
			$data = $this->post(); 
		 
			$page_id = $this->community_model->createAttachment($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function commentAttachementlist_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND post_id = $id ";
			$response = [
				"result" => $this->community_model->commentAttachementlist($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function getUserList_get($id) {
	
			$response = [
				"result" => $this->forum_model->getuserList($id)
			];
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function getForumId_get($id) {
	
			$response = [
				"result" => $this->forum_model->getuserList($id)
			];
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

}

?>