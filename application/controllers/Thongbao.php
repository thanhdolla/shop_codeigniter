<?php

class Thongbao extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('thongbao_model');
    }

    function view() {
        //load view
        $id = $this->uri->rsegment(3);
        $tb = $this->thongbao_model->get_info($id);
        if (!$tb) {
            redirect();
        }
        $this->data['tb'] = $tb;
        $this->data['temp'] = 'site/thongbao/view';
        $this->load->view('site/layout', $this->data);
    }

}
