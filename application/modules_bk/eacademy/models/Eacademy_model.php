<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Eacademy_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->course_path="uploads/course/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '448');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('course_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("course_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["created_date"] = date('Y-m-d');
		return $community_id = $this->db_lib->insert("course_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("course_category", $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 
		$result = $this->db_lib->delete("course_category", "id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("course_category", $arrData, "id = ". $id);
			}
			return true;
		}
		return false;
	}
	 /* course CRUD operation */
	 
	 public function findSingleCourse($strWhere = 1) {
		return $this->db_lib->fetchSingle('remotetraining_course_list CL JOIN master_user MU ON CL.trainee_user_id=MU.uid', $strWhere,'CL.*,MU.u_name, MU.u_avatar');
	}
	 public function findSingleCourse1($strWhere = 1) {
		return $this->db_lib->fetchSingle('course_list CL JOIN master_user MU ON CL.trainee_user_id=MU.uid', $strWhere,'CL.*,MU.u_name, MU.u_avatar');
	}
	 
	public function findMultipleCourse($strWhere) {
		$result=$this->db_lib->fetchMultiple("course_list CL LEFT JOIN master_user MU ON  CL.trainee_user_id= MU.uid LEFT JOIN course_commnet_by_customer CBC ON CL.cid=CBC.course_id", $strWhere." ","CL.*,MU.u_name AS trainee_name, count(cbc_id) AS totalCommentedUser,sum(course_rating) AS totalCommentedRate" );//exit; 
		return $result;
	} 
    public function createCourse($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('courseImage', $this->course_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["course_image"] = $data1[1];
		
		$video = $this->file_manager->upload('videoLink', $this->course_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["video_link"] = $video[1];
		
		return $community_id = $this->db_lib->insert("course_list", $arrData); 
    }
	
	public function updateCourse($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('courseImage', $this->course_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["course_image"] = $data[1];
		
		$video = $this->file_manager->update('videoLink', $this->course_path, VIDEO_FORMAT, $arrData["old_video"]);
		if($video[0])
			$arrData["video_link"] = $video[1];
		
		$result = $this->db_lib->update("course_list", $arrData, "cid = " . $arrData["course_id"]);
        return $result;
    }
	
	public function deleteCourse($id) { 
		$data = $this->db_lib->fetchSingle("course_list", "cid = $id");
		if($data)
			$this->file_manager->delete($this->course_path, $data["course_image"]);
		
		$result = $this->db_lib->delete("course_list", "cid = " . $id);
        return $result;
    }
    
	public function updatePublishCourse($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("course_list", $arrData, "cid = ". $id);
			}
			return true;
		}
		return false;
	}
	
	/* content CRUD */
	
	 /* content CRUD operation */
	 
	 public function findSingleContent($strWhere = 1) {
		return $this->db_lib->fetchSingle('course_content', $strWhere,'');
	}
	 
	public function findMultipleContent($strWhere) {
		$result=$this->db_lib->fetchMultiple("course_content", $strWhere,"");//exit; 
		return $result;
	} 
    public function createContent($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('courseImage', $this->course_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["course_image"] = $data1[1];
		
		return $community_id = $this->db_lib->insert("course_content", $arrData); 
    }
	
	public function updateContent($arrData) {
	   
		
		$result = $this->db_lib->update("course_content", $arrData, "content_id = " . $arrData["content_id"]);
        return $result;
    }
	
	public function deleteContent($id) {  
		$result = $this->db_lib->delete("course_content", "content_id = " . $id);
        return $result;
    }
    
	public function updatePublishContent($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("course_content", $arrData, "content_id = ". $id);
			}
			return true;
		}
		return false;
	}
	/* FAQ CRUD */
	
	 public function findSingleFaq($strWhere = 1) {
		return $this->db_lib->fetchSingle('course_faq', $strWhere,'');
	}
	 
	public function findMultipleFaq($strWhere) {
		$result=$this->db_lib->fetchMultiple("course_faq", $strWhere,"");//exit; 
		return $result;
	} 
    public function createFaq($arrData) {
		$arrData["updated_date"] = date('Y-m-d'); 
		return $community_id = $this->db_lib->insert("course_faq", $arrData); 
    }
	
	public function updateFaq($arrData) {
	   
		
		$result = $this->db_lib->update("course_faq", $arrData, "fid = " . $arrData["fid"]);
        return $result;
    }
	
	public function deleteFaq($id) {  
		$result = $this->db_lib->delete("course_faq", "fid = " . $id);
        return $result;
    }
    
	public function updatePublishFaq($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("course_faq", $arrData, "fid = ". $id);
			}
			return true;
		}
		return false;
	}
	// fetch trainee User List from master Table traineeUserList 
	public function traineeUserList($strWhere) {
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");//exit; 
		return $result;
	} 
	
	// course Enrollment inserting
	public function courseEnrollment($arrData) {
		$arrDataInsert['enroller_user']	=$arrData['enroller_user'];
		$arrDataInsert['course_id']		=$arrData['course_id'];
		$arrDataInsert['user_name']		=$arrData['firstname'];
		$arrDataInsert['user_email']	=$arrData['email'];
		$arrDataInsert['phone_no']		=$arrData['phone'];
		$arrDataInsert['participant_no']=$arrData['participant_no'];
		$arrDataInsert['course_amount']	=$arrData['course_amount'];
		$arrDataInsert['total_amount']		=$arrData['totalPrice'];
		$arrDataInsert['course_start_date']	=$arrData['course_start_date'];
		$arrDataInsert['course_start_time']	=$arrData['course_start_time'];
		$arrDataInsert['course_end_date']	=$arrData['course_end_date'];
		$arrDataInsert['course_end_time']	=$arrData['course_end_time'];
		$arrDataInsert['entry_date_time']	=date("Y-m-d H:i:s"); 
		
		$result=$this->db_lib->insert("course_enrollment", $arrDataInsert);//exit; 
		return $result;
	} 
	/**
	 *  course Enrollment
	 * jaywant Narwade
		11/4/2018
	 * @access public
	 * @param  userId
	 * @return array of course Enrollment list
	 */ 
	public function findMultipleComment ($course_id) { 
		 
		$result = $this->db_lib->fetchMultiple("course_commnet_by_customer CBC JOIN master_user MU ON CBC.user_id= MU.uid", "CBC.course_id=$course_id","CBC.*, MU.u_name, MU.u_avatar");
         
		return $result;
    }
}

?>