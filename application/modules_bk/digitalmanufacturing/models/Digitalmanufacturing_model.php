<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Digitalmanufacturing_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->digitalmanufacturing_path="uploads/digitalmanufacturing/";
			$this->rfq_path="uploads/digitalmanufacturing_rfq_images/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
		
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('digitalmanufacturingImage', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["digitalmanufacturing_cat_image"] = $data1[1];
		return $event_id = $this->db_lib->insert("digitalmanufacturing_category", $arrData);  
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('digitalmanufacturingImage', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["digitalmanufacturing_cat_image"] = $data[1];
		
		$result = $this->db_lib->update("digitalmanufacturing_category", $arrData, "digitalmanufacturing_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 if($data)
			$this->file_manager->delete($this->digitalmanufacturing_path, $data["digitalmanufacturing_cat_image"]);
		$result = $this->db_lib->delete("digitalmanufacturing_category", "digitalmanufacturing_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["digitalmanufacturing_cat_id"];
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
				$result = $this->db_lib->update("digitalmanufacturing_category", $arrData, "digitalmanufacturing_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* Case Study CRUD operation */
	 
	 public function findSingleAdditiveManufacturing($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_additive_manufacturing', $strWhere,'');
	}
	 
	
	public function findMultipleAdditiveManufacturing($strWhere) {
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_additive_manufacturing DAM JOIN digitalmanufacturing_category DC ON DAM.digitalmanufacturing_cat_id=DC.digitalmanufacturing_cat_id", $strWhere,"DAM.*,DC.digitalmanufacturing_cat_name");//exit; 
		return $result;
	} 

	

    public function createAdditiveManufacturing($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('additive_manufacturing_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["additive_manufacturing_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("digitalmanufacturing_additive_manufacturing", $arrData); 
    }
	
	public function updateAdditiveManufacturing($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('additive_manufacturing_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["additive_manufacturing_image"] = $data[1];
		$result = $this->db_lib->update("digitalmanufacturing_additive_manufacturing", $arrData, "additive_manufacturing_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteAdditiveManufacturing($id) { 
		$data = $this->db_lib->fetchSingle("digitalmanufacturing_additive_manufacturing", "additive_manufacturing_id = $id");
		if($data)
			$this->file_manager->delete($this->additive_manufacturing_image, $data["additive_manufacturing_image"]);
		
		$result = $this->db_lib->delete("digitalmanufacturing_additive_manufacturing", "additive_manufacturing_id = " . $id);
        return $result;
    }
    
	public function updatePublishAdditiveManufacturing($data){
		// get total records
		$ids = $data["additive_manufacturing_id"];
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
				$result = $this->db_lib->update("digitalmanufacturing_additive_manufacturing", $arrData, "additive_manufacturing_id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	
	/*Additive Manufacturing Processes Add / Insert / Update API  */
	 
 public function findSingleAdditiveManufacturingProcesses($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_additive_manufacturing_processes', $strWhere,'');
	}
	 

	public function findMultipleAdditiveManufacturingProcesses($strWhere) {
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_additive_manufacturing_processes DAMP JOIN digitalmanufacturing_category DC ON DAMP.digitalmanufacturing_cat_id=DC.digitalmanufacturing_cat_id", $strWhere,"DAMP.*,DC.digitalmanufacturing_cat_name");//exit; 
		return $result;
	} 


    public function createAdditiveManufacturingProcesses($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('additive_manufacturing_process_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["additive_manufacturing_process_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("digitalmanufacturing_additive_manufacturing_processes", $arrData); 
    }
	
	public function updateAdditiveManufacturingProcesses($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('additive_manufacturing_process_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["additive_manufacturing_process_image"] = $data[1];
		$result = $this->db_lib->update("digitalmanufacturing_additive_manufacturing_processes", $arrData, "additive_manufacturing_process_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteAdditiveManufacturingProcesses($id) { 
		$data = $this->db_lib->fetchSingle("digitalmanufacturing_additive_manufacturing_processes", "additive_manufacturing_process_id = $id");
		if($data)
			$this->file_manager->delete($this->additive_manufacturing_process_image, $data["additive_manufacturing_process_image"]);
		
		$result = $this->db_lib->delete("digitalmanufacturing_additive_manufacturing_processes", "additive_manufacturing_process_id = " . $id);
        return $result;
    }
    
	public function updatePublishAdditiveManufacturingProcesses($data){
		// get total records
		$ids = $data["additive_manufacturing_process_id"];
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
				$result = $this->db_lib->update("digitalmanufacturing_additive_manufacturing_processes", $arrData, "additive_manufacturing_process_id = ". $id);
			}
			return true;
		}
		return false;
	}
	

	/*3D Printing Applicat Add / Insert / Update API  */
	 
 public function findSinglePrintingMaterials3D($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_printing_materials', $strWhere,'');
	}
	 

	public function findMultiplePrintingMaterials3D($strWhere) {
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_printing_materials DPM JOIN digitalmanufacturing_category DC ON DPM.digitalmanufacturing_cat_id=DC.digitalmanufacturing_cat_id", $strWhere,"DPM.*,DC.digitalmanufacturing_cat_name");//exit; 
		return $result;
	} 


    public function createPrintingMaterials3D($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('printing_material_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["printing_material_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("digitalmanufacturing_printing_materials", $arrData); 
    }
	
	public function update3DPrintingMaterials($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('printing_material_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["printing_material_image"] = $data[1];
		$result = $this->db_lib->update("digitalmanufacturing_printing_materials", $arrData, "printing_materials_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deletePrintingMaterials3D($id) { 
		$data = $this->db_lib->fetchSingle("digitalmanufacturing_printing_materials", "printing_materials_id = $id");
		if($data)
			$this->file_manager->delete($this->printing_material_image, $data["printing_material_image"]);
		
		$result = $this->db_lib->delete("digitalmanufacturing_printing_materials", "printing_materials_id = " . $id);
        return $result;
    }
    
	public function updatePublishPrintingMaterials3D($data){
		// get total records
		$ids = $data["printing_materials_id"];
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
				$result = $this->db_lib->update("digitalmanufacturing_printing_materials", $arrData, "printing_materials_id = ". $id);
			}
			return true;
		}
		return false;
	}
	

	/*3D Printing Application Add / Insert / Update API  */
	 
 public function findSinglePrintingApplication($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_printing_applications', $strWhere,'');
	}
	 

	public function findMultiplePrintingApplication($strWhere) {
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_printing_applications PA JOIN digitalmanufacturing_category DC ON PA.digitalmanufacturing_cat_id=DC.digitalmanufacturing_cat_id", $strWhere,"PA.*,DC.digitalmanufacturing_cat_name");//exit; 
		return $result;
	} 


    public function createPrintingApplication($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('printing_application_image', $this->digitalmanufacturing_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["printing_application_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("digitalmanufacturing_printing_applications", $arrData); 
    }
	
	public function updatePrintingApplication($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('printing_application_image', $this->digitalmanufacturing_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["printing_application_image"] = $data[1];
		$result = $this->db_lib->update("digitalmanufacturing_printing_applications", $arrData, "printing_application_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deletePrintingApplication($id) { 
		$data = $this->db_lib->fetchSingle("digitalmanufacturing_printing_applications", "printing_application_id = $id");
		if($data)
			$this->file_manager->delete($this->printing_application_image, $data["printing_application_image"]);
		
		$result = $this->db_lib->delete("digitalmanufacturing_printing_applications", "printing_application_id = " . $id);
        return $result;
    }
    
	public function updatePublishPrintingApplication($data){
		// get total records
		$ids = $data["printing_application_id"];
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
				$result = $this->db_lib->update("digitalmanufacturing_printing_applications", $arrData, "printing_application_id = ". $id);
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
		$result=$this->db_lib->insert("digitalmanufacturing_rfq", $arrayData); 
		return $result;
	}

	public function findMultipleSupplier($strWhere) {
		
		return	$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
	}

	public function findMultipleRequestList($strWhere){
		$table = " digitalmanufacturing_rfq as dmr LEFT JOIN  master_user as MU ON dmr.customer_user_id = MU.uid ";
		$select = " dmr.*,mu.u_name as uname ";
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
					$dmr_id = $arrData["dmr_id"];
					$strWhere = " dmr_id = $dmr_id AND supplier_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('digitalmanufacturing_rfq_request_supplier', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("digitalmanufacturing_rfq_request_supplier", $arrData);
					}else{
						$arrayData['dmr_id'] = $old_result['dmr_id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("digitalmanufacturing_rfq_request_supplier", $arrayData," dmr_id = ".$arrayData['dmr_id']);
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
		  
		$result=$this->db_lib->fetchMultiple("digitalmanufacturing_rfq_request_supplier drrs JOIN digitalmanufacturing_rfq dmr ON drrs.dmr_id=dmr.dmr_id", "supplier_id = '$uid' ","drrs.*,part_name"); 
		return $result;
	}
	/* REQUEST LIST OF PERTICULAR Suppplier */
	public function remoteApplicationProgrammBySupport($strWhere) {
		$table = " digitalmanufacturing_rfq as rfq LEFT JOIN digitalmanufacturing_rfq_request_supplier as drrs ON rfq.dmr_id = drrs.dmr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,drrs.dmr_id,drrs.drrs_id,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select );
		return $result;
	}
	
	public function findSingleDetailsSupplierReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_rfq', $strWhere,"");
	}

	public function findSingle_remote_Rfq_consultant($strWhere = 1) {
		return $this->db_lib->fetchSingle('digitalmanufacturing_rfq_request_supplier', $strWhere,"");
	}
	
	
}
?>