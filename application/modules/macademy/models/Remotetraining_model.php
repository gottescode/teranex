<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Remotetraining_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->course_path="uploads/remotetraining/"; 
			$this->load->library("file_manager"); 
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '448');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('remotetraining_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("remotetraining_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["created_date"] = date('Y-m-d');
		return  $this->db_lib->insert("remotetraining_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("remotetraining_category", $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 
		$result = $this->db_lib->delete("remotetraining_category", "id = " . $id);
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
				$result = $this->db_lib->update("remotetraining_category", $arrData, "id = ". $id);
			}
			return true;
		}
		return false;
	}
	 /* course CRUD operation */
	 
	 public function findSingleCourse($strWhere = 1) {
		return $this->db_lib->fetchSingle('remotetraining_course_list CL LEFT JOIN master_user MU ON CL.trainee_user_id=MU.uid', $strWhere,'CL.*,MU.u_name, MU.u_avatar');
	}
	 
	public function findMultipleCourse($strWhere) {
		$result=$this->db_lib->fetchMultiple("remotetraining_course_list CL LEFT JOIN master_user MU ON  CL.trainee_user_id= MU.uid LEFT JOIN course_commnet_by_customer CBC ON CL.cid=CBC.course_id", $strWhere." ","CL.*,MU.u_name AS trainee_name, count(cbc_id) AS totalCommentedUser,sum(course_rating) AS totalCommentedRate" );//exit; 
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
		
		return  $this->db_lib->insert("remotetraining_course_list", $arrData); 
    }
	
	public function updateCourse($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('courseImage', $this->course_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["course_image"] = $data[1];
		
		$video = $this->file_manager->update('videoLink', $this->course_path, VIDEO_FORMAT, $arrData["old_video"]);
		if($video[0])
			$arrData["video_link"] = $video[1];
		
		$result = $this->db_lib->update("remotetraining_course_list", $arrData, "cid = " . $arrData["course_id"]);
        return $result;
    }
	
	public function deleteCourse($id) { 
		$data = $this->db_lib->fetchSingle("remotetraining_course_list", "cid = $id");
		if($data)
			$this->file_manager->delete($this->course_path, $data["course_image"]);
		
		$result = $this->db_lib->delete("remotetraining_course_list", "cid = " . $id);
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
				$result = $this->db_lib->update("remotetraining_course_list", $arrData, "cid = ". $id);
			}
			return true;
		}
		return false;
	}
	
	/* content CRUD */
	
	 /* content CRUD operation */
	 
	 public function findSingleContent($strWhere = 1) {
		return $this->db_lib->fetchSingle('remotetraining_course_content', $strWhere,'');
	}
	 
	public function findMultipleContent($strWhere) {
		$result=$this->db_lib->fetchMultiple("remotetraining_course_content", $strWhere,"");//exit; 
		return $result;
	} 
    public function createContent($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('courseImage', $this->course_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["course_image"] = $data1[1];
		
		return  $this->db_lib->insert("remotetraining_course_content", $arrData); 
    }
	
	public function updateContent($arrData) {
	   
		
		$result = $this->db_lib->update("remotetraining_course_content", $arrData, "content_id = " . $arrData["content_id"]);
        return $result;
    }
	
	public function deleteContent($id) {  
		$result = $this->db_lib->delete("remotetraining_course_content", "content_id = " . $id);
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
				$result = $this->db_lib->update("remotetraining_course_content", $arrData, "content_id = ". $id);
			}
			return true;
		}
		return false;
	}
	/* FAQ CRUD */
	
	 public function findSingleFaq($strWhere = 1) {
		return $this->db_lib->fetchSingle('remotetraining_course_faq', $strWhere,'');
	}
	 
	public function findMultipleFaq($strWhere) {
		$result=$this->db_lib->fetchMultiple("remotetraining_course_faq", $strWhere,"");//exit; 
		return $result;
	} 
    public function createFaq($arrData) {
		$arrData["updated_date"] = date('Y-m-d'); 
		return  $this->db_lib->insert("remotetraining_course_faq", $arrData); 
    }
	
	public function updateFaq($arrData) {
	   
		
		$result = $this->db_lib->update("remotetraining_course_faq", $arrData, "fid = " . $arrData["fid"]);
        return $result;
    }
	
	public function deleteFaq($id) {  
		$result = $this->db_lib->delete("remotetraining_course_faq", "fid = " . $id);
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
				$result = $this->db_lib->update("remotetraining_course_faq", $arrData, "fid = ". $id);
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
		
		$result=$this->db_lib->insert("remotetraining_course_enrollment", $arrDataInsert);//exit; 
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

    public function findMultipleTrainers($strWhere) {
		
		$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
		return $result;
	}

	/* Course cutomer Request
		20/7/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function courseRequest($arrayData){
		 
		$arrayData["request_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("course_customer_request", $arrayData); 
		return $result;
	} 


	/* Course cutomer Request
		20/7/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function courseReqList(){
		  
		$result=$this->db_lib->fetchMultiple("course_customer_request CCR LEFT JOIN machine_category MC ON CCR.product_cat=MC.mc_id  LEFT JOIN machine_brand MB ON CCR.prod_brandName=MB.mb_id LEFT JOIN machine_brand_model MBM ON CCR.prod_model=MBM.md_id", "","MB.brand_name,MC.category_name,MBM.model_name, CCR.*"); 
		return $result;
	} 

	/* assign supplier  
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function assignSupplier($data){
		  
		
		// get total records
		$ids = $data["id"]; 
		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["ccr_id"] = $data['ccr_id'];
					$arrData["supplier_id"] = $id;
					$arrData["request_supplier_date"] = date('Y-m-d');
					$ccr_id = $arrData["ccr_id"];
					$strWhere = " ccr_id = $ccr_id AND supplier_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('course_supplier_request', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("course_supplier_request", $arrData);
					}else{
						$arrayData['ccr_id'] = $old_result['ccr_id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("course_supplier_request", $arrayData," ccr_id = ".$arrayData['ccr_id']);
					}
				}	
			}
			return true;
		}
		return false;
	} 

	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function supplierList(){
		  
		$result=$this->db_lib->fetchMultiple("master_user ", "u_user_type = 'S' ","uid,u_name,u_email, u_mobileno"); 
		return $result;
	}

	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function requestListAsUser($uid){
		  
		$result=$this->db_lib->fetchMultiple("course_supplier_request CSR JOIN course_customer_request CCR ON CSR.ccr_id=CCR.ccr_id", "CSR.supplier_id = '$uid' ","CSR.*, company_name,noofparticipants "); 
		return $result;
	}


	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function requestDetails($csrId){
		  
		$result=$this->db_lib->fetchSingle("course_supplier_request CSR JOIN course_customer_request CCR ON CSR.ccr_id=CCR.ccr_id  LEFT JOIN machine_category MC ON CCR.product_cat=MC.mc_id  LEFT JOIN machine_brand MB ON CCR.prod_brandName=MB.mb_id LEFT JOIN machine_brand_model MBM ON CCR.prod_model=MBM.md_id", "csr_id = '$csrId' ","CSR.*, company_name,noofparticipants, MB.brand_name,CCR.supplier_id ,MC.category_name,MBM.model_name"); 
		return $result;
	}

	 /**

	 * Course Supplier List

	 * Created Date 20-07-2018 Deepak Shinde

	 * @access public

	 * @param  rarc_id

	 * @return array of requestList

	 */ 

    public function CourseSuppliers($ccrID) { 

        $strWhere = "ccr_id = '$ccrID' ";
		$result = $this->db_lib->fetchMultiple("course_supplier_request CSR JOIN master_user MU ON CSR.supplier_id=MU.uid", $strWhere."AND request_status='A'","MU.u_name,MU.u_email, CSR.ccr_id,csr_id,request_supplier_date,supplier_id");

        return $result;

    }
	

	public function SingleCourseSuppliers($strWhere) {
		return $this->db_lib->fetchSingle('course_customer_request', $strWhere,"");
	}

	public function findSingle_Course_quote_supplier($strWhere = 1) {
		return $this->db_lib->fetchSingle('course_supplier_request', $strWhere,"");
	}

	public function CourseSupplierListUpdate($csr_id) { 

		$data['admin_accept_status']='Y';

		$result = $this->db_lib->update("course_supplier_request  ",$data, " csr_id = ".$csr_id);

		$result_data = $this->db_lib->fetchSingle("course_supplier_request  "," csr_id = ".$csr_id);



		$supplier_id = $result_data['supplier_id'];

		$ccr_id = $result_data['ccr_id'];

		$updateData['supplier_id'] = $supplier_id;

		$result = $this->db_lib->update("course_customer_request",$updateData, " ccr_id = ".$ccr_id);

        return $result;

    }


}

?>