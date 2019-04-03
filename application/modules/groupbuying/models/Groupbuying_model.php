<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Groupbuying_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->file_path="uploads/groupbuying_images/";
			$this->load->library("file_manager");

			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			$this->groupbuying_path="uploads/groupbuying/";
			parent::__construct();
    }
	 public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('groupbuying_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("groupbuying_category", $strWhere,"");//exit; 
		return $result;
	}
	
	
	 

    public function createCategory($arrData) {
		$arrData["groupbuying_cat_entry_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('groupbuyingImage', $this->groupbuying_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["groupbuying_cat_image"] = $data1[1];
		return $event_id = $this->db_lib->insert("groupbuying_category", $arrData); 
    }
	
	
	public function updateCategory($arrData) {
	 
		$arrData["groupbuying_cat_update_date"] = date('Y-m-d');
		$data = $this->file_manager->update('groupbuyingImage', $this->groupbuying_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["groupbuying_cat_image"] = $data[1];
		
		$result = $this->db_lib->update("groupbuying_category", $arrData, "groupbuying_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 if($data)
			$this->file_manager->delete($this->groupbuying_path, $data["groupbuying_cat_image"]);
		$result = $this->db_lib->delete("groupbuying_category", "groupbuying_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
		// get total records
		$ids = $data["groupbuying_cat_id"];
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
				$result = $this->db_lib->update("groupbuying_category", $arrData, "groupbuying_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* get single Product data as per where codition
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function findSingleProduct($strWhere = 1) {
		return $this->db_lib->fetchSingle('groupbuying_product', $strWhere,'');
	} 
	/* get mulitple Product data as per where codition
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function productList($strWhere = 1) {
		return $this->db_lib->fetchMultiple('groupbuying_product GP LEFT JOIN machine_category MC ON GP.prod_category=MC.mc_id LEFT JOIN machine_brand MB ON GP.prod_brandName=MB.mb_id ', $strWhere,'MB.brand_name,MC.category_name,GP.*');
	} 

	
 
	/* delete Product data as per where codition
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function productDelete($strWhere = 1) {
		$data=$this->db_lib->fetchSingle('groupbuying_product', $strWhere,'');
		if($data){
			$this->file_manager->delete($this->file_path, $data["prod_photo"]);
			$this->file_manager->delete($this->file_path, $data["prod_brochure"]);
			$this->file_manager->delete($this->file_path, $data["prod_video"]);
		} 
		return $this->db_lib->delete('groupbuying_product', $strWhere);
	} 
 
	/* Product Add
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function productAdd($arrayData){
		$data = $this->file_manager->upload('prodPhoto', $this->file_path, IMG_FORMAT,""); 
		if($data[0])
			$arrayData["prod_photo"] = $data[1];
		
		$data2 = $this->file_manager->upload('prodBrochure', $this->file_path, FILE_FORMAT,""); 
		if($data2[0])
			$arrayData["prod_brochure"] = $data2[1];
		
		$data3 = $this->file_manager->upload('prodVideo', $this->file_path, VIDEO_FORMAT,""); 
		if($data3[0])
			$arrayData["prod_video"] = $data3[1];
		
		$arrayData["created_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("groupbuying_product", $arrayData); 
		return $result;
	}
	/* Product Add
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function productUpdate($arrayData){
		$data = $this->file_manager->upload('prodPhoto', $this->file_path, IMG_FORMAT,""); 
		if($data[0])
			$arrayData["prod_photo"] = $data[1];
		
		$data2 = $this->file_manager->upload('prodBrochure', $this->file_path, FILE_FORMAT,""); 
		if($data2[0])
			$arrayData["prod_brochure"] = $data2[1];
		
		$data3 = $this->file_manager->upload('prodVideo', $this->file_path, VIDEO_FORMAT,""); 
		if($data3[0])
			$arrayData["prod_video"] = $data3[1];
		
		 
		$result=$this->db_lib->update("groupbuying_product", $arrayData,"gp_id= ".$arrayData['id']); 
		return $result;
	}
	/* buying cutomer Request
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function buyingRequest($arrayData){
		 
		$arrayData["request_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("groupbuying_customer_request", $arrayData); 
		return $result;
	} 
	/* buying cutomer Request
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfq($arrayData){
		  
		$arrayData["request_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("groupbuying_admin_rfq", $arrayData); 
		return $result;
	}
	/* buying cutomer Request
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfqList($arrayData){
		  
		$result=$this->db_lib->fetchMultiple("groupbuying_admin_rfq GAR LEFT JOIN machine_category MC ON GAR.prod_category=MC.mc_id  LEFT JOIN machine_brand MB ON GAR.prod_brand=MB.mb_id LEFT JOIN machine_brand_model MBM ON GAR.prod_model=MBM.md_id", "","MB.brand_name,MC.category_name,MBM.model_name, GAR.*"); 
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
		  
		$result=$this->db_lib->fetchMultiple("master_user ", " user_type = 1  ","uid,u_name,u_email, u_mobileno"); 
		return $result;
	}
	/* assign supplier  
		15/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function assignSupplier($data){
		  
		
		// get total records
		$ids = $data["id"]; 
		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["gar_id"] = $data['gar_id'];
					$arrData["supplier_id"] = $id;
					$arrData["request_supplier_date"] = date('Y-m-d');
					$gar_id = $arrData["gar_id"];
					$strWhere = " gar_id = $gar_id AND supplier_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('groupbuying_supplier_request', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("groupbuying_supplier_request", $arrData);
					}else{
						$arrayData['gar_id'] = $old_result['gar_id'];
						$arrayData['request_supplier_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("groupbuying_supplier_request", $arrayData," gar_id = ".$arrayData['rpr_id']);
					}
				}	
			}
			return true;
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
	 
		$arrData["qoutation_updated_date"] = date('Y-m-d');
		//print_r($arrData);exit;
		$result = $this->db_lib->update("groupbuying_customer_request", $arrData, "gcr_id = " . $arrData["gcr_id"]);
        return $result;
    }
	
	/* Consumable Data	*/
	public function findMultipleConsumableCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_category", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsumableName($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_consumables_name", $strWhere,"");//exit; 
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
	public function findMultipleserviceName($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_name", $strWhere,"");//exit; 
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
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_category", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalName($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_name", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalBrand($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_brand", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalType($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_type", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalQty($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_service_part_qty", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalUnit($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_unit", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalSize($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_size", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleSheetMetalThickness($strWhere) {
		$result=$this->db_lib->fetchMultiple("mst_sheet_metal_part_thickness", $strWhere,"");//exit; 
		return $result;
	}
/* Request from frontEnd */
	public function createConsumableRequest($arrData) {
		return $result = $this->db_lib->insert("consumable_customer_rfq", $arrData); 
    }
	public function createServicePartRequest($arrData) {
		return $result = $this->db_lib->insert("service_parts_customer_rfq", $arrData); 
    }
	public function createSheetMetalRequest($arrData) {
		return $result = $this->db_lib->insert("sheet_metal_customer_rfq", $arrData);
    }

 /* Offer from frontEnd */
	public function createConsumableOffer($arrData) {
		return $result = $this->db_lib->insert("consumable_offer", $arrData); 
    }
	public function createServicePartOffer($arrData) {
		return $result = $this->db_lib->insert("service_parts_offer", $arrData); 
    }
	public function createSheetMetalOffer($arrData) {
		return $result = $this->db_lib->insert("sheet_metal_offer", $arrData);
    }

    /* Video Chat Request
	   20/11/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function videoChatRequest($arrayData){
		 
		$result=$this->db_lib->insert("video_chat_requests", $arrayData); 
		return $result;
	} 
}
?>