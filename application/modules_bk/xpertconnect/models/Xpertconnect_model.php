<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Xpertconnect_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->rfq_path="uploads/rfq_application/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			$this->xpertconnect_path="uploads/xpertconnect/";
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('xpertconnect_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("xpertconnect_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["xpertconnect_cat_entry_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('xpertconnectImage', $this->xpertconnect_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["xpertconnect_cat_image"] = $data1[1];
		return $event_id = $this->db_lib->insert("xpertconnect_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["xpertconnect_cat_update_date"] = date('Y-m-d');
		$data = $this->file_manager->update('xpertconnectImage', $this->xpertconnect_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["xpertconnect_cat_image"] = $data[1];
		
		$result = $this->db_lib->update("xpertconnect_category", $arrData, "xpertconnect_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 if($data)
			$this->file_manager->delete($this->xpertconnect_path, $data["xpertconnect_cat_image"]);
		$result = $this->db_lib->delete("xpertconnect_category", "xpertconnect_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["xpertconnect_cat_id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				//$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("xpertconnect_category", $arrData, "xpertconnect_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}

   /* public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('event_category', $strWhere,'');
	}*/
	public function findSingleDetailsCustomerPrgrammingReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_rfq', $strWhere,"");
	}
	
	public function findMultipleProgrammer($strWhere) {
		
		$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
		return $result;
	}
	public function findMultipleUserList($strWhere) {
		
		$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
		return $result;
	}
	public function findMultipleRequestList($strWhere){
		$table = " remote_application_rfq as rpr LEFT JOIN  master_user as MU ON rpr.customer_user_id = MU.uid ";
		$select = " rpr.*,mu.u_name as uname ";
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
	public function assignProgrammers($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["rpr_id"] = $data['rpr_id'];
					$arrData["programmer_id"] = $id;
					$arrData["request_programmer_date"] = date('Y-m-d');
					$rpr_id = $arrData["rpr_id"];
					$strWhere = " rpr_id = $rpr_id AND programmer_id = '$id'";
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
	 public function findFeaturedListProgrammer($strWhere = 1) {
		return $this->db_lib->fetchSingle('expert_featured_for_this_month', $strWhere,'');
	}
	 public function findFeaturedListRemoteTraining($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_training_featured_for_this_month', $strWhere,'');
	}
	 public function findFeaturedListRemoteApplication($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_featured_for_this_month', $strWhere,'');
	}
	 public function findFeaturedListRemoteProgramming($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_programming_featured_for_this_month', $strWhere,'');
	}
	public function updateXpertConnect($arrData){
		$result = $this->db_lib->update("expert_featured_for_this_month", $arrData, "id = 1 ");
		return $result;
	}
	public function updateRemoteTraining($arrData){
		$result = $this->db_lib->update("remote_training_featured_for_this_month", $arrData, "id = 1 ");
		return $result;
	}
	public function updateRemoteApplication($arrData){
		$result = $this->db_lib->update("remote_application_featured_for_this_month", $arrData, "id = 1 ");
		return $result;
	}
	public function updateRemoteProgramming($arrData){
		$result = $this->db_lib->update("remote_programming_featured_for_this_month", $arrData, "id = 1 ");
		return $result;
	}
	
}
?>