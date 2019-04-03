<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Consumable_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			parent::__construct();
    }
	 public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('groupbuying_category', $strWhere,'');
	}
	 public function singleRfqDetails($strWhere = 1) {
		return $this->db_lib->fetchSingle('consumable_admin_rfq', $strWhere,'');
	}
	 
	public function consumableCustrequestList($strWhere) {
		$result=$this->db_lib->fetchMultiple("consumable_customer_rfq", $strWhere,"");//exit; 
		return $result;	
	}
	public function supplierQuotationList($strWhere) {
		$result=$this->db_lib->fetchMultiple("consumable_assigned_suppliers as cas LEFT JOIN master_user as mu ON  mu.uid=cas.supplier_id", $strWhere," cas.*,mu.u_name as supplier_name");//exit; 
		return $result;
	}
	public function supplierRfqList($strWhere) {
		$result=$this->db_lib->fetchMultiple(" consumable_assigned_suppliers as cas LEFT JOIN consumable_admin_rfq  as car ON cas.id=cas.admin_rfq_id", $strWhere,"car.cons_quantity,cas.*");
		return $result;
	}
	
    public function createCategory($arrData) {
		$arrData["groupbuying_cat_entry_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('groupbuyingImage', $this->groupbuying_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["groupbuying_cat_image"] = $data1[1];
		return $event_id = $this->db_lib->insert("groupbuying_category", $arrData); 
    }
	
	public function sendConsumableQuotation($arrData) {
		$arrData['supplier_status'] ='A';
		$result = $this->db_lib->update("consumable_assigned_suppliers", $arrData, "id = " . $arrData["id"]);
        return $result;
    }
	
	public function adminRfqList($arrayData){
		$result=$this->db_lib->fetchMultiple("consumable_admin_rfq","",""); 
		return $result;
	}
	/* buying cutomer Request
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function collectiveBuyingReqList(){
	
		$result=$this->db_lib->fetchMultiple("groupbuying_customer_request GCR LEFT JOIN machine_category MC ON GCR.product_cat=MC.mc_id  LEFT JOIN machine_brand MB ON GCR.prod_brandName=MB.mb_id LEFT JOIN machine_brand_model MBM ON GCR.prod_model=MBM.md_id"," 1 ORDER BY gcr_id ASC "," MB.brand_name, MC.category_name, MBM.model_name, GCR.*"); 
		return $result;
	} 
	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function supplierList(){
		  
		$result=$this->db_lib->fetchMultiple("master_user", "u_user_type = 'S' ","uid,u_name,u_email, u_mobileno"); 
		return $result;
	}
	public function rfqDetails($strWhere){
		  
		$result=$this->db_lib->fetchMultiple("consumable_customer_rfq",$strWhere,""); 
		return $result;
	}
	/* assign supplier  
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function assignSupplier($data){
		$adminRfqid=$this->db_lib->insert("consumable_admin_rfq", $data); 
		// get total records
		if($adminRfqid){
			$ids = $data["id"]; 
		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["admin_rfq_id"] = $adminRfqid;
					$arrData["supplier_id"] = $id;
					$arrData["request_supplier_date"] = date('Y-m-d');
					$strWhere = " admin_rfq_id = $adminRfqid AND supplier_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('consumable_assigned_suppliers', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("consumable_assigned_suppliers", $arrData);
					}else{
						$arrayData['id'] = $old_result['id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("consumable_assigned_suppliers", $arrayData," id = ".$arrayData['id']);
					}
				}	
			}
			$updatedata['rfq_status'] = 'Y';
			$rfq_ids = $data['rfq_ids'];
			$result = $this->db_lib->update("consumable_customer_rfq", $updatedata," id IN({$rfq_ids}) ");
			
			return true;
		}
		return false;
		}
		
		
		return false;
	} 
	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function requestListAsUser($uid){
		  
		$result=$this->db_lib->fetchMultiple("groupbuying_supplier_request GSR JOIN groupbuying_admin_rfq GAR ON GSR.gar_id=GAR.gar_id", "GSR.supplier_id = '$uid' ","GSR.*, product_specification, expyearlyforecast,no_of_custumer "); 
		return $result;
	}
	/* supplier List
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function requestDetails($gsrId){
		  
		$result=$this->db_lib->fetchSingle("groupbuying_supplier_request GSR JOIN groupbuying_admin_rfq GAR ON GSR.gar_id=GAR.gar_id  LEFT JOIN machine_category MC ON GAR.prod_category=MC.mc_id  LEFT JOIN machine_brand MB ON GAR.prod_brand=MB.mb_id LEFT JOIN machine_brand_model MBM ON GAR.prod_model=MBM.md_id", "gsr_id = '$gsrId' ","GSR.*, product_specification, expyearlyforecast,no_of_custumer , MB.brand_name,GAR.supplier_id ,MC.category_name,MBM.model_name"); 
		return $result;
	}

	 /**

	 * Group Buying Supplier List

	 * Created Date 12-07-2018 Deepak Shinde

	 * @access public

	 * @param  rarc_id

	 * @return array of requestList

	 */ 

    public function GroupbuyingSuppliers($garID) { 

        $strWhere = "gar_id = '$garID' ";
		$result = $this->db_lib->fetchMultiple("groupbuying_supplier_request GSR JOIN master_user MU ON GSR.supplier_id=MU.uid", $strWhere."AND request_status='A'","MU.u_name,MU.u_email, GSR.gsr_id,request_supplier_date,supplier_id");

        return $result;

    }
	

	public function findSingle_GroupBuying_quote_supplier($strWhere = 1) {
		return $this->db_lib->fetchSingle('groupbuying_supplier_request', $strWhere,"");
	}



	public function GroupBuyingSupplierListUpdate($gsr_id) { 

		$data['admin_accept_status']='Y';

		$result = $this->db_lib->update("groupbuying_supplier_request  ",$data, " gsr_id = ".$gsr_id);

		$result_data = $this->db_lib->fetchSingle("groupbuying_supplier_request  "," gsr_id = ".$gsr_id);



		$supplier_id = $result_data['supplier_id'];

		$gar_id = $result_data['gar_id'];

		$updateData['supplier_id'] = $supplier_id;

		$result = $this->db_lib->update("groupbuying_admin_rfq",$updateData, " gar_id = ".$gar_id);

        return $result;

    }


	public function SingleGroupbuyingSuppliers($strWhere) {
		return $this->db_lib->fetchSingle('groupbuying_admin_rfq', $strWhere,"");
	}


	public function findSingleCustomerRequestList($gcrID) {
		$strWhere = "gcr_id = '$gcrID' ";
		return $this->db_lib->fetchSingle('groupbuying_customer_request', $strWhere,"");
	}
	

	public function updateQuotationSupplierPrice($arrData) {
		
		$adminAmount = $arrData['admin_price'];
		$rfq_ids =$arrData['rfq_ids'];
		$cons_quantity = $arrData['cons_quantity'];
		$singleAmount = $adminAmount/$cons_quantity;
		
		//get all customer results
		$strWhere = " id IN({$rfq_ids})  ";
		$result = $this->db_lib->fetchMultiple("consumable_customer_rfq",$strWhere,""); 
	
		foreach($result as $row){
			//update the amount
			$amount = 0;
			$amount = round($singleAmount*$row['cons_quantity']);
			$arrData1['quote_price_by_admin'] = $amount;
			$arrData1['quote_status'] = 'Y';
			$result = $this->db_lib->update("consumable_customer_rfq", $arrData1, "id = " . $row["id"]);	
		}
		
			$adminData['admin_final_price'] = $adminAmount;
			$adminData['supplier_id'] = $arrData['supplier_id'];
			$admin_result = $this->db_lib->update("consumable_admin_rfq", $adminData, "id = " . $arrData["admin_rfq_id"]);
			$adminUpData['admin_status'] = 'A';
			$adminUpData['admin_accepted_date'] = date('Y-m-d H:i:s');
			$adminUpData['admin_price'] = $adminAmount;
			$supplier_result = $this->db_lib->update("consumable_assigned_suppliers", $adminUpData, "id = " . $arrData["id"]);
			return $supplier_result;
    }
	
	/* Consumable Data	*/
	public function findMultipleConsumableCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleConsumableBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_quantity", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_unit", $strWhere,"");//exit; 
		return $result;
	}
	
	/* Service Part */
	public function findMultipleServiceCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleServiceBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_qty", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleServiceUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_unit", $strWhere,"");//exit; 
		return $result;
	}
	/* Sheet Metal */
	public function findMultipleSheetMetalCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_category", $strWhere,"");//exit; 
		return $result;
	}
	
	public function findMultipleSheetMetalBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_qty", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_unit", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalSize($strWhere) {
		$result=$this->db_lib->fetchMultiple("	mst_sheet_metal_part_size", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalThickness($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_thickness", $strWhere,"");//exit; 
		return $result;
	}
	
}
?>