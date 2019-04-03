<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class laserprocessing_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->digitalmanufacturing_path="uploads/digitalmanufacturing/";
			$this->rfq_path="uploads/digitalmanufacturing_rfq_images/";
			$this->rfq_quotation_path="uploads/laser_processing_uploaded_quotation/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
		
			parent::__construct();
    }

   
	/* Case Study CRUD operation */
	 
	 public function findSingleLaserProcessing($strWhere = 1) {
		return $this->db_lib->fetchSingle('laser_processing_material_description', $strWhere,'');
	}
	 
	
    public function findMultipleLaserProcessing($strWhere) {
		$result=$this->db_lib->fetchMultiple("laser_processing_material_description", $strWhere,"");//exit; 
		return $result;
	}
	
    public function createLaserProcessing($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('laser_processing_material_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["laser_processing_material_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("laser_processing_material_description", $arrData); 
    }
	
	public function updateLaserProcessing($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('laser_processing_material_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["laser_processing_material_image"] = $data[1];
		$result = $this->db_lib->update("laser_processing_material_description", $arrData, "laser_processing_material_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteLaserProcessing($id) { 
		$data = $this->db_lib->fetchSingle("laser_processing_material_description", "laser_processing_material_id = $id");
		if($data)
			$this->file_manager->delete($this->laser_processing_material_image, $data["laser_processing_material_image"]);
		
		$result = $this->db_lib->delete("laser_processing_material_description", "laser_processing_material_id = " . $id);
        return $result;
    }
    
	public function updatePublishLaserProcessing($data){
		// get total records
		$ids = $data["laser_processing_material_id"];
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
				$result = $this->db_lib->update("laser_processing_material_description", $arrData, "laser_processing_material_id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	
	/*Additive Manufacturing Processes Add / Insert / Update API  */
	 
 public function findSingleLaserProcessingMaterial($strWhere = 1) {
		return $this->db_lib->fetchSingle('laser_processing_materials', $strWhere,'');
	}
	 

	public function findMultipleLaserProcessingMaterial($strWhere) {
		$result=$this->db_lib->fetchMultiple("laser_processing_materials", $strWhere,"");//exit; 
		return $result;
	}


    public function createLaserProcessingMaterial($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('material_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["material_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("laser_processing_materials", $arrData); 
    }
	
	public function updateLaserProcessingMaterial($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('material_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["material_image"] = $data[1];
		$result = $this->db_lib->update("laser_processing_materials", $arrData, "material_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteLaserProcessingMaterial($id) { 
		$data = $this->db_lib->fetchSingle("laser_processing_materials", "material_id = $id");
		if($data)
			$this->file_manager->delete($this->additive_manufacturing_process_image, $data["material_image"]);
		
		$result = $this->db_lib->delete("laser_processing_materials", "material_id = " . $id);
        return $result;
    }
    
	public function updatePublishLaserProcessingMaterial($data){
		// get total records
		$ids = $data["material_id"];
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
				$result = $this->db_lib->update("laser_processing_materials", $arrData, "material_id = ". $id);
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
		$result=$this->db_lib->insert("laser_processing_rfq", $arrayData); 
		return $result;
	}

	public function findMultipleSupplier($strWhere) {
		
		return	$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
	}

	public function findMultipleRequestList($strWhere){
		$table = " laser_processing_rfq as dmr LEFT JOIN  master_user as MU ON dmr.customer_user_id = MU.uid ";
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
					$old_result = $this->db_lib->fetchSingle('laser_processing_rfq_request_supplier', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("laser_processing_rfq_request_supplier", $arrData);
					}else{
						$arrayData['dmr_id'] = $old_result['dmr_id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("laser_processing_rfq_request_supplier", $arrayData," dmr_id = ".$arrayData['dmr_id']);
						$arrData['request_status'] = "P";
						$result = $this->db_lib->update("laser_processing_rfq", $arrData," dmr_id = ".$arrayData['dmr_id']);
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
		  
		$result=$this->db_lib->fetchMultiple("laser_processing_rfq drrs JOIN laser_processing_rfq dmr ON drrs.dmr_id=dmr.dmr_id", "supplier_id = '$uid' ","drrs.*,part_name"); 
		return $result;
	}
	/* REQUEST LIST OF PERTICULAR Suppplier */
	public function laserprocessingBySupport($strWhere) {
		$table = " laser_processing_rfq as rfq LEFT JOIN laser_processing_rfq_request_supplier as drrs ON rfq.dmr_id = drrs.dmr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,drrs.dmr_id,drrs.drrs_id,drrs.request_status,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select );
		return $result;
	}
	
	public function findSingleDetailsSupplierReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('laser_processing_rfq', $strWhere,"");
	}

	public function findSingle_remote_Rfq_consultant($strWhere = 1) {
		return $this->db_lib->fetchSingle('laser_processing_rfq_request_supplier', $strWhere,"");
	}

	 /**

	 * Additive Manufacturing Supplier List

	 * Created Date 19-07-2018 Deepak Shinde

	 * @access public

	 * @param  rarc_id

	 * @return array of requestList

	 */ 

    public function LaserprocessingSuppliers($dmrID) { 

        $strWhere = "AMRR.dmr_id = '$dmrID' ";
		$result = $this->db_lib->fetchMultiple("laser_processing_rfq_request_supplier AMRR JOIN master_user MU ON AMRR.supplier_id=MU.uid", $strWhere."","MU.u_name,MU.u_email, AMRR.dmr_id,AMRR.drrs_id,AMRR.qoutation_date,AMRR.request_supplier_date,AMRR.request_status,AMRR.supplier_id");

        return $result;

    }
	

	public function findSingle_Laserprocessing_quote_supplier($strWhere = 1) {
		return $this->db_lib->fetchSingle('laser_processing_rfq_request_supplier', $strWhere,"");
	}

	public function SingleLaserprocessingSuppliers($strWhere) {
		return $this->db_lib->fetchSingle('laser_processing_rfq', $strWhere,"");
	}
	

	public function LaserprocessingSupplierListAcceptByadmin($data)
      { 
            
        $drrs_id = $data['drrs_id'];
		$data['request_status']='QS';

        $data1 = $this->file_manager->upload('quotation_uploaded', $this->rfq_quotation_path, MIX_FORMAT,"");
		//print_r($data1);exit;

		if($data1[0])
	        $data["uploaded_quotation"] = $data1[1];
		
		$result = $this->db_lib->update("laser_processing_rfq_request_supplier  ",$data, " drrs_id = ".$drrs_id);

		$result_data = $this->db_lib->fetchSingle("laser_processing_rfq_request_supplier  "," drrs_id = ".$drrs_id);

		$supplier_id = $result_data['supplier_id'];

		$dmr_id = $result_data['dmr_id'];

		$updateData['supplier_id'] = $supplier_id;
		$updateData['request_status'] = "QS";
		$result = $this->db_lib->update("laser_processing_rfq",$updateData, " dmr_id = ".$dmr_id);

                return $result;

      }
    
    // view qutation
        
        public function findSingle_laser_Rfq_quataion($strWhere) {
		return $this->db_lib->fetchSingle('laser_processing_rfq_request_supplier', $strWhere,"");
	}
        
        
        // accept cutomer quotation
   public function LaserProcessingSupplierListAcceptBycustomer($drrs_id) 
     { 

		$data['request_status']='C';

		$result = $this->db_lib->update("laser_processing_rfq_request_supplier  ",$data, " drrs_id = ".$drrs_id);


        $result_data = $this->db_lib->fetchSingle("laser_processing_rfq_request_supplier  "," drrs_id = ".$drrs_id);

		$dmr_id = $result_data['dmr_id'];
		$updateData['request_status'] = "C";
		$result = $this->db_lib->update("laser_processing_rfq",$updateData, " dmr_id = ".$dmr_id);
                return $result;

      }
    
    // accept cutomer quotation
    	public function LaserProcessingSupplierListAcceptByreject($drrs_id) 
        { 

		$data['request_status']='R';

		$result = $this->db_lib->update("laser_processing_rfq_request_supplier",$data, " drrs_id = ".$drrs_id);
		$result_data = $this->db_lib->fetchSingle("laser_processing_rfq_request_supplier  "," drrs_id = ".$drrs_id);

		$dmr_id = $result_data['dmr_id'];
		$updateData['request_status'] = "R";
		$result = $this->db_lib->update("laser_processing_rfq",$updateData, " dmr_id = ".$dmr_id);

        return $result;

    }

	
}
?>