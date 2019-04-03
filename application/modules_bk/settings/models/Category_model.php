<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this-> mst_project_category="mst_project_category"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this-> mst_project_category, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this-> mst_project_category, $strWhere,"");//exit; 
		return $result;
	}
	
    public function create($arrData) {
 
		$page_id = $this->db_lib->insert($this-> mst_project_category, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
	  
		$result = $this->db_lib->update($this-> mst_project_category, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 
		$result = $this->db_lib->delete($this-> mst_project_category, "id = " . $id);
        return $result;
    }
    
	public function updatePublishpojectcategory($data){
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
				$result = $this->db_lib->update($this-> mst_project_category, $arrData, " id = ". $id);
			}
			return true;
		}
		return false;
	}
}

?>