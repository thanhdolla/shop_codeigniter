<?php

class MY_Controller extends CI_Controller {

    public $data = array(); // bien gui du lieu sang view

    function __construct() {
        parent::__construct(); //ke thua tu ci_controller

        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin':
                //xuli du lieu
                $this->load->helper('admin');
                $this->check_login();
                //kiem tra kh đăng nhập
                $login = $this->session->userdata('login');
                $this->data['login']=$login ;
                if($login){
                    $this->load->model('admin_model');
                    $ad_info= $this->admin_model->get_info($login);
                    $this->data['ad_info']=$ad_info;
                }
                break;
            default:
                                
                //xu li du lieu trang ngoai
                $this->load->model('hangsp_model');
                $input = array();
                $input['where'] = array('parent_id' => 0);
                $list = $this->hangsp_model->get_list($input);
                foreach ($list as $row) {
                    $input['where'] = array('parent_id' => $row->hang_spID);
                    $subs = $this->hangsp_model->get_list($input);
                    $row->subs = $subs;
                }
                $this->data['list'] = $list;
                
                $this->load->model('thongbao_model');
                $input1= array();
                $input['limit']=array(5,0);
                $list1= $this->thongbao_model->get_list($input1);
                $this->data['list1']= $list1;
                
                
                //kiem tra kh đăng nhập
                $kh_info_id = $this->session->userdata('kh_info_id');
                $this->data['kh_info_id']=$kh_info_id;
                if($kh_info_id){
                    $this->load->model('khachhang_model');
                    $kh_info= $this->khachhang_model->get_info($kh_info_id);
                    $this->data['kh_info']=$kh_info;
                }
                
                $this->load->library('cart');
                $this->data['total_items']= $this->cart->total_items();
                
        }
    }

    private function check_login() {
        $controller = $this->uri->rsegment('1'); // 1 la dang ơ controller admin 

        $controller = strtolower($controller);
        $login = $this->session->userdata('login');
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        if ($login && $controller == 'login'){
            // admin da dang nhap roi thi k vao trang login nua
            redirect(admin_url(home));
        }
    }

}
