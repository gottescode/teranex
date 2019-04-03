<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->contact_us="contact_us";
			
			parent::__construct();
    }

	
	public function findMultiplecontactUs($strWhere = 1) {
		$result=$this->db_lib->fetchMultiple($this->contact_us, $strWhere." ORDER BY id DESC ","");
		if($result){
			$result = array(
				"result" => $result,
			);
		}
		return $result;
	}
	
}

?>