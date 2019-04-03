<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Research_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->event_path="uploads/research/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('report_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("report_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		/*$data1 = $this->file_manager->upload('researchImage', $this->event_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["event_cat_image"] = $data1[1];*/
		return $event_id = $this->db_lib->insert("report_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["event_cat_update_date"] = date('Y-m-d');
		$data = $this->file_manager->update('eventImage', $this->event_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["event_cat_image"] = $data[1];
		
		$result = $this->db_lib->update("event_category", $arrData, "event_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 if($data)
			$this->file_manager->delete($this->event_path, $data["event_cat_image"]);
		$result = $this->db_lib->delete("event_category", "event_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["event_cat_id"];
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
				$result = $this->db_lib->update("event_category", $arrData, "event_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}
	 /* Events CRUD operation */
	 
	 public function findSingleEvent($strWhere = 1) {
		return $this->db_lib->fetchSingle('event', $strWhere,'');
	}
	 
	public function findMultipleEvent($strWhere) {
		$result=$this->db_lib->fetchMultiple("event EV JOIN event_category EC ON EV.event_cat_id=EC.event_cat_id", $strWhere." ORDER BY event_start_date DESC","EV.*,EC.event_cat_name");//exit; 
		return $result;
	} 
    public function createEvent($arrData) {
		$arrData["event_entry_date"] = date('Y-m-d');

		/*$data1 = $this->file_manager->upload('eventImage', $this->course_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["event_image"] = $data1[1];*/
		
		return $eid = $this->db_lib->insert("event", $arrData); 
    }
	
	public function updateEvent($arrData) {
	 
		$arrData["event_entry_date"] = date('Y-m-d');
		/*$data = $this->file_manager->update('eventImage', $this->course_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data1[0])
			$arrData["event_image"] = $data1[1];*/
		
		$result = $this->db_lib->update("event", $arrData, "event_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteEvent($id) { 
		$data = $this->db_lib->fetchSingle("event", "event_id = $id");
		/*if($data)
			$this->file_manager->delete($this->course_path, $data["course_image"]);*/
		
		$result = $this->db_lib->delete("event", "event_id = " . $id);
        return $result;
    }
    
	public function updatePublishEvent($data){
		// get total records
		$ids = $data["event_id"];
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
				$result = $this->db_lib->update("event", $arrData, "event_id = ". $id);
			}
			return true;
		}
		return false;
	}
	//get events list
	public function get_events($start, $end)
	{
		return $this->db->where("event_start_date >=", $start)->where("event_end_date <=", $end)->get("event");
	}
	//event booking  
	public function eventbooking($arrData) {
		$arrDataInsert['enroller_user']	=$arrData['enroller_user'];
		$arrDataInsert['user_email']		=$arrData['user_email'];
		$arrDataInsert['phone_no']		=$arrData['phone_no']; 
		$arrDataInsert['user_id']		=$arrData['user_id'];
		$arrDataInsert['course_id']		=$arrData['course_id'];
	  
		$arrDataInsert['participant_no']=$arrData['participant_no'];
		$arrDataInsert['event_amount']	=$arrData['eventPrice'];
		$arrDataInsert['event_id']		=$arrData['eventId'];
		$arrDataInsert['total_amount']		=$arrData['totalPrice'];
		$arrDataInsert['event_start_date']	=date_ymd($arrData['event_start_date']);
		 
		$arrDataInsert['entry_date_time']	=date("Y-m-d H:i:s"); 
		
		$result=$this->db_lib->insert(" event_booking", $arrDataInsert);//exit; 
		return $result;
	}
}

?>