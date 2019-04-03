<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model 
{
	// declare private variables
	public $table = "mst_country";
	
	// constructor
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	// get full Country list for frontend ( site )
	public function getCountryListForSite()
	{
		$result = $this->db_lib->fetchMultiple( $this->table, " publish = 'Y' " . " ORDER BY country_name" );
		return $result;
	}
	
	// get single Country for frontend ( site )
	public function getCountryByIdForSite($id = 0)
	{
		$result = $this->db_lib->fetchSingle( $this->table, "id = $id and publish = 'Y' ORDER BY country_name","" );		
		return $result;
	}
	
	
	// get full Country list
	public function getCountryList()
	{
		$result = $this->db_lib->fetchMultiple( $this->table . " ORDER BY country_name" ,"","");		
		return $result;
	}
	
	// create Country
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
		$result = $this->db_lib->insert( $this->table, $data );		
		return $result;
	}
	
	// update multiple Countrys
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
				$result = $this->db_lib->update($this->table, $arrData, "id = ". $id);
			}
			return $result;
		}
		return false;
	}
	
	// get single Country
	public function getCountryById($id)
	{
		$result = $this->db_lib->fetchSingle( $this->table, "id = $id" );		
		return $result;
	}
	
	// update single Country
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
		$result = $this->db_lib->update($this->table, $data, "id = ". $data["id"]);
		return $result;
	}
	
	// delete single Country
	public function delete($id)
	{
		// delete record
		$result = $this->db_lib->delete($this->table, "id = ". $id);
		return $result;
	}
	
}