<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class V1_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
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
		$table = " machine_video_request as mvr LEFT JOIN master_user as MU ON mvr.user_id=MU.uid LEFT JOIN master_user as MAU ON mvr.supplier_id=MAU.uid";
		$select = " mvr.mvr_id as mvrId,MAU.u_name as supplier_name,MU.u_name as user_Name"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." AND  supplier_id<>0 ORDER BY mvr.mvr_id DESC",$select);
	} 
	public function liveDemoRequestListSupplier($strWhere = 1) {
		$table = " machine_video_request as mvr LEFT JOIN master_user as MU ON mvr.user_id=MU.uid LEFT JOIN master_user as MAU ON mvr.supplier_id=MAU.uid";
		$select = " mvr.mvr_id as mvrId,MAU.u_name as user_Name,MU.u_name as supplier_name"; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." AND  supplier_id<>0 ORDER BY mvr.mvr_id DESC",$select);
	} 
	public function liveDemoRequestClassScheduleListCustomer($data) { 
		$mvr_id = $data['mvr_id'];
		$result = $this->db_lib->fetchMultiple("machine_video_request_tokbox"," mvr_id = {$mvr_id} ","");
        return $result;
    }
	public function liveDemoRequestClassScheduleListSupplier($data) { 
		$mvr_id = $data['mvr_id'];
		$result = $this->db_lib->fetchMultiple("machine_video_request_tokbox"," mvr_id = {$mvr_id} ","");
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