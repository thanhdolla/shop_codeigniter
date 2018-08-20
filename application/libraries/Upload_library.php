<?php

class Upload_library {

    var $CI = '';

    function __construct() {
        $this->CI = &get_instance();
    }

    function upload($upload_path = '', $file_name) {//ham upload file
        $config = $this->config($upload_path);
        $this->CI->load->library('upload', $config); //trong lobrary phai nhu the nay
        if ($this->CI->upload->do_upload($file_name)) {
            $data = $this->CI->upload->data();
        } else {
            $data = $this->CI->upload->display_errors();
        }
        return $data;
    }

    function config($upload_path = '') {//cau hinh up load file
        $config = array();
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        return $config;
    }

}
