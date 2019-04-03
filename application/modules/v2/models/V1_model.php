<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class V1_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
		 $this->load->library("file_manager");
		 $this->case_image = "uploads/training_service_images/";
			parent::__construct();
    }

    public function login($data) {
		$username = $data['username']; 
		$password = md5($data['password']); 
		$table = "master_user as MU";
		$select = "MU.uid,u_name as userName,u_email as userEmail,u_avatar as userProfileImage,u_mobileno as userMobile,u_date_birth as userDOB,u_user_type as userType,user_type as user_type,user_role as user_role";
		$strWhere = " u_email = '{$username}' AND u_password = '{$password}' ";
		$result =  $this->db_lib->fetchSingle($table,$strWhere,$select);
		if($result){
			$uid =$result['uid'];
			$updata['fcm_id'] = $data['fcm_id']; 
			$this->db_lib->update("master_user",$updata," uid= {$uid}"); 
		}
		return $result;
	} 
	
	/* ============== Technical Request =========== */
	
	/* Case List for Customer*/
	public function technicalRequestCaseList($strWhere = 1) {
		$table = "  technical_service_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id
						LEFT JOIN
					master_user as MU ON tsr.service_engg_id = MU.uid
						LEFT JOIN
					role_master as ur ON MU.user_role = ur.id
						
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,MU.u_name as engg_name,ur.roleName as role_name "; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	/* public function technicalRequestMeetingList($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("technical_service_request_tokbox",$strWhere." ORDER BY id DESC","");
	} */
	public function technicalRequestMeetingList($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("technical_support_zoom as tsz LEFT JOIN master_user as mu ON mu.uid = tsz.created_by LEFT JOIN
					role_master as ur ON mu.user_role = ur.id ",$strWhere." ORDER BY id DESC"," tsz.*,mu.u_name as engg_name,ur.roleName as role_name ");
	}
	public function technicalMeetingSummaryDetails($strWhere = 1) {
		return	$result=$this->db_lib->fetchSingle("technical_support_zoom",$strWhere,"");
	}
	public function technicalRequestCaseDetails($strWhere = 1) {
		$table = "  technical_service_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	
						LEFT JOIN
					master_user as MU ON tsr.service_engg_id = MU.uid
						LEFT JOIN
					role_master as ur ON MU.user_role = ur.id					
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,MU.u_name as engg_name,ur.roleName as role_name"; 
		return	$result=$this->db_lib->fetchSingle($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function lodgeNewTechnicalServiceRequest($data) {
				
			$result = $this->db_lib->insert("technical_service_request",$data);
			$tech_req_id = $result;
			$imageData = $this->file_manager->multi_upload('tech_service_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['tech_service_req_images']=$imageData;
		
		
			foreach ($Data['tech_service_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['description']=$data['error_description'];
						$insertData['tech_req_id']=$tech_req_id;
						$insertData['tech_service_req_images']=$value[1];
						$result1 = $this->db_lib->insert("technical_service_request_images",$insertData);
					}
			}
       return $result;
    }
	public function ammendCaseTechnicalServiceRequest($data) {
				
			$imageData = $this->file_manager->multi_upload('tech_service_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['tech_service_req_images']=$imageData;
			
			$insertData['tech_req_id']=$data['tech_req_id'];
			$insertData['description']=$data['error_description'];
			
			foreach ($Data['tech_service_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['tech_service_req_images']=$value[1];
						$result = $this->db_lib->insert("technical_service_request_images",$insertData);
					}
			}
			return $result;
    }
	public function closeCaseTechnicalServiceRequest($data) {
		$id = $data['tech_req_id'];
		$updateData['status'] = 'C';
		$result = $this->db_lib->update("technical_service_request",$updateData," id = $id ");
		return $result;
    }
	
/* ============== Application Support Request =========== */
	public function machineListByUser($id) {
		/* $result = $this->db_lib->fetchMultiple("machine_details","","md_id");
		
		foreach($result as $row){
			$md = $row['md_id'];
			$updateData['machine_unique_id'] = get_unique_numeric_string_package();
		$result = $this->db_lib->update("machine_details",$updateData," md_id = $md ");
		}
		print_r($result);exit;
		 */
		$strWhere = 1;
		$strWhere .= " and customer_id ='{$id}'";
		 $table = "  machine_order as mo 
						LEFT JOIN 
					machine_details as md ON mo.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " md.md_id,md.machine_unique_id,md.category_id,model_no,mo.warrenty,mo.service_agreement,mb.brand_name,mc.category_name,mbm.model_name "; 
		$ar1=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY mo.id DESC",$select);/* */
		
		$strWhere1 = 1;
		$strWhere1 .= " and parent_id ='{$id}'";
		$table2 = " 
					machine_details as md LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " md.md_id,md.machine_unique_id,md.category_id,md.model_no,md.warrenty,md.service_agreement,mb.brand_name,mc.category_name,mbm.model_name "; 
		$ar2=$this->db_lib->fetchMultiple($table2,$strWhere1." ORDER BY md.md_id DESC",$select);
		/* $combine_result = array();
		$combine_result = array_merge($result,$result1);
		print_r($combine_result);exit; */
		
		if($ar1){
			
			$newkey = count($ar1);
			
			$array =  array();
			foreach($ar2 as $key => $value) {
				 $newkey = $newkey;
				 $array[$newkey] = $value;
				 unset($ar2[$key]);
				 $newkey++;
			}
			return array_merge($ar1,$array);
			
		}else{
			return $ar2;
		}
		
		/* if($result1 AND result){return	array_merge($result,$result1);
			print_r(array_merge($result,$result1));
		} */
		
	}
	public function applicationRequestCaseList($strWhere = 1) {
		$table = "  application_support_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	
						LEFT JOIN
					master_user as MU ON tsr.engg_id = MU.uid
						LEFT JOIN
					role_master as ur ON MU.user_role = ur.id					
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,MU.u_name as engg_name,ur.roleName as role_name"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function applicationRequestMeetingList($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("application_support_zoom as tsz LEFT JOIN master_user as mu ON mu.uid = tsz.created_by  LEFT JOIN role_master as ur ON mu.user_role = ur.id ",$strWhere." ORDER BY id DESC"," tsz.*,mu.u_name as engg_name,ur.roleName as role_name  ");
	}
	public function applicationMeetingSummaryDetails($strWhere = 1) {
		return	$result=$this->db_lib->fetchSingle("application_support_zoom ",$strWhere,"");
	}
	public function applicationRequestCaseDetails($strWhere = 1) {
		$table = "  application_support_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name "; 
		return	$result=$this->db_lib->fetchSingle($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function lodgeNewApplicationRequest($data) {
				
			$result = $this->db_lib->insert("application_support_request",$data);
			$app_req_id = $result;
			$imageData = $this->file_manager->multi_upload('application_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['application_req_images']=$imageData;
		
		
			foreach ($Data['application_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['description']=$data['error_description'];
						$insertData['app_req_id']=$app_req_id;
						$insertData['application_req_images']=$value[1];
						$result1 = $this->db_lib->insert("application_request_images",$insertData);
					}
			}
       return $result;
    }
	public function ammendCaseApplicationRequest($data) {
				
			$imageData = $this->file_manager->multi_upload('application_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['application_req_images']=$imageData;
			
			$insertData['app_req_id']=$data['app_req_id'];
			$insertData['description']=$data['error_description'];
			
			foreach ($Data['application_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['application_req_images']=$value[1];
						$result = $this->db_lib->insert("application_request_images",$insertData);
					}
			}
			return $result;
    }
	public function closeCaseApplicationRequest($data) {
		$id = $data['app_req_id'];
		$updateData['status'] = 'C';
		$result = $this->db_lib->update("application_support_request",$updateData," id = $id ");
		return $result;
    }
	/* ============== Freelancer Support Request =========== */
	
	
	public function freelancerRequestCaseList($strWhere = 1) {
		$table = "  freelancer_support_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id
						LEFT JOIN
					master_user as mu ON tsr.freelancer_id = mu.uid
						LEFT JOIN
					role_master as ur ON mu.user_role = ur.id 
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,mu.u_name as engg_name,ur.roleName as role_name "; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function freelancerRequestMeetingListTokbox($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("freelancer_request_tokbox",$strWhere." ORDER BY id DESC","");
	}
	public function freelancerRequestMeetingListZoom($strWhere = 1) {
		/* return	$result=$this->db_lib->fetchMultiple("freelancer_support_zoom",$strWhere." ORDER BY id DESC",""); */
		return	$result=$this->db_lib->fetchMultiple("freelancer_support_zoom as tsz LEFT JOIN master_user as mu ON mu.uid = tsz.created_by  LEFT JOIN role_master as ur ON mu.user_role = ur.id ",$strWhere." ORDER BY id DESC"," tsz.*,mu.u_name as engg_name,ur.roleName as role_name  ");
	}
	public function freelanceMeetingSummaryDetails($strWhere = 1) {
		 return	$result=$this->db_lib->fetchSingle("freelancer_support_zoom",$strWhere,""); 
		 /* 
		 return	$result=$this->db_lib->fetchMultiple("freelancer_support_zoom as tsz LEFT JOIN master_user as mu ON mu.uid = tsz.created_by  LEFT JOIN role_master as ur ON mu.user_role = ur.id ",$strWhere." ORDER BY id DESC"," tsz.*,mu.u_name as engg_name,ur.roleName as role_name  "); */
	}
	public function freelancerRequestCaseDetails($strWhere = 1) {
		$table = "  freelancer_support_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name "; 
		return	$result=$this->db_lib->fetchSingle($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function lodgeNewFreelancerRequest($data) {
				
			$result = $this->db_lib->insert("freelancer_support_request",$data);
			$free_req_id = $result;
			$imageData = $this->file_manager->multi_upload('freelancer_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['freelancer_req_images']=$imageData;
		
		
			foreach ($Data['freelancer_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['description']=$data['error_description'];
						$insertData['free_req_id']=$free_req_id;
						$insertData['freelancer_req_images']=$value[1];
						$result1 = $this->db_lib->insert("freelance_request_images",$insertData);
					}
			}
       return $result;
    }
	public function ammendCaseFreelancerRequest($data) {
			$imageData = $this->file_manager->multi_upload('freelancer_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['freelancer_req_images']=$imageData;
			
			$insertData['free_req_id']=$data['free_req_id'];
			$insertData['description']=$data['error_description'];
			
			foreach ($Data['freelancer_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['freelancer_req_images']=$value[1];
						// $insertData['created_on']=date( " H:i:s ");
						$result = $this->db_lib->insert("freelance_request_images",$insertData);
					}
			}
			return $result;
    }
	public function closeCaseFreelancerRequest($data) {
		$id = $data['free_req_id'];
		$updateData['status'] = 'C';
		$result = $this->db_lib->update("freelancer_support_request",$updateData," id = $id ");
		return $result;
    }
	public function userFreelancersDetails($id=0) {
		$table = " master_user as Mu LEFT JOIN role_master as UR ON UR.id=Mu.user_role ";
		$strWhere = " user_type = 3 ";
		$select = "Mu.uid,u_name,u_email,u_mobileno,u_avatar,user_type,user_role,UR.roleName";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select);/* */
		return $result;
    }
	
	
	/* ============== Spare Parts  Request =========== */
	public function machineListByUserSpare($id) {
		
		$strWhere = 1;
		$strWhere .= " and customer_id ='{$id}'";
		 $table = " machine_order as mo 
						LEFT JOIN 
					machine_details as md ON mo.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " md.md_id,md.machine_unique_id,md.parent_id,md.category_id,model_no,mo.warrenty,mo.service_agreement,mb.brand_name,mc.category_name,mbm.model_name "; 
		$ar1=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY mo.id DESC",$select);/* */
		
		$strWhere1 = 1;
		$strWhere1 .= " and parent_id ='{$id}'";
		$table2 = " 
					machine_details as md LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id			
					";
		$select = " md.md_id,md.machine_unique_id,md.category_id,md.model_no,md.warrenty,md.service_agreement,mb.brand_name,mc.category_name,mbm.model_name "; 
		$ar2=$this->db_lib->fetchMultiple($table2,$strWhere1." ORDER BY md.md_id DESC",$select);
		/* $combine_result = array();
		$combine_result = array_merge($result,$result1);
		print_r($combine_result);exit; */
		
		if($ar1){
			
			$newkey = count($ar1);
			
			$array =  array();
			foreach($ar2 as $key => $value) {
				 $newkey = $newkey;
				 $array[$newkey] = $value;
				 unset($ar2[$key]);
				 $newkey++;
			}
			return array_merge($ar1,$array);
			
		}else{
			return $ar2;
		}
		
		/* if($result1 AND result){return	array_merge($result,$result1);
			print_r(array_merge($result,$result1));
		} */
		
	}
	public function spareRequestCaseList($strWhere = 1) {
		$table = "  spare_part_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	
						LEFT JOIN
					master_user as MU ON tsr.parent_id = MU.uid
						LEFT JOIN
					role_master as ur ON MU.user_role = ur.id					
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,MU.u_name as engg_name,ur.roleName as role_name "; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function spareRequestMeetingList($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("application_support_zoom",$strWhere." ORDER BY id DESC","");
	}
	public function spareRequestCaseDetails($strWhere = 1) {
		$table = "  spare_part_request as tsr 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id		
						LEFT JOIN
					master_user as MU ON tsr.parent_id = MU.uid
						LEFT JOIN
					role_master as ur ON MU.user_role = ur.id						
					";
		$select = " tsr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ,MU.u_name as engg_name,ur.roleName as role_name"; 
		return	$result=$this->db_lib->fetchSingle($table,$strWhere." ORDER BY tsr.id DESC",$select);
	}
	public function lodgeNewSpareRequest($data) {
				
			$result = $this->db_lib->insert("spare_part_request",$data);
			$app_req_id = $result;
			$imageData = $this->file_manager->multi_upload('spare_request_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['spare_request_images']=$imageData;
		
		
			foreach ($Data['spare_request_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['description']=$data['error_description'];
						$insertData['spare_req_id']=$app_req_id;
						$insertData['spare_request_images']=$value[1];
						$result1 = $this->db_lib->insert("spare_request_images",$insertData);
					}
			}
       return $result;
    }
	public function ammendCaseSpareRequest($data) {
				
			$imageData = $this->file_manager->multi_upload('spare_req_images', $this->case_image, IMG_FORMAT,"",1);
			$Data['spare_req_images']=$imageData;
			
			$insertData['spare_req_id']=$data['spare_req_id'];
			$insertData['description']=$data['error_description'];
			
			foreach ($Data['spare_req_images'] as  $value) {
		
					if($value[0]){
						
						$insertData['spare_req_images']=$value[1];
						$result = $this->db_lib->insert("spare_request_images",$insertData);
					}
			}
			return $result;
    }
	public function closeCaseSpareRequest($data) {
		$id = $data['spare_req_id'];
		$updateData['status'] = 'C';
		$result = $this->db_lib->update("spare_part_request",$updateData," id = $id ");
		return $result;
    }
	
	public function trackingDetails($strWhere = 1) {
		return	$result=$this->db_lib->fetchMultiple("spare_part_delivery_tracker",$strWhere."","");
	}
	
	public function getuserDetails($data) {
		$user_id = $data['user_id']; 
		$table = "master_user as MU";
		$select = "MU.uid,u_email as userEmail";
		$strWhere = " uid = '{$user_id}' ";
		return $this->db_lib->fetchSingle($table,$strWhere,$select);
	}
	public function createdUserDetails($data) {
		$user_id = $data['user_id']; 
		$table = "master_user as MU";
		$select = "MU.uid,u_email as userEmail,u_name as createdUserName";
		$strWhere = " uid = '{$user_id}' ";
		return $this->db_lib->fetchSingle($table,$strWhere,$select);
	}
/*  Freelancer Request List Consultant Data*/
	public function xpertMeetingListConsultant($strWhere) {
		$select = "er.topic_discussion as topicDiscussion,er.start_time as startTime,er.start_url as launchUrl,MU.u_name as customerName,MU.u_email as customerEmail,er.meeting_id as meetingId,er.duration as duration";
		$result=$this->db_lib->fetchMultiple("expert_request as er LEFT JOIN master_user as MU ON er.user_id = MU.uid", $strWhere,$select);
		return $result;
	}
/*  Freelancer Request List Customer Data*/
	public function xpertMeetingListCustomer($strWhere) {
		$select = "er.topic_discussion as topicDiscussion,er.start_time as startTime,er.join_url as joinUrl,MU.u_name as consultantName,MU.u_email as consultantEmail,er.meeting_id as meetingId,er.duration as duration";
		$result=$this->db_lib->fetchMultiple("expert_request as er LEFT JOIN master_user as MU ON er.consultant_id = MU.uid", $strWhere,$select); 
		return $result;
	}
	/* ============Remote Application Request============= */
	
	/*  Remote Application Request List Consultant Data*/
	public function remoteApplicationConsultantRequestList($strWhere) {
		$select = "er.topic_discussion as topicDiscussion,er.start_time as startTime,er.start_url as launchUrl,MU.u_name as customerName,MU.u_email as customerEmail,er.meeting_id as meetingId,er.duration as duration";
		$result=$this->db_lib->fetchMultiple("remote_application_request as er LEFT JOIN master_user as MU ON er.user_id = MU.uid", $strWhere,$select);
		return $result;
	}
/*  Remote Application Request List Customer Data*/
	public function remoteapplicationMeetingListCustomer($strWhere) {
		$select = "er.topic_discussion as topicDiscussion,er.start_time as startTime,er.join_url as joinUrl,MU.u_name as consultantName,MU.u_email as consultantEmail,er.meeting_id as meetingId,er.duration as duration";
		$result=$this->db_lib->fetchMultiple("remote_application_request as er LEFT JOIN master_user as MU ON er.consultant_id = MU.uid", $strWhere,$select); 
		return $result;
	}
	/* =================================================== */
	
/*  Remote Machine On-demand Service Request(Customer) */
    public function remoteMachineOnDemandRequestListCustomer($strWhere = 1) {
		$table = " remote_machine_aggrement_request as RMAR LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid LEFT JOIN master_user as MAU ON RMAR.consultant_id=MAU.uid LEFT JOIN remote_machine_service_invoice as rmsi ON rmsi.rmr_id=RMAR.rmr_id ";
		$select = " RMAR.rmr_id as rmrId,RMAR.company_name as companyName,RMAR.machinebrand as machineBrand,RMAR.machinetype as machineType,RMAR.machinemodel as machineModel,RMAR.machineage as machineAge,RMAR.servicetype as serviceType,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		// $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY RMAR.rmr_id DESC",$select);
	}
	
	public function remoteMachineClassScheduleListCustomer($data) { 
		$rmr_id = $data['rmr_id'];
		$userId = $data['uid'];
		$resultData = $this->db_lib->fetchMultiple('remote_machine_service_tokbox'," rmr_id = {$rmr_id} ",$select);
		if($resultData){
			$table = " remote_machine_aggrement_request as rmar LEFT JOIN remote_machine_service_tokbox  as rmst ON rmar.rmr_id = rmst.rmr_id ";
			$select = " rmar.user_id as user_id,rmst.* ";
			$result = $this->db_lib->fetchMultiple($table," rmar.rmr_id = {$rmr_id} AND  rmar.user_id= {$userId} ",$select);
			return $result;
		}else{
			return $resultData;
		}
		
    }


/*  Remote Machine On-demand Service Request(Consultant) */
    public function remoteMachineOnDemandRequestListConsultant($strWhere = 1) {
		$table = " remote_machine_aggrement_request as RMAR LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid LEFT JOIN master_user as MAU ON RMAR.consultant_id=MAU.uid LEFT JOIN remote_machine_service_invoice as rmsi ON rmsi.rmr_id=RMAR.rmr_id ";
		//$select = " RMAR.company_name as companyName,RMAR.machinebrand as machineBrand,RMAR.machinetype as machineType,RMAR.machinemodel as machineModel,RMAR.machineage as machineAge,RMAR.servicetype as serviceType,RMAR.topic_discussion as topicDiscussion,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		$select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY RMAR.rmr_id DESC",$select);
	}	
	public function remoteMachineClassScheduleList($data) { 
		$rmr_id = $data['rmrId'];
		$userId = $data['uid'];
		$result = $this->db_lib->fetchMultiple("remote_machine_service_tokbox"," rmr_id = {$rmr_id} AND created_by_user = {$userId} ","");
        return $result;
    }
	
	public function remoteMachineOnDemandRequestListCosultant($strWhere) {
		$table = " remote_ondemand_request_consultant as rorc LEFT JOIN remote_machine_aggrement_request as rmar ON rorc.remote_application_id = rmar.rmr_id LEFT JOIN master_user as mu ON rmar.user_id=mu.uid ";
		$select = " rmar.rmr_id as rmrId,rmar.company_name as companyName,rmar.machinebrand as machineBrand,rmar.machinetype as machineType,rmar.machinemodel as machineModel,rmar.machineage as machineAge,rmar.servicetype as serviceType,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select);
		return $result;
	}
/* =============  Remote Programming =============== */
	 public function remoteProgrammingRequestListCustomer($strWhere = 1) {
		$table = "  remote_programming_rfq as rpr LEFT JOIN master_user as MU ON rpr.programmer_id=MU.uid";
		$select = " rpr.rpr_id as rpr_id,rpr.part_name as partName,MU.u_name as programmer_name"; 
		// $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY rpr.rpr_id DESC",$select);
	}
	 public function remoteProgrammingRequestListCosultant($strWhere = 1) {
		$table = "  remote_programming_rfq as rpr LEFT JOIN master_user as MU ON rpr.customer_user_id=MU.uid";
		$select = " rpr.rpr_id as rpr_id,rpr.part_name as partName,MU.u_name as customerName"; 
		// $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY rpr.rpr_id DESC",$select);
	}
	
	 public function remoteProgrammingClassScheduleListConsultant($data){
		$rpr_id =  $data['rpr_id'];
		$strWhere = " rpr_id = $rpr_id ";
		return	$result=$this->db_lib->fetchMultiple('remote_programming_zoom as rpz',$strWhere." ORDER BY id DESC","rpz.id as id,rpz.start_url as startUrl,rpz.start_time as startTime,rpz.host_id as hostId,rpz.uuid as uuid,rpz.meeting_id as meetingId,rpz.duration as duration");
	}	
	 public function remoteProgrammingClassScheduleListCustomer($data){
		$rpr_id =  $data['rpr_id'];
		$strWhere = " rpr_id = $rpr_id ";
		return	$result=$this->db_lib->fetchMultiple('remote_programming_zoom as rpz',$strWhere." ORDER BY id DESC","rpz.id as id,rpz.join_url as joinUrl,rpz.start_time as startTime,rpz.host_id as hostId,rpz.uuid as uuid,rpz.meeting_id as meetingId,rpz.duration as duration");
	}
/* ============= END Remote Programming =============== */
	  public function liveDemoRequestListCustomer($strWhere = 1) {
		$table ="  machine_video_request as mvr 
						LEFT JOIN 
					master_user as MU ON mvr.user_id=MU.uid 
						LEFT JOIN 
					master_user as MAU ON mvr.supplier_id=MAU.uid
						LEFT JOIN 
					machine_details as md ON mvr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	
						
				";
		$select = " mvr.mvr_id as mvrId,MAU.u_name as supplier_name,MU.u_name as user_Name,md.md_id,md.machine_unique_id,mb.brand_name,mc.category_name,mbm.model_name "; 
		/* return	$result=$this->db_lib->fetchMultiple($table,$strWhere." AND  supplier_id<>0 ORDER BY mvr.mvr_id DESC",$select); */
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY mvr.mvr_id DESC",$select);
	} 
	public function liveDemoRequestListSupplier($strWhere = 1) {
		$table = " machine_video_request as mvr 
						LEFT JOIN 
					master_user as MU ON mvr.user_id=MU.uid 
						LEFT JOIN 
					master_user as MAU ON mvr.supplier_id=MAU.uid 
						LEFT JOIN 
					machine_details as md ON mvr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id";
		$select = " mvr.mvr_id as mvrId,MAU.u_name as supplier_name,MU.u_name as customer_name ,md.md_id,md.machine_unique_id,mb.brand_name,mc.category_name,mbm.model_name "; 
		/* return	$result=$this->db_lib->fetchMultiple($table,$strWhere." AND  supplier_id<>0 ORDER BY mvr.mvr_id DESC",$select); */
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere."  ORDER BY mvr.mvr_id DESC",$select);
	} 
	public function liveDemoRequestClassScheduleListCustomer($data) { 
		$mvr_id = $data['mvr_id'];
		$result = $this->db_lib->fetchMultiple("live_machine_support_zoom  as msz LEFT JOIN 
					master_user as MU ON msz.created_by=MU.uid "," mvr_id = {$mvr_id} "," msz.*,MU.u_name as engg_name");
        return $result;
    }
	public function liveMachineMeetingSummaryDetails($strWhere) { 
		$result = $this->db_lib->fetchSingle("live_machine_support_zoom ",$strWhere,"");
        return $result;
    }

	public function updateMeetingStatus($data) { 
		$id = $data['id'];
		$result = $this->db_lib->update("live_machine_support_zoom ",$data," id = {$id} ");
        return $result;
    }
	public function liveDemoRequestClassScheduleListSupplier($data) { 
		$mvr_id = $data['mvr_id'];
		$result = $this->db_lib->fetchMultiple("live_machine_support_zoom  as msz LEFT JOIN 
					master_user as MU ON msz.created_by=MU.uid "," mvr_id = {$mvr_id} "," msz.*,MU.u_name as engg_name");
        return $result;
    }
	/* =============== Remote service aggreement ========  */
	public function remoteServiceAggrementRequestListCustomer($strWhere = 1) {
		$table = " remote_application_aggrement_request as RMAR  LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid   LEFT JOIN master_user as MAU ON RMAR.accepted_consultant_id=MAU.uid ";
		$select = " RMAR.*,MU.u_name as user_Name,MAU.u_name as consultant_name "; 
		// $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY RMAR.rar_id DESC",$select);
	}
	public function remoteServiceAggrementRequestListCosultant($strWhere = 1) {
		$table = " remote_application_aggrement_request as RMAR  LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid   LEFT JOIN master_user as MAU ON RMAR.accepted_consultant_id=MAU.uid ";
		$select = " RMAR.*,MU.u_name as user_Name,MAU.u_name as consultant_name "; 
		// $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY RMAR.rar_id DESC",$select);
	}
	public function remoteServiceAggrementClassRequestListCustomer($data) { 
		$rar_id = $data['rar_id'];
		$table = " remote_application_braincert as rmst LEFT JOIN remote_application_aggrement_request as rmar  ON rmar.rar_id  = rmst.rar_id ";
		$select = " rmar.user_id as user_id,rmst.rab_id as rabId,rmst.startDate as startDate,rmst.start_time as startTime,rmst.end_time as endTime,rmst.tokbox_token as tokboxToken,rmst.tokbox_sessionid as tokboxSessionid,class_title as classTitle  ";
		$result = $this->db_lib->fetchMultiple($table," rmar.rar_id = {$rar_id} ",$select);
        return $result;
    }
	public function remoteServiceAggrementClassRequestListConsultant($data) { 
		$rar_id = $data['rar_id'];
		$table = " remote_application_aggrement_request as rmar LEFT JOIN remote_application_braincert as rmst ON rmar.rar_id  = rmst.rar_id ";
		$select = " rmar.user_id as user_id,rmst.rab_id as rabId,rmst.startDate as startDate,rmst.start_time as startTime,rmst.end_time as endTime,rmst.tokbox_token as tokboxToken,rmst.tokbox_sessionid as tokboxSessionid,class_title as classTitle  ";
		$result = $this->db_lib->fetchMultiple($table," rmar.rar_id = {$rar_id} ",$select);
        return $result;
    }
/* =====Community======== */
	public function communityList($data) {
		$limit = $data['limit'];
		$last_id = $data['last_id'];
		$table = " community as cm LEFT JOIN master_user as mu ON mu.uid = cm.admin_user LEFT JOIN user_contact as uc ON cm.admin_user = uc.user_id LEFT JOIN master_user as MUC ON cm.moderator_user=MUC.uid";
		$result = $this->db_lib->fetchMultiple($table," status='A' AND id>{$last_id}"." LIMIT {$limit} ","cm.id,title,description,created_at,admin_user,moderator_user,mu.u_name as createdByUserName,mu.u_email as createdByUserEmail,uc.person_designation as creatorDesignation,MUC.u_name as moderatorUserName,MUC.u_email as moderatorUserEmail");
        return $result;
    }
	public function topicList($data) {
		$limit = $data['limit'];
		$last_id = $data['last_id'];
		$community_id = $data['community_id'];

		$result = $this->db_lib->fetchMultiple("topics"," community_id = {$community_id} AND id>{$last_id}"." LIMIT {$limit} ","topics.id,title,created_at,views");
        return $result;
    }
	public function updateshareCommunity($data) {
		
		$result = $this->db_lib->insert("community_invite",$data);
        return $result;
    }
	public function joinCommunity($data) {
		$data1['community_id'] = $data['community_id'];
		$data1['community_invite_email'] = $data['user_email'];
		$result = $this->db_lib->insert("community_invite",$data1);
        return $result;
    }
	public function checkEmailExist($data) {
		$community_id = $data['community_id'];
		$community_invite_email = $data['community_invite_email'];
		return $this->db_lib->fetchSingle('community_invite',"  community_id = '{$community_id}' AND community_invite_email = '{$community_invite_email}' ","");
    }
	public function commentListbyTopics($data) {
		$topic_id = $data['topic_id'];
		$limit = $data['limit'];
		$last_id = $data['last_id'];

		$parent_id = 0;
		return $this->db_lib->fetchMultiple('posts as posts LEFT JOIN master_user as mu ON mu.uid=posts.uid'," topic_id  = '{$topic_id}' AND parent_id = '{$parent_id}' AND id>{$last_id}"." LIMIT {$limit}","posts.id,content,posts.uid,topic_id,views,created_at,mu.u_name as commentBy,mu.u_avatar as userProfileImage");
    }
	public function replyListbyComment($data) {
		$parent_id = $data['parent_id'];
		//$parent_id = $data['parent_id'];
		//$parent_id = 0;
		return $this->db_lib->fetchMultiple('posts as ps LEFT JOIN master_user as mu ON ps.uid = mu.uid '," parent_id = '{$parent_id}' ","ps.id,content,topic_id,views,created_at,mu.u_name as postBy,mu.u_avatar as postByProfileImage ");
    }
	public function attachementListForComment($data) {
		$post_id = $data['post_id'];
		return $this->db_lib->fetchMultiple('post_attachments as PA LEFT JOIN master_user as mu ON PA.uid=mu.uid'," post_id = '{$post_id}' "," PA.*,mu.u_name as attachmentBy,mu.u_avatar as userProfileImage");
    }
	public function communityCreatorAndModrator($data) {
		$community_id = $data['community_id'];
		$table = " community as cm LEFT JOIN master_user as mu ON mu.uid = cm.admin_user LEFT JOIN user_contact as uc ON cm.admin_user = uc.user_id LEFT JOIN master_user as MUC ON cm.moderator_user=MUC.uid";
		return $result = $this->db_lib->fetchSingle($table," id = '{$community_id}' ","cm.id,title,description,created_at,admin_user,moderator_user,mu.u_name as createdByUserName,mu.u_email as createdByUserEmail,mu.u_avatar as creatorProfileImage,uc.person_designation as creatorDesignation,MUC.u_name as moderatorUserName,MUC.u_email as moderatorUserEmail,MUC.u_avatar as moderatorProfileImage");
    }
	
	public function communityAllMemberList($data){
		$community_id = $data['community_id'];
		return $this->db_lib->fetchMultiple('community_invite as ci LEFT JOIN master_user as mu ON ci.community_invite_email=mu.u_email',"  community_id = '{$community_id}' AND active_status='Y' "," ci.community_id,ci.community_invite_email,mu.u_name as userName,mu.u_avatar as userProfileImage ");
		
	}
	
}