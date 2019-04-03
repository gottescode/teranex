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
		if($data['payment_for']=='eventBooking'){
			$eventData['payment_status']='S';
			$this->db->update('event_booking', $eventData,"eb_id=".$data['payment_for_id']); 
		}
		if($data['payment_for']=='corseEnroll'){
			$eventData['payment_status']='S';
			$this->db->update('event_booking', $eventData,"ce_id=".$data['payment_for_id']); 
		}
		if($data['payment_for']=='reportData'){
			$eventData['payment_transcation_id']=$data['txnid'];
			$eventData['payment_status']=$data['status'];
			$this->db->update('research_licence_purchase', $eventData,"rlp_id=".$data['payment_for_id']); 
		}
		if($data['payment_for']=='subscribeData'){
			$eventData['payment_transcation_id']=$data['txnid'];
			$eventData['payment_status']=$data['status'];
			$this->db->update('snapshots_subscription_purchase', $eventData,"ssp_id=".$data['payment_for_id']); 
		}
		return $this->db->insert('payment_module', $data); 
		
		 
	} 
}
?>