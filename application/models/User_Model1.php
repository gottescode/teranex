<?php

class User_Model extends CI_Model
{
    public $userSecret;
    public $firstName;
    public $lastName;
    public $userEmail;
    public $userPassword;
    public $userMobile;
    public $userDateOfBirth;
    public $userGender;
    public $userStatus;
    public $userVerification;
    public $lastModified;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('encryption');
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('master_user', 10);
        return $query->result();
    }

    public function get_user($id,$start,$limit)
    {
        if ($start == null && $limit == null) {
            $array = array('uid' => $id);
            $this->db->where($array);
            $query = $this->db->get('master_user');
            // base url if this project is in a sub folder of main project
            //$baseurl=preg_replace('~/[^/]*/([^/]*)$~', '/\1', base_url());
            if($query->row('userProfilePicture')!=null){
                $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
            }
            else{
                $url = base_url()."assets/img/download.png";
            }

           $profileData = array(
               'userId' =>(int)$query-> row('uid'), //required
               'firstName' =>$query-> row('u_name'), //required
               'lastName'=>$query->row('u_name'), // required
               'userEmail'=>$query->row('u_email'),// required
               'userAddress'=>$query->row('userAddress'),//optional
               'userMobile'=>$query-> row('u_mobileno'), //optional
               'userStatus'=>(int) $query-> row('userStatus'),// required. bool type(0,1). checks user profile is active or not
               'userGender'=>$query-> row('userGender'),//optional
               'profilePictureUrl' => $url, // required
               'active'=>(int)$query-> row('active')// required. checks user is currently login(active) or not

           );
            return $profileData;
        } else {

            $query = $this->db->get('master_user', $limit, $start);
            return $query->result();
        }
    }
    public function get_Active_user($id,$start,$limit)
    {
        if ($start == null && $limit == null) {
            $array = array('uid' => $id);
            $this->db->where($array);
            $this->db->where("userStatus <>",0);
            $this->db->where("userVerification <>",0);
            $query = $this->db->get('master_user');

            if($query->row('userProfilePicture')!=null){
                $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
            }
            else{
                $url = base_url()."assets/img/download.png";
            }

            $profileData = array(
                'userId' =>(int)$query-> row('uid'),
                'firstName' =>$query-> row('firstName'),
                'lastName'=>$query->row('lastName'),
                'userEmail'=>$query->row('u_email'),
                'userAddress'=>$query->row('userAddress'),
                'userMobile'=>$query-> row('userMobile'),
                'userStatus'=>(int) $query-> row('userStatus'),
                'userGender'=>$query-> row('userGender'),
                'profilePictureUrl' => $url,
                'active'=>(int)$query-> row('active')

            );
            return $profileData;
        } else {

            $query = $this->db->get('master_user', $limit, $start);
            return $query->result();
        }
    }

    public function getAllUser($userId){
        $users=[];
        $this->db->select("*");
        $this->db->where("userType=",1);
        $this->db->where("uid <>",$userId);

        $query = $this->db->get('master_user');
        // base url if this project is in a sub folder of main project
        //$baseurl=preg_replace('~/[^/]*/([^/]*)$~', '/\1', base_url());
        foreach ($query->result() as $user){
            if($user->userProfilePicture!=null){
                $url = base_url()."assets/userImage/".$user->userProfilePicture;
            }
            else{
                $url = base_url()."assets/img/download.png";
            }

            $profileData = array(
                'userId' =>(int)$user->userId,
                'firstName' =>$user->firstName,
                'lastName'=>$user->lastName,
                'userEmail'=>$user->u_email,
                'userAddress'=>$user->userAddress, // optional
                'userMobile'=>$user-> userMobile, //optional
                'userStatus'=>(int) $user-> userStatus, // profile active or inactive status
                'userGender'=>$user-> userGender, //optional
                'profilePictureUrl' => $url

            );
            $users[]=$profileData;
        }
        return $users;
    }

    public function filterUser($userIds,$key){
        $users=[];
        $this->db->select("*");
        $this->db->where("userType=",1);
        if($userIds!=null){
            $this->db->where_in("uid",$userIds);
        }
        $this->db->group_start();
        $this->db->like("firstName",$key);
        $this->db->or_like("lastName",$key);
        $this->db->group_end();
        $this->db->where("userStatus <>",0);
        $this->db->where("userVerification <>",0);
        $query = $this->db->get('master_user');
        foreach ($query->result() as $user){
            if($user->userProfilePicture!=null){
                $url = base_url()."assets/userImage/".$user->userProfilePicture;
            }
            else{
                $url = base_url()."assets/img/download.png";
            }

            $profileData = array(
                'userId' =>(int)$user->userId,
                'firstName' =>$user->firstName,
                'lastName'=>$user->lastName,
                'userEmail'=>$user->u_email,
                'userAddress'=>$user->userAddress,
                'userMobile'=>$user-> userMobile,
                'userStatus'=>(int) $user-> userStatus,
                'userGender'=>$user-> userGender,
                'profilePictureUrl' => $url

            );
            $users[]=$profileData;
        }
        return $users;
    }

    public function getAllActiveUser($userId,$limit,$start){
        $users=[];
        $this->db->select("*");
     //   $this->db->where("userType=",1);
        $this->db->where("uid <>",$userId);
      /*   $this->db->where("userStatus <>",0);
        $this->db->where("userVerification <>",0); */
        $query = $this->db->get('master_user',$limit,$start);
		 foreach ($query->result() as $user){
             $url = base_url()."assets/img/download.png";
            
            $profileData = array(
                'userId' =>(int)$user->uid,
                'firstName' =>$user->u_name,
                'lastName'=>$user->u_name,
                'userEmail'=>$user->u_email,
                'userAddress'=>$user->userAddress,
                'userMobile'=>$user-> u_mobileno,
                'userStatus'=>(int) $user-> userStatus,
                'userGender'=>'M',
                'profilePictureUrl' => $url

            );
            $users[]=$profileData;
			
        }
        return $users;
    }

    public function getFirstName($id)
    {
        $array = array('uid' => $id);
        $this->db->where($array);
        $query = $this->db->get('master_user');

        return $query->row("firstName");
    }


    public function insert_entry($clientSecret, $firstName, $lastName, $userEmail, $userPassword,$userAddress,$userMobile,$userType,$userStatus)
    {
        if($userPassword == null){
            $changedPassword = null;
        }
        else {
            $changedPassword = password_hash($userPassword,PASSWORD_BCRYPT); // default cost for BCRYPT to 12
        }
        $this->userSecret = $clientSecret;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userEmail = $u_email;
        $this->userPassword = $changedPassword;
        $this->userAddress = $userAddress;
        $this->userMobile=$userMobile;
        $this->userType = $userType;
        $this->userStatus =1;
        $this->userVerification = 1;
        $this->lastModified = date('Y-m-d G:i:s');
        $this->db->insert("master_user", $this);
    }

    public function update_entry($userId,$firstName,$lastName,$userMobile,$userAddress,$userDateOfBirth,$userGender)
    {
        //$changedPassword= $this->encrypt->encode($userPassword);
        $changes = array(
            'firstName'=> $firstName,
            'lastName' => $lastName,
            'userMobile' => $userMobile,
            'userAddress' => $userAddress,
            'userDateOfBirth' => date('Y-m-d',strtotime($userDateOfBirth)),
            'userGender' => $userGender,
            'lastModified' => date('Y-m-d G:i:s')

        );
        $this->db->where('uid', $userId);
        $this->db->update('master_user',$changes );


        $query = $this->User_Model->get_user($userId,null,null);
        return $query;
    }

    public function update_password($userId,$newPassword)
    {
        $changedPassword = password_hash($newPassword, PASSWORD_BCRYPT); //default cost for BCRYPT to 12
        $updatingArray=  array('userPassword' => $changedPassword);
        $this->db->where('uid', $userId);
        $this->db->update('master_user',$updatingArray );

        $query = $this->User_Model->get_user($userId,null,null);
        return $query;

    }

    public function update_type($id,$type)
    {
        $newType = array('userType' => $type);
        $this->db->where('uid', $id);
        $this->db->update('master_user',$newType );

        return $this;

    }

    public function update_token($id,$token)
    {
        $newToken = array('userSecret' => $token);
        $this->db->where('uid', $id);
        $this->db->update('master_user',$newToken );

        return $this;

    }

    public function update_picture($id,$picture)
    {
        $this->unlinkFile($id);
        $picName = array('userProfilePicture' => $picture);
        $this->db->where('uid', $id);
        $this->db->update('master_user',$picName );

        $this->db->where('uid', $id);
        $query = $this->db->get('master_user');
        $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;

        return $url;

    }
    public function unlinkFile($id){

            $this->db->where('uid', $id);
            $query = $this->db->get('master_user');
            $image = $query->row()->userProfilePicture;;
            if ($image == null) {
                return;
            }
            $path = "assets/userImage/" . $image;
            if(file_exists($path)){
                unlink($path);
            }

    }

    public function deactivate_entry($id)
    {
        $newStatus = array('userStatus' => 0);
        $this->db->where('uid', $id);
        $this->db->update('master_user',$newStatus );

        $query = $this->User_Model->get_user($id,null,null);
        return $query;
    }

    public function activate_entry($email)
    {
        $newStatus = array('userStatus' => 1);
        $this->db->where('u_email', $email);
        $this->db->update('master_user',$newStatus );

        $this->db->where('u_email', $email);
        $query = $this->db->get('master_user');
        return $query->row();
    }

    public function saveResetToken($token,$email)
    {
        $resetToken = array('userResetToken' => $token);
        $this->db->where('u_email', $email);
        $this->db->update('master_user',$resetToken );

        $this->db->where('u_email', $email);
        $query = $this->db->get('master_user');

        if($query->row('userProfilePicture')!=null){
            $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
        }
        else{
            $url = base_url()."assets/img/download.png";
        }

        $encryptToken = $this->jwt->encode(array(
            'resetKey' =>  $query->row()->userResetToken,
            'issuedAt' => date(DATE_ISO8601, strtotime("now")),
            'userName' => $query->row()->firstName." ".$query->row()->lastName,
            'profilePicture'=>$url,
            'userEmail' => $query->row()->u_email,
            'userId' => $query->row()->userId
        ), $this->config->item("CONSUMER_SECRET"));
        return $encryptToken;

    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    function ifExist($email)
    {
        $this->db->where('u_email', $email);
        $this->db->from('master_user');
        if ($this->db->count_all_results() == 0) {
            return false;
        } else {
            return true;
        }
    }

    function userExist($id)
    {
        $this->db->where('uid', $id);
        $this->db->from('master_user');
        if ($this->db->count_all_results() == 0) {
            return false;
        } else {
            return true;
        }
    }

    function checkUser($email, $password)
    {
        $this->db->where('u_email', $email);
        $query = $this->db->get('master_user');
        $savedPassword = $query->row()->u_password;
        //$realPassword = $this->encryption->decrypt($savedPassword);

        if($savedPassword==md5($password)){

            return true;
        }
        return false;
    }

    function checkUserPassword($id, $password)
    {
        $this->db->where('userId', $id);
        $query = $this->db->get('users');
        $savedPassword = $query->row()->userPassword;
        //$realPassword = $this->encrypt->decode($savedPassword);

        if(password_verify($password,$savedPassword)){

            return true;
        }
        return false;
    }

    public function getUserId($email)
    {
        $this->db->where('u_email', $email);
        $query = $this->db->get('master_user');

        return $query->row()->uid;
    }

    public function getTokenRAWData($email){
        $userData=$this->get_user($this->getUserId($email),null,null);

        $token = array(
            'firstName'=>$userData['firstName'],
            'userName' => $userData['firstName']." ".$userData['lastName'],
            'profilePicture'=>$userData['profilePictureUrl'],
            'userEmail' => $userData['userEmail'],
            'userId' => $userData['userId'],
        );
        return $token;

    }
    public function getTokenRAWDataById($userId){
        $userData=$this->get_user($userId,null,null);

        $token = array(
            'firstName'=>$userData['firstName'],
            'userName' => $userData['firstName']." ".$userData['lastName'],
            'profilePicture'=>$userData['profilePictureUrl'],
            'userEmail' => $userData['u_email'],
            'userId' => $userData['uid'],
        );
        return $token;

    }

    public function getToken($email)
    {
        $this->db->where('u_email', $email);
        $query = $this->db->get('master_user');
        if($query->row('userProfilePicture')!=null){
            $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
        }
        else{
            $url = base_url()."assets/img/download.png";
        }
        $token = $this->jwt->encode(array(
            'consumerKey' =>  $query->row()->userSecret,
            'issuedAt' => date(DATE_ISO8601, strtotime("now")),
            'firstName'=>$query->row()->firstName,
            'userName' => $query->row()->firstName." ".$query->row()->lastName,
            'profilePicture'=>$url,
            'userEmail' => $query->row()->u_email,
            'userId' => $query->row()->userId,
            'userType' => $query->row()->userType
        ), $this->config->item("CONSUMER_SECRET"));

        return $token;
    }


    public function getTokenById($userId)
    {
        $this->db->where('uid', $userId);
        $query = $this->db->get('master_user');
        if($query->row('userProfilePicture')!=null){
            $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
        }
        else{
            $url = base_url()."assets/img/download.png";
        }
        $token = $this->jwt->encode(array(
            'consumerKey' =>  $query->row()->userSecret,
            'issuedAt' => date(DATE_ISO8601, strtotime("now")),
            'firstName'=>$query->row()->firstName,
            'userName' => $query->row()->firstName." ".$query->row()->lastName,
            'profilePicture'=>$url,
            'userEmail' => $query->row()->u_email,
            'userId' => $query->row()->userId,
            'userType' => $query->row()->userType
        ), $this->config->item("CONSUMER_SECRET"));

        return $token;
    }

    public function getTokenAdmin($email)
    {
        $this->db->where('userEmail', $email);
        $query = $this->db->get('master_user');
        if($query->row('userProfilePicture')!=null){
            $url = base_url()."assets/userImage/".$query->row()->userProfilePicture;
        }
        else{
            $url = base_url()."assets/img/download.png";
        }
        $token = $this->jwt->encode(array(
            'consumerKey' =>  $query->row()->userSecret,
            'issuedAt' => date(DATE_ISO8601, strtotime("now")),
            'firstName'=>$query->row()->firstName,
            'userName' => $query->row()->firstName." ".$query->row()->lastName,
            'profilePicture'=>$url,
            'userEmail' => $query->row()->userEmail,
            'userId' => $query->row()->userId,
            'userType' => $query->row()->userType
        ), $this->config->item("CONSUMER_SECRET"));

        return $token;
    }

    function isValidToken($token)
    {
        try {
            $value = $this->jwt->decode($token, $this->config->item("CONSUMER_SECRET"));
            $this->db->where('userSecret', $value->consumerKey);
            $this->db->from('master_user');
            if ($this->db->count_all_results() == 0) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            // echo 'Message: ' .$e->getMessage();
            return false;
        }

    }

    function checkResetToken($token)
    {
        try {
            $value = $this->jwt->decode($token, $this->config->item("CONSUMER_SECRET"));
            $this->db->where('userResetToken', $value->resetKey);
            $this->db->from('master_user');
            if ($this->db->count_all_results() == 0) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            // echo 'Message: ' .$e->getMessage();
            return false;
        }

    }

    function checkVerification($email)
    {
        $this->db->where('userEmail', $email);
        $query = $this->db->get('master_user');

        if($query->row()->userVerification == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function adminBlock($email){
        $this->db->where('userEmail', $email);
        $query = $this->db->get('master_user');
        if($query->row()->userVerification == 1 && $query->row()->userStatus==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function verifyEmail($key,$id,$userStatus)
    {
        $verification = array('userVerification' => 1, 'userSecret'=> $key, 'userStatus' => $userStatus);
        $this->db->where('uid', $id);
        $this->db->update('master_user',$verification );
    }

    function getTokenToId($token)
    {
        $value = $this->jwt->decode($token, $this->config->item("CONSUMER_SECRET"));
        $this->db->where('userSecret', $value->consumerKey);
        $query =$this->db->get('master_user');

        return (int)$query->row('userId');
    }

    function getTokenToType($token)
    {
        $value = $this->jwt->decode($token, $this->config->item("CONSUMER_SECRET"));
        $this->db->where('userSecret', $value->consumerKey);
        $query =$this->db->get('master_user');

        return $query->row('userType');
    }

    function ifInvited($email)
    {
        $this->db->where('userEmail', $email);
        $query = $this->db->get('master_user');

        if($query->row()->userStatus == 2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getTotalUser(){
        $this->db->select("count(uid) as total");
        $query = $this->db->get('master_user');
        return $query->row()->total;
    }

    public function arrayToObject($d){
        if(is_array($d)){
            return (object)array_map(__FUNCTION__,$d);
        }
        else{
            return $d;
        }
    }
}