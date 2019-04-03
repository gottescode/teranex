<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->mst_language="mst_language"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->mst_language, $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_language."  ", $strWhere."","");//exit; 
		return $result;
	}
	public function findMultipleParent($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->mst_language."", $strWhere."");//exit; 
		return $result;
	}
	
    public function create($arrData) {
		$page_id = $this->db_lib->insert($this->mst_language, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
		$result = $this->db_lib->update($this->mst_language, $arrData, "lid = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteLanguage($id) {
		$result = $this->db_lib->delete($this->mst_language, "lid = " . $id);
        return $result;
    } 
}

?>