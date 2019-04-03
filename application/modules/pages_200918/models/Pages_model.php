<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
			$this->teams_path="uploads/team/";
			$this->load->library("file_manager");
			$this->pages="pages"; 
    }
	
	// create signup 
	public function insertSignUpForm($data)
	{  
			$dataS["u_user_type"] = $data["SignupType"];
			$dataS["added_by"] = '0';
			$dataS["u_email"] = $data["s_email"] ;
			$dataS["u_mobileno"] = $data["s_mobileno"] ;
			$dataS["user_verify_code"] = $data["user_verify_code"] ;
			
			$dataS["u_password"] = md5($data["s_password"]);
			$dataS["added_id"] = 0;
			$dataS["u_mobile_verified"] = "Y";
			$dataS["u_entry_date"] = date('Y-mc-d');
			  

			 /*** Wordpress Database User Insert ****/
			$dataw["user_login"] = $data["s_email"] ;
			$dataw["user_pass"] = md5($data["s_password"]);
			$dataw["user_email"] = $data["s_email"] ;
			$dataw["user_registered"] = date('Y-mc-d');

			$emailExit = $this->db_lib->fetchSingle("master_user","u_email='$data[s_email]'","uid" );
			if($emailExit['uid']>0){
				$resultDA = 'E';
			}else{
				$resultDA = $this->db_lib->insert("master_user", $dataS );
				$resultDA = $this->db_lib->insert("ecommerce_users", $dataw );
				$sdata['uid']=$result;
				if($data["SignupType"]=='S'){ 
					$sresult = $this->db_lib->insert("supplier_details", $sdata );
				}
				if($data["SignupType"]=='C'){ 
					$sresult = $this->db_lib->insert("customer_details", $sdata );
				}
			} 
			return $resultDA;  
	}
	// check login from master User
	public function checkLogin($data)
	{  
		$u_email = $data["u_email"] ; 
		$u_password = md5($data["u_password"]);
		 
		$sresult='';
		$emailExit = $this->db_lib->fetchSingle("master_user","u_email='$u_email' AND u_password ='$u_password' ","uid, u_email, u_user_type, u_name, u_password" );
		//$updata['kicked']=0;
		//$updata['active']=1;
		$updata['last_active']= time();
		//$updata['last_poll']= time();
		if($emailExit['uid'] ){
			$this->db_lib->update("master_user",$updata,"u_email='$u_email' AND u_password ='$u_password'  " ); 
			$sresult = $emailExit; 
		} 
		return $sresult;  
	} 

	public function checkEmailIdExist($data)
		{  
			$u_email = $data["s_email"] ; 
			return $emailExit = $this->db_lib->fetchSingle("master_user"," u_email='$u_email' ","uid, u_email, u_user_type, u_name " );
			
		} 

	public function update_user($emailId,$user_verify_code)  {
				 
			
			 $this->db->where('u_email',$emailId);
			 $this->db->where('user_verify_code',$user_verify_code);
			 $data = array(
					'u_email_verified' => 'Y',
			  );
			 return $this->db->update('master_user', $data);

			}
	
	
	// create signup 
	public function forgotPassword($data)
	{   
			$emailExit = $this->db_lib->fetchSingle("master_user","u_email='$data[r_email]'","uid" );
			if($emailExit['uid']>0){
				$updata["u_password"] = md5($data["r_password"]); 
				return  $this->db_lib->update("master_user",$updata," u_email='$data[r_email]' " );  
			}else{
				$resultDA='';
			} 
			return $resultDA;  
	}	

	/* Teranex Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_team', $strWhere,'');
	}
	 
	public function findMultipleTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_team", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("teranex_team", $arrData); 
    }
	
	public function updateTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('teranex_team', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("teranex_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTeam($id) {
		
		$result = $this->db_lib->delete("teranex_team", "team_id = " . $id);
		if($data)
			$this->file_manager->delete($this->teams_path, $data["team_image"]);
        return $result;
    }
    
	public function updatePublishTeam($data){
		// get total records
		$ids = $data["team_id"];
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
				$result = $this->db_lib->update("teranex_team", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
	}


	/* Advisory Board  Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleAdvisoryboardTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_advisoryboardteam', $strWhere,'');
	}
	 
	public function findMultipleAdvisoryboardTeam($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_advisoryboardteam", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createAdvisoryboardTeam($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["team_image"] = $data1[1];
		return $result = $this->db_lib->insert("teranex_advisoryboardteam", $arrData); 
    }
	
	public function updateAdvisoryboardTeam($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$data = $this->file_manager->update('teranex_advisoryboardteam', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		if($data[0])
			$arrData["team_image"] = $data[1];
		$result = $this->db_lib->update("teranex_advisoryboardteam", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteAdvisoryboardTeam($id) {
		
		$result = $this->db_lib->delete("teranex_advisoryboardteam", "team_id = " . $id);
		if($data)
			$this->file_manager->delete($this->teams_path, $data["team_image"]);
        return $result;
    }
    
	public function updatePublishAdvisoryboardTeam($data){
		// get total records
		$ids = $data["team_id"];
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
				$result = $this->db_lib->update("teranex_advisoryboardteam", $arrData, "team_id = ". $id);
			}
			return true;
		}
		return false;
	}


	/* All categories
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleAllcategorie($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_all_categories', $strWhere,'');
	}
	 
	public function findMultipleAllcategorie($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_all_categories", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createAllcategorie($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		return $result = $this->db_lib->insert("teranex_all_categories", $arrData); 
    }
	
	public function updateAllcategorie($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("teranex_all_categories", $arrData, "cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteAllcategorie($id) {
		
		$result = $this->db_lib->delete("teranex_all_categories", "cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishAllcategorie($data){
		// get total records
		$ids = $data["cat_id"];
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
				$result = $this->db_lib->update("teranex_all_categories", $arrData, "cat_id = ". $id);
			}
			return true;
		}
		return false;
	}

	/* Case Study CRUD operation */
	 
	 public function findSingleSubCategorie($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_sub_categories', $strWhere,'');
	}
	 
	public function findMultipleSubCategorie($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_sub_categories ACS JOIN teranex_all_categories AC ON ACS.cat_id=AC.cat_id", $strWhere,"ACS.*,AC.cat_name");//exit; 
		return $result;
	} 

	
    public function createSubcat($arrData) {
	
		$arrData["updated_date"] = date('Y-m-d');
		return $rid = $this->db_lib->insert("teranex_sub_categories", $arrData); 
    }
	
	public function updateSubcat($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		$result = $this->db_lib->update("teranex_sub_categories", $arrData, "sub_cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteSubcat($id) { 
		$data = $this->db_lib->fetchSingle("teranex_sub_categories", "sub_cat_id = $id");

		$result = $this->db_lib->delete("teranex_sub_categories", "sub_cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCaseStudy($data){
		// get total records
		$ids = $data["sub_cat_id"];
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
				$result = $this->db_lib->update("teranex_sub_categories", $arrData, "sub_cat_id = ". $id);
			}
			return true;
		}
		return false;
	}
	


	/* Teranex FAQ
			30/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

     public function findSingleFaq($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_faq', $strWhere,'');
	}
	 
	public function findMultipleFaq($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_faq", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createFaq($arrData) {
		$arrData["updated_date"] = date('Y-m-d');
		
		return $result = $this->db_lib->insert("teranex_faq", $arrData); 
    }

    
	public function updateFaq($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
		
		$result = $this->db_lib->update("teranex_faq", $arrData, "faq_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteFaq($id) {
		
		$result = $this->db_lib->delete("teranex_faq", "faq_id = " . $id);
        return $result;
    }
    
	public function updatePublishFaq($data){
		// get total records
		$ids = $data["faq_id"];
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
				$result = $this->db_lib->update("teranex_faq", $arrData, "faq_id = ". $id);
			}
			return true;
		}
		return false;
	}

/* Pages Data */
	// master pages fetching single record 
	public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle($this->pages." pg ", $strWhere,"pg.*");
	}
	
	// pages list for menu admin
	public function pagesList($strWhere = 1) {
		return $this->db_lib->fetchMultiple($this->pages." pg ", $strWhere,"id,page_title");
	}
	
	//Update Page 
	public function update($arrData) {
		$result = $this->db_lib->update($this->pages, $arrData, "id = " . $arrData["id"]);
        return $result;
    }

    /////////////////////////////     Request for quotation //////////////////////////////////
	/* Request for quotation  save
			31/07/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function rfqInsert($data) { 
	
		$data['publish_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("teranex_quotation",$data); 
        return $result;
    }

    /*  Request for quotation 
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function requestforQuotation() { 
		$result=$this->db_lib->fetchMultiple("teranex_quotation", $strWhere,"");//exit; 
		return $result;
    }

    /////////////////////////////     Supplier Memebership //////////////////////////////////
	/* Supplier Memebership  save
			31/07/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function SupplierMembership($data) { 
	
		$data['publish_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("teranex_supplier_membership",$data); 
        return $result;
    }

    /*  Supplier Memebership 
			31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function SupplierMembershipList() { 
		$result=$this->db_lib->fetchMultiple("teranex_supplier_membership", $strWhere,"");//exit; 
		return $result;
    }

			
    /////////////////////////////     Service Providers  //////////////////////////////////
	/* Supplier Memebership  save
			31/07/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function ServiceProviders($data) { 
	
		$data['publish_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("teranex_service_provider",$data); 
        return $result;
    }


    /*  Supplier Memebership 
			31/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function ServiceProvidersList() { 
		$result=$this->db_lib->fetchMultiple("teranex_service_provider", $strWhere,"");//exit; 
		return $result;
    }
	/* CONTACT US Form Data */
	public function contactInsert($data) { 
		$result = $this->db_lib->insert("contact_us",$data); 
        return $result;
    }
	public function addsubcribe($data) { 
		$email = $data['email_id'];
		$result = $this->db_lib->fetchSingle("subscribe","email_id='$email' ");
		if($result){
			$result = -1;
			 return $result;
		}else{
			$result = $this->db_lib->insert("subscribe",$data); 
			 return $result;
		}
       
    }

    /////////////////////////////   Get Paid For YourFeedback //////////////////////////////////
	/* Get Paid For YourFeedback  save
	   17/08/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function PaidForYourFeedback($data) { 
	
		$data['publish_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("teranex_paid_feedback",$data); 
        return $result;
    }

    /* Get Paid For YourFeedback
	   17/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function PaidForYourFeedbackList() { 
		$result=$this->db_lib->fetchMultiple("teranex_paid_feedback", $strWhere,"");//exit; 
		return $result;
    }

    public function PaidForYourFeedbackSingleDetails($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_paid_feedback', $strWhere,'');
	}


    /////////////////////////////    Report Abuse //////////////////////////////////
	/* Report Abuse  save
	   23/07/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function ReportAbuse($data) { 
	
		$data['publish_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("teranex_report_abuse",$data); 
        return $result;
    }


    /*  Report Abuse
		23/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function ReportAbuseList() { 
		$result=$this->db_lib->fetchMultiple("teranex_report_abuse", $strWhere,"");//exit; 
		return $result;
    }

}
?>
