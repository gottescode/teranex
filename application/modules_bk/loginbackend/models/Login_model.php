<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	// constructor of this class
	function __construct()
    {		
		// call parent constructor
		parent::__construct();
		$this->table="administrator";
	}
		
/*	-------------------- Begin Application Specific functions ------------------------------	*/	
	// login method which interacts with database
	public function logincheck()
	{
		//	get form values
		$username = $this->input->post("username", true);
		$password = $this->input->post("password", true);
		
		//$username= mysql_real_escape_string( $username ) ;
		$password= md5($password);
		
		//	prepare query data
		$strwhere = "a_email = '$username' AND BINARY a_password = BINARY '$password' ";
		$select = "id, a_name,a_email,role_id";
		
		//	execute query
		$user = $this->db_lib->fetchSingle('administrator', $strwhere, $select);
  
		return $user;
	}
	
	//	keep user logged in
	//	use in login method
	public function login($userId, $userName = null, $userEmail = null, $userProfilePic = null, $userRole = null, $session_id = null)
	{
		$session= array("user_id" =>  $userId);
		if(isset($userName))	
			$session["user_name"] = $userName;
			
		if(isset($userEmail))	
			$session["user_email"] = $userEmail;
		if(isset($userProfilePic))	
			$session["user_profile_pic"] = $userProfilePic;
		if(isset($userRole))	
			$session["role_id"] = $userRole;
		if(isset($session_id))	
			$session["session_id"] = $session_id;
		
		$this->session->set_userdata($session);
		return true;
	}
	
	//	user logged out
	//	use in logout method
	public function logout()
	{
		$session= array( "id" , "uname", "user_email");
		$this->session->unset_userdata($session);
		$this->session->sess_destroy();
		return true;
	}
	
	//	get user id of logged in user
	public function getUserRole()
	{
		if($this->session->userdata("role_id"))
			return $this->session->userdata("role_id");
		return false;
	}
	
/*	-------------------- End Application Specific functions ------------------------------	*/	

	//	checked whether user has logged in or not
	public function hasLoggedIn()
	{
		if($this->session->userdata("user_id"))
			return true;
		return false;
	}

	//	get user id of logged in user
	public function getUserId()
	{
		if($this->session->userdata("user_id"))
			return $this->session->userdata("user_id");
		return false;
	}
	
	//	get user name (first name / last name / both)
	public function getUserName()
	{
		if($this->session->userdata("user_name"))
			return $this->session->userdata("user_name");
		return false;
	}
	
	//	get user email
	public function getUserEmail()
	{
		if($this->session->userdata("user_email"))
			return $this->session->userdata("user_email");
		return false;
	}
	
	//	get user profile pic
	public function getUserProfilePic()
	{
		if($this->session->userdata("user_profile_pic"))
			return $this->session->userdata("user_profile_pic");
		return false;
	}
	
	//	set user name (first name / last name / both)
	//	used to update
	public function setUserName($userName)
	{
		if(!empty($userName)){
			$this->session->set_userdata("user_name", $userName);
			return true;
		}
		return false;
	}
	
	//	set user email
	//	used to update
	public function setUserEmail($userEmail)
	{
		if(!empty($userEmail)){
			$this->session->set_userdata("user_email", $userEmail);
			return true;
		}
		return false;
	}
	
	//	set user profile pic
	//	used to update
	public function setUserProfilePic($userProfilePic)
	{
		if($userProfilePic != 0){
			$this->session->set_userdata("user_profile_pic", $userProfilePic);
			return true;
		}
		return false;
	}
	// change password login user
	public function change_password()
	{
		// get  form data
		$old_password = md5($this->input->post('old_password'));
		$new_password = md5($this->input->post('new_password'));
		$confirm_password = md5($this->input->post('confirm_password'));
		
		// get user id
		$id = $this->application_model->getUserId();

		// compare new and confirm password
		if($new_password == $confirm_password){
			$result = $this->db_lib->fetchSingle($this->table,'id='.$id);
			// compare previous password
			if($old_password == $result['password']){
				// update password
				$data = array('password' =>  $confirm_password );
				$result = $this->db_lib->update($this->table, $data, 'id = '.$id);
				return true;
			}
		}
		return false;
	}
	// update login user Profile Data
	public function updateAdminProfileData($sendData)
	{ 
		$id = $this->application_model->getUserId();
		
		if($sendData['old_profile_img'] != ''  && $_FILES["profile_img"]["name"]!=""){
		
			$file = $this->file_manager->update("profile_img", $this->pro_img_path , IMG_FORMAT, $sendData['old_profile_img']);
			if($file[0] == true){	// success
				$sendData["profile_img"] = $file[1];
			}
			else
				return ( $file[1] );
			
		}else if($_FILES["profile_img"]["name"]!=""){
			$file = $this->file_manager->upload("profile_img", $this->pro_img_path , IMG_FORMAT);
			if($file[0] == true){	// success
				$sendData["profile_img"] = $file[1];
			}
			else
				return ( $file[1] );
		} 
		
		$res = $this->db_lib->update($this->table, $sendData, 'id = '.$id);
		
		if($res){
			$result =  $this->db_lib->fetchSingle($this->table,'id='.$id,"id, uname,email_id,profile_img");
		}else{
		
			$result = 0; 
		}
		return $result;
	}
}
	
?>