<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Automation_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->automation_path="uploads/automation/";
			$this->automation_category="automation_category";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			parent::__construct();
    }
	public function findSingleAutomationCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('automation_category', $strWhere,'');
	}
    public function findMultipleAutomationCat($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('automation_category', $strWhere,'');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
 	public function createCategory($arrData){
		$data1 = $this->file_manager->upload('category_image', $this->automation_path, IMG_FORMAT,"");
		if($data1[0])
			$arrData["category_image"] = $data1[1];
		
		$video = $this->file_manager->upload('videoLink', $this->automation_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["video_upload"] = $video[1];
	
		$arrData["created_date"] = date('Y-m-d');
		$result=$this->db_lib->insert("automation_category", $arrData); 
		return $result;
	}
	public function updateAutomationCategory($arrData){
		$data1 = $this->file_manager->update('category_image', $this->automation_path, IMG_FORMAT,$arrData["old_image"]);
		if($data1[0])
			$arrData["category_image"] = $data1[1];
		$video = $this->file_manager->update('videoLink', $this->automation_path, VIDEO_FORMAT,$arrData["old_video"]);
		if($video[0])
			$arrData["video_upload"] = $video[1];

		$result = $this->db_lib->update("automation_category", $arrData, "am_id = " . $arrData["id"]);
       
		return $result;
	}
	public function updatePublishAutomationCategory($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("automation_category", $arrData, "am_id = ". $id);
			}
			return true;
		}
		return false;
	}
	public function delete($id) { 
		$data = $this->db_lib->fetchSingle("automation_category", "am_id = $id");
		if($data)
			$this->file_manager->delete($this->automation_path, $data["category_image"]);
			$this->file_manager->delete($this->automation_path, $data["automation_video"]);
		
		$result = $this->db_lib->delete("automation_category", "am_id = " . $id);
        return $result;
    }
/* =============== AUTOMATION DETAILS ================= */
	public function findSingleAutomationDetails($strWhere = 1) {
		return $this->db_lib->fetchSingle('automation_details', $strWhere,'');
	}
 	public function automationDetailsMultiple($strWhere = 1) {
		$table = " automation_details as ad LEFT JOIN automation_category as ac ON ad.category_id=ac.am_id LEFT JOIN automation_brand AB ON ad.brand_name=AB.ab_id  LEFT JOIN automation_brand_model ABM ON ad.model_no=ABM.ad_id ";
		$select =' ad.*,ac.category_name as catName,AB.brand_name AS brandName, ABM.model_name AS modelName';
		$result = $this->db_lib->fetchMultiple($table, $strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	public function findMultipleComapareAutomations($strWhere = 1) {
		$table = ' automation_details as ad LEFT JOIN automation_category as ac ON ad.category_id=ac.am_id';
		$select =' ad.ad_id,brand_name,model_no,model_no,control_panel,table_w,table_l,automation_axes,travel_long,travel_cross,automation_power,automation_rpm,automation_image,ac.category_name as catName';
		$result = $this->db_lib->fetchMultiple($table, $strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	public function automationInsertDetails($arrData) {  
	
		$arrData["created_date"] = date('Y-m-d'); 
		$data1 = $this->file_manager->upload('automation_image', $this->automation_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["automation_image"] = $data1[1];
			
		$video = $this->file_manager->upload('automationVideo', $this->automation_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["automation_video"] = $video[1];
		
		return $result=$this->db_lib->insert("automation_details", $arrData); 
	}
	public function updateAutomationDetails($arrData){
		$data1 = $this->file_manager->update('automation_image', $this->automation_path, IMG_FORMAT,$arrData['old_image'],1);
		if($data1[0])
			$arrData["automation_image"] = $data1[1];
		
		$video = $this->file_manager->update('automationVideo', $this->automation_path, VIDEO_FORMAT,$arrData['old_video']);
		 
		if($video[0]) 
			$arrData["automation_video"] = $video[1];
		
		
		return $result = $this->db_lib->update("automation_details", $arrData, " ad_id = " . $arrData["id"]);
		
	}
	public function deleteAutomationDetails($id) { 
		$data = $this->db_lib->fetchSingle("automation_details", "ad_id = $id");
		if($data)
			$this->file_manager->delete($this->automation_path, $data["automation_video"]);
		
		$result = $this->db_lib->delete("automation_details", " ad_id = " . $id);
        return $result;
    }
	/*find Automation List Category
			18/4/2018
	 * @access public
	 * @param  get category Id
	 * @return array of 
	 */
	public function findAutomationListCategory($strWhere) { 
		 
		$result = $this->db_lib->fetchMultiple("automation_details AD LEFT JOIN mst_country MC ON AD.automation_location_country=MC.id LEFT JOIN 	mst_states MS ON AD.automation_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON AD.automation_location_city=MCC.id LEFT JOIN automation_brand AB ON AD.brand_name=AB.ab_id  LEFT JOIN automation_brand_model ABM ON AD.model_no=ABM.ad_id", " $strWhere ","AD.*, MC.country_name, MS.state_name, MCC.city_name,AB.brand_name AS brandName, ABM.model_name AS modelName "); 
        return $result;
    }
	/*find Automation details 
			19/4/2018
	 * @access public
	 * @param  get automation id
	 * @return array of 
	 */
	public function findSingleAutomationDetailsFront($ad_id) { 
		$result = $this->db_lib->fetchSingle("automation_details AD LEFT JOIN mst_country MC ON AD.automation_location_country=MC.id LEFT JOIN 	mst_states MS ON AD.automation_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON AD.automation_location_city=MCC.id JOIN automation_category ACat ON AD.category_id=ACat.am_id LEFT JOIN automation_brand AB ON AD.brand_name=AB.ab_id  LEFT JOIN automation_brand_model ABM ON AD.model_no=ABM.ad_id", "AD.ad_id = $ad_id","AD.*, MC.country_name, MS.state_name, MCC.city_name,ACat.category_name, AB.brand_name AS brandName, ABM.model_name AS modelName "); 
        return $result;
    }
	
	/*find Automation details 
			19/4/2018
	 * @access public
	 * @param  get automation id
	 * @return array of 
	 */
	public function findCategoryCount($cid,$automationUsed) { 
	if($automationUsed=='new'){ $condi=" AND  isUsed = 'N' ";}
		if($automationUsed=='used'){ $condi=" AND isUsed = 'Y' ";}
		$result = $this->db_lib->fetchSingle("automation_details AD JOIN 	automation_category as AC ON AD.category_id=AC.am_id ", "category_id = $cid $condi "," AC.category_name, count(ad_id) AS automationCount"); 
        return $result;
    }
	/*create Gallery
			19/4/2018
	 * @access public
	 * @param  get automation id
	 * @return array of 
	 */
	public function createGallery($arrData) {
		$data = $this->file_manager->multi_upload('photo_name', $this->automation_path, IMG_FORMAT,"",1);
		$arData['photo_name']=$data;
		$arData['ad_id']=$arrData['ad_id'];
		foreach ($arData['photo_name'] as  $value) {
			         	if($data[0])
			         	    $arData['photo_name']=$value[1];
			         	$result = $this->db_lib->insert("automation_photos",$arData);
			    }
		if ($result) {
			return $result;
		}
        return false;
    }
	public function findMultipleGalleryImages($strWhere) {
		return $this->db_lib->fetchMultiple('automation_photos', $strWhere);
	}
	
	public function delete_gallary($id) {
		$data = $this->db_lib->fetchSingle('automation_photos', "ap_id = $id");
		if($data['photo_name'])
			$this->file_manager->delete($this->path, $data["photo_name"]);
				
		$result = $this->db_lib->delete('automation_photos', "ap_id = " . $id);
        return $result;
    }
    
		/////////////////////////////    automation Finace Request  //////////////////////////////////
	/*automation Finace Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function automationFinaceRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert(" automation_finance_request",$data); 
        return $result;
    }
	/*automation video Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function automationVideoRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert(" automation_video_request",$data); 
        return $result;
    }
	/*automation Finace Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function automationContactRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("automation_contact_request",$data); 
        return $result;
    }
	/*automation Finace contact Enquiry  Admin 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationContactRequestAdmin() { 
		$result = $this->db_lib->fetchMultiple(" automation_contact_request ACR JOIN automation_details AD ON ACR.automation_id=AD.ad_id", "	ACR.ac_id<>0   ORDER BY enquiry_date","ACR.*, AD.model_no,AD.brand_name"); 
        return $result;
    }
	/*automation Finace contact Enquiry 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationContactRequest($user_id) { 
		$result = $this->db_lib->fetchMultiple(" automation_contact_request ACR JOIN automation_details AD ON ACR.automation_id=AD.ad_id", "	ACR.am_id<>0 AND user_id = $user_id ORDER BY enquiry_date","ACR.*, AD.model_no,AD.brand_name"); 
        return $result;
    }
	/*automation Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationFinaceRequest() { 
		$result = $this->db_lib->fetchMultiple(" automation_finance_request AFR JOIN automation_details AD ON AFR.automation_id=AD.ad_id", "	afr_id<>0 ORDER BY enquiry_date","AFR.*, AD.model_no,AD.brand_name"); 
        return $result;
    }
	public function automationRequest() { 
		$table = " automation_enquiry ae LEFT JOIN master_user as MU ON MU.uid = ae.u_id INNER JOIN automation_details ad ON FIND_IN_SET(ad.ad_id, ae.compared_automation_ids) > 0  ";
		$select = " ae.*,GROUP_CONCAT(ad.brand_name ORDER BY ad.ad_id) AS bname,u_name,u_mobileno,u_email,model_no,brand_name ";
		$strWhere = " 1 GROUP BY ae.enq_id ";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select); 
        return $result;
    }
	/*automation Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationEnquiryRequest($arrData){
		$arrData["enquiry_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("automation_enquiry", $arrData); 
		return $result;
	}

/////////////////////////////    automation brand    //////////////////////////////////
	/*automation brand Request 
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleAutomationBrand($id) {
		return $this->db_lib->fetchSingle('automation_brand'," ab_id= $id ",'');
	}
	
	/*automation brand multile list
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function findMultipleAutomationBrand($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('automation_brand', $strWhere." ORDER BY brand_name",'');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	/*automation brand create 
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function createBrand($arrData){
	 
		$result=$this->db_lib->insert("automation_brand", $arrData); 
		return $result;
	}
	public function updateAutomationBrand($arrData){
		 
		$result = $this->db_lib->update("automation_brand", $arrData, "ab_id = " . $arrData["id"]);
       
		return $result;
	}
	 
	public function deleteAutomationBrand($id) { 
		$data = $this->db_lib->fetchSingle("automation_brand", "ab_id = $id");
		if($data)
			$this->file_manager->delete($this->automation_path, $data["category_image"]);
			$this->file_manager->delete($this->automation_path, $data["automation_video"]);
		
		$result = $this->db_lib->delete("automation_brand", "ab_id = " . $id);
        return $result;
    }
/////////////////////////////    automation brand Model    //////////////////////////////////
	/*automation brand Model Request 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleAutomationBrandModel($id) {
		return $this->db_lib->fetchSingle('automation_brand_model '," ad_id= $id ",'');
	}
	
	/*automation brand multile list
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function findMultipleAutomationBrandModel($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('automation_brand_model ABM JOIN automation_brand AB ON ABM.brand_id=AB.ab_id', $strWhere,'brand_name,ABM.*');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	/*automation brand Model create 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function createBrandModel($arrData){
	 
		$result=$this->db_lib->insert("automation_brand_model", $arrData); 
		return $result;
	}
	public function updateAutomationBrandModel($arrData){
		 
		$result = $this->db_lib->update("automation_brand_model", $arrData, "ad_id = " . $arrData["id"]);
       
		return $result;
	}
	 
	public function deleteAutomationBrandModel($id) {  
		$result = $this->db_lib->delete("automation_brand_model", "ad_id = " . $id);
        return $result;
    }
	
	
	/*automation comment Reply 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function automationCommentReplyList($amid){
	 
		$result=$this->db_lib->fetchMultiple("automation_comment_reply ACR LEFT JOIN master_user MU ON ACR.user_id=MU.uid","automation_comment_id = $amid ", "ACR.*, MU.u_name, MU.u_avatar"); 
		 
		return $result;
	}
	/*automation comment Reply file list
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function automationCommentReplyFileList($arcid){
	 
		$result=$this->db_lib->fetchMultiple(" automation_comment_reply_file "," comment_reply_id = $arcid ", ""); 
		return $result;
	}
	/*automation Video Request List
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function automationVideoRequestList($userId){
	 
		$result=$this->db_lib->fetchMultiple("automation_video_request"," user_id = $userId ", ""); 
		return $result;
	}
	public function automationVideoRequestListSupplier($userId){
	 
		$result=$this->db_lib->fetchMultiple("  automation_video_request as avr LEFT JOIN automation_details as ad ON ad.ad_id=avr.automation_id LEFT JOIN master_user as MU on avr.user_id = MU.uid "," supplier_id = $userId ", " avr.*,ad.*,MU.u_name as UserName "); 
		return $result;
	}
	/*automation comment Reply 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function addAutomationComment($arrData){
	 
		$result=$this->db_lib->insert("automation_comment_reply", $arrData); 
		$data = $this->file_manager->multi_upload('commentFile', "uploads/automation_reply/", MIX_FORMAT,""); 
		 
		$arData['file_name']=$data; 
		foreach ($arData['file_name'] as  $value) {
			 
				if($data[0])
					$arData['file_name']=$value[1];
					$arData['comment_reply_id']=$result;
					$arData['file_upload_time']=date('Y-m-d H:i:s');
				  $this->db_lib->insert("automation_comment_reply_file",$arData);
		}
		return $result;
	}
	
	 public function findMultipleVideoRequest($strWhere = 1) {
		$table = " automation_video_request AS avr LEFT JOIN master_user AS Mu ON avr.user_id=Mu.uid LEFT JOIN automation_details as ad ON  avr.automation_id=ad.ad_id ";
		$select = " avr.*,Mu.u_name as username,ad.* ";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	
	/*find Automation  Recommended  List Category
			23/4/2018
	 * @access public
	 * @param  get automation id
	 * @return array of 
	 */
	public function findAutomationRecommendedListCategory($cid,$automationUsed) {
		if($automationUsed=='new'){ $condi=" AND  isUsed = 'N' ";}
		if($automationUsed=='used'){ $condi=" AND isUsed = 'Y' ";}
		$result = $this->db_lib->fetchMultiple("automation_details AD LEFT JOIN mst_country MC ON AD.automation_location_country=MC.id LEFT JOIN 	mst_states MS ON AD.automation_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON AD.automation_location_city=MCC.id ", "category_id = $cid AND recommended='Y' $condi ","AD.*, MC.country_name, MS.state_name, MCC.city_name "); 
        return $result;
    }
	/*find Automation details 
			23/4/2018
	 * @access public
	 * @param  get automation id
	 * @return array of 
	 */
	public function getViewautomationList($data) {
		$adIds=	 implode(",", $data);	 
		$result = $this->db_lib->fetchMultiple("automation_details AD JOIN automation_category as AC ON AD.category_id=AC.am_id LEFT JOIN mst_country MCO ON AD.automation_location_country=MCO.id LEFT JOIN  mst_states MS ON AD.automation_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON AD.automation_location_city=MCC.id LEFT JOIN automation_brand AB ON AD.brand_name=AB.ab_id  LEFT JOIN automation_brand_model ABM ON AD.model_no=ABM.ad_id", "AD.ad_id IN ($adIds)"," AC.category_name, AD.*, MCO.country_name, MS.state_name, MCC.city_name, AB.brand_name AS brandName, ABM.model_name AS modelName"); 
        return $result;
    }
	/* Remote Automation Video Request (23-Apr-18) */
	public function findMultipleSupplier($strWhere) {
		$strWhere = " u_user_type = 'S' ";
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");
		return $result;
	}
	public function assignSupplier($data){
		$user_id = $data['user_id'];
		$avr_id = $data['avr_id'];
		$arrData['supplier_status'] = 'H';
		$arrData['supplier_id'] = $user_id;
		$result = $this->db_lib->update("automation_video_request", $arrData, "avr_id = " . $avr_id );
		return $result;
	}
	
	
	 
}
?>