<?php

class Wicamlib
{
    protected $url = 'https://coreidentity.azurewebsites.net/connect/token';
    protected $response = array("status" => '404', "message" => "Invalid Calling", "data" => "");

    function apiWICAM_getToken()
    {

        $data = array(
            'client_id' => 'Teranex',
            'client_secret' => 'IhfVNBiX3q1i',
            'scope' => 'CoreApi',
            'grant_type' => 'client_credentials'
        );

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($this->url, false, $context);

        if ($result === FALSE) {
            $this->response["status"] = "500";
            $this->response['message'] = "Unauthorized access";
            $this->response['data'] = '';
        } else {
            $this->response["status"] = "200";
            $this->response['message'] = "success";
            $this->response['data'] = $result;
        }

        $access_token = (json_decode($this->response['data'])->access_token);
        return $access_token;

    }

    function apiFileUpload($file_name_with_full_path)
    {
        $wicam_access_token = $this->apiWICAM_getToken();
        if ($wicam_access_token != null) {
            echo '<pre>';
            $ch = curl_init();
            $cFile = curl_file_create($file_name_with_full_path);

            $postData = array('file' => $cFile);
            //echo 'Post data ready', PHP_EOL;
            $authorization = "Authorization: Bearer " . $wicam_access_token;

            //echo 'Sending Request', PHP_EOL;
            curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/file");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);

            if (curl_error($ch)) {
                print_r(curl_error($ch));
            }
            curl_close($ch);
            $fileId = json_decode($result)->ID;

            $validation = $this->apiFileValidation($fileId, $wicam_access_token);

            $caljob = $this->apiCalculationJob($wicam_access_token);

            $calfilejob = $this->apiCalculationJobFile($wicam_access_token, $caljob, $fileId);

            $this->apiCalculation($wicam_access_token, $caljob);

            $this->apiCalculationResults($wicam_access_token, $calfilejob);

            sleep(10);
            $call = $this->apiCalculationResults($wicam_access_token, $calfilejob);

            print_r($call); exit();


        } else {
            $Bearer_error = "invalid_token";
            $error_description = "The token is expired";
            echo "<pre>";
            echo "Bearer error: " . $Bearer_error;
            echo "Error description error: " . $error_description;
        }

    }

    function apiFileValidation($fileId, $wicam_access_token)
    {
        $ch = curl_init();
        $authorization = "authorization: Bearer " . $wicam_access_token;
        curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/filevalidation/" . $fileId);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if (curl_error($ch)) {
            print_r(curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }

    function apiCalculationJob($wicam_access_token)
    {
        $ch = curl_init();
        $data_string = array(
            "NestingOption" => 3,
            "Machine" => 3,
            "Plates" => [3]
        );
        $data_string = json_encode($data_string);
        $authorization = "Authorization: Bearer " . $wicam_access_token;

        curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/calculationjob");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            print_r(curl_error($ch));
        }
        curl_close($ch);
        $calculationJob = json_decode($result)->id;
        return $calculationJob;

    }

    function apiCalculationJobFile($wicam_access_token, $calculationJob, $fileId)
    {
        $ch = curl_init();
        $data_string = array(
            "calculationJob" => $calculationJob,
            "file" => $fileId,
            "amount" => 10,
            "material" => 1,
            "thickness" => 2,
            "rotation" => 1,
        );

        $data_string = json_encode($data_string);

        $authorization = "Authorization: Bearer " . $wicam_access_token;
        curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/calculationjobfile");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            print_r(curl_error($ch));
        }

        $calculationJobFile = json_decode($result)->Id;
        return $calculationJobFile;

    }

    function apiCalculation($wicam_access_token, $calculationJob)
    {
        $ch = curl_init();
        $authorization = "Authorization: Bearer " . $wicam_access_token;
        curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/calculation/" . $calculationJob);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        if (curl_error($ch)) {
            print_r(curl_error($ch));
        }
        curl_close($ch);

        return $result;
    }

    function apiCalculationResults($wicam_access_token, $calculationJobFile)
    {
        $ch = curl_init();
        $authorization = "Authorization: Bearer " . $wicam_access_token;
        curl_setopt($ch, CURLOPT_URL, "https://coreapi.wicam.com/calculationjobfile/" . $calculationJobFile);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $result = curl_exec($ch);
        if (curl_error($ch)) {
            print_r(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

}