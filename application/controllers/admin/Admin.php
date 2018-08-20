<?php

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

    function index() {//lasy ds admin
        $input = array();
        $input['where'] = array('stt_ad' => 0);

        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/layout', $this->data);
    }

    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {//neu co du lieu post len
            $this->form_validation->set_rules('ten_ad', 'Tên', 'required|callback_check_admin');
            $this->form_validation->set_rules('mk_ad', 'Mật khẩu', 'required|min_length[1]');
            $this->form_validation->set_rules('sdt_ad', 'Số điện thoại', 'required|min_length[1]');
            $this->form_validation->set_rules('email_ad', 'Email', 'required|min_length[1]');
            if ($this->form_validation->run()) {
                $ten_ad = $this->input->post('ten_ad');
                $mk_ad = $this->input->post('mk_ad');
                $mk_ad= md5($mk_ad);
                $sdt_ad = $this->input->post('sdt_ad');
                $email_ad = $this->input->post('email_ad');
                $data = array(
                    'ten_ad' => $ten_ad,
                    'mk_ad' => $mk_ad,
                    'sdt_ad' => $sdt_ad,
                    'email_ad' => $email_ad,
                );
                if ($this->admin_model->create($data)) {
                    $this->session->set_flashdata('mes', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('mes', 'Không thêm mới dữ liệu thành công');
                }
                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/layout', $this->data);
    }

    function check_admin() {
        $ten_ad = $this->input->post('ten_ad');
        $where = array('ten_ad' => $ten_ad);
        if ($this->admin_model->check_exist($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment('3'); //3 là phân đoan 3 trong link admin/dd/phan doan 3
        $id = intval($id);
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('mes', 'Không tồn tại admin');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_ad', 'tên', 'required|min_length[1]');
            $this->form_validation->set_rules('mk_ad', 'mật khẩu', 'required|min_length[1]');
            $this->form_validation->set_rules('sdt_ad', 'số điện thoại', 'required|min_length[1]');
            $this->form_validation->set_rules('email_ad', 'email', 'required|min_length[1]');
        }
        if ($this->form_validation->run()) {
            $ten_ad = $this->input->post('ten_ad');
            $mk_ad = $this->input->post('mk_ad');
            $sdt_ad = $this->input->post('sdt_ad');
            $email_ad = $this->input->post('email_ad');

            $data = array(
                'ten_ad' => $ten_ad,
                'mk_ad' => $mk_ad,
                'sdt_ad' => $sdt_ad,
                'email_ad' => $email_ad,
            );
            if ($this->admin_model->update($id, $data)) {
                $this->session->set_flashdata('mes', 'Cập nhật thành công');
            } else {
                $this->session->set_flashdata('mes', 'Không cập nhật thành công');
            }
            redirect(admin_url('admin'));
        }
        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function delete() {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->admin_model->get_info();
        if (!$info) {
            $this->session->set_flashdata('mes', 'không tồn tại admin này');
        }
//        $data['stt_ad'] = '1';
        $this->admin_model->delete($id, $data);
        $this->session->set_flashdata('mes', 'Xóa thành công');
        redirect(admin_url('admin'));
    }
    
    function logout(){
        if($this->session->userdata('login')){
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }

}
