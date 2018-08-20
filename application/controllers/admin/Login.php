<?php

class Login extends MY_Controller {

    function index() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
        }
        if ($this->form_validation->run()) {
            $this->session->set_userdata('login', true);
            redirect(admin_url('home'));
        }
        $this->load->view('admin/login/index');
    }

    function check_login() {
        $ten = $this->input->post('ten_ad');
        $pass = $this->input->post('mk_ad');

        $this->load->model('admin_model');
        $where = array('ten_ad' => $ten, 'mk_ad' => $pass);
        if($this->admin_model->check_exist($where)) {
            return true;
        }
        else if(!$ten){
            $this->form_validation->set_message(__FUNCTION__,'chưa điền tên đăng nhập');
        }
        else if(!$pass){
            $this->form_validation->set_message(__FUNCTION__,'chưa điền mật khẩu');
        }
        $this->form_validation->set_message(__FUNCTION__, 'sai tên đăng nhập hoặc mật khẩu');
        return false;
    }

}
