<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Exchangegroup_model extends CI_Model {



    // constructor of this class

    function __construct() {

        // call parent constructor
			$this->customer_path="uploads/customer/"; 
			$this->load->library("file_manager");
			$this->customer_details="customer_details";
			$this->machine_path="uploads/machine/";
			$this->machine_category="machine_category";
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			parent::__construct();

    }

	public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('user_details UD JOIN master_user MU ON UD.uid=MU.uid', $strWhere,'UD.*,MU.u_avatar, MU.u_name, MU.u_email,MU.u_mobileno, MU.u_date_birth, MU.specific_interests, MU.user_resume, MU.profile_summary');
	}
	public function findmultipleExchangegroup($strWhere) {
		$result=$this->db_lib->fetchMultiple("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.customer_id ", $strWhere." ORDER BY egi.id DESC ","egi.*,mu.u_name");//exit; 
		return $result;
	}
	public function findmultipleExchangegroupSupplier($strWhere) {
		$result=$this->db_lib->fetchMultiple("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.customer_id ", $strWhere." ORDER BY egi.id DESC ","egi.*,mu.u_name");//exit; 
		return $result;
	}
	public function findmultipleConsumableRfqByAdminToSupplier($id) {
		
		$result=$this->db_lib->fetchMultiple("consumable_assigned_suppliers as cas LEFT JOIN consumable_admin_rfq car ON car.id = cas.admin_rfq_id ", " cas.supplier_id = {$id} ","cas.id as sup_id,admin_rfq_id as admin_rfq_id,cas.supplier_id as cas_supplier_id,supplier_price as supplier_price,admin_price as admin_price,supplier_status as supplier_status,admin_status as admin_status,request_supplier_date as request_supplier_date,admin_accepted_date,car.*");//exit; 
		return $result;
	}
 	public function findSingleExchangeRfq($id) {
		$strWhere = " egi.id = {$id}";
		$result=$this->db_lib->fetchSingle("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.supplier_id ", $strWhere." ORDER BY egi.id DESC ","egi.*,mu.u_name");//exit; 
		return $result;
	}
	public function findSingleExchangeRfqSupplier($id) {
		$strWhere = " egi.id = {$id}";
		$result=$this->db_lib->fetchSingle("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.customer_id ", $strWhere." ORDER BY egi.id DESC ","egi.*,mu.u_name");//exit; 
		return $result;
	}
	public function findSingleExchangeRfqAdmin($id) {
		$strWhere = " egi.id = {$id}";
		$result=$this->db_lib->fetchSingle("exchange_group_inquiry as egi LEFT JOIN master_user as mu ON mu.uid = egi.customer_id LEFT JOIN master_user as mum ON mum.uid = egi.supplier_id ", $strWhere." ORDER BY egi.id DESC ","egi.*,mu.u_name as customer_name,mum.u_name as supplier_name");//exit; 
		return $result;
	}
	public function sendQuoatToAdmin($arrData){	
		$updateData["request_accepted"] = date("Y-m-d H:i:s");
		$updateData['supplier_comments'] = $arrData['supplier_comments'];
	//	$updateData['supplier_comments'] = $arrData['supplier_comments'];
		$updateData['id'] = $arrData['id'];
		$updateData['supplier_id'] = $arrData['supplier_id'];
		$updateData['status'] = 'A';
		$result = $this->db_lib->update("exchange_group_inquiry", $updateData, "id = " . $updateData["id"]);
		return $result;
	}
	public function sendQuotToAdminCancel($arrData){	
		$updateData['id'] = $arrData['id'];
		$updateData['supplier_id'] = 0;
		$updateData['status'] = 'R';
		$result = $this->db_lib->update("exchange_group_inquiry", $updateData, "id = " . $updateData["id"]);
		return $result;
	}
	
	public function findSingleCountry($strWhere = 1) {
		return $this->db_lib->fetchSingle('mst_country', $strWhere,"");
	}
	public function findSingleState($strWhere = 1) {
		return $this->db_lib->fetchSingle('mst_states', $strWhere,"");
	}
	public function findSingleCity($strWhere = 1) {
		return $this->db_lib->fetchSingle('mst_cities', $strWhere,"");
	}
	public function offeredList($id) {
		return $this->db_lib->fetchMultiple('exchange_group_offers', " 1 AND supplier_id={$id} ORDER BY id DESC","");
	}
	public function offeredListAdmin() {
		return $this->db_lib->fetchMultiple('exchange_group_offers', " 1 ORDER BY id DESC","");
	}
	public function offeredListFrontEnd() {
		return $this->db_lib->fetchMultiple('exchange_group_offers as ego LEFT JOIN master_user as mu ON mu.uid=ego.supplier_id', " 1 ORDER BY id DESC"," ego.*,mu.u_name as supplier_name ");
	}
	public function findSingleOfferedData($id) {
		return $this->db_lib->fetchSingle('exchange_group_offers', " 1 AND id=$id ",'');
	}
	public function createOffer($arrData){
		$result=$this->db_lib->insert("exchange_group_offers", $arrData); 
		return $result;
	}

}
?>