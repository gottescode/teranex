<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Library Class
 *
 * @category	Library
 * @Developer	Gaurav Deshpande
 * 
 * This class is designed and develop to include the common things
 * like header footer automatically.
 * It is required to load "url" Helper ( of codeigniter ) 
 * in order to use this class and its methods
 *
**/

class File_manager
{
	// call constructor
	public function __construct()
	{
		// get instance of codeigniter
		$this->CI = & get_instance();
		
		// load and initialize library
		$this->CI->load->library('upload');
		$this->CI->load->library('image_lib');  
	}
	
	//$allowedTypes format-  seperatedby pipe (|) eg. doc|txt|pdf
	//	upload file
	public function upload($fieldName, $filePath, $allowedTypes, $fileName = null,$resImage=0, $waterMarkImg=0)
	{	
	
	
		// get file attributes
		$extension = explode(".",$_FILES[$fieldName]['name']);
		$max = count($extension);
		$fileExtension = ".".$extension[$max-1];   
		
		// assign file name
		if(isset($fileName)){
			$fileName = "$fileName_".date('YmdHis')."$fileExtension";
		}
		else{
			$fileName = date('YmdHis')."$fileExtension";
		}

		// initialize array for library
		$initialize = array(
			'allowed_types' => $allowedTypes,
			'upload_path' => $filePath,
			'file_name' => $fileName
		);
		
		// load and initialize library
		$this->CI->upload->initialize($initialize);
		
		// upload file		
		$upload = $this->CI->upload->do_upload($fieldName);
		$data = array("upload_data"=>$this->CI->upload->data());
		if($upload){
			$data = $this->CI->upload->data();
			$result = array(
				"0" => true,
				"1" => $data["file_name"]
			);
		}
		else {
			$result = array(
				"0" => false,
				"1" => $this->CI->upload->display_errors()	
				// pass delimiters if want like display_errors('<div>', '</div>');
			);
		}
		
		if($upload){
		 
			if($resImage){
				$this->resizeImage($data['full_path'],$data['file_name']);
			}
			if($waterMarkImg){
				$this->waterMark($data['full_path']);
			}
		}
		return $result;
	}
	
	// update file
	public function update($fieldName, $filePath, $allowedTypes, $oldFileName,$resImage=0, $waterMarkImg=0)
	{
		if($_FILES[$fieldName]['name']!=""){
			// upload file
			$result = $this->upload($fieldName, $filePath, $allowedTypes,"",$resImage, $waterMarkImg);
			// on success
			if($result[0]){
				// delete old file
				$delete = $this->delete($filePath, $oldFileName);
			}
			return $result;
		}
		$result = array("0" => true, "1" => $oldFileName);
		return $result;
	}
	
	// delete file
	public function delete($filePath, $fileName)
	{
		$this->CI->load->helper('string');
		if($fileName!=""){
			$filePath = reduce_double_slashes($filePath."/".$fileName);
			if(file_exists($filePath)){
				@unlink($filePath);
				return true;
			}
		}
		return false;
	}
	
	public function multi_upload($fieldName, $filePath, $allowedTypes, $fileName = null )
	{
		$result = array();
		$count = count($_FILES[$fieldName]['name']);

		if($count > 0){
			for($i=0; $i<$count; $i++){
			
				$keys = array_keys($_FILES[$fieldName]);
				
				foreach($keys as $key){
					$_FILES["new_file"][$key] = $_FILES[$fieldName][$key][$i];
				}
				$result[] = $this->upload("new_file", $filePath, $allowedTypes, $fileName, $debug);

			}
		}
		return $result;
	}
	
	// Add water Mark
	public function waterMark($path)
	{
		$config['source_image']	= $path;
	 	$config['wm_text'] = WATERMARKTEXT;
		$config['wm_type'] = 'text';
		$config['wm_font_path'] = './fonts/Xephyr.ttf';
		$config['wm_font_size']	= '20';
	 
		$config['wm_font_color'] = 'cccccc';
		$config['wm_vrt_alignment'] = 'middle';
		$config['wm_hor_alignment'] = 'center';  
		//$this->CI->load->library('image_lib', $config);  
		$this->CI->image_lib->initialize($config);
	    if(!$this->CI->image_lib->watermark()) {
              $this->CI->image_lib->display_errors();
			return false;
        }else{
			return true;
		}  
	}
	
	public function resizeImage($path,$filePath){
		$config['image_library'] = 'gd2';
	 	$config['source_image']	= $path;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	= RESIZEWIDTH;
	 	$config['height']	= RESIZEHIGHT;
	 
		//$config['new_image']	= $filePath;
		$this->CI->image_lib->initialize($config);
		if(!$this->CI->image_lib->resize()) {
             return  $this->CI->image_lib->display_errors(); 
        }
	}
}