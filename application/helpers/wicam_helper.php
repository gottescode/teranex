<?php

    function apiWICAMCall($url,$method,$auth=0,$data=[]){
        $response=["status"=>'404',"message"=>"Invalid Calling","data"=>""];

        if($auth==0){
            //Without Auth
        }else{
            //Auth
        }

        return $response;
    }



    function apiWICAM_getToken($url='https://coreidentity.azurewebsites.net/connect/token'){
        $response=["status"=>'404',"message"=>"Invalid Calling","data"=>""];
        $data   = array(
            'client_id'    => 'Teranex',
            'client_secret'=> 'IhfVNBiX3q1i',
            'scope'        => 'CoreApi',
            'grant_type'   => 'client_credentials'
        );

// use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  	= stream_context_create($options);
        $result 	= file_get_contents($url, false, $context);

        if ($result === FALSE)
        {
            $response["status"]="500";
            $response['message']="Unauthorized access";
            $response['data']='';
        }else{
            $response["status"]="200";
            $response['message']="success";
            $response['data']=$result;
        }

print_r($response["data"]);exit();
        return $response;
        // return "hii i am demo Helper";
    }
