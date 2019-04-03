<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Remoteapplication_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->rfq_path="uploads/rfq_application/";
			$this->rfq_quotation_path="uploads/remote_application_uploaded_quotation/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('event_category', $strWhere,'');
	}
	public function findSingleDetailsCustomerPrgrammingReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_rfq', $strWhere,"");
	}
	public function findMultipleProgrammer($strWhere) {
		
		$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
		return $result;
	}
	public function findSingleDetailsStatusRFQ($strWhere = 1) {
		return $this->db_lib->fetchSingle(' remote_application_consultant_request_programmer', $strWhere,"");
	}
	
	public function findMultipleApplicationEngineer($strWhere) {
		
		$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
		return $result;
	}
	public function findMultipleRequestList($strWhere){
		$table = " remote_application_rfq as rpr LEFT JOIN  master_user as MU ON rpr.customer_user_id = MU.uid LEFT JOIN remote_application_consultant_request_programmer as racrp ON rpr.rpr_id = racrp.rpr_id";
		$select = " rpr.*,racrp.request_status as quotation_status,MU.u_name as uname ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY rpr.rpr_id DESC",$select); 
		return $result;
	}
	/* REQUEST LIST OF PERTICULAR CONSULTANT */
	public function remote_application_consultant($strWhere) {
		$table = " remote_application_rfq as rfq LEFT JOIN remote_application_consultant_request_programmer as raap ON rfq.rpr_id = raap.rpr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,raap.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select);
		return $result;
	}
	/* Assign Programmers */
	public function assignApplicationEngineer($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["rpr_id"] = $data['rpr_id'];
					$arrData["applicationengineer_id"] = $id;
					$arrData["request_programmer_date"] = date('Y-m-d');
					$arrData["request_status"] = 'P';
					$rpr_id = $arrData["rpr_id"];
					$strWhere = " rpr_id = $rpr_id AND applicationengineer_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('remote_application_consultant_request_programmer', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("remote_application_consultant_request_programmer", $arrData);
					}else{
						$arrayData['rpr_id'] = $old_result['rpr_id'];
						$arrayData['request_programmer_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("remote_application_consultant_request_programmer", $arrayData," rpr_id = ".$arrayData['rpr_id']);
					}
					/* SMS notification on user mobile */
					$mobileNO = $this->db_lib->fetchSingle('master_user'," uid= '$id' ",'u_mobileno');
					if($mobileNO['u_mobileno']){
						sms_send($mobileNO['u_mobileno']," You have new enquiry for the quotation.	Please visit Teranex dashboard");  
					}
					
				}	
			}
			return true;
		}
		return false;
	}
	/**
	 *  create Rfq application 
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function createRfq($arrayData){
		$data = $this->file_manager->upload('attach_drawing', $this->rfq_path, IMG_FORMAT,"");
		
		if($data[0])
			$arrayData["attach_drawing"] = $data[1];
		
		$arrayData["requested_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("remote_application_rfq", $arrayData); 
		return $result;
	}
	
	public function findSingle_remote_application_consultant($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_consultant_request_programmer', $strWhere,"");
	}


	/* Remote Application video Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function VideoRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert(" remote_application_video_request",$data); 
        return $result;
    }

    /*Remote Application Video Request List
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function VideoRequestList($userId){
	 
		$result=$this->db_lib->fetchMultiple("remote_application_video_request "," user_id = $userId ", ""); 
		return $result;
	}
	public function VideoRequestListSupplier($userId){
	 
		$result=$this->db_lib->fetchMultiple("remote_application_video_request as ravr LEFT JOIN master_user as MU on ravr.user_id = MU.uid "," supplier_id = $userId ", " ravr.*,MU.u_name as UserName "); 
		return $result;
	}

	 public function findMultipleVideoRequest($strWhere = 1) {
		$table = " remote_application_video_request AS ravr LEFT JOIN master_user AS Mu ON ravr.user_id=Mu.uid";
		$select = " ravr.*,Mu.u_name as username";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}

	/* Remote Machine Video Request (23-Apr-18) */
	public function findMultipleSupplier($strWhere) {
		$strWhere = " u_user_type = 'S' ";
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");
		return $result;
	}
	public function assignSupplier($data){
		$user_id = $data['user_id'];
		$ravr_id = $data['ravr_id'];
		$arrData['supplier_status'] = 'H';
		$arrData['supplier_id'] = $user_id;
		$result = $this->db_lib->update("remote_application_video_request", $arrData, "ravr_id = ".$ravr_id );
		return $result;
	}


	/******* Remoate Application RFQ Request *************/

	public function remote_application_rfq_request($strWhere) {
		$table = " remote_application_rfq as rfq LEFT JOIN remote_application_consultant_request_programmer as raap ON rfq.rpr_id = raap.rpr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,raap.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select);
		return $result;
	}

	public function findSingle_quote_engineer($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_consultant_request_programmer', $strWhere,"");
	}


    public function RemoteApplicationServiceEngineer($rpr_id) { 

        $strWhere = "rpr_id = '$rpr_id' ";
		$result = $this->db_lib->fetchMultiple("remote_application_consultant_request_programmer RACRP JOIN master_user MU ON RACRP.applicationengineer_id=MU.uid", $strWhere."AND request_status='QG'","MU.u_name,MU.u_email, RACRP.rpr_id,RACRP.racrp_id,RACRP.request_status,RACRP.qoutation_date,RACRP.qoutation_date,RACRP.applicationengineer_id");

        return $result;

    }
	
	public function SingleRemoteApplicationSE($strWhere) {
		return $this->db_lib->fetchSingle('remote_application_rfq', $strWhere,"");
	}
	
	public function RemoteApplicationRFQAcceptByadmin($data) { 


		$racrp_id = $data['racrp_id'];
		$data['request_status']='QS';

        $data1 = $this->file_manager->upload('quotation_uploaded', $this->rfq_quotation_path, MIX_FORMAT,"");
		//print_r($data1);exit;

		if($data1[0])
			$data["uploaded_quotation"] = $data1[1];

		$result = $this->db_lib->update("remote_application_consultant_request_programmer  ",$data, " racrp_id = ".$racrp_id);
		$result_data = $this->db_lib->fetchSingle("remote_application_consultant_request_programmer  "," racrp_id = ".$racrp_id);
		$applicationengineer_id = $result_data['applicationengineer_id'];
		$rpr_id = $result_data['rpr_id'];
		$updateData['applicationengineer_id'] = $applicationengineer_id;
		$result = $this->db_lib->update("remote_application_rfq",$updateData, " rpr_id = ".$rpr_id);
        return $result;
    }

     // accept cutomer quotation
    	public function RemoteApplicationSEQuotationAcceptBycustomer($racrp_id) { 
		$data['request_status']='C';
		$result = $this->db_lib->update("remote_application_consultant_request_programmer  ",$data, " racrp_id = ".$racrp_id);

        return $result;
    }
    
    // accept cutomer quotation
    public function RemoteApplicationSEQuotationAcceptByreject($racrp_id) { 
		$data['request_status']='R';
		$result = $this->db_lib->update("remote_application_consultant_request_programmer  ",$data, " racrp_id = ".$racrp_id);
        return $result;

    }

	
	
}
?>