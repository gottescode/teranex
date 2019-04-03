<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->supplier_path="uploads/supplierFile/"; 
			$this->load->library("file_manager");
			$this->supplier_details="supplier_details";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('master_user', $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");//exit; 
		return $result;
	}
	
   public function findMultipleAddress($strWhere) {
		$result=$this->db_lib->fetchMultiple("user_address", $strWhere,"");//exit; 
		return $result;
	}

    public function create($arrData) {
		$arrData["u_entry_date"] = date('Y-m-d');
		$arrData["u_password"] = md5($arrData["u_password"]);
		return $result = $this->db_lib->insert("master_user", $arrData); 
    }
	
	public function update($arrData) {
	
		//insert extra address
		$arrData["u_password"] = md5($arrData["u_password"]);
		$result = $this->db_lib->update("master_user", $arrData, "uid = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteSupplier($id) {
		$data = $this->db_lib->fetchSingle("master_user", "uid = $id");
		
		
		$result = $this->db_lib->delete("master_user", "uid = " . $id);
        return $result;
    }
    
	public function updatePublishSupplier($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["s_access"] = "Y";
				else
					$arrData["s_access"] = "N";
				// update record
				$result = $this->db_lib->update("supplier_details", $arrData, "supplier_id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	// address list as per supplier_id
	public function findAddressList($strWhere) {
		$result=$this->db_lib->fetchMultiple("user_address", $strWhere,""); 
		return $result;
	}

	public function checkEmailIdExist($data)
		{  
			$u_email = $data["u_email"] ; 
			return $emailExit = $this->db_lib->fetchSingle("master_user"," u_email='$u_email' ","uid, u_email, u_user_type, u_name " );
			
		} 
	
}

?>