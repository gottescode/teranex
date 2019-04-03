<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class analytics_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->analytics_path="uploads/analytics/"; 
			$this->teams_path="uploads/team/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '400');
			define('RESIZEHIGHT', '300');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('analytics_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("analytics_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		return $result = $this->db_lib->insert("analytics_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("analytics_category", $arrData, "analytics_category_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		
		$result = $this->db_lib->delete("analytics_category", "analytics_category_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["analytics_category_id"];
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
				$result = $this->db_lib->update("analytics_category", $arrData, "analytics_category_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* Case Study CRUD operation */
	 
	 public function findSingleCaseStudy($strWhere = 1) {
		return $this->db_lib->fetchSingle('analytics_case_study', $strWhere,'');
	}
	 
	public function findMultipleCaseStudy($strWhere) {
		$result=$this->db_lib->fetchMultiple("analytics_case_study ACS JOIN analytics_category AC ON ACS.analytics_category_id=AC.analytics_category_id", $strWhere,"ACS.*,AC.analytics_category_name");//exit; 
		return $result;
	} 

	public function findMultipleAnalytic($strWhere) {
		$result=$this->db_lib->fetchMultiple("analytics_case_study ACS JOIN analytics_category AC ON ACS.analytics_category_id=AC.analytics_category_id", $strWhere,"ACS.*,AC.analytics_category_name");//exit; 
		return $result;
	}

    public function createCaseStudy($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('case_study_image', $this->analytics_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["case_study_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("analytics_case_study", $arrData); 
    }
	
	public function updateCaseStudy($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('case_study_image', $this->analytics_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["case_study_image"] = $data[1];
		$result = $this->db_lib->update("analytics_case_study", $arrData, "case_study_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCaseStudy($id) { 
		$data = $this->db_lib->fetchSingle("analytics_case_study", "case_study_id = $id");
		if($data)
			$this->file_manager->delete($this->analytics_path, $data["case_study_image"]);
		
		$result = $this->db_lib->delete("analytics_case_study", "case_study_id = " . $id);
        return $result;
    }
    
	public function updatePublishCaseStudy($data){
		// get total records
		$ids = $data["case_study_id"];
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
				$result = $this->db_lib->update("analytics_case_study", $arrData, "case_study_id = ". $id);
			}
			return true;
		}
		return false;
	}
	

	/////////////////////////////    Analytics Request A Call //////////////////////////////////
	/*Analytics Request A Call save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function analyticsRequestCallInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("analytics_request_call",$data); 
        return $result;
    }

	/*Analytics Request A Call 
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analyticsRequestCall() { 
		$result=$this->db_lib->fetchMultiple("analytics_request_call", $strWhere,"");//exit; 
		return $result;
    }



	///////////////////////////// Analytics Speak Consultant //////////////////////////////////
	/* Analytics Speak Consultant save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function analyticsSpeakConsultantInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("analytics_speak_consultant",$data); 
        return $result;
    }

	/* Analytics Speak Consultant
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	
	

    public function analyticsSpeakConsultant() { 
		$result = $this->db_lib->fetchMultiple("analytics_speak_consultant SC LEFT JOIN analytics_case_study CS ON SC.case_study_id=CS.case_study_id","speak_consultant_id<>0 ORDER BY updated_date","SC.*,CS.case_study_name"); 
        return $result;
    }

    ///////////////////////////// Webinar //////////////////////////////////
	/* Webinar save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function webinarInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("analytics_webinar",$data); 
        return $result;
    }

	/* Webinar
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function webinar() { 
		$result = $this->db_lib->fetchMultiple("analytics_webinar AW LEFT JOIN analytics_case_study ACS ON AW.case_study_id=ACS.case_study_id", "webinar_id<>0 ORDER BY updated_date","AW.*, ACS.case_study_name"); 
        return $result;
    }

    /* Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('analytics_team', $strWhere,'');
	}
	 
	public function findMultipleTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("analytics_team", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("analytics_team", $arrData); 
    }
	
	public function updateTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('team_image', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("analytics_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTeam($id) {
		
		$result = $this->db_lib->delete("analytics_team", "team_id = " . $id);
		if($data)
			$this->file_manager->delete($this->teams_path, $data["team_image"]);
        return $result;
    }
    
	public function updatePublishTeam($data){
		// get total records
		$ids = $data["team_id"];
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
				$result = $this->db_lib->update("analytics_team", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
	}


}

?>