<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class rapidprototyping_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->digitalmanufacturing_path="uploads/digitalmanufacturing/";
			$this->rfq_quotation_path="uploads/cnc_machining_uploaded_quotation/";
			$this->rfq_path="uploads/digitalmanufacturing_rfq_images/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
		
			parent::__construct();
    }

   
	/* Case Study CRUD operation */
	 
	 public function findSingleLaserProcessing($strWhere = 1) {
		return $this->db_lib->fetchSingle('rapid_prototyping', $strWhere,'');
	}
	 
	
    public function findMultipleRapidPrototyping($strWhere) {
		$result=$this->db_lib->fetchMultiple("rapid_prototyping", $strWhere,"");//exit; 
		return $result;
	}
	
    public function createRapidPrototyping($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('rapid_prototyping_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["rapid_prototyping_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("rapid_prototyping", $arrData); 
    }
	
	public function updateRapidPrototyping($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('rapid_prototyping_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["rapid_prototyping_image"] = $data[1];
		$result = $this->db_lib->update("rapid_prototyping", $arrData, "rapid_prototyping_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteRapidPrototyping($id) { 
		$data = $this->db_lib->fetchSingle("rapid_prototyping", "rapid_prototyping_id = $id");
		if($data)
			$this->file_manager->delete($this->rapid_prototyping_image, $data["rapid_prototyping_image"]);
		
		$result = $this->db_lib->delete("rapid_prototyping", "rapid_prototyping_id = " . $id);
        return $result;
    }
    
	public function updatePublishRapidPrototyping($data){
		// get total records
		$ids = $data["rapid_prototyping_id"];
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
				$result = $this->db_lib->update("rapid_prototyping", $arrData, "rapid_prototyping_id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	
	/*Additive Manufacturing Processes Add / Insert / Update API  */
	 
   public function findSingleRapidprototypingOnlineFeatures($strWhere = 1) {
		return $this->db_lib->fetchSingle('rapid_prototyping_online_features', $strWhere,'');
	}
	 

	public function findMultipleRapidprototypingOnlineFeatures($strWhere) {
		$result=$this->db_lib->fetchMultiple("rapid_prototyping_online_features", $strWhere,"");//exit; 
		return $result;
	}


    public function createRapidPrototypingOnlineFeatures($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('material_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["material_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("rapid_prototyping_online_features", $arrData); 
    }
	
	public function updateRapidPrototypingOnlineFeatures($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('material_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["material_image"] = $data[1];
		$result = $this->db_lib->update("rapid_prototyping_online_features", $arrData, "online_feature_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteRapidprototypingOnlineFeatures($id) { 
		$data = $this->db_lib->fetchSingle("rapid_prototyping_online_features", "online_feature_id = $id");
		if($data)
			$this->file_manager->delete($this->additive_manufacturing_process_image, $data["material_image"]);
		
		$result = $this->db_lib->delete("rapid_prototyping_online_features", "online_feature_id = " . $id);
        return $result;
    }
    
	public function updatePublishRapidprototypingOnlineFeatures($data){
		// get total records
		$ids = $data["online_feature_id"];
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
				$result = $this->db_lib->update("rapid_prototyping_online_features", $arrData, "online_feature_id = ". $id);
			}
			return true;
		}
		return false;
	}

	public function createRfq($arrayData){
		$data = $this->file_manager->upload('attach_drawing', $this->rfq_path, IMG_FORMAT,"");
		
		if($data[0])
			$arrayData["attach_drawing"] = $data[1];
		
		$arrayData["requested_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("rapid_prototyping_rfq", $arrayData); 
		return $result;
	}

	public function findMultipleSupplier($strWhere) {
		
		return	$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
	}

	public function findMultipleRequestList($strWhere){
		$table = " rapid_prototyping_rfq as dmr LEFT JOIN  master_user as MU ON dmr.customer_user_id = MU.uid ";
		$select = " dmr.*,MU.u_name as uname ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select); 
		return $result;
	}

	/* Assign Programmers */
	public function assignSuppliers($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["dmr_id"] = $data['dmr_id'];
					$arrData["supplier_id"] = $id;
					$arrData["request_supplier_date"] = date('Y-m-d');
					$arrData['request_status'] =  "P";
					$dmr_id = $arrData["dmr_id"];
					$strWhere = " dmr_id = $dmr_id AND supplier_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('rapid_prototyping_rfq_request_supplier', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("rapid_prototyping_rfq_request_supplier", $arrData);
					}else{
						$arrayData['dmr_id'] = $old_result['dmr_id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier", $arrayData," dmr_id = ".$arrayData['dmr_id']);
						$arrData['request_status'] = "P";
						$result = $this->db_lib->update("rapid_prototyping_rfq", $arrData," dmr_id = ".$arrayData['dmr_id']);
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
	

	public function requestListAsUser($uid){
		  
		$result=$this->db_lib->fetchMultiple("rapid_prototyping_rfq drrs JOIN rapid_prototyping_rfq dmr ON drrs.dmr_id=dmr.dmr_id", "supplier_id = '$uid' ","drrs.*,part_name"); 
		return $result;
	}
	/* REQUEST LIST OF PERTICULAR Suppplier */
	public function rapidprototypingBySupport($strWhere) {
		$table = " rapid_prototyping_rfq as rfq LEFT JOIN rapid_prototyping_rfq_request_supplier as drrs ON rfq.dmr_id = drrs.dmr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,drrs.dmr_id,drrs.drrs_id,drrs.request_status,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select );
		return $result;
	}
	
	public function findSingleDetailsSupplierReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('rapid_prototyping_rfq', $strWhere,"");
	}

	public function findSingle_remote_Rfq_consultant($strWhere = 1) {
		return $this->db_lib->fetchSingle('rapid_prototyping_rfq_request_supplier', $strWhere,"");
	}

	 /**

	 * Additive Manufacturing Supplier List

	 * Created Date 19-07-2018 Deepak Shinde

	 * @access public

	 * @param  rarc_id

	 * @return array of requestList

	 */ 

    public function RapidprototypingSuppliers($dmrID) { 

        $strWhere = "dmr_id = '$dmrID' ";
		$result = $this->db_lib->fetchMultiple("rapid_prototyping_rfq_request_supplier AMRR JOIN master_user MU ON AMRR.supplier_id=MU.uid", $strWhere."","MU.u_name,MU.u_email, AMRR.dmr_id,AMRR.drrs_id,AMRR.qoutation_date,AMRR.supplier_id,AMRR.request_status");

        return $result;

    }
	

	public function findSingle_Rapidprototyping_quote_supplier($strWhere = 1) {
		return $this->db_lib->fetchSingle('rapid_prototyping_rfq_request_supplier', $strWhere,"");
	}

	public function SingleRapidprototypingSuppliers($strWhere) {
		return $this->db_lib->fetchSingle('rapid_prototyping_rfq', $strWhere,"");
	}
	

	public function RapidprototypingSupplierListAcceptByadmin($data) { 

		$drrs_id = $data['drrs_id'];
		$data['request_status']='QS';

        $data1 = $this->file_manager->upload('quotation_uploaded', $this->rfq_quotation_path, MIX_FORMAT,"");
		//print_r($data1);exit;

		if($data1[0])
			$data["uploaded_quotation"] = $data1[1];

		$result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier  ",$data, " drrs_id = ".$drrs_id);

		$result_data = $this->db_lib->fetchSingle("rapid_prototyping_rfq_request_supplier  "," drrs_id = ".$drrs_id);



		$supplier_id = $result_data['supplier_id'];

		$dmr_id = $result_data['dmr_id'];

		$updateData['supplier_id'] = $supplier_id;
		$updateData['request_status'] = "QS";
		$result = $this->db_lib->update("rapid_prototyping_rfq",$updateData, " dmr_id = ".$dmr_id);

        return $result;

    }

	
  public function findSingle_rapid_Rfq_quotaion($strWhere) {
		return $this->db_lib->fetchSingle('rapid_prototyping_rfq_request_supplier', $strWhere,"");
	}

	// accept cutomer quotation
    	public function RapidSupplierListAcceptBycustomer($drrs_id) { 

		$data['request_status']='C';

		$result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier  ",$data, " drrs_id = ".$drrs_id);
	    $result_data = $this->db_lib->fetchSingle("rapid_prototyping_rfq_request_supplier  "," drrs_id = ".$drrs_id);
		$dmr_id = $result_data['dmr_id'];
		$updateData['request_status'] = "C";
		$result = $this->db_lib->update("rapid_prototyping_rfq",$updateData, " dmr_id = ".$dmr_id);

        return $result;

    }
    
    // accept cutomer quotation
    	public function RapidSupplierListAcceptByreject($drrs_id) { 

		$data['request_status']='R';

		$result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier  ",$data, " drrs_id = ".$drrs_id);
 		$result_data = $this->db_lib->fetchSingle("rapid_prototyping_rfq_request_supplier  "," drrs_id = ".$drrs_id);
		$dmr_id = $result_data['dmr_id'];
		$updateData['request_status'] = "R";
		$result = $this->db_lib->update("rapid_prototyping_rfq",$updateData, " dmr_id = ".$dmr_id);

        return $result;

    }
	
	
}
?>