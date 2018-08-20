<?php

class Sanpham extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('sanpham_model');
    }

    function index() {
//        $input0 = array();
//        $input0['where'] = array('stt_sp' => 0);
//tong sp
        $total_rows = $this->sanpham_model->get_total();
        $this->data['total_rows'] = $total_rows;
        $this->load->library('pagination');

        $config = array();
        $config['total_rows'] = $total_rows;
        $config['base_url'] = admin_url('sanpham/index');
        $config['per_page'] = 4; //4 sp 1 trang
        $config['uri_segment'] = 4; //phan doan hien thi so trang
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        $this->pagination->initialize($config); // khoi tao cau hinh phan trang       
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input1['limit'] = array($config['per_page'], $segment);

        //tim sp theo id
        $id = $this->input->get('ID');
        $id = intval($id);
        // hien thi ra sp co stt_sp =0
        $input1['where'] = array('stt_sp' => 0);
        if ($id > 0) {
            $input1['where']['san_phamID'] = $id;
        }
        //tim theo ten
        $ten = $this->input->get('ten');
        if ($ten) {
            $input1['like'] = array('ten_sp', $ten);
        }

        $hang_spID = $this->input->get('hang_san_pham');
        $hang_spID = intval($hang_spID);
        if ($hang_spID > 0) {
            $input1['where']['hang_spID'] = $hang_spID;
        }

        //lay danh sach san pha
        $list = $this->sanpham_model->get_list($input1);
        $this->data['list'] = $list;

        //lay danh sach danh muc hang sp
        $this->load->model('hangsp_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        // danh mục cha có pareant_id =0, danh mục con có parrent_id = id danh mục cha 
        $hang = $this->hangsp_model->get_list($input);
        foreach ($hang as $row) {
            $input['where'] = array('parent_id' => $row->hang_spID);
            $input['where'] = array('stt_hang_sp' => 0);
            $subs = $this->hangsp_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['hang'] = $hang;
        $mes = $this->session->flashdata('mes');
        $this->data['mes'] = $mes;

        $this->data['temp'] = 'admin/sanpham/index';
        $this->load->view('admin/layout', $this->data);
    }

    function add() {

//        lay ds hang sp
        $this->load->model('hangsp_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);

        $hang = $this->hangsp_model->get_list($input);
        foreach ($hang as $row) {
            $input['where'] = array('parent_id' => $row->hang_spID);
            $input['where'] = array('stt_hang_sp' => 0); // k lay ra cai dong parent_id=0;
            $subs = $this->hangsp_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['hang'] = $hang;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_sp', 'tên', 'required|min_length[1]');
            $this->form_validation->set_rules('hang_spID', 'hãng', 'required');
            $this->form_validation->set_rules('ngay_sx', 'ngày sản xuất', 'required');
//            $this->form_validation->set_rules('anh_sp', 'ảnh', 'required');
            $this->form_validation->set_rules('mo_ta_sp', 'cấu hình', 'required');
            $this->form_validation->set_rules('bao_hanh', 'bảo hành', 'required');
            $this->form_validation->set_rules('khuyen_mai', 'khuyến mại', 'required');
            $this->form_validation->set_rules('gia_sp', 'giá', 'required');

            if ($this->form_validation->run()) {

                //them du lieu vao database
                $ten_sp = $this->input->post('ten_sp');
                $hang_sp = $this->input->post('hang_spID');
                $ngay_sx = $this->input->post('ngay_sx');

                //lay ten file anh
                $this->load->library('upload_library');
                $upload_path = './upload/sanpham';
                $upload_data = $this->upload_library->upload($upload_path, 'anh_sp');
                $anh_sp = ' ';
                if (isset($upload_data['file_name'])) {
                    $anh_sp = $upload_data['file_name'];
                }
				
				
//                
                $mo_ta_sp = $this->input->post('mo_ta_sp');
                $bao_hanh = $this->input->post('bao_hanh');
                $khuyen_mai = $this->input->post('khuyen_mai');
                $gia_sp = $this->input->post('gia_sp');

                $data = array(
                    'ten_sp' => $ten_sp,
                    'hang_spID' => $hang_sp,
                    'ngay_sx' => $ngay_sx,
                    'anh_sp' => $anh_sp,
                    'mo_ta_sp' => $mo_ta_sp,
                    'bao_hanh' => $bao_hanh,
                    'khuyen_mai' => $khuyen_mai,
                    'gia_sp' => $gia_sp,
                );
                if ($this->sanpham_model->create($data)) {
                    $this->session->set_flashdata('mes', 'Thêm sản phẩm thành công');
                } else {
                    $this->session->set_flashdata('mes', 'Thêm sản phẩm không thành công');
                }
                redirect(admin_url('sanpham'));
            }
        }
        $this->data['temp'] = 'admin/sanpham/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit() {
        $id = $this->uri->rsegment('3');
        $info = $this->sanpham_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('mes', 'Không tồn tại sản phẩm này');
            redirect(admin_url('sanpham'));
        }
        $this->data['info'] = $info;

        //lay danh sach danh muc san pham
        $this->load->model('hangsp_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);

        $hang = $this->hangsp_model->get_list($input);
        foreach ($hang as $row) {
            $input['where'] = array('parent_id' => $row->hang_spID);
            $input['where'] = array('stt_hang_sp' => 0); // k lay ra cai dong parent_id=0;
            $subs = $this->hangsp_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['hang'] = $hang;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('ten_sp', 'tên', 'required|min_length[1]');
            $this->form_validation->set_rules('hang_spID', 'hãng', 'required');
            $this->form_validation->set_rules('ngay_sx', 'ngày sản xuất', 'required');
//            $this->form_validation->set_rules('anh_sp', 'ảnh', 'required');
            $this->form_validation->set_rules('mo_ta_sp', 'cấu hình', 'required');
            $this->form_validation->set_rules('bao_hanh', 'bảo hành', 'required');
            $this->form_validation->set_rules('khuyen_mai', 'khuyến mại', 'required');
            $this->form_validation->set_rules('gia_sp', 'giá', 'required');

            if ($this->form_validation->run()) {

                //them du lieu vao database
                $ten_sp = $this->input->post('ten_sp');
                $hang_sp = $this->input->post('hang_spID');
                $ngay_sx = $this->input->post('ngay_sx');

                //lay ten file anh
                $this->load->library('upload_library');
                $upload_path = './upload/sanpham';
                $upload_data = $this->upload_library->upload($upload_path, 'anh_sp');
                $anh_sp = ' ';
                if (isset($upload_data['file_name'])) {
                    $anh_sp = $upload_data['file_name'];
                }
//                
                $mo_ta_sp = $this->input->post('mo_ta_sp');
                $bao_hanh = $this->input->post('bao_hanh');
                $khuyen_mai = $this->input->post('khuyen_mai');
                $gia_sp = $this->input->post('gia_sp');

                $data = array(
                    'ten_sp' => $ten_sp,
                    'hang_spID' => $hang_sp,
                    'ngay_sx' => $ngay_sx,
                    'anh_sp' => $anh_sp,
                    'mo_ta_sp' => $mo_ta_sp,
                    'bao_hanh' => $bao_hanh,
                    'khuyen_mai' => $khuyen_mai,
                    'gia_sp' => $gia_sp,
                );
                if ($this->sanpham_model->update($id, $data)) {
                    $this->session->set_flashdata('mes', 'Sửa sản phẩm thành công');
                } else {
                    $this->session->set_flashdata('mes', 'Sửa sản phẩm không thành công');
                }
                redirect(admin_url('sanpham'));
            }
        }
        $this->data['temp'] = 'admin/sanpham/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function delete() {
       $id = $this->uri->rsegment(3);
        $id = intval($id);

        $data['stt_sp'] = '1';
        $this->sanpham_model->update($id, $data);
        $this->session->set_flashdata('mes', 'Xóa thành công');
        redirect(admin_url('sanpham'));
    }

}
