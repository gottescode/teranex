<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Exchangegrups_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->file_path="uploads/groupbuying_images/";
			$this->load->library("file_manager");

			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			$this->groupbuying_path="uploads/groupbuying/";
			parent::__construct();
    }
	 public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('groupbuying_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("groupbuying_category", $strWhere,"");//exit; 
		return $result;
	}
	
	
	 

    public function createExchangeGroup($arrData) {
		$arrData["request_on"] = date("Y-m-d H:i:s");
		
		return $id = $this->db_lib->insert("exchange_group_inquiry", $arrData); 
    }
	public function adminRfqList($arrData) {
		
		return $id = $this->db_lib->fetchMultiple("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.supplier_id LEFT JOIN master_user as mum ON mum.uid=egi.customer_id", $strWhere." 1 ORDER BY egi.id DESC ","egi.*,mu.u_name as supplier_name,mum.u_name as customer_name"); 
    }
	
	
	/* Consumable Data	*/
	public function findMultipleConsumableCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleConsumableBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_quantity", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_unit", $strWhere,"");//exit; 
		return $result;
	}
	
	/* Service Part */
	public function findMultipleServiceCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleServiceBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_qty", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_unit", $strWhere,"");//exit; 
		return $result;
	}
	/* Sheet Metal */
	public function findMultipleSheetMetalCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleSheetMetalBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_qty", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_unit", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalSize($strWhere) {
		$result=$this->db_lib->fetchMultiple("	mst_sheet_metal_part_size", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalThickness($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_thickness", $strWhere,"");//exit; 
		return $result;
	}
	
}
?>