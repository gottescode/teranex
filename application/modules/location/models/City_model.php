<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model 
{
	// declare private variables
	public $table_city = "mst_cities";
	public $table_state = "mst_states";
	public $table_country = "mst_country";
	// constructor
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	// get full city list for frontend ( site )
	public function getCityForSite($id = 0)
	{
		$strWhere = "tcity.id <> 0";
		if($id) $strWhere = "tcity.state_id = $id";
		// execute
		$result = $this->db_lib->fetchMultiple( "$this->table_city tcity JOIN $this->table_state ts ON tcity.state_id = ts.id JOIN $this->table_country tc ON ts.country_id = tc.id", $strWhere." AND tcity.publish = 'Y' AND tc.publish = 'Y' AND ts.publish = 'Y' ORDER BY tcity.display_order","tcity.*");
		// return		
		return $result;
	}
	
	// get single city for frontend ( site )
	public function getCityByIdForSite($id = 0)
	{
		$result = $this->db_lib->fetchSingle( $this->table_city, "state_id = $id and publish = 'Y' ORDER BY display_order","id,city_name" );
		return $result;
	}
	
	// get full city list
	public function getCityList($stateId=0)
	{
		// if main city id is present
		$where="state_id = '$stateId'";
		$result = $this->db_lib->fetchMultiple( $this->table_city," $where ORDER BY city_name","");
		// return		
		return $result;
	}
	// get full city list
	public function cityList($where=0)
	{ 
		$result = $this->db_lib->fetchMultiple(" $this->table_city tcity JOIN $this->table_state ts ON tcity.state_id = ts.id JOIN $this->table_country tc ON ts.country_id = tc.id LEFT JOIN packages_list PL ON PL.city_id=tcity.id"," $where GROUP BY PL.city_id  ORDER BY city_name ","tcity.city_name,tcity.id,tc.country_name,count(city_id) AS packageCount");
		// return		
		return $result;
	}
	 
	// create city
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
		$result = $this->db_lib->insert( $this->table_city, $data );		
		return $result;
	}
	
	// update multiple citys
	public function updateRecords($data)
	{
		// get total records
		$ids = $data["cityid"];
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
				$result = $this->db_lib->update($this->table_city, $arrData, "id = ". $id);
			}
			return $result;
		}
		return false;
	}
	
	// get single sub city
	public function getCityById($id)
	{
		$table = " {$this->table_city} as ct LEFT JOIN mst_states as ms ON ct.state_id = ms.sid ";
		$select = " ct.*,ms.country_id ";
		$result = $this->db_lib->fetchSingle( $table, "id = $id" ,$select);	
		return $result;
	}
	
	// update single city
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
		$result = $this->db_lib->update($this->table_city, $data, "id = ". $data["id"]);
		return $result;
	}
	
	// delete single city
	public function delete($id)
	{
		// delete record
		$result = $this->db_lib->delete($this->table_city, "id = ". $id);
		return $result;
	}
	
}