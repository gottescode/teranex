<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Footer extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    } 
	public function allCategories()
	{	 
		// redirect to termsuse
		$this->template->load("allCategories" );
	}
	public function businessIdentity()
	{	 
		// redirect to termsuse
		$this->template->load("businessIdentity" );
	}
	public function getPaidForYourFeedback()
	{	 
		// redirect to termsuse
		$this->template->load("getPaidForYourFeedback" );
	}
	public function helpCenter()
	{	 
		// redirect to termsuse
		$this->template->load("helpCenter" );
	}
	public function inspectionService()
	{	 
		// redirect to termsuse
		$this->template->load("inspectionService" );
	}
	public function learningCenter()
	{	 
		// redirect to termsuse
		$this->template->load("learningCenter" );
	}
	public function logisticsService()
	{	 
		// redirect to termsuse
		$this->template->load("logisticsService" );
	}
	public function reportAbuse()
	{	 
		// redirect to termsuse
		$this->template->load("reportAbuse" );
	}
	public function rfq()
	{	 
		// redirect to termsuse
		$this->template->load("rfq" );
	}
	public function securePayment()
	{	 
		// redirect to termsuse
		$this->template->load("securePayment" );
	}
	public function serviseProviderMembership()
	{	 
		// redirect to termsuse
		$this->template->load("serviseProviderMembership" );
	}
	public function siteMap()
	{	 
		// redirect to termsuse
		$this->template->load("siteMap" );
	}
	public function submitAdispute()
	{	 
		// redirect to termsuse
		$this->template->load("submitAdispute" );
	}
	public function supplierMembership()
	{	 
		// redirect to termsuse
		$this->template->load("supplierMembership" );
	}
	public function tradeAssurance()
	{	 
		// redirect to termsuse
		$this->template->load("tradeAssurance" );
	}
	public function faq()
	{	 
		// redirect to termsuse
		$this->template->load("faq" );
	}
	public function payLater()
	{	 
		// redirect to termsuse
		$this->template->load("payLater" );
	}
}