<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Machineonrent_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			$this->load->library("file_manager");
			$this->on_rent_machine_master="on_rent_machine_master"; 
			$this->on_rent_service_master="on_rent_service_master"; 
			$this->frontend_machine_on_rent="frontend_machine_on_rent"; 
			// $this->frontend_machine_on_rent_software="frontend_machine_onrent_software"; 
			$this->frontend_machine_on_rent_software="frontend_machine_on_rent_software"; 
			$this->on_rent_infra_master="on_rent_infrastructure_data"; 
			$this->on_rent_infra_master_cat="frontend_machnine_on_rent_main_category"; 
			$this->frontend_machine_on_rent_sub ="frontend_machine_on_rent_subdata"; 
			$this->frontend_path="uploads/machine_on_rent_frontend_images"; 
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

	public function findSingleFront($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->frontend_machine_on_rent, $strWhere,'');
	}
	public function findMultipleFront($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->frontend_machine_on_rent, $strWhere."","");//exit; 
		return $result;
	}
	public function findMultipleFrontEnd($from,$to) {
		$result=$this->db_lib->fetchMultiple($this->frontend_machine_on_rent," id >=$from AND id <=$to ","");//exit; 
		return $result;
	}
	public function createFront($arrData) {
		//$data1 = $this->file_manager->upload('image', $this->frontend_path, IMG_FORMAT, "");
		
        //if ($data1[0])
          //  $arrData["image"] = $data1[1];
            $arrData["text"] = $arrData["description"];

	$page_id = $this->db_lib->insert("frontend_machine_on_rent",$arrData);
		
		return $page_id ;
    }
	public function updateFront($arrData) { 
	    $data = $this->file_manager->update('image', $this->frontend_path, IMG_FORMAT, $arrData["old_image"]);

        //if ($data[0])
          //  $arrData["image"] = $data[1];

	
		$result = $this->db_lib->update($this->frontend_machine_on_rent, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deleteFront($id) {
		$result = $this->db_lib->delete($this->frontend_machine_on_rent, "id = " . $id);
        return $result;
    } 
	
	public function findSingleFrontSoftware($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->frontend_machine_on_rent_software, $strWhere,'');
	}
	public function findMultipleFrontSoftware($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->frontend_machine_on_rent_software, $strWhere."","");//exit; 
		return $result;
	}
	public function findMultipleFrontEndSoftware($from,$to) {
		$result=$this->db_lib->fetchMultiple($this->frontend_machine_on_rent_software," id >=$from AND id <=$to ","");//exit; 
		return $result;
	}
	public function createFrontSoftware($arrData) {
		$data1 = $this->file_manager->upload('image', $this->frontend_path, IMG_FORMAT, "");
		
        if ($data1[0])
			$arrData["image"] = $data1[1];
            $arrData["text"] = $arrData["text"];

	$page_id = $this->db_lib->insert("frontend_machine_on_rent_software",$arrData);
		
		return $page_id ;
    }
	public function updateFrontSoftware($arrData) { 
	    $data = $this->file_manager->update('image', $this->frontend_path, IMG_FORMAT, $arrData["old_image"]);

        if ($data[0])
            $arrData["image"] = $data[1];

	
		$result = $this->db_lib->update($this->frontend_machine_on_rent_software, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deleteFrontSoftware($id) {
		$result = $this->db_lib->delete($this->frontend_machine_on_rent_software, "id = " . $id);
        return $result;
    } 
	
	public function findSingleMachineOnrentCat($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->on_rent_infra_master_cat, $strWhere,'');
	}
	public function findMultipleMachineOnrentCat($strWhere) {
		$result=$this->db_lib->fetchMultiple($this->on_rent_infra_master_cat." ", $strWhere."","");//exit; 
		return $result;
	}
	public function createMachineOnrentCat($arrData) {
		$page_id = $this->db_lib->insert($this->on_rent_infra_master_cat, $arrData);
		return $page_id ;
    }
	public function updateMachineOnrentCat($arrData) { 
		$result = $this->db_lib->update($this->on_rent_infra_master_cat, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deleteMachineOnrentCat($id) {
		$result = $this->db_lib->delete($this->on_rent_infra_master_cat, "id = " . $id);
        return $result;
    }

	public function findSingleFrontSubCatrgory($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->frontend_machine_on_rent_sub, $strWhere,'');
	}
	public function findMultipleFrontSubCatrgory($strWhere) {

		$result=$this->db_lib->fetchMultiple($this->frontend_machine_on_rent_sub, $strWhere."","");//exit; 
		return $result;
	}
	public function createFrontSubCatrgory($arrData) {
		$data1 = $this->file_manager->upload('image', $this->frontend_path, IMG_FORMAT, "");
		
        if ($data1[0])
			$arrData["image"] = $data1[1];
            $arrData["text"] = $arrData["text"];

	$page_id = $this->db_lib->insert("frontend_machine_on_rent_subdata",$arrData);
		
		return $page_id ;
    }
	public function updateFrontSubCatrgory($arrData) { 
	    $data = $this->file_manager->update('image', $this->frontend_path, IMG_FORMAT, $arrData["old_image"]);

        if ($data[0])
            $arrData["image"] = $data[1];

	
		$result = $this->db_lib->update($this->frontend_machine_on_rent_sub, $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	public function deleteFrontSubCatrgory($id) {
		$result = $this->db_lib->delete($this->frontend_machine_on_rent_sub, "id = " . $id);
        return $result;
    } 
		


}	?>