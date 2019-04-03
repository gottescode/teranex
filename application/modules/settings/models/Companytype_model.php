<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Companytype_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->companytype="mst_company_type"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->companytype, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->companytype, $strWhere,"");//exit; 
		return $result;
	}
	
    public function create($arrData) {
 
		$page_id = $this->db_lib->insert($this->companytype, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
	  
		$result = $this->db_lib->update($this->companytype, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deletecompanytype($id) {
		 
		$result = $this->db_lib->delete($this->companytype, "id = " . $id);
        return $result;
    }
    
	public function updatePublishcompanytype($data){
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
				$result = $this->db_lib->update($this->companytype, $arrData, " id = ". $id);
			}
			return true;
		}
		return false;
	}
}

?>