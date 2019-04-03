<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Consultant_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->consultant_path="uploads/consultantFile/"; 
			$this->load->library("file_manager");
			$this->consultant_details="consultant_details";
			define('RESIZEWIDTH', '800');
			define('RESIZEHIGHT', '500');
			parent::__construct();
    }

    public function findSingle($strWhere = 1) {
		return $this->db_lib->fetchSingle('consultant_details', $strWhere,'');
	}
    public function findSinglequalification($strWhere = 1) {
		return $this->db_lib->fetchSingle('consultant_qualification', $strWhere,'');
	}
     public function findMultipleServiceEngineer($strWhere = 1) {
		 $strWhere.= " AND user_type = 1 AND user_role=3 OR  user_type = 3 AND user_role=3"; 
		return $this->db_lib->fetchMultiple('master_user', $strWhere);
	}
    public function findSingleInvoiceDetails($strWhere = 1) {
		$table = " remote_application_aggrement_invoice AS raai LEFT JOIN remote_machine_aggrement_request as rmar ON raai.raar_id=rmar.rmr_id LEFT JOIN master_user as mu ON rmar.user_id=mu.uid LEFT JOIN master_user as MAU ON rmar.consultant_id = MAU.uid ";
		$select = " raai.*,rmar.*,mu.u_name as userName,MAU.u_name as consultantName ";
		return $this->db_lib->fetchMultiple($table,$strWhere,$select);
	}
   public function findSingleInvoiceDetailsRemoteMachine($strWhere = 1) {
		$table = " remote_machine_service_invoice AS rmsi LEFT JOIN remote_machine_aggrement_request as rmar ON rmsi.rmr_id=rmar.rmr_id LEFT JOIN master_user as mu ON rmar.user_id=mu.uid LEFT JOIN master_user as MAU ON rmar.consultant_id = MAU.uid ";
		$select = " rmsi.*,rmar.*,mu.u_name as userName,MAU.u_name as consultantName ";
		return $this->db_lib->fetchSingle($table,$strWhere,$select);
	}
    public function findSingleInvoiceDetailsRemoteMachinefinal($strWhere = 1) {
		$table = " remote_machine_service_invoice_final AS rmsi LEFT JOIN remote_machine_aggrement_request as rmar ON rmsi.rmr_id=rmar.rmr_id LEFT JOIN master_user as mu ON rmar.user_id=mu.uid LEFT JOIN master_user as MAU ON rmar.consultant_id = MAU.uid ";
		$select = " rmsi.*,rmar.*,mu.u_name as userName,MAU.u_name as consultantName ";
		return $this->db_lib->fetchSingle($table,$strWhere,$select);
	}
    public function rejectRequestRemoteService($id) {
		$arrayData['isAccepted'] = 'R';
		return	$result = $this->db_lib->update("remote_machine_aggrement_request", $arrayData," rmr_id = ".$id);
	}
    public function updateQualification($arrayData) {
		return	$result = $this->db_lib->update("consultant_qualification", $arrayData," id = ".$arrayData['id']);
	}
    public function acceptRequestRemoteService($id) {
		$arrayData['isAccepted'] = 'A';
		return	$result = $this->db_lib->update("remote_machine_aggrement_request", $arrayData," rmr_id = ".$id);
	}
    public function remoteServiceRequestList($strWhere = 1) {
		$table = " remote_machine_aggrement_request as RMAR LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid LEFT JOIN master_user as MAU ON RMAR.consultant_id=MAU.uid ";
		$select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name "; 
		return	$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY rmr_id DESC",$select); 
	}
/*Single Consultant Data  */
	public function findSingleConsultant($strWhere = 1) {
		$table = " master_user as mu LEFT JOIN user_details as UD ON mu.uid=UD.uid";
		$select = " mu.*,mu.uid as userId,UD.* ";
		return $this->db_lib->fetchSingle($table,$strWhere,$select);
	}
	 
	public function findMultiple($strWhere) {
		$strWhere .= " and u_user_type='CN'";
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");//exit; 
		return $result;
	}
	public function findMultipleConsultantQualification() {
		//$strWhere .= " and u_user_type='CN'";
		$result=$this->db_lib->fetchMultiple("consultant_qualification","","");//exit; 
		return $result;
	}
/* Remote machine requested List */
	public function findMultipleRequestMachineConsultantList($strWhere=1) {
		$table = " remote_machine_aggrement_request as RMAR LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid LEFT JOIN master_user as MAU ON RMAR.consultant_id=MAU.uid LEFT JOIN remote_machine_service_invoice as rmsi ON RMAR.rmr_id = rmsi.rmr_id";
		$select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice ";
		//$result=$this->db_lib->fetchMultiple("remote_machine_aggrement_request", $strWhere,"");//exit; 
		$result=$this->db_lib->fetchMultiple($table,$strWhere." ORDER BY rmr_id DESC",$select);//exit; 
		return $result;
	}
/*  Consultant List */
	public function findMultipleConsultantUsersList($strWhere) {
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");//exit; 
		return $result;
	}
	
/*  Service List */
	public function findMultipleServiceRequestList($strWhere) {
		$table = " remote_application_aggrement_request as raar LEFT JOIN master_user as mu ON raar.user_id = mu.uid ";
		$select = " raar.*,mu.u_name ";
		
		$result = $this->db_lib->fetchMultiple($table, $strWhere." ORDER BY request_date_time ASC",$select); 
		return $result;
	}



	public function assignconsultant($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["remote_application_id"] = $data['remote_application_id'];
					$arrData["consultant_id"] = $id;
					$arrData["request_consultant_date"] = date('Y-m-d');
					$remote_application_id = $arrData["remote_application_id"];
					$strWhere = " remote_application_id = $remote_application_id AND consultant_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('remote_application_aggrement_request_consultant', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("remote_application_aggrement_request_consultant", $arrData);
					}else{
						$arrayData['rarc_id'] = $old_result['rarc_id'];
						$arrayData['request_consultant_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("remote_application_aggrement_request_consultant", $arrayData," rarc_id = ".$arrayData['rarc_id']);
					}
				}	
			}
			return true;
		}
		return false;
	}
	
   public function findMultipleAddress($strWhere) {
		$result=$this->db_lib->fetchMultiple("consultant_address", $strWhere,"");//exit; 
		return $result;
	}

    public function create($arrData) {
		$arrData["s_entry_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('compnayLogo', $this->consultant_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["s_company_logo"] = $data1[1];
		 
		$consultant_id = $this->db_lib->insert("consultant_details", $arrData);
		 
		 
			$count=$arrData['s_address1']; 
			 for ($j=0;$j<count($count);$j++) { 
				if($arrData['s_address1'][$j]!=''){ 
					$address=array();
					$address['s_address1']=$arrData['s_address1'][$j]; 
					$address['s_address2']=$arrData['s_address2'][$j]; 
					$address['s_country']=$arrData['countryAddress'][$j]; 
					$address['s_state']=$arrData['stateAddress'][$j]; 
					$address['s_city']=$arrData['cityAddress'][$j]; 
					$address['s_landmark']=$arrData['s_landmark'][$j]; 
					$address['s_pincode']=$arrData['s_pincode'][$j]; 
					$address['consultant_id']=$consultant_id; 
					$result = $this->db_lib->insert("consultant_address", $address);
				 
					$address="";
				}
			 }     
			return $consultant_id;
		//}
      //  return false;
    }
	
	public function createFinalInvoice($arrData){
		$arrData['created_date'] = date('Y-m-d H:i:s');
		return	$this->db_lib->insert('remote_machine_service_invoice_final',$arrData);
	}
	public function createConsultantQualification($arrData){
		return	$this->db_lib->insert('consultant_qualification',$arrData);
	}
	// on demand request sAVE
	public function createRemoteMachineRequest($arrData){
            //print_r($arrData);die;
		$arrData['request_date_time'] = date('Y-m-d H:i:s');
		return	$this->db_lib->insert('remote_machine_aggrement_request',$arrData);
	}
	// Expert Module 
	public function createExpertRequest($arrData){
		$arrData['created_date'] = date('Y-m-d H:i:s');
		return	$this->db_lib->insert('expert_request',$arrData);
	}
	// Remote Application request 
	public function createRemoteApplicationRequest($arrData){
		$arrData['created_date'] = date('Y-m-d H:i:s');
		return	$this->db_lib->insert('remote_application_request',$arrData); 
	}
	public function updateOldInvoice($arrData) {
		$arrayData['final_invoice'] = 'Y';
		$arrayData['rmr_id'] = $arrData['rmr_id'];
		$result = $this->db_lib->update("remote_machine_service_invoice", $arrayData, " rmr_id = " . $arrayData["rmr_id"]);
        return $result;
    }

	public function update($arrData) {
		$data = $this->file_manager->update('project_image', $this->consultant_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["project_image"] = $data[1];
		
		//insert extra address
			$count=$arrData['s_address1']; 
			 for ($j=0;$j<count($count);$j++) { 
				if($arrData['s_address1'][$j]!=''){ 
					$address=array();
					$address['s_address1']=$arrData['s_address1'][$j]; 
					$address['s_address2']=$arrData['s_address2'][$j]; 
					$address['s_country']=$arrData['countryAddress'][$j]; 
					$address['s_state']=$arrData['stateAddress'][$j]; 
					$address['s_city']=$arrData['cityAddress'][$j]; 
					$address['s_landmark']=$arrData['s_landmark'][$j]; 
					$address['s_pincode']=$arrData['s_pincode'][$j]; 
					$address['consultant_id']=$arrData["id"]; 
					$result = $this->db_lib->insert("consultant_address", $address);
				 
					$address="";
				}
			 }   
			

		//Update Records
			$count=$arrData['updateaddress1']; 
			 for ($j=0;$j<count($count);$j++) { 
				if($arrData['updateaddress1'][$j]!=''){ 
					$upaddress=array();
                    $upaddress['s_address1']=$arrData['updateaddress1'][$j]; 
					$upaddress['s_address2']=$arrData['updateaddress2'][$j]; 
					$upaddress['s_country']=$arrData['updatecountryAddress'][$j]; 
					$upaddress['s_state']=$arrData['updateStateAddress'][$j]; 
					$upaddress['s_city']=$arrData['updateCityAddress'][$j]; 
					$upaddress['s_landmark']=$arrData['updateLandmark'][$j]; 
					$upaddress['s_pincode']=$arrData['updatePincode'][$j]; 
					 $result = $this->db_lib->update("consultant_address", $upaddress,"consultant_address_id=".$arrData['addressId'][$j]);
				 
             	$upaddress="";
				}
			 }   

		$result = $this->db_lib->update("consultant_details", $arrData, "consultant_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteConsultant($id) {
		$data = $this->db_lib->fetchSingle("consultant_details", "consultant_id = $id");
		if($data)
			$this->file_manager->delete($this->consultant_path, $data["project_image"]);
		
		$result = $this->db_lib->delete("consultant_details", "consultant_id = " . $id);
        return $result;
    }
 	public function deleteQualification($id) {
		$result = $this->db_lib->delete("consultant_qualification", "id = " . $id);
        return $result;
    }
    
	public function updatePublishConsultant($data){
		// get total records
		$ids = $data["id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["s_access"] = "Y";
				else
					$arrData["s_access"] = "N";
				// update record
				$result = $this->db_lib->update("consultant_details", $arrData, "consultant_id = ". $id);
			}
			return true;
		}
		return false;
	}
	
	// address list as per consultant_id
	public function findAddressList($strWhere) {
		$result=$this->db_lib->fetchMultiple("consultant_address", $strWhere,""); 
		return $result;
	}
	// request Service Support insert
	public function requestServiceSupport($data) {
			$result = $this->db_lib->insert("remote_application_aggrement_request", $data);
		return $result;
	}
	
	//on demand service request 
	public function assignconsultantOndemand($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["remote_application_id"] = $data['remote_application_id'];
					$arrData["consultant_id"] = $id;
					$arrData["request_consultant_date"] = date('Y-m-d');
					$remote_application_id = $arrData["remote_application_id"];
					$strWhere = " remote_application_id = $remote_application_id AND consultant_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('remote_ondemand_request_consultant', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("remote_ondemand_request_consultant", $arrData);
					}else{
						$arrayData['rorc_id'] = $old_result['rorc_id'];
						$arrayData['request_consultant_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("remote_ondemand_request_consultant", $arrayData," rorc_id = ".$arrayData['rorc_id']);
					}
				}	
			}
			return true;
		}
		return false;
	}
	
	//
	//on demand service request 
	public function sentRemoteOndemandConsultantList($rarid){
 
		$ids = $data["id"];
		return $old_result = $this->db_lib->fetchMultiple('remote_ondemand_request_consultant', "remote_application_id=$rarid",'consultant_id,rorc_id');
		 
	}
	
	public function findSingleRecentlyViewed($strWhere = 1) {
		return $this->db_lib->fetchSingle('recently_viewed_xpertconnect',$strWhere,'');
	}
	public function findSingleRecentlyViewedRemoteApplication($strWhere = 1) {
		return $this->db_lib->fetchSingle('recently_viewed_remoteapplication',$strWhere,'');
	}
	public function findSingleRecentlyViewedRemoteProgramming($strWhere = 1) {
		return $this->db_lib->fetchSingle('recently_viewed_remoteprogramming',$strWhere,'');
	}
	public function findSingleRecentlyViewedRemoteTraining($strWhere = 1) {
		return $this->db_lib->fetchSingle('recently_viewed_remotetraining',$strWhere,'');
	}
	public function findSingleRecentlyViewedServiceEngineer($strWhere = 1) {
		return $this->db_lib->fetchSingle('recently_viewed_serviceengg',$strWhere,'');
	}
	
	public function updateRecentlyViewed($arrData) {
		$result = $this->db_lib->update("recently_viewed_xpertconnect", $arrData, " user_id = " . $arrData["user_id"]);
        return $result;
    }
	public function updateRecentlyViewedApplication($arrData) {
		$result = $this->db_lib->update("recently_viewed_remoteapplication", $arrData, " user_id = " . $arrData["user_id"]);
        return $result;
    }
	public function updateRecentlyViewedProgramming($arrData) {
		$result = $this->db_lib->update("recently_viewed_remoteprogramming", $arrData, " user_id = " . $arrData["user_id"]);
        return $result;
    }
	public function updateRecentlyViewedTraining($arrData) {
		$result = $this->db_lib->update("recently_viewed_remotetraining", $arrData, " user_id = " . $arrData["user_id"]);
        return $result;
    }
	public function updateRecentlyViewedServiceEnginner($arrData) {
		$result = $this->db_lib->update("recently_viewed_serviceengg", $arrData, " user_id = " . $arrData["user_id"]);
        return $result;
    }
	public function createRecentlyViewed($arrData){
		return	$this->db_lib->insert('recently_viewed_xpertconnect',$arrData);
	}
	public function createRecentlyViewedApplication($arrData){
		return	$this->db_lib->insert('recently_viewed_remoteapplication',$arrData);
	}
	public function createRecentlyViewedProgramming($arrData){
		return	$this->db_lib->insert('recently_viewed_remoteprogramming',$arrData);
	}
	public function createRecentlyViewedServiceEngineer($arrData){
		return	$this->db_lib->insert('recently_viewed_serviceengg',$arrData);
	}
	public function createRecentlyViewedTraining($arrData){
		return	$this->db_lib->insert('recently_viewed_remotetraining',$arrData);
	}
	/* Remote Services video Request  save
	   14/08/2018
	 * @access public
	 * @param   post data
	 * @return inserted id  
	 */
	public function VideoRequestInsert($data) { 
	
		$data['enquiry_date']=date('Y-m-d H:i:s');
		$result = $this->db_lib->insert("remote_service_video_request",$data); 
        return $result;
    }


     public function findMultipleVideoRequest($strWhere = 1) {
		$table = "remote_service_video_request AS rsvr LEFT JOIN master_user AS Mu ON rsvr.user_id=Mu.uid";
		$select = "rsvr.*,Mu.u_name as username";
		$result = $this->db_lib->fetchMultiple($table,$strWhere,$select);
		$result = [
			'result'=>$result
		];
		return $result;
		
	}


	/* Remote Machine Video Request (23-Apr-18) */
	public function findMultipleProgrammer($strWhere) {
		$strWhere = " u_user_type = 'P' ";
		$result=$this->db_lib->fetchMultiple("master_user", $strWhere,"");
		return $result;
	}

	public function assignProgrammer($data){
		$user_id = $data['user_id'];
		$rsvr_id = $data['rsvr_id'];
		$arrData['programmer_status'] = 'H';
		$arrData['programmer_id'] = $user_id;
		$result = $this->db_lib->update("remote_service_video_request", $arrData, "rsvr_id = ".$rsvr_id );
		return $result;
	}

	public function VideoRequestListProgrammer($userId){
	 
		$result=$this->db_lib->fetchMultiple("remote_service_video_request as rsvr LEFT JOIN master_user as MU on rsvr.user_id = MU.uid "," programmer_id = $userId ", " rsvr.*,MU.u_name as UserName "); 
		return $result;
	}

	 /*Remote Service Video Request List
			14/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
 	public function VideoRequestList($userId){
	 
		$result=$this->db_lib->fetchMultiple("remote_service_video_request"," user_id = $userId ", ""); 
		return $result;
	}


	      public function fetchDataidWhr() {
          $qry = $this->db->query("SELECT * FROM company_master cm,master_user mu WHERE cm.owner_id = mu.uid AND cm.company_id is NULL");
        //   print_r($qry->result_array());
        // return $qry->result_array();

        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tb1_data[] = $row;
            }
            //print_r($tb1_data);
            return $tb1_data;
        } else {
            return false;
        }
        //return $tb1_data->result_array();
    }


    //update

       public function updateDetails($tblname, $where, $condition, $data) {
        $this->db->where($where, $condition);
        $query = $this->db->update($tblname, $data);
        return $query;
    }
	
}

?>