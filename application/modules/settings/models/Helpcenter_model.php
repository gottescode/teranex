<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Helpcenter_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->helpcenter_topics="helpcenter_topics"; 
			$this->helpcenter_data="helpcenter_data"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->helpcenter_topics, $strWhere,'');
	}
	 
	public function findSingleTopicData($id) {
			return	$result = $this->db_lib->fetchSingle($this->helpcenter_data, " topic_id = {$id} ");
	}
	 
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->helpcenter_topics." ", $strWhere."","");//exit; 
		return $result;
	}
	
    public function helpCenterTopicData($data) {
		
		$topicId = $data['topic_id'];
		
	
		$isData =  $this->db_lib->fetchSingle($this->helpcenter_data, " topic_id = {$topicId} ",'');
		
		if($isData){
			$data['id'] = $isData['id'];
			$result = $this->db_lib->update($this->helpcenter_data, $data, "topic_id = " . $data["topic_id"]);
		}else{
			$result = $this->db_lib->insert($this->helpcenter_data, $data);
		}
		return $result ;
    }
	  public function create($arrData) {
		$page_id = $this->db_lib->insert($this->helpcenter_topics, $arrData);
		return $page_id ;
    }
	
	public function update($arrData) { 
		$result = $this->db_lib->update($this->helpcenter_topics, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function deletetype($id) {
		$result = $this->db_lib->delete($this->helpcenter_topics, "id = " . $id);
        return $result;
    } 
}

?>