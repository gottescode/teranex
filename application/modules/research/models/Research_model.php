<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Research_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->research_path="uploads/research/"; 
			$this->clients_path="uploads/client/"; 
			$this->load->library("file_manager");
			$this->community="community";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('research_report_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("research_report_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		/*$data1 = $this->file_manager->upload('researchImage', $this->event_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["event_cat_image"] = $data1[1];*/
		return $result = $this->db_lib->insert("research_report_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		/*$data = $this->file_manager->update('researchImage', $this->research_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["event_cat_image"] = $data[1];*/
		
		$result = $this->db_lib->update("research_report_category", $arrData, "report_category_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		
		$result = $this->db_lib->delete("research_report_category", "report_category_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["report_category_id"];
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
				$result = $this->db_lib->update("research_report_category", $arrData, "report_category_id = ". $id);
			}
			return true;
		}
		return false;
	}
	 /* Research CRUD operation */
	 
	 public function findSingleResearch($strWhere = 1) {
		return $this->db_lib->fetchSingle('research_report', $strWhere,'');
	}
	 
	public function findMultipleResearch($strWhere) {
		$result=$this->db_lib->fetchMultiple("research_report RS JOIN research_report_category RC ON RS.report_category_id=RC.report_category_id", $strWhere,"RS.*,RC.report_category_name");//exit; 
		return $result;
	} 

	public function findMultipleReport($strWhere) {
		$result=$this->db_lib->fetchMultiple("research_report RS JOIN research_report_category RC ON RS.report_category_id=RC.report_category_id", $strWhere,"RS.*,RC.report_category_name");//exit; 
		return $result;
	}

    public function createResearch($arrData) {
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('report_image', $this->research_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["report_image"] = $data1[1];
			
		
		return $rid = $this->db_lib->insert("research_report", $arrData); 
    }
	
	public function updateResearch($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->update('report_image', $this->research_path, IMG_FORMAT, $arrData["old_image"]);
		if($data1[0])
			$arrData["report_image"] = $data1[1];
		
		$result = $this->db_lib->update("research_report", $arrData, "report_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteResearch($id) { 
		$data = $this->db_lib->fetchSingle("research_report", "report_id = $id");
		if($data)
			$this->file_manager->delete($this->research_path, $data["report_image"]);
		
		$result = $this->db_lib->delete("research_report", "report_id = " . $id);
        return $result;
    }
    
	public function updatePublishResearch($data){
		// get total records
		$ids = $data["report_id"];
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
				$result = $this->db_lib->update("research_report", $arrData, "report_id = ". $id);
			}
			return true;
		}
		return false;
	}
		/////////////////////////////    Research Report Sample  //////////////////////////////////
	/*Research Report Sample  save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function researchReportSampleInsert($data) { 
	
		$data['report_sample_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("research_report_sample",$data); 
        return $result;
    }

	/*Research Report Sample 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function researchReportSample() { 
		$result = $this->db_lib->fetchMultiple("research_report_sample RRS LEFT JOIN research_report RR ON RRS.report_id=RR.report_id", "report_sample_id<>0 ORDER BY report_sample_date","RRS.*, RR.report_name"); 
        return $result;
    }


    /////////////////////////////    Inquiry Before Buying  //////////////////////////////////
	/*Inquiry Before Buying Sample  save
			20/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function inquiryBeforeBuyingInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("research_inquiry_before_buying",$data); 
        return $result;
    }

	/*Inquiry Before Buying
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function inquiryBeforeBuying() { 
		$result = $this->db_lib->fetchMultiple("research_inquiry_before_buying IBB LEFT JOIN research_report RR ON IBB.report_id=RR.report_id", "before_buying_id<>0 ORDER BY updated_date","IBB.*, RR.report_name"); 
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
		$result = $this->db_lib->insert("research_analyst_query",$data); 
        return $result;
    }

	/*Analyst Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analystQuery() { 
		$result = $this->db_lib->fetchMultiple("research_analyst_query RAQ LEFT JOIN research_report RR ON RAQ.report_id=RR.report_id", "analyst_query_id<>0 ORDER BY updated_date","RAQ.*, RR.report_name"); 
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
		$result = $this->db_lib->insert("research_sales_query",$data); 
        return $result;
    }

	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function salesQuery() { 
		$result = $this->db_lib->fetchMultiple("research_sales_query RSQ LEFT JOIN research_report RR ON RSQ.report_id=RR.report_id", "sales_query_id<>0 ORDER BY updated_date","RSQ.*, RR.report_name"); 
        return $result;
    }



	///////////////////////////// Research Speak Consultant //////////////////////////////////
	/* Research Speak Consultant save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function researchSpeakConsultantInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("research_speak_consultant",$data); 
        return $result;
    }

	/* Research Speak Consultant
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	
	

    public function researchSpeakConsultant() { 
		$result = $this->db_lib->fetchMultiple("research_speak_consultant SC LEFT JOIN research_report RR ON SC.report_id=RR.report_id","speak_consultant_id<>0 ORDER BY updated_date","SC.*,RR.report_name"); 
        return $result;
    }

	/**
	 * licence Purchase
		21/5/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function licencePurchase($data ) {
		$data["purchase_date"] = date('Y-m-d H:i:s');
		return $this->db_lib->insert('research_licence_purchase', $data );
	}
	/**
	 * research purchases list 
		21/5/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function research_purchases_list($whereCond ) { 
		return $this->db_lib->fetchMultiple("research_licence_purchase RLP JOIN research_report RP ON RLP.report_id=RP.report_id"," $whereCond","RLP.*,RP.report_name" );
	}

	
    /* Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('research_team', $strWhere,'');
	}
	 
	public function findMultipleTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("research_team", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("research_team", $arrData); 
    }
	
	public function updateTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('team_image', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("research_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTeam($id) {
		
		$result = $this->db_lib->delete("research_team", "team_id = " . $id);
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
				$result = $this->db_lib->update("research_team", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
	}


		/////////////////////////////    Research Report Customization  //////////////////////////////////
	/*Research Report Customization
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function reportCustomizationInsert($data) { 
	
		$data['report_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("research_report_customization",$data); 
        return $result;
    }

	/*Research Report Sample 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function reportCustomizationList() { 
		$result = $this->db_lib->fetchMultiple("research_report_customization RRC LEFT JOIN research_report RR ON RRC.report_id=RR.report_id", "report_cust_id<>0 ORDER BY report_date","RRC.*, RR.report_name"); 
        return $result;
    }



    /* Cleint
			06/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleClient($strWhere = 1) {
		return $this->db_lib->fetchSingle('research_client', $strWhere,'');
	}
	 
	public function findMultipleClient($strWhere) {
		$result=$this->db_lib->fetchMultiple("research_client", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createClient($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('client_image', $this->clients_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["client_image"] = $data1[1];
		return $result = $this->db_lib->insert("research_client", $arrData); 
    }
	
	public function updateClient($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('client_image', $this->clients_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["client_image"] = $data[1];
		$result = $this->db_lib->update("research_client", $arrData, "client_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteClient($id) {
		
		$result = $this->db_lib->delete("research_client", "client_id = " . $id);
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
				$result = $this->db_lib->update("research_client", $arrData, "client_id = ". $id);
			}
			return true;
		}
		return false;
	}




}

?>