<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use OpenTok\OpenTok;
use OpenTok\Session;
use OpenTok\Role;
use OpenTok\MediaMode;

include_once './vendor/autoload.php';

class Welcome extends MX_Controller {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->model('User_Model'); $this->load->library("session");
        $this->load->helper('url');
        if($this->load->is_loaded("CI_Minifier")){
          $this->ci_minifier->enable_obfuscator(3);
        }
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data["token"]=$this->input->get('token', TRUE);
        $data["demo"]=DEMO;
        //if block determines if a user is already login in this system
        if($this->session->userdata("session_token")!=null){ // if session has a token
            if($this->session->userdata("type")=="user"){    // and the type is 'user'
                redirect(base_url("userview"));              // then redirect him to userview page
            }
            else if($this->session->userdata("type")=="admin"){   // and if the type is 'admin'
                $this->session->set_userdata("session_token",null);  // set the session token variable to null
                $this->load->view('welcome_message',$data);  //then show him the user login page. because admin url is different
            }                                                // admin url is http://www.example.com/admin
        }
        // if no user is login then this else block will be execute
        else{
            $this->load->view('layout/header');   // loading application/views/layout/header.php
            $this->load->view('layout/navbar_empty');// loading application/views/layout/navbar_empty.php
            $this->load->view('welcome_message',$data);// loading application/welcome_message.php
            $this->load->view('layout/header_script');
            $this->load->view('welcome_script',$data);

        }

	}
        
        public function openTok() { 
            $this->load->view('opentok');
        }

        public function start_event_organizer() {
        $API_KEY = "46220382";
        $API_SECRET = "8dd0dafebf26232084c7e3183ee154fa25ecca0b";
        $opentok = new OpenTok($API_KEY, $API_SECRET);
        $session = $opentok->createSession();
        $session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));
// Store this sessionId in the database for later use
        $sessionId = $session->getSessionId();
        $token = $opentok->generateToken($sessionId);
        $pageData = $this->input->post();
        
        $pageData['sessionId']=$sessionId;
        $pageData['tokenId']=$token;


//print_r($pageData);die;

        $returnData = array("sessionId"=>$sessionId,"tokenId"=>$token,"API_KEY"=>$API_KEY);
        echo json_encode($returnData);
        die();
        
    }

}
