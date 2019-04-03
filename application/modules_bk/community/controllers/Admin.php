<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
        $this->load->model('community_model');
		$this->load->library('email');
    }

	public function index() {

 
	 	$url = site_url()."community/api/findMultiple/";
		$community_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."community/api/updatePublishCommunity";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('community_list' =>$community_list['result'] , );
		$this->template->load("admin/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."community/api/create";
			 
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."community/admin/");	
			} 	
		} 
		
		// prepare data
		$arrData = array( 
			"userList" => $this->community_model->getuserList(),
			
		);
		/*print_r($arrData);
			exit;*/
		$this->template->load("admin/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."community/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."community/admin/");			
		}
		$url = site_url()."/community/api/findSingle/$id";
		$community_data =  apiCall($url, "get");
	  print_r($community_data);
		$arrayData = [
			"community_data"=>$community_data['result'], 
			];
		$this->template->load("admin/update",$arrayData);
	}
	public function deleteCommunity($id) {  
		$url = site_url()."/community/api/deleteCommunity/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."community/admin/");		
	} 


   // Invite Code
	public function send_invite_code($id) {  
		
		if($this->input->post()){
			$forum_id = $this->community_model->get_forum_id_from_forum_slug($id);
		
		    $community_invite_code_expiredate = date('Y-m-d H:i:s');
		    $community_invite_id = $this->input->post('community_invite_id');
			$community_invite_email =  $this->input->post('community_invite_email');
			$community_invite_code=$this->input->post('community_invite_code');
				
			$community_invite_email1=explode(',', $community_invite_email);
			for ($i = 0; $i < count($community_invite_email1); $i++) 
			{
				$chars2 = explode(',','0,1,2,3,4,5,6,7,8,9');
				$community_invite_code =random_string('unique');
				
				//Sending Email

				$link= site_url()."community/admin/verify".'/'.$community_invite_email1[$i].'/'.$community_invite_code;
    			 $to = $community_invite_email1[$i];

				$body = '<p>Hi, </p> '; 
				$body.='<p>Please click this link to activate your account:';
				$body.= '<a href= "'.$link.'">Link</a>';
				$email_content = $body;  
				$this->load->library('Email_PHPMailer');
				$subject = 'Registration Verification: Continuous Imapression :';
			 	$mailresponse = email_Send($subject,$to,$email_content,$name);
				//echo $mailresponse = email_Send($subject,$to,$email_content,$name);
				if($community_invite_email1[$i] != "")
				{
							$data = array(
								'community_invite_id' => $community_invite_id,
								'community_id' => $forum_id,
								'community_invite_email' =>$community_invite_email1[$i],
								'community_invite_code' => $community_invite_code,
					            'community_invite_code_expiredate' =>$community_invite_code_expiredate,
									);

								
						//Transfering data to Model
							$result = $this->community_model->send_invite_code($data);
			  /* 			$data['message'] = 'Data Inserted Successfully';
						//Loading View
						$this->template->load('customer/communities_invite', $data);

 */
				 }
				
			}
			
					//redirect(site_url()."customer/forum/");	
		 	}
		$this->template->load('community/invite/create', $data);
	} 

	public function verify($emailId, $community_invite_code) {
    if($this->community_model->update_user($emailId, $community_invite_code)){
 
    $this->template->load("community/invite/invite_request_success");
 
    }
}



	 public function activeuserlist($community_id=0) {
	 	// prepare data
			$query = $this->community_model->getActiveUserList($community_id);
			$community_name=$this->uri->segment(4);
			$community_id = $this->community_model->get_forum_id_from_forum_slug($community_name);
			 
			$data['community_id'] = $community_id ;
			$data['userList'] = null;
			if($query){
				$data['userList'] =  $query;
			}

			$this->template->load("community/admin/active_user_list", $data);
	}
	public function inactiveuserlist($community_id=0) {
			// prepare data
	 $query = $this->community_model->inactiveuserlist($community_id);
	  $data['inactiveuserList'] = null;
	  if($query){
	   $data['inactiveuserList'] =  $query;
	  }

	  $this->template->load("community/admin/inactive_user_list", $data);
	 }
}

?>
