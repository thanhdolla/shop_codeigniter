<?php

class Sanpham extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sanpham_model');
        $this->load->model('hangsp_model');
    }

    function danhmuc() {//ds sp theo danh muc
        $id = $this->uri->rsegment(3);
        $id = intval($id); //ép kiểu int

        $danhmuc = $this->hangsp_model->get_info($id);
        if (!$danhmuc) {
            redirect();
        }
        $this->data['danhmuc'] = $danhmuc;
//        //lấy ds sp thuoc hangsp
        $input = array();
        $input1 = array();

        $input1['where'] = array('stt_sp' => 0, 'hang_spID' => $id);


        $total_rows = $this->sanpham_model->get_total($input1);
        $this->data['total_rows'] = $total_rows; //tong sp
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url('sanpham/danhmuc/' . $id);
        $config['per_page'] = 9; //6 sp 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi so trang
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        $this->pagination->initialize($config); // khoi tao cau hinh phan trang       
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $sanpham = $this->sanpham_model->get_list($input1);
//        $sanpham = $this->sanpham_model->get_list($input);
        $this->data['sanpham'] = $sanpham;
               
        $this->data['temp'] = 'site/sanpham/danhmuc';
        $this->load->view('site/layout', $this->data);
    }

    function view() {
        $id = $this->uri->rsegment(3);
        $sanpham = $this->sanpham_model->get_info($id);
        if (!$sanpham) {
            redirect();
        }
        $this->data['sanpham'] = $sanpham;
        //luot view
        $data = array();
        $data['luot_view'] = $sanpham->luot_view + 1;
        $this->sanpham_model->update($sanpham->san_phamID, $data);

        //lay thong tin sp

        $hang = $this->hangsp_model->get_info($sanpham->hang_spID);
        $this->data['hang'] = $hang;

        $this->data['temp'] = 'site/sanpham/view';
        $this->load->view('site/layout', $this->data);
    }

    function timkiem() {
        //autocomplete tìm kiếm
        if ($this->uri->rsegment('3') == 1) {
            $key = $this->input->get('term'); //lay du lieu autocomplete
        } else {
            $key = $this->input->get('tukhoa'); //lay name nhap vao
        }
        $this->data['key'] = trim($key); // xóa khoảng trống
        $input = array();
        $input['like'] = array('ten_sp', $key);

        //đặt lis2 vì trong core my_controller da co list-load danh mục hãng và list1-load thông báo
        $list2 = $this->sanpham_model->get_list($input);
        $this->data['list2'] = $list2; //gui list qua view

        if ($this->uri->rsegment('3') == 1) {
            //xulu autocomplete
            $result = array();
            foreach ($list2 as $row) {
                $item=array();
                $item['id'] = $row->san_phamID;
                $item['label'] = $row->ten_sp;
                $item['value'] = $row->ten_sp;
                $result[] = $item;
            }
            die(json_encode($result)); //tra ve dạng json
        } else {
            $this->data['temp'] = 'site/sanpham/timkiem';
            $this->load->view('site/layout', $this->data);
        }
    }

}
