<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Talkwithexpert_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->talk_with_expert_request_meeting= "talk_with_expert_request_meeting"; 
			parent::__construct();
    }

     
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->talk_with_expert_request_meeting, $strWhere,"");//exit; 
		return $result;
	}
	public function create($arrayData) {
		$result=$this->db_lib->insert($this->talk_with_expert_request_meeting, $arrayData);//exit; 
		return $result;
	}
	
}

?>