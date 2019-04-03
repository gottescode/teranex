<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();

        $this->customer_path = "uploads/customer/";
        define('RESIZEWIDTH', '1600');
        define('RESIZEHIGHT', '900');

        $this->load->model('User_Model');
        $this->load->model("pages_model");
    }

    public function index() {
        $arrData = array(
        );
        $this->template->load("index", $arrData);
    }

    public function signIn() {
        if ($this->session->userdata('uid') != '') {
            redirect(site_url() . "customer/dashboard/");
            exit;
        }


        if (isset($_POST['otp_no'])) {
            $pageData = $this->input->post();

            //print_r($pageData);exit;
            $post_company_code = $pageData["company_id"];
            $post_u_email = $pageData["s_email"];

            $company_code_exist = $this->pages_model->selectAllWhr('master_user', 'company_code', $post_company_code, 'u_email', $post_u_email);
            if ($company_code_exist == 1) {

                $user_verify_code = random_string('unique');
                $emailId = $pageData['s_email'];
                $pageData['user_verify_code'] = $user_verify_code;
                // print_r($pageData);exit;
                $url = site_url() . "/pages/api/insertSignUpForm";
                $response = apiCall($url, "post", $pageData);

                if ($response['result'] == 1) {
                    $user_type = $pageData['supplier'];
                    $user_role = $pageData['artist_1'];
                    $url = site_url() . "/pages/api/findSingleuserrole/$user_role";
                    $user_type_role = apiCall($url, "get");
                    $url = site_url() . "/pages/api/findSingleusertype/$user_type";
                    $user_type_list = apiCall($url, "get");
                    //print_r($user_type_list);exit;
                    $user_role_name = $user_type_role['result']['roleName'];
                    $user_type_name = $user_type_list['result']['userType'];
                    $user_verify_code = $pageData['user_verify_code'];
                    $link = site_url() . "pages/verify" . '/' . $emailId . '/' . $user_verify_code;
                    $to = $emailId;
                    $body = '<p>Hi ' . $pageData['company_name'] . ',</p> ';
                    $body .= '<p>This is to notify that you have been associated with' . SUPPORT_TEAM_NAME . 'family and may start receiving notifications for the services you would be using through ' . SUPPORT_TEAM_NAME . ' platform. You can access the system for up to 2 hours as part of trial evaluation. For further access or other details, do connect with us at ' . SUPPORT_MAIL . '</p>';
                    $body .= '<p>Click  <a href= "http://test.orendaventures.com/" alt="Here">Here</a> to sign up to Stelmac.io platform with below details – </p>';
                    $body .= 'User type:' . $user_type_name . '<br/>';
                    $body .= 'Email:' . $pageData['s_email'] . '<br/>';
                    $body .= 'Company Code:' . $pageData['company_id'] . '<br/>';
                    $body .= 'Your role:' . $user_role_name . '<br/>';

                    $body .= 'If you have difficulty to sign up with above link, you can copy link in your browser: <<sign up page link>><br/><br/>';
                    $body .= 'Thank you,<br/>';
                    $body .= SUPPORT_TEAM_NAME . '<br/>';
                    $body .= SUPPORT_MAIL;
                    $email_content = $body;
                    // print_r($email_content);exit;
                    $this->load->library('Email_PHPMailer');
                    $subject = 'Welcome to ' . $pageData['company_name'] . ' account on ' . DOMAIN_NAME . ', your assistant for all fabrication need.';
                    $mailresponse = email_Send($subject, $to, $email_content, $name);
                    setFlash("dataMsgSuccessSign", "Please signin with your creaditional");
                } else {
                    setFlash("ErrorMsg", $response['message']);
                }
            } elseif ($post_company_code == '') {
                $pageData = $this->input->post();
                //print_r($pageData);die;
                //echo 'admin';die;
                // echo $this->session->userdata("captcha_SignUp");die;
                $user_type = $pageData['supplier'];
                $user_role = $pageData['artist_1'];
                $url = site_url() . "/pages/api/findSingleuserrole/$user_role";
                $user_type_role = apiCall($url, "get");
                $url = site_url() . "/pages/api/findSingleusertype/$user_type";
                $user_type_list = apiCall($url, "get");
                //print_r($user_type_list);exit;
                $user_role_name = $user_type_role['result']['roleName'];
                $user_type_name = $user_type_list['result']['userType'];
                //  print_r($user_type_role['result']['roleName']);exit;
                $user_verify_code = random_string('unique');
                $emailId = $pageData['s_email'];
                $pageData['user_verify_code'] = $user_verify_code;

                // print_r($pageData);exit;
                $url = site_url() . "/pages/api/insertSignUpForm";
                $response = apiCall($url, "post", $pageData);
                //  print_r($response['result']);
                if ($response['result'] == 0) {
                    // echo 'mail';die;
                    $user_verify_code = $pageData['user_verify_code'];
                    $link = site_url() . "pages/verify" . '/' . $emailId . '/' . $user_verify_code;

                    $to = $emailId;
                    $body = '<p>Hi ' . $pageData['company_name'] . ' ,</p> ';
                    $body .= '<p>Thanks a lot for signing up your organization ' . $pageData['company_name'] . ' with ' . DOMAIN_NAME . '. You can access the system for up to 2 hours as part of trial evaluation. For further access or other details, do connect with us at  ' . DOMAIN_NAME . '. We would also review your details and get back to you as appropriate. Please look forward to receive an email from us.</p>';
                    $body .= '<p>We value all our customers and partners and help them with any questions they might have. Do contact us for any queries at ' . SUPPORT_MAIL . ' .</p>';
                    $body .= 'Here are the sign up details you have submitted:</br>';
                    $body .= 'User type:' . $user_type_name . '<br/>';
                    $body .= 'User Role:' . $user_role_name . '<br/>';
                    $body .= 'Company Name:' . $pageData['company_name'] . '<br/>';
                    $body .= 'Company Web Address:' . $pageData['company_website'] . '<br/>';
                    $body .= 'Please <a href= "' . addhttp($link) . '" alt="click Here">click Here</a> to activate your account.<br/>';
                    $body .= 'You can now create various users (employees from your organization) from the Dashboard.<br/><br/><br/>';
                    $body .= 'Thank you,<br/>';
                    $body .= SUPPORT_TEAM_NAME . '<br/>';
                    $body .= SUPPORT_MAIL;
                    $email_content = $body;
                    // print_r($email_content);exit;
                    $this->load->library('Email_PHPMailer');
                    $subject = 'Welcome to ' . $pageData['company_name'] . ' account on ' . DOMAIN_NAME . ', your assistant for all fabrication need.';
                    $mailresponse = email_Send($subject, $to, $email_content, $name);
                    setFlash("dataMsgSuccessSign", "Thank You! Please check your email to activate your Account");
                    redirect(site_url() . "pages/signIn");
                } else {
                    setFlash("ErrorMsg", $response['message']);
                }
            } else {
                setFlash("ErrorMsg", "Please try again with valid email address and company code");
            }
        }
        $otp_no = rand(100000, 999999);


        $countryData = $this->pages_model->fetchData();
        //  print_r($countryData);die;
        $arrData = array(
            "otp_no" => $otp_no,
            "countryData" => $countryData
        );
        ?>

        <?php

        //  print_r($arrData);die;
        $this->template->load("sign_in", $arrData);
    }

    public function user_access() {

        $supplier = $this->input->post('supplier');



        $supplier_data = $this->pages_model->user_type_master($supplier);

        $cnt = '<option value="">Select Role</option>';

        if (isset($supplier_data) && !empty($supplier_data)) {
            foreach ($supplier_data as $key) {
                $cnt = $cnt . '<option value="' . $key->id . '">' . $key->roleName . '</option>';
            }
            $data = json_encode($cnt);
        }

        echo $data;
    }

    public function companyExists() {
        $company_name = $this->input->post("company");

        //echo $company_name;die;

        $result_c = $this->pages_model->selectAllWhr('company_master', 'company_name', $company_name);

        $data = json_encode($result_c);

        echo $data;
    }

///forgot password
    public function forgotPassword() {

        //echo 'hi';die;
        if (isset($_POST['resetSubmit'])) {
            $pageData = $this->input->post();
            $emailId = $pageData['r_email'];
            $r_password = rand();
            $pageData['r_password'] = $r_password;
            // echo $r_password;die;
            $url = site_url() . "/pages/api/forgotPassword";
            //$url = site_url()."/pages/api/forgotPasswordUser"; 
            //echo $url;die;
            $response = apiCall($url, "post", $pageData);
            //print_R($response);die; 
            if ($response['result']) {
                $user_verify_code = $pageData['user_verify_code'];

                $to = $pageData['r_email'];
                $body = '<p>Hi, </p> ';
                $body .= '<p>We have processed your request for password retrieval. Your account details are as mentioned below </p>';
                $body .= '<p>User ID : ' . $pageData['r_email'] . '</p>';
                $body .= '<p>New Password : ' . $pageData['r_password'] . '</p>';
                $body .= '<p>Change your password at your own and keep this safely. ';
                $body .= '<p>Best Regards, ';
                $body .= '<p>Stelmac';
                $email_content = $body;
                $this->load->library('Email_PHPMailer');
                $subject = 'New password ';
                $mailresponse = email_Send($subject, $to, $email_content, $name);

                $transaction_type = 3;
                //echo $data;die;
                $this->user_log($transaction_type);

                /* $to = 'mangave1008@gmail.com';
                  $body = '<p>Hi, </p> ';
                  $body.="<p> Thank You,</p> <br/>";
                  $email_content = $body;
                  $this->load->library('Email_PHPMailer');
                  $subject = 'New contact inquiry:';
                  echo $mailresponse = email_Send($subject,$to,$email_content,$name); */
                setFlash("dataMsgSuccessSign", "Password Changed Successfully..!!Please Check Email..!!");
                redirect(site_url() . "pages/signIn");
            } else {
                setFlash("ErrorMsg", "Something Went Wrong Please Try Again..!!");
                redirect(site_url() . "pages/signIn");
            }
        }
    }

    public function verify($emailId, $user_verify_code) {
        if ($this->pages_model->update_user($emailId, $user_verify_code)) {

            $this->template->load("sign_in");
        }
    }

    public function login() {
        if (isset($_POST['btnLogin'])) {
            $pageData = $this->input->post();

            // print_r($pageData);die;
            if (!empty($pageData)) {

                $url = site_url() . "/pages/api/checkLogin";
                $response = apiCall($url, "post", $pageData);
                //print_r($response);exit;
                if ($response['result']) {
                    setFlash("dataMsgSuccessSign", "Login Success");
                    $session = array("uid" => $response['result']['uid']);
                    $session["user_email"] = $response['result']['u_email'];
                    $session["user_type"] = $response['result']['u_user_type'];
                    $session["u_name"] = $response['result']['u_name'];
                    $session["u_avatar"] = $response['result']['u_avatar'];
                    $session["u_mobileno"] = $response['result']['u_mobileno'];
                    // set extra varible


                    $session["user_type"] = $response['result']['user_type'];
                    $session["user_role"] = $response['result']['user_role'];
                    /* 	$session["kicked"] = $response['result']['kicked'];  
                      $session["warning_text"] = $response['result']['warning_text'];
                      $session["banned"] = $response['result']['banned'];
                      $session["active"] = $response['result']['active'];
                      $session["last_msg"] = $response['result']['last_msg'];
                      $session["user_room"] = $response['result']['user_room'];
                      $session["readyChatUser"] = $response['result']['u_name'];
                      $session["warned"] = $response['result']['warned']; */
                    $session["reset"] = "";
                    $this->session->set_userdata($session);
                    // call user log function
                    $transaction_type = 1;
                    $this->user_log($transaction_type);

                    /*
                      Created By:Kishor Kudale(Deven Infotech Team)
                      Date:05-09-2018
                      Purpose:Auto login to wordpress when user login from CI login screen.
                     */
                    setcookie("username", "", time() - 3600);
                    setcookie("password", "", time() - 3600);
                    $username = $response['result']['u_email'];
                    $password = $response['result']['u_password'];
                    setcookie("username", $username, time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                    redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_auth.php");
                    /* END */

                    redirect(site_url() . "customer/dashboard/");
                } else {
                    setFlash("ErrorLoginMsg", $response['message']);
                    redirect(site_url() . "pages/signIn");
                }
            } else {
                setFlash("ErrorLoginMsg", "Please Enter correct Email and password");
            }
        }
        $countryData = $this->pages_model->fetchData();
        //  print_r($countryData);die;
        $arrData = array(
            "countryData" => $countryData
        );


        $this->template->load("sign_in", $arrData);
    }

    public function login_linkedin($email, $linkedin_id) {

        //echo 'hi linked login'.$email;die;



        $pageData = array('u_email' => $email);

        if (!empty($pageData)) {
            //  print_r($pageData);die;

            $url = site_url() . "/pages/api/checkLoginlinkedin";
            $response = apiCall($url, "post", $pageData);
            // print_r($response);exit;
            if ($response['result']) {
                setFlash("dataMsgSuccessSign", "Login Success");
                $session = array("uid" => $response['result']['uid']);
                $session["user_email"] = $response['result']['u_email'];
                $session["user_type"] = $response['result']['u_user_type'];
                $session["u_name"] = $response['result']['u_name'];
                $session["u_mobileno"] = $response['result']['u_mobileno'];

                // set extra varible
                $session["user_type"] = $response['result']['user_type'];
                $session["user_role"] = $response['result']['user_role'];

                //print_r($session);die;
                /*  $session["kicked"] = $response['result']['kicked'];  
                  $session["warning_text"] = $response['result']['warning_text'];
                  $session["banned"] = $response['result']['banned'];
                  $session["active"] = $response['result']['active'];
                  $session["last_msg"] = $response['result']['last_msg'];
                  $session["user_room"] = $response['result']['user_room'];
                  $session["readyChatUser"] = $response['result']['u_name'];
                  $session["warned"] = $response['result']['warned']; */
                $session["reset"] = "";
                $this->session->set_userdata($session);
                $transaction_type = 8;
                //echo $data;die;
                $this->user_log($transaction_type);

                /*
                  Created By:Kishor Kudale(Deven Infotech Team)
                  Date:05-09-2018
                  Purpose:Auto login to wordpress when user login from CI login screen.
                 */
                setcookie("username", "", time() - 3600);
                $username = $response['result']['u_email'];
                setcookie("username", $username, time() + (86400 * 30), "/");
                redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_auth.php");
                /* END */

                //echo $uid=$this->session->userdata('uid');die;

                redirect(site_url() . "customer/dashboard/");
                ;
            } else {
                setFlash("ErrorLoginMsg", $response['message']);
            }
        } else {
            setFlash("ErrorLoginMsg", "Please Enter correct Email and password");
        }


        $this->template->load("sign_in");
    }

    public function hello() {
        $session = array("uid" => 1);
        $session["user_email"] = "asd";
        //$session["user_type"] = $response['result']['u_user_type']; 
        $this->session->set_userdata($session);
        //	print_r($this->session->userdata());exit;
        redirect(site_url() . "pages/sessiondata/");
    }

    public function sessiondata() {
        print_r($this->session->userdata());
        exit;
    }

    public function send_otp() {
        $data = $this->input->post();
        sms_send($data['mobile_no'], " One Time Password for sign up in Teranex {$data['otp_no']}. This can used only once, Thank you.");
        echo '1';
    }

    // logout method to exit from system
    public function logout() {
        $session = array("uid", "u_email", "user_type");
        $counter = $this->input->post("countdown");
        // echo $counter;die;
        //print_r($session);die;
        $uid = $this->session->userdata('uid');
        $updata['active'] = 0;
        $updata['session_value'] = $counter;
        $emailExit = $this->db_lib->update("master_user", $updata, "uid='$uid'  ");

        $transaction_type = 5;
        //echo $data;die;
        $this->user_log($transaction_type);

        $this->session->unset_userdata($session);
        $this->session->sess_destroy();
        /*
          setFlash("dataMsgSuccessSign", "Please contact us at suuport@stelmac.com if you want to extended access..!!");


          /*
          Created By:Kishor Kudale(Deven Infotech Team)
          Date:11-09-2018
          Purpose:Auto logout from wordpress when user logout from CI/Wordpress.
         */
        redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_logout.php");
        // redirect to login method
        //redirect("pages/signIn");
    }

    public function logout_success() {
        setFlash("dataMsgSuccessSign", "Logout Successfully !!");
        $countryData = $this->pages_model->fetchData();
        //  print_r($countryData);die;
        $arrData = array(
            "countryData" => $countryData
        );

        $this->template->load("sign_in", $arrData);
    }

    public function session_logout() {


        $uid = $this->session->userdata('uid');
        $counter = $this->input->post("countdown");
        // echo $counter;die;
        $session_data = $this->pages_model->selectAllWhrNew('master_user', 'uid', $uid);

        if ($counter >= $session_data['session_exp_time']) {
            //echo 'expired';die;
            $updata['is_active'] = 0;
            $updata['active'] = 0;
            $updata['session_value'] = $counter;
            $emailExit = $this->db_lib->update("master_user", $updata, "uid='$uid'");
            $this->session->unset_userdata($session);
            $this->session->sess_destroy();
            //header('Location: /index.php?msg=' . urlencode("You have been successfully logged out!"));
            //redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_logout.php");

            redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_logout.php");
        }
    }

    public function save_session() {
        $counter = $this->input->post("counter");
        $uid = $this->session->userdata('uid');

        // echo $counter;die;
        $updata['active'] = 0;
        $updata['session_value'] = $counter;

        //print_r($updata);die;
        $emailExit = $this->db_lib->update("master_user", $updata, "uid='$uid'");
        $session_data = $this->pages_model->selectAllWhrNew('master_user', 'uid', $uid);

        if ($counter >= $session_data['session_exp_time']) {
            $updata['is_active'] = 0;
            $updata['active'] = 0;
            $updata['session_value'] = $counter;

            //print_r($updata);die;
            $emailExit = $this->db_lib->update("master_user", $updata, "uid='$uid'  ");
            $this->session->unset_userdata($session);
            $this->session->sess_destroy();
            setFlash("dataMsgSuccessSign", "Please contact us at suuport@stelmac.com if you want to extended access..!!");
            redirect(site_url() . "ecommerce/wp-content/themes/nikado/ci_wp_logout.php");
        }

        //redirect(site_url() . "customer/profile");
    }

    public function about() {
        $aboutUrl = site_url() . "/pages/api/findSingle/1";
        $aboutList = apiCall($aboutUrl, "get");

        $arrayData = array(
            "aboutList" => $aboutList['result']
        );

        $this->template->load("about", $arrayData);
    }

    public function contact() {
        $pageData = $this->input->post();
        if (isset($_POST['btnSubmit'])) {
            if (!empty($pageData) && $pageData["captcha"] == $this->session->userdata("captcha_contactUs")) {
                $pageData = $this->input->post();
                $url = site_url() . "pages/api/contactInsert/";
                $response = apiCall($url, "post", $pageData);
                //	print_r($response);exit;

                if ($response['result']) {



                    setFlash("dataMsgSuccessSign", "Thank You For Contacting Us..!!");
                } else {
                    setFlash("ErrorMsg", $response['message']);
                }
            } else {
                setFlash("ErrorMsg", "Please Enter Correct Captcha Code..!!");
            }
            /* Contact Us Data */


            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Contact Us form has been saved successfully");
                redirect("pages/contact");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
                redirect("pages/contact");
            }
        }
        $this->template->load("contact");
    }

    public function teranex_team() {
        // redirect to team

        $url = site_url() . "pages/api/findMultipleTeam/";
        $team_list = apiCall($url, "get");
        //print_r($team_list);exit;
        $url = site_url() . "pages/api/findMultipleAdvisoryboardTeam/";
        $team_advisory_list = apiCall($url, "get");
        //print_r($team_advisory_list);exit;


        $arrayData = array(
            'team_list' => $team_list['result'],
            'team_advisory_list' => $team_advisory_list['result']
        );
        $this->template->load("team", $arrayData);
    }

    public function teranex_faq() {
        // redirect to team

        $url = site_url() . "pages/api/findMultipleFaq/";
        $faq_list = apiCall($url, "get");
        //print_r($team_list);exit;


        $arrayData = array(
            'faq_list' => $faq_list['result'],
        );
        $this->template->load("faq", $arrayData);
    }

    public function allcategories() {
        // redirect to team

        $url = site_url() . "pages/api/findMultipleAllcategorie/";
        $allcategories_list = apiCall($url, "get");
        //print_r($allcategories_list);exit;
        $url = site_url() . "pages/api/findMultipleSubCategorie/";
        $allsubcategories_list = apiCall($url, "get");
        //print_r($allsubcategories_list);exit;
        $arrayData = array(
            'allcategories_list' => $allcategories_list['result'],
            'allsubcategories_list' => $allsubcategories_list['result'],
        );
        $this->template->load("allcategories", $arrayData);
    }

    public function teranex_rfq() {
        // redirect to team
        if (isset($_POST['btnRfq'])) {
            $pageData = $this->input->post();
            $url = site_url() . "pages/api/rfqInsert/";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Request Successfully Submited");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
            redirect("pages/teranex_rfq");
        }

        $this->template->load("rfq");
    }

    public function suppliermembership() {
        // redirect to team
        //print_r("expression");exit;
        if (isset($_POST['btnSupplierMembership'])) {
            $pageData = $this->input->post();
            //print_r($pageData);exit; 
            $url = site_url() . "pages/api/SupplierMembership/";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Request Successfully Submited");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
            redirect("pages/suppliermembership");
        }

        // redirect to suppliers
        $this->template->load("suppliermembership");
    }

    public function serviceproviders() {

        if (isset($_POST['btnServiceProvider'])) {
            $pageData = $this->input->post();
            //print_r($pageData);exit; 
            $url = site_url() . "pages/api/ServiceProviders/";
            $response = apiCall($url, "post", $pageData);
            //	print_r($response);exit;
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Request Successfully Submited");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }


            redirect("pages/serviceproviders");
        }
        // redirect to serviceproviders
        $this->template->load("serviceproviders");
    }

    public function returnscancellations() {
        $refundURL = site_url() . "/pages/api/findSingle/2";
        $refundList = apiCall($refundURL, "get");

        $arrayData = array(
            "refundList" => $refundList['result']
        );
        $this->template->load("returns-cancellations", $arrayData);
    }

    public function termsconditions() {
        // redirect to termsconditions
        $this->template->load("terms-conditions");
    }

    public function termsuse() {
        $termsuseURL = site_url() . "/pages/api/findSingle/8";
        $termsuseList = apiCall($termsuseURL, "get");

        $arrayData = array(
            "termsuseList" => $termsuseList['result']
        );
        // redirect to termsuse
        $this->template->load("terms-use", $arrayData);
    }

    public function disclaimer() {
        $disclaimerURL = site_url() . "/pages/api/findSingle/8";
        $disclaimerList = apiCall($disclaimerURL, "get");

        $arrayData = array(
            "disclaimerList" => $disclaimerList['result']
        );
        // redirect to termsuse
        $this->template->load("disclaimer", $arrayData);
    }

    public function privacystatement() {
        $privacyStatementURL = site_url() . "/pages/api/findSingle/3";
        $privacyStatementList = apiCall($privacyStatementURL, "get");
        $arrayData = [
            "privacyStatementList" => $privacyStatementList['result']
        ];
        $this->template->load("privacy-statement", $arrayData);
    }

    public function market_place() {
        // redirect to termsuse
        $this->template->load("market_place");
    }

    public function trainers() {
        // redirect to termsuse
        $this->template->load("trainers");
    }

    public function trainings() {
        // redirect to termsuse
        $this->template->load("trainings");
    }

    public function commingsoon() {
        // redirect to termsuse
        $this->template->load("coming_soon");
    }

    /* public function ajaxLogin(){

      $pageData = $this->input->post();
      if (!empty($pageData)  ){

      $pageDataNew['u_email']=$pageData['user_email'];
      $pageDataNew['u_password']=$pageData['user_password'];
      $url = site_url()."/pages/api/checkLogin";
      $response =  apiCall($url,"post",$pageDataNew);

      if((int)$response['result']['uid']){
      setFlash("dataMsgSuccessSign", "Login Success");
      $session= array("uid" =>  $response['result']['uid']);
      $session["user_email"] = $response['result']['u_email'];
      $session["user_type"] = $response['result']['u_user_type'];
      $session["u_name"] = $response['result']['u_name'];
      $this->session->set_userdata($session);

      $arrayData=array("success"=>'success',"response"=>$response);
      echo json_encode($arrayData);
      }
      else{
      $arrayData=array("fail"=>'fail');
      echo json_encode($arrayData);
      ,
      }
      else{
      $arrayData=array("fail"=>'No data found');
      echo json_encode($arrayData);
      }

      }
     */

    public function ajaxLogin() {

        $pageData = $this->input->post();

        if (!empty($pageData)) {

            $pageDataNew['u_email'] = $pageData['user_email'];
            $pageDataNew['u_password'] = $pageData['user_password'];
            $url = site_url() . "/pages/api/checkLogin";
            $response = apiCall($url, "post", $pageDataNew);

            if ((int) $response['result']['uid']) {
                setFlash("dataMsgSuccessSign", "Login Success");
                $session = array("uid" => $response['result']['uid']);
                $session["user_email"] = $response['result']['u_email'];
                $session["user_type"] = $response['result']['u_user_type'];
                $session["user_type"] = $response['result']['user_type'];
                $session["user_role"] = $response['result']['user_role'];
                $session["u_name"] = $response['result']['u_name'];
                $this->session->set_userdata($session);
                /* JWT  */
                if ($this->User_Model->checkUser($pageDataNew['u_email'], $pageDataNew['u_password'])) {
                    if (!ID_LOGIN) {
                        $token = $this->User_Model->getToken($pageDataNew['u_email']);
                        $type = "token";
                    } else {
                        $token = $this->User_Model->getTokenRAWData($pageDataNew['u_email']);
                        $type = "raw";
                    }

                    /* $response = array(
                      "status" => array(
                      "code" => REST_Controller::HTTP_OK,
                      "message" => "Success"
                      ),
                      "response" => $token,"type"=>$type
                      );
                     */
                    //$this->response($response, REST_Controller::HTTP_OK);
                }
                /* JWT  */
                $arrayData = array(
                    "success" => 'success',
                    "response" => $response,
                    "status" => array(
                        "code" => REST_Controller::HTTP_OK,
                        "message" => "Success"
                    ),
                    "token" => $token,
                    "type" => $type
                );
                echo json_encode($arrayData);
            } else {
                $arrayData = array("fail" => 'fail');
                echo json_encode($arrayData);
            }
        } else {
            $arrayData = array("fail" => 'No data found');
            echo json_encode($arrayData);
        }
    }

    public function digital_manufacturing() {
        // redirect to termsuse
        $this->template->load("digital_manufacturing");
    }

    public function digital_manufacturingRFQ() {
        // redirect to termsuse
        $this->template->load("digital_manufacturingRFQ");
    }

    public function ajaxLoginFront() {
        $pageData = $this->input->post();
        if (!empty($pageData)) {
            $pageDataNew['u_email'] = $pageData['u_email'];
            $pageDataNew['u_password'] = $pageData['u_password'];

            $url = site_url() . "/pages/api/checkLogin";
            $response = apiCall($url, "post", $pageDataNew);


            if ((int) $response['result']['uid']) {
                setFlash("dataMsgSuccessSign", "Login Success");
                $session = array("uid" => $response['result']['uid']);
                $session["user_email"] = $response['result']['u_email'];
                $session["user_type"] = $response['result']['u_user_type'];
                $session["u_name"] = $response['result']['u_name'];

                $this->session->set_userdata($session);
                /* JWT  */
                if ($this->User_Model->checkUser($pageDataNew['u_email'], $pageDataNew['u_password'])) {
                    if (!ID_LOGIN) {
                        $token = $this->User_Model->getToken($pageDataNew['u_email']);
                        $type = "token";
                    } else {
                        $token = $this->User_Model->getTokenRAWData($pageDataNew['u_email']);
                        $type = "raw";
                    }
                }
                /* JWT  */
                $arrayData = array(
                    "success" => 'success',
                    "response" => $response,
                    "status" => array(
                        "code" => REST_Controller::HTTP_OK,
                        "message" => "Success"
                    ),
                    "token" => $token,
                    "type" => $type
                );
                echo json_encode($arrayData);
            } else {
                $arrayData = array("fail" => 'fail');
                echo json_encode($arrayData);
            }
        } else {
            $arrayData = array("fail" => 'No data found');
            echo json_encode($arrayData);
        }
    }

    public function feedback() {
        // redirect to termsuse
        $this->template->load("feedback");
    }

    public function getPaidForYourFeedback() {
        $pageData = $this->input->post();
        if (!empty($pageData)) {

            $pageData = $this->input->post();
            $pageData['user_id'] = $this->session->userdata('uid');
            //$checkBox = implode(',', $_POST['Days']);
            // implode(',',$_POST['cust_option']);
            //$interested_category =implode(',',$pageData['interested_category']);
            //print_r($interested_category);exit;
            //$pageData['interested_category'] =$interested_category;
            $url = site_url() . "pages/api/PaidForYourFeedback/";
            $response = apiCall($url, "post", $pageData);
            //print_r($response);exit;
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Request Successfully Submited");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
            redirect("pages/getPaidForYourFeedback");
        }
        // redirect to termsuse
        $this->template->load("getPaidForYourFeedback");
    }

    public function ReportAbuse() {
        if (isset($_POST['btnReportAbuse'])) {
            $pageData = $this->input->post();
            //print_r($pageData);exit; 
            $pageData['user_id'] = $this->session->userdata('uid');
            $pageData['user_type'] = $this->session->userdata('user_type');
            //print_r($pageData['user_type']);exit;
            $url = site_url() . "pages/api/ReportAbuse/";
            $response = apiCall($url, "post", $pageData);
            //	print_r($response);exit;
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", "Request Successfully Submited");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }


            redirect("pages/ReportAbuse");
        }
        // redirect to serviceproviders
        $this->template->load("reportAbuse");
    }

    public function customer_services() {
        $this->template->load("customer_services");
    }

    public function trade_services() {
        $this->template->load("trade_services");
    }

    public function market_intelligence() {
        $this->template->load("market_intelligence");
    }

    public function efactory_design() {
        $this->template->load("efactory_design");
    }

    public function printing_design_3d() {
        $this->template->load("printing_design_3d");
    }

    public function printing_manufacturing_3d() {
        $this->template->load("printing_manufacturing_3d");
    }

    public function cnc_machining_manufacturing() {
        $this->template->load("cnc_machining_manufacturing");
    }

    public function tradeServices() {
        $this->template->load("tradeServices");
    }

    public function customerServices() {
        $this->template->load("customerServices");
    }

    public function linklinkedin() {
        //echo 'hi';die;

        $this->template->load('index1');
    }

    public function linked_login() {

        // echo 'hi';die;
        require_once APPPATH . "libraries/http.php";
        require_once APPPATH . "libraries/linkedin/oauth_client.php";
        require_once APPPATH . "libraries/linkedin/config.php";

        //print_r(APPPATH);die;

        if ($_GET["oauth_problem"] <> "") {
            // in case if user cancel the login. redirect back to home page.
            $_SESSION["e_msg"] = $_GET["oauth_problem"];

            $this->template->load('home');
            //header("location:pages/index.php");
            exit;
        }


        $client = new oauth_client_class;

        $client->debug = false;
        $client->debug_http = true;
        $client->redirect_uri = REDIRECT_URL;
        $client->client_id = API_KEY;
        $application_line = __LINE__;
        $client->client_secret = SECRET_KEY;

        if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
            die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , ' .
                            'create an application, and in the line ' . $application_line .
                            ' set the client_id to Consumer key and client_secret with Consumer secret. ' .
                            'The Callback URL must be ' . $client->redirect_uri) . ' Make sure you enable the ' .
                    'necessary permissions to execute the API calls your application needs.';

        /* API permissions
         */
        $client->scope = SCOPE;
        if (($success = $client->Initialize())) {
            if (($success = $client->Process())) {
                if (strlen($client->authorization_error)) {
                    $client->error = $client->authorization_error;
                    $success = false;
                } elseif (strlen($client->access_token)) {
                    $success = $client->CallAPI(
                            'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,picture-url,public-profile-url,formatted-name)', 'GET', array(
                        'format' => 'json'
                            ), array('FailOnAccessError' => true), $user);
                }
            }
            //print_r($user);die;
            $success = $client->Finalize($success);
        }
        if ($client->exit)
            exit;
        if ($success) {
            // Now check if user exist with same email ID
            $result = $this->pages_model->fetchUserCountData($user->emailAddress);

            // $sql = "SELECT COUNT(*) AS count from master_user where u_email = :email_id";
            try {
                $count = $result[0]->count;
                if ($count > 0) {
                    //echo 'User Exist';die;
                    $data = array('l_status' => 1);
                    $this->pages_model->updateDetails('master_user', 'u_email', $user->emailAddress, $data);
                    $user_data["name"] = $user->formattedName;
                    $user_data["email"] = $user->emailAddress;
                    $user_data["linkedin_id"] = $user->id;
                    $user_data["new_user"] = "no";
                } else {
                    // echo 'hi';die;
                    $data = $user_data["name"] = $user->firstName . ' ' . $user->lastName;
                    $data = $user_data["email"] = $user->emailAddress;
                    $data = $user_data["u_avatar"] = $user->publicProfileUrl;
                    //$data = $user_data["userType"] = 3;
                    //$data = $user_data["roleName"] = 1;
                    $data_master = array('u_name' => $user_data["name"], 'u_avatar' => $user_data["u_avatar"], 'u_email' => $user_data["email"]);
                    $data_eco = array('user_login' => $user_data["email"], 'display_name' => $user_data["name"], 'u_avatar' => $user_data["u_avatar"], 'user_email' => $user_data["email"]);
                    // New user, Insert in database
                    $result = $this->db_lib->insert("ecommerce_users", $data_eco);
                    $id = $this->db_lib->insert("master_user", $data_master);
                    $first_user = 1;
                    $arrData = array('uid' => $id, 'LID' => $first_user);
                    $result = $this->pages_model->Add_data('user_details', $arrData);
                    if ($id > 0) {
                        $user_data["name"] = $user->formattedName;
                        $user_data["email"] = $user->emailAddress;
                        $user_data["new_user"] = "yes";
                        $user_data["e_msg"] = "";
                    }
                }
            } catch (Exception $ex) {
                $user_data["e_msg"] = $ex->getMessage();
            }

            $user_data["user_id"] = $user->id;
        } else {
            $user_data["e_msg"] = $client->error;
        }

//print_r($user_data["email"]);die;
        $this->login_linkedin($user_data["email"], $user_data["linkedin_id"]);
    }

    public function captchCode() {
        $captchaCode = $this->session->userdata('captcha_SignUp');
        $arrayData = array("captcha" => $captchaCode);
        echo json_encode($arrayData);
    }

    public function user_log($data) {
        //  echo 'hi';die;
        //print_r($data);die;
        $pageData['transaction_type'] = $data;
        $pageData['uid'] = $this->session->userdata('uid');

        //print_r($pageData);die;
        $url = site_url() . "/customer/api/insertUserLog";
        $response = apiCall($url, "post", $pageData);
        //print_r($response);die;
    }

    public function updateLinkedIn() {

        if (isset($_POST['updateLinkedin'])) {
            $pageData = $this->input->post();
            //print_r($pageData);die;
            $company_name = $pageData['company_name'];
            $company_name_exist = $this->pages_model->selectAllWhrSingle('user_details', 'user_company_name', $company_name);
            // print_r($company_name_exist);die;
            if ($company_name_exist == 0) {
                $url = site_url() . "/pages/api/updateLinkedIn";
                $response = apiCall($url, "post", $pageData);
                // print_r($response);die; 
                if ($response['result']) {
                    setFlash("dataLinkedSuccessSign", "Profile details update succesfully!!");
                    redirect(site_url() . "customer/dashboard/");
                } else {
                    setFlash("ErrorMsgLinked", "Something Went Wrong Please Try Again..!!");
                    redirect(site_url() . "pages/signIn");
                }
            } else {
                setFlash("ErrorMsgLinked", "Company name already exist!!");
                redirect(site_url() . "customer/dashboard/");
            }
        }
    }

    // login in with google

    public function google_login() {

//echo 'hi';die;
        require_once APPPATH . "libraries/google/http.php";
        require_once APPPATH . "libraries/google/oauth_client.php";
        require_once APPPATH . "libraries/google/config.php";
        
       // print_r(APPPATH);die;





        $client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
        $client->offline = FALSE;

        $client->debug = false;
        $client->debug_http = true;
        $client->redirect_uri = REDIRECT_URL;

        
        //echo REDIRECT_URL;die; 
        $client->client_id = CLIENT_ID;
        $application_line = __LINE__;
        $client->client_secret = CLIENT_SECRET;

        if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
            die('Please go to Google APIs console page ' .
                    'http://code.google.com/apis/console in the API access tab, ' .
                    'create a new client ID, and in the line ' . $application_line .
                    ' set the client_id to Client ID and client_secret with Client Secret. ' .
                    'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
                    'the domain is valid and can be resolved by a public DNS.');

        /* API permissions
         */
        $client->scope = SCOPE;
        if (($success = $client->Initialize())) {
            if (($success = $client->Process())) {
                if (strlen($client->authorization_error)) {
                    $client->error = $client->authorization_error;
                    $success = false;
                } elseif (strlen($client->access_token)) {
                    $success = $client->CallAPI(
                            'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
                }
            }
            //print_r($user);die;
            $success = $client->Finalize($success);
        }
        if ($client->exit)
            exit;
        if ($success) {
            // Now check if user exist with same email ID
            $result = $this->pages_model->fetchUserCountData($user->email);

            // $sql = "SELECT COUNT(*) AS count from master_user where u_email = :email_id";
            try {
                $count = $result[0]->count;
                if ($count > 0) {
                    //echo 'User Exist';die;
                    $data = array('g_status' => 1);
                    $this->pages_model->updateDetails('master_user', 'u_email', $user->emailAddress, $data);
                    $user_data["name"] = $user->given_name;
                    $user_data["email"] = $user->email;
                    $user_data["google_id"] = $user->id;
                    $user_data["new_user"] = "no";
                } else {
                    // echo 'hi';die;
                    $data = $user_data["name"] = $user->given_name . ' ' . $user->family_name;
                    $data = $user_data["email"] = $user->email;
                    $data = $user_data["u_avatar"] = $user->picture;
                    //$data = $user_data["userType"] = 3;
                    //$data = $user_data["roleName"] = 1;
                    $data_master = array('u_name' => $user_data["name"], 'u_avatar' => $user_data["u_avatar"], 'u_email' => $user_data["email"]);
                    $data_eco = array('user_login' => $user_data["email"], 'display_name' => $user_data["name"], 'u_avatar' => $user_data["u_avatar"], 'user_email' => $user_data["email"]);
                    // New user, Insert in database
                    $result = $this->db_lib->insert("ecommerce_users", $data_eco);
                    $id = $this->db_lib->insert("master_user", $data_master);
                    $first_user = 1;
                    $arrData = array('uid' => $id, 'LID' => $first_user);
                    $result = $this->pages_model->Add_data('user_details', $arrData);
                    if ($id > 0) {
                        $user_data["name"] = $user->given_name;
                        $user_data["email"] = $user->email;
                        $user_data["new_user"] = "yes";
                        $user_data["e_msg"] = "";
                    }
                }
            } catch (Exception $ex) {
                $user_data["e_msg"] = $ex->getMessage();
            }

            $user_data["user_id"] = $user->id;
        } else {
            $user_data["e_msg"] = $client->error;
        }

//print_r($user_data["email"]);die;
        $this->login_linkedin($user_data["email"], $user_data["google_id"]);
    }

}
