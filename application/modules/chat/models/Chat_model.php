<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Chat_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('customer_details', $strWhere,'');
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple("customer_details", $strWhere,"");//exit; 
		return $result;
	}
	
	   public function findMultipleAddress($strWhere) {
		$result=$this->db_lib->fetchMultiple("customer_address", $strWhere,"");//exit; 
		return $result;
	}
     
}

?>