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

	/* Service  */
	public function findmultipleServicePartsRfq($strWhere) {
		$result=$this->db_lib->fetchMultiple(" service_parts_customer_rfq as spcr LEFT JOIN mst_service_part_name as mspn ON mspn.id=spcr.service_name_id LEFT JOIN mst_service_part_brand as mspb ON mspb.id=spcr.service_brand_id LEFT JOIN mst_service_part_category as mspc ON mspc.id=spcr.service_category_id LEFT JOIN mst_service_part_type as mst ON mst.id= spcr.service_type_id LEFT JOIN master_user as mu ON  mu.uid=spcr.customer_id", $strWhere." ORDER BY spcr.id DESC ","spcr.*,mspn.servicepart_name,mspc.servicepart_category,mst.servicepart_type,mu.u_name,mspb.servicepart_brand");//exit; 
		return $result;
	}
	public function findmultipleServicePartsRfqByAdminToSupplier($id) {
		
		$result=$this->db_lib->fetchMultiple("service_parts_assigned_suppliers as cas LEFT JOIN service_parts_admin_rfq car ON car.id = cas.admin_rfq_id ", " cas.supplier_id = {$id} ORDER BY cas.id DESC ","cas.id as sup_id,admin_rfq_id,cas.supplier_id as cas_supplier_id,supplier_price,admin_price,supplier_status,admin_status,request_supplier_date,request_supplier_date,admin_accepted_date,car.*");//exit; 
		return $result;
	}
 	public function findSingleServicePartsRfq($id) {
		$strWhere = " spcr.id = {$id}";
		$result=$this->db_lib->fetchSingle(" service_parts_customer_rfq as spcr LEFT JOIN mst_service_part_name as mspn ON mspn.id=spcr.service_name_id LEFT JOIN mst_service_part_brand as mspb ON mspb.id=spcr.service_brand_id LEFT JOIN mst_service_part_category as mspc ON mspc.id=spcr.service_category_id LEFT JOIN mst_service_part_type as mst ON mst.id= spcr.service_type_id LEFT JOIN master_user as mu ON  mu.uid=spcr.customer_id", $strWhere,"spcr.*,mspn.servicepart_name,mspc.servicepart_category,mst.servicepart_type,mu.u_name,mspb.servicepart_brand");//exit; 
		return $result;
	}
	public function sendQuotToAdminServiceParts($arrData){	
		$updateData['supplier_price'] = $arrData['supplier_amount'];
		$updateData['id'] = $arrData['id'];
		$updateData['supplier_status'] = 'A';
		$result = $this->db_lib->update("service_parts_assigned_suppliers", $updateData, "id = " . $updateData["id"]);
		return $result;
	}
	/* Service  */
	public function findmultipleSheetMetalRfq($strWhere) {
		$result=$this->db_lib->fetchMultiple(" sheet_metal_customer_rfq as spcr LEFT JOIN mst_sheet_metal_part_name as mspn ON mspn.id=spcr.sheet_name_id LEFT JOIN mst_sheet_metal_part_brand as mspb ON mspb.id=spcr.sheet_brand_id LEFT JOIN mst_sheet_metal_part_category as mspc ON mspc.id=spcr.sheet_category_id LEFT JOIN 	mst_sheet_metal_part_type as mst ON mst.id= spcr.sheet_type_id LEFT JOIN mst_sheet_metal_part_thickness as msmpt ON msmpt.id=spcr.sheetmetal_thickness LEFT JOIN mst_sheet_metal_part_size as msmps ON msmps.id=spcr.sheetmetal_size LEFT JOIN master_user as mu ON  mu.uid=spcr.customer_id", $strWhere." ORDER BY spcr.id DESC ","spcr.*,mspn.sheetmetal_name,mspb.sheetmetal_brand,mspc.sheetmetal_category,mst.sheetmetal_type,msmpt.sheetmetal_thickness,msmps.sheetmetal_size,mu.u_name");//exit; 
		return $result;
	}
	public function findmultipleSheetMetalRfqByAdminToSupplier($id) {
		
		$result=$this->db_lib->fetchMultiple("sheet_metal_assigned_suppliers as cas LEFT JOIN sheet_metal_admin_rfq car ON car.id = cas.admin_rfq_id ", " cas.supplier_id = {$id}  ORDER BY cas.id DESC "," cas.id as sup_id,admin_rfq_id,cas.supplier_id as cas_supplier_id,supplier_price,admin_price,supplier_status,admin_status,request_supplier_date,request_supplier_date,admin_accepted_date,car.*");//exit; 
		return $result;
	}
 	public function findSingleSheetMetalRfq($id) {
		$strWhere = " spcr.id = {$id}";
		$result=$this->db_lib->fetchSingle(" sheet_metal_customer_rfq as spcr LEFT JOIN mst_sheet_metal_part_name as mspn ON mspn.id=spcr.sheet_name_id LEFT JOIN mst_sheet_metal_part_brand as mspb ON mspb.id=spcr.sheet_brand_id LEFT JOIN mst_sheet_metal_part_category as mspc ON mspc.id=spcr.sheet_category_id LEFT JOIN mst_sheet_metal_part_thickness as msmpt ON msmpt.id=spcr.sheetmetal_thickness LEFT JOIN mst_sheet_metal_part_size as msmps ON msmps.id=spcr.sheetmetal_size LEFT JOIN	mst_sheet_metal_part_type as mst ON mst.id= spcr.sheet_type_id LEFT JOIN master_user as mu ON  mu.uid=spcr.customer_id", $strWhere,"spcr.*,mspn.sheetmetal_name,mspb.sheetmetal_brand,mspc.sheetmetal_category,mst.sheetmetal_type,msmpt.sheetmetal_thickness,msmps.sheetmetal_size,mu.u_name");//exit; 
		return $result;
	}
	public function sendQuotToAdminSheetMetal($arrData){	
		$updateData['supplier_price'] = $arrData['supplier_amount'];
		$updateData['id'] = $arrData['id'];
		$updateData['supplier_status'] = 'A';
		$result = $this->db_lib->update("sheet_metal_assigned_suppliers", $updateData, "id = " . $updateData["id"]);
		return $result;
	}
	
	
	
	
	
	
	
	
	
	
	
 	public function createBrandModel($arrData){
	 
		$result=$this->db_lib->insert("machine_brand_model", $arrData); 
		return $result;
	}
	public function updateMachineBrandModel($arrData){
		$result = $this->db_lib->update("machine_brand_model", $arrData, "md_id = " . $arrData["id"]);
		return $result;
	}

	public function deleteMachineBrandModel($id) {  
		$result = $this->db_lib->delete("machine_brand_model", "md_id = " . $id);
        return $result;
    }
}
?>