<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginbackend extends BACKEND_Controller {
	
	// constructor of this class
	function __construct()
    {		
		// call parent constructor
		parent::__construct();
		$this->load->model('login_model');
        $this->load->library("session");

	}
	
	// index page for this controller
	public function index()
	{
        // login check - if not then force to do login
		// else open the dashboard
		if(!$this->login_model->hasLoggedIn()){
			// redirect to login method
			redirect("loginbackend/login");
		}
		else {

			// redirect to dashboard
			redirect("dashboard");
		}
	}
	

	// login method to enter in system
    public function login()
    {
        // initialize template variables
        $this->template->theme = "admin";
        if (isset($_POST["btnLogin"])) {

            // do login
            $result = $this->login_model->logincheck();
           // print_r($result); exit();
            if ($result[1]["login_status"] <= 5){
                if ($result[1] != 0) {

                    // set login status
                    $this->login_model->login(
                        $result[1]["id"],
                        $result[1]["a_name"],
                        null,
                        null,
                        null,
                        null,
                        $this->input->ip_address()

                    );
                    $da = $result[0];
                    $loginStatus = $this->login_model->updateLoginStatus($da);
                    $pass = $result[1]["updated_at_password"];
                    $newDate = date("Y-m-d");
                    $date1 = date_create($pass);
                    $date2 = date_create($newDate);
                    $diff = date_diff($date1, $date2);
                    $days = $diff->format("%a");
                    if ($days > 3) {
                        setFlash("ErrorMsg", "your password has expired change the password..!!");
                    }
                    // redirect to dashboard
                    redirect("dashboard");
                } else {
                    setFlash("loginError", "Invalid username or password..!! Please try again..!!");

                    $da = $result[0];
                    $loginAttempt = $this->login_model->getloginattempt($da);
                    if ($loginAttempt >= 5) {
                        setFlash("loginError", "Your account has locked. Contact to authority");
                    } else {
                        $loginAttempt_update = $this->login_model->updateLoginAttempt($da);

                    }
                    //	set error message for indicating user not logged in
                    // setFlash("loginError", "Invalid username or password..!! Please try again..!!");

                }
            }
            else{
                setFlash("loginError", "Your account has block. Contact to authority");
            }
            //	if record found make user as logged in user

        }

        // variables to pass on login page
        $arrData = array(
            "title" => "Login " . TITLE_SEP . " " . TITLE,
            "meta_keywords" => null,
            "meta_description" => null,
        );
        // load view page
        $this->load->view("login", $arrData);
    }

    // logout method to exit from system
	public function logout()
	{
		// unset login status
		$this->login_model->logout();
		// redirect to login method
		redirect("loginbackend/login");
	}
}