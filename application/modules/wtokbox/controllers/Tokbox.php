<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tokbox extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
    }
	public function index($session,$token){  
		$arrData=array(  "token"=>$token,"session"=>$session
		); 
		$this->load->view("index",$arrData);
	}
	public function tokenGenration(){  
		include("./tokbox1.php");
		// echo $sessionId;
		//echo  "<br/><hr/>".$token;
		$arrayData=["tokbox_sessionid"=> $sessionId,'tokbox_token'=>$token ];
		return  $arrayData;
	} 
}