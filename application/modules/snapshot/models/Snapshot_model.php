<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class snapshot_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->analytics_path="uploads/snapshot/"; 
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '400');
			define('RESIZEHIGHT', '300');
			parent::__construct();
    }

    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('snapshots_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("snapshots_category", $strWhere,"");//exit; 
		return $result;
	}

	

    public function createCategory($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		return $result = $this->db_lib->insert("snapshots_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("snapshots_category", $arrData, "snapshot_category_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		
		$result = $this->db_lib->delete("snapshots_category", "snapshot_category_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["snapshot_category_id"];
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
				$result = $this->db_lib->update("snapshots_category", $arrData, "snapshot_category_id = ". $id);
			}
			return true;
		}
		return false;
	}

    public function findSingleSubscription($strWhere = 1) {
		return $this->db_lib->fetchSingle('snapshots_subscription', $strWhere,'');
	}
	 
	public function findMultipleSubscription($strWhere) {
		$result=$this->db_lib->fetchMultiple("snapshots_subscription", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSubscriptionpublish($strWhere) {
		$result=$this->db_lib->fetchMultiple("snapshots_subscription", $strWhere,"");//exit; 
		return $result;
	}
	 public function createSubscription($arrData) {
		$arrData["updated_date"] = date('Y-m-d');

			if($arrData["publish"] == "Y"){
			$arrData["publish"] = "Y";
		}
		else{
			$arrData["publish"] = "N";
		}
		return $result = $this->db_lib->insert("snapshots_subscription", $arrData); 
    }
	
	public function updateSubscription($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');

		if($arrData["publish"] == "Y"){
			$arrData["publish"] = "Y";
		}
		else{
			$arrData["publish"] = "N";
		}
		$result = $this->db_lib->update("snapshots_subscription", $arrData, "subscription_id = " . $arrData["subscription_id"]);
        return $result;
    }
	
	public function deleteSubscription($id) {
		
		$result = $this->db_lib->delete("snapshots_subscription", "subscription_id = " . $id);
        return $result;
    }
    
	public function updatePublishSubscription($data){
		// get total records
		$ids = $data["subscription_id"];
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
				$result = $this->db_lib->update("snapshots_subscription", $arrData, "subscription_id = ". $id);
			}
			return true;
		}
		return false;
	}




	///////////////////////////// Snapshots Speak Consultant //////////////////////////////////
	/* Snapshots Speak Consultant save
			04/7/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function snapshotSpeakConsultantInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("snapshots_speak_consultant",$data); 
        return $result;
    }

	/* Snapshots Speak Consultant
			04/7/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	
	

    public function snapshotSpeakConsultant() { 
		$result=$this->db_lib->fetchMultiple("snapshots_speak_consultant", $strWhere,"");//exit; 
		return $result;
    }

  /**
	 * Subscriprion Purchase
		07/7/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function subscriptionPurchase($data ) {
		$data["purchase_date"] = date('Y-m-d H:i:s');
		return $this->db_lib->insert('snapshots_subscription_purchase', $data );
	}
	/**
	 * research purchases list 
		21/5/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function subscription_purchases_list($whereCond ) { 
		return $this->db_lib->fetchMultiple("snapshots_subscription_purchase SSP JOIN snapshots_subscription SS ON SSP.subscription_id=SS.subscription_id"," $whereCond","SSP.*,SS.subscription_name" );
	}



	/////////////////////////////    Analytics Request A Call //////////////////////////////////
	/*Analytics Request A Call save
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function snapshotRequestCallInsert($data) { 
	
		$data['updated_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("snapshots_request_call",$data); 
        return $result;
    }

	/*Snapshot Request A Call 
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function snapshotRequestCall() { 
		$result=$this->db_lib->fetchMultiple("snapshots_request_call", $strWhere,"");//exit; 
		return $result;
    }



    /* Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('snapshots_team', $strWhere,'');
	}
	 
	public function findMultipleTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("snapshots_team", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("snapshots_team", $arrData); 
    }
	
	public function updateTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('team_image', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("snapshots_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTeam($id) {
		
		$result = $this->db_lib->delete("snapshots_team", "team_id = " . $id);
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
				$result = $this->db_lib->update("snapshots_team", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
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
		$result = $this->db_lib->insert("snapshots_analyst_query",$data); 
        return $result;
    }

	/*Analyst Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analystQuery() { 
		$result=$this->db_lib->fetchMultiple("snapshots_analyst_query", $strWhere,"");//exit; 
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
		$result = $this->db_lib->insert("snapshots_sales_query",$data); 
        return $result;
    }

	/*Sales Query
			20/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function salesQuery() { 
		
        $result=$this->db_lib->fetchMultiple("snapshots_sales_query", $strWhere,"");//exit; 
		return $result;
    }


    /* Cleint
			06/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleClient($strWhere = 1) {
		return $this->db_lib->fetchSingle('snapshots_client', $strWhere,'');
	}
	 
	public function findMultipleClient($strWhere) {
		$result=$this->db_lib->fetchMultiple("snapshots_client", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createClient($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('client_image', $this->clients_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["client_image"] = $data1[1];
		return $result = $this->db_lib->insert("snapshots_client", $arrData); 
    }
	
	public function updateClient($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('client_image', $this->clients_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["client_image"] = $data[1];
		$result = $this->db_lib->update("snapshots_client", $arrData, "client_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteClient($id) {
		
		$result = $this->db_lib->delete("snapshots_client", "client_id = " . $id);
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
				$result = $this->db_lib->update("snapshots_client", $arrData, "client_id = ". $id);
			}
			return true;
		}
		return false;
	}





}

?>