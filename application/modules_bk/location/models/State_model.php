<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model 
{
	// declare private variables
	public $table_state = "mst_states";
	public $table_country = "mst_country";
	
	// constructor
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	// get full menu list for frontend ( site )
	public function getStateForSite($id = 0)
	{
		$strWhere = "ts.sid <> 0";
		if($id)
			$strWhere = "ts.country_id = $id";
		
		$result = $this->db_lib->fetchMultiple("$this->table_state ts JOIN $this->table_country tc ON ts.country_id = tc.id", $strWhere." AND tc.publish = 'Y' AND ts.publish = 'Y' ORDER BY ts.state_name","ts.*");
		// return		
		return $result;
	}
	 
	// get full state list
	public function getStateList($countryId=0)
	{ 
		$where="country_id='$countryId'";
		$result = $this->db_lib->fetchMultiple( $this->table_state ," $where  ORDER BY state_name");
		// return		
		return $result;
	}
	 
	// create state
	public function create($data)
	{
		// display order
		if(!$data["display_order"])
			$data["display_order"] = 0;
		// publish
		if($data["publish"] == "Y")
			$data["publish"] = "Y";
		else
			$data["publish"] = "N";
		// execute
		$result = $this->db_lib->insert( $this->table_state, $data );		
		return $result;
	}
	
	// update multiple menus
	public function updateRecords($data)
	{
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				// display order
				if(!$data["order_$id"])
					$data["order_$id"] = 0;
				$arrData = array("display_order" => $data["order_$id"]);
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				$result = $this->db_lib->update($this->table_state, $arrData, "sid = ". $id);
			}
			return $result;
		}
		return false;
	}
	
	// get single sub menu
	public function getStateById($id)
	{
		$result = $this->db_lib->fetchSingle( $this->table_state, "sid = $id" ,"");	
		return $result;
	}
	
	// update single menu
	public function update($data)
	{
		// display order
		if(!$data["display_order"])
			$data["display_order"] = 0;
		// publish
		if($data["publish"] == "Y")
			$data["publish"] = "Y";
		else
			$data["publish"] = "N";
				
		// update record
		$result = $this->db_lib->update($this->table_state, $data, "sid = ". $data["id"]);
		return $result;
	}
	
	// delete single menu
	public function delete($id)
	{
		// delete record
		$result = $this->db_lib->delete($this->table_state, "sid = ". $id);
		return $result;
	}
	
}