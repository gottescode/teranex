<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->subscribe="subscribe";
			
			parent::__construct();
    }

	
	public function findMultipleSubscribe($strWhere = 1) {
		$result=$this->db_lib->fetchMultiple($this->subscribe, $strWhere." ORDER BY id DESC ","");
		if($result){
			$result = array(
				"result" => $result,
			);
		}
		return $result;
	}
	public function updateSubscribe($id) {
		$data['status'] = "A";		
		$result=$this->db_lib->update($this->subscribe, $data," id =".$id);
		
		return $result;
	}
	
}

?>