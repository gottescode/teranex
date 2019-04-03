<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Programmertype_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->mst_programmer_type="mst_programmer_type"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->mst_programmer_type, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_programmer_type."  ", $strWhere."","");//exit; 
		return $result;
	}
	public function findMultipleParent($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_programmer_type."", $strWhere."");//exit; 
		return $result;
	}
	
    public function create($arrData) {
		$page_id = $this->db_lib->insert($this->mst_programmer_type, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
		$result = $this->db_lib->update($this->mst_programmer_type, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteType($id) {
		$result = $this->db_lib->delete($this->mst_programmer_type, "id = " . $id);
        return $result;
    } 
}

?>