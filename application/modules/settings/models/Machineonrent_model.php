<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Machineonrent_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->on_rent_machine_master="on_rent_machine_master"; 
			$this->on_rent_service_master="on_rent_service_master"; 
			$this->on_rent_infra_master="on_rent_infrastructure_data"; 
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->on_rent_machine_master, $strWhere,'');
	}
	public function findMultiple($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->on_rent_machine_master." ", $strWhere."","");//exit; 
		return $result;
	}
	public function create($arrData) {
		$page_id = $this->db_lib->insert($this->on_rent_machine_master, $arrData);
		return $page_id ;
    }
	public function update($arrData) { 
		$result = $this->db_lib->update($this->on_rent_machine_master, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deletetype($id) {
		$result = $this->db_lib->delete($this->on_rent_machine_master, "id = " . $id);
        return $result;
    } 

    public function findSingleService($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->on_rent_service_master, $strWhere,'');
	}
	public function findMultipleService($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->on_rent_service_master." ", $strWhere."","");//exit; 
		return $result;
	}
	public function createService($arrData) {
		$page_id = $this->db_lib->insert($this->on_rent_service_master, $arrData);
		return $page_id ;
    }
	public function updateService($arrData) { 
		$result = $this->db_lib->update($this->on_rent_service_master, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deletetypeService($id) {
		$result = $this->db_lib->delete($this->on_rent_service_master, "id = " . $id);
        return $result;
    } 
	
	public function findSingleInfra($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->on_rent_infra_master, $strWhere,'');
	}
	public function findMultipleInfra($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->on_rent_infra_master." ", $strWhere."","");//exit; 
		return $result;
	}
	public function createInfra($arrData) {
		$page_id = $this->db_lib->insert($this->on_rent_infra_master, $arrData);
		return $page_id ;
    }
	public function updateInfra($arrData) { 
		$result = $this->db_lib->update($this->on_rent_infra_master, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deletetypeInfra($id) {
		$result = $this->db_lib->delete($this->on_rent_infra_master, "id = " . $id);
        return $result;
    } 


}	?>