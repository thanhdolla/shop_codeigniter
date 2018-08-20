<?php

class Thanhvien extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('khachhang_model');
    }

    function index() {
        //lay ds thanhvien
        $input = array();
        $input['where'] = array('stt_kh' => 0);

        $list = $this->khachhang_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->khachhang_model->get_total();
        $this->data['total'] = $total;

        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;

        $this->data['temp'] = 'admin/thanhvien/index';
        $this->load->view('admin/layout', $this->data);
    }
    function delete(){
        $id= $this->uri->rsegment(3);
        $id = intval($id);
        $this->khachhang_model->get_info($id);
        $data['stt_kh']=1;
        $this->khachhang_model->update($id, $data);
        $this->session->set_flashdata('mes', 'Xóa thành công');
        redirect(admin_url('thanhvien'));
    }

}
