<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Machine_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->machine_path="uploads/machine/";
			$this->timestudy_path="uploads/machine_drawing_upload";
			$this->machine_category="machine_category";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			parent::__construct();
    }
	public function findSingleMachineCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('machine_category', $strWhere,'');
	}
    public function findMultipleMachineCat($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('machine_category', $strWhere,'');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
 	public function createCategory($arrData){
		$data1 = $this->file_manager->upload('category_image', $this->machine_path, IMG_FORMAT,"");
		if($data1[0])
			$arrData["category_image"] = $data1[1];
		
		$video = $this->file_manager->upload('videoLink', $this->machine_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["video_upload"] = $video[1];
	
		$arrData["created_date"] = date('Y-m-d');
		$result=$this->db_lib->insert("machine_category", $arrData); 
		return $result;
	}
	public function updateMachineCategory($arrData){
		$data1 = $this->file_manager->update('category_image', $this->machine_path, IMG_FORMAT,$arrData["old_image"]);
		if($data1[0])
			$arrData["category_image"] = $data1[1];
		$video = $this->file_manager->update('videoLink', $this->machine_path, VIDEO_FORMAT,$arrData["old_video"]);
		if($video[0])
			$arrData["video_upload"] = $video[1];

		$result = $this->db_lib->update("machine_category", $arrData, "mc_id = " . $arrData["id"]);
       
		return $result;
	}
	public function updatePublishMachineCategory($data){
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
				$result = $this->db_lib->update("machine_category", $arrData, "mc_id = ". $id);
			}
			return true;
		}
		return false;
	}
	public function delete($id) { 
		$data = $this->db_lib->fetchSingle("machine_category", "mc_id = $id");
		if($data)
			$this->file_manager->delete($this->machine_path, $data["category_image"]);
			$this->file_manager->delete($this->machine_path, $data["machine_video"]);
		
		$result = $this->db_lib->delete("machine_category", "mc_id = " . $id);
        return $result;
    }
/* =============== MACHINE DETAILS ================= */
	public function findSingleMachineDetails($strWhere = 1) {
		return $this->db_lib->fetchSingle('machine_details', $strWhere,'');
	}
 	public function machineDetailsMultiple($strWhere = 1) {
		$table = " machine_details as md LEFT JOIN machine_category as mc ON md.category_id=mc.mc_id LEFT JOIN machine_brand MB ON md.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON md.model_no=MBM.md_id ";
		$select =' md.*,mc.category_name as catName,MB.brand_name AS brandName, MBM.model_name AS modelName';
		$result = $this->db_lib->fetchMultiple($table, $strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	public function findMultipleComapareMachines($strWhere = 1) {
		$table = ' machine_details as md LEFT JOIN machine_category as mc ON md.category_id=mc.mc_id';
		$select =' md.md_id,brand_name,model_no,model_no,control_panel,table_w,table_l,machine_axes,travel_long,travel_cross,machine_power,machine_rpm,machine_image,mc.category_name as catName';
		$result = $this->db_lib->fetchMultiple($table, $strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	public function machineInsertDetails($arrData) {  
	
		$arrData["created_date"] = date('Y-m-d'); 
		$data1 = $this->file_manager->upload('machine_image', $this->machine_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["machine_image"] = $data1[1];
			
		$video = $this->file_manager->upload('machineVideo', $this->machine_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["machine_video"] = $video[1];
		
		return $result=$this->db_lib->insert("machine_details", $arrData); 
	}
	public function updateMachineDetails($arrData){
		$data1 = $this->file_manager->update('machine_image', $this->machine_path, IMG_FORMAT,$arrData['old_image'],1);
		if($data1[0])
			$arrData["machine_image"] = $data1[1];
		
		$video = $this->file_manager->update('machineVideo', $this->machine_path, VIDEO_FORMAT,$arrData['old_video']);
		 
		if($video[0]) 
			$arrData["machine_video"] = $video[1];
		
		
		return $result = $this->db_lib->update("machine_details", $arrData, " md_id = " . $arrData["id"]);
		
	}
	public function deleteMachineDetails($id) { 
		$data = $this->db_lib->fetchSingle("machine_details", "md_id = $id");
		if($data)
			$this->file_manager->delete($this->machine_path, $data["machine_video"]);
		
		$result = $this->db_lib->delete("machine_details", " md_id = " . $id);
        return $result;
    }
	/*find Machine List Category
			18/4/2018
	 * @access public
	 * @param  get category Id
	 * @return array of 
	 */
	public function findMachineListCategory($strWhere) { 
		 
		$result = $this->db_lib->fetchMultiple("machine_details MD LEFT JOIN mst_country MC ON MD.machine_location_country=MC.id LEFT JOIN 	mst_states MS ON MD.machine_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON MD.machine_location_city=MCC.id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", " $strWhere ","MD.*, MC.country_name, MS.state_name, MCC.city_name,MB.brand_name AS brandName, MBM.model_name AS modelName "); 
        return $result;
    } 
	public function findMachineListByName($strWhere) { 
		 
		$result = $this->db_lib->fetchMultiple("machine_details MD LEFT JOIN mst_country MC ON MD.machine_location_country=MC.id LEFT JOIN 	mst_states MS ON MD.machine_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON MD.machine_location_city=MCC.id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", " $strWhere ","MD.*, MC.country_name, MS.state_name, MCC.city_name,MB.brand_name AS brandName, MBM.model_name AS modelName"); 
        return $result;
    }
	/*find Machine details 
			19/4/2018
	 * @access public
	 * @param  get machine id
	 * @return array of 
	 */
	public function findSingleMachineDetailsFront($md_id) { 
		$result = $this->db_lib->fetchSingle("machine_details MD LEFT JOIN mst_country MC ON MD.machine_location_country=MC.id LEFT JOIN 	mst_states MS ON MD.machine_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON MD.machine_location_city=MCC.id JOIN machine_category MCat ON MD.category_id=MCat.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "MD.md_id = $md_id","MD.*, MC.country_name, MS.state_name, MCC.city_name,MCat.category_name, MB.brand_name AS brandName, MBM.model_name AS modelName "); 
        return $result;
    }
	
	/*find Machine details 
			19/4/2018
	 * @access public
	 * @param  get machine id
	 * @return array of 
	 */
	public function findCategoryCount($cid,$machinUsed) { 
	if($machinUsed=='new'){ $condi=" AND  isUsed = 'N' ";}
		if($machinUsed=='used'){ $condi=" AND isUsed = 'Y' ";}
		$result = $this->db_lib->fetchSingle("machine_details MD JOIN 	machine_category as MC ON MD.category_id=MC.mc_id ", "category_id = $cid $condi "," MC.category_name, count(md_id) AS machineCount"); 
        return $result;
    }
	/*create Gallery
			19/4/2018
	 * @access public
	 * @param  get machine id
	 * @return array of 
	 */
	public function createGallery($arrData) {
		$data = $this->file_manager->multi_upload('photo_name', $this->machine_path, IMG_FORMAT,"",1);
		$arData['photo_name']=$data;
		$arData['md_id']=$arrData['md_id'];
		foreach ($arData['photo_name'] as  $value) {
			         	if($data[0])
			         	    $arData['photo_name']=$value[1];
			         	$result = $this->db_lib->insert("machine_photos",$arData);
			    }
		if ($result) {
			return $result;
		}
        return false;
    }
	public function findMultipleGalleryImages($strWhere) {
		return $this->db_lib->fetchMultiple('machine_photos', $strWhere);
	}
//	public function findUserProfileDetails($strWhere) {
//		return $this->db_lib->fetchMultiple('user_details', $strWhere,'',1);
//
//	}
	
	public function delete_gallary($id) {
		$data = $this->db_lib->fetchSingle('machine_photos', "mp_id = $id");
		if($data['photo_name'])
			$this->file_manager->delete($this->path, $data["photo_name"]);
				
		$result = $this->db_lib->delete('machine_photos', "mp_id = " . $id);
        return $result;
    }
    
		/////////////////////////////    machine Finace Request  //////////////////////////////////
	/*machine Finace Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function machineFinaceRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("machine_finance_request",$data); 
        return $result;
    }


		/////////////////////////////    machine Insurance Request  //////////////////////////////////
	/*machine Insurance Request  save
		08-11-2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function machineInsuranceRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("machine_insurance_request",$data); 
        return $result;
    }

    /*machine Time Study Request  save
		11-11-2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function machineTimeStudyInsert($data) { 
		//print_r($data);exit;
		$data1 = $this->file_manager->upload('drawing_upload', $this->timestudy_path, MIX_FORMAT,"");
	
		if($data1[0])
			$data["drawing_upload"] = $data1[1];
			
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$data['mid']=$data['machine_id'];
		//$data=$data['machine_id'];
		//print_r($data);exit;
		$result = $this->db_lib->insert("machine_timestudy_request",$data); 
        return $result;
    }

	/*machine video Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function machineVideoRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert(" machine_video_request",$data); 
        return $result;
    }
	/*machine Finace Request  save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function machineContactRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert(" machine_contact_request",$data); 
        return $result;
    }

    
	/*machine Finace contact Enquiry  Admin 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineContactRequestAdmin() { 
		$result = $this->db_lib->fetchMultiple(" machine_contact_request MCR JOIN machine_details MD ON MCR.machine_id=MD.md_id", "	MCR.mc_id<>0   ORDER BY enquiry_date","MCR.*, MD.model_no,MD.brand_name"); 
        return $result;
    }
	/*machine Finace contact Enquiry 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineContactRequest($user_id) { 
		$result = $this->db_lib->fetchMultiple(" machine_contact_request MCR JOIN machine_details MD ON MCR.machine_id=MD.md_id", "	MCR.mc_id<>0 AND user_id = $user_id ORDER BY enquiry_date","MCR.*, MD.model_no,MD.brand_name"); 
        return $result;
    }
	/*machine Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function machineFinaceRequest() { 
		$result = $this->db_lib->fetchMultiple("machine_finance_request MFR JOIN machine_details MD ON MFR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "	mfr_id<>0 ORDER BY enquiry_date","MFR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    /*machine Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function machineTimeStudyRequest() { 
		$result = $this->db_lib->fetchMultiple("machine_timestudy_request MTR JOIN machine_details MD ON MTR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "	mtr_id<>0 ORDER BY enquiry_date","MTR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }
    /*machine Insuarnce Request 
			09/11/2018
	 * @access public
	 * @param   
	 * @return array  
	 */ 
	public function machineInsuranceRequest() { 
		$result = $this->db_lib->fetchMultiple("machine_insurance_request MIR JOIN machine_details MD ON MIR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "	mir_id<>0 ORDER BY enquiry_date","MIR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }
	public function machineRequest() { 
		$table = " machine_enquiry me LEFT JOIN master_user as MU ON MU.uid = me.u_id INNER JOIN machine_details md ON FIND_IN_SET(md.md_id, me.compared_machine_ids) > 0  ";
		$select = " me.*,GROUP_CONCAT(md.brand_name ORDER BY md.md_id) AS bname,u_name,u_mobileno,u_email,model_no,brand_name ";
		$strWhere = " 1 GROUP BY me.enq_id ";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select); 
        return $result;
    }
	/*machine Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineEnquiryRequest($arrData){
		$arrData["enquiry_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("machine_enquiry", $arrData); 
		return $result;
	}

/////////////////////////////    machine brand    //////////////////////////////////
	/*machine brand Request 
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleMachineBrand($id) {
		return $this->db_lib->fetchSingle('machine_brand'," mb_id= $id ",'');
	}
	
	/*machine brand multile list
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function findMultipleMachineBrand($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('machine_brand', $strWhere." ORDER BY brand_name",'');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	/*machine brand create 
			20/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function createBrand($arrData){
	 
		$result=$this->db_lib->insert("machine_brand", $arrData); 
		return $result;
	}
	public function updateMachineBrand($arrData){
		 
		$result = $this->db_lib->update("machine_brand", $arrData, "mb_id = " . $arrData["id"]);
       
		return $result;
	}
	 
	public function deleteMachineBrand($id) { 
		$data = $this->db_lib->fetchSingle("machine_brand", "mb_id = $id");
		if($data)
			$this->file_manager->delete($this->machine_path, $data["category_image"]);
			$this->file_manager->delete($this->machine_path, $data["machine_video"]);
		
		$result = $this->db_lib->delete("machine_brand", "mb_id = " . $id);
        return $result;
    }
/////////////////////////////    machine brand Model    //////////////////////////////////
	/*machine brand Model Request 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleMachineBrandModel($id) {
		return $this->db_lib->fetchSingle('machine_brand_model '," md_id= $id ",'');
	}
	
	/*machine brand multile list
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
    public function findMultipleMachineBrandModel($strWhere = 1) {
		$result = $this->db_lib->fetchMultiple('machine_brand_model MBM JOIN machine_brand MB ON MBM.brand_id=MB.mb_id', $strWhere,'brand_name,MBM.*');
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	/*machine brand Model create 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
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
	
	
	/*machine comment Reply 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function machineCommentReplyList($mcid){
	 
		$result=$this->db_lib->fetchMultiple("machine_comment_reply MCR LEFT JOIN master_user MU ON MCR.user_id=MU.uid","machine_comment_id = $mcid ", "MCR.*, MU.u_name, MU.u_avatar"); 
		 
		return $result;
	}
	/*machine comment Reply file list
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function machineCommentReplyFileList($mcrid){
	 
		$result=$this->db_lib->fetchMultiple(" machine_comment_reply_file "," comment_reply_id = $mcrid ", ""); 
		return $result;
	}
	/*machine Video Request List
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function machineVideoRequestList($userId){
	 
		$result=$this->db_lib->fetchMultiple("  machine_video_request  as mvr
						LEFT JOIN
					machine_details as md ON mvr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id
						LEFT JOIN 
					master_user as Muu ON  mvr.supplier_id = Muu.uid 
	 "," user_id = $userId ORDER BY mvr_id DESC", " mvr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name,Muu.u_name as engg_name"); 
		return $result;
	}
	public function machineVideoRequestListSupplier($userId){
	 
		$result=$this->db_lib->fetchMultiple("  machine_video_request  as mvr
						LEFT JOIN
					machine_details as md ON mvr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id
						LEFT JOIN 
					master_user as Muu ON  mvr.supplier_id = Muu.uid 
	 "," supplier_id = $userId ORDER BY mvr_id DESC", " mvr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name,Muu.u_name as UserName"); 
		/* $result=$this->db_lib->fetchMultiple("  machine_video_request as mvr LEFT JOIN machine_details as md ON md.md_id=mvr.machine_id LEFT JOIN master_user as MU on mvr.user_id = MU.uid "," supplier_id = $userId ", " mvr.*,md.*,MU.u_name as UserName ");  */
		return $result;
	}
	/*machine comment Reply 
			21/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function addMachineComment($arrData){
	 
		$result=$this->db_lib->insert("machine_comment_reply", $arrData); 
		$data = $this->file_manager->multi_upload('commentFile', "uploads/machine_reply/", MIX_FORMAT,""); 
		 
		$arData['file_name']=$data; 
		foreach ($arData['file_name'] as  $value) {
			 
				if($data[0])
					$arData['file_name']=$value[1];
					$arData['comment_reply_id']=$result;
					$arData['file_upload_time']=date('Y-m-d H:i:s');
				  $this->db_lib->insert("machine_comment_reply_file",$arData);
		}
		return $result;
	}
	
	 public function findMultipleVideoRequest($strWhere = 1) {
		$result=$this->db_lib->fetchMultiple("  machine_video_request  as mvr
						LEFT JOIN
					machine_details as md ON mvr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id
						LEFT JOIN 
					master_user as Muu ON  mvr.supplier_id = Muu.uid 
						LEFT JOIN 
					master_user as Mu ON  mvr.user_id = Mu.uid 
		",$strWhere." ORDER BY mvr_id DESC ", " mvr.*,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name,Muu.u_name as engg_name,Mu.u_name as customer_name ");  
		 /* 
		 
		$table = " machine_video_request AS mvr LEFT JOIN master_user AS Mu ON mvr.user_id=Mu.uid LEFT JOIN machine_details as md ON  mvr.machine_id=md.md_id ";
		$select = " mvr.*,Mu.u_name as username,md.* ";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select); */
		$result = [
			'result'=>$result
		];
		return $result;
		
	}
	
	/*find Machine  Recommended  List Category
			23/4/2018
	 * @access public
	 * @param  get machine id
	 * @return array of 
	 */
	public function findMachineRecommendedListCategory($cid,$machinUsed) {
		if($machinUsed=='new'){ $condi=" AND  isUsed = 'N' ";}
		if($machinUsed=='used'){ $condi=" AND isUsed = 'Y' ";}
		$result = $this->db_lib->fetchMultiple("machine_details MD LEFT JOIN mst_country MC ON MD.machine_location_country=MC.id LEFT JOIN 	mst_states MS ON MD.machine_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON MD.machine_location_city=MCC.id ", "category_id = $cid AND recommended='Y' $condi ","MD.*, MC.country_name, MS.state_name, MCC.city_name "); 
        return $result;
    }
	/*find Machine details 
			23/4/2018
	 * @access public
	 * @param  get machine id
	 * @return array of 
	 */
	public function getViewmachineList($data) {
		$mdIds=	 implode(",", $data);	 
		$result = $this->db_lib->fetchMultiple("machine_details MD JOIN machine_category as MC ON MD.category_id=MC.mc_id LEFT JOIN mst_country MCO ON MD.machine_location_country=MCO.id LEFT JOIN  mst_states MS ON MD.machine_location_state = MS.sid LEFT JOIN 	mst_cities MCC ON MD.machine_location_city=MCC.id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "MD.md_id IN ($mdIds)"," MC.category_name, MD.*, MCO.country_name, MS.state_name, MCC.city_name, MB.brand_name AS brandName, MBM.model_name AS modelName"); 
        return $result;
    }
	/* Remote Machine Video Request (23-Apr-18) */
	public function findMultipleSupplier($strWhere) {
	//	$strWhere = " u_user_type = 'S' "; user_role
		$strWhere = " user_type = 1 AND ( user_role = 2 || user_role = 1) ";
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");
		return $result;
	}
	public function assignSupplier($data){
		$user_id = $data['user_id'];
		$mvr_id = $data['mvr_id'];
		$arrData['supplier_status'] = 'H';
		$arrData['supplier_id'] = $user_id;
		$result = $this->db_lib->update("machine_video_request", $arrData, "mvr_id = " . $mvr_id );
		return $result;
	}
	
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareList(){
		 
            //$strWhere = "machine_software_id=$id";
            		//$result = $this->db_lib->fetchMultiple("machine_details MD LEFT JOIN machine_software MC ON MD.machine_software_id=MC.id", "MD.machine_software_id=$id","MD.*, MC.*"); 

		//$result=$this->db_lib->fetchMultiple("machine_software", $strWhere,"");
		$result = $this->db_lib->fetchMultiple("machine_software");
		return $result;
	}
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleMachineSoftware($ms_id){
		 
		$result = $this->db_lib->fetchSingle("machine_software_list","ms_id = " . $ms_id );
		return $result;
	}
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function deleteMachineSoftware($ms_id){
		$data = $this->db_lib->fetchSingle("machine_software_list","ms_id = " . $ms_id );
		if($data)
			$this->file_manager->delete($this->machine_path, $data["software_image"]);  
			
		$result = $this->db_lib->delete("machine_software_list","ms_id = " . $ms_id );
		return $result;
	}
	/* machine software create
		11/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareCreate($arrData){
		$data1 = $this->file_manager->upload('softwareimage', $this->machine_path, IMG_FORMAT,"");
		if($data1[0])
			$arrData["software_image"] = $data1[1];
	 
		$arrData["created_date"] = date('Y-m-d');
		$result=$this->db_lib->insert("machine_software_list", $arrData); 
		return $result;
	}
	/* machine software update
		11/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareUpdate($arrData){
		$data1 = $this->file_manager->update('softwareimage', $this->machine_path, IMG_FORMAT,$arrData["old_image"]);
		if($data1[0])
			$arrData["software_image"] = $data1[1];
	 
		$arrData["created_date"] = date('Y-m-d');
		$result=$this->db_lib->update("machine_software_list", $arrData,"ms_id = " . $arrData["id"]); 
		return $result;
	}
        
        
         public function financersoftwareList(){
	 
		$result=$this->db_lib->fetchMultiple("master_user"," user_type=1 AND user_role=4", ""); 
		return $result;
	}
	 
}
?>