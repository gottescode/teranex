<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class helpcenter_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			
			
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '400');
			define('RESIZEHIGHT', '300');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('helpcenter_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("helpcenter_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		return $result = $this->db_lib->insert("helpcenter_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("helpcenter_category", $arrData, "helpcenter_category_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		
		$result = $this->db_lib->delete("helpcenter_category", "helpcenter_category_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["helpcenter_category_id"];
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
				$result = $this->db_lib->update("helpcenter_category", $arrData, "helpcenter_category_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* Sub CRUD operation */
	 
	 public function findSingleSubCat($strWhere = 1) {
		return $this->db_lib->fetchSingle('helpcenter_sub_cat', $strWhere,'');
	}
	 
	public function findMultipleSubCat($strWhere) {
	
		$result=$this->db_lib->fetchMultiple("helpcenter_sub_cat HSC JOIN helpcenter_category HC ON HSC.helpcenter_category_id=HC.helpcenter_category_id", $strWhere,"HSC.*,HC.helpcenter_category_name");//exit; 
		return $result;
	} 

	

    public function createSubCat($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');
		
		return $rid = $this->db_lib->insert("helpcenter_sub_cat", $arrData); 
    }
	
	public function updateSubCat($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		
		$result = $this->db_lib->update("helpcenter_sub_cat", $arrData, "sub_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteSubCat($id) { 
		$data = $this->db_lib->fetchSingle("helpcenter_sub_cat", "sub_cat_id = $id");
		
		
		$result = $this->db_lib->delete("helpcenter_sub_cat", "sub_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishSubCat($data){
		// get total records
		$ids = $data["sub_cat_id"];
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
				$result = $this->db_lib->update("helpcenter_sub_cat", $arrData, "sub_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}
	

	


}

?>