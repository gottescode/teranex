<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
class Customer extends FRONTEND_Controller {

    // constructor

    function __construct() {

        // parent constructor
                $this->load->library("session");

        $this->load->model("customer_model");

        parent::__construct();

        if (!$this->session->userdata('uid') && !$this->session->userdata('user_email')) {

            redirect("pages/login");

            exit;
        }

        $user_id = $this->session->userdata('uid');

        $user_type = $this->session->userdata('user_type');

        $this->load->model('customer_model');
    }





    public function index() {

        // SEO end Here 

        $url = site_url() . "/customer/api/findMultiple/";

        $project_data = apiCall($url, "get");

        $arrayData = [
            "project_data" => $project_data
        ];

        $this->template->load("project", $arrayData);
    }

    public function customerDetail($id) {

        $url = site_url() . "/customer/api/findSingle/$id";

        $project_data = apiCall($url, "get");

        $url = site_url() . "/customer/api/findMultipleImage/$id";

        $project_images = apiCall($url, "get");

        $url = site_url() . "/customer/api/findMultiple/$id";

        $Project_list = apiCall($url, "get", "");





        $arrayData = [
            "project_data" => $project_data,
            "project_images" => $project_images,
            'Project_list' => $Project_list['result'],
        ];

        //print_r($Project_list);exit;

        $this->template->load("projectDetail", $arrayData);
    }

    public function profile() {

        if ($this->session->userdata('uid')) {

            $user_id = $this->session->userdata('uid');
            $url = site_url() . "/customer/api/bankDetails/$user_id";
            $customer_data = apiCall($url, "get");
            $url = site_url() . "/customer/api/findAddressList/$user_id";
            $customerAddressList = apiCall($url, "get");
            $url = site_url() . "/customer/api/findContactList/$user_id";
            $customerContactList = apiCall($url, "get");
            $url = site_url() . "settings/userapi/findMultipleChild/";
            $userTypeList = apiCall($url, "get");
            $array['language'] = $customer_data['result']['language'];
            $url = site_url() . "settings/languageapi/findMultipleLanguage/";
            $languageList = apiCall($url, "post", $array);
            if (isset($user_id)) {

                $session_data = $this->customer_model->selectAllWhr('master_user', 'uid', $user_id);
            }

            $arrayData = array(
                "customer_data" => $customer_data['result'],
                "languageList" => $languageList['result'],
                "customerAddressList" => $customerAddressList['result'],
                "customerContactList" => $customerContactList['result'],
                "userTypeList" => $userTypeList['result'],
                "session_value" => $session_data,
            );

            // print_r($arrayData);die;

            $arrayData['approval_data'] = $this->customer_model->fetchDataidWhr();

            //print_r($arrayData['approval_data']);die;

            $this->template->load("profile", $arrayData);
        } else {

            redirect("pages/login");
        }
    }

    public function companyDetails() {

        if ($this->session->userdata('uid')) {

            $user_id = $this->session->userdata('uid');



            if (isset($_POST['btnCompany'])) {

                $pageData = $this->input->post();

                $pageData['uid'] = $user_id;

                $url = site_url() . "customer/api/updateDetails";

                $response = apiCall($url, "post", $pageData);
               // print_r($response);die;
            }



            $url = site_url() . "/customer/api/bankDetails/$user_id";

            $customer_data = apiCall($url, "get");



            $arrayData = array(
                "customer_data" => $customer_data['result'],
            );

            $this->template->load("company_details", $arrayData);
        } else {

            redirect("pages/login");
        }
    }

    public function changePassword() {
        if ($this->session->userdata('uid')) {
            $user_id = $this->session->userdata('uid');
            if (isset($_POST['btnChangepassword'])) {
                $pageData = $this->input->post();
                $pageData['uid'] = $user_id;
                //print_r($pageData);exit;
                $url = site_url() . "customer/api/updatePassword";
                $response = apiCall($url, "post", $pageData);
                //   print_r($response);die;
                if ($response['result']) {

                    $transaction_type=3;
                    //echo $data;die;
                    $this->user_log($transaction_type);

                    setFlash("dataMsgSuccess", $response['message']);
                    redirect("customer/changePassword");
                } else {
                    setFlash("dataMsgError", $response['message']);
                    redirect("customer/changePassword");
                }
            }
            $arrayData = array(
                "user_data" => $response['result'],
            );
            $this->template->load("change_password", $arrayData);
        } else {
            redirect("pages/login");
        }
    }

    public function document() {

        if ($this->session->userdata('uid')) {

            $user_id = $this->session->userdata('uid');

            if (isset($_POST['btnDocument'])) {

                $pageData = $this->input->post();

                $pageData['uid'] = $user_id;

                $url = site_url() . "customer/api/updateDetails";

                $response = apiCall($url, "post", $pageData);
            }



            $url = site_url() . "/customer/api/bankDetails/$user_id";

            $customer_data = apiCall($url, "get");



            $arrayData = array(
                "customer_data" => $customer_data['result'],
            );

            $this->template->load("upload_docs", $arrayData);
        } else {

            redirect("pages/login");
        }
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

    // other Document Upload

    public function otherDocument() {

        $userId = $this->session->userdata('uid');

        if (isset($_POST['submit'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $userId;



            $url = site_url() . "/customer/api/otherDocument";

            $response = apiCall($url, "post", $pageData);
        }



        $url = site_url() . "/customer/api/otherDocumentList/$userId";

        $documentList = apiCall($url, "get");



        $arrayData = array("documentList" => $documentList['result'],);

        $this->template->load("upload_other_files", $arrayData);
    }

    // other Document Delete

    public function otherDocumentDelete($id) {

        $url = site_url() . "/customer/api/otherDocumentDelete/$id";

        $response = apiCall($url, "get");

        setFlash("dataMsgSuccess", $response['message']);

        redirect(site_url() . "customer/otherDocument");
    }

    // Mulitple Address Upload

    public function address() {

        $userId = $this->session->userdata('uid');

        if (isset($_POST['submit'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $userId;



            $url = site_url() . "/customer/api/addAddress";

            $response = apiCall($url, "post", $pageData);
        }

        $this->load->model("location/country_model");

        $url = site_url() . "/customer/api/findAddressList/$userId";

        $customerAddressList = apiCall($url, "get");



        $arrayData = array("countryList" => $this->country_model->getCountryListForSite(),
            "customerAddressList" => $customerAddressList['result'],
        );

        $this->template->load("address", $arrayData);
    }

    //   Address update

    public function addressUpdate($id) {

        $this->load->model("location/country_model");
        $this->load->model("location/state_model");
        $this->load->model("location/city_model");
        $userId = $this->session->userdata('uid');

        if (isset($_POST['updateSubmit'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $userId;

            $url = site_url() . "/customer/api/updateAddress";

            $response = apiCall($url, "post", $pageData);

            if ($response) {

                setFlash("dataMsgSuccess", $response['message']);

                redirect(site_url() . "customer/address");
            }
        }

        $this->load->model("location/country_model");

        $url = site_url() . "/customer/api/findAddress/$id";

        $response = apiCall($url, "get");



        $country_id = $response['result']['country'];

        $state_id = $response['result']['state'];

        $arrayData = array("countryList" => $this->country_model->getCountryListForSite(),
            "addressEdit" => $response['result'], "country_id" => $country_id, "state_id" => $state_id,
            "stateList" => $this->state_model->getStateList($country_id),
            "cityList" => $this->city_model->getCityList($state_id),
        );

        $this->template->load("addressUpdate", $arrayData);
    }

    // Address Delete

    public function addressDelete($id) {

        $url = site_url() . "/customer/api/addressDelete/$id";

        $response = apiCall($url, "get");

        setFlash("dataMsgSuccess", $response['message']);

        redirect(site_url() . "customer/address");
    }

    public function bankDetails() {



        $user_id = $this->session->userdata('uid');



        if (isset($_POST['btnBankDetails'])) {

            $pageData = $this->input->post();

            $pageData['uid'] = $user_id;



            $url = site_url() . "customer/api/updateDetails";

            $response = apiCall($url, "post", $pageData);
        }

        $url = site_url() . "/customer/api/bankDetails/$user_id";

        $customer_data = apiCall($url, "get");



        $this->load->model("location/country_model");

        $this->load->model("location/state_model");

        $this->load->model("location/city_model");

        $country_id = $customer_data['result']['user_branch_country'];

        $state_id = $customer_data['result']['user_branch_state'];



        $arrayData = array("customer_data" => $customer_data['result'],
            "countryList" => $this->country_model->getCountryListForSite(),
            "stateList" => $this->state_model->getStateList($country_id),
            "cityList" => $this->city_model->getCityList($state_id),
            "country_id" => $country_id,
        );

        $this->template->load("bank_details", $arrayData);
    }

    // Mulitple contact Upload

    public function contact() {

        $userId = $this->session->userdata('uid');

        if (isset($_POST['submit'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $userId;



            $url = site_url() . "/customer/api/addContact";

            $response = apiCall($url, "post", $pageData);
        }



        $url = site_url() . "/customer/api/findContactList/$userId";

        $customerContactList = apiCall($url, "get");



        $arrayData = array(
            "customerContactList" => $customerContactList['result'],
        );

        $this->template->load("contact", $arrayData);
    }

    //   contact update

    public function contactUpdate($id) {



        $userId = $this->session->userdata('uid');

        if (isset($_POST['updateSubmit'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $userId;

            $url = site_url() . "/customer/api/updateContact";

            $response = apiCall($url, "post", $pageData);

            if ($response) {

                setFlash("dataMsgSuccess", $response['message']);

                redirect(site_url() . "customer/contact");
            }
        }

        $this->load->model("location/country_model");

        $url = site_url() . "/customer/api/findContact/$id";

        $response = apiCall($url, "get");



        $arrayData = array(
            "conatactEdit" => $response['result'],
        );

        $this->template->load("contactUpdate", $arrayData);
    }

    // contact Delete

    public function contactDelete($id) {

        $url = site_url() . "/customer/api/contactDelete/$id";

        $response = apiCall($url, "get");

        setFlash("dataMsgSuccess", $response['message']);

        redirect(site_url() . "customer/contact");
    }

    /**

     * attendee user List

     * 

     * @access public

     * @param  

     * @return array of objects

     */
    public function attendeeList() {

        $userId = $this->session->userdata('uid');

        $user_type = $this->session->userdata('user_type');

        if ($user_type == 'C') {

            $url = site_url() . "/customer/api/attendeeList/$userId";

            $response = apiCall($url, "get");

            $arrayData = array(
                "attendeeList" => $response['result'],
            );

            $this->template->load("attendeeList", $arrayData);
        }
    }

    /**

     * attendee Add 

     * @access public

     * @param  

     * @return array of objects

     */
    public function attendeeAdd() {

        $userId = $this->session->userdata('uid');

        $user_type = $this->session->userdata('user_type');

        if ($user_type == 'C') {



            if (isset($_POST['addSubmit'])) {

                $pageData = $this->input->post();

                $pageData['u_parent_id'] = $userId;

                $password = str_makerand(6, 1, 1, 0);

                $pageData['u_password'] = md5($password);

                $pageData['u_email_verified'] = 'Y';



                $url = site_url() . "/customer/api/attendeeAdd";

                $response = apiCall($url, "post", $pageData);

                //print_r($response);exit;



                if ((int) $response['result']) {

                    $to = $pageData['u_email'];

                    $body = '<p>Hi ' . $pageData['u_name'] . ',</p> ';

                    $body .= '<p> Your Account Has Been Created Successfully.</p>';

                    $body .= '<p> The Credentials For Account : </p>';

                    $body .= '<p> USERNAME : ' . $pageData['u_email'] . ' </p>';

                    $body .= '<p> PASSWORD : ' . $password . ' </p>';

                    $body .= '<p> Thank You,</p> <br/>';

                    $body .= '<p> Teranex</p> <br/>';

                    $email_content = $body;

                    $this->load->library('Email_PHPMailer');

                    $subject = 'Login Details Teranex ';

                    $mailresponse = email_Send($subject, $to, $email_content, $name);



                    setFlash("dataMsgAttSuccess", $response['message']);

                    redirect(site_url() . "customer/attendeeList");
                } else {

                    setFlash("dataMsgAddError", $response['message']);
                }
            }



            $this->template->load("attendeeAdd", $arrayData);
        }
    }

    /**

     * attendee Delete 

     * @access public

     * @param  $id

     * @return array of objects

     */
    public function attendeeDelete($id) {

        $url = site_url() . "/customer/api/attendeeDelete/$id";

        $response = apiCall($url, "get");

        setFlash("dataMsgAttSuccess", $response['message']);

        redirect(site_url() . "customer/attendeeList");
    }

    /**

     * Trainee / Consultant user List

     * 

     * @access public

     * @param  

     * @return array of objects

     */
    public function traineeList() {

        $userId = $this->session->userdata('uid');

        $user_type = $this->session->userdata('user_type');

        if ($user_type == 2) {

            $url = site_url() . "/customer/api/traineeList/$userId";

            $response = apiCall($url, "get");
            //print_r($response);exit;

            $arrayData = array(
                "traineeList" => $response['result'],
            );
            //print_r($arrayData);
            $this->template->load("traineeList", $arrayData);
        }
    }

    /**

     * Trainee / Consultant Add 

     * @access public

     * @param  

     * @return array of objects

     */
    public function traineeAdd() {

        $userId = $this->session->userdata('uid');

        $user_type = $this->session->userdata('user_type');

        if ($user_type == 2) {

           
            if (isset($_POST['addSubmit'])) {

                $pageData = $this->input->post();
                $pageData['user_role']=5;
      
                $pageData['u_parent_id'] = $userId;

                $password = str_makerand(6, 1, 1, 0);

                $pageData['u_password'] = md5($password);

               //print_r($pageData);die;

                $url = site_url() . "/customer/api/traineeAdd";

//print_r($pageData);die;
                $response = apiCall($url, "post", $pageData);

                if ((int) $response['result']) {

                    $to = $pageData['u_email'];

                    $body = '<p>Hi ' . $pageData['u_name'] . ',</p> ';

                    $body .= '<p> Your Account Has Been Created Successfully.</p>';

                    $body .= '<p> The Credentials For Account : </p>';

                    $body .= '<p> USERNAME : ' . $pageData['u_email'] . ' </p>';

                    $body .= '<p> PASSWORD : ' . $password . ' </p>';

                    $body .= '<p> Thank You,</p> <br/>';

                    $body .= '<p> Teranex</p> <br/>';

                    $email_content = $body;

                    $this->load->library('Email_PHPMailer');

                    $subject = 'Login Details Teranex ';

                    $mailresponse = email_Send($subject, $to, $email_content, $name);



                    setFlash("dataMsgAttSuccess", $response['message']);

                    redirect(site_url() . "customer/traineeList");
                } else {

                    setFlash("dataMsgAddError", $response['message']);

                    redirect(site_url() . "customer/traineeAdd");
                }
            }



            $this->template->load("traineeAdd", $arrayData);
        }
    }

    /**

     * Trainee / Consultant Delete 

     * @access public

     * @param  $id

     * @return array of objects

     */
    public function traineeDelete($id) {

        //$userId =  $this->session->userdata('uid');
        //print_r($userId );exit;
        $url = site_url() . "/customer/api/traineeDelete/$id";

        $response = apiCall($url, "get");
        //print_r($response);exit;
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/traineeList/");
    }

    /**

     * course Enrollment   

     * @access public

     * @param   

     * @return array of objects

     */
    public function courseEnrollment() {
        $userId = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/courseEnrollment/$userId";
        $response = apiCall($url, "get");
        //  print_r($response);exit;
        $arrayData = array(
            "courseList" => $response['result'],
        );
        $this->template->load("courseEnrollment", $arrayData);
    }

    /**
     * course Comment   

     * @access public

     * @param   

     * @return array of objects

     */
    public function course_comment($cid) {
        $userId = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['user_id'] = $userId;
            $pageData['commented_date'] = date("Y-m-d H:i:s");
            $url = site_url() . "/customer/api/courseComment";
            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgCommentSuccess", $response['message']);
            } else {

                setFlash("dataMsgCommentError", $response['message']);
            }
        }

        $courseSingle = site_url() . "customer/api/singleCourseComment/$cid";

        $course_data = apiCall($courseSingle, "get");

        $arrayData = array(
            "course_data" => $course_data['result'],
        );

        $this->template->load("course_comment", $arrayData);
    }

    /**

     * assign Course from admin List

     * @access public

     * @param   

     * @return array of objects

     */
    public function assignCourseList() {
        $userId = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/assignCourseList/$userId";
        $response = apiCall($url, "get");
        $arrayData = array(
            "courseList" => $response['result'],
        );
        $this->template->load("assignCourseList", $arrayData);
    }

    /**

     * assign Schedule Class List

     * @access public

     * @param   

     * @return array of objects

     */
    public function scheduleCourse($cid) {


        $userId = $this->session->userdata('uid');

        //$user_email =  $this->session->userdata('user_email');

        $u_name = $this->session->userdata('u_name');





        if ($_POST['btnSubmit']) {

            $pageData = $this->input->post();
            //print_r($pageData);exit;
            $pageData['trainee_user_id'] = $userId;

            $date1 = date_ymd($pageData['courseStartDate']) . " " . $pageData['course_start_time'];

            $date2 = date_ymd($pageData['courseStartDate']) . " " . $pageData['course_end_time'];

            $minutes = intval((strtotime($date2) - strtotime($date1)) / 60);

            if ($minutes > 0) {

                $url = site_url() . "customer/api/createCourseSchedule";

                $response = apiCall($url, "post", $pageData);
//print_r($response);exit;
                if ($response['result']) {
                    setFlash("dataMsgSuccess", $response['message']);
                    $wiziqData['presenter_id'] = $userId;
                    //$wiziqData['presenter_email']="support@teranex.co";
                    $wiziqData['presenter_name'] = $u_name;
                    $wiziqData['start_time'] = date_ymd($pageData['courseStartDate']) . " " . $pageData['course_start_time'];
                    $wiziqData['title'] = $pageData['course_name'];
                    $wiziqData['course_schecdule_id'] = $response['result'];
                    $wiziqData['course_id'] = $pageData['course_id'];
                    $wiziqData['return_url'] = site_url();
                    $wiziqData['duration'] = "90";
                    require_once APPPATH . "modules/customer/controllers/Wiziq.php";

                    $objWiziq = new wiziq;

                    $objWiziq->scheduleClass($wiziqData);
                }
            }
        }



        $url = site_url() . "/customer/api/scheduleCourse/$userId/$cid";

        $response = apiCall($url, "get");

        $courseSingle = site_url() . "eacademy/api/findSingleCourse/$cid";

        $course_data = apiCall($courseSingle, "get");

        $arrayData = array(
            "courseScheduleList" => $response['result'],
            "course_data" => $course_data['result'],
        );



        $this->template->load("scheduleCourse", $arrayData);
    }

    /**

     * Cancel Class

     * @access public

     * @param   

     * @return array of objects

     */
    public function cancel_class($wiziq_class_id, $class_id, $course_id) {



        require_once APPPATH . "modules\customer\controllers\Wiziq.php";

        $objWiziq = new wiziq;

        $objWiziq->cancelClass($wiziq_class_id, $class_id, $course_id);
    }

    /**

     * assign Schedule Class List BY Trainee

     * @access public

     * @param   

     * @return array of objects

     */
    public function scheduleAttendeeCourse($courserId, $course_schecdule_list_id) {



        $userId = $this->session->userdata('uid');

        //$user_email =  $this->session->userdata('user_email');

        $u_name = $this->session->userdata('u_name');





        if ($_POST['btnSubmit']) {

            $pageData = $this->input->post();

            /* $pageData['trainee_user_id']=$userId ; 

              $pageData['courserId']=$courserId ;

              $pageData['course_schecdule_list_id']=$id ;



              $url = site_url()."customer/api/getCourseScheduleAttendeeListXML";

              $response =  apiCall($url, "post",$pageData);

             */

            $assignUser = $pageData["course_enrollment_assign_user"];



            if (count($assignUser) > 0) {

                $XMLAttendee = "<attendee_list>";

                foreach ($assignUser as $id) {

                    $singleUser = $this->db_lib->fetchSingle('course_enrollment_assign_user CEAU JOIN master_user MU  ON  CEAU.attendee_user_id= MU.uid', "CEAU.ceau_id= $id  ", "MU.uid,MU.u_name");



                    $XMLAttendee .= "<attendee>

              <attendee_id>" . $singleUser['uid'] . "</attendee_id>

              <screen_name>" . $singleUser['u_name'] . "</screen_name>

                          <language_culture_name><![CDATA[es-ES]]></language_culture_name>

            </attendee>  ";
                }

                $XMLAttendee .= " </attendee_list>";
            }



            $assignUser = $pageData["course_enrollment_assign_user"];

            if ($XMLAttendee) {

                $wiziqData['wiziq_class_id'] = $pageData['wiziq_class_id'];

                $wiziqData['XMLAttendee'] = $XMLAttendee;

                $wiziqData['assignUser'] = $assignUser;

                $wiziqData['course_id'] = $pageData['course_id'];

                $wiziqData['course_schecdule_list_id'] = $course_schecdule_list_id;



                require_once APPPATH . "modules/customer/controllers/Wiziq.php";

                $objWiziq = new wiziq;

                $objWiziq->addAttendee($wiziqData);  /* */



                exit;
            }
        }

        $url = site_url() . "/customer/api/scheduleAttendeeCourse/$courserId/$course_schecdule_list_id";

        $attendeeList = apiCall($url, "get");

        $courseSingle = site_url() . "customer/api/findSingleCourseSchecduleList/$course_schecdule_list_id";

        $course_data = apiCall($courseSingle, "get");



        $arrayData = array(
            "attendeeList" => $attendeeList['result'],
            "courseData" => $course_data['result'],
        );



        $this->template->load("scheduleAttendeeCourse", $arrayData);
    }

    /**

     * Assign course to user 

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function assign_attendee($enrollId) {

        $userId = $this->session->userdata('uid');



        if ($_POST['btnSubmit']) {

            $pageData = $this->input->post();

            $pageData['assign_by_user'] = $userId;

            $url = site_url() . "customer/api/assign_attendee";

            $response = apiCall($url, "post", $pageData);

            //  print_r($response);exit;

            if ($response['result']) {

                setFlash("dataMsgAttSuccess", $response['message']);
            }
        }



        $enrollUrl = site_url() . "customer/api/courseEnrollmentSingle/$enrollId";

        $enrollData = apiCall($enrollUrl, "get");

        $url = site_url() . "/customer/api/attendeeList/$userId";

        $attendeeList = apiCall($url, "get");



        $assingUrl = site_url() . "customer/api/courseEnrollmentAssignList/$enrollId";

        $courseEnrollmentAssignList = apiCall($assingUrl, "get");



        $arrayData = array(
            "attendeeList" => $attendeeList['result'],
            "courseData" => $enrollData['result'],
            "courseEnrollmentAssignList" => $courseEnrollmentAssignList['result'],
        );

        $this->template->load("assign_attendee", $arrayData);
    }

    /**

     * assign Course from customer for attendee List

     * @access public

     * @param   

     * @return array of objects

     */
    public function attendeeAssignCourseList() {





        $userType = $this->session->userdata('user_type');

        if ($userType == 'A') {

            $userId = $this->session->userdata('uid');

            $url = site_url() . "customer/api/attendeeAssignCourseList/$userId";

            $response = apiCall($url, "get");



            $arrayData = array(
                "courseList" => $response['result'],
            );

            $this->template->load("attendeeAssignCourseList", $arrayData);
        }
    }

    /**

     * events List as per buying

     * @access public

     * @param   

     * @return array of objects

     */


    /**

     * event Assign Attendee List

     * @access public

     * @param   

     * @return array of objects

     */
    

    /**

     * remote Application Service

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationService() {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteApplicationService/$userId";

        $requestList = apiCall($url, "get");



        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("remoteApplicationService", $arrayData);
    }

    /**

     * remote Application Service cunsultant request List

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationServiceConsultant($requestId, $remote_application_id = 0) {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdate/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");

            redirect(site_url() . "customer/remoteApplicationServiceConsultant/" . $requestId);
        }

        $url = site_url() . "/customer/api/remoteApplicationServiceConsultant/$requestId";

        $requestConsultantList = apiCall($url, "get");





        $arrayData = array(
            "requestConsultantList" => $requestConsultantList['result'],
        );

        $this->template->load("remoteApplicationServiceConsultant", $arrayData);
    }

    /**

     * remote Application Service cunsultant user request List

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationConsultant($remote_application_id = 0) {

        $remote_application_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteApplicationServicesBySupport/$userId";

        $consultReqList = apiCall($url, "get");





        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");



            if ($requestConsultantList['result']) {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("remoteApplicationConsultant", $arrayData);
    }

    /**

     * remote Application Service Invoice generation

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function remoteApplicationServiceInvoice($raar_id) {

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['raar_id'] = $raar_id;

            $url = site_url() . "customer/api/createRemoteServiceInvoice";

            $response = apiCall($url, "POST", $pageData);

            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            }
        }

        $url = site_url() . "customer/api/fetchRemoteServiceInvoice/$raar_id";

        $invoiceList = apiCall($url, "get");

        $arrayData = [
            "raar_id" => $raar_id,
            "invoiceList" => $invoiceList['result'],
        ];

        $this->template->load("remoteApplicationServiceInvoice", $arrayData);
    }

    public function remoteApplicationConsultantReject($remote_application_id = 0) {

        $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdateByConsultantReject/$remote_application_id";

        $requestConsultantList = apiCall($url, "get");



        if ($requestConsultantList['result']) {

            setFlash("dataMsgAddError", $requestConsultantList['message']);

            redirect(site_url() . "customer/remoteApplicationConsultant/");
        } else {

            setFlash("dataMsgAddError", $requestConsultantList['message']);

            redirect(site_url() . "customer/remoteApplicationConsultant/");
        }
    }

    public function scheduleCourseConsultant($rar_id = 0) {

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();



            $pageDataBrain['entry_date'] = date('Y-m-d');

            $pageDataBrain['customer_user_id'] = $pageData['customer_user_id'];

            $pageDataBrain['startDate'] = date_ymd($pageData['courseStartDate']);

            $pageDataBrain['rar_id'] = $pageData['rar_id'];

            $pageDataBrain['class_title'] = $pageData['class_title'];

            $pageDataBrain['start_time'] = date("H:i", strtotime($pageData['course_start_time']));

            $pageDataBrain['end_time'] = date("H:i", strtotime($pageData['course_end_time']));


            //  require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageDataBrain['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageDataBrain['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/requestServiceBraincert";

            $response1 = apiCall($url, "post", $pageDataBrain);

            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);

                redirect(site_url() . "customer/scheduleCourseConsultant/$rar_id");
            } else {

                setFlash("dataMsgMachError", $response['message']);

                redirect(site_url() . "customer/scheduleCourseConsultant/$rar_id");
            }
        }



        $url = site_url() . "/customer/api/remoteApplicationServicesById/$rar_id";

        $reqData = apiCall($url, "get");



        $url = site_url() . "/customer/api/remoteApplicationServicesBrainCertList/$rar_id";

        $brainCertData = apiCall($url, "get");



        $arrayData = [
            "reqData" => $reqData['result'],
            "brainCertList" => $brainCertData,
            "rar_id" => $rar_id,
        ];

        $this->template->load("scheduleCourseConsultant", $arrayData);
    }

    /**

     * Profile Edit

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function editprofile() {

        $user_id = $this->session->userdata('uid');

        if (isset($_POST['btnUpdate'])) {

            $pageData = $this->input->post();

            $pageData['uid'] = $user_id;

            //$pageData['u_date_birth'] =  ($pageData['birthdate']); 

            $url = site_url() . "customer/api/updateDetails";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgProfileSuccess", $response['message']);
            } else {

                setFlash("dataMsgProfileError", $response['message']);
            }
        }

        $url = site_url() . "/customer/api/bankDetails/$user_id";

        $customer_data = apiCall($url, "get");

        $arrayData = array("customer_data" => $customer_data['result']);

        $this->template->load("editprofile", $arrayData);
    }

    public function remoteMachineServiceRequest() {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "consultant/api/remoteServiceRequestList/$uid";

        $requestListRemoteService = apiCall($url, "get");



        $arrayData = [
            "requestListRemoteService" => $requestListRemoteService['result']
        ];

        $this->template->load("remote_machine_req", $arrayData);
    }

    public function rejectRequestRemoteService($id = 0) {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "consultant/api/rejectRequestRemoteService/{$id}";

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgSuccess", $response['message']);

            redirect(site_url() . "customer/remoteMachineServiceRequest/$uid");
        } else {

            setFlash("dataMsgError", $response['message']);

            redirect(site_url() . "customer/remoteMachineServiceRequest/$uid");
        }
    }

    public function acceptRequestRemoteService($id = 0) {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "consultant/api/acceptRequestRemoteService/{$id}";

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgSuccess", $response['message']);

            redirect(site_url() . "customer/remoteMachineServiceRequest/$uid");
        } else {

            setFlash("dataMsgError", $response['message']);

            redirect(site_url() . "customer/remoteMachineServiceRequest/$uid");
        }
    }

    public function remoteApplicationMachineService() {

        $customer_user_id = $this->session->userdata('uid');

        $url = site_url() . "customer/api/remoteServiceCustomerRequestList/$customer_user_id";

        $requestedListRemoteService = apiCall($url, "get");



        $arrayData = [
            "requestListRemoteService" => $requestedListRemoteService['result']
        ];

        $this->template->load("remote_machine_req_customer", $arrayData);
    }

    /**

     * work Experince CRUD operation by User

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function workExperince() {

        $userId = $this->session->userdata('uid');

        if (isset($_POST['btnExperince'])) {

            $pageDataq = $this->input->post();

            $pageData['user_id'] = $userId;

            $pageData['title'] = $pageDataq['title'];

            $pageData['exp_details'] = $pageDataq['exp_details'];

            $pageData['start_date'] = $pageDataq['sartDatepicker'];

            $pageData['end_date'] = $pageDataq['endDatepicker'];

            $pageData['current_company'] = $pageDataq['current_company'];



            $url = site_url() . "/customer/api/addExperince";

            $response = apiCall($url, "post", $pageData);
        }



        $url = site_url() . "customer/api/findWorkExperinceList/$userId";

        $workList = apiCall($url, "get");

        $arrayData = array(
            "workList" => $workList['result'],
        );

        $this->template->load("workExperince", $arrayData);
    }

    /**

     * work Experince delete

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function workExperinceDelete($id) {

        $url = site_url() . "customer/api/workExperinceDelete/$id";

        $workList = apiCall($url, "get");

        redirect(site_url() . "customer/workExperince");
    }

    /**

     * training Specialties

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function trainingSpecialties() {

        $userId = $this->session->userdata('uid');

        if (isset($_POST['btnSpecialties'])) {

            $pageDataq = $this->input->post();

            $pageData['user_id'] = $userId;

            $pageData['title'] = $pageDataq['title'];



            $url = site_url() . "/customer/api/trainingSpecialties";

            $response = apiCall($url, "post", $pageData);
        }



        $url = site_url() . "customer/api/trainingSpecialtiesList/$userId";

        $rainingList = apiCall($url, "get");

        $arrayData = array(
            "rainingList" => $rainingList['result'],
        );

        $this->template->load("trainingSpecialties", $arrayData);
    }

    /**

     * training Specialties

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function trainingSpecialtiesDelete($id) {

        $url = site_url() . "customer/api/trainingSpecialtiesDelete/$id";

        $workList = apiCall($url, "get");

        redirect(site_url() . "customer/trainingSpecialties");
    }

    /**

     * training Specialties

     * @access public

      jaywant narwade 11/4/2018

     * @param   

     * @return array of objects

     */
    public function invoiceList() {

        $userId = $this->session->userdata('uid');

        $url = site_url() . "customer/api/eventInvoceList/$userId";

        $eventInvoceList = apiCall($url, "get");

        $InvoceListUrl = site_url() . "/customer/api/courseEnrollmentInvoceList/$userId";

        $courseInvoceList = apiCall($InvoceListUrl, "get");

        $arrayData = array(
            "eventInvoceList" => $eventInvoceList['result'],
            "courseInvoceList" => $courseInvoceList['result'],
        );

        $this->template->load("invoiceList", $arrayData);
    }

    public function profile_detail() {

        if ($this->session->userdata('uid')) {

            $user_id = $this->session->userdata('uid');
            $userId = $this->session->userdata('uid');
            
            $url = site_url() . "/customer/api/bankDetails/$user_id";
            $customer_data = apiCall($url, "get");
            $url = site_url() . "/customer/api/findAddressList/$user_id";
            $customerAddressList = apiCall($url, "get");
            $url = site_url() . "/customer/api/findContactList/$user_id";
            $customerContactList = apiCall($url, "get");
            $url = site_url() . "settings/userapi/findMultipleChild/";
            $userTypeList = apiCall($url, "get");
            $array['language'] = $customer_data['result']['language'];
            $url = site_url() . "settings/languageapi/findMultipleLanguage/";
            $languageList = apiCall($url, "post", $array);

            /*             * * Update Company Details *** */

            if (isset($_POST['btnCompany'])) {
                $pageData = $this->input->post();
                $pageData['uid'] = $user_id;
                //print_r($pageData);exit;      
                $url = site_url() . "customer/api/updateDetails";
                $response = apiCall($url, "post", $pageData);
               // print_r($response);exit;
                if ($response['result']) {
                    setFlash("dataMsgProfileSuccess", "Profile updated successfully");
                    redirect(site_url() . "customer/profile_detail");
                } else {
                    setFlash("dataMsgProfileError", $response['message']);
                    redirect(site_url() . "customer/profile_detail");
                }
            }

            /*             * *** Update Address Details *** */

            if (isset($_POST['submit'])) {
                $pageData = $this->input->post();
                $pageData['user_id'] = $user_id;
                $url = site_url() . "/customer/api/addAddress";
                $response = apiCall($url, "post", $pageData);
                if ($response['result']) {
                    setFlash("dataMsgProfileSuccess", "Address updated successfully");
                    redirect(site_url() . "customer/profile_detail");
                } else {
                    setFlash("dataMsgProfileError", $response['message']);
                    redirect(site_url() . "customer/profile_detail");
                }
            }

            /*             * *   Update Company Documents *** */

            if (isset($_POST['btnDocument'])) {
                $pageData = $this->input->post();
                $pageData['uid'] = $user_id;
                $url = site_url() . "customer/api/updateDetails";
                $response = apiCall($url, "post", $pageData);
                if ($response['result']) {
                    setFlash("dataMsgProfileSuccess", "Company documents updated successfully");
                    redirect(site_url() . "customer/profile_detail");
                } else {
                    setFlash("dataMsgProfileError", $response['message']);
                    redirect(site_url() . "customer/profile_detail");
                }
            }

            /*             * *   Update Other Documents *** */

            if (isset($_POST['submitOtherdocument'])) {
                $pageData = $this->input->post();
                $pageData['user_id'] = $user_id;
                $url = site_url() . "/customer/api/otherDocument";
                $response = apiCall($url, "post", $pageData);
                if ($response['result']) {
                    setFlash("dataMsgProfileSuccess", "Documents updated successfully");
                    redirect(site_url() . "customer/profile_detail");
                } else {
                    setFlash("dataMsgProfileError", $response['message']);
                    redirect(site_url() . "customer/profile_detail");
                }
            }
            $url = site_url() . "/customer/api/otherDocumentList/$userId";
            $documentList = apiCall($url, "get");

            /*             * *   Update Bank Details *** */

            if (isset($_POST['btnBankDetails'])) {
                $pageData = $this->input->post();
                $pageData['uid'] = $user_id;
                $url = site_url() . "customer/api/updateDetails";
                $response = apiCall($url, "post", $pageData);
                if ($response['result']) {
                    setFlash("dataMsgProfileSuccess", "Bank Details updated successfully");
                    redirect(site_url() . "customer/profile_detail");
                } else {
                    setFlash("dataMsgProfileError", $response['message']);
                    redirect(site_url() . "customer/profile_detail");
                }
            }

            /*             * * Country,State and City Dropdowns *** */

            $this->load->model("location/country_model");
            $this->load->model("location/state_model");
            $this->load->model("location/city_model");
            $country_id = $customer_data['result']['user_branch_country'];
            $state_id = $customer_data['result']['user_branch_state'];

            $arrayData = array(
                "customer_data" => $customer_data['result'],
                "languageList" => $languageList['result'],
                "customerAddressList" => $customerAddressList['result'],
                "customerContactList" => $customerContactList['result'],
                "userTypeList" => $userTypeList['result'],
                "countryList" => $this->country_model->getCountryListForSite(),
                "stateList" => $this->state_model->getStateList($country_id),
                "cityList" => $this->city_model->getCityList($state_id),
                "country_id" => $country_id,
                "documentList" => $documentList['result'],
            );
            //print_r($arrayData);exit;
            $arrayData['approval_data'] = $this->customer_model->fetchDataidWhr();
            // print_r($arrayData['approval_data']);die;
            $this->template->load("profile_detail", $arrayData);
        } else {
            redirect("pages/login");
        }
        //  $this->template->load("profile_detail",$arrayData);  
    }

    /**

     * Customer Course List 

     * @access public

      Atul Mangave 12/4/2018

     * @param   

     * @return array of objects

     */
    public function scheduledCoursesCustomer($rar_id = 0) {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "/customer/api/remoteApplicationServicesBrainCertListbyCust/$rar_id/$uid";

        $brainCertData = apiCall($url, "get");



        $arrayData = [
            "brainCertList" => $brainCertData['result'],
            "rar_id" => $rar_id,
        ];

        $this->template->load("scheduleCourseCustomer", $arrayData);
    }

    /**

     * Customer Course List 

     * @access public

      Atul Mangave 12/4/2018

     * @param   

     * @return array of objects

     */
    /* Remote Machine Invoice  Details */

    public function remoteMachineInvoiceRequestfinal($id = 0) {



        $url = site_url() . "consultant/api/findSingleInvoiceDetailsRemoteMachineFinal/{$id}";

        $invoiceList = apiCall($url, "get");

        $arrayData = [
            "result" => $invoiceList['result']
        ];



        $this->template->load("invoice_details_final", $arrayData);
    }

    /**

     * remote Machine Application Service Invoice generation

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function remoteMachineServiceInvoice($rmr_id) {

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['rmr_id'] = $rmr_id;

            $url = site_url() . "customer/api/createMachineServiceInvoice";

            $response = apiCall($url, "POST", $pageData);

            $updateData['rmr_id'] = $rmr_id;

            $updateData['invoiceByConsultant'] = 'Y';

            if ($response['result']) {

                $url = site_url() . "customer/api/updateRemoteMachineRequestInvoice";

                $update_response = apiCall($url, "POST", $updateData);



                redirect(site_url() . "customer/remoteMachineServiceInvoice/$rmr_id");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/remoteMachineServiceInvoice/$rmr_id");
            }
        }

        $url = site_url() . "customer/api/fetchMachineServiceInvoice/$rmr_id";

        $invoiceList = apiCall($url, "get");

        $arrayData = [
            "rmr_id" => $rmr_id,
            "invoiceList" => $invoiceList['result'],
        ];

        $this->template->load("remoteMachineServiceInvoice", $arrayData);
    }

    /**

     * remote Machine Class Schedule

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function remoteMachineClassSchedule($rmr_id = 0) {

        $uid = $this->session->userdata('uid');

        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['rmr_id'] = $rmr_id;
            $pageData['created_by_user'] = $uid;

            //  require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageData['tokbox_token'] = $responseData['tokbox_token'];
            //print_r($pageData);exit;
            $url = site_url() . "customer/api/remoteMachineClassScheduleInsert";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {

                setFlash("dataMsgWizSuccess", $response['message']);
            } else {

                setFlash("dataMsgWizError", $response['message']);
            }

            redirect(site_url() . "customer/remoteMachineClassSchedule/$rmr_id");

            exit;
        }

        $url = site_url() . "customer/api/remoteMachineClassScheduleList/$rmr_id/$uid";

        $reqData = apiCall($url, "get");



        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteMachineClassSchedule", $arrayData);
    }

    /**

     * remote Machine Class Schedule

     * Atul Mangave

      13/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function remoteMachineClassScheduleCustomer($rmr_id = 0) {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "customer/api/remoteMachineClassScheduleListCustomer/$rmr_id/$uid";

        $reqData = apiCall($url, "get");

        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteMachineClassScheduleCustomer", $arrayData);
    }

    /**

     * remote Machine Class Schedule

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function tokboxLunch($rmstId) {

        $uid = $this->session->userdata('uid');

        if ((int) ($rmstId)) {

            $url = site_url() . "customer/api/remoteMachineClassScheduleFetchSingle/$rmstId";

            $response = apiCall($url, "get");



            if ($response['result']) {



                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['rmstId'] = $rmstId;

                    $url = site_url() . "customer/api/remoteMachineClassScheduleUpdate/";

                    $response = apiCall($url, "post", $stringData);

                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunch/$rmstId");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /**

     * remote Application Programm users request List

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationProgrammer($rpr_id = 0) {

        $rpr_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/remoteprogramming/api/remoteApplicationProgrammBySupport/$userId";

        $programmReqList = apiCall($url, "get");



        $arrayData = array(
            "programmReqList" => $programmReqList['result'],
        );
        
       //  print_r($arrayData);die;

        $this->template->load("remoteApplicationProgrammer", $arrayData);
    }

    public function customerRequestsProgrammer($rarp_id, $rpr_id) {

        $url = site_url() . "remoteprogramming/api/findSingleDetailsCustomerPrgrammingReq/" . $rpr_id;

        $result = apiCall($url, "get");
        
        $url = site_url() . "remoteprogramming/api/findSingleDetailsCustomerPrgrammingReq_rarp_id/" . $rarp_id;

        $adtlistresult = apiCall($url, "get");

        $data['material_type'] = $result['result']['material_type'];

        $data['application_required'] = $result['result']['application_required'];

        //Material List by Post

        $url = site_url() . "settings/materialtypeapi/findmultipletypes";

        $materialList = apiCall($url, "post", $data);



        //Application List By Post Method

        $url = site_url() . "settings/applicationrequiredapi/findmultipleApplication";

        $applicationList = apiCall($url, "post", $data);

        $arrayData = array(
            "result" => $result['result'],
            "materialList" => $materialList['result'],
            "applicationList" => $applicationList['result'],
            "adtlist" => $adtlistresult['result'],
            "rpr_id" => $rpr_id,
            "rarp_id" => $rarp_id,
        );
//print_r($arrayData);die;
        $this->template->load("customerRequestsDetails", $arrayData);
    }

    //remote Application Programm Accept

    public function remoteApplicationProgrammAccept($rarp_id) {



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['rarp_id'] = $rarp_id;

            $pageData['qoutation_date'] = date('Y-m-d H:i:s');



            $url = site_url() . "customer/api/remoteApplicationProgrammAccept/";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/remoteApplicationProgrammer/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/remoteApplicationProgrammAccept/");
            }

            exit;
        }

        //Application List By Post Method

        $url = site_url() . "remoteprogramming/api/findSingle_remote_application_aggrement_request_programmer/$rarp_id";

        $result = apiCall($url, "get");

        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("remoteApplicationProgrammQoutation", $arrayData);
    }

    public function remoteApplicationProgrammReject($rarp_id) {

        $url = site_url() . "customer/api/remoteApplicationProgrammReject/" . $rarp_id;

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/remoteApplicationProgrammer/$rmr_id");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/remoteApplicationProgrammer/$rmr_id");
        }
    }

    /**

     * remote Application Service

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationProgramm() {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteApplicationProgramm/$userId";

        $requestList = apiCall($url, "get");



        $arrayData = array(
            "requestList" => $requestList['result'],
        );
        
        //print_r($arrayData);die;

        $this->template->load("remoteApplicationProgrammers", $arrayData);
    }
    
    //  view remote prog
    
        
    public function viewRemoteProgramRfqDetails($dmrID) {
    //echo $dmrID;die;
        $url = site_url() . "/customer/api/viewRemoteProgramRfqDetails/$dmrID";
        $result = apiCall($url, "get");
        //print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewRemoteProgramRfqDetails", $arrayData);
    }

    public function dashboard() {

        $this->template->load("dashboard");
    }

    public function profile_edit() {

//echo $user_id;die;
        if (isset($_POST['btnUpdate'])) {

            $pageData = $this->input->post();
            //   print_r($pageData);exit;
            //$pageData['uid'] = $user_id;

             //print_r($pageData);exit;
            //$pageData['uid'] = $user_id;
            //$pageData['u_date_birth'] =  ($pageData['birthdate']); 

            $url = site_url() . "customer/api/updateDetails";

            $response = apiCall($url, "post", $pageData);

           //print_r($response);exit;
            // call  user log function
              $transaction_type=2;
              $this->user_log($transaction_type);

            if ($response['result']) {

                setFlash("dataMsgProfileSuccess", "Profile updated successfully");
            } else {

                setFlash("dataMsgProfileError", $response['message']);
            }
        }

        $this->load->model("location/country_model");

        $this->load->model("location/state_model");

        $this->load->model("location/city_model");


        $user_id = $this->session->userdata('uid');

        $url = site_url() . "settings/userapi/findMultipleChild/";

        $userTypeList = apiCall($url, "get");

        $url = site_url() . "/customer/api/findAddressList/$user_id";

        $customerAddressList = apiCall($url, "get");

        /* Qualification */

        $url = site_url() . "consultant/api/findMultipleConsultantQualification/";

        $qualificationList = apiCall($url, "get");





        $url = site_url() . "/customer/api/bankDetails/$user_id";

        $customer_data = apiCall($url, "get");



        $url = site_url() . "/customer/api/findContactList/$user_id";

        $customerContactList = apiCall($url, "get");

        $url = site_url() . "settings/languageapi/findMultiple/";

        $language_list = apiCall($url, "get");



        $arrayData = array(
            "customer_data" => $customer_data['result'],
            "userTypeList" => $userTypeList['result'],
            "customerAddressList" => $customerAddressList['result'],
            "customerContactList" => $customerContactList['result'],
            "language_list" => $language_list['result'],
            "countryList" => $this->country_model->getCountryListForSite(),
            "qualificationList" => $qualificationList['result']
        );
        //print_r($arrayData);die;
        $this->template->load("profile_edit", $arrayData);
    }

    /**

     * remote Application Service cunsultant request List

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationServiceProgrammers($requestId, $rarp_id = 0) {



        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');

        /*

          if($rarp_id > 0){

          $url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

          $requestConsultantList =  apiCall($url, "get");

          redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);

          } */

        $url = site_url() . "/customer/api/remoteApplicationServiceProgrammers/$requestId";

        $requestProgrammers = apiCall($url, "get");

        $arrayData = array(
            "requestProgrammers" => $requestProgrammers['result'],
        );

        $this->template->load("remoteApplicationServiceprogrammers", $arrayData);
    }

    public function remoteApplicationServiceProgrammersAcceptByCustomer($rarp_id = 0, $requestId) {

        $url = site_url() . "/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

        $requestConsultantList = apiCall($url, "get");

        redirect(site_url() . "customer/remoteApplicationProgramm/" . $requestId);
    }

    public function machinelist() {

        $user_id = $this->session->userdata('uid');

        $url = site_url() . "machine/api/machineContactRequest/$user_id";

        $machineContactRequest = apiCall($url, "get");

        $arrayData = array("machineContactRequest" => $machineContactRequest['result']);

        $this->template->load("machinelist", $arrayData);
    }

    /**

     * machine comment as per user List

      21/4/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function machinecomment($mcid) {

        $user_id = $this->session->userdata('uid');

        if (isset($_POST['btnComment'])) {

            $pageData = $this->input->post();

            $pageData['user_id'] = $user_id;

            $pageData['machine_comment_id'] = $mcid;

            $pageData['comment_date_time'] = date('Y-m-d H:i:s');

            $url = site_url() . "machine/api/addMachineComment";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgCommentSuccess", $response['message']);
            } else {

                setFlash("dataMsgCommentError", $response['message']);
            }
        }



        $url = site_url() . "machine/api/machineCommentReplyList/$mcid";

        $machineCommentReplyList = apiCall($url, "get");



        $arrayData = array("machineCommentReplyList" => $machineCommentReplyList['result']);

        $this->template->load("machinecomment", $arrayData);
    }

    /**

     * machine video request

      21/4/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function machineVideoEnquiry() {

        $user_id = $this->session->userdata('uid');



        $url = site_url() . "machine/api/machineVideoRequestList/$user_id";

        $machineVideoRequestList = apiCall($url, "get");



        $arrayData = array("machineVideoRequestList" => $machineVideoRequestList['result']);

        $this->template->load("machineVideoList", $arrayData);
    }

    public function machineVideoEnquirySupplier() {

        $user_id = $this->session->userdata('uid');



        $url = site_url() . "machine/api/machineVideoRequestListSupplier/$user_id";

        $machineVideoRequestList = apiCall($url, "get");



        $arrayData = [
            "machineVideoRequestList" => $machineVideoRequestList['result']
        ];

        $this->template->load("machineVideoEnquirySupplier", $arrayData);
    }

    public function automationlist() {
        $user_id = $this->session->userdata('uid');
        $url = site_url() . "automation/api/automationContactRequest/$user_id";
        $automationContactRequest = apiCall($url, "get");
        $arrayData = array("automationContactRequest" => $automationContactRequest['result']);
        $this->template->load("automationlist", $arrayData);
    }

    /**
     * Automation comment as per user List
      09-07-2018
     * @access public
     * @param   
     * @return array of objects
     */
    public function automationcomment($amid) {
        $user_id = $this->session->userdata('uid');
        if (isset($_POST['btnComment'])) {
            $pageData = $this->input->post();
            $pageData['user_id'] = $user_id;
            $pageData['automation_comment_id'] = $mcid;
            $pageData['comment_date_time'] = date('Y-m-d H:i:s');
            $url = site_url() . "automation/api/addAutomationComment";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgCommentSuccess", $response['message']);
            } else {
                setFlash("dataMsgCommentError", $response['message']);
            }
        }

        $url = site_url() . "automation/api/automationCommentReplyList/$amid";
        $automationCommentReplyList = apiCall($url, "get");

        $arrayData = array("automationCommentReplyList" => $automationCommentReplyList['result']);
        $this->template->load("automationcomment", $arrayData);
    }

    /**
     * Automation video request
      09/07/2018
     * @access public
     * @param   
     * @return array of objects
     */
    public function automationVideoEnquiry() {
        $user_id = $this->session->userdata('uid');

        $url = site_url() . "automation/api/automationVideoRequestList/$user_id";
        $automationVideoRequestList = apiCall($url, "get");

        $arrayData = array("automationVideoRequestList" => $automationVideoRequestList['result']);
        $this->template->load("automationVideoList", $arrayData);
    }

    public function automationVideoEnquirySupplier() {
        $user_id = $this->session->userdata('uid');

        $url = site_url() . "automation/api/automationVideoRequestListSupplier/$user_id";
        $automationVideoRequestList = apiCall($url, "get");

        $arrayData = [
            "automationVideoRequestList" => $automationVideoRequestList['result']
        ];
        $this->template->load("automationVideoEnquirySupplier", $arrayData);
    }

    /* =========== MAchine Video Request ============= */

    /**

     * remote Machine Class Schedule

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function MachineVideoClassSchedule($mvr_id = 0) {

        $uid = $this->session->userdata('uid');

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['mvr_id'] = $mvr_id;

            $pageData['created_by_user'] = $uid;

            //require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageData['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/remoteMachineVideoClassScheduleInsert";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);

                redirect(site_url() . "customer/MachineVideoClassSchedule/$mvr_id");
            } else {

                setFlash("dataMsgMachError", $response['message']);

                redirect(site_url() . "customer/MachineVideoClassSchedule/$mvr_id");
            }
        }

        $url = site_url() . "customer/api/remoteMachineVideoClassScheduleList/$mvr_id/$uid";

        $reqData = apiCall($url, "get");



        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteMachineVideoClassSchedule", $arrayData);
    }
	
	public function MachineVideoClassScheduleMeeting($mvr_id) {
        $url = site_url() . "customer/api/liveMachineDemoclassScheduleListConsultant/$mvr_id";
        $reqData = apiCall($url, "get");
		
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['mvr_id'] = $mvr_id;

            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];
			$responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;


          
			


            $url = site_url() . "customer/api/zoomResponseInsertMachineLiveDemo/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);

            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/MachineVideoClassScheduleMeeting/$mvr_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/MachineVideoClassScheduleMeeting/$mvr_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("livemachineDemoSupplier", $arrayData);
    }
		

    /**

     * remote Machine Video Class Schedule

     * Atul Mangave

      24/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function MachineVideoClassScheduleCustomer($mvr_id = 0) {

        $uid = $this->session->userdata('uid');

        $url = site_url() . "customer/api/remoteMachineVideoClassScheduleListCustomer/$mvr_id/$uid";

        $reqData = apiCall($url, "get");

        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteMachineVideoClassScheduleCustomer", $arrayData);
    }

    /**

     * remote Machine Video Class Schedule

     * jaywant narwade

      12/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function tokboxLunchVideo($id) {

        $uid = $this->session->userdata('uid');

        if ((int) ($id)) {

            $url = site_url() . "customer/api/remoteMachineVideoClassScheduleFetchSingle/$id";

            $response = apiCall($url, "get");

            if ($response['result']) {



                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['id'] = $id;

                    $url = site_url() . "customer/api/remoteMachineVideoClassScheduleUpdate/";

                    $response = apiCall($url, "post", $stringData);



                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunchVideo/$id");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /* =========== Automation Video Request ============= */

    /**
     * remote Automation Class Schedule
     * Deepak Shinde
      09/07/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function AutomationVideoClassSchedule($avr_id = 0) {
        $uid = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['avr_id'] = $avr_id;
            $pageData['created_by_user'] = $uid;

            $url = site_url() . "customer/api/remoteAutomationVideoClassScheduleInsert";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgMachSuccess", $response['message']);
                redirect(site_url() . "customer/AutomationVideoClassSchedule/$avr_id");
            } else {
                setFlash("dataMsgMachError", $response['message']);
                redirect(site_url() . "customer/AutomationVideoClassSchedule/$avr_id");
            }
        }
        $url = site_url() . "customer/api/remoteAutomationVideoClassScheduleList/$avr_id/$uid";
        $reqData = apiCall($url, "get");

        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];
        $this->template->load("remoteAutomationVideoClassSchedule", $arrayData);
    }

    /**
     * remote Automation Video Class Schedule
     * Deepak shinde
      09/07/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function AutomationVideoClassScheduleCustomer($avr_id = 0) {
        $uid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/remoteAutomationVideoClassScheduleListCustomer/$avr_id/$uid";
        $reqData = apiCall($url, "get");
        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];
        $this->template->load("remoteAutomationVideoClassScheduleCustomer", $arrayData);
    }

    /**
     * remote Automation Video Class Schedule
     * Deepak shinde
      09/07/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    /* public function tokboxLunchVideo($id) {  
      $uid=$this->session->userdata('uid');
      if((int)($id)){
      $url = site_url()."customer/api/remoteAutomationVideoClassScheduleFetchSingle/$id";
      $response =  apiCall($url, "get");
      if($response['result']){

      if($response['result']['tokbox_sessionid']){
      $sessionId=$response['result']['tokbox_sessionid'];
      $token=$response['result']['tokbox_token'];
      redirect(site_url()."wtokbox/tokbox/index/$sessionId/$token");
      }
      else{
      require_once APPPATH."modules\wtokbox\controllers\Tokbox.php";
      $objTokbox = new tokbox;
      $stringData= $objTokbox->tokenGenration();
      $stringData['id']=$id;
      $url = site_url()."customer/api/remoteAutomationVideoClassScheduleUpdate/";
      $response =  apiCall($url, "post",$stringData);

      if($response['result']){
      redirect(site_url()."customer/tokboxLunchVideo/$id");

      }
      else{
      echo "error".$response['message'];
      }
      }
      }else{

      }
      }

      } */



    /*  */

    /**

     * remote on demand  cunsultant user request List

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteOnDemandConsultantCustomer($requestId, $remote_application_id = 0) {

        $remote_application_id;





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteApplicationServiceOnDemandConsultant/$requestId";

        $consultReqList = apiCall($url, "get");

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceOnDemandConsultantUpdate/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");

            // print_r($requestConsultantList);exit;

            if ($requestConsultantList['result']) {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteOnDemandConsultantCustomer/" . $requestId);
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteOnDemandConsultantCustomer/" . $requestId);
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("remoteApplicationServiceOnDemandConsultant", $arrayData);
    }

    public function remoteOnDemandConsultant($remote_application_id = 0) {

        $remote_application_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteOnDemandServicesBySupport/$userId";

        $consultReqList = apiCall($url, "get");





        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteOnDemandConsultantUpdate/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");



            if ($requestConsultantList['result']) {

                setFlash("dataMsgServiceRequestError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteOnDemandConsultant/");
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteOnDemandConsultant/");
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("remoteOnDemandConsultant", $arrayData);
    }

    /**

     * remote Application Service cunsultant request List  for 

      customer View

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteOnDemandServiceConsultant($requestId, $remote_application_id = 0) {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteOnDemandServiceConsultantUpdate/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");

            redirect(site_url() . "customer/remoteOnDemandServiceConsultant/" . $requestId);
        }

        $url = site_url() . "/customer/api/remoteOnDemandServiceConsultant/$requestId";

        $requestConsultantList = apiCall($url, "get");





        $arrayData = array(
            "requestConsultantList" => $requestConsultantList['result'],
        );

        $this->template->load("remoteOnDemandServiceConsultant", $arrayData);
    }

    //// reject accept request

    public function remoteOnDemandConsultantReject($remote_application_id = 0) {

        $url = site_url() . "/customer/api/remoteOnDemandConsultantReject/$remote_application_id";

        $requestConsultantList = apiCall($url, "get");



        if ($requestConsultantList['result']) {

            setFlash("dataMsgAddError", $requestConsultantList['message']);

            redirect(site_url() . "customer/remoteOnDemandConsultant/");
        } else {

            setFlash("dataMsgAddError", $requestConsultantList['message']);

            redirect(site_url() . "customer/remoteOnDemandConsultant/");
        }
    }

    /**

     * commenttotrainee

     * @access public

      Atul Mangave 26/4/2018

     * @param   

     * @return array of objects

     */
    public function commenttotrainee($rar_id = 0) {

        $uid = $this->session->userdata('uid');



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['comment_by_user_id'] = $uid;

            $pageData['comment_date'] = date('Y-m-d H:i:s');



            $url = site_url() . "customer/api/commenttotraineeInsert";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);

                redirect(site_url() . "customer/remoteApplicationService/");
            } else {

                setFlash("dataMsgMachError", $response['message']);

                redirect(site_url() . "customer/remoteApplicationService/");
            }
        }

        $url = site_url() . "/customer/api/remoteApplicationServicesBrainCertListbyCustSingle/$rar_id/$uid";

        $singleData = apiCall($url, "get");

        $arrayData = [
            "rowList" => $singleData['result'],
            "rar_id" => $rar_id,
        ];

        $this->template->load("trainee_comment", $arrayData);
    }

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function remote_application_consultant($rpr_id = 0) {

        $rpr_id;
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        $url = site_url() . "remoteapplication/api/remote_application_consultant/$userId";
        $programmReqList = apiCall($url, "get");
       // print_r($programmReqList);exit;
        $arrayData = array(
            "programmReqList" => $programmReqList['result'],
        );

        $this->template->load("remote_application_consultant", $arrayData);
    }

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsApplication($rarp_id, $rpr_id) {
        $url = site_url() . "remoteapplication/api/findSingleDetailsCustomerPrgrammingReq/" . $rpr_id;
        $result = apiCall($url, "get");
        $url = site_url() . "remoteapplication/api/findSingleDetailsStatusRFQ/" . $rpr_id;
        $resultQuatation= apiCall($url, "get");
      
        $data['material_type'] = $result['result']['material_type'];
        $data['application_required'] = $result['result']['application_required'];
        //Material List by Post
        $url = site_url() . "settings/materialtypeapi/findmultipletypes";
        $materialList = apiCall($url, "post", $data);
        //Application List By Post Method
        $url = site_url() . "settings/applicationrequiredapi/findmultipleApplication";
        $applicationList = apiCall($url, "post", $data);
        $arrayData = array(
            "result" => $result['result'],
            "resultQuatation" => $result['resultQuatation'],
            "materialList" => $materialList['result'],
            "applicationList" => $applicationList['result'],
            "rpr_id" => $rpr_id,
            "rarp_id" => $rarp_id,
        );

        $this->template->load("customerRequestsApplication", $arrayData);
    }

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsApplicationAccept($rarp_id) {



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['racrp_id'] = $rarp_id;
           /// $pageData['request_status'] = 'QG';
            $pageData['qoutation_date'] = date('Y-m-d H:i:s');

            $url = site_url() . "customer/api/customerRequestsApplicationAccept/";

            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/remote_application_rfq_request/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/remote_application_rfq_request/");
            }

            exit;
        }

        //Application List By Post Method

        $url = site_url() . "remoteapplication/api/findSingle_remote_application_consultant/$rarp_id";

        $result = apiCall($url, "get");

        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("customerRequestsApplicationQoutation", $arrayData);
    }

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsApplicationReject($rarp_id) {

        $url = site_url() . "customer/api/customerRequestsApplicationReject/" . $rarp_id;

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/remote_application_consultant/$rarp_id");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/remote_application_consultant/$rarp_id");
        }
    }

    /**

     * remote Application Service

     * @access public

     * @param   

     * @return array of objects

     */
    public function remote_machine_req_customers() {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/remoteApplicationConsultant/$userId";

        $requestList = apiCall($url, "get");

        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("remote_machine_req_customers", $arrayData);
    }

    /**

     * remote Application Service

      30/4/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationConsultantList($requestId, $rarp_id = 0) {



        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        /*
          if($rarp_id > 0){

          $url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

          $requestConsultantList =  apiCall($url, "get");

          redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);

          } */

        $url = site_url() . "/customer/api/remoteApplicationConsultantList/$requestId";

        $requestProgrammers = apiCall($url, "get");

        $arrayData = array(
            "requestProgrammers" => $requestProgrammers['result'],
        );

        $this->template->load("remoteApplicationConsultantList", $arrayData);
    }

    /**

     * remote Application Service Programmers Accept By Customer

      30/4/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function remoteApplicationConsultantListAcceptByCustomer($rarp_id = 0, $requestId) {

        $url = site_url() . "/customer/api/remoteApplicationConsultantListUpdate/$rarp_id";

        $requestConsultantList = apiCall($url, "get");

        redirect(site_url() . "customer/remote_machine_req_customers/" . $requestId);
    }

    /**

     * schedule Application Consultant Course

      30/4/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function scheduleApplicationConsultantCourse($racrp_id, $rpr_id) {



        $uid = $this->session->userdata('uid');

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['rpr_id'] = $rpr_id;

            $pageData['created_by_user'] = $uid;



            $url = site_url() . "customer/api/scheduleApplicationConsultantCourseInsert";

            $response = apiCall($url, "post", $pageData);



            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);
            } else {

                setFlash("dataMsgMachError", $response['message']);
            }

            redirect(site_url() . "customer/remoteMachineClassSchedule/$rpr_id");

            exit;
        }

        $url = site_url() . "customer/api/scheduleApplicationConsultantCourseList/$rpr_id/$uid";

        $reqData = apiCall($url, "get");



        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("scheduleApplicationConsultantCourse", $arrayData);
    }

    /**

     * schedule Application Consultant Tokbox Lunch

     * jaywant narwade

      30/4/2018

     * @access public

     * @param  add Experince

     * @return array of objects

     */
    public function scheduleApplicationConsultantTokboxLunch($rmstId) {

        $uid = $this->session->userdata('uid');

        if ((int) ($rmstId)) {

            $url = site_url() . "customer/api/scheduleApplicationConsultantCourseFetchSingle/$rmstId";

            $response = apiCall($url, "get");



            if ($response['result']) {



                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules\wtokbox\controllers\Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['rmstId'] = $rmstId;

                    $url = site_url() . "customer/api/scheduleApplicationConsultantCourseUpdate/";

                    $response = apiCall($url, "post", $stringData);

                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunch/$rmstId");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /**

      //view Remote Program Qoute

      9/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function viewRemoteProgramQoute($rarp_id = 0) {



        //Application List By Post Method

        $url = site_url() . "remoteprogramming/api/findSingle_remote_application_aggrement_request_programmer/$rarp_id";

        $result = apiCall($url, "get");

        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewRemoteProgramQoute", $arrayData);
    }

    /**

      //view  Remote Application Consultant Qoute

      10/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function viewRemoteApplicationConsultantQoute($rarp_id = 0) {



        //Application List By Post Method

        $url = site_url() . "remoteapplication/api/findSingle_remote_application_consultant/$rarp_id";
        $result = apiCall($url, "get");
      //  print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewRemoteApplicationConsultantQoute", $arrayData);
    }

    /**

      //group buying List asa per user list

      10/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function groupbuyingList() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "groupbuying/api/requestListAsUser/$uid";

        $requestList = apiCall($url, "get");
        //print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("groupbuyingList", $arrayData);
    }

    /**

      //view group buying request details

      10/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function viewGroupBuyingRequest($gsrId, $garID) {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "groupbuying/api/requestDetails/$gsrId/$uid/";

        $requestList = apiCall($url, "get");
        // print_r($requestList);exit;
        $arrayData = array(
            "result" => $requestList['result'],
        );

        $this->template->load("viewGroupBuyingRequest", $arrayData);
    }

    /**

     * Group Buying Consultant users request List

     * @access public

      11-7-2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsGroupBuyingAccept($gsr_id) {



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();
            //print_r($pageData);exit;
            $pageData['gsr_id'] = $gsr_id;

            $pageData['qoutation_date'] = date('Y-m-d H:i:s');

            $url = site_url() . "customer/api/customerRequestsGroupBuyingAccept/";

            $response = apiCall($url, "post", $pageData);
            // print_r($response);exit;
            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/groupbuyingList/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/groupbuyingList/");
            }

            exit;
        }

        //Application List By Post Method

        $url = site_url() . "digitalmanufacturing/api/findSingle_remote_Rfq_consultant/$gsr_id";

        $result = apiCall($url, "get");

        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("customerRequestsGroupBuyingQoutation", $arrayData);
    }

    /**

     * Group Buying Consultant users request List

     * @access public

      11-7-2018 Deepak shinde

     * @param   

     * @return array of objects

     */
    public function customerRequestsGroupBuyingReject($gsr_id) {

        $url = site_url() . "customer/api/customerRequestsGroupBuyingReject/" . $gsr_id;

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/groupbuyingList/$gsr_id");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/groupbuyingList");
        }
    }

    /**

      //view research purchases list

      21/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function research_purchases_list() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "research/api/research_purchases_list/$uid/";

        $purchasesList = apiCall($url, "get");

        $arrayData = array(
            "purchasesList" => $purchasesList['result'],
        );

        $this->template->load("research_purchases_list", $arrayData);
    }

    /**

      //Expert Enquiry Details For customer

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function xpert_enquiry() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "customer/api/findMultipleExpertRequestList/$uid/";

        $requestList = apiCall($url, "get");

        //print_r()

        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("expert/expertRequest", $arrayData);
    }

    /**

      //Remote Application Enquiry Details For customer

      21/June/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function remote_application_enquiry() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "customer/api/findMultipleRemoteApplicationRequestList/$uid/";

        $requestList = apiCall($url, "get");

        //print_r()

        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("remoteapplication/remoteapplicationRequest", $arrayData);
    }

    /**

      //Expert Enquiry Details for consultant

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function xpert_enquiry_details() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "customer/api/findMultipleExpertRequestListConsultant/$uid/";

        $requestList = apiCall($url, "get");

        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("expert/expertRequestConsultant", $arrayData);
    }

    /**

      //Remote Application Enquiry Details for consultant

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function remote_application_enquiry_details() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "customer/api/findMultipleRemoteRequestListConsultant/$uid/";

        $requestList = apiCall($url, "get");

        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("remoteapplication/remoteapplicationConsultant", $arrayData);
    }

    /**

      //Expert Enquiry Accept By consultant

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function accept_xpert_request($expert_id = 0) {

        $url = site_url() . "customer/api/accpetRequestByConsultant/{$expert_id}";

        $acceptResponse = apiCall($url, "get");

        if ($acceptResponse['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/xpert_enquiry_details/");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/accept_xpert_request/");
        }



        $this->template->load("expert/xpert_enquiry_details");
    }

    public function accept_request_remoteapplication($remote_id = 0) {

        $url = site_url() . "customer/api/accpetRequestByConsultantRemoteApplication/{$remote_id}";

        $acceptResponse = apiCall($url, "get");

        if ($acceptResponse['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/remote_application_enquiry_details/");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/remote_application_enquiry_details/");
        }
    }

    /**

      //Reject Enquiry Accept By consultant

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function reject_xpert_request($expert_id) {

        $url = site_url() . "customer/api/rejectRequestByConsultant/{$expert_id}";

        $acceptResponse = apiCall($url, "get");

        if ($acceptResponse['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/xpert_enquiry_details/");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/accept_xpert_request/");
        }
    }

    public function reject_remoteapplication_request($remote_id) {

        $url = site_url() . "customer/api/rejectRequestByConsultantRemoteApplication/{$remote_id}";

        $acceptResponse = apiCall($url, "get");

        if ($acceptResponse['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/remote_application_enquiry_details/");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/remote_application_enquiry_details/");
        }
    }

    /**

      //Reject Enquiry Accept By consultant

      24/5/2018

     * @access public

     * @param   

     * @return array of objects

     * Atul Mangave * */
    public function scheduleCourseExpert($expert_id) {



        $this->load->library('ZoomAPI');

        if (isset($_POST['btnSubmit'])) {

            $data = $this->input->post();

            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createMeeting = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createMeeting);

            $responseZoom = (array) $responseArray;



            $responseZoom1 = array();


            $responseZoom1['expert_id'] = $expert_id;

            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];





            $url = site_url() . "customer/api/zoomResponseUpdate/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);



            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/xpert_enquiry_details/");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/accept_xpert_request/");
            }
        }

        $this->template->load("expert_schedule_form");
    }

    /* Remote Application Request Schedule */

    public function scheduleCourseRemoteApplication($remote_id) {



        $this->load->library('ZoomAPI');

        if (isset($_POST['btnSubmit'])) {

            $data = $this->input->post();

            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;



            $responseZoom1 = array();



            $responseZoom1['remote_id'] = $remote_id;

            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];





            $url = site_url() . "customer/api/zoomResponseUpdateRemoteApplication/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);



            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/remote_application_enquiry_details/");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/remote_application_enquiry_details/");
            }
        }

        $this->template->load("remoteapplication_schedule_form");
    }

    /* Remote MAchine Programming  */

    public function scheduleRemoteMachineprogramming($rpr_id) {

        $url = site_url() . "customer/api/remoteProgrammingclassScheduleListConsultant/$rpr_id";

        $reqData = apiCall($url, "get");



        $this->load->library('ZoomAPI');

        if (isset($_POST['btnSubmit'])) {

            $data = $this->input->post();



            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['rpr_id'] = $rpr_id;

            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];





            $url = site_url() . "customer/api/zoomResponseInsertRemoteProgramming/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);



            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleRemoteMachineprogramming/$rpr_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleRemoteMachineprogramming/$rpr_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("remoteProgrammingClassSchedule", $arrayData);
    }

    public function scheduleListRemoteProgramming($rpr_id) {

        $url = site_url() . "customer/api/remoteProgrammingclassScheduleListConsultant/$rpr_id";

        $reqData = apiCall($url, "get");



        $this->load->library('ZoomAPI');

        if (isset($_POST['btnSubmit'])) {

            $data = $this->input->post();



            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['rpr_id'] = $rpr_id;

            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];


          //print_r($responseZoom1);die;


            $url = site_url() . "customer/api/zoomResponseInsertRemoteProgramming/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);



            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleRemoteMachineprogramming/$rpr_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleRemoteMachineprogramming/$rpr_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("remoteProgrammingClassScheduleList", $arrayData);
    }

    /*  */

    public function tokboxLunchRemoteService($rab_id) {

        $uid = $this->session->userdata('uid');

        if ((int) ($rab_id)) {

            $url = site_url() . "customer/api/remoteServiceClassScheduleFetchSingle/$rab_id";

            $response = apiCall($url, "get");



            if ($response['result']) {

                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['rab_id'] = $rab_id;

                    $url = site_url() . "customer/api/remoteServiceClassScheduleUpdate/";

                    $response = apiCall($url, "post", $stringData);

                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunchRemoteService/$rab_id");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /**

     * remote Application Service

     * @access public

     * @param   

     * @return array of objects

     */
    public function groupbuyingQuotationList() {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/groupbuyingQuotationList/$userId";

        $requestList = apiCall($url, "get");
        // print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("groupbuying_quotation_list", $arrayData);
    }

    /*     * *************************************** COURSE RFQ LIST FOR SUPPLIER ***************************** */

    /**

      //Course List asa per user list

      10/5/2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function courseList() {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "remotetraining/api/requestListAsUser/$uid";

        $requestList = apiCall($url, "get");
        //print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("courseList", $arrayData);
    }

    public function viewCourseRequest($csrId, $ccrID) {

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "remotetraining/api/requestDetails/$csrId/$uid/";

        $requestList = apiCall($url, "get");
        // print_r($requestList);exit;
        $arrayData = array(
            "result" => $requestList['result'],
        );

        $this->template->load("viewCourseRequest", $arrayData);
    }

    /**

     * Group Buying Consultant users request List

     * @access public

      11-7-2018

     * @param   

     * @return array of objects

     */
    public function supplierCourseRfqAccept($csr_id) {



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['csr_id'] = $csr_id;

            $pageData['qoutation_date'] = date('Y-m-d H:i:s');

            $url = site_url() . "customer/api/supplierCourseRfqAccept/";

            $response = apiCall($url, "post", $pageData);
            // print_r($response);exit;
            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/courseList/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/courseList/");
            }

            exit;
        }

        //Application List By Post Method

        $uid = $this->session->userdata('uid');

        //Application List By Post Method

        $url = site_url() . "remotetraining/api/requestDetails/$csrId/$uid/";

        $requestList = apiCall($url, "get");
        // print_r($requestList);exit;
        $arrayData = array(
            "result" => $requestList['result'],
        );

        $this->template->load("customerRequestsCourseQoutation", $arrayData);
    }

    /**

     * Group Buying Consultant users request List

     * @access public

      11-7-2018 Deepak shinde

     * @param   

     * @return array of objects

     */
    public function supplierCourseRfqReject($csr_id) {

        $url = site_url() . "customer/api/supplierCourseRfqReject/" . $csr_id;

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/courseList/$csr_id");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/courseList/$csr_id");
        }
    }

    /**

     * remote Application Service

     * @access public

     * @param   

     * @return array of objects

     */
    public function courseRfqList() {





        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/courseRfqList/$userId";

        $requestList = apiCall($url, "get");
        //print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );

        $this->template->load("course_quotation_list", $arrayData);
    }

    /*     * ******************  Digital Manufacturing Customer Code ************************** */

    /* /**
     * Additive Manufactring RFQ users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function digitalmanufacturingList($dmr_id = 0) {

        $dmr_id;
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/additivemanufacturing/api/remoteApplicationProgrammBySupport/$userId";
        $supplierReqList = apiCall($url, "get");
        //print_r($supplierReqList);exit;
        $arrayData = array(
            "supplierReqList" => $supplierReqList['result'],
        );
        $this->template->load("digitalmanufacturingSupplier", $arrayData);
    }

    public function customerRequestsSupplier($dmr_id, $drrs_id) {
        $url = site_url() . "/additivemanufacturing/api/findSingleDetailsSupplierReq/" . $dmr_id;
        $result = apiCall($url, "get");

        $url = site_url() . "/additivemanufacturing/api/findSingleDetailsSupplierReqList/" . $dmr_id;
        $resultDA = apiCall($url, "get");
       // print_r($resultDA );exit;
        $data['material_type'] = $result['result']['material_type'];
        $data['application_required'] = $result['result']['application_required'];
        //Material List by Post
        $url = site_url() . "settings/materialtypeapi/findmultipletypes";
        $materialList = apiCall($url, "post", $data);

        //Application List By Post Method
        $url = site_url() . "settings/applicationrequiredapi/findmultipleApplication";
        $applicationList = apiCall($url, "post", $data);
        $arrayData = array(
            "result" => $result['result'],
            "materialList" => $materialList['result'],
            "applicationList" => $applicationList['result'],
            "dmr_id" => $dmr_id,
            "drrs_id" => $drrs_id,
            "adtlist"=>$resultDA['result'],
        );
     //  print_r($arrayData);die;
        $this->template->load("customerRequestsDetailsRfq", $arrayData);
    }

    //remote Application Programm Accept
    public function digitalmanufacturingRfqAccept($drrs_id) {


        $url = site_url() . "customer/api/digitalmanufacturingRfqAccept/{$drrs_id}";
        $response = apiCall($url, "get");
        //print_r($response);exit;
        if ($response['result']) {
            setFlash("dataMsgAddSuccess", $response['message']);
            redirect(site_url() . "customer/digitalmanufacturingList");
        } else {
            setFlash("dataMsgAddError", $response['message']);
            redirect(site_url() . "customer/digitalmanufacturingList");
        }

        $this->template->load("digitalmanufacturingSupplier");
    }

    public function digitalmanufacturingRfqReject($drrs_id) {
        $url = site_url() . "customer/api/digitalmanufacturingRfqReject/" . $drrs_id;
        $response = apiCall($url, "get");
        if ($response['result']) {
            setFlash("dataMsgAddSuccess", $response['message']);
            redirect(site_url() . "customer/digitalmanufacturingList");
        } else {
            setFlash("dataMsgAddError", $response['message']);
            redirect(site_url() . "customer/digitalmanufacturingList");
        }
    }

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsRfqAccept($drrs_id) {



        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $pageData['drrs_id'] = $drrs_id;

            $pageData['qoutation_date'] = date('Y-m-d H:i:s');

            $url = site_url() . "customer/api/customerRequestsRfqAccept/";

   //  print_r($pageData);die;

            $response = apiCall($url, "post", $pageData);
//print_r($response);die;
            if ($response['result']) {

                setFlash("dataMsgAddSuccess", $response['message']);

                redirect(site_url() . "customer/digitalmanufacturingList/");
            } else {

                setFlash("dataMsgAddError", $response['message']);

                redirect(site_url() . "customer/digitalmanufacturingList/");
            }

            exit;
        }

        //Application List By Post Method

        $url = site_url() . "additivemanufacturing/api/findSingle_remote_Rfq_consultant/$drrs_id";

        $result = apiCall($url, "get");

        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("customerRequestsRfqQoutation", $arrayData);
    }
    
    //view Customer Qutation
    
    public function viewCustomerQutation($drrs_id) {
//echo $drrs_id;die;
        $url = site_url() . "additivemanufacturing/api/findSingle_remote_Rfq_quataion/$drrs_id";

        $result = apiCall($url, "get");
//print_r($result);die;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewCustomerQuotation", $arrayData);
    }
    
    // view remote programmer
    public function viewRemoteProgrammerQutation($rarp_id) {
//echo $drrs_id;die;
        $url = site_url() . "remoteprogramming/api/findSingle_remote_prog_Rfq_quataion/$rarp_id";

        $result = apiCall($url, "get");
//print_r($result);die;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewRemoteProgrammerQutation", $arrayData);
    }
    // view laser proccesing
    public function viewLaserProcesingCustomerQutation($drrs_id) {
//echo $drrs_id;die;
        $url = site_url() . "laserprocessing/api/findSingle_laser_Rfq_quataion/$drrs_id";

        $result = apiCall($url, "get");
//print_r($result);die;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("ViewLaserProcessingCustomer", $arrayData);
    }
    
    
    

    /**

     * remote Application Consultant users request List

     * @access public

      27/4/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsRfqReject($drrs_id) {

        $url = site_url() . "customer/api/customerRequestsRfqReject/" . $drrs_id;

        $response = apiCall($url, "get");

        if ($response['result']) {

            setFlash("dataMsgAddSuccess", $response['message']);

            redirect(site_url() . "customer/remote_Rfq_consultant/$drrs_id");
        } else {

            setFlash("dataMsgAddError", $response['message']);

            redirect(site_url() . "customer/remote_Rfq_consultant/$drrs_id");
        }
    }

    /**
     * Additive Manufacturing RFQ Customer Dashboard 
     * @access public
     * @param   
     * @return array of objects
     */
    public function remote_digitalmanufacturing_req_customers() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/remoteRfqSupplier/$userId";
        $requestList = apiCall($url, "get");
        $url = site_url() . "/customer/api/ViewAdditiveRfqMultipleDetails/$userId";
        $AllRFQList = apiCall($url, "get");
      //  print_r($AllRFQList);exit;
      // print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
            "AllRFQList" => $AllRFQList['result'],
        );
        $this->template->load("remote_digitalmanufacturing_req_customers", $arrayData);
    }

  
     /**
     * Additive Manufacturing RFQ Customer Dashboard RFQ Details Fetch all
     * @access public
     * @param   
     * @return array of objects
     */
    public function viewAdditiveRfqDetails($dmrID) {
    
        $url = site_url() . "/customer/api/viewAdditiveRfqDetails/$dmrID";
        $result = apiCall($url, "get");
       // print_r($requestList);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewAdditiveRfqDetails", $arrayData);
    }
    
    // view laser processing Rfq Details
    public function viewLaserPrcoessingRfqDetails($dmrID) {
    
        $url = site_url() . "/customer/api/viewLaserPrcoessingRfqDetails/$dmrID";
        $result = apiCall($url, "get");
       // print_r($requestList);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewLaserProcessingRfqDetails", $arrayData);
    }

    /**

     *  Digital Manufacturing Service

      10-07-2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function DigitalmanufacturingSupplierList($requestId, $drrs_id = 0) {



        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');

        /*

          if($rarp_id > 0){

          $url = site_url()."/customer/api/remoteApplicationServiceProgrammerUpdate/$rarp_id";

          $requestConsultantList =  apiCall($url, "get");

          redirect(site_url()."customer/remoteApplicationProgramm/".$requestId);

          } */

        $url = site_url() . "/customer/api/DigitalmanufacturingSupplierList/$requestId";

        $requestSuppliers = apiCall($url, "get");
        //print_r($requestSuppliers);exit;
        $arrayData = array(
            "requestSuppliers" => $requestSuppliers['result'],
        );

        $this->template->load("digitalmanufacturingSupplierList", $arrayData);
    }

    /**

     * Digital Manufacturing Supplier Accept By Customer

      10-07-2018

     * @access public

     * @param   

     * @return array of objects

     */
    public function DigitalmanufacturingSupplierListAcceptByCustomer($drrs_id = 0, $requestId) {

        $url = site_url() . "/customer/api/DigitalmanufacturingSupplierListUpdate/$drrs_id";

        $requestSupplierList = apiCall($url, "get");
        //print_r($result);exit;
        redirect(site_url() . "customer/digitalmanufacturingSupplierList/" . $requestId);
    }

    public function viewDigitalManufacturingSupplierQoute($drrs_id = 0) {



        //Application List By Post Method

        $url = site_url() . "additivemanufacturing/api/findSingle_remote_rfq_consultant/$drrs_id";

        $result = apiCall($url, "get");
        //print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewDigitalManufacturingSupplierQoute", $result);
    }

    /* /**
     * Rapid Prototyping  RFQ users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function rapidprototypingList($dmr_id = 0) {

        $dmr_id;
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/rapidprototyping/api/rapidprototypingBySupport/$userId";
        $supplierReqList = apiCall($url, "get");
        //print_r($supplierReqList);exit;
        $arrayData = array(
            "supplierReqList" => $supplierReqList['result'],
        );
        $this->template->load("rapidprototypingSupplier", $arrayData);
    }

    public function customerRequestsSupplierForRapidprototyping($dmr_id, $drrs_id) {
        $url = site_url() . "/rapidprototyping/api/findSingleDetailsSupplierReq/" . $dmr_id;
        $result = apiCall($url, "get");
        //  print_r($result );exit;
        $data['material_type'] = $result['result']['material_type'];
        $data['application_required'] = $result['result']['application_required'];
        //Material List by Post
        $url = site_url() . "settings/materialtypeapi/findmultipletypes";
        $materialList = apiCall($url, "post", $data);

        //Application List By Post Method
        $url = site_url() . "settings/applicationrequiredapi/findmultipleApplication";
        $applicationList = apiCall($url, "post", $data);
        $arrayData = array(
            "result" => $result['result'],
            "materialList" => $materialList['result'],
            "applicationList" => $applicationList['result'],
            "dmr_id" => $dmr_id,
            "drrs_id" => $drrs_id,
        );
        $this->template->load("customerRequestsDetailsRapidprototypingRfq", $arrayData);
    }

    /**

     * Accept Quotation For Rapid Prototyping

     * @access public

      26/07/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsRfqForRapidprototypingAccept($drrs_id) {

        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['drrs_id'] = $drrs_id;
            $pageData['qoutation_date'] = date('Y-m-d H:i:s');
            $url = site_url() . "customer/api/customerRequestsRfqAcceptForRapidprototyping/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgAddSuccess", $response['message']);
                redirect(site_url() . "customer/rapidprototypingList/");
            } else {
                setFlash("dataMsgAddError", $response['message']);
                redirect(site_url() . "customer/rapidprototypingList/");
            }
            exit;
        }
        //Application List By Post Method
        $url = site_url() . "rapidprototyping/api/findSingle_remote_Rfq_consultant/$drrs_id";
        $result = apiCall($url, "get");
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("customerRequestsRfqQoutationForRapidprototyping", $arrayData);
    }

    /**
     * Reject Quotation For Rapid Prototyping
     * @access public
      26/07/2018
     * @param   
     * @return array of objects
     */
    public function customerRequestsRfqForRapidprototypingReject($drrs_id) {
        $url = site_url() . "customer/api/customerRequestsRfqReject/" . $drrs_id;
        $response = apiCall($url, "get");
        if ($response['result']) {
            setFlash("dataMsgAddSuccess", $response['message']);
            redirect(site_url() . "customer/rapidprototypingList");
        } else {
            setFlash("dataMsgAddError", $response['message']);
            redirect(site_url() . "customer/rapidprototypingList");
        }
    }

    /**

     * Rapid Prototyping RFQ List

     * @access public

     * @param   

     * @return array of objects

     */
    public function RapidprototypingRfqList() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/RapidprototypingRfqList/$userId";
        $requestList = apiCall($url, "get");
      // print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );
        $this->template->load("rapid_prototyping_quotation_list", $arrayData);
    }

    public function viewSupplierRPQuotation($drrs_id) {
//echo $drrs_id;die;
        $url = site_url() . "rapidprototyping/api/findSingle_rapid_Rfq_quotaion/$drrs_id";

        $result = apiCall($url, "get");
//print_r($result);die;
        $arrayData = array(
            "result" => $result['result'],
        );

        $this->template->load("viewQuotationRapid", $arrayData);
    }


    // customer accecpt additive manufacturing 
    public function RapidSupplierListAcceptBycustomer($drrs_id){

    //  echo 'hi';die;

            $url = site_url()."/rapidprototyping/api/RapidSupplierListAcceptBycustomer/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/RapidprototypingRfqList/"); 

    }
    // customer accecpt additive manufacturing 
    public function RapidSupplierListAcceptByreject($drrs_id){

    //  echo 'hi';die;

            $url = site_url()."/rapidprototyping/api/RapidSupplierListAcceptByreject/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/RapidprototypingRfqList/"); 

    }


     /**
     * Rapid Prototyping RFQ Customer Dashboard RFQ Details Fetch all
     * @access public
     * @param   
     * @return array of objects
     */
    public function viewRapidRfqDetails($dmrID) {
    
        $url = site_url() . "/customer/api/viewRapidRfqDetails/$dmrID";
        $result = apiCall($url, "get");
        //print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewRapidRfqDetails", $arrayData);
    }

    /* /**
     * Laser Processing RFQ users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function laserprocessingList($dmr_id = 0) {

        $dmr_id;
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/laserprocessing/api/laserprocessingBySupport/$userId";
        $supplierReqList = apiCall($url, "get");
       //print_r($supplierReqList);exit;
        $arrayData = array(
            "supplierReqList" => $supplierReqList['result'],
        );
        $this->template->load("laserprocessingSupplier", $arrayData);
    }

    public function customerRequestsSupplierForLaserprocessing($dmr_id, $drrs_id) {
        $url = site_url() . "/laserprocessing/api/findSingleDetailsSupplierReq/" . $dmr_id;
        $result = apiCall($url, "get");
        //  print_r($result );exit;
        $data['material_type'] = $result['result']['material_type'];
        $data['application_required'] = $result['result']['application_required'];
        //Material List by Post
        $url = site_url() . "settings/materialtypeapi/findmultipletypes";
        $materialList = apiCall($url, "post", $data);

        //Application List By Post Method
        $url = site_url() . "settings/applicationrequiredapi/findmultipleApplication";
        $applicationList = apiCall($url, "post", $data);
        $arrayData = array(
            "result" => $result['result'],
            "materialList" => $materialList['result'],
            "applicationList" => $applicationList['result'],
            "dmr_id" => $dmr_id,
            "drrs_id" => $drrs_id,
        );
        $this->template->load("customerRequestsDetailsLaserprocessingRfq", $arrayData);
    }

    /**

     * Accept Quotation For Laser Processing

     * @access public

      26/07/2018

     * @param   

     * @return array of objects

     */
    public function customerRequestsRfqForLaserprocessingAccept($drrs_id) {

        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['drrs_id'] = $drrs_id;
            $pageData['qoutation_date'] = date('Y-m-d H:i:s');
            $url = site_url() . "customer/api/customerRequestsRfqForLaserprocessingAccept/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgAddSuccess", $response['message']);
                redirect(site_url() . "customer/laserprocessingList/");
            } else {
                setFlash("dataMsgAddError", $response['message']);
                redirect(site_url() . "customer/laserprocessingList/");
            }
            exit;
        }
        //Application List By Post Method
        $url = site_url() . "laserprocessing/api/findSingle_remote_Rfq_consultant/$drrs_id";
        $result = apiCall($url, "get");
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("customerRequestsRfqQoutationForLaserprocessing", $arrayData);
    }

    /**
     * Reject Quotation For Laser Processing
     * @access public
      26/07/2018
     * @param   
     * @return array of objects
     */
    public function customerRequestsRfqForLaserprocessingReject($drrs_id) {
        $url = site_url() . "customer/api/customerRequestsRfqForLaserprocessingReject/" . $drrs_id;
        $response = apiCall($url, "get");
        if ($response['result']) {
            setFlash("dataMsgAddSuccess", $response['message']);
            redirect(site_url() . "customer/laserprocessingList");
        } else {
            setFlash("dataMsgAddError", $response['message']);
            redirect(site_url() . "customer/laserprocessingList");
        }
    }




    /**

     * Laser Processing RFQ List

     * @access public

     * @param   

     * @return array of objects

     */
    public function LaserprocessingRfqList() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/LaserprocessingRfqList/$userId";
        $requestList = apiCall($url, "get");
        // print_r($requestList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
        );
        
        //print_r($arrayData);die;
        $this->template->load("laser_processing_quotation_list", $arrayData);
    }

    /*     * *************** Remote application Video Request Supplier ************* */

    public function remoteappVideoEnquirySupplier() {

        $user_id = $this->session->userdata('uid');
        $url = site_url() . "remoteapplication/api/VideoRequestListSupplier/$user_id";
        $VideoRequestList = apiCall($url, "get");
        //print_r($VideoRequestList);exit;
        $arrayData = [
            "VideoRequestList" => $VideoRequestList['result']
        ];
        $this->template->load("remoteappVideoEnquirySupplier", $arrayData);
    }

    /**

     * Remote Apllication Class Schedule
     * Deepak Shinde
      13/08/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function remoteappVideoClassSchedule($ravr_id = 0) {
        $uid = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['ravr_id'] = $ravr_id;
            $pageData['created_by_user'] = $uid;
            //require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageData['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/remoteappVideoClassScheduleInsert";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgMachSuccess", $response['message']);
                redirect(site_url() . "customer/remoteappVideoClassSchedule/$ravr_id");
            } else {
                setFlash("dataMsgMachError", $response['message']);
                redirect(site_url() . "customer/remoteappVideoClassSchedule/$ravr_id");
            }
        }
        $url = site_url() . "customer/api/remoteappVideoClassScheduleList/$ravr_id/$uid";
        $reqData = apiCall($url, "get");
        //print_r($reqData);exit;
        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteappVideoClassSchedule", $arrayData);
    }

    /**
     * Remote Application Video Class Schedule
     * Deepak Shinde
      12/4/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function tokboxLunchVideoRemoteApp($id) {
        $uid = $this->session->userdata('uid');
        if ((int) ($id)) {
            $url = site_url() . "customer/api/remoteappVideoClassScheduleFetchSingle/$id";
            $response = apiCall($url, "get");
            if ($response['result']) {
                if ($response['result']['tokbox_sessionid']) {
                    $sessionId = $response['result']['tokbox_sessionid'];
                    $token = $response['result']['tokbox_token'];
                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {
                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";
                    $objTokbox = new tokbox;
                    $stringData = $objTokbox->tokenGenration();
                    $stringData['id'] = $id;
                    //print_r($stringData['id']);exit;
                    $url = site_url() . "customer/api/remoteappVideoClassScheduleUpdate/";
                    $response = apiCall($url, "post", $stringData);
                    if ($response['result']) {
                        redirect(site_url() . "customer/tokboxLunchVideoRemoteApp/$id");
                    } else {
                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /**
     * Remote Application request
      14/8/2018
     * @access public
     * @param   
     * @return array of objects
     */
    public function remoteappVideoEnquiry() {

        $user_id = $this->session->userdata('uid');
        $url = site_url() . "remoteapplication/api/VideoRequestList/$user_id";
        $remoteappVideoRequestList = apiCall($url, "get");
        //print_r($remoteappVideoRequestList);exit; 
        $arrayData = array("remoteappVideoRequestList" => $remoteappVideoRequestList['result']);
        $this->template->load("remoteappVideoList", $arrayData);
    }

    /**

     * Rmote Application Video Class Schedule
     * Deepak Shinde
      14/08/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function remoteappVideoClassScheduleCustomer($ravr_id = 0) {
        $uid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/remoteappVideoClassScheduleListCustomer/$ravr_id/$uid";
        $reqData = apiCall($url, "get");
        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];
        $this->template->load("remoteappVideoClassScheduleCustomer", $arrayData);
    }

    /*     * *************** Remote Service Video Request Supplier ************* */

    public function remoteServiceVideoEnquiryProgrammer() {

        $user_id = $this->session->userdata('uid');
        $url = site_url() . "consultant/api/VideoRequestListProgrammer/$user_id";
        $VideoRequestList = apiCall($url, "get");
        //print_r($VideoRequestList);exit;
        $arrayData = [
            "VideoRequestList" => $VideoRequestList['result']
        ];
        $this->template->load("remoteServiceVideoEnquiryProgrammer", $arrayData);
    }

    /**

     * Remote Service Class Schedule
     * Deepak Shinde
      14/08/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function remoteServiceVideoClassSchedule($rsvr_id = 0) {
        $uid = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['rsvr_id'] = $rsvr_id;
            $pageData['created_by_user'] = $uid;
            //require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageData['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageData['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/remoteServiceVideoClassScheduleInsert";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgMachSuccess", $response['message']);
                redirect(site_url() . "customer/remoteServiceVideoClassSchedule/$rsvr_id");
            } else {
                setFlash("dataMsgMachError", $response['message']);
                redirect(site_url() . "customer/remoteServiceVideoClassSchedule/$rsvr_id");
            }
        }
        $url = site_url() . "customer/api/remoteServiceVideoClassScheduleList/$rsvr_id/$uid";
        $reqData = apiCall($url, "get");
        //print_r($reqData);exit;
        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];

        $this->template->load("remoteServiceVideoClassSchedule", $arrayData);
    }

    /**
     * Remote Service Video Class Schedule
     * Deepak Shinde
      12/4/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function tokboxLunchVideoRemoteService($id) {
        $uid = $this->session->userdata('uid');
        if ((int) ($id)) {
            $url = site_url() . "customer/api/remoteServiceVideoClassScheduleFetchSingle/$id";
            $response = apiCall($url, "get");
            if ($response['result']) {
                if ($response['result']['tokbox_sessionid']) {
                    $sessionId = $response['result']['tokbox_sessionid'];
                    $token = $response['result']['tokbox_token'];
                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {
                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";
                    $objTokbox = new tokbox;
                    $stringData = $objTokbox->tokenGenration();
                    $stringData['id'] = $id;
                    //print_r($stringData['id']);exit;
                    $url = site_url() . "customer/api/remoteappVideoClassScheduleUpdate/";
                    $response = apiCall($url, "post", $stringData);
                    if ($response['result']) {
                        redirect(site_url() . "customer/tokboxLunchVideoRemoteService/$id");
                    } else {
                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

    /**
     * Remote service request
      14/8/2018
     * @access public
     * @param   
     * @return array of objects
     */
    public function remoteServiceVideoEnquiry() {

        $user_id = $this->session->userdata('uid');
        $url = site_url() . "consultant/api/VideoRequestList/$user_id";
        $remoteServiceVideoRequestList = apiCall($url, "get");
        //print_r($remoteServiceVideoRequestList);exit; 
        $arrayData = array("remoteServiceVideoRequestList" => $remoteServiceVideoRequestList['result']);
        $this->template->load("remoteServiceVideoList", $arrayData);
    }

    /**

     * Rmote Services Video Class Schedule
     * Deepak Shinde
      14/08/2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function remoteServiceVideoClassScheduleCustomer($rsvr_id = 0) {
        $uid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/remoteServiceVideoClassScheduleListCustomer/$rsvr_id/$uid";
        $reqData = apiCall($url, "get");
        $arrayData = [
            "scheduleList" => $reqData['result'],
        ];
        $this->template->load("remoteappVideoClassScheduleCustomer", $arrayData);
    }

    public function alluserList() {

        /*         * *** Add  User Details *** */

        $user_type = $this->session->userdata('user_type');
        // print_r($user_type);exit;
        $id = $this->session->userdata('uid');
        $url = site_url() . "/customer/api/ListUserRole/$user_type";
        $user_type_role = apiCall($url, "get", $pageDatas);
        //  print_r($user_type_role);exit;
        $url = site_url() . "/customer/api/ListAlluser/$id";
        $AllUser = apiCall($url, "get", $pageDatas);

        /* foreach($user_type_role as $key){
          if($alluserdata['user_role']==$key['id'])
          {
          echo $key['roleName'];
          }
          } */

        /* $url = site_url()."/customer/api/findSingleUser/$uid";
          $user_data =  apiCall($url, "get"); */
        //print_r($AllUser);exit;
        if (isset($_POST['AddCompanyUser'])) {
            $pageData = $this->input->post();
            //print_r($pageData);exit;
            $pageData['u_parent_id'] = $id;
            $pageData['user_type'] = $user_type;
            //print_r($user_type);exit;
            $url = site_url() . "/customer/api/ListUserType/$user_type";
            $user_type = apiCall($url, "get", $pageDatas);
            $UserTypeName = $user_type['result']['userType'];
            $url = site_url() . "/customer/api/AddCompanyUser";
            $response = apiCall($url, "post", $pageData);
            //print_r($response);exit;
            if ($response['result']) {

                $to = $pageData['u_email'];
                $body = '<p>Hi ' . $pageData['u_name'] . ',</p> ';
                $body .= '<p>This is to notify that you have been associated with ' . $pageData['u_name'] . ' family and may start receiving notifications for the services you would be using through ' . DOMAIN_NAME . ' platform. We value all our customers and partners and help them with any questions they might have. Do contact us for any queries at ' . SUPPORT_MAIL . '.</p>';
                $body .= '<p> Click <a href="' . site_url() . '/pages/signIn">here</a> to sign up to ' . DOMAIN_NAME . ' platform with below details â€“ </p>';
                $body .= '<p> Email:  : ' . $pageData['u_email'] . '</p>';
                $body .= '<p> User type : ' . $UserTypeName . '</p>';
                $body .= '<p> Company Code : ' . $pageData['company_code'] . '</p>';
                $body .= '<p> If youEmail:  have difficulty to sign up with above link, you can copy link in your browser: ' . site_url() . '</p><br/>';
                $body .= '<p> Thank You,</p>';
                $body .= '<p>' . SUPPORT_TEAM_NAME . '</p>';
                $body .= '<p>' . SUPPORT_MAIL . '</p>';
                //print_r($body);exit;
                $email_content = $body;
                $this->load->library('Email_PHPMailer');
                $subject = 'Login Details Teranex ';
                $mailresponse = email_Send($subject, $to, $email_content, $name);
                setFlash("dataMsgProfileSuccess", "User Added successfully");
                
                $transaction_type=6;
                    //echo $data;die;
                $this->user_log($transaction_type);
                
                redirect(site_url() . "customer/alluserList");
            } else {
                setFlash("dataMsgProfileError", $response['message']);
                redirect(site_url() . "customer/alluserList");
            }
        }

        $arrayData = [
            "user_type_role" => $user_type_role['result'],
            "AllUser" => $AllUser['result'],
        ];

        $this->template->load("alluserList", $arrayData);
    }

    public function AlluserUpdate($uid) {

        $user_type = $this->session->userdata('user_type');
        $id = $this->session->userdata('uid');

        if (isset($_POST['AddCompanyUser'])) {
            $pageData = $this->input->post();
            //print_r($pageData) ;exit;
            $url = site_url() . "/customer/api/UpdateUser";
            $response = apiCall($url, "post", $pageData);
            //print_r($response);exit;
            if ($response['result']) {
                setFlash("dataMsgProfileSuccess", "User Updated successfully");
                redirect(site_url() . "customer/alluserList");
            } else {
                setFlash("dataMsgProfileError", $response['message']);
                redirect(site_url() . "customer/alluserList");
            }
        }

        $url = site_url() . "/customer/api/findSingleUser/$uid";
        $user_data = apiCall($url, "get");
        //print_r($user_data);exit;
        $url = site_url() . "/customer/api/ListUserRole/$user_type";
        $user_type_role = apiCall($url, "get", $pageDatas);

        $url = site_url() . "/customer/api/ListAlluser/$id";
        $AllUser = apiCall($url, "get", $pageDatas);

        $arrayData = [
            "user_data" => $user_data['result'],
            "user_type_role" => $user_type_role['result'],
            "AllUser" => $AllUser['result'],
        ];
        $this->template->load("alluserList", $arrayData);
    }

    public function collectiveBuying() {
        
        $this->template->load("collectiveBuying");
    }

    public function machineServices() {
        $user_type = $this->session->userdata('user_type');
        $id = $this->session->userdata('uid');
        //echo $id;die;
         $url = site_url() . "/customer/api/CustomerList/$id";
        $AllUser = apiCall($url, "get");

         $url = site_url() . "customer/api/machineDetailsMultiple/$id";
         $machineCatList = apiCall($url, "get");
        // print_r($machineCatList);die;
        $arrayData = [
            "AllUser" => $AllUser['result']['result'],
             "machineCatList" => $machineCatList['result']['result'],
        ];
      // print_r($arrayData);die;
        $this->template->load("machineServices",$arrayData);
    }
	
	public function offerToCustomer($machine_id) {
        $user_type = $this->session->userdata('user_type');
        $id = $this->session->userdata('uid');
        $url = site_url()."/customer/api/findMultipleUserList/";
        $AllUser = apiCall($url, "get");
	
		if (isset($_POST['btnUploadQuote'])) {
                $pageData = $this->input->post();
				$pageData['machine_id'] = $machine_id;
				 $supplier_id = $this->session->userdata('uid');
				$pageData['supplier_id'] = $supplier_id;
				$url = site_url()."customer/api/saleMachineToCustomer";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", "Offered Successfully..!!");
					redirect(site_url() . "customer/machineOrdersSupplier/");
				} else {
					setFlash("dataMsgAddError", "Please try again Something went wrong..!!");
					redirect(site_url() . "customer/machineServices/");
				}	
		}
	
		$arrayData = [
            "AllUser" => $AllUser['result'],
        ];
        $this->template->load("offerToCustomer",$arrayData);
    }

    /*** Remote Application RFQ ***/
    /*   Name : Deepak Shinde 
    *    Date : 18-10-2018 */

    public function applicationService() {

        $userid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/findMultiplerfqlist/$userid";
        $rfqList = apiCall($url, "get");
        //print_r($rfqList);exit;
        $arrayData = [
            "rfqList" => $rfqList['result'],
        ];

        $this->template->load("applicationService",$arrayData);
    }

  
    public function remoteapplication_rfq_update($id) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['requested_date'] = date('Y-m-d H:i:s');
            $url = site_url() . "customer/api/remoteapplication_rfq_update";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/applicationService/");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/applicationService/");
            }
        }
        $url = site_url() . "/customer/api/findSingleremoteapplication_rfq/$id";
        $result = apiCall($url, "get");
       //print_r($result);exit;
        $arrayData = [
            "result" => $result['result'],
        ];
        $this->template->load("customer/remoteapplication/update", $arrayData);
    }

    public function remoteapplication_rfq_delete($id) {
        $url = site_url() . "/customer/api/remoteapplication_rfq_delete/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/applicationService/");
    }

     /**
     * Remote Application RFQ Customer Dashboard RFQ Details Fetch all
     * @access public
     * @param   
     * @return array of objects
     */
    public function viewRemoteApplicationRfqDetails($rprID) {
    
        $url = site_url() . "/customer/api/viewRemoteApplicationRfqDetails/$rprID";
        $result = apiCall($url, "get");
    //  print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewRemoteApplicationRFQ", $arrayData);
    }


    public function trainingCourses() {
             $id = $this->session->userdata('uid');
            $url = site_url() . "/customer/api/TrainingCoursesList/$id";
            $AllUser = apiCall($url, "get");
            //print_r($AllUser);die;
        $arrayData = [
            "AllUser" => $AllUser['result']['result'],
        ];
     
      //  print_r($arrayData);die;
        $this->template->load("trainingCourses",$arrayData);
    }

    public function marketIntelligence() {

        $userid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/findMultiplereportlist/$userid";
        $report_purchase_list = apiCall($url, "get");
        $url = site_url() . "customer/api/findmarketmonitoringlist/$userid";
        $market_monitoring_list = apiCall($url, "get");
      //print_r($market_monitoring_list);exit;
        $arrayData = [
            "report_purchase_list" => $report_purchase_list['result'],
            "market_monitoring_list" => $market_monitoring_list['result'],
        ];
        $this->template->load("marketIntelligence", $arrayData);
    }

    public function tradeServices() {
        $this->template->load("tradeServices");
    }

    public function customerServices() {
        $userid = $this->session->userdata('uid');
        $url = site_url() . "customer/api/findMultipleTreadServicelist/$userid";
        $report_abuse_list = apiCall($url, "get");
     //   print_r($Tread_Service_list);exit;
        $url = site_url() . "customer/api/findmarketGetpaidFeedbacklist/$userid";
        $Get_paid_feedback_list = apiCall($url, "get");
      //  print_r($Get_paid_feedback_list);exit;
        $arrayData = [
            "report_abuse_list" => $report_abuse_list['result'],
            "Get_paid_feedback_list" => $Get_paid_feedback_list['result'],
        ];
        $this->template->load("customerServices" ,$arrayData);
    }

    public function allRfqsCount() {

        $this->template->load("allRfqsCount");
    }

    /*     * ************** ADD Machine By Supplier / Customer *********** */

    /**
     * Add Machine 
     * Deepak Shinde
     * 08-10-2018
     * @access public
     * @param  add Experince
     * @return array of objects
     */
    public function AllMachineList() {
        $userid = $this->session->userdata('uid');
        //print_r($userid);exit;
        $url = site_url() . "customer/api/machineDetailsMultiple/$userid";
        $machineCatList = apiCall($url, "get");
        //print_r($machineCatList);exit;
        $arrayData = [
            "machineCatList" => $machineCatList['result']['result'],
        ];
        $this->template->load("customer/machine/list", $arrayData);
    }

    public function create_machine() {
		
		
        $created_by = $this->session->userdata('uid');
        $parent_id = $this->session->userdata('u_parent_id');
       // print_r($this->session->userdata());
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
         // print_r($pageData);exit;
 
            $pageData['machine_software_id']=implode(",",$pageData['machine_software_id']);  
            $pageData['created_by'] = $created_by;
                $pageData['machine_unique_id'] = get_unique_numeric_string_package() ;
            if($parent_id == 0){
                $pageData['parent_id'] = $created_by ;
                $pageData['created_by'] = $created_by ;
            }else{
                $pageData['parent_id'] = $parent_id ;
                $pageData['created_by'] = $parent_id ;
            }

            $url = site_url() . "customer/api/machineInsertDetails";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                $transaction_type =23;
                $this->user_log($transaction_type);
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machineServices");
              
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machineServices");
            }
        }
        $this->load->model("location/country_model");
        $url = site_url() . "machine/api/findMultipleMachineCat";
        $categoryList = apiCall($url, "get");
        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");
        $url = site_url() . "machine/api/machineSoftwareList";
        $softwareList = apiCall($url, "get");
        
        $url = site_url() . "machine/api/financersoftwareList";
        $machine_financersoftwareList = apiCall($url, "get");
      // print_r($machine_financersoftwareList);exit;
        $arrayData = [
            "categoryList" => $categoryList['result'],
            "countryList" => $this->country_model->getCountryListForSite(),
            "brandList" => $brandList['result']['result'],
            "softwareList" => $softwareList['result']
        ];
        
      // print_r($arrayData);die;
        $this->template->load("customer/machine/create", $arrayData);
    }

    /* Update Machine s
     * @access public
     * @param  update machine details
     * @return array of post data
     */

    public function update_machine($mid) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/updateMachineDetails";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machineServices");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machineServices");
            }
        }
        $this->load->model("location/country_model");
        $this->load->model("location/state_model");
        $this->load->model("location/city_model");
        $url = site_url() . "machine/api/findSingleMachineDetails/$mid";
        $machineDetails = apiCall($url, "get");
        $url = site_url() . "machine/api/findMultipleMachineCat";
        $categoryList = apiCall($url, "get");
        $country_id = $machineDetails['result']['machine_location_country'];
        $state_id = $machineDetails['result']['machine_location_state'];

        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");
        $url = site_url() . "machine/api/machineSoftwareList";
        $softwareList = apiCall($url, "get");

        $url = site_url() . "machine/api/machineBrandModelList/" . $machineDetails['result']['brand_name'];
        $brandModelList = apiCall($url, "get");
        $machine_software_list = explode( ",", $machineDetails['result']['machine_software_id']);
                $machine_software_list = explode( ",", $machineDetails['result']['machine_software_id']);


        $arrayData = [
            "machine_data" => $machineDetails['result'],
            "country_id" => $country_id,
            "categoryList" => $categoryList['result'],
            "countryList" => $this->country_model->getCountryListForSite(),
            "stateList" => $this->state_model->getStateList($country_id),
            "cityList" => $this->city_model->getCityList($state_id),
            "brandList" => $brandList['result']['result'],
            "brandModelList" => $brandModelList['result']['result'],
            "softwareList" => $softwareList['result'],
            "machine_software_list" => $machine_software_list
        ];
        
//print_r( $arrayData );die;
        $this->template->load("customer/machine/update", $arrayData);
    }

    public function deleteMachineDetails($id) {
        $url = site_url() . "/customer/api/deleteMachineDetails/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machineServices");
    }

    ////////////////         Add Machine Servies  //////////////////////

    public function add_machine_services($mdID) {
        //print_r($created_by);exit;
        if (isset($_POST['btnMachineService'])) {
            $uid  = $this->session->userdata('uid');    
            $user_type  = $this->session->userdata('user_type');   
            $pageData = $this->input->post();
            $pageData['user_id']=$uid;
            $pageData['user_type']=$user_type;

           // print_r($pageData);exit;
            $url = site_url() . "customer/api/machineServicesInsert";
            $response = apiCall($url, "post", $pageData);

            if($response['result']){
                    setFlash("dataMsgSuccess","Machine Service added successfully.");
                    redirect(site_url()."customer/machineServices");    
                }else{
                    setFlash("dataMsgError", $response['message']);
                    redirect(site_url()."customer/machineServices");    
                }
        }

        $arrayData = [
            "categoryList" => $categoryList['result'],
        ];
        
       // print_r($arrayData);die;
        $this->template->load("customer/machine/machine_services/create", $arrayData);
    }

     public function update_machine_services($id) {
        //echo $id;die;
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            
            //print_r($pageData);die;
            $url = site_url() . "customer/api/updateMachineServices";
            $response = apiCall($url, "post", $pageData);
         //   print_r($response);die;
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machineServices");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machineServices/");
            }
        }
        $url = site_url() . "/customer/api/findSingleMachineServices/$id";
        $result = apiCall($url, "get");
      //  print_r($result);die;
        $arrayData = [
            "result" => $result['result'],
        ];
        
        //print_r($arrayData);die;
        $this->template->load("customer/machine/machine_services/update", $arrayData);
    }

    public function delete_services($id) {
        //echo $id;die;
        $url = site_url() . "/customer/api/delete_services/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machineServices/");
    }

    ////////////////         Machine gallery  ///////////////////////////
    public function add_machineDetail_image($md_id) {

        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/createGallery";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect("customer/add_machineDetail_image/{$pageData['md_id']}");
            } else {
                setFlash("dataMsgError", $response['message']);

                redirect("customer/add_machineDetail_image/{$pageData['md_id']}");
            }
        }

        $url = site_url() . "machine/api/findMultipleGalleryImages/$md_id";
        $machineAllImages = apiCall($url, "get");
        $arrayData = [
            "machineAllImages" => $machineAllImages,
            "md_id" => $md_id
        ];
        $this->template->load('customer/machine/machine_gallary', $arrayData);
    }

    public function delete_gallary($id, $pid) {
        $url = site_url() . "/customer/api/delete_gallary/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect("customer/add_machineDetail_image/$pid");
    }

    /*     * ******** MAchine Category ************** */

    public function MachineCategory() {
        $userid = $this->session->userdata('uid');
        //print_r($userid);exit; 
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/createCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/MachineCategory/");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/MachineCategory/");
            }
        }


        $url = site_url() . "customer/api/findMultipleMachineCat/$userid";
        $machineCatList = apiCall($url, "get");
        //print_r($machineCatList);exit;
        $arrayData = [
            "machineCatList" => $machineCatList['result'],
        ];

        //print_r($arrayData);exit;
        $this->template->load("customer/machine/machine_category/list", $arrayData);
    }

    public function create_category() {
        $created_by = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['created_by'] = $created_by;
            $url = site_url() . "customer/api/createCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/MachineCategory");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/MachineCategory");
            }
        }
        $this->template->load("customer/machine/machine_category/create", $arrData);
    }

    public function update($id) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/updateMachineCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/MachineCategory/");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "machinecustomer/MachineCategory/");
            }
        }
        $url = site_url() . "/machine/api/findSingleMachineCategory/$id";
        $result = apiCall($url, "get");
        $arrayData = [
            "result" => $result['result'],
        ];
        $this->template->load("customer/machine/machine_category/update", $arrayData);
    }

    public function delete($id) {
        $url = site_url() . "/customer/api/delete/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machine/MachineCategory/");
    }

    /*     * ************* Machine Brand ************* */

    /* master Machine Brand List 
      09-10-2018
     * @access public
     * @param  
     * @return array of post data
     */

    public function machine_brand() {
        $userId = $this->session->userdata('uid');
        $url = site_url() . "customer/api/machineBrandList/$userId";
        $brandList = apiCall($url, "get");
        ///print_r($brandList);exit;
        $arrayData = [
            "brandList" => $brandList['result'],
        ];
        $this->template->load("customer/machine/brand/list", $arrayData);
    }

    /* delett master Machine Brand  
      20/4/2018
     * @access public
     * @param  
     * @return array of post data
     */

    public function create_brand() {
        $created_by = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();
            $pageData['created_by'] = $created_by;
            $url = site_url() . "customer/api/createBrand";
            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machine_brand");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machine_brand");
            }
        }
        $this->template->load("customer/machine/brand/create", $arrData);
    }

    public function update_brand($id) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/updateMachineBrand";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machine_brand");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machine_brand");
            }
        }
        $url = site_url() . "/machine/api/findSingleMachineBrand/$id";
        $result = apiCall($url, "get");
        $arrayData = [
            "result" => $result['result'],
        ];
        $this->template->load("customer/machine/brand/update", $arrayData);
    }

    public function deleteMachineBrand($id) {
        $url = site_url() . "/customer/api/deleteMachineBrand/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machine_brand");
    }

    /* =====================MACHINE Branch Model DETAILS======================= */

    /* master Machine Brand Model List 
      09-10-2018
     * @access public
     * @param  
     * @return array of post data
     */

    public function machine_brand_model() {
        $id = $this->session->userdata('uid');
        $url = site_url() . "customer/api/machineBrandModelList/$id";
        $brandModelList = apiCall($url, "get");
        //print_r($brandModelList);exit;
        $arrayData = [
            "brandModelList" => $brandModelList['result'],
        ];
        $this->template->load("customer/machine/brand_model/list", $arrayData);
    }

    public function create_brandModel() {
        $created_by = $this->session->userdata('uid');
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['created_by'] = $created_by;
            $url = site_url() . "customer/api/createBrandModel";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machine_brand_model");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machine_brand_model");
            }
        }
        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");
        $arrayData = [
            "brandList" => $brandList['result']['result'],
        ];
        $this->template->load("customer/machine/brand_model/create", $arrayData);
    }

    public function update_brandModel($id) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "customer/api/updateMachineBrandModel";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "customer/machine_brand_model");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/machine_brand_model");
            }
        }
        $url = site_url() . "/machine/api/findSingleMachineBrandModel/$id";
        $result = apiCall($url, "get");
        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");
        $arrayData = [
            "result" => $result['result'],
            "brandList" => $brandList['result']['result'],
        ];
        $this->template->load("customer/machine/brand_model/update", $arrayData);
    }

    public function deleteMachineBrandModel($id) {
        $url = site_url() . "/customer/api/deleteMachineBrandModel/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/machine_brand_model");
    }

    /*     * ** Remote Application RFQ Request ******** */

    /**
     * Remote Application RFQ Request 
     * @access public
      27/4/2018
     * @param   
     * @return array of objects
     */
    public function remote_application_rfq_request($rpr_id = 0) {
        $rpr_id;
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');
        //print_r($userId);exit;
        $url = site_url() . "remoteapplication/api/remote_application_rfq_request/$userId";
        $applicationEngineerReqList = apiCall($url, "get");
        //print_r($applicationEngineerReqList);exit;
        $arrayData = array(
            "applicationEngineerReqList" => $applicationEngineerReqList['result'],
        );

        $this->template->load("remote_application_rfq_request", $arrayData);
    }
    
    //
    
    
   


    public function RemoteApplicationSEQuotationAcceptBycustomer($racrp_id){

    //  echo 'hi';die;

            $url = site_url()."/remoteapplication/api/RemoteApplicationSEQuotationAcceptBycustomer/$racrp_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/applicationService/"); 

    }
    // customer accecpt additive manufacturing 
    public function RemoteApplicationSEQuotationAcceptByreject($racrp_id){

    //  echo 'hi';die;

            $url = site_url()."/remoteapplication/api/RemoteApplicationSEQuotationAcceptByreject/$racrp_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/applicationService/"); 

    }
    
    // training courses
    
    
    public function update_training_courses($id) {
        //echo $id;die;
        if (isset($_POST['btnUpdate'])) {
            $pageData = $this->input->post();
            
            //print_r($pageData);die;
            $url = site_url() . "customer/api/updateTrainingCourses";
            $response = apiCall($url, "post", $pageData);
         //   print_r($response);die;
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/trainingCourses");
            } else {
                setFlash("dataMsgError", $response['message']);
                redirect(site_url() . "customer/trainingCourses/");
            }
        }
        $url = site_url() . "/customer/api/findSingleTrainingCourses/$id";
        $result = apiCall($url, "get");
      //  print_r($result);die;
        $arrayData = [
            "result" => $result['result'],
        ];
        
        //print_r($arrayData);die;
        $this->template->load("customer/training-courses/update", $arrayData);
    }

    public function delete_training_courses($id) {
        //echo $id;die;
        $url = site_url() . "/customer/api/delete_training_courses/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "customer/trainingCourses/");
    }
    
    
    // customer accecpt additive manufacturing 
    public function AdditiveManufacturingSupplierListAcceptBycustomer($drrs_id){

    //  echo 'hi';die;

            $url = site_url()."/additivemanufacturing/api/AdditiveManufacturingSupplierListAcceptBycustomer/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/remote_digitalmanufacturing_req_customers/"); 

    }
    // customer accecpt additive manufacturing 
    public function AdditiveManufacturingSupplierListAcceptByreject($drrs_id){

    //  echo 'hi';die;

            $url = site_url()."/additivemanufacturing/api/AdditiveManufacturingSupplierListAcceptByreject/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/remote_digitalmanufacturing_req_customers/"); 

    }
    public function RemoteProgrammerAcceptBycustomer($rarp_id){

    //echo $rarp_id;die;

            $url = site_url()."/remoteprogramming/api/RemoteProgrammerAcceptBycustomer/$rarp_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/remoteApplicationProgramm");  

    }
    // customer accecpt additive manufacturing 
    public function RemoteProgrammerSupplierListAcceptByreject($rarp_id){

    //  echo 'hi';die;

            $url = site_url()."/remoteprogramming/api/RemoteProgrammerSupplierListAcceptByreject/$rarp_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
                                

            redirect(site_url()."customer/remoteApplicationProgramm/"); 

    }
        
                //accept
                
    public function LaserProcessingSupplierListAcceptBycustomer($drrs_id)
   {

            $url = site_url()."/laserprocessing/api/LaserProcessingSupplierListAcceptBycustomer/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/LaserprocessingRfqList/");    

    }
    // customer accecpt additive manufacturing 
    public function LaserProcessingSupplierListAcceptByreject($drrs_id){

    //  echo 'hi';die;

            $url = site_url()."/laserprocessing/api/LaserProcessingSupplierListAcceptByreject/$drrs_id";

            $requestSupplierList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/LaserprocessingRfqList/");    

    }

     /*     * ******************  Machine Time study ************************** */

    /* /**
     * Machine Time study users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinTimeStudyCustomerRequestList() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/customer/api/MachinTimeStudyCustomerRequestList/$userId";
        $TimeStudyReqList = apiCall($url, "get");
      //s  print_r($TimeStudyReqList);exit;
        $arrayData = array(
            "TimeStudyReqList" => $TimeStudyReqList['result'],
        );
        $this->template->load("machineTimestudyRequest", $arrayData);
    }
     
       /*     * ******************  Machine Time study Supplier Request ************************** */

    /* /**
     * Machine Time study users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinTimeStudySupplierRequestList() {
       
        $userId = $this->session->userdata('uid');
        $userType = $this->session->userdata('user_type');
      //  print_r($userId );exit;
        $url = site_url() . "/customer/api/MachinTimeStudySupplierRequestList/$userId";
        $TimeStudyReqList = apiCall($url, "get");
       // print_r($TimeStudyReqList);exit;
        $arrayData = array(
            "TimeStudyReqList" => $TimeStudyReqList['result'],
        );
        $this->template->load("machineTimestudySupplierRequest", $arrayData);
    }

       /*     * ******************  Machine Time study Supplier Request ************************** */

    /* /**
     * Machine Time study users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function TimeStudyEstimate($mtr_id) {
       // print_r($mtr_id);exit;
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['created_date'] = date('Y-m-d H:i:s');
            $pageData['mtr_id'] = $mtr_id;
            $url = site_url() . "customer/api/TimeStudyEstimate/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgAddSuccess", $response['message']);
                redirect(site_url() . "customer/MachinTimeStudySupplierRequestList/");
            } else {
                setFlash("dataMsgAddError", $response['message']);
                redirect(site_url() . "customer/MachinTimeStudySupplierRequestList/");
            }
        }
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_timestudy_estimate_details/$mtr_id";
        $result = apiCall($url, "get");
        //print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("machineTimestudyEstimate", $arrayData);
    }

     /* /**
     * Machine Time study View Quotation request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function ViewTimeStudyEstimate($mtr_id) {
       // print_r($mtr_id);exit;
        
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_timestudy_estimate_details/$mtr_id";
        $result = apiCall($url, "get");
       // print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewTimestudyEstimate", $arrayData);
    }

    public function TimeStudyRequestAcceptBycustomer($mtr_id){

            $url = site_url()."customer/api/TimeStudyRequestAcceptBycustomer/$mtr_id";
            $TimestudyRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinTimeStudyCustomerRequestList/");    

    }
    // customer accecpt additive manufacturing 
    public function TimeStudyRequestRejectBycustomer($mtr_id){

    //  echo 'hi';die;

            $url = site_url()."customer/api/TimeStudyRequestRejectBycustomer/$mtr_id";

            $TimestudyRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinTimeStudyCustomerRequestList/");    

    }


     /*     * ******************  Machine Finance Request ************************** */

    /* /**
     * Machine Finance users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinFinanceCustomerRequestList() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/customer/api/MachinFinanceCustomerRequestList/$userId";
        $FinanceReqList = apiCall($url, "get");
        // print_r($FinanceReqList);exit;
        $arrayData = array(
            "FinanceReqList" => $FinanceReqList['result'],
        );
        $this->template->load("machineFinanceRequest", $arrayData);
    }
     

      /*     * ******************  Machine Finance Supplier Request ************************** */

    /* /**
     * Machine Finance users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinFinanceSupplierRequestList() {
       
        $userId = $this->session->userdata('uid');
        $userType = $this->session->userdata('user_type');
        $parentID = $this->session->userdata('u_parent_id');
      //  print_r($userId );exit;
        $url = site_url() . "/customer/api/MachinFinanceSupplierRequestList/$userId/$parentID";
        $FinanceReqList = apiCall($url, "get");
         //print_r($FinanceReqList);exit;
        $arrayData = array(
            "FinanceReqList" => $FinanceReqList['result'],
        );
        $this->template->load("machineFinanceSupplierRequest", $arrayData);
    }


 /* /**
     * Machine Time study users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function FinanceEstimate($mfr_id) {
       // print_r($mtr_id);exit;
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['created_date'] = date('Y-m-d H:i:s');
            $pageData['mfr_id'] = $mfr_id;
            $url = site_url() . "customer/api/FinanceEstimate/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgAddSuccess", $response['message']);
                redirect(site_url() . "customer/MachinFinanceSupplierRequestList/");
            } else {
                setFlash("dataMsgAddError", $response['message']);
                redirect(site_url() . "customer/MachinFinanceSupplierRequestList/");
            }
        }
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_finance_estimate_details/$mfr_id";
        $result = apiCall($url, "get");
        //print_r($result);exit;
        $url = site_url() . "/customer/api/findSingle_machine_details/$mfr_id/";
        $Machine_details = apiCall($url, "get");
        //print_r($FinanceReqList);exit;
        $arrayData = array(
            "result" => $result['result'],
            "Machine_details" => $Machine_details['result'],
        );
        $this->template->load("machineFinanceEstimate", $arrayData);
    }

     /* /**
     * Machine Finance View Quotation request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function ViewFinanceEstimate($mfr_id) {
       // print_r($mtr_id);exit;
        
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_finance_estimate_details/$mfr_id";
        $result = apiCall($url, "get");
       // print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("viewFinanceEstimate", $arrayData);
    }


    public function FinanceRequestAcceptBycustomer($mfr_id){

            $url = site_url()."customer/api/FinanceRequestAcceptBycustomer/$mfr_id";
            $FinanceRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinFinanceCustomerRequestList/");    

    }
    // customer accecpt additive manufacturing 
    public function FinanceRequestRejectBycustomer($mfr_id){



            $url = site_url()."customer/api/FinanceRequestRejectBycustomer/$mfr_id";

            $FinanceRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinFinanceCustomerRequestList/");    

    }


     /*     * ******************  Machine Insurance Request ************************** */

    /* /**
     * Machine Insurance users request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinInsuranceCustomerRequestList() {
        $userType = $this->session->userdata('user_type');
        $userId = $this->session->userdata('uid');

        $url = site_url() . "/customer/api/MachinInsuranceCustomerRequestList/$userId";
        $InsuranceReqList = apiCall($url, "get");
    // print_r($InsuranceReqList);exit;
        $arrayData = array(
            "InsuranceReqList" => $InsuranceReqList['result'],
        );
        $this->template->load("machineInsuranceRequest", $arrayData);
    }

     /*     * ******************  Machine Insurance Supplier Request ************************** */

    /* /**
     * Machine Insurance users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function MachinInsuranceSupplierRequestList() {
       
        $userId = $this->session->userdata('uid');
        $userType = $this->session->userdata('user_type');
        $parentID = $this->session->userdata('u_parent_id');
      //  print_r($userId );exit;
        $url = site_url() . "/customer/api/MachinInsuranceSupplierRequestList/$userId/$parentID";
        $InsuranceReqList = apiCall($url, "get");
        //print_r($InsuranceReqList);exit;
        $arrayData = array(
            "InsuranceReqList" => $InsuranceReqList['result'],
        );
        $this->template->load("machineInsuranceSupplierRequest", $arrayData);
    }
     

      /* /**
     * Machine Insurance users supplier request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function InsuranceEstimate($mir_id) {
       // print_r($mtr_id);exit;
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $pageData['created_date'] = date('Y-m-d H:i:s');
            $pageData['mir_id'] = $mir_id;
            $url = site_url() . "customer/api/InsuranceEstimate/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgAddSuccess", $response['message']);
                redirect(site_url() . "customer/MachinInsuranceSupplierRequestList/");
            } else {
                setFlash("dataMsgAddError", $response['message']);
                redirect(site_url() . "customer/MachinInsuranceSupplierRequestList/");
            }
        }
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_insurance_estimate_details/$mir_id";
        $result = apiCall($url, "get");

         $url = site_url() . "/customer/api/findSingle_machine_details_insurance/$mir_id/";
        $Machine_details = apiCall($url, "get");
        //print_r($Machine_details);exit;
        $arrayData = array(
            "result" => $result['result'],
             "Machine_details" => $Machine_details['result'],
        );
        $this->template->load("machineInsuranceEstimate", $arrayData);
    }

     /* /**
     * Machine Insurance View Quotation request List
     * @access public
     * @param   
     * @return array of objects
     */

    public function ViewInsuranceEstimate($mir_id) {
       // print_r($mtr_id);exit;
        
        //Application List By Post Method
        $url = site_url() . "customer/api/findSingle_machine_insurance_estimate_details/$mir_id";
        $result = apiCall($url, "get");
       // print_r($result);exit;
        $arrayData = array(
            "result" => $result['result'],
        );
        $this->template->load("ViewInsuranceEstimate", $arrayData);
    }

    public function InsuranceRequestAcceptBycustomer($mir_id){

            $url = site_url()."customer/api/InsuranceRequestAcceptBycustomer/$mir_id";
            $InsuranceRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinInsuranceCustomerRequestList/");    

    }
    // customer accecpt additive manufacturing 
    public function InsuranceRequestRejectBycustomer($mir_id){



            $url = site_url()."customer/api/FinanceRequestRejectBycustomer/$mir_id";

            $InsuranceRequestList =  apiCall($url, "get"); 
          //  print_r($requestSupplierList);exit;
            redirect(site_url()."customer/MachinInsuranceCustomerRequestList/");    

    }

/* Supplier Machine Order */
	/* All Orders Of supplier */
	public function machineOrdersSupplier(){
		$supplier_ID = $this->session->userdata('uid');
		$url = site_url()."customer/api/supplierListOrder/$supplier_ID";
		$orderList =  apiCall($url, "get");

		$arrayData = array(
					"orderList"=>$orderList
		);
		
        $this->template->load("machinePages/supplierOrder", $arrayData);
	}
	public function machineOrdersSupplierDetails($id){
		$url = site_url()."customer/api/orderSingleDetails/$id";
		$orderDetails =  apiCall($url, "get");
		
		$url = site_url()."customer/api/orderSingleOfferDetails/$id";
		$offerList =  apiCall($url, "get");
		
		if (isset($_POST['btnUploadQuote'])) {
                $pageData = $this->input->post();
				$pageData['id'] = $id;
				$url = site_url()."customer/api/uploadQuote/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	
			}
		if (isset($_POST['btnSubmitOffer'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
				$url = site_url()."customer/api/uploadOffer/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		if (isset($_POST['btnSubmitSoc'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
				$url = site_url()."customer/api/uploadSoc/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		if (isset($_POST['btnSubmitWarrenty'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
                $pageData['machine_warrenty_start_date'] = date_ymd($pageData['machine_warrenty_start_date']);
                $pageData['machine_warrenty_end_date'] = date_ymd($pageData['machine_warrenty_end_date']) ;
				$url = site_url()."customer/api/warrentyDetails/$id";
				$response = apiCall($url, "post",$pageData);
				
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		
		
		$arrayData = array(
					"orderDetails"=>$orderDetails['result'],
					"offerList"=>$offerList,
					
		);
		$this->template->load("machinePages/supplierOrderDetails", $arrayData);
	}
	
	/* All Orders Of Customer */
	public function machineOrdersCustomer(){
		$supplier_ID = $this->session->userdata('uid');
		echo $url = site_url()."customer/api/customerListOrder/$supplier_ID";
		$orderList =  apiCall($url, "get");
		$arrayData = array(
					"orderList"=>$orderList
		);
		
        $this->template->load("machinePages/customerOrder", $arrayData);
     //   $this->template->load("machinePages/supplierOrder", $arrayData);
	}
	public function machineOrdersCustomerDetails($id){
		$url = site_url()."customer/api/orderSingleDetails/$id";
		$orderDetails =  apiCall($url, "get");
		
		$url = site_url()."customer/api/orderSingleOfferDetails/$id";
		$offerList =  apiCall($url, "get");
		
		if (isset($_POST['btnSubmitnda'])) {
                $pageData = $this->input->post();
				$pageData['id'] = $id;
				$url = site_url()."customer/api/uploadnda/$id";
				$response = apiCall($url, "post",$pageData);

				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersCustomerDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersCustomerDetails/$id");
				}	
			}
		if (isset($_POST['btnSubmitpo'])) {
                $pageData = $this->input->post();
				$pageData['id'] = $id;
				$url = site_url()."customer/api/uploadpurchaseorder/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersCustomerDetails/$id");
				}else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersCustomerDetails/$id");
				}	
			}
		if (isset($_POST['btnSubmitOffer'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
				$url = site_url()."customer/api/uploadOffer/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		if (isset($_POST['btnSubmitSoc'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
				$url = site_url()."customer/api/uploadSoc/$id";
				$response = apiCall($url, "post",$pageData);
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		if (isset($_POST['btnSubmitWarrenty'])) {
                $pageData = $this->input->post();
                $pageData['id'] = $id;
                $pageData['machine_warrenty_start_date'] = date_ymd($pageData['machine_warrenty_start_date']);
                $pageData['machine_warrenty_end_date'] = date_ymd($pageData['machine_warrenty_end_date']) ;
				$url = site_url()."customer/api/warrentyDetails/$id";
				$response = apiCall($url, "post",$pageData);
				
				if ($response['result']) {
					setFlash("dataMsgAddSuccess", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				} else {
					setFlash("dataMsgAddError", $response['message']);
					redirect(site_url() . "customer/machineOrdersSupplierDetails/$id");
				}	

		}
		
		
		$arrayData = array(
					"orderDetails"=>$orderDetails['result'],
					"offerList"=>$offerList,
					
		);
		$this->template->load("machinePages/customerOrderDetails", $arrayData);
	}
	
	
	/* Training Request Suppplier */
	public function training_request_supplier($remote_application_id = 0) {

        $remote_application_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/trainingRequestServices/$userId";

        $consultReqList = apiCall($url, "get");
		

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");



            if ($requestConsultantList['result']) {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("technical_service_request_service_engg", $arrayData);
    }
	
	public function updateStatusTechnicalRequestEngg($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/techServiceUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/training_request_supplier");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/training_request_supplier");			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("customer/updateRequestStatus",$arrayData);
	}

	public function updateStatusTechnicalRequestEnggOnDemand($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/techServiceUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/training_request_supplier_onDemand");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/training_request_supplier_onDemand");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("customer/updateRequestStatus",$arrayData);
	}
	public function updateStatusApplicationSupport($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/applicationUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/application_support_request_supplier");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/application_support_request_supplier");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("customer/updateRequestStatus",$arrayData);
	}
	public function updateStatusTechnicalRequestEnggWarrenty($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/techServiceUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/training_request_supplier_warrenty");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/training_request_supplier_warrenty");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("customer/updateRequestStatus",$arrayData);
	}

	
	public function training_request_supplier_warrenty($remote_application_id = 0) {

        $remote_application_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/trainingRequestWarrenty/$userId";

        $consultReqList = apiCall($url, "get");
		

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");



            if ($requestConsultantList['result']) {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("technical_service_request_warrenty_engg", $arrayData);
        /* $this->template->load("technical_service_request_on_demand_engg", $arrayData); */
    }
	public function training_request_supplier_onDemand($remote_application_id = 0) {

        $remote_application_id;

        $userType = $this->session->userdata('user_type');

        $userId = $this->session->userdata('uid');



        $url = site_url() . "/customer/api/trainingRequestOndemand/$userId";

        $consultReqList = apiCall($url, "get");
		

        if ($remote_application_id > 0) {

            $url = site_url() . "/customer/api/remoteApplicationServiceConsultantUpdateByConsultant/$remote_application_id";

            $requestConsultantList = apiCall($url, "get");



            if ($requestConsultantList['result']) {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            } else {

                setFlash("dataMsgAddError", $requestConsultantList['message']);

                redirect(site_url() . "customer/remoteApplicationConsultant/");
            }
        }

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

    
        $this->template->load("technical_service_request_on_demand_engg", $arrayData);
    }
	/* TOKBOX PART */
	public function scheduleCourseServiceAgreement($id = 0) {

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

			

            $pageDataBrain['entry_date'] = date('Y-m-d');

            $pageDataBrain['customer_user_id'] = $pageData['customer_user_id'];

            $pageDataBrain['startDate'] = date_ymd($pageData['courseStartDate']);

            $pageDataBrain['tech_req_id'] = $pageData['tech_req_id'];

            $pageDataBrain['class_title'] = $pageData['class_title'];

            $pageDataBrain['start_time'] = date("H:i", strtotime($pageData['course_start_time']));

            $pageDataBrain['end_time'] = date("H:i", strtotime($pageData['course_end_time']));
            $pageDataBrain['created_by_user'] = $this->session->userdata('uid');


            //  require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageDataBrain['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageDataBrain['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/requestTrainingRequest";

            $response = apiCall($url, "post", $pageDataBrain);
			

            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);

                redirect(site_url() . "customer/scheduleCourseServiceAgreement/$id");
            } else {

                setFlash("dataMsgMachError", $response['message']);

                redirect(site_url() . "customer/scheduleCourseServiceAgreement/$id");
            }
        }
		
        $url = site_url() . "/customer/api/technicalServicestokboxList/$id";
        $tokboxData = apiCall($url, "get");
		
	
        $arrayData = [
            "reqData" => $reqData['result'],
            "brainCertList" => $tokboxData,
            "id" => $id,
        ];

        $this->template->load("scheduleCourseTraining", $arrayData);
    }
	public function tokboxLunchTechnicalService($id) {

        $uid = $this->session->userdata('uid');

        if((int)($id)) {

            $url = site_url() . "customer/api/technicalServiceClassScheduleFetchSingle/$id";

            $response = apiCall($url, "get");


            if($response['result']) {

                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['id'] = $id;

                    $url = site_url() . "customer/api/requestTrainingUpdate/";

                    $response = apiCall($url, "post", $stringData);
					
                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunchTechnicalService/$id");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

	/* Zoom Part */

	public function scheduleListTechnicalRequestEngg($tech_req_id) {
        $url = site_url() . "customer/api/techncialSupportclassScheduleListConsultant/$tech_req_id";
        $reqData = apiCall($url, "get");
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
            //CREATE OBJECT OF PERTICULAR CLASS

			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['tech_req_id'] = $tech_req_id;

            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];
            $responseZoom1['end_time'] = $endTime;

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;


          


            $url = site_url() . "customer/api/zoomResponseInsertTechSupport/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);


            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestEngg/$tech_req_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestEngg/$tech_req_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("technicalRequestClassScheduleList", $arrayData);
    }
	public function scheduleListTechnicalRequestOnDemandEngg($tech_req_id) {
        $url = site_url() . "customer/api/techncialSupportclassScheduleListConsultant/$tech_req_id";
        $reqData = apiCall($url, "get");
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
            //CREATE OBJECT OF PERTICULAR CLASS
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['tech_req_id'] = $tech_req_id;

            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];
			$responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;


          


            $url = site_url() . "customer/api/zoomResponseInsertTechSupport/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);


            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestOnDemandEngg/$tech_req_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestOnDemandEngg/$tech_req_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("technicalRequestClassScheduleList", $arrayData);
    }
	public function scheduleListTechnicalRequestWarrentyEngg($tech_req_id) {
        $url = site_url() . "customer/api/techncialSupportclassScheduleListConsultant/$tech_req_id";
        $reqData = apiCall($url, "get");
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['tech_req_id'] = $tech_req_id;

            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];
			$responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;


          


            $url = site_url() . "customer/api/zoomResponseInsertTechSupport/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);


            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestWarrentyEngg/$tech_req_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListTechnicalRequestWarrentyEngg/$tech_req_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("technicalRequestClassScheduleList", $arrayData);
    }
	
	/* Application Support Request */
	public function application_support_request_supplier($app_req_id = 0) {
		$userType = $this->session->userdata('user_type');
		$userId = $this->session->userdata('uid');
		$url = site_url() . "/customer/api/applicationRequestServices/$userId";
        $consultReqList = apiCall($url, "get");

        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("application_support_request_service_engg", $arrayData);
    }
	
	public function scheduleListApplicationRequestEngg($app_req_id) {
        $url = site_url() . "customer/api/applicationSupportclassScheduleListConsultant/$app_req_id";
        $reqData = apiCall($url, "get");
		
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
			
			
            //CREATE OBJECT OF PERTICULAR CLASS

            $zoomCalls = new ZoomAPI();

            $createUser = $zoomCalls->createMeeting($data);

            $responseArray = json_decode($createUser);

            $responseZoom = (array) $responseArray;

            $responseZoom1 = array();



            $responseZoom1['app_req_id'] = $app_req_id;

            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];

            $responseZoom1['join_url'] = $responseZoom['join_url'];

            $responseZoom1['start_time'] = $responseZoom['start_time'];
            $responseZoom1['end_time'] = $endTime;

            $responseZoom1['created_at'] = $responseZoom['created_at'];

            $responseZoom1['host_id'] = $responseZoom['host_id'];

            $responseZoom1['uuid'] = $responseZoom['uuid'];

            $responseZoom1['meeting_id'] = $responseZoom['id'];

            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;


          


            $url = site_url() . "customer/api/zoomResponseInsertApplicationSupport/";

            $acceptResponse = apiCall($url, "post", $responseZoom1);
		


            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListApplicationRequestEngg/$app_req_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListApplicationRequestEngg/$app_req_id");
            }
        }

        $arrayData = [
            "reqData" => $reqData['result']
        ];



        $this->template->load("applicationRequestClassScheduleList", $arrayData);
    }
	/* Spare Part Request */
	public function spare_part_requests() {  
	$supplier_ID = $this->session->userdata('uid');
		$url = site_url()."/consultant/api/findMultipleSpareRequestListSupplier/$supplier_ID";
		$spare_part_list =  apiCall($url, "get");
		
		$arrayData=[
			"service_request_list"=>$spare_part_list['result'],
		];
		$this->template->load("spareReqList",$arrayData);
	}	
	public function updateOrderDetails($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/updateSpareOrderDetails";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/updateOrderDetails/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/updateOrderDetails/$id");
			}  
		}
		
		$url = site_url()."/consultant/api/findMultipleDeliveryList/$id";
		$deliveryTrackingDetails =  apiCall($url, "get");
		$arrayData=[
			"deliveryTrackingDetails"=>$deliveryTrackingDetails['result'],
			"spare_req_id"=>$id
		];
		$this->template->load("updateSpareOrder",$arrayData);
	}
	public function closeOrder($id){
			//$pageData = $this->input->post();
			$pageData['id'] = $id;
			$pageData['status'] = 'C';
			$url = site_url()."/consultant/api/closeSpareOrderDetails/$id";
			$response =  apiCall($url,"get"); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/spare_part_requests/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."customer/spare_part_requests/$id");
			}  
	}
	
	public function spareReqDetails($id){
			$url = site_url()."/consultant/api/findMultipleSpareDetailsList/$id";
			$orderDetails =  apiCall($url, "get");
			$arrayData=[
				"orderDetails"=>$orderDetails['result']
			];
			$this->template->load("ammendSparePartDetails",$arrayData);
	}
/* Freelancer List */
	public function freelancer_requestList($free_req_id= 0) {
		$userType = $this->session->userdata('user_type');
		$userId = $this->session->userdata('uid');
		$url = site_url() . "/customer/api/freelancerRequestServices/$userId";
        $consultReqList = apiCall($url, "get");
 
		  
        $arrayData = array(
            "consultReqList" => $consultReqList['result'],
        );

        $this->template->load("freelancer_request_service_engg", $arrayData);
    }
	
	public function scheduleListFreelancerRequest($free_req_id) {
        $url = site_url() . "customer/api/freelancerSupportclassScheduleListConsultant/$free_req_id";
        $reqData = apiCall($url, "get");
		
        $userId = $this->session->userdata('uid');
        $this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			
            //CREATE OBJECT OF PERTICULAR CLASS
            $zoomCalls = new ZoomAPI();
            $createUser = $zoomCalls->createMeeting($data);
            $responseArray = json_decode($createUser);
            $responseZoom = (array) $responseArray;
            $responseZoom1 = array();
            $responseZoom1['free_req_id'] = $free_req_id;
            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];
            $responseZoom1['join_url'] = $responseZoom['join_url'];
            $responseZoom1['start_time'] = $responseZoom['start_time'];
            $responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];
            $responseZoom1['host_id'] = $responseZoom['host_id'];
            $responseZoom1['uuid'] = $responseZoom['uuid'];
            $responseZoom1['meeting_id'] = $responseZoom['id'];
            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = $userId;
            $url = site_url() . "customer/api/zoomResponseInsertFreelancer/";
            $acceptResponse = apiCall($url, "post", $responseZoom1);
            if ($acceptResponse['result']) {

                setFlash("dataMsgAddSuccess", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListFreelancerRequest/$free_req_id");
            } else {

                setFlash("dataMsgAddError", $acceptResponse['message']);

                redirect(site_url() . "customer/scheduleListFreelancerRequest/$free_req_id");
            }
        }
        $arrayData = [
            "reqData" => $reqData['result']
        ];
        $this->template->load("freelancerRequestClassScheduleList", $arrayData);
    }
	public function scheduleCourseFreelancer($id = 0) {

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

		

            $pageDataBrain['entry_date'] = date('Y-m-d');

            $pageDataBrain['customer_user_id'] = $pageData['customer_user_id'];

            $pageDataBrain['startDate'] = date_ymd($pageData['courseStartDate']);

            $pageDataBrain['free_req_id'] = $pageData['tech_req_id'];

            $pageDataBrain['class_title'] = $pageData['class_title'];

            $pageDataBrain['start_time'] = date("H:i", strtotime($pageData['course_start_time']));

            $pageDataBrain['end_time'] = date("H:i", strtotime($pageData['course_end_time']));
            $pageDataBrain['created_by_user'] = $this->session->userdata('uid');


            //  require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
            //  $objTokbox = new tokbox;
            //  $responseData= $objTokbox->tokenGenration();    
            //  $pageDataBrain['tokbox_sessionid'] = $responseData['tokbox_sessionid'];
            //  $pageDataBrain['tokbox_token'] = $responseData['tokbox_token'];

            $url = site_url() . "customer/api/requestFreelancerRequest";

            $response = apiCall($url, "post", $pageDataBrain);
			
	
            if ($response['result']) {

                setFlash("dataMsgMachSuccess", $response['message']);

                redirect(site_url() . "customer/scheduleCourseFreelancer/$id");
            } else {

                setFlash("dataMsgMachError", $response['message']);

                redirect(site_url() . "customer/scheduleCourseFreelancer/$id");
            }
        }
		
        $url = site_url() . "/customer/api/freelancertokboxList/$id";
        $tokboxData = apiCall($url, "get");
		
        $arrayData = [
            "reqData" => $reqData['result'],
            "brainCertList" => $tokboxData,
            "id" => $id,
        ];

        $this->template->load("scheduleCourseFreelancer", $arrayData);
    }
	
	public function tokboxLunchFreelancer($id) {

        $uid = $this->session->userdata('uid');

        if((int)($id)) {

            $url = site_url() . "customer/api/freelancerClassScheduleFetchSingle/$id";

            $response = apiCall($url, "get");


            if($response['result']) {

                if ($response['result']['tokbox_sessionid']) {

                    $sessionId = $response['result']['tokbox_sessionid'];

                    $token = $response['result']['tokbox_token'];

                    redirect(site_url() . "wtokbox/tokbox/index/$sessionId/$token");
                } else {

                    require_once APPPATH . "modules/wtokbox/controllers/Tokbox.php";

                    $objTokbox = new tokbox;

                    $stringData = $objTokbox->tokenGenration();

                    $stringData['id'] = $id;

                    $url = site_url() . "customer/api/requestFreelanceUpdate/";

                    $response = apiCall($url, "post", $stringData);
					
                    if ($response['result']) {

                        redirect(site_url() . "customer/tokboxLunchFreelancer/$id");
                    } else {

                        echo "error" . $response['message'];
                    }
                }
            } else {
                
            }
        }
    }

	
}