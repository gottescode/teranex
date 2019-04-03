<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminapi extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("admin_model");
    }
 //find single page data
	public function findSingle_get(  $page_id, $strWhere = 1) {
	
	
		if( !(int)$page_id ){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$strWhere .= "  AND pg.id = $page_id ";
			$response = [
				"result" => $this->pages_model->findSingle($strWhere)
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function userTypeList_get($id=1) {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		  
			$response = [
				"result" => $this->admin_model->userRoleList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function getUserRole_get($id=1) {
		$data=$this->get();
		$id =$data['id'];
		if(!$strWhere) $strWhere = 1;
		  
			$response = [
				"result" => $this->admin_model->getUserRole($id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function menuList_get($id=1) {
		$data=$this->get();
			$response = [
				"result" => $this->admin_model->menuList($id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function menuListByuserRoleType_post() {
			$data=$this->post();
			$response = [
				"result" => $this->admin_model->menuListByuserRoleType($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function userRoleList_get($id=1) {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		  
			$response = [
				"result" => $this->admin_model->userRoleList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function getUserAccessRoles_get() {
		$data = $this->get();
			$response = [
				"result" => $this->admin_model->getUserAccessRoles($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}	

	public function updatePublishCategory_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->admin_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 	
}

?>
