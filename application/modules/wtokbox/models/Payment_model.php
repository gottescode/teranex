<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
    }
	
	// create signup 
	public function insertPayment($data)
	{
	 
		return $this->db->insert('payment_module', $data,1); 
	} 
}
?>