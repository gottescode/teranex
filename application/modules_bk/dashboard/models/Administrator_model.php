<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_model extends CI_Model 
{
	// initialize public variables
	public $table = "administrator";
	public $pro_img_path = "uploads/admin_profile_img/";
	// constructor of this class
	function __construct()
    {		
		// call parent constructor
		parent::__construct();
		
		// load library
		$this->load->library("file_manager");
	}
		
	// login method which interacts with database
	public function login()
	{
		//	get form values
		$username = $this->input->post("username", true);
		$password = $this->input->post("password", true);
		
		// avoid sql  injection
		//$username= mysql_real_escape_string( $username ) ;
		$password= md5($password );
		
		//	prepare query data
		$strwhere = "a_email = '$username' AND BINARY a_password = BINARY '$password' ";
		$select = "id, a_name";
		
		//	execute query
		$user = $this->db_lib->fetchSingle($this->table, $strwhere, $select);
		
		//	return result
		return $user;
	}
	
	// change password
	public function change_password($data)
	{
		// get  form data
		$old_password = md5($data['old_password']);
		$new_password = md5($data['new_password']);
		$confirm_password = md5($data['confirm_password']);
		
		// get user id
		$id = $data['id'];

		// compare new and confirm password
		if($new_password == $confirm_password){
			$result = $this->db_lib->fetchSingle($this->table,'id='.$id,"");
			// compare previous password
			if($old_password == $result['a_password']){
				// update password
				$data = array('a_password' =>  $confirm_password );
				$result = $this->db_lib->update($this->table, $data, 'id = '.$id);
				return true;
			}
		}
		return false;
	}
	
	public function updateAdminProfileData($sendData)
	{ 
		$id = $sendData['uid'];
		 
		if($sendData['old_image'] != ''  && $_FILES["profile_img"]["name"]!=""){
			$file = $this->file_manager->update("profile_img", $this->pro_img_path , IMG_FORMAT, $sendData['old_image']);
			if($file[0] == true){	// success
				$sendData["user_profile_pic"] = $file[1];
			}
			else
				return ( $file[1] );
			
		}else if($_FILES["profile_img"]["name"]!=""){
		 
			$file = $this->file_manager->upload("profile_img", $this->pro_img_path , IMG_FORMAT);
			if($file[0] == true){	// success
				$sendData["user_profile_pic"] = $file[1];
			}
			else
				return ( $file[1] );
		} 
		print_r($sendData);
		$res = $this->db_lib->update($this->table, $sendData, 'id = '.$id);
		 
		return $res;
	}
	
	public function getAdminData($id=1)
	{
		$result =  $this->db_lib->fetchSingle($this->table,'id='.$id,"uname,email_id");
		return $result;
	}
	public function getAdminProfileData()
	{
		$id = $this->application_model->getUserId();
		$result =  $this->db_lib->fetchSingle($this->table,'id='.$id);
		return $result;
	}
	public function findSingleProfile($strWhere = 1) {
		
		return $this->db_lib->fetchSingle($this->table, $strWhere,"");
		
	}
	
}
	
?>