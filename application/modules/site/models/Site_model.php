<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
			$this->testimonial_path="uploads/testimonial/";
			$this->load->library("file_manager");
			define('RESIZEWIDTH', '1600');
			define('RESIZEHIGHT', '900');
			$this->load->library("file_manager");
			$this->pages="pages"; 
    }
	

	 public function findSingleTestimonial($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_testimonial', $strWhere,'');
	}
	 
	public function findMultipleTestimonial($strWhere) {
		$result=$this->db_lib->fetchMultiple("teranex_testimonial", $strWhere,"");//exit; 
		return $result;
	}
	 

    public function createTestimonial($arrData) {
		$arrData["updated_date"] = date('Y-m-d');

		$data1 = $this->file_manager->upload('testimonial_image', $this->testimonial_path, IMG_FORMAT,"",1);
		if($data1[0])
			$arrData["testimonial_image"] = $data1[1];	
		$video = $this->file_manager->upload('testimonialVideo', $this->testimonial_path, VIDEO_FORMAT);
		if($video[0])
			$arrData["testimonial_video"] = $video[1];
	
		return $result = $this->db_lib->insert("teranex_testimonial", $arrData); 
    }
	
	public function updateTestimonial($arrData) {
	 
		$arrData["updated_date"] = date('Y-m-d');
			$data1 = $this->file_manager->update('testimonial_image', $this->testimonial_path, IMG_FORMAT,$arrData['old_image'],1);
		if($data1[0])
			$arrData["testimonial_image"] = $data1[1];
		$video = $this->file_manager->update('testimonialVideo', $this->testimonial_path, VIDEO_FORMAT,$arrData['old_video']);
		 
		if($video[0]) 
			$arrData["testimonial_video"] = $video[1];
		
		$result = $this->db_lib->update("teranex_testimonial", $arrData, "testimonial_id = " . $arrData["id"]);
        return $result;
    }
	
	public function deleteTestimonial($id) {
		$data = $this->db_lib->fetchSingle("teranex_testimonial", "testimonial_id = $id");
		if($data)
	
			$this->file_manager->delete($this->testimonial_path, $data["testimonial_video"]);
		
		$result = $this->db_lib->delete("teranex_testimonial", "testimonial_id = " . $id);
        return $result;
    }
    
	public function updatePublishTestimonial($data){
		// get total records
		$ids = $data["testimonial_id"];
		if(count($ids)>0){
			foreach($ids as $id){
				// prepare data
				 
				// publish
				if($data["publish_$id"] == "Y")
					$arrData["publish"] = "Y";
				else
					$arrData["publish"] = "N";
				// update record
				
				//$arrData["display_order"]=$data["display_order_$id"];
				$result = $this->db_lib->update("teranex_testimonial", $arrData, "testimonial_id = ". $id);
			}
			return true;
		}
		return false;
	}
	 
}
?>