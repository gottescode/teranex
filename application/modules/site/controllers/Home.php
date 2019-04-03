<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
    }
	public function index(){
		   
		$url = site_url()."site/api/findMultipleTestimonial/";
		$testimonial_list =  apiCall($url, "get"); 
		//print_r($testimonial_list);exit;
		$arrData = array('testimonial_list' =>$testimonial_list['result']);
		
		$this->template->load("site/index",$arrData); 
	} 
	public function newindex1(){
		   
		$url = site_url()."site/api/findMultipleTestimonial/";
		$testimonial_list =  apiCall($url, "get"); 
		//print_r($testimonial_list);exit;
		$arrData = array('testimonial_list' =>$testimonial_list['result']);
		
		$this->template->load("site/newindex_bckup3112",$arrData); 
	} 
	public function newindex(){

		$url = site_url()."site/api/findMultipleTestimonial/";
		$testimonial_list =  apiCall($url, "get"); 
		//print_r($testimonial_list);exit;
		$arrData = array('testimonial_list' =>$testimonial_list['result']);
		
		// $this->template->load("site/newindex",$arrData); 
		$this->template->load("site/newindex2901",$arrData); 
	} 
	public function index2(){
		   
		$this->template->load("site/index12aug"); 
	} 
		public function index3(){
		   
		$this->template->load("site/index12aug2018"); 
	} 
	public function index4(){
		   
		$this->template->load("site/index13aug2018"); 
	} 
	public function index5(){
		$this->template->load("site/index_13aug2018"); 
	} 
	public function index6(){
		$this->template->load("site/index_13aug2018_index6"); 
	} 
	public function index7(){
		$this->template->load("site/index_16aug2018_index7"); 
	} 
	public function index8(){
		$this->template->load("site/index_17aug2018_index8"); 
	} 
	public function index9(){
		$this->template->load("site/index_23aug2018_index9"); 
	} 
	public function index10(){
		$this->template->load("site/index_23aug2018_index10"); 
	} 
	public function index11(){
		$this->template->load("site/index24aug2018-index11"); 
	} 
	public function index12(){
		$this->template->load("site/index24aug2018-index12"); 
	} 
	public function index13(){
		$this->template->load("site/index24aug2018-index13"); 
	} 
	public function index14(){
		$this->template->load("site/index24aug2018-index14"); 
	} 
	public function index15(){
		$this->template->load("site/index26aug2018-index15"); 
	} 
	public function infoservices(){
		$this->template->load("site/infoservices"); 
	} 
	public function index16(){
		$this->template->load("site/index4sept2018-index16"); 
	}
	public function index17(){
		$this->template->load("site/index4sept-index17"); 
	}
	public function index18(){
		$this->template->load("site/index4sept-index18"); 
	}
	public function index19(){
		$this->template->load("site/index4sept-index19"); 
	}
	public function index20(){
		$this->template->load("site/index5sept-index20"); 
	}
	public function index21(){
		$this->template->load("site/index7sept-index21"); 
	}
	public function index22(){
		$this->template->load("site/index16oct-index22"); 
	}
	public function index23(){
		$this->template->load("site/index17oct-index23"); 
	}
}