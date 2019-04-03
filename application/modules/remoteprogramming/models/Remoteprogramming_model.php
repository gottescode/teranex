<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Remoteprogramming_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor
			$this->rfq_path="uploads/rfq_images/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			$this->remoteprogramming_path="uploads/remoteprogramming_images/";
			parent::__construct();
    }
    public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('remoteprogramming_category', $strWhere,'');
	}
	 
	public function findMultipleCategory($strWhere) {
		$result=$this->db_lib->fetchMultiple("remoteprogramming_category", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createCategory($arrData) {
		$arrData["cat_entry_date"] = date('Y-m-d');
		$data1 = $this->file_manager->upload('remoteprogrammingImage', $this->remoteprogramming_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["cat_image"] = $data1[1];
		return $event_id = $this->db_lib->insert("remoteprogramming_category", $arrData); 
    }
	
	public function updateCategory($arrData) {
	 
		$arrData["cat_update_date"] = date('Y-m-d');
		$data = $this->file_manager->update('remoteprogrammingImage', $this->remoteprogramming_path, IMG_FORMAT, $arrData["old_image"],1);
		if($data[0])
			$arrData["cat_image"] = $data[1];
		
		$result = $this->db_lib->update("remoteprogramming_category", $arrData, "cat_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteCategory($id) {
		 if($data)
			$this->file_manager->delete($this->remoteprogramming_path, $data["cat_image"]);
		$result = $this->db_lib->delete("remoteprogramming_category", "cat_id = " . $id);
        return $result;
    }
    
	public function updatePublishCategory($data){
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
				$result = $this->db_lib->update("remoteprogramming_category", $arrData, "cat_id = ". $id);
			}
			return true;
		}
		return false;
	}
   /* public function findSingleCategory($strWhere = 1) {
		return $this->db_lib->fetchSingle('event_category', $strWhere,'');
	}*/
	public function findSingleDetailsCustomerPrgrammingReq($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_programming_rfq', $strWhere,"");
	}
        
	public function findSingleDetailsCustomerPrgrammingReq_rarp_id($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_aggrement_request_programmer', $strWhere,"");
	}
	
	public function findMultipleProgrammer($strWhere) {
		
		return	$result=$this->db_lib->fetchMultiple("master_user MU LEFT JOIN  user_details UD ON MU.uid=UD.uid",$strWhere,"MU.*");
	}
	public function findMultipleRequestList($strWhere){
		$table = " remote_programming_rfq as rpr LEFT JOIN  master_user as MU ON rpr.customer_user_id = MU.uid ";
		$select = " rpr.*,MU.u_name as uname ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select); 
		return $result;
	}
	/* REQUEST LIST OF PERTICULAR CONSULTANT */
	public function remoteApplicationProgrammBySupport($strWhere) {
		$table = " remote_programming_rfq as rfq LEFT JOIN remote_application_aggrement_request_programmer as raap ON rfq.rpr_id = raap.rpr_id LEFT JOIN master_user as mu ON rfq.customer_user_id=mu.uid ";
		$select = " rfq.*,raap.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";
		$result=$this->db_lib->fetchMultiple($table,$strWhere,$select );
		return $result;
	}
	/* Assign Programmers */
	public function assignProgrammers($data){

		// get total records
		$ids = $data["id"];

		if(count($ids)>0){
			foreach($ids as $id){
				if($data["publish_$id"] == "Y"){
					$arrData["rpr_id"] = $data['rpr_id'];
					$arrData["programmer_id"] = $id;
					$arrData["request_programmer_date"] = date('Y-m-d');
					$rpr_id = $arrData["rpr_id"];
					$strWhere = " rpr_id = $rpr_id AND programmer_id = '$id'";
					$old_result = $this->db_lib->fetchSingle('remote_application_aggrement_request_programmer', $strWhere,'');
					if($old_result==0){
						$result = $this->db_lib->insert("remote_application_aggrement_request_programmer", $arrData);
					}else{
						$arrayData['rpr_id'] = $old_result['rpr_id'];
						$arrayData['request_programmer_date'] =  date('Y-m-d');
						$result = $this->db_lib->update("remote_application_aggrement_request_programmer", $arrayData," rpr_id = ".$arrayData['rpr_id']);
					}
					/* SMS notification on user mobile */
					$mobileNO = $this->db_lib->fetchSingle('master_user'," uid= '$id' ",'u_mobileno');
					if($mobileNO['u_mobileno']){
						sms_send($mobileNO['u_mobileno']," You have new enquiry for the quotation.	Please visit Teranex dashboard");  
					}  
				}	
			}
			return true;
		}
		return false;
	}
	
	public function createRfq($arrayData){
		$data = $this->file_manager->upload('attach_drawing', $this->rfq_path, IMG_FORMAT,"");
		
		if($data[0])
			$arrayData["attach_drawing"] = $data[1];
		
		$arrayData["requested_date"] = date('Y-m-d H:i:s');
		$result=$this->db_lib->insert("remote_programming_rfq", $arrayData); 
		return $result;
	}
	
	//9/5/2018
	//findSingle remote application aggrement request programmer
	public function findSingle_remote_application_aggrement_request_programmer($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_aggrement_request_programmer', $strWhere,"");
	}
        
         public function findSingle_remote_prog_Rfq_quataion($strWhere) {
		return $this->db_lib->fetchSingle('remote_application_aggrement_request_programmer', $strWhere,"");
	}
        
        
        public function remote_program_req_suppliers($dmrID) { 

        $strWhere = "AMRR.rpr_id = '$dmrID' ";
		$result = $this->db_lib->fetchMultiple("remote_application_aggrement_request_programmer AMRR JOIN master_user MU ON AMRR.programmer_id=MU.uid", $strWhere."","MU.u_name,MU.u_email, AMRR.rpr_id,AMRR.rarp_id,AMRR.qoutation_date,AMRR.programmer_id,AMRR.request_status,AMRR.request_programmer_date");

        return $result;

    }
    
    

	public function remote_program_req_suppliers_list($strWhere) {
		return $this->db_lib->fetchSingle('remote_programming_rfq', $strWhere,"");
	}
        
        
        	public function RemoteProgramSupplierListAcceptByadmin($data) { 
				
                  //  print_r($data);die;

		$drrs_id = $data['rarp_id'];
		$data['request_status']='QS';

        $data1 = $this->file_manager->upload('quotation_uploaded', $this->remoteprogramming_path, MIX_FORMAT,"");
		//print_r($data1);exit;

		if($data1[0])
			$data["uploaded_quotation"] = $data1[1];
		
		$result = $this->db_lib->update("remote_application_aggrement_request_programmer  ",$data, " rarp_id = ".$drrs_id);

		$result_data = $this->db_lib->fetchSingle("remote_application_aggrement_request_programmer  "," rarp_id = ".$drrs_id);



		$supplier_id = $result_data['programmer_id'];

		$dmr_id = $result_data['rpr_id'];

		$updateData['supplier_id'] = $supplier_id;

		$result = $this->db_lib->update("remote_programming_rfq",$updateData, " rpr_id = ".$dmr_id);

        return $result;

    }
    
    
    	public function findSingle_RemoteProgramming_quote_supplier($strWhere = 1) {
		return $this->db_lib->fetchSingle('remote_application_aggrement_request_programmer', $strWhere,"");
	}
        
        
        // accept cutomer quotation
    	public function RemoteProgrammerAcceptBycustomer($rarp_id) { 

		$data['request_status']='C';

		$result = $this->db_lib->update("remote_application_aggrement_request_programmer  ",$data, " rarp_id = ".$rarp_id);


        return $result;

    }
    
    // accept cutomer quotation
    	public function RemoteProgrammerSupplierListAcceptByreject($rarp_id) { 

		$data['request_status']='R';

		$result = $this->db_lib->update("remote_application_aggrement_request_programmer  ",$data, " rarp_id = ".$rarp_id);


        return $result;

    }

}
?>