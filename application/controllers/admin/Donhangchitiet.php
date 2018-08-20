<?php

class Donhangchitiet extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('donhangchitiet_model');
        $this->load->model('donhang_model');
    }

    function index() {

        $total_rows = $this->donhangchitiet_model->get_total();
        $this->data['total_rows'] = $total_rows;
        $this->load->library('pagination');

        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = admin_url('donhangchitiet/index');
        $config['per_page'] = 14; //14 sp 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi so trang
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        $this->pagination->initialize($config); // khoi tao cau hinh phan trang       
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);

        //tim dhct theo id chi tiết đơn hàng
        $id = $this->input->get('ID');
        $id = intval($id);
        // hien thi 
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['don_hang_chi_tietID'] = $id;
        }
        
        //tim dhct theo id đơn hàng
        $ma_dh = $this->input->get('ma_dh');
        if ($ma_dh) {
            $input['like'] = array('don_hangID', $ma_dh);
        }

        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;
        $list = $this->donhangchitiet_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/donhangchitiet/index';
        $this->load->view('admin/layout', $this->data);
    }


//    function xuli() {
        //quy định stt =0  là đơn hàng chưa xử lí
        // stt=1 là đã xử lí
//        $id = $this->uri->rsegment(3);
//        $id = intval($id);
       
//        $data['stt_don_hang_chi_tiet'] = '1';
//        $this->donhangchitiet_model->update($id, $data);
//        
//       $this->db->query("UPDATE don_hang
//INNER JOIN don_hang_chi_tiet ON don_hang.don_hangID = don_hang_chi_tiet.don_hangID
//SET don_hang.stt_don_hang = 1
//WHERE don_hang_chi_tiet.don_hang_chi_tietID = '$id'");
//        
//        $this->session->set_flashdata('mes', 'Xử lí thành công');
//        redirect(admin_url('donhangchitiet'));
//    }
//    function delete(){
//        $id = $this->uri->rsegment(3);
//        $id = intval($id);
//       
//        $this->donhangchitiet_model->delete($id, $data);
//        $this->session->set_flashdata('mes', 'Xóa thành công');
//        redirect(admin_url('donhangchitiet'));
//    }

}
