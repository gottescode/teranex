<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Suppliertype_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->supplier_details="mst_service_type"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->supplier_details, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->supplier_details, $strWhere,"");//exit; 
		return $result;
	}
	
    public function create($arrData) {
 
		$page_id = $this->db_lib->insert($this->supplier_details, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
	  
		$result = $this->db_lib->update($this->supplier_details, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteSupplierType($id) {
		 
		$result = $this->db_lib->delete($this->supplier_details, "id = " . $id);
        return $result;
    }
    
	public function updatePublishSupplierType($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){ 
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				$result = $this->db_lib->update($this->supplier_details, $arrData, " id = ". $id);
			}
			return true;
		}
		return false;
	}
}

?>