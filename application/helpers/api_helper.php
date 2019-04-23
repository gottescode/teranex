<?php 
	function apiCall($url, $method, $data = [], $debug = false) {
		
		
        $method = strtolower($method);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, reduce_double_slashes($url));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($method == "post") {		
			$media_files = array();
			if($_FILES){
				foreach($_FILES as $key => $file){
					if(!is_array($file["name"])){
						if($file["name"])
							$media_files[$key] = new CURLFile(realpath($file["tmp_name"]),$file["type"],$file["name"]);
					}
					else {
						for($i=0; $i<count($file["name"]); $i++){
							if($file["name"][$i])
								$media_files["{$key}[$i]"] = new CURLFile(realpath($file["tmp_name"][$i]),
									$file["type"][$i], $file["name"][$i]);
						}
					} 
				}
				curl_setopt($ch, CURLOPT_HEADER, "Content-Type:multipart/form-data" );
			}		
			
		
			
			$data = http_build_query_develop( array_merge($data , $media_files) );
            
            curl_setopt($ch, CURLOPT_POST, 1);                //0 for a get request
            curl_setopt($ch, CURLOPT_POSTFIELDS, ($data));
        }
		
		$CI = &get_instance();
		$session_data = $CI->session->all_userdata();
		
        $response = curl_exec($ch);
        //print_r($response); exit();
        curl_close($ch);
		
		$CI->session->set_userdata($session_data);
		
		if($debug)
			return $response;
        return json_decode($response, true);
    }
	
	function http_build_query_develop($data) {
		if(!is_array($data)) {
			return $data;
		}
		foreach($data as $key => $val) {
			if(is_array($val)) {
				foreach($val as $k => $v) {
					if(is_array($v)) {
						$data = array_merge($data, http_build_query_develop(array( "{$key}[{$k}]" => $v)));
					} else {
						$data["{$key}[{$k}]"] = $v;
					}
				}
				unset($data[$key]);
			}
		}
		return $data;
	}
