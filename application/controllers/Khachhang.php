<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Khachhang extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('khachhang_model');
    }

    function view() {

        if (!$this->session->userdata('kh_info_id')) {
            redirect();
        }
        $kh = $this->session->userdata('kh_info_id');
        $info = $this->khachhang_model->get_info($kh);
        if (!$info) {
            redirect();
        }
        $this->data['info'] = $info;
        $this->data['temp'] = 'site/khachhang/view';
        $this->load->view('site/layout', $this->data);
    }

    function check_email() {
        $email = $this->input->post('email_kh');
        $where = array('email_kh' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if ($this->khachhang_model->check_exist($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }

    function dangki() {
        //neu đăng nhập rồi về tran thông in
//        if ($this->session->userdata('kh_info_id')) {
//            redirect(base_url('khachhang'));
//        }
        $this->cart->destroy();
        $this->load->library('form_validation');
        $this->load->helper('form');

        //kiem tra du lieuj post leen
        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_kh', 'tên', 'required|min_length[2]');
            $this->form_validation->set_rules('email_kh', 'email', 'required|valid_email|callback_check_email');
            $this->form_validation->set_rules('mk_kh', 'mật khẩu', 'required|min_length[3]');
            $this->form_validation->set_rules('re_password', 'nhập lại mật khẩu', 'matches[mk_kh]');
            $this->form_validation->set_rules('sdt_kh', 'số điện thoại', 'required|min_length[9]');
            $this->form_validation->set_rules('dia_chi_kh', 'địa chỉ', 'required|min_length[5]');

            //nếu nhập chính xác
            if ($this->form_validation->run()) {//them vao csdl
                $mk_kh = $this->input->post('mk_kh');
//                $mk_kh = md5($mk_kh);


                $data = array(
                    'ten_kh' => $this->input->post('ten_kh'),
                    'email_kh' => $this->input->post('email_kh'),
                    'sdt_kh' => $this->input->post('sdt_kh'),
                    'dia_chi_kh' => $this->input->post('dia_chi_kh'),
                    'mk_kh' => $mk_kh,
                );

                if ($this->khachhang_model->create($data)) {
                    $this->session->set_flashdata('mes', 'Đăng kí tài khoản thành công');
//                    echo "ok";
                } else {
                    $this->session->set_flashdata('mes', 'Tạo tài khoản thất bại :(');
//                    echo "dsf";
                }
                redirect(base_url('khachhang/login'));
            }
        }

        $this->data['temp'] = 'site/khachhang/dangki';
        $this->load->view('site/layout', $this->data);
    }

    function login() {
        $this->cart->destroy();
        if ($this->session->userdata('kh_info_id')) {
            redirect(base('khachhang'));
        }
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('email_kh', 'Email đăng nhập', 'required|valid_email');
            $this->form_validation->set_rules('mk_kh', 'Mật khẩu', 'required|min_length[3]');
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                //lay thong tin thanh vien
                $kh = $this->_get_user_info();

                //gắn session id của thành viên đã đăng nhập
                $this->session->set_userdata('kh_info_id', $kh->khach_hangID);

                $this->session->set_flashdata('mes', 'Đăng nhập thành công');
                redirect();
            }
        }

        //hiển thị ra view
        $this->data['temp'] = 'site/khachhang/login';
        $this->load->view('site/layout', $this->data);
    }

    function check_login() {
        $email = $this->input->post('email_kh');
        $pass = $this->input->post('mk_kh');

        $this->load->model('khachhang_model');
        $where = array('email_kh' => $email, 'mk_kh' => $pass);
        if ($this->khachhang_model->check_exist($where)) {
            return true;
        } else if (!$email) {
            $this->form_validation->set_message(__FUNCTION__, 'chưa điền email đăng nhập');
        } else if (!$pass) {
            $this->form_validation->set_message(__FUNCTION__, 'chưa điền mật khẩu');
        }
        $this->form_validation->set_message(__FUNCTION__, 'sai emial đăng nhập hoặc mật khẩu');
        return false;

//        $kh = $this->_get_user_info();
//        if ($kh) {
//            return true;
//        }
//         if (!$kh)
//                    echo "pk";
//        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
//        return false;
    }

    private function _get_user_info() {
        $email = $this->input->post('email_kh');
        $mk_kh = $this->input->post('mk_kh');
//        $mk_kh = md5($mk_kh);

        $where = array('email_kh' => $email, 'mk_kh' => $mk_kh);
        $kh = $this->khachhang_model->get_info_rule($where);
        return $kh;
    }

    function logout() {
        if ($this->session->userdata('kh_info_id')) {
            $this->session->unset_userdata('kh_info_id');
            $this->cart->destroy();
        }
        $this->session->set_flashdata('mes', 'Đăng xuất thành công');
        redirect(base_url('home'));
    }

    function edit() {
        if (!$this->session->userdata('kh_info_id')) {
            redirect(base('khachhang/login'));
        }
//lay thong tin kh
        $kh_id = $this->session->userdata('kh_info_id');
        $kh_info = $this->khachhang_model->get_info($kh_id);
        if (!$kh_info) {
            redirect();
        }
        $this->data['kh_info'] = $kh_info;

        $this->load->library('form_validation');
        $this->load->helper('form');

        //kiem tra du lieuj post leen
        if ($this->input->post()) {
            $mk_kh = $this->input->post('mk_kh');
//            $this->form_validation->set_rules
            if ($mk_kh) {
                $this->form_validation->set_rules('mk_kh', 'mật khẩu', 'required|min_length[3]');
                $this->form_validation->set_rules('re_password', 'nhập lại mật khẩu', 'matches[mk_kh]');
            }
            $this->form_validation->set_rules('ten_kh', 'tên', 'required|min_length[2]');
            $this->form_validation->set_rules('email_kh', 'email', 'required|valid_email');

            $this->form_validation->set_rules('sdt_kh', 'số điện thoại', 'required|min_length[9]');
            $this->form_validation->set_rules('dia_chi_kh', 'địa chỉ', 'required|min_length[5]');

            //nếu nhập chính xác
            if ($this->form_validation->run()) {//them vao csdl
//                echo "ok";
                $mk_kh = $this->input->post('mk_kh');
//                $mk_kh = md5($mk_kh);


                $data = array(
                    'ten_kh' => $this->input->post('ten_kh'),
                    'email_kh' => $this->input->post('email_kh'),
                    'sdt_kh' => $this->input->post('sdt_kh'),
                    'dia_chi_kh' => $this->input->post('dia_chi_kh'),
                );
//                pre($data);
                if ($mk_kh) {
                    $data['mk_kh'] = md5($mk_kh); //nếu mà nhập lại pass
                }

                if ($this->khachhang_model->update($kh_id, $data)) {
                    $this->session->set_flashdata('mes', 'Sửa thông tin thành công');
//                    echo "ok";
                } else {
                    $this->session->set_flashdata('mes', 'Sửa thông tin không thành công');
//                    echo "dsf";
                }
                redirect(site_url('home'));
            }
        }

        $this->data['temp'] = 'site/khachhang/suatt';
        $this->load->view('site/layout', $this->data);
    }

}
