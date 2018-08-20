<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dathang extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('date');
        $this->load->model('donhang_model');
    }

    function form() {
        $giohang = $this->cart->contents();
        $total_items = $this->cart->total_items();
        if ($total_items <= 0) {
            redirect();
        }
//        pre($giohang);
        $tong_tien = 0; // laay ra tong so tien thanh toan
        foreach ($giohang as $row) {
            $tong_tien = $tong_tien + $row['subtotal'];
        }

//        $tong_tien = $tong_tien + $row['subtotal'];
//       pre($tong_tien);
        $kh_id = 0;
        $kh_info = '';
        // lay thong tin thanh vien neu da dang nhap
        if ($this->session->userdata('kh_info_id')) {
            $kh_id = $this->session->userdata('kh_info_id');
            $kh_info = $this->khachhang_model->get_info($kh_id);
            $this->data['kh_info'] = $kh_info;
        }
//pre($kh_id);
        $this->load->library('form_validation');
        $this->load->helper('form');
//if( $this->load->library('form_validation')) echo"ok";
        //kiem tra du lieuj post leen
        if ($this->input->post()) {

            $this->form_validation->set_rules('ten', 'tên', 'required|min_length[2]');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
//            $this->form_validation->set_rules('thanh_toan', 'thanh toán', 'required');
            $this->form_validation->set_rules('sdt', 'số điện thoại', 'required|min_length[9]');
            $this->form_validation->set_rules('dia_chi', 'địa chỉ', 'required|min_length[5]');
            $this->form_validation->set_rules('thoi_gian', 'thời gian', 'required|min_length[8]');
//echo "ok";
            //nếu nhập chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $data = array(
                    'khach_hangID' => $kh_id, // neu chưa đăng nhập mặc định =0
                    'ten' => $this->input->post('ten'),
                    'email' => $this->input->post('email'),
                    'thanh_toan' => $tong_tien,
                    'sdt' => $this->input->post('sdt'),
                    'dia_chi' => $this->input->post('dia_chi'),
                    'thoi_gian' =>$this->input->post('thoi_gian'),
                    'stt_don_hang' => 0,
                    //0 là còn đơn hàng
                    //1 là hủy
                );
//            echo "ok";}
//                    pre($data);
//               
                $this->load->model('donhang_model');
                $this->donhang_model->create($data);
//                     them vao donhang chi tiet
                $don_hangID = $this->db->insert_id(); //lấy id don hang vua them
                $this->load->model('donhangchitiet_model');
                foreach ($giohang as $row) {
                    $data = array(
                        'don_hangID' => $don_hangID,
                        'san_phamID' => $row['id'],
                        'so_luong' => $row['qty'],
                        'tinh_tien' => $row['subtotal'],
                        'stt_don_hang_chi_tiet'=>0,// 
                        // 0 là đã chưa xử lí
                        //1 là đã xử lí
                        
                    );
                    $this->donhangchitiet_model->create($data);
                }
//                xoa don hang
                $this->cart->destroy();
                $this->session->set_flashdata('mes', 'Đặt hàng thành công');
                redirect(site_url());
            }
        }


        $this->data['temp'] = 'site/dathang/form';
        $this->load->view('site/layout', $this->data);
    }

}
