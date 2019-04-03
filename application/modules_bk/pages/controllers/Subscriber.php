<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscriber extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

    public function index(){ 
       
        $arrData=array( 
        ); 
        $this->template->load("index",$arrData);
    }

}