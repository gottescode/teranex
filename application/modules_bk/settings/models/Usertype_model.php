<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usertype_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->mst_user_type="mst_user_type"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->mst_user_type, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_user_type." ut LEFT JOIN $this->mst_user_type AS ut2 ON ut.parent_utid=ut2.utid", $strWhere." GROUP by ut.utid ORDER BY parent_utid","ut.*,ut2.type_name AS parentName");//exit; 
		return $result;
	}
	public function findMultipleParent($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_user_type."", $strWhere."");//exit; 
		return $result;
	}
	
    public function create($arrData) {
		$page_id = $this->db_lib->insert($this->mst_user_type, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
		$result = $this->db_lib->update($this->mst_user_type, $arrData, "utid = " . $arrData["id"]);
        return $result;
    }
	
	public function deletetype($id) {
		$result = $this->db_lib->delete($this->mst_user_type, "utid = " . $id);
        return $result;
    } 
}

?>