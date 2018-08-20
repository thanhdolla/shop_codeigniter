<?php

class Home extends MY_Controller {

    function index() {
        $input = array();
        $input['where'] = array();
        $this->load->model('donhang_model');
        $listdh = $this->donhang_model->get_list($input);
        $this->data['listdh'] = $listdh;

       
        $input2 = array();
        $input2['where'] = array();
        $this->load->model('thongbao_model');
        $listtb = $this->thongbao_model->get_list($input2);
        $this->data['listtb'] = $listtb;

        $input3 = array();
        $input3['where'] = array();
        $this->load->model('khachhang_model');
        $listkh = $this->khachhang_model->get_list($input3);
        $this->data['listkh'] = $listkh;
        
         $admin_sec = $this->session->userdata('admin_sec');
                $this->data['admin_sec']=$admin_sec;
                if($admin_sec){
                    $this->load->model('admin_model');
                    $ad_info= $this->admin_model->get_info($admin_sec);
                    $this->data['ad_info']=$ad_info;
                }

        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/layout', $this->data);
    }
    

}
