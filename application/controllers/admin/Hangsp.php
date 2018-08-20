<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Hangsp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('hangsp_model');
    }

    function index() {

        $input = array();
        $input['where'] = array('stt_hang_sp' => 0);

        $list = $this->hangsp_model->get_list($input);
        $this->data['list'] = $list;

        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;

        $this->data['temp'] = 'admin/hangsp/index';
        $this->load->view('admin/layout', $this->data);
    }

    function add() {
        $this->load->library('form_validation'); //thu vien validation form
        $this->load->helper('form');
        if ($this->input->post()) {//neu co du lieu post len
            $this->form_validation->set_rules('ten_hang_sp', 'Tên hãng', 'required|callback_check_hang');
            if ($this->form_validation->run()) {
                 $this->load->library('upload_library');
                $upload_path = './upload/hangsp';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $anh_hang_sp = ' ';
                if (isset($upload_data['file_name'])) {
                    $anh_hang_sp = $upload_data['file_name'];
                }
                //luu du lieu can them
                
                $ten_hang = $this->input->post('ten_hang_sp');
                $data = array(
                    'ten_hang_sp' => $ten_hang,
                    'anh_hang_sp'=>$anh_hang_sp,
                    'parent_id'=>1,
                );

                if ($this->hangsp_model->create($data)) {
                    $this->session->set_flashdata('mes', ' Thên thành công');
                } else {
                    $this->session->set_flashdata('mes', 'Không thêm thành công');
                }
                redirect(admin_url('hangsp'));
            }
        }
        $this->data['temp'] = 'admin/hangsp/add';
        $this->load->view('admin/layout', $this->data);
    }

    function check_hang() {
        $hang = $this->input->post('ten_hang_sp');
        $where = array('ten_hang_sp' => $hang);
        if ($this->hangsp_model->check_exist($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'hãng đã tồn tại');
            return FALSE;
        }
        return true;
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $id = $this->uri->rsegment('3');
        $info = $this->hangsp_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('mes', 'Không có dữ lệu mục này');
            redirect(admin_url('hangsp'));
        } else {
            $this->data['info'] = $info;
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_hang_sp', 'tên hãng', 'required');
            if ($this->form_validation->run()) {
//                $ten = $this->input->post('ten_hang_sp');
//                $data = array(
//                    'ten_hang_sp' => $ten
//                );
                $this->load->library('upload_library');
                $upload_path = './upload/hangsp';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $anh_hang_sp = ' ';
                if (isset($upload_data['file_name'])) {
                    $anh_hang_sp = $upload_data['file_name'];
                }
                //luu du lieu can them
                
                $ten_hang = $this->input->post('ten_hang_sp');
                $data = array(
                    'ten_hang_sp' => $ten_hang,
                    'anh_hang_sp'=>$anh_hang_sp,
                );
                if ($this->hangsp_model->update($id, $data)) {
                    $this->session->set_flashdata('mes', 'Sửa thành công');
                } else {
                    $this->session->set_flashdata('mes', 'Không sửa thành công');
                }
                redirect(admin_url('hangsp'));
            }
        }
        $this->data['temp'] = 'admin/hangsp/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function delete() {
        $id = $this->uri->rsegment(3);
        $id = intval($id);

//        $data['stt_hang_sp'] = '1';
        $this->hangsp_model->delete($id, $data);
        $this->session->set_flashdata('mes', 'Xóa thành công');
        redirect(admin_url('hangsp'));
    }

}
