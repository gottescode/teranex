<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class consulting_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->consulting_path="uploads/consulting/"; 
			$this->teams_path="uploads/team/";
			$this->clients_path="uploads/client/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '400');
			define('RESIZEHIGHT', '300');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('consulting_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("consulting_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		return $result = $this->db_lib->insert("consulting_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("consulting_category", $arrData, "consulting_category_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		
		$result = $this->db_lib->delete("consulting_category", "consulting_category_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["consulting_category_id"];
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
				$result = $this->db_lib->update("consulting_category", $arrData, "consulting_category_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* Case Study CRUD operation */
	 
	 public function findSingleCaseStudy($strWhere = 1) {
		return $this->db_lib->fetchSingle('consulting_case_study', $strWhere,'');
	}
	 
	public function findMultipleCaseStudy($strWhere) {
		$result=$this->db_lib->fetchMultiple("consulting_case_study CCS JOIN consulting_category CC ON CCS.consulting_category_id=CC.consulting_category_id", $strWhere,"CCS.*,CC.consulting_category_name");//exit; 
		return $result;
	} 

	public function findMultipleConsulting($strWhere) {
		$result=$this->db_lib->fetchMultiple("consulting_case_study CCS JOIN consulting_category CC ON CCS.consulting_category_id=CC.consulting_category_id", $strWhere,"CCS.*,CC.consulting_category_name");//exit; 
		return $result;
	}

    public function createCaseStudy($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('case_study_image', $this->consulting_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["case_study_image"] = $data1[1];
		
		return $rid = $this->db_lib->insert("consulting_case_study", $arrData); 
    }
	
	public function updateCaseStudy($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('case_study_image', $this->consulting_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["case_study_image"] = $data[1];
		$result = $this->db_lib->update("consulting_case_study", $arrData, "case_study_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCaseStudy($id) { 
		$data = $this->db_lib->fetchSingle("consulting_case_study", "case_study_id = $id");
		if($data)
			$this->file_manager->delete($this->consulting_path, $data["case_study_image"]);
		
		$result = $this->db_lib->delete("consulting_case_study", "case_study_id = " . $id);
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
				$result = $this->db_lib->update("consulting_case_study", $arrData, "case_study_id = ". $id);
			}
			return true;
		}
		return false;
	}
	

	/////////////////////////////    consulting Request A Call //////////////////////////////////
	/*consulting Request A Call save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function consultingRequestCallInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("consulting_request_call",$data); 
        return $result;
    }

	/*consulting Request A Call 
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function consultingRequestCall() { 
		$result=$this->db_lib->fetchMultiple("consulting_request_call", $strWhere,"");//exit; 
		return $result;
    }



	///////////////////////////// consulting Speak Consultant //////////////////////////////////
	/* consulting Speak Consultant save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function consultingSpeakConsultantInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("consulting_speak_consultant",$data); 
        return $result;
    }

	/* Consulting Speak Consultant
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	
	

    public function consultingSpeakConsultant() { 
		$result = $this->db_lib->fetchMultiple("consulting_speak_consultant SC LEFT JOIN consulting_case_study CS ON SC.case_study_id=CS.case_study_id","speak_consultant_id<>0 ORDER BY updated_date","SC.*,CS.case_study_name"); 
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
		$result = $this->db_lib->insert("consulting_webinar",$data); 
        return $result;
    }

	/* Webinar
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function webinar() { 
		$result = $this->db_lib->fetchMultiple("consulting_webinar CW LEFT JOIN consulting_case_study CCS ON CW.case_study_id=CCS.case_study_id", "webinar_id<>0 ORDER BY updated_date","CW.*, CCS.case_study_name"); 
        return $result;
    }

    /////////////////////////////    Analyst Query //////////////////////////////////
	/* Analyst Query Save
			20/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function analystQueryInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("consulting_analyst_query",$data); 
        return $result;
    }

	/*Analyst Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analystQuery() { 
		$result = $this->db_lib->fetchMultiple("consulting_analyst_query CAQ LEFT JOIN consulting_case_study CCS ON CAQ.case_study_id=CCS.case_study_id", "analyst_query_id<>0 ORDER BY updated_date","CAQ.*, CCS.case_study_name"); 
        return $result;
    }

    /////////////////////////////  Sales Query  //////////////////////////////////
	/*Sales Query save
			20/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function salesQueryInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("consulting_sales_query",$data); 
        return $result;
    }

	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function salesQuery() { 
		$result = $this->db_lib->fetchMultiple("consulting_sales_query CSQ LEFT JOIN consulting_case_study CCS ON CSQ.case_study_id=CCS.case_study_id", "sales_query_id<>0 ORDER BY updated_date","CSQ.*, CCS.case_study_name"); 
        return $result;
    }


     /* Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('consulting_team', $strWhere,'');
	}
	 
	public function findMultipleTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("consulting_team", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("consulting_team", $arrData); 
    }
	
	public function updateTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('consulting_team', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("consulting_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTeam($id) {
		
		$result = $this->db_lib->delete("consulting_team", "team_id = " . $id);
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
				$result = $this->db_lib->update("consulting_team", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
	}

	    /* Cleint
			06/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleClient($strWhere = 1) {
		return $this->db_lib->fetchSingle('consulting_client', $strWhere,'');
	}
	 
	public function findMultipleClient($strWhere) {
		$result=$this->db_lib->fetchMultiple("consulting_client", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createClient($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('client_image', $this->clients_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["client_image"] = $data1[1];
		return $result = $this->db_lib->insert("consulting_client", $arrData); 
    }
	
	public function updateClient($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('client_image', $this->clients_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["client_image"] = $data[1];
		$result = $this->db_lib->update("consulting_client", $arrData, "client_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteClient($id) {
		
		$result = $this->db_lib->delete("analytics_client", "client_id = " . $id);
		if($data)
			$this->file_manager->delete($this->clients_path, $data["client_image"]);
        return $result;
    }
    
	public function updatePublishClient($data){
		// get total records
		$ids = $data["client_id"];
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
				$result = $this->db_lib->update("consulting_client", $arrData, "client_id = ". $id);
			}
			return true;
		}
		return false;
	}


}

?>