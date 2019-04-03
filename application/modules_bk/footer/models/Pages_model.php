<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
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
			$dataS["u_entry_date"] = date('Y-m-d');
			  
			$emailExit = $this->db_lib->fetchSingle("master_user","u_email='$data[s_email]'","uid" );
			if($emailExit['uid']>0){
				$resultDA = 'E';
			}else{
				$resultDA = $this->db_lib->insert("master_user", $dataS );
				
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
		$emailExit = $this->db_lib->fetchSingle("master_user","u_email='$u_email' AND u_password ='$u_password' ","uid, u_email, u_user_type, u_name" );
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
				return  $this->db_lib->update("master_user",$updata,"u_email='$data[r_email]'  " );  
			}else{
				$resultDA='';
			} 
			return $resultDA;  
	}		

}
?>