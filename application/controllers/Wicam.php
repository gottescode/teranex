<?php
/**
 * Created by PhpStorm.
 * User: krishan
 * Date: 26/2/19
 * Time: 11:19 AM
 */

class Wicam extends MX_Controller
{
    function index()
    {
        print_r('adsfsd'); exit();
        $this->load->library("wicamlib");
        print_r($this->wicamlib->apiCalculationJobFile());
    }

    function file()
    {
         $this->load->library("wicamlib");

            $data['error'] = '';
            $data['message'] = '';

            if ($this->input->post("send")) {
                $config['upload_path'] = './uploads/wicam/';
                $config['allowed_types'] = array('dwg', 'dxf');

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile')) {

                    $data['error'] = array('error' => $this->upload->display_errors());

                } else {
                    $data['message'] = array('upload_data' => $this->upload->data());
                    $full_path = $data['message']['upload_data']['full_path'];


                    $this->wicamlib->apiFileUpload($full_path);

                }
            }
            $this->load->view("wicam_file_upload",$data);
    }

}